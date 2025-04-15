<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Dosen_model');
    }

    public function index() {
        $data['dosen'] = $this->Dosen_model->getAll();
        $this->load->view('dosen/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama_dosen' => $this->input->post('nama_dosen'),
                'no_hp' => $this->input->post('no_hp')
            ];
            $this->Dosen_model->insert($data);
            $this->session->set_flashdata('success', 'Dosen berhasil ditambahkan.');
            redirect('dosen');
        }

        $this->load->view('dosen/tambah');
    }

    public function edit($nip) {
        $data['dosen'] = $this->Dosen_model->getByNip($nip);
        if ($this->input->post()) {
            $update = [
                'nama_dosen' => $this->input->post('nama_dosen'),
                'no_hp' => $this->input->post('no_hp')
            ];
            $this->Dosen_model->update($nip, $update);
            $this->session->set_flashdata('success', 'Dosen berhasil diupdate.');
            redirect('dosen');
        }

        $this->load->view('dosen/edit', $data);
    }

    public function hapus($nip) {
        $this->Dosen_model->delete($nip);
        $this->session->set_flashdata('success', 'Dosen berhasil dihapus.');
        redirect('dosen');
    }
}
