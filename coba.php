<?php
session_start();
require('./phpfpdf/fpdf.php');

class PDF extends FPDF
{
    //Page Content
    function Content()
    {
        
        $this->setY(2);
        $this->setX(5);
        $this->SetFont('Arial','B',9);
        $this->Cell(138,90,"",1,0,'L');
        $this->Ln(2);
        $this->setX(7);
        $this->Cell(134,5,"",1,0,'L');//ISI Data
        $this->Ln(5);

        $this->setY(2);
        $this->setX(153);
        $this->SetFont('Arial','B',9);
        $this->Cell(138,90,"",1,0,'L');
        $this->Ln(2);
        $this->setX(155);
        $this->Cell(134,5,"G",1,0,'L');//ISI Data
        $this->Ln();
    
        $this->setY(95);
        $this->setX(5);
        $this->SetFont('Arial','B',9);
        $this->Cell(138,90,"",1,0,'L');
        $this->Ln(2);
        $this->setX(7);
        $this->Cell(134,5,"",1,0,'L');//ISI Data
        $this->Ln(5);

        $this->setY(95);
        $this->setX(153);
        $this->SetFont('Arial','B',9);
        $this->Cell(138,90,"",1,0,'L');
        $this->Ln(2);
        $this->setX(155);
        $this->Cell(134,5,"G",1,0,'L');//ISI Data
        $this->Ln();    
    }
 
    //Page footer
    function Footer()
    {
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-15);
        //buat garis horizontal
        //$this->Line(10,$this->GetY(),200,$this->GetY());
        //Arial italic 9
        //$this->SetFont('Times','',9);
        //nomor halaman
        //$this->Cell(0,10,'Page '.$this->PageNo().' of {nb}',0,0,'R');-->
    }
}
 
//contoh pemanggilan class
$pdf = new PDF('L','mm','A4');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>
