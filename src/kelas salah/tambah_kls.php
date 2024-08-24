<?php
include('koneksi.php');
$db = new database();
$data_prodi = $db->tampil_data();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kelas</title>
</head>
<body>
<h3>Tambah Data Kelas</h3>
<hr/>
<form method="post" action="proses_kls.php?action=add">
    <table>
        <tr>
            <td>ID Kelas</td>
            <td>:</td>
            <td><input type="text" name="id_kls" required/></td>
        </tr>
        <tr>
            <td>Nama Kelas</td>
            <td>:</td>
            <td><input type="text" name="nama_kelas" required/></td>
        </tr>
       
        <tr>
        <td>Tahun Akademik</td>
            <td>:</td>
            <td>
                <select name="thn_akademik" required>
                    <option value="">Pilih Tahun</option>
                    <?php
                    // Mulai dari tahun 2006 sampai tahun saat ini
                    for ($i = 2006; $i <= date("Y"); $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                </td>  
        </tr>
        
        <tr>
		<td>Program Studi</td>
		<td>:</td>
        <td><select name="id_prodi" id="">
			<option value=""></option>
			<?php
			$prodi = $db->prodi();
			?>
		</select></td>
	</tr>

        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Simpan"/></td>
        </tr>
    </table>
</form>
</body>
</html>
