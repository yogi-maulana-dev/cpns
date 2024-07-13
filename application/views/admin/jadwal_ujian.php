<section class="content-header">
  <h1>
    Jadwal
    <small>Ujian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Jadwal Ujian</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('index.php/admin/tambah_jadwal_ujian')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">

    <table class="table table-hover" id="listjadwal">
      <thead>
        <th>No</th>
        <th>PIN Sesi</th>
        <th>Nama Ujian</th>
        <th>Tempat</th>
        <th>Tanggal</th>
        <th>Jam Ujian Mulai</th>
        <th>Lama Ujian</th>
        <th>Batas Terlambat</th>
        <th>Jlh Peserta</th>
        <th>Kategori</th>
        <th>Soal</th>
        <th>Jlh Soal</th>
        <th>Passing Grade</th>
        <th>Urutan Soal</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>

    <!-- body-->
  </div>
 
 </section>
 <script>
   $("#listjadwal").DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo base_url().'admin/list_jadwal_ujian';?>",
          type:'POST',
        }
    });

   function hapus_jadwal(id) {
     if(confirm("Hapus?")){
      $.ajax({
        url : '<?php echo base_url()?>admin/hapus_jadwal/'+id,
        type :'get',
        success:function(){
          eksekusi_controller('admin/jadwal_ujian');
        }
      });
     }
   }

   function edit_jadwal(id){
    eksekusi_controller('admin/edit_jadwal/'+id);
   }
 </script>