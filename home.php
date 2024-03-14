<?php
    session_start();
    include 'koneksi.php';
    // cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['user_level_id']=="4"){
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
        $nama_lengkap = $_SESSION['nama_lengkap'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RSUD JOMBANG - Homepage Telemedicine</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/logo/RSUD2.png">

    <!-- page css -->
    <link href="assets/css/style.css" rel="stylesheet" href="">
    <link rel="stylesheet" href="assets/css/bener.css">
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
                                <a href="profile.php" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="/profile/setting.php" class="dropdown-item d-block p-h-15 p-v-10">
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
                                    <a href="reservasi/reservasi.php">Konsultasi</a>
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
                                    <a href="/informasi/daftar-poli.php">Layanan</a>
                                </li>
                                <li>
                                    <a href="/informasi/cara.php">Cara Penggunaan</a>
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
            <div class="page-container ">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <!-- Banner End -->
                    <div class="inner-banner inner-bg9">
                        <div class="container" style="width: 100%;padding:60px 0;text-align: center;background: darkblue;color: white;">
                            <div class="inner-title">
                                <h3 style="font-size: 2.8em;padding: 10px 0;font-weight: 800;color: white;">Selamat Datang di Layanan Telemedicine </h3>
                                <ul>
                                    <li style="font-size: 1.1em;font-weight: 100;letter-spacing: 5px;"><?php echo $username; ?></li>
                                </ul>
                                <a class="btn-bgstroke" style="font-size: 20px;display: inline-block;border: 1px solid white;padding: 10px 20px;border-radius: 10px;cursor: pointer;font-weight: 300;margin-top: 30px; background-color: white;color: #33cccc; ">reservasi</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br><br>
                    <div class="section-title text-center">
                        <h2>Opsi Pembayaran</h2>
                        <div class="section-icon">
                            <div class="icon">
                                <i class="flaticon-dna"></i>
                            </div>
                        </div>
                        <p>
                            Berikut daftar opsi pembayaran yang kami sediakan.
                        </p>
                    </div>
                    <!-- ======= Clients Section ======= -->
                    <section id="clients" class="clients">
                        <div class="container">
                            <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in">
                                        <img src="assets/img/clients/bca.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="100">
                                        <img src="assets/img/clients/bni.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="150">
                                        <img src="assets/img/clients/bri.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="200">
                                        <img src="assets/img/clients/digibank.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="250">
                                        <img src="assets/img/clients/gopay.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="300">
                                        <img src="assets/img/clients/permata.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="350">
                                        <img src="assets/img/clients/jcb.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="client-logo">
                                        <img src="assets/img/clients/linkaja.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="250">
                                        <img src="assets/img/clients/mandiri.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="300">
                                        <img src="assets/img/clients/master.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="350">
                                        <img src="assets/img/clients/ovo.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="client-logo">
                                        <img src="assets/img/clients/shopee.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="250">
                                        <img src="assets/img/clients/ojk.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="300">
                                        <img src="assets/img/clients/panin.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="350">
                                        <img src="assets/img/clients/uob.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="client-logo">
                                        <img src="assets/img/clients/visa.png" class="img-fluid" alt="">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section><!-- End Clients Section -->
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
    </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>