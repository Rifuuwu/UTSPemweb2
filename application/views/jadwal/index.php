<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Jadwal Mingguan</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('jadwal/tambah') ?>" class="btn btn-primary mb-3">Tambah Jadwal</a>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>Jam</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Slot ke jam nyata
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

                $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                $slotKeys = array_keys($slotMap);

                // Inisialisasi matriks jadwal
                $jadwalMatrix = [];
                foreach ($slotKeys as $slot) {
                    foreach ($hariList as $hari) {
                        $jadwalMatrix[$slot][$hari] = '';
                    }
                }

                // Isi matriks dari data
                foreach ($jadwal as $j) {
                    $start = array_search($j->slot_mulai, $slotKeys);
                    $end = array_search($j->slot_selesai, $slotKeys);

                    for ($i = $start; $i < $end; $i++) {
                        $s = $slotKeys[$i];
                        $hari = $j->hari;
                        $isi = "{$j->nama_matkul}<br><small>{$j->nama_ruang}</small><br><small>{$j->nama_dosen}</small>";
                        $jadwalMatrix[$s][$hari] = $isi;
                    }
                }

                // Cetak tabel jadwal
                foreach ($slotKeys as $slot) {
                    echo '<tr>';
                    echo '<td>' . $slotMap[$slot] . '</td>';
                    foreach ($hariList as $hari) {
                        echo '<td>' . $jadwalMatrix[$slot][$hari] . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
