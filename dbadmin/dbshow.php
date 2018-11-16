<? 
   include('check.php'); 
?>

<HTML>
<HEAD>
<title>SuperMEGAAdmin 2.0v</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel="stylesheet" type="text/css" href="../includes/tooltip.css.php" />


<script src="../includes/tooltip.js" type="text/javascript"language="javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<script>
	
		var win=null;
	function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
 

	
	
	function checkmodif(valor)//tilda el checkbox de modificado cuando se escribe en cualquier campo
	{
	document.frm[valor].checked=true;
	}
	
		function checkm(valor)//tilda el checkbox de modificado cuando se escribe en cualquier campo
	{
	
	 
	for (i = 1; i <= valor; i++){
    t = "tilde"+ i; 
	document.frm[t].checked=true;
	}
	
	
	}
	
	function checkd(valor)//tilda el checkbox de modificado cuando se escribe en cualquier campo
	{
	
	 
	for (i = 1; i <= valor; i++){
    t = "tilde"+ i; 
	document.frm[t].checked=true;
	}
	
	
	}
	</script>



</HEAD>
<BODY>
<div id="TooltipContainer" onmouseover="holdTooltip();" onmouseout="swapTooltip('default');"></div>
<?
 $wwwroot = "D:/Inetpub/wwwroot/php/comermas.com.ar"; 
	 $wwwroot = "/home/rm000120/public_html";
	 $wwwrooti = "http://www.comermas.com.ar"; 
	 
