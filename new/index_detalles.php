<LINK REL="StyleSheet" HREF="includes/style.css" TYPE="text/css">
 
<? header("Cache-Control: no-store, no-cache, must-revalidate");
//SI TIENE SUCURSALES EL LUGAR Y PARA QUE LAS MUESTRE EN EL DATELLES, ASEGURASE:
//que el campo nombre de la tabla base , tenga solo el nombre del lugar, es decir todos los lugares y sus sursales ,de nombre tienen
//que tener el mismo , y en el campo telefono de c/u poner el * (ver sucursales)

// response.Expires = 10080 'una semana de duracion 
 


 session_start();  

 if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
	$idfrombusqueda = addslashes($_GET["id"]);

$_SESSION['idlugar'] = $idfrombusqueda ;

require_once('includes/catalog.php');	
	 



  //  $sql = "SELECT * FROM base where id= '$idfrombusqueda'";
  
  
 $sql = "SELECT *FROM base LEFT  JOIN encargados ON base.id = encargados.nombrelugar where base.id= '$idfrombusqueda'";
 // $sql =  "SELECT *FROM base LEFT JOIN (imagenes RIGHT JOIN encargados ON imagenes.id_base= encargados.nombrelugar) ON base.id = encargados.id  where base.id= '$idfrombusqueda'";

  
  
    $qrydestacados= @mysql_query($sql) or die ("1ee");
   $rsdestacados = mysql_fetch_Array($qrydestacados);
  
	   $id = $rsdestacados['id'] ;
   	   $nombre =  utf8_encode(stripslashes($rsdestacados['nombre'])) ;
	   $barrio =  utf8_encode(stripslashes($rsdestacados['barrio'])) ;
	   $localidad = utf8_encode(stripslashes($rsdestacados['localidad'])) ;
	  $direccion =  utf8_encode(stripslashes($rsdestacados['direccion'])) ;
		$telefono = utf8_encode(stripslashes( $rsdestacados['telefono'] ));
	  $detalles2t =  utf8_encode(stripslashes($rsdestacados['detalles2'])) ;
     $detalles1 = utf8_encode(stripslashes( $rsdestacados['detalles1'] ));
       
     $visitas = $rsdestacados['visitas'] ;
	 
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
?>  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2"><img src="images/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="63%" valign="top"><table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td colspan="2" bgcolor="#F1E09E" class="TitulosTime"> &nbsp;&nbsp;<span class="Titulos">
                        <?=$nombre?> 
                          </span> </td>
                        <?  if(isset($imagendes) && !empty($imagendes))   {?>
                        <td width="16" height="36" bgcolor="#F1E09E">&nbsp;</td>
                        <? }?>
                      </tr>
                      <tr class="Textos">
                        <?  if(isset($imagendes) && !empty($imagendes))   {?>
                        <td width="158" rowspan="3">
                          <div align="center"><img src="<? echo $wwwrooti."/fotos/m_".$imagendes?>"  border="1"></div></td>
                        <? } ?>
                        <td  height="23" align="right" class="Textos"><div align="right">
                            <?=$direccion?>
                        </div></td>
                        <td width="16" height="23" class="Textos">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="24" align="right" bgcolor="#F8F0D0" class="Textos"><?=$barrio?>
      -
        <?=$localidad?></td>
                        <td width="16" height="24" bgcolor="#F8F0D0" class="Textos">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="19" align="right" class="Textos"><b><i>
                          <?=$telefono?>
                        </i></b></td>
                        <td width="16" height="19" class="Textos">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="2" colspan="3" align="right"></td>
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
           <?  if(isset($detalles2) && !empty($detalles2))   {?>
		    <tr>
              <td height="1" colspan="2"><img src="images/blancogris.gif" width="100%" height="1"></td>
            </tr>
            <tr>
			<? }?>
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
              <td colspan="2" align="center" class="Blanco10"><img src="images/gris.jpg" width="100%" height="1"></td>
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
$loadone=$loadone. "CargarContenido('index_detalles_info.php?id=".$idfrombusqueda."&titulo=".$titulo."','contenidodetalles','refrescarlista')";
$loadone = $loadone.'</script>';  
?>
                          <tr>
                            <td class="Blanco10"><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                                <tr>
                                  <td bgcolor="#F1E09E" class="Blanco12"><div align="right">
                                      <p> <span class="Blanco16"><strong><a href=# onClick="CargarContenido('index_detalles_info.php?id=<?=$idfrombusqueda?>&titulo=<?=$titulo?>','contenidodetalles','refrescarlista')" >
                                        <?=$titulo?>
                                      </a></strong></span><em></em></p>
                                  </div></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="images/gris.jpg" width="100%" height="1"></td>
                          </tr>
                          <? } else {
 if  ($varcolorIndex == 1) { 
 			$varcolorIndex = 0 ;
    		$varcolor = "#F1E09E";
		} else {
		     $varcolorIndex = 1;
		     $varcolor = "#F8F0D0";
	  }

?>
                          <tr>
                            <td>
                              <table width="100%"  border="0" cellspacing="0" cellpadding="10">
                                <tr bgcolor="<? echo $varcolor?>">
                                  <td  class="Blanco12"><div align="right"> <a href=# onClick="CargarContenido('index_detalles_info.php?id=<?=$idfrombusqueda?>&titulo=<?=$titulo?>','contenidodetalles','refrescarlista')" >
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
                       //     <td><img src="images/gris.jpg" width="100%" height="1"></td>
                        //  </tr>
                        //  <tr>
                        //    <td><img src="images/gris.jpg" width="100%" height="1"></td>
                        //  </tr>

  }?>
                      </table></td>
                    </tr>
 	 
