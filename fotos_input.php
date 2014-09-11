<? session_start();
include "extras/php/conexion.php";
$_SESSION["iid"]=$_SESSION["id"];
$sql='select * from ba_mc_inscripciones where id='.$_SESSION["id"];

$rs = mysql_query($sql, $con);
$row = mysql_fetch_assoc($rs);

?>
<html><style type="text/css">
<!--
body {
	background-image: url();
	background-repeat: no-repeat;
	background-color: #CCCCCC;
}
-->
</style>
<body>
<form method="post" action="moveup.php" enctype="multipart/form-data">
  <p>
  <!-- File Description:<br>
<input type="text" name="form_description" size="40">-->
  <INPUT TYPE="hidden" name="idx" value=<? echo $_SESSION["id"]?> >
  <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="5000000">
  <strong>Seleccion&aacute; una o m&aacute;s fotos de tu obra :</strong></p>
  <p><em>(deben ser archivos JPG de no m&aacute;s de 2 MB) </em></p>
  <table width="800" border="1" bgcolor="#FFFFFF">
  <tr>
    <td width="400">
      <? if (!empty($row["fotografia1"])){?> 
    	  <img src="<? echo $row["fotografia1"]?>"  height="200"/>
		  <a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=1" >Borrar fotografia</a> 
      <? } else{?>
         <input type="file" name="fotografia1" size="20">
      <? } ?>      </td>
    <td width="400"> 
      <? if (!empty($row["fotografia2"])){?>
      <img src="<? echo $row["fotografia2"]?>"  height="200"/>
	   <a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=2" >Borrar fotografia</a> 
      <? } else {?>
    
      <input type="file" name="fotografia2" size="40">
     <? } ?></td>
  </tr>
  <tr>
    <td width="325">
      <? if (!empty($row["fotografia3"])){?>
      <img src="<? echo $row["fotografia3"]?>"  height="200"/>
	  <a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=3" >Borrar fotografia</a> 
      <? }else { ?>
    <input type="file" name="fotografia3" size="40">
      <? } ?>	</td>
    <td width="385"> 
      <? if (!empty($row["fotografia4"])){?>
      <img src="<? echo $row["fotografia4"]?>"  height="200"/>
	  <a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=4" >Borrar fotografia</a> 
      <? } else { ?>
    <input type="file" name="fotografia4" size="40">
      <? } ?></td>
  </tr>
  
  </table>
<table width="800" border="1" bgcolor="#FFFFFF">
	<tr>
    <td colspan="3"><strong>Scane&aacute; o fotografi&aacute; tu DNI (si tenes cambio de domicilio, tambien envialo) </strong></td>
    </tr>
<tr>
    <td width="250"><? if (!empty($row["documento1"])){?>
	    <img src="<? echo $row["documento1"]?>" height="100"/>
    	<a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=5" >Borrar</a> 
		 <? } else{?>
         <input type="file" name="documento1" size="20">
          <? } ?>    
      </td>
    <td width="250"><? if (!empty($row["documento2"])){?>
        <img src="<? echo $row["documento2"]?>" height="100"/>
   	    <a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=6" >Borrar</a> 
   	     <? } else{?>
         <input type="file" name="documento2" size="20">
          <? } ?> 
	  </td>
    <td width="300"> <? if (!empty($row["documento3"])){?>
        <img src="<? echo $row["documento3"]?>"  height="100"/>
   	    <a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=7" >Borrar</a> 
   	     <? } else{?>
         <input type="file" name="documento3" size="20">
          <? } ?>  </td>
</tr>
</table>
<table width="800" border="1" bgcolor="#FFFFFF">
	<tr>
    <td colspan="3"><strong>Adjunt&aacute; tu Curriculum Vitae </strong></td>
    </tr>
<tr>
    <td width="250"><? if (!empty($row["curriculum"])){
?>	<p><a href="<? echo $row["curriculum"] ?>">Curriculum</a></p>
      <p><a href="fotos_eliminar.php?id=<? echo $row["id"] ?>&nrofoto=8" >Borrar</a> 
          <? } else{?>
          <input type="file" name="curriculum" size="20">
          <? } ?>    
        </p>
      </td>
</tr>
</tr>
</table>

<p><input name="submit" type="submit" id="Subir Fotos" value="Subir Fotos">
<input name="cancelar" type="button" id="cancelar" value="Cancelar" onClick="fn_cerrar();" />
</form>

</BODY>
</HTML> 