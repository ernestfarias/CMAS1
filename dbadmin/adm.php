
<?

// *******
//'ADM de la page para los adms, siempre viene aca despues del login si el permiso es de adm se queda 
//'sino lo manda a admparausr.asp.
//'cuando postea tambien postea los datos del usuario permiso y passwor para el admadd.asp
//'no hay que chequear mas nada porque entran solamente los que tienen el permiso todocomermas
//'to do ,fijarse a la hora de agregar un modulo de postearle el permiso
//'By eaf
//'*******


   include('check.php'); 


require_once('../includes/catalog.php');
session_start();
?>

<HTML>
<HEAD>
<title>SuperAdmin</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<script language="JavaScript" type="text/JavaScript">
var w=screen.width;
var h=screen.height;
var mw=(screen.width)?(screen.width-w)/2:100; //centro el form
var mh=(screen.height)?(screen.height-h)/2:100;
this.resizeTo(w,h-40);//pantalla completa
//this.resizeTo(w/3,h/2);
this.moveTo(mw,mh);
 
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
</script>


<? 
  $usrtext = $_SESSION['usernametext'];

//es adm mostrar todo y abrir base
//include ('dbconn.php');
echo '<BODY >';
echo 'Bienvenido: <b>'.$usrtext ."</b><br>";
echo "Fecha/Hora :".date ('d-m-Y')." - ".date('H:m:s')."<br>";
//BASE por DEFAULT
//$DBdef='rm000120_comermas';
$permiso  = $_SESSION['permiso'];


?>
<div align="center"><strong><a style="text-decoration:none" href="logout.php"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">CERRAR SESION</font></a></strong></div>

<? if ($permiso =="todocomermas") {
//echo '<br>'.$_POST['txtbase'];

if ($_SESSION['base']="") //si no elijio una base que quiera abrir la default
$_SESSION['base']=$DBdef;
else {
$_SESSION['base']=$_POST['txtbase'];
}

//echo '<br>Base:'.$_SESSION['base'];
$DB=$_SESSION['base'];

$t="'";
//Muestro Bases, cuando se hace la conn el usuario tiene que tenr acceso en las bases para que quieren verse
echo '<form name="frmbases" action="adm.php" method="post">'; //este form cambia
echo '<input type="hidden" name="txtbase" value=""></input>';
echo 'Lista de Bases de datos:<br>';
$SQLQ= @mysql_query('show databases');
 while ($RS1 = mysql_fetch_Array($SQLQ))
 {
 echo '<button name="'.$RS1[0].'" onclick="document.frmbases.txtbase.value=this.name;frmbases.submit()">'.$RS1[0].'</button>';
 }
 echo '</form>';
 
 // echo 'base elejida:'.$DB.'';
 echo '<br>';

 //muestro tablas de la base
 
 if(isset($DB) && !empty($DB)) {
 echo 'Tablas de: <b>'.$DB.'</b><br>';
 $tablas=mysql_list_tables($DB);
  for($i=0;$i<mysql_num_rows($tablas);$i++){
  echo '<button name='.mysql_tablename($tablas,$i).' onclick="document.frm.txttable.value=this.name;document.frm.txtquery.value='.$t.'SELECT * FROM '.$t.' + this.name">'.mysql_tablename($tablas,$i).'</button>';
  }
 
 }
 



 ?>
<center><form name="frm" action="dbshow.php" method="post">
<b>Query:</b><input type="text" name="txtquery" size="100"></input><br>
    <b>Tabla:</b><input type="text" name="txttable" ></input>
<input type="submit"  value="OK" ></input>
<input name="ckquery" type="checkbox" id="ckquery" value="on">
&lt;-Query Manual
<BR> 
<b>Registros Por Pagina:</b><input type="text" name="txtreg" value="12" size="4" maxlength="4"></input>
</form></center>
 <? }?>
<center><a  href="../index.php">Ir al Index</a></center>
<CENTER><b>------------------------------------------------------------------------------<br>
</b>
  <form name="form1" method="post" action="adm_reservas.php">
    <input type="submit" value="Ver Reservas por persona">
    </form>
   <form name="form1" method="post" action="adm_reservas_order.php">
    <input type="submit" value="Ver Reservas por lugar ">
   </form>
   
    <form name="form1" method="post" action="adm_enviar_mails.php">
    <input type="submit" value="Enviardor de Mails ">
   </form>
  <b>  </b>


</CENTER>


 
