
<HTML>
<HEAD>
<SCRIPT>

</SCRIPT>
<title>ComerMas - Encuesta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>

<BODY  bgcolor="ae5959">
<center>
<?



 if(isset($_POST["encuesta"]) && !empty($_POST["encuesta"]))
	{
	require_once('../includes/catalog.php'); 
	$voto = addslashes($_POST["encuesta"]);

	$sqlvoto = "UPDATE encuesta SET voto = voto +1 WHERE id='$voto'";
	 mysql_query($sqlvoto) or die(mysql_error()); 
  
 
$sqlresultado = "SELECT pregunta,voto from encuesta";
$rsresultado= @mysql_query($sqlresultado) or die ("err sql5"); 

 
	 

?>
  <table rules="rows" align="center" width="220" height="122" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td height="7" colspan="3" bgcolor="#851549"> 
        <div align="center"><b><font color="#FFFFFF">Resultado 
          de la encuesta</font></b></div></td>
    </tr>
    <tr> 
      <td height="2" colspan="3" bgcolor="#B36464"><img src="../Botones/blancogris.gif" width="100%" height="2"></td>
    </tr>
    <tr> 
      <td width="14" height="80">&nbsp;</td>
      <td align="left" style="font-size:10pt" width="192" height="1"> <center>
        </center>
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
          <tr> 
            <td width="69%" bgcolor="<?=$varcolor?>"><strong><font color="#FFFFFF"><?=$pregunta?>: </font></strong></td>
            <td width="31%" bgcolor="<?=$varcolor?>"><div align="right"><strong><font color="#FFFFFF"><?=$voto?></font></strong></div></td>
          </tr>
          <? } ?>
        </table></td>
      <td height="1" width="14"></td>
    </tr>
    <tr> 
      <td height="2" colspan="3"><img src="../Botones/blancogris.gif" width="100%" height="2"></td>
    </tr>
    <tr valign="top"> 
      <td height="8" colspan="3"> 
        <div align="right">
          <button onClick="window.close()" style="font-size:8pt;border:0;border:0;background-color:#851549"><font color="#FFFFFF">Cerrar</font></button>
        </div></td>
    </tr>
  </table>
  <BR>

</center>
<?   } ?>
</BODY>
</HTML>
