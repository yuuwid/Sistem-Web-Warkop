<div class="container my-4">


    <div class="row row-cols-1 row-cols-md-2">
        <div class="col col-12 col-md-8">
            <div class="col-auto col-lg-5 ms-auto">
                <div class="input-group mb-3">
                    <label class="form-control ">Tambah Pegawai</label>
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalPegawai" onclick="tambah()"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-xl-2" id="data-pegawai">
                <?php foreach ($data['pegawai'] as $pegawai) : ?>
                    <div class="col mb-3">
                        <div class="card">
                            <h5 class="card-header"><?= $pegawai['jenis_jabatan'] ?></h5>
                            <div class="card-body">
                                <h5 class="card-title"><?= $pegawai['nama_pegawai'] ?></h5>
                                <div class="row row-cols-2">
                                    <section class="col col-4">
                                        <b>NIK</b>
                                    </section>
                                    <section class="col">
                                        <?= $pegawai['nik'] ?>
                                    </section>
                                </div>
                                <div class="row row-cols-2">
                                    <section class="col col-4">
                                        <b>No Telp</b>
                                    </section>
                                    <section class="col">
                                        <?= $pegawai['notelp_pegawai'] ?>
                                    </section>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 me-3">
                                <button class="btn btn-info me-md-2 text-white" type="button" onclick="edit(<?= $pegawai['id_pegawai'] ?>)" data-bs-toggle="modal" data-bs-target="#modalPegawai"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalVerifHapus" onclick="verifHapus(<?= $pegawai['id_pegawai'] ?>)"><i class="bi bi-x-lg"></i> Hapus</button>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="col col-12 col-md-4">
            <div class="col-auto ms-auto">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="jabatanInput" placeholder="Masukan Jenis Jabatan Baru ...">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#feedbackModal" onclick="tambahJabatan()"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>
            <div class="" id="data-jabatan">
                <?php foreach ($data['jabatan'] as $jabatan) : ?>
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-0"><i class="bi bi-person-badge me-2"></i> <?= $jabatan['jenis_jabatan'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>


<!-- Modal Pegawai -->
<div class="modal fade" id="modalPegawai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPegawaiLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <div class="mb-3">
                            <label for="namaInput" class="form-label fw-bold">Nama Pegawai</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="namaInput">
                                <button class="btn btn-outline-warning" type="button" id="reset-nama"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nikInput" class="form-label fw-bold">NIP pegawai</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="nikInput" maxlength="6">
                                <button class="btn btn-outline-warning" type="button" id="reset-nik"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                            <div id="emailHelp" class="form-text">Nomor Induk Karyawan.</div>

                        </div>
                        <div class="mb-3">
                            <label for="notelpInput" class="form-label fw-bold">No Telepon Pegawai</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control" id="notelpInput">
                                <button class="btn btn-outline-warning" type="button" id="reset-notelp"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamatInput" class="form-label fw-bold">Alamat Pegawai</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control" id="alamatInput">
                                <button class="btn btn-outline-warning" type="button" id="reset-alamat"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Jabatan</label>
                            <select class="form-select" id="jabatanSelect">

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-simpan" id="btn-simpan" data-bs-target="#feedbackModal" data-bs-toggle="modal" data-bs-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="modalVerifHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalVerifHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVerifHapusLabel">Verifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-modal" onclick="hapus()" data-bs-dismiss="modal">Hapus</button>
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
    function tambahJabatan() {
        const jabatanInput = document.querySelector('#jabatanInput');

        const data = {
            'jenis_jabatan': jabatanInput.value,
        }

        if (jabatanInput.value.length != 0) {
            document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-check"></i>';

            document.querySelector('#pesan-feedback').textContent = 'Berhasil'
            document.querySelector('#detail-feedback').textContent = ''

            DataApiJabatan('0', 'insert', data, function() {})

            $('#data-jabatan').load(' #data-jabatan > *')
            jabatanInput.value = '';
        } else {
            document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-x"></i>';
            document.querySelector('#pesan-feedback').textContent = 'Gagal'
            document.querySelector('#detail-feedback').textContent = 'Data tidak boleh kosong'
        }



    }
</script>

