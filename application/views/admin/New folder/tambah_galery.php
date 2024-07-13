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
    	<form action="" method="post" id="tambah_galery" enctype="multipart/form-data">
    	<div class="form-group">
    		<label>Foto :</label>
    		<input type="file" name="image" class="form-control" >
    	</div>
    	<div class="form-group">
    		<label>Deskripsi :</label>
    		<textarea class="form-control" name="deskripsi" maxlength="225" required=""></textarea>
    	</div>
    		<input type="submit" value="Simpan" class="btn btn-sm btn-primary btn-block">
    </form>
    </div>
    <div class="col-lg-2 col-sm-12" id="info_login"></div>

  </div>
 
 </section>
<script type="text/javascript">
$('#tambah_galery').submit(function(e) {
    e.preventDefault();  
   $.ajax({  
        url: "index.php/admin/admin/simpan_galery",  
        type: "POST",  
        data: new FormData(this),  
        contentType: false,  
        processData:false,  
        success: function(status) {
            //$('#result').append(status);
            alert(status);
            eksekusi_controller('index.php/admin/admin/galery')
            /*if(status=="1")
            {
            	$("#info_login").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Warning!!!</b> Acount <b></b> sedang login.</div>').fadeIn();
            }*/
        }
    });
});
</script>
