<div class="container my-4">

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5" id="refresh-info">
        <div class="col">

            <div class="card border-primary mb-3 text-center mx-1" style="max-width: 13rem;">
                <div class="card-header">Stok</div>
                <div class="card-body text-primary">
                    <h1 class="card-title"><?= $data['stok'] ?></h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-warning mb-3 text-center mx-1" style="max-width: 13rem;">
                <div class="card-header">Produk</div>
                <div class="card-body text-warning">
                    <h1 class="card-title"><?= $data['produk'] ?></h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-danger mb-3 text-center mx-1" style="max-width: 13rem;">
                <div class="card-header">Merk</div>
                <div class="card-body text-danger">
                    <h1 class="card-title"><?= $data['merk'] ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <div class="row row-cols-2">
                <div class="col col-9">
                    <h5>Daftar Merk</h5>
                </div>
                <div class="col col-3 text-end">
                    <button type="button" class="btn btn-primary btn-sm my-1 open-Add" data-bs-toggle="modal" data-bs-target="#addItemModal" data-type="merk"><i class="bi bi-plus text-light"></i></button>
                </div>
            </div>
            <table class="table" id="table-merk">
                <tr>
                    <th>#</th>
                    <th>Merk</th>
                    <th scope="col" class="text-center"><i class="bi bi-list"></i></th>
                </tr>

            </table>
            <div class="text-end" id="refresh-paginate-merk">
                <div class="btn-group">
                    <?php $j = 1; ?>
                    <?php for ($i = 0; $i < $data['merk']; $i += 6) : ?>
                        <button type="button" class="btn btn-outline-primary" onclick="paginateMerk( <?= $i + 1 ?> )"><?= $j++ ?></button>
                    <?php endfor; ?>
                </div>
            </div>
            <hr class="d-block d-md-none">
        </div>
        <div class="col mt-3 mt-md-0">
            <div class="row row-cols-2">
                <div class="col col-9">
                    <h5>Daftar Kategori</h5>
                </div>
                <div class="col col-3 text-end">
                    <button type="button" class="btn btn-primary btn-sm my-1 open-Add" data-bs-toggle="modal" data-bs-target="#addItemModal" data-type="kategori"><i class="bi bi-plus text-light"></i></button>
                </div>
            </div>
            <table class="table" id="table-kategori">
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th scope="col" class="text-center"><i class="bi bi-list"></i></th>
                </tr>
            </table>
            <div class="text-end" id="refresh-paginate-kategori">
                <div class="btn-group">
                    <?php $j = 1; ?>
                    <?php for ($i = 0; $i < $data['kategori']; $i += 6) : ?>
                        <button type="button" class="btn btn-outline-primary" onclick="paginateKategori( <?= $i + 1 ?> )"><?= $j++ ?></button>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="mt-4 mt-md-0">
        <div class="col">
            <div class="row row-cols-2 justify-content-between">
                <div class="col col-auto align-self-center">
                    <h5>Daftar Produk</h5>
                </div>
                <div class="col col-auto text-end">
                    <div class="row row-cols-3 align-items-center mb-2 justify-content-end">
                        <div class="col col-auto">
                            <label for="inputKataKunci" class="col-form-label">Cari</label>
                        </div>
                        <div class="col col-auto">
                            <input type="text" id="inputKataKunci" class="form-control d-inline">
                        </div>
                        <div class="col col-auto">
                            <button type="button" class="btn btn-primary btn-sm my-1 open-Add" data-bs-target="#addProdukModal" data-bs-toggle="modal" data-type="produk"><i class="bi bi-plus text-light"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table" id="table-produk">
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Merk</th>
                    <th>Kategori</th>
                    <th scope="col" class="text-center"><i class="bi bi-list"></i></th>
                </tr>
            </table>
            <div class="text-end" id="refresh-paginate-produk">
                <div class="btn-group">
                    <?php $j = 1; ?>
                    <?php for ($i = 0; $i < $data['produk']; $i += 10) : ?>
                        <button type="button" class="btn btn-outline-primary" onclick="paginateProduk( <?= $i + 1 ?> )"><?= $j++ ?></button>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<section id="modal">


    <!-- Modal Edit Merk & Kategori -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-coral fw-bold" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold" id="nama-item-label"></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="edit-nama-item">
                            <button class="btn btn-outline-warning" type="button" id="button-reset-item-modal"><i class="bi bi-arrow-clockwise"></i></button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="button-edit-item-modal" data-bs-target="#feedbackModal" data-bs-toggle="modal" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Produk -->
    <div class="modal fade" id="editProdukModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-coral fw-bold" id="editProdukModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row row-cols-1 row-cols-lg-2 flex-md-row-reverse">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Preview Produk</label>
                                <div class="mb-3 text-center">
                                    <img src="<?= PUBLIC_URL ?>/images/no_image.jpg" id="prev-image" width="50%" height="50%" class="border">
                                </div>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile02" disabled>
                                </div>
                                <caption>Fitur upload belum tersedia</caption>
                            </div>
                            <div class="mb-3 row row-cols-1 row-cols-lg-2">
                                <div class="col">
                                    <label class="form-label fw-bold">Merk Produk</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select" id="select-merk-produk">

                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label fw-bold">Ketegori Produk</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select" id="select-kategori-produk">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Produk</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="edit-nama-produk">
                                    <button class="btn btn-outline-warning" type="button" id="button-reset-nama-produk-modal"><i class="bi bi-arrow-clockwise"></i></button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Stok Produk</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="edit-stok-produk">
                                    <button class="btn btn-outline-warning" type="button" id="button-reset-stok-produk-modal"><i class="bi bi-arrow-clockwise"></i></button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Harga Produk</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="edit-harga-produk">
                                    <button class="btn btn-outline-warning" type="button" id="button-reset-harga-produk-modal"><i class="bi bi-arrow-clockwise"></i></button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Keterangan Produk</label>
                                <button class="btn btn-outline-warning btn-sm" type="button" id="button-reset-keterangan-produk-modal"><i class="bi bi-arrow-clockwise"></i></button>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" id="edit-keterangan-produk" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="button-edit-produk" data-bs-target="#feedbackModal" data-bs-toggle="modal" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-coral fw-bold" id="deleteModalLabel">Yakin ingin menghapus item ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btn-delete-modal" data-bs-target="#feedbackModal" data-bs-toggle="modal" data-bs-dismiss="modal">Hapus</button>
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

    <!-- Modal Add Merk & Kategori -->
    <div class="modal fade" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-coral fw-bold" id="addItemModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold" id="nama-item-label-add"></label>
                        <input type="text" class="form-control" id="add-nama-item">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="button-add-item-modal" data-bs-target="#feedbackModal" data-bs-toggle="modal" data-bs-dismiss="modal">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Add Produk -->
    <div class="modal fade" id="addProdukModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-coral fw-bold" id="addProdukModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row row-cols-1 row-cols-lg-2 flex-md-row-reverse">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Preview Produk</label>
                                <div class="mb-3 text-center">
                                    <img src="<?= PUBLIC_URL ?>/images/no_image.jpg" id="prev-image" width="50%" height="50%" class="border">
                                </div>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile02" disabled>
                                </div>
                                <caption>Fitur upload belum tersedia</caption>
                            </div>
                            <div class="mb-3 row row-cols-1 row-cols-lg-2">
                                <div class="col">
                                    <label class="form-label fw-bold">Merk Produk</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select" id="select-merk-produk-add">
    
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label fw-bold">Ketegori Produk</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select" id="select-kategori-produk-add">
    
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Produk</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="add-nama-produk">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Stok Produk</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="add-stok-produk" value="0">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Harga Produk</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="add-harga-produk">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Keterangan Produk</label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" id="add-keterangan-produk" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="button-add-produk" data-bs-target="#feedbackModal" data-bs-toggle="modal" data-bs-dismiss="modal">Tambah</button>
                </div>
            </div>
        </div>
    </div>


