
<?  // include('manager/check.php'); 
	 require_once('includes/catalog.php');
	 require_once('includes/date.php');
	 require_once('includes/validador.php'); 
	 


 
if(isset($_GET["id"]) && !empty($_GET["id"])) {
$id = $_GET["id"];
$action = $_GET["action"];
if ($action =='print') $action ="javascript:window.print()";
if ($action =='ver') $action  ="";
//$id =2;
 $sql = "SELECT *FROM descuentos LEFT  JOIN base ON descuentos.id_base = base.id  where descuentos.id= '$id'";
 $qry= @mysql_query($sql) or die ("1ee");
 $rs = mysql_fetch_Array($qry);
  
	   $nombre = $rs['nombre'] ;
 $clase = $rs['clase'] ;
 $direccion = $rs['direccion'] ;
 $telefono = $rs['telefono'] ;
 $localidad = $rs['localidad'] ;
$barrio = $rs['barrio'] ;
$detalles = $rs['detalles'] ;
$fecha_ini = cdate2($rs['fecha_ini']) ;
$fecha_fin = cdate2($rs['fecha_fin']) ;
$promo = "Promocion válida desde el " .$fecha_ini. " hasta ". $fecha_fin;
if($localidad =='Capital Federal') $localidad =  $localidad  . " - ". $barrio;

$descuentos  = $rs['descuentos']. "%" ;
}
?>
<html>
<head>

<META name="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="description" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="description" content= "comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta http-equiv="keywords" content="comidas,lugares para comer, tenedor libre, empanadas, cenas, pizza, restaurant,guia de buenos aires, pastas, delivery, almuerzo, parrila, comida arabe, comida oriental, discos, resto bares, shows, restaurants">
<meta name="robots" content="all|index|follow">
<META name="Author" content="Farias Ernesto, Cristian Magnone">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href= "includes/comermas.css" type=text/css rel=stylesheet>
<title>Comermas - Cupon</title>

 


</head>

<body leftmargin="0" topmargin="0" onLoad="<?=$action?>">
<form name="form1" method="post" action="manager/adm_reply.php">
  <table width="584" height="160" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
    <tr>
      <td width="580"><table width="100%"  border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" height="140" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="216" valign="middle"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="images/cupon.jpg" width="216" height="81"></td>
                </tr>
                <tr>
                  <td class="TitulosTime"><div align="center"><font color="#000000"><?=$descuentos?><br>
                        <span class="Negro8T">
<?=$promo?>
</span> </font></div></td>
                </tr>
              </table></td>
              <td width="5" valign="middle"><img src="botones/gris.jpg" width="1" height="100%"></td>
              <td width="338" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td>
                      <div align="right"><span class="Negro14T">
                        <?=$nombre?>
                    </span><span class="Negro10T"> <? echo "(".$clase . ")";?> </span></div></td>
                  </tr>
                  <tr>
                    <td class="Negro10"><img src="botones/blancogris.gif" width="100%" height="2"></td>
                  </tr>
                  <tr>
                    <td class="Negro10"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="21%"><div align="right"><span class="Negro10T"><strong>Direccion :</strong> </span></div></td>
                          <td width="79%"><span class="Negro10T">
                            <?=$direccion?>
                          </span></td>
                        </tr>
                        <tr>
                          <td><div align="right"><span class="Negro10T"><strong>Localidad :</strong> </span></div></td>
                          <td><span class="Negro10T">
                            <?=$localidad?>
                          </span></td>
                        </tr>
                        <tr>
                          <td><div align="right"><span class="Negro10T"><strong>Telefono :</strong></span></div></td>
                          <td><span class="Negro10T">
                            <?=$telefono?>
                          </span></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="Negro10"><img src="botones/blancogris.gif" width="100%" height="2"></td>
                  </tr>
                  <tr>
                    <td class="Negro10T"><p><em>
                        <?=$detalles?>
</em></p>                      </td>
                  </tr>
                  <tr>
                    <td > </td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
