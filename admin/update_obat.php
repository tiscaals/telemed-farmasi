<?php
    include('admin_table_dokter.php');
    include('../koneksi.php');
    //Connect DB
    //Create query based on the ID passed from you table
    //query : delete where Staff_id = $id
    // on success delete : redirect the page to original page using header() method
    // sql to update a record
	$id=$_GET['id'];
    $nama_obat=$_POST['nama_obat'];
	$jenis_obat=$_POST['jenis_obat'];
    $qty=$_POST['qty'];
    $harga_obat=$_POST['harga_obat'];


    $sql = "update `obat` set nama_obat='$nama_obat', jenis_obat='$jenis_obat', qty='$qty', harga_obat='$harga_obat'
                where obat_id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('location:admin_table_obat.php');
        exit;
    } else {
        echo "Error deleting record";
    }
?>