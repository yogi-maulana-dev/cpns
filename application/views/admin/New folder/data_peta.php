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
        <th>Kecamatan</th>
        <th>Desa</th>
        <th>Koordinat</th>
        <th>ODP</th>
        <th>PDP</th>
        <th>Positif</th>
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
          <td><?php echo $this->m_admin->detail1('master_kecamatan',['kode'=>$news->kecamatan])->result()[0]->nama_kecamatan; ?></td>
          <td><?php echo $this->m_admin->detail1('master_desa',['id_desa'=>$news->desa])->result()[0]->nama_desa; ?></td>
          <td><?php echo $news->koordinat; ?></td>
          <td><?php echo $news->odp; ?></td>
          <td><?php echo $news->pdp; ?></td>
          <td><?php echo $news->positif; ?></td>
          <td>
            <a href="#" onclick="hapus(<?php echo $news->id;?>)" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="#" onclick="eksekusi_controller('admin/edit_peta/<?php echo $news->id;?>')" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
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
