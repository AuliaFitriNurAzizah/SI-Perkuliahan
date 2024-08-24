<?php
include('koneksi.php');
$db = new database();

// Get the ID of the record to be edited
$id_kls = isset($_GET['id_kls']) ? $_GET['id_kls'] : '';
$data_kls = $db->get_by_id($id_kls);

if (!$data_kls) {
    die("Data not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form submission
    $id_kls = $_POST['id_kls'];
    $nama_kelas = $_POST['nama_kelas'];
    $thn_akademik = $_POST['thn_akademik'];
    $id_prodi = $_POST['id_prodi'];
    
    // Update data in the database
    $db->update_data($id_kls, $nama_kelas, $thn_akademik, $id_prodi);
    
    // Redirect to the display page after updating
    header('Location: tampil_kls.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kelas</title>
</head>
<body>
<h3>Edit Data Kelas</h3>
<hr/>
<form method="post" action="">
    <table>
        <tr>
            <td>ID Kelas</td>
            <td>:</td>
            <td><input type="text" name="id_kls" value="<?php echo ($data_kls['id_kls']); ?>" readonly/></td>
        </tr>
        <tr>
            <td>Nama Kelas</td>
            <td>:</td>
            <td><input type="text" name="nama_kelas" value="<?php echo ($data_kls['nama_kelas']); ?>" required/></td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td>
                <select name="thn_akademik" required>
                    <option value="">Pilih Tahun</option>
                    <?php
                    for ($i = 2006; $i <= date("Y"); $i++) {
                        $selected = ($i == $data_kls['thn_akademik']) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
            </td>  
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>
                <select name="id_prodi" id="">
                    <option value="">Pilih Program Studi</option>
                    <?php
                    $prodi = $db->tampil_data(); // Pastikan data prodi diambil dengan benar
                    foreach ($prodi as $item) {
                        // Tampilkan opsi dengan program studi yang sudah dipilih
                        $selected = ($item['id_prodi'] == $data_kls['id_prodi']) ? 'selected' : '';
                        echo "<option value='{$item['id_prodi']}' $selected>{$item['nama_prodi']}</option>";
                    }
                    ?>
                </select>
            </td>
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
