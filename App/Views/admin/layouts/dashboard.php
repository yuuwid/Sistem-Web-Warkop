<?php

use Lawana\Message\Flasher;
?>
<!-- Page content-->
<div class="container my-5 mx-3">

    <section>
        <?= Flasher::show('dashboard-admin') ?>
    </section>

    <div class="text-end">
        <small>diperbarui <span id="waktu-refresh"></span></small>
    </div>

    <div id="transaksi-hari-ini">

        <section>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6">

                <div class="col border-end ">
                    <p class="mb-0"><i class="bi bi-bag-fill"></i> Jumlah Transaksi</p>
                    <h1 class="my-0  text-coral"><?= $data['jumlah_transaksi']['total'] ?></h1>
                    <p class="my-0 text-end"><small>Hari ini</small></p>
                </div>
                <div class="col border-end ">
                    <p class="mb-0"><i class="bi bi-clock-history"></i> Transaksi Baru</p>
                    <h1 class="my-0  text-coral"><?= $data['jumlah_transaksi']['berjalan'] ?></h1>
                    <p class="my-0 text-end"><small>Hari ini</small></p>
                </div>
                <div class="col border-end ">
                    <p class="mb-0"><i class="bi bi-hourglass-split"></i> Transaksi Diproses</p>
                    <h1 class="my-0  text-coral"><?= $data['jumlah_transaksi']['diproses'] ?></h1>
                    <p class="my-0 text-end"><small>Hari ini</small></p>
                </div>
                <div class="col border-end ">
                    <p class="mb-0"><i class="bi bi-bag-check"></i> Transaksi Selesai</p>
                    <h1 class="my-0  text-coral"><?= $data['jumlah_transaksi']['selesai'] ?></h1>
                    <p class="my-0 text-end"><small>Hari ini</small></p>
                </div>
                <div class="col border-end ">
                    <p class="mb-0"><i class="bi bi-bag-dash"></i> Transaksi Batal</p>
                    <h1 class="my-0  text-coral"><?= $data['jumlah_transaksi']['batal'] ?></h1>
                    <p class="my-0 text-end"><small>Hari ini</small></p>
                </div>
                <div class="col border-end ">
                    <p class="mb-0"><i class="bi bi-list-ol"></i> No Antrain</p>
                    <h1 class="my-0  text-coral"><?= $data['antrian'] ?></h1>
                    <p class="my-0 text-end"><a href="<?= URL ?>/admin/reset-antrian" class="text-decoration-none text-danger"><small>Reset</small></a></p>
                </div>
            </div>
        </section>

        <br>

        <div class="col">
            <p class="mb-0"><i class="bi bi-cash"></i> Pemasukan <small>(Hari ini)</small></p>
            <h1 class="my-0">Rp. <?= rupiah($data['jumlah_transaksi']['pemasukan']) ?></h1>
        </div>

        <hr>

        <section class="mt-3">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6">
                <div class="col border-end ">
                    <p class="my-0"><i class="bi bi-person"></i> Jumlah Pegawai</p>
                    <h1 class="my-0"><?= $data['jumlah_pegawai'] ?></h1>
                </div>
                <div class="col">
                    <p class="my-0"><i class="bi bi-plugin"></i> Jumlah Stok</p>
                    <h1 class="my-0"><?= $data['jumlah_stok'] ?></h1>
                </div>
            </div>
        </section>

        <hr>

        <section class="mt-4">
            <h4>Transaksi Hari ini</h4>
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kasir</th>
                        <th scope="col">Waktu</th>
                        <th scope="col" class="text-center"><i class="bi bi-list"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($data['transaksi'] as $transaksi) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $transaksi['kode_transaksi'] ?></td>
                            <td><?= strtoupper($transaksi['status']) ?></td>
                            <td><?= $transaksi['nama_pegawai'] ?></td>
                            <td><?= $transaksi['tanggal_penjualan'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" id="btn-bayar" onclick="struk( <?= $transaksi['id_penjualan'] ?>, <?= ($transaksi['id_pegawai']) ?> )" <?= ($transaksi['id_pegawai'] == null) ? 'disabled' : '' ?>><i class="bi bi-archive"></i></button>
                            </td>
                        </tr>


                    <?php endforeach; ?>
                </tbody>
            </table>


        </section>
    </div>
</div>

<script>
    var timeout = setInterval(reloadSection, 10000);
    let now = new Date().toLocaleTimeString();

    function reloadSection() {
        now = new Date().toLocaleTimeString();
        $('#transaksi-hari-ini').load(' #transaksi-hari-ini > *');

        $('#waktu-refresh').text(now);
    }

    $('#waktu-refresh').text(now);

    function struk(id_penjualan, id_pegawai) {
        const url = "<?= URL ?>/transaksi/cetak-struk?id_penjualan=" + id_penjualan + '&id_pegawai=' + id_pegawai;
        window.open(url, "_blank");
    }
</script>