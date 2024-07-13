<section class="content-header">
  <h1>
    List
    <small>Berita</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Berita</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="#" onclick="eksekusi_controller('index.php/admin/admin/tambah_admin')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></a></h3>
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
        <th>Nama</th>
        <th>Jabatan</th>
        <th>No. HP</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
          $no=0;
          foreach($admin as $new)
          {

            $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $new->nama; ?></td>
          <td><?php echo $new->jabatan; ?></td>
          <td><?php echo $new->hp; ?></td>
          <td><?php echo $new->email; ?></td>
          <td><?php echo $new->alamat; ?></td>
          <td>
            <?php 
              $aktif=$new->status;
              if($aktif=="1")
              {
                $a="<span class='bg-success' style='padding:3px;'>Aktif</span>";
              }
              else
              {
                $a="<span class='bg-danger' style='padding:3px;'>Blokir</span>";
              }
              echo "$a";
            ?>
          </td>
          <td>
            <?php
              if($aktif=="1")
              {
            ?>
            <a href="#" onclick="nonaktif(<?php echo $new->id_admin;?>)" class="btn btn-xs btn-danger" title="Non Aktifkan"><i class="fa fa-close"></i></a>
            <?php
              }
              else
              {
            ?>
            <a href="#" onclick="aktif(<?php echo $new->id_admin;?>)" class="btn btn-xs btn-success" title="Aktifkan"><i class="fa fa-check-square-o"></i></a>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <!-- body-->
  </div>
 
 </section>
 <script>
   $('#lit').DataTable()

function nonaktif(id)
{
    if(confirm("Non aktifkan akun ini?"))
    {
        $.get("admin/admin/nonaktif/"+id,function(e){
            //alert(e);
            eksekusi_controller('index.php/admin/admin/admin');
        });
    }
}

function aktif(id)
{
    if(confirm("Aktifkan akun ini?"))
    {
        $.get("admin/admin/aktif/"+id,function(e){
            //alert(e);
            eksekusi_controller('index.php/admin/admin/admin');
        });
    }
}
 </script>