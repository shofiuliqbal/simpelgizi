<?php if (!defined('BASEPATH')) exit('no direct script allowed');

	class auth extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			
			$this->load->model('user_model');
		}
		
		public function login(){
			//jika user belum login , redirect ke halaman login
			if ($this->session->userdata('id_user'))
				redirect('/auth/login');
			
			$data['error'] = '';
			if ($this->input->post()){
				//ambil data email dan password
				$username = $this->input->post('username', true);
				$password = $this->input->post('password', true);
				$remember = $this->input->post('remember_me', true);
				
				
				//autentikasi ke user_model
				if ($this->user_model->auth($username, $password, $remember))
				{
					//redirect ke halaman dashboard jika berhasil
					redirect('Welcome/index');				
				}
				
				else{
					//tampilkan error jika gagal
					$data['error'] = "username dan password salah";
				}
					
			}
			
			$this->load->view('login', $data);
			
		}
		
		public function logout() {
			//jika user belum login, redirect ke halaman login
			if(!$this->session->userdata('id_user'))
				redirect('auth/login');
			
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('nama');
			$this->session->unset_userdata('remember_me');
			redirect('');
		}
		
	}


?>