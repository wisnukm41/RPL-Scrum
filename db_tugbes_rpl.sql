/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - db_tugbes_rpl
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

/*Data for the table `biodata_pegawai` */

insert  into `biodata_pegawai`(`id`,`nama`,`jenis_kelamin`,`kontak`,`foto`,`tgl_lahir`,`rekening`,`alamat`,`password`,`email`) values 
('001E','Fajar','L','08131278900',NULL,'1999-08-06','0922739743','Indramayu','himaru990','himouto@gmail.com'),
('002E','Anderson','L','089678889767',NULL,'2000-06-21','0774693872','Medan','Enrikson022','rick99@gmail.com'),
('003E','Rokhsan','L','082334543234',NULL,'1999-12-17','0775423523','Bandung','syabib838','syabib@gmail.com'),
('004E','Pahrul','L','088765564',NULL,'1999-09-04','0102897721','Garut','ruruka11','Riruka@gmail.com'),
('005E','Pakpahan','L','088775645',NULL,'2020-08-04','0822938323','Bandung','','');

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

/*Data for the table `detail_menu_dan_stok` */

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

/*Data for the table `detail_pembelian_stok` */

/*Table structure for table `detail_penggajian` */

DROP TABLE IF EXISTS `detail_penggajian`;

CREATE TABLE `detail_penggajian` (
  `id` varchar(255) NOT NULL,
  `id_karyawan` varchar(255) NOT NULL,
  `id_keuangan` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `denda` decimal(10,0) NOT NULL,
  `bonus` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`),
  KEY `id_keuangan` (`id_keuangan`),
  CONSTRAINT `detail_penggajian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penggajian_ibfk_2` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_penggajian` */

insert  into `detail_penggajian`(`id`,`id_karyawan`,`id_keuangan`,`jumlah`,`jenis`,`denda`,`bonus`) values 
('01G','01D','02K',2400000,'',0,0),
('02G','02D','02K',2400000,'',0,0),
('03G','03D','02K',2400000,'',0,0),
('04G','04D','02K',2400000,'',0,0);

/*Table structure for table `detail_penjualan` */

DROP TABLE IF EXISTS `detail_penjualan`;

CREATE TABLE `detail_penjualan` (
  `id` varchar(255) NOT NULL,
  `id_menu` varchar(255) NOT NULL,
  `id_pembeli` varchar(255) NOT NULL,
  `id_keuangan` varchar(255) NOT NULL,
  `jumlah_stok` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_menu` (`id_menu`),
  KEY `id_pembeli` (`id_pembeli`),
  KEY `id_keuangan` (`id_keuangan`),
  CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `struk_pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penjualan_ibfk_3` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_penjualan` */

insert  into `detail_penjualan`(`id`,`id_menu`,`id_pembeli`,`id_keuangan`,`jumlah_stok`) values 
('','M3','03T','02P',0),
('01W','M1','01T','01P',300),
('02W','M2','02T','01P',300),
('04W','M4','04T','03P',400),
('05W','M5','05T','03P',300);

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

/*Data for the table `karyawan` */

insert  into `karyawan`(`id`,`id_biodata`,`jabatan`) values 
('01D','001E','Koki'),
('02D','002E','Koki'),
('03D','003E','Pelayan'),
('04D','004E','Kasir'),
('05D','005E','Pelayan');

/*Table structure for table `keluhan` */

DROP TABLE IF EXISTS `keluhan`;

CREATE TABLE `keluhan` (
  `id` varchar(255) NOT NULL,
  `id_karyawan` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `keluhan` */

insert  into `keluhan`(`id`,`id_karyawan`,`tgl`,`deskripsi`) values 
('01K','01D','2020-01-20','Bahan bahan pembuatan sudah hampir habis'),
('02K','02D','2020-01-24','Alat alat mesamasak sudah usang minta pembaharuan'),
('03K','03D','2020-01-25','meminta agar manajer menambah pelayan'),
('04K','04D','2020-01-26','meminta libur tambahan'),
('05K','05D','2020-01-31','meminta cuti untuk beberapa hari');

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

/*Data for the table `keuangan` */

insert  into `keuangan`(`id`,`jenis`,`deskripsi`,`jumlah`,`tgl`) values 
('01K','out','Pengeluaran dari pembelian bahan untuk pembelian stok',5000000,'2020-01-22'),
('01P','in','Pemasukan dari penjualan Soto bandung dan soto bandung spesial selama bulan january',10750000,'2020-01-31'),
('02K','out','pengeluaran dari penggajian seluruh pegawai',12000000,'2020-01-31'),
('02P','in','Pemasukan dari hasil penjualan soto kudus asli selama bulan january',11250000,'2020-01-31'),
('03P','in','Pemasukan dari penjualan soto betawi sama soto ayam selama bulan january',15250000,'2020-01-31');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` varchar(255) NOT NULL,
  `nama_soto` varchar(255) NOT NULL,
  `harga_soto` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nama_soto`,`harga_soto`) values 
('M1','Soto Bandung',20000),
('M2','Soto Bandung Special',25000),
('M3','Soto Kudus Asli',15000),
('M4','Soto Ayam Surabaya',19000),
('M5','Soto Betawi',21000);

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

/*Data for the table `stok_bahan_baku` */

/*Table structure for table `struk_pembelian` */

DROP TABLE IF EXISTS `struk_pembelian`;

CREATE TABLE `struk_pembelian` (
  `id` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `struk_pembelian` */

insert  into `struk_pembelian`(`id`,`kontak`,`total_harga`) values 
('','',0),
('01T','089736889767',20000),
('02T','081334330111',25000),
('03T','087664887223',15000),
('04T','084558349445',21000),
('05T','081455698334',19000);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_supplier` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`nama`,`jenis_supplier`,`kontak`) values 
('01S','Supriyadi','Bahan-bahan makanan','089993343223'),
('02S','Nugraha','Rempah rempah','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
