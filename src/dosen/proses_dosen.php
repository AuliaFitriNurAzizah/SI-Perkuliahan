<?php
include('koneksi.php');
$koneksi = new database();

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == "add") {
    // Add new dosen
    $koneksi->tambah_data($_POST['id_dsn'], $_POST['nidn'], $_POST['nip'], $_POST['nama_dsn'], $_POST['alamat'], $_POST['id_user']);
    header('Location: tampil_dosen.php'); // Redirect to the display page
} elseif ($action == "update") {
    // Update existing dosen
    $koneksi->update_data($_POST['id_dsn'], $_POST['nidn'], $_POST['nip'], $_POST['nama_dsn'], $_POST['alamat'], $_POST['id_user']);
    header('Location: tampil_dosen.php'); // Redirect to the display page
} elseif ($action == "delete") {
    // Delete dosen
    $id_dsn = isset($_GET['id_dsn']) ? $_GET['id_dsn'] : '';
    $koneksi->delete_data($id_dsn);
    header('Location: tampil_dosen.php'); // Redirect to the display page
}
?>
