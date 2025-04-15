<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Tambah Ruangan</h2>

    <form action="<?= base_url('ruangan/tambah') ?>" method="post">
        <div class="mb-3">
            <label for="nip" class="form-label">Nama Ruangan</label>
            <input type="text" name="nama_ruang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Kapasitas</label>
            <input type="text" name="kapasitas" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('ruangan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
