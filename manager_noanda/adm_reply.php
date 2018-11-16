
<?   include('check.php'); 
	 require_once('../includes/catalog.php');
	 require_once('../includes/date.php');
	 require_once('../includes/validador.php'); 
	 
$come ="";
$consulta ="";

 
if(isset($_GET["id"]) && !empty($_GET["id"])) $id = $_GET["id"];
if(isset($_POST["id"]) && !empty($_POST["id"])) $id = $_POST["id"];
 	
			 
 		$users_query1 = "SELECT * FROM reservas LEFT JOIN encargados ON reservas.id_base = encargados.nombrelugar where reservas.id= '$id'";
		$users_display = @mysql_query($users_query1) or die ("d"); 
		$row = @mysql_fetch_array($users_display);  
	 
		 
		   $nombre = stripslashes($row['nombre']) ;
		   $correo = stripslashes($row['correo']) ;
		   $detalles = stripslashes($row['detalles']) ;
 		   $fecha =  ($row['7']) ;
		   $hora = stripslashes($row['hora']) ;
			$de = stripslashes($row['encreservas']) ;
 

$detalles = str_replace(chr(10), "> ", $detalles);

$cotemp= chr(13).chr(13).chr(13)."> " .cdate2($fecha) . " ". $hora. chr(13)."> ". $nombre . "(".$correo.")". chr(13). "> " . chr(13). "> " .$detalles; 

if(isset($_POST["consulta"]) && !empty($_POST["consulta"])){
 	ValidarDatos($detalles);

    $come = "Su consulta ha sido enviado con éxito."	;

$para = $correo;
$de = $de;
$co = $_POST["consulta"];
$asunto="RE: Informacion";

$cotemp=  $co; 

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$cuerpo = "<html>" .$co."</html>"; 
 
 

mail("$para","$asunto",$cuerpo,$headers."From: ".$de);
// echo $para ." - " . $de;


$users_query = "UPDATE `reservas` SET `marca` = '1', `detalles` = '$co'  WHERE `id` = '$id'";
				mysql_query($users_query) or die ("err sql1");
}

//}
?>
<html>
<head>

<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Comermas - Respuestas</title>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
 


</head>

<body bgcolor="AE5959" leftmargin="0" topmargin="0">
<form name="form1" method="post" action="adm_reply.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"><br>
      Detalle su Respuesta<br> <input name="id" type="text" id="id" value="<?=$id?>" style="visibility:hidden ">
      <br>
    </div></td>
  </tr>
  <tr>
    <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
  </tr>
  <tr>
    <td height="1"></td>
  </tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber4">
  <tr>
    <td width="704">
        <div align="center">
                <textarea name="consulta"  rows="10" id="consulta" style="width:400px "><?=$cotemp?>
                                      </textarea>
      </div></td></tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
  </tr>
  <tr>
    <td valign="top">
      <p align="right">
       
        <input type="submit" name="Button" value="Enviar Respuesta" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="">    
     </p> </td>
  </tr>
</table>
<div align="center">
  <font size="4">
  <?=$come?>
 
  </font></div>
</form>
</body>
</html>
