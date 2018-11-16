<?
//include('../../check.php');
//echo $_SESSION['desc'];
 //echo  $_SESSION['username'];
	// include('../../check.php'); 
//	session_start();
//	echo $_SESSION['color'];
//	echo "<br>";
//	echo $_SESSION['color2'];
// ''	
 
	if(isset($_GET["nombre"]) && !empty($_GET["nombre"])) {
	$t = addslashes($_GET["nombre"]); 
	
	
	if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
//	$id = addslashes($_GET["id"]);
//	$tipo = addslashes($_GET["tipo"]);

	 
  
   require_once('../catalog.php');
	 
//		$users_query1 = "SELECT * FROM `$tipo` WHERE `id` ='$id' ";
 //		$users_display = @mysql_query($users_query1) or die("Invalid query: " . mysql_error());
////		$row = @mysql_fetch_array($users_display);  
//		$detalles =  stripslashes($row["detalles"]); 
 
	
	
 
 
//			$detalles = preg_replace("/(\r\n|\r|\n)/i","<br>",$detalle1);
		 

	
	} else {
	$detalles = "<table><tr><td>Ingrese aquí el contenido del texto que desea publicar</table></tr></td>";
	}
// print_r($_POST["textdesc"]);


//echo get_magic_quotes_gpc(); 

//$texto = $detalles


?>

<HTML><HEAD><TITLE>ComerMas - Editor Web</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
 td { font-family:Arial; font-size:9pt; color:darkred; bold:true; }
 th { font-family:Arial; font-size:7pt; color:darkred; bold:true; }
body {
	background-color: #AE5959;
}
body,td,th {
	color: #FFFFFF;
}
</style>
<script>
 

 

function guardaho(codi){
window.opener.document.form1.<? echo $t."add"?>.value = "(Texto Temporal Adjunto.)"
window.opener.document.form1.<? echo $t?>.value = codi;window.close();}


