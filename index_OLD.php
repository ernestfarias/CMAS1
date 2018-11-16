<html>
<head>
<?php session_start(); 

 $_SESSION["que"] = "";
 $_SESSION["donde"]= "";
	 $_SESSION["userinputst"]= "" ;
	 $_SESSION["claselugarst"] = "";
	 $_SESSION["barriost"] = "";
		 $_SESSION["ciudadst"]= "";
	 

?>
<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 

<script language="JavaScript" type="text/javascript">
<!--
function hidestatus(){
window.status='Bienvenido a www.ComerMas.com.ar'
return true
}
if (document.layers)
document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT)
document.onmouseover=hidestatus
document.onmouseout=hidestatus


window.onresize = tomarHW;
function tomarHW() {

var winW = document.body.offsetWidth , winH = document.body.offsetWidthHeight;

var ObjPosLeft = winW / 2 - 100;
if (winW < 600) {ObjPosLeft = 200};
document.all.LayerRegistrar.style.left = ObjPosLeft+"px";
document.all.LayerLogin.style.left = (ObjPosLeft)+"px";
}

function NewWindowEAF(mypage,myname,w,h,scroll,pos,status,menu,tool,res){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status='+status+',menubar='+menu+',toolbar='+tool+',resizable='+res+'';
win=window.open(mypage,myname,settings);}

var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}

