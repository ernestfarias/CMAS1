<?
 include('checkrep.php'); 

if(isset($_SESSION["reportexcel"]) && !empty($_SESSION["reportexcel"]))
{
header("Content-Disposition: attachment; filename=reporte.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $header."\n".$_SESSION["reportexcel"];
//echo $header."\n"."dasd";

}

?>

