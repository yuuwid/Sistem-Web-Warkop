<?php

use Lawana\Message\Flasher;

need('partials.main_header');
?>
<title>Kasir | Warkop</title>


<style>
    .navbar {
        background-color: darkturquoise;
    }

    .txt-section {
        color: darkturquoise;
    }
</style>

<nav class="navbar navbar-dark">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Kasir</span>
        <span class="navbar-text dropdown py-0">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selamat Datang, <?= $data['kasir']['nama_pegawai'] ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item text-dark" href="<?= URL ?>/kasir/logout">Keluar</a></li>
            </ul>
        </span>
    </div>
</nav>



<div class="container mt-5 mb-5" id="refresh-content">

    <div class="flash">
        <?= Flasher::show('proses-pesanan') ?>
    </div>

    <section>
        <h3 class="txt-section">Pesanan Baru</h3>
        <hr>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($data['pesanan'] as $pesanan) : ?>
                <?php if (($pesanan['id_pegawai'] == null) and ($pesanan['status'] == 'dibuat')) : ?>
                    <div class="col">
                        <div class="card open-Info bg-warning" data-bs-toggle="modal" data-bs-target="#ModalDataBarang" data-id_penjualan="<?= $pesanan['id_penjualan'] ?>" data-no_antrian="<?= $pesanan['no_antrian'] ?>">
                            <div class="card-body">
                                <div class="row row-cols-2">
                                    <section class="col col-3 mx-auto my-auto text-center">
                                        <h1><?= $pesanan['no_antrian'] ?></h1>
                                    </section>
                                    <section class="col col-7">
                                        <h5 class="card-title"><?= $pesanan['nama_pelanggan'] ?></h5>
                                        <p><small><?= $pesanan['tanggal_penjualan'] ?></small></p>
                                        <p id="total_harga" data-total_harga="<?= rupiah($pesanan['total_harga']) ?>">Rp. <?= rupiah($pesanan['total_harga']) ?></p>
                                        <ul>
                                            <?php $i = 0; ?>
                                            <?php foreach ($pesanan['barang'] as $barang) : ?>
                                                <li id="daftar-barang-<?= $i ?>" data-barang_<?= $i ?>="<?= $barang['nama_produk'] ?>" data-jumlah_<?= $i ?>="<?= $barang['jumlah_barang'] ?>" data-harga_<?= $i++ ?>="<?= $barang['jumlah_harga'] ?>" hidden>
                                                    <?= $barang['nama_produk'] ?> ( <?= $barang['jumlah_barang'] ?>x )
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <p class="text-end mb-0"><small>Lihat pesanan <i class="bi bi-caret-right"></i></small></p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mt-5">
        <h3 class="txt-section">Diproses</h3>
        <hr>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($data['pesanan'] as $pesanan) : ?>
                <?php if (($pesanan['id_pegawai'] != null) and ($pesanan['status'] == 'diproses') and ($pesanan['id_pegawai'] == $data['kasir']['id_pegawai'])) : ?>
                    <div class="col">
                        <div class="card open-Info bg-primary text-light" data-bs-toggle="modal" data-bs-target="#ModalDataBarangProses" data-id_penjualan="<?= $pesanan['id_penjualan'] ?>" data-no_antrian="<?= $pesanan['no_antrian'] ?>">
                            <div class="card-body">
                                <div class="row row-cols-2">
                                    <section class="col col-3 mx-auto my-auto text-center">
                                        <h1><?= $pesanan['no_antrian'] ?></h1>
                                    </section>
                                    <section class="col col-7">
                                        <h5 class="card-title"><?= $pesanan['nama_pelanggan'] ?></h5>
                                        <p><small><?= $pesanan['tanggal_penjualan'] ?></small></p>
                                        <p id="total_harga" data-total_harga="<?= rupiah($pesanan['total_harga']) ?>">Rp. <?= rupiah($pesanan['total_harga']) ?></p>
                                        <ul>
                                            <?php $i = 0; ?>
                                            <?php foreach ($pesanan['barang'] as $barang) : ?>
                                                <li id="daftar-barang-proses-<?= $i ?>" data-barang_<?= $i ?>="<?= $barang['nama_produk'] ?>" data-jumlah_<?= $i ?>="<?= $barang['jumlah_barang'] ?>" data-harga_<?= $i++ ?>="<?= $barang['jumlah_harga'] ?>" hidden>
                                                    <?= $barang['nama_produk'] ?> ( <?= $barang['jumlah_barang'] ?>x )
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <p class="text-end mb-0"><small>Lihat pesanan <i class="bi bi-caret-right"></i></small></p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>


    <section class="mt-5">
        <h3 class="txt-section">Selesai</h3>
        <hr>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($data['pesanan'] as $pesanan) : ?>
                <?php if (($pesanan['id_pegawai'] != null) and ($pesanan['status'] == 'selesai') and ($pesanan['id_pegawai'] == $data['kasir']['id_pegawai'])) : ?>
                    <div class="col">
                        <div class="card open-Info bg-success text-light" data-bs-toggle="modal" data-bs-target="#ModalDataBarangSelesai" data-id_penjualan="<?= $pesanan['id_penjualan'] ?>" data-no_antrian="<?= $pesanan['no_antrian'] ?>">
                            <div class="card-body">
                                <div class="row row-cols-2">
                                    <section class="col col-3 mx-auto my-auto text-center">
                                        <h1><?= $pesanan['no_antrian'] ?></h1>
                                    </section>
                                    <section class="col col-7">
                                        <h5 class="card-title"><?= $pesanan['nama_pelanggan'] ?></h5>
                                        <p><small><?= $pesanan['tanggal_penjualan'] ?></small></p>
                                        <p id="total_harga" data-total_harga="<?= rupiah($pesanan['total_harga']) ?>">Rp. <?= rupiah($pesanan['total_harga']) ?></p>
                                        <ul>
                                            <?php $i = 0; ?>
                                            <?php foreach ($pesanan['barang'] as $barang) : ?>
                                                <li id="daftar-barang-selesai-<?= $i ?>" data-barang_<?= $i ?>="<?= $barang['nama_produk'] ?>" data-jumlah_<?= $i ?>="<?= $barang['jumlah_barang'] ?>" data-harga_<?= $i++ ?>="<?= $barang['jumlah_harga'] ?>" hidden>
                                                    <?= $barang['nama_produk'] ?> ( <?= $barang['jumlah_barang'] ?>x )
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <p class="text-end mb-0"><small>Detail pesanan <i class="bi bi-caret-right"></i></small></p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalDataBarang" tabindex="-1" aria-labelledby="ModalDataBarangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= URL ?>/kasir/proses_pesanan" method="GET">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalDataBarangLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="text-center" id="modal_no_antrian"></h1>

                    <h5>Pesanan</h5>
                    <ol id="modal-daftar-barang"></ol>

                    <hr>
                    <h5>Total</h5>
                    <h6 id="modal-total-harga"></h6>

                    <hr>

                    <div class="mb-3">
                        <label for="bayarInput" class="form-label"><b>Bayar</b></label>
                        <input name="bayar" type="text" class="form-control" id="bayarInput" required>
                        <div class="invalid-feedback" id="feedback-bayar">
                            Uang Kurang!
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input name="id_penjualan" type="hidden" id="modal_id_penjualan">
                    <input name="id_pegawai" type="hidden" value="<?= $data['kasir']['id_pegawai'] ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-bayar" onclick="struk()" disabled>Proses</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Proses -->
