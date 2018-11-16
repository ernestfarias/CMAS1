function crearAjax()
{
    var xmlhttp=false;
     try 
    {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } 
    catch (e) 
    {
        try 
        {
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          } 
        catch (E) 
        {
               xmlhttp = false;
          }
     }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') 
    {
          xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

 
function cargaContenidoSelectmod(contenido)
{
	var valor1=document.getElementById("op_marcas").options[document.getElementById("op_marcas").selectedIndex].value;
    var valor2=document.getElementById("op_rubros").options[document.getElementById("op_rubros").selectedIndex].value;

if(valor1=='TODOS')
	{
		combo=document.getElementById("op_modelos");
		combo.length=0;
		var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="TODOS";
		combo.appendChild(nuevaOpcion);	combo.disabled=true;
	}
	else
	{
	
	
		ajax=crearAjax();
		ajax.open("GET", contenido+"?seleccionado1="+valor1+ "&seleccionado2="+valor2, true);
 
		ajax.onreadystatechange=function() 
		{ 
			if (ajax.readyState==1)
			{
				 
				combo=document.getElementById("op_modelos");
				combo.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				combo.appendChild(nuevaOpcion); combo.disabled=true;	
			}
			if (ajax.readyState==4)
			{ 
				 
				document.getElementById("fila_3").innerHTML=ajax.responseText;
			} 
		}
		ajax.send(null);
	}
}

function cargaContenidoSelect(contenido)
{
	var valor=document.getElementById("op_marcas").options[document.getElementById("op_marcas").selectedIndex].value;
 

if(valor=='Seleccionar')
	{ 
		combo=document.getElementById("op_rubros");
		combo.length=0;
		var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="TODOS"; 
		combo.appendChild(nuevaOpcion);	combo.disabled=true; 
		
		 
		window.document.form1.op_modelos.selectedIndex = 0;
 		window.document.form1.op_modelos.disabled=true
	}
	else
	{
		ajax=crearAjax();
		ajax.open("GET", contenido+"?seleccionado="+valor, true);
		ajax.onreadystatechange=function() 
		{ 
			if (ajax.readyState==1)
			{
				 
				combo=document.getElementById("op_rubros");
				combo.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				combo.appendChild(nuevaOpcion); combo.disabled=true;	
			}
			if (ajax.readyState==4)
			{ 
				 
				document.getElementById("fila_2").innerHTML=ajax.responseText;
			} 
		}
		ajax.send(null);
	}
}



 function CargarContenidoPlus(html,metodo,div,divcarga,mensaje,imagen,valores,sino)
{
    var contenedor;
	  var contenedorcarga;
    contenedor = document.getElementById(div);
    contenedorcarga = document.getElementById(divcarga);
    // creamos un nuevo objeto ajax
	
	var ajax = new Array(400) 
    ajax=crearAjax();
    
    //cargar el archivo html por el método GET
    if (metodo=='GET') ajax.open("GET", html,true);
	if (metodo=='POST')ajax.open("POST", html,true);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.setRequestHeader("Accept-Charset", "UTF-8");

    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4 && ajax.status==200) // Readystate 4 significa que ya acabó de cargarlo
        {
		
		
				///cadena=unescape(ajax.responseText);
		//cadenafinal=cadena.replace(/\+/gi," ");
		 


       //     contenedor.innerHTML = cadenafinal;
			

            contenedor.innerHTML = ajax.responseText
			if (contenedor == contenedorcarga){
			}else{
			contenedorcarga.innerHTML  ="";
			 }
			// alert (sino);
			if (sino=="si")loadpicture ()
			 
 
			
        } else {
		
		    if (imagen=='') {
			contenedor.innerHTML = "";
			}else {
			  if (mensaje==''){
			 //  contenedorcarga.innerHTML = '<img src="includes/'+imagen+'" border="1" align="center"/>'
			   contenedorcarga.innerHTML ='<img src="includes/refresh.gif" border="1" align="center">';
			   
			  } else {
			//  contenedorcarga.innerHTML = '<table width="100%" cellspacing="0" cellpadding="5"><tr><td width="2">&nbsp;</td><td><img src="includes/'+imagen+'" border="1" align="center"/>  </td><td>'+mensaje+'</td></tr></table>';
			  contenedorcarga.innerHTML ='<table width="100%" cellspacing="0" cellpadding="5"><tr><td width="2">&nbsp;</td><td width="24"><img src="includes/'+imagen+'" border="1" align="center"/>  </td><td>'+mensaje+'</td></tr></table>';

			  } 
			}
		}
    }
    if (metodo=='GET')ajax.send(null);
	if (metodo=='POST')ajax.send(valores);
    
}

