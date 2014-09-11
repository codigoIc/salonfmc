<?
	include "../extras/php/conexion.php";
	include "../extras/php/basico.php";
	
		$id=$_POST['id'];
	$sql="update ba_mc_inscripciones set entrega_formulario=NOW() where id = $id ";

	if(!mysql_query($sql))
		echo "Ocurrio un error\n$sql" . mysql_error();
	die('Datos modificados');
	exit;
?>