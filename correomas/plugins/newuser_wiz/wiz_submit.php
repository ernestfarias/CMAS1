<?php

chdir('..');
define('SM_PATH','../');

// include compatibility plugin
//
if (defined('SM_PATH'))
   include_once(SM_PATH . 'plugins/compatibility/functions.php');
else if (file_exists('../plugins/compatibility/functions.php'))
    include_once('../plugins/compatibility/functions.php');
else if (file_exists('./plugins/compatibility/functions.php'))
   include_once('./plugins/compatibility/functions.php');

if (file_exists(SM_PATH . 'include/validate.php'))
   include_once(SM_PATH . 'include/validate.php');
else if (file_exists(SM_PATH . 'src/validate.php'))
   include_once(SM_PATH . 'src/validate.php');

compatibility_sqextractGlobalVar('new_full_name');
compatibility_sqextractGlobalVar('new_email_address');

// if new vars set, write to prefs
if ( isset($new_full_name) ) {
	setPref($data_dir, $username, 'full_name', $new_full_name);
}

if ( eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$",$new_email_address) ) {
	setPref($data_dir, $username, 'email_address', $new_email_address);
}

// redirect right frame to main page
header('Location: ' . SM_PATH . '../src/right_main.php');

?>
