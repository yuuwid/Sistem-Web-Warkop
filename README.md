## Sistem Warkop (Self Service)
Project ini digunakan untuk memenuhi Tugas Akhir dari Praktikum Basis Data 2022.

Sistem Web Warkop ini dikembangkan di dalam Kerangka Kerja Aplikasi (_Framework_) [**Lawana Framework**](https://github.com/yuuwid/Lawana)

## Konfigurasi
1. Buat Database dengan nama warkop
2. Lakukan Import file database yang ada di **App/Models/db/warkop.sql**
3. Kemudian Import kembali file **App/Models/db/backup.sql**
4. Dan yang terakhir import file **App/Models/db/update.sql**
3. Masuk ke bagian `App/env.lawana`, edit bagian konfigurasi Database
    ```
    DB_TYPE = "mysql"
    DB_HOST = "localhost"
    DB_PORT = "3306"
    DB_USER = "root"
    DB_PASS = ""
    DB_NAME = "warkop"
    ```
4. `APP_TOKEN` biarkan kosong, karena nanti akan diisikan secara otomatis oleh sistem framework
5. Database yang disediakan hanya akan berisi 1 data Admin saja, data-data lainnya dapat masuk ke halaman admin.
6. Halaman admin ada di url `warkop/admin`.
7. Lakukan login kedalam halaman admin dengan <br> No Telp : 081234567890 <br> NIK : 123456





## Fitur
- **_Self Service_**, untuk pelanggan yang ingin memesan secara mandiri
- **Kasir**, untuk menerima pesanan dari sistem _self-service_
- **Staff Gudang**, untuk mengelola persedian stok dari warkop
- **Admin**, untuk memanajemen warkop


## Framework Support
<img src="https://github.com/yuuwid/Lawana/blob/master/Public/images/lawana/lawana.png?raw=true" width="30%">
