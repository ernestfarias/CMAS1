<? session_start();  ?>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<div id="contenido">
 
<?
if (!headers_sent()) {
header("Cache-Control: no-store, no-cache, must-revalidate");  
    exit;//eaf2010 SI YA MANDO HEADERS NO PODES MANDAR DE NUEVO, EL SESSION START VA ANTES QUE CUALQUIER COSA!!!
}


 if(isset($_GET['id']) && !empty($_GET['id']))
	{
	   $strprecio = $_GET['ordenprecio'];
 

if ($strprecio == 'todos') {
	$sqlprecio = "";} else {
	$sqlprecio = " AND precio ". $strprecio;
	}
	// if(isset($_GET['usr']) && !empty($_GET['usr'])) $usr = " AND id_usr='".$_GET['usr']."'";
	require_once('includes/catalog.php');	
require_once('includes/date.php');	

 	$limit = 10;
    $qry= "";
    $offset = 0;
	$sep = "";
	
if(isset($_GET["offset"]) && !empty($_GET["offset"])) //true le dio click a btn avance
{
	$offset = addslashes($_GET["offset"]);
}

	$idfrombusqueda = addslashes($_GET['id']);
 	$sqlcomentarios ="SELECT * from puntuaciones,usuarios   where puntuaciones.id_usr=usuarios.id  AND  id_base ='$idfrombusqueda' and mostrar=1". $sqlprecio . " order by fecha_visita desc";
	
	// echo $sqlcomentarios ;
	
	
	$sqllimit = " LIMIT " . $offset . "," . $limit; 
	
	$rscomentarios = @mysql_query($sqlcomentarios.$sqllimit) or die (mysql_error()."----->>>".$sqlcomentarios); 
	$totalcomentarios = @mysql_num_rows($rscomentarios); 
 
?>
<form name='frm_opc' id='frm_opc'>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>

<table width="100%"  cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0"  cellspacing="0">
      <tr>
        <td width="100%" colspan="2" bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
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
      <? if ($totalcomentarios >0) {?>
      <tr>
        <td colspan="2">
		<?  
		$cont =0;
	while ($row = @mysql_fetch_array($rscomentarios)) 
   { 
 $idvoto =  $row["0"];
 $idusr =  $row["id_usr"];
   $comidavotos = $row["comida"];
     $serviciovotos = $row["servicio"];
	   $ambientevotos = $row["ambiente"];
     $comentarios = utf8_encode(stripslashes($row["comentarios"]));
	  $fecha = cdate2($row["fecha_visita"]);
  $hora = $row["hora_visita"];
  $apodo =  $row["apodo"];
  
  $si =  $row["si"];
  $no =  $row["no"];
  
  if ($hora=="m") $hora = utf8_encode("mañana");
  if ($hora=="n") $hora = utf8_encode("noche");
  if ($hora=="medio") $hora = utf8_encode("mediodia");
  if ($hora=="t") $hora = utf8_encode("tarde");
 
 
 
  if(isset($comentarios) && !empty($comentarios)) {
   ?>

		
		<table width="100%"  cellspacing="0" cellpadding="0">
          <tr class="Blanco12">
            <td colspan="6">
			
			
			
			
			
			<table width="100%"  cellspacing="0" cellpadding="0">
              <tr>
                <td class="Blanco12"><table width="100%"  cellspacing="0" cellpadding="3">
                  <tr>
                    <td width="84%" height="30" class="Blanco12"><strong>Usuario :</strong>  <a href="detalles_usuarios.php?id=<?=$idusr?>">
                      <?=$apodo?>
                    </a></td>
                    <td width="16%" rowspan="2" class="Blanco12"><table width="177" align="right" cellpadding="2"  cellspacing="0">
                      <tr bgcolor="#851549">
                        <td colspan="2" class="Blanco12"><div align="center">&iquest;Est&aacute;s de acuerdo?</div></td>
                      </tr>
                      <tr>
                        <td width="50%" bgcolor="#B36464"><div align="right">
                            <div id="contenidosi<?=$cont?>"><strong>
                              <?=$si?>
                            </strong> <img src="includes/up.gif"     style="cursor:pointer" onClick="CargarContenido('detalles_votossino.php?id=<?=$idvoto?>&sino=si','contenidosi<?=$cont?>','contenidosi<?=$cont?>')"></div>
                        </div></td>
                        <td width="50%">
                          <div id="contenidono<?=$cont?>"><img src="includes/down.gif" width="11" height="18" style="cursor:pointer" onClick="CargarContenido('detalles_votossino.php?id=<?=$idvoto?>&sino=no','contenidono<?=$cont?>','contenidono<?=$cont?>')">
                              <?=$no?>
                        </div></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="Blanco12"><p><strong>Visita :</strong> <b>
                        <?=$fecha?>
                      </b> - <b>
                      <?=$hora?>
                      </b>.</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%"  cellspacing="0" cellpadding="2">
                  <tr>
                    <td bgcolor="#B36464"> <em class="Blanco12"><?=$comentarios?></em></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="Blanco12"><table width="100%"  cellspacing="0" cellpadding="2">
                  <tr>
                    <td><table width="100%"  cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="181" class="Blanco12"><strong>Comida: <img src="includes/<?=$comidavotos?>.gif" width="89" height="12"> </strong></td>
                        <td width="10">&nbsp;</td>
                        <td width="181" class="Blanco12"><strong>Servicio: <img src="includes/<?=$serviciovotos?>.gif" width="89" height="12"> </strong></td>
                        <td width="10">&nbsp;</td>
                        <td width="180" class="Blanco12"><strong>Ambiente: <img src="includes/<?=$ambientevotos?>.gif" width="89" height="12"></strong></td>
                        <td width="651">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="Blanco12">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" class="Blanco12"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
              </tr>
            </table>
			
			
			
			
			
			
			
			</td>
            </tr>
        </table>
		  <div align="center">
			<? 
			$cont = $cont +1;}
			} 
			
			
				recordsetNavAJAX($mysql_link,$sqlcomentarios,'detalles_comentarios.php?id='.$idfrombusqueda."&ordenprecio=".$strprecio,$qry ,$offset,$limit,'85%',1,1); 
			?>
		
          </div></td>
      </tr>
	  
	 <? } else { ?>
	  <tr bgcolor="#B36464">
                <td height="30" colspan="2" class="Blanco12"><table width="100%"  cellspacing="0" cellpadding="2">
                  <tr>
                    <td><p class="Blanco12">Aun este lugar no a recibido comentarios si desea dejar su comentario click <a href="comentarios.php?id=<?=$idfrombusqueda?>">aqui</a></p></td>
                  </tr>
                </table> </td>
			  </tr>
	 
	  <? } ?>
    </table></td>
   
  </tr>
</table>  </form>

</div>  

   
   
 <? } ?> 
