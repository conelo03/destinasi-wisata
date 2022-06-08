<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_destinasi extends CI_Model {

	public $table	= 'tb_destinasi';

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

	public function get_by_id($id_destinasi)
	{
		return $this->db->get_where($this->table, ['id_destinasi' => $id_destinasi])->row_array();
	}

	public function update($data)
	{
		$this->db->where('id_destinasi', $data['id_destinasi']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_destinasi)
	{
		$this->db->delete($this->table, ['id_destinasi' => $id_destinasi]);
	}
}
