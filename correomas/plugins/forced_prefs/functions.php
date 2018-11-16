<?php
/**
 * plugins/forced_prefs/functions.php -- Functions used by plugin
 *
 * SquirrelMail Forced Prefs Plugin
 * Copyright (C) 2004-2006 Tomas Kuliavas <tokul@users.sourceforge.net>
 * This program is licensed under GPL. See COPYING for details
 *
 * @package sm-plugins
 * @subpackage forced_prefs
 * @version $Id: functions.php,v 1.12 2006/04/18 09:25:06 tokul Exp $
 */

/**
 * make sure SM_PATH is defined
 * @ignore
 */
if (!defined('SM_PATH')) {
    define('SM_PATH','../../');
}

/* globalize configuration vars */
global $fp_added_settings, $fp_forced_settings, $fp_disabled_hooks,
    $fp_removed_optpage_urls, $fp_debug;

// load default config
if (file_exists(SM_PATH . 'plugins/forced_prefs/config_default.php')) {
    include_once(SM_PATH . 'plugins/forced_prefs/config_default.php');
} else {
    // default config file was removed
    $fp_added_settings=array();
    $fp_forced_settings=array();
    $fp_disabled_hooks=array();
    $fp_removed_optpage_urls=array();
    $fp_debug=false;
}

// load site config
if (file_exists(SM_PATH . 'config/forced_prefs_config.php')) {
    include_once(SM_PATH . 'config/forced_prefs_config.php');
} elseif (file_exists(SM_PATH . 'plugins/forced_prefs/config.php')) {
    include_once(SM_PATH . 'plugins/forced_prefs/config.php');
}

// Function is available only in squirrelmail 1.4.1+
if (! function_exists('sm_print_r')) {
    $fp_debug=false;
}

/**
 * Sets forced and added settings during login
 * @since 1.0
 */
function set_forced_prefs() {
    global $username, $data_dir;
    global $fp_added_settings, $fp_forced_settings;

    foreach ($fp_added_settings as $pref => $value) {
        if (getPref($data_dir,$username,$pref) == '') {
            setPref($data_dir,$username,$pref,$value);
        }
    }

    foreach ($fp_forced_settings as $pref => $value) {
        setPref($data_dir,$username,$pref,$value);
    }
}

/**
 * Removes forced settings from option pages
 * @since 1.1
 */
function fp_filter_optdata_internal() {
    global $optpage_data, $fp_debug;

    if($fp_debug) {
        sm_print_r($optpage_data);
    }

    // filter optpage_data values
    foreach ($optpage_data['vals'] as $key => $value) {
        $new_optpage_data['vals'][$key]=array_filter($value,'fp_filter_optdata_callback');
    }

    // add optpage_data extras (used in display hook)
    if (isset($optpage_data['xtra']))
        $new_optpage_data['xtra']=$optpage_data['xtra'];

    // add optpage_data groups
    // TODO: fix groups that contain only hidden inputs
    foreach ($optpage_data['grps'] as $key => $value) {
        if (! isset($new_optpage_data['vals'][$key]) ||
            $new_optpage_data['vals'][$key]!=array())
            $new_optpage_data['grps'][$key]=$optpage_data['grps'][$key];
    }

    // override old optpage data with new one
    $optpage_data=$new_optpage_data;

    if($fp_debug) {
        sm_print_r($optpage_data);
    }
}

/**
 * callback function for array_filter call in fp_filter_optdata_internal.
 *
 * Removes forced preferences entries from optpage_data array
 * @param array $key squirrelmail option from optpage_data array.
 * @return bool true if setting is not enforced
 * @since 1.1
 */
function fp_filter_optdata_callback($key) {
    global $fp_forced_settings;

    // php 4.1.0+ code
    if ( function_exists('array_key_exists')) {
        return (! array_key_exists($key['name'],$fp_forced_settings)); 
    // php 4.0.6 code (function is not present in 4.1.x)
    } elseif ( function_exists('key_exists')) {
        return (! key_exists($key['name'],$fp_forced_settings));
    } else {
        return true;
    }
}

/**
 * removes plugin hooks
 * @param array $orig_hooks
 * @return array filtered hooks
 * @since 1.1
 */
function fp_filter_hooks($orig_hooks) {
    foreach ($orig_hooks as $hook => $plugin) {
        $filtered_hooks[$hook]=array_filter($plugin,'fp_filter_hooks_callback');
    }
    return $filtered_hooks;
}

/**
 * Filters hooks array
 * @param string $plugin_function plugin function name from hooks array
 * @return boolean true if function name is not present in $fp_disabled_hooks
 * @since 1.1
 */
function fp_filter_hooks_callback($plugin_function) {
    global $fp_disabled_hooks;

    return (! in_array($plugin_function,$fp_disabled_hooks));
}

/**
 * Overrides settings if user manages to get to option form
 * @since 1.1
 */
function fp_override_save_internal() {
    global $fp_forced_settings;

    foreach ($fp_forced_settings as $pref => $value) {
        setPref($data_dir,$username,$pref,$value);
    }
}

/**
 * Internal function to filter optpage blocks
 * @since 1.2
 */
function fp_filter_optpage_blocks() {
    global $optpage_blocks, $fp_removed_optpage_urls, $fp_debug;

    if ($fp_debug) {
        /**
         * I don't have plans to translate debugging strings.
         * Plugin must use as little code as possible
         * Please don't file bugs about bad internationalization.
         */
        echo '<hr /><h2 align="left">Original blocks</h2>';
        sm_print_r($optpage_blocks);
    }
    $filtered_optpage_blocks = array();
    foreach ($optpage_blocks as $key => $block) {
        if (! fp_check_url($block['url'],$fp_removed_optpage_urls)) {
            array_push($filtered_optpage_blocks,$block);
        }
    }
    if ($fp_debug) {
        echo '<hr /><h2 align="left">Filtered blocks</h2>';
        sm_print_r($filtered_optpage_blocks);
    }
    $optpage_blocks = $filtered_optpage_blocks;
}

/**
 * Function checks if url matches regural expression
 * 
 * It allows to use array of patterns with php eregi. In order to reduce 
 * regexp checks, url is first checked with simple in_array() test.
 * @param string $url address that should be checked
 * @param array $fp_removed_optpage_urls array with regural expressions 
 *  for PHP eregi()
 * @return boolean true if url matches pattern.
 * @since 1.2
 */
function fp_check_url($url, $fp_removed_optpage_urls) {
    /* first do simple array key check. Switch to regexp only when URL does not match */
    if (in_array($url,$fp_removed_optpage_urls)) return true;

    foreach ($fp_removed_optpage_urls as $url_regexp) {
        /* suppress all regexp warning messages on invalid regexp syntax */
        if (@eregi($url_regexp, $url)) return true;
    }
    return false;
}
?>