
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
		document.frmencuesta.encuesta[0].checked=true;
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
				document.frm_opc.op_barrios.value='TODOS';	
				 //document.frm_opc.textop_barrios.disabled =false ;
				 document.frm_opc.textop_barrios.style.backgroundColor='#FFFFFF';
				 document.frm_opc.op_barrios.disabled =true;	
			 	 }
		}
		window.document.frm_opc.textop_nombres.focus();
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
    }
	if (var1=="resto")  {
	varv = 'visible';	
 	a="op1";
    b="op2";
    }


	if (ns6) 
	{
		window.document.getElementById("op_lugares").style.visibility = varv;
		window.document.getElementById("op_tipos").style.visibility = varv;
		window.document.getElementById("op_barrios").style.visibility = varv;
		window.document.getElementById("img").style.visibility = varv;
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
		window.document.frm_opc.img.style.visibility = varv;
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

 -->
</script>
