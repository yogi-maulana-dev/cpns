<?php
$id="";
$pin="";
$ujian="";
$tempat="";
$tanggal="";
$jam="";
$lama_ujian="";
$batas_terlambat="";
$jlh_peserta="";
$kategori="";
$bidang_soal="";
$jlh_soal="";
$grade="";
$acak_soal="";

if(isset($edit)){
  $id=$edit[0]->id;
  $pin=$edit[0]->pin;
  $ujian=$edit[0]->ujian;
  $tempat=$edit[0]->tempat;
  $tanggal=date('Y-m-d',strtotime($edit[0]->tanggal_jam));
  $jam=date('H:i',strtotime($edit[0]->tanggal_jam));
  $lama_ujian=$edit[0]->lama_ujian;
  $batas_terlambat=$edit[0]->batas_terlambat;
  $jlh_peserta=$edit[0]->jlh_peserta;
  $kategori=$edit[0]->kategori;
  $bidang_soal=$edit[0]->bidang_soal;
  $jlh_soal=$edit[0]->jlh_soal;
  $grade=$edit[0]->grade;
  $acak_soal=$edit[0]->acak_soal;
}
?>
<section class="content-header">
  <h1>
    Tambah
    <small>Peserta Ujian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Peserta Ujian</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body row">
    <form action="#" id="tambah_peserta" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id;?>" name="id" id="id_peserta" class="form-control" required="" readonly>
        <input type="hidden" placeholder="PIN" name="pin" id="pin" class="form-control" value="<?php echo $pin;?>" required="">

        <div class="col-sm-2">
          <div class="form-group">
            <label>Kategori</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <select class="form-control select2" name="kategori[]" id="kategori" required="" multiple="multiple">
              <option value="">Pilih</option>
              <?php
                $exp_kateg=explode(",", $kategori);
                foreach($kateg as $val) {
                  for ($i=0; $i < count($exp_kateg); $i++){     
                    $selectx = $val->ket==$exp_kateg[$i]  ? 'selected' : '';
                    echo '<option value="'.$val->ket.'" '.$selectx.'>'.ucwords($val->ket).'</option>';
                  }
                }
              ?>
            </select>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Nama Ujian</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" placeholder="Nama Ujian" name="ujian" class="form-control" required="" value="<?php echo $ujian;?>">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Tempat Ujian</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" placeholder="Tempat Ujian" name="tempat" class="form-control" required="" value="<?php echo $tempat;?>">
          </div>
        </div>

        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-2 col-md-2">
          <div class="form-group">
            <label>Tanggal Ujian & Jam</label>
          </div>
        </div>
        <div class="col-sm-5 col-md-5">
          <div class="form-group">
            <input type="text" placeholder="Tanggal ujian Format YYYY-MM-DD" name="tanggal" class="form-control" id="tanggal" required="" value="<?php echo $tanggal;?>" autocomplete="off" >
          </div>
        </div>
        <div class="col-sm-5 col-md-5">
          <div class="form-group">
            <input type="text" placeholder="Jam Ujian Format 24 Jam JJ:MM " name="jam" class="form-control timepicker" required="" id="jam" autocomplete="off" value="<?php echo $jam;?>" autocomplete="off">
          </div>
        </div>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Lama Ujian</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="number" placeholder="Lama Ujian dalam Menit" name="lama_ujian" class="form-control" required="" value="<?php echo $lama_ujian;?>">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Batas Terlambat</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="number" placeholder="Batas terlambat dalam Menit" name="batas_terlambat" class="form-control" required="" value="<?php echo $batas_terlambat;?>">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Jumlah Peserta</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" placeholder="Jumlah Peserta" name="jlh_peserta" class="form-control" required="" value="<?php echo $jlh_peserta;?>">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Soal & jlh soal</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <select class="form-control select2" name="bidang_soal[]" id="bidang_soal" multiple="multiple" required="">
                  <?php
                    $exp_bid_soal=explode(",", $bidang_soal);
                    foreach ($bidang as $value) {
                      for ($i=0; $i < count($exp_bid_soal); $i++) { 
                        
                        $select = $value->ket==$exp_bid_soal[$i]  ? 'selected' : '';
                        echo '<option value="'.$value->ket.'" '.$select.'>'.$value->ket.'</option>';
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" placeholder="Jumlah Soal" name="jlh_soal" class="form-control" required="" value="<?php echo $jlh_soal;?>">
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Passing Grade</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" placeholder="Passing Grade" name="grade" class="form-control" required="" value="<?php echo $grade;?>">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Urutan Soal</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <select name="acak_soal" class="form-control" required="">
              <option value="">Pilih</option>
              <option value="0">Acak</option>
              <option value="1">Ascending</option>
              <option value="2">Descending</option>
            </select>
          </div>
        </div>

        <div id="bix"></div>
        
        <div class="col-sm-2">
          <div class="form-group">
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group" id="info">
            
          </div>
        </div>        

        <div class="col-sm-2">
          <div class="form-group">
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group" id="info">
          </div>
          <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-sm btn-primary btn-flat btn-block">
          </div>
        </div>
    </form>
    
    <!-- body-->
  </div>
 
 </section>
 </section>
 <script>

$(".select2").select2();

/*$("#kategori").on("change",function(){
  var kategori= $("#kategori").val();
  
  if(kategori=='sekolah' || kategori=='mahasiswa'){
    $.ajax({
      url : '<?php //echo base_url()?>admin/select_kategori',
      type: 'get',
      success:function(e){
        $("#bix").html(e);
        $(function(){
          $("#bidang_soal").select2();
        })
      },
      error:function(x){
        console.log(x);
      }
    });
  }
  else{
    $("#bix").html('');
  }
})*/

$("#tanggal").datepicker({
  autoclose:true,
  format:'yyyy-mm-dd'
});

$("#tambah_peserta").submit(function(){

   if(confirm("Anda yakin?")){        
    $.ajax({
      url: "<?php echo base_url();?>index.php/admin/simpan_jadwal_ujian",
      type: "POST",
      contentType: false,
      processData:false,
      data:  new FormData(this),
      beforeSend: function(){
        $("#info").html('Loading..');
        $("input[type=submit]").addClass('disabled');
        $("input[type=submit]").attr('type','button');
      },
      success: function(data){
        console.log(data);
        if(data=="0"){
          $("#info").html('<div class="alert alert-danger">Jam sudah digunakan</div>');
          /*<span class="aler alert-info" style="padding:5px;"><i class="fa fa-info-circle"></i> Coba menginput waktu secara berurutan mulai dari jam & hari & bulan & tahun terkecil (Pagi-siang-sore-malam) :) </span>*/
          $("input[type=button]").removeClass('disabled');
          $("input[type=button]").attr('type','submit');
        }
        else if(data=="1"){
          $("#info").html('<div class="alert alert-danger">Jam sudah lewat</div>');
          $("input[type=button]").removeClass('disabled');
          $("input[type=button]").attr('type','submit');
        }
        else if(data=="2"){
          $("#info").html('<div class="alert alert-danger">Ahh.. Bidang & Jumlah Soal & Passing Grade tidak cocok deh..</div>');
          $("input[type=button]").removeClass('disabled');
          $("input[type=button]").attr('type','submit');
        }
        else{
          eksekusi_controller('index.php/admin/jadwal_ujian');
        }
        
      },
      error: function(x){
          console.log(x);
      }           
    });
   }
   
   return false;
 })
  
 </script>