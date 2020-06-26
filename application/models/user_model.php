<?php 
Class user_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

       public function auth($username, $password, $remember = false) {
                //ambil data user di tabel
                $user = $this->db->select('*, tb_jabatan.nama_jabatan as jabatan')
                                 ->where('username', $username)
                                 ->where('password', $password)
                                 ->from('tb_user')
                                 ->join('tb_jabatan', "tb_jabatan.id_jabatan = tb_user.id_jabatan")
                                 ->get()
                                 ->row_array();
            
            
                            
            //cek apakah user ada
            if($user){
                //jika user ada maka simpan session user
                $this->session->set_userdata('id_user', $user['id_user']);
                $this->session->set_userdata('nama', $user['nama']);
                $this->session->set_userdata('jabatan', $user['jabatan']);
                
                //set remember me jika dicentang
                if ($remember)
                    $this->session->set_userdata('remember_me', TRUE);
                return true;
            }       
                
            else
                return FALSE;

            
        }
    }
    ?> 