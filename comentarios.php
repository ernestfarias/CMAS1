<?session_start(); 
	require_once('includes/catalog.php'); 
 	$sqlvoto = "UPDATE contadores SET cantidad = cantidad +1 WHERE nombre='quienes'";
	mysql_query($sqlvoto) or die(mysql_error()); 
 if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
	 require_once('includes/validador.php'); 
	ValidarDatos(  ($_GET["id"]));
	
	
	$id  = addslashes($_GET["id"]);
	
		
	
	 $sql = "SELECT *FROM base LEFT  JOIN encargados ON base.id = encargados.nombrelugar where base.id= '$id'";
    $qrydestacados= @mysql_query($sql) or die ("1ee");
     $rsdestacados = mysql_fetch_Array($qrydestacados);
	$nombre =  stripslashes($rsdestacados['nombre']) ;
}
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

<link rel="stylesheet" type="text/css" media="all" href="includes/calendar-win2k-cold-1.css" title="win2k-cold-1" />
<SCRIPT language=javascript src="includes/functions.js"></SCRIPT> 
<SCRIPT language=javascript src="includes/functioncm.js"></SCRIPT> 
  <script type="text/javascript" src="includes/calendar.js"></script>
  <script type="text/javascript" src="includes/calendar-es.js"></script>
 <script type="text/javascript" src="includes/calendar-setup.js"></script>
 <script language="JavaScript" type="text/JavaScript"></script>
</head>

<!-- <body bgcolor="#AE5959" leftmargin="0" topmargin="0" onload="opciones();"> -->
 <body bgcolor="#AE5959" leftmargin="0" topmargin="0">
 
