<? 
   //	 if(isset($_GET["imagen"]) && !empty($_GET["imagen"]))
    	 $offset = addslashes($_GET["imagen"]);
//		 $offset = stripslashes($_GET["imagen"]);
$imageng = $offset;
//$imageng= "http://www.crnet.com.ar/sistemas/notas/sitios/dogocazador.com.ar/0_All but Green String - 44 days-1.jpg";
//$imageng = str_replace(" ", "%20", $offset);

//echo $imageng."<br>";
//$imageng = "C:\wwwroot\crnet.com.ar\sistemas\notas\sitios\dogocazador.com.ar\0_All but Green String - 44 days-1.jpg";
//list($width, $height, $type, $attr) = getimagesize($imageng);

//echo "Alto:".$height ."<br>";
//echo "Ancho:".$width ."<br>";
//echo "Type:".$type ."<br>";
//echo "Attr:".$attr."<br>" ;
?>
<SCRIPT>

//var w=<? echo $width?>;
//document.writeln = w;
//var h=<?=$height + 550?>;
//var mw=(screen.width)?(screen.width-w)/2:100; //centro el form
//var mh=(screen.height)?(screen.height-h)/2:100 ;
//this.resizeTo(1840,430);
// this.moveTo(mw,mh);
//this.c
</SCRIPT>

<html>
<head>
<title>Popup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	background-color: #000066;
}
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style></head>


<?
echo "<body>";
echo '<img src="'. $offset.'">'; 
echo '</body>';
echo '</html>';
?>