<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Tambah Jadwal</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('jadwal/tambah') ?>" method="post">
        <div class="mb-3">
            <label for="nip" class="form-label">Dosen</label>
            <select name="nip" class="form-select" required>
                <option value="">Pilih Dosen</option>
                <?php foreach ($dosen as $d): ?>
                    <option value="<?= $d->nip ?>"><?= $d->nama_dosen ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_matkul" class="form-label">Mata Kuliah</label>
            <select name="id_matkul" class="form-select" required>
                <option value="">Pilih Mata Kuliah</option>
                <?php foreach ($matkul as $m): ?>
                    <option value="<?= $m->id_matkul ?>"><?= $m->nama_matkul ?> (<?= $m->peserta ?> peserta)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_ruang" class="form-label">Ruangan</label>
            <select name="id_ruang" class="form-select" required>
                <option value="">Pilih Ruangan</option>
                <?php foreach ($ruangan as $r): ?>
                    <option value="<?= $r->id_ruang ?>"><?= $r->nama_ruang ?> (kapasitas <?= $r->kapasitas ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" class="form-select" required>
                <option value="">Pilih Hari</option>
                <?php 
                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                foreach ($hari as $h): ?>
                    <option value="<?= $h ?>"><?= $h ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="slot_mulai" class="form-label">Slot Mulai</label>
                <select name="slot_mulai" class="form-select" required>
                    <?php foreach (['A','B','C','D','E','F','G','H'] as $slot): ?>
                        <option value="<?= $slot ?>"><?= $slot ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="slot_selesai" class="form-label">Slot Selesai</label>
                <select name="slot_selesai" class="form-select" required>
                    <?php foreach (['A','B','C','D','E','F','G','H'] as $slot): ?>
                        <option value="<?= $slot ?>"><?= $slot ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('jadwal') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
