<?
 session_start();  
//SI TIENE SUCURSALES EL LUGAR Y PARA QUE LAS MUESTRE EN EL DATELLES, ASEGURASE:
//que el campo nombre de la tabla base , tenga solo el nombre del lugar, es decir todos los lugares y sus sursales ,de nombre tienen
//que tener el mismo , y en el campo telefono de c/u poner el * (ver sucursales)

// response.Expires = 10080 'una semana de duracion 
 



 if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
	 require_once('includes/validador.php'); 
	ValidarDatos(addslashes($_GET["id"]));
	$idfrombusqueda = addslashes($_GET["id"]);

$_SESSION['idlugar'] = $idfrombusqueda ;

require_once('includes/catalog.php');	
	//url actual 
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
//fin urlactual

  //  $sql = "SELECT * FROM base where id= '$idfrombusqueda'";
  
  
 $sql = "SELECT *FROM base LEFT  JOIN encargados ON base.id = encargados.nombrelugar where base.id= '$idfrombusqueda'";
 // $sql =  "SELECT *FROM base LEFT JOIN (imagenes RIGHT JOIN encargados ON imagenes.id_base= encargados.nombrelugar) ON base.id = encargados.id  where base.id= '$idfrombusqueda'";

  
  
    $qrydestacados= @mysql_query($sql) or die ("1ee");
   $rsdestacados = mysql_fetch_Array($qrydestacados);
   		
	   $id = $rsdestacados['id'] ;
   	   $nombre =  stripslashes($rsdestacados['nombre']) ;
	   $barrio =  stripslashes($rsdestacados['barrio']) ;
	   $localidad = stripslashes($rsdestacados['localidad']) ;
	  $direccion =  stripslashes($rsdestacados['direccion']) ;
		$telefono = stripslashes( $rsdestacados['telefono'] );
	  $detalles2t =  stripslashes($rsdestacados['detalles2']) ;
     $detalles1 = stripslashes( $rsdestacados['detalles1'] );
    $activo = $rsdestacados['activo'] ;   
     $visitas = $rsdestacados['visitas'] ;
		    $clase =  stripslashes($rsdestacados['clase']) ;
	 
$imagendes = $rsdestacados['isologo'] ;  

	 $wwwroot = "D:/Inetpub/wwwroot/php/comermas.com.ar"; 
	 $wwwroot = "/home/rm000120/public_html";
	 $wwwrooti = "http://www.comermas.com.ar"; 

 $encreservas = stripslashes( $rsdestacados['encreservas'] );
  $encr  = stripslashes( $rsdestacados['encr'] );
  $pagina = stripslashes( $rsdestacados['encweb'] );

// %="- "&replace(ucase(rsdestacados.Fields.Item("Detalles2").Value),"/","<BR>-")%

 $detalles2 =  "- ". strtoupper(str_replace("/", "<br>-", $detalles2t));
 	

$sqlimagenes = "Select * from descuentos where id_base ='$idfrombusqueda' ";
	$rsdescuentos= @mysql_query($sqlimagenes) or die (mysql_error()."4"); 
	 $totalimg = @mysql_num_rows($rsdescuentos);   
?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>

<!-- <META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants" /> -->
<meta name="description" content="Comermas: <?=$nombre?> - <?=$localidad?> - <?=$detalles1?> - en www.comermas.com.ar la guia de lugares para comer, restaurants tenedores libres y demas" />
<meta name="robots" content="all|index|follow" />
<META name="Author" content="Farias Ernesto, Cristian Magnone"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- <title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title> -->
<title><?=$nombre?> <?=$clase?> - ComerMas Lugares para comer</title>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet />
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 

<SCRIPT TYPE="text/javascript" SRC="includes/ajax.js" language="javascript1.2"></SCRIPT>
<!-- UTIL PARA FAIBUK -->
<!-- <script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/es_LA"></script>
 --><!-- /UTIL PARA FAIBUK -->

</head>

