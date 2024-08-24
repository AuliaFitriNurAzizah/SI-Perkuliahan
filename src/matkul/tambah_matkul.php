<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mata Kuliah</title>
</head>
<body>
<h3>Tambah Data Mata Kuliah</h3>
<hr/>
<form method="post" action="proses_matkul.php?action=add">
    <table>
        <tr>
            <td>ID Mata Kuliah</td>
            <td>:</td>
            <td><input type="text" name="id_mk" required/></td>
        </tr> 
        <tr>
            <td>Kode Mata Kuliah</td>
            <td>:</td>
            <td><input type="text" name="kode_mk" required/></td>
        </tr>
        <tr>
            <td>Nama Mata Kuliah</td>
            <td>:</td>
            <td><input type="text" name="nama_mk" required/></td>
        </tr>
        <tr>
            <td>SKS</td>
            <td>:</td>
            <td><input type="number" name="sks" required/></td>
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
