<?php
 session_start();
 /* setcookie("ejemusuario", $usuario, time()+3600,"/","");      
 session_start();
 $userid=$usuario;
 session_register("userid");
require('funciones.php');*/
$usuario=$_REQUEST[usuario];
$clave=$_REQUEST[clave];
$clave_nueva=$_REQUEST[clave_nueva];
$clave_nueva1=$_REQUEST[clave_nueva1];
require('configuracion_ic.php');
	$nivel_acceso_actual='';
  /*	$trim_usuario=rtrim(ltrim($usuario));
	$trim_clave=rtrim(ltrim($clave));*/
	if ($clave_nueva<>$clave_nueva1){
		die( "no confirmo correctamente la clave");
?>
	  <table width="780" border="0" align="center">
	  <tr><td><INPUT TYPE="button" VALUE="Volver" onClick="history.back()"></td></tr>
	  </table>
<?php
	return;		
	}
	if ( !(session_is_registered("usuario"))){
		session_register("usuario");
	}
	if ( !(session_is_registered("clave"))){
		session_register("clave");
	}			
/*	$trim_usuario=rtrim(ltrim($_SESSION["usuario"]));
	$trim_clave=rtrim(ltrim($_SESSION["clave"]));*/
	$trim_usuario=rtrim(ltrim($usuario));
	$trim_clave=rtrim(ltrim($clave));
		
	$clave_des=encripta($trim_clave);
	$sql = "select * from usuarios where usuario='$trim_usuario' and clave='$clave_des'" ;
/*	die($sql);*/
	$result = mysql_query($sql,$con_ic);
	if (!$result) {
    	$this->Error = mysql_error();
	    echo "error select".$this->Error;
    }
	if ($row = mysql_fetch_array($result)){	
		$nivel_acceso_actual=$row["nivel_acceso"];
		session_register("nivel_acceso_actual");
		$clave_nueva_en=encripta(rtrim(ltrim($clave_nueva)));
		$sql = "update usuarios set clave='$clave_nueva_en' where usuario='$trim_usuario' " ;
		$result = mysql_query($sql,$con_ic);
	/*	die($sql);*/
		die('Cambio la clave');
/*		$_SESSION["nivel_acceso_actual"]=$nivel_acceso_actual;*/
		include('index.php');
 }
else {
	die( "<br> Contraseña Inválida.");
?>
	  <table width="780" border="0" align="center">
	  <tr><td><INPUT TYPE="button" VALUE="Volver" onClick="history.back()"></td></tr>
	  </table>
<?php
	return;
	}
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