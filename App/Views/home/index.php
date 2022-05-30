<?php need('partials.main_header') ?>

<title>Welcome</title>
<style>
    
    body {
        background-image: url(" <?= PUBLIC_URL ?>/images/home/background.jpg");
        height: 913px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>

<div style="height: 800px;" class="d-flex align-items-center p-5 m-4">
    <div class="container text-center text-white" data-aos="fade-up">
        <h1>Selamat Datang</h1>

        <p class="mt-3">Sistem <i>Self-Service</i> Siap membantu anda.</p>

        <section class="container text-center mt-5 w-50">
            <form action="./mulai-pesan" method="POST">
                <div class="form-floating mb-3 text-dark">
                    <input name="nama-pelanggan" type="text" class="form-control" id="floatingInput" required>
                    <label for="floatingInput">Masukan Nama Anda untuk Memulai Memesan</label>
                </div>
                <button type="submit" class="btn btn-info text-white py-2 mt-3">Mulai Pesan <i class="bi bi-arrow-bar-right"></i></button>
            </form>

        </section>
    </div>

</div>

<?php need('partials.main_footer') ?>