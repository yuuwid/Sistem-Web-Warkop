<?php need('partials.main_header') ?>
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



</div>

<?php need('partials.main_footer') ?>
