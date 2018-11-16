	<?  
	   include('check2.php'); 
	  $_SESSION['op'] = 'destacados';
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
					$users_queryx = "select * from destacados  WHERE `id_base` = '$fotoset'";
					
					$users_displayx = @mysql_query($users_queryx) or die ("err sql5"); 
					$row = mysql_fetch_Array($users_displayx);
					$imagen = $row['imagen']; 
					$imagen = $wwwroot."/fotos/". $imagen; 
				
					if (file_exists($imagen)) unlink($imagen);
					$imagen = $row['imagen']; 
					$imagen = $wwwroot."/fotos/m_". $imagen; 
					if (file_exists($imagen)) unlink($imagen);
					$users_query = "UPDATE `destacados` SET `imagen` = '' WHERE `id_base` = '$fotoset'";
					//echo $users_query;
					mysql_query($users_query) or die ("err sql1");
				}
 
				
				if ($_GET["action"] == "addpic")
					{
					$detalles ="";
					$imgid =  $_GET["imgid"]; 	
					$fotoset = "foto". addslashes($_GET["fotoset"]); 	
					$adjfoto = 'adj'.$fotoset;
					if (isset($_POST["textimg".$_GET["fotoset"]]) && !empty($_POST["textimg".$_GET["fotoset"]])) $detalles = $_POST["textimg".$_GET["fotoset"]];
					
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
							$thumb->size_auto('70');
							$thumb->jpeg_quality(90);				 
							$thumb->save($wwwroot."/fotos/".$realnamem);
							
							
 
							$users_query = "UPDATE `destacados` SET `imagen` = '$destino1' WHERE `id_base` = '$id'";
					 
							
							
							mysql_query($users_query) or die ("err sq3");
							} else {
							//$users_query ="INSERT INTO `imagenes` (`id_base` , `detalles`) VALUES ('$id', '$detalles')";
							 
							}
							 
							 
							 
							 
							 
						}
	   
	   
	   
	   
	   
			} // Primer IF
	   

	$bannertop = "../banners/topbrochette.gif";

	$users_query1 = "Select * from encargados where usr ='$usr'  ";
			$users_display = @mysql_query($users_query1) or die ("a"); 
			$row = @mysql_fetch_array($users_display);  
	  
		   $IDT = $row['nombreLugar'] ;   
	  $encnombre =  stripslashes($row['encnombre']) ;
	
	
	$sqldestacados = "Select * from destacados where id_base ='$IDT' ";
	$rsdestacados= @mysql_query($sqldestacados) or die (mysql_error()."4"); 
	$totaldestacados = @mysql_num_rows($rsdestacados); 
	$row = @mysql_fetch_array($rsdestacados);  
	$imagendes = $row['imagen'] ;  
	
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
	 
	<form name="form1" method="POST" action="adm_destacados.php" enctype="multipart/form-data">
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   
  <tr>
    <td>
      <div align="right"> </div></td>
  </tr>
   
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
   </td>
  </tr>
   
 
  <tr>
    <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <?  if(isset($totaldestacados) && !empty($totaldestacados)){ ?>
        <tr>
          <td colspan="2" class="Blanco12">La siguiente imagen sera considerada en caso de que su lugar aparezca en los destacados. 
                            </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="19%"><div align="right" class="Naranja10"><b>Imagen</b></div></td>
          <td width="81%">
            <?  if(isset($imagendes) && !empty($imagendes)){ ?>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><img src="<? echo $wwwrooti."/fotos/m_".$imagendes?>"></div></td>
              </tr>
              <tr>
                <td>
                  <p align="center" style="margin-top: 3; margin-bottom: 3; font color:white"><a href="admmanager.php?action=killpic&fotoset=<?=$id?>&mod=des" class="Naranja10">Eliminar imagen</a></p></td>
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
              <input type="button" name="Submit322" value="Adjuntar Imagen" onClick="document.form1.action='admmanager.php?action=addpic&fotoset=des';document.form1.submit();" style="height:20px;font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">
              <?  }?>
          </div></td>
          <td colspan="2">&nbsp;</td>
          <?  } else {?>
        <tr>
          <td colspan="2" class="Blanco12"> 
        </tr>
        <tr>
          <td colspan="2" class="Blanco12">Servicio DESTACADOS. no contratado. 
                            </tr>
        <tr>
          <td colspan="2" class="Blanco12"> <img src="../botones/blancogris.gif" width="100%" height="2"> 
        </tr>
        <? }?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="82%">
      <div align="right"> </div></td>
  </tr>
</table></td>
			    </tr>
				 
			  </table>
				<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
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
