<?php

$id="";
$tanggal="";
$odp="";
$pdp="";
$positif="";
$keterangan="";

if(isset($edit)){
  $id=$edit[0]->id;
  $tanggal=$edit[0]->tanggal;
  $kecamatan=$edit[0]->kecamatan;
  $odp=$edit[0]->odp;
  $pdp=$edit[0]->pdp;
  $positif=$edit[0]->positif;
  $keterangan=$edit[0]->keterangan;
}

?>
<section class="content-header">
  <h1>
    Data
    <small>Pasien</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Data Pasien</li>
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

    <div class="col-lg-10 col-sm-10">
      <form action="#" method="post" id="tambah_admin">
      <div class="col-sm-2">
        <div class="form-group">
          <label>Tanggal</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" autocomplete="off" value="<?php echo $tanggal;?>" name="tanggal" id="tanggal" class="form-control" required="" placeholder="TTTT-BB-HH">
          <input type="hidden" autocomplete="off" name="id" value="<?php echo $id;?>" class="form-control" required="" placeholder="TTTT-BB-HH">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>ODP</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" name="odp" class="form-control" value="<?php echo $odp;?>" required="" placeholder="ODP">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>PDP</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" name="pdp" class="form-control" value="<?php echo $pdp;?>" required="" placeholder="PDP">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>POSITIF</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" name="positif" class="form-control" value="<?php echo $positif;?>" required="" placeholder="POSITIF">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Kecamatan</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <select name="kecamatan" id="kecamatan" class="form-control" required="">
            <option value="">--Pilih--</option>
            <option value="Luar Pakpak Bharat">Luar Pakpak Bharat</option>
            <?php
              foreach($camat as $de){
                $select = $kecamatan == $de->kode ? 'selected' : '';

                echo '<option value="'.$de->kode.'" '.$select.'>'.$de->nama_kecamatan.'</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Keterangan</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <textarea class="form-control" name="keterangan" required="" placeholder="Keterangan"><?php echo $keterangan;?></textarea>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-flat">Simpan <i class="fa fa-save"></i></button>
          <button type="button" class="btn btn-warning btn-flat" onclick="eksekusi_controller('admin/datatotal')">Batal <i class="fa fa-close"></i></button>
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
    </form>
    </div>
    
    <!-- body-->
  </div>
 
 </section>
 <script>


 $("#tambah_admin").submit(function(){
     
     if(confirm("Anda yakin?")){
        $.ajax({
          url:'<?php echo base_url();?>admin/simpandatatotal',
          type:'post',
          data:$(this).serialize(),
          beforeSend:function(){
            $("#info").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Loading...</b></div>').fadeIn();
          },
          success:function(e){
            eksekusi_controller('admin/datatotal');
          }
        });
     }
     
     return false;
 })

 $("#tanggal").datepicker({
    autoclose:true,
    format:'yyyy-mm-dd'
 });

 </script>
