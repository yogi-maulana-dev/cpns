<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cat extends CI_Model {

	public function insert($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	public function update($table,$where,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function m_data($table='',$where='',$limit='',$order='',$by=''){
		if($where!==""){
			$this->db->where($where);
		}
		if($limit!==""){
			$this->db->limit($limit);
		}
		if($order!==""){
			$this->db->order_by($order,$by);
		}
		
		return $this->db->get($table);
	}

	public function m_soal($id='',$kategori='',$bidang='',$jumlah='',$pendidikan='',$order=''){
		$bidang_soal=explode(",", $bidang);
		$jlh_soal=explode(",", $jumlah);

		$bidang_soal_jlh=array_combine($bidang_soal, $jlh_soal);

		$sql="";
		foreach ($bidang_soal_jlh as $key => $val) {
			$sql.="(SELECT * FROM soal WHERE bidang_soal='$key' AND pendidikan='$pendidikan' AND kategori='$kategori' ORDER BY ". $order ." LIMIT $val) UNION ALL ";
		}

		$qu=explode(" ", trim($sql));

		array_splice($qu, count($qu) - 2, 2);

		if($id==""){
			$q= implode(" ", $qu);
		}
		else{
			$q=" SELECT * FROM soal WHERE id IN($id) ORDER BY FIELD(id,$id)";
		}

		// print_r($q);die();
		return $this->db->query($q);
	}

	function m_hasil_ujian($pin,$no_ujian,$bidang_soal){
		$bidang_soal=str_replace(",", "','", $bidang_soal);
		$q=$this->db->query("SELECT bidang_soal,SUM(nilai) as nilai FROM jawaban WHERE pin='$pin' AND no_ujian='$no_ujian' AND bidang_soal IN('$bidang_soal') GROUP BY bidang_soal");
		return $q;
	}

	function data_live($pin='',$bidang_soal=''){

		$q=$this->db->query("
				SELECT
					a.pin,
					a.no_ujian,
				    b.nama,
				    b.asal_ujian,
				    GROUP_CONCAT(a.bidang_soal ORDER BY a.bidang_soal ASC) as bidang_soal,
				    GROUP_CONCAT(a.nilai ORDER BY a.bidang_soal ASC) as nilai,
				    c.ket
				FROM
				    (
				    SELECT
				    	pin,
				        no_ujian,
				        bidang_soal,
				        SUM(nilai) AS nilai
				    FROM
				        jawaban
				     WHERE pin='$pin'
				    GROUP BY
				        no_ujian,
				        bidang_soal
				) a
				INNER JOIN peserta b ON a.no_ujian=b.no_ujian
				LEFT JOIN selesai c ON a.no_ujian=c.no_ujian AND a.pin=c.pin
				GROUP BY a.no_ujian
				ORDER BY SUM(a.nilai) DESC
			");

		return $q;
	}

	function hitung_peserta($pin){
		return $this->db->query("SELECT pin FROM jawaban WHERE pin='$pin' GROUP BY no_ujian ");
	}

	function m_nilai($pin,$no_ujian,$bidang_soal){
		return $this->db->query("SELECT ifnull(SUM(nilai),0) AS nilai FROM jawaban WHERE pin='$pin' AND no_ujian='$no_ujian' AND bidang_soal='$bidang_soal'");
	}
	
	function m_total_nilai_live($pin,$no_ujian){
		return $this->db->query("SELECT SUM(nilai) AS total FROM jawaban WHERE pin = '$pin' AND no_ujian = '$no_ujian'");
	}

	function m_pembahasan($id){
		return $this->db->query("SELECT * FROM soal WHERE id IN($id) ORDER BY FIELD(id,$id)");
	}

	function m_nilai_peserta($pin,$no_ujian){
		return $this->db->query("SELECT bidang_soal,SUM(nilai) as nilai FROM jawaban WHERE pin='$pin' AND no_ujian='$no_ujian' GROUP BY bidang_soal");
	}
}
