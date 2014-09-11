<style type="text/css">

.Estilo2 {font-size: 9px}

</style>
<html>
<head>
<link rel="STYLESHEET" type="text/css" href="estilo.css">
 <link href="../extras/css/estilo.css" rel="stylesheet" type="text/css" />
 <script language="javascript" type="text/javascript" src="index.js"></script>		
</head>
<body>
<?
	include "../extras/php/basico.php";
	include "../extras/php/conexion.php";

	/*$id=$_REQUEST['id_insc'];*/
	$id=$_REQUEST['ide_per'];	
	$sql="select * from ba_mc_inscripciones where id = $id ";
	$per = mysql_query($sql);
	$num_rs_per = mysql_num_rows($per);
	if ($num_rs_per==0){
		echo "No existen registros con ese ID ".$sql. $id;
		exit;
	}
	
	$rs_per = mysql_fetch_assoc($per);
	
?>

<form  action="javascript: fn_modificar_ficha();" method="post"  id="frm_per">
<table align="center" width="800" cellspacing="2" cellpadding="0" border="0" bgcolor="#ffffff">

<tr> 
    <td> Cargo a postularse* <font color="#000000">
        <select required  name="selectPuesto">
          <?
  	
	  $sql = 'select * from cargos WHERE etapa=2  order by id ';
	  $rs = mysql_query($sql, $con);
	  if ($rs_per["cargo"] == ' '){
		echo ("<option  selected >  </option>");	  
	  }
	  while($rowp = mysql_fetch_assoc($rs))
	  {	echo ("<option"); 
			if (rtrim(ltrim($rs_per["cargo"]))== rtrim(ltrim($rowp['codigo'])) and $rs_per["cargo"]<>' '){
				echo (' selected');
			} 
			echo(' value ="'.$rowp['codigo'].'">'.substr(ltrim($rowp['cargo']),0,40).'  -  '.substr(ltrim($rowp['direccion']),0,40).' '.$rowp['codigo']."</option>");			
    	}
    ?>
        </select>
        <input type="hidden" id="ide_per" name="ide_per" value="<?=$rs_per['id']?>" />
    </font></td>
    </tr>
    <tr>
      <td>Apellido y Nombres *
        <input name="vnombre" type="text" id="nombre" size="70" maxlength="150" class="required" value="<?=$rs_per['nombre']?>"/>      </td>
    </tr>
    <tr>
      <td>Documento <?=$rs_per['tipo_documento']?>
        *
        <input name="vnro_documento" type="text" id="nro_documento" size="8" maxlength="8" class="required" onKeyPress="return justNumbers(event);" value="<?=$rs_per['nro_documento']?>"/>
        Fecha de nacimiento (dd/mm/aaaa):
        <input type="text" name="ndia" size="2" maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['f_nacimiento'],8,2)?>">
        <input type="text" name="nmes" size="2"  maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['f_nacimiento'],5,2)?>">
        <input type="text" name="nanio" size="4" maxlength="4" onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['f_nacimiento'],0,4)?>"> </td>
    </tr>
    <tr>
      <td>Estado Civil
        <select name="vestado_civil" ide="vestado_civil" >
            <option value=" "> </option>
            <option <? if($rs_per["estado_civil"]=="Soltero"){echo (' selected ');} ?>value="Soltero">Soltero</option>
            <option <? if($rs_per["estado_civil"]=="Casado"){echo (' selected ');} ?>value="Casado">Casado</option>
            <option <? if($rs_per["estado_civil"]=="Viudo"){echo (' selected ');} ?>value="Viudo">Viudo</option>
            <option <? if($rs_per["estado_civil"]=="Divorciado"){echo (' selected ');} ?>value="Divorciado">Divorciado</option>
          </select>
        Hijos
        <input name="vhijos" type="text" id="vhijos" size="2" maxle="2" onKeyPress="return justNumbers(event);" value="<?=$rs_per['hijos']?>" /></td>
    </tr>
    <tr>
      <td>Domicilio Real
        <input name="vdom_real" type="text" id="dom_real" size="100" maxlength="200" value="<?=$rs_per['dom_real']?>" /></td>
    </tr>
    <tr>
      <td>Domicilio Legal
          <input name="vdom_legal" type="text" id="vdom_legal" size="80" maxlength="200"value="<?=$rs_per['dom_legal']?>">
        CP
        <input name="vcp" type="text" id="vcp" size="10"value="<?=$rs_per['cp']?>">
      <tr>
        <td>Tel.Particular
            <input name="vtel_particular" type="text" id="tel_particular" size="30" maxlength="60"  value="<?=$rs_per['tel_particular']?>"/>
          Otros Tel&eacute;fonos
          <input name="votros_telefonos" type="text" id="votros_telefonos" size="46" maxlength="60"value="<?=$rs_per['otros_telefonos']?>">        </td>
      </tr>

        <tr>
          <td colspan="4">Correo electr&oacute;nico
            <input name="vcorreo_electronico" type="text" id="vcorreo_electronico" size="60" maxlength="60" value="<?=$rs_per['correo_electronico']?>"></td>
        </tr>
        <tr>
          <td colspan="4">N&ordm;Legajo
            <input name="vlegajo" type="text" id="vlegajo" size="6" maxlength="6" onKeyPress="return justNumbers(event);"value="<?=$rs_per['legajo']?>">
            Revista como titular planta permanente desde (dd/mm/aaaa):
        <input type="text" name="ppdia" size="2" maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['planta_permanente_desde'],8,2)?>">
        <input type="text" name="ppmes" size="2"  maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['planta_permanente_desde'],5,2)?>">
        <input type="text" name="ppanio" size="4" maxlength="4" onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['planta_permanente_desde'],0,4)?>"> 
			
            <?
