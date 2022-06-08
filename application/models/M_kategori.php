<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public $table	= 'tb_kategori';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_kategori)
	{
		return $this->db->get_where($this->table, ['id_kategori' => $id_kategori])->row_array();
	}

	public function update($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_kategori)
	{
		$this->db->delete($this->table, ['id_kategori' => $id_kategori]);
	}
}
