<? session_start();
	include "../extras/php/conexion.php";
if (empty($_SESSION['usuario'])){
	die('ACCESO LIMITADO A ADMINSTRACION');
	}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title> </title>
        <script language="javascript" type="text/javascript" src="../extras/js/jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="../extras/js/jquery.blockUI.js"></script>
        <script language="javascript" type="text/javascript" src="../extras/js/jquery.validate.1.5.2.js"></script>
        <link href="../extras/css/estilo.css" rel="stylesheet" type="text/css" />
        <link href="../extras/php/PHPPaging.lib.css" rel="stylesheet" type="text/css" />
 <script language="javascript" type="text/javascript" src="index.js"></script>		
       
<!-- 		<script type='text/javascript' src='../extras/js/jquery.min.js'></script>
       <script  type="text/javascript" src="../extras/js/jquery.magnifier.js"></script> 
        <style type="text/css">-->
<!--
.Estilo6 {color: #000000; font-size: x-small;}
.Estilo7 {
	color: #000000;
	font-weight: bold;
}
-->
        </style>
        <style type="text/css">
<!--
.Estilo2 {
	font-size: 12;
	font-weight: bold;
}
.Estilo3 {font-size: large}
.Estilo4 {
	color: #000000;
	font-weight: bold;
}
-->
        </style>
</head>

    	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
		    <tr>      
				<td width="100%" align="center" >
                <img src="../graficos/banda_superior.jpg" alt="Instituto Cultural de la Provincia" >                </td>
			</tr>
</table>
    <body>
    	<div id="cuerpo">
       <!--     <form action="javascript: fn_buscar();" name="frm_buscar" id="frm_buscar" accept-charset="UTF-8"> -->
	    <form action="javascript: fn_buscar();" name="frm_buscar" id="frm_buscar" > 
			            <table width="690" border="0">
  <tr>
    <td width="453"><h1 class="Estilo3">MOLINA CAMPOS  -Formulario de Inscripci&oacute;n			</h1></td>
					<? if ((isset($_SESSION["usuario_adm"] ))){ ?>
<!--	<td width="72"><h1 align="center" class="Estilo2"> <a href="personal.php">Personal</a></h1></td>					 -->
	 <td width="79"><h1 align="center" class="Estilo2"> <a href="../galeria/index.php">Galeria</a></h1>     </td>				
    <td width="83"><h1 align="center" class="Estilo2"> <a href="listado.php?esp=G">Listado</a></h1>      </td>
		
					<? } ?>
    <td width="57"><h1 align="center" class="Estilo2"> <a href="../index.php">Inicio</a></h1></td> 
  </tr>
</table>
           
			
              <table width="690"  bgcolor="#F3F3F3" class="formulario" border='1'>
                <tbody>
				
                 <tr> <td  class="Estilo2">
                   <p> Ingrese Documento, Nro. de inscripci&oacute;n o nombre
                        <input name="criterio_documento" type="text" id="criterio_documento" size="20" maxlength="20" class="required"    <?	if ( is_numeric($_SESSION["usuario"]) ){echo 'value="'.$_SESSION["usuario"].'"';}?> />

	
                        <!-- Orden
                        <select name="criterio_ordenar_por" id="criterio_ordenar_por">
                            <option value="id">ID</option>
                            <option value="partido_nom">Partido</option>
                            <option value="denominacion">Denominacion</option> 
                    </select>           -->      
                        <input name="submit" type="submit" value="Buscar" /></td>
                  </tr>
              </table>
          </form>
            <div id="div_listar"></div>
 <div id="div_oculto" style="display: none;width:820px;height:550px; overflow:scroll; background-color:white" ></div>
	<? if( !empty($_SESSION["usuario"])) {?>
            <p>Usuario activo: <? echo $_SESSION["usuario"] ?>
 </p>    </div>
	<? } ?>
</body>
</html>

<?
function desencri($lcaencript){
	$lcdevuelve='';
	$hasta=strlen($lcaencript);
	for ($a=0 ; $a < $hasta ; $a++) {
		$caracter=substr($lcaencript,$a,1);
		$ascc=ord($caracter);
		if ($ascc==32) {
			$lcdevuelve=$lcdevuelve." ";
			}
		else
		{
			/*$modulo = fmod($a,2);*/
			$modulo = $a % 2 ;
			if ($modulo=0) {
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a,1))-2);
				}
			else
			{
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a,1))-3);
				}
			}
	}
	return $lcdevuelve;
	}
function encripta($lcaencript){
	$lcdevuelve='';
	$hasta=strlen($lcaencript);
	for ($a=1 ; $a <= $hasta ; $a++) {
		$caracter=substr($lcaencript,$a-1,1);
		$ascc=ord($caracter);
		if ($ascc==32) {
			$lcdevuelve=$lcdevuelve." ";
			}
		else
		{
			$modulo = $a % 2 ;
			if ($modulo==0) {
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a-1,1))+2);
				}
			else
			{
				$lcdevuelve=$lcdevuelve.chr(ord(substr($lcaencript,$a-1,1))+3);
			}
		}
	} 
return $lcdevuelve;
}
?>