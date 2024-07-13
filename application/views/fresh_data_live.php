
      <?php
      $no=0;
      $exp=explode(",", $bidang_soal);
      foreach ($live->result() as $data) { 
        $no++;
        $expnilai=explode(",", $data->nilai);
        echo '
        <tr>
          <td>'.$no.'</td>
          <td>'.$data->no_ujian.'</td>
          <td>'.$data->nama.'</td>
          <td>'.$data->asal_ujian.'</td>';
          for ($i=0; $i < count($exp); $i++) { 

            $nilai_per_bidang=$this->m_cat->m_nilai($data->pin,$data->no_ujian,$exp[$i])->result();

            $sum_nilai = $this->m_cat->m_total_nilai_live($data->pin,$data->no_ujian)->result();

            $total_nilai=$sum_nilai[0]->total;

            echo '<td align="center">'.@$nilai_per_bidang[0]->nilai.'</td>';

          }
          echo '<td align="center">'.$total_nilai.'</td>';
          echo '<td>'.$data->ket.'</td>
        </tr>';
      }
      ?>
<script>
  $(document).ready(function(){
    
  })
</script>