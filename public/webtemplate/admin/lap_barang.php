<?php
include 'config.php';
require('assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('logo/malasngoding.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Omdut Coffee',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 081234567890',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Kekanan dikit trus belok kiri',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.omdut_coffee.com email : omdutcoffeet@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Harga Barang', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Berat', 1, 0, 'C');
$pdf->Cell(6.5, 0.8, 'Deskripsi', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Stok', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Ukuran', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from produk");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama_barang'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['harga_barang'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['berat'],1, 0, 'C');
	$pdf->Cell(6.5, 0.8, $lihat['deskripsi'], 1, 0,'C');
	$pdf->Cell(1.5, 0.8, $lihat['stok'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['ukuran'], 1, 1,'C');

	$no++;
}

$pdf->Output("Laporan_Barang.pdf","I");

?>

