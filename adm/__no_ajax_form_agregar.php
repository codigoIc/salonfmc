<?
	include "../extras/php/conexion.php";
	@mysql_query("SET NAMES 'utf8'");
?>
<script language="JavaScript" src="index.js"></script>		
<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<h2 class="Estilo3">Formulario de inscripci&oacute;n del postulante </h2>

<?
// $nro_doc=$_POST['vnro_documento'];
 $nro_doc=$_REQUEST['ide_per'];
//  die('n'.$nro_doc);
 if (isset($nro_doc) and $nro_doc<>0 ){
	$rs_personal = mysql_fetch_assoc($personal);
	} else {
	?>	  <a href="javascript:window.history.back();">Debe ingresar DNI.</a> <?
		return ;
	}


/* $id=$_POST['ide_per'];
if (isset($id) and $id<>0 ){
	$sql="select * from ba_mc_inscripciones where id = $id ";
	$per = mysql_query($sql);
	$rs_per = mysql_fetch_assoc($per);
	}*/
	?>
<form action="javascript: fn_agregar();" method="post" id="frm_per"  accept-charset="UTF-8">
<span class="Estilo1"></span>
<table  WIDTH=750 align="left" bgcolor="#FFFFFF" > <!--class="formulario" -->
        <tbody>
           

            <tr>
              <td>Apellido y Nombres *
          <input name="vnombre" type="text" id="nombre" size="70" maxlength="150" class="required" />		  </td>
            </tr>
    
<tr> <td>Documento  
              * 
  <input name="vnro_documento" type="text" id="nro_documento" size="8" maxlength="8" class="required" onkeypress="return justNumbers(event);"  /> 
              Fecha de nacimiento (dd/mm/aaaa) *
              <input type="text" name="ndia" size="2" maxlength="2"  onkeypress="return justNumbers(event);"  class="required"   >
<input type="text" name="nmes" size="2"  maxlength="2"  onkeypress="return justNumbers(event);"  class="required" >
<input type="text" name="nanio" size="4" maxlength="4" onkeypress="return justNumbers(event);"  class="required" ></td>
</tr>		
          
            <tr>
              <td>Nacionalidad
              <input name="vnacionalidad" type="text" id="vnacionalidad" size="20" maxlength="20" /></td>
            </tr>
            <tr>
                <td>Domicilio <input name="vdomicilio" type="text" id="domicilio" size="100" maxlength="200" /></td>
            </tr>
			
            <tr>
              <td>Localidad
                <input name="vlocalidad" type="text" id="vlocalidad" size="50" maxlength="50">
               CP <input name="vcp" type="text" id="vcp" size="10">
          <td>          </tr>
            <tr>
              <td><em>(no ingresar caracteres especiales, como por ej. º / ) </em></td>
            </tr>
            <tr>
                <td>Teléfono
                  <input name="vtelefono" type="text" id="telefono" size="50" maxlength="50"  /></td>    </tr>
        </tbody>
        <tfoot>
            <tr>
              <td colspan="4">Correo electr&oacute;nico 
              <input name="vcorreo_electronico" type="text" id="vcorreo_electronico" size="60" maxlength="60"></td>
            </tr>
            
            <tr>
              <td colspan="4">Obs<input name="vobs" type="text" id="vobs" size="110" maxlength="150"  /></td>
            </tr>
            <tr>
              <td colspan="4"><strong>Datos de la obra</strong> </td>
            </tr>
            <tr>
              <td colspan="4"><p>Titulo
                <input name="vtitulo" type="text" id="vtitulo" size="100" maxlength="100">
              </p></td>
            </tr>
            <tr>
              <td colspan="4">Fecha realización  <input type="text" name="frdia" size="2" maxlength="2"  onkeypress="return justNumbers(event);"  class="required"   >
<input type="text" name="frmes" size="2"  maxlength="2"  onkeypress="return justNumbers(event);"  class="required" >
<input type="text" name="franio" size="4" maxlength="4" onkeypress="return justNumbers(event);"  class="required" ></td>
            </tr>
            <tr>
              <td colspan="4">Procedimiento
                <textarea name="vprocedimiento" cols="100" id="vprocedimiento"></textarea></td>
            </tr>
            <tr>
              <td colspan="4"><p>Dimensiones (cm)
                <input name="vdimension_an" type="text" id="vdimension_an" size="6" maxlength="6" /> <input name="vdimension_al" type="text" id="vdimension_al" size="6" maxlength="6" />
              </p></td>
            </tr>
            <tr>
              <td colspan="4">Ingrese una clave para acceder a sus datos (hasta 8 caracteres)*
                <input type="password" name="vclave" size="8" maxlength="8" class="required" /> 
              confirme su clave              
              <input type="password" name="vclave2" size="8" maxlength="8" class="required" /></td>
            </tr>
            <tr>
              <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">
                    <input name="agregar" type="submit" id="agregar" value="Agregar" />
                    <input name="cancelar" type="button" id="cancelar" value="Cancelar" onclick="fn_cerrar();" />                </td>
            </tr>
        </tfoot>
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
				if(data != "")
					alert(data);
				fn_cerrar();
				fn_buscar();
			}
		});
	};
</script>
