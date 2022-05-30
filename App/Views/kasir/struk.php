<?php  ?>
<style>
    body {
        width: 80mm;
        border: 1px solid black;
    }

    .content {
        margin: 10px;
    }

    img {
        width: 55%;
    }

    p {
        margin: 0px;
    }

    hr {
        border-top: 1px dashed;
    }

    .col-1 {
        width: 100%;
    }

    .col-2 {
        width: 80%;
    }

    .col-3 {
        width: 60%;
    }

    .col-4 {
        width: 40%;
    }

    .right {
        text-align: right;
    }

    .mid {
        text-align: center;
    }

    .left {
        text-align: left;
    }
</style>

<!DOCTYPE html>
<html>

<head>
    <title>CETAK STRUK PEMBAYARAN</title>
</head>

<body>

    <div class="content">

        <img src="<?= PUBLIC_URL ?>/images/lawana/lawana.png" alt="">
        <p>** Warkop Nganu **</p>
        <p>Jl. Nganu</p>

        <center>
            <h1><?= $data['no_antrian'] ?></h1>
        </center>

        <hr>

        <section>
            <table>
                <tr>
                    <td class="col-1 left">Kode Transaksi</td>
                    <td class="right"><?= $data['kode_transaksi'] ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td class="left">Waktu</td>
                    <td class="col-1 right"><?= $data['tanggal_penjualan'] ?></td>
                </tr>
                <tr>
                    <td class="left">Kasir</td>
                    <td class="col-1 right"><?= $data['pegawai']['nama_pegawai'] ?></td>
                </tr>
            </table>
        </section>

        <hr>


        <section>
            <table>
                <tr>
                    <th class="col-1 left"><u>Barang</u></th>
                    <th class="mid"><u>Harga</u></th>
                    <th class="right"><u>Total</u></th>
                </tr>
            </table>
            <table>
                <?php foreach ($data['barang'] as $barang) : ?>
                    <tr>
                        <td class="col-1 left"><?= $barang['nama_produk'] ?> (<?= $barang['jumlah_barang'] ?>x)</td>
                        <td class="mid"><?= $barang['harga_produk'] ?></td>
                        <td class="right"><?= $barang['jumlah_harga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <hr>


        <section>
            <table>
                <tr>
                    <td class="left">TOTAL</td>
                    <td class="col-1 right">Rp. <?= rupiah($data['total_harga']) ?></td>
                </tr>
            </table>
        </section>

        <br>

        <section>
            <table>
                <tr>
                    <td class="left">Bayar</td>
                    <td class="col-1 right">Rp. <?= rupiah($data['bayar']) ?></td>
                </tr>
                <tr>
                    <td class="left">Kembali</td>
                    <td class="col-1 right">Rp. <?= rupiah($data['bayar'] - $data['total_harga']) ?></td>
                </tr>
            </table>
        </section>

        <br>
        <br>

        <center style="margin-top: 30px;">
            -- Terima kasih --
        </center>

    </div>

</body>

</html>