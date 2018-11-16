<? header("Cache-Control: no-store, no-cache, must-revalidate");
 if(isset($_POST["encuesta"]) && !empty($_POST["encuesta"]))
	{
	require_once('../includes/catalog.php'); 
	$voto = addslashes($_POST["encuesta"]);

	$sqlvoto = "UPDATE encuesta SET voto = voto +1 WHERE id='$voto'";
	 mysql_query($sqlvoto) or die(mysql_error()); 
  
 //echo 	$sqlvoto;
$sqlresultado = "SELECT pregunta,voto from encuesta";
$rsresultado= @mysql_query($sqlresultado) or die ("err sql5"); 

?>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>

  <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#AE5959" rules="rows">
    <tr> 
      <td height="7" colspan="3" bgcolor="#851549"> 
        <div align="center" class="Blanco12"><b><font color="#FFFFFF">RESULTADOS</font></b></div></td>
    </tr>
    <tr> 
      <td height="2" colspan="3" bgcolor="#B36464"><img src="botones/blancogris.gif" width="100%" height="2"></td>
    </tr>
    <tr> 
      <td width="14" height="80">&nbsp;</td>
      <td align="left" style="font-size:10pt" width="192" height="1">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <? 
		   mysql_fetch_Array($rsresultado);
		$varcolorindex = "";
		$varcolor = ""; 
		while ($row2 = @mysql_fetch_array($rsresultado)) { 
					$voto = $row2["voto"]; 						
					$pregunta = $row2["pregunta"]; 

        if  ($varcolorindex == 1) {
 			$varcolorindex = 0;
    		$varcolor = "#AE5959";
		} else {
		     $varcolorindex = 1;
		     $varcolor = "#B36464";
		}
		?>
          <tr class="Blanco12"> 
            <td width="69%" bgcolor="<?=$varcolor?>"><strong><font color="#FFFFFF"><?=$pregunta?>: </font></strong></td>
            <td width="31%" bgcolor="<?=$varcolor?>"><div align="left"><strong><font color="#FFFFFF"><?=$voto?></font></strong></div></td>
          </tr>
          <? } ?>
       </table>
			 
			 </td>
      <td height="1" width="14"></td>
    </tr>
<!--      <tr> 
      <td height="2" colspan="3"><img src="botones/blancogris.gif" width="100%" height="2"></td>
    </tr>  -->
  </table> 
<? } ?>



