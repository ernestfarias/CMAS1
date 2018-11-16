<?php
/**
 *
 * Ask User Info plugin 1.0
 *
 * When user logs in and doesn't have email_address or full_name set,
 * direct the user automatically to the relevant options page.
 *
 * Copyright (c) 2003 Thijs Kinkhorst
 * Licensed under the GNU GPL. For full terms see the file COPYING.
 * 
 * $Id$
 *
 */

function squirrelmail_plugin_init_askuserinfo()
{
    global $squirrelmail_plugin_hooks;

    $squirrelmail_plugin_hooks['webmail_top']['askuserinfo'] = 'askuserinfo_check';
    $squirrelmail_plugin_hooks['optpage_loadhook_personal']['askuserinfo'] = 'askuserinfo_message';
}

function askuserinfo_check()
{
    global $data_dir, $username, $right_frame;

    $email_address = getPref($data_dir, $username, 'email_address');
    $full_name     = getPref($data_dir, $username, 'full_name');

    if( trim($email_address) == '' || trim($full_name) == '' )
    {
	$right_frame = 'options.php?optpage=personal&askinfo=yes';
    }
}

function askuserinfo_message()
{
    global $color;

    sqgetGlobalVar('askinfo', $askinfo, SQ_GET);

    if(isset($askinfo) && $askinfo)
    {
        echo '<p align="center"><b><font color="' . $color[2] .
             '">NOTE: You need to supply your full name and email address.'.
             '</font></b></p>';
    }
}

?>
