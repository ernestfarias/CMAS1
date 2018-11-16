<?
if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
	require_once('includes/catalog.php');
	require_once('includes/impresiones.php');
	$idfrombusqueda = addslashes($_GET["id"]);
	$page = addslashes($_GET["page"]);
	$imp = new impresiones;	
	$tipo = "www";
	$updatereg = $imp->saveimpresiones($tipo,$idfrombusqueda);
	unset ($updatereg);
	
	//header("Location: http://".$page."/"); 
	
if (!headers_sent()) {
    header("Location: http://".$page."/"); 
    exit;
}else {
    echo "Si su browser no lo redirecciona haga click .<A href=http://".$page.">AQUI</a>";
		 //\"http://".$page."/"">link</a> instead\n";
    exit;
		}
	
	}
	
	?>