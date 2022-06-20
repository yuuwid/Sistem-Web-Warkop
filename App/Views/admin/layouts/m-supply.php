<div class="container my-4">

    <div class="col-6 ms-auto">
        <div class="input-group mb-3">
            <button class="btn btn-secondary" type="button" id="button-addon2" disabled><i class="bi bi-search"></i></button>
            <input type="text" class="form-control" placeholder="Cari Pembelian">
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3" id="data-supply">
        <?php foreach ($data['pembelian'] as $pembelian) : ?>
            <div class="col mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        <?php if ($pembelian['status'] == 0) : ?>
                            <b class="text-danger">Baru !</b>
                        <?php else : ?>
                            <span class="text-primary">Selesai</span>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <p class="my-0"><small><?= \Models\KodePembelian::create($pembelian) ?></small></p>
                        <h5 class="card-title my-0"><?= $pembelian['nama_supplier'] ?></h5>
                        <p class="my-0"><small><?= $pembelian['alamat_supplier'] ?></small></p>
                        <p class=""><small><?= $pembelian['notelp_supplier'] ?></small></p>
                        <p class="card-text"><b><?= $pembelian['nama_produk'] ?></b></p>
                        <p>
                            <span class="badge rounded-pill bg-primary">Rp. <?= rupiah($pembelian['harga_beli']) ?></span>
                            <span class="badge rounded-pill bg-danger"><?= $pembelian['jumlah_pembelian'] ?>x</span>
                        </p>
                        <p class="my-0"><b><small>Staff Gudang</small></b></p>
                        <p class="my-0"><?= $pembelian['nama_pegawai'] ?></p>
                    </div>
                    <div class="col mb-3">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-info infoPembelian" data-bs-toggle="modal" data-bs-target="#infoPembelian" title="Info" data-id-pembelian="<?= $pembelian['id_pembelian'] ?>"><i class="bi bi-info-lg"></i></button>

                            <?php if ($pembelian['status'] == 0) : ?>
                                <button type="button" class="btn btn-outline-success" title="Verifikasi" onclick="verifikasi(<?= $pembelian['id_pembelian'] ?>)" data-bs-toggle="modal" data-bs-target="#feedbackModal"><i class="bi bi-check-lg"></i></button>
                            <?php else : ?>
                                <button type="button" class="btn btn-outline-warning" title="Cetak Struk"><i class="bi bi-file-earmark-break"></i></button>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <?= $pembelian['tanggal_pembelian'] ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="infoPembelian" tabindex="-1" aria-labelledby="infoPembelianLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoPembelianLabel">Informasi Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Kode Pembelian</div>
                            <div class="col" id="kode-pembelian-modal"></div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Nama Supplier</div>
                            <div class="col" id="nama-supplier-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Alamat Supplier</div>
                            <div class="col" id="alamat-supplier-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">No Telpon Supplier</div>
                            <div class="col" id="notelp-supplier-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">No Telpon Supplier</div>
                            <div class="col" id="notelp-supplier-modal"></div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Tanggal Pembelian</div>
                            <div class="col" id="tanggal-pembelian-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Status</div>
                            <div class="col" id="status-modal"></div>
                        </div>

                    </div>
                    <div class="col">
                        <hr class="d-block d-lg-none my-0">
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Produk</div>
                            <div class="col" id="produk-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Jumlah Beli</div>
                            <div class="col" id="jumlah-beli-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Harga Beli</div>
                            <div class="col" id="harga-beli-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Total Harga</div>
                            <div class="col" id="total-harga-modal"></div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">Staff Gudang</div>
                            <div class="col" id="staff-gudang-modal"></div>
                        </div>
                        <div class="row row-cols-2 mb-2">
                            <div class="col fw-bold">No Telpon</div>
                            <div class="col" id="notelp-staff-modal"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Feedback -->
<div class="modal fade" id="feedbackModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-coral fw-bold" id="feedbackModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-1" id="feedback-modal-icon"></p>
                <h3 id="pesan-feedback">Berhasil</h3>
                <h6 id="detail-feedback"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '.infoPembelian', function() {
        const id_pembelian = $(this).data('idPembelian');

        DataApi(id_pembelian, 'get', '', function(data) {
            const kodePembelian = document.querySelector('#kode-pembelian-modal');
            const namaSupplier = document.querySelector('#nama-supplier-modal');
            const alamatSupplier = document.querySelector('#alamat-supplier-modal');
            const notelpSupplier = document.querySelector('#notelp-supplier-modal');
            const tglPembelian = document.querySelector('#tanggal-pembelian-modal');
            const status = document.querySelector('#status-modal');

            const produk = document.querySelector('#produk-modal');
            const jumlahBeli = document.querySelector('#jumlah-beli-modal');
            const hargaBeli = document.querySelector('#harga-beli-modal');
            const totalHarga = document.querySelector('#total-harga-modal');
            const staffGudang = document.querySelector('#staff-gudang-modal');
            const notelpStaff = document.querySelector('#notelp-staff-modal');


            kodePembelian.textContent = data.kode_pembelian

            namaSupplier.textContent = data.nama_supplier
            alamatSupplier.textContent = data.alamat_supplier
            notelpSupplier.textContent = data.notelp_supplier
            tglPembelian.textContent = data.tanggal_pembelian


            if (data.status == 0) {
                status.innerHTML = '<b class="text-danger">Baru</b>'
            } else {
                status.innerHTML = '<span class="text-primary">Selesai</span>'
            }
            produk.textContent = data.nama_produk
            jumlahBeli.textContent = data.jumlah_pembelian
            hargaBeli.textContent = formatRupiah(data.harga_beli, 'Rp. ')
            totalHarga.textContent = formatRupiah(data.jumlah_pembelian * data.harga_beli, 'Rp. ')
            staffGudang.textContent = data.nama_pegawai
            notelpStaff.textContent = data.notelp_pegawai

        })
    })
</script>

<script>
    function verifikasi(id) {
        DataApi(id, 'update-status', {
            'status': 1
        }, function(response) {
            if (response == true) {
                document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-journal-check"></i>';

                document.querySelector('#pesan-feedback').textContent = 'Berhasil'
                document.querySelector('#detail-feedback').textContent = ''
            } else {
                document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-journal-x"></i>';
                document.querySelector('#pesan-feedback').textContent = 'Gagal'
                document.querySelector('#detail-feedback').textContent = 'Ada data yang tidak valid'
            }
            $('#data-supply').load(' #data-supply > *');
        })
    }
</script>

<script>
    function DataApi(id, method, data, callback) {
        var xhttp = new XMLHttpRequest();

        let url = "<?= URL ?>/pembelian/" + method;

        if (id != '') {
            url = url + "?id=" + id;
        }

        if (data != '') {
            for (const key in data) {
                let passed = data[key]
                if (passed.length == 0) {
                    passed = null
                }
                temp = '&' + key + '=' + passed
                url = url + temp;
            }
        }
        // console.log(url);

        xhttp.open("GET", url, true);
        xhttp.send();

        let response = null;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = JSON.parse(xhttp.responseText)['data'];

                if (response.length == 1) {
                    response = response[0];
                }

                if (callback) callback(response);
            }
        };
    }
</script>


<script>
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