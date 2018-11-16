
<script language="JavaScript1.2">
	<!--
	var win=null;
function NewWindowEAF(mypage,myname,w,h,scroll,pos,status,menu,tool,res){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status='+status+',menubar='+menu+',toolbar='+tool+',resizable='+res+'';
win=window.open(mypage,myname,settings);}

 
	  
			
	  
	// -->
	</script><head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php 
 
 
//'id1 es el nombre del lugar id2 el telefono ,esto es por si llega a haber dos lugares con mismo nombre
//idFromBusqueda=Replace(Request.QueryString("id"), "'", "''") 
 //'idFromBusqueda2=Replace(Request.QueryString("id2"), "'", "''") 

 if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
	$idfrombusqueda = addslashes($_GET["id"]);
$titulo = addslashes($_GET["titulo"]);
//set rsvisitas =  ConnDestacados.execute("update base set visitas = visitas + 1 where id= "&idFromBusqueda)
//set rsdestacados = ConnDestacados.execute("SELECT * FROM BASE where id= "&idFromBusqueda)





require_once('includes/catalog.php');	
	 

 

	 $sqlnotas ="SELECT * from imagenes where id_base ='$idfrombusqueda' and titulo='$titulo' and modo=0";
	 $rsnotas = @mysql_query($sqlnotas) or die ("ERROR: The query failed.1"); 
	 $totalnotas = @mysql_num_rows($rsnotas); 
	 $cont =0;
	while ($row = @mysql_fetch_array($rsnotas)) 
   { 
   $detallesnotas = utf8_encode ($row["detalles"]);
   $imagennotas = $row["imagen"];
   //$foto1 ="";
   //$foto1='<img src="fotos/m_' . $imagennotas.  '" border=1>'; 
   $posimg = "left";
   
 $imagenc = 'fotos/m_' . $imagennotas; 
 $imageng = 'fotos/' . $imagennotas; 
 $wwwroot = "/home/rm000120/public_html/";

if($imagennotas && !empty($imagennotas)) list($width, $height, $type, $attr) = getimagesize($wwwroot.$imageng);



  // if($detallesnotas && !empty($detallesnotas)) $posimg = "left";
   
    if ($cont >0){
      ?>
    

<img src="botones/blancogris.gif" width="100%" height="1">
<?  }?>
                <table width="100%"  border="0" cellspacing="0" cellpadding="10">
                  <tr>
                    <td class="Blanco14">

    <? 
	if($imagennotas && !empty($imagennotas)){
   ?>	
 <table   border="0" cellspacing="0" cellpadding="0" align="<?=$posimg?>">
       <tr>
         <td></td>
       </tr>
       <tr>
         <td width="10"></td>
         <td ><table width="100%"  border="0" cellpadding="0">
             <tr>
               <td> <img src="<?=$imagenc?>" border="1" style="border-color:#851549" onMouseOver="this.style.cursor= 'pointer'" onClick= "NewWindow('popup.php?imagen=<? echo $imageng;?>','popup','<?=$width?>','<?=$height?>','no','center');return false" ></td>
             </tr>
         </table></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
  <td valign="top"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%"><div align="right"><img src="images/lupa.jpg" width="15" height="20"></div></td>
        <td width="95%">  <div align="left"><font size="1" face="tahoma"><a href=#  style="cursor:pointer" onClick= "NewWindow('popup.php?imagen=<? echo $imageng;?>','popup','<?=$width?>','<?=$height?>','no','center');return false">  Ampliar </a> </font></div></td>
      </tr>
    </table>
  </td>
       </tr>
     </table> 
	<? }?>	 
       <div align="justify">
       <?=$detallesnotas?> 
    
	
	
	 	
		 </div></td>
                  </tr>
                </table>
				
				 <? $cont= $cont +1;}

}

?>
</head>