<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Edit Ruangan</h2>

    <form action="<?= base_url('ruangan/edit/' . $ruangan->id_ruang) ?>" method="post">
        <div class="mb-3">
            <label for="nip" class="form-label">ID Ruangan</label>
            <input type="text" name="nip" class="form-control" value="<?= $ruangan->id_ruang ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Ruangan</label>
            <input type="text" name="nama_ruang" class="form-control" value="<?= $ruangan->nama_ruang ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Kapasitas</label>
            <input type="text" name="kapasitas" class="form-control" value="<?= $ruangan->kapasitas ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('ruangan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
