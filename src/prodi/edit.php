<?php
include('koneksi.php');
$db = new database();

// Get the ID of the record to be edited
$id_prodi = isset($_GET['id_prodi']) ? $_GET['id_prodi'] : '';
$data_prodi = $db->get_by_id($id_prodi);

if (!$data_prodi) {
    die("Data not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form submission
    $id_prodi = $_POST['id_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    
    $db->update_data($id_prodi, $nama_prodi);
    
    // Redirect to the display page after updating
    header('Location: tampil_data.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Prodi</title>
</head>
<body>
<h3>Edit Data Prodi</h3>
<hr/>
<form method="post" action="">
    <table>
        <tr>
            <td>ID Prodi</td>
            <td>:</td>
            <td><input type="text" name="id_prodi" value="<?php echo ($data_prodi['id_prodi']); ?>" readonly/></td>
        </tr>
        <tr>
            <td>Nama Prodi</td>
            <td>:</td>
            <td><input type="text" name="nama_prodi" value="<?php echo ($data_prodi['nama_prodi']); ?>" required/></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Update"/></td>
        </tr>
    </table>
</form>
</body>
</html>
