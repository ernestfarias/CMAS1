
 function verificador()
{
	var error = '';

	if (window.document.frm.fecha.value==""){
		error = error + 'Debe Especificar fecha de su visita. \n'; 
		  frm.fecha.focus();
   		 frm.fecha.select();
		 alert(error);
    	return false;}
 
    if (window.document.frm.hora.options[window.document.frm.hora.selectedIndex].value=="s")
		{
		error = error + 'Debe Seleccionar Hora de la visita. \n'; 
   		frm.hora.focus();
   		 
		 alert(error);
    	return false;}
 //if (window.document.frm.que.value=="")
	//	error = error + 'Debe Especificar que fue lo que pidio. \n'; 
		
	if (window.document.frm.precio.value=="")
		{
		error = error + 'Debe Especificar el precio por persona. \n'; 
	    frm.precio.focus();
   		 frm.precio.select();
		 alert(error);
    	return false;}
	//if (window.document.frm.comentario.value=="")
	//	error = error + 'Debe Especificar su comentario. \n'; 
	
	
	  if (window.document.frm.comida.options[window.document.frm.comida.selectedIndex].value=="s")
		{error = error + 'Debe Seleccionar su puntuacion en comida. \n'; 
		  frm.comida.focus();
   		 
		 alert(error);
    	return false;}
		
		  if (window.document.frm.servicio.options[window.document.frm.servicio.selectedIndex].value=="s")
		{error = error + 'Debe Seleccionar su puntuacion en servicio. \n'; 
		  frm.servicio.focus();
   		 
		 alert(error);
    	return false;}
		  if (window.document.frm.ambiente.options[window.document.frm.ambiente.selectedIndex].value=="s")
		{error = error + 'Debe Seleccionar su puntuacion en ambiente. \n'; 
		  frm.ambiente.focus();
   		 }
 
 //validar datos de usuarios y submit
  if(document.frm.rad_opcion[2].checked == true) verificardorreg('comentarios_add.php?modo=new')  //nuevo
  if(document.frm.rad_opcion[1].checked == true) verificadorsolo()  //solocomentario
  if(document.frm.rad_opcion[0].checked == true) verificardorvotos()  														//usuario								
 }
 
function verificardorvotos() 
{
    var1="modo=reg";
	 if(!isValidEmailStrict(frm.txtemailvyr.value))
		{
		alert("Debe ingresar una dirección de correo válida");
		frm.txtemailvyr.focus();
		frm.txtemailvyr.select();
		return false;
		}
	window.document.frm.action = "comentarios_add.php?"+var1;
	window.frm.submit();
 }
 
 function verificadorsolo() 
{
    var1="modo=solo";
		
	window.document.frm.action = "comentarios_add.php?"+var1;
	window.frm.submit();
 }

function noverificar() 
{
    var1="modo=reg";
	
	window.document.frm.action = "comentarios_add.php?"+var1;
	window.frm.submit();
 }
 
 
 function verificardorreg (accion)
 {
 
	 if(!isValidEmailStrict(frm.txtregemail.value))
		{
		alert("Debe ingresar una dirección de correo válida");
		frm.txtregemail.focus();
		frm.txtregemail.select();
		return false;
		}
		
		if (window.document.frm.txtregapodo.value=="")
		{
		error =  'Debe Especificar su apodo. \n'; 
	    frm.txtregapodo.focus();
   		 frm.txtregapodo.select();
		 alert(error);
    	return false;}
					
	if(!isValidNickLength(frm.txtregapodo.value))
  	{
     alert("El apado debe tener entre 4 a 20 caracteres");
      frm.txtregapodo.focus();
      frm.txtregapodo.select();
     return false;
  	}
  	 
		
		if (window.document.frm.txtregpass.value=="")
		{
		error =  'Debe Especificar su contraseña. \n'; 
	    frm.txtregpass.focus();
   		 frm.txtregpass.select();
		 alert(error);
    	return false;}
		
		
		
		 if (window.document.frm.txtregpass.value.length < 6)
		{
		error =  'Su contraseña debe tener mas de 6 caracteres \n'; 
	    frm.txtregpass.focus();
   		frm.txtregpass.select();
		alert(error);
    	return false;}
		
		
		
		 if (window.document.frm.txtregpassc.value.length == 0)
		{
		error ='Especificar confirmacion de contraseña \n'; 
	    frm.txtregpassc.focus();
   		frm.txtregpassc.select();
		alert(error);
    	return false;}
				 
		if (window.document.frm.txtregpass.value != window.document.frm.txtregpassc.value)
		{
		error = 'La contraseña nueva no es igual que la confirmacion \n'; 
	    frm.txtregpass.focus();
   		frm.txtregpass.select();
		alert(error);
    	return false;}

	window.document.frm.action = accion; 
	window.frm.submit();
 }
 



