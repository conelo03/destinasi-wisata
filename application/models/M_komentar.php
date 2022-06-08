<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_komentar extends CI_Model {

	public $table	= 'tb_komentar';

	public function get_data($id_destinasi = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if(!empty($id_destinasi)){
			$this->db->where('id_destinasi', $id_destinasi);
		}
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_komentar)
	{
		return $this->db->get_where($this->table, ['id_komentar' => $id_komentar])->row_array();
	}

	public function update($data)
	{
		$this->db->where('id_komentar', $data['id_komentar']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_komentar)
	{
		$this->db->delete($this->table, ['id_komentar' => $id_komentar]);
	}
}
