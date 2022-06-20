<?php session_start();
require '../../config/filterLogin.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Learning - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .regis-img {
            background-image: url('../../assets/admin/img/regis-img.jpg');
            background-size: cover;
            background-position: center;
        }

        .card-regis {
            margin-top: 10%;
        }

        @media only screen and (max-width: 576px) {
            .card-regis {
                margin-top: 25%;
            }
        }

        #cpassword-error,
        #nama-error,
        #username-error,
        #password-error {
            font-size: 12px;
            color: red;

        }

        .error {
            width: 100% !important;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg card-regis">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block regis-img"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                <?php if (isset($_GET['message'])) {
                                    $pesan = '<div class="alert alert-' . $_GET['alert'] . '" role="alert">' .
                                        $_GET['message'] . '
                                            </div>';
                                    echo $pesan;
                                } ?>
                            </div>
                            <form class="user formRegis" action="../../controllers/auth/Register.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukkan nama lengkap..." required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan username..." required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required minlength="5">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="cpassword" placeholder="Repeat Password" name="cpassword" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a> -->
                                <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <!-- <hr> -->
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="./login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/admin/js/sb-admin-2.min.js"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

    <script>
        $(document).ready(function() {
            $(".formRegis").validate({
                rules: {
                    nama: 'required',
                    username: 'required',
                    password: {
                        required: true,
                        minlenght: 5
                    },

                    cpassword: {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {
                    nama: 'Nama harus diisi.',
                    username: 'Username harus diisi.',
                    password: {
                        required: 'Password harus diisi.',
                        minlenght: 'Minimal 5 huruf'
                    },
                    cpassword: {
                        required: 'Password harus diisi.',
                        equalTo: 'Confirm Password tidak sama.'
                    },
                }
            });
        });
    </script>

</body>

</html>