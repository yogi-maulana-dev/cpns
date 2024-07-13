<section class="content-header">
  <h1>
    Data
    <small>Pantuan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Data</li>
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
          <label>Nama Pasien</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <label><?php echo $orang[0]->nama;?></label>
          <input type="hidden" value="<?php echo $orang[0]->id;?>" id="id_pantau_orang" name="id_pantau_orang" class="form-control">
          <input type="hidden" value="" id="id" name="id" class="form-control">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Status Pantau</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <select name="jenis_status" id="jenis_status" class="form-control" required="">
            <option value="">--Pilih--</option>
            <option value="odp">ODP</option>
            <option value="pdp">PDP</option>
            <option value="positif">Positif</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Status</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <select name="status" id="status" class="form-control" required="">
            
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Diagnosa/Riwayat Perjalanan</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <textarea placeholder="Diagnosa" class="form-control" name="diagnosa" id="diagnosa" rows="3"></textarea>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Tgl Terdeteksi</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" autocomplete="off" name="tanggal" id="tanggal" id="tgl_lahir" class="form-control" placeholder="Tanggal" required="">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Jam Terdeteksi</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-2">
            Jam <select name="jam" id="jam" class="form-control" required="">
              <?php
                for ($i=1; $i < 25; $i++) { 
                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="col-sm-2">
            Menit
            <select name="menit" id="menit" class="form-control" required="">
              <?php
                for ($j=0; $j < 60; $j++) { 
                  echo '<option value="'.$j.'">'.$j.'</option>';
                }
              ?>
            </select>
          </div>
        </div>
      </div>
      
      <br>
      <div class="col-sm-2">
        <div class="form-group">
          
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <br>
          <br>
          <input type="submit" value="Simpan" class="btn btn-flat btn-sm btn-primary">
          <button type="button" class="btn btn-flat btn-sm btn-danger" onclick="batal_pantau('<?php echo $orang[0]->id;?>')">Batal</button>
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
          url:'<?php echo base_url();?>admin/simpan_pantauan',
          type:'post',
          data:$(this).serialize(),
          beforeSend:function(){
            $("#info").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Loading...</b></div>').fadeIn();
          },
          success:function(e){
            console.log(e);
            eksekusi_controller('index.php/admin/data/');
          }
        });
     }
     
     return false;
 })

 function batal_pantau(id){
  if(confirm("Anda yakin membatalkan pasien?")){
        var act = '<?php echo $act;?>';

        if(act=='new'){
          $.ajax({
            url:'<?php echo base_url();?>admin/batal_pantauan/'+id,
            type:'get',
            beforeSend:function(){
              $("#info").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Loading...</b></div>').fadeIn();
            },
            success:function(e){
              eksekusi_controller('index.php/admin/data/');
            }
          });
        }
        else{
          eksekusi_controller('index.php/admin/data/');
        }
     }
  return false;
 }

 $("#jenis_status").on('change',function(){
    var kode = $("#jenis_status").val();
    $.ajax({
      url: '<?php echo base_url()?>admin/status/'+kode,
      type:'get',
      success:function(e){
        $("#status").html(e);
      }
    })
 })

 $("#tanggal").datepicker({
    autoclose:true,
    format:'yyyy-mm-dd'
 });

 </script>
