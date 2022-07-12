<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['kategori']		= $this->M_kategori->get_data()->result_array();
		$data['destination'] = $this->db->query("SELECT tb_destinasi.*, COUNT(tb_pengunjung_destinasi.count) as jml_pengunjung FROM tb_destinasi, tb_pengunjung_destinasi where tb_pengunjung_destinasi.id_destinasi=tb_destinasi.id_destinasi GROUP by tb_pengunjung_destinasi.id_destinasi ORDER by jml_pengunjung DESC LIMIT 3")->result_array();
		$this->load->view('front/home', $data);
	}

	public function about()
	{
		$data['title'] = 'Tentang';
		$data['kategori']		= $this->M_kategori->get_data()->result_array();
		$this->load->view('front/about', $data);
	}


}
