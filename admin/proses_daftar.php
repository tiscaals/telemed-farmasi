<?php
session_start();
include '../koneksi.php';

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
    if (empty($namaLengkap) || empty($username) || empty($password) || empty($confirmPassword)) {
    header("location:daftar.php?pesan=kosong");
    } else{
        if ($password == $confirmPassword){
            $quer = "INSERT INTO user(username, password, nama_lengkap) VALUES('$username','$password','$namaLengkap');";
            $query= "INSERT INTO user_pasien(user_id, nama_lengkap) VALUES((SELECT user_id FROM user WHERE username = '$username'), '$namaLengkap');";
            mysqli_query($conn, $quer);
            mysqli_query($conn, $query);
            header("location:daftar.php?pesan=register");
        } else{
            header("location:daftar.php?pesan=salah_password");
        }
    }
}
?>