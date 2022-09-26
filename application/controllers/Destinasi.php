<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destinasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		
	}

	public function index($no = null, $id_kategori = null)
	{
		$data['title']	= 'Destinasi';
		$data['recent_destinasi'] = $this->db->select('*')->from('tb_destinasi')->limit('5')->order_by('id_destinasi', 'DESC')->get()->result_array();

		// $jumlah_data = $this->db->get('tb_blog')->num_rows();
		// $this->load->library('pagination');
		// $config['base_url'] = base_url().'blog';
		// $config['total_rows'] = $jumlah_data;
		// $config['per_page'] = 5;
		// $from = $this->uri->segment(3);
		// $this->pagination->initialize($config);		
		// $data['blog'] = $this->db->get('tb_blog', $config['per_page'], $from)->result_array();
		$this->load->library('pagination');
		$config['base_url'] = base_url('Destinasi/index'); //site url
		if($this->input->post('keyword') != null){
			$data['keyword'] = $this->input->post('keyword');
			$this->db->select('*');
			$this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_destinasi.id_kategori');
			$this->db->like('tb_destinasi.judul', $data['keyword'], 'both');
			$this->db->or_like('tb_kategori.nama_kategori', $data['keyword'], 'both');
			$config['total_rows'] = $this->db->get('tb_destinasi')->num_rows();  
		}elseif($id_kategori != null){
			$data['keyword'] = '';
			$kat = $this->db->get_where('tb_kategori', ['id_kategori' => $id_kategori])->row_array();
			$data['nama_kategori'] = $kat['nama_kategori'];
			$config['total_rows'] = $this->db->where('id_kategori', $id_kategori)->get('tb_destinasi')->num_rows();  
		}else{
			$config['total_rows'] = $this->db->get('tb_destinasi')->num_rows();
		}
			//total row
		$config['per_page'] = 8;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 3;

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="blog-pagination"><ul class="justify-content-center">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a href="#">';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '&raquo;</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = 'Next</li>';
		$config['first_tag_open']   = '<li>';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open']    = '<li>';
		$config['last_tagl_close']  = '</li>';
		


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		if($this->input->post('keyword') != null){
			$data['keyword'] = $this->input->post('keyword');
			$this->db->select('*');
			$this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_destinasi.id_kategori');
			$this->db->like('tb_destinasi.judul', $data['keyword'], 'both');
			$this->db->or_like('tb_kategori.nama_kategori', $data['keyword'], 'both');
			$data['destinasi'] = $this->db->get('tb_destinasi', $config['per_page'], $data['page'])->result_array();  
		}elseif($id_kategori != null){
			$data['keyword'] = '';
			$kat = $this->db->get_where('tb_kategori', ['id_kategori' => $id_kategori])->row_array();
			$data['nama_kategori'] = $kat['nama_kategori'];
			$data['destinasi'] = $this->db->where('id_kategori', $id_kategori)->get('tb_destinasi')->result_array();  
		}else{
			$data['keyword'] = '';
			$data['destinasi'] = $this->db->get('tb_destinasi', $config['per_page'], $data['page'])->result_array();  
		}
					

		$data['pagination'] = $this->pagination->create_links();
		$data['kategori']		= $this->M_kategori->get_data()->result_array();
		//die();
		
		$this->load->view('front/destinasi', $data);
	}

	public function detail($id_destinasi)
	{
		$this->hitung($id_destinasi);
		$data['title'] = 'Destinasi';
		$data['recent_destinasi'] = $this->db->select('*')->from('tb_destinasi')->limit('5')->order_by('id_destinasi', 'DESC')->get()->result_array();
		$data['jml_pengunjung'] = $this->db->get_where('tb_pengunjung_destinasi', ['id_destinasi' => $id_destinasi])->num_rows();
		$data['komentar'] = $this->M_komentar->get_data($id_destinasi)->result_array();
		$data['kategori']		= $this->M_kategori->get_data()->result_array();
		$data['destinasi'] = $this->M_destinasi->get_by_id($id_destinasi);
		$q      = $this->db->query("SELECT AVG(rating) AS jml FROM tb_komentar WHERE id_destinasi='$id_destinasi'")->row_array();
		$data['rating']  = ceil($q['jml']);
		$this->load->view('front/detail_destinasi', $data);
	}

	public function leave_comment($id_destinasi)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title'] = 'Destinasi';
			$data['recent_destinasi'] = $this->db->select('*')->from('tb_destinasi')->limit('5')->order_by('id_destinasi', 'DESC')->get()->result_array();
			$data['komentar'] = $this->M_komentar->get_data($id_destinasi)->result_array();
			$data['destinasi'] = $this->M_destinasi->get_by_id($id_destinasi);
			$data['kategori']		= $this->M_kategori->get_data()->result_array();
			$this->load->view('front/detail_destinasi', $data);
		} else {
			$data		= $this->input->post(null, true);
			$id_destinasi = $data['id_destinasi'];

			$data_user	= [
				'id_destinasi'		=> $data['id_destinasi'],
				'nama'			=> $data['nama'],
				'email'			=> $data['email'],
				'rating'		=> $data['rating'],
				'komentar'		=> nl2br($data['komentar']),
			];
			
			if ($this->M_komentar->insert($data_user)) {
				$this->session->set_flashdata('msg', 'sent-comment-error');
				redirect('detail-destinasi/'.$id_destinasi);
			} else {
				$this->session->set_flashdata('msg', 'sent-comment-success');
				$jml_komen = $this->M_komentar->get_data($id_destinasi)->num_rows();
				$data = [
					'id_destinasi' => $id_destinasi,
					'jml_komen' => $jml_komen
				];
				$this->M_destinasi->update($data);
				redirect('detail-destinasi/'.$id_destinasi);
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('komentar', 'Komentar', 'required|trim');
	}

	public function hitung($id_destinasi)
	{
		$cek = $this->db->get_where('tb_pengunjung_destinasi', ['id_destinasi' => $id_destinasi, 'ci_session' => $_COOKIE['ci_session']])->num_rows();

		if($cek == 0){
			$data = [
				'id_destinasi' => $id_destinasi,
				'ci_session' => $_COOKIE['ci_session'],
				'count' => 1
			];

			$this->db->insert('tb_pengunjung_destinasi', $data);
		}
			
		
		return true;
	}
}
