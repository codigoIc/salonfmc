<head>
<!--<script language="JavaScript" src="../utiles_php/calendario/javascripts.js"></script>
<script language="JavaScript" src="../utiles_php/utiles/validaciones.js"></script> -->
<script language="JavaScript" src="index.js"></script>		
<style type="text/css">
<!--
.Estilo2 {font-size: 10}
.Estilo3 {font-size: large}
-->
</style>
</head>
<?
  	include "../extras/php/conexion.php";	
?>
<form name=movi_exp action="puntaje.php" method="post">
	<HR width=90% align="center"> 
	<table width="100%" cellspacing="0" cellpadding="0" border="0"  style="font-size:10px">
	
	<tr>
	  <td width="73%" colspan="2" align="center" >
  	      <select name="selectItem">
            <?
  	
	  $sql = 'select * from puntuacion order by  etapa,id';
	  $rs = mysql_query($sql, $con);
	 echo ("<option  selected >  </option>");	
	 $vaetapa=0;  
	  while($rowp = mysql_fetch_assoc($rs))
	  {	if($vaetapa<>$rowp['etapa']){
	  	  echo ("<option value =0> ******************* ETAPA ".$rowp['etapa']."*******************</option>");			
		  $vaetapa=$rowp['etapa'];
	  }
	  echo ("<option"); 
			echo(' value ="'.$rowp['id'].'"> '.substr(ltrim($rowp['item']),0,80).'  -  '.substr(ltrim($rowp['puntos']),0,15)."</option>");			
    	}
    ?>
            </select>
  	    Puntaje
	    <input name="vpuntaje" type="text" id="vpuntaje" size="2" maxlength="2" onkeypress="return justNumbers(event);" /></td>
	  	  </tr>
	  

	  
<tr>	
	  <td colspan=2 align=center ><input name="submit" type="submit" value="  Grabar  " /></td>
	</tr>
  </table>
  <HR width=90% align="center"> 
</form>
<!-- 
<script language="javascript" type="text/javascript">
function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
</script> -->