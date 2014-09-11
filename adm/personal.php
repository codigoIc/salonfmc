<? session_start();
	include "../extras/php/conexion.php";
	/*@mysql_query("SET NAMES 'utf8'"); */
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

<? 
/*if (empty($_SESSION["usuario"])){?>
<a href="../index.php" target="_blank">Debe ingresar clave</a>
<? return; } */?>
    <body>
    	<div id="cuerpo">
            <form action="javascript: fn_buscarpersonal();" name="frm_buscar" id="frm_buscar" accept-charset="UTF-8">
			            <table width="690" height="125" bgcolor="#F3F3F3" class="formulario" border='1'>
                <tbody>
				<? if (!(isset($_SESSION["usuario_adm"] ))){ ?>
				  <tr>
				    <td><span class="Estilo2">PRIMER INGRESO :</span><span class="Estilo4">
			       
			        DNI</span> 
			          <input name="criterio_documento2" type="text" id="criterio_documento2" size="8" maxlength="8"   /> <a href="javascript: fn_mostrar_frm_agregar(document.getElementById ('criterio_documento2').value);"><img src="../extras/ico/add.png" /> Cargar datos personales </a>
			        </td>
				  </tr>
				<? } ?>
                 <tr> <td  class="Estilo2"><? if (!(isset($_SESSION["usuario_adm"] ))){ ?>POSTULANTE YA INSCRIPTO:<? } ?>
                      <p> Ingrese Documento
                        <input name="criterio_documento" type="text" id="criterio_documento" size="8" maxlength="8" class="required" onkeypress="return justNumbers(event);"   <?	if ( is_numeric($_SESSION["usuario"]) ){echo 'value="'.$_SESSION["usuario"].'"';}?> />

	<? if (!(isset($_SESSION["usuario_adm"] ))){ ?>			             Contrase&ntilde;a
                        <input name="criterio_clave"  type="password"  id="criterio_clave" size="8" maxlength="8"  <?	if ( is_numeric($_SESSION["usuario"]) ){echo 'value="'.$_SESSION["clave"].'"';}?> /> <? } ?>
							<? if (isset($_SESSION["usuario_adm"] )){ ?>		
				   </p>
                      <p>Cargo a postularse</p>
                      <p><span class="Estilo3">
                        <select name="selectPuesto">
                          <?
  	
	  $sql = 'select * from cargos where etapa <>0 order by direccion,cargo ';
	  $rs = mysql_query($sql, $con);
	 echo ("<option  selected >  </option>");	  
	  while($rowp = mysql_fetch_assoc($rs))
	  {	echo ("<option"); 
			echo(' value ="'.$rowp['codigo'].'">'.substr(ltrim($rowp['cargo']),0,40).'  -  '.substr(ltrim($rowp['direccion']),0,40).' '.$rowp['codigo']."</option>");			
    	}
    ?>
                        </select>
                      </span> <? } ?>
                        <!-- Orden
                        <select name="criterio_ordenar_por" id="criterio_ordenar_por">
                            <option value="id">ID</option>
                            <option value="partido_nom">Partido</option>
                            <option value="denominacion">Denominacion</option> 
                    </select>           -->      
                        <input name="submit" type="submit" value="Completar Formulario" />
                      </p>
                      </td>
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

