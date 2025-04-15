<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_kuliah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mata_kuliah_model');
    }

    public function index() {
        $data['matkul'] = $this->Mata_kuliah_model->getAll();
        $this->load->view('matkul/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'nama_matkul' => $this->input->post('nama_matkul'),
                'sks' => $this->input->post('sks'),
                'peserta' => $this->input->post('peserta')
            ];
            $this->Mata_kuliah_model->insert($data);
            $this->session->set_flashdata('success', 'Mata kuliah berhasil ditambahkan.');
            redirect('mata_kuliah');
        }

        $this->load->view('matkul/tambah');
    }

    public function edit($id) {
        $data['matkul'] = $this->Mata_kuliah_model->getById($id);
        if ($this->input->post()) {
            $update = [
                'nama_matkul' => $this->input->post('nama_matkul'),
                'sks' => $this->input->post('sks'),
                'peserta' => $this->input->post('peserta')
            ];
            $this->Mata_kuliah_model->update($id, $update);
            $this->session->set_flashdata('success', 'Mata kuliah berhasil diupdate.');
            redirect('mata_kuliah');
        }

        $this->load->view('matkul/edit', $data);
    }

    public function hapus($id) {
        $this->Mata_kuliah_model->delete($id);
        $this->session->set_flashdata('success', 'Mata kuliah berhasil dihapus.');
        redirect('mata_kuliah');
    }
}
