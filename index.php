<?php session_start(); ?>
<html>
<head>
<!-- G ANALYTICS -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7284491-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
 <!-- G ANALYTICS FIN -->

<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, descuentos ,parrilla, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="Guida de buenos aires, comidas, lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<!-- <meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
 --><!-- <meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants"> -->
<meta name="robots" content="all,index,follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta name="google-site-verification" content="HDtpcLS2pDi00LgyETD7XVnX3nQ900IPAX9mGmN6Hfg" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Panaderia - Cafes - Guia fin de semana</title>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>

<SCRIPT language=javascript TYPE="text/javascript" src="includes/functions.js" ></SCRIPT> 
<SCRIPT language="javascript1.2" TYPE="text/javascript" SRC="includes/ajax.js" ></SCRIPT>
 <script language="JavaScript" type="text/javascript">
<!--

	function hidestatus(){
window.status='Bienvenido a ComerMas'
return true
}
if (document.images) {
  
  
    restoOn = newImage("botones/consulta2.gif");
    restoOff = newImage("botones/consulta.gif");
  
  
  
}
if (document.layers){
document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT)
document.onmouseover=hidestatus
document.onmouseout=hidestatus


window.onresize = tomarHW;
}




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
var color1 =  "#851549"; 
var color2 = "#B36464"; 
 


 	function ClearFrm()
	{
		window.document.frm_opc.op_lugares.selectedIndex = 0;
		window.document.frm_opc.op_tipos.selectedIndex = 1;
		window.document.frm_opc.op_barrios.selectedIndex = 0;
		window.document.frm_opc.textop_barrios.value = '';
		opt = "resto";
		document.frm_opc.encuesta[0].checked=true;
		var ns6 = (!document.all && document.getElementById);
		var ie4 = (document.all);
		var ns4 = (document.layers);
		if (ns6) {
		window.document.getElementById("op1").style.background = color1; 
		window.document.getElementById("op2").style.background =  color2; 
		} else if(ie4) {
		window.document.frm_opc.all("op1").style.background = color1; 
		window.document.frm_opc.all("op2").style.background = color2; 
		} else if(ns4) {
		}
	}	

function restorecetas(var1){
	var ns6 = (!document.all && document.getElementById);
	var ie4 = (document.all);
	var ns4 = (document.layers);
	var varv;
	var colort;

	if (var1=="recetas")  {
	varv = 'hidden';
    a="op2";
    b="op1";
	 textomostrar = "Realice la busqueda de su receta utilizando el campo de texto";
	 imageOn('resto');	
    }
	if (var1=="resto")  {
	varv = 'visible';	
 	a="op1";
    b="op2";
	 textomostrar = "Realice su busqueda especifique Tipo, Clase, Ciudad, Barrio o bien solo utilze el campo de texto y escriba lo que decea buscar, ya se nombre de un lugar. buscar por calles. etc"
   imageOff('resto');
    }


	if (ns6) 
	{
		window.document.getElementById("op_lugares").style.visibility = varv;
		window.document.getElementById("op_tipos").style.visibility = varv;
		window.document.getElementById("op_barrios").style.visibility = varv;
		 
		window.document.getElementById(a).style.background = color1; 
		window.document.getElementById(b).style.background = color2; 
		
		if (var1=="resto"){
			window.document.getElementById("CIUDAD").innerHTML ='CIUDAD:'; 
			window.document.getElementById("BARRIO").innerHTML ='BARRIO:'; 
			window.document.getElementById("TIPO").innerHTML ='TIPO / CLASE:';  
		}
		
		if (var1=="recetas"){
			window.document.getElementById("CIUDAD").innerHTML =''; 
			window.document.getElementById("BARRIO").innerHTML ='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapido y Facil...'; 
			window.document.getElementById("TIPO").innerHTML ='BUSQUE SU RECETA...'; 
			window.document.getElementById("op_tipos").selectedIndex = 1;
			window.document.getElementById("op_barrios").selectedIndex = 1;
		}
	} else if(ie4) {
		window.document.frm_opc.op_lugares.style.visibility = varv;
		window.document.frm_opc.op_tipos.style.visibility = varv;
		window.document.frm_opc.op_barrios.style.visibility = varv;
 
		window.document.frm_opc.all(a).style.background = color1; 
		window.document.frm_opc.all(b).style.background = color2; 
		
		if (var1=="resto"){
			window.document.frm_opc.all("CIUDAD").innerHTML ='CIUDAD:'; 
			window.document.frm_opc.all("BARRIO").innerHTML ='BARRIO:'; 
			window.document.frm_opc.all("TIPO").innerHTML ='TIPO / CLASE:'; 
		}
		if (var1=="recetas"){
			window.document.frm_opc.all("CIUDAD").innerHTML =''; 
			window.document.frm_opc.all("BARRIO").innerHTML ='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapido y Facil...'; 
			window.document.frm_opc.all("TIPO").innerHTML ='BUSQUE SU RECETA...'; 
			window.document.frm_opc.op_tipos.selectedIndex = 1;
			window.document.frm_opc.op_barrios.selectedIndex = 1;
		}
	} else if(ns4) {
	}
 opt = var1;
} 



  
	function Verificador(){
	var error = '';

	//if (window.document.frm_opc.op_lugares.selectedIndex == 0)
	//	error = error + 'Debe Seleccionar una Ciudad. \n'; 
if (opt == "resto"){
    if (window.document.frm_opc.op_barrios.options[window.document.frm_opc.op_barrios.selectedIndex].value=="SELECCIONAR..." && window.     document.frm_opc.textop_barrios.value.length == 0)
		error = error + 'Debe Seleccionar un Barrio. \n'; 
  }
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
} 

