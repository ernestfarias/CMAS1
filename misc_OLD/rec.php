


<script language="JavaScript" >
<!--
  
function NewWindowEAF(mypage,myname,w,h,scroll,pos,status,menu,tool,res){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status='+status+',menubar='+menu+',toolbar='+tool+',resizable='+res+'';
win=window.open(mypage,myname,settings);}

var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
 
 // -->
</script>

<?
 
  if(isset($_GET["id"]) && !empty($_GET["id"])) {
	$v = addslashes($_GET["id"]);
 require_once('../includes/catalog.php'); 
 $url = "../";
 } else {
	$v =  rand (1, 1351);
	 require_once('includes/catalog.php'); 
 } 

	$sqlrecetas = "Select * from recetas where id= '$v'";
	$rsrecetas = @mysql_query($sqlrecetas) or die ("err recetas"); 
		$row = @mysql_fetch_array($rsrecetas);  	

    $id = $row["id"];		
    $nombre = $row["nombre"];
    $detallest = $row["detalle"];
	$enviadapor= "";
	$enviadapor =$row["enviadapor"];
	$email ="";
	$email =$row["email"];
	
	  if(isset($enviadapor) && !empty($enviadapor)) $enviadapor = "\n\nEnviado por ".$enviadapor."";
	  if(isset($email) && !empty($email)) $email =  "\n(".$email.")\n";
	  
	  
	 $detallest2 = str_replace(chr(10), chr(13), $detallest);
	$detalles =  $detallest . $enviadapor .$email."Nro." .$id .">";
?><body bgcolor="ae5959">
 
 

 
<table width="100%" height="301" border="0" align="center" cellpadding="0" cellspacing="0">
  <form method="post" action="<?=$url?>misc/rec_add.php" name="frmenviorecetas"  target="envioreceta">
    <tr> 
      <td width="1" height="90" rowspan="4">&nbsp;</td>
      <td height="24" colspan="2" valign="bottom"> 
        <div align="center"><img src="<?=$url?>botones/recetas.gif" width="234" height="24"></div>
    <tr> 
      <td width="453" height="21" valign="bottom">
<div align="right"><a name="recetatitulo" style="visibility:'hidden'"><font size="-1">Titulo 
          de la receta </font> 
          <input style="width:220px; font-size:9pt;" name="txtrecetatitulo" type="text">
          </a></div></td>
      <td width="132" valign="bottom"></td>
    </tr>
    <tr> 
      <td height="150" colspan="2" align="center" valign="center"><font face="Verdana, Arial, Helvetica, sans-serif" > 
        <textarea name="txtreceta" readonly  style="width:320px;height:150px;font-size:8pt;background:#FFCC99;color:'purple'; " rows="1" cols="20" ><?=$detalles?></textarea>
        </font> </td>
    </tr>
    <tr> 
      <td height="69" align="right" valign="top"> <a name="recetadatos" style="visibility:'hidden'">Enviada 
        por: 
        <input name="enviadopor" style="width:180px;font-size:9pt;">
        <br>
        E-mail: 
        <input name="txrecetasemail" style="width:180px;font-size:9pt;">
        </a><br> <input name="btnenviorecetas" alt="Envianos Tu receta Favorita!!!" style="margin:2px;background-color:#B36464;color:white;border-color:orange;font-size:9pt;cursor:pointer;BORDER-WIDTH: 4px" type="button" value="Comparti tus secretos en la cocina" onClick="cargareceta('<?=$url?>')"> 
        <input  name="btncancelareceta" value="Cancelar" style="visibility:'hidden';margin:2px;background-color:#B36464;color:white;border-color:orange;font-size:9pt;cursor:pointer;BORDER-WIDTH: 4px" type="button" onClick="canceloreceta()"> 
      </td>
      <td width="132"><img align="top" src="<?=$url?>images/cuis15.gif" width="110" height="76"></td>
    </tr>
  </form>
  <script language="JavaScript" >
refreshreceta();

var GuardoReceta = window.document.all.txtreceta.value
function cargareceta(urlset) { 
if(window.document.all.btnenviorecetas.value == "Comparti tus secretos en la cocina"){
		window.document.all.txtreceta.value = "Escriba aqui su receta"
		window.document.all.btnenviorecetas.value = "Cancelar"
		window.document.all.txtreceta.readOnly = false;
		window.document.all.txtreceta.focus();
		window.document.all.txtreceta.select();
		window.document.all.btnenviorecetas.value = "Enviar receta";
		window.document.all.btncancelareceta.style.visibility = 'visible';		
		window.document.all.txtrecetatitulo.style.visibility = 'visible';
		window.document.all.recetatitulo.style.visibility = 'visible';
		window.document.all.recetadatos.style.visibility = 'visible';}
else
{
		 
		NewWindowEAF(urlset + 'misc/rec_add.php','envioreceta','200','80','no','center','no','no','no','no')
		window.document.all.frmenviorecetas.submit();
		window.alert("Gracias por enviar su receta a Comermas!")
		window.document.all.btnenviorecetas.value = "Comparti tus secretos en la cocina"
		window.document.all.btncancelareceta.style.visibility = 'hidden';
		window.document.all.txtrecetatitulo.style.visibility = 'hidden';
		window.document.all.recetatitulo.style.visibility = 'hidden';
		window.document.all.recetadatos.style.visibility = 'hidden';
		window.document.all.txtreceta.readOnly = true;
		window.document.all.txtreceta.value = GuardoReceta;
}
}

function canceloreceta() {
window.document.all.txtreceta.value = GuardoReceta;
window.document.all.btnenviorecetas.value = "Comparti tus secretos en la cocina"
window.document.all.btncancelareceta.style.visibility = 'hidden';
		window.document.all.txtrecetatitulo.style.visibility = 'hidden';
		window.document.all.recetatitulo.style.visibility = 'hidden';
		window.document.all.recetadatos.style.visibility = 'hidden';
		window.document.all.txtreceta.readOnly = true;
}


function refreshreceta()
{
window.document.all.btncancelareceta.style.visibility = 'hidden';
		window.document.all.txtrecetatitulo.style.visibility = 'hidden';
		window.document.all.recetatitulo.style.visibility = 'hidden';
		window.document.all.recetadatos.style.visibility = 'hidden';
		window.document.all.txtreceta.readOnly = true;
}
</script>

</table>


