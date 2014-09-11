<? session_start();?>
<html>
<head>
<link rel="STYLESHEET" type="text/css" href="estilo.css">
 <link href="../extras/css/estilo.css" rel="stylesheet" type="text/css" />
 <script language="javascript" type="text/javascript" src="index.js"></script>		
</head>
<body>
 	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
		    <tr>      
				<td width="100%" align="center" >
                <img src="../graficos/banda_superior.jpg" alt="Instituto Cultural de la Provincia" >                </td>
			</tr>
</table>
<table align="center" width="690" cellspacing="2" cellpadding="8" border="0" bgcolor="#ffffff">
<tr>
    <td>
      <?
  	include "../extras/php/conexion.php";	
echo "<meta http-equiv='NoCache'>";
echo "<meta http-equiv='Cache-Control' Content='no-Cache'> ";
echo "<Meta http-equiv='expires' content='0'> ";

require('funciones.php'); 
//if (isset($_GET["id_insc"])) {
if (isset($_REQUEST["id_insc"])) {
$_SESSION["id_insc"] = (isset($_REQUEST["id_insc"]) ? $_REQUEST["id_insc"] : 0);
}
$sql = "select * from ba_mc_inscripciones where id=".$_SESSION["id_insc"] ;

$rs = mysql_query($sql, $con);
$row1 = mysql_fetch_assoc($rs);
?>
      <table width="680" border="0" align="center">
  <tr>
    <td ><strong><? echo $row1["nombre"]?></strong></td>
    <td ><a href="puntaje_imprimir.php?id=<?=$rs_per['id']?>" target="_blank"><img src="../extras/ico/imprime.gif" width="19" height="19" /></a></td>
  </tr>
  <tr>
	  <td colspan="3" align="center">PUNTAJE      </td>
	  </tr>
	<tr>
</table>
<?
//if ($HTTP_POST_VARS){

if ($_POST){
	//die('--'.$_POST["selectItem"]);
	if ($_POST["selectItem"]==' ' )
	{
?>	  
<div align="center" >	<br>  
    <?
	}else{		
		$ssql = "INSERT INTO puntaje_obtenido (id_insc,id_puntuacion,puntaje) VALUES (" . $_SESSION["id_insc"] . "," .$_POST["selectItem"]. "," .$_POST["vpuntaje"]. ")";		
		//die($ssql);
		//,tema,sede
		mysql_query($ssql,$con);
?>
</div>
	<? }}
	//si no recibo nada por el formulario de firma del libro, muestro las firmas del libro
	//construyo la sentencia SQL
$sql = "SELECT  puntuacion.id as id,puntaje_obtenido.puntaje,item from puntaje_obtenido left join puntuacion on puntaje_obtenido.id_puntuacion=puntuacion.id WHERE puntaje_obtenido.id_insc=".$_SESSION["id_insc"] ;

$rs = mysql_query($sql, $con);
$row = mysql_fetch_assoc($rs);
	if (isset($_GET["vermas"] ))
		$sql .=  " and  puntuacion.id<=" . $_GET["vermas"] ;
	if (isset($_GET["vermenos"] ))
		$sql .=  " and  puntuacion.id>=" . $_GET["vermenos"] ;
	
	$sql .= " ORDER BY puntuacion.id desc limit 8";
//die($sql);
	$resultid = mysql_query($sql,$con);
	?>
	<br>
	<?
	$num_filas = 0;
	?>
    <table align="center" width="100%" cellspacing="1" cellpadding="0" border="0" style="font-size:10px"><?
	while (($damefila=mysql_fetch_object($resultid)) && ($num_filas<8))
	{		?>
		<tr><td width="87%" valign="top"  >
			<? 
			echo strip_tags(substr($damefila->item,0,60)).'-'.$damefila->puntaje ; 
			?>
</td>
	<?php if ((isset($_SESSION["usuario_adm"] ))){ ?>
		  <td width="3%" valign="top" >
			<span class="formulario"><a href="puntaje_borrar_renglon.php?idrenglon=<?=$damefila->id?>"><img src="../graficos/cancel.jpg" border="0"> </a> </span></td>
	<?php } ?>
		<tr>
		

		<?
		$num_filas++;
	} //termina el bucle while
	//si quedan más valoraciones en el conjunto de resultados, muestro el enlace de "Ver más"
	?>	  </table>
      <?
	if ($damefila){
//		echo "<div align=center><b><a href=\"remitos_movimientos.php?vermas=$damefila->id  \">Ver m&aacute;s</a></b></div><br>";
//		echo "<div align=center><b><a href=\"remitos_movimientos.php?vermenos=$damefila->id  \">Primero</a></b></div><br>";}
	?>
	
    <div align=center ><a href="puntaje.php?vermas=<? echo $damefila->id  ?>"><img src="../graficos/next.bmp" border="0"></a> <a href="puntaje.php?vermenos=<? echo $damefila->id ?> ">  
	    <img src="../graficos/remall.bmp" border="0"> </a></div>

    <? }	
	
	if (!$damefila){
//		echo "<div align=center><b><a href=\"remitos_movimientos.php?vermenos=1  \">Primero</a></b></div><br>";}
	?>

    <div align=center ><a href="puntaje.php?vermenos= 1 "><img src="../graficos/remall.bmp" border="0"> </a></div>
	<? }	
		
	//libero el conjunto de resultados
	mysql_free_result($resultid);
	
	//incluyo el formulario para firmar
		if ((isset($_SESSION["usuario_adm"] ))){   
	include ("puntaje_formulario.php");
	}
?>
	<br>
    <? /*	<div align="center"><b><a href="expedientes_main.php" class="Estilo1">Volver    -</a><a href="remito_impresion.php" class="Estilo1">     Imprimir</a></b></div>*/?>

    <div align="center" ><b><a href="index.php">Volver  </a></b></div>	
        <? 
mysql_close($con);
?>	
 </td>
</tr>
</table>
        <pre>&nbsp;
        </pre>
</body>
</html>