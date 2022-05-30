<?php
$total_keranjang = 0;
foreach ($data['keranjang'] as $k) {
    $total_keranjang += $k;
}
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark px-5 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Warkop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($data['title'] == 'Pesan') ? 'active' : '' ?>" aria-current="page" href="<?= URL ?>/dashboard">Pesan</a>
                </li>
                <li class="nav-item" id="keranjang_nav">
                    <a class="nav-link  position-relative <?= ($data['title'] == 'Keranjang') ? 'active' : '' ?>" href="<?= URL ?>/dashboard/keranjang">
                        Keranjang
                        <?php if ($total_keranjang > 0) : ?>
                            <span class="position-absolute top-50 ms-2 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $total_keranjang ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
            <span class="navbar-text dropdown py-0">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Selamat Datang, <?= $data['nama_pelanggan'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-dark" href="<?= URL ?>/akhiri-pesan">Keluar</a></li>
                </ul>
            </span>
        </div>
    </div>
</nav>