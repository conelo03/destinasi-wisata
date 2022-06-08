<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
        $data['title']		= 'Kelola Kategori';
		$data['kategori']		= $this->M_kategori->get_data()->result_array();
		$this->load->view('admin/kategori/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Kelola Kategori';
			$this->load->view('admin/kategori/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);

			$data_user	= [
				'nama_kategori'		=> $data['nama_kategori'],
				'deskripsi'		=> $data['deskripsi']
			];
			
			if ($this->M_kategori->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-kategori');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('kategori');
			}
		}
	}

	public function edit($id_kategori)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Kelola Kategori';
			$data['k']	= $this->M_kategori->get_by_id($id_kategori);
			$this->load->view('admin/kategori/edit', $data);
		} else {
			$data		= $this->input->post(null, true);

			$data_user	= [
				'id_kategori'			=> $id_kategori,
				'nama_kategori'		=> $data['nama_kategori'],
				'deskripsi'		=> $data['deskripsi'],
			];

			
			if ($this->M_kategori->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-kategori/'.$id_kategori);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('kategori');
			}
		}
	}

	public function hapus($id_kategori)
	{
		$this->M_kategori->delete($id_kategori);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('kategori');
	}

	private function validation()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Kategori', 'required|trim');
	
	}

}
