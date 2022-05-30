<?php  ?>

<style>
    body {
        width: 55mm;
        height: 55mm;
        border: 1px solid black;
    }

    .content {
        margin: 10px;
        text-align: center;
    }

    img {
        width: 55%;
    }

    p {
        margin: 0px;
        font-size: 12px;
    }

    h1 {
        font-size: 50px;
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
        <h1><?= $data['no_antrian'] ?></h1>
    </div>

</body>

</html>