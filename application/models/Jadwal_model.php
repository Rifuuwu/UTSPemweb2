<?php
class Jadwal_model extends CI_Model {

    private $table = 'jadwal';

    // Konversi slot ke jam untuk tampilan
    private $slot_map = [
        'A' => '07:00',
        'B' => '08:00',
        'C' => '09:00',
        'D' => '10:00',
        'E' => '11:00',
        'F' => '13:00',
        'G' => '14:00',
        'H' => '15:00',
    ];

    public function getAll() {
        $this->db->select('jadwal.*, dosen.nama_dosen, mata_kuliah.nama_matkul, mata_kuliah.peserta, ruangan.nama_ruang, ruangan.kapasitas');
        $this->db->from($this->table);
        $this->db->join('dosen', 'jadwal.nip = dosen.nip');
        $this->db->join('mata_kuliah', 'jadwal.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('ruangan', 'jadwal.id_ruang = ruangan.id_ruang');
        $result = $this->db->get()->result();

        // Konversi slot ke jam
        foreach ($result as &$row) {
            $row->jam_mulai = $this->slot_map[$row->slot_mulai] ?? 'Invalid';
            $row->jam_selesai = $this->slot_map[$row->slot_selesai] ?? 'Invalid';
        }

        return $result;
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_jadwal', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id_jadwal', $id)->delete($this->table);
    }

    // Cek konflik berdasarkan slot
    public function checkConflict($nip, $id_ruang, $hari, $slot_mulai, $slot_selesai) {
        $this->db->from($this->table);
        $this->db->where('hari', $hari);
        $this->db->where("(
            (slot_mulai <= '$slot_selesai' AND slot_selesai >= '$slot_mulai')
        )");
        $this->db->where("(nip = '$nip' OR id_ruang = $id_ruang)");
        return $this->db->get()->num_rows() > 0;
    }

    public function get_slot_map() {
        return $this->slot_map;
    }
}
