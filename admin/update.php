<?php
    include('admin_edit.php');
    include('../koneksi.php');

    // sql to update a record
	$id=$_GET['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
    $nama_lengkap=$_POST['nama_lengkap'];
    $role=$_POST['role'];

    $sql = "update `user` set username='$username', password='$password' , nama_lengkap='$nama_lengkap', role='$role' where user_id='$id'";

    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('location:admin_table.php');
        exit;
    } else {
        echo "Error deleting record";
    }
?>