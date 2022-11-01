<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sidang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');

	}

	public function index()
	{		
			
		$id_user = $this->session->userdata('id_user');
		
		$user = $this->mahasiswa_model->detail2($id_user);
		
		$data = array(	'title' => 	'Profil', 
						'mhs'	=>	$user,
						'isi'	=>	'home/profil/data_sidang'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	public function save_data($id_user)
	{
		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '24000'; //dalam KB
		$config['max_width']  		= '20024';
		$config['max_height']  		= '20024';
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('bimbingan1')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}elseif(!$this->upload->do_upload('bimbingan2')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
		$this->upload->do_upload('bimbingan1');
		$bimbingan1 = $this->upload->data();
		$this->upload->do_upload('bimbingan2');
		$bimbingan2 = $this->upload->data();
			$i = $this->input;
			$data2 = array(	'id_user'			=>  $id_user,
							'nama_mahasiswa' 	=> 	$i->post('nama'),
							'no_tlp' 			=> 	$i->post('no_tlp'),
							'judul_ta' 			=> 	$i->post('judul_ta'),
							'bimbingan1'		=>	$bimbingan1['file_name'],
							'bimbingan2'		=>	$bimbingan2['file_name']
						);
			// print_r($data2);
			// die();
		$this->mahasiswa_model->edit_data_ta($data2);
		$this->session->set_flashdata('success','Data berhasil di simpan');
		// die();
		redirect(base_url('home/dasbor'),'refresh');
		}
    }

}

/* End of file index.php */
/* Location: ./application/controllers/home/index.php */