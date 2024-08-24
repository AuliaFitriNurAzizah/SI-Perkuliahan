<?php
include('koneksi.php');
$db = new database();

// Get the ID of the record to be edited
$id_mhs = isset($_GET['id_mhs']) ? $_GET['id_mhs'] : '';
$data_mhs = $db->get_by_id($id_mhs);

if (!$data_mhs) {
    die("Data not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form submission
    $id_mhs = $_POST['id_mhs'];
    $npm = $_POST['npm'];
    $nama_mahasiswa = $_POST['nama_mhs'];
    $alamat = $_POST['alamat'];
    
    $db->update_data($id_mhs, $npm, $nama_mahasiswa, $alamat);
    
    // Redirect to the display page after updating
    header('Location: tampil_mhs.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>
<h3>Edit Data Mahasiswa</h3>
<hr/>
<form method="post" action="">
    <table>
         <tr>
            <td>ID Mahasiswa</td>
            <td>:</td>
            <td><input type="text" name="id_mhs" value="<?php echo htmlspecialchars($data_mhs['id_mhs']); ?>" readonly/></td>
        </tr>
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td><input type="text" name="npm" value="<?php echo htmlspecialchars($data_mhs['npm']); ?>" required/></td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td>:</td>
            <td><input type="text" name="nama_mhs" value="<?php echo htmlspecialchars($data_mhs['nama_mhs']); ?>" required/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" required><?php echo htmlspecialchars($data_mhs['alamat']); ?></textarea></td>
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
