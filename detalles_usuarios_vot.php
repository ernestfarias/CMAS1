


<?  session_start(); 
	 
	  if(isset($_GET['id']) && !empty($_GET['id']))
	{
	 
	require_once('includes/catalog.php');	
		require_once('includes/date.php');	
	$id= addslashes($_GET['id']);
	$sql ="SELECT * from puntuaciones,usuarios where puntuaciones.id_usr=usuarios.id  AND (id_usr ='$id')";
    $dir = "";
	if ($reg =="si") $dir ="../";  
  
  
  $rs = @mysql_query($sql) or die (mysql_error()."----->>>".$sqlcomentarios); 
  $totalvotos = @mysql_num_rows($rs);
  
  $mostrar=0;
  while ($row = @mysql_fetch_array($rs)) 
   { 
     $si = $row['si'] ;
     $no = $row['no'] ;
	 $mos = $row['mostrar'];
	 $usuario =  $row['apodo'] ;
	 
	 $fechareg =  cdate3($row['fecha']) ;
	if  ($mos=='1')   $mostrar = $mostrar + 1;
	 }
	 
	 }

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="18" bgcolor="#851549"></td>
              <td width="704" bgcolor="#851549" class="TitulosTime">USUARIO <?=$usuario?></td>
              <td width="15" height="30" bgcolor="#851549">&nbsp;</td>
            </tr>
            <tr>
              <td height="19">&nbsp;</td>
              <td height="19" align="right"><div align="left"></div></td>
              <td height="19">&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="18" bgcolor="#B36464">
                <p align="right">&nbsp;</p></td>
              <td height="18" align="right" bgcolor="#B36464" class="Blanco12">
                <div align="left">
                  <p>Usuario Registrado desde el <?=$fechareg;?><br>
                  </p>
              </div></td>
              <td width="15" height="18" bgcolor="#B36464">&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="18">
                <div align="right"></div></td>
              <td height="18" align="right" class="Blanco12"><div align="left"><span><br>
              </span></div></td>
              <td width="15" height="18">&nbsp;</td>
            </tr>
            <tr>
              <td height="18" bgcolor="#B36464">&nbsp;</td>
              <td height="18" align="right" bgcolor="#B36464" class="Blanco12"><div align="left">Cantidad de Votos realilizados :
                    <?=$totalvotos?>
              </div></td>
              <td height="18" bgcolor="#B36464">&nbsp;</td>
            </tr>
            <tr>
              <td height="18">&nbsp;</td>
              <td height="18" align="right" class="Blanco12"><div align="left">Comentarios que fueron publicados <?=$mostrar?></div></td>
              <td height="18">&nbsp;</td>
            </tr>
            <tr>
              <td height="18" colspan="3"><div align="right">
                <table width="36%"  cellspacing="0" cellpadding="5">
                  <tr class="Blanco12">
                    <td><div align="center"><a href=# onClick="CargarContenido('detalles_comentarios_usr_cal.php?usr=<?=$id?>&ordentipo=comida&ordenprecio=todos','contenidocomentario','contenidocomentario')">Ver por calificacion </a></div></td>
                    <td><div align="center"><a href=# onClick="CargarContenido('detalles_comentarios_usr.php?usr=<?=$id?>&ordentipo=comida&ordenprecio=todos','contenidocomentario','contenidocomentario')">Ver comentarios</a> </div></td>
                  </tr>
                </table>
              </div></td>
              </tr>
            <tr>
              <td height="18" colspan="3">		
			  <div id="contenidocomentario"></div>  
		<? echo "<script>"; 
           echo "CargarContenido('detalles_comentarios_usr.php?usr=".$id."','contenidocomentario','contenidocomentario');";
		   echo "</script>"; ?>
 </td>
              </tr>
            <tr>
              <td height="18">&nbsp;</td>
              <td height="18" align="right" class="Blanco16">&nbsp;</td>
              <td height="18">&nbsp;</td>
            </tr>
            <tr>
              <td height="18">&nbsp;</td>
              <td height="18" align="right" class="Blanco16"><div align="left"></div></td>
              <td height="18">&nbsp;</td>
            </tr>
            <tr>
              <td width="18" height="28">
                <div align="right"> </div></td>
              <td height="28" align="right">  <p>&nbsp;</p>
                <p>&nbsp;</p></td>
              <td width="15" height="30">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="right"></td>
            </tr>
          </table>