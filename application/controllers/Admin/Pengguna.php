<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	public function index()
	{
        $data['title']		= 'Kelola Pengguna';
		$data['pengguna']		= $this->M_pengguna->get_data()->result_array();
		$this->load->view('admin/pengguna/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Pengguna';
			$this->load->view('admin/pengguna/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_pengguna	= [
				'nama_pengguna'			=> $data['nama_pengguna'],
				'username'		=> $data['username'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				'level'			=> $data['level'],
			];
			if ($this->M_pengguna->insert($data_pengguna)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-pengguna');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pengguna');
			}
		}
	}

	public function edit($id_pengguna)
	{
		$this->validation($id_pengguna);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Pengguna';
			$data['pengguna']	= $this->M_pengguna->get_by_id($id_pengguna);
			$this->load->view('admin/pengguna/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if(!empty($data['password'])){
				$data_pengguna	= [
					'id_pengguna'		=> $id_pengguna,
					'nama_pengguna'			=> $data['nama_pengguna'],
					'username'		=> $data['username'],
					'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
					'level'			=> $data['level'],
				];
			} else {
				$data_pengguna	= [
					'id_pengguna'		=> $id_pengguna,
					'nama_pengguna'			=> $data['nama_pengguna'],
					'username'		=> $data['username'],
					'level'			=> $data['level'],
				];
			}
			
			if ($this->M_pengguna->update($data_pengguna)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pengguna/'.$id_pengguna);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pengguna');
			}
		}
	}

	private function validation($id_pengguna = null)
	{
		if(is_null($id_pengguna)){
			$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|is_unique[tb_pengguna.username]', ['is_unique'	=> 'Username Sudah Terdaftar']);
			$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|required');
			$this->form_validation->set_rules('level', 'Level', 'required');
		} else {
			$username_baru 	= $this->input->post('username');
			$data			= $this->db->get_where('tb_pengguna', ['id_pengguna' => $id_pengguna])->row_array();
			$username 		= $data['username'];

			if($username == $username_baru){
				$this->form_validation->set_rules('username', 'username', 'required|trim');
			} else {
				$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[pengguna.username]', array('is_unique' => 'username sudah terdaftar' ));
			}
			$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
			$this->form_validation->set_rules('level', 'Level', 'required');
		}
		
	}

	public function hapus($id_pengguna)
	{
		$this->M_pengguna->delete($id_pengguna);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pengguna');
	}

	public function setting()
	{
		$this->validation_setting();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Akun';
			$id_pengguna 		= $this->session->userdata('id_pengguna');
			$data['pengguna']	= $this->M_pengguna->get_by_id($id_pengguna);
			$this->load->view('admin/pengguna/setting', $data);
		} else {
			$id_pengguna 		= $this->session->userdata('id_pengguna');
			$data	= $this->input->post(null, true);
			$pengguna = $this->M_pengguna->get_by_id($id_pengguna);
			if(!password_verify($this->input->post('password_lama'), $pengguna['password']))
			{
				$this->session->set_flashdata('msg', 'password-salah');
				redirect('setting');
			}

			$data_pengguna = [
				'id_pengguna'		=> $id_pengguna,
				'username'	=> $data['username'],
				'password'	=> password_hash($data['password_baru'], PASSWORD_DEFAULT),
			];

			
			
			if ($this->M_pengguna->update($data_pengguna)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('setting');
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('setting');
			}
		}
	}

	private function validation_setting()
	{
		$username		= $this->session->userdata('username');
		$username_baru 	= $this->input->post('username');
		if($username == $username_baru){
			$this->form_validation->set_rules('username', 'username', 'required');	
		} else {
			$this->form_validation->set_rules('username', 'username', 'required|is_unique[tb_pengguna.username]', ['is_unique'	=> 'Username Sudah Ada']);
		}
		
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');	
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required');		
		$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');
	}

	public function biodata()
	{
		$this->validation_biodata();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Kelola Biodata';
			$data['b']	= $this->M_pengguna->get_biodata_by_id('1');
			$this->load->view('admin/pengguna/biodata', $data);
		} else {
			$data		= $this->input->post(null, true);
			if (empty($_FILES['baner_depan']['name'])) {
				$baner_depan = $data['baner_depan_old'];
			}else{
				$baner_depan = $this->upload_baner();
			}
			$data_user	= [
				'id_biodata'		=> 1,
				'baner_depan'		=> $baner_depan,
				'jml_klien'		=> $data['jml_klien'],
				'jml_project'		=> $data['jml_project'],
				'jml_jam_support'		=> $data['jml_jam_support'],
				'jml_pekerja'		=> $data['jml_pekerja'],
			];
			
			if ($this->M_pengguna->update_biodata($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('kelola-biodata');
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('kelola-biodata');
			}
		}
	}

	private function validation_biodata()
	{
		$this->form_validation->set_rules('jml_klien', 'Jumlah Klien', 'required');	
		$this->form_validation->set_rules('jml_project', 'Jumlah Project', 'required');	
		$this->form_validation->set_rules('jml_jam_support', 'Jumlah Jam Support', 'required');	
		$this->form_validation->set_rules('jml_pekerja', 'Jumlah Pekerja', 'required');		
	}

	private function upload_baner()
	{
	    $config['upload_path'] = './assets/upload/biodata';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size'] = 10000;
	    $this->upload->initialize($config);
	    $this->load->library('upload', $config);

	    if(! $this->upload->do_upload('baner_depan'))
	    {
	    	return '';
	    }

	    return $this->upload->data('file_name');
	}
}