var opt =null;  
 
 	function ClearFrm()
	{
	window.document.frm_opc.op_lugares.selectedIndex = 1;
	window.document.frm_opc.op_tipos.selectedIndex = 1;
	window.document.frm_opc.op_barrios.selectedIndex = 1;
 	window.document.frm_opc.textop_barrios.value = '';
    opt = "resto";
	document.frmencuesta.encuesta[0].checked=true;
	
	 var ns6 = (!document.all && document.getElementById);
	var ie4 = (document.all);
	var ns4 = (document.layers);
	
	if (ns6) {
			 
 
 	window.document.getElementById("op1").style.background = "#851549"; 
 	window.document.getElementById("op2").style.background = "#B36464"; 
			
			}
		else if(ie4) {
 
 	window.document.frm_opc.all("op1").style.background = "#851549"; 
 	window.document.frm_opc.all("op2").style.background = "#B36464"; 
			}
		else if(ns4) {
			 
			}
	
	
	}	

 	 function Shownombres()
	 {
			if (window.document.frm_opc.textop_nombres.value.length > 0)
				{
	 			window.document.frm_opc.op_tipos.selectedIndex = 1;
	 			window.document.frm_opc.op_tipos.disabled = true;			
				}
			else
				{
 				window.document.frm_opc.op_tipos.selectedIndex = 0;
 				window.document.frm_opc.op_tipos.disabled = false;
 				}
				
		}
 
	 
	 
	function ShowBarrio(lugar){
 		 document.frm_opc.textop_barrios.style.left = document.frm_opc.op_barrios.style.left;
		 document.frm_opc.textop_barrios.style.left = "0"
		if (lugar=="SELECCIONAR...")
			{	

			document.frm_opc.textop_barrios.disabled =true;
		    document.frm_opc.textop_barrios.value='';
			document.frm_opc.textop_barrios.style.backgroundColor='#EFEFEF';	
			}
		else
			{
			if (lugar=="Capital Federal")
				 {
	
				 document.frm_opc.textop_barrios.value='';
				 document.frm_opc.textop_barrios.disabled =true;
				 document.frm_opc.op_barrios.disabled =false;
			 	 }
			else {

				 document.frm_opc.textop_barrios.disabled =false ;
				 document.frm_opc.textop_barrios.style.backgroundColor='#FFFFFF';
				document.frm_opc.op_barrios.value='TODOS';	
				 document.frm_opc.op_barrios.disabled =true;	
			 	 }
		}
		window.document.frm_opc.textop_nombres.focus();
	}




 function resto(){
 var ns6 = (!document.all && document.getElementById);
	var ie4 = (document.all);
	var ns4 = (document.layers);
	
	if (ns6) {
			 
			window.document.getElementById("op_lugares").style.visibility = 'visible';
	window.document.getElementById("op_tipos").style.visibility = 'visible';
	window.document.getElementById("op_barrios").style.visibility = 'visible';
	window.document.getElementById("CIUDAD").innerHTML ='CIUDAD:'; 
	window.document.getElementById("BARRIO").innerHTML ='BARRIO:'; 
	window.document.getElementById("TIPO").innerHTML ='TIPO / CLASE:'; 
		window.document.getElementById("img").style.visibility = 'visible';
 	window.document.getElementById("op1").style.background = "#851549"; 
 	window.document.getElementById("op2").style.background = "#B36464";  
			
			}
		else if(ie4) {
	  
  	window.document.frm_opc.op_lugares.style.visibility = 'visible';
	window.document.frm_opc.op_tipos.style.visibility = 'visible';
	window.document.frm_opc.op_barrios.style.visibility = 'visible';
	window.document.frm_opc.all("CIUDAD").innerHTML ='CIUDAD:'; 
	window.document.frm_opc.all("BARRIO").innerHTML ='BARRIO:'; 
	window.document.frm_opc.all("TIPO").innerHTML ='TIPO / CLASE:'; 
		window.document.frm_opc.img.style.visibility = 'visible';
 	window.document.frm_opc.all("op1").style.background = "#851549"; 
 	window.document.frm_opc.all("op2").style.background = "#B36464"; 
			}
		else if(ns4) {
			 
			}
	

 
 opt = "resto";
 } 
 
  function recetas(){
 
  var ns6 = (!document.all && document.getElementById);
	var ie4 = (document.all);
	var ns4 = (document.layers);
	
	if (ns6) {
			 
			 
		window.document.getElementById("op_lugares").style.visibility = 'hidden';
	window.document.getElementById("op_tipos").style.visibility = 'hidden';
	window.document.getElementById("op_barrios").style.visibility = 'hidden';
	window.document.getElementById("CIUDAD").innerHTML =''; 
	window.document.getElementById("BARRIO").innerHTML ='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapido y Facil...'; 
	window.document.getElementById("TIPO").innerHTML ='BUSQUE SU RECETA...'; 
	window.document.getElementById("img").style.visibility = 'hidden';
 	window.document.getElementById("op_tipos").selectedIndex = 1;
	 window.document.getElementById("op_barrios").selectedIndex = 1;
 	window.document.getElementById("op2").style.background = "#851549"; 
	window.document.getElementById("op1").style.background = "#B36464"; 
			
			}
		else if(ie4) {
	  
  	window.document.frm_opc.op_lugares.style.visibility = 'hidden';
	window.document.frm_opc.op_tipos.style.visibility = 'hidden';
	window.document.frm_opc.op_barrios.style.visibility = 'hidden';
	window.document.frm_opc.all("CIUDAD").innerHTML =''; 
	window.document.frm_opc.all("BARRIO").innerHTML ='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapido y Facil...'; 
	window.document.frm_opc.all("TIPO").innerHTML ='BUSQUE SU RECETA...'; 
	window.document.frm_opc.img.style.visibility = 'hidden';
 	window.document.frm_opc.op_tipos.selectedIndex = 1;
	 window.document.frm_opc.op_barrios.selectedIndex = 1;
 	window.document.frm_opc.all("op2").style.background = "#851549"; 
	window.document.frm_opc.all("op1").style.background = "#B36464"; 
			}
		else if(ns4) {
			 
			}
	

  
	 opt = "recetas";
  }
    
  
	function Verificador(){
	var error = '';

	//if (window.document.frm_opc.op_lugares.selectedIndex == 0)
	//	error = error + 'Debe Seleccionar una Ciudad. \n'; 

    if (window.document.frm_opc.op_barrios.options[window.document.frm_opc.op_barrios.selectedIndex].value=="SELECCIONAR..." && window.document.frm_opc.textop_barrios.value.length == 0)
		error = error + 'Debe Seleccionar un Barrio. \n'; 
  
	if (window.document.frm_opc.op_tipos.options[window.document.frm_opc.op_tipos.selectedIndex].value=="SELECCIONAR...")
		error = error + 'Debe Seleccionar la especialidad o Tipo de Cocina. \n'; 
 
	if (error!='')
		alert(error);
	else
		{
		window.document.frm_opc.op_tipos.disabled = false;


 if (opt == "resto"){
		window.document.frm_opc.action = "busqueda.php"
  		window.document.frm_opc.submit();
} else {
		window.document.frm_opc.action = "busquedarecetas.php"
  		window.document.frm_opc.submit();


 }
		
				
		}
	}
	function MM_reloadPage(init) {  //reloads the INDEX if Nav4 resized
	  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
	    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
	  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();	
	}
	MM_reloadPage(true);

	function Zoom(nombre,aumento) //(nomre del objeto, aumento) ;aumento puede ser positivo o negativo, by eaf
	{
	nombre.style.width=parseInt(nombre.style.width)+aumento+"px";
	nombre.style.height=parseInt(nombre.style.height)+aumento+"px";

}
 
 -->
