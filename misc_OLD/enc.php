<table width="100%"  border="0" cellspacing="0" cellpadding="0">

<tr>
<td  colspan="3"><div align="center" class="BlancoBold14">ENCUESTA</div></td></tr>
            <tr bgcolor="#FFFFFF">
              <td height="1" colspan="3"><div align="center"><img src="marcos/blanco/blanco.gif" width="1" height="1"></div></td>
            </tr>
            <tr>
              <td width="13" bgcolor="#FFCC99">&nbsp;</td>
              <td width="129" bgcolor="#FFCC99">
                <form style="margin:0px;padding:0px;" name="frmencuesta" action="misc/enc_result.php" method="post" target="wndencuesta">
                  <?  $row1 = mysql_fetch_Array($rsencuesta);?>
                  <div align="center" class="NegroBold10">
                    <?=$row1["pregunta"]; ?>
                    <br>
                  </div>
                  <div align="left" class="Negro10">
                    <?
                   
 					
					while ($row1 = @mysql_fetch_array($rsencuesta)) { 
					
					$id = $row1["id"]; 						
					$pregunta = $row1["pregunta"]; 
					if ($id > 0) {
					echo '<input name="encuesta" type="radio" value="'.$id. '" style=""font-size:8pt""><font face="Arial, Helvetica, sans-serif" size="-2">'.$pregunta.'<br>';
					}
		 			}
 ?>
                    <input name="submit" type="submit" value="Votar y ver resultados" style="margin:5px;padding:0px;width:115px;font-size:8pt;background-color:#B36464;color:white;border-color:orange;BORDER-WIDTH: 4px" onClick="NewWindowEAF('misc/procesando.htm','wndencuesta','280','150','no','center','no','no','no','no')">
                  </div>
              </form></td>
            </tr>
</table>