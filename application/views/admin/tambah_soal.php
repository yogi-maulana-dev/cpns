<?php
$id="";
$kategori="";
$pendidikan="";
$bidang_soal="";
$pertanyaan="";
$gambar_soal="";
$opt_a="";
$gambar_a="";
$nilai_a="";
$opt_b="";
$gambar_b="";
$nilai_b="";
$opt_c="";
$gambar_c="";
$nilai_c="";
$opt_d="";
$gambar_d="";
$nilai_d="";
$opt_e="";
$gambar_e="";
$nilai_e="";
$catatan="";
$pembahasan="";
$gbr_pembahasan="";

if(isset($edit)){
  $id=$edit[0]->id;
  $kategori=$edit[0]->kategori;
  $pendidikan=$edit[0]->pendidikan;
  $bidang_soal=$edit[0]->bidang_soal;
  $pertanyaan=$edit[0]->pertanyaan;
  $gambar_soal=$edit[0]->gambar_soal;
  $opt_a=$edit[0]->opt_a;
  $gambar_a=$edit[0]->gambar_a;
  $nilai_a=$edit[0]->nilai_a;
  $opt_b=$edit[0]->opt_b;
  $gambar_b=$edit[0]->gambar_b;
  $nilai_b=$edit[0]->nilai_b;
  $opt_c=$edit[0]->opt_c;
  $gambar_c=$edit[0]->gambar_c;
  $nilai_c=$edit[0]->nilai_c;
  $opt_d=$edit[0]->opt_d;
  $gambar_d=$edit[0]->gambar_d;
  $nilai_d=$edit[0]->nilai_d;
  $opt_e=$edit[0]->opt_e;
  $gambar_e=$edit[0]->gambar_e;
  $nilai_e=$edit[0]->nilai_e;
  $pembahasan=$edit[0]->pembahasan;
  $gbr_pembahasan=$edit[0]->gbr_pembahasan;
  $catatan='';
}
?>
<script src="<?php echo base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
<section class="content-header">
  <h1>
    Tambah
    <small>Soal</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Soal</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>            
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body row">
    <div class="col-sm-12"><?php echo $catatan;?></div>
    <form action="#" id="tambah_soal" method="post" enctype="multipart/form-data">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Kategori</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="hidden" value="<?php echo $id;?>" name="id" id="id_soal" class="form-control" required="" readonly>
            <select class="form-control" name="kategori" required="">
              <option value="">Pilih</option>
              <?php
                foreach ($kateg as $val) {
                  $selectx= $kategori == $val->ket ? 'selected' : '';
                  echo '<option value="'.$val->ket.'" '.$selectx.'>'.$val->ket.'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Pendidikan</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <select class="form-control" name="pendidikan" required="">
              <option value="">Pilih</option>
              <?php
                foreach ($pendi as $pend) {
                  $select= $pendidikan == $pend->ket ? 'selected' : '';
                  echo '<option value="'.$pend->ket.'" '.$select.'>'.$pend->ket.'</option>';
                }
              ?>
            </select>
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tipe/Bidang Studi</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <select class="form-control" name="bidang_soal" id="bidang_soal" required="">
              <option value="">Pilih</option>
              <?php
                foreach ($bidang as $key) {
                  $select= $bidang_soal == $key->ket ? 'selected' : '';
                  echo '<option value="'.$key->ket.'" '.$select.'>'.$key->ket.'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Pertanyaan</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <textarea class="form-control" name="pertanyaan" id="pertanyaan" required=""><?php echo $pertanyaan;?></textarea>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Gambar Pertanyaan</label>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="file" accept="image/*" name="gambar[]" class="form-control">
            <input type="hidden" value="<?php echo $gambar_soal;?>" name="gambar_soal_e" class="form-control">
          </div>
        </div>

        <div class="col-sm-12">
          <table class="table table-bordered table-hover" border="1">
            <tr>
              <th>Pilihan</th>
              <th>Jawaban</th>
              <th>Gambar</th>
              <th>Nilai</th>
            </tr>
            <tr>
              <td>A</td>
              <td>
                <div class="form-group">
                  <textarea class="form-control" name="opt_a" id="opt_a" required=""><?php echo $opt_a;?></textarea>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="file" accept="image/*" name="gambar[]" class="form-control">
                  <input type="hidden" value="<?php echo $gambar_a;?>" name="gambar_aa" class="form-control">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="nilai_a" required="">
                    <option value="">Pilih</option>
                    <?php
                      for ($i=0; $i <= 10 ; $i++) { 
                        $select = $nilai_a == $i ? 'selected' : '';
                         echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                       } 
                    ?>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td>B</td>
              <td>
                <div class="form-group">
                  <textarea class="form-control" name="opt_b" id="opt_b" required=""><?php echo $opt_b;?></textarea>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="file" accept="image/*" name="gambar[]" class="form-control">
                  <input type="hidden" value="<?php echo $gambar_b;?>" name="gambar_bb" class="form-control">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="nilai_b" required="">
                    <option value="">Pilih</option>
                    <?php
                      for ($i=0; $i <= 10 ; $i++) { 
                         $select = $nilai_b == $i ? 'selected' : '';
                         echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                       } 
                    ?>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td>C</td>
              <td>
                <div class="form-group">
                  <textarea class="form-control" name="opt_c" id="opt_c" required=""><?php echo $opt_c;?></textarea>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="file" accept="image/*" name="gambar[]" class="form-control">
                  <input type="hidden" value="<?php echo $gambar_c;?>" name="gambar_cc" class="form-control">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" value="<?php echo $nilai_c;?>" name="nilai_c" required="">
                    <option value="">Pilih</option>
                    <?php
                      for ($i=0; $i <= 10 ; $i++) { 
                         $select = $nilai_c == $i ? 'selected' : '';
                         echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                       } 
                    ?>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td>D</td>
              <td>
                <div class="form-group">
                  <textarea class="form-control" name="opt_d" id="opt_d" required=""><?php echo $opt_d;?></textarea>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="file" accept="image/*" name="gambar[]" class="form-control">
                  <input type="hidden" value="<?php echo $gambar_d;?>" name="gambar_dd" class="form-control">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="nilai_d" required="">
                    <option value="">Pilih</option>
                    <?php
                      for ($i=0; $i <= 10 ; $i++) { 
                         $select = $nilai_d == $i ? 'selected' : '';
                         echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                       } 
                    ?>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td>E</td>
              <td>
                <div class="form-group">
                  <textarea class="form-control" name="opt_e" id="opt_e" required=""><?php echo $opt_e;?></textarea>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="file" accept="image/*" name="gambar[]" class="form-control">
                  <input type="hidden" value="<?php echo $gambar_e;?>" name="gambar_ee" class="form-control">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="nilai_e" required="">
                    <option value="">Pilih</option>
                    <?php
                      for ($i=0; $i <= 10 ; $i++) { 
                         $select = $nilai_e == $i ? 'selected' : '';
                         echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                       } 
                    ?>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td>Pembahasan</td>
              <td>
                <div class="form-group">
                  <textarea class="form-control" name="pembahasan" id="pembahasan"><?php echo $pembahasan;?></textarea>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="file" accept="image/*" name="gambar[]" class="form-control">
                  <input type="hidden" value="<?php echo $gbr_pembahasan;?>" name="gbr_pembahasan" class="form-control">
                </div>
              </td>
              <td>
                <div class="form-group">
                  
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary btn-flat btn-block"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <button onclick="eksekusi_controller('admin/soal')" class="btn btn-sm btn-danger btn-flat btn-block"><i class="fa fa-close"></i> Batal</button>
          </div>
        </div>
    </form>
    
    <!-- body-->
  </div>
 
 </section>
 </section>
 <script>

if(typeof CKEDITOR == 'undefined'){
    document.write('CKEditor not found');
}
else{
    var pertanyaan = CKEDITOR.replace( 'pertanyaan' );
    var opt_a = CKEDITOR.replace( 'opt_a' );
    var opt_b = CKEDITOR.replace( 'opt_b' );
    var opt_c = CKEDITOR.replace( 'opt_c' );
    var opt_d = CKEDITOR.replace( 'opt_d' );
    var opt_e = CKEDITOR.replace( 'opt_e' );
}

$("#tambah_soal").submit(function(){

  for ( instance in CKEDITOR.instances ){
    CKEDITOR.instances[instance].updateElement();
  }

   if(confirm("Anda yakin?"))
   {        
    $.ajax({
      url: "<?php echo base_url();?>index.php/admin/simpan_soal",
      type: "POST",
      contentType: false,
      processData:false,
      data:  new FormData(this),
      beforeSend: function(){
      },
      success: function(data){
        console.log(data);
        eksekusi_controller('index.php/admin/soal');
      },
      error: function(x){
          console.log(x);
      }           
    });
   }
   
   return false;
 })

$("#bidang_soal").select2();  
 </script>