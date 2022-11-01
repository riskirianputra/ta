<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');
	}

    public function index(){

		// validasi
		$this->form_validation->set_rules('no_induk','Id','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('no_induk');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login');
		$this->load->view('login', $data, FALSE);
		}
		
		// ambil fungsi logout
		public function logout()
		{
			$this->simple_login->logout();
		}
		
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */