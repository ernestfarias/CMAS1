<?php

/**
 * login.php -- simple login screen
 *
 * This a simple login screen. Some housekeeping is done to clean
 * cookies and find language.
 *
 * @copyright &copy; 1999-2006 The SquirrelMail Project Team
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id: login.php,v 1.98.2.14 2006/08/03 14:48:09 kink Exp $
 * @package squirrelmail
 */

/**
 * Path for SquirrelMail required files.
 * @ignore
 */
define('SM_PATH','../');

/* SquirrelMail required files. */
require_once(SM_PATH . 'functions/global.php');
require_once(SM_PATH . 'functions/strings.php');
require_once(SM_PATH . 'config/config.php');
require_once(SM_PATH . 'functions/i18n.php');
require_once(SM_PATH . 'functions/plugin.php');
require_once(SM_PATH . 'functions/constants.php');
require_once(SM_PATH . 'functions/page_header.php');
require_once(SM_PATH . 'functions/html.php');
require_once(SM_PATH . 'functions/forms.php');

/**
 * $squirrelmail_language is set by a cookie when the user selects
 * language and logs out
 */
set_up_language($squirrelmail_language, TRUE, TRUE);

/**
 * Find out the base URI to set cookies.
 */
if (!function_exists('sqm_baseuri')){
    require_once(SM_PATH . 'functions/display_messages.php');
}
$base_uri = sqm_baseuri();

/**
 * In case the last session was not terminated properly, make sure
 * we get a new one, but make sure we preserve session_expired_*
 */

if ( !empty($_SESSION['session_expired_post']) && !empty($_SESSION['session_expired_location']) ) {
    $sep = $_SESSION['session_expired_post'];
    $sel = $_SESSION['session_expired_location'];

    sqsession_destroy();

    sqsession_is_active();
    sqsession_register($sep, 'session_expired_post');
    sqsession_register($sel, 'session_expired_location');
} else {
    sqsession_destroy();
}

header('Pragma: no-cache');

do_hook('login_cookie');

$loginname_value = (sqGetGlobalVar('loginname', $loginname) ? htmlspecialchars($loginname) : '');

/* Output the javascript onload function. */

$header = "<script language=\"JavaScript\" type=\"text/javascript\">\n" .
          "<!--\n".
          "  function squirrelmail_loginpage_onload() {\n".
          "    document.forms[0].js_autodetect_results.value = '" . SMPREF_JS_ON . "';\n".
          "    var textElements = 0;\n".
          "    for (i = 0; i < document.forms[0].elements.length; i++) {\n".
          "      if (document.forms[0].elements[i].type == \"text\" || document.forms[0].elements[i].type == \"password\") {\n".
          "        textElements++;\n".
          "        if (textElements == " . (isset($loginname) ? 2 : 1) . ") {\n".
          "          document.forms[0].elements[i].focus();\n".
          "          break;\n".
          "        }\n".
          "      }\n".
          "    }\n".
          "  }\n".
          "// -->\n".
          "</script>\n";

$custom_css = 'none';

// Load default theme if possible
if (@file_exists($theme[$theme_default]['PATH']))
   @include ($theme[$theme_default]['PATH']);

if (! isset($color) || ! is_array($color)) {
    // Add default color theme, if theme loading fails
    $color = array();
    $color[0]  = '#dcdcdc';  /* light gray    TitleBar               */
    $color[1]  = '#800000';  /* red                                  */
    $color[2]  = '#cc0000';  /* light red     Warning/Error Messages */
    $color[4]  = '#ffffff';  /* white         Normal Background      */
    $color[7]  = '#0000cc';  /* blue          Links                  */
    $color[8]  = '#000000';  /* black         Normal text            */
}

displayHtmlHeader( "$org_name - " . _("Login"), $header, FALSE );

?>

<style type="text/css">
<!--
body {
	background-color: #d4d0c8;
}
.campos {
	width: 200px;
	font-family: tahoma,sans-serif;
	font-size: 11px;	
}
-->
</style>
<?php

echo "<body text=\"$color[8]\" bgcolor=\"$color[4]\" link=\"$color[7]\" vlink=\"$color[7]\" alink=\"$color[7]\" onLoad=\"squirrelmail_loginpage_onload();\">" .
     "\n" . addForm('redirect.php', 'post');

$username_form_name = 'login_username';
$password_form_name = 'secretkey';
do_hook('login_top');


if(sqgetGlobalVar('mailto', $mailto)) {
    $rcptaddress = addHidden('mailto', $mailto);
} else {
    $rcptaddress = '';
}

/* If they don't have a logo, don't bother.. */
if (isset($org_logo) && $org_logo) {
    /* Display width and height like good little people */
    $width_and_height = '';
    if (isset($org_logo_width) && is_numeric($org_logo_width) &&
     $org_logo_width>0) {
        $width_and_height = " width=\"$org_logo_width\"";
    }
    if (isset($org_logo_height) && is_numeric($org_logo_height) &&
     $org_logo_height>0) {
        $width_and_height .= " height=\"$org_logo_height\"";
    }
}

?><table width="100%" height="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" height="400" align="center" valign="middle"><div align="center"><table width="424" height="222" border="0" cellpadding="0" cellspacing="0" background="/images/bg/bg_login.png">
        <tr>
          <td height="113" colspan="4" valign="bottom"><table width="423"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="125" height="50">&nbsp;</td>
    <td width="298" height="50"><?php 
		  echo isset($org_logo) && $org_logo
              ? '<img src="' . $org_logo . '" alt="' .
                sprintf(_("%s Logo"), $org_name) .'"' . $width_and_height .
                ' /><br />' . "\n"
              : ''
		  ?></td>
  </tr>
</table></td>
        </tr>
		<tr>
			<td colspan="4" height="12"></td>
		</tr>
        <tr>
          <td width="130" rowspan="3"></td>
          <td width="55"><div align="left"><?php echo _("Name:"); ?></div></td>
          <td height="25" colspan="2"><div align="left"><?php echo addInput($username_form_name, $loginname_value); ?></div></td>
          </tr>
        <tr>
          <td width="55"><div align="left"><?php echo _("Password:");
		  echo addHidden('js_autodetect_results', SMPREF_JS_OFF) . $rcptaddress . addHidden('just_logged_in', '1'); ?></div></td>
          <td height="25" colspan="2"><div align="left"><?php echo addPwField($password_form_name);?></div></td>
          </tr>
        <tr>
          <td width="55" height="47"><img src="/images/bg/bg_line_other.gif" width="1" height="1"><img src="/images/bg/bg_line_other.gif" width="1" height="1"></td>
          <td width="61"><div align="left"><?php echo addSubmit(_("Login")); ?></div></td>
          <td width="178"><?php 
do_hook('login_form');
?></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
</form>
<?php 
do_hook('login_bottom');
?>
</body>
</html>
