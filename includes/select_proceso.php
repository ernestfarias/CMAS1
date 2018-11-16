<?php
function validaValor($parametro)
{
	/* Funcion utilizada para validar el numero de pais recibido por GET. En nuestra base
	de datos tenemos como validos los paises desde 1 a 21 */
	if(eregi("^[0-9]{1,2}$", $parametro)) 
	{
		if($parametro>=1 && $parametro<=21) return TRUE;
		else return FALSE;
	}
	else return FALSE;
}

$valor=$_GET["seleccionado"];

//if(validaValor($valor))
//{
    require_once('catalog.php');	
    $consulta=mysql_query("SELECT * FROM barrios WHERE id_ciudad='$valor'");
 	$totalrecords = @mysql_num_rows($consulta); 
   
if ($totalrecords > 0) 
			{
			// Comienzo a imprimir el select
			echo "<select class='combo' id='op_barrios' name='op_barrios'>";
       echo '<option value="TODOS" selected>TODOS</option>';
				while($registro=mysql_fetch_row($consulta))
				{
					// Paso a HTML acentors y ñ para su correcta visualizacion
					$registro[2]=htmlentities($registro[2]);
					// Imprimo las opciones del select
					echo "<option value='".$registro[0]."'>".strtoupper($registro[2])."</option>";
				}			
			echo "</select>";
 	} else {
	echo '<select class="combo" disabled="disabled" id="op_barrios"  name="op_barrios"><option id="valor_defecto" value="0">TODOS</option></select>';

	}
//}
?>