if (opt == "recetas"){
		window.document.frm_opc.action = "busquedarecetas.php"
  		window.document.frm_opc.submit(); }
		
				
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
 
 

if (document.images) {
  
  
    restoOn = newImage("botones/consulta2.gif");
    restoOff = newImage("botones/consulta.gif");
  
  
  
}


function newImage(imageName) {
  if (document.images) {
      var image = new Image();
      image.src = imageName;
      return image;
  }
}
// Set the IMG tag image object to point to the on (selected) image
// Uses tag name to locate appropriate global var holding the correct source
function imageOn(imageTagName) {
  if (document.images) {
      var imageSrc = eval(imageTagName + "On.src") ;
      document[imageTagName].src = imageSrc
  }
}
// Set the IMG tag image object to point to the off (unselected) image
function imageOff(imageTagName) {
  if (document.images) {
      var imageSrc = eval(imageTagName + "Off.src") ;
      document[imageTagName].src = imageSrc
  }
}
  
 function pulsar(e) {

if (e.keyCode==13){ //hacer lo que sea 
Verificador();

return (e.keyCode!=13);
}
//  return (e.keyCode!=13);
}
 
  
 -->
</script>
</head>




<?  
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
//$sqlbarrio = "Select barrios from barrios where id_ciudad='1' Order by barrios";
$sqllugares = "SELECT * FROM ciudades order by marca DESC, ciudad";
$sqltipos = "Select clase from clases order by clase";
$sqlencuesta = "Select * from encuesta order by id";
//$sqldestacados = "SELECT * FROM base INNER JOIN destacados ON base.id = destacados.id_base order by posicion";
$sqldestacados = "SELECT * FROM base, destacados where base.id = destacados.id_base order by posicion";
//$sqldestacados = "SELECT * FROM base LIMIT 5,4" ;//, destacados where base.id = destacados.id_base order by posicion";

//$rsbarrios= @mysql_query($sqlbarrio) or die ("err sql1"); 
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
//;

 $ramdom =rand (1, 4);

    	$sqlbannertop = "select banner from banners where posicion='top".$ramdom."'";
		$rsbannertop = @mysql_query($sqlbannertop) or die ("err sql8"); 
	    $bannertopt = mysql_fetch_Array($rsbannertop);
	  
	    $bannertop = "banners/".$bannertopt['banner'];
  	   $_SESSION["bannertop"] = $bannertop;
 
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="ClearFrm();cargaContenidoSelect('includes/select_proceso.php')">
   <FORM id="frm_opc" style="margin:0px;padding:0px;" name="frm_opc" onSubmit="javascript:if (!Verificador()){return false};" method=post action="busqueda.php">
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
                    <td width="33%" height="20" onMouseOver="this.bgColor='#851549'; this.style.cursor= 'pointer'" onMouseOut="this.bgColor=''">
                      <div align="center"><a href="quienes.php" class="Naranja10" style="textDecorationNone:'false'; color:''">QUIENES SOMOS?</a></div></td>
                    <td width="34%" height="20" onMouseOver="this.bgColor='#851549'; this.style.cursor= 'pointer'" onMouseOut="this.bgColor=''">
                      <div align="center"><a href="publicidad.php" class="Naranja10" style="textDecorationNone:'false'; color:''">PUBLICIDAD</a></div></td>
					    <td width="33%" height="20" onMouseOver="this.bgColor='#851549'; this.style.cursor= 'pointer'" onMouseOut="this.bgColor=''">
                      <div align="center"><a href="contacto.php" class="Naranja10" style="textDecorationNone:'false'; color:''">CONTACTO</a></div></td>
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
                              <td width="103" height="146"></td>
                              <td width="458">
                             
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="65%" valign="bottom">
                                              <div align="right">
                                                <table width="93%" height="19" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td id ="op1" width="51%" height="19" align="center" valign="middle"  onMouseOver="this.style.cursor= 'pointer'"  onMouseOut="" onMouseDown="restorecetas('resto')">
                                                      <div align="center" class="BlancoBold10">RESTAURANTS </div></td>
                                                    <td id = "op2" width="28%" align="center" valign="middle" onMouseOver="this.style.cursor= 'pointer'"  onMouseOut=""  onMouseDown="restorecetas('recetas')">
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
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF"><IMG src="botones/consulta.gif"  id="resto" name="resto" align="absbottom"></td>
                                      <td align="left" valign="middle" bgcolor="#FFFFFF"><div class="Negro10" ID="CIUDAD">CIUDAD:</div></td>
                                      <td width="15" align="left" valign="top"><img src="marcos/blanco/arrder.gif" width="15" height="15"></td>
                                    </tr>
                                    <tr>
                                      <td width="15" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="z-Index:0">
																			<!-- input buscador generico -->
                                        <input type="text" id="textop_nombres" name="textop_nombres" style="width:160px;font-size:7pt" onKeyPress = "return pulsar(event)">
                                      </td>
                                      <td id="fila_1" align="left" valign="middle" bgcolor="#FFFFFF">
                                         

