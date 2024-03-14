<?php
    session_start();
    include '../koneksi.php';
    // cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['user_level_id']=="1"){
        $username = $_SESSION['username'];
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
    <link href="assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <?php require('1_header.php'); ?>
			<?php require('3_admin_sidebar.php'); ?>
            <!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Data Table</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="#">Master Data</a>
                                <span class="breadcrumb-item active">Jadwal Reservasi</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4>Jadwal Reservasi</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas accumsan lacus vel facilisis volutpat est velit. Arcu odio ut sem nulla pharetra diam sit amet nisl. In fermentum et sollicitudin ac orci phasellus. Viverra accumsan in nisl nisi scelerisque eu. Urna molestie at elementum eu facilisis sed. Tempus egestas sed sed risus. Vel facilisis volutpat est velit egestas. Consectetur adipiscing elit ut aliquam purus sit amet. Sit amet nisl suscipit adipiscing bibendum est. Ut ornare lectus sit amet. Nunc id cursus metus aliquam eleifend mi in nulla posuere. Ante in nibh mauris cursus mattis molestie a iaculis at. Consequat mauris nunc congue nisi vitae suscipit tellus. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi.</p>
                            <div class="m-t-25">
                                <?php
                                    $result = $conn ->
                                    query("SELECT * FROM reservasi AS r
                                            LEFT JOIN user AS u ON r.user_id = u.user_id
                                            -- LEFT JOIN user_dokter AS u_d ON r.user_id = u.user_id
                                            LEFT JOIN poli as p ON r.poli_id = p.poli_id");

                                    if (mysqli_num_rows($result) > 0) {
                                ?>
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Reservasi</th>
                                            <th>Nama Pasien</th>
                                            <th>Nama Poli</th>
                                            <th>Status Reservasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            while($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr id="<?php echo $row['user_id'];?>">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row["tgl_reservasi"]; ?></td>
                                            <td><?php echo $row["nama_lengkap"]; ?></td>
                                            <td><?php echo $row["nama_poli"]; ?></td>
                                            <td><?php echo $row["status_reservasi"]; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#hasilkonsul<?php echo $row['user_id'];?>">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <a href='delete_Reservasi.php?id=<?php echo $row['user_id'];?>'>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="anticon anticon-delete"></i>
                                                    </button>
                                                </a>

                                                <!-- Edit Modal START -->
                                                <div class="modal fade" id="hasilkonsul<?php echo $row['user_id'];?>" role="dialog" aria-labelledby="hasilkonsulLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hasilkonsulLabel">Edit Reservasi</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="update_reservasi.php?id=<?php echo $row['reservasi_id']; ?>">
                                                                    <div class="form-group">
                                                                        <label for="formGroupExampleInput">Status Reservasi:</label>
                                                                        <input type="text" class="form-control" value="<?php echo $row['status_reservasi']; ?>" name="status_reservasi">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-success" type="submit" name="submit">Edit</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Edit Modal END -->
                                            </td>
                                        </tr>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                    }
                                    else{
                                    echo "No result found";
                                    }
                                ?>
                            <button onclick="window.print()" type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" "="" aria-hidden="true"></i>Generate PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->
                <?php require('2_footer.php'); ?>
            </div>
            <!-- Page Container END -->
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