<?php
    include('admin_table_poli.php');
    include('../koneksi.php');
    //Connect DB
    //Create query based on the ID passed from you table
    //query : delete where Staff_id = $id
    // on success delete : redirect the page to original page using header() method
    // sql to update a record
	$id=$_GET['id'];
	$nama_poli=$_POST['nama_poli'];
    $sql = "update `poli` set nama_poli='$nama_poli'  where poli_id='$id'";

    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('location:admin_table_poli.php');
        exit;
    } else {
        echo "Error deleting record";
    }
?>