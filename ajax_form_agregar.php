<?
session_start();
	include "extras/php/conexion.php";
	@mysql_query("SET NAMES 'utf8'");
?>
<script language="JavaScript" src="index.js"></script>		
<style type="text/css">



.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?
// $nro_doc=$_POST['vnro_documento'];
 $nro_doc=$_REQUEST['ide_per'];
//  die('n'.$nro_doc);
 if (isset($nro_doc) and $nro_doc<>0 ){
	//$rs_personal = mysql_fetch_assoc($personal);
	} else {
	?>	  <a href="javascript:window.history.back();">Debe ingresar DNI.</a> <?
		return ;
	}

	$sql="select * from ba_mc_inscripciones where nro_documento = $nro_doc";
	$per = mysql_query($sql);
	$rs_per = mysql_fetch_assoc($per);
 	 if (substr($rs_per['f_cierre'],0,4)<>'0000'){ 
//	 	die('Ya la inscripción ya se confirmó, no se puede modificar.');
	//	return;
	 }
	//die($rs_per ['nombre']);

	?>
<form action="javascript: fn_agregar();" method="POST" id="frm_per"  accept-charset="UTF-8" >
  <p><? if ($_SESSION["especialidad"]=='G'){$esp='GRABADO';} 
  if ($_SESSION["especialidad"]=='P'){$esp='PINTURA'; }  
  echo $esp ;
   ?>	</p>

    <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000">
	 <INPUT TYPE="hidden" name="vespecialidad" value=<?=$esp ?> >
    </p>
  <table  WIDTH=750 align="left" bgcolor="#FFFFFF" > <!--class="formulario" -->
        <tbody>
		
            <tr>
              <td colspan="2" class="Estilo2"><span class="Estilo2">Apellido y Nombres *</span>
          <input name="vnombre" type="text" id="nombre" value="<?=$rs_per['nombre']?>" size="70" maxlength="150" class="required" />	  </td>
            </tr>
    <tr> <td colspan="2" class="Estilo2">Documento * 
  <input name="vnro_documento" type="text" id="nro_documento"  value="<?=$rs_per['nro_documento']?>"size="8" maxlength="8" class="required" onkeypress="return justNumbers(event);"  /> 
              Fecha de nacimiento
<!--              <input type="text" name="nndia" size="2" maxlength="2"  onkeypress="return justNumbers(event);"  class="required"   >   -->

<select name="ndia">
<?php

	for($d=1;$d<=31;$d++)  
	{
		if($d<10) 
			$dd = "0" . $d; 
		else
			$dd = $d; 
		if(substr($rs_per['f_nacimiento'],8,2)==$dd)
			echo "<option selected value='$dd'>$dd</option>";			
		else
			echo "<option value='$dd'>$dd</option>";
	}
?>


</select> 
<select name="nmes">
<option value='01' <? echo ((substr($rs_per['f_nacimiento'],5,2)=='01')? "selected" : "") ?> >Enero</option>
<option value='02' <? echo ((substr($rs_per['f_nacimiento'],5,2)=='02')? "selected" : "") ?>>Febrero</option>
<option value='03'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='03')? "selected" : "") ?>>Marzo</option>
<option value='04'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='04')? "selected" : "") ?>>Abril</option>
<option value='05'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='05')? "selected" : "") ?>>Mayo</option>
<option value='06'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='06')? "selected" : "") ?>>Junio</option>
<option value='07'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='07')? "selected" : "") ?>>Julio</option>
<option value='08'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='08')? "selected" : "") ?>>Agosto</option>
<option value='09'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='09')? "selected" : "") ?>>Setiembre</option>
<option value='10'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='10')? "selected" : "") ?>>Octubre</option>
<option value='11'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='11')? "selected" : "") ?>>Noviembre</option>
<option value='12'<? echo ((substr($rs_per['f_nacimiento'],5,2)=='12')? "selected" : "") ?>>Diciembre</option>
</select>

