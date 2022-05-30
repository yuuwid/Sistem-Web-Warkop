<?php


 need('partials.main_header') ?>
<title><?= $data['title'] ?></title>

<?php need('dashboard.navbar_d', $data) ?>


<div class="container mb-5" style="margin-top: 100px;">
    <div id="flasher">
        <?= \Lawana\Message\Flasher::show('keranjang') ?>
    </div>
    <div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 g-4">
        <?php if (sizeof($data['produk']) > 0) : ?>

            <?php foreach ($data['produk'] as $produk) : ?>
                <div class="col" data-aos="flip-up">
                    <div class="card h-100">
                        <img src="<?= PUBLIC_URL ?>/images/<?= $produk['gambar_produk'] ?>" class="card-img-top p-3" style="max-height: 300px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produk['nama_produk'] ?></h5>
                            <small><span class="badge rounded-pill bg-info"><?= $produk['nama_produk'] ?></span></small>
                            <p class="card-text"><?= $produk['keterangan_produk'] ?></p>
                            <small class="text-muted"><i class="bi bi-tag"></i> Rp. <?= rupiah($produk['harga_produk']) ?></small>
                        </div>
                        <div class="card-footer">

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-sm ms-auto" onclick="tambah(<?= $produk['id_produk'] ?>)">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        <?php else : ?>
            <h3 class="text-center">Tidak ada Produk.</h3>
        <?php endif; ?>

    </div>


</div>

<script>
    function tambah(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#flasher").load(" #flasher > *");
                $("#keranjang_nav").load(" #keranjang_nav > *");
            }
        };
        xhttp.open("GET", "<?= URL ?>/dashboard/pesanan?req=tambah&id_produk=" + id, true);
        xhttp.send();
    }
</script>


<?php need('partials.main_footer') ?>
