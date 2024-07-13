<title>Tambah User</title>
<section class="content-header">
  <h1>
    Data
    <small>Video & Foto</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Video & Foto</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('admin/tambah_sebaran')" class="btn btn-xs btn-success" title="Tambah video"><i class="fa fa-plus"></i></a> <span class="text-center">Infografis Peta Sebaran</span></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php
      foreach ($sebaran as $value) {
        
    ?>
      <div class="col-lg-4 col-sm-6 col-sm-12">
        <a href="#" onclick="hapus_vi('<?php echo $value->id;?>')" title="hapus"><i class="fa fa-close"></i></a>
          <img src="<?php echo base_url().'assets/uploads/'.$value->media;?>" class="img img-responsive">
      </div>
    <?php } ?>
  </div>
 
 </section>
 <section>
   <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><a href="#" onclick="eksekusi_controller('admin/tambah_info')" class="btn btn-xs btn-success" title="Tambah video"><i class="fa fa-plus"></i></a> Infografis</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>            
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?php
        foreach ($info as $value) {
          
      ?>
        <div class="col-lg-4 col-sm-6 col-sm-12">
          <a href="#" onclick="hapus_vi('<?php echo $value->id;?>')" title="hapus"><i class="fa fa-close"></i></a>
          <img src="<?php echo base_url().'assets/uploads/'.$value->media;?>" class="img img-responsive img-thumbnail">
          <p><?php echo nl2br($value->deskripsi);?></p>
        </div>
      <?php } ?>
    </div>
   
   </section>
 <script>
   function hapus_vi(id){

    if(confirm("Anda yakin?")){
      $.ajax({
        url:"<?php echo base_url().'admin/hapus_media/'?>"+id,
        type:'get',
        success:function(e){
          eksekusi_controller('admin/video');
        }
      })
      return false;
    }
   }
 </script>
