<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends CI_Controller {

	function __Construct(){
		parent:: __Construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('m_cat');
	}

	public function index(){
		if($this->session->userdata('peserta')!=null){
			redirect(base_url('ujian'));
		}

		$data['title']="CAT";
		
		$this->load->view('home',$data);
	}
	
	function cari_jumlah(){
		$pin=$this->input->get('pin',TRUE);
		$jlh_peserta=$this->m_cat->hitung_peserta($pin);

		echo $jlh_peserta->num_rows();
	}

	function cek_peserta(){
		$no_ujian=trim($this->input->post('no_ujian',TRUE));
		$pin=trim($this->input->post('pin_sesi',TRUE));

		if(strlen($no_ujian) > 150 OR strlen($pin) > 20){
			die("Hoi...");
		}

		$cek_no_ujian=$this->m_cat->m_data('peserta',['no_ujian'=>$no_ujian]);

		if($cek_no_ujian->num_rows()>0){

			$cek_pin=$this->m_cat->m_data('jadwal',['pin'=>$pin]);

			$result_sesi=$cek_pin->result();

			$result=$this->m_cat->m_data('peserta',['no_ujian'=>$no_ujian,/*'kategori'=>@$result_sesi[0]->kategori*/])->result();

			if($cek_pin->num_rows()>0 AND !empty($result)){				

				$cek_jam=$cek_pin->result();

				$jam_mulai_terlambat=date('Y-m-d H:i',strtotime($cek_jam[0]->batas_terlambat." minutes",strtotime($cek_jam[0]->tanggal_jam))); //memeriksa batas terlambat dari DB

				$cek_login=$this->m_cat->m_data('selesai',['pin'=>$pin,'no_ujian'=>$no_ujian]);

				if($cek_login->num_rows()==0){

					if(strtotime(date('Y-m-d H:i')) > strtotime($jam_mulai_terlambat) ){
						die ("Tidak bisa ujian karena anda sudah terlambat lebih dari ".$cek_jam[0]->batas_terlambat. " menit");
					}
					
					if(strtotime($cek_jam[0]->tanggal_jam) > strtotime(date('Y-m-d H:i'))){
						die("Ujian belum dimulai");

					}
				}

				if(@$cek_login->result()[0]->ket=='Selesai'){
					$selesai_ujian['selesai']=array(
							'id'=>$result[0]->id,
							'no_ujian'=>$result[0]->no_ujian,
							'nama'=>$result[0]->nama,
						);
					$this->session->set_userdata($selesai_ujian);


					echo "OK";
				}
				else{
					$sesi['peserta']=array(
							'id'=>$result[0]->id,
							'no_ujian'=>$result[0]->no_ujian,
							'nama'=>$result[0]->nama,
							'tempat'=>$result[0]->tempat,
							'tgl_lahir'=>$result[0]->tgl_lahir,
							'asal_ujian'=>$result[0]->asal_ujian,
							'pendidikan'=>$result[0]->pendidikan,
							'pin'=>$result_sesi[0]->pin,
							'kategori'=>$result_sesi[0]->kategori,
							'bidang_soal'=>$result_sesi[0]->bidang_soal,
							'jlh_soal'=>$result_sesi[0]->jlh_soal,
							'jam_mulai'=>$result_sesi[0]->tanggal_jam,
							'lama_ujian'=>$result_sesi[0]->lama_ujian,
							'acak_soal'=>$result_sesi[0]->acak_soal,
						);

					if(@$cek_login->result()[0]->soal != ""){
						$sesi['sesisoal']=$cek_login->result()[0]->soal;
					}

					$this->session->set_userdata($sesi);

					echo "OK";
				}
			}
			else{
				echo "PIN sesi salah";
			}
		}
		else{
			echo "Nomor Ujian salah";
		}
	}

	function batal_ujian(){
		$no_ujian=$this->cek_sesi()['no_ujian'];
		$pin=$this->cek_sesi()['pin'];
		
		$this->m_cat->delete('selesai',['no_ujian'=>$no_ujian,'pin'=>$pin]);

		$this->session->unset_userdata('peserta');
		$this->session->unset_userdata('sesisoal');
		$this->session->unset_userdata('ujian');
	}

	function keluar_ujian(){
		$this->session->sess_destroy();
	}

	function bio_peserta(){
		if($this->session->userdata('ujian')!=null){
			redirect(base_url('ujian'));
		}
		elseif($this->session->userdata('peserta')==null AND $this->session->userdata('selesai')==null ){
			redirect(base_url());
		}
		else{
			$data['title']="Biodata Peserta";
			$this->load->view('bio_peserta',$data);
		}
	}

	function mulai_ujian(){
		$sesi['mulai']='1';
		$this->session->set_userdata($sesi);
		echo "0";
	}

	function jumlahterjawab($no_ujian='', $pin='', $aksi=''){
		$jumlahterjawab=$this->m_cat->m_data('jawaban',['no_ujian'=>$no_ujian,'pin'=>$pin])->num_rows(); //memeriksa jumlah terjawab

		if($aksi=='return'){
			return $jumlahterjawab;
		}else{
			echo $jumlahterjawab;
		}
	}

	function ujian(){
		$data['title']="Ujian";
		$data['kategori']=$this->cek_sesi('peserta')['kategori'];
		$data['bidang_soal']=$this->cek_sesi('peserta')['bidang_soal'];
		$data['jumlah']=$this->cek_sesi('peserta')['jlh_soal'];
		$data['no_ujian']=$this->cek_sesi()['no_ujian'];
		$data['pendidikan']=$this->cek_sesi()['pendidikan'];
		$data['pin']=$this->cek_sesi('peserta')['pin'];

		if($this->cek_sesi('peserta')['acak_soal']=="0"){
			$orderby="rand()";
		}
		elseif($this->cek_sesi('peserta')['acak_soal']=="1"){
			$orderby="id ASC";
		}
		elseif($this->cek_sesi('peserta')['acak_soal']=="2"){
			$orderby=" id DESC";
		}
		else{
			$orderby="rand()";	
		}


		$cekmulai=$this->session->userdata('mulai');

		$jumlahterjawab= $this->jumlahterjawab($data['no_ujian'],$data['pin'],'return');//memeriksa jumlah terjawab

		$data['jumlahterjawab']=$jumlahterjawab;

		if($cekmulai=="1"){ 

			$id_soal_sesi=$this->session->userdata('sesisoal');
			if($id_soal_sesi == null){
				$data['soal']=$this->m_cat->m_soal('',$data['kategori'],$data['bidang_soal'],$data['jumlah'],$data['pendidikan'],$orderby);

				$soalToSesi=[];
				foreach($data['soal']->result() as $sesisoal){
					$soalToSesi[]=$sesisoal->id;
				}

				$setkesesi['sesisoal']=implode(",", $soalToSesi);

				$mulai=[
					'pin'=>$this->cek_sesi('peserta')['pin'],
					'waktu_mulai'=>date('Y-m-d H:i:s'),
					'no_ujian'=>$data['no_ujian'],
					'soal'=>$setkesesi['sesisoal'],
				];

				$this->m_cat->insert('selesai',$mulai);

				if(empty($this->session->userdata('ujian')['jam_ahir'])){
					$setkesesi['ujian']=array('jam_ahir'=>date('Y-m-d H:i:s',strtotime("+".$this->session->userdata('peserta')['lama_ujian']." minutes"))); //Mengatur akhir waktu ujian
				}

			}
			else{

				$data['soal']=$this->m_cat->m_soal($id_soal_sesi,'','','','','');

				$mulai=$this->m_cat->m_data('selesai',['pin'=>$data['pin'],'no_ujian'=>$this->cek_sesi('peserta')['no_ujian']])->result();

				$datetime1 = strtotime($mulai[0]->waktu_mulai);
				$datetime2 = strtotime(date('Y-m-d H:i:s'));
				$interval  = abs($datetime2 - $datetime1);
				$minutes   = round($interval / 60);

				$sisa_waktu=$this->cek_sesi('peserta')['lama_ujian'] - $minutes + 5; // Jika keluar dari ujian login lagi tambah waktu 5 menit

				if(empty($this->session->userdata('ujian')['jam_ahir'])){
					$setkesesi['ujian']=array('jam_ahir'=>date('Y-m-d H:i:s',strtotime("+".$sisa_waktu." minutes")));
				}

			}
			
			if(isset($setkesesi)){
				$this->session->set_userdata($setkesesi);
			}

			$this->load->view('ujian',$data);
		}
		else{
			redirect(base_url('cat/bio_peserta'));
		}

		// print_r($this->session->userdata('ujian'));
	}

	function simpan_jawaban(){

		if($this->session->userdata('peserta')==""){
			die("GAGAL");
		}

		$id=$this->input->get('id');
		$pilihan=$this->input->get('pilihan'); //Yakin atau ragu-ragu
		$jawab=$this->input->post('jawab');
		$no_ujian=$this->cek_sesi()['no_ujian'];
		$pin=$this->cek_sesi()['pin'];

		$nilai=$this->m_cat->m_data('soal',['id'=>$id])->result();

		if($jawab!=""){
			$kolom="nilai_$jawab";

			$data=array(
				'pin'=>$pin,
				'waktu'=>date('Y-m-d H:i:s'),
				'no_ujian'=>$no_ujian,
				'bidang_soal'=>$nilai[0]->bidang_soal,
				'id_soal'=>$id,
				'jawab'=>$jawab,
				'nilai'=>$nilai[0]->$kolom,
				'pilihan'=>$pilihan,
			);

			$cek_update_jawaban=$this->m_cat->m_data('jawaban',['id_soal'=>$id,'no_ujian'=>$no_ujian]);

			if($cek_update_jawaban->num_rows() == 0){
				$this->m_cat->insert('jawaban',$data);
			}
			else{
				$update_jawaban=$cek_update_jawaban->result();
				$id_jawaban=$update_jawaban[0]->id;

				$this->m_cat->update('jawaban',['id'=>$id_jawaban],$data);
			}

			echo "OK";
		}
		else{
			echo "Err";
		}
	}

	function hasil(){
		$data['title']="Biodata Peserta";
		$this->load->view('bio_peserta',$data);
	}

	function cek_sesi(){
		if($this->session->userdata('peserta')['id']==""){
			redirect(base_url());
		}

		if($this->session->userdata('selesai')['id']!=""){
			redirect(base_url('cat/bio_peserta'));
		}

		return $this->session->userdata('peserta');
	}

	function load_hasil_ujian(){
		$no_ujian=$this->session->userdata('peserta')['no_ujian'];
		$bidang_soal=$this->session->userdata('peserta')['bidang_soal'];
		$pin=$this->session->userdata('peserta')['pin'];
		$hasil=$this->m_cat->m_hasil_ujian($pin,$no_ujian,$bidang_soal)->result();
		$grade=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result();

		// echo "<pre>";
		// print_r($this->session->userdata());die();

		$exp_grade=explode(",", $grade[0]->grade);
		$exp_bidang=explode(",", $grade[0]->bidang_soal);

		$combine_exp=array_combine($exp_bidang, $exp_grade);


		echo '<p>Rekap Hasil Ujian</p>';
		echo '<table class="" width="300">';
			$tot=0;
			$status="";
			foreach($hasil as $nilai){

                if($nilai->nilai >= $combine_exp[$nilai->bidang_soal]){
                  $status.="LULUS ";
                }
                else{
                  $status.="GAGAL ";
                }

				$tot+=$nilai->nilai;
				echo '
					<tr>
						<th>'.$nilai->bidang_soal.'</th>
						<td>'.$nilai->nilai.'</td>
					</tr>
				';
			}
		$exp_status=explode(" ", trim($status));
        $count = array_count_values($exp_status);
        $status_final= empty($count["GAGAL"]) ? 'LULUS' : 'GAGAL';

		echo '
			<tr>
				<th><hr>Total</th>
				<td><hr>'.$tot.'</td>
			</tr>';
			/*<tr>
				<th><hr>Ket.</th>
				<td><hr>'.$status_final.'</td>
			</tr>*/
		
		echo '</table>';
		$selesai=[
				'waktu_selesai'=>date('Y-m-d H:i:s'),
				'ket'=>'Selesai',
			];
		$this->m_cat->update('selesai',['pin'=>$pin,'no_ujian'=>$no_ujian],$selesai);

		$selesai_ujian['selesai']=array(
							'id'=>$this->session->userdata('peserta')['id'],
							'no_ujian'=>$this->session->userdata('peserta')['no_ujian'],
							'nama'=>$this->session->userdata('peserta')['nama'],
						);

		$this->session->set_userdata($selesai_ujian);

		$this->session->unset_userdata('peserta');
		$this->session->unset_userdata('ujian');
		$this->session->unset_userdata('sesisoal');
	}

	function live_score(){
		$data['title']="Live Score";
		$this->load->view('live_score',$data);
		$this->session->unset_userdata('sesi_live');
	}

	function cek_pin($pin=''){
		$cek_pin=$this->m_cat->m_data('jadwal',['pin'=>$pin]);

		if($cek_pin->num_rows()>0){
			echo "1";
		}
		else{
			echo "0";
		}
	}

	function tampil_data_live(){
		$data['title']="Live Score";

		if($this->session->userdata('sesi_live')==null){
			$pin=$this->input->get('pin');	
			$data['ujian']=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result_array();
			$bidang_soal=$data['ujian'][0]['bidang_soal'];
			$data['nama_ujian']=$data['ujian'][0]['ujian'];

			$set_sesi['sesi_live']=$data['ujian'][0];
			$this->session->set_userdata($set_sesi);
		}
		else{
			$pin=$this->session->userdata('sesi_live')['pin'];
			$bidang_soal=$this->session->userdata('sesi_live')['bidang_soal'];
			$data['nama_ujian']=$this->session->userdata('sesi_live')['ujian'];
			$data['ujian']=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result_array();
		}

		$data['bidang_soal']=$bidang_soal;
		$data['live']=$this->m_cat->data_live($pin,$bidang_soal);
		$data['jlh_peserta']=$data['live']->num_rows();
		$data['timeload']=($data['jlh_peserta']+7)*1000;
		$data['pin']=$pin;
		$data['kategori']=$data['ujian'][0]['kategori'];
		$this->load->view('live_data',$data);
	}

	function tampil_data_live_fresh(){
		$data['title']="Live Score";

		if($this->session->userdata('sesi_live')==null){
			$pin=$this->input->get('pin');	
			$data['ujian']=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result_array();
			$bidang_soal=$data['ujian'][0]['bidang_soal'];
			$data['nama_ujian']=$data['ujian'][0]['ujian'];

			$set_sesi['sesi_live']=$data['ujian'][0];
			$this->session->set_userdata($set_sesi);
		}
		else{
			$pin=$this->session->userdata('sesi_live')['pin'];
			$bidang_soal=$this->session->userdata('sesi_live')['bidang_soal'];
			$data['nama_ujian']=$this->session->userdata('sesi_live')['ujian'];
		}

		$data['bidang_soal']=$bidang_soal;
		$data['live']=$this->m_cat->data_live($pin,$bidang_soal);
		$data['jlh_peserta']=$data['live']->num_rows();
		$data['timeload']=$data['jlh_peserta']*1000;
		$data['pin']=$pin;
		$this->load->view('fresh_data_live',$data);

	}

	function pembahasan(){
		$pin=$this->input->get('pin', TRUE);
		$no_ujian=$this->input->get('no_ujian', TRUE);

		$ujian=$this->m_cat->m_data('selesai',['pin'=>$pin,'no_ujian'=>$no_ujian,'ket'=>'Selesai'])->result();
		$jadwal=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result();

		if (empty($ujian)) {
			die("Data tidak ditemukan");
		}

		$data=array(
				'pin' => $pin,
				'no_ujian' => $no_ujian,
				'pembahasan'=>$this->m_cat->m_pembahasan($ujian[0]->soal)->result(),
				'nama_ujian'=>$jadwal[0]->ujian,
			);

		$this->load->view('pembahasan',$data);
	}

	function fore(){
		for ($i=54; $i < 75 ; $i++) { 
			echo "('03197', '0123".$i."', '6,19,2,22,14,18,26,24,17,11,10,5,28,23,4,7,1,12,30,29,13,16,9,21,20,3,25,27,15,8,60,48,41,33,53,50,39,57,36,59,42,44,46,47,43,54,45,35,56,51,34,55,38,58,31,49,52,32,37,40,77,62,66,84,89,61,96,100,98,92,88,72,93,74,70,97,99,82,81,87,65,64,78,76,95,79,73,80,71,63,91,69,86,67,85,68,90,83,75,94', '2024-02-03 13:43:16', '0000-00-00 00:00:00', ''),<br>";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}