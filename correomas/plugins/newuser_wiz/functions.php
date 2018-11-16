<?php
// include compatibility plugin
if (defined('SM_PATH'))
   include_once(SM_PATH . 'plugins/compatibility/functions.php');
else if (file_exists('../plugins/compatibility/functions.php'))
   include_once('../plugins/compatibility/functions.php');
else if (file_exists('./plugins/compatibility/functions.php'))
   include_once('./plugins/compatibility/functions.php');

#This function checks to see if they already have name AND email set, and prints out the form otherwise...
function newuser_wiz_show_form_do($compose_call=false) {
	global $org_title;
	global $org_logo;
        global $username, $data_dir;
	compatibility_sqextractGlobalVar('org_title');
	compatibility_sqextractGlobalVar('org_logo');

	$full_name = getPref($data_dir, $username, 'full_name');
	$email_address = getPref($data_dir, $username, 'email_address');

	if (! $full_name || !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$",$email_address)) {
	   if ($compose_call) {
              echo ">\n";
              echo "</form>\n";
	   }

		bindtextdomain('newuser_wiz', SM_PATH . 'locale');
		textdomain('newuser_wiz');
 		echo "<center><img src=\"$org_logo\"></center>\n";
		echo "<center>" . _("Welcome to") . " $org_title!</center><br>\n";
		echo "<center>" . _("Since it appears as though you're new to this system, please fill in the following information.") . "</center><br>\n";
 		echo "<form method=\"POST\" action=\"../plugins/newuser_wiz/wiz_submit.php\">\n";
		echo "<center>" . _("Full Name:") . " <input name=\"new_full_name\" type=\"text\" size=\"50\" value=\"$full_name\"></center><br>\n";
		echo "<center>" . _("Email Address:") . " <input name=\"new_email_address\" type=\"text\" size=\"50\" value=\"$email_address\"></center><br>\n";
//		echo "<center><a href=\"../plugins/change_passwd/options.php\">" . _("Change your Password") . "</a></center><br>\n";
		echo "<center><input type=\"submit\" value=\"" . _("Submit") . "\"></center><br>\n";
 		echo "</body></html>\n";
		bindtextdomain('squirrelmail', SM_PATH . 'locale');
		textdomain('squirrelmail');
      exit;
	}
}

// works around users being able to compose and send messages before submitting
// name and address
function newuser_wiz_compose_redirect_do() {
   newuser_wiz_show_form_do(true);
}
?>
