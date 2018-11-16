<tr>
              <? 
							$cantidad = 1;
														$query = mysql_query("SELECT COUNT(id) FROM base");
							list($number) = mysql_fetch_row($query);
							$destaran = rand(1, $number + 100);
							
								$sqldestacadosran = "SELECT * FROM base LIMIT $destaran,$cantidad ";
//							echo $sqldestacadosran;
$rsdestacadosran= @mysql_query($sqldestacadosran) or die ("err en destaran");
							while ($row = @mysql_fetch_array($rsdestacadosran)) { 

//				  $id = $row["id_base"];   
				  $id = $row["id"];
				  $nombre = $row["nombre"];  
				  $direccion = $row["direccion"]; 
				  $barrio = $row["barrio"]; 
					 $clase = $row["clase"]; 
				  $localidad = $row["localidad"]; 
			  	  $telefono = $row["telefono"]; 
				  $stars = $row["stars"];
			      
				  if (isset($row["imagen"]) && !empty($row["imagen"])) 
				  {
				 
					 $foto = '<img witdh="80" height="80" src="fotos/m_'.$row["imagen"]. '" alt="' . $nombre .'"></img>'; 
				  } else {
				  $foto = '<img src="fotos/cmas.gif" alt="' . $nombre .'">'; 
				   
				  }
				  ?>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                  <tr>
                    <td align="center">
                        <table width="90%"  border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="right" valign="middle"></td>
                            <td width="359"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="detalles.php?id=<?=$id?>" style="textDecorationNone:'false'" >
                              <?=$nombre?>
                              <span class="Estilo15">(<?=$clase?>)</span></a></font></td>
                            <td width="17" rowspan="3"><?=$foto?></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right" valign="middle"><img src="images/bordeiz.jpg" width="25" height="55"></td>
                            <td bgcolor="#B46465"><div align="left" class="Blanco10">
                                <?=$direccion?>
                                <br>
                                <?=$barrio?>
                    |
                    <?=$localidad?>
                    <br>
                    <?=$telefono?>
                            </div></td>
                            <td><img src="images/bordeder.jpg" width="25" height="55"></td>
                          </tr>
                          <tr>
                            <td width="25" align="right" valign="middle">&nbsp;</td>
                            <td><div align="left">
                                <? $c=0;
									 while ($c < 6) {
                                     
									 if ($c < $stars) echo '<img src="images/stars.gif" width="17" height="12">';
                                     if ($c > $stars) echo '<img src="images/starsoff.gif" width="17" height="12">';
									  $c=$c+1 ;
									  
									  
									  }?>
                            </div></td>
                            <td width="25">&nbsp;</td>
                          </tr>
                      </table></td>
                  </tr>
              </table></td>
              <? 
			      $foto = $row["foto"];
	 ?>
            </tr>
            <? 

			}		
?>
