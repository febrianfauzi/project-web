-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2021 pada 04.30
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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `konsentrasi` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `jurusan`, `konsentrasi`, `email`) VALUES
(100100, 'Hartono H.', 'Teknik Informatika', 'Android', 'harto@gmail.com'),
(100101, 'Lisnawati A.', 'Kimia', 'Riset', 'lisna@gmail.com'),
(100102, 'Permana K.', 'Teknik Informatika', 'Robotic', 'permana@gmail.com'),
(100103, 'Riani L.', 'Teknik Informatika', 'AI', 'riani@gmail.com');

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
('114', 'Kimia'),
('115', 'Perkantoran');

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
('222', 'Robotic', 'Teknik Informatika'),
('223', 'AI', 'Teknik Informatika'),
('224', 'Riset', 'Kimia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `konsentrasi` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jurusan`, `konsentrasi`, `email`, `status`) VALUES
(10118182, 'Budi budiman', 'Teknik Informatika', 'Android', 'budi@gmail.com', 'Skripsi'),
(10118183, 'Hadi Perban', 'Teknik Informatika', 'Robotic', 'hadi@gmail.com', 'Skripsi'),
(10118184, 'Ahmad Karbit', 'Teknik Informatika', 'Android', 'ahmad@gmail.com', 'Mahasiswa'),
(10118185, 'Mamat Rante', 'Kimia', 'Riset', 'mamat@gmail.com', 'Mahasiswa'),
(10118186, 'Opik Bedog', 'Teknik Informatika', 'AI', 'opik@gmail.com', 'Mahasiswa'),
(10118187, 'Asep Semen', 'Kimia', 'Riset', 'asep@gmail.com', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `role` int(1) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`role`, `nama`, `user`, `password`) VALUES
(1, 'Admin', 'admin', 'admin'),
(3, 'Budi budiman', '10118182', 'mahasiswa'),
(3, 'Hadi Perban', '10118183', 'mahasiswa'),
(3, 'Ahmad Karbit', '10118184', 'mahasiswa'),
(3, 'Mamat Rante', '10118185', 'mahasiswa'),
(3, 'Opik Bedog', '10118186', 'mahasiswa'),
(3, 'Asep Semen', '10118187', 'mahasiswa'),
(2, 'Hartono H.', '100100', 'dosen'),
(2, 'Lisnawati A.', '100101', 'dosen'),
(2, 'Permana K.', '100102', 'dosen'),
(2, 'Riani L.', '100103', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

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

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
