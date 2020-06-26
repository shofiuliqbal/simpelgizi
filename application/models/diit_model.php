<?php

	class diit_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(){
			
			$data = $this->db->select('tb_kelas.nama_kelas as kelas, nama_diit as diit, count(tb_kelas.nama_kelas) as jumlah')
							 ->from('tb_diit')
							 ->join('tb_pasien', "tb_pasien.id_diit = tb_diit.id_diit","left")
							 ->join('tb_kamar', "tb_pasien.id_kamar = tb_kamar.id_kamar","left")
							 ->join('tb_kelas', "tb_kamar.id_kelas = tb_kelas.id_kelas","left")
							 ->group_by("kelas, diit")
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

		public function Data(){
			
			$data = $this->db->select('*')
							 ->from('tb_diit')
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}


		public function delete($id){
			$this->db->where('nomor_register', $id)->delete('tb_pasien');
		}

		public function insert($data){
			return $this->db->insert('tb_pasien', $data);			
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