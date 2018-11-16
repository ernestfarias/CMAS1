<?error_reporting(0);
require_once('../includes/date.php'); 
 	require_once('../includes/catalog.php'); 
	$msgregplace = "no";
	 session_start();  
 if(isset($_POST["nombre"]) && !empty($_POST["nombre"]))
	{
	require_once('../includes/catalog.php'); 
	// datos del lugar
	$nombre = addslashes($_POST["nombre"]);
	$telefono = addslashes($_POST["telefono"]);
	$direccion = addslashes($_POST["direccion"]);
	$ciudad = addslashes($_POST["localidad"]);
	$barrio = addslashes($_POST["barrio"]);

 
    if (strtoupper($ciudad) == strtoupper("Capital Federal")) {
	
	} else {
	$barrio = $ciudad;
	//$ciudad = "";
	}
	
	$especialidad = addslashes($_POST["comidas"]);
	$presentacion = addslashes($_POST["presentacion"]);
	$deliverycheck = addslashes($_POST["delivery"]);
	$abierto = addslashes($_POST["abierto"]);
 
	$clase= addslashes($_POST["selclase"]);
	
	// datos encargado
 $recibeinfocheck="off";
 if(isset($_POST["encnombre"]) && !empty($_POST["encnombre"]))	$encnombre= addslashes($_POST["encnombre"]);
 if(isset($_POST["enctelefono"]) && !empty($_POST["enctelefono"]))	$enctelefono=addslashes($_POST["enctelefono"]);
 if(isset($_POST["encemail"]) && !empty($_POST["encemail"]))	$encemail=addslashes($_POST["encemail"]);
 if(isset($_POST["recibeinfo"]) && !empty($_POST["recibeinfo"])) $recibeinfocheck=addslashes($_POST["recibeinfo"]);

	if ($deliverycheck=="Si") {
		$delivery="Si";
	} else {  
	$delivery="No";
	}
	
	 if(isset($encemail) && !empty($encemail)) {
	 } else {
 		$encemail="no";
	}
	 
	if ($recibeinfocheck=="on") {
	$recibeinfo=1;
	} else {
 	$recibeinfo=0;
 	}
	
// si pesronalizo algun campo, le cambio el valor a la variable

 if(isset($_POST["sucbarrio"]) && !empty($_POST["sucbarrio"])) $sucbarrio= addslashes($_POST["sucbarrio"]);
 if(isset($_POST["otraespecialidad"]) && !empty($_POST["otraespecialidad"])) $otraespecialidad= addslashes($_POST["otraespecialidad"]);
 if(isset($_POST["succiudad"]) && !empty($_POST["succiudad"])) $succiudad= addslashes($_POST["succiudad"]);
 if(isset($_POST["otrohorario"]) && !empty($_POST["otrohorario"])) $otrohorario= addslashes($_POST["otrohorario"]);

 
	if(isset($sucbarrio) && !empty($sucbarrio)) {
	 	$barrio=$sucbarrio;
 	}

	if(isset($succiudad) && !empty($succiudad)) {
 		$ciudad = $succiudad;
		$barrio= $succiudad; // para que barrio no tenga un null
    }

	if(isset($otraespecialidad) && !empty($otraespecialidad)) {
		$especialidad= $otraespecialidad;
	} 
 
	if(isset($otrohorario) && !empty($otrohorario)) {
 		$abierto=$otrohorario;
 	}
	
	 if(isset($_POST["clase"]) && !empty($_POST["clase"])) $clase= addslashes($_POST["clase"]);
	 if(isset($_POST["costo"]) && !empty($_POST["costo"])) $costo= addslashes($_POST["costo"]);
	 if(isset($_POST["estacionamiento"]) && !empty($_POST["estacionamiento"])) $estacionamiento = addslashes($_POST["estacionamiento"]);
 
// especialidad es detalles2

	 if(isset($_POST["espestacionamiento"]) && !empty($_POST["espestacionamiento"])) $estacionamiento = addslashes($_POST["espestacionamiento"]);
 
	   
      
  	 $strcosto  =" / Costo por persona:".$costo;
	if ($costo == "No especificar")  $strcosto ="";
		
		
		
		$especialidad = $especialidad ." / Estacionamiento:". $estacionamiento . " / Delivery :". $delivery . " / Abierto :" . $abierto. $strcosto;
 
		//$especialidad = $especialidad ." / Promedio por persona:". $costo . " / Estacionamiento:". $estacionamiento;
//	}
	 
///		$especialidad = $especialidad 
	 

if (getenv("HTTP_X_FORWARDED_FOR")) {
    	 $bip   = getenv("HTTP_X_FORWARDED_FOR");
	   } else {
	     $bip   = getenv("REMOTE_ADDR");
	  } 



     	  $bcliente = getenv("HTTP_USER_AGENT");
 
if(isset($_SERVER["HTTP_REFERER"]) &&  !empty($_SERVER["HTTP_REFERER"])) {
	$referer = $_SERVER["HTTP_REFERER"];  
	} else {
	$referer = "http://www.comermas.com.ar";
	}


	   	$fecha = datear("m/d/Y"); 	
		$hora = datear("H:i:s"); 	

 
// Declaro los RS
$sql = "insert INTO baseupg(nombre,telefono,direccion,barrio,localidad,detalles2,detalles1,clase,encnombre,enctelefono,encemail,recibeinfo, fecha,hora,cliente,ip)values('$nombre','$telefono','$direccion','$barrio','$ciudad','$especialidad','$presentacion','$clase','$encnombre','$enctelefono','$encemail','$recibeinfo','$fecha','$hora','$bcliente','$bip')";
mysql_query($sql) or die (mysql_error()); 
$msgregplace = "si"; 
  


} else { 

// Declaro los RS

$sqlbarrios = "Select barrios from barrios Order by barrios";
$sqltipos = "Select tipos from tipos";
$sqlciudad = "SELECT * FROM ciudades order by marca DESC, ciudad";
$sqlclase = "Select clase from clases";

$rsbarrios= @mysql_query($sqlbarrios) or die (mysql_error()."1"); 
$rsciudad = @mysql_query($sqlciudad) or die (mysql_error()."2"); 
$rstipos= @mysql_query($sqltipos) or die (mysql_error()."3"); 
$rsclase= @mysql_query($sqlclase) or die (mysql_error()."4"); 
}