//error_reporting(E_ALL); //quiero ver todos los errores
session_start();
//Ne conecto a la DB lo cambie por el catalog que es lo mismo que lo que estaba solo con una funcion para paginar demas ahi dentro.
require_once('../includes/catalog.php');
//$db_name = 'rm000120_comermas';
   
    //se define cantidad de limite para paginador. y se guarda en session
		if(isset($_POST["txtreg"]) && !empty($_POST["txtreg"]))
		{
			$limit = $_POST['txtreg'];
			$_SESSION['limit']=$limit;
		} else {
			$limit= $_SESSION['limit'];
		}
	////////////////////////////////////////////////////////////////////////
   
   
   
   // Se define base guardada en Session
	$db_name =  $_SESSION['base']; 
	$qry= ""; //no borrar,
	////////////////////////////////////////////////////////////////////////
	
	
	//se define tabla y se guarda en session	
	if(isset($_POST["txttable"]) && !empty($_POST["txttable"]))
		{
			$table= $_POST['txttable'];
			$_SESSION['table']=$table;
		} else {
			$table= $_SESSION['table'];
		}
	////////////////////////////////////////////////////////////////////////
 
	//se define Qry y se guarda en session	
	if(isset($_POST["txtquery"]) && !empty($_POST["txtquery"]))
		{
			$sqlqry= stripslashes($_POST['txtquery']);
			$_SESSION['qryt']=$sqlqry;
		} else {
			$sqlqry= $_SESSION['qryt'];
		}
	////////////////////////////////////////////////////////////////////////
	

	
  


   // Se levanta offset utilizado para posisionar paginador.
	if(isset($_GET["offset"]) && !empty($_GET["offset"]))
	{
	$offset = addslashes($_GET["offset"]);
 	} else {
    $offset = 0;
	}
	////////////////////////////////////////////////////////////////////////


    // se define costante de registro nuevo en caso de utilizar.
	$txtcantidadagregar = 1;
			if(isset($_POST["txtcantidadagregar"]) && !empty($_POST["txtcantidadagregar"]))
		{
			$RegistrosVacios = $_POST['txtcantidadagregar'];
			$_SESSION['RegistrosVacios']=$RegistrosVacios;
		} else {
			$RegistrosVacios= $_SESSION['RegistrosVacios'];
		}

	/////// Seteo la consulta y limite de paginas ////////////////////
	$sqllimit = " LIMIT " . $offset . " , " . $limit; 
	//$RS = @mysql_query($sqlqry.$sqllimit) or die (mysql_error()); 
	if (isset($_POST[ckquery]) && !empty($_POST[ckquery]) && $_POST[ckquery] == "on") {
	$RS = @mysql_query($sqlqry) or die (mysql_error()); 
	}else {
	$RS = @mysql_query($sqlqry.$sqllimit) or die ("ERROR: Busqueda!."); 
	}
	
	
	
	///////////////////////////////////////////////////////////////////
	


	///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    //// Se chequea la accion solicitada //////////////////////////////////
	if(isset($_GET["action"]) && !empty($_GET["action"]))
	{
	$action = addslashes($_GET["action"]);
	//$fields = mysql_num_fields($RS);
	    
		 //// Se carga encargado
		if($action == "addenc")
		{
		for ($i=1;$i<=$limit;$i++)
				{
 
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 $sql="SELECT * FROM encargados where nombreLugar='$id'" ;
						 $result = mysql_query($sql);
					 	 $num_rows = mysql_num_rows($result);
					  	 
						  if (!($num_rows))		
						  {
					
					 $idc= "comermas" . $id; 
					 $query = "INSERT INTO `encargados` ( `nombreLugar` , `usr` , `password`) VALUES ('$id','$idc','$idc')" ;
					 mysql_query($query) or die ("err addenc"); 
					} else {
					$msgtext = $msgtext . "id=".$id . ": Se encontraba ya en la tabla ENCARGADOS<br>";
					
					}

					 
						
 				  	}  else {
					//echo $i."- DESMARCADO"."<br>";
					}
			  	}
		
		}
	    ///////////////////////////
	
		
		
		//// Se borrar seleccion
		if($action == "del")
		{
		for ($i=1;$i<=$limit;$i++)
				{
 
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 $query = "DELETE from " .$table .  " WHERE `id` = '$id'" ;
					 mysql_query($query) or die ("err del"); 
					
					if ($table== "base") {
					
					 $sql="SELECT * FROM encargados where nombreLugar='$id'" ;
						 $result = mysql_query($sql);
					 	 $num_rows = mysql_num_rows($result);
					  	 
						  if ($num_rows >0)		
						  {
					
					 $query = "DELETE from encargados WHERE `nombreLugar` = '$id'" ;
					 mysql_query($query) or die ("err encargados"); 
					}
					
					 $sql="SELECT * FROM destacados where id_base='$id'" ;
						 $result = mysql_query($sql);
					 	 $num_rows = mysql_num_rows($result);
					  	 
						  if ($num_rows >0)		
						  {
					
					 $query = "DELETE from destacados WHERE `id_base` = '$id'" ;
					 mysql_query($query) or die ("err detalles"); 
					}
					
					 $sql="SELECT * FROM imagenes where id_base='$id'" ;
						 $result = mysql_query($sql) or die ("err sql5"); ;
					 	 $num_rows = mysql_num_rows($result);
					  $result = mysql_query($sql) or die ("err sql5"); ;
					 	 $num_rows = mysql_num_rows($result);
						 
						
						while ($row = @mysql_fetch_array($result)) 
						{
							$imagen = $row['imagen']; 
							$imagen = $wwwroot."/fotos/". $imagen; 
							if (file_exists($imagen)) unlink($imagen);
						}
						 
						 
						 
						  if ($num_rows >0)		
						  {
					
					 $query = "DELETE from imagenes WHERE `id_base` = '$id'" ;
					 mysql_query($query) or die ("err imagenes"); 
					 
					}
					
					
					
					
					}
						
 				  	}  else {
					//echo $i."- DESMARCADO"."<br>";
					}
			  	}
		
		}
	    ///////////////////////////
	
	
		//// Se agraga o modifica seleccion
		
		if($action == "addnew")
		{
		
		////////// modif ///////////
		for ($i=1;$i<=$limit;$i++)
				{
 
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 
					 for ($y=1;$y<mysql_num_fields($RS);$y++)
					 	{
	 				 $field =mysql_field_name($RS,$y);
					 $dato = $_POST[$i.mysql_field_name($RS,$y)];
						 
					 
					 $query = "UPDATE  ".$table . " SET `$field` = '$dato' WHERE `id` = '$id'" ; 
					 mysql_query($query) or die ("err UPDATE"); 
					 
					 
						
						 }
					}
				}
			////////////////////////////////////
		
		////////// agrega ///////////
		
		for ($i=1;$i<=$RegistrosVacios;$i++)
		
				{
 			$fieldtemp= "";
			$datotemp ="";
               	if (isset($_POST['tildeadd'.$i]) && !empty($_POST['tildeadd'.$i])) 
			   		{
					 $id = $_POST['tildeadd'.$i];
					 
					 for ($y=1;$y<mysql_num_fields($RS);$y++)
					 	{
	 				 $field =mysql_field_name($RS,$y);
					 $dato = $_POST['add'.$i.mysql_field_name($RS,$y)];
					 $str = "";
					 if (mysql_num_fields($RS) > $y+1) $str = ",";
					 $fieldtemp = $fieldtemp . "`". $field ."`". $str; 
					 $datotemp = $datotemp . "'".$dato."'".$str;
					
					
						 }
					
						 $query =	"INSERT INTO ".$table." ($fieldtemp) VALUES ($datotemp)";
						 mysql_query($query) or die ("err INSERT"); 
 							 
					}
					
				}
			////////////////////////////////////
		}
	    ///////////////////////////
	
	
	
		//// Se Agraga a destacado
		if($action == "adddes"){
		$msgtext = "";
		for ($i=1;$i<=$limit;$i++)
		
				{
 			$fieldtemp= "";
			$datotemp ="";
			$fieldcheck =0;
			$fieldfound ="";
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 
					 for ($y=0;$y<1;$y++)
					 	{
	 				 $field =mysql_field_name($RS,$y);
					  $dato = "";
					 if (isset($_POST[$i.mysql_field_name($RS,$y)]) && !empty($_POST[$i.mysql_field_name($RS,$y)])) $dato = $_POST[$i.mysql_field_name($RS,$y)];
					
					
		 			 
					 	$fieldtemp = $fieldtemp . "`". $field ."`" ;
					 	$datotemp = $datotemp . "'".$dato."'" ;
						 
						 if ($y == $fieldcheck) $fieldfound = $field ."=". $dato;
						 }
					  
						 echo "field".$datotemp."<br>";
						 
						  //// chequea si esta
						 $sql="SELECT * FROM destacados where id_base=$datotemp" ;
						 $result = mysql_query($sql);
					 	 $num_rows = mysql_num_rows($result);
					  	 
						  if (!($num_rows))		
						  {
						  $query =	"INSERT INTO destacados  (`id_base`)  VALUES ($datotemp)";
						  mysql_query($query) or  die (mysql_error()); 
						  } else {
						  $msgtext = $msgtext . "id=".$id . ": Se encontraba ya en la tabla DESTACADOS<br>";
						  }
						 
					}
					
				}
		}
		
	    ///////////////////////////
		
		
		
		
		
		
		
		
		
		//// Se mueve de usuarioupg seleccion  a base usuario
		if($action == "movusr"){
		$msgtext  ="";
		for ($i=1;$i<=$limit;$i++)
		
				{
 			$fieldtemp= "";
			$datotemp ="";
			$fieldcheck =2;
			$fieldfound ="";
			 $fieldtext ="";
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 
					 for ($y=1;$y<mysql_num_fields($RS);$y++)
					 	{
	 				 $field =mysql_field_name($RS,$y);
					 $dato = $_POST[$i.mysql_field_name($RS,$y)];
					 $str = "";
					 if (mysql_num_fields($RS) > $y+1) $str = ",";
					 $fieldtemp = $fieldtemp . "`". $field ."`". $str; 
					 $datotemp = $datotemp . "'".$dato."'".$str;
					  if ($y == $fieldcheck) {
					  $fieldfound = $field ."='". $dato."'";
					  $fieldtext = $dato;
					  }
						 }
					 	$fieldtemp = $fieldtemp . ',`permiso`,`password`';
					 	$datotemp = $datotemp. ",'usuario','comermas'";
						 
						
						 
						  //// chequea si esta
						 $sql="SELECT * FROM usuarios where $fieldfound" ;
						 
						 $result = mysql_query($sql);
					 	 $num_rows = mysql_num_rows($result);
					  
						  if (!($num_rows))		
						  {
						  $query =	"INSERT INTO usuarios ($fieldtemp) VALUES ($datotemp)";
						  mysql_query($query) or  die (mysql_error()); 
						  $query =	"delete from ".$table." WHERE `id` = '$id'";
						  mysql_query($query) or die ("err Borrar usuarioupg"); 
						  } else {
						  $msgtext = $msgtext .$fieldtext. ": Se encontraba ya en la tabla USUARIOS, fue Eliminado de USUARIOSUPG<br>";
						  $query =	"delete from ".$table." WHERE `id` = '$id'";
						  mysql_query($query) or die ("err Borrar usuarioupg"); 
						  }
						
						
 							 
					}
					
				}
		
		}
	    ///////////////////////////
	
	
	
		//// Se mueve recetaupg a recetas
		if($action == "movrec"){
	for ($i=1;$i<=$limit;$i++)
		
				{
 			$fieldtemp= "";
			$datotemp ="";
			$recnombre ="";
			$rectitulo ="";
			$recemail ="";
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 
					 for ($y=1;$y<mysql_num_fields($RS);$y++)
					 	{
	 				 $field =mysql_field_name($RS,$y);
					  $dato = "";
					 if (isset($_POST[$i.mysql_field_name($RS,$y)]) && !empty($_POST[$i.mysql_field_name($RS,$y)])) $dato = $_POST[$i.mysql_field_name($RS,$y)];
					 $str = "";
					 if (mysql_num_fields($RS) > $y+1) $str = ",";
					 $fieldtemp = $fieldtemp . "`". $field ."`". $str; 
					 $datotemp = $datotemp . "'".$dato."'".$str;
					 if ($y == 1)$rectitulo =$dato;
					 if ($y == 4)$recnombre =$dato;
					  if ($y ==5)$recemail =$dato;
						 }
					  
						 
						 $query =	"INSERT INTO recetas ($fieldtemp) VALUES ($datotemp)";
						 
						 mysql_query($query) or  die (mysql_error()); 
						$query =	"delete from ".$table." WHERE `id` = '$id'";
						
						 mysql_query($query) or die ("err Borrar recetasupg"); 
						 
if (isset($recemail) && !empty($recemail)){ 				 
  $de = "info@comermas.com.ar";
  $para= $recemail;
  $asunto="Su receta ha sido publicada en ComerMas";
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
  $cuerpo = "<p><b>".$recnombre." :</b><br>Su receta <i>'". $rectitulo ."' </i> ha sido publicada en nuestro sitio. Gracias por compartirla con nosotros <br><br>Muchas gracias <br>ComerMas.</p>";
   mail("$para","$asunto",$cuerpo,$headers."From: ".$de);

 }
        

 							 
					}
					
				}
		}
	    ////////////////////////mover a encargados y base///
	
	if($action == "movpla"){
	$msgtext  ="";
	 $fieldtext =  array(1);
	 $idbasearr =  array(1);
	 
	for ($i=1;$i<=$limit;$i++)		
				{
				
 			$fieldtemp= "";
			$datotemp ="";
			$fieldcheck =5;
			$fieldfound ="";
			
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 
					 for ($y=1;$y<mysql_num_fields($RS)-8;$y++)
					 	{
	 				 $field =mysql_field_name($RS,$y);
					  $dato = "";
					 if (isset($_POST[$i.mysql_field_name($RS,$y)]) && !empty($_POST[$i.mysql_field_name($RS,$y)])) $dato = $_POST[$i.mysql_field_name($RS,$y)];
					 $str = "";
					 if (mysql_num_fields($RS) > $y+9) $str = ",";
					 $fieldtemp = $fieldtemp . "`". $field ."`". $str; 
					 $datotemp = $datotemp . "'".$dato."'".$str;
					  if ($y == $fieldcheck) $fieldfound = $field ."='". $dato."'";
					   if ($y == 1) $fieldtext[$i] = $dato;
					 }
					  
					  
					    //// chequea si esta MIRA SI NO EXISTE EL TELEFONO YA EN LA BASE
						 $sql="SELECT * FROM base where $fieldfound" ;
						 
						 $result = mysql_query($sql);
					 	 $num_rows = mysql_num_rows($result);
					  
						  if (!($num_rows))		//SI NO EXITE EL TEL ESCRIBE EN LA BASE , AL PEDO LEER LO DE ABAJO
						  {
					  
					   $query =	"INSERT INTO base ($fieldtemp) VALUES ($datotemp)";
						 mysql_query($query) or  die (mysql_error()); 
						 
						 /// busca el id que le asigno la base
						 $sql="SELECT * FROM base where $fieldfound" ;
  
						 $result = mysql_query($sql);
					 	 $rs = mysql_fetch_Array($result);
						 $idbase = $rs["id"];
						 $idbasearr[$i] = $idbase;
						 
						 }else{//SI EL TELEFONO YA ESTA ,LO AGREGO IGUAL, PORQUE PUEDE CAMBIAR DE DUEÑO Y CONSERVAN TELEFONO, CASO TORONTO Y CLE, DESCUBRI BUG EAF2010
						 					   $query =	"INSERT INTO base ($fieldtemp) VALUES ($datotemp)";
						 mysql_query($query) or  die (mysql_error()); 
						 
						 /// busca el id que le asigno la base
						 $sql="SELECT * FROM base where $fieldfound" ;
  
						 $result = mysql_query($sql);
					 	 $rs = mysql_fetch_Array($result);
						 $idbase = $rs["id"];
						 $idbasearr[$i] = $idbase;
						 
						 
						 }
					}
					
				}
				
				
				for ($i=1;$i<=$limit;$i++)
		
				{
 			$fieldtemp= "";
			$datotemp ="";
			$encnombre = "";
			$encemail ="";
               	if (isset($_POST['tilde'.$i]) && !empty($_POST['tilde'.$i])) 
			   		{
					 $id = $_POST['tilde'.$i];
					 
					 for ($y=9;$y<mysql_num_fields($RS);$y++)
					 	{
	 				 $field =mysql_field_name($RS,$y);
					  $dato = "";
					 if (isset($_POST[$i.mysql_field_name($RS,$y)]) && !empty($_POST[$i.mysql_field_name($RS,$y)])) $dato = $_POST[$i.mysql_field_name($RS,$y)];
					 $str = "";
					 if (mysql_num_fields($RS) > $y+1) $str = ",";
					 $fieldtemp = $fieldtemp . "`". $field ."`". $str; 
					 $datotemp = $datotemp . "'".$dato."'".$str;
					 
					  if ($y == 9)$encnombre =$dato;
					  if ($y ==11)$encemail =$dato;
					 
					 
					 }
					    if (!($num_rows))		//SI NO ENCONTRO EL NRO DE TELEFONO DUPLICADO, PASA LO MISMO QUE ARRIBA PERO CON ENCARGADOS
						  {
						  $idbasec = "comermas" . $idbase;
					   $query =	"INSERT INTO encargados (`nombreLugar`, $fieldtemp,`usr`,`password`,`encreservas`,`encnotas`,`encr`,`encweb`) VALUES ('$idbasearr[$i]',$datotemp,'$idbasec','$idbasec','',3,1,'')";
 
					 mysql_query($query) or  die (mysql_error()); 
					 
					    $query = "UPDATE `base` SET `visitas` = '0' WHERE `id` = '$idbase' ";
						 mysql_query($query) or  die (mysql_error()); 
					 
					 
					   $query =	"delete from ".$table." WHERE `id` = '$id'";
					  mysql_query($query) or  die (mysql_error()); 
					  
					   //echo "email". $encemail;
						 
						 if (isset($encemail) && !empty($encemail)){ 				 
  						$de = "info@comermas.com.ar";
 						 $para= $encemail;
  							$asunto="Su Lugar ha sido publicado en ComerMas";
  							$headers  = "MIME-Version: 1.0\r\n";
  						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 						 $cuerpo = "<p><b>".$encnombre." :</b><br>Su lugar <i>'". $fieldtext[$i] ."' </i> ha sido publicado en nuestro sitio. Ud. puede modificar sus detalles y agregar imagenes desde<br> http://www.comermas.com.ar/manager/ <br>Con el usuario:".$idbasec." Clave:".$idbasec." <br>Gracias por compartirlo con nosotros <br><br>ComerMas.</p>";
  							 mail("$para","$asunto",$cuerpo,$headers."From: ".$de);
							 }
    
					  
						 }else{
						  $msgtext = $msgtext .$fieldtext[$i]. ": Se encontraba ya en la tabla BASE, REVISAR QUE NO SEA DUPLICADO!!!<br>";
						  //$query =	"delete from ".$table." WHERE `id` = '$id'";
						 //mysql_query($query) or die ("err Borrar Baseupg"); 
						//ESTAS DOS LINEAS BORRABAN EL REGISTRO QUE SE HABIA INGRESADO NUEVO,
						//TAMBIEN ME INTERESA QUE LE LLEGUE EL MAIL AL ENCARGADO PORQUE UN ENCARGADO PODRIA AGREGAR UN LUGAR QUE YA EXISTE AGREGADO POR NOSOTROS.				 
						//Y ACA AGREGO LO MISMO DE ARRIBA, AGREGAR A BASE Y ENCARGADOS Y BORRAR  LO QUE SE AGREGO DE BASEUPG
						  $idbasec = "comermas" . $idbase;
					   $query =	"INSERT INTO encargados (`nombreLugar`, $fieldtemp,`usr`,`password`,`encreservas`,`encnotas`,`encr`,`encweb`) VALUES ('$idbasearr[$i]',$datotemp,'$idbasec','$idbasec','',3,1,'')";
 
					 mysql_query($query) or  die (mysql_error()); 
					 
					    $query = "UPDATE `base` SET `visitas` = '0' WHERE `id` = '$idbase' ";
						 mysql_query($query) or  die (mysql_error()); 
					 
					 
					   $query =	"delete from ".$table." WHERE `id` = '$id'";
					  mysql_query($query) or  die (mysql_error()); 
					  
					   //echo "email". $encemail;
						 
						 if (isset($encemail) && !empty($encemail)){ 				 
  						$de = "info@comermas.com.ar";
 						 $para= $encemail;
  							$asunto="Su Lugar ha sido publicado en ComerMas";
  							$headers  = "MIME-Version: 1.0\r\n";
  						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 						 $cuerpo = "<p><b>".$encnombre." :</b><br>Su lugar <i>'". $fieldtext[$i] ."' </i> ha sido publicado en nuestro sitio. Ud. puede modificar sus detalles y agregar imagenes desde<br> http://www.comermas.com.ar/manager/ <br>Con el usuario:".$idbasec." Clave:".$idbasec." <br>Gracias por compartirlo con nosotros <br><br>ComerMas.</p>";
  							 mail("$para","$asunto",$cuerpo,$headers."From: ".$de);
							 }
//FIN DE LAS NOTAS EAF2010


						 
						 
						 
						 }
					}
					
				}
				
				
				
				
				
				
				
				
		}
	    ///////////////////////////
	
	
  }
  /////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////





					 



















	/////// refresco la consulta en caso que se add/modif/del /////// 
	 
	if (isset($_POST[ckquery]) && !empty($_POST[ckquery]) && $_POST[ckquery] == "on") {
	 
	$RS = @mysql_query($sqlqry) or  die (mysql_error()); 
	}else {
	$RS = @mysql_query($sqlqry.$sqllimit) or die ("ERROR: Busqueda!."); 
	}
	 
	
	////////////////////////////////////////////////////////////////	
 	$inputype =  array(1);
	$relnom = "no";
	for ($i=0;$i<mysql_num_fields($RS);$i++){
	// lleno el encabezado de la tabla, 1er TR
	$NombreDeCamposEnTabla[$i]= '<TD><b><font size="-1" color="#FFFFFF">'.mysql_field_name($RS,$i).' ('.mysql_field_type($RS,$i).')</font></b></TD>';
	$NombreDeCamposEnTablaexport[$i]= '<TD><b><font size="-1">'.mysql_field_name($RS,$i).' ('.mysql_field_type($RS,$i).')</font></b></TD>'; 
	if (mysql_field_name($RS,$i) =='id_base') $relnom = "si";
	if (mysql_field_name($RS,$i) =='nombreLugar') $relnom = "si";
	
	if (mysql_field_type($RS,$i) == "blob") {
	$inputype[$i]='1';
	 
	} else {
	$inputype[$i]='0';
	 
	}
	
	};