function validateFloat(obj, nLength, nPrecision)


    {
    	var strVal = new String(obj.value);
    	var nIndexOfDot = strVal.indexOf('.');
    	var nValidLength = nIndexOfDot==-1?strVal.length:strVal.length+1
    	if(nValidLength<strVal.length)
       	{
        		alert('Maximo de Caracteres permitido '+nLength);
        		strVal = strVal.substring(0,nValidLength);
        	}
        	if(strVal.charAt(strVal.length-1)!='.' || nIndexOfDot!=(strVal.length-1))
            	{
            		if(isNaN(parseFloat(strVal)))
               		{
                			strVal='0';
                		}
                		obj.value=parseFloat(strVal);
                	}
                	if(-1!=nIndexOfDot && strVal.substring(nIndexOfDot+1).length>nPrecision)


                    	{
                    		strVal=strVal.substring(0, strVal.length-1);
                    		obj.value=strVal;
                    	}
                }

	
function isValidNickLength(nick)
  {
    if(nick.length > 20 || nick.length < 4)
      return false;
    else
      return true;
  }
	
	
	function isValidEmail(address) {
		if (address != '' && address.search) {
      		if (address.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1) return true;
      		else return false;
		}
	}
	function isValidEmailStrict(address) {
		if (isValidEmail(address) == false) return false;
		var domain = address.substring(address.indexOf('@') + 1);
		if (domain.indexOf('.') == -1) return false;
		if (domain.indexOf('.') == 0 || domain.indexOf('.') == domain.length - 1) return false;
		return true;
	}
  

 function apagarcampos(opcion) 
  {
 	var1= true;
	var2=true; 
	varb=false; 
	  
	//	alert(opcion);
		
   if(opcion == 'a') //caso user registrado
   { 
   	var2= true;
	var1 = false;
	varb=true; 

   }
	 
	    if(opcion == 'b') //caso SOLO comentar
   { 
   	var2= true;
	var1 = true;
	varb=false; 

   }
	 
	    if(opcion == 'c') //caso registrarme
   { 
   	var2= false;
	var1 = true;
	varb=true; 

   }
	 
		   
  window.frm.txtemailvyr.disabled = var1  
	window.frm.txtpassvyr.disabled = var1  
  window.frm.btnvoto.disabled = var1
	window.frm.ckvoto.disabled = var1 
	
	window.frm.txtregemail_solo.disabled = varb
	  window.frm.txtregnombre_solo.disabled = varb  
	window.frm.txtregciudad_solo.disabled = varb  
	
    window.frm.txtregnombre.disabled = var2  
	window.frm.txtregapellido.disabled = var2  
    window.frm.txtregtelefono.disabled = var2  
	window.frm.txtregbarrio.disabled = var2  
	
	window.frm.txtregfecnacd.disabled = var2  
	window.frm.txtregfecnacm.disabled = var2  
	window.frm.txtregfecnaca.disabled = var2  
	 
	window.frm.txtregcomo.disabled = var2  
	window.frm.txtregemail.disabled = var2  
window.frm.txtregapodo.disabled = var2
	window.frm.txtregpass.disabled = var2  
  	window.frm.txtregpassc.disabled = var2  
	window.frm.btnreg.disabled = var2  
	window.frm.ckreg.disabled = var2  
	
	
	 }
 