<select name="nanio">
<?php
	$tope = date("Y");
	$edad_max = 100;
	$edad_min = 18;
	for($a= $tope - $edad_max; $a<=$tope - $edad_min; $a++)
  {	if(substr($rs_per['f_nacimiento'],0,4)==$a)
		  	echo "<option selected value='$a'>$a</option>"; 
		else
		  	echo "<option value='$a'>$a</option>"; 

  }
?>
</select>
 Nacionalidad <input name="vnacionalidad" value="<?=$rs_per['nacionalidad']?>"  type="text" id="vnacionalidad" size="20" maxlength="20" /></td>
</tr>		
           
            <tr>
                <td colspan="2" class="Estilo2">Domicilio <input name="vdomicilio" type="text" id="domicilio"  value="<?=$rs_per['domicilio']?>" size="50" maxlength="200" />Localidad
                <input name="vlocalidad" type="text" id="vlocalidad"  value="<?=$rs_per['localidad']?>"size="20" maxlength="50">
               CP <input name="vcp" type="text" id="vcp" size="10"></td>
            </tr>
			
           
            <tr>
              <td colspan="2" class="Estilo2"><em>(no ingresar caracteres especiales, como por ej. º / ) </em></td>
            </tr>
            <tr>
              <td colspan="2" class="Estilo2">Teléfono
                   (<input name="vcaract_tel" type="text" id="caract_tel"  value="<?=$rs_per['caract_tel']?>"size="5" maxlength="10">)
				   <input name="vtelefono" type="text" id="telefono"  value="<?=$rs_per['telefono']?>"size="30" maxlength="50"> 
                e Mail 
              <input name="vcorreo_electronico"  value="<?=$rs_per['correo_electronico']?>"type="text" id="vcorreo_electronico" class="required" size="55" maxlength="60"></td>    </tr>
        </tbody>
        <tfoot>
            <tr>
              <td colspan="5" class="Estilo2"></td>
            </tr>
            
            <tr>
              <td colspan="5" class="Estilo2">Observaciones<input name="vobs" type="text"  value="<?=$rs_per['obs']?>"id="vobs" size="91" maxlength="150"  /></td>
            </tr>
            <tr>
              <td colspan="5" class="Estilo2"><strong>Datos de la obra</strong> </td>
            </tr>
            <tr>
              <td colspan="5" class="Estilo2"><p>Titulo
                <input name="vtitulo" type="text" id="vtitulo"  value="<?=$rs_per['titulo']?>" size="100" maxlength="100">
              </p></td>
            </tr>
            <tr>
              <td colspan="5" class="Estilo2">Fecha realización  
                <select name="frdia">
  <?php
	for($d=1;$d<=31;$d++)  
	{
		if($d<10) 
			$dd = "0" . $d; 
		else
			$dd = $d;
		if(substr($rs_per['f_realizacion'],8,2)==$dd)
			echo "<option selected value='$dd'>$dd</option>";			
		else
			echo "<option value='$dd'>$dd</option>";
	}
