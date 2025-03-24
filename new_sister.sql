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
('1', 'Daerah Istimewa Yogyakarta', '1', '1', '1', '1'), 
('2', 'Jawa Tengah', '1', '1', '1', '1'), 
('3', 'Kabupaten Bantul', '1', '1', '1', '1'), 
('4', 'Kabupaten Gunung Kidul', '1', '1', '1', '1'), 
('5', 'Kabupaten Kulon Progo', '1', '1', '1', '1'), 
('6', 'Kabupaten Sleman', '1', '1', '1', '1'), 
('7', 'Kota Yogyakarta', '1', '1', '1', '1'), 
('8', 'Kabupaten Banjarnegara', '1', '1', '1', '1'), 
('9', 'Kabupaten Banyumas', '1', '1', '1', '1'), 
('10', 'Kabupaten Batang', '1', '1', '1', '1'), 
('11', 'Kabupaten Blora', '1', '1', '1', '1'), 
('12', 'Kabupaten Boyolali', '1', '1', '1', '1'), 
('13', 'Kabupaten Brebes', '1', '1', '1', '1'), 
('14', 'Kabupaten Cilacap', '1', '1', '1', '1'), 
('15', 'Kabupaten Demak', '1', '1', '1', '1'), 
('16', 'Kabupaten Grobogan', '1', '1', '1', '1'), 
('17', 'Kabupaten Jepara', '1', '1', '1', '1'), 
('18', 'Kabupaten Karanganyar', '1', '1', '1', '1'), 
('19', 'Kabupaten Kebumen', '1', '1', '1', '1'), 
('20', 'Kabupaten Kendal', '1', '1', '1', '1'), 
('21', 'Kabupaten Klaten', '1', '1', '1', '1'), 
('22', 'Kabupaten Kudus', '1', '1', '1', '1'), 
('23', 'Kabupaten Magelang', '1', '1', '1', '1'), 
('24', 'Kabupaten Pati', '1', '1', '1', '1'), 
('25', 'Kabupaten Pekalongan', '1', '1', '1', '1'), 
('26', 'Kabupaten Pemalang', '1', '1', '1', '1'), 
('27', 'Kabupaten Purbalingga', '1', '1', '1', '1'), 
('28', 'Kabupaten Purworejo', '1', '1', '1', '1'), 
('29', 'Kabupaten Rembang', '1', '1', '1', '1'), 
('30', 'Kabupaten Semarang', '1', '1', '1', '1'), 
('31', 'Kabupaten Sragen', '1', '1', '1', '1'), 
('32', 'Kabupaten Sukoharjo', '1', '1', '1', '1'), 
('33', 'Kabupaten Tegal', '1', '1', '1', '1'), 
('34', 'Kabupaten Temanggung', '1', '1', '1', '1'), 
('35', 'Kabupaten Wonogiri', '1', '1', '1', '1'), 
('36', 'Kabupaten Wonosobo', '1', '1', '1', '1'), 
('37', 'Kota Magelang', '1', '1', '1', '1'), 
('38', 'Kota Pekalongan', '1', '1', '1', '1'), 
('39', 'Kota Salatiga', '1', '1', '1', '1'), 
('40', 'Kota Semarang', '1', '1', '1', '1'), 
('41', 'Kota Surakarta', '1', '1', '1', '1'), 
('42', 'Kota Tegal', '1', '1', '1', '1'), 
('43', 'Pribadi', '1', '1', '1', '1'), 
('44', 'Umum', '1', '1', '1', '1'), 
('45', 'Vertikal', '1', '1', '1', '1');

-- --------------------------------------------------------------

CREATE TABLE `data_tamu` (
  `id_tamu` int(9) NOT NULL,
  `nip_tamu` char(18) DEFAULT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `instansi` int(3) NOT NULL,
  `ket_instansi` varchar (100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `data_tamu` (`id_tamu`, `nip_tamu`, `nama_tamu`, `no_hp`, `instansi`, `ket_instansi`) VALUES
('1', '1995122020251003', 'Dimas Dwi Nugroho', '082135225590', '1', 'BKD' );
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
  `id_telepon` int(3) NOT NULL,
  `id_bidang` int(3) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nomor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `telepon` (`id_telepon`, `id_bidang`,`lokasi`, `nomor`) VALUES
('1', '1', 'Resepsionis', '101');

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
