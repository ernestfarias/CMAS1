	<?  
	   include('check.php'); 
	  $_SESSION['op'] = 'reservas';
	  $id = $_SESSION['id'];
	  $usrtext = $_SESSION['usernametext'];
	    if (isset( $_SESSION['encnotas']) && !empty( $_SESSION['encnotas'])) $cantimg = $_SESSION['encnotas'];
	 
	 require_once('../includes/catalog.php');
	 require_once('../includes/resize.php');
 require_once('../includes/date.php');
	 $usr = $usrtext;
	 //$id =  "2882";
	 $wwwroot = "D:/Inetpub/wwwroot/php/comermas.com.ar"; 
	 $wwwroot = "/home/rm000120/public_html";
	 $wwwrooti = "http://www.comermas.com.ar"; 
	 
 
	   
		$bannertop = "../banners/topbrochette.gif";
		   
	$users_query1 = "Select * from encargados where usr ='$usr'  ";
			$users_display = @mysql_query($users_query1) or die ("a"); 
			$row = @mysql_fetch_array($users_display);  
	  
		   $IDT = $row['nombreLugar'] ;   
	  $encnombre =  stripslashes($row['encnombre']) ;
 $encr =  stripslashes($row['encr']) ;
	$sqlimagenes = "Select * from imagenes where id_base ='$IDT' ";
	$rsimagenes= @mysql_query($sqlimagenes) or die (mysql_error()."4"); 
	 $totalimg = @mysql_num_rows($rsimagenes);   
	
 
	
	?>
	
	
	<html>
	<head>
	<script language="JavaScript" type="text/JavaScript" src="../includes/crnet.js"></script>
	<script language="JavaScript1.2">
	<!--
	
	function returner(act){
	var i = act
	if (i == 'return') {
		window.document.form1.action =".php"
		
		window.form1.submit();
		}
	}
	
	function refreshpage(act){
		window.document.form1.accion2.value = act;
		window.form1.submit();
	}
	function Verificador(vari){
		var error = '';
	
		if (window.document.form1.textnombre.value.length == 0)
			error = error + 'Especificar nombre \n'; 

		if (error!='')
			alert(error);
		else
			{
			window.document.form1.accion.value = vari;	 
			
			window.form1.submit();		
			 }
		}
	
	  
			function reply(var1){

var win=null;
w = 430;
h = 280;
mypage = 'adm_reply.php?id='+var1;
myname = 'responder';

LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);
 
}

	  
	// -->
	</script>
	<?php  session_start(); ?>
	<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
	<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
	<meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
	<meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
	<meta name="robots" content="all|index|follow">
	<META name="Author" content="Farias Ernesto, Cristian Magnone">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
	<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title>
	<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
	<link rel="stylesheet" type="text/css" href="../includes/tooltip.css.php" />
	<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
	
	</head>
	<script src="../includes/tooltip.js" type="text/javascript"language="javascript"></script>
	<body leftmargin="0" topmargin="0" onLoad="">
	
 
<div id="TooltipContainer" onmouseover="holdTooltip();" onmouseout="swapTooltip('default');"></div> 
<form name="form1" method="POST" action="admmanager.php" enctype="multipart/form-data">
	<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr> 
		<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr> 
			  <td height="1"><img src="Marcos/Blanco/Blanco.gif" width="1" height="1"></td>
			</tr>
			<tr> 
			  <td width="779" height="90"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="90" background="../banners/topmanager.gif" bgcolor="ae5959">&nbsp;</td>
				  </tr>
				  <tr>
					<td width="777" bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
				  </tr>
				</table></td>
			</tr>
		  </table>
		  <table width="777" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="AE5959">
			<tr> 
			  <td width="20">&nbsp;</td>
			  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td height="15"> <? 	 require_once('top.php'); ?>
				  </td>
			    </tr>
				
			  </table>
				<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
					 
					   <tr>
						   <td></td>
					  </tr>
					  
						
						 
						    
					  <tr>
						<td>
						
						<? if ($encr ==1) {?>
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    
						  <tr>
                            <td>
							
							
							
							</td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                          </tr>
                          <tr>
                            <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                          </tr>
						  <tr>
                            <td><table width="100%%"  border="0" cellspacing="0" cellpadding="3">
                              <tr bgcolor="#851549">
                                <td width="2%">&nbsp;</td>
                                <td width="10%" class="Blanco12">Fecha</td>
                                <td width="12%" class="Blanco12">Hora</td>
                                <td width="14%" class="Blanco12">Tipo</td>
                                <td width="19%" class="Blanco12">Nombre</td>
                                <td width="14%" class="Blanco12">Telefono</td>
                                <td width="16%" class="Blanco12">Correo</td>
                                <td width="13%" class="Blanco12">Estado</td>
                              </tr>
<?

 $sql = "SELECT * FROM reservas LEFT JOIN base ON reservas.id_base = base.id where reservas.id_base= '$id'";
//echo $sql;
 $qryreservas= @mysql_query($sql) or die ("1ee");
// $rsreservas = mysql_fetch_Array($qryreservas);
  $totalreservas = @mysql_num_rows($qryreservas);   


 while ($row = @mysql_fetch_array($qryreservas)) {
 $idr =  $row['0'];
						 $fecha =  $row['fecha'];
						 $hora = $row['hora'] ;
						 $tipo = $row['tipo'] ;
						 $nombre = $row['2'] ; 
						$telefono = $row['telefono'] ; 
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
                                <td><img class="lightbulb" src="../includes/images/button_primary.jpg" width="11" height="13" onmouseover="pmaTooltip('<?=$detalles?><br>-----------------------------------------------------------------------------<br> <a href=# onclick=reply(<?=$idr?>)>Responder</a>'); return false;" onmouseout="swapTooltip('default'); return false;" /></td>
                                <td><?=cdate($fecha)?></td>
                                <td><?=$hora?></td>
                                <td><?=$tipo?></td>
                                <td><?=$nombre?></td>
                                <td><?=$telefono?></td>
                                <td><?=$correo?></td>
                                <td><?=$marca?></td>
                            </tr>

<? } ?>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
						 
							<tr>
                            <td colspan="2" class="Blanco12"> <img src="../botones/blancogris.gif" width="100%" height="2">
                            </tr>
							 
                        </table>
						
						
						
						
						
						
						</td>
					  
					  </tr>

						<? } else { ?>
						
						
						<tr>
          <td colspan="2" class="Blanco12">Servicio RESERVAS Y CONSULTAS. no contratado. 
                            </tr>
        <tr>
          <td colspan="2" class="Blanco12"> <img src="../botones/blancogris.gif" width="100%" height="2"> 
        </tr>


<? } ?>
					  <tr>
					    <td>&nbsp;</td>
				      </tr>
					 
					  <tr>
					    <td valign="top">&nbsp;</td>
					  </tr>
					  <tr>
					    <td>&nbsp;</td>
				      </tr>
					  <tr>
						<td width="82%"> 
						
						
						
						
						  <div align="right">
						</div></td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
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
			  <td height="24"><? require_once('bot.php')?></td>
			</tr>
			<tr> 
			  <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
			</tr>
		  </table></td>
	  </tr>
	</table>
	</form>




	</body>
	
	
	</html>
