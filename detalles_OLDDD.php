
<?

//SI TIENE SUCURSALES EL LUGAR Y PARA QUE LAS MUESTRE EN EL DATELLES, ASEGURASE:
//que el campo nombre de la tabla base , tenga solo el nombre del lugar, es decir todos los lugares y sus sursales ,de nombre tienen
//que tener el mismo , y en el campo telefono de c/u poner el * (ver sucursales)

// response.Expires = 10080 'una semana de duracion 
phpinfo(); 


 session_start();  
//'id1 es el nombre del lugar id2 el telefono ,esto es por si llega a haber dos lugares con mismo nombre
//idFromBusqueda=Replace(Request.QueryString("id"), "'", "''") 
 //'idFromBusqueda2=Replace(Request.QueryString("id2"), "'", "''") 

 if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
	$idfrombusqueda = addslashes($_GET["id"]);

//set rsvisitas =  ConnDestacados.execute("update base set visitas = visitas + 1 where id= "&idFromBusqueda)
//set rsdestacados = ConnDestacados.execute("SELECT * FROM BASE where id= "&idFromBusqueda)





require_once('includes/catalog.php');	
	 



  //  $sql = "SELECT * FROM base where id= '$idfrombusqueda'";
  
  
 $sql = "SELECT *FROM base LEFT  JOIN encargados ON base.id = encargados.nombrelugar where base.id= '$idfrombusqueda'";
 // $sql =  "SELECT *FROM base LEFT JOIN (imagenes RIGHT JOIN encargados ON imagenes.id_base= encargados.nombrelugar) ON base.id = encargados.id  where base.id= '$idfrombusqueda'";

  
  
    $qrydestacados= @mysql_query($sql) or die ("1ee");
   $rsdestacados = mysql_fetch_Array($qrydestacados);
  
	   $id = $rsdestacados['id'] ;
   	   $nombre =  stripslashes($rsdestacados['nombre']) ;
	   $barrio =  stripslashes($rsdestacados['barrio']) ;
	   $localidad = stripslashes($rsdestacados['localidad']) ;
	  $direccion =  stripslashes($rsdestacados['direccion']) ;
		$telefono = stripslashes( $rsdestacados['telefono'] );
	  $detalles2t =  stripslashes($rsdestacados['detalles2']) ;
     $detalles1 = stripslashes( $rsdestacados['detalles1'] );
    
     $visitas = $rsdestacados['visitas'] ;
	 
 $encreservas = stripslashes( $rsdestacados['encreservas'] );
  
// %="- "&replace(ucase(rsdestacados.Fields.Item("Detalles2").Value),"/","<BR>-")%

 $detalles2 =  "- ". strtoupper(str_replace("/", "<br>-", $detalles2t));
 
//  $bannera = "banners/".   $bannerat['banner'] ; 



//$foto1="";
//$foto2="";
//$foto3="";


 //if($rsdestacados["foto1"] && !empty($rsdestacados["foto1"])){
//preferentemete no mas alto de 112px
//$foto1='<img src="fotos/' . $rsdestacados["foto1"].  '">';
//}

 // if($rsdestacados["foto2"] && !empty($rsdestacados["foto2"])){
//preferentemente no mas de 320x210 px
//'Foto2="<table width=""1"" cellpadding=""0"" height=""1"" cellspacing=""0"" border=""4"" bordercolor=""#FF0000"" bordercolorlight=""#FFCC00"" bordercolordark=""#FF9900""><td align=""center"" valign=""top""><img src=""./fotos/"&rsdestacados("foto2")&"""></td></table>"
//$foto2='<img src="fotos/'.$rsdestacados["foto2"].   '">';/
//}

// if($rsdestacados["foto3"] && !empty($rsdestacados["foto3"])){
//$foto3='<img src="fotos/'.$rsdestacados["foto3"].   '">';

//}


