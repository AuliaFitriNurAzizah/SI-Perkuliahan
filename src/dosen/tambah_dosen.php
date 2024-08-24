<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Dosen</title>
</head>
<body>
<h3>Tambah Data Dosen</h3>
<hr/>
<form method="post" action="proses_dosen.php?action=add">
    <table>
        <tr>
            <td>ID Dosen</td>
            <td>:</td>
            <td><input type="text" name="id_dsn" required/></td>
        </tr>
        <tr>
            <td>NIDN</td>
            <td>:</td>
            <td><input type="text" name="nidn" required/></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td><input type="text" name="nip" required/></td>
        </tr>
        <tr>
            <td>Nama Dosen</td>
            <td>:</td>
            <td><input type="text" name="nama_dsn" required/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" placeholder="Masukkan Alamat Dosen" rows="4" required></textarea></td>
        </tr>
        <tr>
            <td>ID User</td>
            <td>:</td>
            <td><input type="text" name="id_user" required/></td>
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
