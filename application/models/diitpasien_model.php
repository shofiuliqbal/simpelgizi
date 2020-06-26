<?php

	class diitpasien_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData($cari=false){

			if($cari)
				$this->db->like('nomor_register', $cari);
			
			$data = $this->db->select('tb_pasien.*, tb_diit.nama_diit as diit, tb_kamar.nama_kamar as kamar, tb_kelas.nama_kelas as kelas')
							 ->from('tb_pasien')
							 ->join('tb_diit', "tb_diit.id_diit = tb_pasien.id_diit")
							 ->join('tb_kamar', "tb_kamar.id_kamar = tb_pasien.id_kamar")
							 ->join('tb_kelas', "tb_kamar.id_kelas = tb_kelas.id_kelas")
							 ->where('status', "aktif")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}

		/*public function getJadwal(){
			
			$data = $this->db->select('tb_pasien.*, tb_diit.nama_diit as diit, tb_kamar.nama_kamar as kamar, tb_kelas.nama_kelas as kelas')
							 ->from('tb_pasien')
							 ->join('tb_diit', "tb_diit.id_diit = tb_pasien.id_diit")
							 ->join('tb_kamar', "tb_kamar.id_kamar = tb_pasien.id_kamar")
							 ->join('tb_kelas', "tb_kamar.id_kelas = tb_kelas.id_kelas")
							 ->where('status',"aktif")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}*/

		/*public function delete($id){
			$this->db->where('nomor_register', $id)->delete('tb_pasien');
		}*/

		/*public function insert($data){
			return $this->db->insert('tb_pasien', $data);			
		}*/

		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('tb_pasien')
							 ->where('nomor_register', $id)
							 ->get()
							 ->row_array();
							 
			return $data;	
		}


		public function getMakan($id){
			$data = $this->db->select('tb_pasien.*, tb_diit.nama_diit as diit, tb_diit.keterangan as ket')
							 ->from('tb_pasien')
							 ->join('tb_diit', "tb_diit.id_diit = tb_pasien.id_diit")
							 ->where('nomor_register', $id)
							 ->get()
							 ->row_array();
							 
			return $data;	
		}
		
		public function update($data, $id) {
			return $this->db->update('tb_pasien', $data, array('nomor_register' => $id));
		}

		public function post($id, $status)
		{
			return $this->db->where('nomor_register', $id)->update('tb_pasien', ['status' => $status]);
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