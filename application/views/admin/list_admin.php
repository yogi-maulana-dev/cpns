<section class="content-header">
  <h1>
    List
    <small>Admin</small>
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
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('index.php/admin/tambah_admin?act=new')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a></h3>
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
        <th>Email</th>
        <th>Nama</th>
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
          <td><?php echo $news->email; ?></td>
          <td><?php echo $news->nama; ?></td>
          <td>
            <a href="#" onclick="hapus_admin('<?php echo $news->id;?>')" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="#" onclick="eksekusi_controller('admin/edit_admin/<?php echo $news->id;?>')" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
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

  function hapus_admin(id){
    if(confirm("Anda yakin?")){
      $.ajax({
        url:"<?php echo base_url().'admin/hapus_admin/'?>"+id,
        type:'get',
        success:function(e){
          eksekusi_controller('admin/admin');
        }
      })
      return false;
    }
  }
</script>