<script>
    function edit(id_pegawai) {
        DataApi(id_pegawai, 'get', '', function(response) {
            const label = document.querySelector('#modalPegawaiLabel')

            label.textContent = "Edit Data Pegawai"

            const namaInput = document.querySelector('#namaInput')
            const nikInput = document.querySelector('#nikInput')
            const notelpInput = document.querySelector('#notelpInput')
            const alamatInput = document.querySelector('#alamatInput')

            namaInput.value = response['nama_pegawai']
            nikInput.value = response['nik']
            notelpInput.value = response['notelp_pegawai']
            alamatInput.value = response['alamat_pegawai']

            const btn_reset_nama = document.querySelector('#reset-nama')
            const btn_reset_nik = document.querySelector('#reset-nik')
            const btn_reset_notelp = document.querySelector('#reset-notelp')
            const btn_reset_alamat = document.querySelector('#reset-alamat')

            btn_reset_nama.removeAttribute('hidden')
            btn_reset_nik.removeAttribute('hidden')
            btn_reset_notelp.removeAttribute('hidden')
            btn_reset_alamat.removeAttribute('hidden')

            btn_reset_nama.onclick = function() {
                namaInput.value = response['nama_pegawai']
            }
            btn_reset_nik.onclick = function() {
                nikInput.value = response['nik']
            }
            btn_reset_notelp.onclick = function() {
                notelpInput.value = response['notelp_pegawai']
            }
            btn_reset_notelp.onclick = function() {
                alamatInput.value = response['alamat_pegawai']
            }

            const jabatanSelect = document.querySelector('#jabatanSelect')


            while (jabatanSelect.firstChild) {
                jabatanSelect.removeChild(jabatanSelect.firstChild);
            }

            DataApi('', 'jabatan', '', function(jabatan) {
                const btn_simpan = document.querySelector('#btn-simpan')

                for (const index in jabatan) {
                    const opt_select = document.createElement('option');
                    opt_select.value = jabatan[index]['id_jabatan']
                    opt_select.innerHTML = jabatan[index]['jenis_jabatan']
                    if (jabatan[index]['id_jabatan'] == response['id_jabatan']) {
                        opt_select.setAttribute('selected', true)
                    }
                    jabatanSelect.appendChild(opt_select)
                }

                btn_simpan.onclick = function() {
                    const data = {
                        'id_jabatan': jabatanSelect.value,
                        'nama_pegawai': namaInput.value.replace(' ', "\\s"),
                        'nik': nikInput.value.replace(' ', "\\s"),
                        'notelp_pegawai': notelpInput.value.replace(' ', "\\s"),
                        'alamat_pegawai': alamatInput.value.replace(' ', "\\s")
                    }

                    if ((data['nama_pegawai'].length != 0) || (data['nik'].length != 0) || (data['notelp_pegawai'].length != 0)) {

                        document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-check"></i>';

                        document.querySelector('#pesan-feedback').textContent = 'Berhasil'
                        document.querySelector('#detail-feedback').textContent = ''
                        DataApi(response['id_pegawai'], 'update', data, function() {});

                        $('#data-pegawai').load(' #data-pegawai > *')
                    } else {
                        document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-x"></i>';
                        document.querySelector('#pesan-feedback').textContent = 'Gagal'
                        document.querySelector('#detail-feedback').textContent = 'Ada data yang tidak valid'

                    }
                }

            })


        })
    }

    function tambah() {
        const label = document.querySelector('#modalPegawaiLabel')

        label.textContent = "Buat Data Pegawai"


        const namaInput = document.querySelector('#namaInput')
        const nikInput = document.querySelector('#nikInput')
        const notelpInput = document.querySelector('#notelpInput')
        const alamatInput = document.querySelector('#alamatInput')

        namaInput.value = ""
        nikInput.value = ""
        notelpInput.value = ""
        alamatInput.value = ""

        const btn_reset_nama = document.querySelector('#reset-nama')
        const btn_reset_nik = document.querySelector('#reset-nik')
        const btn_reset_notelp = document.querySelector('#reset-notelp')
        const btn_reset_alamat = document.querySelector('#reset-alamat')

        btn_reset_nama.setAttribute('hidden', true)
        btn_reset_nik.setAttribute('hidden', true)
        btn_reset_notelp.setAttribute('hidden', true)
        btn_reset_alamat.setAttribute('hidden', true)

        while (jabatanSelect.firstChild) {
            jabatanSelect.removeChild(jabatanSelect.firstChild);
        }

        DataApi('', 'jabatan', '', function(jabatan) {
            const btn_simpan = document.querySelector('#btn-simpan')

            const opt_select = document.createElement('option');
            opt_select.value = 0
            opt_select.innerHTML = 'Pilih Jabatan'
            jabatanSelect.appendChild(opt_select)

            for (const index in jabatan) {
                const opt_select = document.createElement('option');
                opt_select.value = jabatan[index]['id_jabatan']
                opt_select.innerHTML = jabatan[index]['jenis_jabatan']
                jabatanSelect.appendChild(opt_select)
            }

            btn_simpan.onclick = function() {
                const data = {
                    'id_jabatan': jabatanSelect.value,
                    'nama_pegawai': namaInput.value.replace(' ', "\\s"),
                    'nik': nikInput.value.replace(' ', "\\s"),
                    'notelp_pegawai': notelpInput.value.replace(' ', "\\s"),
                    'alamat_pegawai': alamatInput.value.replace(' ', "\\s")
                }

                if ((data['nama_pegawai'].length != 0) || (data['nik'].length != 0) || (data['notelp_pegawai'].length != 0) || (data['id_jabatan'] != 0)) {
                    document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-check"></i>';

                    document.querySelector('#pesan-feedback').textContent = 'Berhasil'
                    document.querySelector('#detail-feedback').textContent = ''

                    DataApi('null', 'insert', data, function() {});

                    $('#data-pegawai').load(' #data-pegawai > *')

                } else {
                    document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-x"></i>';
                    document.querySelector('#pesan-feedback').textContent = 'Gagal'
                    document.querySelector('#detail-feedback').textContent = 'Ada data yang tidak valid'
                }
            }
        })

    }

    function verifHapus(id_pegawai) {
        document.querySelector('#btn-hapus-modal').setAttribute('data-id-pegawai-hapus', id_pegawai);
    }

    function hapus() {
        const id_pegawai = document.querySelector('#btn-hapus-modal').getAttribute('data-id-pegawai-hapus');

        DataApi(id_pegawai, 'drop', '', function(response) {
            if (response == true) {

                document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-trash"></i>';

                document.querySelector('#pesan-feedback').textContent = 'Berhasil dihapus'
                document.querySelector('#detail-feedback').textContent = ''

                $('#data-pegawai').load(' #data-pegawai > *')

            }
        })
    }
</script>


<script>
    function DataApi(id, method, data, callback) {
        var xhttp = new XMLHttpRequest();

        let url = "<?= URL ?>/pegawai/" + method;

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

    function DataApiJabatan(id, method, data, callback) {
        var xhttp = new XMLHttpRequest();

        let url = "<?= URL ?>/jabatan/" + method;

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
        console.log(url);

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