/*escribe_formulario_fecha("vplanta_permanente_desde","frm_per","$planta_permanente_desde");
escribe_formulario_fecha("vfecha","frm_pers","$fecha");*/
?></td>
        </tr>
        <tr>
          <td colspan="4">Revista o cumple tareas en el Teatro Argentino desde(dd/mm/aaaa):
          
        <input type="text" name="rddia" size="2" maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['revista_desde'],8,2)?>">
        <input type="text" name="rdmes" size="2"  maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['revista_desde'],5,2)?>">
        <input type="text" name="rdanio" size="4" maxlength="4" onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['revista_desde'],0,4)?>">			  </td>
        </tr>
        <tr>
          <td colspan="4">Dependencia Origen<font color="#000000">
            <select name="selectDepOrigen">
              <?
	  $sql = 'select * from dependencias order by descripcion ';
	  $rs = mysql_query($sql, $con);
	  if ($rs_per["dep_origen"] == ''){
		echo ("<option  selected >  </option>");	  
	  }
	echo ("<option"); 
			if (-1==$rs_per["dep_origen"] ){
				echo (' selected');
			} 
			echo(' value =-1 >INSTITUTO CULTURAL.</option>');			
			
	  while($rowp = mysql_fetch_assoc($rs))
	  {	echo ("<option"); 
			if ($rs_per["dep_origen"]== $rowp['codigo'] and $rs_per["dep_origen"]<>''){
				echo (' selected');
			} 
			echo(' value ="'.$rowp['codigo'].'">'.substr(ltrim($rowp['descripcion']),0,40)."</option>");			
    	}
    ?>
            </select>
          </font></td>
        </tr>
        <tr>
          <td colspan="4">Escalaf&oacute;n
				 <select name="vescalafon" ide="vescalafon" >
                <option value=" "> </option>
                <option <? if($rs_per["escalafon"]=="A"){echo (' selected ');} ?> value="A">AGRUPAMIENTO ARTISTICO</option>
                <option <? if($rs_per["escalafon"]=="AA"){echo (' selected ');} ?> value="AA">AGRUPAMIENTO II - AUXILIAR ARTISTICO</option>
                <option <? if($rs_per["escalafon"]=="PTA"){echo (' selected ');} ?> value="PTA">AGRUPAMIENTO IV - PROFESIONAL TECNICO ADMINISTRATIVO</option>
                <option <? if($rs_per["escalafon"]=="MSG"){echo (' selected ');} ?> value="MSG">AGRUPAMIENTO V - MANTENIMIENTO Y SERVICIOS GENERALES</option>				
              </select>
			
            Categor&iacute;a
            <input name="vcategoria" type="text" id="vcategoria" size="2" maxlength="2"  value="<?=$rs_per['categoria']?>" onKeyPress="return justNumbers(event);"  /></td>
        </tr>
        <tr>
          <td colspan="4">Dependencia donde desarrolla la actividad actualmente <font color="#000000">
            <select name="selectDepto">
              <?
  	
	  $sql = 'select * from dependencias order by descripcion ';
	  $rs = mysql_query($sql, $con);
	  if ($rs_per["depto"] == ''){
		echo ("<option  selected >  </option>");	  
	  }
	  while($rowp = mysql_fetch_assoc($rs))
	  {	echo ("<option"); 
			if ($rs_per["depto"]== $rowp['codigo'] and $rs_per["depto"]<>''){
				echo (' selected');
			} 
			echo(' value ="'.$rowp['codigo'].'">'.substr(ltrim($rowp['descripcion']),0,40)."</option>");			
    	}
    ?>
            </select>
          </font></td>
        </tr>
        <tr>
          <td colspan="4">desde(dd/mm/aaaa):
        <input type="text" name="dadia" size="2" maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['dep_actual_desde'],8,2)?>">
        <input type="text" name="dames" size="2"  maxlength="2"  onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['dep_actual_desde'],5,2)?>">
        <input type="text" name="daanio" size="4" maxlength="4" onKeyPress="return justNumbers(event);" value="<?=substr($rs_per['dep_actual_desde'],0,4)?>"></td>
        </tr>
        <tr>
          <td colspan="4">Obs<input name="vobs" type="text" id="vobs" size="120" maxlength="150"  value="<?=$rs_per['obs']?>"/></td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
      </tfoot>

  <tr>
        <td colspan="2"><input name="modificar" type="submit" id="modificar" value="Modificar" />
            <input name="cancelar" type="button" id="cancelar" value="Cancelar" onClick="fn_cerrar();" />        </td>
      </tr>
  <td class="Estilo2"></td><td class="Estilo2"></tr>
</table>

</form>  

<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$("#frm_per").validate({
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea modificar?')
				if (respuesta)
					form.submit();
			}
		});
	});
	
	function fn_modificar_ficha(){
		var str = $("#frm_per").serialize();
		$.ajax({
			url: 'ajax_modificar_ficha.php',
			data: str,
			type: 'post',
			success: function(data){
				if(data != "")
					alert(data);
				fn_cerrar();
				fn_buscar();
			}
		});
	};
</script>
