<?php
need('partials.main_header');
?>
<title>Admin | Warkop</title>
<link href="<?= PUBLIC_URL ?>/assets/css/admin.styles.css" rel="stylesheet" />


<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-midnight text-white fw-bold">Admin Site</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-<?= ($data['action'] == 'dashboard') ? 'primary' : 'light' ?> p-3" href="<?= URL ?>/admin/dashboard?action=dashboard">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-<?= ($data['action'] == 'transaksi') ? 'primary' : 'light' ?> p-3" href="<?= URL ?>/admin/dashboard?action=transaksi">Transaksi</a>
            <a class="list-group-item list-group-item-action list-group-item-<?= ($data['action'] == 'management-warkop') ? 'primary' : 'light' ?> p-3" href="<?= URL ?>/admin/dashboard?action=management-warkop">Management Warkop</a>
            <a class="list-group-item list-group-item-action list-group-item-<?= ($data['action'] == 'management-supply') ? 'primary' : 'light' ?> p-3" href="<?= URL ?>/admin/dashboard?action=management-supply">Supply</a>
            <a class="list-group-item list-group-item-action list-group-item-<?= ($data['action'] == 'management-pegawai') ? 'primary' : 'light' ?> p-3" href="<?= URL ?>/admin/dashboard?action=management-pegawai">Pegawai</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-sm navbar-dark bg-midnight border-bottom">
            <div class="container-fluid">
                <a href="#" class="text-decoration-none text-white" id="sidebarToggle"><i class="ms-2 bi bi-menu-button" style="font-size: 25px;"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>/admin/logout">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <?php if ($data['action'] == 'dashboard') : ?>
            <?php need('admin.layouts.dashboard', $data) ?>
        <?php elseif($data['action'] == 'transaksi'): ?>
            <?php need('admin.layouts.transaksi', $data) ?>
        <?php elseif($data['action'] == 'management-warkop'): ?>
            <?php need('admin.layouts.m-warkop', $data) ?>
        <?php elseif($data['action'] == 'management-supply'): ?>
            <?php need('admin.layouts.m-supply', $data) ?>
        <?php elseif($data['action'] == 'management-pegawai'): ?>
            <?php need('admin.layouts.m-pegawai', $data) ?>
        <?php endif; ?>


    </div>
</div>

<script src="<?= PUBLIC_URL ?>/assets/js/admin.scripts.js"></script>
<?php need('partials.main_footer') ?>