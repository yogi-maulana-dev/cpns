<section class="content-header">
  <h1>
    List
    <small>Berita</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Data</li>
  </ol>
</section>
<section class="content">
<!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#pemkab" data-toggle="tab">Media Pemkab</a></li>
      <li><a href="#online" data-toggle="tab">Media Online</a></li>
      <li><a href="#cetak" data-toggle="tab">Media Cetak</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="pemkab">
        <a href="#" onclick="eksekusi_controller('index.php/admin/tambah_berita?type=pemkab')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Pemkab</a>
        <br>
        <br>
        <table class="table table-hover" id="list">
          <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php
              $no=0;
              foreach($pemkab as $news)
              {

                $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $news->judul; ?></td>
              <td>
                <a href="#" onclick="hapus_news('<?php echo $news->id;?>')" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                <a href="#" onclick="edit_news('<?php echo $news->id;?>')" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="online">
        <a href="#" onclick="eksekusi_controller('index.php/admin/tambah_online?type=online')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Online</a>
        <br>
        <br>
        <table class="table table-hover" id="list">
          <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php
              $no=0;
              foreach($online as $news)
              {

                $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $news->judul; ?></td>
              <td>
                <a href="#" onclick="hapus_news('<?php echo $news->id;?>')" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                <a href="#" onclick="eksekusi_controller('<?php echo 'admin/tambah_online?id='.$news->id.'&type=online';?>')" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="cetak">
        <a href="#" onclick="eksekusi_controller('index.php/admin/tambah_cetak?type=cetak')" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Cetak</a>
        <br>
        <br>
        <table class="table table-hover" id="list">
          <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php
              $no=0;
              foreach($cetak as $news)
              {

                $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $news->judul; ?></td>
              <td>
                <a href="#" onclick="hapus_news('<?php echo $news->id;?>')" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                <a href="#" onclick="eksekusi_controller('<?php echo 'admin/tambah_cetak?id='.$news->id.'&type=cetak';?>')" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- nav-tabs-custom -->
 
 </section>
 <script>
   $('#list').DataTable()

function hapus_news(id)
{
    if(confirm("Anda yakin menghapus data ini?"))
    {
        $.get("admin/hapus_news/"+id,function(e){
            //alert(e);
            eksekusi_controller('admin/berita');
        });
    }
}
</script>