</script>
</head>




<?  
// session_start();

 
//Chequeo navegador
//if InStr(Request.ServerVariables("HTTP_USER_AGENT"), "MSIE") then 'cheuqua solo si en IExplore u otro
$browsert = getenv("HTTP_USER_AGENT");
$vart = strpos($browsert, "MSIE");


if ($vart === false) {
		$browser= "otro";
	} else {
    	
	 $browser= "MSIE";
	}
 

  
//Abro la DB
require_once('includes/catalog.php'); 

//Declaro los RS
$sqlbarrio = "Select * from barrios Order by barrios";
$sqllugares = "SELECT * FROM ciudades order by ciudad";
$sqltipos = "Select * from clases order by clase";
$sqlencuesta = "Select * from encuesta order by id";
$sqldestacados = "SELECT *FROM base INNER JOIN destacados ON base.id = destacados.id order by posicion";
 
// $sqldestacados = "SELECT * FROM destacados order by posicion";




$rsbarrios= @mysql_query($sqlbarrio) or die ("err sql1"); 
$rslugares= @mysql_query($sqllugares) or die ("err sql2"); 
$rstipos= @mysql_query($sqltipos) or die ("err sql3"); 
$rsdestacados= @mysql_query($sqldestacados) or die ("err sql4"); 
$rsencuesta= @mysql_query($sqlencuesta) or die ("err sql5"); 
 
  
// Random de banners de la izq ,y el de arriba
  $sqlbannerlefta = "select banner from banners where posicion='left1'";
  $rsbannerlefta= @mysql_query($sqlbannerlefta) or die ("err sql6");   
  $bannerat = mysql_fetch_Array($rsbannerlefta);
  $bannera = "banners/".   $bannerat['banner'] ;

  $sqlbannerleftb = "select banner from banners where posicion='left2'";
  $rsbannerleftb= @mysql_query($sqlbannerleftb) or die ("err sql7"); 
  $bannerbt = mysql_fetch_Array($rsbannerleftb);
  $bannerb = "banners/".   $bannerbt['banner'] ;
;
 

 

 $ramdom =rand (1, 4);

    	$sqlbannertop = "select banner from banners where posicion='top".$ramdom."'";
		$rsbannertop = @mysql_query($sqlbannertop) or die ("err sql8"); 
	    $bannertopt = mysql_fetch_Array($rsbannertop);
	  
	    $bannertop = "banners/".$bannertopt['banner'];
  	   $_SESSION["bannertop"] = $bannertop
 
