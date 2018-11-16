<? session_start();


 $reg="no";
 if($_GET["id"] && !empty($_GET["id"])) $reg ="si";



 if($_SESSION["bannertop"] && !empty($_SESSION["bannertop"])) 
		{ 
		$banner =$_SESSION["bannertop"]; 
		} else {
		$banner= "banners/topcarnes.jpg";
		}
		
		include('../dbadmin/check.php'); 
        require_once('../includes/date.php'); 
		require_once('../includes/validador.php'); 
		require_once('../includes/catalog.php'); 
		require_once('regusr_add.php') ;
		 
		  $usrtext = $_SESSION['usernametext'];
		
		 $sql = "SELECT *FROM usuarios  where email= '$usrtext'";
		$mode = "readonly"; 
 
	   $qry = @mysql_query($sql) or die ("1ee");
  	   $rs  = mysql_fetch_Array($qry);
  
	   $id = $rs['id'] ;
   	   $nombre1 =  stripslashes($rs ['nombre']) ;
 	   $apellido =  stripslashes($rs ['apellido']) ;
	   
	   $email =  stripslashes($rs ['email']) ;
 	   
	   $password1 =  stripslashes($rs ['password']) ;
	   $password1c =  stripslashes($rs ['password']) ;
		  
	   $apodo =  stripslashes($rs ['apodo']) ;
 	   
	   $telefono =  stripslashes($rs ['telefono']) ;
	   $barrio =  stripslashes($rs ['barrio']) ;
 	   $como =  stripslashes($rs ['como']) ;
	   $fechac = stripslashes($rs ['fecnac']) ;
	 
	 list($d, $m, $y) = split('[/.-]', $fechac);

 
	  
	   $fecnacd = $d;
		$fecnacm =$m;
		$fecnaca = $y; 
		
		$msgcorreo = "El correo no puede ser modificado. ";
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

<title>ComerMas.com.ar - Lugares para comer - Tenedor libre - Restaurants - Bares - Tenedores libres - Parrilas - Pizzerias - Comida Arabe - Comida Oriental - Discos - Shows - Panaderia - Cafes</title>
<LINK href= "../includes/comermas.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="../includes/functions.js"></SCRIPT> 
<SCRIPT language=javascript src="../includes/functioncm.js"></SCRIPT>  

<SCRIPT TYPE="text/javascript" SRC="../includes/ajax.js" language="javascript1.2"></SCRIPT>

<script language="JavaScript" type="text/JavaScript">

<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
//-->


var w=screen.width;
var h=screen.height;
var mw=(screen.width)?(screen.width-w)/2:100; //centro el form
var mh=(screen.height)?(screen.height-h)/2:100;
this.resizeTo(w,h-40);
this.moveTo(mw,mh);
this.resizeTo(w,h-40);
this.moveTo(mw,mh); 
</script>
</head>

<body bgcolor="AE5959" leftmargin="0" topmargin="0">
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td width="779" height="90"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="90" background="../<?=$banner ?>" bgcolor="ae5959"></td>
              </tr>
              <tr>
                <td width="777" bgcolor="#FFFFFF"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="777" height="19" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="AE5959">
        <tr> 
          <td width="20">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="right">
                <table width="100%"  cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="81%">&nbsp;</td>
                    <td width="14%" height="15" bgcolor="#851549"><div align="center"><a style="text-decoration:none" href="../dbadmin/logout.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cerrar Sesion</font></a></div></td>
                  </tr>
                </table> 
                 
              </div></td>
            </tr>
            <tr>
              <td><img src="../botones/blancogris.gif" width="100%" height="2"></td>
            </tr>
            <tr>
              <td height="1"></td>
            </tr>
          </table>            
            <? if ($msgnewusr == "si") {?>
              <form name="frm" action="" method="post">
		
			<table width="365" height="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="21" colspan="2" align="center">
                    <CENTER>
                      <p><span class="Blanco16">Gracias  su datos se han actualizado en </span><span class="TitulosTime"><br>
                        ComerMas</span><span class="Blanco16"><br>
                        </span><span class="Blanco12"><br>
                        </span><span class="Blanco16"><br>
</span><span class="Estilo15"><br>
                        <a href="../dbadmin/logout.php" class="Naranja10">Cerrar Sesion </a></span><br>
                      </p>
                    </center></td>
                </tr>
              </table>    
			</form>   
			<? } 
			
			if ($msgnewusr == "no") 
			{?>
 
			
   <form   method="post" name="frm" class="BlancoBold14">
   <table width="100%" height="93" border="0" align="center" cellpadding="2" cellspacing="0">         
                <tr bgcolor="#851549">
                  <td height="24"><div align="right">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="716"><div align="right" class="BlancoBold12">  MIS DATOS EN COMERMAS  </div></td>
                          <td width="17"> </td>
                        </tr>
                      </table>
											
                      </div></td>
                </tr>
                <tr>
                  <td height="2" valign="top" align="center"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                </tr>
                <tr class="Blanco12">
                  <td height="18"  ><div align="right">  <? require_once('regusr_text.php')?></div>                  </td>
                </tr>
                <tr>
                  <td height="3"><img src="../botones/blancogris.gif" width="100%" height="2"></td>
                </tr>
                <tr>
                  <td height="21" align="center">                    <div align="right">
                      <input name="btnace" type="button" style="font-size:8pt;color:white;cursor:pointer;margin:0px;padding:0px;border:0;background-color:#851549"  value="Actualizar" onClick="verificardorreg('regusr_update.php?accion=update&id=<?=$id?>')">
                      </div></td>
                </tr>
                <tr>
                  <td height="15"><? 
				  if ($reg=="si") {
				  require_once('../detalles_usuarios_vot.php');
				  }
				  ?></td>
                </tr>
          </table>
 
			</form>
		  <? } ?>
            <div align="right"><br>
              <br> 
            <img src="../banners/logo.gif" width="352" height="86">  </div>
          <div align="center"></div></td>
          <td width="20" height="19" align="right"></td>
        </tr>
      </table>
      <table width="100%"   border="0" cellpadding="0" cellspacing="0">
        
      
        <tr> 
          <td height="1"><img src="../marcos/blanco/blanco.gif" width="1" height="1"></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
