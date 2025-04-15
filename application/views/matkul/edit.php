<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Edit Mata Kuliah</h2>

    <form action="<?= base_url('Mata_kuliah/edit/' . $matkul->id_matkul) ?>" method="post">
        <div class="mb-3">
            <label for="id_matkul" class="form-label">ID Mata Kuliah</label>
            <input type="text" name="id_matkul" class="form-control" value="<?= $matkul->id_matkul ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_matkul" class="form-control" value="<?= $matkul->nama_matkul ?>" required>
        </div>

        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="text" name="sks" class="form-control" value="<?= $matkul->sks ?>" required>
        </div>

        <div class="mb-3">
            <label for="peserta" class="form-label">Peserta</label>
            <input type="text" name="peserta" class="form-control" value="<?= $matkul->peserta ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('Mata_kuliah') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
