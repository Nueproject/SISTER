-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 02.55
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pppk`
--

--
-- Struktur dari tabel `Tamu`
--

CREATE TABLE `data_tamu` (
  `nip` char(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `instansi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `data_tamu` (`nip`, `nama`, `instansi`, `no_hp`) VALUES
('1234432156788765', 'Dono',  '2', '0274234861'),
('2134567843218765', 'Kasino', '3', '0274324959'),
('3124567898764321', 'Indro', '1', '0274566711');

--
-- Struktur dari tabel `Tamu`
--
CREATE TABLE `data_instansi` (
  `id_instansi` int(3) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat_instansi` varchar(100) NOT NULL,
  `telp_instansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data untuk tabel `data_instansi`
--
INSERT INTO `data_instansi` (`id_instansi`, `nama_instansi`, `alamat_instansi`, `telp_instansi`) VALUES
('1', 'BKD Daerah Istimewa Yogyakarta',  'Yogyakarta', '0274234861'),
('2', 'BKPP Sleman', 'Sleman', '0274324959'),
('3', 'BKPP Bantul', 'Bantul', '0274566711');





--
-- Struktur dari tabel `bidang`
--
CREATE TABLE `data_bidang` (
  `id` int(3) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL,
  `telp_bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `data_bidang`
  ADD PRIMARY KEY (`id`);
--
-- Dumping data untuk tabel `DATA_BIDANG`-
INSERT INTO `data_bidang` (`id`, `nama_bidang`, `telp_bidang`) VALUES
('1', 'INKA', '0274234861'),
('2', 'PDSK', '0274324959'),
('3', 'PENSIUN', '0274324959'),
('4', 'MUTASI', '0274324959'),
('5', 'UMUM', '0274566711');




--
-- Struktur dari tabel `Tamu`
--
CREATE TABLE `data_tamu_instansi` (
  `id_tamu_instansi` int(3) NOT NULL,
  `kode_tamu` varchar(15) NOT NULL,
  `nip` char(18) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `tgl_datang` date DEFAULT NULL,
  `jam_datang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `data_tamu_instansi`
  ADD PRIMARY KEY (`id_tamu_instansi`);
--
-- Dumping data untuk tabel `pns`
--

INSERT INTO `data_tamu_instansi` (`id_tamu_instansi`,`kode_tamu`,`nip`, `bidang`, `keperluan`, `keterangan`, `status`, `tgl_datang`, `jam_datang`) VALUES
('1','IN-21202312-1','2012199501230002', '2', 'Informasi Pengisian DRH','Gatau Capek mau beli truck', '1', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_jabatan`
--

CREATE TABLE `jenis_jabatan` (
  `id` char(1) NOT NULL,
  `nama_jenis_jabatan` varchar(15) NOT NULL,
  `isi` enum('Struktural','Fungsional','Pelaksana') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_jabatan`
  ADD PRIMARY KEY (`id`);
--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO `jenis_jabatan` (`id`, `nama_jenis_jabatan`, `isi`) VALUES
('1', 'Jabatan 1', 'Struktural'),
('2', 'Jabatan 2', 'Fungsional'),
('3', 'Jabatan 3', 'Pelaksana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pns`
--

CREATE TABLE `pns` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_jabatan_id` char(1) DEFAULT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `path_upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `pns`
--
ALTER TABLE `pns`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `jenis_jabatan_id` (`jenis_jabatan_id`);


--
-- Dumping data untuk tabel `pns`
--

INSERT INTO `pns` (`nip`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `jenis_jabatan_id`, `nomor_hp`, `email`, `path_upload`) VALUES
('4', 'Doni Suparto', 'L', '2023-11-30', '3', '089621', 'doni@gmail.com', '../data_gambar/path_upload/20231130052721104.png');

-- --------------------------------------------------------
--
-- Struktur dari tabel `PPNPN`
--

CREATE TABLE `ppnpn` (
  `nippnpn` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(15) DEFAULT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `ppnpn`
--
ALTER TABLE `ppnpn`
  ADD PRIMARY KEY (`nippnpn`);
--
-- Dumping data untuk tabel `pns`
--
INSERT INTO `ppnpn` (`nippnpn`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `jabatan`, `nomor_hp`, `email`, `upload`) VALUES
('262021011035', 'Dimas Dwi Nugroho', 'L', '1995-12-20', 'pramubakti', '082135225590', 'nueproject@gmail.com', '262021011035.png');
--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(1) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `users`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);
--
-- Dumping data untuk tabel `users`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('1', 'Belum di Layani'),
('2', 'Menunggu Konsultasi'),
('3', 'Menunggu di Panggil'),
('4', 'Sedang di Layani'),
('5', 'Sedang Konsultasi'),
('6', 'Selesai');
--
-- Struktur dari tabel `users`
--

CREATE TABLE `user` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `roles` enum('admin','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `users`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
--
-- Dumping data untuk tabel `users`
--

INSERT INTO `user` (`id`, `username`, `pass`, `roles`) VALUES
('1', 'admin', 'admin', 'admin'),
('2', 'pegawai', 'pegawai', 'pegawai');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
