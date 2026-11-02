<!DOCTYPE html>
<html lang="en">

<head>
    <title>CLearn Login</title>
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

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    
    <section id="login-section" class="login">
        <div class="container-fluid">
            <div class="row">
             <div class="col-md-6" style="background-color: #E8DB84">
                <img src="<?=base_url()?>assets/clearn/auth_obj.svg" class="w-60 mt-5" alt="" style="position:relative">

            </div>
            <div class="col-md-6 px-lg-8 px-sm-2" style="background-color: #f8f9fa">
                <a class="float-right" href="<?=base_url()?>">
                    <img src="<?=base_url()?>assets/clearn/logo_clearn.svg" alt="" class="logo" srcset="">
                </a>
                <h3 class="mt-5  font-weight-bold text-dark text-center"><span>LOGIN</span> </h3>
                <h5 class="mb-5 small text-center">We Suggest using the email address you use at work</h5>
                
                <form  role="form" method="POST" action="<?= base_url('auth/login/') ?>">
                    <label class="text-dark">Email addres</label>
                    <div class=" mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>
                    <label class="text-dark">Password</label>
                    <div class="mb-2">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password"
                            aria-label="Password" aria-describedby="password-addon" required>
                    </div>

                    <div class="btn-block d-grip gap-2">
                        <input type="submit" class="btn btn-info py-3 mt-3 mb-5" value="Login">
                    </div>
                </form>
                <h6 class="small text-secondary mt-5">Belum memiliki akun? <a href="<?=base_url()?>auth/daftar"
                    class="text-info font-weight-bold">Daftar</a>
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