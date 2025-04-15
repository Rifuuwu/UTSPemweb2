<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->model('Dosen_model');
        $this->load->model('Mata_kuliah_model');
        $this->load->model('Ruangan_model');
    }

    public function index() {
        $data['jadwal'] = $this->Jadwal_model->getAll();
        $this->load->view('jadwal/index', $data);
    }

    public function tambah() {
        $data['dosen'] = $this->Dosen_model->getAll();
        $data['matkul'] = $this->Mata_kuliah_model->getAll();
        $data['ruangan'] = $this->Ruangan_model->getAll();
        $data['slot_map'] = $this->Jadwal_model->get_slot_map(); // untuk dropdown di view

        if ($this->input->post()) {
            $nip = $this->input->post('nip');
            $id_matkul = $this->input->post('id_matkul');
            $id_ruang = $this->input->post('id_ruang');
            $hari = $this->input->post('hari');
            $slot_mulai = $this->input->post('slot_mulai');
            $slot_selesai = $this->input->post('slot_selesai');

            $matkul = $this->Mata_kuliah_model->getById($id_matkul);
            $ruangan = $this->Ruangan_model->getById($id_ruang);

            // Validasi kapasitas
            if ($matkul->peserta > $ruangan->kapasitas) {
                $this->session->set_flashdata('error', 'Jumlah peserta melebihi kapasitas ruangan!');
                redirect('jadwal/tambah');
            }

            // Validasi bentrok jadwal
            $isConflict = $this->Jadwal_model->checkConflict($nip, $id_ruang, $hari, $slot_mulai, $slot_selesai);
            if ($isConflict) {
                $this->session->set_flashdata('error', 'Jadwal bentrok dengan dosen atau ruangan lain!');
                redirect('jadwal/tambah');
            }

            // Validasi urutan slot
            if (strcmp($slot_mulai, $slot_selesai) >= 0) {
                $this->session->set_flashdata('error', 'Slot mulai harus sebelum slot selesai!');
                redirect('jadwal/tambah');
            }

            // Insert ke database
            $this->Jadwal_model->insert([
                'nip' => $nip,
                'id_matkul' => $id_matkul,
                'id_ruang' => $id_ruang,
                'hari' => $hari,
                'slot_mulai' => $slot_mulai,
                'slot_selesai' => $slot_selesai
            ]);
            $this->session->set_flashdata('success', 'Jadwal berhasil ditambahkan.');
            redirect('jadwal');
        }

        $this->load->view('jadwal/tambah', $data);
    }

    public function hapus($id) {
        $this->Jadwal_model->delete($id);
        $this->session->set_flashdata('success', 'Jadwal berhasil dihapus.');
        redirect('jadwal');
    }
}
