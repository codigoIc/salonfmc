<? include "../extras/php/conexion.php";
$ejec = "select max(nro)as no from ba_mc_inscripciones ";

if(!mysql_query($ejec))
{		echo "Error al consultar". mysql_error();
		die($ejec);}
$rs = mysql_query($ejec, $con);
$row = mysql_fetch_assoc($rs);
	
$_nro=$row['no']+1;
		//die($_nro);


$sql = "update ba_mc_inscripciones set " ;
	$sql=$sql." f_cierre=NOW(),nro= case when  estado='RECHAZADO' then 0 else ".$_nro." end " ;
	$sql=$sql." where id =". $_REQUEST['id'];

	if(!mysql_query($sql)) {
		echo "Error al modificar". mysql_error();
		die($sql);}
		
	else {
		echo "Datos Grabados";
		include("index.php");
		}
	exit;
?>