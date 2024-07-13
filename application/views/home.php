<?php
  include "header.php";
?>
<body>
  <main id="main">
    <!-- ======= About Lists Section ======= -->
    <section id="situasi" class="about-lists">
      <div class="container">
        <?php include "kop.php";?>
        <div class="row contact">
          <!-- <video controls autoplay name="media"><source src="<?php //echo base_url()?>assets/1.mkv" type="application/ogg"></video> -->
          <div class="col-lg-12 col-md-12 content-item" data-aos="fade-up">
            <span class="alert alert-success text-center" style="color: black;">Login untuk memulai ujian</span>
            <br>
            <div class="row">
              <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                <form action="<?php echo base_url().'cat/cek_peserta';?>" method="post" role="form" class="php-email-form">
                  <div class="form-row">
                    <div class="col-lg-6 form-group">
                      <input type="number" name="no_ujian" class="form-control" id="no_ujian" placeholder="Nomor Ujian" data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="off" />
                      <div class="validate"></div>
                    </div>
                    <div class="col-lg-6 form-group">
                      <input type="number" class="form-control" name="pin_sesi" id="hp" placeholder="PIN Sesi" data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="off" />
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Anda terdaftar! Mohon Tunggu</div>
                  </div>
                  <div class="text-center"><button type="submit">Login</button></div>
                </form>
              </div>

            </div>
          </div>
        <div class="col-lg-12 col-md-12 content-item" data-aos="fade-up" data-aos-delay="300">
          <h4>KETERANGAN :</h4>
          <p>
            <ul>
              <!-- <li>Email adalah : Nomor Ujian yang anda daftarkan saat mengisi formulir</li> -->
              <li>PIN Sesi adalah PIN sesi yang ada pada jadwal ujian</li>
              <li>Tidak diperkenankan lagi ujian jika terlambat lebih 10 menit</li>
            </ul>
          </p>
          
        </div>

      </div>

    </div>
      
  </section><!-- End About Lists Section -->

  </main><!-- End #main -->

  <?php include "footer.php";?>