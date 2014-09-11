<?	include "../extras/php/conexion.php";
	include "../extras/php/basico.php";
    $sql = "update ba_mc_inscripciones set " ;
	$sql=$sql." nombre='".$_POST['vnombre']."',";
	$sql=$sql." nro_documento=".$_POST['vnro_documento'].",";
	$sql=$sql." estado_civil='".$_POST['vestado_civil']."',";	
	$sql=$sql." hijos=".$_POST['vhijos'].",";	
	$sql=$sql." dom_real='".$_POST['vdom_real']."',";	
	$sql=$sql." dom_legal='".$_POST['vdom_legal']."',";				
	$sql=$sql." cp='".$_POST['vcp']."',";
	$sql=$sql." obs='".$_POST['vobs']."',";					
	$sql=$sql." tel_particular='".$_POST['vtel_particular']."',";					
	$sql=$sql." otros_telefonos='".$_POST['votros_telefonos']."',";							
	$sql=$sql." correo_electronico='".$_POST['vcorreo_electronico']."',";
	$sql=$sql." dep_origen='".$_POST['selectDepOrigen']."',";									
	$sql=$sql." depto='".$_POST['selectDepto']."',";										
	$sql=$sql." escalafon='".$_POST['vescalafon']."',";									
	$sql=$sql." categoria=".$_POST['vcategoria'].",";		
	$sql=$sql." cargo='".$_POST['selectPuesto']."',";			
	$sql=$sql." legajo=".$_POST['vlegajo'];		
	$sql=$sql." where id =". $_POST['ide_per'];
/*	die($sql);*/

	if(!mysql_query($sql)) {
		echo "Error al insertar". mysql_error();}
	else {
		echo "Datos Grabados";
		}
	exit;
?>