-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2023 at 05:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
  `kd_barang` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `nm_brg` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `id_konsumen`, `nm_brg`, `deskripsi`) VALUES
(6, 15, 'a', 'a'),
(7, 16, 'a', 'a'),
(8, 17, 'a', 'a'),
(9, 18, 'a', 'a'),
(10, 19, 'a', 'a'),
(11, 20, 'a', 'a'),
(12, 21, 'a', 'a'),
(13, 22, 'a', 'a'),
(14, 23, 'a', 'a'),
(15, 24, 'a', 'a'),
(16, 25, 'a', 'a'),
(17, 28, 'a', 'a'),
(18, 29, 'a', 'a'),
(19, 30, 'z', 'z'),
(20, 31, 'z', 'z'),
(21, 32, 'z', 'z'),
(22, 33, 'z', 'z'),
(23, 34, 'z', 'z'),
(24, 35, 'z', 'z'),
(29, 40, 's', 's'),
(30, 41, 'y', 'y'),
(32, 43, 'hh', 'hh'),
(33, 44, 'z', 'z');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_faktur` int(11) DEFAULT NULL,
  `kd_barang` int(11) DEFAULT NULL,
  `id_layanan` int(11) NOT NULL,
  `berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_faktur`, `kd_barang`, `id_layanan`, `berat`) VALUES
(18, 18, 2, 2),
(19, 19, 2, 2),
(21, 21, 3, 2),
(22, 22, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nm_konsumen` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nm_konsumen`, `no_tlp`) VALUES
(15, 'w', '0'),
(16, 'w', '0'),
(17, 'a', '0'),
(18, 'a', '0'),
(19, 'a', '0'),
(20, 'a', '0'),
(21, 'a', '76'),
(22, 'a', '76'),
(23, 'a', '76'),
(24, 'a', '76'),
(25, 'a', '76'),
(26, 'a', '76'),
(27, 'a', '76'),
(28, 'a', '76'),
(29, 'a', '76'),
(30, 'z', '76'),
(31, 'z', '76'),
(32, 'z', '76'),
(33, 'z', '76'),
(34, 'z', '76'),
(35, 'z', '76'),
(40, 's', '76'),
(41, 'y', '666'),
(43, 'yayan', '76'),
(44, 'z', '76');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tgl`, `no_faktur`, `total`) VALUES
(6, '2023-01-25 04:28:24', 13, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nm_layanan` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nm_layanan`, `harga`) VALUES
(1, 'regular', 6000),
(2, 'express', 7000),
(3, 'one day', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `jabatan` enum('pemilik','penjaga laundry') NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `no_tlp`, `jabatan`, `password`) VALUES
(1, 'Darmanto Prayoga', '0795 3304 477', 'pemilik', 'adminn'),
(2, 'Vanesa Permata', '(+62) 798 301', 'penjaga laundry', 'admin'),
(3, 'Marsito Anggriawan', '0751 1496 207', 'pemilik', 'admin'),
(4, 'Damu Damu Napitupulu', '(+62) 793 595', 'penjaga laundry', 'admin'),
(5, 'Argono Santoso S.T.', '(+62) 211 599', 'penjaga laundry', 'admin'),
(6, 'Najib Margana Tarihoran', '(+62) 620 323', 'penjaga laundry', 'admin'),
(7, 'Amelia Hartati', '0259 6495 333', 'pemilik', 'admin'),
(8, 'Pranawa Wijaya', '0965 4983 903', 'penjaga laundry', 'admin'),
(9, 'Paulin Usada S.Ked', '(+62) 800 746', 'pemilik', 'admin'),
(10, 'Limar Karya Permadi', '0912 4655 961', 'penjaga laundry', 'admin'),
(11, 'Gawati Kuswandari', '0507 0361 769', 'pemilik', 'admin'),
(12, 'Yono Wahyudin', '0940 5981 835', 'pemilik', 'admin'),
(13, 'Keisha Rina Mulyani S.IP', '(+62) 950 621', 'pemilik', 'admin'),
(14, 'Salsabila Mulyani S.E.I', '0370 3665 851', 'pemilik', 'admin'),
(15, 'Puput Usamah', '(+62) 567 593', 'pemilik', 'admin'),
(16, 'Asirwanda Suwarno S.Kom', '(+62) 604 213', 'penjaga laundry', 'admin'),
(18, 'Violet Pertiwi S.Psi', '022 5742 3663', 'pemilik', 'admin'),
(20, 'Rini Andriani', '(+62) 904 071', 'pemilik', 'admin'),
(21, 'Karen Mandasari S.Pd', '(+62) 475 220', 'penjaga laundry', 'admin'),
(22, 'Gilda Nasyiah', '(+62) 852 068', 'penjaga laundry', 'admin'),
(23, 'Padmi Namaga', '(+62) 807 144', 'pemilik', 'admin'),
(24, 'Darsirah Narpati S.Sos', '0698 8008 395', 'penjaga laundry', 'admin'),
(25, 'Patricia Aryani', '0203 0028 146', 'pemilik', 'admin'),
(26, 'admin', '02062862962', 'pemilik', 'admin'),
(55, 'mama', '76', 'pemilik', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `lunas` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_faktur`, `tgl`, `id_pengguna`, `id_konsumen`, `kd_barang`, `total`, `lunas`) VALUES
(13, '2023-01-22 13:22:38', 1, 16, 6, 40000, 'Y'),
(18, '2023-01-23 20:17:00', 10, 40, 29, 14000, 'Y'),
(19, '2023-01-23 20:17:00', 10, 41, 30, 14000, 'Y'),
(21, '2023-01-25 21:10:00', 10, 43, 32, 16000, 'Y'),
(22, '2023-01-25 22:16:00', 10, 44, 33, 7000, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `kd_cucian` (`kd_barang`),
  ADD KEY `id_layanan` (`id_layanan`);

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
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_pegawai` (`id_pengguna`),
  ADD KEY `kd_cucian` (`kd_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`),
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `detail_transaksi_ibfk_5` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_10` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  ADD CONSTRAINT `transaksi_ibfk_11` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `transaksi_ibfk_9` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
