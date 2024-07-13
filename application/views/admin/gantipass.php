<section class="content">
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Ganti Password</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form action="#" method="post" id="gantipass">
          <div class="form-group">
            <input type="password" name="password1" placeholder="Password" required="" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="password2" placeholder="Ulangi Password" required="" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
          </div>
        </form>
      </div>
    </div>
    <div id="info"></div>
    <!-- body-->
  </div>
 
 </section>
 <script>
 $("#gantipass").submit(function(){
     
     if(confirm("Anda yakin?"))
     {              
         $.post("admin/gantipasssave",$(this).serialize(),function(e){
            $("#info").html('<div class="alert alert-warning"><b>'+e+'</b></div>');
         })
     }
     
     return false;
 })
 </script>
