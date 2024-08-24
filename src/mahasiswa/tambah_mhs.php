<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
<h3>Tambah Data Mahasiswa</h3>
<hr/>
<form method="post" action="proses_mhs.php?action=add">
    <table>
        <tr>
            <td>ID Mahasiswa</td>
            <td>:</td>
            <td><input type="text" name="id_mhs" required/></td>
        </tr> 
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td><input type="number" name="npm" required/></td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td>:</td>
            <td><input type="text" name="nama_mhs" required/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" placeholder="Masukkan Alamat Mahasiswa" rows="4" required></textarea></td>
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
