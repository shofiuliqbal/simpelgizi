<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();

		if (!$this->session->userdata('id_user'))
			redirect('/auth/login');

	}
	
	public function index()
	{
		$data = $this->diit_model->getData();
		$this->layout->render('diit/index', array('data' => $data));
		
	}

	public function ubah(){
		
		$data = array();
		$error = '';
		if($this->input->post())
		{
			$reg = $this->input->post('nomor_register', true);
			$data = array('nomor_register' => $reg);	
		
			if (!$error){
				$data['detail'] = array();
				foreach($_POST['jadwal'] as $k => $jadwal){
					if ($jadwal){
						$data['detail'][] = array(
							'nomor_register' => $reg, 
							'id_makanan' => $_POST['id_makan'][$k],
							'jadwal' => $jadwal,
							'tgl_makan' => ''); 
					}
				}
				$this->jadwal_model->insert($data);
				foreach($_POST['id_makan'] as $mkn)
				{
					$detail = array();
					$data = $this->menu_model->getOne($mkn);	

					foreach($data['detail'] as $value)
					{
						$id = $value['id_bahan'];
						$persediaan = $value['persediaan'];
						$datastok = $this->menu_model->data_detail($id);

						$data = floatval($datastok['persediaan']) - floatval($persediaan);

						$stok = array();
						$stok['persediaan'] = $data; 
						$this->menu_model->stok_update($stok, $id);

						$pengeluaran = array();
						$totalpengeluaran = floatval($datastok['harga']) * floatval($persediaan); 
						$pengeluaran = array(
												'id_pengeluaran' => '',
												'id_bahan' => $id,
												'harga' => $datastok['harga'],
												'persediaan' => $persediaan,
												'total' => $totalpengeluaran
											);
						$this->menu_model->insert_pengeluaran($pengeluaran);
					}
				}
				redirect('diitpasien/index');	
			}
		}		
		
		$id = $this->uri->segment(3);
		$data = $this->diitpasien_model->getMakan($id);
		$diit = $data['id_diit'];
		$tgl = date('Y-m-d');
		$makan = $this->jadwal_model->getget($diit, $tgl);

		$this->layout->render('jadwal/form_tambah', array('data' => $data, 'error' => $error, 'makan' => $makan));
	}
	
	public function pagi(){
		$data = array();
		//$error = '';
		
		$data = $this->jadwal_model->getDatapagi();
		//var_dump($data);die;
		
		$this->layout->render('jadwal/pagi', array('data' => $data));
	}
	
	public function siang(){
		$data = array();
		//$error = '';
		
		$data = $this->jadwal_model->getDatasiang();
		//var_dump($data);die;
		
		$this->layout->render('jadwal/siang', array('data' => $data));
	}
	
	public function malam(){
		$data = array();
		//$error = '';
		
		$data = $this->jadwal_model->getDatamalam();
		//var_dump($data);die;
		
		$this->layout->render('jadwal/malam', array('data' => $data));
	}
	
	
	public function hapus()
	{
		//ambil id yang ada di segment 3
		$id = $this->uri->segment(3);
		
		//hapus data di database
		$this->jadwal_model->delete($id);
		
		//redirect ke halaman index
		redirect('/jadwal/pagi');
	}
	
	public function pdfPagi(){
		$data = $this->jadwal_model->getDatapagi();
		
		//tampilkan ke model
		$html = $this->load->view('kartudiit/print', array('data' => $data), true);
	
		//proses ke file pdf
		$this->load->helper(array('pdf', 'file'));
		pdf_create($html, 'Kartu Diit Pagi');
	}
	
	public function pdfSiang(){
		//ambil data jadwal siang ke model
		$data = $this->jadwal_model->getDatasiang();
		
		//tampilkan ke model
		$html = $this->load->view('kartudiit/print', array('data' => $data), true);
	
		//proses ke file pdf
		$this->load->helper(array('pdf', 'file'));
		pdf_create($html, 'Kartu Diit Siang');
	}
	
	public function pdfMalam(){
		//ambil data jadwal malam ke model
		$data = $this->jadwal_model->getDatamalam();
		
		//tampilkan ke model
		$html = $this->load->view('kartudiit/print', array('data' => $data), true);
	
		//proses ke file pdf
		$this->load->helper(array('pdf', 'file'));
		pdf_create($html, 'Kartu Diit Malam');
	}
	
}

?>