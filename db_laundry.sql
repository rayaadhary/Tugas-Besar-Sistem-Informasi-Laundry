-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2023 pada 02.28
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
(1, 1, 'Jaket Kulit', 'XL, Hitam'),
(2, 2, 'Hoodie', 'Hitam Emas'),
(3, 3, 'Crewneck, Skinny Jeans', 'Putih '),
(4, 4, 'Jas ', 'Merah'),
(5, 5, 'Kaos, Celana Pendek', '');

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
(1, 'Arnold Suasanasegar', '62878962571'),
(2, 'Kendrick Tunangan', '62856781456'),
(3, 'Ryan Ghosting', '6287156718'),
(4, 'Brad Prett', '625782154417'),
(5, 'Vin Solar', '627891535178');

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

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tgl`, `no_faktur`, `total`) VALUES
(1, '2022-07-22 23:07:00', 8, 14000),
(2, '2022-07-22 23:07:00', 10, 10000),
(3, '2022-07-22 23:07:00', 9, 10000),
(4, '2022-07-22 23:07:00', 11, 10000),
(5, '2022-07-22 23:08:00', 12, 10000);

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
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(5) NOT NULL,
  `nm_pegawai` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `jabatan` enum('pemilik','penjaga laundry') NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nm_pegawai`, `no_tlp`, `jabatan`, `password`) VALUES
('admin', 'admin', '', 'pemilik', 'admin'),
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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_pegawai` varchar(5) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `kd_cucian` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `lunas` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_faktur`, `tgl`, `id_pegawai`, `id_konsumen`, `kd_cucian`, `total`, `lunas`) VALUES
(8, '2022-07-22 23:02:00', 'P007', 1, 1, 14000, 'Y'),
(9, '2022-07-22 23:02:00', 'P004', 2, 2, 10000, 'Y'),
(10, '2022-07-22 23:01:00', 'P009', 3, 3, 10000, 'Y'),
(11, '2022-07-22 23:04:00', 'P004', 4, 4, 10000, 'Y'),
(12, '2022-07-22 23:05:00', 'P004', 5, 5, 10000, 'Y');

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
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `kd_cucian` (`kd_cucian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_cucian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `transaksi_ibfk_9` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
