<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	function insert($table,$data){
		$this->db->insert($table,$data);

		return $this->db->insert_id();
	}

	function insert_multiple($table,$data){
		$this->db->insert_batch($table, $data);
	}

	function update($table,$where,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function detail($table,$orderby='',$order=''){
		if($orderby!=""){
			$this->db->order_by($orderby,$order);
		}
		$return=$this->db->get($table);

		return $return;
	}

	function detail1($table,$where,$orderby='',$order=''){
		$this->db->where($where);
		if($orderby!=""){
			$this->db->order_by($orderby,$order);
		}
		$return=$this->db->get($table);

		return $return;
	}

	function mjson_soal(){
		$q="SELECT * FROM soal ";

		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		
		$total=$this->db->query($q)->num_rows();

		$output=array();

		$output['draw']=$draw;

		$output['recordsTotal']=$output['recordsFiltered']=$total;

		$output['data']=array();

		if($search!="")
		{

			$q.=" WHERE kategori LIKE '%$search%' OR bidang_soal LIKE '%$search%' OR pertanyaan LIKE '%$search%' ";

			$total_row=$this->db->query($q);

			$output['recordsTotal']=$output['recordsFiltered']=$total_row->num_rows();

			$q.=" LIMIT $start,$length ";
			
			$query=$this->db->query($q);
		}
		else
		{
			$q.= " LIMIT $start,$length ";
			$query=$this->db->query($q);
		}


		$nomor_urut=$start+1;
		foreach ($query->result() as $val) 
		{
			$output['data'][]=array(
				$nomor_urut,
				$val->kategori,
				$val->pendidikan,
				$val->bidang_soal,
				nl2br($val->pertanyaan),
				"<a href='#' title='Hapus' class='btn btn-danger btn-xs' onclick='hapus_soal(".$val->id.")'><i class='fa fa-trash' ></i> </a>
				<a href='#' title='Edit' class='btn btn-warning btn-xs' onclick='edit_soal(".$val->id.")'> <i class='fa fa-edit' ></i></a>
				<a href='#' title='Detail' class='btn btn-primary btn-xs' onclick='detail_soal(".$val->id.")'> <i class='fa fa-file-text' ></i></a>
				");
			$nomor_urut++;
		}

		return $output;
	}

	function mjson_peserta(){
		$q="SELECT * FROM peserta ";

		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		
		$total=$this->db->query($q)->num_rows();

		$output=array();

		$output['draw']=$draw;

		$output['recordsTotal']=$output['recordsFiltered']=$total;

		$output['data']=array();

		if($search!="")
		{
			$q.=" WHERE no_ujian LIKE '%$search%' OR nama LIKE '%$search%' OR pendidikan LIKE '%$search%' LIMIT $start,$length ";
			
			$query=$this->db->query($q);
			$output['recordsTotal']=$output['recordsFiltered']=$query->num_rows();
		}
		else
		{
			$q.= " LIMIT $start,$length ";
			$query=$this->db->query($q);
		}


		$nomor_urut=$start+1;
		foreach ($query->result() as $val) 
		{
			$output['data'][]=array(
				$nomor_urut,
				$val->no_ujian,
				$val->nama,
				$val->tempat.', '.dmy($val->tgl_lahir),
				$val->asal_ujian,
				$val->pendidikan,
				$val->kategori,
				"<a href='#' title='Hapus' class='btn btn-danger btn-xs' onclick='hapus_peserta(".$val->id.")'><i class='fa fa-trash' ></i> </a>
				<a href='#' title='Edit' class='btn btn-warning btn-xs' onclick='edit_peserta(".$val->id.")'> <i class='fa fa-edit' ></i></a>
				");
			$nomor_urut++;
		}

		return $output;
	}

	function mjson_jadwal(){
		$q="SELECT * FROM jadwal ";

		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		
		$total=$this->db->query($q)->num_rows();

		$output=array();

		$output['draw']=$draw;

		$output['recordsTotal']=$output['recordsFiltered']=$total;

		$output['data']=array();

		if($search!="")
		{
			$q.=" WHERE pin LIKE '%$search%' OR ujian LIKE '%$search%' OR tempat LIKE '%$search%' OR tanggal_jam LIKE '%$search%' OR lama_ujian LIKE '%$search%' OR jlh_peserta LIKE '%$search%' OR kategori LIKE '%$search%' ORDER BY tanggal_jam DESC LIMIT $start,$length ";
			
			$query=$this->db->query($q);
			$output['recordsTotal']=$output['recordsFiltered']=$query->num_rows();
		}
		else
		{
			$q.= " ORDER BY tanggal_jam DESC LIMIT $start,$length ";
			$query=$this->db->query($q);
		}


		$nomor_urut=$start+1;
		foreach ($query->result() as $val) 
		{
			if($val->acak_soal==0){
				$acak_soal="Random";
			}
			elseif($val->acak_soal==1){
				$acak_soal="ASC";
			}
			else{
				$acak_soal="DESC";
			}
			
			$output['data'][]=array(
				$nomor_urut,
				$val->pin,
				$val->ujian,
				$val->tempat,
				date('Y-m-d',strtotime($val->tanggal_jam)),
				date('H:i',strtotime($val->tanggal_jam)),
				$val->lama_ujian,
				$val->batas_terlambat." Menit",
				$val->jlh_peserta,
				$val->kategori,
				$val->bidang_soal,
				$val->jlh_soal,
				$val->grade,
				$acak_soal,
				"<a href='#' title='Hapus' class='btn btn-danger btn-xs' onclick='hapus_jadwal(".$val->id.")'><i class='fa fa-trash' ></i> </a>
				<a href='#' title='Edit' class='btn btn-warning btn-xs' onclick='edit_jadwal(".$val->id.")'> <i class='fa fa-edit' ></i></a>
				");
			$nomor_urut++;
		}

		return $output;
	}

	function peserta_double(){
		return $this->db->query("SELECT a.* FROM (SELECT no_ujian,COUNT(no_ujian) AS jlh FROM peserta GROUP BY no_ujian)a WHERE a.jlh > 1");
	}

	function parameter(){
		return $this->db->query("SELECT param FROM parameter GROUP BY param");
	}

}
