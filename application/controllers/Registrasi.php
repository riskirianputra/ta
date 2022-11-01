<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');
	}

    public function index()
    {
        $this->load->view('registrasi');
    }

	public function save_registrasi()
	{
		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //dalam KB
		$config['max_width']  		= '2024';
		$config['max_height']  		= '2024';
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('bimbingan1');
		$bimbingan1 = $this->upload->data();
		$this->upload->do_upload('bimbingan2');
		$bimbingan2 = $this->upload->data();
			$i = $this->input;
			$data = array(
				'no_induk' => $i->post('nim'),
				'email' => $i->post('email'),
				'password' =>	SHA1($i->post('password')),
				'akses_level' => 'mahasiswa',
			);
			$this->user_model->tambah($data);
			$user = $this->mahasiswa_model->get_mhs_by_email($data['email']);
			$data2 = array(	'id_user'			=>  $user->id_user,
							'nama_mahasiswa' 	=> 	$i->post('nama'),
							'no_tlp' 			=> 	$i->post('nohp'),
							'judul_ta' 			=> 	$i->post('judul_ta'),
							'bimbingan1'		=>	$bimbingan1['file_name'],
							'bimbingan2'		=>	$bimbingan2['file_name']
						);
			$this->mahasiswa_model->registrasi_mhs($data2);
			redirect(base_url('login'),'refresh');
    }
		
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */