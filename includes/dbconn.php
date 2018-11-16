<?
$db_username = "rm000120_comerma"; 
$db_password = "caca256"; 
$db_name =  "rm000120_comermas";  

$mysql_link = mysql_connect( "localhost", "$db_username", "$db_password") or die( "Unable to connect to database server"); 
@mysql_select_db( "$db_name") or die( "Unable to select database"); ?>
