<? 
if (!headers_sent()) {
header("Cache-Control: no-store, no-cache, must-revalidate");
    exit;
}

 if(isset($_GET['id']) && !empty($_GET['id']))
	{
	require_once('includes/catalog.php');	
	$idfrombusqueda = addslashes($_GET['id']);
 	$sqlvotos ="SELECT * from puntuaciones where id_base ='$idfrombusqueda' and mostrar=1";
	 $rsvotos = @mysql_query($sqlvotos) or die ("ERROR: The query failed.1"); 
	 $totalvotos = @mysql_num_rows($rsvotos); 
	 $cont =0;
	$comidavotos=0;
	$serviciovotos=0;
	$ambientevotos=0;
	$precio=0;
	$contprecio=0;
	while ($row = @mysql_fetch_array($rsvotos)) 
   { 
 
   $comidavotos =$comidavotos +$row["comida"];
    $serviciovotos =$serviciovotos +$row["servicio"];
	 $ambientevotos =$ambientevotos +$row["ambiente"];
	
	  if ($row["precio"] >0) 
	  {
	    $precio =$precio +$row["precio"];
		$contprecio = $contprecio +1;
	  }
   }
//TIRA ERROR DE DIV POR 0 CUANDO NO TIENE CARGADO NADA	$comida =  round(($comidavotos *100)/ ($totalvotos*5)/10);
//TIRA ERROR DE DIV POR 0 CUANDO NO TIENE CARGADO NADA	$servicio =  round(($serviciovotos *100)/ ($totalvotos*5)/10);
//TIRA ERROR DE DIV POR 0 CUANDO NO TIENE CARGADO NADA	$ambiente =  round(($ambientevotos *100)/ ($totalvotos*5)/10);


    if ($precio >0)  $totalprecio = round($precio / $contprecio);
   
 }  
   
   ?>


<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>

<table width="100%"  cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0"  cellspacing="0">
      <tr>
        <td bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td bgcolor="#851549">
          <table width="100%"  cellspacing="0" cellpadding="5">
            <tr>
              <td><div align="center"><strong>Puntaje</strong></div></td>
            </tr>
          </table>
 </td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><img src="marcos/blanco/blanco.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td class="Negro10"><div align="center" class="Blanco12">
            <div align="left">
              <table width="100%"  cellspacing="0" cellpadding="5">
                <tr>
                  <td class="Blanco12">Pulse <b><a href="comentarios.php?id=<?=$idfrombusqueda?>">aqui</a></b> para dejar su comentario y votacion de este lugar. </td>
                </tr>
              </table>
            </div>
        </div></td>
      </tr>
      <tr>
        <td><table width="100%"  cellspacing="0" cellpadding="5">
          <tr class="Blanco11">
		  
		  
		  
		<? if  ($totalvotos >0) { ?>  
            <td width="7%" bgcolor="#851549">Comida</td>
            <td width="26%" bgcolor="#B36464"><span class="Blanco12"><strong>
              <?=$comida?>
            </strong></span>/10 (puntos) </td>
            <td width="14%" bgcolor="#B36464">&nbsp;</td>
            <td width="16%" bgcolor="#B36464">&nbsp;</td>
            <td width="15%" bgcolor="#B36464">&nbsp;</td>
            <td width="22%" bgcolor="#B36464">&nbsp;</td>
          </tr>
          <tr class="Blanco11">
            <td bgcolor="#851549">Servicio</td>
            <td><strong class="Blanco12"><?=$servicio?></strong>/10 (puntos) </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr class="Blanco11">
            <td bgcolor="#851549">Ambiente</td>
            <td bgcolor="#B36464"><strong class="Blanco12"><?=$ambiente?></strong>/10 (puntos) </td>
            <td bgcolor="#B36464">&nbsp;</td>
            <td bgcolor="#B36464">&nbsp;</td>
            <td bgcolor="#B36464">&nbsp;</td>
            <td bgcolor="#B36464">&nbsp;</td>
          </tr>
          <tr class="Blanco11">
            <td bgcolor="#851549"><strong><a href="comentarios.php?id=<?=$idfrombusqueda?>">Comentarios</a></strong></td>
            <td><strong class="Blanco12"><?=$totalvotos?></strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr class="Blanco11">
            <td bgcolor="#851549"><strong>Promedio</strong></td>
            <td bgcolor="#B36464"><strong>
              $<?=$totalprecio?>
 (por persona)           </strong></td>
            <td bgcolor="#B36464">&nbsp;</td>
            <td bgcolor="#B36464">&nbsp;</td>
            <td bgcolor="#B36464">&nbsp;</td>
            <td bgcolor="#B36464">&nbsp;</td>
          </tr>
		
		<? }else {?>
		
		 <tr class="Blanco12">
            <td colspan="6" bgcolor="#851549"><p>Aun este lugar no a recibido comentarios si desea dejar su comentario clic <a href="comentarios.php?id=<?=$idfrombusqueda?>">aqui</a></p>              </td>
            </tr>
		<? }?>
		
		
		
        </table>
          </td>
      </tr>
    </table></td>
   
  </tr>
</table>
 <blockquote></blockquote>
