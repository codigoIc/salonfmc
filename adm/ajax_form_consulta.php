<style type="text/css">
<!--
.disabled
{
 background-color: #FFFFFF;font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif;border: none;
} 
body {
	background-repeat: no-repeat;
}
.Estilo11 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.Estilo15 {font-size: 12}
.Estilo17 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.Estilo18 {font-size: 10px}
.Estilo19 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Estilo21 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo23 {
	font-size: 18px;
	color: #FF9933;
}
-->
</style><body>

<?
	/*if(empty($_POST['ide_per'])){
		echo "Por favor no altere el fuente";
		exit;
	}*/

	include "../extras/php/basico.php";
	include "../extras/php/conexion.php";
echo "<script type='text/javascript' src='../extras/js/jquery.min.js'></script>";
echo '<script  type="text/javascript" src="../extras/js/jquery.magnifier.js"></script> ';

//	$sql = sprintf("select * from autores where id=%d",		(int)$_POST['ide_per']);
//	$id=$_POST['ide_per'];
	$id=$_REQUEST['ide_per'];
	$sql="select * from ba_mc_inscripciones where id = $id ";
	$per = mysql_query($sql);
	$num_rs_per = mysql_num_rows($per);
	if ($num_rs_per==0){
		echo "No existen registros con ese ID   --".$sql;
		exit;
	}
	
	$rs_per = mysql_fetch_assoc($per);
	
?>

<form  action="javascript: fn_modificar();" method="post" id="frm_per"> 
 <input type="hidden" id="ide_per" name="ide_per" value="<?=$rs_per['id']?>"/>

<table  WIDTH=832 height="306" align="left" bgcolor="#FFFFFF" > <!--class="formulario" -->
  <tr>
              <td colspan="2"  ><strong> INSCRIPCION  NRO :
          <?=$rs_per['nro']?> </strong> </td>
            </tr>
            <tr>
              <td  ><strong>Apellido y Nombres :</strong>
          <?=$rs_per['nombre']?>  </td>
              <td width="434" rowspan="12"  ><? if( !empty($rs_per['fotografia1'])) {?>
                <img src="<? echo '../'.$rs_per['fotografia1'] ?>" class="magnify"  height="160" title="Click para ampliar" />        
                <? } ?>
                <? if( !empty($rs_per['fotografia2'])) {?>
                <img src="<? echo '../'.$rs_per['fotografia2'] ?>" class="magnify"  height="160" title="Click para ampliar" />
                <? } ?>
	            <? if( !empty($rs_per['fotografia3'])) {?>
                <img src="<? echo '../'.$rs_per['fotografia3'] ?>" class="magnify"  height="160" title="Click para ampliar" />        
                <? } ?>
                <? if( !empty($rs_per['fotografia4'])) {?>
                <img src="<? echo '../'.$rs_per['fotografia4'] ?>" class="magnify"  height="160" title="Click para ampliar" />                <? } ?>	  </td>
            </tr>
    <tr> <td width="386"  ><strong>Documento :  </strong>
<?=$rs_per['nro_documento']?>      </td>
    </tr>		
 <tr> <td  ><strong> Fecha de nacimiento :</strong> <?=$rs_per['f_nacimiento']?>
 </td>
   </tr>		
 <tr> <td  ><strong> Nacionalidad :</strong><?=$rs_per['nacionalidad']?></td>
   </tr>		
           
            <tr>
                <td  ><strong>Domicilio :</strong><?=$rs_per['domicilio']?>  Localidad
                <?=$rs_per['localidad']?> CP <?=$rs_per['cp']?> </td>
            </tr>
			
                 
            <tr>
              <td  ><strong>Tel&eacute;fono :</strong>(<?=$rs_per['caract_tel']?>)<?=$rs_per['telefono']?>
                  <strong>e mail :</strong><?=$rs_per['correo_electronico']?></td>    
            </tr>
       
           
              <tr><td   ><strong>Observaciones :</strong><?=$rs_per['obs']?> </td>
            </tr>
            <tr>
              <td   ><strong>DATOS DE LA OBRA</strong> </td>
            </tr>
            <tr>
              <td   ><strong>Titulo :</strong><?=$rs_per['titulo']?></td>
            </tr>
            <tr>
              <td    ><strong>Fecha realizaci&oacute;n: </strong><?=$rs_per['f_realizacion']?></td>
            </tr>
            <tr>
              <td   ><strong>Procedimiento:</strong> <?=$rs_per['procedimiento']?> </td>
            </tr>
            <tr>
              <td   ><strong>Dimensiones:</strong> <?=$rs_per['dimension_al']?> cm alto 
                <?=$rs_per['dimension_an']?>   cm ancho              </td>
            </tr>
		
            
            <tr>
              <td   >
                   
              <input name="cancelar" type="button" id="cancelar" value="Cerrar" onClick="fn_cerrar();" /></td>
                <td   >  <? if( !empty($rs_per['documento1'])) {?>
      <img src="<? echo '../'.$rs_per['documento1'] ?>" class="magnify"  height="140" title="Click para ampliar" />        <? } ?><? if( !empty($rs_per['documento2'])) {?>
      <img src="<? echo '../'.$rs_per['documento2'] ?>" class="magnify"  height="140" title="Click para ampliar" />        <? } ?>	</td>
            </tr>
  </table>


</form>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$("#frm_per").validate({
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea realmente modificar a esta nueva persona?')
				if (respuesta)
					form.submit();
			}
		});
	});
	
	function fn_modificar(){
		var str = $("#frm_per").serialize();
		$.ajax({
			url: 'ajax_modificar.php',
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
