<?	$bd_host = "10.21.17.5";
	$bd_usuario = "sistemas";
	$bd_password = "sistemas";
	$bd_base = "patrimonio_cultural";
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error en la conexi๓n a MsSql");
	mysql_select_db($bd_base, $con);
//	@mysql_query("SET NAMES 'utf8'");
for ( $i = 1 ; $i <= 2 ; $i ++) {
	switch ($i) {
    case 1:
		$mal="'รก'";
		$ok="'แ'";
    case 2:
		$mal="'ํฉ'";
		$ok="'้'";
		
}
	$ejec="update museos_monumentos_probando set localidad = replace(localidad,".$mal.",".$ok.")";
	echo $ejec;
$rs = mysql_query($ejec, $con);

}

?>