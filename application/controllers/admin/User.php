<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		//proteksi halaman 
		// $this->simple_login->cek_login();
	}

	// data user
	public function index()
	{
		$user = $this->user_model->listing_user();

		$data = array(	'title' => 'Data Pengguna' ,
						'user' 	=> $user ,
						'isi' 	=> 'admin/user/list'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_data()
	{
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Lengkap','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array( 	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('no_induk','Username / Nim','required|min_length[6]|max_length[32]|is_unique[users.no_induk]',
			array( 	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter',
					'is_unique'		=> '%s sudah ada. harap masukan no_induk yang baru'));

		$valid->set_rules('password','Password','required',
			array( 'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' => 'Tambahkan Pengguna' ,
						'isi' 	=> 'admin/user/tambah'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i = $this->input;
			if ($i->post('akses_level')== 'Dosen') {
				$akun_user_dosen = array(	
					'email'			=>	$i->post('email'),
					'no_induk'		=>	$i->post('no_induk'),
					'password'		=>	SHA1($i->post('password')),
					'akses_level'	=>	$i->post('akses_level')
				);
				
				$data_dosen = array(		'nama_dosen'	=>	$i->post('nama'),
											'no_tlp'		=>	$i->post('no_tlp')
				);
				$this->user_model->tambah_data_dosen($akun_user_dosen,$data_dosen);
			}else{
				$data_user_mhs = array(	
					'email'			=>	$i->post('email'),
					'no_induk'		=>	$i->post('no_induk'),
					'password'		=>	SHA1($i->post('password')),
					'akses_level'	=>	$i->post('akses_level')
				);
				$this->user_model->tambah_users($data_user_mhs);
				$get_id = $this->user_model->get_last_regist();
				// print_r($get_id[0]->id_user);
				// die();
				$data_mhs = array(		'id_user'		=>	$get_id[0]->id_user,
										'nama_mahasiswa'=>	$i->post('nama'),
										'no_tlp'		=>	$i->post('no_tlp')
				);
				$this->user_model->tambah_mhs($data_mhs);
			}
			redirect('admin/user');
		}
	}
	
	
	
	// edit user
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);
		// validasi tambah
		// print_r($user);die();
		$valid = $this->form_validation;

		$valid->set_rules('no_induk','Nomor Induk','required',
			array( 	'required'		=> '%s Tidak Boleh Kosong'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' => 	'Edit Pengguna' ,
						'user'	=>	$user,
						'isi' 	=> 	'admin/user/edit'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				if (!$i->post('password') || $i->post('password') == '') {
					# code...
					$data = array(	'id_user'		=> 	$id_user,
									'no_induk'			=>	$i->post('no_induk')
								);
				}else{
					$data = array(	'id_user'		=> 	$id_user,
									'no_induk'			=>	$i->post('no_induk'),
									'password'		=>	SHA1($i->post('password'))
								);
							}
				$this->user_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('admin/user'),'refresh');
		}
		// end masuk database
	}

	// delete data
	public function delete($id_user)
	{	
		$data = array('id_user' => $id_user );
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */