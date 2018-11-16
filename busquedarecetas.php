<?  session_start(); 
 require_once('includes/catalog.php'); 
  require_once('includes/validador.php'); 

  
 	 $limit = 20; // 
	 	$qry= "";
	
  if(isset($_GET["offset"]) && !empty($_GET["offset"]))
	{
	$offset = addslashes($_GET["offset"]);
 	} else {
    $offset = 0;
 	$que = "";
	$donde = "";
	$userinputst = "";
	$claselugarst = "";
	$barriost ="";
	$ciudadst = "";
	}
	
	


	if($_SESSION["que"] && !empty($_SESSION["que"])) $que = $_SESSION["que"];
	if($_SESSION["userinputst"] && !empty($_SESSION["userinputst"])) $userinputst = $_SESSION["userinputst"] ;
 	
 
	 
	if(isset($_POST["textop_nombres"]) && !empty($_POST["textop_nombres"])) {
ValidarDatos(stripslashes ($_POST["textop_nombres"]));
				$userinputstt = addslashes ($_POST["textop_nombres"]);
				$userinputst1 = str_replace("'", "''", $userinputstt); 
				$userinputst2 = str_replace("á", "a", $userinputstt);  
				$userinputst3 = str_replace("é", "e", $userinputst2);  
				$userinputst4 = str_replace("í", "i", $userinputst3);  
				$userinputst5 = str_replace("ó", "o", $userinputst4);  
			   	 $userinputst = str_replace("ú", "u", $userinputst5); 
		 	             $que = $userinputst;  
	 $_SESSION["userinputst"] = $userinputst;

			 $_SESSION["que"] = $que;
	} else {
		 $_SESSION["userinputst"] = "";
		 $que = "todas";
	     $_SESSION["que"] = $que;
		 $userinputst = "";
	}



if(isset($userinputst) && !empty($userinputst)) {
$sqlbusqueda =   "Select id,nombre,detalle FROM recetas where nombre like  '%$userinputst%' order by nombre";
$sqlbusqueda1 =   "Select id,nombre,detalle FROM recetas where nombre like  '%$userinputst%' order by nombre";
} else { 
$sqlbusqueda =   "Select id,nombre,detalle FROM recetas order by nombre";
$sqlbusqueda1 =   "Select id,nombre,detalle FROM recetas order by nombre";
}


 
		$rsbusqueda1 = @mysql_query($sqlbusqueda1) or die ("ERROR: Busqueda!."); 
		$t = @mysql_num_rows($rsbusqueda1); 

 	
		$sqllimit = " LIMIT " . $offset . "," . $limit; 
		$rsbusqueda = @mysql_query($sqlbusqueda.$sqllimit) or die ("ERROR: Busqueda!."); 
// echo $sqlbusqueda;	
 
 $totalrecords = @mysql_num_rows($rsbusqueda); 
 
?>

<html>
<head>

<META NAME="keywords" CONTENT="comidas,recetas,ingredientes,papa,matambre,pizzas,empandas,carnes,pollos,risottos">
<META NAME="description" CONTENT="Recetas para tu cocina, aporta tus recetas e ingredientes">

<meta name="robots" content="all,index,follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Recetas para tu cocina</title>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 


