-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for warkop
CREATE DATABASE IF NOT EXISTS `warkop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `warkop`;

-- Dumping structure for table warkop.app
CREATE TABLE IF NOT EXISTS `app` (
  `antrian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table warkop.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_jabatan` varchar(12) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table warkop.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kategori` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table warkop.merk
CREATE TABLE IF NOT EXISTS `merk` (
  `id_merk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(30) NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table warkop.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `nik` char(6) NOT NULL,
  `notelp_pegawai` varchar(15) DEFAULT '-',
  PRIMARY KEY (`id_pegawai`),
  KEY `FK_ID_JABATAN` (`id_jabatan`),
  CONSTRAINT `FK_ID_JABATAN` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table warkop.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.


-- Dumping structure for table warkop.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `bayar` int(11) DEFAULT NULL,
  `status` enum('dibuat','diproses','selesai','dibatalkan') NOT NULL DEFAULT 'dibuat',
  `tanggal_penjualan` datetime DEFAULT current_timestamp(),
  `tanggal_proses` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `FK_ID_PELANGGAN` (`id_pelanggan`),
  KEY `FK_ID_PEGAWAI2` (`id_pegawai`),
  CONSTRAINT `FK_ID_PEGAWAI2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  CONSTRAINT `FK_ID_PELANGGAN` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table warkop.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_merk` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok_produk` int(11) DEFAULT 0,
  `harga_produk` int(11) DEFAULT 0,
  `gambar_produk` text DEFAULT 'no_image.jpg',
  `keterangan_produk` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `FK_ID_MERK` (`id_merk`),
  KEY `FK_ID_KATEGORI` (`id_kategori`),
  CONSTRAINT `FK_ID_KATEGORI` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `FK_ID_MERK` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.


-- Dumping structure for table warkop.detail_penjualan
CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_produk` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  KEY `FK_ID_PRODUK2` (`id_produk`),
  KEY `FK_ID_PENJUALAN` (`id_penjualan`),
  CONSTRAINT `FK_ID_PENJUALAN` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  CONSTRAINT `FK_ID_PRODUK2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.
-- Dumping structure for table warkop.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(250) NOT NULL,
  `notelp_supplier` varchar(15) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.


-- Dumping structure for table warkop.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `status` char(1) DEFAULT '0',
  `tanggal_pembelian` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pembelian`),
  KEY `FK_ID_SUPPLIER` (`id_supplier`),
  KEY `FK_ID_PRODUK` (`id_produk`),
  KEY `FK_ID_PEGAWAI` (`id_pegawai`),
  CONSTRAINT `FK_ID_PEGAWAI` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  CONSTRAINT `FK_ID_PRODUK` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  CONSTRAINT `FK_ID_SUPPLIER` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
