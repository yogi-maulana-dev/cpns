<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  function curl_post($fullurl,$fields){
    // $json = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $fullurl);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
    $returned =  curl_exec($ch);
    curl_close($ch);
    
    return $returned;
  }
	
	function hari($tanggal)
	{
		$day=array(
			'Sun'=>'Minggu',
			'Mon'=>'Senin',
			'Tue'=>'Selasa',
			'Wed'=>'Rabu',
			'Thu'=>'Kamis',
			'Fri'=>'Jumat',
			'Sat'=>'Sabtu'
		);

		$nama_hari=$day[date('D',strtotime($tanggal))];

		return $nama_hari;
	}

	function bulan($tanggal){
		$bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'Nopember',
            '12' => 'Desember',
        );

        $nama_bulan=$bulan[date('m',strtotime($tanggal))];
        return $nama_bulan;
	}

	function tgl_indonesia($tanggal){
		$indo=date('d',strtotime($tanggal)).' '.bulan($tanggal).' '.date('Y',strtotime($tanggal));

		return $indo;
	}

    function dmy($tgl){
        $ex=explode("-", $tgl);
        $a=$ex[2].'-'.$ex[1].'-'.$ex[0];
        return $a;
    }

	function terbilang($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = terbilang($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = terbilang($nilai/10)." puluh". terbilang($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . terbilang($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = terbilang($nilai/100) . " ratus" . terbilang($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . terbilang($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = terbilang($nilai/1000) . " ribu" . terbilang($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = terbilang($nilai/1000000) . " juta" . terbilang($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = terbilang($nilai/1000000000) . " milyar" . terbilang(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = terbilang($nilai/1000000000000) . " trilyun" . terbilang(fmod($nilai,1000000000000));
        }     
        return $temp;
    }

    function nomor($nomor){
        return number_format($nomor,'0',',','.');
    }

    function level($level=null){
        // level 3 memberi hak akses level 2
        // level 2 memberi hak akses level 1
        $data=array(
                '1'=>'User',
                '2'=>'Admin Desa',
                '3'=>'Admin Dinas',
                '4'=>'Admin Kecamatan',
            );

        $return=array(
            'pilih'=>$data,
            'group'=>$data[$level]
        );
        return $return;
    }

    function crop_image($path){
      $image = $_FILES;
      $NewImageName = rand(4,10000)."-". $image['image']['name'];
      $destination = realpath($path).'/';
      move_uploaded_file($image['image']['tmp_name'], $destination.$NewImageName);
      // $image = imagecreatefromjpeg($destination.$NewImageName);
      $image = imagecreatefromstring(file_get_contents($destination.$NewImageName));
      $filename = $destination.$NewImageName;

      $thumb_width = 800;
      $thumb_height = 600;

      $width = imagesx($image);
      $height = imagesy($image);

      $original_aspect = $width / $height;
      $thumb_aspect = $thumb_width / $thumb_height;

      if ( $original_aspect >= $thumb_aspect )
      {
         // If image is wider than thumbnail (in aspect ratio sense)
         $new_height = $thumb_height;
         $new_width = $width / ($height / $thumb_height);
      }
      else
      {
         // If the thumbnail is wider than the image
         $new_width = $thumb_width;
         $new_height = $height / ($width / $thumb_width);
      }

      $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

      // Resize and crop
      imagecopyresampled($thumb,
                         $image,
                         0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                         0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                         0, 0,
                         $new_width, $new_height,
                         $width, $height);
      imagejpeg($thumb, $filename, 80);

      return $NewImageName;
    }

    function generatenumber($length = 5) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }