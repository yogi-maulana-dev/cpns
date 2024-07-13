<?php
$id="";
$nama="";
$email="";
if(isset($edit)){
  $id=$edit[0]->id;
  $nama=$edit[0]->nama;
  $email=$edit[0]->email;
}
?>
<section class="content-header">
  <h1>
    Tambah
    <small>Admin</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Admin</li>
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
            <label>Email</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control" required="">
            <input type="email" name="email" value="<?php echo $email;?>" id="email" class="form-control" required="">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Nama</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" name="nama" value="<?php echo $nama;?>" id="nama" class="form-control" required="">
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
                url: "<?php echo base_url();?>index.php/admin/simpan_admin",
                type: "POST",
                contentType: false,
                processData:false,
                data:  new FormData(this),
                beforeSend: function(){
                },
                success: function(data){
                  console.log(data);
                  eksekusi_controller('index.php/admin/admin');
                },
                error: function(x){
                    console.log(x);
                }           
           });
   }
   
   return false;
 })
 </script>