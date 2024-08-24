<?php
include('koneksi.php');
$db = new database();

// Get the ID of the record to be edited
$id_mk = isset($_GET['id_mk']) ? $_GET['id_mk'] : '';
$data_matkul = $db->get_by_id($id_mk);

if (!$data_matkul) {
    die("Data not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form submission
    $id_mk = $_POST['id_mk'];
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    
    $db->update_data($id_mk, $kode_mk, $nama_mk, $sks);
    
    // Redirect to the display page after updating
    header('Location: tampil_matkul.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mata Kuliah</title>
</head>
<body>
<h3>Edit Data Mata Kuliah</h3>
<hr/>
<form method="post" action="">
    <table>
        <tr>
            <td>ID Mata Kuliah</td>
            <td>:</td>
            <td><input type="text" name="id_mk" value="<?php echo htmlspecialchars($data_matkul['id_mk']); ?>" readonly/></td>
        </tr>
        <tr>
            <td>Kode Mata Kuliah</td>
            <td>:</td>
            <td><input type="text" name="kode_mk" value="<?php echo htmlspecialchars($data_matkul['kode_mk']); ?>" required/></td>
        </tr>
        <tr>
            <td>Nama Mata Kuliah</td>
            <td>:</td>
            <td><input type="text" name="nama_mk" value="<?php echo htmlspecialchars($data_matkul['nama_mk']); ?>" required/></td>
        </tr>
        <tr>
            <td>SKS</td>
            <td>:</td>
            <td><input type="number" name="sks" value="<?php echo htmlspecialchars($data_matkul['sks']); ?>" required/></td>
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
