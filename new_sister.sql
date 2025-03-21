--
-- Struktur dari tabel `Instansi`
--
CREATE TABLE `data_instansi` (
  `id_instansi` int(3) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `pic_pensiun` varchar(100) DEFAULT NULL,
  `telp_pensiun` varchar(50) DEFAULT NULL,
  `pic_mutasi` varchar(100) DEFAULT NULL,
  `telp_mutasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO data_instansi (id_instansi, nama_instansi, pic_pensiun, telp_pensiun, pic_mutasi, telp_mutasi) VALUES
('1', 'Daerah Istimewa Yogyakarta', '', '', '', ''),
('2', 'Jawa Tengah', '', '', '', ''),
('3', 'Kabupaten Bantul', '', '', '', ''),
('4', 'Kabupaten Gunung Kidul', '', '', '', ''),
('5', 'Kabupaten Kulon Progo', '', '', '', ''),
('6', 'Kabupaten Sleman', '', '', '', ''),
('7', 'Kota Yogyakarta', '', '', '', ''),
('8', 'Kabupaten Banjarnegara', '', '', '', ''),
('9', 'Kabupaten Banyumas', '', '', '', ''),
('10', 'Kabupaten Batang', '', '', '', ''),
('11', 'Kabupaten Blora', '', '', '', ''),
('12', 'Kabupaten Boyolali', '', '', '', ''),
('13', 'Kabupaten Brebes', '', '', '', ''),
('14', 'Kabupaten Cilacap', '', '', '', ''),
('15', 'Kabupaten Demak', '', '', '', ''),
('16', 'Kabupaten Grobogan', '', '', '', ''),
('17', 'Kabupaten Jepara', '', '', '', ''),
('18', 'Kabupaten Karanganyar', '', '', '', ''),
('19', 'Kabupaten Kebumen', '', '', '', ''),
('20', 'Kabupaten Kendal', '', '', '', ''),
('21', 'Kabupaten Klaten', '', '', '', ''),
('22', 'Kabupaten Kudus', '', '', '', ''),
('23', 'Kabupaten Magelang', '', '', '', ''),
('24', 'Kabupaten Pati', '', '', '', ''),
('25', 'Kabupaten Pekalongan', '', '', '', ''),
('26', 'Kabupaten Pemalang', '', '', '', ''),
('27', 'Kabupaten Purbalingga', '', '', '', ''),
('28', 'Kabupaten Purworejo', '', '', '', ''),
('29', 'Kabupaten Rembang', '', '', '', ''),
('30', 'Kabupaten Semarang', '', '', '', ''),
('31', 'Kabupaten Sragen', '', '', '', ''),
('32', 'Kabupaten Sukoharjo', '', '', '', ''),
('33', 'Kabupaten Tegal', '', '', '', ''),
('34', 'Kabupaten Temanggung', '', '', '', ''),
('35', 'Kabupaten Wonogiri', '', '', '', ''),
('36', 'Kabupaten Wonosobo', '', '', '', ''),
('37', 'Kota Magelang', '', '', '', ''),
('38', 'Kota Pekalongan', '', '', '', ''),
('39', 'Kota Salatiga', '', '', '', ''),
('40', 'Kota Semarang', '', '', '', ''),
('41', 'Kota Surakarta', '', '', '', ''),
('42', 'Kota Tegal', '', '', '', ''),
('43', 'Pribadi', '', '', '', ''),
('44', 'Umum', '', '', '', ''),
('45', 'Vertikal', '', '', '', '');

-- --------------------------------------------------------------

CREATE TABLE `data_tamu` (
  `id_tamu` int(9) NOT NULL,
  `nip_tamu` char(18) DEFAULT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `instansi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `data_tamu` (`id_tamu`, `nip_tamu`, `nama_tamu`, `no_hp`, `instansi`) VALUES
('1', '1995122020251003', 'Dimas Dwi Nugroho', '082135225590', '1' );
-- --------------------------------------------------------------

CREATE TABLE `data_bidang` (
  `id_bidang` int(3) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `data_bidang`
  ADD PRIMARY KEY (`id_bidang`);
--
-- Dumping data untuk tabel `DATA_BIDANG`-
INSERT INTO `data_bidang` (`id_bidang`, `nama_bidang`) VALUES
('1', 'INKA'),
('2', 'PDSK'),
('3', 'PENSIUN'),
('4', 'MUTASI'),
('5', 'UMUM');


-- ------------------------------------------------------------

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
('2', 'Sedang Konsultasi'),
('3', 'Menunggu Berkas'),
('4', 'Selesai');

-- ------------------------------------------------------------

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(3) NOT NULL,
  `nip_pegawai` varchar(18) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `bidang` char(1) DEFAULT NULL,
  `jabatan` char(2) DEFAULT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `data_pegawai` (`id_pegawai`, `nip_pegawai`, `nama_pegawai`, `bidang`, `jabatan`, `nomor_hp`) VALUES
('1', '1995122020251003', 'Nurliana Dwi Utari', '5', '3', '081352649852' );
-- --------------------------------------------------------------
-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_jabatan`
--

CREATE TABLE `jenis_jabatan` (
  `id_jabatan` char(1) NOT NULL,
  `nama_jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);
--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO `jenis_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('1', 'Pranata Komputer Ahli Pertama'),
('2', 'Pranata Komputer Ahli Madya'),
('3', 'Arsiparis');

-- --------------------------------------------------------

CREATE TABLE `user` (
  `id_user` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `roles` enum('admin','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `users`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
--
-- Dumping data untuk tabel `users`
--

INSERT INTO `user` (`id_user`, `username`, `pass`, `roles`) VALUES
('1', 'admin', 'admin', 'admin'),
('2', 'pegawai', 'pegawai', 'pegawai');

-- --------------------------------------------------------

CREATE TABLE `telepon` (
  `id_telepon` char(36) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `telepon` (`id_telepon`, `lokasi`, `nomor`) VALUES
('1', 'Resepsionis', '101');

CREATE TABLE `data_pelayanan` (
  `id_pelayanan` int(9) NOT NULL,
  `kode_pelayanan` varchar(15) NOT NULL,
  `id_tamu` int(9) NOT NULL,
  `id_bidang` int(1) DEFAULT NULL,
  `keperluan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tgl_datang` date DEFAULT NULL,
  `jam_datang` time DEFAULT NULL,
  `id_pegawai` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `data_pelayanan` (`id_pelayanan`, `kode_pelayanan`, `id_tamu`, `id_bidang`, `keperluan`, `keterangan`, `status`, `tgl_datang`, `jam_datang`, `id_pegawai`) VALUES
('1', '#KAM200325-1', '1', '5', 'Konsultasi', 'Sudah Janjian dengan bu Nurliana' ,'','','','1');
