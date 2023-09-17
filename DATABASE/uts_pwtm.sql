-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2022 pada 06.53
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pwtm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmatkul`
--

CREATE TABLE `tblmatkul` (
  `kd_mtk` varchar(10) NOT NULL,
  `nm_mtk` varchar(40) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmatkul`
--

INSERT INTO `tblmatkul` (`kd_mtk`, `nm_mtk`, `sks`) VALUES
('BA001', 'Bahasa Indonesia', 2),
('KP045', 'Kecerdasan Tiruan', 3),
('Kp047', 'Komputer dan Masyarakat', 2),
('KP121', 'Pengantar Teknologi Informasi', 3),
('KP123', 'Pengantar Sistem Basis Data', 2),
('KP181', 'Teori Bahasa dan Otomata *', 3),
('KP342', 'Rekayasa Perangkat Lunak 1', 3),
('KP343', 'Rekayasa Perangkat Lunak 2', 3),
('KP368', 'Penambangan Data', 3),
('MI041', 'Logika Matematika', 3),
('MI113', 'Statistik Probabilitas', 3),
('PG061', 'Pemrograman Berorientasi Obyek', 3),
('PG111', 'Desain & Pemrograman Web 2', 3),
('PG167', 'Analisis Dan Desain Algoritma', 3),
('PG169', 'Pemrograman Kecerdasan Tiruan', 3),
('PG176', 'Pengolahan Citra Digital', 2),
('PG180', 'Augmented Reality', 2),
('PG184', 'Pemrograman Web Tingkat Mahir', 3),
('UM013', 'Metodologi Riset', 2),
('UM031', 'Wawasan Budi Luhur', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmhs`
--

CREATE TABLE `tblmhs` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmhs`
--

INSERT INTO `tblmhs` (`nim`, `nama`, `tgllahir`, `alamat`) VALUES
('1911500232', 'Michael', '2000-02-22', 'Yogyakarta'),
('2011500245', 'Caraka', '2002-02-08', ' Bandung'),
('2011500323', 'Muhammad Rafi ', '2002-07-24', ' Jakarta'),
('2011500390', 'Januwa Putra Wiastopo', '2002-02-07', ' Tangerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblnilai`
--

CREATE TABLE `tblnilai` (
  `nim` varchar(10) NOT NULL,
  `kd_mtk` varchar(20) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblnilai`
--

INSERT INTO `tblnilai` (`nim`, `kd_mtk`, `nilai`) VALUES
('2011500245', 'PG061', 100),
('2011500323', 'PG176', 80),
('1911500232', 'PG169', 50);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblmatkul`
--
ALTER TABLE `tblmatkul`
  ADD PRIMARY KEY (`kd_mtk`);

--
-- Indeks untuk tabel `tblmhs`
--
ALTER TABLE `tblmhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tblnilai`
--
ALTER TABLE `tblnilai`
  ADD KEY `kd_mtk` (`kd_mtk`),
  ADD KEY `nim` (`nim`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblnilai`
--
ALTER TABLE `tblnilai`
  ADD CONSTRAINT `tblnilai_ibfk_2` FOREIGN KEY (`kd_mtk`) REFERENCES `tblmatkul` (`kd_mtk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblnilai_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `tblmhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
