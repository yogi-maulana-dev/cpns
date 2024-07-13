<?php
  $id="";
  $judul="";
  $tanggal="";
  $berita="";
  $foto="";

  if(!empty($edit)){
    $id=$edit[0]->id;
    $judul=$edit[0]->judul;
    $tanggal=date('Y-m-d',strtotime($edit[0]->tanggal));
    $berita=$edit[0]->isi;
    $foto=$edit[0]->foto;
  }
?>


<section class="content-header">
  <h1>
    Media Cetak
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">berita</li>
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
          <label>Tanggal :</label>
          <input type="text" autocomplete="off" name="tanggal" class="form-control" id="tanggal" required="" value="<?php echo $tanggal;?>">
        </div>
        <div class="form-group">
          <label>Judul :</label>
          <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control" required="">
          <input type="text" name="judul" value="<?php echo $judul;?>" id="judul" class="form-control" required="">
        </div>
        <div class="form-group">
          <label>Media :</label>
          <input type="text" name="berita" value="<?php echo $berita;?>" id="media" class="form-control" required="">
          <input type="hidden" name="foto" value="<?php echo $foto;?>" id="" class="form-control" required="">
        </div>
      	<div class="form-group">
          
          <?php
            if($id==""){
              echo '<label>Foto</label>
              <input type="file" class="form-control" name="foto0" required="">
          <div id="tambahi"></div>
          <a href="#" onclick="add_p()"><i class="fa fa-plus"></i></a>';
            }
          ?>
      	</div>
      	<input type="submit" value="Simpan" class="btn btn-sm btn-primary btn-block">
      </form>
    </div>
    
    <!-- body-->
  </div>
 
 </section>
 <script>

  var f = 0;

  function add_p(){
    if(f<=4){
      f++;
      $("#tambahi").append('<input type="file" class="form-control" name="foto'+f+'" required="">');
    }
    console.log(f);
    
  }


 $("#tambah_foto").submit(function(){
    if(confirm("Anda yakin?")){
      $.ajax({
        url:'<?php echo base_url().'admin/simpan_cetak?type='.$this->input->get("type");?>&jlh='+f,
        type:'post',
        contentType: false,
        processData:false,
        data:  new FormData(this),
        success:function(e){
          console.log(e);
          eksekusi_controller('admin/berita');
        },
        error:function(e){
          console.log(e);
        }
      })
    }
    return false;
 })

 $("#tanggal").datepicker({
  autoclose:true,
  format:'yyyy-mm-dd'
 });
 </script>