</head>
<body bgcolor="ae5959" leftmargin="0" topmargin="0">
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF"><img src="Marcos/Blanco/Blanco.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td height="20" valign="top" bgcolor="#FFFFFF"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="90" background="<?=$_SESSION["bannertop"] ?>" bgcolor="ae5959">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td valign="top" bgcolor="#FFFFFF"><img src="Marcos/Blanco/Blanco.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td valign="top" bgcolor="#FFFFFF"> <table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td valign="top" bgcolor="#AE5959"> 
            <table width="100%" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="20" height="20" rowspan="2">&nbsp;</td>
                <td height="10" valign="middle"> <div align="center"> <br>
                    <span class="BlancoBold10">BUSQUEDA REALIZADA :<em> 
                    <?= strtoupper($que)?> 
                    </em><em></em></span><em><br>
                    
					  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="right">                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="history.back()"><font color="#FFFFFF"><strong><font color="#FFFFFF">Volver</font></strong></button></td>
                      </tr>
                    </table>
                    </em> 
                    <div align="right"> </div>
                </div></td>
                <td width="20" height="20" rowspan="2">&nbsp;</td>
              </tr>
              <tr> 
                <td height="2" valign="middle" bgcolor="#B36464"><img src="botones/blancogris.gif" width="100%" height="2"></td>
              </tr>
              <tr> 
                <td width="20" height="44">&nbsp;</td>
                <td height="44" nowrap> <table width="100%" height="23" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000" name="T_result">
                    <tr bordercolor="#FFFFFF" bgcolor="#FF9900" class="BlancoBold10"> 
                      <td width="317" height="20" bgcolor="#851549"> <div align="left">NOMBRE</div></td>
                      <td height="20" bgcolor="#851549"> <div align="left">DETALLES</div>
                        <div align="left"><b></b></div></td>
                    </tr>
                    <?
					$varcolorIndex  = 0;
		 while ($row = @mysql_fetch_array($rsbusqueda)) { 
				  $id = $row["id"];   
  				  $nombre = $row["nombre"];   


     if  ($varcolorIndex == 1) { 
 			$varcolorIndex = 0 ;
    		$varcolor = "#AE5959";
		} else {
		     $varcolorIndex = 1;
		     $varcolor = "#B36464"; 
			 }
			 
			 $desca =  ucwords(addslashes($row["detalle"])); 
	  
  
	$cant = strlen($desca);
     if ($cant > '100') { 
     $detalles = stripslashes((substr($desca, 0, 95))."...");
   	    } else { 
   	    $detalles = stripslashes($desca);
   	    }

			 
			 ?>
                    <tr bgcolor="<?=$varcolor?>" class="BlancoBold10"> 
                      <td height="20" width="317" bordercolor="#FFFFFF"><b><a href="javascript:NewWindow('misc/rec.php?id=<?=$id?>','recetas','630','350','yes','center')"><?=ucwords($nombre)?></a></b> </td>
                       <td height="20" bordercolor="#FFFFFF"><b><?=$detalles?></b></td>
                    </tr>
<? }
?>
                  </table>
                  <img src="botones/blancogris.gif" width="100%" height="2"></td>
                <td width="20" height="44">&nbsp;</td>
              </tr>
              <tr> 
                <td height="18" colspan="3" nowrap>
                  <div align="center"><?					  	recordsetNav($mysql_link,$sqlbusqueda,'busquedarecetas.php',$qry ,$offset,$limit,'85%',1,1); ?>               
                  </div>                  <div align="center"></div></td>
              </tr>
            </table>
            <div align="center"> 
              <div align="center"> 
                <p>  
                  <% 	
  	if rsC_total > 0 then  
	%>
                  
                  <? 	
  	  if ($totalrecords > 0) {
	  
	?>
                  <a href="http://www.comermas.com.ar" class="Naranja14">Pagina 
                  principal</a>  </p>
                <? } else {?>
                <span class="Blanco10">NO SE HAN ENCONTRADO 
                RECETAS. REALICE UNA</span>  <a href="index.asp" class="Naranja14">NUEVA 
                BUSQUEDA</a><br>
                <br>
              </div>
            
              <? } ?>


<div>

<div class="Naranja14">
    Si no lo encontraste buscalo en Google...
  </div>
<form action="http://www.comermas.com.ar/busqueda.php" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-7392026547974093:4vgauuffc32" />
    <input type="hidden" name="cof" value="FORID:9" />
    <input type="hidden" name="ie" value="ISO-8859-1" />
    <input type="text" name="q" size="40" />
    <input type="submit" name="sa" value="Buscar" />
  </div>
</form>
<script type="text/javascript" src="http://www.google.com.ar/cse/brand?form=cse-search-box&lang=es"></script>


<div>
<div id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 730;
  var googleSearchDomain = "www.google.com.ar";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
</div>


</div>



            </div>
          
            <center>
              <a href=# class="Naranja14" onClick="NewWindow('./registra/regplace.php','addplace','600','500','yes','center');return false"> 
              Agrege 
              su local a la base de ComerMas(gratis)</a> <br>
              <br>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td align="center">

<div align="center">
<script type="text/javascript"><!--
google_ad_client = "pub-7392026547974093";
/* 728x90, creado 4/03/10 */
google_ad_slot = "4772935266";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
 </div>

<br>

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="400" height="50">
                      <param name="movie" value="banners/bannerwidth.swf">
                      <param name="quality" value="high">
                      <embed src="banners/bannerwidth.swf" width="400" height="50" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></object>


</td>
                </tr>
              </table>
    <br>
            </center>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="2" valign="top" bgcolor="#FFFFFF"><img src="Marcos/Blanco/Blanco.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td height="10" valign="top" bgcolor="#FFFFFF"><? require_once('includes/bot.php')?></td>
  </tr>
  <tr> 
    <td height="2" valign="top" bgcolor="#FFFFFF"><img src="Marcos/Blanco/Blanco.gif" width="1" height="1"></td>
  </tr>
</table>
<?
 
if(isset($_GET["offset"]) && !empty($_GET["offset"])) {
} else {

	 
 	if(isset($_POST["textop_nombres"]) && !empty($_POST["textop_nombres"])) {
		 	    $userinputstt = addslashes ($_POST["textop_nombres"]);
				$userinputst1 = str_replace("'", "''", $userinputstt); 
				$userinputst2 = str_replace("á", "a", $userinputstt);  
				$userinputst3 = str_replace("é", "e", $userinputst2);  
				$userinputst4 = str_replace("í", "i", $userinputst3);  
				$userinputst5 = str_replace("ó", "o", $userinputst4);  
			   	$userinputst = str_replace("ú", "u", $userinputst5); 
				$que = $userinputst;  
	 }
 


 
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
	 	$busquedat = $que ;
        $lugart =  ""; 
 
	
	
	
		$sqlcontrol = "INSERT INTO busqueda(ip, busqueda, lugar, itemsfound ,cliente, fecha, hora) values('$ip','$busquedat', '$lugart','$t','$browser','$fecha','$hora')";
	   mysql_query($sqlcontrol) or die(mysql_error());  

 
}
?>
</body>
</html> 