<!-- combo de lugares  Localidades ie cap fed -->
	<select class='combo' id='op_lugares' name='op_lugares' onChange="cargaContenidoSelect('includes/select_proceso.php')">
<!--   <option value="TODAS" selected>TODAS</option> si al busqueda le mando TODAS anda mal-->
	<option value="TODAS" selected>TODAS</option>
<?
	while($row = @mysql_fetch_array($rslugares))
	{
		echo "<option value='".$row[0]."'>". strtoupper($row[1])."</option>";
	} ?>
	</select>
  
                                        <input type="hidden" name="textop_barrios" class="text" size="0" style="width:1px;font-size:8pt;visibility:hidden;">
                                      </td>
                                      <td width="15" align="justify" valign="top" bgcolor="#FFFFFF" background="marcos/blanco/blancoder15px.gif">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="15" rowspan="2" bgcolor="#FFFFFF"></td>
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="z-Index:0">
                                        <div class="Negro10" ID="TIPO">TIPO/CLASE:</div>
                                      </td>
                                      <td width="160" align="left" valign="middle" bgcolor="#FFFFFF">
                                        <div class="Negro10" ID="BARRIO">BARRIO:</div>
                                      </td>
                                      <td  width="15" rowspan="2" align="justify" background="marcos/blanco/blancoder15px.gif"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="z-Index:0">
																			<!-- tipo de lugar ie tenedor libre -->
																			<select type="text" id="op_tipos" name="op_tipos" class="text" style="width:160px;font-size:7pt;z-Index:0;visibility:inherit" >
                                          <option value="SELECCIONAR...">SELECCIONAR...</option>
                                          <option value="TODOS" selected>TODOS</option>
                                          <? while ($row = @mysql_fetch_array($rstipos)) { 
								    $tipo = strtoupper($row["clase"]); ?>
                                          <option value="<?=$tipo ?>">
                                          <?=$tipo?>
                                          </option>
                                          <? }?>
                                      </select></td>
                                      <td  id="fila_2" width="160" align="left" valign="middle" bgcolor="#FFFFFF">
																			<!-- COMBO BARRIOS -->
 <select class="combo" disabled="disabled" id="op_barrios"  name="op_barrios">
		<option id="valor_defecto" value="0">TODOS</option>
		</select></td>
                                    </tr>
                                    <tr>
                                      <td width="15" height="15" valign="top"><img src="marcos/blanco/abiz.gif" width="15" height="15"></td>
                                      <td height="15" colspan="2" align="center" valign="top" background="marcos/blanco/blancoab15px.gif"><img src="botones/btnmilugar.gif" alt="Sugiera un local a la base de ComerMas" name="go2" border=0 style="width:113;height:13;cursor:pointer;margin:0px;padding:0px;" onClick="document.frm_opc.action='registra/regplace.php';document.frm_opc.submit();" onMouseOver="Zoom(document.frm_opc.go2,2);" onMouseOut="Zoom(document.frm_opc.go2,-2);" type="image"></td>
                                      <td width="160" height="15" valign="top" align="center" background="marcos/blanco/blancoab15px.gif"><img name="go" type="image" onMouseOver="Zoom(document.frm_opc.go,1);" onMouseOut="Zoom(document.frm_opc.go,-1);" onClick="javascript:if (!Verificador()){return false};" src="botones/btnbuscar.gif" style="width:113;height:13;cursor:pointer" border=0></td>
                                      <td valign="top" width="15" height="15"><img src="marcos/blanco/abder.gif" width="15" height="15"></td>
                                    </tr>
                                  </table>
                              </td>
                    </tr>
              </table></td>
            </tr>
            <tr>
              <td><div align="center"><img src="botones/destacados.gif" width="232" height="23"> </div></td>
            </tr>
            <tr>
              <? while ($row = @mysql_fetch_array($rsdestacados)) { 
				  $id = $row["id_base"];   
				  $nombre = $row["nombre"];  
				  $direccion = $row["direccion"]; 
				  $barrio = $row["barrio"]; 
					  $clase = $row["clase"]; 
				  $localidad = $row["localidad"]; 
			  	  $telefono = $row["telefono"]; 
				  $stars = $row["stars"];
			      
				  if (isset($row["imagen"]) && !empty($row["imagen"])) 
				  {
				 
					 $foto = '<img witdh="80" height="80" src="fotos/m_'.$row["imagen"]. '" alt="' . $nombre .'"></img>'; 
				  } else {
				  $foto = '<img src="fotos/cmas.gif" alt="' . $nombre .'">'; 
				   
				  }
				  ?>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                  <tr>
                    <td align="center">
                        <table width="90%"  border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="right" valign="middle"></td>
                            <td width="359"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="detalles.php?id=<?=$id?>" style="textDecorationNone:'false'" >
                              <?=$nombre?>
                              <span class="Estilo15">(<?=$clase?>)</span></a></font></td>
                            <td width="17" rowspan="3"><?=$foto?></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right" valign="middle"><img src="images/bordeiz.jpg" width="25" height="55"></td>
                            <td bgcolor="#B46465"><div align="left" class="Blanco10">
                               <?=$direccion?>
                                <br>
                                <?=$barrio?>
                    |
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
									 while ($c < 6) {
                                     
									 if ($c < $stars) echo '<img src="images/stars.gif" width="17" height="12">';
                                     if ($c > $stars) echo '<img src="images/starsoff.gif" width="17" height="12">';
									  $c=$c+1 ;
									  
									  
									  }?>
                            </div></td>
                            <td width="25">&nbsp;</td>
                          </tr>
                      </table></td>
                  </tr>
              </table></td>
              <? 
			      $foto = $row["foto"];
	 ?>
            </tr>
            <? 

			}		
