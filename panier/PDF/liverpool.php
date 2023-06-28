<?php
require "./vendor/autoload.php";
require "./customPdfGenerator.php";




 
$pdf = new CustomPdfGenerator(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 12, '', true);
 
// start a new page
$pdf->AddPage();
 
 
// address
$pdf->Image('C:\wamp64\www\ProjetEvaluation\panier\images\liverpool.jpg',50,70);
 
// invoice table starts here
$header = array('DESCRIPTION', 'UNITS', 'RATE $', 'AMOUNT$');
$data = array(
   array('Item #1','1','20','20'),
);
$pdf->printTable($header, $data);
$pdf->Ln();
 
// comments
$pdf->SetFont('', '', 12);
$pdf->Write(0, "\n\n\n", '', 0, 'C', true, 0, false, false, 0);
 
// save pdf file
$pdf->Output(__DIR__ . '/liverpool.pdf', 'F');