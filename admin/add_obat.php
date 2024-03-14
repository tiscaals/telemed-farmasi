<?php
	include('../koneksi.php');
 
	$obat_id=$_POST['obat_id'];
    $nama_obat=$_POST['nama_obat'];
	$jenis_obat=$_POST['jenis_obat'];
    $qty=$_POST['qty'];
    $harga_obat=$_POST['harga_obat'];

 
	mysqli_query($conn,"insert into `obat` (obat_id,nama_obat,jenis_obat,qty,harga_obat)
                    values ('$obat_id','$nama_obat','$jenis_obat','$qty','$harga_obat')");

	header('location:admin_table_obat.php');
 
?>