<SCRIPT language="JavaScript">
 function Zoom(nombre,aumento) 
	{
	nombre.style.width=parseInt(nombre.style.width)+aumento+"px";
	nombre.style.height=parseInt(nombre.style.height)+aumento+"px";
	}
 
 
</script>
<style type="text/css">
<!--
.BG7 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}


.RGBsmall { 
    font-size: 10px; 
    color: #FFFFFF; 
    background: transparent; 
} 
.BG7 { 
    color: #000000; 
   /* background: #ae5959; */
} 
.ATTENTION { 
    color: #000000; 
    font-weight: bold; 
    background : transparent; 
} 
 

.ATTENTIONsmall
{
  font-weight: bold; 
    background : transparent; 
color: #FFFFFF;
}
.small {
color: #FFCC99;
 
	text-decoration:no;
 background : transparent; 
}


 
-->
</style>
<? 
 
$db_username = "rm000120_comerma"; 
$db_password = "caca256"; 
$db_name =  "rm000120_comermas";  
 

$mysql_link = mysql_connect( "localhost", "$db_username", "$db_password") or die( "Unable to connect to database server"); 
@mysql_select_db( "$db_name") or die( "Unable to select database"); 

function recordsetNav(&$db_connect,$db_query,$page_url,$qry_url='',$offset=0,$limit=0,$tablewidth='100%',$verbiage=1,$ver=1) 
{      
  $navstring = "";
    $db_result = @mysql_query($db_query,$db_connect); 
    $totalrecords = @mysql_num_rows($db_result); 
    $pagenumber = ($offset + $limit) / $limit; 
    $totalpages = intval($totalrecords/$limit); 
	 $cantidadporpagina = 10;
    if ($totalrecords%$limit > 0) $totalpages++; 
    
    // start building navigation string 

    $navstring  = "<table width=\"$tablewidth\" cellspacing=\"0\" cellpadding=\"1\" border=\"0\">"; 
    if ($ver) 
    { 
     
    if ($totalrecords > $limit) // only show <<PREV NEXT>> row if $totalrecords is greater than $limit 
    { 
        $navstring .= "<tr>"; 
        if ($offset != 0) 
        { 
           $navstring .= "<td valign='middle' width='15%' nowrap><a   href='".$page_url."?offset=0'><img name='back'src='http://www.comermas.com.ar/includes/images/btnpri.gif' border=0' <b></a></b><a   href='".$page_url."?offset=".($offset-$limit)."'><img name='back' src='http://www.comermas.com.ar/includes/images/btnant.gif' border=0'<b></a></b></td>"; 
        } else { 
            $navstring .= "<td width='15%' nowrap>&nbsp;</td>"; 
        }     

        $navstring .= "<td align='center' width='70%' class='BG7'>"; 
       // for ($i=$offset;$i<=$totalpages;$i++) 
	  //  $i = $offset / $limit;
		//echo $offset ;
		//echo $totalpages;
        //$i2 = $i + 10;
	//	$desde = $limit * $i + 1;
	//	$hasta = $limit * $i + $limit +1; 
		
 
	//	if ($hasta > $totalrecords) $hasta = $totalrecords; 
  
		
     //   $navstring .= "<td colspan='3' align='center' nowrap>"; 
      //  $navstring .= "<span class='RGBsmall'>Paginas: <b>".$pagenumber."</b>/<b>".$totalpages."</b>"; 
      //  $navstring .= "&nbsp;&nbsp; Total de Registros: <b>".$totalrecords."</b></span>";
		
	//	$navstring .= "<td align='center' nowrap>"; 

      //  $navstring .= "<b>RESULTADO ". $desde ."</b> - <b>".$hasta."</b>"; 
       // $navstring .= "<b> / ".$totalrecords."</b>";
		//     $navstring .= "<td align='center' width='70%' class='BG7'>"; 
       
	   
	   	$totalpagesC= $pagenumber +$cantidadporpagina;
		$pagenumberC = 1;
		 
						 if ($totalpages > $cantidadporpagina) $pagenumberC= 1;
					  
						if ($totalpagesC > $totalpages)
						 {
						 //if ($totalpages > $cantidadporpagina) $pagenumberC = $pagenumber-($totalpagesC - $totalpages-1);
						 //$totalpagesC = $totalpages;
						 }
		 if (($totalpagesC) > $cantidadporpagina) $pagenumberC = ($pagenumber-$cantidadporpagina);
		if ($pagenumberC < 1)  $pagenumberC  =1;
		
		
		
		 
		 
		 
		 if (($totalpages) < $cantidadporpagina) $totalpagesC =$totalpages;
	 
	  if ($totalpagesC > $totalpages)  $totalpagesC =$totalpages;
	 
	 //echo 	$totalpagesC  ." > ".$totalpages ." - ".$totalpages;
	 
	 
		for ($i=$pagenumberC;$i<=$totalpagesC;$i++) 
        { 
            if ($i == $pagenumber) 
            { 
                $navstring .= "<span class='ATTENTIONsmall'>$i</span> "; 
            } else { 
                $nextoffset = $limit * ($i-1); 
                $navstring .= "<a class='small' href='".$page_url."?&offset=".$nextoffset."'>$i</a> "; 
          
            } 
        } 
	   
 
        $navstring .= "</td>"; 

        if($totalrecords-$offset <= $limit) 
        { 
         $navstring .= "<td width='15%' nowrap>&nbsp;</td>"; 
        } else { 
 
          $navstring .= "<td align='right' valign='middle' width='25%' nowrap>
		<a   href='".$page_url."?&offset=".($offset+$limit)."'><b><img name='back' src='http://www.comermas.com.ar/includes/images/btnsig.gif' border=0'</b></a>
		 <a   href='".$page_url."?&offset=".$limit * ($totalpages-1)."'><b><img name='back' src='http://www.comermas.com.ar/includes/images/btnult.gif' border=0'</b></a></td>";
        } 
        $navstring .= "</tr>"; 
   
  }  
     if ($verbiage) 
    { 
        $navstring .= "<tr><td colspan='3' align='center' nowrap>"; 
        $navstring .= "<span class='RGBsmall'>Paginas: <b>".$pagenumber."</b>/<b>".$totalpages."</b>"; 
        $navstring .= "&nbsp;&nbsp; Total de Registros: <b>".$totalrecords."</b></span>";
		
        $navstring .= "  ";
 }

  
     
}  
$navstring .= "</table>"; 
echo $navstring; 
	

} 


