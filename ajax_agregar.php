<? 	session_start(); 
header (' <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');
	include "extras/php/conexion.php";
	@mysql_query("SET NAMES 'utf8'");
	include "extras/php/basico.php";

	/*verificamos si las variables se envian*/
	if (!empty($_POST['ide_per']) and $_POST['ide_per']<>0){

	}
	if(empty($_POST['vnro_documento'])){
		echo "Falta ingresar documento";
		exit;
	}
	
  	/*** vaido fecha*////
if (!checkdate($_REQUEST['nmes'],$_REQUEST['ndia'],$_REQUEST['nanio']))
    {
	?>  <a href="ajax_form_agregar.php">fecha nacimiento invalida.</a><? }
if (!checkdate($_REQUEST['frmes'],$_REQUEST['frdia'],$_REQUEST['franio']))
    {echo "La fecha de realización no es válida";
	exit;}
$vf_nacimiento='"'.$_REQUEST['nanio'].'/'.$_REQUEST['nmes'].'/'.$_REQUEST['ndia'].'"';
$vf_realizacion='"'.$_REQUEST['franio'].'/'.$_REQUEST['frmes'].'/'.$_REQUEST['frdia'].'"';

$sqldni='select * from ba_mc_inscripciones where nro_documento='.$_POST['vnro_documento'];
//if(mysql_query($sqldni)) {
 $percl = mysql_query($sqldni);
 if (mysql_affected_rows()<>0){
	$rs_percl = mysql_fetch_assoc($percl);
	if(	$rs_percl['clave']<>$_POST['vclave']){
 		echo('DNI ya inscripto. La clave ingresada no es correcta.');
		exit;
//		return ;
	}
	$sql= "update  ba_mc_inscripciones set fecha=now(),nombre='".$_POST['vnombre']."',f_nacimiento=".$vf_nacimiento.", domicilio='".$_POST['vdomicilio']."', localidad='".$_POST['vlocalidad']."',cp='".$_POST['vcp']."',telefono='".$_POST['vtelefono']."',correo_electronico='".$_POST['vcorreo_electronico']."',f_realizacion=".$vf_realizacion.",titulo='".$_POST['vtitulo']."',nacionalidad='".$_POST['vnacionalidad']."',dimension_al='".$_POST['vdimension_al']."',dimension_an='".$_POST['vdimension_an']."',obs='".$_POST['vobs']."',procedimiento='".$_POST['vprocedimiento']."',caract_tel='".$_POST['vcaract_tel']."' where nro_documento=".$_POST['vnro_documento'];
    if(!mysql_query($sql)) {
		echo "Error al modificar ". mysql_error().die($sql);}
		else {
		 $_SESSION["id"]=  $rs_percl['id'];
		}
	
//	exit;
 }else{
 $sql= "INSERT INTO    ba_mc_inscripciones (fecha, nro_documento,clave,nombre,f_nacimiento,domicilio, localidad,cp,telefono,correo_electronico,f_realizacion,titulo,nacionalidad,dimension_al,dimension_an,caract_tel,procedimiento,especialidad,obs)";
$sql=$sql." VALUES (";
$sql=$sql." now() ,";
$sql=$sql.$_POST['vnro_documento'].",";
$sql=$sql."'".$_POST['vclave']."',";
$sql=$sql."'".$_POST['vnombre']."',";
$sql=$sql.$vf_nacimiento.",";
$sql=$sql."'".$_POST['vdomicilio']."',";
$sql=$sql."'".$_POST['vlocalidad']."',";
$sql=$sql."'".$_POST['vcp']."',";
$sql=$sql."'".$_POST['vtelefono']."',";
$sql=$sql."'".$_POST['vcorreo_electronico']."',";
$sql=$sql.$vf_realizacion.",";
$sql=$sql."'".$_POST['vtitulo']."',";
$sql=$sql."'".$_POST['vnacionalidad']."',";
$sql=$sql.$_POST['vdimension_al'].",";
$sql=$sql.$_POST['vdimension_an'].",";
$sql=$sql."'".$_POST['vcaract_tel']."',";
$sql=$sql."'".$_POST['vprocedimiento']."',";
$sql=$sql."'".$_POST['vespecialidad']."',";
$sql=$sql."'".$_POST['vobs']."')";
if(!mysql_query($sql)) {
		echo "Error al insertar". mysql_error().die($sql);}
		else {
		 $_SESSION["id"]=  mysql_insert_id();
		}
 }
//}


//die($sql);

	
	
		//include("indexn.php");
exit;
?>