function CargarContenido(html,div,divcarga)
{
    var contenedor2;
	  var contenedorcarga2;
    contenedor2 = document.getElementById(div);
    contenedorcarga2 = document.getElementById(divcarga);
    // creamos un nuevo objeto ajax
    ajax2=crearAjax();
    
    //cargar el archivo html por el método GET
    ajax2.open("GET", html,true);
	ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax2.setRequestHeader("Accept-Charset", "UTF-8");

    ajax2.onreadystatechange=function() 
    {
        if (ajax2.readyState==4 && ajax2.status==200) // Readystate 4 significa que ya acabó de cargarlo
        {
			// busca si hay una funciona java
			
			
            contenedor2.innerHTML = ajax2.responseText;
			
			JAVA=ajax2.responseText.split('<script>');
			if(JAVA.length>1){
				//if (JAVA[1]!='undefined') eval(JAVA[1])
				if (JAVA[1]!='undefined') {
					JAVA2=JAVA[1].split('</script>')
				eval (JAVA2[0]);
				}
			}
			if (contenedor2 == contenedorcarga2){
			}else{
			contenedorcarga2.innerHTML ="";
			}
        } else {
			//contenedor.innerHTML = '<table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr><td width="95%"><div align="left"><img src="includes/loading.gif" align="rigth"><font size="2" face="Times New Roman"> Cargando </font></div></td><td width="5%">&nbsp;</td></tr></table>';
		//contenedorcarga2.innerHTML ='<table width="100%" cellspacing="0" cellpadding="5"><tr><td width="2">&nbsp;</td><td width="24"><img src="includes/loading.gif" border="1" align="center"/>  </td><td width="721">Cargando ...</td></tr></table>';
contenedorcarga2.innerHTML ='<img src="includes/refresh.gif" border="1" align="center"/>';
}
    }
 
    ajax2.send(null)
}

function CargarContenidoR(html)
{
    var contenedor2;
	div= 'contenido';
	div2= 'refrescarlista'
    contenedor2 = document.getElementById(div);
    contenedor1 = document.getElementById(div2);
    // creamos un nuevo objeto ajax
    ajax2=crearAjax();
    
    //cargar el archivo html por el método GET
    ajax2.open("GET", html,true);
	ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax2.setRequestHeader("Accept-Charset", "UTF-8");

    ajax2.onreadystatechange=function() 
    {
        if (ajax2.readyState==4 && ajax2.status==200) // Readystate 4 significa que ya acabó de cargarlo
        {
            contenedor2.innerHTML = ajax2.responseText
			  contenedor1.innerHTML = "";
			 // loadpicture ()
			// contenedor2.className = "divon"; 
        } else {
			//contenedor.innerHTML = '<table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr><td width="95%"><div align="left"><img src="includes/loading.gif" align="rigth"><font size="2" face="Times New Roman"> Cargando </font></div></td><td width="5%">&nbsp;</td></tr></table>';
		contenedor1.innerHTML ='<img src="includes/refresh.gif" border="1" align="center"/  >';
 //contenedor2.className = "divoff"; 
}
    }
 
    ajax2.send(null)
}

 

function CargarContenidoimg(html,div)
{

 
    this.html = html; 
    this.div = div ;

//    var contenedor2;
	  var contenedor2 = new Array() 
    contenedor2 = document.getElementById(div);
  
   
  
  var ajax2 = new Array() 
    // creamos un nuevo objeto ajax
    ajax2=crearAjax();
    
    //cargar el archivo html por el método GET
    ajax2.open("GET", html,true);
	ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax2.setRequestHeader("Accept-Charset", "UTF-8");

    ajax2.onreadystatechange=function() 
    {
        if (ajax2.readyState==4 && ajax2.status==200) // Readystate 4 significa que ya acabó de cargarlo
        {
            contenedor2.innerHTML = ajax2.responseText
			 if (ajax2.responseText =="") contenedor2.innerHTML ='error'
			 
        } else {
			//contenedor.innerHTML = '<table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr><td width="95%"><div align="left"><img src="includes/loading.gif" align="rigth"><font size="2" face="Times New Roman"> Cargando </font></div></td><td width="5%">&nbsp;</td></tr></table>';
		//contenedor2.innerHTML ='<table width="100%" cellspacing="0" cellpadding="5"><tr><td width="2">&nbsp;</td><td width="24"><img src="includes/loading.gif" border="1" align="center"/>  </td><td width="721">Cargando ...</td></tr></table>';
 		imagen ='loading.gif'
		
		contenedor2.innerHTML =  '<img src="includes/'+imagen+'" border="1" align="center"/>'
		 
}
    }
 
    ajax2.send(null)
	 
	
	
	
	
	
}



