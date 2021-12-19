<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Expert System-<?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href=<?php echo base_url("assets/template/img/favicon.png") ?> rel="icon">
    <link href=<?php echo base_url("assets/template/img/apple-touch-icon.png") ?> rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href=<?php echo base_url("assets/template/vendor/aos/aos.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/template/vendor/bootstrap/css/bootstrap.min.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/template/vendor/bootstrap-icons/bootstrap-icons.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/template/vendor/boxicons/css/boxicons.min.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/template/vendor/glightbox/css/glightbox.min.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/template/vendor/swiper/swiper-bundle.min.css") ?> rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href=<?php echo base_url("assets/template/css/style.css") ?> rel="stylesheet">

    <link href="<?php echo base_url('assets/template/css/bootstrap-responsive.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/template/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- =======================================================
  * Template Name: Techie - v4.6.0
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="#">Expert <br>System</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Data Penyakit</a></li>
                    <li><a class="nav-link scrollto" href="#services">Data Gejala</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Basis Aturan</a></li>
                    <li><a class="nav-link scrollto" href="#team">Laporan</a></li>
                    <li><a class="getstarted scrollto" href="<?= base_url('auth/proses_login') ?>">Login</a></li>
                </ul>
                <i class=" bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <?php echo $contents; ?>
    <!-- ======= Footer ======= -->
    <footer id="footer">



        <div class="container">

            <div class="copyright-wrap d-md-flex py-4">
                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Techie</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets/template/vendor/aos/aos.js') ?>"></script>
    <script src="<?php echo base_url('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/template/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/template/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/template/vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?php echo base_url('assets/template/vendor/purecounter/purecounter.js') ?>"></script>
    <script src="<?php echo base_url('assets/template/vendor/swiper/swiper-bundle.min.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets/template/js/main.js') ?>"></script>

</body>

</html>