?>
</select>
<select name="frmes">
  <option value='01'<? echo ((substr($rs_per['f_realizacion'],5,2)=='01')? "selected" : "") ?>>Enero</option>
  <option value='02'<? echo ((substr($rs_per['f_realizacion'],5,2)=='02')? "selected" : "") ?>>Febrero</option>
  <option value='03'<? echo ((substr($rs_per['f_realizacion'],5,2)=='03')? "selected" : "") ?>>Marzo</option>
  <option value='04'<? echo ((substr($rs_per['f_realizacion'],5,2)=='04')? "selected" : "") ?>>Abril</option>
  <option value='05'<? echo ((substr($rs_per['f_realizacion'],5,2)=='05')? "selected" : "") ?>>Mayo</option>
  <option value='06'<? echo ((substr($rs_per['f_realizacion'],5,2)=='06')? "selected" : "") ?>>Junio</option>
  <option value='07'<? echo ((substr($rs_per['f_realizacion'],5,2)=='07')? "selected" : "") ?>>Julio</option>
  <option value='08'<? echo ((substr($rs_per['f_realizacion'],5,2)=='08')? "selected" : "") ?>>Agosto</option>
  <option value='09'<? echo ((substr($rs_per['f_realizacion'],5,2)=='09')? "selected" : "") ?>>Setiembre</option>
  <option value='10'<? echo ((substr($rs_per['f_realizacion'],5,2)=='10')? "selected" : "") ?>>Octubre</option>
  <option value='11'<? echo ((substr($rs_per['f_realizacion'],5,2)=='11')? "selected" : "") ?>>Noviembre</option>
  <option value='12'<? echo ((substr($rs_per['f_realizacion'],5,2)=='12')? "selected" : "") ?>>Diciembre</option>
</select>
<select name="franio">
  <?php
	$tope = date("Y");
	$edad_max = 14;
	$edad_min = 0;
	for($a= $tope - $edad_max; $a<=$tope - $edad_min; $a++)
		if(substr($rs_per['f_realizacion'],0,4)==$a)
		  	echo "<option selected value='$a'>$a</option>"; 
		else
		  	echo "<option value='$a'>$a</option>"; 
?>
</select></td>
            </tr>
            <tr>
              <td colspan="5" class="Estilo2">Procedimiento
                <textarea name="vprocedimiento" cols="90" id="vprocedimiento"> <?=$rs_per['procedimiento']?></textarea></td>
            </tr>
            <tr>
              <td colspan="5" class="Estilo2"><p>Dimensiones (cm) alto 
                
                  <select name="vdimension_al">
                  <?php
	for($d=40;$d<=200;$d++)  
	{
		if ($d==$rs_per['dimension_al']){
			echo "<option  selected value='$d'>$d</option>";
		}	else{
			echo "<option value='$d'>$d</option>";}
	}
?>
                </select>
                  ancho
                  <select name="vdimension_an">
                  <?php
		for($d=40;$d<=200;$d++)  
		{
			if ($d==$rs_per['dimension_an']){
			echo "<option  selected value='$d'>$d</option>";
			}	else{
			echo "<option value='$d'>$d</option>";}
			}
?>
                </select>
              </p></td>
            </tr><tr>
    <td colspan="5" class="Estilo2">Ingresá una clave para acceder a tus datos (hasta 8 caracteres)*
                <input type="password" name="vclave" size="8" maxlength="8" class="required" /> 
              confirma tu clave
          <input type="password" name="vclave2" size="8" maxlength="8" class="required" /></td>
            </tr>
            <tr>
              <td colspan="5" class="Estilo2"><strong>
 </strong></td>
            </tr>
            <tr>
                <td colspan="5" class="Estilo2">
                    <input name="agregar" type="submit" id="agregar" value="Agregar" />
              <input name="cancelar" type="button" id="cancelar" value="Cancelar" onclick="fn_cerrar();" />                </td>
            </tr>
        <td class="Estilo2"></tfoot>
  </table>
</form>

<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$("#frm_per").validate({
			rules:{
				usu_per:{
					required: true,
					remote: "ajax_verificar_usu_per.php"
				}
			},
			messages: {
				usu_per: "x"
			},
			onkeyup: false,
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea grabar?')
				if (respuesta)
					form.submit();
			}
		});
	});
	
	function fn_agregar(){
		var str = $("#frm_per").serialize();
		$.ajax({
			url: 'ajax_agregar.php',
			data: str,
			type: 'post',
			success: function(data){
				if(data != ""){
					alert(data);}else{
		  // 		if(data = "")		
			fn_mostrar_frm_modificarFotos1(1);}
				//fn_cerrar();

				//fn_buscar();
			}
		});
	};
</script>
