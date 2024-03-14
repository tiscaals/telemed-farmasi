<?php
	include('../koneksi.php');
 
	$poli_id=$_POST['poli_id'];
	$nama_poli=$_POST['nama_poli'];
 
	mysqli_query($conn,"insert into `poli` (poli_id,nama_poli) values ('$poli_id','$nama_poli')");
	header('location:admin_table_poli.php');
 
?>