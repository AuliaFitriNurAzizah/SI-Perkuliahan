<?php
include('koneksi.php');
$db = new database();
$data_kls = $db->tampil_data(); // Use the correct method for fetching kelas data
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kelas</title>
</head>
<body>
<a href="tambah_kls.php">Tambah Data</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Kelas</th>
        <th>Nama Kelas</th>
        <th>Tahun Akademik</th>
        <th>Prodi</th>
        <th>Action</th>
    </tr>
    <?php
    if ($data_kls) {
        $no = 1;
        foreach ($data_kls as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_kls']; ?></td>
                <td><?php echo $row['nama_kelas']; ?></td>
                <td><?php echo $row['thn_akademik']; ?></td>
                <td><?php echo $row['nama_prodi']; ?></td>
                <td>
                    <a href="edit.php?id_kls=<?php echo $row['id_kls']; ?>">Update</a>
                    <a href="proses_kls.php?action=delete&id_kls=<?php echo $row['id_kls']; ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="6">Data Kosong</td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
