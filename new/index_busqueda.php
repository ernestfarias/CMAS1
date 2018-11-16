<LINK REL="StyleSheet" HREF="includes/style.css" TYPE="text/css">
<? 
header("Cache-Control: no-store, no-cache, must-revalidate");
session_start();  
 
  require_once('includes/catalog.php'); 
  require_once('includes/refresh.php'); 
 	$limit = 20;
    $qry= "";
    $offset = 0;
	$sep = "";
	
if(isset($_GET["offset"]) && !empty($_GET["offset"])) //true le dio click a btn avance
{
	$offset = addslashes($_GET["offset"]);
}


if  (!empty($_POST)) //posteo algo, cargo las variables y seteo las de session
{
//$userinputst = addslashes ($_POST["textop_nombres"]);
//$userinputst = str_replace("'", "''", $userinputst);
$userinputst =  stripslashes($_POST["textop_nombres"]);
$userinputst = str_replace("'", "\'", $userinputst);
$userinputst = str_replace("á", "a", $userinputst);
$userinputst = str_replace("é", "e", $userinputst);
$userinputst = str_replace("í", "i", $userinputst);
$userinputst = str_replace("ó", "o", $userinputst);
$userinputst = str_replace("ú", "u", $userinputst);
$claselugarst = $_POST["op_tipos"];


$ciudadst = $_POST["op_lugares"];
$barriost = $_POST["op_barrios"];


$ciudadst =  refreshdata('ciudades','ciudad','id',$_POST["op_lugares"]);
$barriost = refreshdata('barrios','barrios','id',$_POST["op_barrios"]);

$que = $userinputst." ".$claselugarst; //esto es solo para poner que busca arriba cuando pasa hojas
$donde = $ciudadst." ".$barriost;	//idem arriba
 
//los if son para que no tire el warning de mierda se ponen al escribir una var de SESS
if (isset($_POST["textop_nombres"])) {$_SESSION["userinputst"] = $userinputst;}
if (isset($_POST["op_tipos"])) {$_SESSION["claselugarst"] = $claselugarst;}
if (isset($_POST["op_lugares"])) {$_SESSION["ciudadst"] = $ciudadst;}
if (isset($_POST["op_barrios"])) {$_SESSION["barriost"] = $barriost;}

if (isset($que)) {$_SESSION["que"] = $que;}
if (isset($donde)) {$_SESSION["donde"] = $donde;}

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
 
 //echo "total:".$totalrecords;
   
?>

 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="100%" height="100%" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100%" height="100%" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top" style="padding-left:5px ">
                              <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td></td>
                                </tr>
                
              <td height="124" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="right" valign="top">
                        <table width="100%" height="93" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="middle"> </td>
                            </tr>
                          <tr>
                            <td height="12" valign="middle">                              <table width="100%"  border="0" cellspacing="0" cellpadding="10">
                                        <tr>
                                          <td align="right">                                             <div align="center"><span class="Textos"><strong>BUSQUEDA REALIZADA</strong> :<em> <? echo stripslashes(strtoupper($que))?></em> <strong>EN</strong> <em> <? echo strtoupper($donde) ?></em> <br>  	
										          <? recordsetNavAJAX($mysql_link,$sqlbusqueda,'index_busqueda.php',$qry ,$offset,$limit,'85%',1,0); ?>
                                          </span></div></td>
                                          </tr>
                                      </table>                             
                                        </td>
                            </tr>
                          <tr>
                            <td height="2" valign="middle"><img src="images/blancogris.gif" width="100%" height="2"></td>
                          </tr>
                          <tr>
                            <td height="44" nowrap>
                              <table width="100%" height="23" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#000000" name="T_result">
                                <tr bordercolor="#FFFFFF" bgcolor="#FF9900" class="header2">
                                  <td width="579" height="20" bgcolor="#B15759" class="BlancoBold10">
                                    <div align="left" class="encabezados"><strong>&nbsp;NOMBRE</strong></div></td>
                                  <td width="365" height="20" bgcolor="#B15759" class="encabezados">
                                    <div align="left"><strong>DIRECCION</strong></div></td>
                                  <td width="201" height="20" bgcolor="#B15759" class="encabezados">
                                    <div align="left"><strong>BARRIO</strong></div></td>
                                  <td width="107" height="20" bgcolor="#B15759" class="encabezados">
                                    <div align="left"><strong>TELEFONO(s)</strong></div></td>
                                </tr>
                                <?
			$varcolorIndex  = 0; 
			while ($row = @mysql_fetch_array($rsbusqueda)) { 
				  $id = $row["id"];   
				    $nombre = utf8_encode($row["nombre"]);   
					  $direccion = utf8_encode($row["direccion"]);   
					    $barrio =  utf8_encode(strtoupper($row["barrio"]));
						  $clase = utf8_encode($row["clase"]);
						    $telefono = $row["telefono"];   
			      
  if ($barrio == "") {
  	$barrio1 = ($row["localidad"]);
	$barrio =  ucwords(strtolower($barrio1));
	$barrio =  strtoupper($barrio1);
	}
        if  ($varcolorIndex == 1) { 
 			$varcolorIndex = 0 ;
    		$varcolor = "#F8F0D0";
		} else {
		     $varcolorIndex = 1;
		     $varcolor = "#F1E09E";
	  }?>
                                <tr bgcolor="<? echo $varcolor?>" class="Textos10px"  >
                                  <td height="20" width="579" bordercolor="#FFFFFF"><b><a href=# onclick="CargarContenido('index_detalles.php?id=<?=$id?>','contenido','refrescarlista')">
                                    &nbsp;<?=ucwords($nombre)?>
                                    </a></b><span  > (
                                    <?=$clase?>
                                    )</span></td>
                                  <td width="365" height="20" bordercolor="#FFFFFF"><?=$direccion?></td>
                                  <td height="20" width="201" bordercolor="#FFFFFF"><?=$barrio?></td>
                                  <td height="20" width="107" bordercolor="#FFFFFF"><div align="left">
                                     <b> <?=$telefono?></b>
                                  </div></td>
                                </tr>
                                <? 
					
					}?>
                              </table>
                              <img src="images/blancogris.gif" width="100%" height="2"></td>
                          </tr>
                        </table>
                        <table width="100%" height="18" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="18" valign="middle">
                              <div align="center"><? 	
  	 
	  	recordsetNavAJAX($mysql_link,$sqlbusqueda,'index_busqueda.php',$qry ,$offset,$limit,'85%',0,1); 
	
	?>
                            </div></td>
                          </tr>
                        </table>
                        <table width="100%" height="19" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="19" valign="middle" nowrap><div align="center" class="Estilo1"> </div></td>
                            <td width="20" height="19">&nbsp;</td>
                          </tr>
                        </table>
                        <div align="center">
                          <div align="center">
                            <div id="dright" style="position:absolute; left:686px; top:147px; width:75px; height:64px; z-index:2"><img src="images/+volver.gif" onClick="CargarContenido('index_home.php','contenido','refrescarlista')"></div>
                            <p>
                              <? 	
  	  if ($totalrecords > 0) {
	  
	?>
                              <a href="http://www.comermas.com.ar"  class="style2" >Pagina principal</a></p>
                            <blockquote>
                              <p>
                                <? } else { ?>
                                <span class="style2">NO SE HAN ENCONTRADO LUGARES. REALICE UNA <a href=# onClick="CargarContenido('index_home.php','contenido','refrescarlista')">NUEVA BUSQUEDA</a></span><br>
                                <br>
                              </p>
                            </blockquote>
                          </div>
                          <? } ?>
                        </div>
                        <center>
                          <a href=# onClick="NewWindow('./registra/regplace.php','addplace','600','500','yes','center');return false"> <span class="Naranja14"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Agrege su local a la base de ComerMas(gratis)</font></span></a><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> <span class="Naranja10"><br>
                          </span><br>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="400" height="50">
                                  <param name="movie" value="banners/bannerwidth.swf">
                                  <param name="quality" value="high">
                                  <embed src="banners/bannerwidth.swf" width="400" height="50" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                              </object></td>
                            </tr>
                          </table>
                          <p><br>
                              <br>
                          </p>
                          <p>&nbsp; </p>
                          </font>
                      </center></td>
                    </tr>
                </table></td>
                  <? 
			//	$row = 			@mysql_fetch_array($rsdestacados);

//				 $id = $row["id"];   
	//			  $nombre = $row["nombre"];  
			//	  $direccion = $row["direccion"]; 
			//	  $barrio = $row["barrio"]; 
			//	  $localidad = $row["localidad"]; 
			 // 	  $telefono = $row["telefono"]; 
			//	  $stars = $row["stars"];
			      $foto = $row["foto"];
 
	// if ($row = @mysql_fetch_array($rsdestacados)) {
//	 } else {
	  
	 ?>
              </tr>
 
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table></td>
                  </tr>
              </table>
                </td>
            </tr>
          </table>