
			
			<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>     
		      <table width="100%" height="250" border="0" align="center" cellpadding="2" cellspacing="0">         
                <tr class="Blanco12">
                  <td width="211" bgcolor="#B36464"><div align="right">Nombre: </div></td>
                  <td width="1026" bgcolor="#B36464"> 
                    <input name="txtregnombre" type="text" style="width:200px;font-size:8pt" value="<?=$nombre1?>">
             </td>
                <tr class="Blanco12">
                  <td><div align="right"> Apellido: </div></td>
                  <td>  
                    <input type="text" name="txtregapellido" style="width:200px;font-size:8pt" value="<?=$apellido?>">
              </td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464"><div align="right"></div></td>
                  <td bgcolor="#B36464">&nbsp; 
                  </td>
                </tr>
                <tr class="Blanco12">
                  <td><div align="right">Telefono:</div></td>
                  <td> 
                    <input type="text" name="txtregtelefono" style="width:200px;font-size:8pt;z-Index:8" value="<?=$telefono?>">
        </td>
                </tr>
                <tr class="Blanco12">
                  <td height="50" bgcolor="#B36464"><div align="right">Ciudad/Barrio:</div></td>
                  <td bgcolor="#B36464"> 
                    <input type="text" name="txtregbarrio" style="width:200px;font-size:8pt" value="<?=$barrio?>">
                  </td>
                </tr>
                <tr class="Blanco12">
                  <td><div align="right">Fecha de Nacimiento:</div></td>
                  <td> 
                    <input name="txtregfecnacd" type="text" style="font-size:8pt" value="<?=$fecnacd?>" size="2" maxlength="2"  onkeyup=validateFloat(this,10,2)>
                    /            
                    <input name="txtregfecnacm" type="text" style="font-size:8pt" value="<?=$fecnacm?>" size="2" maxlength="2"  onkeyup=validateFloat(this,10,2)>
                    /
                    <input name="txtregfecnaca" type="text" style="font-size:8pt" value="<?=$fecnaca?>" size="4" maxlength="4"  onkeyup=validateFloat(this,10,2)> 
                    ej 01/01/2003</td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464">&nbsp;</td>
                  <td bgcolor="#B36464">&nbsp;</td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464"><div align="right">Como nos conocio?:</div></td>
                  <td bgcolor="#B36464"><input type="text" name="txtregcomo" style="width:200px;font-size:8pt" value="<?=$como?>"></td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464">&nbsp;</td>
                  <td bgcolor="#B36464">&nbsp;</td>
                </tr>
                <tr class="Blanco12">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464"><div align="right">E-mail:</div></td>
                  <td bgcolor="#B36464"><input type="text" name="txtregemail" style="width:200px;font-size:8pt" value="<?=$email?>" <?=$mode?>> 
                    * 
                   <i><?=$msgcorreo?></i></td>
                </tr>
                <tr class="Blanco12">
                  <td><div align="right">Apodo (Nickname) </div></td>
                  <td><input name="txtregapodo" type="text" id="txtregapodo" style="width:200px;font-size:8pt"value="<?=$apodo?>"> 
                  * <i><?=$msgapodo?></i></td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464"><div align="right">Contrase&ntilde;a:</div></td>
                  <td bgcolor="#B36464"><input name="txtregpass" type="password" id="txtregpass" style="width:200px;font-size:8pt" value="<?=$password1?>"> 
                    *                    </td>
                </tr>
                <tr class="Blanco12">
                  <td><div align="right">Confirmar contrase&ntilde;a: </div></td>
                  <td><input name="txtregpassc" type="password" id="txtregpassc" style="width:200px;font-size:8pt" value="<?=$password1c?>"></td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464">&nbsp;</td>
                  <td bgcolor="#B36464">&nbsp;</td>
                </tr>
                <tr class="Blanco12">
                  <td colspan="2">   <p class="Blanco10">* Datos obligatorios <br>
                    Email (sera su usuario en comermas)<br>
                  Apodo (es utilizado para mostrar sus comentarios) </p>
                    <p class="Blanco10">
                      <input type="checkbox" name="ckreg" value="1">
He leido y acepto los t&eacute;rminos y condiciones de comermas </p></td>
                </tr>
                <tr class="Blanco12">
                  <td bgcolor="#B36464"><div align="right"></div></td>
                  <td bgcolor="#B36464">&nbsp; 
                  </td>
                </tr>
          </table>
		      