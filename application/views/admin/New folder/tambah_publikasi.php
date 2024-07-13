<script src="<?php echo base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
<section class="content-header">
  <h1>
    Tambah
    <small>Publikasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Publikasi</li>
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

    <form action="#" id="tambah_berita" method="post" enctype="multipart/form-data">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Judul</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="hidden" name="id" id="id_berita" class="form-control" required="">
            <input type="text" name="judul" id="judul" class="form-control" required="">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>File</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="file" name="image" class="form-control" required="">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Keterangan</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <textarea id="isi" name="isi" rows="5" cols="80" class="form-control" required="" maxlength="300"></textarea>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
          </div>
        </div>
    </form>
    
    <!-- body-->
  </div>
 
 </section>
 </section>
 <script>

$("#tambah_berita").submit(function(){

   if(confirm("Anda yakin?"))
   {        
    $.ajax({
                url: "<?php echo base_url();?>index.php/admin/simpan_publikasi",
                type: "POST",
                contentType: false,
                processData:false,
                data:  new FormData(this),
                beforeSend: function(){
                },
                success: function(data){
                  console.log(data);
                  eksekusi_controller('index.php/admin/publikasi');
                },
                error: function(x){
                    console.log(x);
                }           
           });
   }
   
   return false;
 })
 </script>