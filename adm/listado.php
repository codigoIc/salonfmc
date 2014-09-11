<?php
$esp=$_REQUEST['esp'];
include "../extras/php/conexion.php";
//$ejec='select * from ba_mc_inscripciones where id ='.$id;

//$ejec="select  *  from ba_mc_inscripciones  where estado<>'RECHAZADO' order by nro ";

$ejec='select  *  from ba_mc_inscripciones  where left(especialidad,1)="'.$esp.'" order by nro ';

$ejec='select  *  from ba_mc_inscripciones   order by especialidad, nro ';
//die($ejec);

if(!mysql_query($ejec))
		echo "Error al consultar". mysql_error();
	//	die($ejec);
$rs = mysql_query($ejec, $con);
$row = mysql_fetch_assoc($rs);


require('../fpdf/fpdf.php');

//class PDF extends FPDF
class PDF_MC_Table extends FPDF 
{ 
var $widths; 
var $aligns; 

function Header()
   {
      $this->SetFont('Arial','B',12);
	//  if ($esp=='P'){
	  if (1==1){
    	  $this->Cell(230,10,'CONCURSO Salón Molina Campos ',0,1,'C');
	  }else{
		  $this->Cell(230,10,'CONCURSO Salón Molina Campos - Grabado',0,1,'C');
	  }
 /* $this->SetFont('Arial','',8);	
   $this->SetWidths(array(8,40,15,65,40,30,75));
 $this->SetAligns(array('L','L','L','L','L','L','L'));
 $this->Row(array("Insc.","Nombre","DNI","Contacto","Titulo","Tamaño(alto-ancho)","Procedimiento"));
	*/  
   }

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
 $pdf = new PDF_Mc_Table('L');


//Creación del objeto de la clase heredada

//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
/*  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(200,5,' ',0,1,'C');
   $pdf->Cell(200,5,'CONCURSO ARTE JOVEN 2014',0,1,'C');
  $pdf->ln(10);	  */
  $pdf->SetFont('Arial','B',10);  
  $rs = mysql_query($ejec, $con);
  $tot=0;
  $pdf->SetFont('Arial','',8);	
  $espe='x';
/*   $pdf->SetWidths(array(8,40,15,65,40,30,75));
 $pdf->SetAligns(array('L','L','L','L','L','L','L'));
 $pdf->Row(array("Insc.","Nombre","DNI","Contacto","Titulo","Tamaño(alto-ancho)","Procedimiento"));*/
  while($row = mysql_fetch_assoc($rs)){    
      if($espe<>substr($row["especialidad"],0,1)){
  	    if ($tot<>0){   
		 	$pdf->Cell(200,5,'  '.$tot,0,1);
	  		$tot=0;
					
			  }
	  	$pdf->Cell(200,5,$row["especialidad"],0,1,'C');
 $pdf->SetFont('Arial','B',8);	
   $pdf->SetWidths(array(8,40,15,65,40,30,75));
 $pdf->SetAligns(array('L','L','L','L','L','L','L'));
 $pdf->Row(array("Insc","Nombre","DNI","Contacto","Titulo","Tamaño(alto-ancho)","Procedimiento"));
 $pdf->SetFont('Arial','',8);	
 
		}
     $espe=substr($row["especialidad"],0,1);
	 $pdf->Row(array($row["nro"],substr($row["nombre"],0,23),$row["nro_documento"],$row['domicilio'].' '.$row['localidad'].' CP:'.$row['cp'].'  Tel:'.$row['telefono'].'  '.$row['correo_electronico'],$row["titulo"],$row['dimension_al'].'cm -'.$row['dimension_an'].' cm',ltrim($row["procedimiento"])));
	 $tot=$tot+1;
	
}
   if ($tot<>0){   
		 	$pdf->Cell(200,5,'  '.$tot,0,1);
	  		$tot=0;
					
			  }
  $pdf->SetFont('Arial','B',8);  

		
			
			 if ($tot<>0){
			//       $pdf->Cell(0,5,'TOTAL :'.$tot,0,1);   
			 }
	         
 			
	$pdf->Output();

?>

