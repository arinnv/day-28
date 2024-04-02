<?php
include 'koneksi.php';
require 'vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

$format = $_GET['format'];

$sql = "SELECT * FROM data_diri";
$result = $koneksi->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'Nik');
$sheet->setCellValue('C1', 'Alamat');

$row = 2;
foreach ($data as $item) {
    $sheet->setCellValue('A'.$row, $item['nama']);
    $sheet->setCellValue('B'.$row, $item['nik']);
    $sheet->setCellValue('C'.$row, $item['alamat']);
    $row++;
}

if($format == 'xlsx'){
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="data_penduduk.xlsx"');
    $writer->save('php://output');
} elseif($format == 'csv'){
    $writer = new Csv($spreadsheet);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="data_penduduk.csv"');
    $writer->save('php://output');
}

$koneksi->close();
?>