?>

<html>
<head>
<META name="keywords" content="tenedores libres, restaurants, bares, parrillas, heladerias, pizzerias, marisquerias, cafes, panaderias, vinerias">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all,index,follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>ComerMas.com.ar - Registra tu lugar gratis</title>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
<SCRIPT language="javascript1.2" TYPE="text/javascript" SRC="../includes/ajax.js" ></SCRIPT>
<script language="JavaScript">
<!--
  
function FaltanDatos(){
	var error = '';

	if(window.document.FRM_ADD.nombre.value.length < 1) 
		error = error + 'Debe ingresar un nombre. \n'; 
    if(window.document.FRM_ADD.direccion.value.length < 1) 
 		error = error + 'Debe ingresar una direccion. \n'; 
    if(window.document.FRM_ADD.telefono.value.length < 1)  
 		error = error + 'Debe ingresar un Telefono. \n'; 
 	if(window.document.FRM_ADD.presentacion.value.length < 1) 
  		error = error + 'Debe ingresar presentacion o descripcion. \n'; 
	if(window.document.FRM_ADD.encnombre.value.length < 1) 
  		error = error + 'Debe ingresar Nombre del encargado responsable. \n'; 
	if(window.document.FRM_ADD.enctelefono.value.length < 1) 
  		error = error + 'Debe ingresar Telefono del encargado responsable. \n'; 
	//if(window.document.FRM_ADD.EncEmail.value.length < 1) 
    //	error = error + 'Debe ingresar Email del encargado responsable. \n'; 
 	if (error!='')
		alert(error);
	else
		{
 		window.document.FRM_ADD.submit();		
		}
	}
 
 	function ShowOtraEspecialidad(especialidad){
		if (especialidad == "Escriba otra clase -->")
			{	
		    document.FRM_ADD.otraespecialidad.style.visibility="visible";
			document.FRM_ADD.otraespecialidad.focus()
			}
			else
			{
			document.FRM_ADD.otraespecialidad.style.visibility="hidden"
			document.FRM_ADD.otraespecialidad.value="";
			}
	 }
	 
	  	function Showsucbarrio(barrios){
		if (barrios == "(sucursales)... barrios -->")
			{	
		    document.FRM_ADD.sucbarrio.style.visibility="visible";
			document.FRM_ADD.sucbarrio.focus()
			}
			else
			{
			document.FRM_ADD.sucbarrio.style.visibility="hidden"
			document.FRM_ADD.sucbarrio.value="";
			}
	 }
	 
	 	function Showsucciudad(ciudad){
		if (((ciudad=="otra1" )||(ciudad=="otra2")))
			{	
		    document.FRM_ADD.succiudad.style.visibility="visible";
			document.FRM_ADD.succiudad.focus();
			}
			else
			{
			document.FRM_ADD.succiudad.style.visibility="hidden";
			document.FRM_ADD.succiudad.value="";
			}	
		if (ciudad=="Capital Federal")
			{
			document.FRM_ADD.barrio.disabled=false;
			}
			else
			{
			document.FRM_ADD.sucbarrio.style.visibility="hidden";
			document.FRM_ADD.sucbarrio.value="";
			document.FRM_ADD.barrio.disabled=true;
			}
	 }

 	function ShowOtroHorario(Horarios){
		if (Horarios == "Escriba sus horarios -->")
			{	
		    document.FRM_ADD.otrohorario.style.visibility="visible";
			document.FRM_ADD.otrohorario.value="De Lunes a Domingos de 12hs a 1hs" 
			document.FRM_ADD.otrohorario.focus()
			document.FRM_ADD.otrohorario.select()
			}
			else
			{
			document.FRM_ADD.otrohorario.style.visibility="hidden"
			document.FRM_ADD.otrohorario.value="";
			}
	 }

 	function ShowEstacionamiento(Estacionamiento){
		if (Estacionamiento == "Especifique -->")
			{	
		    document.FRM_ADD.espestacionamiento.style.visibility="visible";
			document.FRM_ADD.espestacionamiento.value="Especifique aqui los descuentos." 
			document.FRM_ADD.espestacionamiento.select()			
			document.FRM_ADD.espestacionamiento.focus()
			
			}
			else
			{
			document.FRM_ADD.espestacionamiento.style.visibility="hidden"
			document.FRM_ADD.espestacionamiento.value="";
			}
	 }

	 	function ShowComidas(especialidad){
		var strsep
		if (especialidad != "que ofrece?...")
			{	
		    document.FRM_ADD.comidas.style.visibility="visible";
            document.FRM_ADD.comidas.focus();
			strsep = ' / '; 
			if (document.FRM_ADD.comidas.value =="") { 
			strsep = ''; 
			}
			
			document.FRM_ADD.comidas.value= document.FRM_ADD.comidas.value + strsep +  window.document.FRM_ADD.detalles2.value 
			//document.FRM_ADD.Comidas.select();
			
			}
			else
			{
			document.FRM_ADD.comidas.style.visibility="hidden"
			document.FRM_ADD.comidas.value='';
			}
	 }
