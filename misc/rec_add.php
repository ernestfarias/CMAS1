<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet><body class="Naranja10">
Su informacion ha sido procesada, la receta sera verificada y publicada a la brevedad. 

<?  header("Cache-Control: no-store, no-cache, must-revalidate");
 
if(isset($_POST["txtrecetatitulo"]) && !empty($_POST["txtrecetatitulo"])) {
 require_once('../includes/validador.php'); 
 require_once('../includes/catalog.php');   
	 require_once('../includes/date.php');   
 	      
ValidarDatos(($_POST["txtrecetatitulo"]));
 	ValidarDatos(($_POST["txtreceta"]));
 	ValidarDatos(($_POST["enviadopor"]));
	ValidarDatos(($_POST["txrecetasemail"]));

     $nombre = addslashes ($_POST["txtrecetatitulo"]);
    			  $receta =addslashes ($_POST["txtreceta"]); 
				  $enviadapor =addslashes ($_POST["enviadopor"]);
  				  $email = addslashes ($_POST["txrecetasemail"]);
				   
 
if (getenv("HTTP_X_FORWARDED_FOR")) {
    	 $ip   = getenv("HTTP_X_FORWARDED_FOR");
	   } else {
	     $ip   = getenv("REMOTE_ADDR");
	  }
    	
	   	$fecha = datear("Y/m/d"); 	
		  $hora = datear("H:i:s"); 	

//receta = replace(request.Form("txtreceta")&" - "& vbcrlf &request.Form("enviadopor")& " - " &request.Form("txrecetasemail"),"'","''")
 $sql = "INSERT INTO recetasupg(nombre, detalle, ip,enviadapor,email,fecha,hora ) VALUES ('$nombre','$receta','$ip', '$enviadapor','$email','$fecha' ,'$hora')"; 
	$results = mysql_query($sql) or die ("sql err"); 
	 
 
} else {
 require_once('../includes/validador.php'); 
ValidarDatos(($_POST["txtrecetatitulo"]));
 	ValidarDatos(($_POST["txtreceta"]));
 	ValidarDatos(($_POST["enviadopor"]));
	ValidarDatos(($_POST["txrecetasemail"]));
}

?>

