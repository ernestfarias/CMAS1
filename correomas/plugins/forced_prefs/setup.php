<?php
/**
 * plugins/forced_prefs/setup.php -- Main setup script
 *
 * SquirrelMail Forced Prefs Plugin
 * Copyright (C) 2004-2006 Tomas Kuliavas <tokul@users.sourceforge.net>
 * This program is licensed under GPL. See COPYING for details
 *
 * @package sm-plugins
 * @subpackage forced_prefs
 * @version $Id: setup.php,v 1.13 2006/04/18 09:25:06 tokul Exp $
 */

/**
 * make sure SM_PATH is defined
 * @ignore
 */
if (!defined('SM_PATH')) define('SM_PATH','../');

/**
 * init function
 */
function squirrelmail_plugin_init_forced_prefs() {
    global $squirrelmail_plugin_hooks;

    $squirrelmail_plugin_hooks['login_verified']['forced_prefs'] = 'forced_prefs_set';
    // optpage blocks
    $squirrelmail_plugin_hooks['optpage_register_block']['forced_prefs'] = 'fp_optpage_register_block';
    // optpage_data preference filter
    $squirrelmail_plugin_hooks['optpage_loadhook_display']['forced_prefs'] = 'fp_filter_optdata';
    $squirrelmail_plugin_hooks['optpage_loadhook_personal']['forced_prefs'] = 'fp_filter_optdata';
    $squirrelmail_plugin_hooks['optpage_loadhook_folder']['forced_prefs'] = 'fp_filter_optdata';
    // one more hook for squirrelmail 1.5.1+
    $squirrelmail_plugin_hooks['optpage_loadhook_compose']['forced_prefs'] = 'fp_filter_optdata';
    // what can be done with these two hooks?
    $squirrelmail_plugin_hooks['optpage_loadhook_highlight']['forced_prefs'] = 'fp_filter_optdata';
    $squirrelmail_plugin_hooks['optpage_loadhook_order']['forced_prefs'] = 'fp_filter_optdata';

    // advanced_settings plugin
    $squirrelmail_plugin_hooks['optpage_loadhook_advanced_settings']['forced_prefs'] = 'fp_filter_optdata';

    // override during save
    $squirrelmail_plugin_hooks['option_save']['forced_prefs'] = 'fp_override_save';

    // plugin hooks filter
    include_once(SM_PATH . 'plugins/forced_prefs/functions.php');
    $squirrelmail_plugin_hooks=fp_filter_hooks($squirrelmail_plugin_hooks);
}

/**
 * sets preferences
 * @since 1.0
 */
function forced_prefs_set() {
    include_once(SM_PATH . 'plugins/forced_prefs/functions.php');
    set_forced_prefs();
}

/**
 * calls internal optpage_data filtering functions
 * @since 1.1
 */
function fp_filter_optdata() {
    include_once(SM_PATH . 'plugins/forced_prefs/functions.php');
    fp_filter_optdata_internal();
}

/**
 * calls internal function which overrides enforced settings during save
 * @since 1.1
 */
function fp_override_save() {
    include_once(SM_PATH . 'plugins/forced_prefs/functions.php');
    fp_override_save_internal();
}

/**
 * calls internal function which filters option page blocks
 * @since 1.2
 */
function fp_optpage_register_block() {
    include_once(SM_PATH . 'plugins/forced_prefs/functions.php');
    fp_filter_optpage_blocks();
}

/**
 * shows plugin's version
 * @return string
 */
function forced_prefs_version() {
    return '1.2';
}
?>