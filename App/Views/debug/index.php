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

    .col-2 {
        width: 60%;
    }

    .right {
        text-align: right;
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
        <p>Alamat</p>

        <center>
            <h1>0</h1>
        </center>

        <hr>

        <section>
            <table>
                <tr>
                    <td class="left">Waktu</td>
                    <td class="col-1 right">01/01/01 01:01:01</td>
                </tr>
                <tr>
                    <td class="left">Kasir</td>
                    <td class="col-1 right">Nama Kasir</td>
                </tr>
            </table>
        </section>

        <hr>


        <section>
            <table>
                <tr>
                    <td class="col-2 left">Lorem ipsum dolor sit amet.</td>
                    <td class="right">10000</td>
                </tr>
                <tr>
                    <td class="col-2 left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, hic.</td>
                    <td class="right">10000</td>
                </tr>
            </table>
        </section>

        <hr>


        <section>
            <table>
                <tr>
                    <td class="left">TOTAL</td>
                    <td class="col-1 right">10000</td>
                </tr>
            </table>
        </section>

        <br>

        <section>
            <table>
                <tr>
                    <td class="col-1 left">Bayar</td>
                    <td class="right">10000</td>
                </tr>
                <tr>
                    <td class="col-1 left">Kembali</td>
                    <td class="right">0</td>
                </tr>
            </table>
        </section>
        
        <br>
        <br>

        <center>-- Terima kasih --</center>

    </div>

</body>

</html>