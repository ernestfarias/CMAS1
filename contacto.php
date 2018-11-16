<?  session_start(); 
//	$_SESSION['validar'] ='si';

 //if(isset($_SESSION["validar"]) && !empty($_SESSION["validar"])) {
$come ="";
$consulta ="";
$para="info@comermas.com.ar";
 require_once('includes/validador.php'); 
 
	
	
 
 $id="comermas.com.ar";
 $idr ="2876";
if(isset($_GET["consulta"]) && !empty($_GET["consulta"])){
 	
require_once('includes/catalog.php');		
ValidarDatos(  ($_GET["consulta"]));
	 $id =$_GET["consulta"];
	  $sql = "SELECT *FROM base LEFT JOIN  encargados ON base.id = encargados.nombrelugar WHERE base.id='$id'";
   	  $qry= @mysql_query($sql) or die  (mysql_error()."1"); 
	 // $totalrecords = @mysql_num_rows($qrys); 
	 $rs = mysql_fetch_Array($qry);
	 $id = $rs['nombre'] ;
 
	//if(isset($rs['encreservas']) && !empty($rs['encreservas'])) $para = $rs['encreservas'];
	
    $idr = $rs[0] ;
 

	//$consulta = "Solicitud de recervas en ". $id;
		
	
	}
	
if(isset($_POST["email"]) && !empty($_POST["email"])){

 	ValidarDatos(addslashes($_POST["nombres"]));
 	ValidarDatos(addslashes($_POST["tel"]));
 	ValidarDatos(addslashes($_POST["consulta"]));
	ValidarDatos(addslashes($_POST["email"]));
	ValidarDatos(addslashes($_POST["tipo"]));


 	$nombres = (addslashes($_POST["nombres"]));
 	$tel = (addslashes($_POST["tel"]));
 	$co = (addslashes($_POST["consulta"]));
	$email = (addslashes($_POST["email"]));
	$tipo = (addslashes($_POST["tipo"]));
	$fecha = date('Y-m-d');
	$hora = date('H:i:s');

	if ($tipo =="R") $tipom = "RESERVA";
	if ($tipo=="C") $tipom = "CONSULTA";

	require_once('includes/catalog.php'); 
	$users_query =  "INSERT INTO `reservas` ( `id_base` , `nombre` , `telefono` , `correo` , `detalles` , `tipo` , `fecha` , `hora`) VALUES ('$idr', '$nombres', '$tel', '$email', '$co', '$tipo', '$fecha', '$hora')";
	mysql_query($users_query) or die (mysql_error()."UPDATE"); 
	$come = "Su formulario ha sido enviado con éxito. gracias"	;
	$de = $email;
	$asunto="Informacion";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	$cuerpo1 = "<html><b>Lugar : <b>".$id. "<br><b>Nombre : </b>".$nombres. "<br>Telefono : </b>".$tel."<br><b>Email : </b>".$email."<br><b>Tipo : </b>".$tipom ."<br><br><i>" .$co."</i></html>"; 
    $cuerpo = "<html><b>".$id. "</b><br> Ud tiene Consultas o Reservas en su buzón en comermas.com.ar<br> para ingresar a <a href='http://www.comermas.com.ar/manager'>http://www.comermas.com.ar/manager</a> y utilice su usuario y contraseña.</html>"; 
	
	mail("info@comermas.com.ar","$asunto",$cuerpo1,$headers."From: ".$de); // mail para nosotros 
	mail("$para","$asunto",$cuerpo,$headers."From: "."info@comermas.com.ar"); // mail de nosotros para el lugar indicando que tiene reservas o consultas.


} else {

require_once('includes/catalog.php'); 
 	$sqlvoto = "UPDATE contadores SET cantidad = cantidad +1 WHERE nombre='contacto'";
	mysql_query($sqlvoto) or die(mysql_error()); 

}
//}
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
  <SCRIPT language=JavaScript>
<!--
	 
function validateEmail(emailAddress) {
	var match = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/.test(emailAddress);
	return match;
}
  
 
	function Verificador(){
	var error = '';



	if (window.document.form1.consulta.value.length == 0)
		error = error + 'Especificar Consulta\n'; 

 	if (window.document.form1.email.value.length == 0)
		error = error + 'Especificar Email \n'; 

	if (!validateEmail(document.form1.email.value))
	  error = error + 'Email Incorrecto \n'; 

				 
	if (error!='')
		alert(error);
	else
		{
 
	window.form1.submit();		
		}
	}
