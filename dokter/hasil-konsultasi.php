<?php
session_start();
include 'koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['user_level_id'] == "2") {
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $nama_lengkap = $_SESSION['nama_lengkap'];
}
$reservasi_id = $_GET['reservasi_id'];

if (isset($_POST['diagnosa'])) {
    $error_log = '';
    $error_type = 'danger';
    $diagnosa = $_POST['diagnosa'];

    if (empty($diagnosa)) {
        $error_log = '*Hasil Diagnosa tidak boleh kosong!';
    } else {
        if ($conn->query("UPDATE reservasi SET hasil_konsultasi='$diagnosa' WHERE reservasi_id='$reservasi_id'") == true) {
            $error_log = 'Diagnosa berhasil disimpan!';
            $error_type = 'success';

            $update_status = $conn->query("UPDATE reservasi SET status_reservasi='Selesai Konsultasi' WHERE reservasi_id='$reservasi_id'");
        } else {
            $error_log = 'Ups, diagnosa tidak tersimpan!';
        }
    }
}

if (isset($_POST['save-eresep'])) {
    $error_log = '';
    $error_type = 'danger';
    $nama_obat = $_POST['nama_obat'];
    $jumlah_obat = $_POST['jumlah_obat'];
    $catatan_resep = $_POST['catatan_resep'];

    foreach ($nama_obat as $index => $n_obat) {
        $s_nama = $n_obat;
        $s_jumlah = $jumlah_obat[$index];
        $s_catatan = $catatan_resep[$index];

        //ngambil data obat id
        $pick = $conn->query("SELECT obat_id FROM obat WHERE nama_obat='$s_nama';");
        $row = mysqli_fetch_array($pick);
        $id_obat = $row['obat_id'];

        //ngambil data user id
        $pick1 = $conn->query("SELECT user_id FROM reservasi WHERE reservasi_id='$reservasi_id';");
        $row1 = mysqli_fetch_array($pick1);
        $id_user = $row1['user_id'];

        $query = "INSERT INTO resep_obat (reservasi_id, user_id, obat_id, qty_beli, catatan_resep, created_by) VALUES ('$reservasi_id','$id_user','$id_obat','$s_jumlah','$s_catatan','dr. $nama_lengkap')";
        if ($result = $conn->query($query) == true) {
            $error_log = 'E-Resep berhasil dsimpan!';
            $error_type = 'success';
        } else {
            $error_log = 'Ups, e-resep tidak tersimpan!';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RSUD JOMBANG - Homepage Telemedicine</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/logo-rs-kecil.png">

    <!-- Core css -->
    <link href="../assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="index.html">
                        <img src="../assets/img/logo-rs.png" alt="Logo" style="max-height: 65px;">
                        <img class="logo-fold" src="../assets/img/logo-rs-kecil.png" alt="Logo" style="max-width: 60px; margin: auto;">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="index.html">
                        <img src="../assets/img/logo-rs.png" alt="Logo" style="max-height: 65px;">
                        <img class="logo-fold" src="../assets/img/logo-rs-kecil.png" alt="Logo" style="max-width: 60px; margin: auto;">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                        <small>View All</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-blue avatar-icon">
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You received a new message</p>
                                                    <p class="m-b-0"><small>8 min ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small>7 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-red avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">System Alert</p>
                                                    <p class="m-b-0"><small>8 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                            <div class="d-flex">
                                                <div class="avatar avatar-gold avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You have a new update</p>
                                                    <p class="m-b-0"><small>2 days ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="../assets/images/avatars/thumb-3.jpg" alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="../assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?php echo $username; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="profile.php" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="setting.php" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Ganti Password</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="../loqout.php" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="dokter.php">Default</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Konsultasi Baru</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a href="konsultasi_baru.php">Konsultasi</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-form"></i>
                                </span>
                                <span class="title">Riwayat</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="riwayat-konsultasi.php">Konsultasi</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">


                <!-- Content Wrapper START -->
                <div class="main-content">
                    <?php
                    $result = $conn->query("SELECT * FROM reservasi JOIN user_pasien ON reservasi.user_id = user_pasien.user_id WHERE reservasi.reservasi_id='$reservasi_id';");

                    $row = mysqli_fetch_assoc($result);
                    $tgl_lahir = $row["tgl_lahir"];
                    $date1 = new DateTime(date('Y-m-d', strtotime($tgl_lahir)));
                    $date2 = new DateTime(date('Y-m-d'));
                    $interval = $date1->diff($date2);

                    ?>
                    <div class="page-header">
                        <h2 class="header-title">Hasil Konsultasi</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="home.php" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="konsultasi_baru.php">Konsultasi Baru</a>
                                <span class="breadcrumb-item active">Hasil Konsultasi</span>
                            </nav>
                        </div>
                    </div>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        echo '<div class="alert alert-' . $error_type . '" role="alert">';
                        echo $error_log;
                        echo '</div>';
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-3  pb-3">
                            <div class="card h-100">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Pasien</h4>
                                </div>
                                <div class="card-body">

                                    <div class="align-items-center">
                                        <h6>ID Pasien:</h6>
                                        <p><?php echo $row["user_id"]; ?></p>
                                        <h6>Nama Lengkap:</h6>
                                        <p><?php echo $row["nama_lengkap"]; ?></p>
                                        <h6>Umur:</h6>
                                        <p><?php echo $interval->y . " tahun, " . $interval->m . " bulan "; ?></p>
                                    </div>
                                    <?php
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 pb-3">
                            <div class="card h-100">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Hasil Diagnosa</h4>

                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <textarea class="form-control" name="diagnosa" placeholder="Tuliskan hasil diagnosa..." rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Simpan Diagnosa</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title row justify-content-between m-auto">
                                <h4>Obat</h4>
                                <a href="javascript:void(0)" class="btn btn-primary tambah-obat">+ Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "kosong") {
                                    echo "<div class='alert'>Nomor Resi tidak boleh kosong!</div>";
                                }
                                if ($_GET['pesan'] == "update") {
                                    echo "<div class='alert'>Obat berhasil diupdate!</div>";
                                }
                            }
                            ?>
                            <div class="table-responsive">
                                <form action="" method="POST">
                                    <div class="label-form row">
                                        <div class="col-md-4"><label for="inputObat">Obat</label></div>
                                        <div class="col-md-2"><label for="inputObat">Jumah</label></div>
                                        <div class="col-md-4"><label for="inputObat">Catatan(Opsional)</label></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 mb-2">
                                            <select class="form-control custom-select" name="nama_obat[]" required>
                                                <option value="">Pilih Obat</option>
                                                <?php
                                                $listobat = $conn->query("SELECT nama_obat FROM obat;");

                                                if (mysqli_num_rows($listobat) > 0) {
                                                    $i = 0;
                                                    while ($rowobat = mysqli_fetch_assoc($listobat)) {
                                                        echo "<option value=" . $rowobat['nama_obat'] . ">" . $rowobat['nama_obat'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <input type="number" class="form-control" name="jumlah_obat[]" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <input type="text" class="form-control" name="catatan_resep[]">
                                        </div>
                                    </div>

                                    <div class="paste-new-forms"></div>

                                    <button type="submit" name="save-eresep" class="btn btn-primary">Simpan E-Resep</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>
                        <span>
                            <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- JQuery -->
            <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

            <script>
                $(document).ready(function() {

                    $(document).on('click', '.remove-btn', function() {
                        $(this).closest('.main-form').remove();
                    });

                    $(document).on('click', '.tambah-obat', function() {
                        $('.paste-new-forms').append('<div class="main-form form-row">\
                                        <div class="form-group col-md-4 mb-2">\
                                            <select class="form-control custom-select" name="nama_obat[]" required>\
                                            <option value="">Pilih Obat</option>\
                                            <?php
                                            $listobat = $conn->query("SELECT nama_obat FROM obat;");

                                            if (mysqli_num_rows($listobat) > 0) {
                                                $i = 0;
                                                while ($rowobat = mysqli_fetch_assoc($listobat)) {
                                                    echo "<option value=" . $rowobat['nama_obat'] . ">" . $rowobat['nama_obat'] . "</option>";
                                                }
                                            }
                                            ?>\
                                            </select>\
                                        </div>\
                                        <div class="form-group col-md-2 mb-2">\
                                            <input type="number" class="form-control" name="jumlah_obat[]" required>\
                                        </div>\
                                        <div class="form-group col-md-4 mb-2">\
                                            <input type="text" class="form-control" name="catatan_resep[]">\
                                        </div>\
                                        <div class="form-group col-md-1 mb-2">\
                                            <button type="button" class="remove-btn btn btn-danger"><i class="anticon anticon-delete"></i></button>\
                                        </div>\
                                    </div>');
                    });
                });
            </script>

            <!-- Core Vendors JS -->
            <script src="../assets/js/vendors.min.js"></script>

            <!-- Core JS -->
            <script src="../assets/js/app.min.js"></script>

</body>

</html>