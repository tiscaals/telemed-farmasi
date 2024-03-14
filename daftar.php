<?php
session_start();
include 'koneksi.php';

    if (isset($_POST['daftar'])) {
        $error_log = '';
        $error_type = 'danger';
        $namaLengkap = $_POST['nama_lengkap'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_POST['email'];
        $token=md5(rand()) ;
        
        // pick data user
        $registered = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
        $cek = mysqli_num_rows($registered);
        //pick email user
        $cekemail = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
        $cekk = mysqli_num_rows($cekemail);

        //ngecek misal username udah pernah daftar
        if ($cek > 0) {
            $error_log = '*Username Sudah Terdaftar!!';
        } else{
          // cek email user database
            if ($cekk > 0) {
            $error_log = '*Email Sudah Terdaftar!!';
            } else if (empty($email)){
            $error_log = '*Email Wajib Diisi.';

            }
            if (empty($namaLengkap)) {
                $error_log = '*Tidak Boleh Kosong.';
        
            } if (empty($username)) {
                $error_log = '*Username Tidak Boleh Kosong.';
            
            if (empty($password)) {
                $error_log = '*Tidak Boleh Kosong.';
                    }
        
            }else if (strlen($password) < 6 ) {
                $error_log = '*Kata Sandi Minimal 6 Karakter.';
                
            } if (empty($confirmPassword)) {
                $error_log = '*Tidak Boleh Kosong.';
        
            }else if (strlen($confirmPassword) < 6 ) {
                $error_log = '*Kata Sandi Minimal 6 Karakter.';
            } else{
                
                if ($password == $confirmPassword){
                    $quer = "INSERT INTO user(username, password, nama_lengkap, email, token, status) VALUES('$username','$password','$namaLengkap', '$email', '$token', '0' );";
                    include ('mail.php');
                    $query= "INSERT INTO user_pasien(user_id, nama_lengkap) VALUES((SELECT user_id FROM user WHERE username = '$username'), '$namaLengkap');";
                    mysqli_query($conn, $quer);
                    mysqli_query($conn, $query);
                    $error_log = 'Pendaftaran Berhasil, Silahkan Cek Email Untuk Verifikasi!!';
                    $error_type = 'success';
                } else{
                    $error_log = 'Pendaftaran Gagal!!';
                }
        }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar - RSUD JOMBANG</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/imag/logo/RSUD2.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="../assets/css/app.min.css" rel="stylesheet">

</head>
<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('../assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="../assets/img/logo/logo-rs.png" style="max-height: 80px;">
                                    </div>
                                    <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    echo '<div class="alert alert-'.$error_type.'" role="alert">';
                                    echo $error_log;
                                    echo '</div>';
                                    }
                                    ?> 
                                    <form  method="post">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="nama_lengkap">Nama Lengkap :</label>
                                            <input type="text"  name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email :</label>
                                            <input type="email"  name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="username">Username :</label>
                                            <input type="text" name="username" class="form-control"  placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password :</label>
                                            <input type="password" name="password" class="form-control"  placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="confirmPassword">Confirm Password :</label>
                                            <input type="password" name="confirmPassword" class="form-control"  placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between p-t-5">
                                                <div class="checkbox">
                                                    <input id="checkbox" type="checkbox">
                                                    <label for="checkbox"><span>Saya menyetujui <a href="">Syarat & Kebijakan</a></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between p-t-15">
                                                <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Sudah punya akun? 
                                                    <a class="medium" href="index.php">Login</a>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2019 ThemeNate</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="../assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="../assets/js/app.min.js"></script>

</body>

</html>