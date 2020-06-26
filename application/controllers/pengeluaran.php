<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengeluaran extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();

	if (!$this->session->userdata('id_user'))
			redirect('/auth/login');

	}
	
	public function index()
	{
		//$session = $this->session->all_userdata();
		//$cari = $this->input->get('cari');
			
		//ambil data pelabuhan ke model
		$data = $this->pengeluaran_model->getData();
		//var_dump($data);die;
		
		//tampilkan ke model
		$this->layout->render('pengeluaran/index', array('data' => $data));
		
	}
	
	public function pdf(){
		$data = $this->pengeluaran_model->getData();
		
		//tampilkan ke model
		$html = $this->load->view('laporan/print1', array('data' => $data), true);
	
		//proses ke file pdf
		$this->load->helper(array('pdf', 'file'));
		pdf_create($html, 'Laporan Penngeluaran Barang');
	}

		

}

	

?>