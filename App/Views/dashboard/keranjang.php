<?php

use Lawana\Message\Flasher;

need('partials.main_header') ?>

<?php need('dashboard.navbar_d', $data) ?>
<title><?= $data['title'] ?></title>

<div class="container mt-5" id="keranjang">

    <div id="flasher">
        <?= Flasher::show('keranjang') ?>
    </div>

    <?php if (sizeof($data['produk']) > 0) : ?>

        <div class="mb-2 text-end">
            <button class="btn btn-sm btn-danger" type="button" onclick="kosongankeranjang()">Kosongkan keranjang</button>
        </div>

    <?php endif; ?>

    <?php if (sizeof($data['produk']) > 0) : ?>
        <?php foreach ($data['produk'] as $produk) : ?>
            <?php
            $jumlah_produk = $data['keranjang'][$produk['id_produk']];
            $total_harga = $jumlah_produk * $produk['harga_produk'];
            ?>
            <div class="card">
                <div class="card-body">
                    <section class="row row-cols-3 px-4">
                        <div class="col col-2">
                            <img src="<?= PUBLIC_URL ?>/images/<?= $produk['gambar_produk'] ?>" class="img-fluid">
                        </div>
                        <div class="col col-6 my-auto">
                            <h4><?= $produk['nama_produk'] ?></h4>
                            <small>Rp. <?= rupiah($produk['harga_produk']) ?> x <b><?= $jumlah_produk ?></b></small>
                            <h5>Rp. <?= rupiah($total_harga) ?></h5>
                        </div>
                        <div class="col text-end my-auto">
                            <button type="button" class="btn btn-success  me-2" onclick="tambah( <?= $produk['id_produk'] ?> )"><i class="bi bi-plus-circle"></i></button>
                            <button type="button" class="btn btn-warning " onclick="kurang( <?= $produk['id_produk'] ?> )"><i class="bi bi-dash-circle"></i></button>
                        </div>
                    </section>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else: ?>    
        <div class="text-center">
            <h2>Tidak ada Pesanan</h2>
        </div>
    <?php endif; ?>

    <nav class="navbar navbar-dark bg-dark text-light fixed-bottom">
        <div class="container">
            <h3 class="">Total: <b class="h4 ms-4">Rp. <?= rupiah($data['jumlah_bayar']) ?></b></h3>
            <a href="<?= URL ?>/dashboard/buat-pesanan" class="btn btn-success">Buat Pesanan</a>
        </div>
    </nav>
</div>

<script>
    function tambah(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#keranjang").load(" #keranjang > *");
                $("#keranjang_nav").load(" #keranjang_nav > *");
                $("#flasher").load(" #flasher > *");
            }
        };
        xhttp.open("GET", "<?= URL ?>/dashboard/pesanan?req=tambah&id_produk=" + id, true);
        xhttp.send();
    }

    function kurang(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#keranjang").load(" #keranjang > *");
                $("#keranjang_nav").load(" #keranjang_nav > *");
                $("#flasher").load(" #flasher > *");
            }
        };
        xhttp.open("GET", "<?= URL ?>/dashboard/pesanan?req=kurang&id_produk=" + id, true);
        xhttp.send();
    }

    function kosongankeranjang() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#keranjang").load(" #keranjang > *");
                $("#keranjang_nav").load(" #keranjang_nav > *");
                $("#flasher").load(" #flasher > *");
            }
        };
        xhttp.open("GET", "<?= URL ?>/dashboard/pesanan?req=kosong", true);
        xhttp.send();
    }
</script>

<?php need('partials.main_footer') ?>