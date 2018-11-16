<? session_start();
 
$msg ="";
if(isset($_GET["activo"]) && !empty($_GET["activo"])) 
	{
	$activo= addslashes($_GET["activo"]); 
	$menu = 1;
 			require_once('includes/catalog.php');
   		 
			$users_query = "SELECT * FROM usuarios WHERE activo = '$activo'"; 
 			$users_display = @mysql_query($users_query) or die("ERROR: 4 " . mysql_error());
			$row = mysql_fetch_Array($users_display);
	   		$totalrecords = @mysql_num_rows($users_display); 
			
			$id = $row["id"]; 
			$nombre = $row["nombre"]; 
			
			
		
		if ($totalrecords>0) {
			$users_query = "UPDATE `usuarios` SET `activo` = '1' WHERE `id` = '$id'";
 			$users_display = @mysql_query($users_query) or die("ERROR: 4 " . mysql_error());
			$msg ="Su cuenta ha sido activada, ya esta participando de nuestro concurso de cenas gratis. y cuenta con la participacion en nuestro portal para contrubuir con sus comentarios de cada lugar.";
			
			} else {
			
			
			$msg ="Error al activar su cuenta. incie de nuevo el tramite.";
			}
	
}
 
 

 if($_SESSION["bannertop"] && !empty($_SESSION["bannertop"])) 
		{ 
		$banner =$_SESSION["bannertop"]; 
		} else {
		$banner= "banners/topcarnes.gif";
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
                <td height="90" background="<?=$banner ?>" bgcolor="ae5959"></td>
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
		
			<table width="365" height="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="21" colspan="2" align="center">
                    <CENTER>
                      <p><span class="Blanco16"><?=$msg?><br>
                        </span><span class="Blanco12"><br>
                        </span><span class="Blanco16"><br>
</span><span class="Estilo15"><br>
                        <a href="http://www.comermas.com.ar" class="Naranja10">Volver a Pagina principal</a> </span><br>
                      </p>
                    </center></td>
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
