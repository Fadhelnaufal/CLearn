<!DOCTYPE html>
<html lang="en">

<head>
    <title>CLearn Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/animate.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/aos.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/ionicons.min.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/icomoon.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/css/style.css">
    <link rel="shortcut icon" href="<?=base_url()?>assets/clearn/icon_clearn.png" type="image/x-icon">
    <link rel="icon" href="<?=base_url()?>assets/clearn/icon_clearn.png" type="image/x-icon">
</head>

<body>
    <section id="daftar-section" class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" style="background-color: #E8DB84">
                <img src="<?=base_url()?>assets/clearn/auth_obj.svg" class="w-60 mt-5" alt="" style="position:relative">
                </div>
            <div class="col-md-6 px-lg-8 px-sm-2" style="background-color: #f8f9fa">
                <a class="float-right" href="<?=base_url()?>">
                    <img src="<?=base_url()?>assets/clearn/logo_clearn.svg" alt="" class="logo" srcset="">
                </a>
                <h3 class="mt-5  font-weight-bold text-dark text-center"><span>REGISTER</span> </h3>
                <h5 class="mb-5 small text-center">We Suggest using the email address you use at work</h5>
                
                <div class="fw-bold text-danger small"><?php echo validation_errors(); ?></div>
                <form role="form" method="POST" class="mb-5" action="<?= base_url('auth/daftar') ?>">
                    <div class="">
                        <label class="small  font-weight-bold">Nama Lengkap</label>
                        <div class="mb-3">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama"
                                aria-describedby="username-addon" required>
                        </div>
                        <label class="small  font-weight-bold">Email Kamu</label>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Masukkan alamat e-mail"
                                aria-label="username" aria-describedby="username-addon" required>
                        </div>
                        <label class="small  font-weight-bold">Nomor Telepon Kamu</label>
                        <div class="mb-3">
                            <input type="tel" name="telp" class="form-control" placeholder="Masukkan Nomor Telp"
                                aria-label="username" aria-describedby="username-addon" required>
                        </div>
                        <label class="small  font-weight-bold">Buat Password</label>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                aria-label="Buat Password" aria-describedby="password-addon" required
                                autocomplete="off">
                        </div>
                        <label class="small  font-weight-bold">Konfirmasi Password</label>
                        <div class="mb-3">
                            <input type="password" name='passconf' class="form-control"
                                placeholder="Konfirmasi Password" aria-describedby="password-addon" required
                                autocomplete="off">
                        </div>
                        <label class="small  font-weight-bold">Daftar Sebagai</label>
                        <div class="mb-5 row">
                            <div class="form-check btn btn-info py-2 px-5 mr-3">
                                <input class="form-check-input" type="radio" name="userRole" id="flexRadioDefault2"
                                    value="2" required>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Siswa
                                </label>
                            </div>
                            <div class="form-check btn btn-info py-2 px-5 mr-3">
                                <input class="form-check-input" type="radio" name="userRole" id="flexRadioDefault1"
                                    value="1" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Guru
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="align-content-center mt-5 d-md-block">
                        <input type="submit" class="btn btn-info py-3 px-5 mr-3" value="Daftar Sekarang">
                    </div>
                </form>
                <h6 class="small text-secondary my-5 text-center">Sudah memiliki akun? <a href="<?=base_url()?>auth/login"
                    class="text-info font-weight-bold">Login</a>
                </h6>
                </div>
                

        </div>
        </div>
    </section>




    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="<?=base_url()?>assets/landing/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/jquery.easing.1.3.js"></script>
    <script src="<?=base_url()?>assets/landing/js/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/jquery.stellar.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/aos.js"></script>
    <script src="<?=base_url()?>assets/landing/js/jquery.animateNumber.min.js"></script>
    <script src="<?=base_url()?>assets/landing/js/scrollax.min.js"></script>

    <script src="<?=base_url()?>assets/landing/js/main.js"></script>

</body>

</html>