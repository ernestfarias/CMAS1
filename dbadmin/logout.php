
<?php

	require 'db_connect.php';	// database connect script.

	if ($logged_in == 0)
	{
		die('no se ha iniciado como usuario registrado');
	}

	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['userid']);
	unset($_SESSION['permiso']);
	// kill session variables
	$_SESSION = array(); // reset session array
	session_destroy();   // destroy session.
	header('Location: admlogin.php');	// redirect them to anywhere you like.
?>
