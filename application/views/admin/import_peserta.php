<section class="content-header">
  <h1>
    Import
    <small>Peserta</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Peserta Ujian</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">
      <a href="<?php echo base_url()?>assets/format/import_peserta.xlsx" class="btn btn-warning btn-flat"><i class="fa fa-file-excel-o"></i> Download Format</a>
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" action="#" enctype="multipart/form-data" id="import_peserta">
    
    <div class="form-group">
      <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" name="file_excel">
    </div>

    <input type="submit" class="btn btn-flat btn-primary" value="Preview">
  </form>
  <br>
  <br>
  </div>
  <div id="t4_preview" class="table-responsive"></div>
 
 </section>
<script>
 $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });

 $("#import_peserta").on("submit",function(){
  if(confirm("Anda yakin?"))
   {        
    $.ajax({
      url: "<?php echo base_url();?>index.php/admin/preview_import_peserta",
      type: "POST",
      contentType: false,
      processData:false,
      data:  new FormData(this),
      beforeSend: function(){
        $("#t4_preview").html("Loading...");
        $("input[type=submit]").hide();
      },
      success: function(data){
        $("#t4_preview").html(data);
        console.log(data);
      },
      error: function(x){
          console.log(x);
      }           
    });
   }
  return false;
 })
</script>