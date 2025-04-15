<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Tambah Mata Kuliah</h2>

    <form action="<?= base_url('Mata_kuliah/tambah') ?>" method="post">
        <div class="mb-3">
            <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_matkul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="text" name="sks" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="peserta" class="form-label">Peserta</label>
            <input type="text" name="peserta" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('Mata_kuliah') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
