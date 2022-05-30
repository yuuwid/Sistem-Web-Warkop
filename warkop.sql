create table app
(
	antrian int null
);

create table jabatan
(
	id_jabatan int auto_increment
		primary key,
	jenis_jabatan varchar(12) not null
);

create table kategori
(
	id_kategori int auto_increment
		primary key,
	jenis_kategori varchar(15) not null
);

create table merk
(
	id_merk int auto_increment
		primary key,
	nama_merk varchar(30) not null
);

create table pegawai
(
	id_pegawai int auto_increment
		primary key,
	id_jabatan int not null,
	nama_pegawai varchar(100) not null,
	nik char(6) not null,
	notelp_pegawai varchar(15) default '-' null,
	constraint FK_ID_JABATAN
		foreign key (id_jabatan) references jabatan (id_jabatan)
);

create table pelanggan
(
	id_pelanggan int auto_increment
		primary key,
	nama_pelanggan varchar(100) not null
);

create table penjualan
(
	id_penjualan int auto_increment
		primary key,
	id_pelanggan int null,
	id_pegawai int null,
	no_antrian int null,
	total_harga int not null,
	bayar int null,
	status enum('dibuat', 'diproses', 'selesai', 'dibatalkan') default 'dibuat' not null,
	tanggal_penjualan datetime default current_timestamp() null,
	tanggal_proses datetime null,
	tanggal_selesai datetime null,
	constraint FK_ID_PEGAWAI2
		foreign key (id_pegawai) references pegawai (id_pegawai),
	constraint FK_ID_PELANGGAN
		foreign key (id_pelanggan) references pelanggan (id_pelanggan)
);

create table produk
(
	id_produk int auto_increment
		primary key,
	id_merk int null,
	id_kategori int null,
	nama_produk varchar(50) not null,
	stok_produk int default 0 null,
	harga_produk int default 0 null,
	gambar_produk text default 'no_image.jpg' null,
	keterangan_produk varchar(250) null,
	constraint FK_ID_KATEGORI
		foreign key (id_kategori) references kategori (id_kategori),
	constraint FK_ID_MERK
		foreign key (id_merk) references merk (id_merk)
);

create table detail_penjualan
(
	id_produk int not null,
	id_penjualan int not null,
	jumlah_barang int not null,
	jumlah_harga int not null,
	constraint FK_ID_PENJUALAN
		foreign key (id_penjualan) references penjualan (id_penjualan),
	constraint FK_ID_PRODUK2
		foreign key (id_produk) references produk (id_produk)
);

create table supplier
(
	id_supplier int auto_increment
		primary key,
	nama_supplier varchar(50) not null,
	alamat_supplier varchar(250) not null,
	notelp_supplier varchar(15) not null
);

create table pembelian
(
	id_pembelian int auto_increment
		primary key,
	id_supplier int not null,
	id_produk int not null,
	id_pegawai int null,
	jumlah_pembelian int not null,
	harga_beli int not null,
	status char default '0' null,
	tanggal_pembelian datetime default current_timestamp() null,
	constraint FK_ID_PEGAWAI
		foreign key (id_pegawai) references pegawai (id_pegawai),
	constraint FK_ID_PRODUK
		foreign key (id_produk) references produk (id_produk),
	constraint FK_ID_SUPPLIER
		foreign key (id_supplier) references supplier (id_supplier)
);


INSERT INTO warkop.jabatan (jenis_jabatan) VALUES ('Admin');

INSERT INTO pegawai (id_jabatan, nama_pegawai, nik, notelp_pegawai) VALUES (1, 'Admin', '123456', '081234567890');