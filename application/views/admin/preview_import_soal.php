<script>
 $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
</script>

<?php
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
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
      <th><?php echo strtoupper('kategori');?></th>
      <th><?php echo strtoupper('pendidikan');?></th>
      <th><?php echo strtoupper('bidang soal');?></th>
      <th><?php echo strtoupper('pertanyaan');?></th>
      <th><?php echo strtoupper('gambar soal');?></th>
      <th><?php echo strtoupper('option a');?></th>
      <th><?php echo strtoupper('gambar a');?></th>
      <th><?php echo strtoupper('nilai a');?></th>
      <th><?php echo strtoupper('option b');?></th>
      <th><?php echo strtoupper('gambar b');?></th>
      <th><?php echo strtoupper('nilai b');?></th>
      <th><?php echo strtoupper('option c');?></th>
      <th><?php echo strtoupper('gambar c');?></th>
      <th><?php echo strtoupper('nilai c');?></th>
      <th><?php echo strtoupper('option d');?></th>
      <th><?php echo strtoupper('gambar d');?></th>
      <th><?php echo strtoupper('nilai d');?></th>
      <th><?php echo strtoupper('option e');?></th>
      <th><?php echo strtoupper('gambar e');?></th>
      <th><?php echo strtoupper('nilai e');?></th>
      <th><?php echo strtoupper('pembahasan');?></th>
    </tr>

  <?php
    
    $numrow = 1;
    $kosong = 0;
    $no=0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $kategori=$row['B'];
      $pendidikan=$row['C'];
      $bidang_soal=$row['D'];
      $pertanyaan=$row['E'];
      $gambar_soal=$row['F'];
      $opt_a=$row['G'];
      $gambar_a=$row['H'];
      $nilai_a=$row['I'];
      $opt_b=$row['J'];
      $gambar_b=$row['K'];
      $nilai_b=$row['L'];
      $opt_c=$row['M'];
      $gambar_c=$row['N'];
      $nilai_c=$row['O'];
      $opt_d=$row['P'];
      $gambar_d=$row['Q'];
      $nilai_d=$row['R'];
      $opt_e=$row['S'];
      $gambar_e=$row['T'];
      $nilai_e=$row['U'];
      $bahas=$row['V'];
      
      // Cek jika semua data tidak diisi
      if(empty($kategori) && empty($pendidikan) && empty($bidang_soal) && empty($pertanyaan) && empty($gambar_soal) && empty($opt_a) && empty($gambar_a) && empty($nilai_a) && empty($opt_b) && empty($gambar_b) && empty($nilai_b) && empty($opt_c) && empty($gambar_c) && empty($nilai_c) && empty($opt_d) && empty($gambar_d) && empty($nilai_d) && empty($opt_e) && empty($gambar_e) && empty($nilai_e) && empty($bahas))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $kategori_td = $kategori=="" ? " style='background: #E07171;'" : "";
        $pendidikan_td = $pendidikan=="" ? " style='background: #E07171;'" : "";
        $bidang_soal_td = $bidang_soal=="" ? " style='background: #E07171;'" : "";
        $pertanyaan_td = $pertanyaan=="" ? " style='background: #E07171;'" : "";
        $gambar_soal_td = $gambar_soal=="" ? " style='background: #E07171;'" : "";
        $opt_a_td = $opt_a=="" ? " style='background: #E07171;'" : "";
        $gambar_a_td = $gambar_a=="" ? " style='background: #E07171;'" : "";
        $nilai_a_td = $nilai_a=="" ? " style='background: #E07171;'" : "";
        $opt_b_td = $opt_b=="" ? " style='background: #E07171;'" : "";
        $gambar_b_td = $gambar_b=="" ? " style='background: #E07171;'" : "";
        $nilai_b_td = $nilai_b=="" ? " style='background: #E07171;'" : "";
        $opt_c_td = $opt_c=="" ? " style='background: #E07171;'" : "";
        $gambar_c_td = $gambar_c=="" ? " style='background: #E07171;'" : "";
        $nilai_c_td = $nilai_c=="" ? " style='background: #E07171;'" : "";
        $opt_d_td = $opt_d=="" ? " style='background: #E07171;'" : "";
        $gambar_d_td = $gambar_d=="" ? " style='background: #E07171;'" : "";
        $nilai_d_td = $nilai_d=="" ? " style='background: #E07171;'" : "";
        $opt_e_td = $opt_e=="" ? " style='background: #E07171;'" : "";
        $gambar_e_td = $gambar_e=="" ? " style='background: #E07171;'" : "";
        $nilai_e_td = $nilai_e=="" ? " style='background: #E07171;'" : "";
        $bahas_td = $bahas=="" ? " style='background: #E07171;'" : "";
        
        // Jika salah satu data ada yang kosong
        if(empty($kategori) OR empty($pendidikan) OR empty($bidang_soal) OR empty($pertanyaan) OR empty($gambar_soal) OR empty($opt_a) OR empty($gambar_a) OR empty($nilai_a) OR empty($opt_b) OR empty($gambar_b) OR empty($nilai_b) OR empty($opt_c) OR empty($gambar_c) OR empty($nilai_c) OR empty($opt_d) OR empty($gambar_d) OR empty($nilai_d) OR empty($opt_e) OR empty($gambar_e) OR empty($nilai_e) OR empty($bahas)){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo '<td>'.$no.'</td>';
        echo '<td '.$kategori_td.'>'.$kategori.'</td>';
        echo '<td '.$pendidikan_td.'>'.$pendidikan.'</td>';
        echo '<td '.$bidang_soal_td.'>'.$bidang_soal.'</td>';
        echo '<td '.$pertanyaan_td.'>'.$pertanyaan.'</td>';
        echo '<td '.$gambar_soal_td.'>'.$gambar_soal.'</td>';
        echo '<td '.$opt_a_td.'>'.$opt_a.'</td>';
        echo '<td '.$gambar_a_td.'>'.$gambar_a.'</td>';
        echo '<td '.$nilai_a_td.'>'.$nilai_a.'</td>';
        echo '<td '.$opt_b_td.'>'.$opt_b.'</td>';
        echo '<td '.$gambar_b_td.'>'.$gambar_b.'</td>';
        echo '<td '.$nilai_b_td.'>'.$nilai_b.'</td>';
        echo '<td '.$opt_c_td.'>'.$opt_c.'</td>';
        echo '<td '.$gambar_c_td.'>'.$gambar_c.'</td>';
        echo '<td '.$nilai_c_td.'>'.$nilai_c.'</td>';
        echo '<td '.$opt_d_td.'>'.$opt_d.'</td>';
        echo '<td '.$gambar_d_td.'>'.$gambar_d.'</td>';
        echo '<td '.$nilai_d_td.'>'.$nilai_d.'</td>';
        echo '<td '.$opt_e_td.'>'.$opt_e.'</td>';
        echo '<td '.$gambar_e_td.'>'.$gambar_e.'</td>';
        echo '<td '.$nilai_e_td.'>'.$nilai_e.'</td>';
        echo '<td '.$bahas_td.'>'.$bahas.'</td>';
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
        <a href='#' class='btn btn-sm btn-danger btn-block' onclick='eksekusi_controller(".'"admin/soal"'.")'>Cancel</a>
      </div>";
    
    echo "</form>
    </div>";
?>
<script type="text/javascript">
  $("#simpan_import").on("submit",function(){
    if(confirm("Anda yakin?")){
      $.ajax({
        url : '<?php echo base_url()."admin/simpan_import_soal?file=".$file;?>',
        type : 'get',
        beforeSend:function(){
          $("#t4_tombol").html("Sedang menyimpan...");
        },
        success:function(e){
          console.log(e);
          eksekusi_controller('admin/soal');
        },
        error:function(x){
          console.log(x);
        }
      });
    }
    return false;
  })
</script>