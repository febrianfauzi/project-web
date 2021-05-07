-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2021 pada 00.44
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemskripsi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fak` varchar(8) NOT NULL,
  `fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fak`, `fakultas`) VALUES
('112', 'Teknik Informatika'),
('113', 'Komunikasi'),
('114', 'Kimia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsentrasi`
--

CREATE TABLE `konsentrasi` (
  `id_kon` varchar(8) NOT NULL,
  `konsentrasi` varchar(30) NOT NULL,
  `fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsentrasi`
--

INSERT INTO `konsentrasi` (`id_kon`, `konsentrasi`, `fakultas`) VALUES
('221', 'Android', 'Teknik Informatika'),
('222', 'Robotic', 'Teknik Informatika');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fak`);

--
-- Indeks untuk tabel `konsentrasi`
--
ALTER TABLE `konsentrasi`
  ADD PRIMARY KEY (`id_kon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
