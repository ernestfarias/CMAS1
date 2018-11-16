<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK href= "includes/style.css" type=text/css rel=stylesheet>
 <br><?php 


if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
	$idfrombusqueda = addslashes($_GET["id"]);
	$titulo = addslashes($_GET["titulo"]);
 
	require_once('includes/catalog.php');	
 	require_once('includes/date.php'); 
	require_once('includes/impresiones.php'); 


	///////////// Guarda cuantas veces los usuarios hicieron click en este beneficio 
	$imp = new impresiones;	
	$tipo = "descuentos";
	$updatereg = $imp->saveimpresiones($tipo,$idfrombusqueda);
	unset ($updatereg);

	 $sqldescuento ="SELECT * from descuentos where id_base ='$idfrombusqueda' order by fecha_fin desc";
	 $rsdescuento = @mysql_query($sqldescuento) or die ("ERROR: The query failed.1"); 
	 $totaldescuento = @mysql_num_rows($rsdescuento); 
 
	while ($row = @mysql_fetch_array($rsdescuento)) 
   { 
 
   $id_desc = $row['id'] ; 
 
 $detalles = utf8_encode ($row["detalles"]); 
							  $descuento = $row['descuentos'] ; 
								  $fecha_ini = cdate2($row['fecha_ini']); 
								  $fecha_fin = cdate2($row['fecha_fin']); 
 ?>


<table width="90%"  border="1" align="center" cellpadding="0" cellspacing="0">
  
  <tr class="Textos">
    <td width="13%" bgcolor="#F1E09E">
    <div align="center"><strong>
      <?=$descuento?>
    %</strong></div></td>
    <td width="87%"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td bgcolor="#F8F0D0" class="Blanco12"><?=$detalles?></td>
      </tr>
    </table></td>
  </tr>
<tr>
    <td colspan="2" class="Textos">V&aacute;lido desde el <?=$fecha_ini?>      hasta      <?=$fecha_fin?></td>
  </tr>
</table>
<table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="right"><input type="button" name="Submit3" value="Imprimir Cupon" onClick="NewWindow('cupon.php?id=<?=$id_desc?>&action=print','cupon','586','160','no','center','no','no','no','no');return false" style=" height:20px; font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#B15759"></div></td>
  </tr>
</table>
<br>
<? }}?>