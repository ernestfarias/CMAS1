<?php


   //
   // copied from SquirrelMail core 1.5.2cvs 2005/05/04
   // as such, this version of the compatibility plugin
   // has the same PHP requirement of 4.1.0
   //



if (!function_exists('check_sm_version'))
{
function check_sm_version($a = 0, $b = 0, $c = 0)
{
    global $SQM_INTERNAL_VERSION;
    if ( !isset($SQM_INTERNAL_VERSION) ||
         $SQM_INTERNAL_VERSION[0] < $a ||
         ( $SQM_INTERNAL_VERSION[0] == $a &&
           $SQM_INTERNAL_VERSION[1] < $b) ||
         ( $SQM_INTERNAL_VERSION[0] == $a &&
           $SQM_INTERNAL_VERSION[1] == $b &&
           $SQM_INTERNAL_VERSION[2] < $c ) ) {
        return FALSE;
    }
    return TRUE;
}
}



if (!function_exists('check_php_version'))
{
function check_php_version ($a = '0', $b = '0', $c = '0')
{
    return version_compare ( PHP_VERSION, "$a.$b.$c", 'ge' );
}
}



if (!function_exists('sqsession_register'))
{
function sqsession_register ($var, $name) {

    sqsession_is_active();

    $_SESSION["$name"] = $var;

    session_register("$name");
}
}



if (!function_exists('sqsession_unregister'))
{
function sqsession_unregister ($name) {

    sqsession_is_active();

    unset($_SESSION[$name]);

    session_unregister("$name");
}
}



if (!function_exists('sqsession_is_active'))
{
function sqsession_is_active() {
    $sessid = session_id();
    if ( empty( $sessid ) ) {
        sqsession_start();
    }
}
}



if (!function_exists('sqsession_start'))
{
function sqsession_start() {
    global $PHP_SELF;

    $dirs = array('|src/.*|', '|plugins/.*|', '|functions/.*|');
    $repl = array('', '', '');
    $base_uri = preg_replace($dirs, $repl, $PHP_SELF);

    session_start();
    $sessid = session_id();
    // session_starts sets the sessionid cookie buth without the httponly var
    // setting the cookie again sets the httponly cookie attribute
    sqsetcookie(session_name(),$sessid,false,$base_uri);
}
}



if (!function_exists('sqsetcookie'))
{
function sqsetcookie($sName,$sValue,$iExpire=false,$sPath="",$sDomain="",$bSecure=false,$bHttpOnly=true) {
    $sHeader = "Set-Cookie: $sName=$sValue";
    if ($sPath) {
        $sHeader .= "; Path=\"$sPath\"";
    }
    if ($iExpire !==false) {
        $sHeader .= "; Max-Age=$iExpire";
    }
    if ($sPath) {
        $sHeader .= "; Path=$sPath";
    }
    if ($sDomain) {
        $sHeader .= "; Domain=$sDomain";
    }
    if ($bSecure) {
        $sHeader .= "; Secure";
    }
    if ($bHttpOnly) {
        $sHeader .= "; HttpOnly";
    }
    $sHeader .= "; Version=1";

    header($sHeader);
}
}



if (!function_exists('sqsession_is_registered'))
{
function sqsession_is_registered ($name) {
    $test_name = &$name;
    $result = false;

    if (isset($_SESSION[$test_name])) {
        $result = true;
    }

    return $result;
}
}



if (!defined('SQ_INORDER')) define('SQ_INORDER',0);
if (!defined('SQ_GET')) define('SQ_GET',1);
if (!defined('SQ_POST')) define('SQ_POST',2);
if (!defined('SQ_SESSION')) define('SQ_SESSION',3);
if (!defined('SQ_COOKIE')) define('SQ_COOKIE',4);
if (!defined('SQ_SERVER')) define('SQ_SERVER',5);
if (!defined('SQ_FORM')) define('SQ_FORM',6);
if (!function_exists('sqgetGlobalVar'))
{
function sqgetGlobalVar($name, &$value, $search = SQ_INORDER) {

    /* NOTE: DO NOT enclose the constants in the switch
       statement with quotes. They are constant values,
       enclosing them in quotes will cause them to evaluate
       as strings. */
    switch ($search) {
        /* we want the default case to be first here,
           so that if a valid value isn't specified,
           all three arrays will be searched. */
      default:
      case SQ_INORDER: // check session, post, get
      case SQ_SESSION:
        if( isset($_SESSION[$name]) ) {
            $value = $_SESSION[$name];
            return TRUE;
        } elseif ( $search == SQ_SESSION ) {
            break;
        }
      case SQ_FORM:   // check post, get
      case SQ_POST:
        if( isset($_POST[$name]) ) {
            $value = $_POST[$name];
            return TRUE;
        } elseif ( $search == SQ_POST ) {
          break;
        }
      case SQ_GET:
        if ( isset($_GET[$name]) ) {
            $value = $_GET[$name];
            return TRUE;
        }
        /* NO IF HERE. FOR SQ_INORDER CASE, EXIT after GET */
        break;
      case SQ_COOKIE:
        if ( isset($_COOKIE[$name]) ) {
            $value = $_COOKIE[$name];
            return TRUE;
        }
        break;
      case SQ_SERVER:
        if ( isset($_SERVER[$name]) ) {
            $value = $_SERVER[$name];
            return TRUE;
        }
        break;
    }
    /* Nothing found, return FALSE */
    return FALSE;
}
}



//
// actually from functions/plugin.php
// since 1.5.1cvs on 2005/7/14
//
if (!function_exists('is_plugin_enabled'))
{
/**
 * Check if plugin is enabled
 * @param string $plugin_name plugin name
 * @since 1.5.1
 * @return boolean
 */
function is_plugin_enabled($plugin_name) {
  global $plugins;

  if (! isset($plugins) || ! is_array($plugins) || empty($plugins))
    return false;

  if ( in_array($plugin_name,$plugins) ) {
    return true;
  } else {
    return false;
  }
}
}



//
// actually from functions/prefs.php
// since 1.5.1cvs on 2004/??
//
if (!function_exists('checkForJavascript'))
{
function checkForJavascript($reset = FALSE) {
  global $data_dir, $username, $javascript_on, $javascript_setting;

  if ( !$reset && sqGetGlobalVar('javascript_on', $javascript_on, SQ_SESSION) )
    return $javascript_on;

  if ( $reset || !isset($javascript_setting) )
    $javascript_setting = getPref($data_dir, $username, 'javascript_setting', SMPREF_JS_AUTODETECT);

  if ( !sqGetGlobalVar('new_js_autodetect_results', $js_autodetect_results) &&
       !sqGetGlobalVar('js_autodetect_results', $js_autodetect_results) )
    $js_autodetect_results = SMPREF_JS_OFF;

  if ( $javascript_setting == SMPREF_JS_AUTODETECT )
    $javascript_on = $js_autodetect_results;
  else
    $javascript_on = $javascript_setting;

  sqsession_register($javascript_on, 'javascript_on');
  return $javascript_on;
}
}



?>
