<section class="content-header">
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Admin</li>
  </ol> -->
</section>
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan Nilai</h3>
    </div>
    <div class="box-body row">
      <div class="col-md-6 col-md-offset-3">
        <form action="#" id="cari_pin" method="POST">
          <div class="form-group">
            <input type="number" name="pin" id="pin" class="form-control text-center" placeholder="PIN" required="">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Tampilkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="t4_tombol"></div>
  <div id="t4_nilai"></div>
 </section>
 <script>

$("#cari_pin").submit(function(){

    var pin = $("#pin").val();
       
    $.ajax({
      url: "<?php echo base_url();?>index.php/admin/cari_nilai",
      type: "POST",
      contentType: false,
      processData:false,
      data:  new FormData(this),
      beforeSend: function(){
        $("#t4_nilai").html("");
        $("#t4_tombol").html("");
      },
      success: function(data){
        // console.log(data);
        $("#t4_nilai").html(data);
        if(data=='<div class="alert alert-danger">PIN tidak ditemukan</div>'){
         $("#t4_tombol").html(""); 
        }
        else{
          $("#t4_tombol").html('<button class="btn btn-flat btn-primary" title="Download Pdf" onclick="file_pdf('+'`'+pin+'`'+')"><i class="fa fa-file-pdf-o"></i></button> <button class="btn btn-flat btn-success" title="Download Excel" onclick="file_excel('+'`'+pin+'`'+')"><i class="fa fa-file-excel-o"></i></button><br><br>');
        }
      },
      error: function(x){
          console.log(x);
      }
    });

   return false;
 })

  function file_pdf(pin){
    // alert(pin)
    window.open('<?php echo base_url()?>admin/export_pdf?pin='+pin);
  }

  function file_excel(pin){
    // alert(pin)
    window.open('<?php echo base_url()?>admin/export_excel?pin='+pin);
  }

 </script>
