<?php
include ('koneksi.php');
require "../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet -> setCellValue('A1', 'Data Mahasiswa');

$sheet ->setCellValue('A3', 'no');
$sheet ->setCellValue('B3', 'id_kls');
$sheet ->setCellValue('C3', 'nama_kelas');
$sheet ->setCellValue('D3', 'thn_akademik');
$sheet ->setCellValue('E3', 'nama_prodi');



$database= new database();
$query = "SELECT * FROM tb_kls JOIN tb_prodi on tb_kls.id_prodi = tb_prodi.id_prodi ORDER BY id_kls ASC";
$cetakKelas = mysqli_query($database->koneksi,$query);
$no=1;
$baris =4;
while($value= mysqli_fetch_array($cetakKelas)){
    $sheet ->setCellValue('A'.$baris, $no);
    $sheet ->setCellValue('B'.$baris, $value['id_kls']);
    $sheet ->setCellValue('C'.$baris, $value['nama_kelas']);
    $sheet ->setCellValue('D'.$baris, $value['thn_akademik']);
    $sheet ->setCellValue('E'.$baris, $value['nama_prodi']);

    $no++;
    $baris++;
}
$writer = new Xlsx($spreadsheet);
$writer->save('../data_kelas.xlsx');
header('location: ../data_kelas.xlsx');