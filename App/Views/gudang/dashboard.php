<?php

use Lawana\Message\Flasher;

need('partials.main_header') ?>
<title>GUDANG</title>

<style>
    .navbar {
        background-color: darkslateblue;
    }

    .txt-section {
        color: darkslateblue;
    }
</style>

<nav class="navbar navbar-dark fixed-top">
    <div class="container">
        <span class="navbar-brand mb-0 h1"></span>
        <span class="navbar-text dropdown py-0">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selamat Datang, <?= $data['staff']['nama_pegawai'] ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item text-dark" href="<?= URL ?>/gudang/logout">Keluar</a></li>
            </ul>
        </span>
    </div>
</nav>


<div class="container" style="margin-top: 70px;">

    <div class="flash">
        <?= Flasher::show('gudang') ?>
    </div>

    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <form action="<?= URL ?>/gudang/store" method="POST">
                <div class="mb-1">
                    <label class="form-label fw-bold">Supplier</label>
                    <select class="form-select" aria-label="Default select example" id="supplierCheck" name="id_supplier">
                        <option value="0" selected>Pilih Supplier</option>
                        <?php $i = 1 ?>
                        <?php foreach ($data['supplier'] as $supplier) : ?>

                            <option value="<?= $i++ ?>"><?= $supplier['nama_supplier'] ?></option>

                        <?php endforeach; ?>
                    </select>
                    <div id="supplierInput" style="display: none;">
                        <input type="text" class="form-control" placeholder="Masukan nama Supplier baru" name="nama_supplier_baru">

                        <label class="form-label fw-bold mt-2">Alamat Supplier</label>
                        <input type="text" class="form-control" name="alamat_supplier_baru">

                        <label class="form-label fw-bold mt-2">No Telp Supplier</label>
                        <input type="tel" class="form-control" name="notelp_supplier_baru">
                    </div>
                </div>


                <div class="d-flex justify-content-end">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="supplierCheck" onclick="supplierInputForm(this)" name="baru">
                        <label class="form-check-label" for="supplierCheck">
                            Supplier Baru ?
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Produk</label>
                    <select class="form-select" aria-label="Default select example" name="id_produk">
                        <option value="0" selected>Pilih Produk</option>
                        <?php $i = 1 ?>
                        <?php foreach ($data['produk'] as $produk) : ?>

                            <option value="<?= $i++ ?>"><?= $produk['nama_produk'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" name="harga_beli" value="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jumlah Pembelian</label>
                    <input type="number" class="form-control" name="jumlah_pembelian" value="0">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
        <div class="col mt-5 mt-md-0">
            <?php foreach ($data['pembelian'] as $pembelian) : ?>

                <div class="card">
                    <div class="card-body">
                        <h6><?= $pembelian['nama_produk'] ?></h6>
                        <div>
                            <span class="badge rounded-pill bg-primary "><?= $pembelian['jumlah_pembelian'] ?>x</span>
                            <span class="badge rounded-pill bg-info text-light">Rp. <?= $pembelian['harga_beli'] ?></span>
                        </div>
                        <div>
                            <p class="mb-0"><?= $pembelian['nama_supplier'] ?></p>
                            <p class="mb-0"><small><?= $pembelian['notelp_supplier'] ?></small></p>
                            <p class="mb-0"><small><?= $pembelian['tanggal_pembelian'] ?></small></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>

<script>
    function supplierInputForm(check) {
        const supplierInput = document.querySelector('#supplierInput');
        const supplierCheck = document.querySelector('#supplierCheck');

        if (supplierCheck.style.display !== 'none') {
            supplierCheck.style.display = 'none';
            supplierInput.style.display = 'block'
        } else {
            supplierCheck.style.display = 'block';
            supplierInput.style.display = 'none'
        }
    }
</script>

<?php need('partials.main_footer') ?>