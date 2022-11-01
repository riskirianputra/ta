<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang extends CI_Controller {

	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->model('dosen_model');
		$this->load->model('sidang_model');
		//proteksi halaman 
	}

	public function index()
	{
		$sidang = $this->sidang_model->listing_join();
		// print_r($sidang);
		// die();

		// $penguji = $this->sidang_model->listing_penguji();

		$data = array(	'title' 	=> 'Daftar Mahasiswa ACC Sidang PKL', 
						'sidang'	=> $sidang,
						// 'penguji'	=> $penguji,
						'isi'		=> 'admin/sidang/list'
						);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// ===========================================================SIDANG ALAT
	public function sidang_alat()
	{
		$mhs = $this->mahasiswa_model->listing_mhs();
		// print_r($mhs);
		// die();

		// $penguji = $this->sidang_model->listing_penguji();

		$data = array(	'title' 	=> 'Daftar Mahasiswa Tugas Akhir', 
						'mhs'	=> $mhs,
						// 'penguji'	=> $penguji,
						'isi'		=> 'admin/sidang/list'
						);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function jadwal_sa($id)
	{
		$list_jadwal = $this->sidang_model->list_jadwal_sa();

		// print_r($list_jadwal);
		// die();

		$cek = $this->sidang_model->detail_jadwal_sa($id);
		if (!$cek) {
			$mhs = $this->mahasiswa_model->detail_mhs($id);
		}else{
			$mhs = $this->sidang_model->detail_jadwal_sa($id);
		}
		$dosen = $this->dosen_model->listing();
		// print_r($mhs);
		// die();
		$data = array(	'title' 	=> 'Jadwal Sidang Alat '.$mhs->nama_mahasiswa, 
						'mhs'	=> $mhs,
						'cek'	=> $cek,
						'list_jadwal'	=> $list_jadwal,
						'dosen'	=> $dosen,
						'isi'		=> 'admin/sidang/jadwal_sa'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function save_jadwal_sa($id,$type)
	{
		$mhs = $this->mahasiswa_model->detail_mhs($id);
		$i = $this->input;

		if ($type == 0) {
		$data = array(
			'id_mahasiswa' => $id,
			'ketua_sa' => $i->post('ketua_sa'),
			'sekre_sa' => $i->post('sekre_sa'),
			'anggota_sa' => $i->post('anggota_sa'),
			'jadwal_sidang_alat' => $i->post('jadwal_sidang_alat'),
			'jadwal_sidang_alat_akhir' => $i->post('jadwal_sidang_alat_akhir')
		);
		// print_r($data);
		// die();
		$this->sidang_model->input_jadwal_sa($data);
		}else{
			$data = array(
				'id_sidang_alat' => $id,
				'ketua_sa' => $i->post('ketua_sa'),
				'sekre_sa' => $i->post('sekre_sa'),
				'anggota_sa' => $i->post('anggota_sa'),
				'jadwal_sidang_alat' => $i->post('jadwal_sidang_alat'),
				'jadwal_sidang_alat_akhir' => $i->post('jadwal_sidang_alat_akhir')
			);
			$this->sidang_model->update_jadwal_sa($data);
		}
		$this->session->set_flashdata('sukses', 'Jadwal sidang '.$mhs->nama_mahasiswa.' berhasil di update');
		redirect(base_url('admin/sidang/sidang_alat'),'refresh');
	}

	public function cetak_jadwal_sidang_sa()
	{
		$isi = $this->sidang_model->cetak_jadwal_sa();
		$data = array('isi' => $isi);

		$this->load->view('admin/sidang/cetak_sidang_sa',$data , FALSE);
	}

	// ========================================================SIDANG KOMPRE
	public function sidang_kompre()
	{
		$mhs = $this->mahasiswa_model->listing_mhs_kompre();
		// print_r($sidang);
		// die();

		// $penguji = $this->sidang_model->listing_penguji();

		$data = array(	'title' 	=> 'Daftar Mahasiswa Telah Lulus Sidang Alat', 
						'mhs'	=> $mhs,
						// 'penguji'	=> $penguji,
						'isi'		=> 'admin/sidang/list_kompre'
						);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function jadwal_kompre($id)
	{

		$list_jadwal = $this->sidang_model->list_jadwal_kompre();

		$cek = $this->sidang_model->detail_jadwal_kompre($id);
		if (!$cek) {
			$mhs = $this->mahasiswa_model->detail_mhs($id);
		}else{
			$mhs = $this->sidang_model->detail_jadwal_kompre($id);
		}
		$dosen = $this->dosen_model->listing();
		// print_r($mhs);
		// die();
		$data = array(	'title' 	=> 'Jadwal Sidang Alat '.$mhs->nama_mahasiswa, 
						'mhs'	=> $mhs,
						'cek'	=> $cek,
						'list_jadwal'	=> $list_jadwal,
						'dosen'	=> $dosen,
						'isi'		=> 'admin/sidang/jadwal_kompre'
						);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function save_jadwal_kompre($id,$type)
	{
		$mhs = $this->mahasiswa_model->detail_mhs($id);
		$i = $this->input;

		if ($type == 0) {
		$data = array(
			'id_mahasiswa' => $id,
			'ketua_kompre' => $i->post('ketua_kompre'),
			'sekre_kompre' => $i->post('sekre_kompre'),
			'anggota_kompre' => $i->post('anggota_kompre'),
			'jadwal_sidang_kompre' => $i->post('jadwal_sidang_kompre'),
			'jadwal_sidang_kompre_akhir' => $i->post('jadwal_sidang_kompre_akhir')
		);
		$this->sidang_model->input_jadwal_kompre($data);
		}else{
			$data = array(
				'id_sidang_kompre' => $id,
				'ketua_kompre' => $i->post('ketua_kompre'),
				'sekre_kompre' => $i->post('sekre_kompre'),
				'anggota_kompre' => $i->post('anggota_kompre'),
				'jadwal_sidang_kompre' => $i->post('jadwal_sidang_kompre'),
				'jadwal_sidang_kompre_akhir' => $i->post('jadwal_sidang_kompre_akhir'),
			);
			$this->sidang_model->update_jadwal_kompre($data);
		}
		$this->session->set_flashdata('sukses', 'Jadwal sidang '.$mhs->nama_mahasiswa.' berhasil di update');
		redirect(base_url('admin/sidang/sidang_kompre'),'refresh');
	}

	public function cetak_jadwal_sidang_kompre()
	{
		$isi = $this->sidang_model->cetak_jadwal_kompre();
		$data = array('isi' => $isi);

		$this->load->view('admin/sidang/cetak_sidang_kompre',$data , FALSE);
	}

	// =========================================================================================================

	public function penguji($id_mahasiswa)
	{
		$dosen = $this->dosen_model->listing();

		$valid = $this->form_validation;

		$sidang = $this->sidang_model->detail($id_mahasiswa);

		$valid->set_rules('id_penguji_1','Harus pilih Dosen','required',
			array( 	'required'		=> '%s '));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' 		=> 	'Pilih Penguji Sidang',
						'dosen'			=> 	$dosen,
						'sidang'		=>	$sidang,
						'isi' 			=> 	'admin/sidang/penguji'
						);	
		// print_r($data);
		// die();
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'id_mahasiswa'	=>  $id_mahasiswa,
								'jadwal_sidang'	=>	$i->post('jadwal_sidang'),
								'id_penguji_1'	=>	$i->post('id_penguji_1'),
								'id_penguji_2'	=>	$i->post('id_penguji_2'),
								'status_sidang'	=>	'acc'
								);
				// $data = array_merge($data1,$data2);
				// print_r($data);
				// die();
				$this->sidang_model->update($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				redirect(base_url('admin/sidang'),'refresh');
		}
	}

	public function jadwal()
	{
	 	$sidang = $this->sidang_model->listing_jadwal();

	 	$data = array(	'title' 	=> 'Jadwal Sidang Mahasiswa',
	 					'sidang'	=>	$sidang,
	 					'isi'		=>	'admin/sidang/list_jadwal'
	 				 );
	 	$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// =========================== A J A X ==================================

	public function ajax_ketua_sa($mulai,$selesai)
	{
		$awal = date('Y-m-d H:i:s', strtotime($mulai));
		$akhir = date('Y-m-d H:i:s', strtotime($selesai));
		// print_r('<pre>');
		// print_r(json_encode($awal));
		// print_r('</pre>');
		// print_r('<pre>');
		// print_r(json_encode($akhir));
		// print_r('</pre>');
		$ketua_sa = $this->sidang_model->ajax_ketua_sa($awal,$akhir);
		// $dosen = $this->sidang_model->ajax_dosen();
		// $data =  array(
		// 	'dosen' => $dosen,
		// 	'ketua_sa' => $ketua_sa
		// );
		$result = json_encode($ketua_sa);
		echo $result;
	}
	public function ajax_ketua_kompre($mulai,$selesai)
	{
		$awal = date('Y-m-d H:i:s', strtotime($mulai));
		$akhir = date('Y-m-d H:i:s', strtotime($selesai));
		// print_r('<pre>');
		// print_r(json_encode($awal));
		// print_r('</pre>');
		// print_r('<pre>');
		// print_r(json_encode($akhir));
		// print_r('</pre>');
		$ketua_kompre = $this->sidang_model->ajax_ketua_kompre($awal,$akhir);
		// $dosen = $this->sidang_model->ajax_dosen();
		// $data =  array(
		// 	'dosen' => $dosen,
		// 	'ketua_kompre' => $ketua_kompre
		// );
		$result = json_encode($ketua_kompre);
		echo $result;
	}


}

/* End of file sidang.php */
/* Location: ./application/controllers/admin/sidang.php */