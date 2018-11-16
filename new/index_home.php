<LINK REL="StyleSheet" HREF="includes/style.css" TYPE="text/css">
<? header("Cache-Control: no-store, no-cache, must-revalidate");


// session_start();

 
//Chequeo navegador
//if InStr(Request.ServerVariables("HTTP_USER_AGENT"), "MSIE") then 'cheuqua solo si en IExplore u otro
$browsert = getenv("HTTP_USER_AGENT");
$vart = strpos($browsert, "MSIE");


if ($vart === false) {
		$browser= "otro";
	} else {
    	
	 $browser= "MSIE";
	}
 

  
//Abro la DB
require_once('includes/catalog.php'); 

//Declaro los RS
$sqllugares = "SELECT * FROM ciudades order by marca DESC, ciudad";
$sqltipos = "Select clase from clases order by clase";
$sqldestacados = "SELECT * FROM base, destacados where base.id = destacados.id_base order by posicion";
$sqltipos = "Select clase from clases order by clase";

$rstipos= @mysql_query($sqltipos) or die ("err sql3"); 
$rsdestacados= @mysql_query($sqldestacados) or die ("err sql4"); 
//$rsbarrios= @mysql_query($sqlbarrio) or die ("err sql1"); 
$rslugares= @mysql_query($sqllugares) or die ("err sql2"); 

 ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="100%" height="100%" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top" style="padding-left:5px "> 
                    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="3">
                                  <tr>
                                            <td width="33%" valign="top" ><br>
                                              <table width="90%"  border="0" align="center" cellpadding="10" bgcolor="#F1E09E" style="margin:0px;padding:0px;  border:1px solid #A78C51">
                                                <tr>
                                                  <td><p align="justify">Si ud es due&ntilde;o de un restaurant, bar, pub, cafe, pizzeria, no deje de <strong>agregarlo gratis</strong> a nuestra base de datos.</p>                                                  </td>
                                                </tr>
                                              </table>
                                              <br>
                                              <table width="90%"  border="0" align="center" cellpadding="10" bgcolor="#EAD16F" style="margin:0px;padding:0px;  border:1px solid #A78C51">
                                                <tr>
                                                  <td><p align="justify">Si queres participar de nuestro concurso de cenas.<strong> registrate gratis  aqui</strong> </p></td>
                                                </tr>
                                              </table></td>
                                            <td width="67%" ><br>  
											

											
											
                                              <table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td><div align="left">
                                                    <table width="65%" height="19" border="0" align="right" cellpadding="0" cellspacing="0" style="margin:0px;padding:0px;  border:1px solid #A78C51" name="Tabla1">
                                                      <tr>
                                                        <td id ="op1" width="66%" height="19" align="center" valign="middle"  onMouseOver="this.style.cursor= 'pointer'"  onMouseOut="" onMouseDown="restorecetas('resto');">
                                                          <div align="center" class="Titulos" >RESTAURANTS </div></td>
                                                        <td id = "op2" width="34%" align="center" valign="middle" onMouseOver="this.style.cursor= 'pointer'"  onMouseOut=""  onMouseDown="restorecetas('recetas')">
                                                          <div align="center" class="Titulos" > RECETAS</div></td>
                                                      </tr>
                                                    </table>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td><table width="95%" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#F8F0D0" rules="none" style="margin:0px;padding:0px;  border:1px solid #A78C51" name="Tabla1">
                                                    <tr>
                                                      <td width="195" rowspan="10" align="left" valign="top">
                                                        <table width="100%"  border="0" cellspacing="0" cellpadding="10">
                                                          <tr>
                                                            <td valign="top" >
                                                            <div id="restorecetas" class="Textos">&nbsp;</div></td>
                                                          </tr>
                                                      </table></td>
                                                      <td align="left" valign="middle"><IMG  src="images/consulta.gif" name="resto"  align="absbottom" id="resto"></td>
                                                      <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td align="left" valign="middle"><span class="Textos">
                                                        <input type="text" id="textop_nombres6" name="textop_nombres" style="width:160px;font-size:7pt" onKeyUp="">
                                                      </span>
                                            </td>
                                                      <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td align="left" valign="middle" class="Textos">   <div ID="TIPO">TIPO/CLASE:
                                                        
                                                      </div></td>
                                                      <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td align="left" valign="middle" class="Textos"><select type="text" id="select5" name="op_tipos" class="text" style="width:160px;font-size:7pt;z-Index:0;visibility:inherit" >
                                                        <option value="SELECCIONAR...">SELECCIONAR...</option>
                                                        <option value="TODOS" selected>TODOS</option>
                                                        <? while ($row = @mysql_fetch_array($rstipos)) { 
								    $tipo = strtoupper($row["clase"]); ?>
                                                        <option value="<?=$tipo ?>">
                                                        <?=$tipo?>
                                                        </option>
                                                        <? }?>
                                                      </select></td>
                                                      <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td align="left" valign="middle" class="Textos"><div ID="CIUDAD">CIUDAD:</div></td>
                                                      <td width="10" align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td  id="fila_1" align="left" valign="middle" class="Textos"> 
                                                        <select class='combo' id='select2' name='op_lugares' onChange="cargaContenidoSelect('includes/select_proceso.php')">
                                                          <option value="TODAS" selected>TODAS</option>
                                                          <?
	while($row = @mysql_fetch_array($rslugares))
	{
		echo "<option value='".$row[0]."'>". strtoupper($row[1])."</option>";
	} ?>
                                                        </select>
                                                      <input type="hidden" name="textop_barrios" class="text" size="0" style="width:1px;font-size:8pt;visibility:hidden;"> </td>
                                                      <td width="10" align="justify" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td width="186" align="left" valign="middle" class="Textos">
                                                      <div ID="BARRIO">BARRIO:</div></td>
                                                      <td  width="10" rowspan="3" align="justify">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td id="fila_2"  align="left" valign="middle"><select class="combo" disabled="disabled" id="select4"  name="op_barrios">
                                                        <option id="valor_defecto" value="0">TODOS</option>
                                                      </select>
                                                     </td>
                                                    </tr>
                                                    <tr>
                                                      <td width="186" align="left" valign="middle"> </td>
                                                    </tr>
                                                    <tr>
                                                      <td width="186" height="21" align="center" valign="middle"><strong class="Textos"><font color="#AE5959">BUSQUEDA</font></strong> <img src="images/but.gif" name="go" border=0 style="cursor:pointer" onClick="javascript:if (!Verificador()){return false};" type="image"></td>
                                                      <td width="10" height="21" valign="top">&nbsp;</td>
                                                    </tr>
                                                  </table></td>
                                                </tr>
                                              </table>
											  
											  
 				  
											  
											  
											  
											  
											  
											  
											  
											  
											  
                                  </td>
                                  </tr>
                            </table>
                              <p>&nbsp;</p></td>
                        </tr>
                           <? while ($row = @mysql_fetch_array($rsdestacados)) { 
				  $id = $row["id_base"];   
				  $nombre =stripslashes($row["nombre"]);  
				  $direccion = stripslashes($row["direccion"]); 
				  $detalles = stripslashes($row["detalles1"]); 
				  $barrio = stripslashes($row["barrio"]); 
				  $localidad = stripslashes($row["localidad"]); 
			  	  $telefono = $row["telefono"]; 
				  $stars = $row["stars"];
			      
				  if (isset($row["imagen"]) && !empty($row["imagen"])) 
				  {
				 
					 $foto = '<img witdh="80" height="80" src="fotos/m_'.$row["imagen"]. '" alt="' . $nombre .'"></img>'; 
				  } else {
				  $foto = '<img src="fotos/cmas.gif" alt=""' . $nombre .'"></img>'; 
				   
				  }
				  ?>
              <td height="124"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"> <br>
                        <table width="50%"  border="0" align="left" cellpadding="5" cellspacing="0" bgcolor="#F8F0D0" style="margin:0px;padding:0px;  border:1px solid #A78C51">
                          <tr class="Textos">
                            <td width="359">
                                <table width="100%"  cellspacing="2" cellpadding="0">
                                  <tr>
                                    <td><a href=# class="Titulos" style="Titulo:'false'" onClick="CargarContenido('index_detalles.php?id=<?=$id?>','contenido','refrescarlista')">
                                      <?=$nombre?>
(+ info)</a> </td>
                                  </tr>
                                  <tr>
                                    <td class="Textos"><?=$direccion?></td>
                                  </tr>
                                  <tr>
                                    <td class="Textos"><?=$barrio?>
-
  <?=$localidad?></td>
                                  </tr>
                                  <tr>
                                    <td class="Textos"><b>
                                      <?=$telefono?>
                                    </b></td>
                                  </tr>
                                  <tr>
                                    <td class="Textos"><? $c=0;
									 while ($c < $stars) {
                                      echo '<img src="images/stars.gif" width="17" height="12">';
                                      $c=$c+1 ;
									  }?></td>
                                  </tr>
                              </table>
                  
                  </td>
                            <td width="17"><?=$foto?></td>
                          </tr>
                          <tr class="Textos">
                            <td colspan="2"><div align="left">
                                <span class="Textos10px">
                                <?=$detalles?>
                                </span>
                                <br>
                            </div></td>
                          </tr>
                      </table></td>
                  </tr>
              </table></td>
              <? 
			//	$row = 			@mysql_fetch_array($rsdestacados);

//				 $id = $row["id"];   
	//			  $nombre = $row["nombre"];  
			//	  $direccion = $row["direccion"]; 
			//	  $barrio = $row["barrio"]; 
			//	  $localidad = $row["localidad"]; 
			 // 	  $telefono = $row["telefono"]; 
			//	  $stars = $row["stars"];
			      $foto = $row["foto"];
 
	// if ($row = @mysql_fetch_array($rsdestacados)) {
//	 } else {
	  
	 ?>
            </tr>
            <? 

			}		
?>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                          </table></td>
                  </tr>
              </table>
                </td>
            </tr>
          </table>
<script>ClearFrm();cargaContenidoSelect('includes/select_proceso.php')</script>	
