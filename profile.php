<?php
    session_start();
    include 'koneksi.php';
    // cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['user_level_id']=="4"){
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
    }
    
    if(isset($_POST['update_profile'])){
        $error_log = '';
        $error_type = 'danger';
        $nik = $_POST['nik'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $no_tlp = $_POST['no_tlp'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];


        if (strlen($nik) < 16 ){
            $error_log = '*Nomor Induk Kependudukan Minimal 16 Angka';
        }
        else if (empty($nama_lengkap)) {
            $error_log = '*Nama Tidak Boleh Kosong';
        }
        else if (empty($jenis_kelamin)) {
            $error_log = '*Jenis Kelamin Belum Dipilih';
        }
        else if (strlen($no_tlp) < 11 ) {
            $error_log = 'Nomor Telepon Minimal 11';
        }
        else if (empty($tgl_lahir)) {
            $error_log = 'Tanggal Lahir Belum Dipilih';
        }
        else if (empty($alamat)) {
            $error_log = '*Alamat Tidak Boleh Kosong';
        } else {
            if ($conn->query("UPDATE user_pasien SET nik = '$nik', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', no_tlp = '$no_tlp', tgl_lahir = '$tgl_lahir', alamat = '$alamat' WHERE user_id = '$user_id'") == true) {
                $error_log = 'Data Profile Berhasil Di Update.';
                $error_type = 'success';
            } else {
                $error_log = 'Ups, Gagal Update Profile !!.';
            }
        }        
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Telemedicine - Profil Saya</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/logo/RSUD2.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="index.html">
                        <img src="assets/img/logo/logo-rs.png" alt="Logo">
                        <img class="logo-fold" src="assets/img/logo/logo-rs.png" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="index.html">
                        <img src="assets/img/logo/logo-rs.png" alt="Logo">
                        <img class="logo-fold" src="assets/img/logo/logo-rs.png" alt="Logo">
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
                                    <img src="assets/images/avatars/thumb-3.jpg"  alt="">
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
                        <li class="nav-item dropdown open">
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
                                <li class="active">
                                    <a href="/../auth/home.php">Default</a>
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
                                <span class="title">E-RESEP</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="accordion.html">E-Resep</a>
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
                                    <a href="form-elements.html">Konsultasi</a>
                                </li>
                                <li>
                                    <a href="form-layouts.html">Transaksi</a>
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
                    <div class="page-header no-gutters has-tab">
                        <h2 class="font-weight-normal">Edit Profile</h2>
                        <ul class="nav nav-tabs" >
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-account">Account</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" name="tab-account" >
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                echo '<div class="alert alert-'.$error_type.'" role="alert">';
                                echo $error_log;
                                echo '</div>';
                                }
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Informasi Pribadi</h4>
                                    </div>   
                                    <div class="card-body">
                                        <?php
                                        $result = $conn->query("SELECT * FROM user_pasien WHERE user_id='$user_id'");
                                        $row = mysqli_fetch_assoc($result)
                                        ?>
                                        <form method="POST">
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="nik">NIK</label>
                                                    <input type="number" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan" value="<?php if(mysqli_num_rows($result) > 0){
                                                            echo $row["nik"]; }?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?php if(mysqli_num_rows($result) > 0){
                                                            echo $row["nama_lengkap"]; }?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" class="form-control" >
                                                        <option> <?php if(mysqli_num_rows($result) > 0){
                                                            echo $row["jenis_kelamin"]; } else{?>Pilih<?php } ?></option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="no_tlp">Nomor Telepon</label>
                                                    <input type="number" name="no_tlp" class="form-control" placeholder="Nomor Telepon" value="<?php if(mysqli_num_rows($result) > 0){
                                                            echo $row["no_tlp"]; }?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="tgl_lahir">Tanggal Lahir</label>
                                                    <input type="date"  name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php if(mysqli_num_rows($result) > 0){
                                                            echo $row["tgl_lahir"]; }?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="alamat">Alamat</label>
                                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap" value="<?php if(mysqli_num_rows($result) > 0){
                                                            echo $row["alamat"]; }?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button type="submit" name="update_profile" class="btn btn-primary m-t-30">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
            
        <!-- Core Vendors JS -->
        <script src="assets/js/vendors.min.js"></script>

        <!-- Core JS -->
        <script src="assets/js/app.min.js"></script>

    </body>

</html>

