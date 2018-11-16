
<?  session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate");
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
	 $id =$_GET["consulta"];
	  $sql = "SELECT *FROM base LEFT JOIN  encargados ON base.id = encargados.nombrelugar WHERE base.id='$id'";
   	  $qry= @mysql_query($sql) or die  (mysql_error()."1"); 
	 // $totalrecords = @mysql_num_rows($qrys); 
	 $rs = mysql_fetch_Array($qry);
	 $id = $rs['nombre'] ;
	 
    // habilitar la siguiente para que le envie el mail a los encagardos
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

 
                                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber4">
                                    <tr class="Blanco16">
                                      <td colspan="2" class="Blanco14"><p><br>
                                        ATENCION!!!: Este formulario ser&aacute; enviado a: <b><i>
                                          <?=$id?>
                                        </i></b> en caso de necesitar hacer una consulta a otro lugar, o bien este no es el que Ud. desea tenga la molestia de realizar una nueva desde los detalles del lugar requerido. Los mismos se acceden haciendo click en sus respectivos nombres en el resultado de la lista de b&uacute;squedas desde la hoja principal. </p>
                                          <p>Presione <a href=#  onClick="window.location='http://www.comermas.com.ar'">aqui</a> para volver a realizar la b&uacute;squeda.<br>
                                              <br>
                                              <? if ($idr =='2876') { ?>
        ACLARACI&Oacute;N: Las consultas enviadas a comermas.com.ar son solo referidas a comentarios sugerencias y preguntas relacionadas a la gu&iacute;a de lugares.</p></td>
                                      <? }?>
                                    </tr>
                                    <tr class="Blanco16">
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr class="Blanco16">
                                      <td width="262">
                                        <p align="right" style="margin-left: 10; margin-right: 10;">Nombres :</td>
                                      <td width="442">
                                        <input name="nombres" type="text" id="nombres" size="50" maxlength="50">
                                      </td>
                                    </tr>
                                    <tr class="Blanco16">
                                      <td width="262" height="10">
                                        <p align="right" style="margin-left: 10; margin-right: 10;">Tel&eacute;fono :  </td>
                                      <td width="442" height="10">
                                        <input name="tel" type="text" id="tel2" size="20"></td>
                                    </tr>
                                    <tr class="Blanco16">
                                      <td width="262">
                                      <p align="right" style="margin-left: 10; margin-right: 10;"><b>e-mail : </b></td>
                                      <td width="442"><strong>
                                        <input name="email" type="text" size="50" maxlength="50">
                                      </strong> </td>
                                    </tr>
                                    <tr class="Blanco16">
                                      <td width="262" height="22">
                                        <p align="right" style="margin-left: 10; margin-right: 10;"> Tipo <b> : </b></td>
                                      <td width="442" height="22">
                                        <select name="tipo" id="tipo">
                                          <option value="C" selected>Consulta</option>
                                      </select></td>
                                    </tr>
                                    <tr class="Blanco16">
                                      <td height="25" colspan="2" align="right">
                                        <p align="center" class="Negro10px"> Detalle aqu&iacute; su pregunta. </td>
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
                                      <td colspan="2"><div align="center">&nbsp; </div></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><img src="botones/blancogris.gif" width="100%" height="2"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">
                                        <p align="right">
                                          <input type="button" name="Button" value="Enviar" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#B15759" onClick="javascript:if (!VerificadorEnvio()){return false};">
                                          <input type="reset" value="Restablecer" name="B2" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#B15759">
                                      </td>
                                    </tr>
</table>
                                  </center>
                                  </div>
<p align="center">&nbsp;</p>
                            </form>
                            </div></TD>
                      </TR>
                    </TBODY>
                  </TABLE>
               
              </div></td>
              <td width="15" height="145" >&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="28">
              </td>
              <td height="28" align="right">   <div align="right"><img src="banners/logo.gif" width="352" height="86"> </div> </td>
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
          <td height="24"> </td>
        </tr>
        <tr> 
          <td height="1"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
