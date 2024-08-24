<?php
include('koneksi.php');
$db = new database();

// Get the ID of the record to be edited
$id_kls = isset($_GET['id_kls']) ? $_GET['id_kls'] : '';
$data_kls = $db->get_by_id($id_kls);

if (!$data_kls) {
    die("Data not found.");
}

// Generate the range of academic years from 2006 onwards

$current_year = 2006; // Get the current year
$years = [];
for ($year = date("Y"); $year >= $current_year; $year--) {
    $years[] = $year;
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form submission
    $id_kls = $_POST['id_kls'];
    $nama_kelas = $_POST['nama_kelas'];
    $thn_akademik = $_POST['thn_akademik'];
    $id_prodi = $_POST['id_prodi'];
    
    $db->update_data($id_kls, $nama_kelas, $thn_akademik, $id_prodi);
    
    // Redirect to the display page after updating
    header('Location: tampil_kls.php');
    exit();
}
?>
<!-- 
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kelas</title>
</head>
<body>
<h3>Edit Data Kelas</h3>
<hr/>
<form method="post" action="">
    <table>
        <tr>
            <td>ID Kelas</td>
            <td>:</td>
            <td><input type="text" name="id_kls" value="<?php echo htmlspecialchars($data_kls['id_kls']); ?>" readonly/></td>
        </tr> 
        <tr>
            <td>Nama Kelas</td>
            <td>:</td>
            <td><input type="text" name="nama_kelas" value="<?php echo htmlspecialchars($data_kls['nama_kelas']); ?>" required/></td>
        </tr> -->
        <!-- <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td><input type="text" name="thn_akademik" value="<?php echo htmlspecialchars($data_kls['thn_akademik']); ?>" required/></td>
        </tr> -->

        <!-- <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td>
                <select name="thn_akademik" required>
                    <option value="">-- Pilih Tahun Akademik --</option>
                    <?php
                    foreach ($years as $year) {
                        // Set the selected year
                        $selected = ($year == $data_kls['thn_akademik']) ? 'selected' : '';
                        echo "<option value=\"$year\" $selected>$year</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
		<td>Program Studi</td>
		<td>:</td>
        <td><select name="id_prodi" id="">
			<option value="<?php echo $data_kls['id_prodi']; ?>"><?php echo $data_kls['id_prodi']; ?></option>
			<?php
			$prodi = $db->prodi();
			?>
		</select></td>
	</tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Update"/></td>
        </tr>
    </table>
</form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-200">
    <main class="flex items-center justify-center min-h-screen flex-col">
        <div>
            <h1 class="mb-6 text-3xl font-extrabold text-slate-700">Edit Data Kelas</h1>
        </div>
    
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <form method="post" action="">
                <div class="mb-4">
                    <label for="id_kls" class="block text-sm font-medium text-gray-600">ID Kelas</label>
                    <input type="text" name="id_kls" id="id_kls" value="<?php echo htmlspecialchars($data_kls['id_kls']); ?>" readonly class="mt-1 p-2 w-full border rounded-md bg-gray-100 cursor-not-allowed"/>
                </div>
                <div class="mb-4">
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-600">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" value="<?php echo htmlspecialchars($data_kls['nama_kelas']); ?>" required class="mt-1 p-2 w-full border rounded-md"/>
                </div>
                <div class="mb-4">
                    <label for="thn_akademik" class="block text-sm font-medium text-gray-600">Tahun Akademik</label>
                    <select name="thn_akademik" id="thn_akademik" required class="mt-1 p-2 w-full border rounded-md">
                        <option value="">-- Pilih Tahun Akademik --</option>
                        <?php
                        foreach ($years as $year) {
                            $selected = ($year == $data_kls['thn_akademik']) ? 'selected' : '';
                            echo "<option value=\"$year\" $selected>$year</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_prodi" class="block text-sm font-medium text-gray-600">Program Studi</label>
                    <select name="id_prodi" id="id_prodi" required class="mt-1 p-2 w-full border rounded-md">
                        <option value="<?php echo htmlspecialchars($data_kls['id_prodi']); ?>"><?php echo htmlspecialchars($data_kls['id_prodi']); ?></option>
                        <?php
                        $prodi = $db->prodi();
                        foreach ($prodi as $p) {
                            echo "<option value=\"{$p['id']}\">{$p['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="flex justify-end">
                    <input type="submit" value="Update" class="bg-blue-500 text-white p-3 w-full border rounded-md mt-1 cursor-pointer hover:bg-blue-600"/>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

