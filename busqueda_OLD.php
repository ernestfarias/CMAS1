<? session_start();  
/* echo '<font color="#FFFFFF" size=2>';
print_r($_SESSION);
echo "POSTES<br>";
print_r($_POST);
echo "<br>"; DEBUGGER */
 require_once('includes/catalog.php'); 
 	$limit = 10;
    $qry= "";
    $offset = 0;
	$sep = "";
	
if(isset($_GET["offset"]) && !empty($_GET["offset"])) //true le dio click a btn avance
{
	$offset = addslashes($_GET["offset"]);
}


if  (!empty($_POST)) //posteo algo, cargo las variables y seteo las de session
{
$userinputst = addslashes ($_POST["textop_nombres"]);
$userinputst = str_replace("'", "''", $userinputst);
$userinputst = str_replace("�", "a", $userinputst);  
$userinputst = str_replace("�", "e", $userinputst);  
$userinputst = str_replace("�", "i", $userinputst);  
$userinputst = str_replace("�", "o", $userinputst);  
$userinputst = str_replace("�", "u", $userinputst); 
$claselugarst = $_POST["op_tipos"];
$ciudadst = $_POST["op_lugares"];
$barriost = $_POST["op_barrios"];
$que = $userinputst; //esto es solo para poner que busca arriba cuando pasa hojas
$donde = $ciudadst;	//idem arriba

$_SESSION["userinputst"] = $userinputst;
$_SESSION["claselugarst"] = $claselugarst;
$_SESSION["ciudadst"] = $ciudadst;
$_SESSION["barriost"] = $barriost;
$_SESSION["que"] = $userinputst; 
$_SESSION["donde"] = $ciudadst;

} 
 
if  (empty($_POST)) //no hay postings, estaria el paginador, cargo variables con las de session
{
$userinputst = $_SESSION["userinputst"];
$claselugarst = $_SESSION["claselugarst"];
$ciudadst = $_SESSION["ciudadst"];
$barriost = $_SESSION["barriost"];
$que = $_SESSION["que"];
$donde = $_SESSION["donde"];
}


if(isset($userinputst) && !empty($userinputst)) { //si el tipo busca algo se busca en todos lados

$userinputst = " AND (nombre like '%$userinputst%' OR direccion like  '%$userinputst%' OR detalles1 like '%$userinputst%' OR detalles2 like '%$userinputst%' OR clase like '%$userinputst%' OR barrio like '%$userinputst%' OR localidad like '%$userinputst%') ";
}


if(strtoupper($ciudadst) != 'CAPITAL FEDERAL')
{
	if ($ciudadst=='TODAS')
		{
	$barriost=" ";
	$ciudadst=" ";
		}
		else
		{
	$ciudadst = " AND (localidad='$ciudadst' OR barrio='$ciudadst')";
	$barriost = " "; //por ahora no identificamos barrios en la db de otros lugares que no sean de cap.
		}
}


if(strtoupper($ciudadst) == 'CAPITAL FEDERAL')
{
	if ($barriost=='TODOS')
		{
		$ciudadst = " AND localidad='$ciudadst'";
		$barriost = " ";
		}
			else
		{
		$ciudadst = " AND localidad='$ciudadst'";
		$barriost = " AND barrio='$barriost' ";
		}		
}

 
if(isset($claselugarst) && !empty($claselugarst)) {
if ($claselugarst == "TODOS")  {
$claselugarst = "";
} else {

$claselugarst = " AND clase like '%$claselugarst%' ";
}
}
 
$sqlcant = "Select id FROM base where id IS NOT NULL ". $ciudadst. " ". $barriost ." ". $userinputst ." ". $claselugarst;  //es para sacar la cantidad

$rscant= @mysql_query($sqlcant) or die (mysql_error()."SQLCANT----->>>".$sqlcant); 
$t  = @mysql_num_rows($rscant); 

$sqlbusqueda = "Select id,nombre,direccion,barrio,telefono,detalles1,detalles2,clase,localidad FROM base where id IS NOT NULL ". $ciudadst. " ". $barriost ." ". $userinputst ." ". $claselugarst . "order by nombre";

