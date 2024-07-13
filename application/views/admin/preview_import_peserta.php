<script>
 $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
    $("#kosong_2").hide();
  });
</script>

<?php
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div class='alert alert-danger'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
?>
<div class="box-body">
<form action="#" method="post" id="simpan_import">
  <div class="alert alert-danger" id='kosong'>
    Data belum lengkap ada <span id='jumlah_kosong'></span> baris.
  </div>
  <table class="table table-striped">
    <tr>
      <th>No.</th>
      <th><?php echo strtoupper('no ujian');?></th>
      <th><?php echo strtoupper('nama');?></th>
      <th><?php echo strtoupper('tempat lahir');?></th>
      <th><?php echo strtoupper('tgl lahir');?></th>
      <th><?php echo strtoupper('asal ujian');?></th>
      <th><?php echo strtoupper('kategori');?></th>
      <th><?php echo strtoupper('pendidikan');?></th>
    </tr>

  <?php
    
    $numrow = 1;
    $kosong = 0;
    $no=0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $no_ujian=$row['B'];
      $nama=$row['C'];
      $tempat=$row['D'];
      $tgl_lahir=$row['E'];
      $asal_ujian=$row['F'];
      $kategori=$row['G'];
      $pendidikan=$row['H'];
      
      // Cek jika semua data tidak diisi
      if( empty($no_ujian) && empty($nama) && empty($tempat) && empty($tgl_lahir) && empty($asal_ujian) && empty($kategori) && empty($pendidikan))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $no_ujian_td = $no_ujian=="" ? "style='background: #E07171;'" : "";
        $nama_td = $nama=="" ? "style='background: #E07171;'" : "";
        $tempat_td = $tempat=="" ? "style='background: #E07171;'" : "";
        $tgl_lahir_td = $tgl_lahir=="" ? "style='background: #E07171;'" : "";
        $asal_ujian_td = $asal_ujian=="" ? "style='background: #E07171;'" : "";
        $kategori_td = $kategori=="" ? "style='background: #E07171;'" : "";
        $pendidikan_td = $pendidikan=="" ? "style='background: #E07171;'" : "";
        
        // Jika salah satu data ada yang kosong
        if( empty($no_ujian) OR empty($nama) OR empty($tempat) OR empty($tgl_lahir) OR empty($asal_ujian) OR empty($kategori) OR empty($pendidikan)){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo '<td>'.$no.'</td>';
        echo '<td '.$no_ujian_td.'>'.$no_ujian.'</td>';
        echo '<td '.$nama_td.'>'.$nama.'</td>';
        echo '<td '.$tempat_td.'>'.$tempat.'</td>';
        echo '<td '.$tgl_lahir_td.'>'.$tgl_lahir.'</td>';
        echo '<td '.$asal_ujian_td.'>'.$asal_ujian.'</td>';
        echo '<td '.$kategori_td.'>'.$kategori.'</td>';
        echo '<td '.$pendidikan_td.'>'.$pendidikan.'</td>';
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
      $no++;
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 1
    // Jika lebih dari 1, berarti ada data yang masih kosong
    if($kosong > 0)
    {
      ?>  
        <script>
        $(document).ready(function(){
          // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
          $("#jumlah_kosong").html('<?php echo $kosong; ?>');
          $("#jumlah_kosong_2").html('<?php echo $kosong; ?>');
          
          $("#kosong").show(); // Munculkan alert validasi kosong
        });
        </script>
      <?php
    }
     // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo '<div class="alert alert-danger" id="kosong_2">
    Data belum lengkap ada <span id="jumlah_kosong_2"></span> baris. Apakah anda tetap ingin mengimport? Klik import untuk mengimport atau Cancel untuk membatalkan
  </div>';
      echo "
      <div class='col-md-6'>
        <div id='t4_tombol'><button type='submit' class='btn btn-primary btn-sm btn-flat btn-block'>Import</button></div>
      </div>
      <div class='col-md-6'>
        <a href='#' class='btn btn-sm btn-danger btn-block' onclick='eksekusi_controller(".'"admin/peserta_ujian"'.")'>Cancel</a>
      </div>";
    
    echo "</form>
    </div>";
?>
<script type="text/javascript">
  $("#simpan_import").on("submit",function(){
    if(confirm("Anda yakin?")){
      $.ajax({
        url : '<?php echo base_url()."admin/simpan_import_peserta?file=".$file;?>',
        type : 'get',
        beforeSend:function(){
          $("#t4_tombol").html("Sedang menyimpan...");
        },
        success:function(e){
          console.log(e);
          eksekusi_controller('admin/peserta_ujian');
        },
        error:function(x){
          console.log(x);
        }
      });
    }
    return false;
  })
</script>