<?php
  include "header.php";
  $jlh_soal=$soal->num_rows();
  // $no_ujian=$this->session->userdata('peserta')['no_ujian'];
?>
<style type="text/css">
  tr {
    vertical-align: top;
  }
  td{
    padding-bottom: 10px;
  }

  .tab-content {
    background-image: url('<?php echo base_url("assets/img/logo_transparent.png")?>');
    background-color: rgba(255, 255, 255, 0.8);
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
<body>
  <main id="main">
    <!-- ======= About Lists Section ======= -->
    <section class="about-lists">
      <?php include "kop.php";?>
      <div class="row contact">
        <div class="col-md-12">
          <div class="alert alert-dark table-responsive" style="background-color : black; color: white;padding: 0px;">
            <table class="table" style="color:white">
              <tr>
                <td>Nama : <?php echo $this->session->userdata('peserta')['nama'];?></td>
                <td>Pendidikan : <?php echo $this->session->userdata('peserta')['pendidikan'];?></td>
                <td>Asal Ujian : <?php echo $this->session->userdata('peserta')['asal_ujian'];?></td>
                <!-- <td>Mengerjakan : <span id="persen"><?php //echo round($jumlahterjawab/$jlh_soal*100); ?></span> %</td> -->
                <td>
                  Waktu Selesai : <div id="clock" style="font-weight: bold;padding: 0px 2px 0px;" class="btn btn-danger btn-disable"></div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12" id="t4_nomor">
          <?php

            $i=0;
            foreach($soal->result() as $btn){ 
              $i++;
              
              $terjawab=$this->m_cat->m_data('jawaban',['id_soal'=>$btn->id,'pin'=>$pin,'no_ujian'=>$no_ujian,'date(waktu)'=>date('Y-m-d'),'bidang_soal'=>$btn->bidang_soal]);

              // $button= $terjawab->num_rows() > 0 ? 'success' : 'danger';

              if($terjawab->num_rows() > 0 AND $terjawab->result()[0]->pilihan=="Y"){
                $button="success";
              }
              elseif($terjawab->num_rows() > 0 AND $terjawab->result()[0]->pilihan=="R"){
                $button="info";
              }
              else{
                $button="danger";
              }

              echo '<button class="btn btn-sm btn-'.$button.'" onclick="openSoal('.$i.')" style="width: 35px;margin-bottom:2px;" data="jawabid'.$btn->id.'" id="no'.$i.'">'.$i.'</button>
              ';

              // $terjawab_b[]=$terjawab->result_array();

            }

          ?>
          <br>
          <br>
          <button onclick="selesai_ujian()" class="btn btn-sm btn-success btn-flat btn-block">Selesai Ujian</button>
        </div>
        <div class="col-lg-9 col-sm-12" id="t4_ujian">
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?php echo round($jumlahterjawab/$jlh_soal*100); ?>%" aria-valuenow="<?php echo round($jumlahterjawab/$jlh_soal*100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            <span id="persen"><b><?php echo round($jumlahterjawab/$jlh_soal*100); ?></b></span> <b>%</b>
          </div>
          <div class="alert alert-warning" style="padding: 0px 10px 0px;">
            <h4>INSTRUKSI :</h4>
            <p>Pilihlah salah satu jawaban yang menurut anda benar. Kemudian klik Simpan dan lanjutkan</p>
          </div>

          <div class="tab-content">
            <?php 
            $no=0;
            foreach($soal->result() as $qu){
            $no++;
            $active = $no == 1 ? 'active' : '';
            ?>
            <div class="tab-pane <?php echo $active;?>" id="soal<?php echo $no;?>" role="tabpanel" aria-labelledby="soal<?php echo $no;?>-tab">
              <label><b>Soal : <?php echo $qu->bidang_soal;?></b></label>
              <p>
                <?php echo $no;?>. <?php echo nl2br($qu->pertanyaan);?>
                <?php
                  if($qu->gambar_soal!=""){
                    echo '<img src="'.base_url().'assets/uploads/'.$qu->gambar_soal.'" onclick='."zoomx('".$qu->gambar_soal."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                  }
                ?>
                <form class="form" action="#" method="post" id="simpansoalno<?php echo $no;?>">
                <table>
                  <tr>
                    <td width="20"><label for="simpansoalno<?php echo $no;?>a">A</label></td>
                    <td>
                      <input type="radio" name="jawab" id="simpansoalno<?php echo $no;?>a" value="a">&ensp;
                    </td>
                    <td>
                      <label for="simpansoalno<?php echo $no;?>a">
                      <?php echo strip_tags($qu->opt_a);?>
                        <?php
                        if($qu->gambar_a!=""){
                          echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_a.'" onclick='."zoomx('".$qu->gambar_a."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                        }
                      ?>
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td><label for="simpansoalno<?php echo $no;?>b">B</label></td>
                    <td><input type="radio" name="jawab" id="simpansoalno<?php echo $no;?>b" value="b">&ensp;</td>
                    <td>
                      <label for="simpansoalno<?php echo $no;?>b">
                      <?php echo strip_tags($qu->opt_b);?>
                        <?php
                        if($qu->gambar_b!=""){
                          echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_b.'" onclick='."zoomx('".$qu->gambar_b."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                        }
                      ?>
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td><label for="simpansoalno<?php echo $no;?>c">C</label></td>
                    <td><input type="radio" name="jawab" id="simpansoalno<?php echo $no;?>c" value="c">&ensp;</td>
                    <td>
                      <label for="simpansoalno<?php echo $no;?>c">
                       <?php echo strip_tags($qu->opt_c);?>
                        <?php
                        if($qu->gambar_c!=""){
                          echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_c.'" onclick='."zoomx('".$qu->gambar_c."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                        }
                      ?>
                    </td>
                    </label>
                  </tr>
                  <tr>
                    <td><label for="simpansoalno<?php echo $no;?>d">D</label></td>
                    <td><input type="radio" name="jawab" id="simpansoalno<?php echo $no;?>d" value="d">&ensp;</td>
                    <td>
                      <label for="simpansoalno<?php echo $no;?>d">
                      <?php echo strip_tags($qu->opt_d);?>
                        <?php
                        if($qu->gambar_d!=""){
                          echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_d.'" onclick='."zoomx('".$qu->gambar_d."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                          }
                        ?>
                    </td>
                    </label>
                  </tr>
                  <tr>
                    <td><label for="simpansoalno<?php echo $no;?>e">E</label></td>
                    <td><input type="radio" name="jawab" id="simpansoalno<?php echo $no;?>e" value="e">&ensp;</td>
                    <td>
                      <label for="simpansoalno<?php echo $no;?>e">
                      <?php echo strip_tags($qu->opt_e);?>
                        <?php
                        if($qu->gambar_e!=""){
                          echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_e.'" onclick='."zoomx('".$qu->gambar_e."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                          }
                        ?>
                    </td>
                  </label>
                  </tr>
                </table>
            
                <?php 
                if($no>1){
                ?>
                <button type="button" class="btn btn-danger btn-flat btn-sm" onclick="kembali('<?php echo $no-1;?>')">Kembali</button>
                <?php } ?>
                <button type="submit" class="btn btn-success btn-flat btn-sm" onclick="simpan_lanjutkan(<?php echo $no;?>,<?php echo $qu->id;?>,'Y')">Simpan dan Lanjutkan</button>
                <!-- <button type="submit" class="btn btn-info btn-flat btn-sm" onclick="simpan_lanjutkan(<?php //echo $no;?>,<?php //echo $qu->id;?>,'R')">Simpan Ragu-ragu</button> -->
                <button type="button" class="btn btn-warning btn-flat btn-sm" onclick="lewati('<?php echo $no+1;?>')">Lewati</button>
              </form>
              </p>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section><!-- End About Lists Section -->
    <!-- Modal Gambar -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
        </div>
      </div>
    </div>
    <!-- END Modal Gambar -->
  </main><!-- End #main -->

  <?php include "footer.php";?>
  <script type="text/javascript">
    // $(document).on("keydown", disableF5);
    $(document).on("keydown", disableCtrlR);

    // window.onbeforeunload = function(){
    //     return "Yay! Selesai ujian?";
    //   }

    $(function(){
      // document.documentElement.requestFullscreen();

      window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };

      $(window).on("contextmenu",function(){
        return false;
      }); //Mematikan klik kanan

      $("#clock").countdowntimer({
          startDate : '<?php echo date('Y-m-d H:i:s'); ?>',
          dateAndTime : '<?php echo $this->session->userdata("ujian")["jam_ahir"]; ?>',
          size : "lg",
          displayFormat: "HMS",
          timeUp : load_hasil_ujian,
      });
    })

    function selesai_ujian(){
      if(confirm("Anda yakin sudah selesai?")){
        load_hasil_ujian();
      }
    }

    load_hasil_ujian = function(){
      $.ajax({
        url:'<?php echo base_url("cat/load_hasil_ujian")?>',
        type:'get',
        beforeSend:function(){
          $("#t4_ujian").html("Memuat hasil ujian...");
          $("#t4_nomor").html("");
          setTimeout(function() { 
              window.location.replace("<?php echo base_url('cat/bio_peserta');?>");
          }, 5000);
        },
        success:function(e){
          $("#t4_ujian").html(e);
        }
      })
    }

    function disableF5(e){
      if ((e.which || e.keyCode)== 116) e.preventDefault();
    }

    function disableCtrlR(e){
      if (e.ctrlKey) e.preventDefault();
    }

    function simpan_lanjutkan(no,id,pilihan){
      var now = no+1;
      var jlh_soal = <?php echo $jlh_soal;?>;
      
      if(now > jlh_soal){
        now = 1;
      }

      $(".tab-pane").removeClass('active');
      $("#soal"+now).addClass('active');

      $("#simpansoalno"+no).on("submit",function(){
        $.ajax({
          url : '<?php echo base_url();?>cat/simpan_jawaban?id='+id+'&pilihan='+pilihan,
          type : 'post',
          data : $(this).serialize(),
          beforeSend:function(){

          },
          success:function(e){
            console.log(e);
            if(e=="OK" && pilihan=="Y"){
              $("#no"+no).attr("class","btn btn-sm btn-success");
              persen();
            }
            else if(e=="OK" && pilihan=="R"){
              $("#no"+no).attr("class","btn btn-sm btn-info");
              persen();
            }
            else if(e=="GAGAL"){
              alert('Oups..! Ada yang salah nih, Refresh halaman anda dan login kembali');
            }
          },
          error:function(x){
            $("#no"+no).attr("class","btn btn-sm btn-warning");
          }
        })
        return false;
      })
    }

    function lewati(no){
      var jlh_soal = <?php echo $jlh_soal;?>;
      
      if(no > jlh_soal){
        no = 1;
      }

      $(".tab-pane").removeClass('active');
      $("#soal"+no).addClass('active');
    }

    function openSoal(no){
      $(".tab-pane").removeClass('active');
      $("#soal"+no).addClass('active');
    }

    function kembali(no){
      $(".tab-pane").removeClass('active');
      $("#soal"+no).addClass('active');
    }

    function zoomx(pict){
      $(".modal-body").html('<img class="img img-fluid img-thumbnail" src="<?php echo base_url()?>assets/uploads/'+pict+'">');
      $("#exampleModalCenter").modal('toggle');
    }

    function persen(){
      var jlh_soal = <?php echo $jlh_soal; ?>;
      $.ajax({
          url : '<?php echo base_url()."cat/jumlahterjawab/".$no_ujian."/".$pin;?>',
          type : 'post',
          data : $(this).serialize(),
          beforeSend:function(){

          },
          success:function(e){
            // console.log(e);
            var persen = Math.round(e/jlh_soal*100);
            $("#persen").html("<b>"+persen+"</b>");
            $(".progress-bar").css("width",persen+"%");
          },
          error:function(x){
            $("#no"+no).attr("class","btn btn-sm btn-warning");
          }
        })
        return false; 
    }

  </script>