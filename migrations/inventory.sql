-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2019 pada 07.51
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `perangkat` varchar(100) DEFAULT NULL,
  `idperangkat` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `sn` varchar(100) DEFAULT NULL,
  `penyimpanan` varchar(100) DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `tglmasuk` varchar(100) DEFAULT NULL,
  `tglkeluar` varchar(100) DEFAULT NULL,
  `tglmasukdismantle` varchar(100) DEFAULT NULL,
  `tglkeluardismantle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`id`, `perangkat`, `idperangkat`, `type`, `sn`, `penyimpanan`, `kondisi`, `tglmasuk`, `tglkeluar`, `tglmasukdismantle`, `tglkeluardismantle`) VALUES
(5, 'AS', '', 'SQS', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'as', '', 'sa', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `installasi`
--

CREATE TABLE `installasi` (
  `id` int(11) NOT NULL,
  `gudang_id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tglinstall` varchar(100) NOT NULL,
  `tgldismantle` varchar(100) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `installasi`
--

INSERT INTO `installasi` (`id`, `gudang_id`, `lokasi`, `tglinstall`, `tgldismantle`, `keterangan`) VALUES
(5, 5, 'D', 'D', 'D', 'D'),
(6, 6, 'as', 'sa', 'as', 'as');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1566353935),
('m190821_022059_db_data_table', 1566354636),
('m190821_054121_db_gudang_table', 1566438083);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `accessKey` varchar(100) DEFAULT NULL,
  `authKey` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `accessKey`, `authKey`, `nama`, `email`) VALUES
(1, 'admin', 'admin', 'DAU657dJHA', 'DUWD76', 'Admin', 'me.oceaner@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `installasi`
--
ALTER TABLE `installasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gudang_id` (`gudang_id`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `installasi`
--
ALTER TABLE `installasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `installasi`
--
ALTER TABLE `installasi`
  ADD CONSTRAINT `installasi_ibfk_1` FOREIGN KEY (`gudang_id`) REFERENCES `gudang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
