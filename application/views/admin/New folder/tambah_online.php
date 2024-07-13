<?php
  $id="";
  $judul="";
  $tanggal="";
  $berita="";
  $sumber="";

  if(!empty($edit)){
    $id=$edit[0]->id;
    $judul=$edit[0]->judul;
    $tanggal=date('Y-m-d',strtotime($edit[0]->tanggal));
    $berita=$edit[0]->isi;
    $sumber=$edit[0]->sumber;
  }
?>
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

    <form action="#" id="tambah_berita" method="post" enctype="multipart/form-data">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Judul</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id;?>" id="id_berita" class="form-control" required="">
            <input type="text" name="judul" value="<?php echo $judul;?>" id="judul" class="form-control" required="">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tanggal</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" name="tanggal" value="<?php echo $tanggal;?>" id="tanggal" class="form-control" required="">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Media</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" name="berita" value="<?php echo $berita;?>" id="media" class="form-control" required="">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Link Sumber</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" name="sumber" value="<?php echo $sumber;?>" class="form-control" required="">
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
                url: "<?php echo base_url().'index.php/admin/simpan_berita?type='.$this->input->get("type");?>",
                type: "POST",
                contentType: false,
                processData:false,
                data:  new FormData(this),
                beforeSend: function(){
                },
                success: function(data){
                  console.log(data);
                  eksekusi_controller('index.php/admin/berita');
                },
                error: function(x){
                    console.log(x);
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