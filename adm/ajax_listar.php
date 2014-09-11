<? session_start();

	include "../extras/php/conexion.php";
	include "../extras/php/basico.php";
	include "../extras/php/PHPPaging.lib.php";
	header ("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
	header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
	header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE
/*	header (' <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');*/
	header (' <meta http-equiv="Content-Type" content="text/html" />');
echo "<script type='text/javascript' src='../extras/js/jquery.min.js'></script>";
echo '<script  type="text/javascript" src="../extras/js/jquery.magnifier.js"></script> ';
	$paging = new PHPPaging;
/*	$sql = "select * from ba_mc_inscripciones";
	$sql .= " where 1=1 ";
	$sql .= " and clave ='".$_GET['criterio_clave']."'";
	if (isset($_GET['criterio_documento']) and $_GET['criterio_documento']<>'')
		{	$sql .= " and nro_documento =".fn_filtro(substr($_GET['criterio_documento'], 0, 16));
			if ( is_numeric($_GET['criterio_documento']) ){
			$_SESSION["usuario"]=$_GET['criterio_documento'];
			$_SESSION["clave"]=$_GET['criterio_clave'];}
		}
		else
		{	$sql .= " and nro_documento =0";		}

*/

	$sql = "select * from ba_mc_inscripciones i ";
	$sql .= " where 1=1 ";
	if (isset($_GET['criterio_documento']) and $_GET['criterio_documento']<>0){
		$sql .= " and ( nro_documento = ".$_GET['criterio_documento']." or  nro = ".$_GET['criterio_documento']." or nombre like '%".rtrim(ltrim($_GET['criterio_documento']))."%')";
}
$sql .= " order by id ";
//die($_GET['criterio_documento']);

//die($sql);
/*	$sql = "select * from ba_mc_inscripciones";
	$sql .= " where clave ='".$_GET['criterio_clave']."'";
	$sql .= " and nro_documento =".fn_filtro(substr($_GET['criterio_documento'], 0, 16));*/


	//if (isset($_GET['criterio_ordenar_por']))
//		$sql .= sprintf(" order by %s %s", fn_filtro($_GET['criterio_ordenar_por']), fn_filtro($_GET['criterio_orden']));
/*	{	$sql .= " order by id desc, ";
		$sql .= fn_filtro($_GET['criterio_ordenar_por']);}
	else
		$sql .= " order by id desc";*/

	$_SESSION["comando_select"]=$sql;
	$paging->agregarConsulta($sql); 
	
	$paging->div('div_listar');
	$paging->modo('desarrollo'); 
//	if (isset($_GET['criterio_mostrar']))
	//	$paging->porPagina(fn_filtro((int)$_GET['criterio_mostrar']));
	$paging->porPagina(5);
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
	font-size: 13px;
	font-weight: bold;
}
-->
</style>

<table id="grilla"  width="691" border='0' >
  <!--class="lista" -->
  <thead>
   <!--  <tr>
      <th > <div align="right"><a href="javascript: fn_mostrar_frm_agregar();"><img src="../extras/ico/add.png" /> Formulario </a></div></th>
    </tr> -->
    <tr>
      <td colspan="2"><hr width="100%" /></td>
    </tr>
  </thead>
  <tbody>
    <?

        while ($rs_per = $paging->fetchResultado()){
		/*        <tr id="tr_<?=$rs_per['id']?>">
		        <tr>  <td><?=substr($rs_per['denominacion'],0,500)?></td>*/
    ?>
    <tr>
      <td > <a href="ficha_imprime.php?id=<?=$rs_per['id']?>" target="_blank"><img src="../extras/ico/imprime.gif" width="19" height="19" /></a> <?=$rs_per['estado']?>
	  <span class="Estilo1"><a href="javascript: fn_mostrar_frm_consulta(<?=$rs_per['id']?>);"><?=$rs_per['nro'].'-'.$rs_per['nombre'].'   DNI '.$rs_per['nro_documento']?></a><em> (<?=$rs_per['id']?>
	  )</em>
        <p>          <?=$rs_per['titulo']?> 
      </p>   </span>     <p><a href="mailto: <?=$rs_per['correo_electronico']?> "> <?=$rs_per['correo_electronico']?> </a>  </p>
	  <? if (substr($rs_per['f_cierre'],0,4)=='0000'){ ?>
	  [ <a href="cerrar.php?id=<?=$rs_per['id']?>">Cerrar ficha</a> ]
	  <? } else { ?>
	  	Cerrado <?=$rs_per['f_cierre'] ?>
	  	  <? }  ?>
		  <? if ($rs_per['estado']<>'RECHAZADO'){ ?>
      [ <a href="rechazar.php?id=<?=$rs_per['id']?>">Rechazar</a> ]	  	  <? }  ?></td>
      <td width="137" ><? if( !empty($rs_per['fotografia1'])) {?>
      <img src="<? echo '../'.$rs_per['fotografia1'] ?>" class="magnify"  height="160" title="Click para ampliar" />        <? } ?></td>	  	  
    </tr>
    <tr>
      
	   <td colspan="2"> 

	      <a href="obs_adm_form.php?id_insc=<?=$rs_per['id']?>">Observaciones:<?=$rs_per['obs_adm']?></a>
	     
        </div></td>
    </tr>
 	
    <tr>
      <td colspan="2"><hr width="100%" /></td>
    </tr>
    <? } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2"><? /*
					-- Aqui MOSTRAMOS MAS DETALLADAMENTE EL PAGINADO
					Pgina: <?=$paging->numEstaPagina()?>, de <?=$paging->numTotalPaginas()?><br />
					Mostrando: <?=$paging->numRegistrosMostrados()?> registros, del <?=$paging->numPrimerRegistro()?> al <?=$paging->numUltimoRegistro()?><br />
					De un total de: <?=$paging->numTotalRegistros()?><br />
                */ ?>
			<? if ($paging->numTotalRegistros>1){?>	

         <?=$paging->fetchNavegacion().'    Cantidad de registros:'.$paging->numTotalRegistros?>
         <? } ?></td>
    </tr>
  </tfoot>
</table>
