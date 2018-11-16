<? header("Cache-Control: no-store, no-cache, must-revalidate");
 
 if(isset($_GET['id']) && !empty($_GET['id']))
	{
	require_once('includes/catalog.php');	
	$id= $_GET['id'];
	$sino = ($_GET['sino']);
	if ($sino=='si')$sqlvoto = "UPDATE puntuaciones SET si = si +1 WHERE id='$id'";//
	if ($sino=='no')$sqlvoto = "UPDATE puntuaciones SET no = no +1 WHERE id='$id'";//
	 mysql_query($sqlvoto) or die(mysql_error()); 
	
	 
	 
	$sql = "SELECT si, no FROM puntuaciones where id= '$id'";
	
	
 
    $qry= @mysql_query($sql) or die ("1ee");
    $rs = mysql_fetch_Array($qry);
  
	   $si = $rs['si'] ;
    $no = $rs['no'] ;
  if ($sino=='si') echo $si;
  if ($sino=='no') echo $no;
 }  
   
   ?>


<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>


 