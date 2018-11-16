<?php
error_reporting(0);
	require 'db_connect.php';	// database connect script.

	if ($logged_in == 0)
	{
		die('no se ha iniciado como usuario registrado');
	}

	unset($_SESSION['username']);
	unset($_SESSION['password']);
	// kill session variables
	$_SESSION = array(); // reset session array
	session_destroy();   // destroy session.
	header('Location: index.php');	// redirect them to anywhere you like.
?>
