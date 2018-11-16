
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


function CargarContenido(html)
{
    var contenedor;
    contenedor = document.getElementById('contenido');
    
    // creamos un nuevo objeto ajax
    ajax=crearAjax();
    
    //cargar el archivo html por el método GET
    ajax.open("GET", html,true);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.setRequestHeader("Accept-Charset", "UTF-8");

    ajax.onreadystatechange=function() 
    {
        if (ajax.readyState==4 && ajax.status==200) // Readystate 4 significa que ya acabó de cargarlo
        {
            contenido.innerHTML = ajax.responseText
        } else {
			contenido.innerHTML = '<img src="includes/images/loading.gif" align="absmiddle"/><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Cargando...</font>';
		}
    }
 
    ajax.send(null)
}


