<?php
	session_start();
	include "extras/php/conexion.php";
	$trim_usuario= strtoupper(rtrim(ltrim($_POST["usuario"])));
	$trim_clave= rtrim(ltrim($_POST["clave"]));	
	$clave_des=encripta($trim_clave);
	
	$sql = "select * from usuarios where usuario='$trim_usuario' and clave='$clave_des'  and sistema like '%A%'" ;
//require('configuracion_ic.php');
	$result = mysql_query($sql,$con);
// error de acceso
	if (!$result) {
    	$Error = mysql_error();
	    echo "error select:".$sql.' - '.$Error;
		echo('<a href=index.php>Volver a intentar </a>');
    }
// si econtro	
	if ($row = mysql_fetch_array($result)){	
		session_start(); 
		$_SESSION["usuario"] = $trim_usuario; //$_POST["usuario"];
		$_SESSION["usuario_adm"] = $trim_usuario; //$_POST["usuario"];				
		$_SESSION["usuario_nombre"] = $row["nombre"];
		$_SESSION["nivel_acceso_actual"] = $row["nivel_acceso"];
		/* log*/
$sql = "insert into log (usuario,sistema,fecha)values('$trim_usuario','ARTE JOVEN',now())" ;

$result = mysql_query($sql,$con);
if (!$result) {
   	$Error = mysql_error();
    echo "error select".$Error;
    }
$sql = "update usuarios set ult_actividad=now() where usuario='$trim_usuario'" ;

$result = mysql_query($sql,$con);
if (!$result) {
   	$Error = mysql_error();
    echo "error select".$Error;
    }
		
		/*termina log*/
		$sql = "insert into log (fecha, usuario) values(now(),'".$_SESSION["usuario"]."')";
		$result = mysql_query($sql,$con);
//		header ('Location: http://www.aplic.ic.gba.gob.ar/artejoven/adm/index.php');
		header ('Location: adm/index.php');
	} else { 
    	$Error = "<font color='red'><center>Usuario no existe o clave incorrecta!".$trim_usuario.'  '.$clave_des;
	    echo $Error;
	 }
?>
	  <table width="780" border="0" align="center">
	  <tr><td><center><INPUT TYPE="button" VALUE="Volver" onClick="history.back()"></td></tr>
	  </table>
<?php

function desencri($lcaencript){
	$lcdevuelve='';
	$hasta=strlen($lcaencript);
	for ($a=0 ; $a < $hasta ; $a++) {
		$caracter=substr($lcaencript,$a,1);
		$ascc=ord($caracter);
		if ($ascc==32) {
			$lcdevuelve=$lcdevuelve." ";
			}
		else
		{
			/*$modulo = fmod($a,2);*/
			$modulo = $a % 2 ;
			if ($modulo=0) {
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a,1))-2);
				}
			else
			{
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a,1))-3);
				}
			}
	}
	return $lcdevuelve;
	}
function encripta($lcaencript){
	$lcdevuelve='';
	$hasta=strlen($lcaencript);
	for ($a=1 ; $a <= $hasta ; $a++) {
		$caracter=substr($lcaencript,$a-1,1);
		$ascc=ord($caracter);
		if ($ascc==32) {
			$lcdevuelve=$lcdevuelve." ";
			}
		else
		{
			$modulo = $a % 2 ;
			if ($modulo==0) {
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a-1,1))+2);
				}
			else
			{
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a-1,1))+3);
			}
		}
	} 
return $lcdevuelve;
}
?>