</section>



<!-- script live search -->
<script>
    $(document).on("keyup", "#inputKataKunci", function() {
        const input = $('#inputKataKunci').val();
        paginateProduk(1, input);
    });
</script>

<!-- script pagination -->
<script>
    function paginateMerk(start) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(xhttp.responseText);

                setDataMerk(response['data'], start);
            }
        };
        xhttp.open("GET", "<?= URL ?>/merk/get-range?start=" + start + "&end=" + 6, true);
        xhttp.send();
    }

    function paginateKategori(start) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(xhttp.responseText);

                setDataKategori(response['data'], start);
            }
        };
        xhttp.open("GET", "<?= URL ?>/kategori/get-range?start=" + start + "&end=" + 6, true);
        xhttp.send();
    }

    function paginateProduk(start, search = '') {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(xhttp.responseText);

                setDataProduk(response['data'], start);
            }
        };
        xhttp.open("GET", "<?= URL ?>/produk/get-range?start=" + start + "&end=" + 10 + '&search=' + search, true);
        xhttp.send();
    }
</script>

<!-- script data table -->
<script>
    function setDataMerk(data, number) {
        const tableMerk = document.querySelector('#table-merk');

        const rowCount = tableMerk.rows.length;
        for (let i = 1; i < rowCount; i++) {
            tableMerk.deleteRow(1);
        }

        for (let index = 0; index < data.length; index++) {
            const row = tableMerk.insertRow(index + 1);

            const num = row.insertCell(0);
            const nama_merk = row.insertCell(1);
            const info = row.insertCell(2);

            num.innerHTML = number++;
            nama_merk.innerHTML = data[index]['nama_merk'];

            info.innerHTML = '<button type="button" class="btn btn-info btn-sm my-1 open-Edit" data-type="' + 'merk' + '" data-bs-toggle="modal" data-bs-target="#editModal" data-id-edit="' + data[index]['id_merk'] + '"><i class="bi bi-pen text-light"></i> </button> <button type="button" class="btn btn-danger btn-sm my-1 open-Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-type-delete="merk" data-id-delete="' + data[index]['id_merk'] + '"><i class="bi bi-x-lg text-light"></i> </button>';
            info.classList.add('text-center')

        }

    }

    function setDataKategori(data, number) {
        const tableKategori = document.querySelector('#table-kategori');

        const rowCount = tableKategori.rows.length;
        for (let i = 1; i < rowCount; i++) {
            tableKategori.deleteRow(1);
        }

        for (let index = 0; index < data.length; index++) {
            const row = tableKategori.insertRow(index + 1);

            const num = row.insertCell(0);
            const nama_kategori = row.insertCell(1);
            const info = row.insertCell(2);

            num.innerHTML = number++;
            nama_kategori.innerHTML = data[index]['jenis_kategori'];

            info.innerHTML = '<button type="button" class="btn btn-info btn-sm my-1 open-Edit" data-type="' + 'kategori' + '" data-bs-toggle="modal" data-bs-target="#editModal" data-id-edit="' + data[index]['id_kategori'] + '"><i class="bi bi-pen text-light"></i> </button> <button type="button" class="btn btn-danger btn-sm my-1 open-Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-type-delete="kategori" data-id-delete="' + data[index]['id_kategori'] + '"><i class="bi bi-x-lg text-light"></i> </button>';
            info.classList.add('text-center')
        }

    }

    function setDataProduk(data, number) {
        const tableProduk = document.querySelector('#table-produk');

        const rowCount = tableProduk.rows.length;
        for (let i = 1; i < rowCount; i++) {
            tableProduk.deleteRow(1);
        }

        for (let index = 0; index < data.length; index++) {
            const row = tableProduk.insertRow(index + 1);

            const num = row.insertCell(0);
            const nama_produk = row.insertCell(1);
            const stok_produk = row.insertCell(2);
            const harga_produk = row.insertCell(3);
            const merk_produk = row.insertCell(4);
            const kategori_produk = row.insertCell(5);
            const info = row.insertCell(6);

            num.innerHTML = number++;
            nama_produk.innerHTML = data[index]['nama_produk'];
            stok_produk.innerHTML = data[index]['stok_produk'];
            harga_produk.innerHTML = data[index]['harga_produk'];
            merk_produk.innerHTML = data[index]['nama_merk'];
            kategori_produk.innerHTML = data[index]['jenis_kategori'];

            info.innerHTML = '<button type="button" class="btn btn-info btn-sm my-1 open-Edit" data-type="' + 'produk' + '" data-bs-toggle="modal" data-bs-target="#editProdukModal" data-id-edit="' + data[index]['id_produk'] + '"><i class="bi bi-pen text-light"></i> </button> <button type="button" class="btn btn-danger btn-sm my-1 open-Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-type-delete="produk" data-id-delete="' + data[index]['id_produk'] + '"><i class="bi bi-x-lg text-light"></i> </button>';
            info.classList.add('text-center')
        }

    }
