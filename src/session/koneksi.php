<?php

use function PHPSTORM_META\map;

class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "perkuliahan";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
    function register($nama,$username,$password)
	{	
		$insert = mysqli_query($this->koneksi,"insert into user ( nama, username, password) values ('$nama','$username','$password')");
		return $insert;
	}
    
	function login($username, $password, $remember)
	{
		$query = mysqli_query($this->koneksi, "select * from user where username='$username'");
		$data_user = $query->fetch_array();
		
		if (!$data_user) {
			// Username tidak ditemukan
			echo "<script> alert('Username tidak ditemukan')</script>";
		} elseif ($password!=$data_user['password']) {
			// Password salah
			echo "<script> alert('Password salah')</script>";
		} else {
			if ($remember) {
				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}

	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}

	public function getAllData($db){
		$select=mysqli_query($this->koneksi,"SELECT * from $db");
		$data = mysqli_num_rows($select);
		return $data;
	}
} 
 
?>