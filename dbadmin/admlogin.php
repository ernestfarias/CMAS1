<?php


	require 'db_connect.php';
	require_once('../includes/date.php');
	require_once('../includes/validador.php'); 
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

<title>ComerMas.com.ar - Login Managers</title>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>

<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 

<script language="JavaScript" type="text/JavaScript">
var w=225;
var h=315;
var mw=(screen.width)?(screen.width-w)/2:100; //centro el form
var mh=(screen.height)?(screen.height-h)/2:100;
this.resizeTo(w,h-40);
this.moveTo(mw,mh);
 </script>


</head>


<?php
 		$log = "si";
		 
	if (isset($_POST['submit']))
	{	// if form has been submitted
		/* check they filled in what they were supposed to and authenticate */
  
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
		ValidarDatos(($_POST['uname']));
			$_POST['uname'] = addslashes($_POST['uname']);
		}
ValidarDatos(($_POST['uname']));
		$check = "SELECT id,email, password, last_login, last_logintime FROM usuarios WHERE email = '".$_POST['uname']."'";
		$result = mysql_query($check);
		$num_rows = mysql_num_rows($result);
	  
		if (!($num_rows))		
		{
//			die('El usuario no existe en nuestra base de datos');
			$log = "no";
			$msg  = "<br>El usuario no existe en nuestra base de datos<br>";
			$_SESSION['msg'] = $msg;   
		} else {

		$info = mysql_fetch_Array($result);
	
		// check passwords match

		$_POST['passwd'] = stripslashes($_POST['passwd']);
		$info['password'] = stripslashes($info['password']);
//		$_POST['passwd'] = md5($_POST['passwd']);
 		ValidarDatos($_POST['passwd']);
		$_POST['passwd'] = ($_POST['passwd']);
 
		if ($_POST['passwd'] != $info['password'])
		{
		//die('Constraseña incorrecta, reintente otro vez');
 		$log = "no";
        $msg = "<br>Constraseña incorrecta, reintente otro vez<br>";
		$_SESSION['msg'] = $msg; 
 
		}
		
		}
 
	    if ($log == "si") 
		{
		$date = date('m d, Y');
		$time = datear('H:i:s');
	    $_SESSION['lastld']  = $info ['last_login'];
	    $_SESSION['lastlt']  = $info ['last_logintime'];
		$update_login = mysql_query("UPDATE usuarios SET last_login = '$date' WHERE email = '".$_POST['uname']."'");
		$update_login = mysql_query("UPDATE usuarios SET last_logintime = '$time' WHERE email = '".$_POST['uname']."'");
ValidarDatos(stripslashes($_POST['uname']));
		$_POST['uname'] =  (stripslashes($_POST['uname']));
		$_SESSION['usernametext'] = $_POST['uname'];
		$_SESSION['password'] = $_POST['passwd'];
		$_SESSION['userid'] =  $info['id'];
		}
?>
<? 
 

	if ($log == "si")
	   {
		   $check = "SELECT id,permiso FROM usuarios WHERE email = '".$_POST['uname']."'";
			$result = mysql_query($check);
			$row = @mysql_fetch_array($result);  
			$permiso = $row["permiso"];
			$idu=stripslashes($row["id"]);
			$_SESSION['permiso'] = $permiso;
			
				if (($permiso == "todocomermas") or ($permiso == "usercomermas")) {
					$submit = "adm.php";
				} else {
 				//$submit = "admusr.php";
				}
				
				if (($permiso == "concurso")  or ($permiso == "usuario")) {
					$submit = "../registra/regusr_update.php?id=".$idu;
				}
				echo '<form name="frmpaso" action="'.$submit.'" method="post"></form><BODY onLoad=document.frmpaso.submit()></BODY>';
				
			
		} else {
			 echo '<form name="frmpaso" action="admlogin.php" method="post">					   	
			    	</form>
					<BODY onLoad=document.frmpaso.submit()>
					</BODY>';
		}
   

?>
<?

	}
	else
	{	// if form hasn't been submitted

?>
<!-- This is the first screen when a user sees when he is not logged in -->
<body bgcolor="AE5959" leftmargin="0" topmargin="0">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <?	if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"])){
	$msg = $_SESSION['msg']; }?>
   <div align="center">
  <br>
       <table align="center" width="180" height="139" border="0" cellpadding="0" cellspacing="0">
      <tr bgcolor="#851549">
        <td height="22" colspan="2">
          <div align="center" class="BlancoBold12"><b> INGRESE SUS DATOS </b></div></td>
      </tr>
      <tr>
        <td height="3" colspan="2"><img src="../marcos/blanco/blanco.gif" width="100%" height="1"></td>
      </tr>
      <tr>
        <td height="22" colspan="2">
          <div align="center"><span class="BlancoBold12"><b>Usuario</b></span>   <span class="Blanco10">(correo)</span><br>
        </div></td>
      </tr>
      <tr>
        <td height="10" colspan="2" bgcolor="#B36464">
          <div align="center"><b>
            <input name="uname" type="text" size="25" maxlength="50">
</b></div></td>
      </tr>
      <tr>
        <td height="28" colspan="2">
          <div align="center" class="Blanco12"><b>Password</b></div></td>
      </tr>
      <tr bgcolor="#B36464">
        <td height="19" colspan="2"><div align="center">
          <input name="passwd" type="password" size="25" maxlength="50">
</div></td>
      </tr>
      <tr>
        <td height="19" colspan="2" bgcolor="#AE5959"><div align="center"><span class="Naranja10"><strong>
            <?
	echo $msg;
 //	    <input type="submit" name="submit" value="INGRESAR" style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#000000;color:white" >
	?>
        </strong></span> </div></td>
      </tr>
      <tr>
        <td height="1" colspan="2"><div align="center"><img src="../marcos/blanco/blanco.gif" width="100%" height="1"><span class="Naranja14"><strong>
        </strong></span> </div></td>
      </tr>
      <tr>
        <td width="126" height="15" valign="top" bgcolor="#B36464" >          <div align="left">            <a href="admlost.php" class="Naranja10"> Olvide mi contraseña.</a>		  </div></td>
        <td width="54" valign="top" ><div align="right">
          <input name="submit" type="submit"  style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  value="Ingresar">
        </div></td>
      </tr>
    </table>
   
</form>

<?php
 }
?>

 
</body>
</html>