echo 'Bienvenido: <b>'.$_SESSION['username'] ."</b><br>";
echo "Fecha/Hora :".date ('d-m-Y')." - ".date('H:m:s')."<br>";
echo "<br>";
echo "Base :".$db_name."<br>";
echo "Tabla :".$table."<br>";
echo "Consulta realizada :<i>".$sqlqry."</i>";

 
  	if (isset($msgtext) && !empty($msgtext)) {
	echo "<br>";
	echo "<br>";
	echo "------------------------------------------------------------------------------------------------------------------------------<br>";
	echo $msgtext;
	echo "------------------------------------------------------------------------------------------------------------------------------<br>";
	}

?>
<br>
<br>
<?	recordsetNav($mysql_link,$sqlqry,'dbshow.php',$qry ,$offset,$limit,'100%',1,1)?>

<form name="frm" action="dbshow.php" method="post">
<br>
<table cellpadding="1" cellspacing="0" border="0"  bordercolor="#FFFFFF" bgcolor="#B46465">
<?
//// lleno variabla para para exportar
$_SESSION["reportexcel"] = '<table cellpadding="1" cellspacing="0" border="1" >';
$_SESSION["reportexcel"] = $_SESSION["reportexcel"].'<TR>';
$_SESSION["reportexcel"] = $_SESSION["reportexcel"].Join($NombreDeCamposEnTablaexport);
$_SESSION["reportexcel"] = $_SESSION["reportexcel"].'</TR>';
/////////

