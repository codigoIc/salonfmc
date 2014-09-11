<? include "../extras/php/conexion.php";
$sql = "update ba_mc_inscripciones set " ;
	$sql=$sql." obs_adm='".$_REQUEST['vobs_adm']."'";
	$sql=$sql." where id =". $_REQUEST['ide_per'];
//die($sql);
	if(!mysql_query($sql)) {
		echo "Error al modificar". mysql_error();
		die($sql);}
		
	else {
		echo "Datos Grabados";
		include("index.php");
		}
	exit;
?>