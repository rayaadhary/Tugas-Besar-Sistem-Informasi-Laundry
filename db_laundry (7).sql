-- SQLBook: Code
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2023 pada 05.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_cucian` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `nm_brg` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_cucian`, `id_konsumen`, `nm_brg`, `deskripsi`) VALUES
(6, 15, 'a', 'a'),
(7, 16, 'a', 'a'),
(8, 17, 'a', 'a'),
(9, 18, 'a', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_faktur` int(11) DEFAULT NULL,
  `kd_cucian` int(11) DEFAULT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nm_konsumen` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nm_konsumen`, `no_tlp`) VALUES
(15, 'w', '0'),
(16, 'w', '0'),
(17, 'a', '0'),
(18, 'a', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nm_layanan` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nm_layanan`, `harga`) VALUES
(1, 'regular', 6000),
(2, 'express', 7000),
(3, 'one day', 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(5) NOT NULL,
  `nm_pengguna` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `jabatan` enum('pemilik','penjaga laundry') NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `no_tlp`, `jabatan`, `password`) VALUES
('1', 'Darmanto Prayoga', '0795 3304 477', 'pemilik', 'admin'),
('10', 'Limar Karya Permadi', '0912 4655 961', 'penjaga laundry', 'admin'),
('11', 'Gawati Kuswandari', '0507 0361 769', 'pemilik', 'admin'),
('12', 'Yono Wahyudin', '0940 5981 835', 'pemilik', 'admin'),
('13', 'Keisha Rina Mulyani S.IP', '(+62) 950 621', 'pemilik', 'admin'),
('14', 'Salsabila Mulyani S.E.I', '0370 3665 851', 'pemilik', 'admin'),
('15', 'Puput Usamah', '(+62) 567 593', 'pemilik', 'admin'),
('16', 'Asirwanda Suwarno S.Kom', '(+62) 604 213', 'penjaga laundry', 'admin'),
('18', 'Violet Pertiwi S.Psi', '022 5742 3663', 'pemilik', 'admin'),
('2', 'Vanesa Permata', '(+62) 798 301', 'penjaga laundry', 'admin'),
('20', 'Rini Andriani', '(+62) 904 071', 'pemilik', 'admin'),
('21', 'Karen Mandasari S.Pd', '(+62) 475 220', 'penjaga laundry', 'admin'),
('22', 'Gilda Nasyiah', '(+62) 852 068', 'penjaga laundry', 'admin'),
('23', 'Padmi Namaga', '(+62) 807 144', 'pemilik', 'admin'),
('24', 'Darsirah Narpati S.Sos', '0698 8008 395', 'penjaga laundry', 'admin'),
('25', 'Patricia Aryani', '0203 0028 146', 'pemilik', 'admin'),
('3', 'Marsito Anggriawan', '0751 1496 207', 'pemilik', 'admin'),
('4', 'Damu Damu Napitupulu', '(+62) 793 595', 'penjaga laundry', 'admin'),
('5', 'Argono Santoso S.T.', '(+62) 211 599', 'penjaga laundry', 'admin'),
('6', 'Najib Margana Tarihoran', '(+62) 620 323', 'penjaga laundry', 'admin'),
('7', 'Amelia Hartati', '0259 6495 333', 'pemilik', 'admin'),
('8', 'Pranawa Wijaya', '0965 4983 903', 'penjaga laundry', 'admin'),
('9', 'Paulin Usada S.Ked', '(+62) 800 746', 'pemilik', 'admin'),
('admin', 'admin', '02062862962', 'pemilik', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_pengguna` varchar(5) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `kd_cucian` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `lunas` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_cucian`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `kd_cucian` (`kd_cucian`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_transaksi` (`no_faktur`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_pegawai` (`id_pengguna`),
  ADD KEY `kd_cucian` (`kd_cucian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_cucian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`),
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`kd_cucian`) REFERENCES `barang` (`kd_cucian`);

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_10` FOREIGN KEY (`kd_cucian`) REFERENCES `barang` (`kd_cucian`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `transaksi_ibfk_9` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
