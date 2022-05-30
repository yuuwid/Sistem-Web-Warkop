## Sistem Warkop (Self Service)
Project ini digunakan untuk memenuhi Tugas Akhir dari Praktikum Basis Data 2022.

Sistem Web Warkop ini dikembangkan di dalam Kerangka Kerja Aplikasi (_Framework_) [**Lawana Framework**](https://github.com/yuuwid/Lawana)

## Konfigurasi
1. Buat Database dengan nama warkop
2. Lakukan Import file **warkop.sql**
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

## Fitur
- **_Self Service_**, untuk pelanggan yang ingin memesan secara mandiri
- **Kasir**, untuk menerima pesanan dari sistem _self-service_
- **Staff Gudang**, untuk mengelola persedian stok dari warkop
- **Admin**, untuk memanajemen warkop


## Framework Support
![Lawana](https://github.com/yuuwid/Lawana/blob/master/Public/images/lawana/lawana.png?raw=true | width=50)
