<?php
include('koneksi.php');
$db = new database();
$data_prodi = $db->tampil_data();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Prodi</title>
</head>
<body>
<a href="tambah_data.php">Tambah Data</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Prodi</th>
        <th>Nama Prodi</th>
        <th>Action</th>
    </tr>
    <?php
    if ($data_prodi) {
        $no = 1;
        foreach ($data_prodi as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_prodi']; ?></td>
                <td><?php echo $row['nama_prodi']; ?></td>
                <td>
				<a href="edit.php?id_prodi=<?php echo $row['id_prodi']; ?>">Update</a>
                    <a href="proses_prodi.php?action=delete&id=<?php echo $row['id_prodi']; ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="4">No data available</td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
