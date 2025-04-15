<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <a href="<?= base_url('dosen') ?>" class="btn btn-primary mb-3">Data Dosen</a>
    <a href="<?= base_url('ruangan') ?>" class="btn btn-primary mb-3">Data Ruangan</a>
    <a href="<?= base_url('Mata_kuliah') ?>" class="btn btn-primary mb-3">Data Mata Kuliah</a>

    <h2 class="mb-4">Jadwal Mingguan</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('jadwal/tambah') ?>" class="btn btn-primary mb-3">Tambah Jadwal</a>

    <?php
    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    $slotMap = [
        'A' => '07:00',
        'B' => '08:00',
        'C' => '09:00',
        'D' => '10:00',
        'E' => '11:00',
        'F' => '13:00',
        'G' => '14:00',
        'H' => '15:00',
    ];
    $slotKeys = array_keys($slotMap);
    ?>

    <?php foreach ($hariList as $hari): ?>
        <div class="mb-5">
            <h4><?= $hari ?></h4>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Ruangan</th>
                            <?php foreach ($slotMap as $slot => $jam): ?>
                                <th><?= $jam ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ruangan as $r): ?>
                            <tr>
                                <td><?= $r->nama_ruang ?></td>
                                <?php foreach ($slotKeys as $slot): ?>
                                    <?php
                                        $isi = '';
                                        foreach ($jadwal as $j) {
                                            // Cek hari, ruangan, dan apakah slot termasuk dalam range jadwal
                                            $start = array_search($j->slot_mulai, $slotKeys);
                                            $end = array_search($j->slot_selesai, $slotKeys);
                                            $currentSlotIndex = array_search($slot, $slotKeys);
                                            if (
                                                $j->hari == $hari &&
                                                $j->nama_ruang == $r->nama_ruang &&
                                                $currentSlotIndex >= $start &&
                                                $currentSlotIndex < $end
                                            ) {
                                                $isi = "<strong>{$j->nama_matkul}</strong><br>
                                                <small>{$j->nama_dosen}</small><br>
                                                <a href='" . base_url("jadwal/edit/{$j->id_jadwal}") . "' class='me-2 text-primary' title='Edit'>✏️</a>
                                                <a href='" . base_url("jadwal/hapus/{$j->id_jadwal}") . "' class='text-danger' onclick='return confirm(\"Yakin ingin menghapus jadwal ini?\")' title='Hapus'>🗑️</a>";
                                                break;
                                            }
                                        }
                                    ?>
                                    <td><?= $isi ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($ruangan)): ?>
                            <tr><td colspan="<?= count($slotMap) + 1 ?>">Tidak ada data ruangan</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
