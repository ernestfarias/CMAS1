	<?php

	error_reporting(0); //hago que este script no me tire ningun error de nada EAF2010
// include('check2.php'); 
//session_start(); //eaf2011
include('check.php'); 
	 //DEBUGGER1

//FIN DEBUGGER1
	 
	  $_SESSION['op'] = 'datos';
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
	 
	   if (isset($_POST["accion"]) && !empty($_POST["accion"])) 
	   {
			 if ($_POST["accion"] == "actpla")
				{
				$lugdireccion = addslashes($_POST["lugdireccion"]) ;
				$lugtelefono = addslashes($_POST["lugtelefono"]) ;
				$detalles1 = addslashes($_POST["lugdetalles1"]) ;
				$detalles2 = addslashes($_POST["lugdetalles2"]) ;
				$barrio = addslashes($_POST["barrio"]) ;
				$ciudad = addslashes($_POST["localidad"]);  
				$clase = addslashes($_POST["lugclase"]);  
				$encnombre = addslashes($_POST["encnombre"]);  
				$enctelefono = addslashes($_POST["enctelefono"]) ;
				$encreservas = addslashes($_POST["encreservas"]) ;
				$encemail = addslashes($_POST["encemail"]) ;

$encweb = addslashes($_POST["encweb"]) ;
				$recibeinfo =addslashes($_POST["recibeinfo"]) ;
				$encpass= addslashes($_POST["encpass"]) ;
				if(isset($_POST["sucbarrio"]) && !empty($_POST["sucbarrio"])) $barrio= addslashes($_POST["sucbarrio"]);
				if(isset($_POST["succiudad"]) && !empty($_POST["succiudad"])) $ciudad= addslashes($_POST["succiudad"]);
				
				$users_query = "UPDATE `base` SET `direccion` = '$lugdireccion',`barrio` = '$barrio',`localidad` = '$ciudad',`telefono` = '$lugtelefono',`detalles1` = '$detalles1',`detalles2` = '$detalles2',`clase` = '$clase' WHERE `id` = '$id'";
				mysql_query($users_query) or die ("err sql1");
				
				$users_query = "UPDATE `encargados` SET `encnombre` = '$encnombre',`enctelefono` = '$enctelefono',`encemail` = '$encemail',`password` = '$encpass',`encreservas` = '$encreservas' ,`recibeinfo` = '$recibeinfo',`encweb` = '$encweb'  WHERE `nombreLugar` = '$id'" ;		
				mysql_query($users_query) or die ("err sql1");
				
				 
				}
				
				
			  
				 
	   
			} // Primer IF
	   
	   
	   
	    if (isset($_GET["action"]) && !empty($_GET["action"])) 
	   {
			 
				
			  
				if ($_GET["action"] == "killpic")
				{	
				$fotoset = $_GET["fotoset"]; 
					$users_queryx = "select * from base  WHERE `id` = '$fotoset'";
					
					$users_displayx = @mysql_query($users_queryx) or die ("err sql5"); 
					$row = mysql_fetch_Array($users_displayx);
					$imagen = $row['isologo']; 
					$imagen = $wwwroot."/fotos/iso_". $imagen; 
					if (file_exists($imagen)) unlink($imagen);

					$imagen = $row['isologo']; 
					$imagen = $wwwroot."/fotos/m_iso_". $imagen; 
					if (file_exists($imagen)) unlink($imagen);
					$users_query = "UPDATE `base` SET `isologo` = '' WHERE `id` = '$fotoset'";
					//echo $users_query;
					mysql_query($users_query) or die ("err sql1");
				}
 
				
				if ($_GET["action"] == "addpic")
					{
					$detalles ="";
					$imgid =  $_GET["imgid"]; 	
					$fotoset = "foto". addslashes($_GET["fotoset"]); 	
					$adjfoto = 'adj'.$fotoset;
					 
						if (is_uploaded_file($HTTP_POST_FILES[$adjfoto]['tmp_name']))
							{
							
							 
							
							$destino1 = "iso_".$id . "_" . $_FILES[$adjfoto]['name'];
							$destino2 = "m_iso_".$id . "_" . $_FILES[$adjfoto]['name'];
								
							$userfilename = $adjfoto;
							$filename = $HTTP_POST_FILES[$userfilename]['tmp_name'];
							$realname = "iso_".$id . "_" . $HTTP_POST_FILES[$userfilename]['name'];
							$realnamem = "m_iso_".$id . "_" .$HTTP_POST_FILES[$userfilename]['name'];
							$result = copy($HTTP_POST_FILES[$userfilename]['tmp_name'],  $wwwroot. "/fotos/$realname");
							if ($result) 
								{
								} else {
								//echo "err";
								}
								
							list($width, $height, $type, $attr) = getimagesize($wwwroot."/fotos/$realname");
							if ($width > 500){	
							$thumb=new thumbnail($wwwroot."/fotos/$realname");			
							$thumb->size_width('100');				 
							$thumb->size_height('300');				 
							$thumb->size_auto('500');					 
							$thumb->jpeg_quality(100);				 
							$thumb->save($wwwroot."/fotos/".$realname);			
							}
							
							list($width, $height, $type, $attr) = getimagesize($wwwroot."/fotos/$realname");
							//$ext = strstr($archivo, '.');
							$thumb=new thumbnail($wwwroot."/fotos/$realname");					
							$thumb->size_width('100');				 
							$thumb->size_height('300');	
							$thumb->size_auto('120');
							$thumb->jpeg_quality(90);				 
							$thumb->save($wwwroot."/fotos/".$realnamem);
							
							
 
							$users_query = "UPDATE `base` SET `isologo` = '$destino1' WHERE `id` = '$id'";
					 
							
							
							mysql_query($users_query) or die ("err sq3");
							} else {
							//$users_query ="INSERT INTO `imagenes` (`id_base` , `detalles`) VALUES ('$id', '$detalles')";
							 
							}
							 
							 
							 
							 
							 
						}
	   
	   
	   
	   
	   
			 }
	    
	   
	   
		  
			$bannertop = "../banners/topbrochette.gif";
		   
	   
		 //// cargo datos del enncargado que ingreso
			$users_query1 = "Select * from encargados where usr ='$usr'  ";
			$users_display = @mysql_query($users_query1) or die ("a"); 
			$row = @mysql_fetch_array($users_display);  
	  
		   $IDT = $row['nombreLugar'] ;
		   $encnombre =  stripslashes($row['encnombre']) ;
		   $enctelefono =stripslashes( $row['enctelefono']) ;
		   $encemail = stripslashes($row['encemail']) ;
		   $recibeinfo = stripslashes($row['recibeinfo']) ;
		   $password =stripslashes( $row['password']) ;
		   $encreservas  = stripslashes($row['encreservas']) ;
 $encweb  = stripslashes($row['encweb']) ;
		   $cantimg = stripslashes($row['encnotas']) ;
		    $_SESSION['encnotas']=$cantimg ;
		   $strchecked ="";
	   $encr =  stripslashes($row['encr']) ;
		 if ($recibeinfo == "on") $strchecked ="checked";
			
			/// carga lugar que le corresponde desde BASE 
			$users_query1 = "Select * from base where id = '$IDT' ";
	 
			
			$users_display = @mysql_query($users_query1) or die ("d"); 
			$row = @mysql_fetch_array($users_display);  
	 
		   $id = $row['id'] ;
		   $nombre = stripslashes($row['nombre']) ;
		   $barrio = stripslashes($row['barrio']) ;
		   $localidad = stripslashes($row['localidad']) ;
		   
		  // if(isset($localidad) && !empty($localidad)) $localidad = $barrio;
		   
		   $direccion = stripslashes($row['direccion']) ;
		   $telefono = stripslashes($row['telefono']) ;
		   $detalles2 = stripslashes($row['detalles2']) ;
		   $detalles1 = stripslashes($row['detalles1']) ;
		   $clase = stripslashes($row['clase']) ;
		   $visitas = $row['visitas'] ;
		$imagendes = $row['isologo'] ;  
		//   $foto1 = $row['foto1'] ;
		 //  $foto2 = $row['foto2'] ;
	//		$foto3 = $row['foto3'] ;
	
			//$foto4 = $row['foto4'] ;
			
		  // $foto1c= $wwwrooti."/fotos/m_". $foto1; 
		//   $foto1g= $wwwrooti."/fotos/". $foto1; 
		   
		//   $foto2c= $wwwrooti."/fotos/m_". $foto2; 
		//   $foto2g= $wwwrooti."/fotos/". $foto2; 
		   
		 //  $foto3c= $wwwrooti."/fotos/m_". $foto3; 
		//   $foto3g= $wwwrooti."/fotos/". $foto3; 
	  
	   
		//   $foto4c= $wwwrooti."/fotos/m_". $foto4; 
		 //  $foto4g= $wwwrooti."/fotos/". $foto4; 
	
	
	// %="- "&replace(ucase(rsdestacados.Fields.Item("Detalles2").Value),"/","<BR>-")%
	
	 //$detalles2 =  "- ". strtoupper(str_replace("/", "<br>-", $detalles2t));
	 
		 
	
	   $sqlbarrios = "Select barrios from barrios Order by barrios";
	$sqltipos = "Select tipos from tipos";
	$sqlciudad = "Select ciudad from ciudades order by ciudad";
	$sqlclase = "Select clase from clases";
	
	$rsbarrios= @mysql_query($sqlbarrios) or die (mysql_error()."1"); 
	$rsciudad = @mysql_query($sqlciudad) or die (mysql_error()."2"); 
	$rstipos= @mysql_query($sqltipos) or die (mysql_error()."3"); 
	$rsclase= @mysql_query($sqlclase) or die (mysql_error()."4"); 
	

	
	?>
	
	
	<html>
	<head>
	<script language="JavaScript" type="text/JavaScript" src="../includes/crnet.js"></script>
	<script language="JavaScript1.2">
	<!--
	
	function returner(act){
	var i = act
	if (i == 'return') {
		window.document.form1.action ="cat_imagenes.php"
		
		window.form1.submit();
		}
	}
	
	function refreshpage(act){
		window.document.form1.accion2.value = act;
		window.form1.submit();
	}
	function Verificador(vari){
		var error = '';
	
	//	if (window.document.form1.textnombre.value.length == 0)
		//	error = error + 'Especificar nombre \n'; 
	
	//	if (window.document.form1.textprecio.value.length == 0)
	//		error = error + 'Especificar precio \n'; 
	
	//	if (window.document.form1.textdesc.value.length == 0)
		//	error = error + 'Especificar descripcion \n'; 
	 
	// 	if (window.document.form1.adjfoto1.value.length == 0)
	//		error = error + 'Especificar foto 1 \n'; 
		
	//	if (window.document.form1.adjfoto2.value.length == 0)
		//		error = error + 'Especificar foto 2 \n'; 
	
			 
		if (error!='')
			alert(error);
		else
			{
			window.document.form1.accion.value = vari;	 
			//if (vari == 'editar') window.document.form1.action ="cat_alta.php"
			//if (vari == 'borrar') window.document.form1.action ="cat_alta.php"
		 
			window.form1.submit();		
			 }
		}
	
	  
			function Showsucbarrio(barrios){
			if (barrios == "(sucursales)... barrios -->")
				{	
				document.form1.sucbarrio.style.visibility="visible";
				document.form1.sucbarrio.focus()
				}
				else
				{
				document.form1.sucbarrio.style.visibility="hidden"
				document.form1.sucbarrio.value="";
				}
		 }
		 
			function Showsucciudad(ciudad){
			if (((ciudad=="otra1" )||(ciudad=="otra2")))
				{	
				document.form1.succiudad.style.visibility="visible";
				document.form1.succiudad.focus();
				}
				else
				{
				document.form1.succiudad.style.visibility="hidden";
				document.form1.succiudad.value="";
				}	
			if (ciudad=="Capital Federal")
				{
				document.form1.barrio.disabled=false;
				}
				else
				{
				document.form1.sucbarrio.style.visibility="hidden";
				document.form1.sucbarrio.value="";
				document.form1.barrio.disabled=true;
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
	 
	<form name="form1" method="POST" action="adm_datos.php" enctype="multipart/form-data">
	<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr> 
		<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			 
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
				  <td> <? require_once('top.php'); ?>
				  </td>
			    </tr>
				 
				<tr>
				  <td>
				  
				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="50%">
						  <table style="margin:0px;padding:0px;" width="100%" height="513" border="0" align="center" cellpadding="0" cellspacing="0" name="tablaiz">
						  <tr valign="top">
							<td>                          <div align="right">
								<table width="100%" height="574" border="0" align="center" cellpadding="1" cellspacing="0">
								  
								  <tr bgcolor="#B36464" class="Blanco12">
									<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="18%" height="20" class="BlancoBold10"><div align="right">Nombre Lugar :</div></td>
										<td height="20" colspan="2" class="Blanco10"><?=$nombre?></td>
										<td width="48%" height="20">&nbsp;</td>
									  </tr>
									  <tr bgcolor="#AE5959" class="Blanco12">
										<td height="20" class="BlancoBold10">&nbsp;</td>
										<td height="20" class="Blanco10">&nbsp;</td>
										<td height="20" class="BlancoBold10">&nbsp;</td>
										<td height="20">&nbsp;</td>
									  </tr>
									  <tr bgcolor="#AE5959" class="Blanco12">
										<td height="20" class="BlancoBold10"><div align="right">Direccion :</div></td>
										<td width="24%" height="20" class="Blanco10">
										  <input name="lugdireccion" type="text" id="lugdireccion" value="<?=$direccion?>">                                      
										  </td>
										<td width="10%" height="20" class="BlancoBold10"><div align="right">Barrio : </div></td>
										<td height="20"><span class="Blanco10">
										  <select name="barrio" id="select3" style="width: 140px;font-size:8pt;" onChange="Showsucbarrio(window.document.form1.barrio.value);">
											<? while ($row = @mysql_fetch_array($rsbarrios)) { ?>
											
											<? $str = "";
											if (strtoupper($row["barrios"])   ==strtoupper($barrio)) $str = "selected"; ?>
											
											<option <?=$str?> value="<?=$row["barrios"];?>">
											<?=strtoupper($row["barrios"]);?>
											</option>
											<? } ?>
										 
											<option value="(sucursales)... barrios -->">Otra --></option>
										  </select>
										  <input name="sucbarrio" type="text" style="width=200px;font-size:8pt;visibility:hidden" maxlength="80">
										</span> </td>
									  </tr>
									  <tr class="Blanco12">
										<td height="20" class="BlancoBold10"><div align="right">Telefono(s) :</div></td>
										<td height="20" class="Blanco10"><input name="lugtelefono" type="text" id="lugtelefono" value="<?=$telefono?>"></td>
										<td height="20" class="BlancoBold10"><div align="right">Localidad :</div></td>
										<td height="20"><span class="Blanco10">
										 
										  <select name="localidad" id="select2" style="width: 140px;font-size:8pt;"  onChange="Showsucciudad(window.document.form1.localidad.value);">
											<? while ($row = @mysql_fetch_array($rsciudad)) { ?>
											<? 
											 $str = "";
											
											if (strtoupper($row["ciudad"]) == strtoupper($localidad)) $str = "selected";
											
											
											 ?>
											
											<option <?=$str?> value="<?=$row["ciudad"];?>">
											
											<?=strtoupper($row["ciudad"]);?>
											</option>
											<? } ?>
											<option value="otra1">Otra... --></option>
										  </select>
										  <input name="succiudad" type="text" style="width=200px;font-size:8pt;visibility:hidden" maxlength="80">
										</span></td>
									  </tr>
									  <script language="javascript">
									  Showsucciudad(window.document.form1.localidad.value);
									  </script>
									  <tr class="Blanco12" >
										<td height="20" class="BlancoBold10">&nbsp;</td>
										<td height="20" class="Blanco10">&nbsp;</td>
										<td height="20" class="BlancoBold10">&nbsp;</td>
										<td height="20">&nbsp;</td>
									  </tr>
									  <tr class="Blanco12">
										<td height="20" class="BlancoBold10"><div align="right">Clase de Lugar :</div></td>
										<td height="20" class="Blanco10"><select name="lugclase" id="lugclase" style="width:160px;font-size:8pt;">
										  <? while ($row = @mysql_fetch_array($rsclase)) { 
										   $str = "";
											if (strtoupper($row["clase"]) == strtoupper($clase)) $str = "selected";
											
										  ?>
										  
										  
										  <option  <?=$str?> value="<?=$row["clase"];?>" >
										  <?=$row["clase"];?>
										  </option>
										  <? }?>
										</select></td>
										<td height="20" class="BlancoBold10">&nbsp;</td>
										<td height="20">&nbsp;</td>
									  </tr>
									  <tr class="Blanco12">
										<td height="20" class="BlancoBold10">&nbsp;</td>
										<td height="20" class="Blanco10">&nbsp;</td>
										<td height="20" class="BlancoBold10">&nbsp;</td>
										<td height="20">&nbsp;</td>
									  </tr>
									  <tr class="Blanco12">
										<td height="20" class="BlancoBold10"><div align="right"></div></td>
										<td height="20" class="Blanco10">&nbsp;                                      </td>
										<td height="20" class="BlancoBold10"><div align="left"></div></td>
										<td height="20">&nbsp; </td>
									  </tr>
									  <tr bgcolor="#AE5959">
										<td height="2" colspan="4"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
									  </tr>
									</table></td>
									</tr>
								  <tr bgcolor="#B36464" class="Blanco12">
									<td width="36%" height="20">
									  <div align="right"></div></td>
									<td width="64%">&nbsp;                                  </td>
								  </tr>
								  <tr bgcolor="#AE5959" class="Blanco12">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								  </tr>
								  <tr bgcolor="#AE5959" class="Blanco12">
									<td height="60"><div align="right">utilizando separadores <br>
					ej. Carnes / Pescado / Pastas:</div></td>
									<td><textarea name="lugdetalles2" cols="95" rows="6" id="textarea3" style="width=400px;font-size:8pt;visibility"><?=$detalles2?></textarea></td>
								  </tr>
								  <tr bgcolor="#B36464" class="Blanco12">
									<td><div align="right">Presentacion/Descripcion :</div></td>
									<td>
									  <textarea name="lugdetalles1" cols=120 rows=6 id="lugdetalles1" style="width: 400px;font-size:8pt;" onClick="document.form1.Presentacion.select();"><?=$detalles1?></textarea></td>
								  </tr>
								  <tr bgcolor="#AE5959" class="Blanco12">
									<td bgcolor="#AE5959"><div align="right"></div></td>
									<td>&nbsp;</td>
								  </tr>
								  <tr bgcolor="#B36464" class="Blanco12">
									<td height="21">
									  <div align="right"></div></td>
									<td>&nbsp;</td>
								  </tr>
								  <tr>
									<td>&nbsp;</td>
									<td>&nbsp; </td>
								  </tr>
								  <tr>
								    <td   colspan="2"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
								    </tr>
								  <tr>
									<td height="15" colspan="2" bgcolor="#851549"><div align="right">
									  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="95%" height="35">
                                            <div align="right" class="BlancoBold12"> DATOS DEL ENCARGADO O REPRESENTANTE DEL LUGAR<br>
                                                <span class="Blanco10">(Estos datos no seran publicados)</span></div></td>
                                          <td width="20"> </td>
                                        </tr>
                                      </table>
										</div></td>
								  </tr>
								  <tr valign="top">
									<td colspan="2"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
								  </tr>
								  <tr class="Blanco12">
									<td colspan="2" align="right" class="BlancoBold10"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
									  <tr bgcolor="#B36464">
										<td height="20">&nbsp;</td>
										<td height="20">&nbsp;</td>
										<td height="20">&nbsp;</td>
										<td height="20">&nbsp;</td>
									  </tr>
									  <tr>
										<td height="20" class="BlancoBold10">Usuario :</td>
										<td height="20" colspan="3"><span class="Blanco10">
										  <?=$usr?>
	</span></td>
										</tr>
									  <tr bgcolor="#B36464">
										<td width="17%" height="20" class="BlancoBold10">Contrase&ntilde;a : </td>
										<td width="26%" height="20"><span class="Blanco14">
										  <input name="encpass" type="text" id="encpass"  style="width: 160px;font-size:8pt;" value="<?=$password?>">
										</span></td>
										<td width="33%" height="20" class="BlancoBold10"><div align="left">Nombre y Apellido :</div></td>
										<td width="24%" height="20"><input name="encnombre" type="TEXT" id="encnombre" style="width: 160px;font-size:8pt;" value="<?=$encnombre?>"></td>
									  </tr>
									  <tr>
										<td height="20">&nbsp;</td>
										<td height="20">&nbsp;</td>
										<td height="20" class="BlancoBold10"><div align="left">Telefono :</div></td>
										<td height="20"><input name="enctelefono" type="TEXT" id="enctelefono" style="width: 160px;font-size:8pt;" value="<?=$enctelefono?>"></td>
									  </tr>
									  <tr bgcolor="#B36464">
									    <td height="20">&nbsp;</td>
									    <td height="20">&nbsp;</td>
									    <td height="20" class="BlancoBold10">&nbsp;</td>
									    <td height="20">&nbsp;</td>
									    </tr>
									  <tr bgcolor="#AE5959">
									    <td height="20">&nbsp;</td>
									    <td height="20">&nbsp;</td>
									    <td height="20" class="BlancoBold10">Sitio Web:</td>
									    <td height="20"><input name="encweb" type="text" id="encweb" style="width: 160px;font-size:8pt;" value="<?=$encweb?>"></td>
									    </tr>
									  <tr bgcolor="#B36464">
										<td height="20">&nbsp;</td>
										<td height="20">&nbsp;</td>
										<td height="20" class="BlancoBold10">Correo para contacto: </td>
										<td height="20"><input name="encemail" type="text" id="encemail" style="width: 160px;font-size:8pt;" value="<?=$encemail?>">&nbsp;</td>
									  </tr>
									<? if ($encr ==1) {?>
									  <tr bgcolor="#AE5959">
										<td height="20">&nbsp;</td>
										<td height="20">&nbsp;</td>
										<td height="20" class="BlancoBold10"><div align="left">Correo para las reservas: </div></td>
										<td height="20"><input name="encreservas" type="text" id="encreservas" style="width: 160px;font-size:8pt;" value="<?=$encreservas?>"></td>
									  </tr>
									<? }else {?>
									  <tr bgcolor="#AE5959">
									    <td height="20">&nbsp;</td>
									    <td height="20">&nbsp;</td>
									    <td height="20" class="BlancoBold10">&nbsp;</td>
									    <td height="20">&nbsp;</td>
									    </tr>
									<? }?>
									  <tr bgcolor="#B36464">
										<td height="20">&nbsp;</td>
										<td height="20">&nbsp;</td>
										<td height="20" class="BlancoBold10"><div align="left">Deseo recibir informacion:
												<input name="recibeinfo" type="checkbox" <?=$strchecked?>>
										</div></td>
										<td height="20">&nbsp;</td>
									  </tr>
									</table></td>
									</tr>
								  <tr class="Blanco12">
									<td align="right" class="BlancoBold10">&nbsp;</td>
									<td class="Blanco14">&nbsp;</td>
								  </tr>
								  <tr bgcolor="#B36464" class="Blanco12">
								    <td colspan="2" align="right" class="BlancoBold10">&nbsp;</td>
								    </tr>
								  <tr class="Blanco12">
									<td height="10" align="right">&nbsp;</td>
									<td>
									  <div align="left">                                        </div></td>
								  </tr>
								  <tr>
									<td height="2" colspan="2" align="right"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
								  </tr>
								  <tr valign="top">
									<td colspan="2" align="right">                                      <span class="Blanco10">
									  <input name="accion" type="text" id="accion" style="visibility:hidden ">
									</span>
									  <input name="Submit" type="button" onClick="javascript:if (!Verificador('actpla')){return false};" class=formButton id=Submit value="Guardar Cambios" style=" height:20px;font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">                                    </tr>
								  <tr>
								    <td height="9" colspan="2" align="right">&nbsp;</td>
								    </tr> <tr>
								    <td   colspan="2"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
								    </tr>
								  <tr>
									<td height="15" colspan="2" bgcolor="#851549"><div align="right">
									  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="95%" height="35">
                                            <div align="right" class="BlancoBold12"> ISOLOGO. DEL LUGAR <br>
                                                </div></td>
                                          <td width="20"> </td>
                                        </tr>
                                      </table>
										</div></td>
								  </tr>
								  <tr valign="top">
									<td colspan="2"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
								  </tr>
								  <tr>
								    <td height="9" colspan="2" align="right">&nbsp;




		</td>
								    </tr>
								  <tr>
									<td height="9" colspan="2" align="right"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td colspan="2" class="Blanco12">                                     
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td width="56%"><div align="right" class="Naranja10"><b>Imagen - &gt; </b></div></td>
                                        <td width="43%">
                                          <?  if(isset($imagendes) && !empty($imagendes)){ ?>
                                          <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><div align="center"><img src="<? echo $wwwrooti."/fotos/m_".$imagendes?>"></div></td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <p align="center" style="margin-top: 3; margin-bottom: 3; font color:white"><a href="adm_datos.php?action=killpic&fotoset=<?=$id?>&mod=des" class="Naranja10">Eliminar imagen</a></p></td>
                                            </tr>
                                          </table>
                                          <? }else{ 
								   
								   ?>
                                          <input name="adjfotodes" type="file"  id="adjfotodes3"<?=$mode?>>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2">&nbsp;</td>
                                      <tr>
                                        <td colspan="2" valign="top"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                                      <tr>
                                        <td colspan="2" valign="top"><div align="right">
                                            <input type="button" name="Submit322" value="Adjuntar Imagen" onClick="document.form1.action='adm_datos.php?action=addpic&fotoset=des';document.form1.submit();" style="height:20px;font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">
                                            <?  }?>
                                        </div></td>
                                        <td width="1%" colspan="2">&nbsp;</td>
                                      
                                    </table></td>
								  </tr>
								</table>
								</div></td>
						  </tr>
						</table></td>
					  </tr>
				  </table></td>
				</tr>
				<tr>
				  <td height="1"><img src="botones/blancogris.gif" width="100%" height="1"></td>
				</tr>
				<tr>
				  <td class="BlancoBold14"> <i>  </i></td>
				</tr>
				<tr>
				  <td align="right" class="Blanco10">&nbsp;</td>
			    </tr>
				<tr>
				  <td align="right" class="Blanco10">&nbsp;</td>
			    </tr>
				<tr>
				  <td align="right" class="Blanco10">			      Visitas a			        <?=$nombre ?> : <b><?=$visitas?></b></td>
				</tr>
			  </table>
			  </td>
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
