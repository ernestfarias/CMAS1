<? 
require_once('includes/catalog.php'); 
$rsencuesta= @mysql_query($sqlencuesta) or die ("err sql5"); 
?>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
   
<table width="100%"  border="0" cellspacing="0" cellpadding="0">

<tr>
<td width="142"><div align="center" class="BlancoBold14" id="contenidoencref">ENCUESTA</div></td></tr>
            <tr>
              <td height="1">
			  <div id="contenidoenc">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
 <!--            <tr>
              <td height="1" colspan="3"><div align="center"><img src="marcos/blanco/blanco.gif" width="1" height="1"></div></td>
            </tr> -->
            <tr>
              <td width="13" bgcolor="#FFCC99">&nbsp;</td>
              <td width="129" bgcolor="#FFCC99">
                
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
                    <input name="bot" type="button" value="Votar y ver resultados" style="margin:5px;padding:0px;width:115px;font-size:8pt;background-color:#B36464;color:white;border-color:orange;BORDER-WIDTH: 4px" onClick="getPag('misc/enc_result.php','contenidoenc','contenidoencref','','refreshn.gif');">
                 
				 
				  </div>
             </td>
            </tr>
</table>  
</div>
			  
			 </td>
            </tr>
</table>  

 