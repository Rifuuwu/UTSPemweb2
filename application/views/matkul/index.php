<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Daftar Mata Kuliah</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('Mata_kuliah/tambah') ?>" class="btn btn-primary mb-3">Tambah Ruangan</a>
    <a href="<?= base_url('Jadwal') ?>" class="btn btn-primary mb-3">Kembali</a>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>ID Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Peserta</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($matkul as $m): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $m->id_matkul ?></td>
                        <td><?= $m->nama_matkul ?></td>
                        <td><?= $m->sks ?></td>
                        <td><?= $m->peserta ?></td>
                        <td>
                            <a href="<?= base_url('Mata_kuliah/edit/' . $m->id_matkul) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('Mata_kuliah/hapus/' . $m->id_matkul) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($matkul)): ?>
                    <tr><td colspan="4">Belum ada data mata kuliah.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
