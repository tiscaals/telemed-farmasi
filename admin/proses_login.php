<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password' ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['user_level_id']=="1"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['user_level_id'] = "1";
		// alihkan ke halaman dashboard admin
		header("location:../admin/admin.php");

		// cek jika user login sebagai member
	}else 
	if($data['user_level_id']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['user_level_id'] = "2";
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['user_id'] = $data['user_id'];
		// alihkan ke halaman dashboard member
		header("location:../dokter/dokter.php");
	}else{

	if($data['user_level_id']=="3"){

			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['user_level_id'] = "3";
			$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
			$_SESSION['user_id'] = $data['user_id'];
			// alihkan ke halaman dashboard admin
			header("location:../farmasi/farmasi.php");
	
			// cek jika user login sebagai member
	}else 

	if($data['user_level_id']=="4"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['user_level_id'] = "4";
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['email'] = $data['email'];
		// alihkan ke halaman dashboard admin
		header("location:../home.php");

		// cek jika user login sebagai member
	}else 

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}



?>