</script>

<!-- script reload section -->
<script>
    function reloadSection() {
        $('#refresh-info').load(' #refresh-info > *');
        $('#refresh-paginate-merk').load(' #refresh-paginate-merk > *');
        $('#refresh-paginate-kategori').load(' #refresh-paginate-kategori > *');
        $('#refresh-paginate-produk').load(' #refresh-paginate-produk > *');
    }
</script>

<!-- script delete item -->
<script>
    $(document).on('click', '.open-Delete', function() {
        const id_item_del = $(this).data('id-delete');
        const type_item_del = $(this).data('type-delete');

        switch (type_item_del) {
            case 'merk':
                DataApi(type_item_del, id_item_del, 'get', '', function(response) {
                    setModalDelete(response, type_item_del, id_item_del)
                })
                break;
            case 'kategori':
                DataApi(type_item_del, id_item_del, 'get', '', function(response) {
                    setModalDelete(response, type_item_del, id_item_del)
                })
                break;
            case 'produk':
                DataApi(type_item_del, id_item_del, 'get', '', function(response) {
                    setModalDelete(response, type_item_del, id_item_del)
                })
                break;
        }
    })

    function setModalDelete(data, type, id) {
        type = type[0].toUpperCase() + type.substring(1);

        if (type == 'Kategori') {
            option = 'jenis_';
        } else {
            option = 'nama_';
        }
        option = option + type.toLowerCase();

        const modal = document.querySelector('#deleteModal')
        const body = modal.querySelector('.modal-body')
        body.innerHTML = '<table class="table table-borderless mb-0"><tr><th>' + type + '</th><td>' + data[option] + '</td></tr></table>'
        document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-x"></i>';

        const btn_del = document.querySelector('#btn-delete-modal')
        btn_del.onclick = function() {
            DataApi(type.toLowerCase(), id, 'drop', '', function() {});
        }
    }
