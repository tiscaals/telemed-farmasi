<?php
    include('../koneksi.php');

    $obat_id = $_GET['id'];
    $nama_obat = $_POST['nama_obat'];
    $jenis_obat = $_POST['jenis_obat'];
    $tambahan_obat = $_POST['tambahan_obat'];
    $harga_obat = $_POST['harga_obat'];

    $query = "UPDATE obat SET nama_obat='$nama_obat', jenis_obat='$jenis_obat', qty=qty+'$tambahan_obat', harga_obat='$harga_obat' WHERE obat_id='$obat_id'";

    if (mysqli_query($conn, $query)) {
        mysqli_close($conn);
        header('location:obat.php?pesan=update');
    } else {
        echo "Ups, data tidak bisa diupndate!";
    }
?>