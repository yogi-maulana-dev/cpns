<?php include "header.php";?>
<body>
  <main id="main">
    <!-- ======= About Lists Section ======= -->
    <section id="situasi" class="about-lists">
      <div class="container">
        <?php include "kop.php";?>
        <div class="row">
          <?php if($this->session->userdata('peserta') !=""){ ?>
          <div class="col-lg-12 col-md-12 content-item" data-aos="fade-up">
            <span class="alert alert-success text-center" style="color: black;">Periksa biodata anda</span>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <table class="table">
                  <tr>
                    <td>Nama</td>
                    <td>: <?php echo $this->session->userdata('peserta')['nama']?></td>
                  </tr>
                  <!-- <tr>
                    <td>Tempat, Tgl lahir</td>
                    <td>: <?php echo $this->session->userdata('peserta')['tempat']?>, <?php echo dmy($this->session->userdata('peserta')['tgl_lahir'])?></td>
                  </tr> -->
                  <tr>
                    <td>Asal ujian</td>
                    <td>: <?php echo $this->session->userdata('peserta')['asal_ujian'] ?></td>
                  </tr>
                  <tr>
                    <td>Pendidikan</td>
                    <td>: <?php echo $this->session->userdata('peserta')['pendidikan'] ?></td>
                  </tr>
                </table>
                <br>
                <div class="alert alert-warning text-center">
                  <blockquote>Periksa kebenaran biodata anda, jika sudah benar klik mulai ujian. Tetapi jika biodata anda salah klik Batal ujian</blockquote>
                </div>
              </div>

            </div>
          </div>
        <div class="col-lg-12 col-md-12 content-item text-center">
          <div class="row">
            <div class="col-md-6"><!-- 
              <div class="card border-danger">
                Ujian Mulai dalam
                <div id="clock"></div>
                <div id="mulai"></div>
              </div> -->
              <button class="btn btn-flat btn-sm btn-primary" onclick="mulai()">Mulai Ujian</button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-flat btn-sm btn-danger" onclick="batal_ujian()">Batal Ujian</button>
            </div>
          </div>
        </div>

      <?php }else{ ?>

        <div class="col-lg-12 col-md-12 content-item" data-aos="fade-up">
            <span class="alert alert-success text-center" style="color: black;">Anda sudah selesai ujian</span>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <!-- <span class="text-center">Download modul materi pembelajaran ujian CPNS/PPPK dan pembahasan ujian anda</span> -->
                <br>
                <br>
                <div class="card text-center">
                  <div class="card-header">
                    Hasil Ujian
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $this->session->userdata('selesai')['nama']?></h5>
<!--                     Modul Pembelajaran  : <a href="<?php echo base_url();?>assets/uploads/module.pdf" download="module.pdf" >Download</a> -->
                    <br>
                    <br>
                    <?php 
                      $hasil=$this->m_cat->m_data('selesai',['no_ujian'=>$this->session->userdata('selesai')['no_ujian'],'ket'=>'Selesai'])->result();

                      // print_r($this->session->userdata('selesai'));

                      foreach($hasil as $row){
                        $nilai=$this->m_cat->m_nilai_peserta($row->pin,$row->no_ujian)->result();
                        $hasil=$this->m_cat->m_data('jadwal',['pin'=>$row->pin])->result();
                        $soal=explode(",", $hasil[0]->bidang_soal);
                        $grade=explode(",", $hasil[0]->grade);

                        $passing=array_combine($soal, $grade);
                      ?>
                      <div class="alert alert-success">
                        <h5><u><?php echo $hasil[0]->ujian; ?></u></h5>
                        Passing Grade : 

                        <?php 
                          ksort($passing);
                          foreach ($passing as $key => $value) {
                            echo $key.' = '.$value.', ';
                          }
                        ?>
                        <br>
                        Hasil Anda: <?php asort($nilai); foreach ($nilai as $value) {
                          echo $value->bidang_soal.' = '.$value->nilai.', ';
                        } ?>
                        <br>
                        Pembahasan : <a href="<?php echo base_url().'pembahasan?pin='.$row->pin.'&no_ujian='.$row->no_ujian;?>" target="_blank">Lihat</a>
                      </div>
                      <?php } ?>
                  </div>
                </div>
                  
                <br>
                <div class="alert alert-warning text-center">
                  <blockquote>Ini adalah simulasi ujian, anda lulus disini belum tentu lulus ujian CPNS dan PPPK. Perbanyak latihan-latihan maka akan mengasah kemampuan anda dalam mengerjakan soal-soal. Terimakasih atas partisipasi anda, tetap semangat dan terus berjuang. Semoga di ujian nanti kamu lulus dan segera menjadi ASN. Ingat jangan lupa berdoa dan restu orang tua juga.</blockquote>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button class="btn btn-flat btn-sm btn-danger" onclick="batal_ujian()">Keluar</button>
              </div>

            </div>
          </div>

      <?php } ?>

      </div>

    </div>
      
  </section><!-- End About Lists Section -->

  </main><!-- End #main -->

  <?php include "footer.php";?>
  <script type="text/javascript">
    
    function batal_ujian(){
      if(confirm("Batalkan ujian?")){
        $.ajax({
          url :'<?php echo base_url();?>cat/keluar_ujian',
          type : 'get',
          success:function(){
            location.replace('<?php echo base_url();?>');
          }
        })
      }
      return false;
    }

    mulaiUjian = function(){
      $("#mulai").html('<button class="btn btn-flat btn-sm btn-primary" onclick="mulai()">Mulai Ujian</button>');
    }

    function mulai(){
      $.ajax({
        url :'<?php echo base_url();?>cat/mulai_ujian',
        type : 'get',
        success:function(e){
          console.log(e);
          if(e==0){
            
            location.replace("<?php echo base_url('ujian')?>");
          }
        }
      })
    }

    $("#clock").countdowntimer({
          startDate : '<?php echo date('Y-m-d H:i:s'); ?>',
          dateAndTime : '<?php echo $this->session->userdata("peserta")["jam_mulai"]; ?>',
          size : "lg",
          displayFormat: "HMS",
          timeUp : mulaiUjian,
      });

    

  </script>