</script>

<!-- script add item -->
<script>
    $(document).on('click', '.open-Add', function() {
        const type_item = $(this).data('type');

        switch (type_item) {
            case 'merk':
                setModalItemAdd(type_item)
                break;
            case 'kategori':
                setModalItemAdd(type_item)
                break;
            case 'produk':
                setModalProdukAdd(type_item)
                break;
        }
    })

    function setModalItemAdd(type) {
        const modal_body = document.querySelector('#addItemModal .modal-body')
        const modal_footer = document.querySelector('#addItemModal .modal-footer')

        if (type == 'merk') {
            modal_body.querySelector('#nama-item-label-add').textContent = 'Nama Merk';
        } else {
            modal_body.querySelector('#nama-item-label-add').textContent = 'Jenis Kategori';
        }

        const inputItem = modal_body.querySelector('#add-nama-item');

        inputItem.value = '';

        const btn_simpan = modal_footer.querySelector('#button-add-item-modal');

        btn_simpan.onclick = function() {
            if (inputItem.value.length != 0) {
                let data;
                if (type == 'merk') {
                    data = {
                        'nama_merk': inputItem.value
                    }
                } else {
                    data = {
                        'jenis_kategori': inputItem.value
                    }
                }

                InsertDataApi(type, data, function() {});

                document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-check"></i>';

                document.querySelector('#pesan-feedback').textContent = 'Berhasil'
                document.querySelector('#detail-feedback').textContent = ''
            } else {

                document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-x"></i>';

                document.querySelector('#pesan-feedback').textContent = 'Gagal'
                document.querySelector('#detail-feedback').textContent = 'Nama ' + type[0].toUpperCase + type.substr(1) + ' tidak boleh Kosong'
            }
        }

    }

    function setModalProdukAdd(data, id) {
        const nama_produk_input = document.querySelector('#add-nama-produk');
        const stok_produk_input = document.querySelector('#add-stok-produk');
        const harga_produk_input = document.querySelector('#add-harga-produk');
        const keterangan_produk_input = document.querySelector('#add-keterangan-produk');

        nama_produk_input.value = ''
        stok_produk_input.value = 0
        harga_produk_input.value = ''
        keterangan_produk_input.value = ''

        const select_merk_produk = document.querySelector('#select-merk-produk-add');

        while (select_merk_produk.firstChild) {
            select_merk_produk.removeChild(select_merk_produk.firstChild);
        }

        data_merk = DataApi('merk', '', 'all', '', function(response) {
            const opt_select = document.createElement('option');
            opt_select.value = 0
            opt_select.innerHTML = 'Pilih Merk'
            opt_select.setAttribute('selected', true)
            select_merk_produk.appendChild(opt_select)

            for (const index in response) {
                const opt_select = document.createElement('option');
                opt_select.value = response[index]['id_merk']
                opt_select.innerHTML = response[index]['nama_merk']
                select_merk_produk.appendChild(opt_select)
            }
        })

        const select_kategori_produk = document.querySelector('#select-kategori-produk-add');

        while (select_kategori_produk.firstChild) {
            select_kategori_produk.removeChild(select_kategori_produk.firstChild);
        }

        data_kategori = DataApi('kategori', '', 'all', '', function(response) {
            const opt_select = document.createElement('option');
            opt_select.value = 0
            opt_select.innerHTML = 'Pilih Kategori'
            opt_select.setAttribute('selected', true)
            select_kategori_produk.appendChild(opt_select)

            for (const index in response) {
                const opt_select = document.createElement('option');
                opt_select.value = response[index]['id_kategori']
                opt_select.innerHTML = response[index]['jenis_kategori']
                select_kategori_produk.appendChild(opt_select)
            }
        })

        const btn_add = document.querySelector('#button-add-produk');


        btn_add.onclick = function() {
            const json = {
                'nama_produk': nama_produk_input.value.replace(' ', "\\s"),
                'stok_produk': stok_produk_input.value.replace(' ', "\\s"),
                'harga_produk': harga_produk_input.value.replace(' ', "\\s"),
                'keterangan_produk': keterangan_produk_input.value.replace(' ', "\\s"),
                'id_merk': select_merk_produk.value,
                'id_kategori': select_kategori_produk.value
            }

            if ((json['nama_produk'].length != 0) && (json['stok_produk'] != 0) && (json['harga_produk'].length != 0) && (json['id_merk'] != 0) && (json['id_kategori'] != 0)) {
                
                InsertDataApi('produk', json, function(){})

                document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-check"></i>';

                document.querySelector('#pesan-feedback').textContent = 'Berhasil'
                document.querySelector('#detail-feedback').textContent = ''
            } else {

                document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-x"></i>';
                document.querySelector('#pesan-feedback').textContent = 'Gagal'
                document.querySelector('#detail-feedback').textContent = 'Ada data yang tidak valid'
            }

        }

    }
