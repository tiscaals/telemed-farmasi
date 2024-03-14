<?php
session_start();
include 'koneksi.php';

$error_log = '';
$error_type = 'danger';
$namaLengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// pick data user
$registered = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
$cek = mysqli_num_rows($registered);

//ngecek misal username udah pernah daftar
if ($cek > 0) {
    header("location: daftar.php?pesan=usernameexist");
} else{
    if (empty($namaLengkap)) {
        $error_log = '*Tidak Boleh Kosong.';

    } else if (empty($username)) {
        $error_log = '*Username Tidak Boleh Kosong.';
    
    if (empty($password)) {
        $error_log = '*Tidak Boleh Kosong.';
            }

    }else if (strlen($password) < 6 ) {
        $error_log = '*Kata Sandi Minimal 6 Karakter.';
        
    }else if (empty($confirmPassword)) {
        $error_log = '*Tidak Boleh Kosong.';

    }else if (strlen($confirmpassword) < 6 ) {
        $error_log = '*Kata Sandi Minimal 6 Karakter.';
    } else{
        
        if ($password == $confirmPassword){
            $quer = "INSERT INTO user(username, password, nama_lengkap) VALUES('$username','$password','$namaLengkap');";
            $query= "INSERT INTO user_pasien(user_id, nama_lengkap) VALUES((SELECT user_id FROM user WHERE username = '$username'), '$namaLengkap');";
            mysqli_query($conn, $quer);
            mysqli_query($conn, $query);
            $error_log = 'Pendaftaran Berhasil, Silahkan Login!!';
            $error_type = 'success';
        } else{
            $error_log = 'Pendaftaran Gagal!!';
        }
    }
}
?>