// Menus
//if rsmenus.eof then
//varlista = "0"
//varpromo = "0"
//else
//varlista = (rsmenus.Fields.Item("lista").Value)
//varpromo = (rsmenus.Fields.Item("menu1").Value) & vbcrlf & vbcrlf &(rsmenus.Fields.Item("menu2").Value)  & vbcrlf & vbcrlf & (rsmenus.Fields.Item("menu3").Value)
//end if

//CeldasMenu = "<td width=235 align=""center"" height=239 ><b><font size=2 face=Verdana, Arial, Helvetica, sans-serif>LISTA DE PRECIOS</b><textarea name=textfield style=""height:220px;width:200px;font-size:8pt""READONLY>"&varlista&"</textarea></td><td align=""center"" width=236 height=239 bgcolor=#FFCC99> <b><font size=2 face=Verdana, Arial, Helvetica, sans-serif>PROMOCIONES</b><br><textarea name=""textarea"" style=""height:220px; width:200px;font-size:8pt""READONLY>"&varpromo&"</textarea></td>"
//CeldasSinMenu = "<td colspan=""2"" valign=""middle"" align=""center"" height=""150"" ><H1><img src=""./fotos/cmaslogo.gif""></H1></td>"

 // $sql = "SELECT * FROM encargados where id= '$id'";
  //  $qryd = @mysql_query($sql) or die ("err sql6");   
  // $rsd  = mysql_fetch_Array($qryd);
  
	 
//   	   $encreservas =   $rsd[0] ;
//echo "SELECT encreservas FROM encargados where id= '$id'";
//echo $encreservas;
//echo $id;
?>


<html>
<head>

<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 



</head>

<body bgcolor="AE5959" leftmargin="0" topmargin="0">
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td width="779" height="90"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="90" background="<?=$_SESSION["bannertop"] ?>" bgcolor="ae5959">&nbsp;</td>
              </tr>
              <tr>
                <td width="777" bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="777" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="AE5959">
        <tr> 
          <td width="20">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2"><div align="right"> 
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="history.back()"><font color="#FFFFFF"><strong>Volver</strong></button>
              </div></td>
            </tr>
            <tr>
              <td colspan="2"><img src="botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="10" bgcolor="#851549"></td>
                          <td width="346" bgcolor="#851549" class="TitulosTime"> 
                            <?=$nombre?>
                           </td>
                          <td width="10" height="30" bgcolor="#851549">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="10" height="30" bgcolor="#B36464">
                            <p align="right">&nbsp;</p></td>
                          <td height="30" align="right" bgcolor="#B36464" class="Blanco10"><?=$direccion?></td>
                          <td width="10" height="30" bgcolor="#B36464">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="10" height="29">
                            <div align="right"></div></td>
                          <td height="29" align="right" class="Blanco10"><?=$barrio?> - <?=$localidad?></td>
                          <td width="10" height="30">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="10" height="28" bgcolor="#B36464">
                            <div align="right"> </div></td>
                          <td height="28" align="right" bgcolor="#B36464" class="Blanco10"><b><i><?=$telefono?></i></b></td>
                          <td width="10" height="30" bgcolor="#B36464">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" align="right"></td>
                        </tr>
                    </table></td>
                    <td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="10"></td>
                                <td valign="center" class="Blanco10"><p><?=$detalles2?></p></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="1" colspan="2"><img src="botones/blancogris.gif" width="100%" height="1"></td>
            </tr>
            <tr>
              <td colspan="2" class="BlancoBold14"> <i> <?=$detalles1?> </i></td>
            </tr>
            <tr>
              <td colspan="2" align="center" class="Blanco10">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center" class="Blanco10">
								  	 <? 
	 $sqlnotas ="SELECT * from imagenes where id_base =$idfrombusqueda";
	 $rsnotas = @mysql_query($sqlnotas) or die ("ERROR: The query failed.1"); 
	 $totalnotas = @mysql_num_rows($rsnotas); 
	 
	while ($row = @mysql_fetch_array($rsnotas)) 
   { 
   $detallesnotas = $row["detalles"];
   $imagennotas = $row["imagen"];
   $foto1 ="";
   $foto1='<img src="fotos/' . $imagennotas.  '">'; 
   $posimg = "left";
   
  // if($detallesnotas && !empty($detallesnotas)) $posimg = "left";
   
   
      ?>
   
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="Blanco14">

    <? 
	if($imagennotas && !empty($imagennotas)){
   ?>	
 <table width="130"  border="0" cellspacing="0" cellpadding="0" align="<?=$posimg?>">
       <tr>
         <td height="10"></td>
       </tr>
       <tr>
         <td width="10"></td>
         <td><table width="100%"  border="0" cellpadding="10">
             <tr>
               <td><?=$foto1?></td>
             </tr>
         </table></td>
       </tr>
       <tr>
         <td height="2"></td>
       </tr>
       <tr>
         <td></td>
         <td   align="center"><em><footer_img></footer_img></em></td>
       </tr>
	  
	
     </table> 
	<? }?>	 
     <p align="justify"  style="margin: 4">
       <?=$detallesnotas?>
     </p>
	
	
	 	
		
		 </td>
                  </tr>
				 <tr>
              <td height="2" colspan="2"><img src="botones/blancogris.gif" width="100%" height="1"></td>
            </tr>
                </table>
				 <? }?>
             </td>
            </tr>
            <tr>
              <td colspan="2" class="Blanco10"></td>
            </tr>
            <tr>
              <td colspan="2" class="Blanco10">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" class="Blanco10">
                <? // si tiene sucursaless para que las muestre
				
	
	$vart = strpos($direccion, "*");

