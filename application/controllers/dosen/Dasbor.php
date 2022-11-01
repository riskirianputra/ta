<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('dosen_model');

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

		$dsn = $this->dosen_model->detail_dosen($id_user);
		// print_r($user);
		// die();
		$data = array(	'title' => 	'Profil Dosen', 
						'dsn'	=>	$dsn,
						'isi'	=>	'dosen/dasbor/list'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

}

/* End of file dasbor.php */
/* End of file Dasbor.php */
/* Location: ./application/controllers/pembimbing/Dasbor.php */