?>
            <tr>

              <td height="2"><!-- DESTACA RANDOM -->
							<? require_once('includes/ultimos.php')?>
							<? require_once('includes/destaran.php')?>
		
							<!-- DESTACA RANDOM --></td>
            </tr>
            <tr valign="top">
              <td>

                <div align="center"> </div></td>
            </tr>
			<tr>
			              <td height="2"> <div align="center"><img src="botones/blancogris.gif" width="70%" height="2"></div></td>
            </tr>
            <tr>
              <td height="2"><div align="center"><br>
                <img src="botones/destacadosgooglead.jpg">
			    </div>
       
			<tr>
              <td height="2">

<div align="center">

<script type="text/javascript"><!--
google_ad_client = "pub-7392026547974093";
/* 336x280, creado 4/03/10 */
google_ad_slot = "5750482611";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</div>
</td>
</tr>
<tr>
              <td height="2">
                <div align="center"><img src="botones/blancogris.gif" width="70%" height="2"></div></td>
            </tr>
            <tr valign="top">
              <td align="center">
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
          <td colspan="5"><? require_once('includes/bot2.php')?></td>
        </tr>
        <tr> 
          <td colspan="1"><img src="marcos/blanco/blanco.gif" width="1" height="2"></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
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
			$_SESSION["refer"] = $refer; //guardo la refer en esta var de session
		}else{
			$refer = "http://www.comermas.com.ar";
		}
		
    $sqlcontrol = "INSERT INTO datos(ip, cliente, fecha , hora , referer) values('$ip','$browser','$fecha','$hora','$refer')"; 
	mysql_query($sqlcontrol) or die(mysql_error());  

 	$sqlvoto = "UPDATE contadores SET cantidad = cantidad +1 WHERE nombre='visitas'";
	mysql_query($sqlvoto) or die(mysql_error()); 
  //counter crnet
  
?>

<img src="http://www.crnet.com.ar/sistemas/estadisticas/db_counter.php?id=comermas.com.ar&refer=<? if(isset($_SERVER['HTTP_REFERER']) &&  !empty($_SERVER['HTTP_REFERER'])) echo str_replace ('&', '_', ($_SERVER['HTTP_REFERER'])); ?>" width="0" height="0" border="0" vspace="0">
</html>