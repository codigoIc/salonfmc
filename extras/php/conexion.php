<?

$bd_host = "mysql01.dpsit.sg.gba.gov.ar";
$bd_base = "webaplicic";
$bd_usuario="webaplicic";
$bd_password="c0mp1cool";
$bd_host = "10.21.17.5";
	$bd_usuario = "sistemas";
	$bd_password = "sistemas";
	$bd_base = "BellasArtes";


	$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error en la conexión a MsSql");
	mysql_select_db($bd_base, $con);
//	@mysql_query("SET NAMES 'utf8'");
//	@mysql_query("SET NAMES 'iso-8859-1'");

?>