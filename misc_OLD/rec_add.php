<HTML>
<HEAD>
<script language="JavaScript">
//window.close()
//var w=1;
//this.resizeTo(w,h);
//var LeftPosition=(screen.width)?(screen.width-w)/2:100;
//var TopPosition=(screen.height)?(screen.height-h)/2:100;}
//this.moveTo(LeftPosition,TopPosition)

</script>
<?
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
	 
 
 echo "<script>window.close()</script>)";
}

?>
<title>Guardando Receta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>
<BODY  bgcolor="ae5959">
<br>
<center>
  <h3><font color="#FFFFFF">Enviando receta...</font></h3>
</center>

</body>
</HTML>
