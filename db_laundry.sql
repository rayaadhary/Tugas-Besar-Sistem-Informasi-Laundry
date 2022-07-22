-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 12:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_cucian` int(11) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `nm_brg` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_cucian`, `id_konsumen`, `nm_brg`, `deskripsi`) VALUES
(1, 4, 'Hoodie', 'Hitam'),
(2, 5, 'Jaket', 'XL'),
(3, 6, 'fafha', 'kfehjfhj'),
(4, 7, 'baju', 'baju hitam'),
(5, 8, 'Jaket Parasut', 'Biru'),
(6, 9, 'Sweater', 'Long Sleeve'),
(7, 10, 'Jacket Coach', 'LGBT');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nm_konsumen` varchar(30) DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nm_konsumen`, `no_tlp`) VALUES
(1, 'Sadina Melani S.Pt', '0293 2793 142'),
(2, 'Genta Talia Namaga', '0652 2109 846'),
(3, 'Farah Prastuti', '0785 3741 789'),
(4, 'Rifa Anime', '89525670855'),
(5, 'Mujahid', '89678876500'),
(6, 'fanfa', '0'),
(7, 'domba puyih', '896666'),
(8, 'Rifa Anime', '6289525670855'),
(9, 'ahmad mujahid ramdani', '8967898278'),
(10, 'DAFFA SUAMI WINTER', '628952567898');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `no_faktur` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(5) NOT NULL,
  `nm_pegawai` varchar(30) DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL,
  `jabatan` enum('pemilik','penjaga laundry') DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nm_pegawai`, `no_tlp`, `jabatan`, `password`) VALUES
('P0010', 'Lulut Firmansyah M.M.', '(+62) 821 813', 'pemilik', 'P0010'),
('P002', 'Pardi Simanjuntak', '0421 4772 247', 'pemilik', 'P002'),
('P003', 'Rahayu Usamah', '0718 8537 475', 'pemilik', 'P003'),
('P004', 'Garang Kemba Kurniawan M.Farm', '020 8822 871', 'penjaga laundry', 'P004'),
('P005', 'Endra Hendri Sitorus', '(+62) 287 672', 'pemilik', 'P005'),
('P006', 'Siska Kusmawati', '(+62) 892 394', 'pemilik', 'P006'),
('P007', 'Yani Nuraini', '(+62) 711 263', 'penjaga laundry', 'P007'),
('P009', 'Legawa Dongoran', '0301 3081 201', 'penjaga laundry', 'P009');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` int(11) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `id_pegawai` varchar(5) DEFAULT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `kd_cucian` int(11) DEFAULT NULL,
  `layanan` enum('regular','one_day','express','') NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_faktur`, `tgl`, `id_pegawai`, `id_konsumen`, `kd_cucian`, `layanan`, `berat`, `total`) VALUES
(7, '2022-07-22 17:41:00', 'P004', 10, 7, 'express', 1, 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_cucian`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_transaksi` (`no_faktur`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `kd_cucian` (`kd_cucian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_cucian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `transaksi_ibfk_7` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_8` FOREIGN KEY (`kd_cucian`) REFERENCES `barang` (`kd_cucian`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
