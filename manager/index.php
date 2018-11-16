<?php  session_start();?>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<?php


	//require 'db_connect.php'; eF11
	require_once('../includes/date.php');

	if($logged_in == 1)
	{
		echo	'<span class="Blanco14">ud ya tiene una seccion abierta,<b> '.$_SESSION['usernametext'].'</b> <a href = "logout.php">Click Aqui</a>.</span>';
 
die ();		
	}
?>

 
<html>
<head>
<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>ComerMas.com.ar - Login de Managers</title>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
</head>



<?php
 		$log = "si";
		$msg = "";
	if (isset($_POST['submitio']))
	{	// if form has been submitted
		/* check they filled in what they were supposed to and authenticate */
require 'db_connect.php';
		if(!$_POST['uname'] | !$_POST['passwd'])
		{
	//		die('Ingrese usuario y contraseña.');
			$log = "no";
			$msg = "<br>Ingrese usuario y contraseña.<br>";
			$_SESSION['msg'] = $msg; 			 
		}

		// authenticate.

		if (!get_magic_quotes_gpc())
		{
			$_POST['uname'] = addslashes($_POST['uname']);
		}

		$check = "SELECT usr, password, last_login, last_logintime FROM encargados WHERE usr = '".$_POST['uname']."'";
		$result = mysql_query($check);
		$num_rows = mysql_num_rows($result);
	   
		if (!($num_rows))		
		{
//			die('El usuario no existe en nuestra base de datos');
			$log = "no";
			$msg  = "<br>El usuario no existe en nuestra base de datos<br>";
			$_SESSION['msg'] = $msg;   
		}

		$info = mysql_fetch_Array($result);
	
		// check passwords match

		$_POST['passwd'] = stripslashes($_POST['passwd']);
		$info['password'] = stripslashes($info['password']);
//		$_POST['passwd'] = md5($_POST['passwd']);
		$_POST['passwd'] = ($_POST['passwd']);

		if ($_POST['passwd'] != $info['password'])
		{
		//die('Constraseña incorrecta, reintente otro vez');
 		$log = "no";
        $msg = "<br>Constraseña incorrecta, reintente otro vez<br>";
		$_SESSION['msg'] = $msg; 
 
		}

		/* if we get here usernametext and password are correct, 
		register session variables and set last login time.*/
	if ($log == "si") {
		$date = date('m d, Y');
		$time = datear('H:i:s');
	    $_SESSION['lastld']  = $info ['last_login'];
	    $_SESSION['lastlt']  = $info ['last_logintime'];
		$update_login = mysql_query("UPDATE encargados SET last_login = '$date' WHERE usr = '".$_POST['uname']."'");
		$update_login = mysql_query("UPDATE encargados SET last_logintime = '$time' WHERE usr = '".$_POST['uname']."'");

		$_POST['uname'] = stripslashes($_POST['uname']);
		$_SESSION['usernametext'] = $_POST['uname'];
		 		$_SESSION['password'] = $_POST['passwd'];
		}
?>
<? 
 

	if ($log == "si") {
						echo '<form name="frmpaso" action="adm_datos.php" method="post"></form><BODY onLoad=document.frmpaso.submit()></BODY></HTML>';
						return;
								 				} 
		else {
			 echo '<form name="frmpaso" action="index.php" method="post"></form><BODY onLoad=document.frmpaso.submit()></BODY>';
			 						 }


?>
<?

	}
	else
	{	// if form hasn't been submitted

?>
<body bgcolor="AE5959" leftmargin="0" topmargin="0">
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td width="779" height="90"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="90" background="../banners/topmanager.gif" bgcolor="ae5959"></td>
              </tr>
              <tr>
                <td width="777" bgcolor="#FFFFFF"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="777" height="19" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="AE5959">
        <tr> 
          <td width="20">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="right"> 
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick=""><font color="#FFFFFF"><strong>Mi Lugar</strong></button>
              </div></td>
            </tr>
            <tr>
              <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td height="1"></td>
            </tr>
			 <tr>
			   <td>&nbsp;</td>
		      </tr>
			 <tr>
			   <td height="200" valign="top">   
<!-- This is the first screen when a user sees when he is not logged in -->
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <?	if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"])){
	$msg = $_SESSION['msg']; }?>
  <br>
  <div align="center"> </div>
  <div align="center"><br>
    <table width="31%" height="57" border="0" cellpadding="0" cellspacing="0">
      <tr> 
        <td width="28%" height="22" class="BlancoBold10"> 
          <div align="right">Usuario 
            :</div></td>
        <td width="72%">
          <input name="uname" type="text" size="25" maxlength="50">
        </td>
      </tr>
      <tr> 
        <td height="35" class="BlancoBold10"> 
          <div align="right">Contrase&ntilde;a 
            : </div></td>
        <td> 
          <input name="passwd" type="password" size="25" maxlength="50">
        </td>
      </tr>
    </table>
  
 
    <span class="Naranja14">
    <strong>
    <?
	echo $msg;dd
 //	    <input type="submit" name="submit" value="INGRESAR" style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#000000;color:white" >
	?> 
    </strong></span><br>

    <font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    </font><font color="#000000"> 
    <input type="submit" name="submitio" value="Ingreso" style="" >
    </font><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
    </font></div>
  </form>

<?php
 }
?></td>
		      </tr>
			 <tr>
			   <td><div align="right"><img src="../banners/logo.gif" width="352" height="86"></div></td>
		      </tr>
			 <tr>
			   <td>
			   

			   </td>
		      </tr>
			 <tr>
			   <td></td>
		      </tr>
			 <tr>
              <td>&nbsp;</td>
            </tr>
          </table>            
          </td>
          <td width="20" height="19" align="right"></td>
        </tr>
      </table>
      <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="2"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="24"><? require_once('../includes/bot2.php')?></td>
        </tr>
        <tr> 
          <td height="1"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>



