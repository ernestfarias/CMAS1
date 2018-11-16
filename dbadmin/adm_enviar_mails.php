<? 
include('check.php'); 
require_once('../includes/catalog.php');
 if(isset($_POST["textcco"]) && !empty($_POST["textcco"]))	
	{
	$userid = $_SESSION['userid'];

	$cuerpo = stripslashes($_POST["textdesc"]) ;
	 $de = stripslashes($_POST["textde"]) ;
 $asunto = stripslashes($_POST["textasunto"]) ;
	 $para = stripslashes($_POST["textcco"]) ;
	
	 		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		 
	    $headers .= "To:".$de."\r\n";
		$headers .= "From:".$de."\r\n";
		$headers .= "Bcc:".$para."\r\n";

$fecha  = date('Y-m-d');
$hora = date('h:i:s');
 
  mail($de, $asunto, $cuerpo, $headers); 
 $sql1 = "INSERT INTO `envio_correo` (`de`,`cco`,`asunto`,`mensaje`,`fecha`,`hora`,`usr`) VALUES ('$de', '$para', '$asunto', '$cuerpo','$fecha', '$hora','$userid')";
 $qry1 = @mysql_query($sql1) or   die (mysql_error());  
		
		 $msg = "El envio fue realizodo con exito";
		}
 $sql2 = "SELECT  * FROM envio_correo group by asunto";
 $qry2 = @mysql_query($sql2) or die ("ERROR: Busqueda!12."); 
 
 $ini = "";
 
 ?>
<? 


?>
<HTML>
<HEAD>
<script language=javascript>document.write(unescape('%3C%73%63%72%69%70%74%20%6C%61%6E%67%75%61%67%65%3D%22%6A%61%76%61%73%63%72%69%70%74%22%3E%66%75%6E%63%74%69%6F%6E%20%64%46%28%73%29%7B%76%61%72%20%73%31%3D%75%6E%65%73%63%61%70%65%28%73%2E%73%75%62%73%74%72%28%30%2C%73%2E%6C%65%6E%67%74%68%2D%31%29%29%3B%20%76%61%72%20%74%3D%27%27%3B%66%6F%72%28%69%3D%30%3B%69%3C%73%31%2E%6C%65%6E%67%74%68%3B%69%2B%2B%29%74%2B%3D%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%73%31%2E%63%68%61%72%43%6F%64%65%41%74%28%69%29%2D%73%2E%73%75%62%73%74%72%28%73%2E%6C%65%6E%67%74%68%2D%31%2C%31%29%29%3B%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%75%6E%65%73%63%61%70%65%28%74%29%29%3B%7D%3C%2F%73%63%72%69%70%74%3E'));dF('%264DTDSJQU%2631MBOHVBHF%264E%2633kbwbtdsjqu%2633%264F%261E%261B%2631%261E%261Bgvodujpo%2631DbshbsDpoufojepNBJM%2639iunm%263Dejw%263Dejwdbshb%263%3A%261E%261B%268C%261E%261B%261%3Awbs%2631wbmps%264Eepdvnfou/hfuFmfnfouCzJe%2639%2633nfotbkft%2633%263%3A/pqujpot%266Cepdvnfou/hfuFmfnfouCzJe%2639%2633nfotbkft%2633%263%3A/tfmfdufeJoefy%266E/wbmvf%264C%261E%261B%2631%2631%2631%2631wbs%2631dpoufofeps3%264C%261E%261B%261%3Awbs%2631dpoufofepsdbshb3%264C%261E%261B%2631%2631%2631%2631dpoufofeps3%2631%264E%2631epdvnfou/hfuFmfnfouCzJe%2639ejw%263%3A%264C%261E%261B%2631%2631%2631%2631dpoufofepsdbshb3%2631%264E%2631epdvnfou/hfuFmfnfouCzJe%2639ejwdbshb%263%3A%264C%261E%261B%2631%2631%2631%263100%2631dsfbnpt%2631vo%2631ovfwp%2631pckfup%2631bkby%261E%261B%2631%2631%2631%2631bkby3%264EdsfbsBkby%2639%263%3A%264C%261E%261B%2631%2631%2631%261E%261B%2631%2631%2631%263100dbshbs%2631fm%2631bsdijwp%2631iunm%2631qps%2631fm%2631n%26F%3Aupep%2631HFU%261E%261B%2631%2631%2631%2631bkby3/pqfo%2639%2633HFU%2633%263D%2631iunm%2C%2633%264Gtfmfddjpobep%264E%2633%2Cwbmps%263D%2631usvf%263%3A%264C%261E%261B%261%3Abkby3/tfuSfrvftuIfbefs%2639%2633Dpoufou.Uzqf%2633%263D%2631%2633bqqmjdbujpo0y.xxx.gpsn.vsmfodpefe%2633%263%3A%264C%261E%261B%261%3Abkby3/tfuSfrvftuIfbefs%2639%2633Bddfqu.Dibstfu%2633%263D%2631%2633VUG.9%2633%263%3A%264C%261E%261B%261E%261B%2631%2631%2631%2631bkby3/posfbeztubufdibohf%264Egvodujpo%2639%263%3A%2631%261E%261B%2631%2631%2631%2631%268C%261E%261B%2631%2631%2631%2631%2631%2631%2631%2631jg%2631%2639bkby3/sfbezTubuf%264E%264E5%2631%2637%2637%2631bkby3/tubuvt%264E%264E311%263%3A%263100%2631Sfbeztubuf%26315%2631tjhojgjdb%2631rvf%2631zb%2631bdbc%26G4%2631ef%2631dbshbsmp%261E%261B%2631%2631%2631%2631%2631%2631%2631%2631%268C%261E%261B%261%3A%261%3A%261%3A00%2631cvtdb%2631tj%2631ibz%2631vob%2631gvodjpob%2631kbwb%261E%261B%261%3A%2631%2631%2631%2631%263100%2631bmfsu%2631%2639bkby3/sftqpotfUfyu%263%3A%261E%261B%261%3A%261%3A%2631%261E%261B%261%3A%261%3A%2631ujozNDF/fyfdDpnnboe%2639%2638ndfOfxEpdvnfou%2638%263Dgbmtf%263D%2631%2638/%2638%2631%263%3A%264C%261E%261B%261%3A%261%3AujozNDF/fyfdDpnnboe%2639%2638ndfJotfsuDpoufou%2638%263Dgbmtf%263Dbkby3/sftqpotfUfyu%2631%263%3A%264C%261E%261B%2631xjoepx/gsn/ufyubtvoup/wbmvf%2631%264E%2631wbmps%264C%261E%261B%2631dpoufofepsdbshb3/joofsIUNM%2631%2631%264E%2633%2633%264C%261E%261B%261%3A%261%3A%261%3A%268E%2631fmtf%2631%268C%261E%261B%261%3A%261%3A%261%3A%261E%261B%261%3A%261%3A%261%3A%261E%261B%261%3A%261%3A%261%3A%2631%261E%261B%261%3A%261%3A%261%3A%2631%2631%261E%261Bdpoufofepsdbshb3/joofsIUNM%2631%264E%2638%264Djnh%2631tsd%264E%2633iuuq%264B00xxx/dpnfsnbt/dpn/bs0jodmveft0sfgsfti/hjg%2633%2631cpsefs%264E%26331%2633%2631bmjho%264E%2633dfoufs%26330%264F%2638%264C%261E%261B%261%3A%261%3A%261%3A%268E%261E%261B%2631%2631%2631%2631%268E%261E%261B%2631%261E%261B%2631%2631%2631%2631bkby3/tfoe%2639ovmm%263%3A%261E%261B%268E%261E%261B%264D0TDSJQU%264F%261E%261B%26311')</script>
<title>SuperMEGAAdmin 2.0v</title>
<link rel="stylesheet" type="text/css" href="estilo.css">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	 

