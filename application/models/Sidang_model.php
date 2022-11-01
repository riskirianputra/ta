<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua user
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->order_by('id_sidang', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		// listing semua user
		public function list_jadwal_sa()
		{
			$this->db->select('*, ketua.nama_dosen as ketua, sekre.nama_dosen as sekre');
			$this->db->from('sidang_alat as sa');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sa.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->join('dosen as ketua', 'ketua.id_dosen = sa.ketua_sa', 'inner');
			$this->db->join('dosen as sekre', 'sekre.id_dosen = sa.sekre_sa', 'inner');
			$this->db->order_by('sa.id_sidang_alat', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		// listing semua user
		public function list_jadwal_kompre()
		{
			$this->db->select('*, ketua.nama_dosen as ketua, sekre.nama_dosen as sekre, anggota.nama_dosen as anggota');
			$this->db->from('sidang_kompre as kompre');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = kompre.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->join('dosen as ketua', 'ketua.id_dosen = kompre.ketua_kompre', 'inner');
			$this->db->join('dosen as sekre', 'sekre.id_dosen = kompre.sekre_kompre', 'inner');
			$this->db->join('dosen as anggota', 'anggota.id_dosen = kompre.anggota_kompre', 'inner');
			$this->db->order_by('kompre.id_sidang_kompre', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function listing_penguji()
		{
			$this->db->select('*');
			$this->db->from('penguji');
			$this->db->order_by('penguji', 'asc');
			$query = $this->db->get();
			return $query->result();
		}

		public function listing_join()
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('judul_pkl', 'judul_pkl.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = sidang.id_user', 'left');
			$this->db->where('sidang.jadwal_sidang', '0000-00-00');
			$this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function listing_sidang_alat_dosen($id)
		{
			$this->db->select('*');
			$this->db->from('sidang_alat');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_alat.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('sidang_alat.ketua_sa', $id);
			$this->db->or_where('sidang_alat.sekre_sa', $id);
			$this->db->or_where('sidang_alat.anggota_sa', $id);
			$this->db->order_by('sidang_alat.jadwal_sidang_alat', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function listing_sidang_kompre_dosen($id)
		{
			$this->db->select('*');
			$this->db->from('sidang_kompre');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_kompre.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('sidang_kompre.ketua_kompre', $id);
			$this->db->or_where('sidang_kompre.sekre_kompre', $id);
			$this->db->or_where('sidang_kompre.anggota_kompre', $id);
			$this->db->order_by('sidang_kompre.jadwal_sidang_kompre', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function detail_sidang_alat_dosen($id,$id_mhs)
		{
			$this->db->select('*');
			$this->db->from('sidang_alat');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_alat.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('sidang_alat.id_mahasiswa', $id_mhs);
			$this->db->where('sidang_alat.ketua_sa', $id);
			$this->db->or_where('sidang_alat.sekre_sa', $id);
			$this->db->or_where('sidang_alat.anggota_sa', $id);
			$this->db->order_by('sidang_alat.jadwal_sidang_alat', 'desc');
			$query = $this->db->get();
			return $query->row();
		}
		
		public function detail_sidang_kompre_dosen($id,$id_mhs)
		{
			$this->db->select('*');
			$this->db->from('sidang_kompre');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_kompre.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('sidang_kompre.id_mahasiswa', $id_mhs);
			$this->db->where('sidang_kompre.ketua_kompre', $id);
			$this->db->or_where('sidang_kompre.sekre_kompre', $id);
			$this->db->or_where('sidang_kompre.anggota_kompre', $id);
			$this->db->order_by('sidang_kompre.jadwal_sidang_kompre', 'desc');
			$query = $this->db->get();
			return $query->row();
		}
		
		public function cetak_jadwal_sa()
		{
			$this->db->select('*');
			$this->db->from('sidang_alat');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_alat.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			// $this->db->where('sidang.jadwal_sidang', '0000-00-00');
			$this->db->order_by('sidang_alat.jadwal_sidang_alat', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function cetak_jadwal_kompre()
		{
			$this->db->select('*');
			$this->db->from('sidang_kompre');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_kompre.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			// $this->db->where('sidang.jadwal_sidang', '0000-00-00');
			$this->db->order_by('sidang_kompre.jadwal_sidang_kompre', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function detail_jadwal_sa($id)
		{
			$this->db->select('*');
			$this->db->from('sidang_alat');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_alat.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('sidang_alat.id_mahasiswa', $id);
			// $this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		public function detail_jadwal_kompre($id)
		{
			$this->db->select('*');
			$this->db->from('sidang_kompre');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang_kompre.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('sidang_kompre.id_mahasiswa', $id);
			// $this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		public function input_jadwal_sa($data)
		{
			$this->db->insert('sidang_alat', $data);
		}

		public function input_jadwal_kompre($data)
		{
			$this->db->insert('sidang_kompre', $data);
		}

		public function update_jadwal_sa($data)
		{
			$this->db->where('id_sidang_alat', $data['id_sidang_alat']);
			$this->db->update('sidang_alat', $data);
		}

		public function update_jadwal_kompre($data)
		{
			$this->db->where('id_sidang_kompre', $data['id_sidang_kompre']);
			$this->db->update('sidang_kompre', $data);
		}

		public  function listing_jadwal()
		{
			// $sql = "SELECT sidang.id_sidang,mahasiswa.id_mahasiswa,penguji1.nama_dosen as penguji1,penguji2.nama_dosen as penguji2 from sidang
			// 		inner join dosen penguji1 on sidang.id_penguji_1 = penguji1.id_dosen
			// 		inner join dosen penguji2 on sidang.id_penguji_2 = penguji2.id_dosen
			// 		inner join mahasiswa on sidang.id_mahasiswa = mahasiswa.id_mahasiswa
			// 		where sidang.status_sidang = 'acc'";
			$this->db->select('sidang.id_sidang, penguji1.nama_dosen AS penguji1, penguji2.nama_dosen AS penguji2, mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa, sidang.jadwal_sidang', FALSE);
			$this->db->from('sidang');
			$this->db->join('dosen AS penguji1', 'penguji1.id_dosen = sidang.id_penguji_1', 'inner');
			$this->db->join('dosen AS penguji2', 'penguji2.id_dosen = sidang.id_penguji_2', 'inner');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa');
			$this->db->where('sidang.status_sidang', 'acc');

			$query = $this->db->get();
			
			return $query->result_array();
		}		

		public function detail_join($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('judul_pkl', 'judul_pkl.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = sidang.id_user', 'left');
			$this->db->where('sidang.id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->row();
		}		

		public function nama_penguji($id_dosen)
		{
			$this->db->select('penguji.id_penguji,mahasiswa.nama_mahasiswa,penguji.id_dosen,penguji.id_mahasiswa,dosen.nama_dosen,penguji.penguji');
			$this->db->from('penguji');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = penguji.id_mahasiswa', 'left');
			$this->db->join('dosen', 'dosen.id_dosen = penguji.id_dosen', 'left');
			$this->db->where('penguji.id_dosen', $id_dosen);
			$this->db->order_by('penguji.id_penguji', 'asc');
			$query = $this->db->get();
			return $query->result();
		}

		public function detail($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('id_sidang', 'desc');
			$query = $this->db->get();
			return $query->row();
			
		}

		public function update($data)
		{
			$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
			$this->db->update('sidang', $data);
		}



		// ======== DOSEN =============

		public function sidang_dosen_satu($id_dosen)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('dosen', 'dosen.id_dosen = sidang.id_penguji_1', 'left');
			$this->db->where('sidang.id_penguji_1', $id_dosen);
			$this->db->order_by('sidang.jadwal_sidang', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function sidang_dosen_dua($id_dosen)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('dosen', 'dosen.id_dosen = sidang.id_penguji_2', 'left');
			$this->db->where('sidang.id_penguji_2', $id_dosen);
			$this->db->order_by('sidang.jadwal_sidang', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		// =========================== A J A X ==================================
		
		
		// public function ajax_ketua_sa($awal,$akhir)
		// {
		// 	$this->db->select('dsn.nama_dosen, DATE_FORMAT(ketua.jadwal_sidang_alat, "%Y-%m-%dT%H:%i") AS awal, DATE_FORMAT(ketua.jadwal_sidang_alat_akhir, "%Y-%m-%dT%H:%i") AS akhir ');
		// 	$this->db->from('sidang_alat as ketua');
		// 	$this->db->join('dosen as dsn', 'dsn.id_dosen = ketua.ketua_sa', 'left');
		// 	// $this->db->join('sidang_alat as sekre', 'sekre.id_dosen = dsn.id_dosen', 'inner');
		// 	$this->db->where('ketua.jadwal_sidang_alat >', $awal);
		// 	$this->db->or_where('ketua.jadwal_sidang_alat_akhir <', $akhir);
		// 	// $this->db->order_by('sidang.jadwal_sidang', 'desc');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }
		public function ajax_dosen()
		{
			$this->db->select('*');
			$this->db->from('dosen');
			$query = $this->db->get();
			return $query->result();
		}
		public function ajax_ketua_sa($mulai,$selesai)
		{
			$sql = "SELECT * from dosen where id_dosen not in 
					(select ketua_sa from sidang_alat where (jadwal_sidang_alat <= '".$mulai."' AND  jadwal_sidang_alat_akhir >= '".$selesai."' ) or (jadwal_sidang_alat >= '".$mulai."' AND  jadwal_sidang_alat_akhir <= '".$selesai."' ))
					AND id_dosen not in (select sekre_sa from sidang_alat where (jadwal_sidang_alat <= '".$mulai."' AND  jadwal_sidang_alat_akhir >= '".$selesai."' ) or (jadwal_sidang_alat >= '".$mulai."' AND  jadwal_sidang_alat_akhir <= '".$selesai."' ))
					";
			return $this->db->query($sql)->result();
		}
		public function ajax_ketua_kompre($mulai,$selesai)
		{
			$sql = "SELECT * from dosen where id_dosen not in 
					(select ketua_kompre from sidang_kompre where (jadwal_sidang_kompre <= '".$mulai."' AND  jadwal_sidang_kompre_akhir >= '".$selesai."' ) or (jadwal_sidang_kompre >= '".$mulai."' AND  jadwal_sidang_kompre_akhir <= '".$selesai."' ))
					AND id_dosen not in (select sekre_kompre from sidang_kompre where (jadwal_sidang_kompre <= '".$mulai."' AND  jadwal_sidang_kompre_akhir >= '".$selesai."' ) or (jadwal_sidang_kompre >= '".$mulai."' AND  jadwal_sidang_kompre_akhir <= '".$selesai."' ))
					AND id_dosen not in (select anggota_kompre from sidang_kompre where (jadwal_sidang_kompre <= '".$mulai."' AND  jadwal_sidang_kompre_akhir >= '".$selesai."' ) or (jadwal_sidang_kompre >= '".$mulai."' AND  jadwal_sidang_kompre_akhir <= '".$selesai."' ))
					";
			return $this->db->query($sql)->result();
		}
		// public function ajax_ketua_kompre()
		// {
		// 	$this->db->select('*,DATE_FORMAT(jadwal_sidang_kompre, "%Y-%m-%dT%H:%i") AS awal, DATE_FORMAT(jadwal_sidang_kompre_akhir, "%Y-%m-%dT%H:%i") AS akhir ');
		// 	$this->db->from('sidang_kompre');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }


}