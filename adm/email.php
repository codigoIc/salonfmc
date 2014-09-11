<?php
session_start(); 
	include "../extras/php/conexion.php";
//require("../utiles_php/utiles/funciones.php");
$id = $_GET["id"];
$sql="select * from ba_mc_inscripciones where id = ".$id;
//die($sql);
	$per = mysql_query($sql);
	$rs_per = mysql_fetch_assoc($per);
	

			
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Museo Emilio Pettoruti <mpbaemiliopettoruti@gmail.com> \r\n";
$textoMail='Hola '.$rs_per['nombre'].', fuiste inscripto';
	$email_a=	$rs_per['correo_electronico'];
//	mail('jmoretto@ic.gba.gov.ar','ID:'.$id.'-'.$titulo_ori,$textoMail,$headers);								
//mail($email_a,'Concurso Arte Joven 2014',$textoMail,$headers);								
mail('mirna_giamello@hotmail.com','Concurso Arte Joven 2014',$textoMail,$headers);								

// mail('mgiamello@ic.gba.gov.ar','ID:'.$id.'-'.$titulo_ori,$textoMail,$headers);								
		?>
		<table width="780" border="0" bgcolor="#FFFFFF" align="center">
         <tr><td bordercolor="#000000"><?php echo 'email enviado' ?></td></tr>
		  <tr><td><INPUT TYPE="button" VALUE="Volver" onClick="history.back()"></td></tr>
</table>
