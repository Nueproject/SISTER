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
('1', 'SIDIGI'),
('2', 'WASDAL'),
('3', 'PMA'),
('4', 'PENGANGKATAN & MUTASI'),
('5', 'STATUS & PEMBERHENTIAN'),
('6', 'TATA USAHA'),
('7', 'UPT BKN SEMARANG');


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
  `jenis_kelamin` char(1) DEFAULT NULL,
  `bidang` char(1) DEFAULT NULL,
  `jabatan` char(2) DEFAULT NULL,
  `jenis_jabatan` char(2) DEFAULT NULL,
  `golongan` char(2) DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `gelar` char(2) DEFAULT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO data_pegawai (id_pegawai, nama_pegawai, nip_pegawai, jenis_kelamin, bidang, jabatan, jenis_jabatan, golongan, status, gelar, nomor_hp, foto)
VALUES 
(1, 'RESEPSIONIS', '123456789123456789', '1','1','1', '1', '1','1','1','1','foto1.jpg'),
(2, 'Drs. PAULUS DWI LAKSONO HARJONO, MAP', '196711101993031001', '1','1', '1','1','1','1','1','1','foto2.jpg'),
(3, 'ERIKA DWI ANDININGTYAS, S.E.', '199308202019022004', '1','1','1','1', '1', '1','1','1','foto3.jpg');
-- --------------------------------------------------------------
-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` char(3) NOT NULL,
  `nama_jabatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `gelar`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);
--
-- Dumping data untuk tabel `gelar`
--

INSERT INTO jabatan (id_jabatan, nama_jabatan)
VALUES
(1, 'Struktural'),
(2, 'Fungsional'),
(3, 'Pelaksana');
--
-- Struktur dari tabel `gelar`
--

