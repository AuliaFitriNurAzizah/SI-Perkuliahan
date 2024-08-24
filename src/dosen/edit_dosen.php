<?php
include('koneksi.php');
$db = new database();

// Get the ID of the record to be edited
$id_dsn = isset($_GET['id_dsn']) ? $_GET['id_dsn'] : '';
$data_dosen = $db->get_by_id($id_dsn);

if (!$data_dosen) {
    die("Data not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form submission
    $id_dsn = $_POST['id_dsn'];
    $nidn = $_POST['nidn'];
    $nip = $_POST['nip'];
    $nama_dosen = $_POST['nama_dsn'];
    $alamat = $_POST['alamat'];
    $id_user = $_POST['id_user'];
    
    $db->update_data($id_dsn, $nidn, $nip, $nama_dosen, $alamat, $id_user);
    
    // Redirect to the display page after updating
    header('Location: tampil_dosen.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Dosen</title>
</head>
<body>
<h3>Edit Data Dosen</h3>
<hr/>
<form method="post" action="">
    <table>
        <tr>
            <td>ID Dosen</td>
            <td>:</td>
            <td><input type="text" name="id_dsn" value="<?php echo htmlspecialchars($data_dosen['id_dsn']); ?>" readonly/></td>
        </tr>
        <tr>
            <td>NIDN</td>
            <td>:</td>
            <td><input type="text" name="nidn" value="<?php echo htmlspecialchars($data_dosen['nidn']); ?>" required/></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td><input type="text" name="nip" value="<?php echo htmlspecialchars($data_dosen['nip']); ?>" required/></td>
        </tr>
        <tr>
            <td>Nama Dosen</td>
            <td>:</td>
            <td><input type="text" name="nama_dsn" value="<?php echo htmlspecialchars($data_dosen['nama_dsn']); ?>" required/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" required><?php echo htmlspecialchars($data_dosen['alamat']); ?></textarea></td>
        </tr>
        <tr>
            <td>ID User</td>
            <td>:</td>
            <td><input type="text" name="id_user" value="<?php echo htmlspecialchars($data_dosen['id_user']); ?>" required/></td>
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
