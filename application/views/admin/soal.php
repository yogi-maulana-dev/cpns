<section class="content-header">
  <h1>
    Daftar
    <small>Soal</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Soal</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">
      <a href="#" onclick="eksekusi_controller('index.php/admin/tambah_soal')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a>
      <a href="#" onclick="eksekusi_controller('index.php/admin/import_soal')" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i></a>
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table class="table table-hover" id="listsoal">
      <thead>
        <th>No</th>
        <th>Kategori</th>
        <th>Pendidikan</th>
        <th>Tipe/b. studi</th>
        <th>Pertanyaan</th>
        <th>Aksi</th>
      </thead>
    </table>
    <!-- body-->
  </div>
 
 </section>

 <script>
  $("#listsoal").DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo base_url().'admin/list_soal';?>",
          type:'POST',
        }
    });

  function hapus_soal(id){
    if(confirm("Hapus?")){
      $.ajax({
        url : '<?php echo base_url()?>admin/hapus_soal/'+id,
        type : 'get',
        success:function(e){
          eksekusi_controller('admin/soal');
        }

      });
    }
  }

  function edit_soal(id){
    eksekusi_controller('admin/edit_soal/'+id);
  }

  function detail_soal(id){
    $.ajax({
      url : '<?php echo base_url()?>admin/detail_soal/'+id,
      type : 'get',
      success:function(e){
        $(".modal-content").html(e);
        $(".modal").modal('toggle');
      }

    });
  }

 </script>