<title>Tambah User</title>
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
  <div class="box-body">

  	<div class="col-lg-10 col-sm-12">
    	<form action="" method="post" id="tambah_viedo" enctype="multipart/form-data">
    	<div class="form-group">
    		<label>Embed dari Youtube:</label>
        <input type="hidden" name="type" value="v">
    		<textarea class="form-control" name="media" required=""></textarea>
    	</div>
    	<div class="form-group">
    		<label>Deskripsi :</label>
    		<textarea class="form-control" name="deskripsi" maxlength="225" required=""></textarea>
    	</div>
    		<input type="submit" value="Simpan" class="btn btn-sm btn-primary btn-block">
    </form>
    </div>
    
    <!-- body-->
  </div>
 
 </section>
 <script>
 $("#tambah_viedo").submit(function(){
     
     if(confirm("Anda yakin menambah Video?"))
     {              
            $.ajax({
              url:'<?php echo base_url().'admin/simpan_video'?>',
              type:'post',
              contentType: false,
              processData:false,
              data:  new FormData(this),
              success:function(e){
                eksekusi_controller('admin/video');
              }
            })
          }
     
     return false;
 })
 </script>
