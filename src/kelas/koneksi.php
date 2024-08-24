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

    // Method to fetch data from tb_kls
    function tampil_data() {
        $query = "SELECT tb_kls.id_kls, tb_kls.nama_kelas, tb_kls.thn_akademik, tb_prodi.nama_prodi 
                  FROM tb_kls 
                  JOIN tb_prodi ON tb_kls.id_prodi = tb_prodi.id_prodi";
        $data = mysqli_query($this->koneksi, $query);
        $hasil = []; // Initialize $hasil as an empty array
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    // Method to add data to tb_kls
    function tambah_data($id_kls, $nama_kelas, $thn_akademik, $id_prodi) {
        $query = "INSERT INTO tb_kls (id_kls, nama_kelas, thn_akademik, id_prodi) VALUES ('$id_kls', '$nama_kelas', '$thn_akademik', '$id_prodi')";
        mysqli_query($this->koneksi, $query);
    }

    // Method to get data by id_kls
    function get_by_id($id_kls) {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_kls WHERE id_kls = '$id_kls'");
        return $query->fetch_array();
    }

    // Method to update data in tb_kls
    function update_data($id_kls, $nama_kelas, $thn_akademik, $id_prodi) {
        $query = "UPDATE tb_kls SET nama_kelas = '$nama_kelas', thn_akademik = '$thn_akademik', id_prodi = '$id_prodi' WHERE id_kls = '$id_kls'";
        mysqli_query($this->koneksi, $query);
    }

    // Method to delete data from tb_kls
    function delete_data($id_kls) {
        $query = "DELETE FROM tb_kls WHERE id_kls = '$id_kls'";
        mysqli_query($this->koneksi, $query);
    }

    // Method to get all programs of study for dropdown
    function prodi() {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_prodi") or die(mysqli_error($this->koneksi));
        while ($data = mysqli_fetch_array($query)) {
            echo '<option value="' . $data['id_prodi'] . '">' . $data['nama_prodi'] . '</option>';
        }
    }

    // Method to get all programs of study data
    function get_all_prodi() {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_prodi") or die(mysqli_error($this->koneksi));
        $hasil = [];
        while ($row = mysqli_fetch_array($query)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}
?>
