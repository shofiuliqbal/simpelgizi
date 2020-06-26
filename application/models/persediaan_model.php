<?php

	class persediaan_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(){
			
			$data = $this->db->select('*')
							 ->from('tb_bahan')
							 ->get()
							 ->result_array(); 
			return $data;				 
		}

		public function delete($id){
			$this->db->where('id_bahan', $id)->delete('tb_bahan');
		}

		public function insert($data){
			return $this->db->insert('tb_bahan', $data);			
		}

		public function update($data, $id) {
			return $this->db->update('tb_bahan', $data, array ('id_bahan' => $id));
		}

		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('tb_bahan')
							 ->where('id_bahan', $id)
							 ->get()
							 ->row_array();
							 
			return $data;	
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