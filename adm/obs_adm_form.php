<style type="text/css">
.Estilo2 {font-size: 9px}
</style>
<html>
<head>
<link rel="STYLESHEET" type="text/css" href="estilo.css">
 <link href="../extras/css/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
		    <tr>      
				<td width="100%" align="center" >
                <img src="../graficos/banda_superior.jpg" alt="Instituto Cultural de la Provincia" >                </td>
			</tr>
</table>
<?
	include "../extras/php/basico.php";
	include "../extras/php/conexion.php";

	/*$id=$_REQUEST['id_insc'];*/
	$id=$_REQUEST['id_insc'];	
	$sql="select * from ba_mc_inscripciones where id = $id ";
	$per = mysql_query($sql);
	$num_rs_per = mysql_num_rows($per);
	if ($num_rs_per==0){
		echo "No existen registros con ese ID ".$sql. $id;
		exit;
	}
	
	$rs_per = mysql_fetch_assoc($per);
	
?>

<!--<form  action="informatica_graba.php?ide_per=<?=$rs_per['id']?>" method="post"  id="frm_per"> -->
<form  action="obs_adm_graba.php" method="post"  id="frm_per">
<table align="center" width="800" cellspacing="2" cellpadding="0" border="0" bgcolor="#ffffff">

    <tr>
      <td>Observaciones administrativas        </td>
    </tr>
    
        <tr>
          <td colspan="4"><input name="vobs_adm" type="text" value="<?=$rs_per['obs_adm']?>" size="120" maxlength="200"></td>
          <td>        <input type="hidden" id="ide_per" name="ide_per" value="<?=$id?>" /></td>
        </tr>
        <tr>        </tr>
      </tfoot>

  <tr>
        <td colspan="2"><input name="modificar" type="submit" id="modificar" value="Modificar" />              </td>
      </tr>
  <td class="Estilo2"></td><td class="Estilo2"></tr>
</table>

</form>  
