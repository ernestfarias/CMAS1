<?  session_start(); 

	require_once('includes/catalog.php'); 
 	$sqlvoto = "UPDATE contadores SET cantidad = cantidad +1 WHERE nombre='publicidad'";
	mysql_query($sqlvoto) or die(mysql_error()); 
	
	 
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
                <td height="90" background="<?=$banner?>" bgcolor="ae5959">&nbsp;</td>
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
              <td><div align="right"> <font face="Verdana, Arial, Helvetica, sans-serif">
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="history.back()"><font color="#FFFFFF"><strong>Volver</strong></font></button>
              </font></div></td>
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
              <td width="704" bgcolor="#851549" class="TitulosTime" >  PUBLICIDAD  </td>
              <td width="15" height="30" bgcolor="#851549">&nbsp;</td>
            </tr>
            <tr>
              <td height="19">&nbsp;</td>
              <td height="19" align="right">&nbsp;</td>
              <td height="19">&nbsp;</td>
            </tr>
            <tr>
              <td height="145" colspan="3">
                <table width="100%" align="center" cellpadding="0" cellspacing="0">
                  <tr bgcolor="#B36464">
                    <td height="46" colspan="3" valign="center"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>&nbsp;</td>
                          <td><span class="Blanco10">Cont&aacute;ctenos por mail a <a href="mailto:publicitar@comermas.com.ar">publicitar@comermas.com.ar</a> para hacer llegar su mensaje publicitario a nuestros lectores, o cualquier informarcion a  <a href="mailto:info@comermas.com.ar">info@comermas.com.ar</a>
</span>													<br>	<br>
											
													 <a href=# onClick="NewWindow('./registra/regplace.php','addplace','800','500','yes','center');return false">              <span class="Naranja14"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">
              Si tiene un comercio y no esta en la guía Comermas, haga click aqui (gratis)</span></a>
											
													</td>
                          <td>&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="20" colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td   colspan="3"><img src="botones/blancogris.gif" width="100%" height="2"></td>
                  </tr>
                  <tr>
                    <td 	colspan="3"><div align="center" class="BlancoBold14"></div></td>
                  </tr>
                  <tr>
                    <td height="87" colspan="3">                      <div align="center"> <br>
                          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="400" height="50">
                            <param name="movie" value="banners/bannerwidth.swf">
                            <param name="quality" value="high">
                            <embed src="banners/bannerwidth.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="50"></embed>
                          </object>
                          <span class="Estilo3"><br>
        </span><span class="Blanco10">(400 <strong>x</strong> 90)</span></div></td>
                  </tr>
                  <tr bgcolor="#B36464">
                    <td height="19" colspan="3"><p align="center">&nbsp; </p></td>
                  </tr>
                  <tr>
                    <td width="33%" height="178" valign="top"><p align="center"><br>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="150" height="75">
                              <param name="movie" value="banners/banner150x75.swf">
                              <param name="quality" value="high">
                              <embed src="banners/banner150x75.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="150" height="75"></embed>
                          </object>
                      </p>
                        <p align="center" class="Blanco10">(150 <strong>x</strong> 75) </p></td>
                    <td width="34%" valign="top"><p align="center"> <br>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="150" height="100">
                              <param name="movie" value="banners/banner150x100.swf">
                              <param name="quality" value="high">
                              <embed src="banners/banner150x100.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="150" height="100"></embed>
                          </object>
                      </p>
                        <p align="center" class="Blanco10">(150 <strong>x</strong> 100) </p></td>
                    <td width="33%" rowspan="2" align="center" valign="top"><div align="center"><span class="Estilo3"><br>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="150" height="200">
                                <param name="movie" value="banners/banner150x200.swf">
                                <param name="quality" value="high">
                                <embed src="banners/banner150x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="150" height="200"></embed>
                          </object>
                              <br>
                              <br>
        </span><span class="Blanco10">(150 <strong>x</strong> 200) </span><span class="Estilo3"><br>
        <br>
                    </span></div></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" valign="middle"><p align="left" class="Blanco12">Estos son algunos ejemplos de banners, donde ud puede hacer publicidad dentro de nuetro sitio.  Si desea mas informacion contactenos por e-mail a <a href="mailto:publicitar@comermas.com.ar">publicitar@comermas.com.ar</a> </p>                      </td>
                    </tr>
                </table>                </td>
              </tr>
            <tr>
              <td colspan="3"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><img src="botones/blancogris.gif" width="100%" height="2"></td>
                </tr>
                <tr>
                  <td bgcolor="#B36464"><div align="center"><span class="BlancoBold14"><br>
                    (Agrega ComerMas a tu p&aacute;gina)<br> 
                    </span><br>
                        <IFRAME width="150" height="200" frameborder="0" scrolling="no" style="background:#FFFFFF" 
SRC="http://www.comermas.com.ar/servicios/banner1.php" TITLE="banner1">
</IFRAME> 
						<br>
                        <br>
                        <span class="Blanco10"><strong>copia y pega el siguiente codigo en tu html</strong><br>
&lt;IFRAME width=&quot;150&quot; height=&quot;200&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot; style=&quot;background:#FFFFFF&quot; <br>
SRC=&quot;http://www.comermas.com.ar/servicios/banner1.php&quot; TITLE=&quot;banner1&quot;&gt;<br>
&lt;/IFRAME&gt; <em><br>
<br>
<br>  </em> </span>
                        <IFRAME width="140" height="400" frameborder="0" scrolling="no" style="background:#FFFFFF" 
SRC="http://www.comermas.com.ar/servicios/banner2.php" TITLE="banner1">
</IFRAME> 
						<br>
                        <br>
                        <span class="Blanco10"><strong>copia y pega el siguiente codigo en tu html</strong><br>
&lt;IFRAME width=&quot;140&quot; height=&quot;400&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot; style=&quot;background:#FFFFFF&quot; <br>
SRC=&quot;http://www.comermas.com.ar/servicios/banner2.php&quot; TITLE=&quot;banner2&quot;&gt;<br>
&lt;/IFRAME&gt; <em><br>
<br>
                        </em> </span></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
              </tr>
            <tr>
              <td width="18" height="30">
                <div align="right"><font color="#FFFFFF" size="2" face="Times New Roman, Times, serif"><b></b></font></div></td>
              <td height="30" align="right"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><img src="banners/logo.gif" width="352" height="86"></b></font></td>
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
          <td><? require_once('includes/bot.php')?></td>
        </tr>
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
