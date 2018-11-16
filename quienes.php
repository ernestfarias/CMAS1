<?  session_start(); 
	require_once('includes/catalog.php'); 
 	$sqlvoto = "UPDATE contadores SET cantidad = cantidad +1 WHERE nombre='quienes'";
	mysql_query($sqlvoto) or die(mysql_error()); 

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
                <td height="90" background="<?=$_SESSION["bannertop"] ?>" bgcolor="ae5959">&nbsp;</td>
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
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="history.back()"><font color="#FFFFFF"><strong>Volver</strong></font></button>
    </div></td>
            </tr>
            <tr>
              <td><img src="botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td height="1"></td>
            </tr>
          </table>            
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="18" bgcolor="#851549"></td>
              <td width="704" bgcolor="#851549" class="TitulosTime">QUIENES SOMOS</td>
              <td width="15" height="30" bgcolor="#851549">&nbsp;</td>
            </tr>
            <tr>
              <td height="19">&nbsp;</td>
              <td height="19" align="right">&nbsp;</td>
              <td height="19">&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="145" bgcolor="#B36464">
                <p align="right">&nbsp;</p></td>
              <td height="145" align="right" bgcolor="#B36464" class="Blanco16">
                <div align="left">
                  <p>ComerMas nació en el 2003 con el objetivo de brindar servicio a la comunidad, por eso dedicamos nuestro tiempo para desarrollar la guía de lugares mas completa y fácil de usar, desde la fecha hasta hoy seguimos con una actualización semanal de nuestros datos, atendiendo siempre las sugerencias de nuestros visitantes, y auspiciantes, para mejorar la funcionalidad de la misma.<br>
                  </p>
              </div></td>
              <td width="15" height="145" bgcolor="#B36464">&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="91">
                <div align="right"></div></td>
              <td height="91" align="right" class="Blanco16"><div align="left"><span>ComerMas sin lugar a duda cuenta con unas de las base de datos mas completa de lugares de Buenos Aires, cumpliendo así nuestro objetivo, lograr una mayor calidad de respuesta para con las búsquedas realizadas.<br>
              </span></div></td>
              <td width="15" height="91">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#B36464">&nbsp;</td>
              <td height="28" align="right" bgcolor="#B36464" class="Blanco16"><span>Le agradece por confiar  ... <em>El equipo de ComerMas</em> </span></td>
              <td height="30" bgcolor="#B36464">&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="28">
                <div align="right"> </div></td>
              <td height="28" align="right"> <img src="banners/logo.gif" width="352" height="86"> </td>
              <td width="15" height="30">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="right"></td>
            </tr>
          </table>          </td>
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
