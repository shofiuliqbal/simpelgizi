<?php

	class kamar_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(){
			
			$data = $this->db->select('*')
							 ->from('tb_kamar')
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