<?php
//die('no implementado ');
include "../extras/php/conexion.php";
//$ejec='select * from ba_mc_inscripciones where id ='.$id;
$id = $_REQUEST["id"];
$ejec='select * from ba_mc_inscripciones where id ='.$id;
if(!mysql_query($ejec))
		echo "Error al consultar". mysql_error();
		$rs = mysql_query($ejec, $con);
		$row = mysql_fetch_assoc($rs);
		require('../fpdf/fpdf.php');

/*class PDF extends FPDF
{
function Header()
{
     /*    $this->Cell(90,5,'',0,0);   	 
         $this->Cell(20,5,'',0,0);   	 
         $this->Cell(10,5,'',0,0);   	 
         $this->Cell(10,5,'',0,0);   	 
         $this->Cell(10,5,'',0,0);   	 		 		 		 		 
         $this->Cell(10,5,"Cargos",0,0);   	 		 		 		 		 
         $this->Cell(10,5,"Postulantes",0,1);   */	 		 		 		 		 		
//}
//Pie de página
/*function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pág.'.$this->PageNo().'/{nb}',0,0,'C');
}
}*/


class PDF_MC_Table extends FPDF 
{ 
var $widths; 
var $aligns; 
function Footer()
{
    //Posición: a 1 cm del final
    $this->SetY(-10);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'   Pág.'.$this->PageNo().'/{nb}',0,0,'R');
}
function SetWidths($w) 
{ 
    //Set the array of column widths 
    $this->widths=$w; 
} 

function SetAligns($a) 
{ 
    //Set the array of column alignments 
    $this->aligns=$a; 
} 

function fill($f)
{
	//juego de arreglos de relleno
	$this->fill=$f;
}

function Row($data) 
{ 
    //Calculate the height of the row 
    $nb=0; 
	$fill=0;
    $style='';
    for($i=0;$i<count($data);$i++) 
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i])); 
    $h=5*$nb; 
    //Issue a page break first if needed 
    $this->CheckPageBreak($h); 
    //Draw the cells of the row 
    for($i=0;$i<count($data);$i++) 
    { 
        $w=$this->widths[$i]; 
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L'; 
        //Save the current position 
        $x=$this->GetX(); 
        $y=$this->GetY(); 
        //Draw the border 
        $this->Rect($x,$y,$w,$h,$style); 
        //Print the text 
        $this->MultiCell($w,5,$data[$i],'LTR',$a,$fill); 
        //Put the position to the right of the cell 
        $this->SetXY($x+$w,$y); 
    } 
    //Go to the next line 
    $this->Ln($h); 
} 

function CheckPageBreak($h) 
{ 
    //If the height h would cause an overflow, add a new page immediately 
    if($this->GetY()+$h>$this->PageBreakTrigger) 
        $this->AddPage($this->CurOrientation); 
} 

function NbLines($w,$txt) 
{ 
    //Computes the number of lines a MultiCell of width w will take 
    $cw=&$this->CurrentFont['cw']; 
    if($w==0) 
        $w=$this->w-$this->rMargin-$this->x; 
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize; 
    $s=str_replace("\r",'',$txt); 
    $nb=strlen($s); 
    if($nb>0 and $s[$nb-1]=="\n") 
        $nb--; 
    $sep=-1; 
    $i=0; 
    $j=0; 
    $l=0; 
    $nl=1; 
    while($i<$nb) 
    { 
        $c=$s[$i]; 
        if($c=="\n") 
        { 
            $i++; 
            $sep=-1; 
            $j=$i; 
            $l=0; 
            $nl++; 
            continue; 
        } 
        if($c==' ') 
            $sep=$i; 
        $l+=$cw[$c]; 
        if($l>$wmax) 
        { 
            if($sep==-1) 
            { 
                if($i==$j) 
                    $i++; 
            } 
            else 
                $i=$sep+1; 
            $sep=-1; 
            $j=$i; 
            $l=0; 
            $nl++; 
        } 
        else 
            $i++; 
    } 
    return $nl; 
} 
} 


