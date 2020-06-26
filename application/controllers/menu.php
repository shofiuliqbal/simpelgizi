<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();

	if (!$this->session->userdata('id_user'))
			redirect('/auth/login');

	}
	
	public function index()
	{
		//$session = $this->session->all_userdata();
		//$cari = $this->input->get('cari');
			
		//ambil data diit ke model
		$data = $this->menu_model->getData();
		//var_dump($data);die;
		//$diit = $this->diit_model->getData();
		//tampilkan ke model
		$this->layout->render('menu/index', array('data' => $data));
		
	}
	
	public function tambah()
	{
		//jika data hasil kiriman form
		//$session = $this->session->all_userdata();
		$data = array();
		$error = '';
		if($this->input->post())
		{
		
			//ambil data dari form dan kumpulkan dalam 1 array
			$data = array(
				 'nama' => $this->input->post('nama', true),
				 'id_diit' => $this->input->post('id_diit', true),
				 'jadwal' => $this->input->post('jadwal', true),
				 'harga_akhir' => 0
			 );	
				
			// mulai validasi
			$this->form_validation->set_rules('nama', 'Nama Makanan', 'required');
			$this->form_validation->set_rules('id_diit', 'ID Diit', 'required');
			$this->form_validation->set_rules('jadwal', 'jadwal', 'required');
		
			if ($this->form_validation->run() == false){
				$error .= validation_errors();
			}

			
			//cek validasi
			if (!$error){
				//simpan data ke database
				//var_dump($data);die;

				$data['detail'] = array();
				foreach($_POST['id_bahan'] as $k => $bahan){
					if ($bahan){
						$total = floatval($_POST['harga'][$k]) * floatval($_POST['persediaan'][$k]);
						$data['detail'][] = array(
							'id_makanan' => '',
							'id_bahan' => $bahan, 
							'harga' => $_POST['harga'][$k], 
							'persediaan' => $_POST['persediaan'][$k], 
							'total' => $total
						);
						$data['harga_akhir'] += $total; 
					}
				}
				
				$this->menu_model->insert($data);
				
				//redirect ke halaman index
				redirect('/menu/index');	
			}
		}
		//tampilkan form jika dari link tambah
		$diit = $this->diit_model->Data();
		$bahan = $this->persediaan_model->getData();
		
		//var_dump($diit);die;
		
		$this->layout->render('menu/tambahmenu', array('diit' => $diit, 'bahan' => $bahan));
	}
	
	public function detil()
	{
		//ambil data pelabuhan ke model
		//$data = $this->tangkapan_model->getData();
		$id = $this->uri->segment(3);
		$data_detail = $this->menu_model->getOne($id);
		//var_dump($data_detail);die;
		//tampilkan ke model
		$this->layout->render('menu/detil', array('data' => $data_detail));
			
	}
	
	public function hapus()
	{
		$id = $this->uri->segment(3);
		
		$this->menu_model->delete($id);
		
		redirect('/menu/index');
	}

	

	
}

	

?>