<? session_start();
include "extras/php/conexion.php";
//echo($_SESSION["iid"].'  '.$_REQUEST['idx']);
$_SESSION["id"]=$_REQUEST['idx'];
$cuantas_subio=0;
/****   1  ******/
$msg='';
for ($i = 1; $i <= 8; $i++) {

if ($i==8){
  $fot='curriculum';}
  else{
  
	if ($i<=4){
  $fot='fotografia'.$i;}else{
  $fot='documento'.($i-4);
  }
    }

  if(isset($_FILES[$fot]['name'])and !empty($_FILES[$fot]['name'])){
  	if ($i==8){
    $foto_name='f'.rtrim(ltrim($_SESSION["id"])).$_FILES[$fot]['name'];
	}else{
	$foto_name='f'.rtrim(ltrim($_SESSION["id"])).'_'.$i.'.jpg';
	}
	
	$uploadedfileload="true";

	if ($_FILES[$fot]['size']>2000000)
	{   $msg=$msg."El archivo es mayor que 2 MB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";}
if($i==8){
//	die($fot);
}
	if ($i<>8 and !($_FILES[$fot]['type'] =="image/pjpeg" or $_FILES[$fot]['type'] =="image/jpeg" ))
	{   $msg=$msg.$_FILES[$fot]['name']." Tu archivo tiene que ser JPG. Otros archivos no son permitidos<BR>";
		$uploadedfileload="false";}
		
	if($uploadedfileload=="true"){
		$copiado=move_uploaded_file($_FILES[$fot]['tmp_name'] , "fotos/".$foto_name);
	//	$copiado=move_uploaded_file($_FILES["fotografia1"]['tmp_name'] , "fotos/".$foto_name);
		if($copiado==true){
			$cuantas_subio=$cuantas_subio+1;
			//echo('copio'.$fot);
			chmod( "fotos/".$foto_name, 0777 ); 
			if ($i==8){
			$sql="update ba_mc_inscripciones set  curriculum ='fotos/".$foto_name."' where id =".$_SESSION["id"];
			}else{
			if ($i<=4){
			$sql="update ba_mc_inscripciones set  fotografia".$i." ='fotos/".$foto_name."' where id =".$_SESSION["id"];}else{
			$sql="update ba_mc_inscripciones set  documento".($i-4)." ='fotos/".$foto_name."' where id =".$_SESSION["id"];			
			}}
			
			$per = mysql_query($sql);
			if(!mysql_query($sql))
				echo "Ocurrio un error\n$sql" . mysql_error();
		}else{
			die('error copiando '.$_FILES[$fot]['name'].' - '.$foto_name);
		}
	}else{echo $msg;}
	}	
}

$sql="select * from ba_mc_inscripciones where id=".$_SESSION["id"];			
$perid = mysql_query($sql);
if(!mysql_query($sql)){
		echo "Ocurrio un error\n$sql" . mysql_error();
		return;
	}
$rs_perid = mysql_fetch_assoc($perid);	

?><style type="text/css">
<!--
body {
	background-color: #000000;
}
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo3 {color: #FFFFFF; font-weight: bold; font-size: large; }
-->
</style>
<div align="center">
  <p class="Estilo3">Hola  <? echo $rs_perid['nombre'] ?>, tu solicitud de inscripci&oacute;n est&aacute; siendo procesada, en breve te llegar&aacute; la confirmaci&oacute;n a tu mail.  </p>
 <!-- <p class="Estilo3">Tu n&uacute;mero de orden es <? echo $rs_perid['id'] ?> </p>
  <p class="Estilo3">T&iacute;tulo de obra <? echo $rs_perid['titulo'] ?>      </p>
  <p class="Estilo3">&nbsp;</p> -->
</div>
<h2 align="center" class="Estilo1" >Gracias por participar! </h2>
<h2><span class="Estilo1"><a href="index.php">Volver</a>

</span></h2>
