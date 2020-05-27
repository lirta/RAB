-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 09:04 AM
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
(1, 'kantor saya');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `alamat_konsumen` varchar(125) NOT NULL,
  `no_hp_konsumen` varchar(15) NOT NULL,
  `email_konsumen` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(15) NOT NULL,
  `id_kategori_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `gambar` int(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail_produk`);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

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
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bahan_kategori`
--
ALTER TABLE `bahan_kategori`
  MODIFY `id_bahan_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kariawan`
--
ALTER TABLE `kariawan`
  MODIFY `id_kariawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