echo '<TR>';
echo '<TD>*</TD>'.Join($NombreDeCamposEnTabla);
echo '</TR>';
$temp="'"; //estas dos var las hago porque tengo que meter 'tildeXXX' con los ''
$temp2="tilde";
//BARREDO Arriba abajo
$cont = 1;
 while ($RS1 = mysql_fetch_Array($RS)){
//lleno la fila TR de la tabla con los campos a madida que avanza el RS, BARREDOR IZQ A DERECHA
for ($i=0;$i<mysql_num_fields($RS);$i++)
{
 //// lleno variabla para para exportar

    $idbase ="";
	 $onmouseover = "";
	   $onmouseout=  "";
   if (($relnom== "si") && ($i==1)) {
  
   $sql="SELECT * FROM base where id='$RS1[$i]'" ;
   $result = mysql_query($sql);
   $rs = mysql_fetch_Array($result);
   $idbase = $rs["nombre"];
   $idbase  = " - ".  $idbase;
   $onmouseover= "pmaTooltip('".$idbase."'); return false;"; 
   $onmouseout=  "swapTooltip('default'); return false;"; 
  }
	
	
	
	//////////////////// 
	 $CamposEnTablaexport[$i]='<TD>'.$RS1[$i].$idbase.'</TD>';
	if ($inputype[$i] == '0')  $CamposEnTabla[$i]='<TD><input maxlength="255"  style="height:30px; width:140px;font-size:8pt;border=0" OnKeyDown="checkmodif('.$temp.$temp2.$cont.$temp.')" name="'.$cont.mysql_field_name($RS,$i).'" Value="'.$RS1[$i].'"  onmouseover="'.$onmouseover.'" onmouseout="'.$onmouseout.'"> </TD>';
	if ($inputype[$i] == '1')  $CamposEnTabla[$i]='<TD><textarea cols="95" rows="2" style="width:140px;font-size:8pt;border=0" OnKeyDown="checkmodif('.$temp.$temp2.$cont.$temp.')" name="'.$cont.mysql_field_name($RS,$i).'">'.$RS1[$i].'</textarea></TD>';
	 

}
//// lleno variabla para para exportar
 $_SESSION["reportexcel"] = $_SESSION["reportexcel"].'<TR>';
 $_SESSION["reportexcel"] = $_SESSION["reportexcel"] .Join($CamposEnTablaexport);
 $_SESSION["reportexcel"] = $_SESSION["reportexcel"]. '</TR>';
///////////////////////////////

echo '<TR>';
echo '<TD><input type="checkbox" value="'.$RS1[0].'" id="tilde'.$cont. '"' .' name="tilde'.$cont.'" ></td>'.Join($CamposEnTabla);
echo '</TR>';

$cont = $cont +1;
};//FIN BARREDOR ARRIBA ABAJO
//// lleno variabla para para exportar
 $_SESSION["reportexcel"] = $_SESSION["reportexcel"]. "</table>";
