-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 02:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rab`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `id_bahan_kategori` int(11) NOT NULL,
  `nama_bahan` varchar(125) NOT NULL,
  `merek` varchar(125) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `id_bahan_kategori`, `nama_bahan`, `merek`, `harga`) VALUES
(1, 1, 'kayu 5x5', 'jati', '15000000'),
(2, 1, 'triplek', '12 cm', '1500000'),
(3, 2, 'chat kayu', 'avian', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_kategori`
--

CREATE TABLE `bahan_kategori` (
  `id_bahan_kategori` int(11) NOT NULL,
  `bahan_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_kategori`
--

INSERT INTO `bahan_kategori` (`id_bahan_kategori`, `bahan_kategori`) VALUES
(1, 'bahan dasar '),
(2, 'Finising'),
(3, 'aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_konsumen` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_bahan`
--

CREATE TABLE `detail_bahan` (
  `id_detail_bahan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bahan`
--

INSERT INTO `detail_bahan` (`id_detail_bahan`, `id_produk`, `id_bahan`, `jml`, `harga`) VALUES
(4, 1, 1, 4, 60000000),
(5, 1, 2, 2, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_orderan`
--

CREATE TABLE `detail_orderan` (
  `id_detail` int(11) NOT NULL,
  `id_orderan` varchar(100) NOT NULL,
  `id_produk` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_orderan`
--

INSERT INTO `detail_orderan` (`id_detail`, `id_orderan`, `id_produk`, `jumlah`, `harga`) VALUES
(1, '6218', '1', 2, 6000000),
(2, '6218', '1', 1, 3000000),
(3, '8400', '2', 4, 120000000),
(4, '602', '1', 2, 6000000),
(5, '1112', '2', 1, 30000000),
(6, '4155', '1', 3, 9000000),
(7, '212', '1', 1, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_orderan_kastem`
--

CREATE TABLE `detail_orderan_kastem` (
  `id_kastem` int(11) NOT NULL,
  `id_orderan` varchar(100) NOT NULL,
  `nama_kastem` varchar(225) NOT NULL,
  `kategori_kastem` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_ukuran`
--

CREATE TABLE `detail_ukuran` (
  `id_detail_ukuran` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `cm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ukuran`
--

INSERT INTO `detail_ukuran` (`id_detail_ukuran`, `id_produk`, `ukuran`, `cm`) VALUES
(8, 1, 'panjang ', 50),
(9, 1, 'lebar ', 50),
(10, 1, 'tinggi', 50);

-- --------------------------------------------------------

--
-- Table structure for table `kariawan`
--

CREATE TABLE `kariawan` (
  `id_kariawan` int(11) NOT NULL,
  `nama_kariawan` varchar(50) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kariawan`
--

INSERT INTO `kariawan` (`id_kariawan`, `nama_kariawan`, `alamat`, `no_hp`, `foto`) VALUES
(8, 'yulian', 'Jl. Pinus 235', '081277967050', 'krw43141890devil-may-cry-background.jpg'),
(9, 'gentho', 'Jl. Pinus 235', '0320853275025', 'krw28014453d-games-wallpapers-3d-picture-3d-wallpaper_oWEbyQ7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori`) VALUES
(1, 'kantor'),
(2, 'rumah');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` varchar(50) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `alamat_konsumen` varchar(125) NOT NULL,
  `no_hp_konsumen` varchar(15) NOT NULL,
  `email_konsumen` varchar(25) NOT NULL,
  `akses` varchar(225) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `alamat_konsumen`, `no_hp_konsumen`, `email_konsumen`, `akses`, `username`, `password`) VALUES
('298302', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('gento338547', 'gentho', 'Jl. Pinus 235', '0320853275025', 'amp.muh.rofichan@gmail.co', 'KONSUMEN', 'gento', 'c4ca4238a0b923820dcc509a6f75849b'),
('inda154700', 'inda lirta padisma', 'Jl. Pinus 235', '081277967050', 'amp.muh.rofichan@gmail.co', 'KONSUMEN', 'inda', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kariawan` int(11) NOT NULL,
  `akses` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id_kariawan`, `akses`, `status`) VALUES
('g', 'c4ca4238a0b923820dcc509a6f75849b', 9, 'ADMIN', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id_orderan` varchar(100) NOT NULL,
  `id_konsumen` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `status_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id_orderan`, `id_konsumen`, `tanggal`, `kategori`, `status_order`) VALUES
('1112', 'inda154700', '1, 04/06/2020', 'PRODUCK', 'ORDER'),
('212', 'inda154700', 'Thursday, 04/06/2020', 'PRODUCK', 'ORDER'),
('4155', 'inda154700', 'Thursday, 04/06/2020', 'PRODUCK', 'ORDER'),
('602', 'inda154700', '04/06/2020', 'PRODUCK', 'ORDER'),
('6218', 'inda154700', '03/06/2020', 'PRODUCK', 'ORDER'),
('8400', 'inda154700', '04/06/2020', 'PRODUCK', 'ORDER');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(150) NOT NULL,
  `id_kategori_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori_produk`, `nama_produk`, `gambar`, `harga`) VALUES
('1', '2', 'meja rumah', 'produck799434403D-Action-Games-HD-Wallpaper.jpg', 3000000),
('2', '2', 'gentho', 'produck71200595devil-may-cry-background.jpg', 30000000),
('PRODUK33780249', '1', 'lemari', 'produck33780249a932465541113e79d97204f0eb5c803b.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bahan_kategori`
--
ALTER TABLE `bahan_kategori`
  ADD PRIMARY KEY (`id_bahan_kategori`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bahan`
--
ALTER TABLE `detail_bahan`
  ADD PRIMARY KEY (`id_detail_bahan`);

--
-- Indexes for table `detail_orderan`
--
ALTER TABLE `detail_orderan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_orderan_kastem`
--
ALTER TABLE `detail_orderan_kastem`
  ADD PRIMARY KEY (`id_kastem`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail_produk`);

--
-- Indexes for table `detail_ukuran`
--
ALTER TABLE `detail_ukuran`
  ADD PRIMARY KEY (`id_detail_ukuran`);

--
-- Indexes for table `kariawan`
--
ALTER TABLE `kariawan`
  ADD PRIMARY KEY (`id_kariawan`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_orderan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bahan_kategori`
--
ALTER TABLE `bahan_kategori`
  MODIFY `id_bahan_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_bahan`
--
ALTER TABLE `detail_bahan`
  MODIFY `id_detail_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_orderan`
--
ALTER TABLE `detail_orderan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_orderan_kastem`
--
ALTER TABLE `detail_orderan_kastem`
  MODIFY `id_kastem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_ukuran`
--
ALTER TABLE `detail_ukuran`
  MODIFY `id_detail_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kariawan`
--
ALTER TABLE `kariawan`
  MODIFY `id_kariawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
