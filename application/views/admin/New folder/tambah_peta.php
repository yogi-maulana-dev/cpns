<?php
  $id="";
  $tanggal="";
  $odp_1="";
  $pdp_3="";
  $positif_5="";
  $koordinat="";
  $kec="";
  $desa="";

  if(isset($edit)){
    $id=$edit[0]->id;
    $tanggal=$edit[0]->tanggal;
    $odp_1=$edit[0]->odp;
    $pdp_3=$edit[0]->pdp;
    $positif_5=$edit[0]->positif;
    $koordinat=$edit[0]->koordinat;
    $desa=$edit[0]->desa;
    $kec=$edit[0]->kecamatan;
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
                // $select = $kec == $de->kode ? "selected" : "";
                echo '<option value="'.$de->kode.'" '.$select.'>'.$de->nama_kecamatan.'</option>';
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
          <label>ODP</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $odp_1; ?>" name="odp" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>PDP</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $pdp_3; ?>" name="pdp" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>Positif</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="number" value="<?php echo $positif_5; ?>" name="positif" class="form-control" required="">
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label>Koordinat</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" id="lati" name="koordinat" value="<?php echo $koordinat; ?>" class="form-control" placeholder="Koordinat">
            <span class="input-group-btn">
              <a href="javascript:get_map()" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></a>
            </span>
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
          url:'<?php echo base_url();?>admin/simpan_peta',
          type:'post',
          data:$(this).serialize(),
          beforeSend:function(){
            $("#info").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Loading...</b></div>').fadeIn();
          },
          success:function(e){
              eksekusi_controller('index.php/admin/data_peta');
          }
        });
     }
     
     return false;
 })

 $("#tanggal").datepicker({
    autoclose:true,
    format:'yyyy-mm-dd'
 });

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

 function get_map() 
  {
    window.open("<?php echo base_url().'admin/get_map';?>","blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=10,left=10,width=960,height=600");
  }

  function refreshFromPopup(lati){
    $("#lati").val(lati); 
  }

 </script>