function ContenidoDIV (div, mensaje)
{
	 var contenedor;
	 contenedor = document.getElementById(div);
    contenedor.innerHTML =  mensaje;
	
	}


function loadpicture()
     {  
      var poststr ="";
	   var largoForm = document.forms[0].length; var i = 1; var indice;
	   
	  
	   
	   indicea = 1 
      while (i <= largoForm)
	    {
		 indice = i - 1;
			if (indice == 0)
			  {
                                              /* Nada, pues si el indice es 0, no hay otra variable antes que el a la       
                                                 cual adjuntarse*/
                                              }
			else
			   {
			    poststr += "&";
			    }
	    // poststr += encodeURI(document.forms[0].elements[indice].name) + "=" + 
		 //           encodeURI(document.forms[0].elements[indice].value);	
		if (encodeURI(document.forms[0].elements[indice].name) == 'articulo'+indicea)
		{  
		//alert ("art"+indicea);
		//alert (encodeURI(document.forms[0].elements[indice].value));
		codigoarticulo = encodeURI(document.forms[0].elements[indice].value);
 
		 
		//CargarContenidoPlus("index_imagen.php?nombre="+codigoarticulo,"GET",codigoarticulo,'',"loading.gif","",'no');
 		//new CargarContenidoimg("index_imagen.php?nombre="+codigoarticulo,codigoarticulo,indicea);
		
		var codigoarticulov = function() {  CargarContenidoimg("index_imagen.php?nombre="+codigoarticulo,codigoarticulo);  };
		codigoarticulov();

		//div = codigoarticulo;
		//html = "index_imagen.php?nombre="+codigoarticulo;
			

	 
 
		indicea= indicea+1;
		}
		i = i +1;
		
		
		}
		//var vinculo = vinc;
  
	 // CargarContenidoPlus(vinculo,"POST",div,texto,imagen,poststr)
   }



function getPag(vinc,div,divcarga,texto,imagen)
     {  
      var poststr ="";
	   var largoForm = document.forms[0].length; var i = 1; var indice;
	   
	  
	   
	   
      while (i <= largoForm)
	    {
		 indice = i - 1;
			if (indice == 0)
			  {
                                              /* Nada, pues si el indice es 0, no hay otra variable antes que el a la       
                                                 cual adjuntarse*/
                                              }
			else
			   {
			    poststr += "&";
			    }
	     poststr += encodeURI(document.forms[0].elements[indice].name) + "=" + 
		            encodeURI(document.forms[0].elements[indice].value);	
		i = i +1;
		}
		var vinculo = vinc;
 
	  CargarContenidoPlus(vinculo,"POST",div,divcarga,texto,imagen,poststr,'si')
   }
   
   
   
function cargaContenidoSelect(contenido)
{
	var valor=document.getElementById("op_lugares").options[document.getElementById("op_lugares").selectedIndex].value;
 

if(valor=='TODAS')
	{
		// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo todo por defecto
		combo=document.getElementById("op_barrios");
		combo.length=0;
		var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="TODOS";
		combo.appendChild(nuevaOpcion);	combo.disabled=true;
	}
	else
	{
		ajax=crearAjax();
		ajax.open("GET", contenido+"?seleccionado="+valor, true);
		ajax.onreadystatechange=function() 
		{ 
			if (ajax.readyState==1)
			{
				// Mientras carga elimino la opcion "Elige pais" y pongo una que dice "Cargando"
				combo=document.getElementById("op_barrios");
				combo.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				combo.appendChild(nuevaOpcion); combo.disabled=true;	
			}
			if (ajax.readyState==4)
			{ 
				 
				document.getElementById("fila_2").innerHTML=ajax.responseText;
			} 
		}
		ajax.send(null);
	}
}

 