// -->
</script>
 
</head>
<body bgcolor="ae5959" leftmargin="0" topmargin="0" onLoad="cargaContenidoSelect('../includes/select_proceso.php')">
           <FORM style="margin:0px;padding:0px;" name="FRM_ADD" onsubmit="javascript:if (!FaltanDatos()){return false}"  
        method=post action=regplace.php>
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ae5959">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td width="779" height="90"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="90" background="../<?=$_SESSION["bannertop"] ?>" bgcolor="ae5959">&nbsp;</td>
              </tr>
              <tr>
                <td width="777" bgcolor="#FFFFFF"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="777" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="AE5959">
        <tr> 
          <td width="20">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="right"> 
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="document.FRM_ADD.action='../index.php';document.FRM_ADD.submit();"><font color="#FFFFFF"><strong>Volver</strong></button>
              </div></td>
            </tr>
            <tr>
              <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td height="1"><img src="../botones/blancogris.gif" width="100%" height="1"></td>
            </tr>
            <tr>
              <td class="BlancoBold14"> <i>  </i>             <div align="center">
                <table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td>
                      <? if ($msgregplace == "si") {?>
                      <h2 align="center"> <br>
                          <br>
                          <span class="Blanco16">Sus datos han sido enviados a </span><span class="TitulosTime">ComerMas</span></h2>
                      <div align="center">
			<span class="Blanco14">se vera publicado de la siguiente manera </span><br>
                        <br>
                        <table border="0" cellpadding="0" height="77" cellspacing="0">
                          <tr>
                            <td width="29" valign="bottom" bordercolor="#000000">&nbsp;</td>
                            <td height="19" colspan="4" valign="bottom" bordercolor="#000000"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                            <td width="29" bordercolor="#000000">&nbsp;</td>
                          </tr>
                          <center>
                            <tr>
                              <td width="29" height="20">&nbsp;</td>
                              <td width="166" bordercolor="#FFFFFF" bgcolor="#851549" class="BlancoBold12">
                                <div align="left"> NOMBRE</div></td>
                              <td width="174" bordercolor="#FFFFFF" bgcolor="#851549" class="BlancoBold12">
                                <div align="left"> DIRECCION </div></td>
                              <td width="171" bordercolor="#FFFFFF" bgcolor="#851549" class="BlancoBold12">
                                <div align="left"> BARRIO </div></td>
                              <td width="134" bordercolor="#FFFFFF" bgcolor="#851549" class="BlancoBold12">
                                <div align="left"> TELEFONO(s) </div></td>
                              <td width="29" height="19"></td>
                            </tr>
                          </center>
                          <tr>
                            <td width="29" height="10"></td>
                            <td class="Naranja14">
                              <?=$nombre ?></td>
                            <td class="Blanco14">
                              <?=$direccion ?>
                            </td>
                            <td class="Blanco14">
                              <?=$barrio ?>
                            </td>
                            <td class="Blanco14"> <strong>
                              <?=$telefono ?>
                            </strong> </td>
                            <td width="29" height="7"></td>
                          </tr>
                          <tr>
                            <td valign="top">&nbsp;</td>
                            <td height="9" colspan="4" valign="top"><img src="../botones/blancogris.gif" width="100%" height="2"> </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top"  width="29">&nbsp;</td>
                            <td width="166" height="9">&nbsp;</td>
                            <td width="174" height="9">&nbsp;</td>
                            <td width="171" height="9">&nbsp;</td>
                            <td width="134"></td>
                            <td width="29">&nbsp;</td>
                          </tr>
                        </table>
                        <br>
                        <br>
                        <span class="Blanco14">Nota :Recuerde que los datos seran previamente chequeados, <br>
        por lo que seran publicados a la brevedad </span></div>
                      <p align="center"></p>
                      <? } 
