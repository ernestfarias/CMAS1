<? session_start();
 
$msg ="";
$msgnewusr = ""; //siver para el regusr_add
if(isset($_GET["modo"]) && !empty($_GET["modo"])) 
	{
	 $modo = $_GET["modo"];
	 
	  if ($modo =="solo")//agrego el user igual en la base usuarios 
	 {
	 	require_once('./includes/date.php'); 
		require_once('./includes/validador.php'); 
		require_once('./includes/catalog.php'); 
	//	require_once('registra/regusr_add.php');
			ValidarDatos(  ($_POST["txtregnombre_solo"]));
			ValidarDatos(  ($_POST["txtregemail_solo"]));
			ValidarDatos(  ($_POST["txtregciudad_solo"]));
	
			$nombresolo = addslashes($_POST["txtregnombre_solo"]);
		$emailsolo = addslashes($_POST["txtregemail_solo"]);
		$barriosolo = addslashes($_POST["txtregciudad_solo"]);
//SACO LOS DATOS DEL CLIENTE
								if (getenv("HTTP_X_FORWARDED_FOR")) {
								 $ipaddress   = getenv("HTTP_X_FORWARDED_FOR");
							   } else {
								 $ipaddress   = getenv("REMOTE_ADDR");
							  } 		
								  $cliente = getenv("HTTP_USER_AGENT");
					 		if(isset($_SESSION["refer"]) && !empty($_SESSION["refer"])) {
							$referer = $_SESSION["refer"];  
							} else {
							$referer = "http://www.comermas.com.ar";
							}
//FIN SACO LOS DATOS DEL CLIENTE
		

$sql = "INSERT INTO usuarios(nombre,apellido,email,apodo,password,telefono,barrio,fecnac,como,ipaddress,cliente,fecha,hora,referer,activo,permiso)values('$nombresolo','','$emailsolo','$nombresolo','comermas','','$barriosolo','','SOLO','$ipaddress','$cliente','','','$referer','0','usuario')";
mysql_query($sql) or die (mysql_error()); 

//SACO EL ID DE BASE QUE lE puso PARA LUEGO PODER ASOCIARLO A LA TABLE PUNTIACIONES
	 	$sql = "SELECT * FROM usuarios where email='$emailsolo' and nombre='$nombresolo'";
		$qry= @mysql_query($sql) or die (mysql_error()."4"); 
		$rs = mysql_fetch_Array($qry);
		$idusr = $rs['id'] ;//fin de if
							
	
	
			 }
	 
	 if ($modo =="new") 
	 {
	 	require_once('./includes/date.php'); 
		require_once('./includes/validador.php'); 
		require_once('./includes/catalog.php'); 
		require_once('registra/regusr_add.php');
					
		if(isset($_POST["txtregemail"]) && !empty($_POST["txtregemail"])) $email = addslashes($_POST["txtregemail"]);//si es usuario nuevo.
		 
			ValidarDatos(  ($_POST["txtregemail"]));
		
	 	$sql = "SELECT * FROM usuarios where email='$email'";
		$qry= @mysql_query($sql) or die (mysql_error()."4"); 
		$totalcorreo = @mysql_num_rows($qry); 
		
		$rs = mysql_fetch_Array($qry);
		$idusr = $rs['id'] ;//fin de if
		
	 }
	
	
	 if ($modo =="reg") {
	
		require_once('./includes/catalog.php'); 
		
			 require_once('./includes/validador.php'); 
	
	
	 
		 
			ValidarDatos(  ($_POST["txtemailvyr"]));
		
		
		$email = addslashes($_POST["txtemailvyr"]); //si es usuario viejo
		 
	   
	
	 	$sql = "SELECT * FROM usuarios where email='$email'";
		$qry= @mysql_query($sql) or die (mysql_error()."4"); 
		$totalcorreo = @mysql_num_rows($qry); 
		
		$rs = mysql_fetch_Array($qry);
		$idusr = $rs['id'] ;
		 
 		if ($totalcorreo==0) $msgcorreo = "La direccion de <b>correo</b> electronico no se encuentra registrada en comermas";
		 
						if (($totalcorreo==0)) {
						$volver ="<br><br><a href=# onClick='history.back()'>volver al formulario</a>";
						$msg  = "<b>Error en la carga del formulario de registracion verfique el siguiente error :</b><br><br>". $msgcorreo ."<br>".$volver;
						}
						
	
	
	
	 }
	
	if(isset($msg) && !empty($msg)) {
	
	}else{
	require_once('./includes/date.php'); 
	 require_once('./includes/validador.php'); 
	
	
	 
		 
			ValidarDatos(  ($_POST["que"]));
			ValidarDatos(  ($_POST["precio"]));
			ValidarDatos(  ($_POST["comentario"]));
			ValidarDatos( ($_POST["comida"]));
			ValidarDatos(  ($_POST["servicio"]));
			ValidarDatos( ($_POST["ambiente"]));
	
		$idbase = addslashes($_POST["idlugar"]);
		$fechavisita = addslashes($_POST["fecha"]);
		$horavisita = addslashes($_POST["hora"]);
		$que = addslashes($_POST["que"]);
		$precio = addslashes($_POST["precio"]);
		$comentario = addslashes($_POST["comentario"]);
		$comida = addslashes($_POST["comida"]);
		$servicio = addslashes($_POST["servicio"]);
		$ambiente = addslashes($_POST["ambiente"]);
		
		
		
		require_once('./includes/date.php'); 
		$fechavisita = edate2($fechavisita);
		//echo $fecha_visita;
		
		
		$fecha  = date('Y-m-d');
		$hora = date('h:i:s');
	
	
		$sql = "INSERT INTO `puntuaciones` (`id_base` , `id_usr` , `fecha_visita` , `hora_visita` , `que` , `precio` , `comentarios` , `comida` , `servicio` , `ambiente` , `fecha` , `hora` , `si` , `no` ) VALUES ('$idbase', '$idusr', '$fechavisita', '$horavisita', '$que', '$precio', '$comentario', '$comida', '$servicio', '$ambiente', '$fecha', '$hora', '0', '0');";
		$qry= @mysql_query($sql) or die ("add");
	$msgnewusr ="si";
	}
	
	
	 }
 
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

