<script src="<?php echo base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
<section class="content-header">
  <h1>
    Tambah
    <small>Berita</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Berita</li>
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

    <form action="#" id="edit_berita" method="post" enctype="multipart/form-data">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Judul</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="hidden" name="id_berita" value="<?php echo $edit[0]->id_berita;?>" class="form-control" required="">

            <input type="text" name="judul" value="<?php echo $edit[0]->judul;?>" class="form-control" required="">

            <input type="hidden" name="foto" value="<?php echo $edit[0]->image;?>" class="form-control" required="">

          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Foto</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="file" name="image" class="form-control" required="">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Berita</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <textarea id="editor" name="berita" rows="10" cols="80" class="form-control" required=""><?php echo $edit[0]->berita;?></textarea>
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

if ( typeof CKEDITOR == 'undefined' )
{
    document.write(
        'CKEditor not found');
}
else
{
    var editor = CKEDITOR.replace( 'editor' );
}

$("#edit_berita").submit(function(){


  for ( instance in CKEDITOR.instances ){
    CKEDITOR.instances[instance].updateElement();
  }


   if(confirm("Anda yakin mengubah berita?"))
   {        
    $.ajax({
                url: "<?php echo base_url();?>index.php/admin/admin/simpan_edit",
                type: "POST",
                contentType: false,
                processData:false,
                data:  new FormData(this),
                beforeSend: function(){
                    //$("#body-overlay").show();
                },
                success: function(data){
                    //$("#targetLayer").html(data);
                    //$("#targetLayer").css('opacity','1');
                    setInterval(function(){
                        //$("#body-overlay").hide(); 
                    },500);
                eksekusi_controller('index.php/admin/admin/berita');
                },
                error: function(x){
                    console.log(x);
                }           
           });
   }
   
   return false;
 })
 </script>