<div class="modal fade" id="ModalDataBarangProses" tabindex="-1" aria-labelledby="ModalDataBarangProsesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= URL ?>/kasir/selesai_pesanan" method="GET">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalDataBarangProsesLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="text-center" id="modal_no_antrian_proses"></h1>

                    <h5>Pesanan</h5>
                    <ol id="modal-daftar-barang_proses"></ol>

                    <h5 id="modal-total-harga_proses"></h5>
                </div>
                <div class="modal-footer">
                    <input name="id_penjualan" type="hidden" id="modal_id_penjualan_proses">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-bayar" onclick="struk()">Struk</button>
                    <button type="submit" class="btn btn-success">Selesai</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Selesai -->
<div class="modal fade" id="ModalDataBarangSelesai" tabindex="-1" aria-labelledby="ModalDataBarangSelesaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalDataBarangSelesaiLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1 class="text-center" id="modal_no_antrian_selesai"></h1>

                <h5>Pesanan</h5>
                <ol id="modal-daftar-barang_selesai"></ol>

                <h5 id="modal-total-harga_selesai"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-bayar" onclick="struk()">Struk</button>
                <h5>Pesanan Selesai</h5>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".open-Info", function() {
        var id_penjualan = $(this).data('id_penjualan');
        var no_antrian = $(this).data('no_antrian');

        $(".modal-body #modal_no_antrian").text(no_antrian);
        $(".modal-footer #modal_id_penjualan").val(id_penjualan);

        var i = 0;

        const ol = document.getElementById('modal-daftar-barang');
        const modal_total_harga = document.querySelector('#modal-total-harga');

        while (modal_total_harga.firstChild) {
            modal_total_harga.removeChild(modal_total_harga.firstChild);
        }

        while (ol.firstChild) {
            ol.removeChild(ol.firstChild);
        }

        while ($(this).find('ul #daftar-barang-' + i).data('barang_' + i) != undefined) {
            const nama_barang = $(this).find('ul #daftar-barang-' + i).data('barang_' + i);
            const jumlah_barang = $(this).find('ul #daftar-barang-' + i).data('jumlah_' + i);
            const harga = $(this).find('ul #daftar-barang-' + i).data('harga_' + i) / jumlah_barang;


            const li = document.createElement("li");
            li.appendChild(document.createTextNode(nama_barang + " " + jumlah_barang + "x  ( Rp. " + harga + " )"))
            ol.appendChild(li);
            i += 1;
        }
        const total_harga = $(this).find('#total_harga').data('total_harga');

        modal_total_harga.appendChild(document.createTextNode('Rp. ' + total_harga))

    });

    $(document).on("click", ".open-Info", function() {
        var id_penjualan = $(this).data('id_penjualan');
        var no_antrian = $(this).data('no_antrian');

        $(".modal-body #modal_no_antrian_proses").text(no_antrian);
        $(".modal-footer #modal_id_penjualan_proses").val(id_penjualan);

        var i = 0;

        const ol = document.getElementById('modal-daftar-barang_proses');
        const modal_total_harga = document.querySelector('#modal-total-harga_proses');

        var inputBayar = document.querySelector('#bayarInput');

        inputBayar.val = '';

        while (modal_total_harga.firstChild) {
            modal_total_harga.removeChild(modal_total_harga.firstChild);
        }

        while (ol.firstChild) {
            ol.removeChild(ol.firstChild);
        }

        while ($(this).find('ul #daftar-barang-proses-' + i).data('barang_' + i) != undefined) {
            const nama_barang = $(this).find('ul #daftar-barang-proses-' + i).data('barang_' + i);
            const jumlah_barang = $(this).find('ul #daftar-barang-proses-' + i).data('jumlah_' + i);
            const harga = $(this).find('ul #daftar-barang-proses-' + i).data('harga_' + i) / jumlah_barang;


            const li = document.createElement("li");
            li.appendChild(document.createTextNode(nama_barang + " " + jumlah_barang + "x  ( Rp. " + harga + " )"))
            ol.appendChild(li);
            i += 1;
        }
        const total_harga = $(this).find('#total_harga').data('total_harga');

        modal_total_harga.appendChild(document.createTextNode('Rp. ' + total_harga))
    });


    $(document).on("click", ".open-Info", function() {
        var id_penjualan = $(this).data('id_penjualan');
        var no_antrian = $(this).data('no_antrian');

        $(".modal-body #modal_no_antrian_selesai").text(no_antrian);
        $(".modal-footer #modal_id_penjualan_selesai").val(id_penjualan);

        var i = 0;

        const ol = document.getElementById('modal-daftar-barang_selesai');
        const modal_total_harga = document.querySelector('#modal-total-harga_selesai');

        while (modal_total_harga.firstChild) {
            modal_total_harga.removeChild(modal_total_harga.firstChild);
        }

        while (ol.firstChild) {
            ol.removeChild(ol.firstChild);
        }

        while ($(this).find('ul #daftar-barang-selesai-' + i).data('barang_' + i) != undefined) {
            const nama_barang = $(this).find('ul #daftar-barang-selesai-' + i).data('barang_' + i);
            const jumlah_barang = $(this).find('ul #daftar-barang-selesai-' + i).data('jumlah_' + i);
            const harga = $(this).find('ul #daftar-barang-selesai-' + i).data('harga_' + i) / jumlah_barang;


            const li = document.createElement("li");
            li.appendChild(document.createTextNode(nama_barang + " " + jumlah_barang + "x  ( Rp. " + harga + " )"))
            ol.appendChild(li);
            i += 1;
        }
        const total_harga = $(this).find('#total_harga').data('total_harga');

        modal_total_harga.appendChild(document.createTextNode('Rp. ' + total_harga))

    });
</script>


<script type="text/javascript">
    var rupiah = document.getElementById('bayarInput');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
        validate();
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script>
    function validate() {
        let harga = $('#modal-total-harga').text().replace('Rp. ', '').replace('.', '');
        const bayar = $('#bayarInput').val().replace('Rp. ', '').replace('.', '');
        const feedback = $('#feedback-bayar');
        const btn_bayar = $('#btn-bayar');

        if (parseInt(harga) < parseInt(bayar)) {
            feedback.hide();
            btn_bayar.attr('disabled', false);
        } else {
            feedback.show();
            btn_bayar.attr('disabled', true);

        }
    }

    function struk() {
        const id_penjualan = $(".modal-footer #modal_id_penjualan").val();
        const url = "<?= URL ?>/transaksi/cetak-struk?id_penjualan=" + id_penjualan + '&id_pegawai=<?= $data['kasir']['id_pegawai'] ?>';
        window.open(url, "_blank");
    }
</script>

<script>
    var timeout = setInterval(reloadSection, 1000);

    function reloadSection() {

        $('#refresh-content').load(' #refresh-content > *');
    }
</script>

<?php need('partials.main_footer') ?>