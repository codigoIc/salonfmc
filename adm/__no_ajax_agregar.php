<? header (' <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');
	session_start(); 
	include "../extras/php/conexion.php";
		@mysql_query("SET NAMES 'utf8'");
	include "../extras/php/basico.php";

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
if(mysql_query($sqldni)) {
 if (mysql_affected_rows()<>0){
 	echo('DNI ya cargado. Para para completar la informacion ingrese por POSTULANTE YA INSCRIPTO con nro. de documento y clave.');
	exit;
 }
}

$sql= "INSERT INTO    ba_mc_inscripciones (fecha, nro_documento,clave,nombre,f_nacimiento,domicilio, localidad,cp,telefono,correo_electronico,f_realizacion,titulo,nacionalidad,dimension_al,dimension_an,obs)";
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
$sql=$sql."'".$_POST['vobs']."')";

//die($sql);

	if(!mysql_query($sql)) {
		echo "Error al insertar". mysql_error().chr(13).die($sql);}
		else {
		echo "Datos Grabados. Ingrese por POSTULANTE YA INSCRIPTO con nro. de documento y clave para completar la informacion. ";
		}
	
		exit;
?>