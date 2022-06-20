<?php

need('partials.main_header') ?>
<title><?= $data['title'] ?></title>

<style>
    .link-hover {
        color: black;
        text-decoration: none;
    }

    .link-hover:hover {
        color: gold;
        text-decoration: underline;
    }

    .scroll-side-filter {
        overflow-y: scroll;
        height: 660px;
    }

    @media (max-width: 768px) {
        .scroll-side-filter {
            height: 360px;
            margin-bottom: 20px;
        }
    }
</style>

<?php need('dashboard.navbar_d', $data) ?>


<div class="container-fluid mb-5" style="margin-top: 100px;">
    <div id="flasher">
        <?= \Lawana\Message\Flasher::show('keranjang') ?>
    </div>

    <div class="row row-cols-1 row-cols-md-2">
        <div class="col col-12 col-md-4 col-lg-3">
            <h4 class="px-2 mb-0">Filter</h4>
            <hr class="m-2">
            <div class="px-2 scroll-side-filter">
                <ul class="list-group">
                    <li class="list-group-item" onclick="filter('semua', this)"><a href="#Semua" class="link-hover">Tampilkan Semua</a></li>

                    <hr>

                    <?php foreach ($data['kategori'] as $kategori) : ?>
                        <li class="list-group-item" onclick="filter('<?= strtolower(str_replace(' ', '-', $kategori['jenis_kategori'])) ?>', this)"><a href="#<?= $kategori['jenis_kategori'] ?>" class="link-hover"><?= $kategori['jenis_kategori'] ?></a></li>

                    <?php endforeach; ?>

                    <hr>

                    <?php foreach ($data['merk'] as $merk) : ?>

                        <li class="list-group-item" onclick="filter('<?= strtolower(str_replace(' ', '-', $merk['nama_merk'])) ?>', this)"><a href="#<?= $merk['nama_merk'] ?>" class="link-hover"><?= $merk['nama_merk'] ?></a></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col col-12 col-md-8 col-lg-9">
            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" id="lists-produk">
                <?php if (sizeof($data['produk']) > 0) : ?>
                    <?php foreach ($data['produk'] as $produk) : ?>
                        <div class="col produk-<?= strtolower(str_replace(' ', '-', $produk['nama_merk'])) ?> produk-<?= strtolower(str_replace(' ', '-', $produk['jenis_kategori'])) ?>">
                            <div class="card h-100">
                                <img src="<?= PUBLIC_URL ?>/images/produk/<?= $produk['gambar_produk'] ?>" class="card-img-top p-3" style="max-height: 300px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produk['nama_produk'] ?></h5>
                                    <small><span class="badge rounded-pill bg-info"><?= $produk['nama_merk'] ?></span></small>
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

<script>
    function filter(key, element) {
        const lists_produk = document.querySelector('#lists-produk');

        const list = lists_produk.children
        if (key == 'semua') {
            for (let i = 0; i < list.length; i++) {
                list[i].classList.remove('d-none')
                list[i].classList.add('d-block')
            }
        } else {
            const filter = 'produk-' + key

            for (let i = 0; i < list.length; i++) {
                if (list[i].classList.contains(filter)) {
                    // list[i].removeAttribute('hidden')
                    list[i].classList.remove('d-none')
                    list[i].classList.add('d-block')
                } else {
                    list[i].classList.remove('d-block')
                    list[i].classList.add('d-none')
                }
            }

        }

    }
</script>


<?php need('partials.main_footer') ?>