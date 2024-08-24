<?php
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
    $koneksi->tambah_data($_POST['id_prodi'],$_POST['nama_prodi']);
	header('location:tampil_data.php');
}
elseif($action=="update")
{
    $koneksi->update_data($_POST['id_prodi'],$_POST['nama_prodi']);
	header('location:tampil_data.php');    
}
elseif($action=="delete")
{
	$id_prodi = $_GET['id'];
	$koneksi->delete_data($id_prodi);
	header('location:tampil_data.php');
}
?>
