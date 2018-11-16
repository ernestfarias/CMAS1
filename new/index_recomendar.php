<?
$msg = "";
if(isset($_GET["id"]) && !empty($_GET["id"])){
$id = $_GET["id"];
}


if(isset($_POST["mail1"]) && !empty($_POST["mail1"])){
if(isset($_GET["id"]) && !empty($_GET["id"])){
$id = $_GET["id"];

} require_once('includes/validador.php'); 

	ValidarDatos(addslashes($_POST["user1"]));
 	ValidarDatos(addslashes($_POST["mail1"]));
 	ValidarDatos(addslashes($_POST["user2"]));
	ValidarDatos(addslashes($_POST["mail2"]));
	ValidarDatos(addslashes($_POST["co"]));

 	$paran = addslashes($_POST["user1"]);
 	$para = addslashes($_POST["mail1"]);
 	$den = addslashes($_POST["user2"]);
 	$de = addslashes($_POST["mail2"]);
 $co = addslashes($_POST["co"]);
	


$de = $de ;
$para=$para ; 
$asunto= $den . " te recomienda un lugar de comermas.com.ar";


$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

 $fecha = date('Y-m-d');
	$hora = date('H:i:s');

 
$cuerpo = $paran .", <b>".$den ."</b> te recomiendo esta pagina: <a href='http://www.comermas.com.ar/detalles.php?id=".$id. "' target='_blank'>www.comermas.com.ar</a> - La Guia más completa y facil de usar -<br><br><br>".$den. " te dejo este comentario: <i>".$co."</i><br><br><br>Gracias por utilizar www.comermas.com.ar"; 

mail("$para","$asunto",$cuerpo,$headers."From: ".$de);
$msg = "Se ha enviado su recomendacion correctamente.";

require_once('includes/catalog.php');
		 $users_query2 = "INSERT INTO `recomendados` (`fecha` , `hora` , `id_base` , `para` , `paramail` , `de` , `demail`, `comentario` ) VALUES ('$fecha', '$hora', '$id', '$paran', '$para', '$den', '$de','$co');";
 		 $users_display2 = @mysql_query($users_query2.$users_limit) or die ("ERROR: The query failed.1"); 
		 $totalrecords2 = @mysql_num_rows($users_display2); 


}



require_once('includes/catalog.php');
		 $users_query2 = "SELECT * FROM base WHERE  id = '$id' order by id";
 		 $users_display2 = @mysql_query($users_query2.$users_limit) or die ("ERROR: The query failed.1"); 
		 $totalrecords2 = @mysql_num_rows($users_display2); 
		
 	$row = @mysql_fetch_array($users_display2);
    $id =  $row["id"]; 	 
	$nombre = ucwords(strtolower($row["nombre"]));   
?>



<html>
<head>
<title>Comermas - Recomendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/2003/style/cm.css" rel="stylesheet" type="text/css">

<SCRIPT language="javascript" type="text/javascript">
<!--

function validate(){
//shorten the reference to emailAddrs 
user1=document.form1.user1
user2=document.form1.user2
mail1=document.form1.mail1
mail2=document.form1.mail2

	//if the emailAddrs is empty
	if(user1.value == ""){ 
		alert("Se debe ingresar el nombre del destinatario.") 
		user1.focus()
		return false
	//if the emailAddrs does not contain the @ symbol
	 }else if(mail1.value == ""){ 
		alert("Se debe ingresar una dirección de Email.") 
		mail1.focus()
		return false
	//if the emailAddrs does not contain the @ symbol
	 } else if(mail1.value.indexOf('@')== -1){
		alert("La Dirección de Email ingresada no contiene el símbolo @.") 
		mail1.focus()
		return false	
	//if the emailAddrs does not contain a full stop
	}else if(mail1.value.indexOf('.')== -1){
		alert("La Dirección de Email ingresada no es válida.") 
		mail1.focus()
		return false
	}else if(user2.value == ""){ 
		alert("Se debe ingresar el nombre del remitente.") 
		user2.focus()
		return false
	//if the emailAddrs does not contain the @ symbol
	 }else if(mail2.value == ""){ 
		alert("Se debe ingresar una dirección de Email.") 
		mail2.focus()
		return false
	//if the emailAddrs does not contain the @ symbol
	 } else if(mail2.value.indexOf('@')== -1){
		alert("La Dirección de Email ingresada no contiene el símbolo @.") 
		mail2.focus()
		return false	
	//if the emailAddrs does not contain a full stop
	}else if(mail2.value.indexOf('.')== -1){
		alert("La Dirección de Email ingresada no es válida.") 
		mail2.focus()
		return false
	}  
	
	
	
	//if the emailAddrs passes the above conditions
	//allow submission
	 return true
 } 
