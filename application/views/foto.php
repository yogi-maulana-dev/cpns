<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Foto Gugus Tugas Percepatan Penanganan COVID-19</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/logo.jpg" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v2.0.1
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.html"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.jpg" alt="" class="img-fluid"></a><span style="color: black"></span></a></h1>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?php echo base_url()?>">Beranda</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <section id="portfolio" class="portfolio section-bg">
      <div class="section-title">
          <h2>Foto</h2>
        </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
        <?php
            foreach($foto as $img){
        ?>
          <div class="col-lg-4 col-md-6">
            <div style="padding: 5px;">
                <div style="min-width:100px;max-width:1000px;min-height: 100px;height: 300px; background-image: url('<?php echo base_url();?>assets/uploads/<?php echo $img->media;?>');background-size: cover;">
                  
                </div>
              <p><?php echo substr($img->deskripsi, 0,100);?>... <a href="<?php echo base_url().'album?id='.$img->id;?>">Selengkapnya</a></p>
            </div>
          </div>
        <?php } ?>
        </div>
        <?php 
          if($prev >= 0){
        ?>
          <a href="<?php echo base_url().'berita?start='.$prev;?>">Prev</a>
        <?php } ?>
        <?php 
          if($row > $next){
        ?>
          <div class="text-right"><a href="<?php echo base_url().'foto?start='.$next;?>">Next</a>
        <?php } ?>
      </div>
    </section><!-- End Our Portfolio Section -->
  </main><!-- End #main -->

  <?php include "footer.php";?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>

</html>