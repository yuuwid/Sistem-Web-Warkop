<?php

use Lawana\Message\Flasher;

need('partials.main_header') ?>

<title><?= $data['title'] ?></title>

<style>
    body {
        background-color: darkslateblue;
    }

    h2 {
        color: darkslateblue;
        font-weight: bold;
    }
</style>

<div class="container mt-5 p-5">

    <div class="card w-50 mx-auto p-4 shadow rounded rounded-3">
        <?= Flasher::show('login-gudang') ?>
        <h2 class="text-center mb-5">GUDANG</h2>

        <form method="POST" action="<?= URL ?>/gudang/login">
            <div class="mb-3">
                <label for="inputnotelp" class="form-label">No Telp</label>
                <input name="notelp" type="text" class="form-control" id="inputnotelp" required value="084655666453">
            </div>

            <div class="mb-3">
                <label for="inputNIK" class="form-label">NIK</label>
                <input name="nik" type="password" class="form-control" id="inputNIK" required value="796526">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>

<?php need('partials.main_footer') ?>