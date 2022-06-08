<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destinasi extends CI_Controller {

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
        $data['title']		= 'Kelola Destinasi';
		$data['destinasi']		= $this->M_destinasi->get_data()->result_array();
		$this->load->view('admin/destinasi/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Destinasi';
			$data['kategori']		= $this->M_kategori->get_data()->result_array();
			$this->load->view('admin/destinasi/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$gambar = $this->upload_gambar();

			$data_user	= [
				'id_kategori'	=> $data['id_kategori'],
				'author'		=> $this->session->userdata('nama_pengguna'),
				'judul'			=> $data['judul'],
				'konten'		=> nl2br($data['konten']),
				'alamat'		=> $data['alamat'],
				'url_google_maps'		=> $data['url_google_maps'],
				'gambar'		=> $gambar,
				'status'		=> $data['status'],
			];
			
			if ($this->M_destinasi->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-destinasi');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('kelola-destinasi');
			}
		}
	}

	public function edit($id_destinasi)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Kelola Destinasi';
			$data['b']	= $this->M_destinasi->get_by_id($id_destinasi);
			$data['kategori']		= $this->M_kategori->get_data()->result_array();
			$this->load->view('admin/destinasi/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if (empty($_FILES['gambar']['name'])) {
				$gambar = $data['gambar_old'];
			}else{
				$gambar = $this->upload_gambar();
			}

			$data_user	= [
				'id_destinasi'		=> $id_destinasi,
				'id_kategori'	=> $data['id_kategori'],
				'author'		=> $this->session->userdata('nama_pengguna'),
				'judul'			=> $data['judul'],
				'konten'		=> nl2br($data['konten']),
				'alamat'		=> $data['alamat'],
				'url_google_maps'		=> $data['url_google_maps'],
				'gambar'		=> $gambar,
				'status'		=> $data['status'],
			];

			
			if ($this->M_destinasi->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-destinasi/'.$id_destinasi);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('kelola-destinasi');
			}
		}
	}

	public function hapus($id_destinasi)
	{
		$this->M_destinasi->delete($id_destinasi);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('kelola-destinasi');
	}

	private function upload_gambar()
	{
		$data = '';
   
		$count = count($_FILES['gambar']['name']);

		for($i=0;$i<$count;$i++){

	        if(!empty($_FILES['gambar']['name'][$i])){
	    
				$_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
				$_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
				$_FILES['file']['size'] = $_FILES['gambar']['size'][$i];

				$config['upload_path'] = './assets/upload/gambar'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = 50000;
				$config['file_name'] = $_FILES['gambar']['name'][$i];

				$this->upload->initialize($config);
				$this->load->library('upload',$config); 
	    
		        if($this->upload->do_upload('file')){
		            $uploadData = $this->upload->data();
		            $filename = $uploadData['file_name'];
		   			var_dump($filename);
		            $data .= $filename.'||';
		        }
	        }
	   
	    }

	    return substr($data, 0, -2);
	}

	private function validation()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('konten', 'Konten', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
	
	}

	public function komentar($id_destinasi)
	{
        $data['title']		= 'Kelola Destinasi';
        $data['id_destinasi']	= $id_destinasi;
		$data['komentar']		= $this->M_komentar->get_data($id_destinasi)->result_array();
		$this->load->view('admin/komentar/data', $data);
	}

	public function tambah_komentar($id_destinasi)
	{
		$this->validation_komentar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Kelola Destinasi';
	        $data['id_destinasi']	= $id_destinasi;
			$this->load->view('admin/komentar/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$id_destinasi = $data['id_destinasi'];

			$data_user	= [
				'id_destinasi'		=> $data['id_destinasi'],
				'nama'			=> $data['nama'],
				'email'			=> $data['email'],
				'website'		=> $data['website'],
				'komentar'		=> nl2br($data['komentar']),
			];
			
			if ($this->M_komentar->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-kelola-komentar/'.$id_destinasi);
			} else {
				$this->session->set_flashdata('msg', 'success');
				$jml_komen = $this->M_komentar->get_data($id_destinasi)->num_rows();
				$data = [
					'id_destinasi' => $id_destinasi,
					'jml_komen' => $jml_komen
				];
				$this->M_destinasi->update($data);
				redirect('kelola-komentar/'.$id_destinasi);
			}
		}
	}

	public function edit_komentar($id_destinasi, $id_komentar)
	{
		$this->validation_komentar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Kelola Destinasi';
	        $data['id_destinasi']	= $id_destinasi;
	        $data['k']			= $this->M_komentar->get_by_id($id_komentar);
			$this->load->view('admin/komentar/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$id_destinasi = $data['id_destinasi'];

			$data_user	= [
				'id_komentar'  => $id_komentar,
				'id_destinasi'		=> $data['id_destinasi'],
				'nama'			=> $data['nama'],
				'email'			=> $data['email'],
				'website'		=> $data['website'],
				'komentar'		=> nl2br($data['komentar']),
			];
			
			if ($this->M_komentar->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-kelola-komentar/'.$id_destinasi.'/'.$id_komentar);
			} else {
				$this->session->set_flashdata('msg', 'success');
				$jml_komen = $this->M_komentar->get_data($id_destinasi)->num_rows();
				$data = [
					'id_destinasi' => $id_destinasi,
					'jml_komen' => $jml_komen
				];
				$this->M_destinasi->update($data);
				redirect('kelola-komentar/'.$id_destinasi);
			}
		}
	}

	public function hapus_komentar($id_destinasi, $id_komentar)
	{
		$this->M_komentar->delete($id_komentar);
		$jml_komen = $this->M_komentar->get_data($id_destinasi)->num_rows();
		$data = [
			'id_destinasi' => $id_destinasi,
			'jml_komen' => $jml_komen
		];
		$this->M_destinasi->update($data);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('kelola-komentar/'.$id_destinasi);
	}

	private function validation_komentar()
	{
		$this->form_validation->set_rules('nama', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('website', 'website', 'trim');
		$this->form_validation->set_rules('komentar', 'Comment', 'required|trim');
	}

}
