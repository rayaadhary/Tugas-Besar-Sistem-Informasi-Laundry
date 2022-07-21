-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 08:15 PM
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
  `kd_cucian` varchar(5) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `nm_brg` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nm_konsumen` varchar(30) DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `no_faktur` int(11) DEFAULT NULL,
  `total` int(8) DEFAULT NULL
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
('admin', 'admin', NULL, 'pemilik', 'admin'),
('P0001', 'Lidya Latika Pudjiastuti', '0420 1915 131', 'penjaga laundry', 'P0001'),
('P0010', 'Asmuni Karsana Kusumo S.Pt', '(+62) 206 647', 'pemilik', 'P0010'),
('P0011', 'Farah Eva Nasyiah', '0327 3836 129', 'penjaga laundry', 'P0011'),
('P0012', 'Genta Mardhiyah M.Ak', '0699 3874 843', 'penjaga laundry', 'P0012'),
('P0013', 'Karya Permadi', '0265 9143 645', 'penjaga laundry', 'P0013'),
('P0014', 'Mustika Adriansyah', '(+62) 970 764', 'pemilik', 'P0014'),
('P0015', 'Tugiman Simanjuntak', '024 3026 6267', 'pemilik', 'P0015'),
('P0016', 'Halima Natalia Mulyani M.Farm', '(+62) 952 199', 'penjaga laundry', 'P0016'),
('P0017', 'Teddy Unggul Wahyudin', '0705 8912 130', 'pemilik', 'P0017'),
('P0018', 'Sabri Umar Irawan', '0811 9045 992', 'penjaga laundry', 'P0018'),
('P0019', 'Irfan Prakasa', '(+62) 29 8245', 'penjaga laundry', 'P0019'),
('P002', 'Rachel Zizi Lailasari M.TI.', '(+62) 26 5790', 'penjaga laundry', 'P002'),
('P0020', 'Oman Hardiansyah', '(+62) 331 925', 'pemilik', 'P0020'),
('P0021', 'Gawati Riyanti', '(+62) 877 259', 'penjaga laundry', 'P0021'),
('P0022', 'Raina Widiastuti', '0374 9017 187', 'penjaga laundry', 'P0022'),
('P0023', 'Elma Winarsih', '0773 4484 235', 'penjaga laundry', 'P0023'),
('P0024', 'Pardi Wibisono', '0614 8584 006', 'penjaga laundry', 'P0024'),
('P0025', 'Shania Kuswandari', '0791 5483 203', 'penjaga laundry', 'P0025'),
('P003', 'Wardi Samosir S.Farm', '0805 6678 402', 'pemilik', 'P003'),
('P004', 'Hasna Raisa Purwanti S.E.', '0701 6265 942', 'pemilik', 'P004'),
('P005', 'Talia Utami S.H.', '(+62) 540 926', 'penjaga laundry', 'P005'),
('P006', 'Eva Suartini S.Pd', '0972 4346 818', 'penjaga laundry', 'P006'),
('P007', 'Uli Permata', '(+62) 856 760', 'penjaga laundry', 'P007'),
('P008', 'Laras Purwanti', '(+62) 20 7704', 'pemilik', 'P008'),
('P009', 'Maryanto Zulkarnain', '0900 9776 987', 'penjaga laundry', 'P009');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` int(11) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `id_pegawai` varchar(5) DEFAULT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `kd_cucian` varchar(5) DEFAULT NULL,
  `layanan` enum('regular','one_day','express','') NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_cucian`),
  ADD KEY `barang_ibfk_1` (`id_konsumen`);

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
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