//-->
</SCRIPT>
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
 
</head>

<body>

<table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#AE5959">
  <tr>
    <td height="58" bgcolor="#851549" class="Estilo5"><div align="center"><span class="Estilo6 Estilo3"><b><font size="2">Recomendar <i><?=$nombre?></i> a un Amigo</font></b>
    </span> </div>      
    <div align="right"> </div>      <div align="right">      </div> </td>
  </tr>
  <tr>
    <td height="218" class=eListaSeparador><span class="Estilo6"> </span>
        <div align="right">
          <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
            <form name="form1" method="post" action="recomendar.php?id=<? echo $id?>" onSubmit="return validate()">
              <tr bgcolor="#AE5959"  >
                <td colspan="2" class="Blanco14" ><img src="botones/blancogris.gif" width="100%" height="2"></td>
              </tr>
              <tr bgcolor="#AE5959"  >
                <td width="50%" class="Blanco14" >
                <div align="right">Nombre de tu amigo:</div></td>
                <td width="287" >
                  <input name="user1" type="text" id="user1" size="30" maxlength="50">
                </td>
              </tr>
              <tr bgcolor="#B36464">
                <td class="Blanco14">
                  <div align="right" class="Estilo3">
                    <div align="right">Direcci&oacute;n de Email de tu amigo:&nbsp;</div>
                </div></td>
                <td>
                  <input name="mail1" type="text" id="mail1" size="30" maxlength="50"></td>
              </tr>
              <tr bgcolor="#AE5959">
                <td class="Blanco14" >
                  <div align="right" class="Estilo3">Tu Nombre:&nbsp;</div></td>
                <td >
                  <input name="user2" type="text" id="user2" size="30" maxlength="50"></td>
              </tr>
              <tr bgcolor="#B36464">
                <td class="Blanco14">
                  <div align="right" class="Estilo3">Tu direcci&oacute;n de Email:&nbsp;</div></td>
                <td>
                  <input name="mail2" type="text" id="mail2" size="30" maxlength="50">
                </td>
              </tr>
              <tr bgcolor="#AE5959" >
                <td class="Blanco14" >&nbsp;</td>
                <td >&nbsp;</td>
              </tr>
              <tr bgcolor="#B36464" >
                <td class="Blanco14" ><div align="right">Comentario</div></td>
                <td ><textarea name="co" cols="40" id="co"></textarea></td>
              </tr>
              <tr >
                <td >&nbsp;</td>
                <td >&nbsp;</td>
              </tr>
              <tr >
                <td colspan="2" >                  <div align="center" class="BlancoBold12">	
                  <?=$msg?>
</div>
                  <div align="center"></div>
                <div align="center"></div></td>
              </tr>
              <tr >
                <td ><div align="right">                  </div>
                <div align="right"></div></td>
                <td ><input type="submit" name="Submit" value="Enviar"></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2">
                  <div align="center">
                    <input name="id" type="hidden" id="id" value="676">                  
                </div></td>
              </tr>
              <tr bgcolor="#B36464">
                <td colspan="2"><div align="center"><font size="1">Complet&aacute; los Datos para enviarle un email a un amigo recomendando el lugar.</font></div></td>
              </tr>
            </form>
          </table>
          <br>
      </div></td>
  </tr>
</table>
<br>
</body>
</html>

