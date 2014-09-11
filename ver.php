<?php
session_start();
session_unset();
session_destroy();

?>
<html>
<head>
<title></title>
<link href="./libs/estilos.css" rel="stylesheet" type="text/css" />
<!--charset=iso-8859-1 -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-image: url();
}
.Estilo1 {
	font-size: xx-large;
	font-weight: bold;
	color: #666666;
}
-->
</style></head>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>      
				<td width="133" align="left" background="../graficos/fondo08.jpg">
                <img src="../graficos/header01.jpg" alt="Instituto Cultural de la Provincia" width="133" height="83">                </td>
            	  
                <td width="252" background="../graficos/fondo08.jpg">&nbsp;</td>
            	  
                <td width="251" background="../graficos/fondo08.jpg">
                <img src="../graficos/derecha08.jpg" alt="Buenos Aires :: La Provincia">                </td>
			</tr>
</table>
<center>
<form action="valida.php" method="post" target="_self">
  <center>
  <p><span class="Estilo1">Gu&iacute;a de Museos Monumentos y Sitios Hist&oacute;ricos</span>  <br>
      </p>
    <table width="90%" border="0">
      <tr>
        <td><img src="fotos/presentacion/1.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/2.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/3.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/4.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/5.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/6.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/7.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/8.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/9.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/10.jpg" width="100" height="100"></td>
      </tr>
      <tr>
        <td><img src="fotos/presentacion/11.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/12.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/13.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/14.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/15.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/16.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/17.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/18.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/19.jpg" width="100" height="100"></td>
        <td><img src="fotos/presentacion/20.jpg" width="100" height="100"></td>
      </tr>
    </table>
<font size="+1">
<!--<fieldset style="width:30%;"> -->
</p>
 
<!-- </fieldset> -->
</font>
<div align="center"><a href="persona/index.php" target="_blank" class="Estilo1">Ingresar</a> </div>

</body>

<table  width="25%" border="0" align="right" class="tabla_sin_bordes">
  <tr>
    <td width="59%"><font color="#000000" size="-1">Usuario Registrado </font></td>
    <td width="41%"><input type="text" name="usuario" size="10" ></td>
  </tr>
  <tr>
    <td><font color="#000000" size="-1">Contrase&ntilde;a</font></td>
    <td><input type="password" name="clave" size="10" ></td>
  </tr>
    <tr>
    <td><input name="Ingresar" type="submit" class="button" value="Ingresar"></td>
    <td></td>
  </tr>
   <tr>
    <td colspan="2"><a href="cambio_de_clave.html" target="_self">Cambio de clave</a></td>
  </tr>
</table>
</form>
</html>