?>

  
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload="ClearFrm();ShowBarrio(window.document.frm_opc.op_lugares.options[window.document.frm_opc.op_lugares.selectedIndex].value)">
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="1" colspan="5"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="90" colspan="5"><table width="777" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td background="<?=$bannertop?>" bgcolor="#AE5959">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr> 
          <td colspan="1"></td>
        </tr>
        <tr> 
          <td width="150" valign="top" bgcolor="#ae5959"><? require_once('includes/left.php')?></td>
          <td width="1"></td>
          <td width="475" valign="top" bgcolor="#ae5959"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#B36464">
              <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%" height="20" onMouseOver="this.bgColor='#851549'; this.style.cursor= 'pointer'" onMouseOut="this.bgColor=''">
                      <div align="center"><a href="quienes.php" class="Naranja10" style="textDecorationNone:'false'; color:''">QUIENES SOMOS?</a></div></td>
                    <td width="50%" height="20" onMouseOver="this.bgColor='#851549'; this.style.cursor= 'pointer'" onMouseOut="this.bgColor=''">
                      <div align="center"><a href="publicidad.php" class="Naranja10" style="textDecorationNone:'false'; color:''">PUBLICIDAD</a></div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td><img src="marcos/blanco/blanco.gif" width="100%" height="1"></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3">
                    <tr>
                              <td width="103" height="146"><font color="#0000FF" face="Geneva, Arial, Helvetica, sans-serif"><b> </b> </font></td>
                              <td width="458">
                                <FORM id="frm_opc" style="margin:0px;padding:0px;" name="frm_opc" onsubmit="javascript:if (!Verificador()){return false};" method=post action="busqueda.php">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="65%" valign="bottom">
                                              <div align="right">
                                                <table width="93%" height="19" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td id ="op1" width="51%" height="19" align="center" valign="middle"  onMouseOver="this.style.cursor= 'pointer'"  onMouseOut="" onMouseDown="resto();">
                                                      <div align="center" class="BlancoBold10">RESTAURANTS </div></td>
                                                    <td id = "op2" width="28%" align="center" valign="middle" onMouseOver="this.style.cursor= 'pointer'"  onMouseOut=""  onMouseDown="recetas()">
                                                      <div align="center" class="BlancoBold10"> RECETAS</div></td>
                                                    <td width="21%"> </td>
                                                  </tr>
                                                </table>
                                            </div></td>
                                            <td width="35%"><img src="botones/busqueda.gif" width="100" height="32"> </td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                  </table>
                                  <table width="364" border="0" align="left" cellpadding="0" cellspacing="0" rules="none" style="margin:0px;padding:0px;" name="Tabla1">
                                    <tr>
                                      <td width="15" align="left" valign="top"><img src="marcos/blanco/arriz.gif" width="15" height="15"></td>
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF"><IMG src="botones/consulta.gif" name="img" align="absbottom" id="img"></td>
                                      <td align="left" valign="middle" bgcolor="#FFFFFF"><div class="Negro10" ID="CIUDAD">CIUDAD:</div></td>
                                      <td width="15" align="left" valign="top"><img src="marcos/blanco/arrder.gif" width="15" height="15"></td>
                                    </tr>
                                    <tr>
                                      <td width="15" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="z-Index:0">
                                        <input type="text" id="textop_nombres" name="textop_nombres" style="width:160px;font-size:7pt" onKeyUp="javascript:Shownombres();">
                                      </td>
                                      <td align="left" valign="middle" bgcolor="#FFFFFF">
                                        <select type="text" id="op_lugares" name="op_lugares" class="text" style="width:160px;font-size:7pt;border-width:0px;border-color: white" onChange="ShowBarrio(window.document.frm_opc.op_lugares.options[window.document.frm_opc.op_lugares.selectedIndex].value);" >
                                          <option value="TODOS" selected>TODOS</option>
										    <option value="Capital Federal">CAPITAL FEDERAL</option>
                                          <? while ($row = @mysql_fetch_array($rslugares)) { 
								    $ciudad1 = ($row["ciudad"]); 
									//$ciudad = ucwords(strtolower($ciudad1));
									$ciudad = strtoupper($ciudad1);

									?>
                                          <option value="<?=$ciudad1?>">
                                          <?=$ciudad?>
                                          </option>
                                          <? } ?>
                                        </select>
                                        <input type="hidden" name="textop_barrios" class="text" size="0" style="width:1px;font-size:8pt;visibility:hidden;">
                                      </td>
                                      <td width="15" align="justify" valign="top" bgcolor="#FFFFFF" background="marcos/blanco/blancoder15px.gif">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="15" rowspan="2" bgcolor="#FFFFFF"></td>
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="z-Index:0"> <font size="-2" face="Verdana, Arial, Helvetica, sans-serif">
                                        <div class="Negro10" ID="TIPO">TIPO/CLASE:</div>
                                      </font></td>
                                      <td width="160" align="left" valign="middle" bgcolor="#FFFFFF"> <font size="-2" face="Verdana, Arial, Helvetica, sans-serif">
                                        <div class="Negro10" ID="BARRIO">BARRIO:</div>
                                      </font></td>
                                      <td  width="15" rowspan="2" align="justify" background="marcos/blanco/blancoder15px.gif"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="z-Index:0"><select type="text" id="op_tipos" name="op_tipos" class="text" style="width:160px;font-size:7pt;z-Index:0;visibility:inherit" >
                                          <option value="SELECCIONAR...">SELECCIONAR...</option>
                                          <option value="TODOS" selected>TODOS</option>
                                          <? while ($row = @mysql_fetch_array($rstipos)) { 
								    $tipo = strtoupper($row["clase"]); ?>
                                          <option value="<?=$tipo ?>">
                                          <?=$tipo?>
                                          </option>
                                          <? }?>
                                      </select></td>
                                      <td width="160" align="left" valign="middle" bgcolor="#FFFFFF"><select class="text" id="op_barrios" name="op_barrios" style="width:160px;font-size:7pt;">
                                          <option value="SELECCIONAR...">SELECCIONAR...</option>
                                          <option value="TODOS" selected>TODOS</option>
                                          <? while ($row = @mysql_fetch_array($rsbarrios)) { 
								    $barrios = strtoupper($row["barrios"]); ?>
                                          <option value="<?=$barrios?>">
                                          <?=$barrios?>
                                          </option>
                                          <? }?>
                                      </select></td>
                                    </tr>
                                    <tr>
                                      <td width="15" height="15" valign="top"><img src="marcos/blanco/abiz.gif" width="15" height="15"></td>
                                      <td height="15" colspan="2" align="center" valign="top" background="marcos/blanco/blancoab15px.gif"><img src="botones/btnmilugar.gif" alt="Sugiera un local a la base de ComerMas" name="go2" border=0 style="width:113;height:13;cursor:pointer;margin:0px;padding:0px;" onClick="document.frm_opc.action='registra/regplace.php';document.frm_opc.submit();" onmouseover="Zoom(document.frm_opc.go2,2);" onMouseOut="Zoom(document.frm_opc.go2,-2);" type="image"></td>
                                      <td width="160" height="15" valign="top" align="center" background="marcos/blanco/blancoab15px.gif"><img name="go" type="image" onmouseover="Zoom(document.frm_opc.go,1);" onMouseOut="Zoom(document.frm_opc.go,-1);" onClick="javascript:if (!Verificador()){return false};" src="botones/btnbuscar.gif" style="width:113;height:13;cursor:pointer" border=0></td>
                                      <td valign="top" width="15" height="15"><img src="marcos/blanco/abder.gif" width="15" height="15"></td>
                                    </tr>
                                  </table>
                              </form></td>
                    </tr>
              </table></td>
            </tr>
            <tr>
              <td><div align="center"><img src="botones/destacados.gif" width="232" height="23"> </div></td>
            </tr>
            <tr>
              <? while ($row = @mysql_fetch_array($rsdestacados)) { 
				  $id = $row["id"];   
				  $nombre = $row["nombre"];  
				  $direccion = $row["direccion"]; 
				  $barrio = $row["barrio"]; 
				  $localidad = $row["localidad"]; 
			  	  $telefono = $row["telefono"]; 
				  $stars = $row["stars"];
			      
				  if (isset($row["foto4"]) && !empty($row["foto4"])) 
				  {
				 
					 $foto = '<img witdh="80" height="80" src="fotos/m_'.$row["foto4"]. '" alt="' . $nombre .'"></img>'; 
				  } else {
				  $foto = '<img src="fotos/cmas.gif" alt=""' . $nombre .'"></img>'; 
				   
				  }
				  ?>
              <td height="124"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"> <br>
                        <table width="90%"  border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="right" valign="middle">&nbsp;</td>
                            <td width="359"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><a style="textDecorationNone:'false'" href="detalles.php?id=<?=$id?>&id2=<?=$telefono?>">
                              <?=$nombre?>
                              <span class="Estilo15">(Detalles)</span></a></font></td>
                            <td width="17" rowspan="3"><?=$foto?></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right" valign="middle"><img src="images/bordeiz.jpg" width="25" height="55"></td>
                            <td bgcolor="#B46465"><div align="left" class="Blanco10">
                                <?=$direccion?>
                                <br>
                                <?=$barrio?>
                    -
                    <?=$localidad?>
                    <br>
                    <?=$telefono?>
                            </div></td>
                            <td><img src="images/bordeder.jpg" width="25" height="55"></td>
                          </tr>
                          <tr>
                            <td width="25" align="right" valign="middle">&nbsp;</td>
                            <td><div align="left">
                                <? $c=0;
									 while ($c < $stars) {
                                      echo '<img src="images/stars.gif" width="17" height="12">';
                                      $c=$c+1 ;
									  }?>
                            </div></td>
                            <td width="25">&nbsp;</td>
                          </tr>
                      </table></td>
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
            <? 

			}		