<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 
</head>

<body bgcolor="AE5959" leftmargin="0" topmargin="0">
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td width="779" height="90"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="90" background="<?=$_SESSION["bannertop"] ?>" bgcolor="ae5959"></td>
              </tr>
              <tr>
                <td width="777" bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
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
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="history.back()"><font color="#FFFFFF"><strong>Volver</strong></button>
              </div></td>
            </tr>
            <tr>
              <td><img src="botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td height="1"></td>
            </tr>
          </table>            
             
              <form name="frmaddusr" action="regusr.asp" method="post">
		
			<table width="541" height="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="21" colspan="2" align="center">
                    <CENTER>
                      <p><span class="Blanco12"><?=$msg?><br>
                     
 
                        
                      </p>
                    </center>
					
					    <? if ($msgnewusr == "si") {?>
            
		
			<table width="365" height="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="21" colspan="2" align="center">
                    <CENTER>
                      <p><span class="Blanco16">Gracias por  dejar sus comentarios en </span><span class="TitulosTime"><br>
                        ComerMas</span><span class="Blanco16"><br>
                        </span><span class="Blanco12"><br>
                        recuerde que sus comentarios seran procesados manualmente para evitar el mal uso de los mismo, por lo que dicha publicaciones puede tardar unos dias en estar en el sitio </span><span class="Blanco16"><br>
                        <?  if ($modo =="new") { ?>
						<br>
                        <span class="Blanco12">Se le enviar&aacute; un correo para validar su casilla de correo y terminar el tramite del alta para su usuario en comermas.com.ar.<br>
                        <br>
                        <br>
                        <strong>CONSIGNAS: </strong><br>
1 - No olvides de revisar si la activaci&oacute;n no cae en tu correo no deseado.<br>
2 - agrega<strong> info@comermas.com.ar</strong> a tu lista de correo seguro, para futuros avisos.</span>                        <br>
</span><span class="Estilo15">

<? } ?>
<br>
                        <a href="http://www.comermas.com.ar" class="Naranja10">Volver a Pagina principal</a> </span><br>
                      </p>
                    </center></td>
                </tr>
              </table>    
			 
			<? } ?>
					
					</td>
                </tr>
              </table>    
			</form>            <div align="right"><br>
              <br> 
            <img src="banners/logo.gif" width="352" height="86">  </div>
          <div align="center"></div></td>
          <td width="20" height="19" align="right"></td>
        </tr>
      </table>
      <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="2"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="24"><? require_once('includes/bot.php')?></td>
        </tr>
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
