<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ruangan_model');
    }

    public function index() {
        $data['ruangan'] = $this->Ruangan_model->getAll();
        $this->load->view('ruangan/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'nama_ruang' => $this->input->post('nama_ruang'),
                'kapasitas' => $this->input->post('kapasitas')
            ];
            $this->Ruangan_model->insert($data);
            $this->session->set_flashdata('success', 'Ruangan berhasil ditambahkan.');
            redirect('ruangan');
        }

        $this->load->view('ruangan/tambah');
    }

    public function edit($id) {
        $data['ruangan'] = $this->Ruangan_model->getById($id);
        if ($this->input->post()) {
            $update = [
                'nama_ruang' => $this->input->post('nama_ruang'),
                'kapasitas' => $this->input->post('kapasitas')
            ];
            $this->Ruangan_model->update($id, $update);
            $this->session->set_flashdata('success', 'Ruangan berhasil diupdate.');
            redirect('ruangan');
        }

        $this->load->view('ruangan/edit', $data);
    }

    public function hapus($id) {
        $this->Ruangan_model->delete($id);
        $this->session->set_flashdata('success', 'Ruangan berhasil dihapus.');
        redirect('ruangan');
    }
}