</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body >



 <!-- Paràmetres del DHTML editor --> 
 <script language=javascript > 
 // Esta información corresponde al archivo Dhtmled.js 
 // DHTML Editing Component Constants for JavaScript 
 // 
 // Command IDs 
 // 
 DECMD_BOLD =                      5000 
 DECMD_COPY =                      5002 
 DECMD_CUT =                       5003 
 DECMD_DELETE =                    5004 
 DECMD_DELETECELLS =               5005 
 DECMD_DELETECOLS =                5006 
 DECMD_DELETEROWS =                5007 
 DECMD_FINDTEXT =                  5008 
 DECMD_FONT =                      5009 
 DECMD_GETBACKCOLOR =              5010 
 DECMD_GETBLOCKFMT =               5011 
 DECMD_GETBLOCKFMTNAMES =          5012 
 DECMD_GETFONTNAME =               5013 
 DECMD_GETFONTSIZE =               5014 
 DECMD_GETFORECOLOR =              5015 
 DECMD_HYPERLINK =                 5016 
 DECMD_IMAGE =                     5017 
 DECMD_INDENT =                    5018 
 DECMD_INSERTCELL =                5019 
 DECMD_INSERTCOL =                 5020 
 DECMD_INSERTROW =                 5021 
 DECMD_INSERTTABLE =               5022 
 DECMD_ITALIC =                    5023 
 DECMD_JUSTIFYCENTER =             5024 
 DECMD_JUSTIFYLEFT =               5025 
 DECMD_JUSTIFYRIGHT =              5026 
 DECMD_LOCK_ELEMENT =              5027 
 DECMD_MAKE_ABSOLUTE =             5028 
 DECMD_MERGECELLS =                5029 
 DECMD_ORDERLIST =                 5030 
 DECMD_OUTDENT =                   5031 
 DECMD_PASTE =                     5032 
 DECMD_REDO =                      5033 
 DECMD_REMOVEFORMAT =              5034 
 DECMD_SELECTALL =                 5035 
 DECMD_SEND_BACKWARD =             5036 
 DECMD_BRING_FORWARD =             5037 
 DECMD_SEND_BELOW_TEXT =           5038 
 DECMD_BRING_ABOVE_TEXT =          5039 
 DECMD_SEND_TO_BACK =              5040 
 DECMD_BRING_TO_FRONT =            5041 
 DECMD_SETBACKCOLOR =              5042 
 DECMD_SETBLOCKFMT =               5043 
 DECMD_SETFONTNAME =               5044 
 DECMD_SETFONTSIZE =               5045 
 DECMD_SETFORECOLOR =              5046 
 DECMD_SPLITCELL =                 5047 
 DECMD_UNDERLINE =                 5048 
 DECMD_UNDO =                      5049 
 DECMD_UNLINK =                    5050 
 DECMD_UNORDERLIST =               5051 
 DECMD_PROPERTIES =                5052 
 
 // 
 // Enums 
 // 
 
 // OLECMDEXECOPT   
 OLECMDEXECOPT_DODEFAULT =         0  
 OLECMDEXECOPT_PROMPTUSER =        1 
 OLECMDEXECOPT_DONTPROMPTUSER =    2 
 
 // DHTMLEDITCMDF 
 DECMDF_NOTSUPPORTED =             0  
 DECMDF_DISABLED =                 1  
 DECMDF_ENABLED =                  3 
 DECMDF_LATCHED =                  7 
 DECMDF_NINCHED =                  11 
 
 // DHTMLEDITAPPEARANCE 
 DEAPPEARANCE_FLAT =               0 
 DEAPPEARANCE_3D =                 1  
 
 // OLE_TRISTATE 
 OLE_TRISTATE_UNCHECKED =          0 
 OLE_TRISTATE_CHECKED =            1 
 OLE_TRISTATE_GRAY =               2 
 var obj_editor = 0 ; 
 // Per canvis de gifs a la barra d'icones: 
 function canvi_imatge(nom_img,graf){ 
 document.images[nom_img].src = graf; 
 return true; 
 } 
 
 // Utilitats auxiliars per paletes de colors: 
 
 function MakeArray(n) 
 { 
 this.length=n 
 for(var j=1; j<=n; j++){ 
 this[n]=0 
 } 
 return this 
 } 
 colors= new MakeArray(140); 
 colors[0]='aliceblue' 
 colors[1]='antiquewhite' 
 colors[2]='aqua' 
 colors[3]='aquamarine' 
 colors[4]='azure' 
 colors[5]='beige' 
 colors[6]='bisque' 
 colors[7]='black' 
 colors[8]='blanchedalmond' 
 colors[9]='blue' 
 colors[10]='blueviolet' 
 colors[11]='brown' 
 colors[12]='burlywood' 
 colors[13]='cadetblue' 
 colors[14]='chartreuse' 
 colors[15]='chocolate' 
 colors[16]='coral' 
 colors[17]='cornflower' 
 colors[18]='cornsilk' 
 colors[19]='crimson' 
 colors[20]='cyan' 
 colors[21]='darkblue' 
 colors[22]='darkcyan' 
 colors[23]='darkgoldenrod' 
 colors[24]='darkgray' 
 colors[25]='darkgreen' 
 colors[26]='darkkhaki' 
 colors[27]='darkmagenta' 
 colors[28]='darkolivegreen' 
 colors[29]='darkorange' 
 colors[30]='darkorchid' 
 colors[31]='darkred' 
 colors[32]='darksalmon' 
 colors[33]='darkseagreen' 
 colors[34]='darkslateblue' 
 colors[35]='darkslategray' 
 colors[36]='darkturquoise' 
 colors[37]='darkviolet' 
 colors[38]='deeppink' 
 colors[39]='deepskyblue' 
 colors[40]='dimgray' 
 colors[41]='dodgerblue' 
 colors[42]='firebrick' 
 colors[43]='floralwhite' 
 colors[44]='forestgreen' 
 colors[45]='fuchia' 
 colors[46]='gainsboro' 
 colors[47]='ghostwhite' 
 colors[48]='gold' 
 colors[49]='goldenrod' 
 colors[50]='gray' 
 colors[51]='green' 
 colors[52]='greenyellow' 
 colors[53]='honeydew' 
 colors[54]='hotpink' 
 colors[55]='indianred' 
 colors[56]='indigo' 
 colors[57]='ivory' 
 colors[58]='khaki' 
 colors[59]='lavender' 
 colors[60]='lavenderblush' 
 colors[61]='lawngreen' 
 colors[62]='lemonchiffon' 
 colors[63]='lightblue' 
 colors[64]='lightcoral' 
 colors[65]='lightcyan' 
 colors[66]='lightgoldenrodyellow' 
 colors[67]='lightgreen' 
 colors[68]='lightgrey' 
 colors[69]='lightpink' 
 colors[70]='lightsalmon' 
 colors[71]='lightseagreen' 
 colors[72]='lightskyblue' 
 colors[73]='lightslategray' 
 colors[74]='lightsteelblue' 
 colors[75]='lightyellow' 
 colors[76]='lime' 
 colors[77]='limegreen' 
 colors[78]='linen' 
 colors[79]='magenta' 
 colors[80]='maroon' 
 colors[81]='mediumaquamarine' 
 colors[82]='mediumblue' 
 colors[83]='mediumorchid' 
 colors[84]='mediumpurple' 
 colors[85]='mediumseagreen' 
 colors[86]='mediumslateblue' 
 colors[87]='mediumspringgreen' 
 colors[88]='mediumturquoise' 
 colors[89]='mediumvioletred' 
 colors[90]='midnightblue' 
 colors[91]='mintcream' 
 colors[92]='mistyrose' 
 colors[93]='moccasin' 
 colors[94]='navajowhite' 
 colors[95]='navy' 
 colors[96]='oldlace' 
 colors[97]='olive' 
 colors[98]='olivedrab' 
 colors[99]='orange' 
 colors[100]='orangered' 
 colors[101]='orchid' 
 colors[102]='palegoldenrod' 
 colors[103]='palegreen' 
 colors[104]='paleturquoise' 
 colors[105]='palevioletred' 
 colors[106]='papayawhip' 
 colors[107]='peachpuff' 
 colors[108]='peru' 
 colors[109]='pink' 
 colors[110]='plum' 
 colors[111]='powderblue' 
 colors[112]='purple' 
 colors[113]='red' 
 colors[114]='rosybrown' 
 colors[115]='royalblue' 
 colors[116]='saddlebrown' 
 colors[117]='salmon' 
 colors[118]='sandybrown' 
 colors[119]='seagreen' 
 colors[120]='seashell' 
 colors[121]='sienna' 
 colors[122]='silver' 
 colors[123]='skyblue' 
 colors[124]='slateblue' 
 colors[125]='slategray' 
 colors[126]='snow' 
 colors[127]='springgreen' 
 colors[128]='steelblue' 
 colors[129]='tan' 
 colors[130]='teal' 
 colors[131]='thistle' 
 colors[132]='tomato' 
 colors[133]='turquoise' 
 colors[134]='violet' 
 colors[135]='wheat' 
 colors[136]='white' 
 colors[137]='whitesmoke' 
 colors[138]='yellow' 
 colors[139]='yellowgreen' 
 	function taula_colors(){ 
 var t=0,taco 
 taco='<center><br><br><table border=1 cellspacing=0 cellpadding=0>'; 
 while(t<140){ 
 if(t%16==0){ 
 if(t!=0){ 
 taco+='</tr>' 
 } 
 taco+='<tr>' 
 } 
 taco+='<td bgcolor="'+colors[t]+'" ><a href=javascript:canvi("'+colors[t]+'"); ><img src="images/trans.gif" border=0 width=18 height=18 alt="'+colors[t]+'"></a></td>'; 
 t++ 
 } 
 taco+='</tr></table></center>' 
 return taco 
 } 
 function paleta_colors(ruta_funct){ 
 var pal_col, k, tc 
 pal_col=window.open("","paleta_colors","screenX=80,screenY=80,width=360,height=250") 
 pal_col.document.open() 
 k=pal_col.document; 
 k.writeln("<html><head><style> td,body { font-family:Arial; font-size:8pt; } </style> <script> function canvi(hexa) { "+ruta_funct+"(hexa); window.close(); }</"+"script></head><body bgcolor=white ><center>") 
 k.writeln("<font color=black face=arial size=-1 ><b> Haga Click sobre el Color de su Elección:</b></font>") 
 tc=taula_colors() 
 k.writeln(tc) 
 k.writeln("</center></body></html>") 
 k.close() 
 pal_col.focus() 
 } 
 function contingut_html(nom_editor) { 
 var obj_ed = eval("document." + nom_editor); 
 var cont = obj_ed.DocumentHTML; 
 var texto = "" + cont 
 var complet = eval(nom_editor + '_doc_complet');
 if(!complet){ 
	texto = strip_body(texto); 
 } 
 return texto 
 } 
 function posa_contingut_html(nom_editor,contingut) { 
 var obj_ed = eval("document." + nom_editor); 
 obj_ed.DocumentHTML = contingut;
 } 
 function strip_body(cont) { 
 var  ini_cos = cont.search(/<BODY/i); 
 if( ini_cos == -1 ){ 
 	return cont; 
 } 
 var  lon = cont.length 
 var  fi = false 
 var prob = false 
 var  i = ini_cos + 5 
 while( !fi ){ 
 car = cont.charAt(i); 
 if( car == '>' ){ 
 ini_cos = i + 1  
 fi = true 
 } 
 if( car == '"' || car == "'" ){ 
 fi_com = false 
 i++ 
 if( i >= lon ){ 
 fi = true; 
 prob = true; 
 fi_com = true; 
 } 
 while( !fi_com ){ 
 car_aux = cont.charAt(i); 
 if( car_aux == car ){ 
 fi_com = true 
 } 
 else 
 { 
 i++; 
 } 
 if( i >= lon ){ 
 fi = true; 
 prob = true; 
 fi_com = true; 
 } 
 } 
 } 
 i++; 
 if( i >= lon ){ 
 fi = true; 
 prob = true; 
 } 
 } 
 if( prob == true ){ 
 alert('Debido a problemas con el código HTML de la pàgina no se puede ejecutar esta acción.'); 
 } 
 else 
 { 
 var fi_cos = cont.search(/<\/BODY/i); 
 var aux = cont.substring(ini_cos,fi_cos)
 cont = aux 
 } 
 return cont;
 }
 function nou_doc(){ 
 if( confirm('Si genera un nuevo documento perderá los cambios no guardados del documento actual.\nEstá Seguro que desea continuar?') && confirm('Está seguro que desea crear un nuevo documento y perder los cambios no guardados del documento actual ?') ){ 
 obj_editor.NewDocument(); 
 } 
 } 
 function cortar() { 
 obj_editor.ExecCommand(DECMD_CUT,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function copiar() { 
 obj_editor.ExecCommand(DECMD_COPY,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function pegar(){ 
 obj_editor.ExecCommand(DECMD_PASTE,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function desfer() { 
 obj_editor.ExecCommand(DECMD_UNDO,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function refer() { 
 obj_editor.ExecCommand(DECMD_REDO,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function cercar() { 
 obj_editor.ExecCommand(DECMD_FINDTEXT,OLECMDEXECOPT_PROMPTUSER); 
 //obj_editor.focus(); 
 } 
 function fer_link() { 
 obj_editor.ExecCommand(DECMD_HYPERLINK,OLECMDEXECOPT_PROMPTUSER); 
 //obj_editor.focus(); 
 } 
 function ins_img() { 
 obj_editor.ExecCommand(DECMD_IMAGE,OLECMDEXECOPT_PROMPTUSER); 
 //obj_editor.focus(); 
 } 
 function mostra_insert_table() { 
 var pVar = document.ObjTableInfo; 
 var NR = pVar.NumRows; 
 var NC = pVar.NumCols; 
 var TA = pVar.TableAttrs; 
 var CA = pVar.CellAttrs; 
 var funct = 'opener.inserta_table' 
 var par_tab, k, tc 
 par_tab=window.open("","param_tables","screenX=80,screenY=80,width=400,height=215") 
 par_tab.document.open() 
 k=par_tab.document 
 k.writeln('<HTML><HEAD><TITLE>Definició de Taula</TITLE>') 
 k.writeln('<STYLE TYPE="text/css">')  
 k.writeln(" td,body { font-family:Arial; font-size:9pt; font-weight:bold; } ") 
 k.writeln('</STYLE>') 
 k.writeln("<script> function comprova_valors() { ") 
 k.writeln("           var nf, nc, at, ac, tit, nerr=0 , avis") 
 k.writeln("           avis = '\\nNo se puede crear la tabla porque:' ") 
 k.writeln("           nf = document.info_table.NumRows.value") 
 k.writeln("           nc = document.info_table.NumCols.value") 
 k.writeln("           at = document.info_table.TableAttrs.value") 
 k.writeln("           ac = document.info_table.CellAttrs.value") 
 k.writeln("           tit = document.info_table.Caption.value") 
 k.writeln("           if( nf != parseInt(nf) || nf < 0 ){ ") 
 k.writeln("               nerr++") 
 k.writeln("               avis += '\\n\\n-El numero de filas debe ser un entero positivo.'") 
 k.writeln("           }") 
 k.writeln("           if( nc != parseInt(nc) || nc < 0 ){ ") 
 k.writeln("               nerr++") 
 k.writeln("               avis += '\\n\\n-El numero de columnas debe ser un entero positivo.'") 
 k.writeln("           }") 
 k.writeln("           if( nerr == 0){ ") 
 k.writeln("               "+funct+"(nf,nc,at,ac,tit) ") 
 k.writeln("               window.close(); ") 
 k.writeln("           }") 
 k.writeln("           else") 
 k.writeln("           {") 
 k.writeln("             alert(avis)") 
 k.writeln("           }") 
 k.writeln("           return true ") 
 k.writeln("         }</"+"script>") 
 k.writeln('</HEAD><BODY bgcolor=white ><center>') 
 k.writeln('<form name=info_table onsubmit="comprova_valors();" >'); 
 k.writeln("<font color=black face=arial size=-1 ><b> Pon los valores de los parámetros i pulsa OK:</b></font>") 
 k.writeln('<TABLE CELLSPACING=10><TR><TD valign=absmiddle >Files:&nbsp;&nbsp;&nbsp;<INPUT TYPE=TEXT SIZE=3  maxlength=2 NAME=NumRows value='+NR+' ></TD>') 
 k.writeln('<TD valign=absmiddle >Columnes:&nbsp;&nbsp;&nbsp;<INPUT TYPE=TEXT SIZE=3 maxlength=2 NAME=NumCols value='+NC+'></TD></TR>') 
 k.writeln('<TR><TD>Atributs de la taula:</TD><TD valign=absmiddle ><INPUT TYPE=TEXT SIZE=20 NAME=TableAttrs maxlength=120 value='+TA+'></TD></TR>') 
 k.writeln('<TR><TD>Atributs cel·la:</TD><TD><INPUT TYPE=TEXT SIZE=20 NAME=CellAttrs value='+CA+'></TD></TR>') 
 k.writeln('<TR><TD>Títol de la taula:</TD><TD><INPUT TYPE=TEXT SIZE=20 NAME=Caption ></TD></TR></TABLE>') 
 k.writeln('<TR><TD valign=absmiddle colspan=2 align=center ><INPUT TYPE=BUTTON NAME=OK VALUE=OK onclick="comprova_valors()" ></TD></TR></TABLE></form>') 
 k.writeln('</center></BODY></HTML>') 
 k.close() 
 par_tab.focus() 
 return true 
 } 
 function inserta_table(nf,nc,at,ac,tit) { 
 var pVar = document.ObjTableInfo; 
 pVar.NumRows = nf; 
 pVar.NumCols = nc; 
 pVar.TableAttrs = at; 
 pVar.CellAttrs = ac; 
 obj_editor.ExecCommand(DECMD_INSERTTABLE,OLECMDEXECOPT_DODEFAULT, pVar); 
 return true; 
 } 
 function insert_fila_table() { 
 obj_editor.ExecCommand(DECMD_INSERTROW,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function elim_fila_table() { 
 obj_editor.ExecCommand(DECMD_DELETEROWS,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function insert_col_table() { 
 obj_editor.ExecCommand(DECMD_INSERTCOL,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function elim_col_table() { 
 obj_editor.ExecCommand(DECMD_DELETECOLS,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function insert_celda_table() { 
 obj_editor.ExecCommand(DECMD_INSERTCELL,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function elim_celda_table() { 
 obj_editor.ExecCommand(DECMD_DELETECELLS,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function combinar_celdas_table() { 
 obj_editor.ExecCommand(DECMD_MERGECELLS,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function split_celdas_table() { 
 obj_editor.ExecCommand(DECMD_SPLITCELL,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function FontName_onchange(sel_obj) { 
 var ty = sel_obj.options[sel_obj.selectedIndex].value; 
 if( ty != 0 ){ 
 obj_editor.ExecCommand(DECMD_SETFONTNAME, OLECMDEXECOPT_DODEFAULT, ty); 
 //obj_editor.SetFocus(); 
 } 
 sel_obj.options[0].selected = true 
 } 
 function FontSize_onchange(sel_obj) { 
 var sz = sel_obj.options[sel_obj.selectedIndex].value; 
 if( sz != 0 ){ 
 obj_editor.ExecCommand(DECMD_SETFONTSIZE, OLECMDEXECOPT_DODEFAULT, sz); 
 //obj_editor.focus(); 
 } 
 sel_obj.options[0].selected = true 
 } 
 function negreta(){ 
 obj_editor.ExecCommand(DECMD_BOLD,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 return false; 
 } 
 function cursiva() { 
 obj_editor.ExecCommand(DECMD_ITALIC,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.SetFocus(); 
 } 
 function subry() { 
 obj_editor.ExecCommand(DECMD_UNDERLINE,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function mostra_pal_fg_color(){ 
 paleta_colors('opener.fg_color_posa') 
 return true; 
 } 
 function fg_color_posa(arr) { 
 if (arr != null) { 
 obj_editor.ExecCommand(DECMD_SETFORECOLOR,OLECMDEXECOPT_DODEFAULT, arr); 
 } 
 } 
 function mostra_pal_bg_color(){ 
 paleta_colors('opener.bg_color_posa') 
 return true; 
 } 
 function bg_color_posa(arr) { 
 if (arr != null) { 
 obj_editor.ExecCommand(DECMD_SETBACKCOLOR,OLECMDEXECOPT_DODEFAULT, arr); 
 } 
 } 
 function alin_dreta() { 
 obj_editor.ExecCommand(DECMD_JUSTIFYRIGHT,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function centrat() { 
 obj_editor.ExecCommand(DECMD_JUSTIFYCENTER,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function alin_esq() { 
 obj_editor.ExecCommand(DECMD_JUSTIFYLEFT,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function llista_numerada() { 
 obj_editor.ExecCommand(DECMD_ORDERLIST,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function llista_no_num() { 
 obj_editor.ExecCommand(DECMD_UNORDERLIST,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function indentat() { 
 obj_editor.ExecCommand(DECMD_INDENT,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 function deindentat() { 
 obj_editor.ExecCommand(DECMD_OUTDENT,OLECMDEXECOPT_DODEFAULT); 
 //obj_editor.focus(); 
 } 
 </script> <script language=javascript >
 var Ed1_doc_complet = 0;
 
 function Ed1_guardar() { 
 var cont = contingut_html('Ed1'); 
 document.Ed1_doc_html.Ed1_contingut_html.value = cont; 
 guardaho(cont);
 } 
 
 
 </script><table width="417" height="345" border=1 cellpadding=0 cellspacing=2 bgcolor=silver >
   <tr><td width="625" height="339" valign="top"><FORM NAME="Ed1_doc_html" METHOD="Post" ACTION="" >
     <input type=hidden name="Ed1_contingut_html" value="" >
       <font color="#FFFFFF" face="Verdana" size="2"><b>
       </b></font>      <table cellspacing=0 cellpadding=0 border=0 hspace=3 >
         <tr>
           <td width="15" valign=middle > &nbsp;&nbsp;&nbsp; </td>
           <td width="23" valign=middle > <a href=''  onclick="obj_editor=Ed1; canvi_imatge('Ed1_guard','images/save.gif'); Ed1_guardar(); return false;" onmouseover="canvi_imatge('Ed1_guard','images/save_focus.gif');" onmouseout="canvi_imatge('Ed1_guard','images/save.gif')" ><img name='Ed1_guard' src='images/save.gif' alt='Guardar' border=0 align=absmiddle ></a> </td>
           <td width="9" valign=middle > <img src='images/separator.gif' border=0 align=absmiddle > </td>
           <td width="26" valign=middle > <a href=''  onclick="obj_editor=Ed1; cortar(); return false;" onmouseover="canvi_imatge('Ed1_cort','images/cut_focus.gif');" onmouseout="canvi_imatge('Ed1_cort','images/cut.gif')" ><img name='Ed1_cort' src='images/cut.gif' alt='Cortar' border=0 align=absmiddle ></a> </td>
           <td width="26" valign=middle > <a href=''  onclick="obj_editor=Ed1; copiar(); return false;" onmouseover="canvi_imatge('Ed1_cop','images/copy_focus.gif');" onmouseout="canvi_imatge('Ed1_cop','images/copy.gif')" ><img name='Ed1_cop' src='images/copy.gif' alt='Copiar' border=0 align=absmiddle ></a> </td>
           <td width="26" valign=middle > <a href='' onclick="obj_editor=Ed1; pegar(); return false;" onmouseover="canvi_imatge('Ed1_paster','images/paste_focus.gif');" onmouseout="canvi_imatge('Ed1_paster','images/paste.gif')" ><img name='Ed1_paster' src='images/paste.gif' alt='Pegar' border=0 align=absmiddle ></a> </td>
           <td width="9" valign=middle > <img src='images/separator.gif' border=0 align=absmiddle > </td>
           <td width="26" valign=middle > <a href=''  onclick="obj_editor=Ed1; desfer(); return false;" onmouseover="canvi_imatge('Ed1_ud','images/undo_focus.gif');" onmouseout="canvi_imatge('Ed1_ud','images/undo.gif')" ><img name='Ed1_ud' src='images/undo.gif' alt='Deshacer' border=0 align=absmiddle ></a> </td>
           <td width="27" valign=middle > <a href='' onclick="obj_editor=Ed1; refer(); return false;" onmouseover="canvi_imatge('Ed1_rd','images/redo_focus.gif');" onmouseout="canvi_imatge('Ed1_rd','images/redo.gif')" ><img name='Ed1_rd' src='images/redo.gif' alt='Hacer de nuevo' border=0 align=absmiddle ></a> </td>
           <td width="15" valign=middle > <img src='images/separator.gif' border=0 align=absmiddle > </td>
           <td width="23" valign=middle > <a href=''  onclick="obj_editor=Ed1; canvi_imatge('Ed1_fi','images/find.gif'); cercar(); return false;" onmouseover="canvi_imatge('Ed1_fi','images/find_focus.gif');" onmouseout="canvi_imatge('Ed1_fi','images/find.gif')" ><img name='Ed1_fi' src='images/find.gif' alt='Buscar' border=0 align=absmiddle ></a> </td>
           <td width="10" valign=middle > <img src='images/separator.gif' border=0 align=absmiddle > </td>
           <td width="25" valign=middle > <a href=''  onclick="obj_editor=Ed1; canvi_imatge('Ed1_lnk','images/link.gif'); fer_link(); return false;" onmouseover="canvi_imatge('Ed1_lnk','images/link_focus.gif');" onmouseout="canvi_imatge('Ed1_lnk','images/link.gif')" ><img name='Ed1_lnk' src='images/link.gif' alt='Insertar enlace' border=0 align=absmiddle ></a> </td>
           <td width="32" valign=middle > <img src='images/separator.gif' border=0 align=absmiddle ><a href=''  onclick="obj_editor=Ed1; alin_esq(); return false;" onmouseover="canvi_imatge('Ed1_ae','images/left_focus.gif');" onmouseout="canvi_imatge('Ed1_ae','images/left.gif')" ><img name='Ed1_ae' src='images/left.gif' alt='Alinear a la izquierda' border=0 align=absmiddle ></a> </td>
           <td width="27" valign=middle ><a href=''  onclick="obj_editor=Ed1; centrat(); return false;" onmouseover="canvi_imatge('Ed1_center','images/center_focus.gif');" onmouseout="canvi_imatge('Ed1_center','images/center.gif')" ><img name='Ed1_center' src='images/center.gif' alt='Centrar' border=0 align=absmiddle ></a></td>
           <td width="24" valign=middle ><a href='' onclick="obj_editor=Ed1; alin_dreta(); return false;" onmouseover="canvi_imatge('Ed1_ad','images/right_focus.gif');" onmouseout="canvi_imatge('Ed1_ad','images/right.gif')" ><img name='Ed1_ad' src='images/right.gif' alt='Alinear a la derecha' border=0 align=absmiddle ></a></td>
           <td width="10" valign=middle >&nbsp; </td>
           <td width="25" valign=middle ><a href=''  onclick="obj_editor=Ed1; deindentat(); return false;" onmouseover="canvi_imatge('Ed1_deind','images/deindent_focus.gif');" onmouseout="canvi_imatge('Ed1_deind','images/deindent.gif')" ><img name='Ed1_deind' src='images/deindent.gif' alt='Deindentar' border=0 align=absmiddle ></a></td>
           <td width="26" valign=middle ><a href=''  onclick="obj_editor=Ed1; indentat(); return false;" onmouseover="canvi_imatge('Ed1_ind','images/inindent_focus.gif');" onmouseout="canvi_imatge('Ed1_ind','images/inindent.gif')" ><img name='Ed1_ind' src='images/inindent.gif' alt='Indentar' border=0 align=absmiddle ></a></td>
         </tr>
       </table>      <table cellspacing=0 cellpadding=0 border=0 >
<tr>
<td valign=middle >
	&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td valign=middle >
<select name="Ed1_FontName" style="width:140" TITLE="Font Name" LANGUAGE="javascript" onchange="obj_editor=Ed1; return FontName_onchange(this)"> <option value="0" selected >Sel. Tipo Fuente	<option value="Verdana" >Verdana
    <option value="Arial" >Arial
    <option value="Tahoma">Tahoma
    <option value="Courier New">Courier New
    <option value="Times New Roman" >Times New Roman
    <option value="Wingdings">Wingdings
  </select>
</td>
<td valign=middle >
<select name="Ed1_FontSize" style="width:40" TITLE="Font Size" LANGUAGE="javascript" onchange="obj_editor = Ed1; return FontSize_onchange(this)"> <option value="0" selected >Sel. Tamaño Fuente    <option value="1">1
    <option value="2">2
    <option value="3">3
    <option value="4">4
    <option value="5">5
    <option value="6">6
    <option value="7">7
  </select>
</td>
<td valign=middle >

	<img src='images/separator.gif' border=0 align=absmiddle > </td>
<td valign=middle >

	<a href=""  onclick="obj_editor=Ed1; negreta(); return false;"  onmouseover="canvi_imatge('Ed1_negr','images/bold_focus.gif');" onmouseout="canvi_imatge('Ed1_negr','images/bold.gif')" ><img src='images/bold.gif' alt='Negrita' border=0 align=absmiddle name='Ed1_negr' ></a> </td>
<td valign=middle >

	<a href=''  onclick="obj_editor=Ed1; cursiva(); return false;" onmouseover="canvi_imatge('Ed1_curs','images/italic_focus.gif');" onmouseout="canvi_imatge('Ed1_curs','images/italic.gif')" ><img name='Ed1_curs' src='images/italic.gif' alt='Cursiva' border=0 align=absmiddle ></a> </td>
<td valign=middle >

	<a href=''  onclick="obj_editor=Ed1; subry(); return false;" onmouseover="canvi_imatge('Ed1_subr','images//under_focus.gif');" onmouseout="canvi_imatge('Ed1_subr','images/under.gif')" ><img name='Ed1_subr' src='images/under.gif' alt='Subrayado' border=0 align=absmiddle ></a> </td>
<td valign=middle >&nbsp;	 </td>
<td valign=middle >

	<a href=''  onclick="obj_editor=Ed1; canvi_imatge('Ed1_fg','images/fgcolor.gif'); mostra_pal_fg_color(); return false;" onmouseover="canvi_imatge('Ed1_fg','images/fgcolor_focus.gif');" onmouseout="canvi_imatge('Ed1_fg','images/fgcolor.gif')" ><img name='Ed1_fg' src='images/fgcolor.gif' alt='Color de fuente' border=0 align=absmiddle ></a> </td>
<td valign=middle >

	<a href=''  onclick="obj_editor=Ed1; canvi_imatge('Ed1_bg','images/bgcolor.gif'); mostra_pal_bg_color(); return false;" onmouseover="canvi_imatge('Ed1_bg','images/bgcolor_focus.gif');" onmouseout="canvi_imatge('Ed1_bg','images/bgcolor.gif')" ><img name='Ed1_bg' src='images/bgcolor.gif' alt='Color de fondo de texto' border=0 align=absmiddle ></a> </td>
<td valign=middle >&nbsp;		 	 </td>
<td valign=middle >

	<a href=''  onclick="obj_editor=Ed1; llista_numerada(); return false;" onmouseover="canvi_imatge('Ed1_nl','images/numlist_focus.gif');" onmouseout="canvi_imatge('Ed1_nl','images/numlist.gif')" ><img name='Ed1_nl' src='images/numlist.gif' alt='Lista numerada' border=0 align=absmiddle ></a> </td>
<td valign=middle >

	<a href='' onclick= "obj_editor=Ed1; llista_no_num(); return false;" onmouseover="canvi_imatge('Ed1_ul','images/bullist_focus.gif');" onmouseout="canvi_imatge('Ed1_ul','images/bullist.gif')" ><img name='Ed1_ul' src='images/bullist.gif' alt='Lista no numerada' border=0 align=absmiddle ></a> </td>
<td><!-- DEInsertTableParam Object --><object ID="ObjTableInfo" CLASSID="clsid:47B0DFC7-B7A3-11D1-ADC5-006008A5848C" width=2 height=2 VIEWASTEXT></object></td></tr></table><object CLASSID="clsid:2D360201-FFF5-11D1-8D03-00A0C959BC0A" codebase="89780789078907807890" width=411 height=256 ID="Ed1" VIEWASTEXT >
  <param name=Scrollbars value=true>
  <embed src="true" width="411" height="256" scrollbars="true"></embed>
</object>
<font color="#FFFFFF" face="Verdana" size="2"><b>
<textarea name="text1" cols="1" rows="1" id="textarea6" style="width=0px;border:0;visibility: hidden;"><?=$detalles ?>
       </textarea>
</b></font> </table>
<script language =javascript >


 Ed1_timerID=setInterval("Ed1_inicial()",100);

 function Ed1_inicial(){ 
 if( document["Ed1"]){ 
 obj_editor = document.Ed1; 
 document.Ed1.DocumentHTML = window.opener.document.form1.<? echo $t?>.value 
 // window.document.Ed1_doc_html.text1.value
 clearInterval(Ed1_timerID);
 } 
 return true;
 } 
 </script> </body>
<? 
} else {
echo "Error Cargando Pagina";

}

?>