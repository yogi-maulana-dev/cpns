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
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('index.php/admin/tambah_pasien?act=new')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a></h3>
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
        <th>Kode Pasien</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Status Pasien</th>
        <th>Kondisi</th>
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
          <td><?php echo $news->kode; ?></td>
          <td><?php echo $news->nama;?></td>
          <td><?php echo $news->alamat_lengkap; ?></td>
          <td><?php echo strtoupper($news->jenis_status); ?></td>
          <td><?php echo $this->m_corona->status($news->jenis_status,$news->status);?></td>
          <td>
            <a href="#" onclick="hapus(<?php echo $news->id_pantau_orang;?>)" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="#" onclick="edit_orang('<?php echo $news->id_pantau_orang;?>')" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="#" onclick="eksekusi_controller('admin/timeline?id=<?php echo $news->id_pantau_orang;?>')" class="btn btn-xs btn-success" title="Timeline"><i class="fa fa-eye"></i></a>
            <a href="#" onclick="eksekusi_controller('admin/pantauan?id=<?php echo $news->id_pantau_orang;?>')" class="btn btn-xs btn bg-navy" title="Status"><i class="fa fa-plus"></i></a>
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

    if(confirm("Anda yakin?")){
      $.ajax({
        url:"<?php echo base_url().'admin/hapus_pantauan/'?>"+id,
        type:'get',
        success:function(e){
          eksekusi_controller('admin/data');
        }
      })
      return false;
    }
}

</script>
