<div class="container my-4">


    <div class="row row-cols-2">
        <section class="col">
            <h4>Transaksi</h4>
        </section>
        <section class="col text-end">
            <small>diperbarui <span id="waktu-refresh"></span></small>
        </section>
    </div>

    <div class="row g-2 align-items-center mb-2 justify-content-end">
        <div class="col-auto">
            <label for="inputKataKunci" class="col-form-label">Cari</label>
        </div>
        <div class="col-auto">
            <input type="text" id="inputKataKunci" class="form-control">
        </div>
    </div>

    <div id="transaksi-hari-ini">
        <table class="table table-hover" id="list-transaksi">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Kasir</th>
                    <th scope="col">Waktu</th>
                    <th scope="col" class="text-center"><i class="bi bi-list"></i></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="infoModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row row-cols-2 row-cols-sm-1 row-cols-lg-2">
                    <section class="col border-end">
                        <span hidden>id_penjualan</span>
                        <table class="table table-borderless">
                            <tr>
                                <td class="py-0">Kode transaksi</td>
                                <td class="py-0 text-end pe-2" id="modal-kode-transaksi">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">Nama Pelanggan</td>
                                <td class="py-0 text-end pe-2" id="modal-nama-pelanggan">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">No Antrian</td>
                                <td class="py-0 text-end pe-2" id="modal-no-antrian">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">Status</td>
                                <td class="py-0 text-end pe-2" id="modal-status">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">Tanggal Transaksi</td>
                                <td class="py-0 text-end pe-2" id="modal-tanggal-transaksi">Node</td>
                            </tr>
                        </table>

                        <hr>

                        <table class="table table-borderless">
                            <tr>
                                <td class="py-0">Tanggal Diproses</td>
                                <td class="py-0 text-end pe-2" id="modal-tanggal-proses">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">Nama Pegawai</td>
                                <td class="py-0 text-end pe-2" id="modal-nama-pegawai">Node</td>
                            </tr>
                        </table>

                        <hr>

                        <table class="table table-borderless">
                            <tr>
                                <td class="py-0">Tanggal Selesai</td>
                                <td class="py-0 text-end pe-2" id="modal-tanggal-selesai">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">Total Harga</td>
                                <td class="py-0 text-end pe-2" id="modal-total-harga">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">Bayar</td>
                                <td class="py-0 text-end pe-2" id="modal-bayar">Node</td>
                            </tr>
                            <tr>
                                <td class="py-0">Kembali</td>
                                <td class="py-0 text-end pe-2" id="modal-kembali">Node</td>
                            </tr>
                        </table>
                    </section>
                    <section class="col">
                        <table class="table table-borderless" id="modal-list-barang">
                            <tr class="border-bottom">
                                <th class="py-0">Nama Barang</th>
                                <th class="py-0 text-center pe-2">Harga</th>
                                <th class="py-0 text-center pe-2">Qty</th>
                                <th class="py-0 text-end pe-2">Total</th>
                            </tr>
                        </table>
                        <hr>
                    </section>
                </div>

                <div class="text-end" class="modal-btn">
                    <input name="id_penjualan" type="hidden" id="modal_id_penjualan">
                    <input name="id_pegawai" type="hidden" id="modal_id_pegawai">
                    <button type="button" class="btn btn-primary btn-sm my-1" id="modal-btn-struk" onclick="struk2()"><i class="bi bi-archive"></i> Struk Pembelian</button>
                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".open-Info", function() {
        const id_transaksi = $(this).data('id-transaksi');

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(xhttp.responseText);
                setDataModal(response['data']);
            }
        };
        xhttp.open("GET", "<?= URL ?>/transaksi/get-transaksi?id_penjualan=" + id_transaksi, true);
        xhttp.send();
    });

    $(document).ready(function() {
        setDataTransaksi();
    });
    $(document).on("keyup", "#inputKataKunci", function() {
        setDataTransaksi();
    });
</script>