<form name="frm"  method="post" action=""> 
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
      <table width="777" height="19" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#AE5959">
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
              <td width="704" bgcolor="#851549" class="TitulosTime">Comentarios y Puntuacion </td>
              <td width="15" height="30" bgcolor="#851549">&nbsp;</td>
            </tr>
            <tr>
              <td height="19">&nbsp;</td>
              <td height="19" align="right">&nbsp;</td>
              <td height="19">&nbsp;</td>
            </tr>
            <tr>
              <td height="18" colspan="3"><div align="left">
                  <table width="100%"  cellspacing="0" cellpadding="2">
                    <tr bgcolor="#851549">
                      <td colspan="2"><div align="right">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="95%" height="24">
                              <div align="right" class="BlancoBold12"><b>COMENTARIOS</b></div></td>
                            <td width="20">&nbsp;</td>
                          </tr>
                        </table>
                       </div></td>
                      </tr>
                    <tr>
                      <td colspan="2"><img src="botones/blancogris.gif" width="100%" height="2">&nbsp;</td>
                      </tr>
                    <tr bgcolor="#B36464">
                      <td class="Blanco12"><div align="right">Restaurante :</div></td>
                      <td><?=$nombre?>
                        <input name="idlugar" type="text" id="idlugar" value="<?=$id?>" style="visibility:hidden" readonly></td>
                    </tr>
                    <tr>
                      <td class="Blanco12"><div align="right">Fecha de su visita : </div></td>
                      <td> <input name="fecha" type="text" id="fecha" value="" size="10" maxlength="10" readonly><img src="includes/img.gif" id="f_trigger_c" style="cursor: pointer; border: 1px solid red;" title="Calendario"
      onMouseOver="this.style.background='red';" onMouseOut="this.style.background=''" /></td>
                 <script type="text/javascript">
    Calendar.setup({
        inputField     :    "fecha",     // id of the input field
        ifFormat       :    "%d/%m/%Y",      // format of the input field
        button         :    "f_trigger_c",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
</script> 
  
  </tr>
                    <tr bgcolor="#B36464">
                      <td class="Blanco12"><div align="right">Hora de su visita : </div></td>
                      <td bgcolor="#B36464"><select id="hora" name="hora" size="1">
                        <option value="s" selected>Seleccionar...</option>
                        <option value="m">Ma&ntilde;ana</option>
                        <option value="medio">Mediodia</option>
                        <option value="t">Tarde </option>
                        <option value="n">Noche</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td class="Blanco12"><div align="right"></div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="75" bgcolor="#B36464" class="Blanco12"><div align="right">Que fue lo que pidio : </div></td>
                      <td bgcolor="#B36464"><textarea name="que" cols="70" id="que"></textarea></td>
                    </tr>
                    <tr>
                      <td class="Blanco12"><div align="right">Precio : </div></td>
                      <td><input name="precio" type="text" id="precio"  onkeyup=validateFloat(this,10,2)> 
                        <span class="Blanco10">(especifique el precio por persona) </span></td>
                    </tr>
                    <tr>
                      <td class="Blanco12"><div align="right">comentarios y sugerencias :</div></td>
                      <td bgcolor="#B36464"><textarea name="comentario" cols="70" id="comentario"></textarea></td>
                    </tr>
                    <tr>
                      <td width="26%">&nbsp;</td>
                      <td width="74%">&nbsp;</td>
                    </tr>
                  </table>
              </div></td>
              </tr>
            <tr>
              <td height="18" colspan="3"><table width="100%"  cellspacing="0" cellpadding="2">
                  <tr>
                    <td colspan="2" bgcolor="#851549"><div align="right">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="95%" height="24">
                            <div align="right" class="BlancoBold12"><b>PUNTUACION</b></div></td>
                          <td width="20">&nbsp;</td>
                        </tr>
                      </table>
                    </div></td>
                  </tr>
                  <tr>
                    <td colspan="2"><img src="botones/blancogris.gif" width="100%" height="2"></td>
                  </tr>
                  <tr>
                    <td class="Blanco12">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr bgcolor="#B36464">
                    <td width="25%" class="Blanco12"><div align="right">La comida  : </div></td>
                    <td width="75%"><select name="comida" size="1" id="comida">
                      <option value="s" selected>Seleccionar...</option>
                      <option value="1">Mala</option>
					  <option value="2">Regular</option>
                      <option value="3">Buena</option>
                      <option value="4">Muy buena</option>
                      <option value="5">Excelente</option>
                    </select></td>
                  </tr>
                  <tr bgcolor="#AE5959">
                    <td class="Blanco12"><div align="right">El Servicio : </div></td>
                    <td><select name="servicio" size="1" id="servicio">
                      <option value="s" selected>Seleccionar...</option>
                     <option value="1">Mala</option>
					  <option value="2">Regular</option>
                      <option value="3">Buena</option>
                      <option value="4">Muy buena</option>
                      <option value="5">Excelente</option>
                    </select></td>
                  </tr>
                  <tr bgcolor="#B36464">
                    <td height="25" class="Blanco12"><div align="right">El Ambiente : </div></td>
                    <td><select name="ambiente" size="1" id="ambiente">
                      <option value="s" selected>Seleccionar...</option>
                	  <option value="1">Mala</option>
					  <option value="2">Regular</option>
                      <option value="3">Buena</option>
                      <option value="4">Muy buena</option>
                      <option value="5">Excelente</option>
                    </select></td>
                  </tr>
                  <tr bgcolor="#AE5959">
                    <td class="Blanco12"><div align="right"></div></td>
                    <td>&nbsp;</td>
                  </tr>
                            </table></td>
              </tr> <tr bgcolor="#B36464">
              <td height="18" colspan="3"><table width="100%"  cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" bgcolor="#851549"><div align="right">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="95%" height="24">
                            <div align="right" class="BlancoBold12"><b>TUS DATOS </b></div></td>
                          <td width="20">&nbsp;</td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
                <tr>
                  <td colspan="2"><img src="botones/blancogris.gif" width="100%" height="2"></td>
                </tr>
                <tr bgcolor="#B36464">
                  <td width="9%" class="Blanco12"><div align="right">
                    <input id="rad_opciona" name="rad_opcion" type="radio" value="2" Onclick="apagarcampos('a');return true;">
                    </div></td>
                  <td width="91%"><strong class="BlancoBold14">Soy usuario Registrado</strong></td>
                </tr>
                <tr bgcolor="#AE5959">
                  <td class="Blanco12">&nbsp;</td>
                  <td><table width="100%" border="0" cellpadding="0"  cellspacing="0">
                      <tr>
                        <td><div align="right"><span class="Blanco12">E-mail:</span> </div></td>
                        <td><input type="text" name="txtemailvyr" style="width:200px;font-size:8pt">
                          <span class="Blanco12">*</span></td>
                      </tr>
                      <tr>
                        <td width="13%"><div align="right" class="Blanco12">contrase&ntilde;a:</div></td>
                        <td width="87%"><input type="text" name="txtpassvyr" style="width:200px;font-size:8pt">  </td>
                      </tr>
                    </table></td>
                </tr>
                <tr bgcolor="#B36464">
                  <td class="Blanco12">&nbsp;</td>
                  <td align="right"><input type="checkbox" name="ckvoto" value="1">
                    <span class="Blanco10">He leido y acepto los t&eacute;rminos y condiciones de comermas </span>
										<input name="btnvoto" type="button" style="font-size:12pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  value="Aceptar"  onClick="verificador() ">
 										</td>
                </tr>
                <tr bgcolor="#B36464">
                  <td height="1" colspan="2" class="Blanco12"> <img src="botones/blancogris.gif" width="100%" height="2"></td>
                  </tr>
                <tr bgcolor="#AE5959">
                  <td class="Blanco12">&nbsp;</td>
                  <td><div align="right">
                  </div></td>
                </tr>

<tr bgcolor="#B36464">
                  <td width="9%" class="Blanco12"><div align="right">
                    <input name="rad_opcion" type="radio" value="3" Onclick="apagarcampos('b');return true;">
                    </div></td>
                  <td width="91%"><strong class="BlancoBold14">Solo comentar, no deseo registrarme</strong></td>
                </tr>
                <tr bgcolor="#AE5959">
                  <td class="Blanco12">&nbsp;</td>
                  <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><div align="right"><span class="Blanco12">Nombre:</span></div></td>
                        <td><input name="txtregnombre_solo" type="text" style="width:200px;font-size:8pt" value=""></td>
                      </tr>
											<tr>
                        <td><div align="right"><span class="Blanco12">E-mail:</span></div></td>
                        <td><input name="txtregemail_solo" type="text" style="width:200px;font-size:8pt" value=""><span class="Blanco12">(No sera publicado)</span></td>
                      </tr>
											<tr>
                        <td><div align="right"><span class="Blanco12">Cuidad/Barrio:</span></div></td>
                        <td><input name="txtregciudad_solo" type="text" style="width:200px;font-size:8pt" value=""></td>
                      </tr>
											<tr>
                        <td><div align="right"><span class="Blanco12"></span></div></td>
                        <td></td>
                      </tr>											
                      <tr>
                        <td width="13%"><div align="right" class="Blanco12"></div></td>
                        <td width="87%">
												<input type="hidden" name="hidden" value="anonimo@ar.com" style="width:200px;font-size:8pt">
												<input type="hidden" name="txtpassvyrsolo" value="anonimo" style="width:200px;font-size:8pt"></td>
                      </tr>
								</table></td>
                </tr>
                <tr bgcolor="#B36464">
                  <td class="Blanco12">	</td>
                  <td align="right">
				   					<input type="checkbox" name="ckvotosolo" value="1">
                    <span class="Blanco10">He leido y acepto los t&eacute;rminos y condiciones de comermas    </span>
									  <input name="btnvotosolo" type="button" style="font-size:12pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  value="Aceptar"  onClick="verificador() ">
        					</td>
                </tr>
                <tr bgcolor="#B36464">
                  <td height="1" colspan="2" class="Blanco12"> <img src="botones/blancogris.gif" width="100%" height="2"></td>
                  </tr>
                <tr bgcolor="#AE5959">
                  <td class="Blanco12"></td>
                  <td></td>
                </tr>

                <tr bgcolor="#AE5959">
                  <td class="Blanco12"><div align="right">
                    <input name="rad_opcion" type="radio" value="1" Onclick="apagarcampos('c');return true;">
                    </div></td>
                  <td><strong class="Blanco14">Registrese ahora, vote y tambien participe en nuestro concurso de cenas gratis </strong></td>
                </tr>
                <tr bgcolor="#AE5959">
                  <td colspan="2" class="Blanco12"><div align="right"><? require_once('registra/regusr_text.php')?></div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="18" colspan="3"><div align="right"><img src="botones/blancogris.gif" width="100%" height="2">&nbsp;
                <input name="btnreg" type="button" style="font-size:12pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  value="Registrarme y Votar" onClick="verificador() ">
              </div></td>
            </tr>
            <tr bgcolor="#B36464">
              <td height="18" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="18" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="18" colspan="3"><div align="left">
                  <p class="Blanco12"><strong>ATENCION </strong><br>
    - Los comentarios son procesados manualmente, para evitar el mal uso de los mismo, por lo que sus publicaciones puede tardar unos dias en estar en el sitio </p>
                  <p class="Blanco12">- Nuestro objetivo es recibir criticas subjetivas, experiencias y sugerencias que ayuden y contribuyan a la selecci&oacute;n en el resultado de la busqueda de un lugar. </p>
                  <p class="Blanco12">No se haran publicaciones de denuncias de ning&uacute;n tipo, (comermas no cuenta con las capacidad en cuanto a la verificaci&oacute;n de las mismas).</p>
                  <p class="Blanco12"> Denuncias de<br>
                    - Limpieza<br>
                    - Seguridad<br>
                    - Higiene <br>
                    <a href="http://www.buenosaires.gov.ar/areas/seguridad_justicia/seguridad_urbana/sistema_unico_denuncias/index.php?menu_id=14105" target="_blank">Click aqui</a></p>
                  <p class="Blanco12">Denuncias impositivas, comuniquese al numero telefonico de denuncias de AFIP, 0800-999-2347 de 10 a 18hs </p>
                </div></td>
              </tr>
            <tr>
              <td height="18" bgcolor="#B36464">&nbsp;</td>
              <td height="18" align="right" bgcolor="#B36464" class="Blanco16">&nbsp;</td>
              <td height="18" bgcolor="#B36464">&nbsp;</td>
            </tr>
            <tr>
              <td height="18" bgcolor="#B36464">&nbsp;</td>
              <td height="18" align="right" bgcolor="#B36464" class="Blanco16">&nbsp;</td>
              <td height="18" bgcolor="#B36464">&nbsp;</td>
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
	<!-- <button onclick="alert(rad_opcion[2].checked)" />?? -->
</table>
</form>
</body>
</html>
