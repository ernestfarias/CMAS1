<?php
error_reporting(0); //hago que este script no me tire ningun error de nada EAF2010

session_start();
	if (!isset($_SESSION['usernametext']) || !isset($_SESSION['password']))
	{
		$logged_in = 0;
		return;
	}	
	else
	{
		// remember, $_SESSION['password'] will be encrypted.

		if(!get_magic_quotes_gpc()) // This gets the current active config of magic quotes. GPC means GET/POST/Cookie.
		{
			$_SESSION['usernametext'] = addslashes($_SESSION['usernametext']);	// addslashes to session usernametext before using in a query.
		$_SESSION['id'] = addslashes($_SESSION['id']);
		}
 
		$pass = "SELECT password, email  FROM usuarios WHERE email = '".$_SESSION['usernametext']."'";
		$result = mysql_query($pass);
		$num_row = mysql_fetch_row($result);

		If (!($num_row))
		{
			$logged_in = 0;
			unset($_SESSION['usernametext']);
			unset($_SESSION['password']);
			unset($_SESSION['id']);
			// kill incorrect session variables.
		}

		$db_pass = mysql_fetch_array($result);

		/* now we have encrypted pass from DB in 
		$db_pass['password'], stripslashes() just incase: */

		$db_pass['password'] = stripslashes($num_row[0]);
		$_SESSION['password'] = stripslashes($_SESSION['password']);

		//compare:

		if($_SESSION['password'] == $db_pass['password'])
		{ 
			// valid password for usernametext
			$logged_in = 1; // they have correct info session Variables.
			$_SESSION['id'] =stripslashes($num_row[1]);
		}
		else
		{
			$logged_in = 0;
			
			unset($_SESSION['usernametext']);
			unset($_SESSION['password']);
			unset($_SESSION['id']);
			// kill incorrect session variables.
		}
	}

	// clean up
	unset($db_pass['password']);

	$_SESSION['usernametext'] = stripslashes($_SESSION['usernametext']);
	$_SESSION['id'] = stripslashes($_SESSION['id']);

?>

