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
		$data['destination'] = $this->db->select('*')->from('tb_destinasi')->limit(3)->order_by('jml_komen', 'DESC')->get()->result_array();
		$this->load->view('front/home', $data);
	}

	public function about()
	{
		$data['title'] = 'Tentang';
		$data['kategori']		= $this->M_kategori->get_data()->result_array();
		$this->load->view('front/about', $data);
	}


}
