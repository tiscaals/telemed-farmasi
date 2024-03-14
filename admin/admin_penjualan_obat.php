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
                                <a class="breadcrumb-item" href="#">Report</a>
                                <span class="breadcrumb-item active">Penjualan Obat</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="overlay">
                            </div>
                            <h4>Penjualan Obat</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas accumsan lacus vel facilisis volutpat est velit. Arcu odio ut sem nulla pharetra diam sit amet nisl. In fermentum et sollicitudin ac orci phasellus. Viverra accumsan in nisl nisi scelerisque eu. Urna molestie at elementum eu facilisis sed. Tempus egestas sed sed risus. Vel facilisis volutpat est velit egestas. Consectetur adipiscing elit ut aliquam purus sit amet. Sit amet nisl suscipit adipiscing bibendum est. Ut ornare lectus sit amet. Nunc id cursus metus aliquam eleifend mi in nulla posuere. Ante in nibh mauris cursus mattis molestie a iaculis at. Consequat mauris nunc congue nisi vitae suscipit tellus. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi.</p>
                            <div class="m-t-25">
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Reservasi</th>
                                            <th>ID Resep Obat</th>
                                            <th>Nama Pasien</th>
                                            <th>Nama Poli</th>
                                            <th>ID Transaksi</th>
                                            <th>Tanggal Reservasi</th>
                                            <th>Status Reservasi</th>
                                            <th>Tiket Konsultasi</th>
                                            <th>Hasil Konsultasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include('../koneksi.php');
                                            $sql = "SELECT * FROM resep_obat";
                                            // -- AS r LEFT JOIN user AS u ON r.user_id = u.user_id LEFT JOIN poli as p ON r.poli_id = p.poli_id";
                                            $num = 0;
                                            $result = $conn->query($sql);
                                            
                                            if (isset($_POST['delete'])) {

                                                echo $did = $_POST['reservasi_id'];
                                                $query = $link->prepare( "DELETE FROM reservasi WHERE reservasi_id=?" );
                                                $query->bind_param( "s", $did );
                                                $query->execute();
                                            }

                                            if ($result->num_rows > 0) {
                                            // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $num = $num + 1;                                                    					
                                                    echo "<tr><td>" .$num.
                                                        "</td><td>" .$row["reservasi_id"].
                                                        "</td><td>" . $row["resep_obat_id"] .
                                                        "</td><td>". $row["nama_lengkap"] .
                                                        "</td><td>". $row["nama_poli"].
                                                        "</td><td>" . $row["transaksi_id"] .
                                                        "</td><td>" . $row["tgl_reservasi"] .
                                                        "</td><td>". $row["status_reservasi"].
                                                        "</td><td>" . $row["tiket_konsultasi"] .
                                                        "</td><td>" . $row["hasil_konsultasi"] .
                                                        "</td><td>";
                                                    echo "<button class='btn btn-icon btn-primary'>
                                                            <i class='anticon anticon-plus'></i></button>";
                                                    echo "<a href='admin_edit.php?id=".$row['reservasi_id']."'>
                                                            <button class='btn btn-icon btn-success'>
                                                            <i class='anticon anticon-edit'></i></button></a>";
                                                    echo "<a href='delete.php?id=".$row['reservasi_id']."'>
                                                            <button class='btn btn-icon btn-danger'>
                                                            <i class='anticon anticon-delete'></i></button></a>
                                                            </td><tr>";
                                                }
                                            } else { echo "0 results"; }
                                            $conn->close();
                                        ?>
                                    </tbody>
                                </table>
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