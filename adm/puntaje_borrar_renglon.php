<? 
  	include "../extras/php/conexion.php";	
/*$idre = $_GET["idrenglon"];
die(' $_GET["idrenglon"] '.$idrenglon);*/
$sql = "delete from puntaje_obtenido WHERE id=".$_GET["idrenglon"] ;
		$rs = mysql_query($sql, $con);
		if (!$rs) {	$Error = mysql_error();
			    die( "error select :".$Error); }
?>
<script language="JavaScript" type="text/JavaScript">
history.back()
</script> 