<?php
require '../vendor/fpdf184/fpdf.php';
require_once '../functions.php';

$nofaktur = $_GET['no_faktur'];
$transaksi = ambilsatubaris($conn, "SELECT * FROM transaksi 
            JOIN pengguna ON `transaksi`.`id_pengguna` = `pengguna`.`id_pengguna` 
            JOIN konsumen ON `transaksi`.`id_konsumen` = `konsumen`.`id_konsumen`                                      
            WHERE transaksi.no_faktur = $nofaktur");
$detail_transaksi = ambilsatubaris($conn, "SELECT * FROM detail_transaksi WHERE no_faktur = $nofaktur");

$id_layanan = $detail_transaksi['id_layanan'];
$layanan = ambilsatubaris($conn, "SELECT * FROM layanan WHERE id_layanan = $id_layanan");
$harga = $layanan['harga'];

$kd_barang = $transaksi['kd_barang'];
$barang = ambilsatubaris($conn, "SELECT * FROM barang WHERE kd_barang = $kd_barang");
$nm_barang = $barang['nm_brg'];

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(0, 10, 'DOKUMEN TRANSAKSI', 0, 1, 'C');
$pdf->Cell(0, 5, 'RUMAH CUCI KIREI LAUNDRY', 0, 1, 'C');
$pdf->Cell(0, 7, '', 0, 1);

$pdf->Line(10, 30, 200, 30);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 11);

$pdf->Cell(30, 10, 'No Faktur', 0, 0,);
$pdf->Cell(90, 10, ' : ' . $transaksi['no_faktur'], 0, 0);
$pdf->Cell(30, 10, 'Tanggal', 0, 0);
$pdf->Cell(30, 10, ' : ' . $transaksi['tgl'], 0, 1);
$pdf->Cell(30, 10, 'Nama Konsumen', 0, 0);
$pdf->Cell(50, 10, ' : ' . $transaksi['nm_konsumen'], 0, 1);

// $pdf->Cell(189, 10, '', 0, 1);
// $pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(20, 5, 'Berat', 1, 0);
$pdf->Cell(90, 5, 'Nama Barang', 1, 0);
$pdf->Cell(40, 5, 'Harga', 1, 0);
$pdf->Cell(40, 5, 'Total', 1, 1);

$pdf->Cell(20, 5, '' . $detail_transaksi['berat'] . ' Kg', 1, 0);
$pdf->Cell(90, 5, '' . $nm_barang, 1, 0);
$pdf->Cell(40, 5, 'Rp ' . number_format($harga, 0, ',', '.'), 1, 0, 'R');
$pdf->Cell(40, 5, 'Rp ' . number_format($transaksi['total'], 0, ',', '.'), 1, 1, 'R');

$pdf->Line(15, 100, 200, 100);

$pdf->Ln(5);
$pdf->Cell(0, 70, '*** Terima Kasih ***', 0, 0, 'C');

$pdf->Output('dokumen-transaksi-' . $transaksi['no_faktur'] . '.pdf', 'I');
