<?
	include "../extras/php/conexion.php";
	include "../extras/php/basico.php";
	//$sql = sprintf("delete from museos_monumentos where id=%d",
		//(int)$_POST['ide_per']	);
		$id=$_POST['id'];
	$sql="delete from ba_mc_inscripciones where id = $id ";

	if(!mysql_query($sql))
		echo "Ocurrio un error\n$sql" . mysql_error();
	exit;
?>