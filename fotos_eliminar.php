<?
	include "extras/php/conexion.php";
//	include "../extras/php/basico.php";
	$id=$_REQUEST['id'];
	$nrofoto=$_REQUEST['nrofoto'];
	if ($nrofoto<=4)
	{	$sql="update ba_mc_inscripciones set fotografia".rtrim(ltrim($nrofoto))."='' where id = ".$id ;}
	else
{		$sql="update ba_mc_inscripciones set documento".rtrim(ltrim($nrofoto-4))."='' where id = ".$id ;}

	if(!mysql_query($sql))
		echo "Ocurrio un error\n$sql" . mysql_error();
//	exit;
?>	  <a href="javascript:window.history.back();">La foto ha sido eliminada.</a> <?
		return ;
?>