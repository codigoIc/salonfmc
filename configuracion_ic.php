<?php
$bd_host = "10.21.17.5";
$bd_usuario = "sistemas";
$bd_password = "sistemas";
/*$bd_usuario = "root";
$bd_password = "";*/

$bd_base = "ic";

$con_ic = mysql_connect($bd_host, $bd_usuario, $bd_password);
if (! mysql_select_db($bd_base, $con_ic)){ 
die('no selecciono ' .$con_ic.'-'.$bd_base);}
@mysql_query("SET NAMES 'utf8'");
?>