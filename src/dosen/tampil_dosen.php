<?php
include('koneksi.php');
$db = new database();
$data_dosen = $db->tampil_data(); // Fetch data from tb_dosen
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen</title>
</head>
<body>
<a href="tambah_dosen.php">Tambah Data</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Dosen</th>
        <th>NIDN</th>
        <th>NIP</th>
        <th>Nama Dosen</th>
        <th>Alamat</th>
        <th>ID User</th>
        <th>Action</th>
    </tr>
    <?php
    if ($data_dosen) {
        $no = 1;
        foreach ($data_dosen as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['id_dsn']); ?></td>
                <td><?php echo htmlspecialchars($row['nidn']); ?></td>
                <td><?php echo htmlspecialchars($row['nip']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_dsn']); ?></td>
                <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                <td><?php echo htmlspecialchars($row['id_user']); ?></td>
                <td>
                    <a href="edit_dosen.php?id_dsn=<?php echo urlencode($row['id_dsn']); ?>">Update</a>
                    <a href="proses_dosen.php?action=delete&id_dsn=<?php echo urlencode($row['id_dsn']); ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="8">No data available</td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
