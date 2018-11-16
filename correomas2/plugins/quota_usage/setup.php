<?php

/**
  * SquirrelMail Quota Usage Plugin
  * Copyright (c) 2001, 2002, 2006  Bill Shupp <hostmaster@shupp.org>
  * Copyright (c) 2003, 2004 Paul Lesneiwski <pdontthink@angrynerds.com>
  * Licensed under the GNU GPL. For full terms see the file COPYING.
  *
  */



/**
  * Register this plugin with SquirrelMail
  *
  */
function squirrelmail_plugin_init_quota_usage() 
{

   global $squirrelmail_plugin_hooks;
   $squirrelmail_plugin_hooks["left_main_before"]["quota_usage"] = "display_quota_usage_left";
   $squirrelmail_plugin_hooks['right_main_after_header']['quota_usage'] = 'display_quota_usage_MOTD';

}



if (!defined('SM_PATH'))
   define('SM_PATH', '../../');



/**
  * Display quota information above foler list
  *
  */
function display_quota_usage_left() 
{

   include_once(SM_PATH . 'plugins/quota_usage/functions.php');
   display_quota_usage_left_do();

}



/**
  * Display quota warnings as MOTD
  *
  */
function display_quota_usage_MOTD() 
{

   include_once(SM_PATH . 'plugins/quota_usage/functions.php');
   display_quota_usage_MOTD_do();

}



/**
  * Returns version info about this plugin
  *
  */
function quota_usage_version() 
{

   return '1.3.1';
 
}



?>
