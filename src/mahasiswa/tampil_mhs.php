<?php
include('koneksi.php');
$db = new database();
$data_mhs = $db->tampil_data(); // Use the correct method for fetching mahasiswa data
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
<a href="tambah_mhs.php">Tambah Data</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Mahasiswa</th>
        <th>NPM</th>
        <th>Nama Mahasiswa</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
    <?php
    if ($data_mhs) {
        $no = 1;
        foreach ($data_mhs as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_mhs']; ?></td>
                <td><?php echo $row['npm']; ?></td>
                <td><?php echo $row['nama_mhs']; ?></td> <!-- Corrected field name -->
                <td><?php echo $row['alamat']; ?></td>
                <td>
                    <a href="edit.php?id_mhs=<?php echo $row['id_mhs']; ?>">Update</a>
                    <a href="proses_mhs.php?action=delete&id_mhs=<?php echo $row['id_mhs']; ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="6">No data available</td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
