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
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('admin/tambah_covid')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a></h3>
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
        <th>Tanggap</th>
        <th>ODP Pantau</th>
        <th>ODP Selesai</th>
        <th>PDP Rawat</th>
        <th>PDP Sembuh</th>
        <th>Positif Rawat</th>
        <th>Positif Sembuh</th>
        <th>Positif Meninggal</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
          $no=0;
          foreach($data as $news)
          {

            $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $news->tanggal; ?></td>
          <td><?php echo $news->odp_1; ?></td>
          <td><?php echo $news->odp_2;?></td>
          <td><?php echo $news->pdp_3; ?></td>
          <td><?php echo $news->pdp_4; ?></td>
          <td><?php echo $news->positif_5; ?></td>
          <td><?php echo $news->positif_6; ?></td>
          <td><?php echo $news->positif_7; ?></td>
          <td>
            <a href="#" onclick="hapus(<?php echo $news->id;?>)" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="#" onclick="eksekusi_controller('admin/edit_covid/<?php echo $news->id;?>')" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
          </td>
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
          url:'<?php echo base_url();?>admin/delete_covid/'+id,
          type:'get',
          beforeSend:function(){
          },
          success:function(e){
              eksekusi_controller('admin/data_covid');
          }
        });
    }

    return false
}

</script>
