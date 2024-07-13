<section class="content-header">
  <h1>
    List
    <small>Covid-19</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Data Total</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('index.php/admin/tambahdatatotal')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a></h3>
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
        <th>Kecamatan</th>
        <th>ODP</th>
        <th>PDP</th>
        <th>Positif Covid-19</th>
        <th>Keterangan</th>
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
          <td><?php echo date('d/m/Y',strtotime($news->tanggal));?></td>
          <td><?php echo $this->m_admin->detail1('master_kecamatan',['kode'=>$news->kecamatan])->result()[0]->nama_kecamatan;?></td>
          <td><?php echo $news->odp;?></td>
          <td><?php echo $news->pdp;?></td>
          <td><?php echo $news->positif;?></td>
          <td><?php echo $news->keterangan;?></td>
          <td>
            <a href="#" onclick="hapus_s(<?php echo $news->id;?>)" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="#" onclick="eksekusi_controller('admin/editdatatotal/<?php echo $news->id;?>')" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
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

function hapus_s(id)
{
    if(confirm("Anda yakin menghapus data ini?")){
      $.ajax({
        url:'<?php echo base_url();?>admin/deletedatatotal/'+id,
        type:'get',
        success:function(e){
          console.log(e);
          eksekusi_controller('admin/datatotal');
        }
      })
      return false;
    }
}

</script>
