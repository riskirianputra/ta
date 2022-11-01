<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

		public function listing_user_data()
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->where('id_pembimbing', '');
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		public function get_last_regist()
		{
			$this->db->select('id_user');
			$this->db->from('users');
			$this->db->order_by('id_user', 'desc');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result();
		}

		public function detail($id)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id_user', $id);
			$query = $this->db->get();
			return $query->row();
		}
		// listing semua user
		public function listing_user()
		{
			$this->db->select('users.*, dosen.nama_dosen, mahasiswa.nama_mahasiswa');
			$this->db->from('users');
			$this->db->join('dosen', 'dosen.id_user = users.id_user', 'left');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			// $this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_user = users.id_user', 'left');
			$this->db->order_by('users.id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}
		// listing semua tabel join user
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('dosen', 'dosen.id_user = users.id_user', 'left');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			$this->db->order_by('users.id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}
		// listing semua user
		public function listing_mhs()
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->order_by('mahasiswa.id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}
		// Detail Mahasiswa untuk home page
		public function detail_cek($id_user)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			$this->db->where('users.id_user', $id_user);
			$this->db->order_by('users.id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		// Detail Mahasiswa untuk home page
		public function detail_user($id_user)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			$this->db->where('users.id_user', $id_user);
			$this->db->order_by('users.id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}
				// Login user
		public function tambah($data)
		{
			$this->db->insert('users', $data);
		}

				// Login user
		public function login($username,$password)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where(array(	'no_induk'	=> $username,
							 		'password'	=> SHA1($password)));
			$this->db->order_by('id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

					public function tambah_data_dosen($akun_user_dosen,$data_dosen)
					{
					    $this->db->trans_start();
					      $id = $this->tambah_akun_dosen($akun_user_dosen);
					      $data_dosen['id_user'] = $id;
					      $this->tambah_user_dosen($data_dosen);
					    $this->db->trans_complete();
					 
					    return $this->db->trans_status();
			  		}

			  		public function tambah_akun_dosen($data)
			  		{
					    $this->db->insert('users', $data);
					    $id = $this->db->insert_id();
					    return (isset($id)) ? $id : FALSE;
					}

					 public function tambah_user_dosen($data)
					 {
					    $res = $this->db->insert('dosen', $data);
					    return $res;
					 }

					 // batas
					 
					//  public function tambah_data_pembimbing($akun_user_pembimbing,$data_pembimbing)
					// {
					//     $this->db->trans_start();
					//       $id = $this->tambah_akun_pembimbing($akun_user_pembimbing);
					//       $data_pembimbing['id_user'] = $id;
					//       $this->tambah_user_pembimbing($data_pembimbing);
					//     $this->db->trans_complete();
					 
					//     return $this->db->trans_status();
			  		// }

			  		// public function tambah_akun_pembimbing($data)
			  		// {
					//     $this->db->insert('users', $data);
					//     $id = $this->db->insert_id();
					//     return (isset($id)) ? $id : FALSE;
					// }

					//  public function tambah_user_pembimbing($data)
					//  {
					//     $res = $this->db->insert('pembimbing_lapangan', $data);
					//     return $res;
					//  }

										public function registrasi($user,$data_mahasiswa)
										{
										    $this->db->trans_start();
										      $id = $this->akun($user);
										      $data_mahasiswa['id_user'] = $id;
										      $this->user($data_mahasiswa);
										    $this->db->trans_complete();
										 
										    return $this->db->trans_status();
								  		}

								  		public function akun($data)
								  		{
										    $this->db->insert('users', $data);
										    $id = $this->db->insert_id();
										    return (isset($id)) ? $id : FALSE;
										}

										 public function user($data)
										 {
										    $res = $this->db->insert('mahasiswa', $data);
										    return $res;
										 }

	// Tambah data user
		public function tambah_users($data)
		{
			$this->db->insert('users', $data);
		}

	// Tambah data mhs
		public function tambah_mhs($data)
		{
			$this->db->insert('mahasiswa', $data);
		}
	// edit data user
		public function edit($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('users',$data);
		}

	// delete data
		public function delete($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->delete('users',$data);
		}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */