<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __Construct(){
		parent:: __Construct();
		if($this->session->userdata('id')==""){
			redirect(base_url('login/sesihabis'));
		}
		$this->load->model('m_admin');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index(){
		$this->load->view('admin/home');
	}

	function log($action){
		$log=['user'=>$this->session->userdata('id'),'tgl'=>date('Y-m-d H:i:s'),'action'=>$action];

		$this->m_admin->insert('log',$log);
	}

	function upload_file($file){
    	
    	$config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|xlxx|docx|xlsx';
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->upload->do_upload($file);

		$foto=$this->upload->data('file_name');

		return $foto;
    }

	function admin(){
		$data['data']=$this->m_admin->detail('admin')->result();
		$this->load->view('admin/list_admin',$data);
	}

	function tambah_admin(){
		$this->load->view('admin/tambah_admin');
	}

	function simpan_admin(){
		$file=$this->upload_file('image');
		$arr=$this->input->post();

		$id=$arr['id'];

		$data=array(
				'email'=>$arr['email'],
				'pass'=>md5('12345'),
				'nama'=>$arr['nama'],
			);

		if ($id=="") {
			$this->m_admin->insert('admin',$data);
			$this->log("Tambah admin ".$nama);
		}
		else{
			unset($data['pass']);
			$this->log("Edit admin ".$nama);
			$this->m_admin->update('admin',['id'=>$id],$data);
		}


	}

	function edit_admin($id){
		$data['edit']=$this->m_admin->detail1('admin',['id'=>$id])->result();
		$this->load->view('admin/tambah_admin',$data);
	}

	function hapus_admin($id){
		$this->log("Hapus admin ".$id);
		$this->m_admin->delete('admin',['id'=>$id]);
	}

	function gantipass(){
		$this->load->view('admin/gantipass');
	}

	function gantipasssave(){
		$id=$this->session->userdata('id');
		$arr=$this->input->post();

		if($arr['password1']==$arr['password2']){
			$this->m_admin->update('admin',['id'=>$id],['pass'=>md5($arr['password1'])]);
			echo "Berhasil";
			$this->log("gantipass admin ".$id);
		}
		else{
			echo "Password Tidak sama";
		}
	}

	function soal(){
		$this->load->view('admin/soal');
	}

	function list_soal(){
		if ($this->input->is_ajax_request()) {
			echo json_encode($this->m_admin->mjson_soal());
		}
	}

	function tambah_soal(){
		$data['kateg']=$this->m_admin->detail1('parameter',['param'=>'kategori'])->result();
		$data['bidang']=$this->m_admin->detail1('parameter',['param'=>'bidang_soal'])->result();
		$data['pendi']=$this->m_admin->detail1('parameter',['param'=>'PENDIDIKAN'])->result();
		$this->load->view('admin/tambah_soal',$data);
	}

	function simpan_soal(){
		$id=$this->input->post('id', true);
		$kategori=$this->input->post('kategori', true);
		$pendidikan=$this->input->post('pendidikan', true);
		$bidang_soal=$this->input->post('bidang_soal', true);
		$pertanyaan=$this->input->post('pertanyaan', true);
		// $gambar_soal=$this->upload_file('gambar_soal');
		$opt_a=$this->input->post('opt_a', true);
		// $gambar_a=$this->upload_file('gambar_a');
		$nilai_a=$this->input->post('nilai_a', true);
		$opt_b=$this->input->post('opt_b', true);
		// $gambar_b=$this->upload_file('gambar_b');
		$nilai_b=$this->input->post('nilai_b', true);
		$opt_c=$this->input->post('opt_c', true);
		// $gambar_c=$this->upload_file('gambar_c');
		$nilai_c=$this->input->post('nilai_c', true);
		$opt_d=$this->input->post('opt_d', true);
		// $gambar_d=$this->upload_file('gambar_d');
		$nilai_d=$this->input->post('nilai_d', true);
		$opt_e=$this->input->post('opt_e', true);
		// $gambar_e=$this->upload_file('gambar_e');
		$nilai_e=$this->input->post('nilai_e', true);
		$pembahasan=$this->input->post('pembahasan', true);

		$config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|xlxx|docx';
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $nama_file=[];

        $jumlah_berkas = count($_FILES['gambar']['name']);
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            // if(!empty($_FILES['gambar']['name'][$i])){
 
				$_FILES['gambar[]']['name'] = $_FILES['gambar']['name'][$i];
				$_FILES['gambar[]']['type'] = $_FILES['gambar']['type'][$i];
				$_FILES['gambar[]']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['gambar[]']['error'] = $_FILES['gambar']['error'][$i];
				$_FILES['gambar[]']['size'] = $_FILES['gambar']['size'][$i];
	   
				if($this->upload->do_upload('gambar[]')){
					
					$nama_file[$i] = $this->upload->data('file_name');
				}
			// }
		}


		$soal = $nama_file[0] ? $nama_file[0] : $this->input->post('gambar_soal_e');
		$a = isset($nama_file[1]) ? $nama_file[1] : $this->input->post('gambar_aa');
		$b = isset($nama_file[2]) ? $nama_file[2] : $this->input->post('gambar_bb');
		$c = isset($nama_file[3]) ? $nama_file[3] : $this->input->post('gambar_cc');
		$d = isset($nama_file[4]) ? $nama_file[4] : $this->input->post('gambar_dd');
		$e = isset($nama_file[5]) ? $nama_file[5] : $this->input->post('gambar_ee');
		$f = isset($nama_file[6]) ? $nama_file[6] : $this->input->post('gbr_pembahasan');

		$data=array(
				'kategori'=>$kategori,
				'pendidikan'=>$pendidikan,
				'bidang_soal'=>$bidang_soal,
				'pertanyaan'=>$pertanyaan,
				'gambar_soal'=>$soal,
				'opt_a'=>$opt_a,
				'gambar_a'=>$a,
				'nilai_a'=>$nilai_a,
				'opt_b'=>$opt_b,
				'gambar_b'=>$b,
				'nilai_b'=>$nilai_b,
				'opt_c'=>$opt_c,
				'gambar_c'=>$c,
				'nilai_c'=>$nilai_c,
				'opt_d'=>$opt_d,
				'gambar_d'=>$d,
				'nilai_d'=>$nilai_d,
				'opt_e'=>$opt_e,
				'gambar_e'=>$e,
				'nilai_e'=>$nilai_e,
				'pembahasan'=>$pembahasan,
				'gbr_pembahasan'=>$f,
			);

		if($id==""){
			$id_soal=$this->m_admin->insert('soal',$data);
			$this->log('Tambah soal '.$id_soal);
		}
		else{
			$this->m_admin->update('soal',['id'=>$id],$data);
			$this->log('Edit soal '.$id);
		}
	}

	function edit_soal($id){
		$data['kateg']=$this->m_admin->detail1('parameter',['param'=>'kategori'])->result();
		$data['bidang']=$this->m_admin->detail1('parameter',['param'=>'bidang_soal'])->result();
		$data['edit']=$this->m_admin->detail1('soal',['id'=>$id])->result();
		$data['pendi']=$this->m_admin->detail1('parameter',['param'=>'PENDIDIKAN'])->result();
		// print_r($data)
		$this->load->view('admin/tambah_soal',$data);		
	}

	function detail_soal($id){
		$data['soal']=$this->m_admin->detail1('soal',['id'=>$id])->result();
		$this->load->view('admin/detail_soal',$data);
	}

	function hapus_soal($id){
		$this->m_admin->delete('soal',['id'=>$id]);
	}

	function hapus_gbr_soal(){
		$id=$this->input->get('id');
		$column=$this->input->get('column');
		$this->m_admin->update('soal',['id'=>$id],[$column=>'']);
	}

	function peserta_ujian(){
		$data['double']=$this->m_admin->peserta_double();
		$this->load->view('admin/peserta_ujian',$data);
	}

	function list_peserta_ujian(){
		if ($this->input->is_ajax_request()) {
			echo json_encode($this->m_admin->mjson_peserta());
		}
	}

	function tambah_peserta_ujian(){
		$data['kateg']=$this->m_admin->detail1('parameter',['param'=>'kategori'])->result();
		$data['pend']=$this->m_admin->detail1('parameter',['param'=>'PENDIDIKAN'])->result();
		$this->load->view('admin/tambah_peserta_ujian',$data);				
	}

	function generate_number(){
		echo generatenumber();
	}

	function simpan_peserta_ujian(){
		$id=$this->input->post('id', TRUE);
		$no_ujian=$this->input->post('no_ujian', TRUE);
		$nama=$this->input->post('nama', TRUE);
		$tempat=$this->input->post('tempat', TRUE);
		$tgl_lahir=$this->input->post('tgl_lahir', TRUE);
		$asal_ujian=$this->input->post('asal_ujian', TRUE);
		$pendidikan=$this->input->post('pendidikan', TRUE);
		$kategori=$this->input->post('kategori', TRUE);

		$data=array(
				'no_ujian'=>$no_ujian,
				'nama'=>$nama,
				'tempat'=>$tempat,
				'tgl_lahir'=>$tgl_lahir,
				'asal_ujian'=>$asal_ujian,
				'pendidikan'=>$pendidikan,
				'kategori'=>$kategori,
			);

		if($id==""){
			$cek_no_ujian=$this->m_admin->detail1('peserta',['no_ujian'=>$no_ujian]);

			if($cek_no_ujian->num_rows() > 0){
				die("0");
			}

			$id_soal=$this->m_admin->insert('peserta',$data);
			$this->log('Tambah peserta '.$id_soal);
		}
		else{
			$this->m_admin->update('peserta',['id'=>$id],$data);
			$this->log('Edit peserta '.$id);
		}
	}

	function edit_peserta_ujian($id){
		$data['kateg']=$this->m_admin->detail1('parameter',['param'=>'kategori'])->result();
		$data['pend']=$this->m_admin->detail1('parameter',['param'=>'PENDIDIKAN'])->result();
		$data['edit']=$this->m_admin->detail1('peserta',['id'=>$id])->result();
		$this->load->view('admin/tambah_peserta_ujian',$data);
	}

	function hapus_peserta_ujian($id){
		$this->m_admin->delete('peserta',['id'=>$id]);
	}

	function jadwal_ujian(){
		$this->load->view('admin/jadwal_ujian');
	}

	function list_jadwal_ujian(){
		if ($this->input->is_ajax_request()) {
			echo json_encode($this->m_admin->mjson_jadwal());
		}
	}

	function tambah_jadwal_ujian(){
		$data['kateg']=$this->m_admin->detail1('parameter',['param'=>'kategori'])->result();
		$data['bidang']=$this->m_admin->detail1('parameter',['param'=>'bidang_soal'])->result();
		$this->load->view('admin/tambah_jadwal_ujian',$data);
	}

	function simpan_jadwal_ujian(){
		$id=$this->input->post('id', TRUE);
		
		$pin=$this->input->post('pin', TRUE) ? $this->input->post('pin', TRUE) : generatenumber();

		$ujian=$this->input->post('ujian', TRUE);
		$tempat=$this->input->post('tempat', TRUE);
		$tanggal_jam=$this->input->post('tanggal', TRUE).' '.$this->input->post('jam', TRUE);
		$lama_ujian=$this->input->post('lama_ujian', TRUE);
		$batas_terlambat=$this->input->post('batas_terlambat', TRUE);
		$jlh_peserta=$this->input->post('jlh_peserta', TRUE);
		$kategori=implode(",", $this->input->post('kategori', TRUE));
		$bidang_soal= implode(",", $this->input->post('bidang_soal', TRUE));
		$jlh_soal=$this->input->post('jlh_soal', TRUE);
		$grade=$this->input->post('grade', TRUE);
		$acak_soal=$this->input->post('acak_soal', TRUE);

		$waktu=date('Y-m-d H:i',strtotime($tanggal_jam));

		$data=[
				'pin'=>$pin,
				'ujian'=>$ujian,
				'tempat'=>$tempat,
				'tanggal_jam'=>$waktu,
				'lama_ujian'=>$lama_ujian,
				'batas_terlambat'=>$batas_terlambat,
				'jlh_peserta'=>$jlh_peserta,
				'kategori'=>$kategori,
				'bidang_soal'=>$bidang_soal,
				'jlh_soal'=>trim($jlh_soal),
				'grade'=>trim($grade),
				'acak_soal'=>$acak_soal,
			];
		$exp_bidang=explode(",", $bidang_soal);
		$exp_jlhsoal=explode(",", $jlh_soal);
		$exp_grade=explode(",", $grade);

		if(count($exp_bidang)==count($exp_jlhsoal) && count($exp_bidang)== count($exp_grade) && count($exp_jlhsoal) == count($exp_grade)){

			if($id==""){
				if($waktu < date('Y-m-d H:i')){
					die("1");
				}
				else{
					$cek_pin=$this->m_admin->detail1('jadwal',['pin'=>$pin]);

					if($cek_pin->num_rows() > 0){
						$data['pin']=generatenumber();
					}

					$cek_waktu=$this->m_admin->detail('jadwal')->result();

					foreach ($cek_waktu as $jam_cek) {
						$jam_mulai = $jam_cek->tanggal_jam;
						$jam_akhir = date('Y-m-d H:i',strtotime("+".$jam_cek->lama_ujian." Minutes",strtotime($jam_cek->tanggal_jam)));

						$date1 = strtotime(date('Y-m-d H:i',strtotime($waktu)));// DateTime::createFromFormat('Y-m-d H:i', $waktu);
						$date2 = strtotime(date('Y-m-d H:i',strtotime($jam_mulai)));//DateTime::createFromFormat('Y-m-d H:i', $jam_mulai);
						$date3 = strtotime(date('Y-m-d H:i',strtotime($jam_akhir)));//DateTime::createFromFormat('Y-m-d H:i', $jam_akhir);

						if ($date1 >= $date2 && $date1 <= $date3){
						   die("0");
						}
					}

					$id_soal=$this->m_admin->insert('jadwal',$data);
					$this->log('Tambah Jadwal Ujian '.$data['ujian']);
				}
			}
			else{
				$this->m_admin->update('jadwal',['id'=>$id],$data);
				$this->log('Edit Jadwal Ujian '.$data['ujian']);
			}
		}
		else{
			die("2");
		}
	}

	function hapus_jadwal($id){
		$this->m_admin->delete('jadwal',['id'=>$id]);
	}

	function edit_jadwal($id){
		$data['edit']=$this->m_admin->detail1('jadwal',['id'=>$id])->result();
		$data['kateg']=$this->m_admin->detail1('parameter',['param'=>'kategori'])->result();
		$data['bidang']=$this->m_admin->detail1('parameter',['param'=>'bidang_soal'])->result();
		$this->load->view('admin/tambah_jadwal_ujian',$data);
	}

	function laporan_nilai(){
		$this->load->view('admin/form_lap_nilai');
	}

	function cari_nilai(){
		$this->load->model('m_cat');
		$pin=$this->input->post('pin');	
		$data['ujian']=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result_array();
		if(!empty($data['ujian'])){
			$bidang_soal=$data['ujian'][0]['bidang_soal'];
			$data['live']=$this->m_cat->data_live($pin,$bidang_soal);
			$data['bidang_soal']=$bidang_soal;
			$data['nama_ujian']=$data['ujian'][0]['ujian'];
			$data['grade']=$data['ujian'][0]['grade'];
			$this->load->view('admin/daftar_nilai',$data);
		}
		else{
			echo '<div class="alert alert-danger">PIN tidak ditemukan</div>';
		}
	}

	function export_excel(){
		$this->load->model('m_cat');
		$pin=$this->input->get('pin');	
		$data['ujian']=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result_array();

		if(!empty($data['ujian'])){
			$bidang_soal=$data['ujian'][0]['bidang_soal'];
			$data['live']=$this->m_cat->data_live($pin,$bidang_soal);
			$data['bidang_soal']=$bidang_soal;
			$data['nama_ujian']=$data['ujian'][0]['ujian'];
			$data['grade']=$data['ujian'][0]['grade'];
		}
		else{
			$bidang_soal='';
			$data['live']='';
			$data['bidang_soal']='';
			$data['nama_ujian']='';
			$data['grade']='';
		}

		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=".$data['nama_ujian'].".xls");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);

		$this->load->view('admin/daftar_nilai',$data);

	}

	function export_pdf(){
		ini_set('max_execution_time', 0);
		$this->load->model('m_cat');
		$pin=$this->input->get('pin');	
		$data['ujian']=$this->m_cat->m_data('jadwal',['pin'=>$pin])->result_array();

		$bidang_soal=$data['ujian'][0]['bidang_soal'];
		$data['live']=$this->m_cat->data_live($pin,$bidang_soal);
		$data['bidang_soal']=$bidang_soal;
		$data['nama_ujian']=$data['ujian'][0]['ujian'];
		$data['grade']=$data['ujian'][0]['grade'];
		$data['type']='pdf';

		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('admin/daftar_nilai',$data,true);
        $mpdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}

	function import_soal(){
		$this->load->view('admin/import_soal');
	}

	function preview_import_soal()
	{
		$data = array(); // Buat variabel $data sebagai array

		$upload = $this->upload_file('file_excel');
		
		if($upload !== null){ 
			
			if($upload !== ""){ 
				// Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/uploads/'.$upload); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true,true,true,true,true,true,true,true);

				$data['sheet'] = $sheet;
				$data['file'] = $upload;
			}
			else{ 
				// Jika proses upload gagal
				$data['upload_error'] = 'error mengupload file'; 
			}
		}
		
		$this->load->view('admin/preview_import_soal', $data);
	}

	function simpan_import_soal(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/uploads/'.$this->input->get('file')); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database

		$data = [];
		
		$numrow = 1;
				
		foreach($sheet as $row)
		{
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1)
			{
				// Kita push (add) array data ke variabel data

				array_push($data, [
					'kategori'=>$row['B'],
					'pendidikan'=>$row['C'],
					'bidang_soal'=>$row['D'],
					'pertanyaan'=>$row['E'],
					'gambar_soal'=>$row['F'],
					'opt_a'=>$row['G'],
					'gambar_a'=>$row['H'],
					'nilai_a'=>$row['I'],
					'opt_b'=>$row['J'],
					'gambar_b'=>$row['K'],
					'nilai_b'=>$row['L'],
					'opt_c'=>$row['M'],
					'gambar_c'=>$row['N'],
					'nilai_c'=>$row['O'],
					'opt_d'=>$row['P'],
					'gambar_d'=>$row['Q'],
					'nilai_d'=>$row['R'],
					'opt_e'=>$row['S'],
					'gambar_e'=>$row['T'],
					'nilai_e'=>$row['U'],
					'pembahasan'=>$row['V'],
				]);

				
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		$this->m_admin->insert_multiple('soal',$data);
	}

	function import_peserta(){
		$this->load->view('admin/import_peserta');
	}

	function preview_import_peserta()
	{
		$data = array(); // Buat variabel $data sebagai array

		$upload = $this->upload_file('file_excel');
		
		if($upload !== null){ 
			
			if($upload !== ""){ 
				// Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/uploads/'.$upload); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true);

				$data['sheet'] = $sheet;
				$data['file'] = $upload;
			}
			else{ 
				// Jika proses upload gagal
				$data['upload_error'] = 'error mengupload file'; 
			}
		}
		
		$this->load->view('admin/preview_import_peserta', $data);
	}

	function simpan_import_peserta(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/uploads/'.$this->input->get('file')); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true,true,true,true,true,true,true,true,true,true,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database

		$data = [];
		
		$numrow = 1;
				
		foreach($sheet as $row)
		{
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1)
			{
				// Kita push (add) array data ke variabel data

				array_push($data, [
					'no_ujian'=>$row['B'],
					'nama'=>$row['C'],
					'tempat'=>$row['D'],
					'tgl_lahir'=>$row['E'],
					'asal_ujian'=>$row['F'],
					'kategori'=>$row['G'],
					'pendidikan'=>$row['H'],
				]);

				
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		$this->m_admin->insert_multiple('peserta',$data);
	}

	function pengaturan(){
		$data['pendidikan']=$this->m_admin->detail1('parameter',['param'=>'pendidikan'])->result();
		$data['bidang']=$this->m_admin->detail1('parameter',['param'=>'bidang_soal'])->result();
		$data['kategori']=$this->m_admin->detail1('parameter',['param'=>'kategori'])->result();
		$data['param']=$this->m_admin->parameter()->result();
		$this->load->view('admin/pengaturan',$data);
	}

	function simpan_param(){
		$arr=$this->input->post();

		$data=array(
				'param'=>$arr['param'],
				'ket'=>$arr['ket'],
			);
		$this->m_admin->insert('parameter',$data);
	}

	function hapus_param($id){
		$this->m_admin->delete('parameter',['id'=>$id]);
	}
}