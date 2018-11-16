<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<SCRIPT TYPE="text/javascript" SRC="ajax.jsp" language="javascript1.2"></SCRIPT>
 

<?php
function generaPaises()
{
	$coneccion=mysql_connect("localhost", "crnet", "cri15481") or die(mysql_error());
	mysql_select_db("comermas", $coneccion) or die(mysql_error());
	$consulta=mysql_query("SELECT * FROM ciudades");
	mysql_close($coneccion);

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select class='combo' id='op_lugares' name='op_lugares' onChange=cargaContenidoSelect('select_proceso.php')>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>

<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ejemplo</title>
</head>

<body>
<center>
<table border="1" width="400" style="border-style:none;">
  <tr>
    <td id="fila_1" width="50%" class="punteado"><?php generaPaises(); ?></td>
	<td id="fila_2" width="50%" class="punteado">
		<select class="combo" disabled="disabled" id="op_barrios" name="op_barrios">
		<option id="valor_defecto" value="0">Seleccione Ciudad...</option>
		</select>
	</td>
  </tr>
</table>
</center>
</body>
</html>