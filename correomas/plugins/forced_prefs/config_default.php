<?php
/**
 * plugins/forced_prefs/config_default.php -- Default plugin configuration
 *
 * SquirrelMail Forced Prefs Plugin
 * Copyright (C) 2004-2006 Tomas Kuliavas <tokul@users.sourceforge.net>
 * This program is licensed under GPL. See COPYING for details
 *
 * @package sm-plugins
 * @subpackage forced_prefs
 * @version $Id: config_default.php,v 1.4 2006/04/18 09:25:06 tokul Exp $
 */

/**
 * lists settings that should be added, if not present in user's prefs
 * array should use setting names as array keys and setting values as
 * key values.
 *
 * @global array $fp_added_settings
 * @since 1.0
 */
$fp_added_settings=array();

/**
 * lists settings that should be set during login. Enforced settings
 * are removed from option pages, if they use SquirrelMail $optdata
 * array. array should use setting names as array keys and setting
 * values as key values.
 *
 * @global array $fp_forced_settings
 * @since 1.0
 */
$fp_forced_settings=array();

/**
 * lists functions that should be removed from enabled hooks
 *
 * WARNING. Use with caution. Disable only function calls that control
 * option display and saving. If you have problems with plugins - make
 * sure that problems can be reproduced without forced_prefs plugin.
 * @global array $fp_disabled_hooks
 * @since 1.1
 */
$fp_disabled_hooks=array();

/**
 * Array with urls that should be removed from option blocks. Other option block 
 * array keys can't be used because they contain translatable data and strings
 * are not static.
 * 
 * This option can be used to strip standard SquirrelMail option pages that
 * don't use plugin hooks. You can use regular expression instead of URL. Plugin 
 * uses case insensitive POSIX regexps (http://www.php.net/eregi). If you make 
 * regexp error, warning message won't be displayed and option block is not removed.
 * @global array $fp_removed_optpage_urls
 * @since 1.2
 */
$fp_removed_optpage_urls=array();

/**
 * Displays debug information 
 *
 * calls sm_print_r() function in order to display processed data
 * If set to true, requires SquirrelMail 1.4.1 or better. Interface will revert
 * to false, if sm_print_r() function is not available.
 *
 * WARNING: don't enable option in production environment.
 * @global boolean $fp_debug
 * @since 1.2
 */
$fp_debug=false;
?>