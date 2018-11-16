<?php
/*
 * Newuser-Wiz Plugin
 * by Matt Sturtz <squirrelmail@matthouse.com>
 * modifications by David Minor <dave@dminor.com>
 * Angelo Bertolli <angelo.bertolli@gmail.com>
 * (c) 2002-2005 (GNU GPL - see ../../COPYING)
 *
 * This plug is intended to prompt new users to enter their full name and email address.
 * On our system, the default is <login> at ontheside.net which will work for all
 * users, but usually isn't want they really want.
 *
 * I'm tired of telling people the same speach, which usually goes something like
 * "Once you get logged in, click 'options' and 'Personal Information', and set
 * your full name and email address.  No, you don't need to worry about anything
 * else on that page.  OK, now change your password."
 *
 * This plug is the result.  I hope it works for you, as I'm not a PHP guru.
 * Any questions, problems, suggestions, please email me.
 */


#This function is called by SquirrelMail when it runs, allowing us to set up hooks...
function squirrelmail_plugin_init_newuser_wiz() {
	global $squirrelmail_plugin_hooks;

	# Call us in right_main_after_header
	$squirrelmail_plugin_hooks['right_main_after_header']['newuser_wiz'] = 'newuser_wiz_show_form';
	$squirrelmail_plugin_hooks['compose_form']['newuser_wiz'] = 'newuser_wiz_compose_redirect';
}

#This function checks to see if they already have name AND email set, and prints out the form otherwise...
function newuser_wiz_show_form() {

   if (defined('SM_PATH'))
      include_once(SM_PATH . 'plugins/newuser_wiz/functions.php');
   else
      include_once('../plugins/newuser_wiz/functions.php');

   newuser_wiz_show_form_do();

}


#This function checks to see if they already have name AND email set, and redirects to the form if not ...
function newuser_wiz_compose_redirect() {

   if (defined('SM_PATH'))
      include_once(SM_PATH . 'plugins/newuser_wiz/functions.php');
   else
      include_once('../plugins/newuser_wiz/functions.php');

   newuser_wiz_compose_redirect_do();

}

function newuser_wiz_version() {

   return '1.3.2';

}
