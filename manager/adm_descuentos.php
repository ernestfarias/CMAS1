	<?  
	   include('check2.php'); 
	  $_SESSION['op'] = 'descuentos';
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
	 
	   if (isset($_GET["action"]) && !empty($_GET["action"])) 
	   {
			 	 
				$idr = $_GET["idr"]; 

				/// nueva nota
				if ($_GET["action"] == "new"){
				
				$users_query ="INSERT INTO `descuentos` (`id_base`) VALUES ('$id')";
				mysql_query($users_query) or die ("err sq3");
				 
				
				}
				
				if ($_GET["action"] == "killdesc")
					{
					$users_query = "DELETE from descuentos where id ='$idr'";
					mysql_query($users_query) or die ("err sql1");
					}

				if ($_GET["action"] == "adddesc")
					{
					if (isset($_POST["textimg".$_GET["idc"]]) && !empty($_POST["textimg".$_GET["idc"]])) $detalles = $_POST["textimg".$_GET["idc"]];
						
						$porcent = $_POST["porcent".$_GET["idc"]];
						$fecha_ini = edate2($_POST["fecha_ini".$_GET["idc"]]);
						$fecha_fin = edate2($_POST["fecha_fin".$_GET["idc"]]);
		             
						$users_query = "UPDATE `descuentos` SET `detalles` = '$detalles',`descuentos` = '$porcent',`fecha_ini` = '$fecha_ini' ,`fecha_fin` = '$fecha_fin'  WHERE `id` = '$idr'";
					    mysql_query($users_query) or die (mysql_error()."UPDATE"); 
							
					}
							 
							 
					
	   
			} // Primer IF
	   
		$bannertop = "../banners/topbrochette.gif";
		   
	$users_query1 = "Select * from encargados where usr ='$usr'  ";
			$users_display = @mysql_query($users_query1) or die ("a"); 
			$row = @mysql_fetch_array($users_display);  
	  
		   $IDT = $row['nombreLugar'] ;   
	  $encnombre =  stripslashes($row['encnombre']) ;

	$sqlimagenes = "Select * from descuentos where id_base ='$IDT' ";
	$rsdescuentos= @mysql_query($sqlimagenes) or die (mysql_error()."4"); 
	 $totalimg = @mysql_num_rows($rsdescuentos);   
	
 
	
	?>
	
	
	<html>
	<head>
	<script language="JavaScript" type="text/JavaScript" src="../includes/crnet.js"></script>
	<script language="JavaScript1.2">
	<!--
	var win=null;
