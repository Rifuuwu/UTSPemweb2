<?php

class Dosen_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private $table = 'dosen';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getByNip($nip) {
        return $this->db->get_where($this->table, ['nip' => $nip])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($nip, $data) {
        return $this->db->where('nip', $nip)->update($this->table, $data);
    }

    public function delete($nip) {
        return $this->db->where('nip', $nip)->delete($this->table);
    }
}
