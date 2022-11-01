<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('dosen_model');
		$this->load->model('sidang_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('nilai_model');

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

        $id_dosen = $this->dosen_model->detail_dosen($id_user);
        
        $data_sidang_satu = $this->sidang_model->sidang_dosen_satu($id_dosen->id_dosen);
        $data_sidang_dua = $this->sidang_model->sidang_dosen_dua($id_dosen->id_dosen);

        $data_sidang = array_merge($data_sidang_satu,$data_sidang_dua);

		$data = array(	'title' => 	'Daftar Mahasiswa Sidang', 
						'sidang'=>	$data_sidang,
						'isi'	=>	'dosen/sidang/list'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
    }
    
	public function penilaian($id_mhs)
	{
        $mhs = $this->mahasiswa_model->detail_mhs_sidang($id_mhs);

		$data = array(	'title' => 	'Ruang sidang mahasiswa '.$mhs->nama_mahasiswa, 
						'mhs'   =>	$mhs,
						'isi'	=>	'dosen/sidang/ruang'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	// ==========================================================SIDANG ALAT
	
	public function sidang_alat()
	{
		$id = $this->dosen_model->detail_dosen($this->session->userdata('id_user'));
		$daftar_sidang = $this->sidang_model->listing_sidang_alat_dosen($id->id_dosen);

		$data = array(	'title' => 	'Sidang Alat', 
						'dosen'   =>	$id,
						'mhs'   =>	$daftar_sidang,
						'isi'	=>	'dosen/sidang_alat/list'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function ruang_sidang_alat($id_mhs)
	{
		$id = $this->dosen_model->detail_dosen($this->session->userdata('id_user'));
		$daftar_sidang = $this->sidang_model->detail_sidang_alat_dosen($id->id_dosen,$id_mhs);

		$cek_tbl_nilai = $this->nilai_model->cek_jml_nilai($id->id_dosen,$id_mhs);

		if(!$cek_tbl_nilai){
			$data = array(	'title' => 	'Sidang Alat Tugas Akhir', 
				'dosen'   =>	$id,
				'mhs'   =>	$daftar_sidang,
				'isi'	=>	'dosen/sidang_alat/ruang'
				);
			$this->load->view('dosen/layout/wrapper', $data, FALSE);
		}else{
			$this->session->set_flashdata('danger', 'Mahasiswa ini Sudah selesai di sidang');
			redirect(base_url('dosen/sidang/sidang_alat'),'refresh');
		}
	}

	public function sidang_alat_submit($id_dosen,$id_mhs)
	{
		$i = $this->input;
		$data = array(
			'id_mahasiswa' => $id_mhs,
			'id_dosen' => $id_dosen,
			'penampilan_sa' => $i->post('n_penampilan'),
			'presentasi_sa' => $i->post('n_presentasi'),
			'hasil_program_sa' => $i->post('n_penguasaan'),
			'penguasaan_sa' => $i->post('n_penguasaan'),
			'penulisan_sa' => $i->post('n_penulisan_l'),
			'total_nilai_sa' => $i->post('n_total_sidang'),
			'komentar_sa' => $i->post('komentar'),
			'penguji' => $i->post('penguji')
		);
		$data2 = array(
			'id_mahasiswa' => $id_mhs,
			'status_mahasiswa' => 1
		);
		$this->nilai_model->update_sidang_alat($data);
		$this->mahasiswa_model->edit($data2);
		$this->session->set_flashdata('sukses', 'Mahasiswa Telah selesai di sidang');
		redirect(base_url('dosen/sidang/sidang_alat'),'refresh');
	}

	// ==========================================================SIDANG KOMPRE
	
	public function sidang_kompre()
	{
		$id = $this->dosen_model->detail_dosen($this->session->userdata('id_user'));
		$daftar_sidang = $this->sidang_model->listing_sidang_kompre_dosen($id->id_dosen);
		
		// print_r($daftar_sidang);
		// die();

		$data = array(	'title' => 	'Sidang Komprenshif', 
						'dosen'   =>	$id,
						'mhs'   =>	$daftar_sidang,
						'isi'	=>	'dosen/sidang_kompre/list'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function ruang_sidang_kompre($id_mhs)
	{
		$id = $this->dosen_model->detail_dosen($this->session->userdata('id_user'));
		$daftar_sidang = $this->sidang_model->detail_sidang_kompre_dosen($id->id_dosen,$id_mhs);

		$cek_tbl_nilai = $this->nilai_model->cek_jml_nilai2($id->id_dosen,$id_mhs);

		if(!$cek_tbl_nilai){
			$data = array(	'title' => 	'Sidang Komprehensif Tugas Akhir', 
						'dosen'   =>	$id,
						'mhs'   =>	$daftar_sidang,
						'isi'	=>	'dosen/sidang_kompre/ruang'
						);
			$this->load->view('dosen/layout/wrapper', $data, FALSE);
		}else{
			$this->session->set_flashdata('danger', 'Mahasiswa ini Sudah selesai di sidang');
			redirect(base_url('dosen/sidang/sidang_kompre'),'refresh');
		}
	}

	public function sidang_kompre_submit($id_dosen,$id_mhs)
	{
		$i = $this->input;
		$data = array(
			'id_mahasiswa' => $id_mhs,
			'id_dosen' => $id_dosen,
			'penampilan_kompre' => $i->post('n_penampilan'),
			'presentasi_kompre' => $i->post('n_presentasi'),
			'wawasan_kompre' => $i->post('n_penguasaan'),
			'penguasaan_kompre' => $i->post('n_penguasaan'),
			'penulisan_kompre' => $i->post('n_penulisan_l'),
			'total_nilai_kompre' => $i->post('n_total_sidang'),
			'penguji' => $i->post('penguji')
		);
		$data2 = array(
			'id_mahasiswa' => $id_mhs,
			'status_mahasiswa' => 2
		);
		$this->nilai_model->update_sidang_kompre($data);
		$this->mahasiswa_model->edit($data2);
		$this->session->set_flashdata('sukses', 'Mahasiswa Telah selesai di sidang');
		redirect(base_url('dosen/sidang/sidang_kompre'),'refresh');
	}
}

/* End of file dasbor.php */
/* End of file Dasbor.php */
/* Location: ./application/controllers/pembimbing/Dasbor.php */