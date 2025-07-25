<?php
session_start();
if (!isset($_SESSION['student'])) {
    echo "No student data to generate PDF.";
    exit;
}

require('fpdf/fpdf.php');  // Make sure fpdf.php is in the same directory

$data = $_SESSION['student'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Bonafide', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Name:', 0, 0);
$pdf->Cell(100, 10, $data['name'], 0, 1);

$pdf->Cell(50, 10, 'Enrollment:', 0, 0);
$pdf->Cell(100, 10, $data['enrollment'], 0, 1);

$pdf->Cell(50, 10, 'Branch:', 0, 0);
$pdf->Cell(100, 10, $data['branch'], 0, 1);

$pdf->Cell(50, 10, 'DOB:', 0, 0);
$pdf->Cell(100, 10, $data['dob'], 0, 1);

$pdf->Cell(50, 10, 'Phone:', 0, 0);
$pdf->Cell(100, 10, $data['phone'], 0, 1);

$pdf->Cell(50, 10, 'Address:', 0, 0);
$pdf->MultiCell(100, 10, $data['address']);

$pdf->Output("I", "Student_" . $data['enrollment'] . ".pdf");

unset($_SESSION['student']); // clear session
?>