CREATE TABLE `gelar` (
  `id_gelar` char(3) NOT NULL,
  `nama_gelar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `gelar`
--
ALTER TABLE `gelar`
  ADD PRIMARY KEY (`id_gelar`);
--
-- Dumping data untuk tabel `gelar`
--

INSERT INTO gelar (id_gelar, nama_gelar)
VALUES
(1, 'Professor'),
(2, 'S3'),
(3, 'S2'),
(4, 'S1'),
(5, 'SMA/SMK'),
(6, 'SMP'),
(7, 'SD');

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_kelamin` char(3) NOT NULL,
  `nama_kelamin` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_kelamin`);
--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO jenis_kelamin (id_kelamin, nama_kelamin)
VALUES
(1, 'LAKI-LAKI'),
(2, 'PEREMPUAN');

--
-- Struktur dari tabel `jenis_status`
--

CREATE TABLE `jenis_status` (
  `id_status` char(3) NOT NULL,
  `nama_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_status`
  ADD PRIMARY KEY (`id_status`);
--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO jenis_status (id_status, nama_status)
VALUES
(1, 'PNS'),
(2, 'PPPK'),
(3, 'PPPK Paruh Waktu'),
(4, 'PPNPN'),
(5, 'PENUGASAN');


--
-- Struktur dari tabel `jenis_jabatan`
--

CREATE TABLE `jenis_jabatan` (
  `id_jenis_jabatan` char(3) NOT NULL,
  `nama_jenis_jabatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_jabatan`
  ADD PRIMARY KEY (`id_jenis_jabatan`);
--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO jenis_jabatan (id_jenis_jabatan, nama_jenis_jabatan)
VALUES
(1, 'Kepala Kantor'),
(2, 'Kepala Bagian Tata Usaha'),
(3, 'Kasubag Kepegawaian dan Pengelola Kinerja'),
(4, 'Asesor SDMA Muda'),
(5, 'Analis SDMA Pertama'),
(6, 'Analis Keuangan'),
(7, 'Arsiparis Mahir'),
(8, 'Analis Pengembangan SDM Aparatur'),
(9, 'Analis Kinerja'),
(10, 'Pengelola kepegawaian'),
(11, 'Kasubag Perencanaan & Keuangan'),
(12, 'Analis Monev & pelaporan'),
(13, 'Analis Pengelolaan Keuangan APBN Madya'),
(14, 'Analis Pengelolaan Keuangan APBN Pertama'),
(15, 'Analis Pengelolaan Keuangan APBN Muda'),
(16, 'Analis Perencanaan'),
(17, 'Bendahara Pranata Keuangan APBN'),
(18, 'Penyelia Pranata SDMA TERAMPIL'),
(19, 'Kasubag Umum'),
(20, 'Pengelola Barang Milik Negara'),
(21, 'Pranata Humas Pertama'),
(22, 'Pengelola pengadaan Barang/Jasa Pertama'),
(23, 'Pengelola Kendaraan'),
(24, 'Teknisi Peralatan, Listrik dan Elektronika'),
(25, 'Pengelola data'),
(26, 'Analis Publikasi'),
(27, 'KaBid Mutasi & Status Kepegawaian'),
(28, 'Analis Permasalahan Hukum'),
(29, 'Pranata SDMA Penyelia'),
(30, 'Pengadministrasi Kepeg'),
(31, 'Kabid Pengangkatan & Pensiun'),
(32, 'Pengelola Data'),
(33, 'Pranata SDMA Mahir'),
(34, 'Arsiparis Pertama'),
(35, 'Arsiparis Penyelia'),
(36, 'Pranata Komputer Muda'),
(37, 'Pranata Komputer Pertama'),
(38, 'Analis Data dan Informasi'),
(39, 'Pranata Komputer Mahir'),
(40, 'Analis Sistem Informasi dan Jaringan'),
(41, 'Auditor Manajemen ASN Muda'),
(42, 'Auditor Manajemen ASN Madya'),
(43, 'Asesor SDMA Pertama'),
(44, 'Asesor SDM Aparatur Muda'),
(45, 'Kepala UPT');

-- --------------------------------------------------------

CREATE TABLE `jenis_golongan` (
  `id_golongan` char(3) NOT NULL,
  `nama_golongan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_golongan`
  ADD PRIMARY KEY (`id_golongan`);
--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO jenis_golongan (id_golongan, nama_golongan)
VALUES
(1, 'I/A'),
(2, 'I/B'),
(3, 'I/C'),
(4, 'I/D'),
(5, 'II/A'),
(6, 'II/B'),
(7, 'II/C'),
(8, 'II/D'),
(9, 'III/A'),
(10, 'III/B'),
(11, 'III/C'),
(12, 'III/D'),
(13, 'IV/A'),
(14, 'IV/B'),
(15, 'IV/C'),
(16, 'IV/D'),
(17, 'IV/E'),
(18, 'Golongan I'),
(19, 'Golongan II'),
(20, 'Golongan III'),
(21, 'Golongan IV'),
(22, 'Golongan V'),
(23, 'Golongan VI'),
(24, 'Golongan VII'),
(25, 'Golongan VIII'),
(26, 'Golongan IX'),
(27, 'Golongan X'),
(28, 'Golongan XI'),
(29, 'Golongan XII'),
(30, 'Golongan XIII'),
(31, 'Golongan XIV'),
(32, 'Golongan XV');

-- --------------------------------------------------------
CREATE TABLE `user` (
  `id_user` char(36) NOT NULL,
  `nama_resepsionis` varchar(255) NOT NULL,
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

INSERT INTO `user` (`id_user`, `nama_resepsionis`,`username`, `pass`, `roles`) VALUES
('1', 'ngadimin', 'admin', 'admin', 'admin'),
('2', 'Fransisca Trigiasmi', 'siska', '123456', 'pegawai'),
('3', 'Dimas Dwi N', 'dimas', 'rahasia', 'admin'),
('4', 'Sri Haryanti', 'yanti', 'yanti', 'pegawai');

-- --------------------------------------------------------

CREATE TABLE `telepon` (
  `id_telepon` int(3) NOT NULL,
  `id_bidang` int(3) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nomor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO telepon (id_telepon, id_bidang, lokasi, nomor)
VALUES
(1, 1, 'OPERATOR', '101'),
(2, 1, 'ARSIP EKSPEDISI', '697'),
(3, 1, 'DRIVER', '504'),
(4, 1, 'KA SUB BAGIAN UMUM', '504'),
(5, 1, 'DOKPEN', '254'),
(6, 1, 'LOKET 1 PENSIUN', '681'),
(7, 1, 'LOKET 2 MUTASI', '682'),
(8, 1, 'KABID BIMTEK', '106'),
(9, 1, 'PDSK', '107'),
(10, 1, 'INKA BAWAH SELATAN', '121'),
(11, 1, 'INKA BAWAH UTARA', '108'),
(12, 1, 'KOPERASI', '110'),
(13, 1, 'GUDANG ATK', '113'),
(14, 1, 'POS SATPAM', '256'),
(15, 1, 'SATPAM DEPAN', ''),
(16, 1, 'KAKANREG', '203'),
(17, 1, 'SEK KAKANREG', '202'),
(18, 1, 'UP / KEPEGAWAIAN', '205'),
(19, 1, 'ULP', '206'),
(20, 1, 'KEUANGAN', '204'),
(21, 1, 'KABAG TATA USAHA', '201'),
(22, 1, 'KABID MUTASI', '207'),
(23, 1, 'MUTASI (UTARA)', '208'),
(24, 1, 'MUTASI (TENGAH)', '209'),
(25, 1, 'MUTASI (SELATAN)', '210'),
(26, 1, 'MUTASI (TU)', '211'),
(27, 1, 'POLIKLINIK', '684'),
(28, 1, 'KABID INKA', '307'),
(29, 1, 'INKA BARAT1', '315'),
(30, 1, 'INKA BARAT2', '315'),
(31, 1, 'INKA TIMUR1', '304'),
(32, 1, 'INKA TIMUR2', '305'),
(33, 1, 'KABID PENSIUN', '301'),
(34, 1, 'PENSIUN SELATAN', '302'),
(35, 1, 'PENSIUN UTARA', '698'),
(36, 1, 'CAT GEDUNG ARSIP', '407'),
(37, 1, 'TU ASSESMENT', '683');

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
