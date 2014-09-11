<?	include "../extras/php/conexion.php";
	include "../extras/php/basico.php";
	if (!checkdate($_REQUEST['nmes'],$_REQUEST['ndia'],$_REQUEST['nanio']))
    {
	?>  <a href="ajax_form_agregar.php">fecha nacimiento invalida.</a><? }
if (!checkdate($_REQUEST['ppmes'],$_REQUEST['ppdia'],$_REQUEST['ppanio']))
    {echo "La fecha no es vlida";
	exit;}

if (!checkdate($_REQUEST['rdmes'],$_REQUEST['rddia'],$_REQUEST['rdanio']))
    {echo "La fecha de revista no es vlida";
	exit;}
if (!checkdate($_REQUEST['dames'],$_REQUEST['dadia'],$_REQUEST['daanio']))
    {echo "La fecha en dependencia actual no es vlida";
	exit;}
	
//$vplanta_permanente_desde='"'.$_REQUEST['ppdia'].'/'.$_REQUEST['ppmes'].'/'.$_REQUEST['ppanio'].'"';
$vplanta_permanente_desde='"'.$_REQUEST['ppanio'].'/'.$_REQUEST['ppmes'].'/'.$_REQUEST['ppdia'].'"';
$vf_nacimiento='"'.$_REQUEST['nanio'].'/'.$_REQUEST['nmes'].'/'.$_REQUEST['ndia'].'"';
$vrevista_desde='"'.$_REQUEST['rdanio'].'/'.$_REQUEST['rdmes'].'/'.$_REQUEST['rddia'].'"';
$vdep_actual_desde='"'.$_REQUEST['daanio'].'/'.$_REQUEST['dames'].'/'.$_REQUEST['dadia'].'"';
/*    $sql = "update ba_mc_inscripciones set " ;
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
	$sql=$sql." where id =". $_POST['ide_per'];*/
/*	die($sql);*/
$sql = "INSERT INTO ba_mc_inscripciones ";
$sql=$sql."(id_referencia,fecha,tipo_documento,nro_documento,clave,legajo,nombre,f_nacimiento,estado_civil,hijos,dom_real,dom_legal,cp,tel_particular,";
$sql=$sql. "otros_telefonos,correo_electronico,planta_permanente_desde,revista_desde,dep_origen,";
$sql=$sql."escalafon,categoria,dep_actual_desde,direccion,cargo,obs,depto)";
$sql=$sql." VALUES (";
$sql=$sql. $_POST['ide_per'].",";
$sql=$sql." now() ,";
$sql=$sql."'".$_POST['vtipo_documento']."',";
$sql=$sql."'".$_POST['vnro_documento']."',";
$sql=$sql."'".$_POST['vclave']."',";
$sql=$sql."'".$_POST['vlegajo']."',";
$sql=$sql."'".$_POST['vnombre']."',";
$sql=$sql.$vf_nacimiento.",";
$sql=$sql."'".$_POST['vestado_civil']."',";
$sql=$sql."'".$_POST['vhijos']."',";
$sql=$sql."'".$_POST['vdom_real']."',";
$sql=$sql."'".$_POST['vdom_legal']."',";
$sql=$sql."'".$_POST['vcp']."',";
$sql=$sql."'".$_POST['vtel_particular']."',";
$sql=$sql."'".$_POST['votros_telefonos']."',";
$sql=$sql."'".$_POST['vcorreo_electronico']."',";
$sql=$sql.$vplanta_permanente_desde.",";
$sql=$sql.$vrevista_desde.",";
$sql=$sql."'".$_POST['selectDepOrigen']."',";
$sql=$sql."'".$_POST['vescalafon']."',";
$sql=$sql."'".$_POST['vcategoria']."',";
$sql=$sql.$vdep_actual_desde.",";
$sql=$sql."'',";
$sql=$sql."'".$_POST['selectPuesto']."',";
$sql=$sql."'".$_POST['vobs']."',";
$sql=$sql."'".$_POST['selectDepto']."')";

	if(!mysql_query($sql)) {
		echo "Error al insertar". mysql_error();}
	else {
		echo "Datos Grabados";
		}
	exit;
?>