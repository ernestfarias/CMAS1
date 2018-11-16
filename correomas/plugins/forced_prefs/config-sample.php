<?php
/**
 * plugins/forced_prefs/config-sample.php -- Sample configuration
 *
 * SquirrelMail Forced Prefs Plugin
 * Copyright (C) 2004-2006 Tomas Kuliavas <tokul@users.sourceforge.net>
 * This program is licensed under GPL. See COPYING for details
 *
 * plugin needs two variables that provide arrays with added ($fp_added_settings 
 * variable) or enforced ($fp_forced_settings variable) settings.
 *
 * Each variable is set with
 * $variable_name = array(
 *  'sm_user_setting1_name' => 'sm_user_setting1_value',
 *  'sm_user_setting2_name' => 'sm_user_setting2_value'
 * }
 *
 * name => value array pairs are separated with commas.
 */

/**
 * array that allows adding missing values
 */
$fp_added_settings = array(
    'hour_format'   => '1',
    'show_num'      => '20'
);

/**
 * array that allows adding enforced values
 */
$fp_forced_settings = array(
    'show_html_default' => '1'
);
/**
 * array that stores disabled hook function calls
 */
$fp_disabled_hooks = array('fortune_options','abook_take_options','bug_report_options');

/**
 * Array with urls that should be removed from option blocks. Other option block 
 * array keys can't be used because they contain translatable data and strings
 * are not static.
 * 
 * This option can be used to strip standard SquirrelMail option pages that
 * don't use plugin hooks. You can use regular expression instead of URL. Plugin 
 * uses case insensitive POSIX regexps (http://www.php.net/eregi). If you make 
 * regexp error, warning message won't be displayed and option block is not removed.
 */
$fp_removed_optpage_urls=array('options_order.php');

/**
 * Displays debug information
 * (calls sm_print_r() function in order to display processed data)
 * Requires squirrelmail 1.4.1 or newer.
 */
$fp_debug=false;

?>