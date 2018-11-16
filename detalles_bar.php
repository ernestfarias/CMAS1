
<?php  
 
 
   session_start();  
 
 
//'id1 es el nombre del lugar id2 el telefono ,esto es por si llega a haber dos lugares con mismo nombre
//idFromBusqueda=Replace(Request.QueryString("id"), "'", "''") 
 //'idFromBusqueda2=Replace(Request.QueryString("id2"), "'", "''") 

 if(isset($_SESSION["idlugar"]) && !empty($_SESSION["idlugar"]))
	{
	$idfrombusqueda = addslashes($_SESSION["idlugar"]);
//$titulo = addslashes($_GET["titulo"]);
//set rsvisitas =  ConnDestacados.execute("update base set visitas = visitas + 1 where id= "&idFromBusqueda)
//set rsdestacados = ConnDestacados.execute("SELECT * FROM BASE where id= "&idFromBusqueda)





require_once('includes/catalog.php');	
	 

 

	 $sqlnotas ="SELECT * from imagenes where id_base ='$idfrombusqueda' and modo=1";
	 $rsnotas = @mysql_query($sqlnotas) or die ("ERROR: The query failed.1"); 
	 $totalnotas = @mysql_num_rows($rsnotas); 
	 
	while ($row = @mysql_fetch_array($rsnotas)) 
   { 
   $detallesnotas = utf8_encode ($row["detalles"]);
   $imagennotas = $row["imagen"];
   $foto1 ="";
   $foto1='<img src="fotos/m_' . $imagennotas.  '" border=1>'; 
   $posimg = "left";
   
  // if($detallesnotas && !empty($detallesnotas)) $posimg = "left";
    $imagenc = 'fotos/m_' . $imagennotas; 
 $imageng = 'fotos/' . $imagennotas; 
 $wwwroot = "/home/rm000120/public_html/";

if($imagennotas && !empty($imagennotas)) list($width, $height, $type, $attr) = getimagesize($wwwroot.$imageng);


   
      ?>
   
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="Blanco14">

    <? 
	if($imagennotas && !empty($imagennotas)){
   ?>	
 <table width="130"  border="0" cellspacing="0" cellpadding="0" align="<?=$posimg?>">
       <tr>
         <td height="5"></td>
       </tr>
       <tr>
         <td width="5"></td>
         <td><table width="100%"  border="0" cellpadding="0">
             <tr>
               <td><img src="<?=$imagenc?>" border="1" style="border-color:#851549" onMouseOver="this.style.cursor= 'pointer'" onClick= "NewWindow('popup.php?imagen=<? echo $imageng;?>','popup','<?=$width?>','<?=$height?>','no','center');return false" ></td>
             </tr>
         </table></td>
       </tr>
       <tr>
         <td height="2"></td>
<td valign="top"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%"><div align="right"><img src="images/lupa.jpg" width="15" height="20"></div></td>
        <td width="95%">  <div align="left"><font size="1" face="tahoma"><a href=#  style="cursor:pointer" onClick= "NewWindow('popup.php?imagen=<? echo $imageng;?>','popup','<?=$width?>','<?=$height?>','no','center');return false">  Ampliar </a> </font></div></td>
      </tr>
    </table>
  </td>
       </tr>
       <tr>
         <td></td>
         <td   align="center"> </td>
       </tr>
     </table> 
	<? }?>	 
     <table width="100%"  border="0" cellspacing="0" cellpadding="10">
       <tr>
         <td>  <?=$detallesnotas?>  </td>
       </tr>
     </table>
       
	
	
	 	
		
		 </td>
                  </tr>
				 <tr>
              <td height="2" colspan="2"><img src="botones/blancogris.gif" width="100%" height="1"></td>
            </tr>
</table>
				 <? }

}

?>

