<?php session_start(); 
?>

<html>
<head>
<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes - Guia fin de semana</title>
<LINK REL="StyleSheet" HREF="includes/style.css" TYPE="text/css">
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 
<SCRIPT language=javascript src="includes/ajax2.js"></SCRIPT> 

<script language="JavaScript" type="text/javascript">
<!--
 function propiedadesPantalla()
                                        { if (window.screen)
                                             mensaje=window.screen.width+"x"+window.screen.height;
                                             document.write(mensaje);
                                        }

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

var color1 =  "#EAD16F"; 
var color2 = "#F1E09E"; 


 	function ClearFrm()
	{
		window.document.frm_opc.op_lugares.selectedIndex = 1;
		window.document.frm_opc.op_tipos.selectedIndex = 1;
		window.document.frm_opc.op_barrios.selectedIndex = 1;
		window.document.frm_opc.textop_barrios.value = '';
		opt = "resto";
		//document.frmencuesta.encuesta[0].checked=true;
		var ns6 = (!document.all && document.getElementById);
		var ie4 = (document.all);
		var ns4 = (document.layers);
		if (ns6) {
		window.document.getElementById("op1").style.background = color1; 
		window.document.getElementById("op2").style.background =  color2; 
		} else if(ie4) {
		window.document.frm_opc.all("op1").style.background = "#EAD16F"; 
		window.document.frm_opc.all("op2").style.background = "#F1E09E"; 
		} else if(ns4) {
		}
		restorecetas('resto')
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
	 imageOn('resto')
    }
	if (var1=="resto")  {
	varv = 'visible';	
 	a="op1";
    b="op2";
	 textomostrar = "Realice su busqueda especifique Tipo, Clase, Ciudad, Barrio o bien solo utilze el campo de texto y escriba lo que decea buscar, ya se nombre de un lugar. buscar por calles. etc"
   imageOff('resto')
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
			window.document.getElementById("restorecetas").innerHTML = textomostar;  
		}
		
		if (var1=="recetas"){
			window.document.getElementById("CIUDAD").innerHTML =''; 
			window.document.getElementById("BARRIO").innerHTML =''; 
			window.document.getElementById("TIPO").innerHTML ='BUSQUE SU RECETA...'; 
			window.document.getElementById("op_tipos").selectedIndex = 1;
			window.document.getElementById("op_barrios").selectedIndex = 1;
			window.document.getElementById("restorecetas").innerHTML  = textomostrar;
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
			window.document.frm_opc.all("restorecetas").innerHTML = textomostrar;
		}
		if (var1=="recetas"){
			window.document.frm_opc.all("CIUDAD").innerHTML =''; 
			window.document.frm_opc.all("BARRIO").innerHTML =''; 
			window.document.frm_opc.all("TIPO").innerHTML ='BUSQUE SU RECETA...'; 
			window.document.frm_opc.all("restorecetas").innerHTML = textomostrar;
			window.document.frm_opc.op_tipos.selectedIndex = 1;
			window.document.frm_opc.op_barrios.selectedIndex = 1;
		}
	} else if(ns4) {
	}
 opt = var1;
} 


 function validateEmail(emailAddress) {
	var match = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/.test(emailAddress);
	return match;
}
  
 
	function VerificadorEnvio(){
	var error = '';



	if (window.document.frm_opc.consulta.value.length == 0)
		error = error + 'Especificar Consulta\n'; 

 	if (window.document.frm_opc.email.value.length == 0)
		error = error + 'Especificar Email \n'; 

	if (!validateEmail(document.frm_opc.email.value))
	  error = error + 'Email Incorrecto \n'; 

				 
	if (error!='')
		alert(error);
	else
		{
 
	getPag( 'index_contacto.php','contenido','refrescarlista','','loading.gif');
		}
	}
 
 
	function Verificador(){
	var error = '';

	if (window.document.frm_opc.op_lugares.selectedIndex == 0)
		error = error + 'Debe Seleccionar una Ciudad. \n'; 

    if (window.document.frm_opc.op_barrios.options[window.document.frm_opc.op_barrios.selectedIndex].value=="SELECCIONAR..." && window.document.frm_opc.textop_barrios.value.length == 0)
		error = error + 'Debe Seleccionar un Barrio. \n'; 
  
	if (window.document.frm_opc.op_tipos.options[window.document.frm_opc.op_tipos.selectedIndex].value=="SELECCIONAR...")
		error = error + 'Debe Seleccionar la especialidad o Tipo de Cocina. \n'; 
 
	if (error!='')
		alert(error);
	else
		{
		window.document.frm_opc.op_tipos.disabled = false;


 //if (opt == "resto"){
	//	window.document.frm_opc.action = "busqueda.php"
  	//	window.document.frm_opc.submit();
//} else {
		//window.document.frm_opc.action = "busquedarecetas.php"
  		//window.document.frm_opc.submit();


// }
		 
		getPag( 'index_busqueda.php','contenido','refrescarlista','','loading.gif');
				
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
 

function barlr(layeron,layeroff, i)
{

scroll(500,500); 	
    var ns6 = (!document.all && document.getElementById);
	var ie4 = (document.all);
	var ns4 = (document.layers);
		if (ns6) {
		document.getElementById('floatLayer').style.overflow = "hidden";
		document.getElementById('floatLayer').style.overflow = "hidden";
		} else if(ie4) {
		document.all[layeroff].style.overflow = "hidden";
		document.all[layeron].style.overflow = "visible";
		} else if(ns4) {
		 document.layers[layeroff].overflow = "hidden";
 		document.layers[layeron].overflow = "visible";
		}
	 
			

}

if (document.images) {
  
  
    restoOn = newImage("images/consulta2.gif");
    restoOff = newImage("images/consulta.gif");
  
  
  
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

 
?>
 
<body bgcolor="#505050" text="#000000" link="#363636" vlink="#363636" alink="#d5ae83"  onLoad="">
 <form id="frm_opc"  name="frm_opc" onSubmit="javascript:if (!Verificador()){return false};" method="post" action="busqueda.php">
 
 <table width="981"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFF9EA">
 <tr align="left" valign="top">
    <td width="94" height="100%" style="background-image: url(images/rep_2.jpg)"><img src="images/left_1.jpg"></td>
    <td width="667" height="100%" align="center" valign="top">	 
      <table width="95%" height="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFF9EA">
              <tr align="left" valign="top">
                <td height="20" valign="middle" bgcolor="#FFF9EA">        <img src="images/b.jpg" width="108" height="27"></td>
                </tr>
          </table></td>
        </tr>
        <tr>
          <td height="1" bgcolor="#CCCCCC"><img src="images/spacer.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td valign="top" height="90" style="background-image:url(images/top_rep.jpg) "><table width="100%" height="90"  border="0" cellspacing="0" cellpadding="0" style="background-image:url(images/top_r.jpg); background-repeat:no-repeat; background-position:right top">
            <tr>
              <td width="580" height="90" align="left" valign="bottom" style="background-image:url(images/topb.jpg); background-repeat:no-repeat; background-position:left top"><div id="refrescarlista">&nbsp;</div></td>
            </tr>
          </table>

</td>
        </tr>
        <tr>
          <td height="1" bgcolor="#666666"><img src="images/spacer.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="30"  bgcolor="#B15759" ><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" >
              <tr align="center" valign="middle">
                <td width="33%" height="27" align="center" class="style4" style="border-right:1px solid #CCCCCC "><a href="index.php"> <font color="#FFFFFF">Quienes Somos ?  </font></a></td>
                <td width="33%" align="center" class="style4" style="border-right:1px solid #CCCCCC "><a href="modules.php?name=AvantGo"><font color="#FFFFFF">Publicidad</font></a></td>
                <td width="33%" align="center" class="style4"><a href="modules.php?name=Statistics"><font color="#FFFFFF">Contacto</font></a></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td  align="left" valign="top">            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="100%" height="100%" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top">             
				  <div id="contenido">
				  <? require_once('index_home.php')?>
				  </div>
				  
				  
				  </td>
                  </tr>
              </table>
                </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="100%" height="60" align="center" valign="top" style="border-top:2px solid #981549 "><table id="footer" width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr align="left" valign="top">
              <td height="60" align="center" valign="middle" bgcolor="#ae5959"><p><a href="http://www.comermas.com.ar/quienes.php"><br>
              </a><span class="encabezados"><a href="http://www.comermas.com.ar/quienes.php"><font color="#FFFFFF">Quienes Somos?</font></a> - <a href="http://www.comermas.com.ar/publicidad.php"><font color="#FFFFFF">Publicidad</font></a> - <a href="http://www.comermas.com.ar/contacto.php"><font color="#FFFFFF">Contacto</font></a> - <a href="http://www.comermas.com.ar/registra/regplace.php"><font color="#FFFFFF">Agregar mi lugar</font></a> - <a href="http://www.comermas.com.ar/registra/regusr.php"><font color="#FFFFFF">Registrarme </font></a></span></p>
                <p><span class="encabezados">ComerMas&reg; 2003 - <? echo date('Y') ?><br>
  Todas las Marcas y Logos son propiedad de sus respectivos due&ntilde;os<br>
  Solicite Informacion a: <a href="mailto:info@comermas.com.ar"><font color="#FFFFFF">info@comermas.com.ar</font></a> <br>
                </span><br>
                </p></td>
            </tr>
            <tr align="left" valign="top">
              <td align="center" valign="middle">&nbsp; </td>
            </tr>
          </table>            </td>
        </tr>
      </table>
      <br>
      </td>
    <td width="20">



<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0" style="height:100%; background-image:url(images/rep_1.jpg)">
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td height="100%" align="left" valign="bottom">&nbsp;</td>
      </tr>
      <tr>
        <td height="100%" align="left" valign="bottom">&nbsp;</td>
      </tr>
    </table></td>
    <td width="200" bgcolor="#BAB4A4">
<a name="barra"></a>
<table width="200"  border="0" cellpadding="0" cellspacing="0" bgcolor="#BAB4A4">
      <tr>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp; 
</td>
      </tr>
      <tr>
        <td>FLAN DE HUEVO
            <p>Ingredientes: <br>
        5 Huevos<br>
        1/2 litro de leche<br>
        5 cucharadas de azucar<br>
        Azucar para caramelo 5 cucharadas mas.<br>
        vainilla</p>
            <p>Preparado: <br>
        Batir los huevos con el azucar. agregar la leche y la vainilla. <br>
        Hacer el caramelo y dejar enfriar para luego afgregar a la mezcla. <br>
        Poner al fuego en cacerola Essen, una vez que hierve apagar y dejar<br>
        reposar 20 min. sin destapar. Ya esta!!</p>
            <p>Enviado por Elsa Monsalvo (wozniakl@hotmail.com)</p>
            <p>&lt;Nro.730&gt;</p></td>
      </tr>
    </table>
</td>
  </tr>
</table>

</form>

 
<div id="dright" style="position:absolute; left:706px; top:5px; width:75px; height:64px; z-index:2"> <img src="images/mas.gif"><a href="javascript:scroll(500,0)"><strong><font color="#000000">MAS -&gt;</font></strong> </a></div>
 
 
</body>

 
</html>