<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

	// Detail Mahasiswa untuk Pembimbing
	public function detail_mahasiswa($id_user)
	{
		$this->db->select('*');
		$this->db->from('pembimbing_lapangan');
		$this->db->join('mahasiswa', 'mahasiswa.id_pembimbing = pembimbing_lapangan.id_pembimbing', 'left');
		$this->db->join('nilai_mhs', 'nilai_mhs.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		$this->db->where('pembimbing_lapangan.id_user', $id_user);
		$this->db->order_by('pembimbing_lapangan.id_pembimbing', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_mahasiswa_nilai($id_user)
	{
		$this->db->select('*');
		$this->db->from('pembimbing_lapangan');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		// $this->db->join('nilai_mhs', 'nilai_mhs.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		$this->db->where('pembimbing_lapangan.id_user', $id_user);
		// $this->db->order_by('pembimbing_lapangan.id_pembimbing', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	public function tambah($data)
	{
		$this->db->insert('nilai_mhs', $data);
	}
	
	public function nilai_sidang_alat($id_user)
	{
		$this->db->select('*');
		$this->db->from('nilai_sidang_alat');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai_sidang_alat.id_mahasiswa', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = nilai_sidang_alat.id_dosen', 'left');
		$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
		$this->db->join('sidang_alat', 'sidang_alat.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
		$this->db->where('nilai_sidang_alat.id_mahasiswa', $id_user);
		$this->db->order_by('nilai_sidang_alat.id_nilai_sidang_alat', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function update_sidang_alat($data)
	{
		$this->db->insert('nilai_sidang_alat', $data);
	}
	
	public function nilai_sidang_kompre($id_user)
	{
		$this->db->select('*');
		$this->db->from('nilai_sidang_kompre');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai_sidang_kompre.id_mahasiswa', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = nilai_sidang_kompre.id_dosen', 'left');
		$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
		$this->db->join('sidang_kompre', 'sidang_kompre.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
		$this->db->where('nilai_sidang_kompre.id_mahasiswa', $id_user);
		$this->db->order_by('nilai_sidang_kompre.id_nilai_sidang_kompre', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function update_sidang_kompre($data)
	{
		$this->db->insert('nilai_sidang_kompre', $data);
	}
	
	public function cek_jml_nilai($id_dosen,$id_mahasiswa)
	{
		$this->db->select('*');
		$this->db->from('nilai_sidang_alat');
		// $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		// $this->db->join('nilai_mhs', 'nilai_mhs.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		$this->db->where('id_dosen', $id_dosen);
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		// $this->db->order_by('pembimbing_lapangan.id_pembimbing', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	public function cek_jml_nilai2($id_dosen,$id_mahasiswa)
	{
		$this->db->select('*');
		$this->db->from('nilai_sidang_kompre');
		// $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		// $this->db->join('nilai_mhs', 'nilai_mhs.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		$this->db->where('id_dosen', $id_dosen);
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		// $this->db->order_by('pembimbing_lapangan.id_pembimbing', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Nilai_model.php */
/* Location: ./application/models/Nilai_model.php */