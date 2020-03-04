<?php 

class Login extends CI_Controller{ //ini fungsinya untuk membuat kelas untuk login

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){ // membuat aksi buat login
		$username = $this->input->post('username'); // untuk mengirim ke dalam array  dan di kirimkan ke m_model
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows(); // fungsinya untuk menghitung jumlah record
		if($cek > 0){

			$data_session = array(  // jika disini benar di isi data akan masuk login
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("admin"));

		}else{
			echo "Username dan password salah !";// jika tidak akan ada peringatan seperti di samping
		}
	}

	function logout(){ // umtuk keluar dari login
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}