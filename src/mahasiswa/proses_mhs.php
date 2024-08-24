<?php
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if ($action == "add") {
    // Add new mahasiswa
    $koneksi->tambah_data($_POST['id_mhs'], $_POST['npm'], $_POST['nama_mhs'], $_POST['alamat']);
    header('location:tampil_mhs.php'); // Redirect to the display page
} elseif ($action == "update") {
    // Update existing mahasiswa
    $koneksi->update_data($_POST['id_mhs'], $_POST['npm'], $_POST['nama_mhs'], $_POST['alamat']);
    header('location:tampil_mhs.php'); // Redirect to the display page
} elseif ($action == "delete") {
    // Delete mahasiswa
    $id_mhs = $_GET['id_mhs'];
    $koneksi->delete_data($id_mhs);
    header('location:tampil_mhs.php'); // Redirect to the display page
}
?>