<body bgcolor="AE5959" leftmargin="0" topmargin="0">	
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1" /></td>
        </tr>
        <tr> 
          <td width="779" height="90"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="90" background="<?=$_SESSION["bannertop"] ?>" bgcolor="ae5959">&nbsp;</td>
              </tr>
              <tr>
                <td width="777" bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"/></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="777" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="AE5959">
        <tr> 
          <td width="20">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2"><div align="right"> 
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="window.location='http://www.comermas.com.ar'"><font color="#FFFFFF"><strong>Volver</strong></button>
              </div></td>
            </tr>
            <tr>
              <td colspan="2"><img src="botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="63%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" bgcolor="#851549" class="TitulosTime">
                    &nbsp;&nbsp;  <?=$nombre?> 	<iframe scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:100px;height:19px;" allowTransparency="true" src="http://www.facebook.com/plugins/like.php?href=<?=curPageURL();?>&amp;layout=button_count&amp;show_faces=false" ></iframe>
 <span class="Blanco14"> <? if ($activo == 0) echo "(ESTE LUGAR YA NO SE ENCUENTRA ABIERTO)"; ?> </span>                         </td>
                        <?  if(isset($imagendes) && !empty($imagendes))   {?>          <td width="16" height="30" bgcolor="#851549">&nbsp;</td><? }?>
                      </tr>
       <tr>                 
			 
      <?  if(isset($imagendes) && !empty($imagendes))   {?>        
 <td width="158" rowspan="3" bgcolor="#B36464">
                        
     <div align="center"><img src="<? echo $wwwrooti."/fotos/m_".$imagendes?>"  border="1"></div></td>
<? } ?>
                        <td  height="30" align="right" bgcolor="#B36464" class="Blanco10"><div align="right"><?=$direccion?></div></td>
                        <td width="16" height="30" bgcolor="#B36464">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="30" align="right" class="Blanco10"><?=$barrio?>
      -
        <?=$localidad?></td>
                        <td width="16" height="30">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="30" align="right" bgcolor="#B36464" class="Blanco10"><b><i>
                          <?=$telefono?>
                        </i></b></td>
                        <td width="16" height="30" bgcolor="#B36464">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="3" align="right"></td>
                      </tr>
                    </table></td>
                    <td width="37%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="10"></td>
                                <td valign="center" class="Blanco10"><p><?=$detalles2?></p></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="1" colspan="2"><img src="botones/blancogris.gif" width="100%" height="1"></td>
            </tr>
            <tr>
              <td colspan="2"> <i> </i>
                <table width="100%"  border="0" cellspacing="0" cellpadding="10">
                  <tr>
                    <td  class="BlancoBold14"><i>
                      <?=$detalles1?>
                    </i></td>
                  </tr>
                </table>
             </td>
            </tr>
            <tr>
              <td colspan="2" align="center" class="Blanco10"><img src="botones/gris.jpg" width="100%" height="1"></td>
            </tr>
            <tr>
              <td colspan="2" align="center" class="Blanco10"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="200" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                          <? 
       $cont = 0; 	
  $contone = 0; 	
 $varcolorIndex  = 0; 
$loadone ="";         
 $sqlnotas ="SELECT * from imagenes where id_base =$idfrombusqueda and modo=0 group by titulo order by id asc";
	 $rsnotas = @mysql_query($sqlnotas) or die ("ERROR: The query failed.1"); 
	 $totalnotas = @mysql_num_rows($rsnotas); 

	while ($row = @mysql_fetch_array($rsnotas)) 
   {

 $titulo = $row["titulo"]; 
  
if ($cont ==0) {

 $contone = 1;
$loadone = $loadone.'<script>'; 
$loadone=$loadone. "CargarContenido('detalles_info.php?id=".$idfrombusqueda."&titulo=".$titulo."','contenidodetalles','contenidodetalles')";
$loadone=$loadone."</script>"
?>
                          <tr>
                            <td class="Blanco10"><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                                <tr>
                                  <td bgcolor="#851549" class="Blanco12"><div align="right">
                                      <p> <span class="Blanco16"><strong><a href=# onClick="CargarContenido('detalles_info.php?id=<?=$idfrombusqueda?>&titulo=<?=$titulo?>','contenidodetalles','contenidodetalles')" >
                                        <?=$titulo?>
                                      </a></strong></span><em></em></p>
                                  </div></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                          </tr>
                          <? } else {
 if  ($varcolorIndex == 1) { 
 			$varcolorIndex = 0 ;
    		$varcolor = "#AE5959";
		} else {
		     $varcolorIndex = 1;
		     $varcolor = "#B36464";
	  }

?>
                          <tr>
                            <td>
                              <table width="100%"  border="0" cellspacing="0" cellpadding="10">
                                <tr bgcolor="<? echo $varcolor?>">
                                  <td  class="Blanco12"><div align="right"> <a href=# onClick="CargarContenido('detalles_info.php?id=<?=$idfrombusqueda?>&titulo=<?=$titulo?>','contenidodetalles','contenidodetalles')" >
                                      <?=$titulo?>
                                  </a></div></td>
                                </tr>
                            </table></td>
                          </tr>
                          <? 

} $cont = $cont +1;
}
if ($cont >0) {
 

                      //    <tr>
                       //     <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                        //  </tr>
                        //  <tr>
                        //    <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                        //  </tr>

  }?>
                      </table></td>
                    </tr>
 	 