</HEAD>
<script src="../includes/tooltip.js" type="text/javascript"language="javascript"></script>
	<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
 
<SCRIPT TYPE="text/javascript" SRC="../includes/ajax.js" language="javascript1.2"></SCRIPT>

<body leftmargin="0" topmargin="0" onLoad="">
 
 
 
<form name="frm" action="adm_enviar_mails.php" method="post">


<table width="80%" align="center" cellpadding="0"  cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="12%"><div align="right"><font size="1">DE : </font></div></td>
    <td width="88%"><input name="textde" type="text"  style="width:90%" value="info@comermas.com.ar"></td>
  </tr>
  <tr>
    <td><div align="right"><font size="1"> <a href="javascript:NewWindow('adm_enviar_mails_para.php' ,'para','340','540','yes');">Para (CCO) </a> :<br>
   
      </font></div></td>
    <td><textarea name="textcco" cols="100" rows="5" style="width:90%"><?=$ini?></textarea>
      <a href="javascript:document.frm.textcco.focus();document.frm.textcco.select();">Seleecionar</a><br></td>
  </tr>
  <tr>
    <td><div align="right"><font size="1">ASUNTO:</font></div></td>
    <td><input name="textasunto" type="text" id="textasunto"style="width:90%"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
      
      <table width="100%"  cellspacing="0" cellpadding="0">
        <tr>
          <td width="2%"><div align="right"><div id="refresh"> &nbsp;</div></div>     </td>
          <td width="18%"><strong><font size="-1">MENSAJES ENVIADOS </font></strong></td>
          <td width="80%"><select name="mensajes" onChange="CargarContenidoMAIL('adm_enviar_mails_proceso.php','refresh','refresh')" style="width:200px ">
            <option value="" selected>...</option>
            <?
	  $qry2 = @mysql_query($sql2) or die ("ERROR: Busqueda!1."); 
  while ($row = @mysql_fetch_array($qry2)) {
  if(isset($row['0']) && !empty($row['0']))	
	  {
 	  echo  "<option value=".$row['asunto'].">".$row['asunto']."</option>";
    
	  }
  }?>
                              </select></td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td colspan="2"><? include('../includes/editorhtml/editor.php'); ?>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">      <table width="100%"  cellspacing="0" cellpadding="0">
        <tr>
          <td width="11%"><input type="submit" name="Submit" value="Enviar Mensaje"></td>
          <td width="89%"><div id="envio"><?=$msg?></div></td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><button style="font-size:8pt" onClick="document.frm.action='adm.php';document.frm.submit();">Volver</button> </td>
    <td>&nbsp;</td>
  </tr>
</table>


</form>
<br>
</BODY>
</HTML>

