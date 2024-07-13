<?php
$id="";
$no_ujian="";
$nama="";
$tempat="";
$tgl_lahir="";
$asal_ujian="";
$pendidikan="";
$kategori="";

if(isset($edit)){
  $id=$edit[0]->id;
  $no_ujian=$edit[0]->no_ujian;
  $nama=$edit[0]->nama;
  $tempat=$edit[0]->tempat;
  $tgl_lahir=$edit[0]->tgl_lahir;
  $asal_ujian=$edit[0]->asal_ujian;
  $pendidikan=$edit[0]->pendidikan;
  $kategori=$edit[0]->kategori;
}
?>
<script src="<?php echo base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
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
        <div class="col-sm-2">
          <div class="form-group">
            <label>No Ujian</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <div class="input-group">
                <div class="input-group-btn">
                  <button type="button" onclick="generate_number()" class="btn btn-primary">Generate</button>
                </div>
                <input type="hidden" value="<?php echo $id;?>" name="id" id="id_peserta" class="form-control" required="" readonly>
                <input type="text" placeholder="No Ujian" name="no_ujian" id="no_ujian" class="form-control" value="<?php echo $no_ujian;?>" required="">
              </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Kategori</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <select class="form-control" name="kategori" required="">
              <option value="">Pilih</option>
              <?php
                foreach ($kateg as $val) {
                  $select= $kategori == $val->ket ? 'selected' : '';
                  echo '<option value="'.$val->ket.'" '.$select.'>'.$val->ket.'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Pendidikan</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <select class="form-control" name="pendidikan" required="">
              <option value="">Pilih</option>
              <?php
                foreach ($pend as $val) {
                  $select= $pendidikan == $val->ket ? 'selected' : '';
                  echo '<option value="'.$val->ket.'" '.$select.'>'.$val->ket.'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Asal Ujian / Sekolah</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" placeholder="Asal Ujian / Sekolah" name="asal_ujian" class="form-control" required="" value="<?php echo $asal_ujian;?>">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Nama</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" placeholder="Nama" name="nama" class="form-control" required="" value="<?php echo $nama;?>">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Tempat & Tgl lahir</label>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <input type="text" placeholder="Tempat" name="tempat" class="form-control" required="" value="<?php echo $tempat;?>">
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <input type="text" placeholder="Tgl lahir" name="tgl_lahir" class="form-control" required="" id="tgl_lahir" autocomplete="off" value="<?php echo $tgl_lahir;?>">
          </div>
        </div>
        
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

$("#tgl_lahir").datepicker({
  autoclose:true,
  format:'yyyy-mm-dd'
});

$("#tambah_peserta").submit(function(){

   if(confirm("Anda yakin?")){        
    $.ajax({
      url: "<?php echo base_url();?>index.php/admin/simpan_peserta_ujian",
      type: "POST",
      contentType: false,
      processData:false,
      data:  new FormData(this),
      beforeSend: function(){
      },
      success: function(data){
        console.log(data);
        if(data=="0"){
          $("#info").html('<div class="alert alert-danger">Peringatan!!<br>Nomor ujian sudah digunakan</div>');
        }
        else{
          eksekusi_controller('index.php/admin/peserta_ujian');
        }
        
      },
      error: function(x){
          console.log(x);
      }           
    });
   }
   
   return false;
 })

  function generate_number(){
    $.ajax({
      url:'<?php echo base_url('admin/generate_number')?>',
      type:'get',
      success:function(e){
        $("#no_ujian").val(e);
      }
    })
    return false; 
  }

 </script>