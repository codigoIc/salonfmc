<? session_start();

	include "../extras/php/conexion.php";
	include "../extras/php/basico.php";
	include "../extras/php/PHPPaging.lib.php";
	header ("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
	header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
	header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE
	header (' <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />');
echo "<script type='text/javascript' src='../extras/js/jquery.min.js'></script>";
echo '<script  type="text/javascript" src="../extras/js/jquery.magnifier.js"></script> ';
  ?>          <div id="div_listar"></div> <?
	$paging = new PHPPaging;
	$sql = "select * from titulares ";
/*	$sql .= " where 1=1 ";
	if (isset($_GET['criterio_documento']) and $_GET['criterio_documento']<>''  and $_GET['criterio_documento']<>0){
		$sql .= " and nro_documento = ".$_GET['criterio_documento'];
	}
	$_SESSION["comando_select"]=$sql;*/
	$paging->agregarConsulta($sql); 
	
	$paging->div('div_listar');
	$paging->modo('desarrollo'); 
	$paging->porPagina(6);
	$paging->verPost(true);
	$paging->mantenerVar("criterio_usu_per", "criterio_ordenar_por", "criterio_orden", "criterio_mostrar","criterio_nombre","criterio_clasificacion","criterio_region","criterio_partido","criterio_jurisdiccion","criterio_tipologia");
	$paging->ejecutar();
	if ($paging->numTotalRegistros==0){/* ?>
		<script language="JavaScript" type="text/javascript">
			alert('No hay registros que cumplan la condicion.');
		</script>

<?*/	} ?>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 16px;
	font-weight: bold;
}
.Estilo2 {color: #000099}
-->
</style>

<table id="grilla"  width="690" border='0' >
  <!--class="lista" -->
  <thead>
   <!--  <tr>
      <th > <div align="right"><a href="javascript: fn_mostrar_frm_agregar();"><img src="../extras/ico/add.png" /> Formulario </a></div></th>
    </tr> -->
    <tr>
      <td colspan="5"><hr width="100%" /></td>
    </tr>
  </thead>
  <tbody>
    <?

        while ($rs_per = $paging->fetchResultado()){
		/*        <tr id="tr_<?=$rs_per['id']?>">
		        <tr>  <td><?=substr($rs_per['denominacion'],0,500)?></td>*/
    ?>
    <tr>
      
	   <td width="149" colspan="2"> <span class="Estilo1">
        <?=$rs_per['APELLIDO'].' - '.'DNI '.$rs_per['DOCUMENTO']?>
   </td>
    </tr>
 	
    <tr>
      <td colspan="5"><hr width="100%" /></td>
    </tr>
    <? } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5"><? /*
					-- Aqui MOSTRAMOS MAS DETALLADAMENTE EL PAGINADO
					Página: <?=$paging->numEstaPagina()?>, de <?=$paging->numTotalPaginas()?><br />
					Mostrando: <?=$paging->numRegistrosMostrados()?> registros, del <?=$paging->numPrimerRegistro()?> al <?=$paging->numUltimoRegistro()?><br />
					De un total de: <?=$paging->numTotalRegistros()?><br />
                */ ?>
			<? if ($paging->numTotalRegistros>1){?>	

         <?=$paging->fetchNavegacion().'    Cantidad de registros:'.$paging->numTotalRegistros?>
         <? } ?></td>
    </tr>
  </tfoot>
</table>
