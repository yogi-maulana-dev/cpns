<section class="content-header">
  <h1>
    List
    <small>Pasien</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Data</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('admin/tambah_peta')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">

    <table class="table table-hover" id="list">
      <thead>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>No. HP</th>
        <th>Alamat</th>
        <th>Pengaduan</th>
      </thead>
      <tbody>
        <?php
          $no=0;
          foreach($adu as $news)
          {

            $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $news->tanggal; ?></td>
          <td><?php echo $news->nama; ?></td>
          <td><?php echo $news->hp; ?></td>
          <td><?php echo $news->alamat; ?></td>
          <td><?php echo nl2br($news->isi); ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <!-- body-->
  </div>
 
 </section>
 <script>
   $('#list').DataTable()

function hapus(id)
{
    if(confirm("Anda yakin menghapus data ini?"))
    {
      $.ajax({
          url:'<?php echo base_url();?>admin/delete_peta/'+id,
          type:'get',
          beforeSend:function(){
          },
          success:function(e){
              eksekusi_controller('admin/data_peta');
          }
        });
    }
}

</script>
