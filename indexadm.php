<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <script language="javascript" type="text/javascript" src="../extras/js/jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="../extras/js/jquery.blockUI.js"></script>
        <script language="javascript" type="text/javascript" src="../extras/js/jquery.validate.1.5.2.js"></script>
<link href="./libs/estilos.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
    	
body {
	background-image: url();
	background-color: #ddd;
}
.Estilo1 {
	font-size: x-large;
	font-weight: bold;
	color: #666666;
}
.Estilo2 {font-size: large}
.Estilo3 {
	font-size: smaller;
	font-style: italic;
}
.Estilo4 {
	font-size: larger;
	font-weight: bold;
}
</style>
<?php
session_start();
session_unset();
session_destroy();

?>
</head>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>      
				<td width="100%" align="center" ><img src="graficos/banda_superior.jpg" alt="Instituto Cultural de la Provincia" ></td>
			</tr>
</table>
<? $_SESSION["usuario_adm"] ='';?>

<form action="valida.php" method="post" target="_self">

  <table width="800" border="0" align="center" BGCOLOR="FFFFFF">
  

   <!-- <tr>
      <td colspan="2"><a href="documentacion/ANEXO3FORMULARIODEINSCRIPCION.pdf">Formulario de inscripci&oacute;n</a></td>
    </tr> -->
    
	 
  <!--  <tr>
      <td colspan="2"><a href="cargos/index.php">Listado de puestos a cubrir en las distintas etapas</a></td>
    </tr> -->
    
    <tr>
      <td width="1580" colspan="2"><table  width="25%" border="0" align="right" class="tabla_sin_bordes">
  <tr>
    <td colspan="2"><div align="center"><em>Uso interno</em></div></td>
    </tr>
  <tr>
    <td width="55%"><div align="right"><em><font color="#000000" size="-1">Administrador </font></em></div></td>
    <td width="45%"><input name="usuario" type="text" size="10" ></td>
  </tr>
  <tr>
    <td><div align="right"><em><font color="#000000" size="-1">Contrase&ntilde;a</font></em></div></td>
    <td><input name="clave" type="password" size="10" ></td>
  </tr>
    <tr>
    <td><div align="right"><em>
      <input name="Ingresar" type="submit" class="button" value="Ingresar">
    </em></div></td>
   <!-- <td><a href="cambio_de_clave.html" target="_self" class="Estilo3">Cambio clave</a></td> -->
  </tr>
</table></td>
    </tr>
  </table>
  <font size="+1">
<!--<fieldset style="width:30%;"> -->
</p>
 
<!-- </fieldset> -->
</font>
</body>


</form>
</html>
