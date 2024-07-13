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
    	<form action="#" method="post" id="tambah_foto" enctype="multipart/form-data">
    	<div class="form-group">
    		<label>Info</label>
        <input type="hidden" name="type" value="i">
    		<input type="file" class="form-control" name="foto" required="">
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
 $("#tambah_foto").submit(function(){
    if(confirm("Anda yakin?")){
      $.ajax({
        url:'<?php echo base_url().'admin/simpan_info'?>',
        type:'post',
        contentType: false,
        processData:false,
        data:  new FormData(this),
        success:function(e){
          eksekusi_controller('admin/video');
        }
      })
      return false;
    }
 })
 </script>
