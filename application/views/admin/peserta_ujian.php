<section class="content-header">
  <h1>
    Daftar
    <small>Peserta Ujian</small>
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
      <a href="#" onclick="eksekusi_controller('index.php/admin/tambah_peserta_ujian')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a>
      <a href="#" onclick="eksekusi_controller('index.php/admin/import_peserta')" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i></a>
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <?php
      if($double->num_rows()>0){
        $ec='<div class="alert alert-danger">Nomor ujian dibawahn ini duplikat. Segera perbaiki agar tidak menyediakan data yang salah<br>';
        foreach($double->result() as $doub){
          $ec.=$doub->no_ujian.',';
        }
        $ec.='</div>';
        echo $ec;
      }
    ?>
    <table class="table table-hover" id="listsoal">
      <thead>
        <th>No</th>
        <th>No. Ujian</th>
        <th>Nama</th>
        <th>Tempat & Tgl Lahir</th>
        <th>Sekolah / Asal ujian</th>
        <th>Pendidikan</th>
        <th>Kategori</th>
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
          url: "<?php echo base_url().'admin/list_peserta_ujian';?>",
          type:'POST',
        }
    });

  function hapus_peserta(id){
    if(confirm("Hapus?")){
      $.ajax({
        url:'<?php echo base_url('admin/hapus_peserta_ujian/')?>'+id,
        type:'get',
        success:function(e){
          eksekusi_controller('admin/peserta_ujian');
        }
      })
      return false;
    }
  }

  function edit_peserta(id){
    eksekusi_controller('admin/edit_peserta_ujian/'+id);
  }

 </script>