<?php
class menu_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		
		public function getData(){
			
			$data = $this->db->select('tb_makanan.*, tb_diit.nama_diit as ndiit')
							 ->from('tb_makanan')
							 ->join('tb_diit', "tb_diit.id_diit = tb_makanan.id_diit")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('tb_makanan')
							 ->where('tb_makanan.id_makanan', $id)
							 ->get()
							 ->row_array();
			if ($data){
				$data['detail'] = $this->db->select('tb_detailbahan.*, tb_bahan.nama nbahan, tb_bahan.satuan as satuan')
								 ->from('tb_detailbahan')
								 ->join('tb_bahan', "tb_bahan.id_bahan = tb_detailbahan.id_bahan")
								 ->where('tb_detailbahan.id_makanan', $id)
								 ->get()
								 ->result_array();
			}
							 
			return $data;	
		}

		public function data_detail($id)
		{
			$data = $this->db->select('*')
							 ->from('tb_bahan')
							 ->where('id_bahan', $id)
							 ->get()
							 ->row_array();

			return $data;				 		
		}
		
		public function delete($id){
			$this->db->where('id_makanan', $id)->delete('tb_detailbahan');
			$this->db->where('id_makanan', $id)->delete('tb_makanan');
		
		}

		public function stok_update($stok, $id) {
			return $this->db->update('tb_bahan', $stok, array('id_bahan' => $id));
		}

		/*public function getMenu(){
			
			$data = $this->db->select('tb_detailbahan.*, tb_diit.nama_diit as ndiit, tb_makanan.nama as nmakan, tb_bahan.nama nbahan')
							 ->from('tb_detailbahan')
							 ->join('tb_makanan', "tb_makanan.id_makanan = tb_detailbahan.id_makanan")
							 ->join('tb_diit', "tb_diit.id_diit = tb_makanan.id_diit")
							 ->join('tb_bahan', "tb_bahan.id_bahan = tb_detailbahan.id_bahan")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}*/
		
		public function insert($data){
			
			$detail = $data['detail'];
			unset($data['detail']);		
			$this->db->insert('tb_makanan', $data);			
			$id = $this->db->insert_id();
			foreach($detail as $dt){
				$dt['id_makanan'] = $id;
				$this->db->insert('tb_detailbahan', $dt);

		}
		}

		public function insert_pengeluaran($pengeluaran){
			return $this->db->insert('tb_pengeluaran', $pengeluaran);			
		}
		

		/*public function delete($id){
			$this->db->where('nomor_register', $id)->delete('tb_detailmakan');
		}

		public function insert($data){
			
			$detail = $data['detail'];
			unset($data['detail']);
			//$this->db->insert('tangkapan', $data);			
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