//-->
</SCRIPT>
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
      <table width="777" height="19" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="AE5959">
        <tr> 
          <td width="20">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="right">  
                  <button style="font-size:8pt;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="history.back()"><font color="#FFFFFF"><strong>Volver</strong></font></button>
    </div></td>
            </tr>
            <tr>
              <td><img src="botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td height="1"></td>
            </tr>
          </table>            
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="18" bgcolor="#851549"></td>
              <td width="704" bgcolor="#851549" class="TitulosTime">FORMULARIO DE CONTACTO</td>
              <td width="15" height="30" bgcolor="#851549">&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="145">
                <p align="right">&nbsp;</p></td>
              <td height="145" align="right"  class="Blanco16">
                <div align="left">
                            <form name = "form1" method="POST" action="contacto.php?consulta=<?=$idr?>" onSubmit="">
		   <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                      <TR>
                        <TD height="30">                          <div align="center"><span class="Blanco12"><?=$come?>
                        </span>&nbsp; </div>                      </TD>  </TR>
                      <TR>
                        <TD style="HEIGHT: 14px;" #invalid_attr_id="#CCCCCC 1px solid"><div align="center">
                  
                              <div align="center">
                                
                                 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber4">
                                    <tr bgcolor="#AE5959" class="Blanco16">
                                      <td colspan="2" class="Blanco14"><p>ATENCION!!!: Este formulario ser&aacute; enviado a: <b><i>
                                        <?=$id?>
                                        </i></b> en caso de necesitar hacer una consulta a otro lugar, o bien este no es el que Ud. desea tenga la molestia de realizar una nueva desde los detalles del lugar requerido. Los mismos se acceden haciendo click en sus respectivos nombres en el resultado de la lista de b&uacute;squedas desde la hoja principal. </p>
                                        <p>Presione <a href=#  onClick="window.location='http://www.comermas.com.ar'">aqui</a> para volver a realizar la b&uacute;squeda.<br>
                                            <br>
                                            <? if ($idr =='2876') { ?>
                                        ACLARACI&Oacute;N: Las consultas enviadas a comermas.com.ar son solo referidas a comentarios sugerencias y preguntas relacionadas a la gu&iacute;a de lugares.</p>
<? }?>    
</td>                                 
 </tr>
                                    <tr bgcolor="#B36464" class="Blanco16">
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr bgcolor="#B36464" class="Blanco16">
                                      <td width="262">
                                        <div align="right">Nombres :</div></td>
                                      <td width="442">
                                        <input name="nombres" type="text" id="nombres" size="50" maxlength="50">
                                      </td>
                                    </tr>
                                    <tr class="Blanco16">
                                      <td width="262" height="10">
                                        <div align="right">Tel&eacute;fono : </div></td>
                                      <td width="442" height="10">
                                        <input name="tel" type="text" id="tel2" size="20"></td>
                                    </tr>
                                  
								    <tr bgcolor="#B36464" class="Blanco16">
                                      <td width="262">
                                        <div align="right">e-mail : </div></td>
                                      <td width="442"> 
                                        <input name="email" type="text" size="50" maxlength="50">                                
                                      </td>
                                    </tr>
									
									 <tr>
									  <td width="262" height="22"> 
                                        <div align="right">Tipo  : </div></td>
                                      <td width="442" > <select name="tipo" id="select2">
                                                          <option value="C" selected>Consulta</option>
                                                      </select> 
									  
                                     </td>
									 

 
                                    </tr>
                                    <tr bgcolor="#B36464" class="Blanco16">
                                      <td height="25" colspan="2" align="right">
                                        <div align="center">Detalle aqu&iacute; su pregunta. </div></td>
                                    </tr>
                                    <tr class="Estilo22">
                                      <td width="262" align="right">&nbsp; </td>
                                      <td width="442">&nbsp; </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><div align="center">
                                        <textarea name="consulta"  rows="10" id="textarea2" style="width:400px ">
                                      </textarea>
                                      </div></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><div align="center">&nbsp;
                                      </div></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><img src="botones/blancogris.gif" width="100%" height="2"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">
                                        <p align="right">
                                          <input type="button" name="Button" value="Enviar" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549" onClick="javascript:if (!Verificador()){return false};">
                                          <input type="reset" value="Restablecer" name="B2" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549">                                        
                                        </td>
                                    </tr>
									
									
									
									
									
									
                         
                                  </table>
                            
                              </div>
                              <p align="center">&nbsp;</p>
                            
                            </div></TD>
                      </TR>
                    </TBODY>
                  </TABLE></form>
               
              </div></td>
              <td width="15" height="145" >&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="28">
                <div align="right"> </div></td>
              <td height="28" align="right"> <img src="banners/logo.gif" width="352" height="86"> </td>
              <td width="15" height="30">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="right"></td>
            </tr>
          </table>          </td>
          <td width="20" height="19" align="right"></td>
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
