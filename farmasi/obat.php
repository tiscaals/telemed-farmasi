<?php
session_start();
include '../koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['user_level_id'] == "3") {
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Obat</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/logo-rs-kecil.png">

    <!-- page css -->
    <link href="../assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Core css -->
    <link href="../assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="">
                        <img src="../assets/img/logo-rs.png" alt="Logo" style="max-height: 65px;">
                        <img class="logo-fold" src="../assets/img/logo-rs-kecil.png" alt="Logo" style="max-width: 60px; margin: auto;">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="">
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
                                <a href="/auth/user/setting.php" class="dropdown-item d-block p-h-15 p-v-10">
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
                                    <a href="farmasi.php">Default</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-notification"></i>
                                </span>
                                <span class="title">Notifikasi</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="tabel_pengiriman.php">Pengiriman Obat <span class="badge badge-pill badge-primary">Baru</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Master Data</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a href="obat.php">Obat</a>
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
                        <h2 class="header-title">Data Table</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="home.php" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="#">Notifikasi</a>
                                <span class="breadcrumb-item active">Pengiriman Obat</span>
                            </nav>
                        </div>
                    </div>
                    <?php
                    if(isset($_GET['pesan'])) {
                        $error_log = '';
                        $error_type = 'danger';
                        
                        if ($_GET['pesan'] == "berhasil") {
                            $error_log = 'Penambahan obat berhasil!';
                            $error_type = 'success';
                        }
                        if ($_GET['pesan'] == "obatexist") {
                            $error_log = 'Obat sudah terdaftar!';
                        }
                        if ($_GET['pesan'] == "kosong") {
                            $error_log = 'Data tidak boleh kosong!';
                        }
                        if ($_GET['pesan'] == "update") {
                            $error_log = 'Obat berhasil diupdate!';
                            $error_type = 'success';
                        }
                        echo '<div class="alert alert-'.$error_type.'" role="alert">';
                        echo $error_log;
                        echo '</div>';
                    }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4>Data Obat</h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahobat">
                                    + Tambahkan Obat
                                </button>
                            </div>
                            <!-- ADD Modal START -->
                            <div class="modal fade" id="tambahobat" role="dialog" aria-labelledby="tambahobatLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahobatLabel">Tambah obat</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="tambah_obat.php">
                                                <div class="form-group">
                                                    <label type="text" for="nama_obat">Nama Obat</label>
                                                    <input type="text" class="form-control" name="nama_obat" placeholder="Masukkan Nama Obat">
                                                </div>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis</label>
                                                    <select class="custom-select mr-sm-2" name="jenis_obat">
                                                        <option value="">Pilih Jenis Obat</option>
                                                        <?php
                                                        $jenisresult = $conn->query("SELECT jenis_obat FROM jenis_obat;");

                                                        if (mysqli_num_rows($jenisresult) > 0) {
                                                            $i = 0;
                                                            while ($rowjenis = mysqli_fetch_array($jenisresult)) {
                                                                echo "<option value=" . $rowjenis['jenis_obat'] . ">" . $rowjenis['jenis_obat'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label type="text" for="qty">Jumlah</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="jumlah_obat" placeholder="Masukkan Jumlah">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">pcs</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label type="text" for="harga">Harga</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Rp</div>
                                                        </div>
                                                        <input type="number" class="form-control" name="harga_obat" placeholder="Masukkan Harga">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="submit" name="submit">Add</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ADD Modal END -->
                            <div class="m-t-25">
                                <?php
                                $result = $conn->query("SELECT * FROM obat;");

                                if (mysqli_num_rows($result) > 0) {
                                ?>
                                    <table id="data-table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Id Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Qty</th>
                                                <th>Jenis</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id_obat = $row['obat_id'];
                                            ?>
                                                <tr id="<?php echo $id_obat; ?>">
                                                    <td><?php echo $id_obat; ?></td>
                                                    <td><?php echo $row["nama_obat"]; ?></td>
                                                    <td><?php echo $row["qty"]; ?></td>
                                                    <td><?php echo $row["jenis_obat"]; ?></td>
                                                    <td><?php echo $row["harga_obat"]; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $id_obat; ?>">
                                                            <i class="anticon anticon-edit"></i>
                                                        </button>

                                                        <!-- EDIT Modal START -->
                                                        <div class="modal fade" id="edit<?php echo $id_obat; ?>" role="dialog" aria-labelledby="tambahobatLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tambahobatLabel">Update obat</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <?php
                                                                    $edit = $conn->query("SELECT * FROM obat WHERE obat_id = '$id_obat'");
                                                                    $dataobat = mysqli_fetch_assoc($edit);
                                                                    ?>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="update_obat.php?id=<?php echo $id_obat; ?>">
                                                                            <div class="form-group">
                                                                                <label type="text" for="nama_obat">Nama Obat</label>
                                                                                <input type="text" class="form-control" name="nama_obat" placeholder="Masukkan Nama Obat" value="<?php echo $dataobat['nama_obat']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis</label>
                                                                                <select class="custom-select mr-sm-2" name="jenis_obat">
                                                                                    <option value="<?php echo $dataobat['jenis_obat']; ?>"><?php echo $dataobat['jenis_obat']; ?></option>
                                                                                    <?php
                                                                                    $jenisresult = $conn->query("SELECT jenis_obat FROM jenis_obat;");

                                                                                    if (mysqli_num_rows($jenisresult) > 0) {
                                                                                        $i = 0;
                                                                                        while ($rowjenis = mysqli_fetch_array($jenisresult)) {
                                                                                            echo "<option value=" . $rowjenis['jenis_obat'] . ">" . $rowjenis['jenis_obat'] . "</option>";
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="d-flex justify-content-between align-items-center">
                                                                                    <label type="text" for="qty">Tambah Stok</label>
                                                                                    <label type="text" for="qty">Jumlah Saat Ini: <?php echo $dataobat['qty']; ?> pcs</label>
                                                                                </div>
                                                                                <div class="input-group">
                                                                                    <input type="number" class="form-control" name="tambahan_obat" placeholder="Masukkan Jumlah">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">pcs</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label type="text" for="harga">Harga</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Rp</div>
                                                                                    </div>
                                                                                    <input type="number" class="form-control" name="harga_obat" placeholder="Masukkan Harga" value="<?php echo $dataobat['harga_obat']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-success" type="submit" name="submit">Save</button>
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- EDIT Modal END -->
                                                    </td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                    echo "No result found";
                                }
                                ?>
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
    <script src="../assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="../assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/pages/datatables.js"></script>

    <!-- Core JS -->
    <script src="../assets/js/app.min.js"></script>

</body>

</html>