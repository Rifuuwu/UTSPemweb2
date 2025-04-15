<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Edit Dosen</h2>

    <form action="<?= base_url('dosen/edit/' . $dosen->nip) ?>" method="post">
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" value="<?= $dosen->nip ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" value="<?= $dosen->nama_dosen ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('dosen') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
