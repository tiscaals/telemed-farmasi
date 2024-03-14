<?php
    include('admin_jadwal_table.php');
    include('../koneksi.php');
    
    // sql to update a record
	$reservasi_id=$_GET['reservasi_id'];
	// $nama_lengkap=$_POST['nama_lengkap'];
    // $nama_poli=$_POST['nama_poli'];
	// $tgl_reservasi=$_POST['tgl_reservasi'];
	$status_reservasi=$_POST['status_reservasi'];
	// $tiket_konsultasi=$_POST['tiket_konsultasi'];
    // nama_lengkap='$nama_lengkap', nama_poli='$nama_poli', tgl_reservasi='$tgl_reservasi',


    $sql = "update `reservasi` set
    status_reservasi='$status_reservasi' where reservasi_id='$reservasi_id'";
    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('location:admin_jadwal_table.php');
        exit;
    } else {
        echo "Error deleting record";
    }
?>