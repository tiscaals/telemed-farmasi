<?php
    include('admin_keuangan.php');
    include('../koneksi.php');
    //Connect DB
    //Create query based on the ID passed from you table
    //query : delete where Staff_id = $id
    // on success delete : redirect the page to original page using header() method
    // sql to update a record
	$id=$_GET['transaksi_id'];
    $status_bayar=$_POST['status_bayar'];

    $sql = "update `transaksi` set status_bayar='$status_bayar' where transaksi_id='$id'";

    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('location:admin_keuangan.php');
        exit;
    } else {
        echo "Error deleting record";
    }
?>