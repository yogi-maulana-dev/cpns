<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __Construct(){
		parent:: __Construct();
		$this->load->model('m_admin');
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		$this->load->view('login');
	}

	function log_in(){
		
		$email = filter_var(trim(str_replace(" ","",$this->input->post('email', TRUE))),FILTER_SANITIZE_EMAIL);
		$pass 	= trim(md5($this->input->post('password', TRUE)));
		
		//var_dump($this->input->post());

		$this->db->where('email',$email);
		$hasil = $this->db->get('admin');

		// print_r($hasil);
		
		
		if ($hasil->num_rows() > 0) 
		{
			$this->db->where('email',$email);
			$this->db->where('pass',$pass);
			$qqq = $this->db->get('admin');

			if($qqq->num_rows() > 0)
			{
				foreach($qqq->result() as $a)			
				{
					$sess_data['id']			= $a->id;
					$sess_data['email']			= $a->email;
					$sess_data['nama']			= $a->nama;

					$this->session->set_userdata($sess_data);

					
					
					die("1");
				
				}
			}
			else{
				die("0");
			}
			
		}
		else{
			die("0");
		}

	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	function clean_input($data){
		$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter;
	}

	function sesihabis(){
		echo '
			<script>
			   window.location.replace("'.base_url().'login"); 
			</script>
		';
	}

	function cex(){
		var_dump(base64_decode('NS9QZHQuRy8yMDIyL1BOIE1yaA=='));
	}
}