$qry = $sqlbusqueda;
//echo $sqlbusqueda; //DEBUGGER!!
		$sqllimit = " LIMIT " . $offset . "," . $limit; 
		$rsbusqueda = @mysql_query($sqlbusqueda.$sqllimit) or die (mysql_error()."SQLBUSQUEDA----->>>".$sqlbusqueda); 
	
 
 $totalrecords = @mysql_num_rows($rsbusqueda); 
 

   
?>



<html>
<head>

<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 

<script language="JavaScript">
<!--
function hidestatus(){
window.status='Bienvenido a ComerMas'
return true
}
if (document.layers)
document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT)
document.onmouseover=hidestatus
document.onmouseout=hidestatus

  	function MM_reloadPage(init) {  //reloads the window if Nav4 resized
	  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
	    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
	  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();	
	}
	MM_reloadPage(true);


function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}

	function Zoom(nombre,aumento) //(nomre del objeto, aumento) ;aumento puede ser positivo o negativo, by eaf
	{
	nombre.style.width=parseInt(nombre.style.width)+aumento+"px";
	nombre.style.height=parseInt(nombre.style.height)+aumento+"px";
}
// -->
</script>


</head>
<body bgcolor="ae5959" leftmargin="0" topmargin="0">
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td height="90"><table width="777" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td background="<?=$_SESSION["bannertop"] ?>" bgcolor="ae5959">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td valign="top" bgcolor="#AE5959"> 
            <table width="100%" height="88" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="20" height="20" rowspan="2">&nbsp;</td>
                <td height="10" valign="middle"> <div align="center"><strong><font color="#FFFFFF"><br>
                      <span class="BlancoBold10">BUSQUEDA REALIZADA :<em> <? echo strtoupper($que)?> </em>EN<em> <? echo strtoupper($donde) ?></em></span><em><br>
                    </em></strong>
                    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="right">                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="window.location='http://www.comermas.com.ar'"><font color="#FFFFFF"><strong>Volver</strong></button></td>
                      </tr>
                    </table>
                    <strong><font color="#FFFFFF">                    
                    <div align="right"> </div>
                    </strong></div></td>
                <td width="20" height="20" rowspan="2">&nbsp;</td>
              </tr>
              <tr> 
                <td height="2" valign="middle" bgcolor="#B36464"><img src="botones/blancogris.gif" width="100%" height="2"></td>
              </tr>
              <tr> 
                <td width="20" height="44">&nbsp;</td>
                <td height="44" nowrap> <table width="100%" height="23" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000" name="T_result">
                    <tr bgcolor="#FF9900" bordercolor="#FFFFFF"> 
                      <td width="317" height="20" bgcolor="#851549" class="BlancoBold10"> <div align="left">NOMBRE</div></td>
                      <td width="166" height="20" bgcolor="#851549" class="BlancoBold10"> <div align="left">DIRECCION</div></td>
                      <td width="122" height="20" bgcolor="#851549" class="BlancoBold10"> <div align="left">BARRIO</div></td>
                      <td width="97" height="20" bgcolor="#851549" class="BlancoBold10"> <div align="left">TELEFONO(s)</div></td>
                    </tr>
 
			<?
			$varcolorIndex  = 0; 
			while ($row = @mysql_fetch_array($rsbusqueda)) { 
				  $id = $row["id"];   
				    $nombre = $row["nombre"];   
					  $direccion = $row["direccion"];   
					    $barrio =  strtoupper($row["barrio"]);
						  $clase = $row["clase"];
						    $telefono = $row["telefono"];   
			      
  if ($barrio == "") {
  	$barrio1 = ($row["localidad"]);
	$barrio =  ucwords(strtolower($barrio1));
	$barrio =  strtoupper($barrio1);
	}
        if  ($varcolorIndex == 1) { 
 			$varcolorIndex = 0 ;
    		$varcolor = "#AE5959";
		} else {
		     $varcolorIndex = 1;
		     $varcolor = "#B36464";
	  }?>
                    <tr bgcolor="<? echo $varcolor?>" class="Blanco10"> 
  <td height="20" width="317" bordercolor="#FFFFFF"><b><a href="detalles.php?id=<?=$id?>&id2=<?=$telefono?>"><?=ucwords($nombre)?></a></b><span class="Naranja10"> (<?=$clase?>)</span></td>
                      <td height="20" width="166" bordercolor="#FFFFFF"><?=$direccion?></td>
                      <td height="20" width="122" bordercolor="#FFFFFF"><?=$barrio?></td>
                      <td height="20" width="97" bordercolor="#FFFFFF"><div align="left"><b><b><?=$telefono?></b></b></div></td>
                    </tr>
                    
					<? 
					
					}?>
					
                  </table>
                  <img src="botones/blancogris.gif" width="100%" height="2"></td>
                <td width="20" height="44">&nbsp;</td>
              </tr>
              <tr>              </tr>
            </table>
            
            <table width="100%" height="18" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="18" valign="middle"><div align="center" class="Estilo3">
				  <? 	
  	 
	  	recordsetNav($mysql_link,$sqlbusqueda,'busqueda.php',$qry ,$offset,$limit,'45%',1,1); 
	
	?>         
                  
                </div></td>
              </tr>
            </table>
            
            <table width="100%" height="19" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
			    <td height="19" valign="middle" nowrap><div align="center" class="Estilo1">				</div></td>
			    <td width="20" height="19">&nbsp;</td>
              </tr>
            </table>
            <div align="center"> 
              <div align="center"> 
                <p> 
                  <? 	
  	  if ($totalrecords > 0) {
	  
	?>
                  
				  <a href="http://www.comermas.com.ar" class="Naranja14">Pagina 
                  principal</a>  </p>
                <? } else { ?>
                <span class="Blanco10">NO SE HAN ENCONTRADO 
                LUGARES. REALICE UNA  </span><a href="index.php" class="Naranja14">NUEVA 
                BUSQUEDA</a><br>
                <br>
              </div>
             
              <? } ?>
            </div> 
            
            <center>
              <a href=# onClick="NewWindow('./registra/regplace.php','addplace','600','500','yes','center');return false">              <span class="Naranja14"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Agrege 
              su local a la base de ComerMas(gratis)</span></a> <span class="Naranja10"><br>
              </span><br>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="400" height="50">
                      <param name="movie" value="banners/bannerwidth.swf">
                      <param name="quality" value="high">
                      <embed src="banners/bannerwidth.swf" width="400" height="50" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></object></td>
                </tr>
              </table>
              <p><br>
                <br>
              </p>
              <p>&nbsp; </p>
          </center>          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="2"><img src="Marcos/Blanco/Blanco.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td><? require_once('includes/bot.php')?></td>
  </tr>
  <tr> 
    <td height="2"><img src="Marcos/Blanco/Blanco.gif" width="1" height="1"></td>
  </tr>
</table>
<?
 
 

if(!empty($_POST)) { // guardo en la db lo que busca el tipo
 
require_once('includes/catalog.php'); 
	require_once('includes/date.php');  	

	 if (getenv("HTTP_X_FORWARDED_FOR")) {
    	 $ip   = getenv("HTTP_X_FORWARDED_FOR");
	   } else {
	     $ip   = getenv("REMOTE_ADDR");
	  }
     	$browser = getenv("HTTP_USER_AGENT");		
	   	$fecha = datear("Y/m/d"); 	
		$hora = datear("H:i:s"); 

		if(isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"])) {
			$refer = $_SERVER["HTTP_REFERER"];
		}else{
			$refer = "http://www.comermas.com.ar";
		}
	 	$busquedat = $que . " - " .$tipos;
        $lugart =  $lugar . " - " . $barrios ;
 

	
		$sqlcontrol = "INSERT INTO busqueda(ip, busqueda, lugar, itemsfound ,cliente, fecha, hora) values('$ip','$busquedat', '$lugart','$t','$browser','$fecha','$hora')";
	   mysql_query($sqlcontrol) or die(mysql_error());  

}

?>


</body>
</html>



