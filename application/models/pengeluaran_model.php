<?php

	class pengeluaran_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(){
			
			$data = $this->db->select('tb_pengeluaran.*, SUM(total) as total, SUM(tb_pengeluaran.persediaan) as banyak, tb_bahan.nama as bahan, tb_pengeluaran.tanggal as tgl, tb_bahan.satuan as satuan')
							 ->from('tb_pengeluaran')
							 ->join('tb_bahan',"tb_pengeluaran.id_bahan = tb_bahan.id_bahan")
							 ->group_by('bahan, tgl')
							 ->get()
							 ->result_array(); 
			return $data;				 
		}
		
	}

?>