<?php
include ('../koneksi.php');
require "../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet -> setCellValue('A1', 'Data Mahasiswa');

$sheet ->setCellValue('A3', 'No');
$sheet ->setCellValue('B3', 'Id');
$sheet ->setCellValue('C3', 'Nama');
$sheet ->setCellValue('D3', 'NPM');
$sheet ->setCellValue('E3', 'Alamat');


$database= new database();
$query = "SELECT * FROM mahasiswa ORDER BY id_mhs ASC";
$cetakmahasiswa = mysqli_query($database->koneksi,$query);
$no=1;
$baris =4;
while($value= mysqli_fetch_array($cetakmahasiswa)){
    $sheet ->setCellValue('A'.$baris, $no);
    $sheet ->setCellValue('B'.$baris, $value['id_mhs']);
    $sheet ->setCellValue('C'.$baris, $value['nama_mhs']);
    $sheet ->setCellValue('D'.$baris, $value['npm']);
    $sheet ->setCellValue('E'.$baris, $value['alamat_mhs']);

    $no++;
    $baris++;
}
$writer = new Xlsx($spreadsheet);
$writer->save('../data_mahasiswa.xlsx');
header('location: ../data_mahasiswa.xlsx');