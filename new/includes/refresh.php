 <?  
 /// Recarga el nombre de las categorias 
 
 
  function refreshdata($tabla,$campomostrar,$campoid,$varid)  {

		$users_querya =  "SELECT * FROM ".$tabla." WHERE ".$campoid." = '$varid'";
 		$users_displaya = @mysql_query($users_querya) or die("ERROR: 4 " . mysql_error());
		$row = mysql_fetch_Array($users_displaya);
	     $nombre =($row[$campomostrar]);
	 if ($nombre =="") $nombre =$varid;			 
		// if ($varid == 0) $nombre = "";
		$tabla= $nombre; 
		return($tabla);  
		 
	  
		  
   }
 
?>