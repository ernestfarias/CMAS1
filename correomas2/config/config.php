<?php

/**
 * SquirrelMail Configuration File
 * Created using the configure script, conf.pl
 */

global $version;
$config_version = '1.4.0';
$config_use_color = 1;
 

$org_name      = "comermas.com.ar";
/** $org_logo      = SM_PATH . '/logowebmail.jpg'; */
$org_logo      = 'http://www.comermas.com.ar/correomas/images/logowebmail.jpg';
$org_logo_width  = '';
$org_logo_height = '';
$org_title     = "Webmail - comermas.com.ar";
$signout_page  = '';
$frame_top     = '_top';
$provider_uri     = 'http://www.comermas.com.ar/';
$provider_name     = 'comermas.com.ar';

$motd = "";

$squirrelmail_default_language = 'es_ES';

$domain                 = 'comermas.com.ar';
$imapServerAddress      = 'localhost';
$imapPort               = 143;
$useSendmail            = false;
$smtpServerAddress      = 'localhost';
$smtpPort               = 25;
$sendmail_path          = '/usr/sbin/sendmail';
$pop_before_smtp        = false;
$imap_server_type       = 'courier';
$invert_time            = false;
$optional_delimiter     = '.';

$default_folder_prefix          = 'INBOX.';
$trash_folder                   = 'Trash';
$sent_folder                    = 'Sent';
$draft_folder                   = 'Drafts';
$default_move_to_trash          = true;
$default_move_to_sent           = true;
$default_save_as_draft          = true;
$show_prefix_option             = false;
$list_special_folders_first     = true;
$use_special_folder_color       = true;
$auto_expunge                   = true;
$default_sub_of_inbox           = false;
$show_contain_subfolders_option = false;
$default_unseen_notify          = 2;
$default_unseen_type            = 1;
$auto_create_special            = true;
$delete_folder                  = true;
$noselect_fix_enable            = false;

$default_charset          = 'iso-8859-1';
$data_dir                 = SM_PATH . 'data/';
$attachment_dir           = $data_dir;
$dir_hash_level           = 0;
$default_left_size        = '150';
$force_username_lowercase = false;
$default_use_priority     = true;
$hide_sm_attributions     = false;
$default_use_mdn          = true;
$edit_identity            = true;
$edit_name                = true;
$allow_thread_sort        = false;
$allow_server_sort        = false;
$allow_charset_search     = true;
$uid_support              = true;

global $plugins;
 	 $plugins[0] = 'view_as_html';
 	$plugins[1] = 'abook_take';
	$plugins[2] = 'newmail';				
	$plugins[3] = 'filters';
	$plugins[4] = 'translate';
	$plugins[5] = 'message_details';
 	$plugins[6] = 'addgraphics';
 	$plugins[7] = 'autocomplete';
 	$plugins[8] = 'emoticons';
 	$plugins[9] = 'compatibility';
	$plugins[10] = 'download_all';
	$plugins[11] = 'folder_sizes';
	$plugins[12] = 'disk_quota';
	$plugins[13] = 'html_mail';
	$plugins[14] = 'change_password';
	 
	 



$theme_css = '';
$theme_default = 0;
$theme[0]['PATH'] = SM_PATH . 'themes/dark_grey_theme.php';
$theme[0]['NAME'] = 'Dark Grey';

$default_use_javascript_addr_book = false;
$addrbook_dsn = '';
$addrbook_table = 'address';

$prefs_dsn = '';
$prefs_table = 'userprefs';
$prefs_user_field = 'user';
$prefs_key_field = 'prefkey';
$prefs_val_field = 'prefval';
$no_list_for_subscribe = false;
$smtp_auth_mech = 'none';
$imap_auth_mech = 'login';
$use_imap_tls = false;
$use_smtp_tls = false;
$session_name = 'SQMSESSID';

@include SM_PATH . 'config/config_local.php';

/**
 * Make sure there are no characters after the PHP closing
 * tag below (including newline characters and whitespace).
 * Otherwise, that character will cause the headers to be
 * sent and regular output to begin, which will majorly screw
 * things up when we try to send more headers later.
 */
?>