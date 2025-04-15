<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Daftar Dosen</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('dosen/tambah') ?>" class="btn btn-primary mb-3">Tambah Dosen</a>
    <a href="<?= base_url('jadwal') ?>" class="btn btn-primary mb-3">Kembali</a>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Nomor HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($dosen as $d): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nip ?></td>
                        <td><?= $d->nama_dosen ?></td>
                        <td><?= $d->no_hp ?></td>
                        <td>
                            <a href="<?= base_url('dosen/edit/' . $d->nip) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('dosen/hapus/' . $d->nip) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus dosen ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($dosen)): ?>
                    <tr><td colspan="4">Belum ada data dosen.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
