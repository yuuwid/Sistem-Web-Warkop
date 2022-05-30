<?php need('partials.main_header') ?>

<title><?= $data['title'] ?></title>

<style>
    body {
        background-color: rgb(247, 238, 239);
    }
</style>

<div class="container text-center my-3 py-2">

    <h1>Nomor Pesanan</h1>
    <h2><?= $data['no_antrian'] ?></h2>


    <h4>Pesananmu telah kami terima.</h4>
    <h5>Jangan lupa bayar ke kasir.</h5>

    <img src="<?= PUBLIC_URL ?>/images/home/animate1.gif" alt="">

    <div class="d-blok">
        <a href="<?= URL ?>/akhiri-pesan" class="btn btn-primary" onclick="antrian()">Cetak antian & Selesai</a>

    </div>
</div>


<?php need('partials.main_footer') ?>

<script>
    function antrian() {
        const url = "<?= URL ?>/cetak-antrian?no_antrian=<?= $data['no_antrian'] ?>"
        window.open(url, "_blank");
    }
</script>