/////
 ?>

</table>
 
<table border="0" cellpadding="1" cellspacing="0"  bordercolor="#FFFFFF" bgcolor="#B46465">

<?
//Filas del agregador

//'el campo cero no lo incluyo para el llenado por eso i=1
//filas de tabla para el agregar, cada input de cada celda se llama el r mas el nombre de ese campo
$temp3='tildeadd';

for ($r=1;$r<=$RegistrosVacios;$r++){
for ($i=1;$i<mysql_num_fields($RS);$i++){

 
 

if ($inputype[$i] == '0') $TablaVacia[$i]='<TD><input maxlength="255" style="height:30px;width:140px;font-size:8pt;border=0" OnKeyDown="checkmodif('.$temp.$temp3.$r.$temp.');" name="add'.$r.mysql_field_name($RS,$i).'"></TD>';
if ($inputype[$i] == '1') $TablaVacia[$i]='<TD><textarea cols="95" rows="2"input maxlength="255" OnKeyDown="checkmodif('.$temp.$temp3.$r.$temp.');" name="add'.$r.mysql_field_name($RS,$i).'" style="width:140px;font-size:8pt;border=0"></textarea></TD>';
};

echo '<TR>';
echo '<TD><input type=checkbox name="tildeadd'.$r.'"></input></td><TD><input style="height:30px;width:140px;font-size:8pt" type="text" value="Agregar--->>"></TD>'.Join($TablaVacia);
echo '</TR>';
};
//fin de filas del agregador



