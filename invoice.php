<?php
    session_start();
    include 'koneksi.php';
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['user_level_id']=="4"){
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
    }

    $transaksi_id = $_GET['transaksi_id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Invoice</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/logo-rs-kecil.png" />

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet" />
  </head>

  <body>
    <div class="app">
      <div class="layout">
        <!-- Header START -->
        <div class="header">
          <div class="logo logo-dark">
            <a href="">
              <img
                src="assets/img/logo-rs.png"
                alt="Logo"
                style="max-height: 65px"
              />
              <img
                class="logo-fold"
                src="assets/img/logo-rs-kecil.png"
                alt="Logo"
                style="max-width: 60px; margin: auto"
              />
            </a>
          </div>
          <div class="logo logo-white">
            <a href="">
              <img
                src="assets/img/logo-rs.png"
                alt="Logo"
                style="max-height: 65px"
              />
              <img
                class="logo-fold"
                src="assets/img/logo-rs-kecil.png"
                alt="Logo"
                style="max-width: 60px"
              />
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
                <a
                  href="javascript:void(0);"
                  data-toggle="modal"
                  data-target="#search-drawer"
                >
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
                  <div
                    class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center"
                  >
                    <p class="text-dark font-weight-semibold m-b-0">
                      <i class="anticon anticon-bell"></i>
                      <span class="m-l-10">Notification</span>
                    </p>
                    <a
                      class="btn-sm btn-default btn"
                      href="javascript:void(0);"
                    >
                      <small>View All</small>
                    </a>
                  </div>
                  <div class="relative">
                    <div
                      class="overflow-y-auto relative scrollable"
                      style="max-height: 300px"
                    >
                      <a
                        href="javascript:void(0);"
                        class="dropdown-item d-block p-15 border-bottom"
                      >
                        <div class="d-flex">
                          <div class="avatar avatar-blue avatar-icon">
                            <i class="anticon anticon-mail"></i>
                          </div>
                          <div class="m-l-15">
                            <p class="m-b-0 text-dark">
                              You received a new message
                            </p>
                            <p class="m-b-0"><small>8 min ago</small></p>
                          </div>
                        </div>
                      </a>
                      <a
                        href="javascript:void(0);"
                        class="dropdown-item d-block p-15 border-bottom"
                      >
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
                      <a
                        href="javascript:void(0);"
                        class="dropdown-item d-block p-15 border-bottom"
                      >
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
                      <a
                        href="javascript:void(0);"
                        class="dropdown-item d-block p-15"
                      >
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
                  <div class="avatar avatar-image m-h-10 m-r-15">
                    <img src="assets/images/avatars/thumb-3.jpg" alt="" />
                  </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                  <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                    <div class="d-flex m-r-50">
                      <div class="avatar avatar-lg avatar-image">
                        <img src="assets/images/avatars/thumb-3.jpg" alt="" />
                      </div>
                      <div class="m-l-10">
                        <p class="m-b-0 text-dark font-weight-semibold">
                          <?php echo $username; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                  <a href="gtw.php" class="dropdown-item d-block p-h-15 p-v-10">
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <div>
                        <i
                          class="anticon opacity-04 font-size-16 anticon-user"
                        ></i>
                        <span class="m-l-10">Edit Profile</span>
                      </div>
                      <i class="anticon font-size-10 anticon-right"></i>
                    </div>
                  </a>
                  <a
                    href="/auth/user/setting.php"
                    class="dropdown-item d-block p-h-15 p-v-10"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <div>
                        <i
                          class="anticon opacity-04 font-size-16 anticon-lock"
                        ></i>
                        <span class="m-l-10">Ganti Password</span>
                      </div>
                      <i class="anticon font-size-10 anticon-right"></i>
                    </div>
                  </a>
                  <a
                    href="loqout.php"
                    class="dropdown-item d-block p-h-15 p-v-10"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <div>
                        <i
                          class="anticon opacity-04 font-size-16 anticon-logout"
                        ></i>
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
                  <li>
                    <a href="index.html">Default</a>
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
                  <li class="active">
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
            <div class="page-header">
              <h2 class="header-title">Invoice </h2>
              <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="home.php" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="riwayat-transaksi.php">Riwayat</a>
                    <a class="breadcrumb-item" href="riwayat-transaksi.php">Transaksi</a>
                    <span class="breadcrumb-item active">Invoice</span>
                </nav>
              </div>
            </div>
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <div id="invoice" class="p-h-30">
                    <?php
                      $result = $conn -> query("SELECT * FROM reservasi JOIN transaksi ON reservasi.reservasi_id = transaksi.reservasi_id WHERE transaksi_id = '$transaksi_id';");
                      if (mysqli_num_rows($result) > 0) {

                      $i=0;
                      while($row = mysqli_fetch_assoc($result)) {
                        $biaya = intval($row["total_bayar"]);
                    ?>
                    <div class="m-t-15 lh-2">
                      <div class="inline-block">
                        <address class="p-l-10">
                          <span class="font-weight-semibold text-dark">
                            RSUD Jombang
                          </span>
                          <br />
                          <span>Jl. KH. Wahid Hasyim No.52, Kepanjen</span><br />
                          <span>Kec. Jombang, Kab. Jombang 61416</span><br />
                          <abbr class="text-dark" title="Phone">Telepon:</abbr>
                          <span>(0321) 863502</span>
                        </address>
                      </div>
                      <div class="float-right">
                        <h2>INVOICE</h2>
                      </div>
                    </div>
                    <div class="row m-t-20 lh-2">
                      <div class="col-sm-9">
                        <h3 class="p-l-10 m-t-10">Invoice Untuk:</h3>
                        <address class="p-l-10 m-t-10">
                          <span class="font-weight-semibold text-dark">
                            <?php echo $_SESSION['nama_lengkap']; ?>
                          </span>
                          <br />
                          <span><?php echo $_SESSION['email']; ?></span>
                        </address>
                      </div>
                      <div class="col-sm-3">
                        <div class="m-t-80">
                          <div class="text-dark text-uppercase d-inline-block">
                            <span class="font-weight-semibold text-dark"
                              >No Invoice:</span
                            >
                          </div>
                          <div class="float-right">#<?php echo $row['no_invoice']?></div>
                        </div>
                        <div class="text-dark text-uppercase d-inline-block">
                          <span class="font-weight-semibold text-dark"
                            >Date :</span
                          >
                        </div>
                        <div class="float-right"><?php echo $row['tgl_bayar']?></div>
                      </div>
                    </div>
                    <div class="m-t-20">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Items</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if($row['keterangan'] == "Sesi Konsultasi"){
                              ?>
                              <tr>
                                <th>1</th>
                                <td>Sesi Konsultasi</td>
                                <td>1</td>
                                <td><?php echo $biaya; ?></td>
                                <td><?php echo $biaya; ?></td>
                              </tr>
                              <?php
                            }elseif($row['keterangan'] == "Penebusan Obat"){
                              ?>
                              <?php
                                $hargaobat = $conn -> query("SELECT * FROM resep_obat JOIN obat ON resep_obat.obat_id = obat.obat_id WHERE transaksi_id = '$transaksi_id';");
                                if (mysqli_num_rows($hargaobat) > 0) {

                                $i=1;
                                while($rowobat = mysqli_fetch_assoc($hargaobat)) {
                                  $banyak_dibeli = intval($rowobat["qty_beli"]);
                                  $harga_satuan = intval($rowobat["harga_obat"]);
                              ?>
                                <tr>
                                  <th><?php echo $i++; ?></th>
                                  <td><?php echo $rowobat["nama_obat"]; ?></td>
                                  <td><?php echo $banyak_dibeli; ?></td>
                                  <td><?php echo $harga_satuan; ?></td>
                                  <td><?php $total_satuan = $banyak_dibeli*$harga_satuan;
                                  echo $total_satuan; ?>
                                  </td>
                                </tr>
                              <?php
                              }}}
                              ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="row m-t-30 lh-1-8">
                        <div class="col-sm-12">
                          <div class="float-right text-right">
                            <p>Sub - Total harga: Rp <?php echo $biaya; ?></p>
                            <p>Biaya Pengiriman : Rp 15000</p>
                            <hr />
                            <h3>
                              <span class="font-weight-semibold text-dark">
                                Total : Rp
                              </span>
                              <?php echo $biaya; ?>
                            </h3>
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-30 lh-2">
                        <div class="col-sm-12">
                          <div class="border-bottom p-v-20">
                            <p class="text-opacity">
                              <small>
                                In exceptional circumstances, Financial
                                Services can provide an urgent manually
                                processed special cheque. Note, however, that
                                urgent special cheques should be requested only
                                on an emergency basis as manually produced
                                cheques involve duplication of effort and
                                considerable staff resources. Requests need to
                                be supported by a letter explaining the
                                circumstances to justify the special cheque
                                payment.
                              </small>
                            </p>
                            <a class="btn btn-light" role="button" onclick="window.print()">Print</a>
                          </div>
                        </div>
                      </div>
                      <div class="row m-v-20">
                        <div class="col-sm-6">
                          <img
                            class="img-fluid text-opacity m-t-5"
                            src="assets/img/logo-rs.png"
                            style="max-height: 50px;"
                          />
                        </div>
                        <div class="col-sm-6 text-right">
                          <small>
                            <span class="font-weight-semibold text-dark">Phone:</span>
                            (0321) 863502
                          </small>
                          <br />
                          <small>https://rsudjombang.jombangkab.go.id/</small>
                        </div>
                      </div>
                    </div>
                    <?php
                      $i++;
                          }}
                      else{
                      echo "No result found";
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Content Wrapper END -->

          <!-- Footer START -->
          <footer class="footer">
            <div class="footer-content">
              <p class="m-b-0">
                Copyright © 2019 Theme_Nate. All rights reserved.
              </p>
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
              <div
                class="modal-header justify-content-between align-items-center"
              >
                <h5 class="modal-title">Search</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <i class="anticon anticon-close"></i>
                </button>
              </div>
              <div class="modal-body scrollable">
                <div class="input-affix">
                  <i class="prefix-icon anticon anticon-search"></i>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search"
                  />
                </div>
                <div class="m-t-30">
                  <h5 class="m-b-20">Files</h5>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-cyan avatar-icon">
                      <i class="anticon anticon-file-excel"></i>
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >Quater Report.exl</a
                      >
                      <p class="m-b-0 text-muted font-size-13">by Finance</p>
                    </div>
                  </div>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-blue avatar-icon">
                      <i class="anticon anticon-file-word"></i>
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >Documentaion.docx</a
                      >
                      <p class="m-b-0 text-muted font-size-13">by Developers</p>
                    </div>
                  </div>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-purple avatar-icon">
                      <i class="anticon anticon-file-text"></i>
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >Recipe.txt</a
                      >
                      <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                    </div>
                  </div>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-red avatar-icon">
                      <i class="anticon anticon-file-pdf"></i>
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >Project Requirement.pdf</a
                      >
                      <p class="m-b-0 text-muted font-size-13">
                        by Project Manager
                      </p>
                    </div>
                  </div>
                </div>
                <div class="m-t-30">
                  <h5 class="m-b-20">Members</h5>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-image">
                      <img src="assets/images/avatars/thumb-1.jpg" alt="" />
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >Erin Gonzales</a
                      >
                      <p class="m-b-0 text-muted font-size-13">
                        UI/UX Designer
                      </p>
                    </div>
                  </div>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-image">
                      <img src="assets/images/avatars/thumb-2.jpg" alt="" />
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >Darryl Day</a
                      >
                      <p class="m-b-0 text-muted font-size-13">
                        Software Engineer
                      </p>
                    </div>
                  </div>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-image">
                      <img src="assets/images/avatars/thumb-3.jpg" alt="" />
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >Marshall Nichols</a
                      >
                      <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                    </div>
                  </div>
                </div>
                <div class="m-t-30">
                  <h5 class="m-b-20">News</h5>
                  <div class="d-flex m-b-30">
                    <div class="avatar avatar-image">
                      <img src="assets/images/others/img-1.jpg" alt="" />
                    </div>
                    <div class="m-l-15">
                      <a
                        href="javascript:void(0);"
                        class="text-dark m-b-0 font-weight-semibold"
                        >5 Best Handwriting Fonts</a
                      >
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
              <div
                class="modal-header justify-content-between align-items-center"
              >
                <h5 class="modal-title">Theme Config</h5>
              </div>
              <div class="modal-body scrollable">
                <div class="m-b-30">
                  <h5 class="m-b-0">Header Color</h5>
                  <p>Config header background color</p>
                  <div class="theme-configurator d-flex m-t-10">
                    <div class="radio">
                      <input
                        id="header-default"
                        name="header-theme"
                        type="radio"
                        checked
                        value="default"
                      />
                      <label for="header-default"></label>
                    </div>
                    <div class="radio">
                      <input
                        id="header-primary"
                        name="header-theme"
                        type="radio"
                        value="primary"
                      />
                      <label for="header-primary"></label>
                    </div>
                    <div class="radio">
                      <input
                        id="header-success"
                        name="header-theme"
                        type="radio"
                        value="success"
                      />
                      <label for="header-success"></label>
                    </div>
                    <div class="radio">
                      <input
                        id="header-secondary"
                        name="header-theme"
                        type="radio"
                        value="secondary"
                      />
                      <label for="header-secondary"></label>
                    </div>
                    <div class="radio">
                      <input
                        id="header-danger"
                        name="header-theme"
                        type="radio"
                        value="danger"
                      />
                      <label for="header-danger"></label>
                    </div>
                  </div>
                </div>
                <hr />
                <div>
                  <h5 class="m-b-0">Side Nav Dark</h5>
                  <p>Change Side Nav to dark</p>
                  <div class="switch d-inline">
                    <input
                      type="checkbox"
                      name="side-nav-theme-toogle"
                      id="side-nav-theme-toogle"
                    />
                    <label for="side-nav-theme-toogle"></label>
                  </div>
                </div>
                <hr />
                <div>
                  <h5 class="m-b-0">Folded Menu</h5>
                  <p>Toggle Folded Menu</p>
                  <div class="switch d-inline">
                    <input
                      type="checkbox"
                      name="side-nav-fold-toogle"
                      id="side-nav-fold-toogle"
                    />
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

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>
  </body>
</html>