
<section class="content-header">
  <h1>
    Data
    <small>Admin</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Data admin</li>
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

    <div class="col-sm-12 col-lg-10">
      <form action="" method="post" id="edit_profil" enctype="multipart/form-data">
      <div class="col-sm-2">
        <div class="form-group">
          <label>Nama</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="hidden" value="<?php echo $profil[0]->id_admin; ?>" name="id_admin" class="form-control" required="">
          <input type="text" value="<?php echo $profil[0]->nama;?>" name="nama" class="form-control" required="">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Jabatan</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <select name="jabatan" class="form-control" required="">
            <option value="">--Pilih--</option>
            <option value="KEPALA DESA">KEPALA DESA</option>
            <option value="SEKRETARIS DESA">SEKRETARIS DESA</option>
            <option value="BENDEHARA DESA">BENDEHARA DESA</option>
            <option value="OPERATOR DESA">OPERATOR DESA</option>
            <option value="PERANGKAT DESA">PERANGKAT DESA</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Email</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="email" value="<?php echo $profil[0]->email;?>" name="email" class="form-control" required="">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Alamat</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <textarea class="form-control" name="alamat" required=""><?php echo $profil[0]->alamat;?></textarea>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>HP</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" value="<?php echo $profil[0]->hp;?>" name="hp" class="form-control">
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
          <label>Password</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="password" name="password" class="form-control" required="">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label>Ulangi Password</label>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="password" name="password2" class="form-control" required="">
        </div>
      </div>
      <div class="col-sm-12"></div>
      <div class="col-sm-2">
        <div class="form-group">
          
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="submit" value="Simpan" class="btn btn-block btn-sm btn-primary">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          
        </div>
      </div>
      <div class="col-sm-10">
        <div class="form-group" id="info">
          
        </div>
      </div>
    </form>
    </div>
    <div class="col-sm-12 col-lg-2">
      
    </div>

    
    <!-- body-->
  </div>
 
 </section>
 <script>
 $("#edit_profil").submit(function(){

   if(confirm("Simpan perubahan?"))
   {        
    $.ajax({
                url: "<?php echo base_url();?>index.php/admin/admin/simpan_profil",
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
                eksekusi_controller('index.php/admin/admin/admin');
                },
                error: function(x){
                    console.log(x);
                }           
           });
   }
   
   return false;
 })
 </script>
