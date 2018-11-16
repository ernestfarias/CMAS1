<? 

if(isset($_POST["email"]) && !empty($_POST["email"])){
	require_once('../includes/catalog.php');	
    require_once('../includes/validador.php'); 
	
	ValidarDatos(addslashes($_POST["email"]));
	$email = addslashes($_POST["email"]);
  
	
 
 
		$users_query = "SELECT * FROM usuarios WHERE email = '$email'"; 
	 	$users_display = @mysql_query($users_query) or die ("");  
		$totalrecords = @mysql_num_rows($users_display); 
		
		
		$row = @mysql_fetch_array($users_display);  
   
		 
		$nombre = $row["nombre"];
		$pass = $row["password"];
		
		
		if ($totalrecords>0) {
		$come = "Se ha enviado la contraseña a su cuenta de correo"	;
		
		
		$de = "info@comermas.com.ar";
		$para = $email;
		$asunto="Informacion : Contraseña";

		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

		$cuerpo = "<html><b>". $nombre." : </b>"."tu contraseña es:".$pass ."<br><i>le recomendamos que al ingresar realice el cambio de la misma</i><br><br><br>Gracias ComerMas </html>"; 
 		mail("$para","$asunto",$cuerpo,$headers."From: ".$de);
		}else{
		$come = "El usuario ". $email." no se encuentra registrado."	;
		
		}
 
}

?>

 




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
</head>

<body>
<form name="frm" action="admlost.php" method="post">
<table align="center" width="180" height="139" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#851549">
    <td height="22" colspan="2">
      <div align="center" class="BlancoBold12"><b> RECUPERAR CONTRASE&Ntilde;A </b></div></td>
  </tr>
  <tr>
    <td height="3" colspan="2"><img src="../marcos/blanco/blanco.gif" width="100%" height="1"></td>
  </tr>
  <tr bgcolor="#AE5959">
    <td height="22" colspan="2">
      <div align="center"><span class="BlancoBold12"><b>Usuario </b> </span> <span class="Blanco10">(correo)</span><br>
    </div></td>
  </tr>
  <tr>
    <td height="10" colspan="2" bgcolor="#B36464">
      <div align="center"><b>
        <input name="email" type="text" id="email" size="25" maxlength="50">
    </b></div></td>
  </tr>
  <tr bgcolor="#AE5959">
    <td colspan="2">
      <div align="center" class="Blanco12"></div>      
    <div align="center" class="Blanco10">
      <table width="100%"  cellspacing="0" cellpadding="2">
        <tr>
          <td><div align="left" class="Blanco10">Especifique el correo con cual se registro en ComerMas y le sera enviada la contrase&ntilde;a por mail. </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr bgcolor="#B36464">
    <td height="19" colspan="2"><div align="center"><span class="Naranja10"><strong><?=$come?>
    </strong></span> </div></td>
  </tr>
  <tr>
    <td height="1" colspan="2"><div align="center"><img src="../marcos/blanco/blanco.gif" width="100%" height="1"><span class="Naranja14"><strong> </strong></span> </div></td>
  </tr>
  <tr>
    <td width="126" height="15" valign="top" >
      <div align="left"> <a href="admlost.php" class="Naranja10"> </a> </div></td>
    <td width="54" valign="top" ><div align="right">
        <input name="submit" type="submit"  style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  value="Enviar contraseña">
    </div></td>
  </tr>
</table>
</form>
</body>
</html>
