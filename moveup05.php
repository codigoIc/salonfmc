<?php session_start();
include "extras/php/conexion.php";
$cuantas_subio=0;
/****   1  ******/
for ($i = 1; $i <= 4; $i++) {
	if (1==1 or $_FILES[$fot]['name']<>' '>){
	$foto_name='f'.rtrim(ltrim( $_SESSION["id"])).'_'.$i.'.jpg';
	die ($foto_name);
	$uploadedfileload="true";
	$fot='fotografia'.$i;
	if ($_FILES[$fot]['size']>9000000)
	{   $msg=$msg."El archivo es mayor que 9 MB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";}

	if (!($_FILES[$fot]['type'] =="image/pjpeg" or $_FILES[$fot]['type'] =="image/jpeg" ))
	{   $msg=$msg." Tu archivo tiene que ser JPG. Otros archivos no son permitidos<BR>".$_FILES[		fot][type];
		$uploadedfileload="false";}
	if($uploadedfileload=="true"){
        $copiado=move_uploaded_file($_FILES[$fot]['tmp_name'] , "fotos/".$foto_name);
		
		if($copiado==true){
			$cuantas_subio=$cuantas_subio+1;
			chmod( "fotos/".$foto_name, 0777 ); 
			$sql="update ba_mc_inscripciones set  fotografia".$i." ='fotos/".$foto_name."' where id =".$_SESSION["id"];
			$per = mysql_query($sql);
			if(!mysql_query($sql))
				echo "Ocurrio un error\n$sql" . mysql_error();
		}else{
			die('error copiando '.$_FILES[$fot]['name'].' - '.$foto_name);
		}
	}else{echo $msg;}
	}
	}	

?> <a href="javascript:history.back(1)">Volver Atras</a>