if ($vart === false) {
    } else {
$letra="";

$nombre = str_replace("'", "\'", $nombre);
$sql2 = "select * from base where nombre like '%". $nombre. "%' AND telefono !='".$telefono. "'";

$qrysuc = @mysql_query($sql2) or die ("err sql6");   
 $totalrecords = @mysql_num_rows($qrysuc); 

echo "<BR><center><table class='Blanco10'><th align=left>Otras Sucursales:</th>";
echo "<tr bgcolor=#FF9900 bordercolor=#FFFFFF><td width=166 height=20 bgcolor=#851549><div align=left><b>SUCURSAL</b></div></td><td width=122 height=20 bgcolor=#851549><div align=left><b>DIRECCION</b></div></td><td width=97 height=20 bgcolor=#851549><div align=left><b>TELEFONO(s)</b></div></td></tr>";
while ($row = @mysql_fetch_array($qrysuc)) {  

echo "<tr bgcolor=#B36464><td>".$row['barrio']."</td><td>".$row['direccion']."</td><td>".$row['telefono']."</tr></td>";
 
} 
echo "</table></center><br>";
   	
	 
	}
 
				
 
 
?>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="Blanco10"><div align="center"> </div></td>
            </tr>
            <tr>
              <td colspan="2" class="Blanco10">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="Blanco10">&nbsp;</td>
              <td align="right" class="Blanco10">
<?
			  
			//   if(isset($encreservas) && !empty($encreservas))
			 //  {
			 
			    echo "PARA REALIZAR CONSULTAS O RESERVAS <a href='contacto.php?consulta=".$idfrombusqueda."'>AQUI</a>";
			 	//}
			  ?></td>
            </tr>
            <tr>
              <td align="right" class="Blanco10">&nbsp;</td>
              <td align="right" class="Blanco10">&nbsp;</td>
            </tr>
            <tr>
              <td width="47%" align="right" class="Blanco10"> <div align="left">
			  </div></td>
              <td width="53%" align="right" class="Blanco10">Visitas a
                <?=stripslashes($nombre) ?>
: <b>
<?=$visitas?>
</b></td>
            </tr>
          </table></td>
          <td width="20" height="400" align="right"></td>
        </tr>
      </table>
      <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="2"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="24"><? require_once('includes/bot.php')?></td>
        </tr>
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?
}
require_once('includes/catalog.php'); 
$sqlvoto = "UPDATE base SET visitas = visitas +1 WHERE id='$idfrombusqueda'";//
	 mysql_query($sqlvoto) or die(mysql_error()); 

?>
