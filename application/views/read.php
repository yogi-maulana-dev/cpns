<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $read[0]->judul;?></title>
  <meta content="covid19" name="descriptison">
  <meta content="covid19" name="keywords">
  <meta name="description" content='<?php if(isset($read)){ echo @$read[0]->judul; }?>'>
  <meta name="author" content="pakpakbharatkab.go.id">
  <!-- Shareable -->
  <meta property="og:title" content='<?php if(isset($read)){ echo @$read[0]->judul; }?>' />
  <meta property="og:type" content="berita" />
  <meta property="og:url" content="<?php if(isset($read)){ echo base_url().'read/'.@$read[0]->id.'/'.@$read[0]->url; }?>" />
  <meta property="og:image" content="<?php if(isset($read)){ echo base_url().'assets/img/news/'.$read[0]->foto; }?>" />

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

  <!-- SharJs -->
  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e780dcdb3d64c0013a84dfc&product=inline-share-buttons&cms=sop' async='async'></script>

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
  <main id="main">
    <!-- ======= About Lists Section ======= -->
    <section class="about">
      <div class="container">
          <div class="col-lg-12 col-md-12 content-item" data-aos="fade-up" data-aos-delay="300">
            <div>
              <br>
              <h4><?php echo $read[0]->judul;?></h4>
              <img src="<?php echo base_url().'assets/img/news/'.$read[0]->foto;?>" class="img img-fluid" width="600">
            </div>
            <br>
            <small>By: Admin <?php echo date('d/m/Y',strtotime($read[0]->tanggal));?></small>
            <!-- <div class="sharethis-inline-share-buttons"></div> -->
            <p>
              <?php echo nl2br($read[0]->isi);?>
            </p>
          </div>

        </div>

      </div>
    </section><!-- End About Lists Section -->
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