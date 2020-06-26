 <?php
	class pasien_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(){
			
			$data = $this->db->select('tb_pasien.*, tb_diit.nama_diit as diit, tb_kamar.nama_kamar as kamar, tb_kelas.nama_kelas as kelas')
							 ->from('tb_pasien')
							 ->join('tb_diit', "tb_diit.id_diit = tb_pasien.id_diit")
							 ->join('tb_kamar', "tb_kamar.id_kamar = tb_pasien.id_kamar")
							 ->join('tb_kelas', "tb_kamar.id_kelas = tb_kelas.id_kelas")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}

		public function getJadwal(){
			
			$data = $this->db->select('tb_pasien.*, tb_diit.nama_diit as diit, tb_kamar.nama_kamar as kamar, tb_kelas.nama_kelas as kelas')
							 ->from('tb_pasien')
							 ->join('tb_diit', "tb_diit.id_diit = tb_pasien.id_diit")
							 ->join('tb_kamar', "tb_kamar.id_kamar = tb_pasien.id_kamar")
							 ->join('tb_kelas', "tb_kamar.id_kelas = tb_kelas.id_kelas")
							 ->where('status',"aktif")
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

		public function delete($id){
			$this->db->where('nomor_register', $id)->delete('tb_pasien');
		}

		public function insert($data){
			return $this->db->insert('tb_pasien', $data);			
		}

		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('tb_pasien')
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
	}

?>