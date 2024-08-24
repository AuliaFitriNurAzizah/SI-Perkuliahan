<?php
include('koneksi.php');
$db = new database();
$data_matkul = $db->tampil_data(); // Fetch data from tb_matkul
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
</head>
<body>
<a href="tambah_matkul.php">Tambah Data</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Mata Kuliah</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>SKS</th>
        <th>Action</th>
    </tr>
    <?php
    if ($data_matkul) {
        $no = 1;
        foreach ($data_matkul as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['id_mk']); ?></td> 
                <td><?php echo htmlspecialchars($row['kode_mk']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_mk']); ?></td>
                <td><?php echo htmlspecialchars($row['sks']); ?></td>
                <td>
                    <a href="edit_matkul.php?id_mk=<?php echo urlencode($row['id_mk']); ?>">Update</a>
                    <a href="proses_matkul.php?action=delete&id_mk=<?php echo urlencode($row['id_mk']); ?>">Delete</a>
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
