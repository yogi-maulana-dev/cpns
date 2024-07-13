<?php
  include "header.php";
?>
<body>
  <main id="main">
    <!-- ======= About Lists Section ======= -->
    <section id="situasi" class="about-lists">
      <div class="container">
        <?php include "kop.php";?>
        <div class="row">
          <!-- <video controls autoplay name="media"><source src="<?php //echo base_url()?>assets/1.mkv" type="application/ogg"></video> -->
          <div class="col-lg-12 col-md-12 content-item" data-aos="fade-up">
            <span class="alert alert-success text-center" style="color: black;">LIVE SCORE <nama id="nama_ujian"></nama></span>
              <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300" id="t4_form">
                  <div class="row justify-content-center">
                    <div class="col-lg-6 form-group">
                      <input type="number" class="form-control" name="pin" id="pin" placeholder="PIN Sesi" data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="off" />
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="mb-3" id="t4_alert">
                  </div>
                  <div class="text-center"><button type="button" onclick="load_live()" class="btn btn-flat btn-md btn-primary">Tampilkan</button></div>
              </div>
              <div id="t4_live"></div>
              <div class="col-lg-12 col-md-12 text-center" data-aos="fade-up" data-aos-delay="300">
                <br>
                <br>
                <h3>KETERANGAN :</h3>
                <p style="color: black;">
                  PIN Sesi adalah : PIN Ujian yang sedang berlangsung
                </p>
                
              </div>
          </div>

      </div>

    </div>
      
  </section><!-- End About Lists Section -->

  </main><!-- End #main -->

  <?php include "footer.php";?>

  <script type="text/javascript">

    function load_live(){
      var pin = $("#pin").val();

      if(pin==""){
        return false;
      }
      else{
        $("#t4_alert").html("");

        $.ajax({
          url:'<?php echo base_url("cat/cek_pin/")?>'+pin,
          type:'get',
          success:function(e){
            if(e==1){
              $("#t4_alert").html('<div class="text-center alert alert-success">Mohon tunggu!</div>');

              window.location.href ="<?php echo base_url('cat/tampil_data_live?pin=')?>"+pin;
            }
            else{
              $("#t4_alert").html('<div class="text-center alert alert-danger">PIN tidak ditemukan!</div>');
            }
          },
          error:function(x){
            console.log(x);
          }
        })
      }

      return true;
    }

  </script>