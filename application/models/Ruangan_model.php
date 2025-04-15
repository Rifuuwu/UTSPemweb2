<?php
class Ruangan_model extends CI_Model {

    private $table = 'ruangan';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ['id_ruang' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_ruang', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id_ruang', $id)->delete($this->table);
    }
}