</script>

<!-- script edit item -->
<script>
    $(document).on('click', '.open-Edit', function() {
        const id_item = $(this).data('id-edit');
        const type_item = $(this).data('type');

        eventClick(id_item, type_item)
    });

    function eventClick(id_item, type_item) {
        switch (type_item) {
            case 'merk':
                DataApi(type_item, id_item, 'get', '', function(response) {
                    setModalEdit(response, type_item, id_item)
                })
                break;
            case 'kategori':
                DataApi(type_item, id_item, 'get', '', function(response) {
                    setModalEdit(response, type_item, id_item)
                })
                break;
            case 'produk':
                DataApi(type_item, id_item, 'get', '', function(response) {
                    setModalEditProduk(response, id_item)
                })
                break;
        }
    }

    function setModalEdit(data, type, id) {
        let title = type[0].toUpperCase() + type.substring(1);
        let param = '';

        if (type == 'merk') {
            title = 'Nama ' + title;
            param = 'nama_merk'
        } else {
            title = 'Jenis ' + title;
            param = 'jenis_kategori'
        }

        const nama_item_label = document.querySelector('#nama-item-label');
        const edit_nama_item = document.querySelector('#edit-nama-item');
        const button_reset = document.querySelector('#button-reset-item-modal');
        const button_edit = document.querySelector('#button-edit-item-modal');
        document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-check"></i>';

        nama_item_label.innerHTML = title;
        edit_nama_item.value = data[param]

        const old_input = edit_nama_item.value

        button_reset.onclick = function() {
            edit_nama_item.value = old_input
        }

        button_edit.onclick = function() {
            let json;
            if (type == 'merk') {
                json = {
                    'nama_merk': edit_nama_item.value
                }
            } else {
                json = {
                    'jenis_kategori': edit_nama_item.value
                }
            }
            DataApi(type, id, 'update', json, function() {});
        }
    }

    function setModalEditProduk(data, id) {
        const nama_produk_input = document.querySelector('#edit-nama-produk');
        const stok_produk_input = document.querySelector('#edit-stok-produk');
        const harga_produk_input = document.querySelector('#edit-harga-produk');
        const keterangan_produk_input = document.querySelector('#edit-keterangan-produk');

        const select_merk_produk = document.querySelector('#select-merk-produk');

        while (select_merk_produk.firstChild) {
            select_merk_produk.removeChild(select_merk_produk.firstChild);
        }

        data_merk = DataApi('merk', '', 'all', '', function(response) {
            const opt_select = document.createElement('option');
            opt_select.value = data['id_merk']
            opt_select.innerHTML = data['nama_merk']
            opt_select.setAttribute('selected', true)
            select_merk_produk.appendChild(opt_select)

            for (const index in response) {
                if (response[index]['id_merk'] != data['id_merk']) {
                    const opt_select = document.createElement('option');
                    opt_select.value = response[index]['id_merk']
                    opt_select.innerHTML = response[index]['nama_merk']
                    select_merk_produk.appendChild(opt_select)
                }
            }
        })

        const select_kategori_produk = document.querySelector('#select-kategori-produk');

        while (select_kategori_produk.firstChild) {
            select_kategori_produk.removeChild(select_kategori_produk.firstChild);
        }

        data_kategori = DataApi('kategori', '', 'all', '', function(response) {
            const opt_select = document.createElement('option');
            opt_select.value = data['id_kategori']
            opt_select.innerHTML = data['jenis_kategori']
            opt_select.setAttribute('selected', true)
            select_kategori_produk.appendChild(opt_select)

            for (const index in response) {
                if (response[index]['id_kategori'] != data['id_kategori']) {
                    const opt_select = document.createElement('option');
                    opt_select.value = response[index]['id_kategori']
                    opt_select.innerHTML = response[index]['jenis_kategori']
                    select_kategori_produk.appendChild(opt_select)
                }
            }
        })

        nama_produk_input.value = data['nama_produk']
        stok_produk_input.value = data['stok_produk']
        harga_produk_input.value = 'Rp. ' + formatRupiah(data['harga_produk'])
        keterangan_produk_input.value = data['keterangan_produk']

        const old_nama_produk = nama_produk_input.value;
        const old_stok_produk = stok_produk_input.value;
        const old_harga_produk = harga_produk_input.value;
        const old_keterangan_produk = keterangan_produk_input.value;


        const btn_reset_nama_produk = document.querySelector('#button-reset-nama-produk-modal');
        const btn_reset_stok_produk = document.querySelector('#button-reset-stok-produk-modal');
        const btn_reset_harga_produk = document.querySelector('#button-reset-harga-produk-modal');
        const btn_reset_keterangan_produk = document.querySelector('#button-reset-keterangan-produk-modal');

        btn_reset_nama_produk.onclick = function() {
            nama_produk_input.value = old_nama_produk
        }
        btn_reset_stok_produk.onclick = function() {
            stok_produk_input.value = old_stok_produk
        }
        btn_reset_harga_produk.onclick = function() {
            harga_produk_input.value = 'Rp. ' + formatRupiah(old_harga_produk)
        }
        btn_reset_keterangan_produk.onclick = function() {
            keterangan_produk_input.value = old_keterangan_produk
        }

        const btn_edit = document.querySelector('#button-edit-produk');

        document.querySelector('#feedback-modal-icon').innerHTML = '<i class="bi bi-folder-check"></i>';

        btn_edit.onclick = function() {
            const json = {
                'nama_produk': nama_produk_input.value.replace(' ', "\\s"),
                'stok_produk': stok_produk_input.value.replace(' ', "\\s"),
                'harga_produk': harga_produk_input.value.replace(' ', "\\s"),
                'keterangan_produk': keterangan_produk_input.value.replace(' ', "\\s"),
                'id_merk': select_merk_produk.value,
                'id_kategori': select_kategori_produk.value
            }
            
            DataApi('produk', id, 'update', json, function() {});
        }

    }