<? 
//////////// Si tiene beneficios muestro boton
if ($totalimg > 0) { ?>                 
  <tr>
                      <td class="Blanco10"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td bgcolor="#B36464" class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><span class="Blanco16"><strong><img src="images/beneficios.jpg" width="30" height="30"></strong></span></td>
                                <td><a href=# onClick="CargarContenido('detalles_beneficio.php?id=<?=$idfrombusqueda?>&titulo=<?=$titulo?>','contenidodetalles','contenidodetalles')" style="text-decoration:none "><strong>B</strong><em class="Blanco12">eneficios</em><em class="Blanco12"> ...............</em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>



                    <tr>
                      <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                    </tr>
<? }?>
                 
<?  /// Si el lugar tiene activado el servicio de reservas y  consultas por ahora estan todos activos
 if(isset($encreservas) && !empty($encreservas)  && ($encr==1)  ) { ?>
   <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="images/mail.jpg" width="30" height="30"></td>
                                <td><a href='contacto.php?consulta=<?=$idfrombusqueda?>'   style="text-decoration:none "><strong>C</strong><em class="Blanco12">onsultas y Reservas</em><em class="Blanco12"> </em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                    </tr>

<? }?>

                    <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td bgcolor="#B36464" class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="images/maila.jpg" width="30" height="30"></td>
                                <td nowrap="nowrap"><a href=#  onClick="NewWindow2('recomendar.php?id=<?=$idfrombusqueda?>','recomendar','586','380','no','center','no','no','no','no');return false" style="text-decoration:none"><em>R</em><em class="Blanco12">ecomendar lugar</em></a><!-- fb --><a name="fb_share" type="button" onclick="javascript:compartirFB1(location.href);" href="javascript:void(0);" title="Facebook" style="text-decoration:none" ><span class="FBConnectButton FBConnectButton_Small" style="cursor: pointer;"><span class="FBConnectButton_Text"><img style="margin: 0px 0px -6px 10px;" width="18px" title="Recomendalo tambien en Facebook" alt="Sugeri a tus amigos en Facebook" src="/images/red-facebook.gif"></span></span></a><!-- fb --></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                    </tr>
           <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%"><img src="images/voto.jpg" width="30" height="30"></td>
                                <td width="83%"><a href="comentarios.php?id=<?=$idfrombusqueda?>" target="_self" style="text-decoration:none "><em>V</em><em class="Blanco12">otos y Comentarios</em><em class="Blanco12"> ..</em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                    </tr>         
<? 
//////////// Si esta seteada la pagina web del sitio
 if(isset($pagina) && !empty($pagina) ) {
 
?>  



 <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td bgcolor="#B56563" class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%"><img src="images/web2.jpg" width="30" height="30"></td>
                                <td width="83%"><a href="http://www.comermas.com.ar/index_pagina.php?id=<?=$idfrombusqueda?>&page=<?=$pagina?>" target="_blank" style="text-decoration:none "><strong>P</strong><em class="Blanco12">agina Web</em><em class="Blanco12"> ..........</em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="botones/gris.jpg" width="100%" height="1"></td>
                    </tr>

<? }?>


                    <tr>
                      <td class="Blanco12"><?  require_once('detalles_bar.php');?></td>
                    </tr>
                  </table></td>
                  <td width="1" bgcolor="#9A9A9A"><img src="botones/gris.jpg" width="1" height="80%"></td>
                  <td width="544" valign="top"> <div id="contenidodetalles"></div> 
															<br>	
							<!-- MAPPA GG -->
<!-- <img src="http://maps.google.com/maps/api/staticmap?size=448x264&amp;center=<?=$direccion?>,<?=$localidad?>,AR&amp;sensor=false&amp;zoom=15&amp;markers=size:small|color:red|<?=$direccion?>,<?=$localidad?>,AR&amp;" alt="geo_mashup_map"> -->
<center><img src="http://maps.google.com/maps/api/staticmap?size=500x260&amp;center=<?=$direccion?>,<?=$localidad?>,AR&amp;sensor=false&amp;zoom=15&amp;markers=color:orange|<?=$direccion?>,<?=$localidad?>,AR&amp;" alt="geo_mashup_map">
</center>
<!-- MAPPA GG --> 
									
									 </td>
                </tr>
              </table>  </td>
            </tr>
            
            <tr>
              <td colspan="2" class="Blanco10">
<br>
                <? // si tiene sucursaless para que las muestre
				
	
	$vart = strpos($direccion, "*");

