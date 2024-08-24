<?php
class database {
    // Database connection properties
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "perkuliahan";
    public $koneksi;

    // Constructor to initiate the database connection
    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // Method to fetch data from tb_matkul
    function tampil_data() {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_matkul");
        $hasil = []; // Initialize the variable $hasil as an empty array
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    // Method to add data to tb_matkul
    function tambah_data($id_mk, $kode_mk, $nama_mk, $sks) {
        $query = "INSERT INTO tb_matkul (id_mk, kode_mk, nama_mk, sks) VALUES ('$id_mk', '$kode_mk', '$nama_mk', '$sks')";
        mysqli_query($this->koneksi, $query);
    }

    // Method to get data by id_mk
    function get_by_id($id_mk) {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_matkul WHERE id_mk = '$id_mk'");
        return $query->fetch_array();
    }

    // Method to update data in tb_matkul
    function update_data($id_mk, $kode_mk, $nama_mk, $sks) {
        $query = "UPDATE tb_matkul SET kode_mk = '$kode_mk', nama_mk = '$nama_mk', sks = '$sks' WHERE id_mk = '$id_mk'";
        mysqli_query($this->koneksi, $query);
    }

    // Method to delete data from tb_matkul
    function delete_data($id_mk) {
        $query = "DELETE FROM tb_matkul WHERE id_mk = '$id_mk'";
        mysqli_query($this->koneksi, $query);
    }
}
?>
