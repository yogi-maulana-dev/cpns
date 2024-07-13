<section class="content-header">
  <h1>
    List
    <small>Timeline</small>
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
    <h3 class="box-title">Timelin Pasien</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <b><?php echo $orang[0]->nama;?></b><br>
    <b><?php echo $orang[0]->alamat_lengkap;?></b><br>
    <b>
      <?php 
            $tmt = new DateTime($orang[0]->tgl_lahir);
            $now = new DateTime(date('Y-m-d'));
            $month=$tmt->diff($now)->m;
            $year=$tmt->diff($now)->y;  // + ($tmt->diff($now)->y*12) mencari bulan
            echo "$year Tahun $month Bulan";
      ?>
    </b><br>
    <br>
    <br>
    <table class="table table-hover">
      <thead>
        <th>No</th>
        <th>Jenis Status</th>
        <th>Status</th>
        <th>Tanggal/Waktu</th>
        <th>Diagnosa</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
          $no=0;
          foreach($time as $news)
          {

            $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo strtoupper($news->jenis_status); ?></td>
          <td><?php echo $this->m_corona->status($news->jenis_status,$news->status);?></td>
          <td><?php echo date('d/m/Y',strtotime($news->tanggal))." ".date('H:i',strtotime($news->tanggal)); ?></td>
          <td><?php echo nl2br($news->diagnosa); ?></td>
          <td>
            <a href="#" onclick="hapus(<?php echo $news->id_pantau_orang;?>)" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
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
        $.get("admin/admin/hapus/"+id,function(e){
            //alert(e);
            eksekusi_controller('index.php/admin/admin/berita');
        });
    }
}
 </script>