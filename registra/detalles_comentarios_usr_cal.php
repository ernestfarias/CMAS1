
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<div id="contenido">

<?
session_start();  
header("Cache-Control: no-store, no-cache, must-revalidate");


 if(isset($_GET['usr']) && !empty($_GET['usr']))
	{
	$id = $_GET['usr'];
	
	  $tipocal = $_GET['ordentipo'];
	   $strprecio = $_GET['ordenprecio'];
 

if ($strprecio == 'todos') {
	$sqlprecio = "";} else {
	$sqlprecio = " AND precio ". $strprecio;
	}

	 if(isset($_GET['usr']) && !empty($_GET['usr'])) $usr = " AND id_usr='$id'";
 
	require_once('includes/catalog.php');	

 	$limit = 20;
    $qry= "";
    $offset = 0;
	$sep = "";
	
if(isset($_GET["offset"]) && !empty($_GET["offset"])) //true le dio click a btn avance
{
	$offset = addslashes($_GET["offset"]);
}

	$idfrombusqueda = addslashes($_SESSION['idlugar']);
 	$sqlcomentarios ="SELECT * from puntuaciones,usuarios,base   where puntuaciones.id_usr=usuarios.id and puntuaciones.id_base=base.id  AND   mostrar=1".$usr .$sqlprecio." order BY " .$tipocal ."	DESC";
	
	 
	
	
	$sqllimit = " LIMIT " . $offset . "," . $limit; 
	
	$rscomentarios = @mysql_query($sqlcomentarios) or die (mysql_error()."----->>>".$sqlcomentarios); 
	$totalcomentarios = @mysql_num_rows($rscomentarios); 
 
?>
 
<form name='frm_opc' id='frm_opc'>
<table width="100%"  cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0"  cellspacing="0">
      <tr>
        <td colspan="2" bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#851549">
          <table width="100%"  cellspacing="0" cellpadding="5">
            <tr>
              <td width="41%">
                <div align="left"> <div id="refrescarlista"></div></div>
            </td>
              <td width="59%"><strong>Comentarios</strong></td>
            </tr>
          </table>
 </td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
      </tr>
        <tr>
          <td class="Blanco12">&nbsp;</td>
          <td class="Blanco12"><div align="right">
            Filtrar por Precios :
            <select name="opprecio" onChange="CargarContenido('detalles_comentarios_usr_cal.php?usr=<?=$id?>&ordentipo='+window.document.frm_opc.optipo.options[window.document.frm_opc.optipo.selectedIndex].value+'&ordenprecio='+window.document.frm_opc.opprecio.options[window.document.frm_opc.opprecio.selectedIndex].value,'contenidocomentario','contenidocomentario')">
                <option value="todos" <? if ($strprecio == 'todos') echo "selected";?>>Todos Los Lugares</option>
                <option value="<= 30"  <? if ($strprecio == '<=30') echo "selected";?>>Hasta 30 pesos</option>
                <option value=" BETWEEN 31 AND 50"  <? if ($strprecio == ' BETWEEN 31 AND 50') echo "selected";?>>De 31 hasta 50 pesos</option>
                <option value=">= 51"  <? if ($strprecio == '>=51') echo "selected";?>>De 51 en adelante</option>
            </select>
          </div></td>
        </tr>
        <tr>
          <td class="Blanco12">&nbsp;</td>
          <td class="Blanco12"><div align="right">
            Ordenar Calificacion por :
			
            <select name="optipo" onChange="CargarContenido('detalles_comentarios_usr_cal.php?usr=<?=$id?>&ordentipo='+window.document.frm_opc.optipo.options[window.document.frm_opc.optipo.selectedIndex].value+'&ordenprecio='+window.document.frm_opc.opprecio.options[window.document.frm_opc.opprecio.selectedIndex].value,'contenidocomentario','contenidocomentario')">
                <option value="comida" <? if ($tipocal == 'comida') echo "selected";?>> Comida</option>
                <option value="servicio"  <? if ($tipocal == 'servicio') echo "selected";?>>Servicio</option>
                <option value="ambiente"  <? if ($tipocal == 'ambiente') echo "selected";?>>Ambiente</option>
            </select>
			
          </div></td>
        </tr><? 	if ($totalcomentarios > 0) { ?>
        <tr>
                <td width="20%" class="Blanco12">&nbsp;</td>
                <td class="Blanco12">
				
				
				<table width="100%"  cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="135" height="18" class="Blanco12"><div align="center"><strong>Comida </strong></div></td>
                    <td width="8"><img src="includes/separadores.gif" width="5" height="19"></td>
                    <td width="125" class="Blanco12"><div align="center"><strong>Servicio</strong></div></td>
                    <td width="9"><img src="includes/separadores.gif" width="5" height="19"></td>
                    <td width="135" class="Blanco12"><div align="center"><strong>Ambiente</strong></div></td>
                    <td width="563">&nbsp;</td>
                  </tr>
                </table>
				
				
				
				</td>
        </tr><?  } else {?>
				<table width="100%"  cellspacing="0" cellpadding="0">
				  <tr>
                 
                    <td class="Blanco12" >No hay comentarios para las opciones seleccionadas</td>
                  </tr> </table>
				<? } ?>
      <tr>
        <td colspan="2">
		
		
		
		
		<?  
		$cont =0;
			$varcolorIndex=0;
	while ($row = @mysql_fetch_array($rscomentarios)) 
   { 
 $idvoto =  $row["0"];
 $idusr =  $row["id_usr"];
  $idlugar =  $row["id_base"];
   $comidavotos = $row["comida"];
     $serviciovotos = $row["servicio"];
	   $ambientevotos = $row["ambiente"];
     $comentarios = utf8_encode(stripslashes($row["comentarios"]));
	  $fecha = $row["fecha_visita"];
  $hora = $row["hora_visita"];
  $apodo =  $row["apodo"];
  
  $si =  $row["si"];
  $no =  $row["no"];
  
  if ($hora=="m") $hora = utf8_encode("mañana");
  if ($hora=="n") $hora = utf8_encode("noche");
  if ($hora=="medio") $hora = utf8_encode("mediodia");
  if ($hora=="t") $hora = utf8_encode("tarde");
  
  $nombre =  utf8_encode(stripslashes($row["nombre"]));

   if ($tipocal == 'comida') $calificacion = $comidavotos;
   if ($tipocal == 'servicio') $calificacion = $serviciovotos;
   if ($tipocal == 'ambiente') $calificacion = $ambientevotos;
   
   if ($calificacion == 1) $calificacion='Mala';
   if ($calificacion == 2) $calificacion='Regular';
   if ($calificacion == 3) $calificacion='Buena';
   if ($calificacion == 4) $calificacion='Muy Buena';
   if ($calificacion == 5) $calificacion='Excelente';
   
   #B36464
    if  ($varcolorIndex == 1) { 
 			$varcolorIndex = 0 ;
    		$varcolor = "#AE5959";
		} else {
		     $varcolorIndex = 1;
		     $varcolor = "#B36464";
	  }
   ?>

		
		<table width="100%"  cellspacing="0" cellpadding="0">
          <tr class="Blanco12">
            <td colspan="6">
			
			
			
			
			
			<table width="100%"  cellspacing="0" cellpadding="0">
              <tr>   <? 
		  // echo $calificacionant. "==" .$calificacion;
		   if ($calificacionant == $calificacion) {
		   } else {
		   ?>
		      <tr>
                <td bgcolor="#FFFFFF" class="Blanco12"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
              </tr>
			  
			  <?  }?>
                <td><table width="100%" cellpadding="2"  cellspacing="0"  >
            <?    if ($calificacionant != $calificacion) {    ?>
				  <tr>
                    <td class="Blanco12"><?=ucfirst($tipocal).  " <b>".$calificacion."</b>"?></td>
                  </tr>
				 <? } ?>
                </table></td>
              </tr>
              <tr>
                <td class="Blanco12"><table width="100%" cellpadding="2"  cellspacing="0" bgcolor="<?=$varcolor?>">
                  <tr>
                    <td width="20%" class="Blanco12"><a href="detalles.php?id=<?=$idlugar?>">
                      <?=$nombre?>
                      </a></td>
                    <td width="80%"><table width="100%"  cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="95" height="18" class="Blanco12"><strong><img src="includes/<?=$comidavotos?>.gif" alt="Comida" width="89" height="12"> </strong></td>
                        <td width="1"><img src="includes/separadores.gif" width="5" height="19"></td>
                        <td width="96" class="Blanco12"><strong><img src="includes/<?=$serviciovotos?>.gif" alt="Servicio" width="89" height="12"> </strong></td>
                        <td width="10"><img src="includes/separadores.gif" width="5" height="19"></td>
                        <td width="219" class="Blanco12"><strong><img src="includes/<?=$ambientevotos?>.gif" alt="Ambiente" width="89" height="12"></strong></td>
                        <td width="591">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>

            </table>
			
			
			
			
			
			
			
			</td>
            </tr>
        </table>
		  <div align="center">
			<?
			$cont = $cont +1;
			 $calificacionant = $calificacion;
			}
			
			
				//recordsetNavAJAX($mysql_link,$sqlcomentarios,'detalles_comentarios.php?id='.$idfrombusqueda."&ordenprecio=".$strprecio,$qry ,$offset,$limit,'85%',1,1); 
			?>
		
          </div></td>
      </tr>
    </table></td>
   
  </tr>
</table> </form> 
</div>  
  
   
   
 <? } ?> 
 