?>
</table>
<br>

<div align="left">
  <input type="button" name="Submit2" value="*" onClick="checkm(<?=$limit?>)">
  <input name="Submit22" type="button" onClick="checkd(<?=$limit?>)" value="O">
  Agregar de a 
  <input style="font-size:8pt;" name="txtcantidadagregar"type="text" value="<? echo $RegistrosVacios ?>" size="2" maxlength="2"> </input>registro(s) 
<button onClick="document.frm.action='dbshow.php';document.frm.submit();" style="font-size:8pt"> Refrescar</button></div><br>

<button onClick="document.frm.action='dbshow.php?action=addnew&offset=<?=$offset?>';document.frm.submit();" style="font-size:8pt">Agregar / Modificar Registro(s)</button>
<button onClick="document.frm.action='dbshow.php?action=del&offset=<?=$offset?>';document.frm.submit();" style="font-size:8pt">Eliminar Registro(s)</button>
 <br> <br>
<? if ($table== "base") { ?><button onClick="document.frm.action='dbshow.php?action=adddes';document.frm.submit();" style="font-size:8pt">Agregar a Tabla DESTACADOS</button><? }?>
<? if ($table== "base") { ?><button onClick="document.frm.action='dbshow.php?action=addenc';document.frm.submit();" style="font-size:8pt">Crear Perfil ENCARGADO </button><? }?>
<? if ($table== "usuariosupg") { ?> <button onClick="document.frm.action='dbshow.php?action=movusr';document.frm.submit();" style="font-size:8pt">Mover a Tabla USUARIOS</button><? }?>
<? if ($table== "recetasupg") { ?> <button onClick="document.frm.action='dbshow.php?action=movrec';document.frm.submit();" style="font-size:8pt">Mover a Tabla RECETAS</button><? }?>
 <? if ($table== "baseupg") { ?> <button onClick="document.frm.action='dbshow.php?action=movpla';document.frm.submit();" style="font-size:8pt">Mover a Tabla BASE y ENCARGADOS</button><? }?>

<BR>
<BR><input type="button" style="   font-size:9px; width:120px" onClick="NewWindow('export.php','reportxls','260','60','no','center');return false" value="EXPORTAR A XLS">
</form>
<button style="font-size:8pt" onClick="document.frm.action='adm.php';document.frm.submit();">Volver</button>
</center>
</BODY>
</HTML>

