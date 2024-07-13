<?php if(isset($type)){ ?>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Nilai <?php echo ucwords($nama_ujian);?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/font-awesome-4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    table{
      border: 1 px solid;
    }
    table,tr,td,th{
      padding: 5px;
    }
  </style>
</head>
<body>
<?php } ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan Nilai <?php echo ucwords($nama_ujian);?></h3>
    </div>
    <div class="box-body">
      <table class="table table-striped" <?php if(isset($type)){ echo 'border="1"'; }?>>
          <tr>
            <th width="50">No</th>
            <th width="100">No. Ujian</th>
            <th width="200">Nama</th>
            <th width="100">Asal Ujian</th>
            <?php
            $exp=explode(",", $bidang_soal);
            // array_multisort($exp, SORT_ASC);
            for ($i=0; $i < count($exp); $i++) { 
              echo '<th width="50">'.$exp[$i].'</th>';
            }
            ?>
            <th width="50">Total</th>
            <th width="100">KET</th>
          </tr>
          <?php
          $no=0;
            $y=array();

            foreach ($live->result() as $x) { 
            
              $expnilai=explode(",", $x->nilai);
              $expgrade=explode(",", $grade);

              $tot=0;
                $status="";
                $m=array();
                for ($i=0; $i < count($exp); $i++) { 

                  $nilai_per_bidang=$this->m_cat->m_nilai($x->pin,$x->no_ujian,$exp[$i])->result();

                  $tot+=@$nilai_per_bidang[0]->nilai;

                  if($nilai_per_bidang[0]->nilai >= $expgrade[$i]){
                    $status.="LULUS ";
                  }
                  else{
                    $status.="GAGAL ";
                  }
                  $m[]=array(
                    $exp[$i] => $nilai_per_bidang[0]->nilai,
                  );

                }

                $exp_status=explode(" ", trim($status));
                $count = array_count_values($exp_status);
                $status_final= empty($count["GAGAL"]) ? 'LULUS' : 'GAGAL';

                $y[]=array(
                    'nilai_total'=>$tot,
                    'no_ujian'=>$x->no_ujian,
                    'nama'=>$x->nama,
                    'asal_ujian'=>$x->asal_ujian,
                    'nilai_bidang'=>$m,
                    'status_final'=>$status_final,
                  );
            }

            arsort($y);
            // echo "<pre>";
            // print_r($y);die();

            foreach($y as $real_val){
              $no++;
          ?>

            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $real_val['no_ujian']; ?></td>
              <td><?php echo $real_val['nama']; ?></td>
              <td><?php echo $real_val['asal_ujian']; ?></td>
              <?php
                for ($i=0; $i < count($real_val['nilai_bidang']); $i++) { 
                  echo '<td>'.$real_val['nilai_bidang'][$i][$exp[$i]].'</th>';
                }
              ?>
              <td><?php echo $real_val['nilai_total']; ?></td>
              <td><?php echo $real_val['status_final']; ?></td>
            </tr>

          <?php } ?>
        </table>
      </div>
    </div>

<?php if(isset($type)){ ?>
  </body>
  <script src="<?php echo base_url()?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url()?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
</html>
<?php } ?>