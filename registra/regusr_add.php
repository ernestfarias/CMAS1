<?  
 $msgnewusr = "no";
		if(isset($_POST["txtregemail"]) && !empty($_POST["txtregemail"]))
		{
	  
						
		ValidarDatos(($_POST["txtregapellido"]));
		ValidarDatos(($_POST["txtregnombre"]));
		ValidarDatos(($_POST["txtregemail"]));
		ValidarDatos(($_POST["txtregtelefono"]));
		
		ValidarDatos(($_POST["txtregfecnacd"]));
		ValidarDatos(($_POST["txtregfecnacm"]));
		ValidarDatos(($_POST["txtregfecnaca"]));
		
		
		ValidarDatos(($_POST["presentacion"]));
		ValidarDatos(($_POST["txtregcomo"]));
		ValidarDatos(($_POST["txtregpass"]));
		ValidarDatos(($_POST["txtregpassc"]));
		ValidarDatos(($_POST["txtregapodo"]));
						
		$nombre = addslashes($_POST["txtregnombre"]);
		
		$nombre1 = addslashes($_POST["txtregnombre"]);
		$apellido = addslashes($_POST["txtregapellido"]);
		$email = addslashes($_POST["txtregemail"]);
		$telefono = addslashes($_POST["txtregtelefono"]);
		$barrio = addslashes($_POST["txtregbarrio"]);
		$fecnac = addslashes($_POST["txtregfecnacd"])."/".addslashes($_POST["txtregfecnacm"])."/".addslashes($_POST["txtregfecnaca"]);
		
		$fecnacd = addslashes($_POST["txtregfecnacd"]);
		$fecnacm = addslashes($_POST["txtregfecnacm"]);
		$fecnaca = addslashes($_POST["txtregfecnaca"]);
		
		
		
		
		$como = addslashes($_POST["txtregcomo"]);
		$pass = addslashes($_POST["txtregpass"]);
		$apodo = addslashes($_POST["txtregapodo"]);
						
		if(isset($_GET["id"]) && !empty($_GET["id"]))
			{  
			}else{
		$sql = "SELECT *FROM usuarios where email='$email'";
		$qry= @mysql_query($sql) or die ("1ee");
		$totalcorreo = @mysql_num_rows($qry); 
 		if ($totalcorreo>0) $msgcorreo = "La direccion de <b>correo</b> electronico ya se encuentra en la base de datos de comermas.";
		} 
		
		$sql = "SELECT *FROM usuarios where apodo='$apodo'";
		$qry= @mysql_query($sql) or die ("1ee");
		$totalapodo = @mysql_num_rows($qry); 
		
		$rs = mysql_fetch_Array($qry);
		 $id = $rs['id'];
		if(isset($_GET["id"]) && !empty($_GET["id"])) if ($id==$_GET["id"]) $totalapodo =0; 
		//esto es cuando esta editando el tipo y no cambie el apodo que no detecte que ya esta porque en realidad es el del tipo
		
 		if ($totalapodo>0) $msgapodo =  "El <b>apado</b> ya ha sido utilizado por otro usuario en comermas.";
						
						 
						
						if (($totalcorreo>0) or ($totalapodo>0)) {
						$volver ="<br><br><a href=# onClick='history.back()'>volver al formulario</a>";
						$msg  = "<b>Error en la carga del formulario de registracion verfique el siguiente error :</b><br><br>". $msgcorreo ."<br>".$msgapodo.$volver;
						}
		
						
						if (($totalcorreo==0) && ($totalapodo==0)) {
						
						
						
						
						
						
						
						
						if (getenv("HTTP_X_FORWARDED_FOR")) {
								 $ipaddress   = getenv("HTTP_X_FORWARDED_FOR");
							   } else {
								 $ipaddress   = getenv("REMOTE_ADDR");
							  } 
						
						
						
								  $cliente = getenv("HTTP_USER_AGENT");
						 
						if(isset($_SESSION["refer"]) && !empty($_SESSION["refer"])) {
							$referer = $_SESSION["refer"];  
							} else {
							$referer = "http://www.comermas.com.ar";
							}
						
						
								$fecha = datear("m/d/Y"); 	
								$hora = datear("H:i:s"); 	
								$activo = md5($email.date('dmyhis')."comermasactivaciondelorto");
						
						
						
						
						
						if(isset($_GET["id"]) && !empty($_GET["id"]))
					{ 
					
					ValidarDatos(($_GET["id"]));
					$id =$_GET["id"];
					
					
					$sql = "UPDATE `usuarios` SET `nombre` = '$nombre',`apellido` = '$apellido',`email` = '$email',`password` = '$pass',`apodo` = '$apodo',`telefono` = '$telefono',`barrio` = '$barrio',`fecnac` = '$fecnac',`como` = '$como' WHERE `id` = '$id'" ;

					
					} else {
						$sql = "INSERT INTO usuarios(nombre,apellido,email,apodo,password,telefono,barrio,fecnac,como,ipaddress,cliente,fecha,hora,referer,activo,permiso)values('$nombre','$apellido','$email','$apodo','$pass','$telefono','$barrio','$fecnac','$como','$ipaddress','$cliente','$fecha','$hora','$referer','$activo','usuario')";
						}
						
						
						
						
						
						
						mysql_query($sql) or die (mysql_error()); 
						 
						 
						 
						 if(isset($_GET["id"]) && !empty($_GET["id"]))
					{ 
					
					} else {
								 $de = "info@comermas.com.ar";
								$para= $email;
								//$para="c_magnone@hotmail.com";
								$asunto="Activa tu cuenta en ComerMas.com.ar";
						
						
								$headers  = "MIME-Version: 1.0\r\n";
								$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						
								$cuerpo = "<html><b>".$nombre. " :</b><br>Este mensaje es para validar tu casilla de correo, para terminar con la activacion de tu cuenta click <a href='http://www.comermas.com.ar/activa.php?activo=".$activo."'>aqui</a>  <br><br><i>la activación tiene vigencia por 10 días, de no activar la cuenta la misma quedara invalidada y en el caso que necesites registrarte deberás iniciar el tramite.</i><br><br><br>Gracias ComerMas </html>"; 
								
								
								mail("$para","$asunto",$cuerpo,$headers."From: ".$de);
						 }
						 
						 
						$msgnewusr = "si";
		   }
		}
		
?>