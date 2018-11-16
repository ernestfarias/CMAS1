<SCRIPT LANGUAGE="javascript">
 
function CargarContenidoMAIL(html,div,divcarga)
{
	var valor=document.getElementById("mensajes").options[document.getElementById("mensajes").selectedIndex].value;
    var contenedor2;
	var contenedorcarga2;
    contenedor2 = document.getElementById(div);
    contenedorcarga2 = document.getElementById(divcarga);
    // creamos un nuevo objeto ajax
    ajax2=crearAjax();
   
    //cargar el archivo html por el método GET
    ajax2.open("GET", html+"?seleccionado="+valor, true);
	ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax2.setRequestHeader("Accept-Charset", "UTF-8");

    ajax2.onreadystatechange=function() 
    {
        if (ajax2.readyState==4 && ajax2.status==200) // Readystate 4 significa que ya acabó de cargarlo
        {
			// busca si hay una funciona java
	     // alert (ajax2.responseText)
		 
		 tinyMCE.execCommand('mceNewDocument',false, '.' );
		tinyMCE.execCommand('mceInsertContent',false,ajax2.responseText );
 window.frm.textasunto.value = valor;
 contenedorcarga2.innerHTML  ="";
			} else {
			
			
			 
			  
contenedorcarga2.innerHTML ='<img src="http://www.comermas.com.ar/includes/refresh.gif" border="0" align="center"/>';
			}
    }
 
    ajax2.send(null)
}


function getPagMAIL(vinc,div,divcarga,texto,imagen)
     {  
      var poststr ="";
	   var largoForm = document.forms[0].length; var i = 1; var indice;
	   
	  
	 
      while (i <= largoForm)
	    {
		 indice = i - 1;  
		 mostrar = true;
		 
	   
			if (indice == 0)
			  {
                                              /* Nada, pues si el indice es 0, no hay otra variable antes que el a la       
                                                 cual adjuntarse*/
                                              }
			else
			   {
			   if   (mostrar ==true) poststr += "&";
			    }
				
				
 			//alert ( encodeURI(document.forms[0].elements[indice].name) + " - " + encodeURI(document.forms[0].elements[indice].type));	
		
		
		
		if   (mostrar ==true){
	     poststr += encodeURI(document.forms[0].elements[indice].name) + "=" + 
		            encodeURI(document.forms[0].elements[indice].value);	
		}
		i = i +1;
		}
		var vinculo = vinc;
 //alert (poststr)
	  CargarContenidoPlus(vinculo,"POST",div,divcarga,texto,imagen,poststr,'si')
   }
   


</SCRIPT>