if ($msgregplace == "no") {?>
           
                        <br>
                        <table style="margin:0px;padding:0px;" width="90%" height="513" border="0" align="center" cellpadding="0" cellspacing="0" name="tablaiz">
                          <tr>
                            <td height="36" valign="middle" bgcolor="#851549">
                              <div align="left">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="95%" height="24">
                                      <div align="right" class="BlancoBold12"><b>DATOS DEL LOCAL</b></div></td>
                                    <td width="20">&nbsp;</td>
                                  </tr>
                                </table>
                                <b></b></div></td>
                          </tr>
                          <tr valign="top">
                            <td>
                              <div align="right">
                                <table width="100%" height="430" border="0" align="center" cellpadding="1" cellspacing="0">
                                  <tr valign="top">
                                    <td height="12" colspan="2"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                                  </tr>
                                  <tr bgcolor="#B36464" class="Blanco12">
                                    <td width="36%"><div align="right">Nombre Comercio :</div></td>
                                    <td width="64%"><input name="nombre" type="TEXT" id="nombre" style="margin:0px;padding:0px;width:200px;font-size:8pt;" maxlength="100"></td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td><div align="right">Direccion :</div></td>
                                    <td>
                                      <input name="direccion" type="TEXT" id="direccion" style="margin:0px;padding:0px;width:200px;font-size:8pt;" maxlength="100">
                                    </td>
                                  </tr>
                                  <tr bgcolor="#B36464" class="Blanco12">
                                    <td><div align="right">Telefono(s) :</div></td>
                                    <td><input name="telefono" type="TEXT" id="telefono" style="width: 200px;font-size:8pt;" maxlength="100"></td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td><div align="right">Localidad : </div></td>
                                    <td>
                                      <select name="op_lugares" id="op_lugares" style="width: 160px;font-size:8pt;" onChange="Showsucciudad(window.document.FRM_ADD.localidad.value);cargaContenidoSelect('../includes/select_proceso.php')">
                                       <!--   <option value="Capital Federal" selected>CAPITAL FEDERAL</option> -->
									    <?
	while($row = @mysql_fetch_array($rsciudad))
	{
		echo "<option value='".$row[0]."'>". strtoupper($row[1])."</option>";
	} ?>
                                        <option value="otra1">Otra... --></option>
                                      </select>
                                      <input name="succiudad" type="text" style="width=255px;font-size:8pt;visibility:hidden" maxlength="80"></td>
                                  </tr>
                                  <tr bgcolor="#B36464" class="Blanco12">
                                    <td height="20"><div align="right">Barrio :</div></td>
                                    <td><select name="op_barrios" id="op_barrios" style="width: 160px;font-size:8pt;" onChange="Showsucbarrio(window.document.FRM_ADD.barrio.value);">
   <!--                                      <? while ($row = @mysql_fetch_array($rsbarrios)) { ?>
                                        <option value="<?=$row["barrios"];?>">
                                        <?=strtoupper($row["barrios"]);?>
                                        </option>
                                        <? } ?> -->
																				
                                   <!--      <option selected value="Recoleta">RECOLETA</option> -->
                                        <option value="(sucursales)... barrios -->">Otra --></option>
                                      
																			</select>
                                        <input name="sucbarrio" type="text" style="width=255px;font-size:8pt;visibility:hidden" maxlength="80"></td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr bgcolor="#B36464" class="Blanco12">
                                    <td height="20">
                                      <div align="right">Clase de Lugar:</div></td>
                                    <td>
                                      <select name="selclase" style="width:160px;font-size:8pt;">
                                        <? while ($row = @mysql_fetch_array($rsclase)) { ?>
                                        <option value="<?=$row["clase"];?>" >
                                        <?=$row["clase"];?>
                                        </option>
                                        <? }?>
                                    </select></td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td><div align="right">Elija las comidas/cocina : </div></td>
                                    <td valign="middle"><select type="text" name="detalles2" onChange="ShowComidas(window.document.FRM_ADD.detalles2.value);" style="width:160px;font-size:8pt;">
                                      <option value="Que ofrece?...">Que ofrece...</option>
                                      <? while ($row = @mysql_fetch_array($rstipos)) { ?>
                                      <option value="<?=$row["tipos"];?>">
                                      <?=$row["tipos"];?>
                                      </option>
                                      <? }?>
                                    </select>
                                                                         </td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td height="60"><div align="right">o escriba cuadro <br>
  utilizando separadores <br>
  <span class="Blanco12">ej. Carnes / Pescado / Pastas:</span></div></td>
                                    <td><textarea name="comidas" cols="95" id="textarea" style="width=400px;font-size:8pt;visibility"></textarea></td>
                                  </tr>
                                  <tr bgcolor="#B36464" class="Blanco12">
                                    <td><div align="right">Presentacion/Descripcion :</div></td>
                                    <td>
                                      <textarea name="presentacion" cols=120 rows=6 id="presentacion" style="width: 400px;font-size:8pt;" onClick="document.FRM_ADD.Presentacion.select();">
Escriba aqui su presentacion y breve descripcion de su local, por ej. "Las mejores carnes desde 1967, romantica vista al rio"</textarea></td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td><div align="right">Delivery :</div></td>
                                    <td><select name="delivery" id="delivery" style="width:50px;font-size:8pt">
                                        <option  value="SI "selected>Si</option>
                                        <option value="NO ">No</option>
                                    </select></td>
                                  </tr>
                                  <tr bgcolor="#B36464" class="Blanco12">
                                    <td height="21">
                                      <div align="right">Costo promedio por persona:</div></td>
                                    <td><select name="costo" id="select2" style="width: 100px;font-size:8pt;">
                                      <option value="Menos de $5">Menos de $5</option>
                                      <option value="$5">$5</option>
                                      <option value="$5" selected>$10</option>
                                      <option value="$15">$15</option>
                                      <option value="$25">$20</option>
                                      <option value="$30">$30</option>
                                      <option value="$50">$50</option>
						<option value="$70">$70</option>
						<option value="$80">$80</option>
                                      <option value="Mas de $80">Mas de $80</option>
                                      <option value="No especificar">No especificar</option>
                                    </select></td>
                                  </tr>
                                  <tr bgcolor="#AE5959" class="Blanco12">
                                    <td><div align="right">Abierto :</div></td>
                                    <td>                                        <strong>
                                      <select name="abierto" id="select" style="width: 135px;font-size:8pt;" onChange="ShowOtroHorario(window.document.FRM_ADD.abierto.value)">
                                        <option value="Todo el dia" selected>Todo el dia</option>
                                        <option value="Durante la noche">Durante la noche</option>
                                        <option value="Durante el dia">Durante el dia</option>
                                        <option value="Las 24hs">Las 24hs</option>
                                        <option value="Escriba sus horarios -->">Escriba sus horarios --></option>
                                      </select>
                                      <input name="otrohorario" type="text" style="width=240px;font-size:8pt;visibility:hidden" maxlength="255">
                                    </strong></td>
                                  </tr>
                                  <tr bgcolor="#B36464" class="Blanco12">
                                    <td><div align="right">Estacionamiento : </div></td>
                                    <td><strong>
                                      <select name="estacionamiento" style="width: 135px;font-size:8pt;" onChange="ShowEstacionamiento(window.document.FRM_ADD.estacionamiento.value)">
                                        <option value="Si">Si</option>
                                        <option value="No" selected>No</option>
                                        <option value="Especifique -->">Descuentos --></option>
                                      </select>
                                      <input style="width:240px;font-size:8pt;visibility:hidden" maxlength="255" name="espestacionamiento">
</strong> </td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;                                      </td>
                                  </tr>
                                  <tr>
                                    <td height="15" colspan="2" bgcolor="#851549"><div align="right">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="95%" height="35">
                                              <div align="right" class="BlancoBold12"> DATOS DEL ENCARGADO O REPRESENTANTE DEL LUGAR<br>
                                                          <span class="Blanco10">(Estos datos no seran publicados)</span></div></td>
                                            <td width="20">&nbsp;</td>
                                          </tr>
                                        </table>
                                    </div></td>
                                  </tr>
                                  <tr valign="top">
                                    <td colspan="2"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                                  </tr>
                                  <tr class="Blanco12">
                                    <td align="right">Nombre y Apellido :</td>
                                    <td><input name="encnombre" type="TEXT" id="EncNombre3" style="width: 160px;font-size:8pt;"></td>
                                  </tr>
                                  <tr class="Blanco12">
                                    <td align="right">Telefono :</td>
                                    <td><input name="enctelefono" type="TEXT" id="enctelefono" style="width: 160px;font-size:8pt;"></td>
                                  </tr>
                                  <tr class="Blanco12">
                                    <td height="10" align="right">E-Mail :</td>
                                    <td>
                                      <div align="left">
                                        <input name="encemail" type="TEXT" id="encemail" style="width: 160px;font-size:8pt;">
                                        Deseo recibir informacion:
                                        <input name="recibeinfo" type="checkbox">
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td height="2" colspan="2" align="right"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                                  </tr>
                                  <tr valign="top">
                                    <td height="21" colspan="2" align="right">
                                      <input name="Submit" type="submit" class=formButton id=Submit6 value="Agregar" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">
                                      <input name="RESET" type="RESET" value="Borrar" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"></td>
                                  </tr>
                                  <tr>
                                    <td height="9" colspan="2" align="right">&nbsp;</td>
                                  </tr>
                                </table>
                            </div></td>
                          </tr>
                        </table>
                        <p>&nbsp;</p>
                  
                      <? }?>
                      <div align="right"><br>
                          <br>
                          <img src="../banners/logo.gif" width="352" height="86"></div></td>
                  </tr>
                </table> 
                </div> </td>
            </tr>
          </table></td>
          <td width="20" height="400" align="right"></td>
        </tr>
      </table>
      <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="2"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="24"><? require_once('../includes/bot.php')?></td>
        </tr>
        <tr> 
          <td height="1"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>


    </form>

</body>

</html>



