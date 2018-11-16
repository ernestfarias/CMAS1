<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<?

require 'db_connect.php';
if ($logged_in == 0) {
echo '<span class="Blanco14">Ud no ha iniciado seccion, esta area esta restringida para usuarios registrados. <p> <a href="index.php">Click aqui</a> e inicie su seccion.</span>';
$_SESSION = array();
session_destroy();
die();
}
?>