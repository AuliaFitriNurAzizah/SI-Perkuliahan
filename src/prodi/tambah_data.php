<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Prodi</title>
</head>
<body>
<h3>Tambah Data Prodi</h3>
<hr/>
<form method="post" action="proses_prodi.php?action=add">
<table>
     <tr>
        <td>ID Prodi</td>
        <td>:</td>
        <td><input type="text" name="id_prodi"/></td>
    </tr>
    <tr>
        <td>Nama Prodi</td>
        <td>:</td>
        <td><input type="text" name="nama_prodi"/></td>
        
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="tombol" value="Simpan"/></td>
    </tr>
</table>
</form>
</body>
</html>