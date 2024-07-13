
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
          <label>Kode Pasien</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="hidden" id="id" name="id" class="form-control">
          <input type="text" id="kode" name="kode" class="form-control" required="">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Nama</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" id="nama" name="nama" class="form-control" required="">
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
              foreach($kecamatan as $de){
                echo '<option value="'.$de->kode.'">'.$de->nama_kecamatan.'</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Desa</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <select name="desa" id="desa" class="form-control" required="">
            <option value="">--Pilih--</option>
            <option value="Luar Pakpak Bharat">Luar Pakpak Bharat</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Alamat Lengkap</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" required=""></textarea>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Tgl Lahir</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" autocomplete="off" name="tgl_lahir" id="tgl_lahir" class="form-control" required="">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-flat">Selanjutnya <i class="fa fa-forward"></i></button>
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
          url:'<?php echo base_url();?>admin/simpan_pasien',
          type:'post',
          data:$(this).serialize(),
          beforeSend:function(){
            $("#info").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Loading...</b></div>').fadeIn();
          },
          success:function(e){
            var js= JSON.parse(e);
            console.log(js);
            $(function(){
              var act = '<?php echo $act;?>';
              if(act=='new'){
                eksekusi_controller('index.php/admin/pantauan?act=new&id='+js.id);
              }
              else{
                eksekusi_controller('index.php/admin/data');
              }
              
            })
          }
        });
     }
     
     return false;
 })

 $("#kecamatan").change(function(){
    var kecamatan = $("#kecamatan").val();
    desafromkec(kecamatan);    
 })

 function desafromkec(kecamatan){
  $.ajax({
      url: '<?php echo base_url()?>admin/desa/'+kecamatan,
      type:'get',
      success:function(e){
        $("#desa").html(e);
      }
    })
 }

 $("#tgl_lahir").datepicker({
    autoclose:true,
    format:'yyyy-mm-dd'
 });

 </script>