function NewWindowEAF(mypage,myname,w,h,scroll,pos,status,menu,tool,res){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status='+status+',menubar='+menu+',toolbar='+tool+',resizable='+res+'';
win=window.open(mypage,myname,settings);}


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
	<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
	<link rel="stylesheet" type="text/css" media="all" href="../includes/calendar-win2k-cold-1.css" title="win2k-cold-1" />
  <script type="text/javascript" src="../includes/calendar.js"></script>
  <script type="text/javascript" src="../includes/calendar-es.js"></script>
 <script type="text/javascript" src="../includes/calendar-setup.js"></script>
	</head>
	
	<body leftmargin="0" topmargin="0" onLoad="">
	 
	<form name="form1" method="POST" action="adm_descuentos.php" enctype="multipart/form-data">
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
						
						
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                        
						  <tr>
                            <td>
							
							
							
							</td>
                          </tr>
                          <tr>
                            <td valign="middle"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td><p class="Blanco12">Aqu&iacute; ud podr&aacute; subir sus descuentos para publicarlos, los mismos estar&aacute;n disponibles en sus detalles. <br>
                                  Cuenta con algunos datos a completar aparte del descuento o beneficio que este implica, que son fijar el rango en fechas de validez y agregarle un detalle al mismo.<br>
                                        <br>
                                    </p>
                                  </td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                          </tr>
						  <tr>
                            <td>&nbsp; </td>
                          </tr>
                          <tr>
                            <td>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
							
							<? 
						 $cont = 0;
 
						 while ($row = @mysql_fetch_array($rsdescuentos)) {
						 $id_desc =  $row['id'];
						 
						  $detalles = $row['detalles'] ;
							  $descuento = $row['descuentos'] ; 
								  $fecha_ini = cdate2($row['fecha_ini']); 
								  $fecha_fin = cdate2($row['fecha_fin']); 
						 $cont = $cont +1;
						 ?>
							<tr>
							  <td height="3" colspan="7" valign="top"> 
							</td>  
							</tr>
							 
							<tr>
							  <td width="3%" height="58" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif"><span class="Naranja10"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">
							  </a>
							          
							  </b></span></font> </td>
							  <td width="4%" valign="middle"><strong><?=$cont?></strong></td>
							  <td width="9%" valign="top"><div align="center"><font face="Verdana, Arial, Helvetica, sans-serif">
							      <span class="BlancoBold14"><b>%
                                  </b></span><b>                                </b><span class="Naranja10"><b>                                  <select name="porcent<?=$cont?>" id="porcent">
                                        <option value="10" <? if ($descuento == '10') echo "selected" ;?>>10</option>
                                        <option value="15"<? if ($descuento == '15') echo "selected" ;?>>15</option>
                                        <option value="20"<? if ($descuento == '20') echo "selected" ;?>>20</option>
                                        <option value="25"<? if ($descuento == '25') echo "selected" ;?>>25</option>
                                        <option value="30"<? if ($descuento == '30') echo "selected" ;?>>30</option>
                                        <option value="40"<? if ($descuento == '40') echo "selected" ;?>>40</option>
                                        <option value="50"<? if ($descuento == '50') echo "selected" ;?>>50</option>
                                        <option value="100"<? if ($descuento == '100') echo "selected" ;?>>100</option>
                                          </select>
							      </b></span></font></div></td>
							  <td width="18%" valign="top">Desde
							    <br>
							    <input name="fecha_ini<?=$cont?>" type="text" id="fecha_ini<?=$cont?>" value="<?=$fecha_ini?>" size="10" maxlength="10" readonly>

<img src="../includes/img.gif" id="f_trigger_c<?=$cont?>" style="cursor: pointer; border: 1px solid red;" title="Calendario"
      onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />

<script type="text/javascript">
    Calendar.setup({
        inputField     :    "fecha_ini<?=$cont?>",     // id of the input field
        ifFormat       :    "%d/%m/%Y",      // format of the input field
        button         :    "f_trigger_c<?=$cont?>",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
</script></td>
							  <td width="20%" valign="top">Hasta<br>							    <input name="fecha_fin<?=$cont?>" type="text" id="fecha_fin<?=$cont?>" value="<?=$fecha_fin?>" size="10" maxlength="10" readonly>

<img src="../includes/img.gif" id="f_trigger_f<?=$cont?>" style="cursor: pointer; border: 1px solid red;" title="Calendario"
      onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />

 <script type="text/javascript">
    Calendar.setup({
        inputField     :    "fecha_fin<?=$cont?>",     // id of the input field
        ifFormat       :    "%d/%m/%Y",      // format of the input field
        button         :    "f_trigger_f<?=$cont?>",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
</script></td>
							  <td width="42%" valign="top"> <strong><span class="Naranja14">
							    </span></strong><font face="Verdana, Arial, Helvetica, sans-serif"><span class="Naranja10"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');"><br>
							    <br>
                              </a></b></span></font><span class="Naranja10"><font face="Verdana, Arial, Helvetica, sans-serif"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">Detalle del descuento</a></b></font><br>
                              (click para agregar/modificar/eliminar) <font face="Verdana, Arial, Helvetica, sans-serif"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">
                              
                              </a></b></font></span></td>
							  <td width="4%" valign="top"><span class="Naranja10"><font face="Verdana, Arial, Helvetica, sans-serif"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">
							    <textarea name="textimg<?=$cont?>" cols="1" rows="1" style="width=0px;border:0;visibility: hidden;"  id="textarea4"><?=$detalles?> 
                                </textarea>
							  </a></b></font></span></td>
							</tr>
							<tr>
							  <td colspan="7" valign="top"><input name="textimg<?=$cont?>add" type="text" id="textimg<?=$cont?>add3" style="border:0; font-size:9px ;COLOR: #FFFFFF; background:#AE5959; font" size="30" readonly></td>
							  </tr>
							<tr>
							  <td colspan="7" valign="top"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
						    </tr>
							<tr>
							
							  <td colspan="7" valign="top">                                  <div align="right">
                                  <span class="Blanco10">                                  </span>
<input type="button" name="Submit3" value="Ver Cupon <?=$cont?>" onClick="NewWindowEAF('../cupon.php?id=<?=$id_desc?>&action=ver','cupon','586','160','no','center','no','no','no','no');return false" style=" height:20px; font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">                                

   <input type="button" name="Submit3" value="Actualizar <?=$cont?>" onClick="document.form1.action='adm_descuentos.php?action=adddesc&idc=<?=$cont?>&idr=<?=$id_desc?>';document.form1.submit();" style=" height:20px; font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">
                                  <input type="button" name="Submit33" value="Eliminar <?=$cont?>" onClick="document.form1.action='adm_descuentos.php?action=killdesc&idr=<?=$id_desc?>&mod=not';document.form1.submit();" style="height:20pxfont-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">
                               
                              </div></td>
						    </tr>
							  <? } ?>
						  </table>
</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>
						<input type="button" name="Submit32" value="Nuevo Descuento / Beneficio (<?=$totalimg?>)" onClick="document.form1.action='adm_descuentos.php?action=new';document.form1.submit();" style="height:20px;font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  >
						  <span class="BlancoBold10">
						 
					    </span>
						
						 
						</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>
							</td>
                          </tr>
						 
                        </table>
						
						
						
						
						
						
						
						
						
						
						</td>
					  
					  </tr>
					  <tr>
					    <td>&nbsp;</td>
				      </tr>
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
			  <td height="24"><? require_once('../includes/bot2.php')?></td>
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
