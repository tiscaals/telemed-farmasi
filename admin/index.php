<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Rumah Sakit</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/logo-rs-kecil.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="text-center align-items-center m-b-30">
                                        <img  src="../assets/img/logo-rs.png" class="img-fluid" alt="" style="max-width: 250px;">
                                    </div>
                                    <form action="proses_login.php" method="POST" class="form-signin">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="username">Username:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <a class="font-size-12 text-muted font-italic text-right" href="reset.php">Lupa Password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" style="width: 100%;">Login</button>
                                        </div>
                                        <div class="form-group text-center">atau</div>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <a href="google.php" class="btn btn-danger" style="width: 100%;"><i class="anticon anticon-google"></i> Lanjutkan dengan Google</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <span class="font-size-13 text-muted">
                                                    Belum Memiliki Account? 
                                                    <a class="medium" href="daftar.php"> Daftar</a>
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
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>