<?php
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if ($action == "add") {
    // Add new kelas
    $koneksi->tambah_data($_POST['id_kls'], $_POST['nama_kelas'], $_POST['thn_akademik'], $_POST['id_prodi']);
    header('location:tampil_kls.php'); // Redirect to the display page
} elseif ($action == "update") {
    // Update existing kelas
    $koneksi->update_data($_POST['id_kls'], $_POST['nama_kelas'], $_POST['thn_akademik'], $_POST['id_prodi']);
    header('location:tampil_kls.php'); // Redirect to the display page
} elseif ($action == "delete") {
    // Delete kelas
    $id_kls = $_GET['id_kls'];
    $koneksi->delete_data($id_kls);
    header('location:tampil_kls.php'); // Redirect to the display page
}
?>