<script>
    function setDataTransaksi() {
        const input = $('#inputKataKunci');
        const inputVal = input.val();

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(xhttp.responseText);
                const data = response['data'];

                const table = document.querySelector('#list-transaksi');

                const rowCount = table.rows.length;
                for (let i = 1; i < rowCount; i++) {
                    table.deleteRow(1);
                }

                for (let index = 0; index < data.length; index++) {
                    const row = table.insertRow(index + 1);

                    const number = row.insertCell(0);
                    const kode_transaksi = row.insertCell(1);
                    const status = row.insertCell(2);
                    const kasir = row.insertCell(3);
                    const waktu = row.insertCell(4);
                    const info = row.insertCell(5);

                    number.innerHTML = index + 1;
                    kode_transaksi.innerHTML = data[index]['kode_transaksi'];
                    status.innerHTML = data[index]['status'].toUpperCase();
                    kasir.innerHTML = data[index]['nama_pegawai'];
                    waktu.innerHTML = data[index]['tanggal_penjualan'];

                    let disabled = '';
                    if (data[index]['id_pegawai'] == null) {
                        disabled = 'disabled';
                    }

                    info.innerHTML = '<button type="button" class="btn btn-primary btn-sm my-1" id="btn-struk" onclick="struk( ' + data[index]['id_penjualan'] + ', ' + data[index]['id_pegawai'] + ' )" ' + disabled + '><i class="bi bi-archive"></i></button> <button type="button" class="btn btn-info btn-sm my-1 open-Info" data-bs-toggle="modal" data-bs-target="#infoModal" data-id-transaksi="' + data[index]['id_penjualan'] + '"><i class="bi bi-info-lg text-light"></i></button>';

                    info.classList.add('text-center')
                }
            }
        };
        xhttp.open("GET", "<?= URL ?>/transaksi/search-transaksi?search=" + inputVal, true);
        xhttp.send();
    }
</script>

<script>
    function setDataModal(data) {
        $('#modal-kode-transaksi').html(data['kode_transaksi']);
        $('#modal-nama-pelanggan').html(data['nama_pelanggan']);
        $('#modal-no-antrian').html(data['no_antrian']);
        $('#modal-status').html(data['status']);
        $('#modal-tanggal-transaksi').html(data['tanggal_penjualan']);


        $('#modal-tanggal-proses').html(data['tanggal_proses']);
        $('#modal-nama-pegawai').html(data['nama_pegawai']);


        $('#modal-tanggal-selesai').html(data['tanggal_selesai']);
        $('#modal-total-harga').html(formatRupiah(data['total_harga'], 'Rp. '));
        if (data['bayar'] != null) {
            $('#modal-bayar').html(formatRupiah(data['bayar'], 'Rp. '));
            $('#modal-kembali').html(formatRupiah((data['bayar'] - data['total_harga']), 'Rp. '));
        } else {
            $('#modal-bayar').html('-');
            $('#modal-kembali').html('-');
        }

        const list_barang = document.querySelector('#modal-list-barang');

        const rowCount = list_barang.rows.length;
        for (let i = 1; i < rowCount; i++) {
            list_barang.deleteRow(1);
        }

        const barang = data['barang'];

        for (let index = 0; index < barang.length; index++) {
            const row = list_barang.insertRow(index + 1);

            const nama_barang = row.insertCell(0);
            const harga_barang = row.insertCell(1);
            const qty = row.insertCell(2);
            const total_harga = row.insertCell(3);

            nama_barang.innerHTML = barang[index]['nama_produk'];
            harga_barang.innerHTML = formatRupiah(barang[index]['harga_produk'], 'Rp. ');
            qty.innerHTML = barang[index]['jumlah_barang'];
            total_harga.innerHTML = formatRupiah(barang[index]['jumlah_harga'], 'Rp. ');

            nama_barang.classList.add('py-0');
            harga_barang.classList.add('text-center');
            harga_barang.classList.add('py-0');
            qty.classList.add('text-center');
            qty.classList.add('py-0');
            total_harga.classList.add('text-end');
            total_harga.classList.add('py-0');
        }

        $("#modal_id_penjualan").val(data['id_penjualan']);
        $("#modal_id_pegawai").val(data['id_pegawai']);


        const btn_struk = $('#modal-btn-struk');

        if (data['id_pegawai'] != null) {
            btn_struk.removeAttr('disabled');
        } else {
            btn_struk.attr('disabled', 'disabled');
        }
    }
</script>

<script>
    $('#waktu-refresh').text(new Date().toLocaleTimeString());
    var timeout = setInterval(reloadSection, 10000);

    function reloadSection() {
        setDataTransaksi();

        $('#list-transaksi').load(' #list-transaksi > *');
        
        setDataTransaksi();
        
        $('#waktu-refresh').text(new Date().toLocaleTimeString());
    }

    function struk(id_penjualan, id_pegawai) {
        if (id_pegawai != undefined) {
            console.log('oke');
            const url = "<?= URL ?>/transaksi/cetak-struk?id_penjualan=" + id_penjualan + '&id_pegawai=' + id_pegawai;
            window.open(url, "_blank");
        }
    }

    function struk2() {
        const id_penjualan = $("#modal_id_penjualan").val();
        const id_pegawai = $("#modal_id_pegawai").val();
        struk(id_penjualan, id_pegawai);
    }
</script>