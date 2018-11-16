<?
class impresiones
{
	var $tipo;
	var $idfrombusqueda;
	function saveimpresiones($tipo, $idfrombusqueda)
	{
	 $totaimp = 0; 
 	 $sqlimp ="SELECT * from impresiones where id_base ='$idfrombusqueda' AND tipo='$tipo'";
	  
	 $rsimp = @mysql_query($sqlimp) or die ("ERROR: The query failed.1"); 
	 $totaimp = @mysql_num_rows($rsimp); 
	 
		 if( $totaimp == "0") {
			 $sqldescuento ="INSERT INTO `impresiones` (`id_base` , `tipo` , `cantidad` ) VALUES ('$idfrombusqueda', '$tipo', '1')";
			 $rsdescuento = @mysql_query($sqldescuento) or die ("ERROR: The query failed.2"); 
		 } else {
			 $sqlvoto = "UPDATE impresiones SET cantidad = cantidad +1 WHERE id_base='$idfrombusqueda' AND tipo='$tipo'";
			 mysql_query($sqlvoto) or die(mysql_error()); 
		 }
	 }
}
?>