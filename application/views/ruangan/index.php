<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Daftar Ruangan</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('ruangan/tambah') ?>" class="btn btn-primary mb-3">Tambah Ruangan</a>
    <a href="<?= base_url('jadwal') ?>" class="btn btn-primary mb-3">Kembali</a>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>ID Ruangan</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($ruangan as $r): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $r->id_ruang ?></td>
                        <td><?= $r->nama_ruang ?></td>
                        <td><?= $r->kapasitas ?></td>
                        <td>
                            <a href="<?= base_url('ruangan/edit/' . $r->id_ruang) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('ruangan/hapus/' . $r->id_ruang) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus ruangan ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($ruangan)): ?>
                    <tr><td colspan="4">Belum ada data dosen.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
