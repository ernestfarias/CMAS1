<HTML>
<HEAD>
<title>SuperMEGAAdmin 2.0v</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
	<link rel="stylesheet" type="text/css" href="../includes/tooltip.css.php" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8">
	 

</HEAD>
<script src="../includes/tooltip.js" type="text/javascript"language="javascript"></script>
<?
   include('check.php'); 
     $wwwroot = "D:/Inetpub/wwwroot/php/comermas.com.ar"; 
	 $wwwroot = "/home/rm000120/public_html";
	 $wwwrooti = "http://www.comermas.com.ar"; 
	 
//error_reporting(E_ALL); //quiero ver todos los errores
session_start();
//Ne conecto a la DB lo cambie por el catalog que es lo mismo que lo que estaba solo con una funcion para paginar demas ahi dentro.
require_once('../includes/catalog.php');
require_once('../includes/date.php');

// Se levanta offset utilizado para posisionar paginador.
	if(isset($_GET["offset"]) && !empty($_GET["offset"]))
	{
	$offset = addslashes($_GET["offset"]);
 	} else {
    $offset = 0;
	}
$limit = 20;


 $sql = "SELECT COUNT(base.id) as info, base.nombre FROM reservas LEFT JOIN base ON reservas.id_base = base.id group by base.id order by info DESC";
 $sqllimit = " LIMIT " . $offset . " , " . $limit; 
 $qryreservas = @mysql_query($sql.$sqllimit) or die("ERROR: 4 " . mysql_error());
	 

 
 $totalreservas = @mysql_num_rows($qryreservas);   
?>


<body leftmargin="0" topmargin="0" onLoad="">
	
 
<div id="TooltipContainer" onmouseover="holdTooltip();" onmouseout="swapTooltip('default');"></div> 
<br>
<br>
<br>
<? recordsetNav($mysql_link,$sql,'adm_reservas_order.php',$qry ,$offset,$limit,'100%',1,1) ?>
<form name="frm" action="adm_reservas.php" method="post">
<table width="100%%"  border="0" cellspacing="0" cellpadding="3">
                              <tr bgcolor="#851549">
                                <td width="2%"><font size="1">&nbsp;</font></td>
                                <td width="25%"><span class="Blanco12"><font size="1">Nombre</font></span></td>
                                <td colspan="7" class="Blanco12"><font size="1">Total</font></td>
                              </tr>
<?




 while ($row = @mysql_fetch_array($qryreservas)) {
 $idr =  $row['0'];
 $nombrelugar =  $row['1'];						
 $fecha =  $row['fecha'];
  $total = $row['info'] ;
						 $hora = $row['hora'] ;
						 $tipo = $row['tipo'] ;
						 $nombre = $row['2'] ; 
						$telefono = $row['3'] ; 
						$correo= $row['correo'] ;
						 $detalles = $row['detalles'] ;
						 $marca = $row['marca'] ;
if ($tipo =="R") $tipo = "RESERVA";
if ($tipo=="C") $tipo = "CONSULTA";
if ($marca =="0") $marca = "Sin Respuesta	";
if ($marca=="1") $marca = "Respuesta Enviada";

$detalles = str_replace(chr(10), "&nbsp;", $detalles);
$detalles = str_replace(chr(13), "<br>", $detalles);
  if  ($varcolorIndex == 1) { 
 			$varcolorIndex = 0 ;
    		$varcolor = "#AE5959";
		} else {
		     $varcolorIndex = 1;
		     $varcolor = "#B36464";
	  }
?>  
                            <tr bgcolor="<? echo $varcolor?>"  class="Blanco10">
                                <td>&nbsp;</td>
                                <td><font size="1">
                                  <?=$nombrelugar?>
                                </font></td>
                                <td colspan="7"><font size="1">
                                  <?=$total?>
                                </font></td>
                            </tr>

<? } ?>
                              <tr>
                                <td colspan="2"><font size="1">&nbsp;</font></td>
                                <td width="1%"><font size="1">&nbsp;</font></td>
                                <td width="7%"><font size="1">&nbsp;</font></td>
                                <td width="7%"><font size="1">&nbsp;</font></td>
                                <td width="21%"><font size="1">&nbsp;</font></td>
                                <td width="8%"><font size="1">&nbsp;</font></td>
                                <td width="29%" colspan="2"><font size="1">&nbsp;</font></td>
                              </tr>
</table>
<button style="font-size:8pt" onClick="document.frm.action='adm.php';document.frm.submit();">Volver</button>
</form>
<br>
</BODY>
</HTML>

