<?php
include '../koneksi.php';

$nama_obat = $_POST['nama_obat'];
$jenis_obat = $_POST['jenis_obat'];
$jumlah_obat = $_POST['jumlah_obat'];
$harga_obat = $_POST['harga_obat'];

// pick data user
$addobat = mysqli_query($conn,"SELECT * FROM obat WHERE nama_obat='$nama_obat'");
$cek = mysqli_num_rows($addobat);

//ngecek misal obat udah pernah daftar
if ($cek > 0) {
    header("location:obat.php?pesan=obatexist");
} else{
    if (empty($nama_obat) || empty($jenis_obat) || empty($jumlah_obat) || empty($harga_obat)) {
        header("location:obat.php?pesan=kosong");
    } else{
        $query = "INSERT INTO obat(nama_obat, jenis_obat, qty, harga_obat) VALUES('$nama_obat','$jenis_obat','$jumlah_obat', '$harga_obat');";
        mysqli_query($conn, $query);
        header("location:obat.php?pesan=berhasil");
    }
}
?>