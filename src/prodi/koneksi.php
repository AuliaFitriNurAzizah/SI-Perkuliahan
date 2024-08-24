<?php
class database{
    // Database connection properties
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "perkuliahan";
    public $koneksi;

    // Constructor to initiate the database connection
    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // Method to fetch data from tb_prodi
    function tampil_data() {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_prodi");
        $hasil = []; // Initialize the variable $hasil as an empty array
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    // Method to add data to tb_prodi
    function tambah_data($id_prodi, $nama_prodi) {
        mysqli_query($this->koneksi, "INSERT INTO tb_prodi (id_prodi, nama_prodi) VALUES ('$id_prodi', '$nama_prodi')");
    }

    // Method to get data by id_prodi
    function get_by_id($id_prodi) {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_prodi WHERE id_prodi = '$id_prodi'");
        return $query->fetch_array();
    }

    // Method to update data in tb_prodi
    function update_data($id_prodi, $nama_prodi) {
        $query = mysqli_query($this->koneksi, "UPDATE tb_prodi SET nama_prodi = '$nama_prodi' WHERE id_prodi = '$id_prodi'");
    }

    // Method to delete data from tb_prodi
    function delete_data($id_prodi) {
        $query = mysqli_query($this->koneksi, "DELETE FROM tb_prodi WHERE id_prodi = '$id_prodi'");
    }
}
?>