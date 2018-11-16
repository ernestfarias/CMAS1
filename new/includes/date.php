<? 
function datear($var1){
$hourdiff = "0"; // hours difference between server time and local time
$timeadjust = ($hourdiff * 60 * 60);
$melbdate = date($var1,time() - $timeadjust);
$var1 = $melbdate;
return $var1;
}


function cdate($var) 
{
//	 $y = substr($var, 6, 4); 
//	 $m = substr($var, 3, 2); 
//	 $d	= substr($var, 0, 2);
//	 $cdate = "$y/$m/$d";
//	 echo $cdate;  

	 $y = substr($var, 0, 4); 
	 $m = substr($var, 5, 2); 
	 $d	= substr($var, 8, 2);
	 $cdate = "$d/$m/$y";
	 echo $cdate;  
 }
 
 function datesp($m1) 
{      
  	if ($m1 == '01') $MES = "Enero";
	if ($m1 == '02') $MES = "Febrero";
	if ($m1 == '03') $MES = "Marzo";
	if ($m1 == '04') $MES = "Abril";
	if ($m1 == '05') $MES = "Mayo";
	if ($m1 == '06') $MES = "Junio";
	if ($m1 == '07') $MES = "Julio";
	if ($m1 == '08') $MES = "Agosto";
	if ($m1 == '09') $MES = "Septiembre";
	if ($m1 == '10') $MES = "Octubre";
	if ($m1 == '11') $MES = "Noviembre";
	if ($m1 == '12') $MES = "Diciembre";
 
  $m1 = $MES;
 return $m1;
} 


function cdate2($var) 
{
//	 $y = substr($var, 6, 4); 
//	 $m = substr($var, 3, 2); 
//	 $d	= substr($var, 0, 2);
//	 $cdate = "$y/$m/$d";
//	 echo $cdate;  

	 $y = substr($var, 0, 4); 
	 $m = substr($var, 5, 2); 
	 $d	= substr($var, 8, 2);
	 $cdate2 = "$d/$m/$y";
	return $cdate2;  
 }

function edate2($var) 
{
	 $y = substr($var, 6, 4); 
	 $m = substr($var, 3, 2); 
	 $d	= substr($var, 0, 2);
	 $edate2 = "$y/$m/$d";
	// echo $edate2;  

	 
	return $edate2;  
 }
?> 
