<?php
include('koneksi.php');
$koneksi = new database();

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == "add") {
    // Add new mata kuliah
    $koneksi->tambah_data($_POST['id_mk'], $_POST['kode_mk'], $_POST['nama_mk'], $_POST['sks']);
    header('Location: tampil_matkul.php'); // Redirect to the display page
} elseif ($action == "update") {
    // Update existing mata kuliah
    $koneksi->update_data($_POST['id_mk'], $_POST['kode_mk'], $_POST['nama_mk'], $_POST['sks']);
    header('Location: tampil_matkul.php'); // Redirect to the display page
} elseif ($action == "delete") {
    // Delete mata kuliah
    $id_mk = isset($_GET['id_mk']) ? $_GET['id_mk'] : '';
    $koneksi->delete_data($id_mk);
    header('Location: tampil_matkul.php'); // Redirect to the display page
}
?>
