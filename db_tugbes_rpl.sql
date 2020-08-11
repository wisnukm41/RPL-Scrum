/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.10-MariaDB : Database - db_tugbes_rpl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_tugbes_rpl` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_tugbes_rpl`;

/*Table structure for table `biodata_pegawai` */

DROP TABLE IF EXISTS `biodata_pegawai`;

CREATE TABLE `biodata_pegawai` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `rekening` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `detail_menu_dan_stok` */

DROP TABLE IF EXISTS `detail_menu_dan_stok`;

CREATE TABLE `detail_menu_dan_stok` (
  `id` varchar(255) NOT NULL,
  `id_menu` varchar(255) NOT NULL,
  `id_stok` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_menu` (`id_menu`),
  KEY `id_stok` (`id_stok`),
  CONSTRAINT `detail_menu_dan_stok_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_menu_dan_stok_ibfk_2` FOREIGN KEY (`id_stok`) REFERENCES `stok_bahan_baku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `detail_pembelian_stok` */

DROP TABLE IF EXISTS `detail_pembelian_stok`;

CREATE TABLE `detail_pembelian_stok` (
  `id` varchar(255) NOT NULL,
  `id_supplier` varchar(255) NOT NULL,
  `id_stok` varchar(255) NOT NULL,
  `id_keuangan` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_supplier` (`id_supplier`),
  KEY `id_stok` (`id_stok`),
  KEY `id_keuangan` (`id_keuangan`),
  CONSTRAINT `detail_pembelian_stok_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pembelian_stok_ibfk_2` FOREIGN KEY (`id_stok`) REFERENCES `stok_bahan_baku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pembelian_stok_ibfk_3` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `detail_penggajian` */

DROP TABLE IF EXISTS `detail_penggajian`;

CREATE TABLE `detail_penggajian` (
  `id` varchar(255) NOT NULL,
  `id_karyawan` varchar(255) NOT NULL,
  `id_keuangan` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `denda` decimal(10,0) NOT NULL,
  `bonus` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`),
  KEY `id_keuangan` (`id_keuangan`),
  CONSTRAINT `detail_penggajian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penggajian_ibfk_2` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `detail_penjualan` */

DROP TABLE IF EXISTS `detail_penjualan`;

CREATE TABLE `detail_penjualan` (
  `id` varchar(255) NOT NULL,
  `id_menu` varchar(255) NOT NULL,
  `id_pembeli` varchar(255) NOT NULL,
  `id_keuangan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_menu` (`id_menu`),
  KEY `id_pembeli` (`id_pembeli`),
  KEY `id_keuangan` (`id_keuangan`),
  CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `struk_pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penjualan_ibfk_3` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` varchar(255) NOT NULL,
  `id_biodata` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_biodata` (`id_biodata`),
  CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_biodata`) REFERENCES `biodata_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `keluhan` */

DROP TABLE IF EXISTS `keluhan`;

CREATE TABLE `keluhan` (
  `id` varchar(255) NOT NULL,
  `id_karyawan` varchar(255) DEFAULT NULL,
  `tgl` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `keuangan` */

DROP TABLE IF EXISTS `keuangan`;

CREATE TABLE `keuangan` (
  `id` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `jumlah` int(3) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` varchar(255) NOT NULL,
  `nama_soto` varchar(255) NOT NULL,
  `harga_soto` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `stok_bahan_baku` */

DROP TABLE IF EXISTS `stok_bahan_baku`;

CREATE TABLE `stok_bahan_baku` (
  `id` varchar(255) NOT NULL,
  `nama_stok` varchar(255) NOT NULL,
  `jenis_stok` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `jumlah` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `struk_pembelian` */

DROP TABLE IF EXISTS `struk_pembelian`;

CREATE TABLE `struk_pembelian` (
  `id` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_supplier` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