</script>

<!-- script data with api -->
<script>
    function DataApi(type, id, method, data, callback) {
        var xhttp = new XMLHttpRequest();

        let url = "<?= URL ?>/" + type + "/" + method + "?id=" + id;

        if (data != '') {
            for (const key in data) {
                let passed = data[key]
                if (passed.length == 0) {
                    passed = null
                }
                temp = '&' + key + '=' + passed
                url = url + temp;
                // console.log(url);
            }
        }

        xhttp.open("GET", url, true);
        xhttp.send();

        let response = null;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = JSON.parse(xhttp.responseText)['data'];

                if (response.length == 1) {
                    response = response[0];
                }

                if (method == 'drop' || method == 'update') {
                    paginateMerk(1)
                    paginateKategori(1)
                    paginateProduk(1)
                    reloadSection()
                }

                if (callback) callback(response);
            }
        };
    }

    function InsertDataApi(type, data, callback) {
        var xhttp = new XMLHttpRequest();

        let url = "<?= URL ?>/" + type + "/store?method=store";

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
                paginateMerk(1)
                paginateKategori(1)
                paginateProduk(1)
                reloadSection()

                if (callback) callback(response);
            }
        };
    }
</script>

<!-- script format -->
<script type="text/javascript">
    var rupiah = document.getElementById('edit-harga-produk');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    var rupiah_add = document.getElementById('add-harga-produk');
    rupiah_add.addEventListener('keyup', function(e) {
        rupiah_add.value = formatRupiah(this.value, 'Rp. ');
    });

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

<!-- script init -->
<script>
    paginateMerk(1);
    paginateKategori(1);
    paginateProduk(1);
</script>