<? 
//////////// Si tiene beneficios muestro boton
if ($totalimg > 0) { ?>                 
  <tr>
                      <td class="Blanco10"><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td bgcolor="#F8F0D0" class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><span class="Blanco16"><strong><img src="images/beneficios2.gif" width="30" height="30"></strong></span></td>
                                <td><a href=# onClick="CargarContenido('index_detalles_beneficio.php?id=<?=$idfrombusqueda?>&titulo=<?=$titulo?>','contenidodetalles','refrescarlista')" style="text-decoration:none "><strong>B</strong><em class="Blanco12">eneficios</em><em class="Blanco12"> ...............</em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>



                    <tr>
                      <td><img src="images/gris.jpg" width="100%" height="1"></td>
                    </tr>
<? }?>
                 
<?  /// Si el lugar tiene activado el servicio de reservas y  consultas por ahora estan todos activos
// if(isset($encreservas) && !empty($encreservas)  && ($encr==1)  ) { ?>
   <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="images/mail.gif" width="30" height="30"></td>
                                <td><a href=# onClick="CargarContenido('index_contacto.php?consulta=<?=$idfrombusqueda?>','contenido','refrescarlista')"  style="text-decoration:none "><strong>C</strong><em class="Blanco12">onsultas y Reservas</em><em class="Blanco12"> </em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="images/gris.jpg" width="100%" height="1"></td>
                    </tr>

<? // }?>

                    <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td bgcolor="#F8F0D0" class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="22%"><img src="images/maila.gif" width="30" height="30"></td>
                                <td width="78%"><a href=#  onClick="NewWindow('index_recomendar.php?id=<?=$idfrombusqueda?>','recomendar','586','380','no','center','no','no','no','no');return false"    style="text-decoration:none "><strong>R</strong><em class="Blanco12">ecomendar lugar</em><em class="Blanco12"> </em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="images/gris.jpg" width="100%" height="1"></td>
                    </tr>
                   
<? 
//////////// Si esta seteada la pagina web del sitio
 if(isset($pagina) && !empty($pagina) ) {
 
?>  



 <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td class="Blanco12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="21%"><img src="images/web.gif" width="30" height="30"></td>
                                <td width="79%"><a href="http://<?=$pagina?>" target="_blank" style="text-decoration:none "><strong>P</strong><em class="Blanco12">agina Web</em><em class="Blanco12"> ...............</em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="images/gris.jpg" width="100%" height="1"></td>
                    </tr>

<? }?>


                    <tr>
                      <td class="Blanco12"><?  require_once('index_detalles_bar.php');?></td>
                    </tr>
                  </table></td>
                  <td width="1" bgcolor="#9A9A9A"><img src="images/gris.jpg" width="1" height="80%"></td>
                  <td width="544" valign="top"> <div id="contenidodetalles"></div>  	 </td>
                </tr>
              </table>  </td>
            </tr>
            
            <tr>
              <td colspan="2" class="Blanco10">
                <? // si tiene sucursaless para que las muestre
				
	
	$vart = strpos($direccion, "*");

if ($vart === false) {
    } else {
$letra="";

$nombre = str_replace("'", "\'", $nombre);
$sql2 = "select * from base where nombre like '%". $nombre. "%' AND telefono !='".$telefono. "'";

$qrysuc = @mysql_query($sql2) or die ("err sql6");   
 $totalrecords = @mysql_num_rows($qrysuc); 

echo "<BR><center><table class='Textos'><th align=left>Otras Sucursales:</th>";
echo "<tr bgcolor=#F1E09E bordercolor=#FFFFFF><td width=166 height=20 bgcolor=#F1E09E><div align=left><b>SUCURSAL</b></div></td><td width=122 height=20 bgcolor=#F1E09E><div align=left><b>DIRECCION</b></div></td><td width=97 height=20 bgcolor=#F1E09E><div align=left><b>TELEFONO(s)</b></div></td></tr>";
while ($row = @mysql_fetch_array($qrysuc)) {  

echo "<tr bgcolor=#F8F0D0><td>".$row['barrio']."</td><td>".$row['direccion']."</td><td>".$row['telefono']."</tr></td>";
 
 
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
              <td colspan="2" class="Blanco10">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="Blanco10">&nbsp;</td>
              <td align="right" class="Blanco10">
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
              <td width="53%" align="right" class="Textos10px">Visitas a
              <?=stripslashes($nombre) ?>
: <b>
<?=$visitas?>
</b></td>
            </tr>
          </table></td>
        </tr>
</table>
    </td>
  </tr>
</table>
<? if ($contone ==1) echo $loadone; 

 
 

?>
</body>
</html>
<?
}
require_once('includes/catalog.php'); 
$sqlvoto = "UPDATE base SET visitas = visitas +1 WHERE id='$idfrombusqueda'";//
	 mysql_query($sqlvoto) or die(mysql_error()); 

?>
