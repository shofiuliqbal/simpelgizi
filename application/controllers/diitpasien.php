<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diitpasien extends CI_Controller {
	
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
		$cari = $this->input->get('cari');
		$data = $this->diitpasien_model->getData($cari);
		//var_dump($data);die;
		
		//tampilkan ke model
		$this->layout->render('diitpasien/index', array('data' => $data));
		
	}

	public function hapus()
	{
		//ambil id yang ada di segment 3
		$id = $this->uri->segment(3);
		
		//hapus data di database
		$this->pasien_model->delete($id);
		
		//redirect ke halaman index
		redirect('/diitpasien/index');
	}

	public function ubah(){
		//jika data hasil kiriman dari form
		//$session = $this->session->all_userdata();
		$data = array();
		$error = '';
		if($this->input->post())
		{
			//ambil id dari data yang diubah
			$id = $this->input->post('nomor_register');
			
			//ambil detail data yang akan diubah
			$data = $this->diitpasien_model->getOne($id);
			
			//ambil data dari form dan kumpulkan dalam 1 array
			//$data['nama'] =  $this->input->post('nama', true);
			//$data['tgl_lahir'] =  $this->input->post('tgl_lahir', true);
			$data['id_diit'] =  $this->input->post('id_diit', true);
			//$data['id_kamar'] =  $this->input->post('id_kamar', true);

			// mulai validasi
			//$this->form_validation->set_rules('nama', 'Nama', 'required');
			//$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('id_diit', 'Diet', 'required');
			//$this->form_validation->set_rules('id_kamar', 'Kamar', 'required');

			if ($this->form_validation->run() == false){
				$error .= validation_errors();
			}
			
			// mulai upload
			/*if (!$error && $_FILES['foto']['error'] != 4){
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')){
					$error .= "<p>".$this->upload->display_errors()."</p>";
				}else{
					$data['foto'] = $this->upload->data()['file_name'];
				}
			}*/
			
			if (!$error){
				//simpan perubahan dalam database
				$this->diitpasien_model->update($data, $id);
				
				//redirect ke halaman index
				redirect('/diitpasien/index');
			}
		}else{
			//ambil id yang ada di segment 3
			$id = $this->uri->segment(3);
			
			//ambil detail data yang akan diubah
			$data = $this->diitpasien_model->getOne($id);
		}

		$id_diit = $data['id_diit'];

		$data_kamar = $this->kamar_model->getData();
		$data_diit = $this->diit_model->Data();
		
		//tampilkan form jika dari link tambah
		$this->layout->render('diitpasien/form_ubah', array('data' => $data, 'data_diit' => $data_diit, 'error' => $error, 'data_kamar' => $data_kamar));
	}

	public function status()
	{
		$id = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		//$ids = $this->berita_model->post($id);
		
		$this->pasien_model->post($id, $status);
							
		redirect('/pasien/index');					
	}

	/*public function tambah(){
		//jika data hasil kiriman form
		//$session = $this->session->all_userdata();
		$data = array();
		$error = '';
		if($this->input->post())
		{
			//ambil data dari form dan kumpulkan dalam 1 array
			$data = array(
				 //'id_pelabuhan' => $session['id_pelabuhan'],
				 'nomor_register' => $this->input->post('nomor_registrasi', true),
				 'nama' => $this->input->post('nama', true),
				 'tgl_lahir' => $this->input->post('tgl_lahir', true),
				 'id_diit' => $this->input->post('id-diit', true),
				 'id_kamar' => $this->input->post('id_kamar', true),
				 //'foto' => ''
			 );	
				
			// mulai validasi
			$this->form_validation->set_rules('nomor_register', 'Nomor Register', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('id_diit', 'ID Diit', 'required');
			$this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
			
			if ($this->form_validation->run() == false){
				$error .= validation_errors();
			}


			/*
			if (!$error && $_FILES['foto']['error'] != 4){
				// mulai upload
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')){
					$error .= "<p>".$this->upload->display_errors()."</p>";
				}else{
					$data['foto'] = $this->upload->data()['file_name'];
				}   
			}
			*/
			
			//cek validasi
			/*if (!$error){
				//simpan data ke database
				//var_dump($data);die;
				$this->pasien_model->insert($data);
				
				//redirect ke halaman index
				redirect('pasien/index');	
			}
		}
		//tampilkan form jika dari link tambah
		$this->layout->render('pasien/form_tambah',array('data' => $data,'error' => $error));
	}
	/*
	public function chart(){
		//ambil data pelabuhan ke model
		$session = $this->session->all_userdata();
		$data = $this->ikan_model->getData();
		
		$nama_ikan = array();
		$harga_ikan = array();
		foreach($data as $ikan){
			$nama_ikan[] = $ikan['nama'];
			$harga_ikan[] = intval($ikan['harga']);
		}
		
		//tampilkan ke model
		//$html = $this->load->view('ikan/chart', array('nama_ikan' => $nama_ikan, 'harga_ikan' => $harga_ikan));
		$html = $this->layout
			 ->setTitle('Grafik Ikan')
			 ->render(
				'ikan/chart', 
				array(
					'nama_ikan' => $nama_ikan, 
					'harga_ikan' => $harga_ikan,
					'session' => $session
					)
					);
	}
	
	public function pdf(){
		//ambil data pelabuhan ke model
		$data = $this->ikan_model->getData();
		
		//tampilkan ke model
		$html = $this->load->view('ikan/excel', array('data' => $data), true);
	
		//proses ke file pdf
		$this->load->helper(array('pdf', 'file'));
		pdf_create($html, 'laporan_ikan');
	}
	
	public function excel(){
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=laporan_ikan.xls");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		
		//ambil data pelabuhan ke model
		$data = $this->ikan_model->getData();
		
		//tampilkan ke model
		$this->load->view('ikan/excel', array('data' => $data));
	}
	
	public function hapus()
	{
		//ambil id yang ada di segment 3
		$id = $this->uri->segment(3);
		
		//hapus data di database
		$this->ikan_model->delete($id);
		
		//redirect ke halaman index
		redirect('/ikan/index');
	}
	
	public function tambah(){
		//jika data hasil kiriman form
		$session = $this->session->all_userdata();
		$data = array();
		$error = '';
		if($this->input->post())
		{
			//ambil data dari form dan kumpulkan dalam 1 array
			$data = array(
				 'id_pelabuhan' => $session['id_pelabuhan'],
				 'nama' => $this->input->post('nama', true),
				 'deskripsi' => $this->input->post('deskripsi', true),
				 'harga' => $this->input->post('harga', true),
				 'foto' => ''
			 );	
				
			// mulai validasi
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			
			if ($this->form_validation->run() == false){
				$error .= validation_errors();
			}
			
			if (!$error && $_FILES['foto']['error'] != 4){
				// mulai upload
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')){
					$error .= "<p>".$this->upload->display_errors()."</p>";
				}else{
					$data['foto'] = $this->upload->data()['file_name'];
				}   
			}
			
			//cek validasi
			if (!$error){
				//simpan data ke database
				var_dump($data);die;
				$this->ikan_model->insert($data);
				
				//redirect ke halaman index
				redirect('ikan/index');	
			}
		}
		//tampilkan form jika dari link tambah
		$this->layout->render('ikan/form_tambah',array('data' => $data,'error' => $error, 'session' => $session));
	}
	
	public function ubah(){
		//jika data hasil kiriman dari form
		$session = $this->session->all_userdata();
		$data = array();
		$error = '';
		if($this->input->post())
		{
			//ambil id dari data yang diubah
			$id = $this->input->post('id');
			
			//ambil detail data yang akan diubah
			$data = $this->ikan_model->getOne($id);
			
			//ambil data dari form dan kumpulkan dalam 1 array
			$data['nama'] =  $this->input->post('nama', true);
			$data['deskripsi'] =  $this->input->post('deskripsi', true);
			$data['harga'] =  $this->input->post('harga', true);
				
			// mulai validasi
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			
			if ($this->form_validation->run() == false){
				$error .= validation_errors();
			}
			
			// mulai upload
			if (!$error && $_FILES['foto']['error'] != 4){
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')){
					$error .= "<p>".$this->upload->display_errors()."</p>";
				}else{
					$data['foto'] = $this->upload->data()['file_name'];
				}
			}
			
			if (!$error){
				//simpan perubahan dalam database
				$this->ikan_model->update($data, $id);
				
				//redirect ke halaman index
				redirect('/ikan/index');
			}
		}else{
			//ambil id yang ada di segment 3
			$id = $this->uri->segment(3);
			
			//ambil detail data yang akan diubah
			$data = $this->ikan_model->getOne($id);
		}
		//tampilkan form jika dari link tambah
		$this->layout->render('ikan/form_ubah', array('data' => $data, 'error' => $error, 'session' => $session));
	}
	
	function topdf () {
		$this->load->library('cezpdf');
		$this->load->helper('pdf');
		prep_pdf();
		$data['pelabuhan']= $this->ikan_model->alldata(); 
		$titlecolumn = array(
							'id' => 'ID',
							'nama' => 'NAMA',
							'koordinat' => 'KOORDINAT'
		);
		$this->cezpdf->ezTable($data['member'], $titlecolumn,'Member Data');
		$this->cezpdf->ezStream();
	}
	*/	
}

	

?>