if ($vart === false) {
    } else {
$letra="";

$nombre = str_replace("'", "\'", $nombre);
$sql2 = "select * from base where nombre like '%". $nombre. "%' AND telefono !='".$telefono. "'";

$qrysuc = @mysql_query($sql2) or die ("err sql6");   
 $totalrecords = @mysql_num_rows($qrysuc); 

echo "<BR><center><table class='Blanco10'><th align=left>Otras Sucursales:</th>";
echo "<tr bgcolor=#FF9900 bordercolor=#FFFFFF><td width=166 height=20 bgcolor=#851549><div align=left><b>SUCURSAL</b></div></td><td width=122 height=20 bgcolor=#851549><div align=left><b>DIRECCION</b></div></td><td width=97 height=20 bgcolor=#851549><div align=left><b>TELEFONO(s)</b></div></td></tr>";
while ($row = @mysql_fetch_array($qrysuc)) {  

echo "<tr bgcolor=#B36464><td>".$row['barrio']."</td><td>".$row['direccion']."</td><td>".$row['telefono']."</tr></td>";
 
} 
echo "</table></center><br>";
   	
	 
	}
 
				
 
 
?>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="Blanco10"><div align="center"> </div></td>
            </tr>
            <tr>
              <td colspan="2" class="Blanco10"> 
			  <? require_once('detalles_votos.php')?>


 <!-- fb Tweeter -->
Recomendalo a tus amigos en  
<a name="fb_share" type="button" onclick="javascript:compartirFB1(location.href);" href="javascript:void(0);" title="Facebook" style="" ><span class="FBConnectButton FBConnectButton_Small" style="cursor: pointer;"><span class="FBConnectButton_Text"><B><img style="margin: 0px 0px -1px 0px;" title="Recomendalo en Facebook" alt="Sugeri a tus amigos en Facebook" src="/images/red-facebook.gif"></B></span></span></a>
 <!-- 		<div class="compartirF"><a name="fb_share" type="button" onclick="javascript:compartirFB1('http://www.lanacion.com.ar/1319737');_gaq.push(['_trackEvent', 'herramientas', 'facebook', 'cuerpo-nota']);" href="javascript:void(0);" title="Facebook" style="" ><span class="FBConnectButton FBConnectButton_Small" style="cursor: pointer;"><span class="FBConnectButton_Text">Compartir</span></span></a></div> -->		

o en <a href="http://twitter.com/share?url=http://www.comermas.com.ar" class="twitter-share-button" data-count="none" data-via="Comermas">Tweeter</a>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>


<!-- <iframe scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:120px;height:20px;" allowTransparency="true" src="http://www.facebook.com/plugins/like.php?href=<?=curPageURL();?>&amp;layout=button_count&amp;show_faces=false" ></iframe>
 -->
<!-- FB  twt-->
<br>		
		
<br>
<div align="center">
<script type="text/javascript"><!--
google_ad_client = "pub-7392026547974093";
/* 728x90, creado 4/03/10 */
google_ad_slot = "4772935266";
google_ad_width = 728;
google_ad_height = 90;
//-->

</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> 
</script>
 </div>

		
			<div id="contenidocomentario"></div>  
		<script>; 
//CargarContenidoPLUS('detalles_comentarios.php?id=".$idfrombusqueda"','contenidocomentario','contenidocomentario');
CargarContenidoPlus('detalles_comentarios.php?id=<?=$idfrombusqueda?>&ordenprecio=todos',"GET",'contenidocomentario','contenidocomentario',"loading.gif","",'no');
</script>


           </td>
            </tr>
            <tr>
              <td align="right" class="Blanco10">&nbsp;</td>
              <td align="right" class="Blanco10">


<div align="center">
<script type="text/javascript"><!--
google_ad_client = "pub-7392026547974093";
/* 728x90, created 3/5/10 */
google_ad_slot = "9700294030";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

 </div>



<?
			  
			//   if(isset($encreservas) && !empty($encreservas))
			 //  {
			 
			//    echo "PARA REALIZAR CONSULTAS O RESERVAS <a href='contacto.php?consulta=".$idfrombusqueda."'>AQUI</a>";
			 	//}
			  ?></td>
            </tr>
            <tr>
              <td align="right" class="Blanco10">&nbsp;</td>
              <td align="right" class="Blanco10">&nbsp;</td>
            </tr>
            <tr>
              <td width="47%" align="right" class="Blanco10"> <div align="left">
			  </div></td>
              <td width="53%" align="right" class="Blanco10">los detalles de <b><?=stripslashes($nombre) ?></b>
fueron vistos <b>
<?=$visitas?> </b>veces </td>
            </tr>	
          </table></td>
          <td width="20" height="400" align="right"></td>
        </tr>
      </table>
      <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="2"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="24"><? require_once('includes/bot2.php')?></td>
        </tr>
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
<? if ($contone ==1) echo $loadone; ?>
</body>
</html>
<?
}
require_once('includes/catalog.php'); 
$sqlvoto = "UPDATE base SET visitas = visitas +1 WHERE id='$idfrombusqueda'";//
	 mysql_query($sqlvoto) or die(mysql_error()); 

?>
