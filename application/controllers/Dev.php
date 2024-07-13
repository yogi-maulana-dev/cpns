<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev extends CI_Controller {

	function __Construct(){
		parent:: __Construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('m_admin');
	}

	public function api(){
		header("Acces-Control-Allow-Origin:*");
	    header("Acces-Control-Allow-Headers:*");
	    header('Content-Type:application/json');

	    $log=$this->m_corona->data('log',['action'=>'Tambah Covid'],'1,0','id','DESC')->result();
		$data['last']=$this->m_corona->data('covid','','1,0','tanggal','DESC')->result();
		if(!empty($data['last'])){
			$api=$this->m_corona->data('covid',['tanggal'=>$data['last'][0]->tanggal],'','tanggal','DESC')->result();
		}

		$json['data']=array(
				'tanggal'=>@$api[0]->tanggal,
				'jam'=>date('H:i',strtotime(@$log[0]->tgl)),
				'odp_pantau'=>@$api[0]->odp_1,
				'odp_selesai'=>@$api[0]->odp_2,
				'pdp_rawat'=>@$api[0]->pdp_3,
				'pdp_sembuh'=>@$api[0]->pdp_4,
				'otg'=>@$api[0]->otg_0,
				'positif_rawat'=>@$api[0]->positif_5,
				'positif_sembuh'=>@$api[0]->positif_6,
				'positif_meninggal'=>@$api[0]->positif_7,
			);

		echo json_encode($json);
	}
}