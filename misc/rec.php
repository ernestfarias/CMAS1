<?//header("Cache-Control: no-store, no-cache, must-revalidate");
 
  if(isset($_GET["id"]) && !empty($_GET["id"])) {
	$v = addslashes($_GET["id"]);
 require_once('../includes/catalog.php'); 
 $url = "../";
 } else {
	$v =  rand (1, 1351);
	 require_once('includes/catalog.php'); 
 } 

	$sqlrecetas = "Select * from recetas where id= '$v'";
	$rsrecetas = @mysql_query($sqlrecetas) or die ("err recetas"); 
		$row = @mysql_fetch_array($rsrecetas);  	

    $id = $row["id"];		
    $nombre = $row["nombre"];
    $detallest = $row["detalle"];
	$enviadapor= "";
	$enviadapor =$row["enviadapor"];
	$email ="";
	$email =$row["email"];
	
	  if(isset($enviadapor) && !empty($enviadapor)) $enviadapor = "\n\nEnviado por ".$enviadapor."";
	  if(isset($email) && !empty($email)) $email =  "\n(".$email.")\n";
	  
	  
	 $detallest2 = str_replace(chr(10), chr(13), $detallest);
	$detalles =  $detallest . $enviadapor .$email."Nro." .$id .">";
		echo '<LINK href= "'.$url.'includes/comermas.css" type=text/css rel=stylesheet>';
 echo  '<SCRIPT TYPE="text/javascript" SRC="'.$url.'includes/ajax.js" language="javascript1.2"></SCRIPT>';
//echo  '<SCRIPT TYPE="text/javascript" SRC="'.$url.'includes/recetas.js" language="javascript1.2"></SCRIPT>';
?> 
<!-- <table width="100%" height="315" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="ae5959"> -->
<center>
<div align="center"><img src="<?=$url?>botones/recetas.gif" width="234" height="24"></div>
<table>
  <tr><td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" > 
        <textarea name="txtreceta" readonly  style="width:360px;height:150px;font-size:8pt;background:#FFCC99;color:'purple'; " rows="1" cols="20" ><?=$detalles?></textarea>
        </font> 
				</td>
    </tr>
<tr><td align="right"><img align="top" src="<?=$url?>images/cuis15.gif" width="110" height="76"></td></tr>	
<!--     SACO EL LOS DOS INPUT Y EL BOTON QUE FALLAN EN ALGUNOS BROWSERS, ADEMAS NO SE CARGAN MAS RECETAS EAF2010 
<tr>
      <td height="81" align="right" valign="top"><span class="Naranja14"><a name="recetadatos" style="visibility:'hidden'">Enviada por:
            <input name="enviadopor" style="width:180px;font-size:9pt;">
            <br>
E-mail:
<input name="txrecetasemail" style="width:180px;font-size:9pt;">
      </a><br>
      <div  class="Naranja10" id="contenidorecetas">&nbsp;</div>  <input name="btnenviorecetas" alt="Envianos Tu receta Favorita!!!" style="margin:2px;background-color:#B36464;color:white;border-color:orange;font-size:9pt;cursor:pointer;BORDER-WIDTH: 4px" type="button" value="Comparti tus secretos en la cocina" onClick="cargareceta('<?=$url?>')">
      </span>
        <input  name="btncancelareceta" value="Cancelar" style="visibility:'hidden';margin:2px;background-color:#B36464;color:white;border-color:orange;font-size:9pt;cursor:pointer;BORDER-WIDTH: 4px" type="button" onClick="canceloreceta()"></td>
      <td><img align="top" src="<?=$url?>images/cuis15.gif" width="110" height="76"></td>
    </tr> -->
    <!--   <script>refreshreceta();</script> -->
</table>
</center> 
	
