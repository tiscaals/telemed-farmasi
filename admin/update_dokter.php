<?php
    include('admin_table_dokter.php');
    include('../koneksi.php');
    //Connect DB
    //Create query based on the ID passed from you table
    //query : delete where Staff_id = $id
    // on success delete : redirect the page to original page using header() method
    // sql to update a record
	$id=$_GET['user_id'];
    $nama_dokter=$_POST['nama_dokter'];
	$nip=$_POST['nip'];
    $status=$_POST['status'];

    $sql = "update `user_dokter` set nama_dokter='$nama_dokter', status='$status', nip='$nip' where user_id='$id'";

    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('location:admin_table_dokter.php');
        exit;
    } else {
        echo "Error deleting record";
    }
?>