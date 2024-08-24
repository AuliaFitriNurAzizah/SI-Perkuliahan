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

    // Method to fetch data from tb_dosen
    function tampil_data() {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_dosen");
        $hasil = []; // Initialize the variable $hasil as an empty array
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    // Method to add data to tb_dosen
    function tambah_data($id_dsn, $nidn, $nip, $nama_dsn, $alamat, $id_user) {
        $query = "INSERT INTO tb_dosen (id_dsn, nidn, nip, nama_dsn, alamat, id_user) VALUES ('$id_dsn', '$nidn', '$nip', '$nama_dsn', '$alamat', '$id_user')";
        mysqli_query($this->koneksi, $query);
    }

    // Method to get data by id_dsn
    function get_by_id($id_dsn) {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_dosen WHERE id_dsn = '$id_dsn'");
        return $query->fetch_array();
    }

    // Method to update data in tb_dosen
    function update_data($id_dsn, $nidn, $nip, $nama_dsn, $alamat, $id_user) {
        $query = "UPDATE tb_dosen SET nidn = '$nidn', nip = '$nip', nama_dsn = '$nama_dsn', alamat = '$alamat', id_user = '$id_user' WHERE id_dsn = '$id_dsn'";
        mysqli_query($this->koneksi, $query);
    }

    // Method to delete data from tb_dosen
    function delete_data($id_dsn) {
        $query = "DELETE FROM tb_dosen WHERE id_dsn = '$id_dsn'";
        mysqli_query($this->koneksi, $query);
    }
}
?>
