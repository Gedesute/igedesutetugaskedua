<?php 



class Crud extends CI_Controller{

	function __construct(){ // untuk manggil m_modelnya
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');

	}

	function index(){ // untuk menampilkan
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}

	function tambah(){ // fungsi untuk menambahkan /input data
		$this->load->view('v_input');
	}

	function tambah_aksi(){ // untuk kolom tambah/input
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');

		$data = array( // untuk tulisan yang akan di input
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
	}

	function hapus($id){ //fungsinya untuk menghapus
		// di bawah ini apa saja yang akan di hapus
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
	}

	function edit($id){ // fungsi untuk edit data
		// di bawah ini untuk apa aja yang bisa di edit
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit_data($where,'user')->result();
		$this->load->view('v_edit',$data);
	}
	function update(){ // fungsi untuk update
		// di bawah ini apa aja yang bisa di update
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
	
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->m_data->update_data($where,$data,'user');
		redirect('crud/index');
	}
	

}