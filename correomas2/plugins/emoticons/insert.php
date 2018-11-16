
<?PHP
/* This is my php file.
* description goes here.
*/

/* Path for SquirrelMail required files. */
//define('SM_PATHS','../../');

/* SquirrelMail required files. */
 require_once(SM_PATH . 'include/validate.php');
//require_once('../../include/validate.php');


        global $username, $data_dir, $_SERVER, $browser_info;
$username = $_SESSION['username'];
$Type = getPref($data_dir,$username, 'compose_window_type');

// include '../plugins/emoticons/emoticons.php';

if (stristr($_SERVER['SCRIPT_NAME'], "compose.php") and $Type == 'html' and $_SESSION['browser_info']['type'] == 'Explorer' and $_SESSION['browser_info']['version'] >= '5.5' )  {

include '../plugins/emoticons/emoticons.php';

}


?>
