<?php 

class Admin extends CI_Controller{ 

	function __construct(){ // session untuk mendeteksi apakah user atau admin sudah login
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){ // jika tidak berhasil maka akan kembali ke v_admin
		$this->load->view('v_admin');
	}
}