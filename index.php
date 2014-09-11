<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
          <meta http-equiv="Content-Type" content="text/html" /> 

        <script language="javascript" type="text/javascript" src="extras/js/jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="extras/js/jquery.blockUI.js"></script>
		 <script language="javascript" type="text/javascript" src="index.js"></script>		
        <script language="javascript" type="text/javascript" src="extras/js/jquery.validate.1.5.2.js"></script>
<link href="./libs/estilos.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
    	
body {
	background-image: url();
	background-color: #000000;
	background-repeat: no-repeat;
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
<body>
    	<div id="div_oculto">
    	<? $_SESSION["usuario_adm"] ='';?>
    	<div id="div_oculto1" style="display: none;width:820px;height:550px; overflow:scroll; background-color:white" ></div>

<table border=0 width="1033" height="745" align="center">
<tr><td align="center" valign="top"><div align="center">
  <!--<img src="graficos/portal_completo.JPG" width="1033" height="745" alt="Mapa de imágenes. Pulsa en cada una de los círculos." border="0" usemap="#mapa1"> -->
  <img src="graficos/aj1.JPG"  alt="Mapa de imágenes. Pulsa en cada una de los círculos." border="0" usemap="#mapa1" />
  <map name="mapa1">
    <area alt="Inscripcion" shape="rect" coords="655,558,798,621"  href="javascript: fn_reglamento('G');" />
    <area alt="Pulsa para conocer el reglamento" shape="rect" coords="434,562,607,614"  href="documentacion/reglamento.pdf" />
    <area alt="Inscripcion" shape="rect" coords="658,489,801,552"  href="javascript: fn_reglamento('P');" />
    <area alt="Administracion" shape="rect" coords="776,36,906,101"  href="javascript: fn_administracion();" />
  </map>
  <br>
</div></td></tr></table> 

</body>


</html>