//Creación del objeto de la clase heredada

//$pdf=new PDF();
 $pdf = new PDF_Mc_Table();

$pdf->AliasNbPages();
$pdf->AddPage();
  //$pdf->SetFont('Arial','B',10);
  //$pdf->Cell(200,5,'Centro Provincial de las Artes "Teatro Argentino"',0,1,'C');
   //$pdf->Cell(200,5,'Sistema de Selección',0,1,'C');
  //$pdf->ln(10);	  
 // $pdf->SetFont('Arial','B',10);  
  $rs = mysql_query($ejec, $con);
  $row = mysql_fetch_assoc($rs);

    $pdf->SetFont('Arial','B',10);
  $pdf->Cell(50,5,'INSCRIPCION Nro:'.$row["nro"],0,0,'L');
   $pdf->Cell(130,5,' ',0,1,'R');
  $pdf->Cell(190,5,'ARTE JOVEN 2014',0,1,'C');
  $pdf->ln(4);	  
  $pdf->SetFont('Arial','',10);  
   $pdf->Cell(190,5,'FORMULARIO DE INSCRIPCION DEL POSTULANTE',0,1,'C');
    $pdf->ln(5);
     $pdf->SetFont('Arial','B',8);        
  $pdf->ln(5);	     
   $pdf->Cell(100,5,'DATOS PERSONALES',0,1);      
  $pdf->SetFont('Arial','',8);	   
  $pdf->Cell(0,5,'Apellido y Nombres:   '.$row["nombre"],0,1);  
  $pdf->Cell(0,5,'Documento:   '.$row["nro_documento"].'   F.Nacimiento:   '.$row["f_nacimiento"],0,1);
	  $pdf->Cell(0,5,'Domicilio :   '.$row["domicilio"].'   '.$row["localidad"].'  CP '.$row["cp"].'  Tel ('.$row["caract_tel"].') '.$row["telefono"],0,1);  	

	  $pdf->Cell(0,5,'Correo electronico:   '.$row["correo_electronico"],0,1);  
 $pdf->SetFont('Arial','B',8);        
  $pdf->ln(5);	     
   $pdf->Cell(100,5,'DATOS DE LA OBRA',0,1);      
  $pdf->SetFont('Arial','',8);	  	  	  
	  $pdf->Cell(0,5,'Titulo:   '.$row["titulo"].'  F.Realización: '.$row["f_realizacion"],0,1);  	  

$pdf->multiCell(190,5,'Procedimiento:   '.$row["procedimiento"]);	  

	  $pdf->Cell(0,5,'Dimensiones:   alto '.$row["dimension_al"].' cm.,  ancho '.$row["dimension_an"].' cm ' ,0,1);  	  


  $pdf->ln(2);	
$pdf->multiCell(190,5,$row["obs"]);
if (! empty($row["fotografia1"])){
$pdf->Image('../'.$row["fotografia1"], 10,100,60);}
 // $pdf->ln(1);	
if (! empty($row["fotografia2"])){
$pdf->Image('../'.$row["fotografia2"], 80 ,100,60 );}
  //$pdf->ln(1);	
if (! empty($row["fotografia3"])){
$pdf->Image('../'.$row["fotografia3"], 10,170,60);}
//  $pdf->ln(1);	
if (! empty($row["fotografia4"])){
$pdf->Image('../'.$row["fotografia4"], 80,170,60);}
if (! empty($row["documento1"])){
$pdf->Image('../'.$row["documento1"], 10,240,50);}
if (! empty($row["documento2"])){
$pdf->Image('../'.$row["documento2"], 65,240,50);}
if (! empty($row["documento3"])){
$pdf->Image('../'.$row["documento3"], 120,240,50);}

//  $pdf->Cell(110);	    
  $pdf->ln(8);	

	$pdf->Output();



?>