<?
	include "../extras/php/conexion.php";
?>
<script language="JavaScript" src="index.js"></script>		
<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
-->
</style>
<h2 class="Estilo3">Formulario de inscripci&oacute;n del postulante </h2>

<?

 $id=$_POST['ide_per'];
if (isset($id) and $id<>0 ){
	$sql="select * from ba_mc_inscripciones where id = $id ";
	$per = mysql_query($sql);
	$rs_per = mysql_fetch_assoc($per);
	}
	?>
<form action="ajax_form_agregar.php" method="post" id="frm_per">
  <table  WIDTH=750 align="left" bgcolor="#FFFFFF" > <!--class="formulario" -->
        <tbody>
           

<tr> <td>Documento  
              <span class="Estilo1">
              <input name="vnro_documento" type="text" id="nro_documento" size="8" maxlength="8" class="required" onkeypress="return justNumbers(event);" />
              </span></td>
</tr>		
        </tbody>
        <tfoot>
            
            <tr>
              <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">
                    <input name="agregar" type="submit" id="agregar" value="Siguiente" />
                    <input name="cancelar" type="button" id="cancelar" value="Cancelar" onclick="fn_cerrar();" />                </td>
            </tr>
        </tfoot>
  </table>
</form>
