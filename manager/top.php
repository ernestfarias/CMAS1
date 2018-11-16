
<?	  // include('check.php'); 
	 
	  $id = $_SESSION['id'];
	  $usrtext = $_SESSION['usernametext'];
	$op = 'datos';
  if (isset($_SESSION['op']) && !empty($_SESSION['op'])) $op = $_SESSION['op'];
 

function colorcel ($col,$op2)
{
 
if ($col == $op2) {
	$col = '#B36464';
} else {
$col = '#851549';
}
 
return $col;
}
//echo colorcel('datos',$op);

 ?>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<table width="100%%"  border="0" cellspacing="0" cellpadding="0">
 
  <tr>
    <td  height="15" bgcolor="#B36464"><div align="right"><span class="TitulosTime">Bienvenido/a :
          <?=$encnombre?>
    </span></div></td>
  </tr> <td bgcolor="#851549"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>     <img src="../botones/blancogris.gif" width="100%" height="1"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
        <td>     <img src="../botones/blancogris.gif" width="100%" height="2"></td>
      </tr>
  <tr>
    <td bgcolor="#851549"><table width="100%%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  height="15" width="12%" bgcolor="<?=colorcel('datos',$op)?>"><div align="center"><strong><a style="text-decoration:none" href="adm_datos.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">DATOS</font></a></strong></div></td>
        <td width="11%" bgcolor="<?=colorcel('destacados',$op)?>"><div align="center"><strong><a style="text-decoration:none" href="adm_destacados.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">DESTACADO</font></a></strong></div></td>
        <td width="10%" bgcolor="<?=colorcel('notas',$op)?>"><div align="center"><strong><a style="text-decoration:none" href="adm_notas.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">NOTAS</font></a></strong></div></td>
        <td width="24%" bgcolor="<?=colorcel('reservas',$op)?>"><div align="center"><strong><a style="text-decoration:none" href="adm_reservas.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">RESERVAS / CONSULTAS </font></a></strong></div></td>
        <td width="25%" bgcolor="<?=colorcel('descuentos',$op)?>"><div align="center"><strong><a style="text-decoration:none" href="adm_descuentos.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">DESCUENTOS / BENEFICIOS </font></a></strong></div></td>
        <td width="18%" bgcolor="<?=colorcel('salir',$op)?>"><div align="center"><strong><a style="text-decoration:none" href="logout.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">SALIR</font></a></strong></div></td>
      </tr>
    </table></td>
  </tr><tr>
        <td>     <img src="../botones/blancogris.gif" width="100%" height="2"></td>
      </tr>

 <td bgcolor="#851549"> </td>
  </tr>

</table>
