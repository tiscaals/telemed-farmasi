<?php
	include('../koneksi.php');
 
	$user_id=$_POST['user_id'];
    $nama_dokter=$_POST['nama_dokter'];
	$nip=$_POST['nip'];
    $status=$_POST['status'];

 
	mysqli_query($conn,"insert into `user_dokter` (user_id,nama_dokter,nip,status)
                    values ('$user_id','$nama_dokter','$nip','$status')");

	header('location:admin_table_dokter.php');
 
?>