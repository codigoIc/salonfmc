<?php
session_start();
include "../extras/php/conexion.php";

/*$ejec = "SELECT  etapa,puntuacion.id as id,puntaje_obtenido.puntaje,item from puntaje_obtenido left join puntuacion on puntaje_obtenido.id_puntuacion=puntuacion.id WHERE puntaje_obtenido.id_insc=".$_SESSION["id_insc"] .' order by etapa,id ';
*/
$ejec="select  etapa,puntuacion.id as id,a.puntaje,item,puntos,grupo,encabezado,encabezado_id from puntuacion 
 left join (select * from puntaje_obtenido   WHERE puntaje_obtenido.id_insc=".$_SESSION["id_insc"] .") a   on a.id_puntuacion=puntuacion.id order by etapa,id ";

//die('falta implemtenar');
	//die($ejec);
if(!mysql_query($ejec))
		echo "Error al consultar". mysql_error();
   
$rs = mysql_query($ejec, $con);
$row = mysql_fetch_assoc($rs);


require('../fpdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{
}
//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pág.'.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(200,5,'Centro Provincial de las Artes "Teatro Argentino"',0,1,'C');
   $pdf->Cell(200,5,'PUNTAJE',0,1,'C');
  $pdf->ln(10);	  
  $pdf->SetFont('Arial','',8);  
  $rs = mysql_query($ejec, $con);
  //$row = mysql_fetch_assoc($rs);
  $cetapa=0;  
  $tot=0;
  $tot_etapa=0;
  $grupo='x';
  $encabezado='x';
  while($row = mysql_fetch_assoc($rs)){
  			 if ($row["etapa"]<>$cetapa){
			 		if ($tot_etapa<>0){
				      $pdf->SetFont('Arial','B',8);  
    				//  $pdf->Cell(0,5,'      '.'Total :'.$tot_etapa,0,1);   
					  $pdf->Cell(130,5,'',0,0);      			 
			     	  $pdf->Cell(30,5,'Total :',0,0);      			 
     	              $pdf->Cell(10,5,$tot_etapa,0,1);   

				      $pdf->SetFont('Arial','',8);  
					 }
  	  		 	 $pdf->SetFont('Arial','B',8);
	    	     $pdf->Cell(0,5,$row["etapa"].'º ETAPA',0,1);   
	 			 $pdf->ln(1);
	  			 $pdf->SetFont('Arial','',8);
				 $tot_etapa=0;
				 $cetapa=$row["etapa"];
			 }
			 if($grupo<>$row['grupo']){
		         $pdf->SetFont('Arial','B',8);  
	    	     $pdf->Cell(150,5,$row['grupo'],0,1);
				 $grupo=$row['grupo'];
			     $pdf->SetFont('Arial','',8);  
			 }
			 if($encabezado<>$row['encabezado']){
		         $pdf->SetFont('Arial','I',8);  
	    	     $pdf->Cell(150,5,$row['encabezado'],0,1);
				 $encabezado=$row['encabezado'];
			     $pdf->SetFont('Arial','',8);  
			 }
			 
			 if (strlen($row["item"])>100){
  //  		 	     $pdf->multicell(130,5,$row["item"]);  
					$pdf->Cell(130,5,substr($row["item"],0,100),1,0);  	
	//				$pdf->Cell(130,5,$row["item"],1,0);  	
//		      	     $pdf->Cell(130,5,'',0,0);      
					 			 }
				else{
					$pdf->Cell(130,5,$row["item"],1,0);  						 
			 }

     	     $pdf->Cell(30,5,$row["puntos"],1,0);      			 
     	     $pdf->Cell(10,5,$row["puntaje"],1,1);   
			    
			 $tot=$tot+$row["puntaje"]	;
			 $tot_etapa=$tot_etapa+$row["puntaje"]	;			 
		 }     
			 		if ($tot_etapa<>0){
				      $pdf->SetFont('Arial','B',8);  
//    				  $pdf->Cell(0,5,'      '.'Total :'.$tot_etapa,0,1);   
					  $pdf->Cell(130,5,'',0,0);      			 
			     	  $pdf->Cell(30,5,'Total :',0,0);      			 
     	              $pdf->Cell(10,5,$tot_etapa,0,1);   
				      $pdf->SetFont('Arial','',8);  
					 }
		 
      $pdf->SetFont('Arial','B',8);  
//      $pdf->Cell(0,5,'      '.'Puntaje Final Total :'.$tot,0,1);   
	 $pdf->Cell(130,5,'',0,0);      			 
   	  $pdf->Cell(30,5,'Puntaje Final Total :',0,0);      			 
     $pdf->Cell(10,5,$tot ,0,1);  
      $pdf->SetFont('Arial','',8);  
	$pdf->Output();

?>

