<?php header("Cache-Control: no-store, no-cache, must-revalidate");

 

$valor=$_GET["seleccionado"];

 
   require_once('../includes/catalog.php');	
    $check= "SELECT * FROM envio_correo WHERE asunto='".$valor."'";
	
	 
		$result = mysql_query($check);
		$total = mysql_num_rows($result);
	
	
 

	if ($total > 0) 
			{
		 $info = mysql_fetch_Array($result);
				 
					 
					echo  $info["mensaje"];
				 	
			 
}
 
?>