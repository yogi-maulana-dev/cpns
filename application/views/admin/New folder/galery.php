<section class="content-header">
  <h1>
    Galery
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Galery</li>
  </ol>
</section>
<section class="content">
<div class="box box-info">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#foto">Foto</a></li>
    <li><a data-toggle="tab" href="#video">Video</a></li>
  </ul>
  <div class="tab-content">
  <div id="foto" class="tab-pane fade in active">
    <div class="box-header with-border">
      <h3 class="box-title"><a href="#" onclick="eksekusi_controller('index.php/admin/admin/tambah_galery')" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i></a></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>            
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" align="center">
      <?php foreach($gambar as $a) { ?>
      <div class="col-lg-4 col-sm-6 col-xs-12" class="bg-aqua">
        <img src="<?php echo base_url().'assets/img/'.$a->gambar;?>" style="padding: 5px;" class="img-thumbnail img-responsive">
        <br>
        <?php echo substr($a->deskripsi, 0,50);?>
        <br>
        <a href="#" onclick="hapus(<?php echo $a->id_galeri;?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
      </div>
      <?php  } ?>
    </div>
  </div>
  
  <div id="video" class="tab-pane fade">
    <div class="box-header with-border">
      <h3 class="box-title"><a href="#" onclick="eksekusi_controller('index.php/admin/admin/tambah_video')" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i></a></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>            
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" align="center">
      <?php foreach($video as $a) { ?>
      <div class="col-lg-4 col-sm-6 col-xs-12" class="bg-aqua">
        <div class="embed-responsive embed-responsive-16by9">
          <?php echo $a->gambar;?>
        </div>
        <br>
        <?php echo substr($a->deskripsi, 0,50);?>
        <br>
        <a href="#" onclick="hapus(<?php echo $a->id_galeri;?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
      </div>
      <?php  } ?>
    </div>
  </div>
</div>
 
 </section>
 <script>
   function hapus(id)
   {
    if(confirm("Hapus?"))
    {
      $.ajax({  
        url: "admin/admin/hapus_galery/"+id,  
        type: "POST",  
        data: new FormData(this),  
        contentType: false,  
        processData:false,  
        success: function(status) {
            //$('#result').append(status);
            //alert(status);
            eksekusi_controller('index.php/admin/admin/galery')
            /*if(status=="1")
            {
              $("#info_login").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Warning!!!</b> Acount <b></b> sedang login.</div>').fadeIn();
            }*/
        }
    });
    }
    return false;
   }
 </script>