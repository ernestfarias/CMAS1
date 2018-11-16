<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Para</title>
<link rel="stylesheet" type="text/css" href="estilo.css">

<script language="javascript" type="text/javascript">

	function para(contect) {
 
		window.opener.document.frm.textcco.value = contect; 
		window.close();
	}
	 function parasel() {
 
		window.opener.document.frm.textcco.value = window.frm.cco.value; 
		window.close();
	}
	 
	
      function getSelected(opt) {
            var selected = new Array();
            var index = 0;
            for (var intLoop = 0; intLoop < opt.length; intLoop++) {
               if ((opt[intLoop].selected) ||
                   (opt[intLoop].checked)) {
                  index = selected.length;
                  selected[index] = new Object;
                  selected[index].value = opt[intLoop].value;
                  selected[index].index = intLoop;
               }
            }
            return selected;
         }

         function outputSelected(opt) {
            var sel = getSelected(opt);
            var strSel = "";
            for (var item in sel) {      
	           separador =","
		       strSel += sel[item].value + separador +"\n";
            }
			 
			 
			window.frm.cco.value = window.frm.cco.value + strSel  ;
			 
			
         }
    
 
   
</script>

</head>

<body>
<?
include('check.php'); 
require_once('../includes/catalog.php');
 
//	 $sql1 = "SELECT encemail, encnombre FROM encargados ";
 $sql1 = "SELECT  encemail, encnombre, nombre FROM base, encargados where base.id = encargados.nombreLugar";
 $qry1 = @mysql_query($sql1) or die ("ERROR: Busqueda!2."); 
 $totalrecords = @mysql_num_rows($qry1); 
 
 	$cont= 0;
  	while ($row = @mysql_fetch_array($qry1)) 
	{
	  if(isset($row['0']) && !empty($row['0']))	
	  {
		  $correoenc =  $correoenc  . $row['0'] ;
		  if(($totalrecords > 1) and ($cont < $totalrecords)) $correoenc = $correoenc .","; 
		  $cont = $cont+1;
	  }
	}
 
 $sql2 = "SELECT  email,nombre FROM usuarios where  permiso= 'concurso' or permiso='usuario'";
 $qry2 = @mysql_query($sql2) or die ("ERROR: Busqueda!1."); 
 $totalrecords = @mysql_num_rows($qry2); 
  
  $cont= 0;
  while ($row = @mysql_fetch_array($qry2)) {
  if(isset($row['0']) && !empty($row['0']))	
	  {
	  $correousu =   $correousu  . $row['0'] ; 
	  if(($totalrecords > 1) and ($cont < $totalrecords)) $correousu = $correousu .","; 
	  $cont = $cont+1;
	  }
  }
  
  
  
 
 
 
 ?>


<form name="frm" action="adm_enviar_mails.php" method="post">

 
<table width="100%"  cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="2" valign="middle"><a href=# onClick="para('<?= $correoenc ?>')">Encargados (Enviar a todos)</a>
      <br>
      <select id="select" name="selencargados" size="10" style="width:98%" multiple >
        <?
 $qry1 = @mysql_query($sql1) or die ("ERROR: Busqueda!1."); 
  while ($row = @mysql_fetch_array($qry1)) {
  if(isset($row['0']) && !empty($row['0']))	
	  {
 		  echo  "<option value=".$row['0'].">".$row['2']." - ".$row['1']." (".$row['0'].")</option>";
	  }
  }
  
   ?>
      </select></td>
    </tr>
  <tr>
    <td colspan="2" valign="middle"><a href=# onClick="para('<?= $correousu?>')">Usuarios (Enviar a Todos)<br>
    </a>
      <select name="selusuarios" size="10"style="width:98%" multiple>
        <?
   $qry2 = @mysql_query($sql2) or die ("ERROR: Busqueda!1."); 
  while ($row = @mysql_fetch_array($qry2)) {
  if(isset($row['0']) && !empty($row['0']))	
	  {
 	  echo  "<option value=".$row['0'].">".$row['1']." (".$row['0'].")</option>";
    
	  }
  }
  
   ?>
      </select></td>
    </tr>
  <tr>
    <td colspan="2">      <table width="100%"  cellspacing="0" cellpadding="0">
        <tr>
          <td width="12%" valign="top"><input type="button" name="Submit" value="Para" onClick="outputSelected(this.form.selencargados.options);outputSelected(this.form.selusuarios.options)"></td>
          <td width="88%"><textarea name="cco" rows="5" style="width:98%"></textarea></td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td width="17%">&nbsp;</td>
    <td width="10%"><div align="right">
      <input type="button" name="Submit2" value="aceptar" onClick="parasel()">
    </div></td>
  </tr>
</table>
 
</form>
</body>
</html>
