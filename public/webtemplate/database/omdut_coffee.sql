-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 10:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `omdut_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`) VALUES
('admin', 'admin', 'Admin', 'admin@gmail.com', '081234567890', 'admin'),
('hesti', 'hesti', 'Hesti Imel satulagi lupa', 'palsu@gmail.com', '081234567890', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `kodebank` char(5) NOT NULL,
  `namabank` varchar(40) NOT NULL,
  `namapemilikakun` varchar(30) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`kodebank`, `namabank`, `namapemilikakun`, `rekening`, `logo`) VALUES
('B0001', 'BRI', 'Omdut Coffee', '901234567890', 'logobank/B0001.jpg'),
('B0002', 'BCA', 'Omdut Coffee', '7870202089', 'logobank/B0002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cara_pesan`
--

CREATE TABLE IF NOT EXISTS `cara_pesan` (
  `id_cara` char(5) NOT NULL,
  `caranya` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cara_pesan`
--

INSERT INTO `cara_pesan` (`id_cara`, `caranya`) VALUES
('CP001', 'PHA+Y2FyYSBwZW1lc2FuYW4gcHJvZHVrIGRpIHRva28gT21kdXQgQ29mZmVlIDo8L3A+DQo8cD4xLiBMb2dpbiBUZXJsZWJpaCBEYWh1bHUuIEppa2EgYW5kYSBiZWx1bSBtZW1pbGlraSBha3VuLCBzaWxhaGthbiByZWdpc3RlcjwvcD4NCjxwPjIuIFBpbGloIFByb2R1ayB5YW5nIGthbXUgbWF1LCBkYW4ga2xpayB0YW1iYWgga2Uga2VyYW5qYW5nPC9wPg0KPHA+My4gaW5wdXRrYW4gZGF0YSBwZW5naXJpbWFuIGRlbmdhbiBiZW5hciwgbGFsdSBrbGlrIG5leHQ8L3A+DQo8cD40LiBTaWxhaGthbiBrb25maXJtYXNpIHBlbWJheWFyYW4gYWdhciBwZXNhbmFuIHNlZ2VyYSBkaWJ1YXQgZGFuIGRpYW50YXIga2FuIGF0YXUgZGlhbWJpbCBzZW5kaXJpIGtlIHRva288L3A+DQo8cD48c3Ryb25nPkhhcHB5IFNob3BpbmcgXl9ePC9zdHJvbmc+PC9wPg==');

-- --------------------------------------------------------

--
-- Table structure for table `detailpemesanan`
--

CREATE TABLE IF NOT EXISTS `detailpemesanan` (
`kddetail_pemesanan` float NOT NULL,
  `kodepemesanan` char(10) NOT NULL,
  `kodemember` char(10) NOT NULL,
  `kodeproduk` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` float NOT NULL,
  `ukuran` varchar(30) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `detailpemesanan`
--

INSERT INTO `detailpemesanan` (`kddetail_pemesanan`, `kodepemesanan`, `kodemember`, `kodeproduk`, `nama`, `jumlah`, `harga`, `ukuran`) VALUES
(87, 'P000000012', '', 'B000000058', 'One Shot', 1, 25000, '35ml'),
(85, 'P000000011', '', 'B000000066', 'Kentang Goreng', 1, 15000, '-'),
(86, 'P000000011', '', 'B000000071', 'Indomie Goreng', 2, 15000, '-');

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualanproduk`
--

CREATE TABLE IF NOT EXISTS `detailpenjualanproduk` (
`id` float NOT NULL,
  `kodepenjualan` varchar(10) NOT NULL,
  `kodeproduk` varchar(10) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `detailpenjualanproduk`
--

INSERT INTO `detailpenjualanproduk` (`id`, `kodepenjualan`, `kodeproduk`, `namaproduk`, `harga`, `jumlah`, `subtotal`) VALUES
(15, 'PN00000008', 'B000000065', 'Espresso Affogato', 37000, 5, 185000),
(14, 'PN00000007', 'B000000065', 'Espresso Affogato', 37000, 1, 37000),
(13, 'PN00000006', 'B000000062', 'Lungo', 36000, 2, 72000),
(16, 'PN00000009', 'B000000058', 'One Shot', 25000, 3, 75000),
(17, 'PN00000010', 'B000000059', 'Double Shot', 35000, 3, 105000);

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualanproduk_tmp`
--

CREATE TABLE IF NOT EXISTS `detailpenjualanproduk_tmp` (
  `kodeproduk` varchar(10) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `infotoko`
--

CREATE TABLE IF NOT EXISTS `infotoko` (
  `kodeinfo` char(5) NOT NULL,
  `info` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infotoko`
--

INSERT INTO `infotoko` (`kodeinfo`, `info`) VALUES
('PD001', 'PHA+T21kdXQgQ29mZmVlIE1heWFuZywgSmFtYmk8L3A+');

-- --------------------------------------------------------

--
-- Table structure for table `jasakirim`
--

CREATE TABLE IF NOT EXISTS `jasakirim` (
  `kodejp` char(10) NOT NULL,
  `namajp` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasakirim`
--

INSERT INTO `jasakirim` (`kodejp`, `namajp`, `logo`) VALUES
('JP0000001', 'JNE', 'JNE-Logo-big.png'),
('JP0000002', 'Tiki', 'logo tiki.png'),
('JP0000004', 'Go-Ojek', '638b26370a794db38dfef92fa2bfe60f.png'),
('JP0000005', 'Grab', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('K001', 'Espresso'),
('K002', 'Latte'),
('K003', 'Arabika'),
('K004', 'Robusta'),
('K005', 'Liberika'),
('K006', 'Snack'),
('K007', 'Milkshake'),
('K008', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
`kodekonfirmasi` float NOT NULL,
  `kodepemesanan` varchar(10) NOT NULL,
  `jumlahbayar` float NOT NULL,
  `norekening` varchar(30) NOT NULL,
  `melalui` varchar(50) NOT NULL,
  `tgltransfer` date NOT NULL,
  `fotobukti` varchar(250) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`kodekonfirmasi`, `kodepemesanan`, `jumlahbayar`, `norekening`, `melalui`, `tgltransfer`, `fotobukti`) VALUES
(40, 'P000000001', 194000, 'B0001', 'E-Banking Transfer', '2018-01-21', 'fotobukti/P000000001.png'),
(41, 'P000000002', 0, 'B0001', 'Transfer ATM', '0000-00-00', 'fotobukti/no_img.png'),
(42, 'P000000004', 0, 'B0001', 'E-Banking Transfer', '0000-00-00', 'fotobukti/no_img.png'),
(43, 'P000000003', 0, 'B0001', 'E-Banking Transfer', '0000-00-00', 'fotobukti/no_img.png'),
(44, 'P000000008', 0, 'B0001', 'Setor Tunai BanK', '0000-00-00', 'fotobukti/no_img.png'),
(45, 'P000000009', 0, 'B0001', 'Setor Tunai BanK', '0000-00-00', 'fotobukti/no_img.png'),
(46, 'P000000010', 0, 'B0001', 'E-Banking Transfer', '0000-00-00', 'fotobukti/no_img.png'),
(47, 'P000000011', 0, 'B0001', 'E-Banking Transfer', '0000-00-00', 'fotobukti/no_img.png');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `kodemember` char(10) NOT NULL,
  `namamember` varchar(50) NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `tempatlahir` varchar(30) NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(50) NOT NULL,
  `fotoprofil` varchar(50) NOT NULL,
  `tanggaldaftar` datetime NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kodemember`, `namamember`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `alamat`, `nohp`, `email`, `username`, `password`, `fotoprofil`, `tanggaldaftar`, `status`) VALUES
('M000000006', 'imel', 'Perempuan', 'Jambi', '1999-05-31', 'arizona', 'kepo', 'imelcantik@gmail.com', 'imel', 'imel', 'fotoprofil/no-photo.jpg', '2020-07-08 14:12:32', 'Aktif'),
('M000000005', 'adiet', 'Laki-Laki', 'jambi', '2020-07-10', 'jl pattimura', '08961267236', 'palsu@gmail.com', 'adt', '562ab9ed1e25505af0859695c28f2588', 'fotoprofil/no-photo.jpg', '2020-07-08 14:10:05', 'Aktif'),
('M000000003', 'pelanggan', 'Laki-Laki', 'Jambi', '2018-10-31', 'the hok', '081234567890', 'pelanggan1@gmai.com', 'pelanggan', 'pelanggan', 'fotoprofil/no-photo.jpg', '2018-11-04 19:00:33', 'Aktif'),
('M000000007', 'tata', 'Perempuan', 'Jambi', '1997-08-16', 'pasir putih', '0987654321', 'palsu@gmail.com', 'tata', '72446060a8ac34628d77aa1aad90d776', 'fotoprofil/no-photo.jpg', '2020-07-22 16:11:35', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nohp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`username`, `password`, `nama_lengkap`, `alamat`, `email`, `nohp`) VALUES
('pelanggan1', 'pelanggan1', 'Pelanggan 1', 'Alamat Pelanggan 1', 'pelanggan1@gmail.com', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `kodepemesanan` char(10) NOT NULL,
  `kodemember` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamatkirim` varchar(50) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `total` float NOT NULL,
  `Status` varchar(20) NOT NULL,
  `TanggalPemesanan` datetime NOT NULL,
  `kodewilayah` char(5) NOT NULL,
  `noresi` char(40) NOT NULL,
  `kodevoucher` char(10) NOT NULL,
  `potongan` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`kodepemesanan`, `kodemember`, `nama`, `alamatkirim`, `notelp`, `total`, `Status`, `TanggalPemesanan`, `kodewilayah`, `noresi`, `kodevoucher`, `potongan`) VALUES
('P000000012', 'M000000006', '', '', '', 0, 'Pemesanan Baru', '2020-07-31 02:39:55', '', '', '', 0),
('P000000011', 'M000000006', '', '', '', 0, 'Telah di Konfirmasi', '2020-07-30 19:38:19', '', '-', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE IF NOT EXISTS `pemesanan_detail` (
`no` int(10) NOT NULL,
  `kodepemesanan` char(10) NOT NULL,
  `kode_produk` char(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_temp`
--

CREATE TABLE IF NOT EXISTS `pemesanan_temp` (
  `kodemember` char(10) NOT NULL,
  `kode_produk` char(10) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `ukuran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualanproduk`
--

CREATE TABLE IF NOT EXISTS `penjualanproduk` (
  `kodepenjualan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualanproduk`
--

INSERT INTO `penjualanproduk` (`kodepenjualan`, `tanggal`) VALUES
('PN00000001', '2018-11-04'),
('PN00000002', '2018-11-04'),
('PN00000003', '2018-11-04'),
('PN00000004', '2018-11-04'),
('PN00000005', '2018-11-04'),
('PN00000006', '2020-07-08'),
('PN00000007', '2020-07-08'),
('PN00000008', '2020-07-22'),
('PN00000009', '2020-07-24'),
('PN00000010', '2020-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kode_produk` char(10) NOT NULL,
  `id_subkategori` char(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` float NOT NULL,
  `berat` float NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  `stok` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ukuran` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `id_subkategori`, `nama_barang`, `harga_barang`, `berat`, `deskripsi`, `foto1`, `foto2`, `foto3`, `stok`, `tanggal`, `ukuran`) VALUES
('B000000065', 'SK008', 'Espresso Affogato', 37000, 0.03, 'Caffè affogato adalah espresso yang dberi eskrim sebagai pengganti susu. Berarti tenggelam dalam bahasa Italia, lelehan eskrim pada affogato memang seperti ditenggelamkan oleh hangatnya espresso.', 'fotoproduk/B0000000651.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 24, '2020-07-05 18:48:12', '60ml'),
('B000000063', 'SK006', 'Long Black', 36000, 0.03, 'Americano adalah double shot espresso yang dicampur air panas dengan perbandingan 1:3 – 1:4.', 'fotoproduk/B0000000631.jpeg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 24, '2020-07-05 18:39:50', '60ml'),
('B000000064', 'SK007', 'Espresso Macchiato', 35000, 0.03, 'Cafè macchiato terbuat dari espresso (single atau double shot) yang diberi topping sedikit buih dari steamed milk. Kata macchiato sendiri berarti marked yang maknanya “menodai” hitamnya espresso dengan putihnya susu.', 'fotoproduk/B0000000641.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 30, '2020-07-05 18:42:46', '65ml'),
('B000000062', 'SK005', 'Lungo', 36000, 0.01, 'lungo menyeduh 1 dosis kopi dengan 2 dosis air.', 'fotoproduk/B0000000621.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 24, '2020-07-05 18:37:37', '35ml'),
('B000000061', 'SK002', 'Ristretto', 37000, 0.03, 'Ristretto yang berarti restricted mempunyai makna 1 dosis kopi untuk membuat espresso diseduh hanya dengan setengah dosis air. Hasilnya adalah cairan kental dengan volume 15-20ml namun dengan rasa yang lebih kaya.', 'fotoproduk/B0000000611.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 48, '2020-07-05 18:32:36', ''),
('B000000058', 'SK001', 'One Shot', 25000, 0.01, 'Untuk espresso satu shot digunakan 25-35 ml', 'fotoproduk/B0000000581.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 21, '2020-07-05 18:11:43', '35ml'),
('B000000059', 'SK001', 'Double Shot', 35000, 0.03, 'double shot (doppio) sekitar 45-60 ml.', 'fotoproduk/B0000000591.png', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 9, '2020-07-05 18:18:43', '60ml'),
('B000000060', 'SK001', 'Triple Shot', 36000, 0.05, 'triple shot apabila volume kopi yang diinginkan lebih besar dari volume air', 'fotoproduk/B0000000601.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 9, '2020-07-05 18:25:54', '75ml'),
('B000000066', 'SK032', 'Kentang Goreng', 15000, 0, 'Kentang Goreng Enak', 'fotoproduk/B0000000661.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 499, '2020-07-30 18:39:01', '-'),
('B000000067', 'SK032', 'Nugget', 15000, 0, 'Nugget Ayam', 'fotoproduk/B0000000671.jpeg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:41:34', '-'),
('B000000068', 'SK032', 'Sosis Goreng', 15000, 0, 'Sosis Enak', 'fotoproduk/B0000000681.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:42:42', '-'),
('B000000069', 'SK032', 'Kentang mix Sosis', 15000, 0, 'Mix Mix Mix', 'fotoproduk/B0000000691.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:44:44', '-'),
('B000000070', 'SK032', 'Nugget Mix Sosis', 15000, 0, 'Mix Mix Mix', 'fotoproduk/B0000000701.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:48:16', '-'),
('B000000071', 'SK033', 'Indomie Goreng', 15000, 0, 'Indomie Goreng + telur', 'fotoproduk/B0000000711.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 498, '2020-07-30 18:49:40', '-'),
('B000000072', 'SK033', 'Indomie Rebus', 15000, 0, 'Indomie Rebus + Telur', 'fotoproduk/B0000000721.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:51:22', '-'),
('B000000073', 'SK034', 'Milkshake Coklat', 10000, 0, 'Milkshake Milkshake', 'fotoproduk/B0000000731.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:56:33', '-'),
('B000000074', 'SK034', 'Milkshake Mangga', 10000, 0, 'Milkshake Milkshake', 'fotoproduk/B0000000741.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:57:17', '-'),
('B000000075', 'SK034', 'Milkshake Melon', 10000, 0, 'Milkshake Milkshake', 'fotoproduk/B0000000751.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 500, '2020-07-30 18:57:51', '-'),
('B000000076', 'SK034', 'Milkshake Strawberry', 10000, 0, 'Milkshake Milkshake', 'fotoproduk/B0000000761.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 50, '2020-07-30 18:58:23', '-'),
('B000000077', 'SK034', 'Milkshake Vanilla', 10000, 0, 'Milkshake Milkshake', 'fotoproduk/B0000000771.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 30, '2020-07-30 19:01:13', '-'),
('B000000078', 'SK035', 'Lemon Tea', 10000, 0, 'Ngeteh Gan', 'fotoproduk/B0000000781.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 30, '2020-07-30 19:10:58', '-'),
('B000000079', 'SK036', 'Green Tea Latte', 10000, 0, 'Latte Latte', 'fotoproduk/B0000000791.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 30, '2020-07-30 19:13:09', '-'),
('B000000080', 'SK036', 'Caramel Latte', 10000, 0, 'Latte Latte', 'fotoproduk/B0000000801.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 30, '2020-07-30 19:14:15', '-'),
('B000000081', 'SK037', 'Choco Milo', 10000, 0, 'Coklut', 'fotoproduk/B0000000811.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 30, '2020-07-30 19:15:04', '-'),
('B000000082', 'SK037', 'Choco Mint', 10000, 0, 'Coklut', 'fotoproduk/B0000000821.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 25, '2020-07-30 19:15:49', '-'),
('B000000083', 'SK037', 'Hazelnut', 10000, 0, 'Coklut', 'fotoproduk/B0000000831.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 20, '2020-07-30 19:16:26', '-'),
('B000000084', 'SK036', 'Vanilla Latte', 10000, 0, 'Latte Latte', 'fotoproduk/B0000000841.jpg', 'fotoproduk/no_img.png', 'fotoproduk/no_img.png', 30, '2020-07-30 19:17:01', '-');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE IF NOT EXISTS `subkategori` (
  `id_subkategori` varchar(5) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `nama_subkategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `id_kategori`, `nama_subkategori`) VALUES
('SK001', 'K001', 'Espresso Shot'),
('SK002', 'K001', 'Ristretto'),
('SK004', 'K002', 'Cafe Latte'),
('SK005', 'K001', 'Lungo'),
('SK006', 'K001', 'Americano'),
('SK007', 'K001', 'Cafe Macchiato'),
('SK008', 'K001', 'Cafe Affogato'),
('SK010', 'K002', 'Flat White'),
('SK011', 'K002', 'Piccolo Latte'),
('SK012', 'K003', 'Arabika Bali'),
('SK013', 'K003', 'Arabika Flores'),
('SK014', 'K003', 'Arabika Gayo'),
('SK015', 'K004', 'Robusta Flores'),
('SK016', 'K004', 'Robusta Jawa'),
('SK017', 'K004', 'Robusta Lampung'),
('SK019', 'K005', 'Liberika Nangka'),
('SK027', 'K002', 'Mocha Latte'),
('SK028', 'K002', 'Caramel Latte'),
('SK029', 'K002', 'Latte Macchiato'),
('SK030', 'K003', 'Arabika Java Ijen'),
('SK031', 'K003', 'Arabika Java Raung'),
('SK032', 'K006', 'Goreng - goreng'),
('SK033', 'K006', 'Indomie'),
('SK034', 'K007', 'Ragam Milkshake'),
('SK035', 'K008', 'Tea'),
('SK036', 'K008', 'Latte'),
('SK037', 'K008', 'Choco');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `kodevoucher` char(10) NOT NULL,
  `potongan` float NOT NULL,
  `tanggalberlaku` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`kodevoucher`, `potongan`, `tanggalberlaku`) VALUES
('BL0505', 20000, '2016-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE IF NOT EXISTS `wilayah` (
  `kodewilayah` char(5) NOT NULL,
  `kodejp` char(10) NOT NULL,
  `namawilayah` varchar(40) NOT NULL,
  `ongkir` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`kodewilayah`, `kodejp`, `namawilayah`, `ongkir`) VALUES
('W001', 'JP0000001', 'Jambi', 0),
('W002', 'JP0000002', 'Jambi', 0),
('W003', 'JP0000005', 'Sipin', 5000),
('W004', 'JP0000005', 'Thehok', 7000),
('W005', 'JP0000005', 'Mayang', 0),
('W006', 'JP0000005', 'Kota Baru', 5000),
('W007', 'JP0000004', 'Sipin', 5000),
('W008', 'JP0000004', 'Kota Baru', 5000),
('W009', 'JP0000004', 'Mayang', 0),
('W010', 'JP0000004', 'Thehok', 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`kodebank`);

--
-- Indexes for table `cara_pesan`
--
ALTER TABLE `cara_pesan`
 ADD PRIMARY KEY (`id_cara`);

--
-- Indexes for table `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
 ADD PRIMARY KEY (`kddetail_pemesanan`);

--
-- Indexes for table `detailpenjualanproduk`
--
ALTER TABLE `detailpenjualanproduk`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kodepenjualan` (`kodepenjualan`,`kodeproduk`);

--
-- Indexes for table `detailpenjualanproduk_tmp`
--
ALTER TABLE `detailpenjualanproduk_tmp`
 ADD PRIMARY KEY (`kodeproduk`);

--
-- Indexes for table `infotoko`
--
ALTER TABLE `infotoko`
 ADD PRIMARY KEY (`kodeinfo`);

--
-- Indexes for table `jasakirim`
--
ALTER TABLE `jasakirim`
 ADD PRIMARY KEY (`kodejp`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
 ADD PRIMARY KEY (`kodekonfirmasi`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`kodemember`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`kodepemesanan`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `penjualanproduk`
--
ALTER TABLE `penjualanproduk`
 ADD PRIMARY KEY (`kodepenjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
 ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
 ADD PRIMARY KEY (`kodevoucher`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
 ADD PRIMARY KEY (`kodewilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
MODIFY `kddetail_pemesanan` float NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `detailpenjualanproduk`
--
ALTER TABLE `detailpenjualanproduk`
MODIFY `id` float NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
MODIFY `kodekonfirmasi` float NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
MODIFY `no` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
