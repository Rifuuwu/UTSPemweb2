<?php

class Mata_kuliah_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private $table = 'mata_kuliah';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ['id_matkul' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_matkul', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id_matkul', $id)->delete($this->table);
    }
}
