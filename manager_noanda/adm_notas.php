	<?  
	   include('check.php'); 
	  $_SESSION['op'] = 'notas';
	  $id = $_SESSION['id'];
	  $usrtext = $_SESSION['usernametext'];
	    if (isset( $_SESSION['encnotas']) && !empty( $_SESSION['encnotas'])) $cantimg = $_SESSION['encnotas'];
	 
	 require_once('../includes/catalog.php');
	 require_once('../includes/resize.php');
	 $usr = $usrtext;
	 //$id =  "2882";
	 $wwwroot = "D:/Inetpub/wwwroot/php/comermas.com.ar"; 
	 $wwwroot = "/home/rm000120/public_html";
	 $wwwrooti = "http://www.comermas.com.ar"; 
	 
	   if (isset($_GET["action"]) && !empty($_GET["action"])) 
	   {
			 	if ($_GET["action"] == "killpic")
				{	
				$fotoset = $_GET["fotoset"]; 
				
					
					$users_queryx = "select * from imagenes  WHERE `id` = '$fotoset'";
					
				
					$users_displayx = @mysql_query($users_queryx) or die ("err sql5"); 
					$row = mysql_fetch_Array($users_displayx);
					$imagen = $row['imagen']; 
					$imagen = $wwwroot."/fotos/". $imagen; 
				
					if (file_exists($imagen)) unlink($imagen);
					$imagen = $row['imagen']; 
					$imagen = $wwwroot."/fotos/m_". $imagen; 
					if (file_exists($imagen)) unlink($imagen);
					if ($_GET["mod"] == "img")  $users_query = "UPDATE `imagenes` SET `imagen` = '' WHERE `id` = '$fotoset'";
					if ($_GET["mod"] == "not") $users_query = "DELETE from imagenes where id ='$fotoset'";
					
					//echo $users_query;
					mysql_query($users_query) or die ("err sql1");
				}
				
				
				
				
				/// nueva nota
				if ($_GET["action"] == "new"){
				
				$sqlimagenes = "Select * from imagenes where id_base ='$id' ";
				$rsimagenes= @mysql_query($sqlimagenes) or die (mysql_error()."4"); 
				$totalimg = @mysql_num_rows($rsimagenes);   
				
				if ($totalimg +1 < $cantimg+1) {
				
				$users_query ="INSERT INTO `imagenes` (`id_base`) VALUES ('$id')";
				mysql_query($users_query) or die ("err sq3");
				}
				
				}
				
				if ($_GET["action"] == "addpic")
					{
					$detalles ="";
					$titulo == "";
					$imgid =  $_GET["imgid"]; 	
					$fotoset = "foto". addslashes($_GET["fotoset"]); 	
					$adjfoto = 'adj'.$fotoset;

					if (isset($_POST["textimg".$_GET["fotoset"]]) && !empty($_POST["textimg".$_GET["fotoset"]])) $detalles = $_POST["textimg".$_GET["fotoset"]];
					if (isset($_POST["texttitulo".$_GET["fotoset"]]) && !empty($_POST["texttitulo".$_GET["fotoset"]])) $titulo = $_POST["texttitulo".$_GET["fotoset"]];
					if (isset($_POST["textmodo".$_GET["fotoset"]]) && !empty($_POST["textmodo".$_GET["fotoset"]])) $modo = $_POST["textmodo".$_GET["fotoset"]];

						if (is_uploaded_file($HTTP_POST_FILES[$adjfoto]['tmp_name']))
							{
							
							 
							
							$destino1 = $id . "_" . $_FILES[$adjfoto]['name'];
							$destino2 = "m_".$id . "_" . $_FILES[$adjfoto]['name'];
								
							$userfilename = $adjfoto;
							$filename = $HTTP_POST_FILES[$userfilename]['tmp_name'];
							$realname = $id . "_" . $HTTP_POST_FILES[$userfilename]['name'];
							$realnamem = "m_".$id . "_" .$HTTP_POST_FILES[$userfilename]['name'];
							$result = copy($HTTP_POST_FILES[$userfilename]['tmp_name'],  $wwwroot. "/fotos/$realname");
							if ($result) 
								{
								} else {
								echo "err";
								}
								if ($modo == 0) { 
								$tam = 300 ;
								} else {
									$tam = 175;
								}
							list($width, $height, $type, $attr) = getimagesize($wwwroot."/fotos/$realname");
							if ($width > 500){	
							$thumb=new thumbnail($wwwroot."/fotos/$realname");			
							$thumb->size_width('100');				 
							$thumb->size_height('300');				 
							$thumb->size_auto('500');					 
							$thumb->jpeg_quality(90);				 
							$thumb->save($wwwroot."/fotos/".$realname);			
							}
							
							list($width, $height, $type, $attr) = getimagesize($wwwroot."/fotos/$realname");
							//$ext = strstr($archivo, '.');
							$thumb=new thumbnail($wwwroot."/fotos/$realname");					
							$thumb->size_width('100');				 
							$thumb->size_height('300');	
							$thumb->size_auto($tam);
							$thumb->jpeg_quality(90);				 
							$thumb->save($wwwroot."/fotos/".$realnamem);
							
							
							//if ($_GET["fotoset"] == "des") {
							//$users_query = "UPDATE `destacados` SET `imagen` = '$destino1' WHERE `id_base` = '$id'";
							//} else {
							$users_query = "UPDATE `imagenes` SET `id_base` = '$id', `imagen` = '$destino1',`detalles` = '$detalles' , `titulo`='$titulo', `modo` = '$modo'  WHERE `id` = '$imgid'";
							//$users_query ="INSERT INTO `imagenes` (`id_base` , `imagen`, `detalles`) VALUES ('$id', '$destino1', '$detalles')";
							//}
							
							
							
							mysql_query($users_query) or die (mysql_error()."UPDATE"); 
							} else {
							//$users_query ="INSERT INTO `imagenes` (`id_base` , `detalles`) VALUES ('$id', '$detalles')";
							if ($_GET["fotoset"] == "des") 
							{
						 	// 
							} else {
							
							$users_query = "UPDATE `imagenes` SET `id_base` = '$id',`detalles` = '$detalles',`titulo`='$titulo' ,`modo` = '$modo' WHERE `id` = '$imgid'";
							mysql_query($users_query) or die (mysql_error()."UPDATE"); 
							}
							}
							 
							 
							 
							 
							 
						}
	   
	   
	   
	   
	   
			} // Primer IF
	   
		$bannertop = "../banners/topbrochette.gif";
		   
	$users_query1 = "Select * from encargados where usr ='$usr'  ";
			$users_display = @mysql_query($users_query1) or die ("a"); 
			$row = @mysql_fetch_array($users_display);  
	  
     $IDT = $row['nombreLugar'] ;   
	 $encnombre =  stripslashes($row['encnombre']) ;
  	 

		 

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
	
	</head>
	
	<body leftmargin="0" topmargin="0" onLoad="">
	 
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
						
						
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                         <?  if(isset($cantimg) && !empty($cantimg)  && ($cantimg > 0)){ ?>
						  <tr>
                            <td>
							
							
							
							</td>
                          </tr>
                          <tr>
                            <td valign="middle"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td><p class="Blanco12"><br>
Las NOTAS son para aplicar sus detalles de una manera ordenada, las mismas se mostraran en caso de que un usuario haga click en su sitio, la cual ud podr&aacute; optar entre dos modos diferentes : <br>
<br>
- Modo 1: En este caso ud contara con la lista de sus notas, distribuidas por su titulo, en una barra de opciones en donde el usuario podr&aacute; seleccionar su tema de inter&eacute;s y ver su detalles en su ampliaci&oacute;n. (en este caso el titulo debe ser obligatorio) en cada nota ud tiene la posibilidad de definir un <br>
<br>
- Titulo<br>
- Texto de la nota<br>
- Imagen<br>
<br>
- Modo 2: Ser&aacute;n mostradas en la portada de su hoja detalles, estas son utilizadas para mostrar alg&uacute;n dato importante de r&aacute;pido acceso visual para el usuario.<br>
</p>                               
                                  <p class="Blanco12">- En caso de subir una image el sistema Generar automaticamente una imagen miniaturizada en caso de necesitar en proximas vistas Solo utlize imagenes (JPG, PNG, BMP, GIF).                                   <br>
                                    <br>
                                    - Utilice la opcion previsualizar detalles, esto le permite ir viendo a medida que sube notas como van a verse sus detalles. recuende cerrar  y volver abrir la previsualizacion cada vez que ud realiza una modificacion<p align="right" class="Blanco12"><a href="http://www.comermas.com.ar/detalles.php?id=<?=$IDT?>" target="_blank">Previsualizar detalles </a><br>
                                    </p></td>
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
$titulo ="";
						 while ($row = @mysql_fetch_array($rsimagenes)) {
						 $id_imagen =  $row['id'];
						 $imagen = $row['imagen'] ;
 $titulo = $row['titulo'] ;
						  $detalles = $row['detalles'] ;
$modo = $row['modo'] ;
						 $foto1c= $wwwrooti."/fotos/m_". $imagen; 
						 $cont = $cont +1;
						 ?>
							<tr>
							  <td height="3" colspan="2" valign="top"> 
							</td>  
							<td width="42%" rowspan="3"> 				  
							<? if (isset($imagen) && !empty($imagen)) {?>
                            <div align="center"><br> <img src="<?=$foto1c?>"><br> 
							  </div>
							<p align="center" style="margin-top: 3; margin-bottom: 3; font color:white"><a href="adm_notas.php?action=killpic&fotoset=<?=$id_imagen?>&mod=img" class="Naranja10">Eliminar imagen</a></p>	
							<? } else {?>
							  <span class="Naranja10"><strong>Imagen</strong></span>							   
                              <input name="adjfoto<?=$cont?>" type="file" id="adjfoto<?=$cont?>2"<?=$mode?>>
							<? } ?>
							</td>
							</tr>
							 
							<tr>
							  <td width="4%" height="58" rowspan="2" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif"><span class="Naranja10"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">
							    <textarea name="textimg<?=$cont?>" cols="1" rows="1" style="width=0px;border:0;visibility: hidden;"  id="textarea3"><?=$detalles?> 
                                </textarea>
							  </a></b></span></font> </td>
							  <td width="48%" valign="top"> <strong><span class="Naranja14">
							    Titulo: <font face="Verdana, Arial, Helvetica, sans-serif"><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">
                              </a></font></span></strong><font face="Verdana, Arial, Helvetica, sans-serif"><span class="Naranja10"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">
                              <input name="texttitulo<?=$cont?>" type="text" id="texttitulo" value="<?=$titulo?>" size="30">
                              <select name="textmodo<?=$cont?>" id="textmodo<?=$cont?>">
                                <option value="0" <? if ($modo =='0') echo 'selected'; ?> >Modo 1</option>
                                <option value="1" <? if ($modo =='1') echo 'selected'; ?>>Modo 2</option>
                                                                                          </select>
                              <br>
                              <br>
                              </a><font face="Verdana, Arial, Helvetica, sans-serif"><b><a href="javascript:NewWindow('editorweb/editor.php?nombre=textimg<?=$cont?>' ,'editor','440','370');">Texto de la nota </a></b></font>(click para agregar/modificar/eliminar) </b></span></font></td>
							  </tr>
							<tr>
							  <td valign="top"><input name="textimg<?=$cont?>add" type="text" id="textimg<?=$cont?>add3" style="border:0; font-size:9px ;COLOR: #FFFFFF; background:#AE5959; font" size="30" readonly></td>
							  </tr>
							<tr>
							  <td colspan="2" valign="top">&nbsp;</td>
							  <td>&nbsp;</td>
						      </tr>
							<tr>
							  <td colspan="3" valign="top"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
						    </tr>
							<tr>
							
							  <td colspan="3" valign="top">                                  <div align="right">
                                  <span class="Blanco10">                                  </span>
                                  <input type="button" name="Submit3" value="Actualizar Nota <?=$cont?>" onClick="document.form1.action='adm_notas.php?action=addpic&fotoset=<?=$cont?>&imgid=<?=$id_imagen?>';document.form1.submit();" style=" height:20px; font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">
                                  <input type="button" name="Submit33" value="Eliminar Nota <?=$cont?>" onClick="document.form1.action='adm_notas.php?action=killpic&fotoset=<?=$id_imagen?>&mod=not';document.form1.submit();" style="height:20pxfont-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">
                               
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
                            <td><? 
						$msgnotas ="";
						$blocknotas="";
						if ($totalimg == $cantimg) {
						$blocknotas = " disabled";
						$msgnotas ="ha llegado a la cantidad de notas contratado.";
						}?>
						<input type="button" name="Submit32" value="Nueva nota (<?=$totalimg?>/<?=$cantimg?>)" onClick="document.form1.action='adm_notas.php?action=new';document.form1.submit();" style="height:20px;font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  <?=$blocknotas?>>
						  <span class="BlancoBold10">
						  <?=$msgnotas?>
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
						  <? } else { ?>
						 
						  <tr>
                            <td colspan="2" class="Blanco12">Servicio NOTAS. no contratado. 
                            </tr>
							<tr>
                            <td colspan="2" class="Blanco12"> <img src="../botones/blancogris.gif" width="100%" height="2">
                            </tr>
							<? }?>
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
