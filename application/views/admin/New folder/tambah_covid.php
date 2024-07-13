<?php
  $id="";
  $tanggal="";
  $otg_0="";
  $odp_1="";
  $odp_2="";
  $pdp_3="";
  $pdp_4="";
  $positif_5="";
  $positif_6="";
  $positif_7="";

  if(isset($edit)){
    $id=$edit[0]->id;
    $tanggal=$edit[0]->tanggal;
    $otg_0=$edit[0]->otg_0;
    $odp_1=$edit[0]->odp_1;
    $odp_2=$edit[0]->odp_2;
    $pdp_3=$edit[0]->pdp_3;
    $pdp_4=$edit[0]->pdp_4;
    $positif_5=$edit[0]->positif_5;
    $positif_6=$edit[0]->positif_6;
    $positif_7=$edit[0]->positif_7;
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
          <input type="hidden" id="id" value="<?php echo $id; ?>" name="id" class="form-control">
          <input type="text" autocomplete="off" id="tanggal" value="<?php echo $tanggal; ?>" name="tanggal" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>OTG</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $otg_0; ?>" name="otg_0" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>ODP Pantau</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $odp_1; ?>" name="odp_1" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>ODP Selesai</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $odp_2; ?>" name="odp_2" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>PDP Rawat</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $pdp_3; ?>" name="pdp_3" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>PDP Sembuh</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $pdp_4; ?>" name="pdp_4" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>Positif Rawat</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $positif_5; ?>" name="positif_5" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>Positif Sembuh</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $positif_6; ?>" name="positif_6" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>Positif Meninggal</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $positif_7; ?>" name="positif_7" class="form-control" required="">
        </div>
      </div>
      
      <div class="col-sm-2">
        <div class="form-group">
          
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-flat">Simpan <i class="fa fa-save"></i></button>
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
          url:'<?php echo base_url();?>admin/simpan_covid',
          type:'post',
          data:$(this).serialize(),
          beforeSend:function(){
            $("#info").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Loading...</b></div>').fadeIn();
          },
          success:function(e){
              eksekusi_controller('index.php/admin/data_covid');
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
