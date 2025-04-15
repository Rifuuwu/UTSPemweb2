<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Edit Jadwal</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nip" class="form-label">Dosen</label>
            <select class="form-select" name="nip" id="nip" required>
                <option value="">-- Pilih Dosen --</option>
                <?php foreach ($dosen as $d): ?>
                    <option value="<?= $d->nip ?>" <?= $d->nip == $jadwal_item->nip ? 'selected' : '' ?>>
                        <?= $d->nama_dosen ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_matkul" class="form-label">Mata Kuliah</label>
            <select class="form-select" name="id_matkul" id="id_matkul" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php foreach ($matkul as $m): ?>
                    <option value="<?= $m->id_matkul ?>" <?= $m->id_matkul == $jadwal_item->id_matkul ? 'selected' : '' ?>>
                        <?= $m->nama_matkul ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_ruang" class="form-label">Ruangan</label>
            <select class="form-select" name="id_ruang" id="id_ruang" required>
                <option value="">-- Pilih Ruangan --</option>
                <?php foreach ($ruangan as $r): ?>
                    <option value="<?= $r->id_ruang ?>" <?= $r->id_ruang == $jadwal_item->id_ruang ? 'selected' : '' ?>>
                        <?= $r->nama_ruang ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select class="form-select" name="hari" id="hari" required>
                <option value="">-- Pilih Hari --</option>
                <?php
                $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                foreach ($hariList as $h): ?>
                    <option value="<?= $h ?>" <?= $h == $jadwal_item->hari ? 'selected' : '' ?>>
                        <?= $h ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="slot_mulai" class="form-label">Slot Mulai</label>
            <select class="form-select" name="slot_mulai" id="slot_mulai" required>
                <option value="">-- Pilih Slot Mulai --</option>
                <?php foreach ($slot_map as $key => $jam): ?>
                    <option value="<?= $key ?>" <?= $key == $jadwal_item->slot_mulai ? 'selected' : '' ?>>
                        <?= "$key ($jam)" ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="slot_selesai" class="form-label">Slot Selesai</label>
            <select class="form-select" name="slot_selesai" id="slot_selesai" required>
                <option value="">-- Pilih Slot Selesai --</option>
                <?php foreach ($slot_map as $key => $jam): ?>
                    <option value="<?= $key ?>" <?= $key == $jadwal_item->slot_selesai ? 'selected' : '' ?>>
                        <?= "$key ($jam)" ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?= base_url('jadwal') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
