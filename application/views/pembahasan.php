<!DOCTYPE html>
<html>
<head>
  <title>Pembahasan Simulasi Ujian</title>
  <meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/logo.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
	<?php 

	include 'kop.php';

	echo '<div class="text-center alert alert-warning"><h2>PEMBAHASAN MATERI '.strtoupper($nama_ujian).'</h2></div>';

    $no=0;
    foreach($pembahasan as $qu){
    $no++;
    ?>
    <b><?php echo $no;?>. <?php echo nl2br($qu->pertanyaan);?></b>
        <?php
          if($qu->gambar_soal!=""){
            echo '<img src="'.base_url().'assets/uploads/'.$qu->gambar_soal.'" onclick='."zoomx('".$qu->gambar_soal."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
          }
        ?>
        <ol type="A">
          <li>
              <label>
                <?php echo strip_tags($qu->opt_a);?>
                <?php
                if($qu->gambar_a!=""){
                  echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_a.'" onclick='."zoomx('".$qu->gambar_a."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                }
              ?>
              </label>
            </li>
            <li>
              <label>
                <?php echo strip_tags($qu->opt_b);?>
                <?php
                if($qu->gambar_b!=""){
                  echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_b.'" onclick='."zoomx('".$qu->gambar_b."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                }
              ?>
              </label>
            </li>
            <li>
              <label>
                <?php echo strip_tags($qu->opt_c);?>
                <?php
                if($qu->gambar_c!=""){
                  echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_c.'" onclick='."zoomx('".$qu->gambar_c."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                }
              ?>
              </label>
            </li>
            <li>
              <label>
                <?php echo strip_tags($qu->opt_d);?>
                <?php
                if($qu->gambar_d!=""){
                  echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_d.'" onclick='."zoomx('".$qu->gambar_d."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                  }
                ?>
              </label>
              
            </li>
            <li>
              <label>
                <?php echo strip_tags($qu->opt_e);?>
                <?php
                if($qu->gambar_e!=""){
                  echo '<br><img src="'.base_url().'assets/uploads/'.$qu->gambar_e.'" onclick='."zoomx('".$qu->gambar_e."')".' style="max-width:300px;" class="img img-thumbnail img-fluid" title="Klik gambar untuk memperbesar"><br><br>';
                  }
                ?>
              </label>
            </li>
        </ol>
        <?php
        	$jawaban=$this->m_cat->m_data('jawaban',['pin'=>$pin,'no_ujian'=>$no_ujian,'id_soal'=>$qu->id])->result();

        	if(!empty($jawaban)){
        		echo '<span class="badge badge-info" style="font-size:12pt;">Jawaban anda : '.strtoupper($jawaban[0]->jawab).'</span>';
        	}
        ?>

        <br>
        <br>
        <div>
			<label><b>Pembahasan:</b></label><br>
			<?php echo nl2br($qu->pembahasan);?>
			<?php if($qu->gbr_pembahasan!=""){ ?>
			<img src="<?php echo base_url().'assets/uploads/'.$qu->gbr_pembahasan;?>" class="img img-responsive">
			<?php } ?>
		</div>
		<br>
    </div>
    <?php } ?>
  </div>
</body>
</html>