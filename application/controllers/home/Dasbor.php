<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');

	}

	public function index()
	{		
			
		$id_user = $this->session->userdata('id_user');
		
		$user = $this->user_model->detail_user($id_user);
		
		$data = array(	'title' => 	'Profil', 
						'user'	=>	$user,
						'isi'	=>	'home/dasbor/list'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

}

/* End of file index.php */
/* Location: ./application/controllers/home/index.php */