<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_sidang_kompre extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('nilai_model');

	}

	public function index()
	{		
			
		$id_user = $this->session->userdata('id_user');
		
        $mhs = $this->user_model->detail_user($id_user);
        $nilai = $this->nilai_model->nilai_sidang_kompre($mhs->id_mahasiswa);

		if (!$nilai || !$nilai[0] || $nilai[0] == '') {
			$this->session->set_flashdata('danger','Nilai Sidang pada Ketua Penguji Belum di Input');
			redirect(base_url('home/dasbor'),'refresh');
		}elseif(!$nilai[1] || $nilai[1] == ''){
			$this->session->set_flashdata('danger','Nilai Sidang pada Sekretaris Penguji Belum di Input');
			redirect(base_url('home/dasbor'),'refresh');
		}elseif(!$nilai[2] || $nilai[2] == ''){
			$this->session->set_flashdata('danger','Nilai Sidang pada Anggota Penguji Belum di Input');
			redirect(base_url('home/dasbor'),'refresh');
		}else{
		
			$nilai_p1 = $nilai[0];
			$nilai_p2 = $nilai[1];
			$nilai_p3 = $nilai[2];

			// echo '<pre>';
			// print_r($nilai_p1);
			// echo '</pre>';
			// echo '<pre>';
			// print_r($nilai_p2);
			// echo '</pre>';
			// die();

			$data = array(	'title' => 	'Nilai Sidang Alat', 
							'mhs'	=>	$mhs,
							'nilai_p1'	=>	$nilai_p1,
							'nilai_p2'	=>	$nilai_p2,
							'nilai_p3'	=>	$nilai_p3
							);
			$this->load->view('home/nilai/nilai_sidang_kompre', $data, FALSE);
		}	
	}

}

/* End of file index.php */
/* Location: ./application/controllers/home/index.php */