?>
            <tr>
              <td height="2"></td>
            </tr>
            <tr valign="top">
              <td>
                <div align="center"> </div></td>
            </tr>
            <tr>
              <td height="2">
                <div align="center"><img src="botones/blancogris.gif" width="70%" height="2"></div></td>
            </tr>
            <tr valign="top">
              <td>
                <?  require('misc/rec.php')?>
              </td>
            </tr>
          </table></td>
          <td width="1" valign="top" bgcolor="#FFFFFF"></td>
          <td width="150" valign="top" bgcolor="#ae5959"><? require_once('includes/right.php')?></td>
        </tr>
        <tr> 
          <td colspan="1"><img src="marcos/blanco/blanco.gif" width="100%" height="2"></td>
        </tr>
        <tr> 
          <td colspan="5"><? require_once('includes/bot.php')?></td>
        </tr>
        <tr> 
          <td colspan="1"><img src="marcos/blanco/blanco.gif" width="1" height="2"></td>
        </tr>
      </table></td>
  </tr>
</table>

<div id="LayerLogin" style="position:absolute; left:306px; top:263px; z-index: 3; visibility: hidden;" > 
  <table width="180" height="1" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="15" height="15"><img src="marcos/blanco/arriz.gif" width="15" height="15"></td>
      <td width="200" height="15" bgcolor="#FFFFFF"></td>
      <td width="15" height="1"><img src="marcos/blanco/arrder.gif" width="15" height="15"></td>
    </tr>
    <tr> 
      <td width="1" height="80" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="155" height="1" align="center" valign="top" background="barcos/blanco/blanco.gif" bgcolor="#FFFFFF"> 
        <form style="margin:0px;padding:0px;font-size:8pt" action="./dbadmin/admlogin2.php" method="post" target="_blank">
           <br>
          INGRESE SUS DATOS<br>
          Usuario<br>
          <input name="username" type="text" size="20" maxlength="60" style="font-size:8pt">
          <br>
          Password<br>
          </b> 
          <input name="password" type="password" size="20" maxlength="20" style="font-size:8pt">
          <br>
          <br>
          <input name="submit3" type="button"  value="Aceptar" onClick="document.all.LayerLogin.style.visibility='hidden'; NewWindow('dbadmin/admlogin2.php','regusr','160','160','no','center');return false" style="font-size:8pt">
          <input onClick="document.all.LayerLogin.style.visibility='hidden';" name="reset2" type="reset" value="Cancelar" style="font-size:8pt">
        </form></td>
      <td height="1" width="15" align="justify" background="marcos/blanco/blancoder15px.gif"></td>
    </tr>
    <tr> 
      <td width="1" height="15" ><img src="marcos/blanco/abiz.gif" width="15" height="15"></td>
      <td width="1" height="1" background="marcos/blanco/blancoab15px.gif"></td>
      <td width="1" height="1"><img src="marcos/blanco/abder.gif" width="15" height="15"></td>
    </tr>
  </table>
</div>
<div id="LayerRegistrar" style="position:absolute; left:321px; top:283px; width: 349px; height: 241px; visibility: hidden; z-index:2"> 
 
 <form name="frmaddusr" action="registra/regusr2.php" target="registrar" method="post">
  <table width="334" height="209" border="0" cellpadding="0" cellspacing="0">
    <?
	
	// ' para que no se agregue un usr en blanco
//FormAction="target=registrar"
//if Browser="MSIE" then
//FormAction="action=./registra/regadd.asp"
//end if ?>
    
      <tr> 
        <td width="15" height="15"><img src="marcos/blanco/arriz.gif" width="15" height="15"></td>
        <td width="138" height="1" bgcolor="#FFFFFF"></td>
        <td width="196" height="1" bgcolor="#FFFFFF"></td>
        <td width="15" height="1"><img src="marcos/blanco/arrder.gif" width="15" height="15"></td>
      </tr>
      <tr> 
        <td width="15" height="50" rowspan="10" bgcolor="#FFFFFF">&nbsp;</td>
        <td colspan="2" height="20" valign="top" align="center" bgcolor="#FFFFFF"><img src="botones/regcmas.gif"></td>
        <td height="1" width="15" rowspan="10" background="marcos/blanco/blancoder15px.gif"></td>
      </tr>
      <tr> 
        <td bgcolor="#FFFFFF"><font size="-1" color="blue">Nombre:</td>
        <td bgcolor="#FFFFFF"><input type="text" name="txtregnombre" style="width:130px;font-size:8pt"> 
        </td>
      <tr> 
        <td bgcolor="#FFFFFF"><font size="-1" color="blue">Apellido:</td>
        <td bgcolor="#FFFFFF"><input type="text" name="t?xtregapellido" style="width:130px;font-size:8pt"> 
        </td>
      </tr>
      <tr> 
        <td bgcolor="#FFFFFF"><font size="-1" color="blue">E-mail:</td>
        <td bgcolor="#FFFFFF"><input type="text" name="txtregemail" style="width:130px;font-size:8pt"></td>
      </tr>
      <tr> 
        <td bgcolor="#FFFFFF"><font size="-1">Telefono:</td>
        <td bgcolor="#FFFFFF"><input type="text" name="txtregtelefono" style="width:130px;font-size:8pt;z-Index:8"> 
        </td>
      </tr>
      <tr> 
        <td height="21" bgcolor="#FFFFFF"><font size="-1">Ciudad/Barrio:</td>
        <td bgcolor="#FFFFFF"><input type="text" name="txtregbarrio" style="width:130px;font-size:8pt"> 
        </td>
      </tr>
      <tr> 
        <td bgcolor="#FFFFFF"><font size="-1">Fecha de Nacimiento:</td>
        <td bgcolor="#FFFFFF"><input type="text" name="txtregfecnac" style="width:130px;font-size:8pt"> 
        </td>
      </tr>
      <tr> 
        <td bgcolor="#FFFFFF"><font size="-1">Como nos conocio?:</td>
        <td bgcolor="#FFFFFF"><input type="text" name="txtregcomo" style="width:130px;font-size:8pt"> 
        </td>
      </tr>
      <tr> 
        <td width="138" height="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="196" height="1" bgcolor="#FFFFFF" align="right"><font size="-2" color="blue">*<font size="-2">Campos 
          obligatorios</td>
      </tr>
      <tr> 
        <td height="25" colspan="2" align="center" bgcolor="#FFFFFF"><input name="submit2" type="submit" style="font-size:8pt;width:80px"  value="Aceptar" onClick="NewWindowEAF('./registra/regusr.php','registrar','350','200','no','center','no','no','no','no');document.all.LayerRegistrar.style.visibility='hidden';"> 
          <input name="reset" type="reset" style="font-size:8pt;width:80px" onClick="document.all.LayerRegistrar.style.visibility='hidden';" value="Cerrar"></td>
      </tr>
      <tr> 
        <td height="15" width="15"><img src="marcos/blanco/abiz.gif" width="15" height="15"></td>
        <td height="1" width="138" background="marcos/blanco/blancoab15px.gif"></td>
        <td height="1" width="196" background="marcos/blanco/blancoab15px.gif"></td>
        <td height="1" width="15"><img src="marcos/blanco/abder.gif" width="15" height="15"></td>
      </tr>
    
  </table>
</form>
</div>
<?
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
		
    $sqlcontrol = "INSERT INTO datos(ip, cliente, fecha , hora , referer) values('$ip','$browser','$fecha','$hora','$refer')"; 
	mysql_query($sqlcontrol) or die(mysql_error());  

 	$sqlvoto = "UPDATE contadores SET cantidad = cantidad +1 WHERE nombre='visitas'";
	mysql_query($sqlvoto) or die(mysql_error()); 
  
?>
</body>

</html>

