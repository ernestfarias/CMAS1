<? session_start();



 if($_SESSION["bannertop"] && !empty($_SESSION["bannertop"])) 
		{ 
		$banner =$_SESSION["bannertop"]; 
		} else {
		$banner= "banners/topcarnes.jpg";
		}
		require_once('../includes/date.php'); 
		require_once('../includes/validador.php'); 
		require_once('../includes/catalog.php'); 
 		require_once('regusr_add.php') 
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
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
<SCRIPT language=javascript src="../includes/functioncm.js"></SCRIPT> 
</head>

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
                <td height="90" background="../<?=$banner ?>" bgcolor="ae5959"></td>
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
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="history.back()"><font color="#FFFFFF"><strong>Volver</strong></button>
              </div></td>
            </tr>
            <tr>
              <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td height="1"></td>
            </tr>
          </table>            
            <? if ($msgnewusr == "si") {?>
              <form name="frm" action="" method="post">
		
			<table width="365" height="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="21" colspan="2" align="center">
                    <CENTER>
                      <p><span class="Blanco16">Gracias por registrarse en </span><span class="TitulosTime"><br>
                        ComerMas</span><span class="Blanco16"><br>
                        </span><span class="Blanco12"><br>
                        Se le enviar&aacute; un correo para validar su casilla de correo y terminar el tramite del alta para su usuario en comermas.com.ar.<br>
                        <br>
                        <br>
                        <strong>CONSIGNAS: </strong><br>
                        1 - No olvides de revisar si la activaci&oacute;n no cae en tu correo no deseado.<br>
2 - agrega<strong> info@comermas.com.ar</strong> a tu lista de correo seguro, para futuros avisos.</span><span class="Blanco16"><br>
</span><span class="Estilo15"><br>
                        <a href="http://www.comermas.com.ar" class="Naranja10">Volver a Pagina principal</a> </span><br>
                      </p>
                    </center></td>
                </tr>
              </table>    
			</form>   
			<? } 
			
			if ($msgnewusr == "no") 
			{?>
 
			
   <form   method="post" name="frm" class="BlancoBold14">
   <table width="100%" height="93" border="0" align="center" cellpadding="2" cellspacing="0">         
                <tr bgcolor="#851549">
                  <td height="24" colspan="2"><div align="right">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="93%"><div align="right" class="BlancoBold12"> REGISTRARSE EN COMERMAS  </div></td>
                          <td width="15"> </td>
                        </tr>
                      </table>
											
                      </div></td>
                </tr>
                <tr>
                  <td colspan="2" height="2" valign="top" align="center"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                </tr>
                <tr class="Blanco12">
                  <td height="18" colspan="2"  ><div align="right">  <? require_once('regusr_text.php')?></div>                  </td>
                </tr>
                <tr>
                  <td height="3" colspan="2"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="center">                    <div align="right">
                      <input name="btnace" type="button" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  value="Aceptar" onClick="verificardorreg('regusr.php')">
                      </div></td>
                </tr>
                <tr>
                  <td height="15" width="211"></td>
                  <td height="15" width="1026"></td>
                </tr>
          </table>
 
			</form>
		  <? } ?>
            <div align="right"><br>
              <br> 
            <img src="../banners/logo.gif" width="352" height="86">  </div>
          <div align="center"></div></td>
          <td width="20" height="19" align="right"></td>
        </tr>
      </table>
      <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="2"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="24"><? require_once('../includes/bot.php')?></td>
        </tr>
        <tr> 
          <td height="1"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
