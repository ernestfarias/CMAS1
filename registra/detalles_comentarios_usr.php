
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<div id="contenido">

<?
session_start();  
header("Cache-Control: no-store, no-cache, must-revalidate");


 if(isset($_GET['usr']) && !empty($_GET['usr']))
	{
	$id = stripslashes($_GET['usr']);
	// echo $id."<br>";
	 if(isset($_GET['usr']) && !empty($_GET['usr'])) $usr = " AND id_usr='$id' ";
 
	require_once('includes/catalog.php');	
	require_once('includes/date.php');	
   $strprecio = $_GET['ordenprecio'];
 

if ($strprecio == 'todos') {
	$sqlprecio = "";} else {
	$sqlprecio = " AND precio ". $strprecio;
	}
 	$limit = 20;
    $qry= "";
    $offset = 0;
	$sep = "";
	
if(isset($_GET["offset"]) && !empty($_GET["offset"])) //true le dio click a btn avance
{
	$offset = addslashes($_GET["offset"]);
}

	$idfrombusqueda = addslashes($_SESSION['idlugar']);
 	//$sqlcomentarios ="SELECT * from puntuaciones,usuarios,base   where puntuaciones.id_usr=usuarios.id and puntuaciones.id_base=base.id  AND   mostrar=1".$usr;
	$sqlcomentarios ="SELECT * from puntuaciones,usuarios,base   where puntuaciones.id_usr=usuarios.id and puntuaciones.id_base=base.id   and mostrar=1".$usr . $sqlprecio . " order by fecha_visita desc";
 
	
//echo $sqlcomentarios;
	
	
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
      <tr bgcolor="#B36464"> 
        <td><table width="100%"  cellspacing="0" cellpadding="5">
          <tr>
            <td class="Blanco12">&nbsp;</td>
          </tr>
        </table></td>
        <td><div align="right"><span class="Blanco12">Filtrar por Precios :</span>
            <select name="opprecio" onChange="CargarContenido('detalles_comentarios_usr.php?usr=<?=$id?>&ordenprecio='+window.document.frm_opc.opprecio.options[window.document.frm_opc.opprecio.selectedIndex].value,'contenidocomentario','contenidocomentario')">
              <option value="todos" <? if ($strprecio == 'todos') echo "selected";?>>Todos Los Lugares</option>
              <option value="<= 31"  <? if ($strprecio == '<= 31') echo "selected";?>>Hasta 30 pesos</option>
              <option value=" BETWEEN 31 AND 50"  <? if ($strprecio == ' BETWEEN 31 AND 50') echo "selected";?>>De 31 hasta 50 pesos</option>
              <option value=">= 51"  <? if ($strprecio == '>= 51') echo "selected";?>>De 51 en adelante</option>
            </select>
        </div></td>
      </tr>
      <tr>
        <td colspan="2">
		
		
		
		
		<?  
		$cont =0;
	while ($row = @mysql_fetch_array($rscomentarios)) 
   { 
 $idvoto =  $row["0"];
 $idusr =  $row["id_usr"];
  $idlugar =  $row["id_base"];
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
  
  $nombre =  utf8_encode(stripslashes($row["nombre"]));
    if(isset($comentarios) && !empty($comentarios)) {
   ?>

		
		<table width="100%"  cellspacing="0" cellpadding="0">
          <tr class="Blanco12">
            <td colspan="6">
			
			
			
			
			
			<table width="100%"  cellspacing="0" cellpadding="0">
              <tr>
                <td class="Blanco12"><table width="100%"  cellspacing="0" cellpadding="5">
                  <tr>
                    <td width="78%" class="Blanco12">El comentario fue realizado para el lugar <a href="detalles.php?id=<?=$idlugar?>"><?=$nombre?></a></td>
                    <td width="22%" class="Blanco12">&nbsp;</td>
                  </tr>
                </table> </td>
              </tr>
              <tr>
                <td class="Blanco12"><table width="100%"  cellspacing="0" cellpadding="5">
                  <tr>
                    <td class="Blanco12"><p>Visitado el <b>
                        <?=$fecha?>
                      </b> por la <b>
                      <?=$hora?>
                      </b>.</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%"  cellspacing="0" cellpadding="5">
                  <tr>
                    <td bgcolor="#B36464"> <em class="Blanco12"><?=$comentarios?></em></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="Blanco12"><table width="100%"  cellspacing="0" cellpadding="5">
                  <tr>
                    <td><table width="100%"  cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="174" class="Blanco12"><strong>Comida: <img src="includes/<?=$comidavotos?>.gif" width="89" height="12"> </strong></td>
                        <td width="18">&nbsp;</td>
                        <td width="182" class="Blanco12"><strong>Servicio: <img src="includes/<?=$serviciovotos?>.gif" width="89" height="12"> </strong></td>
                        <td width="10">&nbsp;</td>
                        <td width="181" class="Blanco12"><strong>Ambiente: <img src="includes/<?=$ambientevotos?>.gif" width="89" height="12"></strong></td>
                        <td width="660">&nbsp;</td>
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
			$cont = $cont +1;
			}
			}
			
				recordsetNavAJAX($mysql_link,$sqlcomentarios,'detalles_comentarios_usr.php',$qry ,$offset,$limit,'85%',1,1); 
			?>
		
          </div></td>
      </tr>
    </table></td>
   
  </tr>
</table>   </form>
</div>  
  
   

 <? } ?> 
   