function recordsetNavAJAX(&$db_connect,$db_query,$page_url,$qry_url='',$offset=0,$limit=0,$tablewidth='100%',$verbiage=1,$ver=1) 
{      
 
    $db_result = @mysql_query($db_query,$db_connect); 
    $totalrecords = @mysql_num_rows($db_result); 
    $pagenumber = ($offset + $limit) / $limit; 
    $totalpages = intval($totalrecords/$limit); 
	    $cantidadporpagina = 7;
    if ($totalrecords%$limit > 0) $totalpages++; 
     
    // start building navigation string 

    $navstring  = "<table width=\"$tablewidth\" cellspacing=\"0\" cellpadding=\"1\" border=\"0\">"; 
    if ($ver) 
    { 
     
    if ($totalrecords > $limit) // only show <<PREV NEXT>> row if $totalrecords is greater than $limit 
    { 
        $navstring .= "<tr>"; 
        if ($offset != 0) 
        { 
            $navstring .= '<td valign="middle" width="15%" nowrap><a   href=#  onclick=CargarContenidoR("'.$page_url.'?offset=0")><img name="back" src="http://www.comermas.com.ar/includes/images/btnpri.gif" border=0></a><a class="small" href=#  onclick=CargarContenidoR("'.$page_url."?offset=".($offset-$limit).'")><img name="back"  src="http://www.comermas.com.ar/includes/images/btnant.gif" border="0"></a></td>'; 
			
        } else { 
            $navstring .= "<td width='15%' nowrap>&nbsp;</td>"; 
        }     

        $navstring .= "<td align='center' width='70%' class='BG7'>"; 
       
	   
	   	$totalpagesC= $pagenumber +$cantidadporpagina;
		$pagenumberC = 1;
		 
						 if ($totalpages > $cantidadporpagina) $pagenumberC= 1;
					  
						if ($totalpagesC > $totalpages)
						 {
						 //if ($totalpages > $cantidadporpagina) $pagenumberC = $pagenumber-($totalpagesC - $totalpages-1);
						 //$totalpagesC = $totalpages;
						 }
		 if (($totalpagesC) > $cantidadporpagina) $pagenumberC = ($pagenumber-$cantidadporpagina);
		if ($pagenumberC < 1)  $pagenumberC  =1;
		
		 if (($totalpages) < $cantidadporpagina) $totalpagesC =$totalpages;
		   if ($totalpagesC > $totalpages)  $totalpagesC =$totalpages;
		 
		 
	// echo 	$totalpagesC  ." < ".$cantidadporpagina ." - ".$pagenumberC;
		for ($i=$pagenumberC;$i<=$totalpagesC;$i++) 
        { 
            if ($i == $pagenumber) 
            { 
                $navstring .= "<span class='ATTENTIONsmall'>$i</span> "; 
            } else { 
                $nextoffset = $limit * ($i-1); 
                $navstring .= '<a href="#" class="small" onClick=CargarContenidoR("'.$page_url.'?offset='.$nextoffset.'")> '.$i.' </a>'; 
          
            } 
        } 
	   
	   
	   
	   
        $navstring .= "</td>"; 

        if($totalrecords-$offset <= $limit) 
        { 
            $navstring .= "<td width='15%' nowrap>&nbsp;</td>"; 
        } else { 
            $navstring .= '<td align="right" valign="middle" width="25%" nowrap><a class="small" href=# onclick=CargarContenidoR("'.$page_url."?offset=".($offset+$limit).'")> <img name="back"   src="http://www.comermas.com.ar/includes/images/btnsig.gif" border="0"></a><a class="small" href=# onclick=CargarContenidoR("'.$page_url."?offset=".$limit * ($totalpages-1).'")><img name="back"   src="http://www.comermas.com.ar/includes/images/btnult.gif" border="0"></a></td>'; 
        } 
        $navstring .= "</tr>"; 
    }     
     
}     
    if ($verbiage) 
    { 
        $navstring .= "<tr><td colspan='3' align='center' nowrap>"; 
        $navstring .= "<span class='RGBsmall'>Paginas: <b>".$pagenumber."</b>/<b>".$totalpages."</b>"; 
        $navstring .= "&nbsp;&nbsp; Total de Registros: <b>".$totalrecords."</b></span>";
		
        $navstring .= "  ";

     
	 if ($verbiage ==2) {
	    if ($offset != 0) 
        { 
            $navstring .= '<a class=small href=# onclick=CargarContenidoR("'.$page_url.'?offset='.($offset-$limit).'")><img name="back"   src="http://www.comermas.com.ar/includes/images/fiz.gif" border=0  <b></a></b>'; 
        } else { 
           $navstring .=  "<img name='back' style='width:11;height:8' src='http://www.comermas.com.ar/includes/images/fizo.gif'</img>";
        }     
        if($totalrecords-$offset <= $limit) 
        { 
          $navstring .=  "<img name='back2'   src='http://www.comermas.com.ar/includes/images/fdeo.gif'</img>";
        } else { 
           $navstring .=   '<a class=small href=#  onClick=CargarContenidoR("'.$page_url.'?offset='.($offset+$limit).'")><img name="back2"   src="http://www.comermas.com.ar/includes/images/fde.gif" border=0 <b></a></b>'; 
 
 		} 

  }

        $navstring .= "</td></tr>"; 
		
      
    }     
	
	 
	
    $navstring .= "</table>"; 
     
    echo $navstring; 
} 


?> 
