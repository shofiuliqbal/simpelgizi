<?php
class jadwal_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(){
			
			$data = $this->db->select('tb_kelas.nama_kelas as kelas, nama_diit as diit, count(tb_kelas.nama_kelas) as jumlah, id_diit')
							 ->from('tb_diit')
							 ->join('tb_pasien', "tb_pasien.id_diit = tb_diit.id_diit","left")
							 ->join('tb_kamar', "tb_pasien.id_kamar = tb_kamar.id_kamar","left")
							 ->join('tb_kelas', "tb_kamar.id_kelas = tb_kelas.id_kelas","left")
							 ->group_by("kelas, diit")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function getDatapagi(){
			
			$data = $this->db->select('tb_detailmakan.*, tb_kamar.nama_kamar as nkamar, tb_pasien.nama as npasien, tb_makanan.nama as nmakan, tb_diit.nama_diit as ndiit')
							 ->from('tb_detailmakan')
							 ->join('tb_pasien', "tb_pasien.nomor_register = tb_detailmakan.nomor_register")
							 ->join('tb_makanan', "tb_makanan.id_makanan = tb_detailmakan.id_makanan")
							 ->join('tb_diit', "tb_makanan.id_diit = tb_diit.id_diit")
							 ->join('tb_kamar', "tb_pasien.id_kamar = tb_kamar.id_kamar")
							 ->where('tb_detailmakan.jadwal', "pagi")
							 ->order_by('id_detail')
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function getDatasiang(){
			
			$data = $this->db->select('tb_detailmakan.*, tb_kamar.nama_kamar as nkamar, tb_pasien.nama as npasien, tb_makanan.nama as nmakan, tb_diit.nama_diit as ndiit')
							 ->from('tb_detailmakan')
							 ->join('tb_pasien', "tb_pasien.nomor_register = tb_detailmakan.nomor_register")
							 ->join('tb_makanan', "tb_makanan.id_makanan = tb_detailmakan.id_makanan")
							 ->join('tb_diit', "tb_makanan.id_diit = tb_diit.id_diit")
							 ->join('tb_kamar', "tb_pasien.id_kamar = tb_kamar.id_kamar")
							 ->where('tb_detailmakan.jadwal', "siang")
							 ->order_by('id_detail')
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function getDatamalam(){
			
			$data = $this->db->select('tb_detailmakan.*, tb_kamar.nama_kamar as nkamar, tb_pasien.nama as npasien, tb_makanan.nama as nmakan, tb_diit.nama_diit as ndiit')
							 ->from('tb_detailmakan')
							 ->join('tb_pasien', "tb_pasien.nomor_register = tb_detailmakan.nomor_register")
							 ->join('tb_makanan', "tb_makanan.id_makanan = tb_detailmakan.id_makanan")
							 ->join('tb_diit', "tb_makanan.id_diit = tb_diit.id_diit")
							 ->join('tb_kamar', "tb_pasien.id_kamar = tb_kamar.id_kamar")
							 ->where('tb_detailmakan.jadwal', "malam")
							 ->order_by('id_detail')
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}

		public function getget($diit, $tgl){

			$data = $this->db->select('*')
							 ->from('tb_makanan')
							 ->where('id_diit', $diit)
							 ->like('tgl_makan', $tgl)
							 ->get()
							 ->result_array();

			return $data;
		}
		
		public function pagi($id_diit){

			$data = $this->db->where('jadwal', "pagi")
							 ->where('id_diit', $id_diit)
							 ->from('tb_makanan')
							 ->get()
							 ->result_array();

			return $data;
		}

		public function siang($id_diit){

			$data = $this->db->where('jadwal', "siang")
							 ->where('id_diit', $id_diit)
							 ->from('tb_makanan')
							 ->get()
							 ->result_array();

			return $data;
		}

		public function malam($id_diit){

			$data = $this->db->where('jadwal', "malam")
							 ->where('id_diit', $id_diit)
							 ->from('tb_makanan')
							 ->get()
							 ->result_array();

			return $data;
		}

		public function Data(){
			
			$data = $this->db->select('*')
							 ->from('tb_diit')
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}


		public function delete($id){
			$this->db->where('nomor_register', $id)->delete('tb_detailmakan');
		}

		public function insert($data){
			
			$detail = $data['detail'];
			unset($data['detail']);			
			$id = $data['nomor_register'];
			foreach($detail as $dt){
				$dt['nomor_register'] = $id;
				$this->db->insert('tb_detailmakan', $dt);

		}
		}
		
			
		/*
		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('kapal')
							 ->where('id', $id)
							 ->get()
							 ->row_array();
							 
			return $data;	
		}

		SELECT tb_kelas.nama_kelas as kelas, nama_diit as diit, count(tb_kelas.nama_kelas) as jumlah FROM tb_diit
		left join tb_pasien on tb_pasien.id_diit = tb_diit.id_diit
		left join tb_kamar on tb_pasien.id_kamar = tb_kamar.id_kamar
		left join tb_kelas on tb_kamar.id_kelas = tb_kelas.id_kelas
		group by kelas, diit
		
		public function insert($data){
			return $this->db->insert('kapal', $data);			
		}
		
		public function update($data, $id) {
			return $this->db->update('kapal', $data, array('id' => $id));
		}
		
		public function delete($id){
			$this->db->where('id', $id)->delete('kapal');
		}
		
		function alldata()
		{
			$this->db->select('*');
			$this->db->from('kapal');
			$getDatakapal = $this->db->get();
			if($getDatakapal->num_rows() > 0)
			return $getDatakapal->result_array();
			else return null;
		}
	*/	
	}

?>