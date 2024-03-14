<?php
    session_start();
    include 'koneksi.php';
    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['user_level_id'] == "4") {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
        $nama_lengkap = $_SESSION['nama_lengkap'];
    }
    $transaksi_id = $_GET['transaksi_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pengiriman Obat</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/logo-rs-kecil.png">

    <!-- page css -->
    <link href="assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="">
                        <img src="assets/img/logo-rs.png" alt="Logo" style="max-height: 65px;">
                        <img class="logo-fold" src="assets/img/logo-rs-kecil.png" alt="Logo" style="max-width: 60px; margin: auto;">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="">
                        <img src="assets/img/logo-rs.png" alt="Logo" style="max-height: 65px;">
                        <img class="logo-fold" src="assets/img/logo-rs-kecil.png" alt="Logo" style="max-width: 60px; margin: auto;">
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
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?php echo $username; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="/auth/user/setting.php" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Ganti Password</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="loqout.php" class="dropdown-item d-block p-h-15 p-v-10">
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
                                    <a href="home.php">Default</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Reservasi</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="app-chat.html">Konsultasi</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
									<i class="anticon anticon-build"></i>
								</span>
                                <span class="title">Informasi</span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="avatar.html">Layanan</a>
                                </li>
                                <li>
                                    <a href="alert.html">Cara Penggunaan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-hdd"></i>
                                </span>
                                <span class="title">E-Resep</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a href="e-resep.php">E-Resep</a>
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
                                <li>
                                    <a href="riwayat-transaksi.php">Transaksi</a>
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
                    $result = $conn->query("SELECT * FROM resep_obat LEFT JOIN user ON resep_obat.user_id = user.user_id LEFT JOIN obat ON resep_obat.obat_id = obat.obat_id LEFT JOIN reservasi ON resep_obat.reservasi_id = reservasi.reservasi_id LEFT JOIN user_pasien ON user.user_id = user_pasien.user_id LEFT JOIN pengiriman ON resep_obat.transaksi_id = pengiriman.transaksi_id WHERE resep_obat.transaksi_id = '$transaksi_id';");
                    
                    $row = mysqli_fetch_assoc($result);
                    $tgl_lahir = $row["tgl_lahir"];
                    $date1 = new DateTime(date('Y-m-d', strtotime($tgl_lahir)));
                    $date2 = new DateTime(date('Y-m-d'));
                    $interval = $date1->diff($date2);

                    ?>
                    <div class="page-header">
                        <h2 class="header-title">Req Pengiriman</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="home.php" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="e-resep.php">E-Resep</a>
                                <span class="breadcrumb-item active">Req Pengiriman</span>
                            </nav>
                        </div>
                    </div>
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
                                        <p><?php echo $interval->y . " tahun, " . $interval->m ." bulan ";?></p>
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
                                    <div class="align-items-center">
                                        <p><?php echo $row["hasil_konsultasi"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Obat</h4>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Obat</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Harga Satuan</th>
                                            <th scope="col">Harga Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $listobat = $conn -> query("SELECT * FROM resep_obat JOIN obat ON resep_obat.obat_id = obat.obat_id WHERE transaksi_id = '$transaksi_id';");
                                            if (mysqli_num_rows($listobat) > 0) {

                                            $i=1;
                                            while($rowobat = mysqli_fetch_assoc($listobat)) {
                                        ?>
                                            <tr>
                                                <th><?php echo $i++; ?></th>
                                                <td><?php echo $rowobat["nama_obat"]; ?></td>
                                                <td><?php echo $rowobat["qty_beli"]; ?></td>
                                                <td><?php echo $rowobat["catatan_resep"]; ?></td>
                                                <td><?php echo $rowobat["harga_obat"]; ?></td>
                                                <td><?php echo ($rowobat["harga_obat"]*$rowobat["qty_beli"]); ?></td>
                                            </tr>
                                        <?php
                                            }}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row m-t-30 lh-1-8">
                                <div class="col-sm-12">
                                    <div class="float-right text-right">
                                        <?php
                                            $harga = $conn -> query("SELECT SUM(harga_obat*qty_beli) AS harga_total FROM resep_obat JOIN obat ON resep_obat.obat_id = obat.obat_id WHERE transaksi_id = '$transaksi_id';");
                                            
                                            $biaya = mysqli_fetch_assoc($harga)
                                        ?>
                                        <p>Sub - Total harga: Rp <?php echo $biaya["harga_total"]; ?></p>
                                        <p>Biaya Pengiriman : Rp 15000</p>
                                        <hr />
                                        <h3>
                                        <span class="font-weight-semibold text-dark">
                                            Total : Rp
                                        </span>
                                        <?php echo ($biaya["harga_total"]+15000); ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengiriman</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-label">Alamat Pengiriman:</label>
                                <div class="col-sm-10">
                                    <p><?php echo $row["alamat"]; ?></p>
                                </div>
                            </div>
                            <form method="POST">
                                <div class="from-group row">
                                    <label for="opsi kirim" class="col-sm-2 col-form-label">Opsi Pengiriman:</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="opsi_kirim">
                                            <option value="">Pilih Jasa Kirim</option>
                                            <option value="JNE">JNE</option>
                                            <option value="JNT">JNT</option>
                                            <option value="Gojek Sameday">Gojek Sameday</option>
                                            <option value="Pos Indonesia">Pos Indonesia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Bayar</button>
                                    </div>
                                </div>
                            </form>
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

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="primary">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                    <label for="side-nav-theme-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View END -->
        </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/pages/datatables.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>