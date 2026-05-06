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

INSERT INTO data_pegawai (id_pegawai, nama_pegawai, nip_pegawai, jenis_kelamin, bidang, jabatan, jenis_jabatan, golongan, status, gelar, nomor_hp, foto) VALUES
(1, 'SRI WIDAYANTI, S.H., M.M.', '196704231993032001', 2, 6, 1, 1, 16, 1, 3, '08123', '196704231993032001.jpg'),
(2, 'IWAN SETYO PRIHATIN, SH., M.A.P', '197708311997031000', 1, 6, 1, 2, 14, 1, 3, '08123', '197708311997031000.jpg'),
(3, 'ARI WIBAWA , SE, M.AP.', '198511072015031001', 1, 6, 1, 3, 12, 1, 3, '08123', '198511072015031001.jpg'),
(4, 'JUMALI, S.I.P', '197701072010121000', 1, 6, 2, 4, 10, 1, 4, '08123', '197701072010121000.jpg'),
(5, 'APRIYANI, SE', '198404072006042000', 2, 6, 2, 5, 12, 1, 4, '08123', '198404072006042000.jpg'),
(6, 'DIAN KUSUMA WARDHANI,A.Md', '198108162008012000', 2, 6, 2, 6, 11, 1, 5, '08123', '198108162008012000.jpg'),
(7, 'DODY RAHMAT SHOLIHIN, S.IP, MPA', '198812252019021002', 1, 6, 2, 7, 11, 1, 3, '08123', '198812252019021002.jpg'),
(8, 'NOVANDA FATIH HARDANTI, S.Psi., M.Psi., Psikolog', '199511302022032000', 2, 6, 2, 5, 10, 1, 3, '08123', '199511302022032000.jpg'),
(9, 'ACHID ANUGRAHANTO, S.E.', '199106142020121008', 1, 6, 2, 5, 10, 1, 4, '08123', '199106142020121008.jpg'),
(10, 'RADEN RARA FITRI WIKANDARI, S.I.Kom.', '198407092015032002', 2, 6, 2, 8, 10, 1, 4, '08123', '198407092015032002.jpg'),
(11, 'VICTORRIANUS BAGUS WINDA KURINIAWAN, S.Si.', '197703232008011000', 1, 6, 2, 9, 12, 1, 4, '08123', '197703232008011000.jpg'),
(12, 'MUHAMMAD ROBI SETIAWAN, S.AB.', '199508092020121000', 1, 6, 2, 10, 10, 1, 4, '08123', '199508092020121000.jpg'),
(13, 'NINIK SETYORINI, SE', '197804222006042000', 2, 6, 2, 11, 12, 1, 4, '08123', '197804222006042000.jpg'),
(14, 'VIVILIA KUSUMA JAYANTIE BASUKI, S.E., M.M.', '198510182014022003', 2, 6, 2, 12, 10, 1, 4, '08123', '198510182014022003.jpg'),
(15, 'DIYAH RACHMAWATI HASMAMY, SE', '198405202015032000', 2, 6, 2, 5, 11, 1, 4, '08123', '198405202015032000.jpg'),
(16, 'RETNO MILIASIH, S.E., M.E.', '197507212006042001', 2, 6, 2, 13, 13, 1, 3, '08123', '197507212006042001.jpg'),
(17, 'RIAN USMAWATI, S.E.', '198306062015032002', 2, 6, 2, 14, 11, 1, 4, '08123', '198306062015032002.jpg'),
(18, 'EVI RISTIANA, SE', '198606262008012000', 2, 6, 2, 15, 11, 1, 4, '08123', '198606262008012000.jpg'),
(19, 'FERA TRESNAWATI, M. Acc.', '199302202020122004', 2, 6, 2, 5, 10, 1, 3, '08123', '199302202020122004.jpg'),
(20, 'HANDRIAN RAHMADANA, S.I.P', '198903042022031003', 1, 6, 2, 5, 10, 1, 4, '08123', '198903042022031003.jpg'),
(21, 'AULIA TRI HASTUTI WULANDARI, A.Md.Kb.N', '200006152022022001', 2, 6, 2, 5, 8, 1, 5, '08123', '200006152022022001.jpg'),
(22, 'SUHERI WIDOYOKO, SE', '198004202015031002', 1, 6, 2, 16, 11, 1, 4, '08123', '198004202015031002.jpg'),
(23, 'ALIFVIA SEZA FITRIANA, A.Md.Kb.N.', '200010092022022000', 2, 6, 2, 9, 7, 1, 5, '08123', '200010092022022000.jpg'),
(24, 'SUNARKO, A.Md.Pas.', '199002272023211017', 1, 6, 2, 17, 24, 2, 5, '08123', '199002272023211017.jpg'),
(25, 'GUNAWAN, S.IP.', '197302171999021000', 1, 6, 1, 18, 11, 1, 4, '08123', '197302171999021000.jpg'),
(26, 'SOFIKA WAHDANI WIJAYANTI, S.Sn.', '198605102018012000', 2, 6, 2, 19, 10, 5, 4, '08123', '198605102018012000.jpg'),
(27, 'MAJID SETIYAWAN', '197907062002121000', 1, 6, 2, 20, 10, 1, 6, '08123', '197907062002121000.jpg'),
(28, 'RIA GUNAWAN, A.Md', '198507092009121000', 1, 6, 2, 20, 11, 1, 5, '08123', '198507092009121000.jpg'),
(29, 'HANUM SOFIA NUR MERJANTI, S.IP', '199009232019022004', 2, 6, 2, 21, 10, 1, 4, '08123', '199009232019022004.jpg'),
(30, 'MELA MELATI, S. Tr. S. I.', '199205152014022000', 2, 6, 2, 12, 10, 1, 4, '08123', '199205152014022000.jpg'),
(31, 'SUHADI ROHANI', '197409152006041004', 1, 6, 2, 20, 10, 1, 6, '08123', '197409152006041004.jpg'),
(32, 'IMAM SUPARDI, A.Md', '198408062015031000', 1, 6, 2, 9, 9, 1, 5, '08123', '198408062015031000.jpg'),
(33, 'EVI DARYANTI, A.Md.', '199510242025062001', 2, 6, 2, 22, 7, 1, 5, '08123', '199510242025062001.jpg'),
(34, 'BAGAS SANTOSA NUGRAHA, S.Tr.T.', '200209112025061001', 1, 6, 2, 23, 9, 1, 4, '08123', '200209112025061001.jpg'),
(35, 'LUTHFAN DARMAWAN, S.T.', '200001122025061001', 1, 6, 2, 23, 9, 1, 4, '08123', '200001122025061001.jpg'),
(36, 'AYU TRIANA SETYANINGRUM, A.Md.', '199610112025062002', 2, 6, 2, 24, 7, 1, 5, '08123', '199610112025062002.jpg'),
(37, 'THERESIA NATALIA SABU SUMA TUKAN, S.E.', '199509152020122010', 2, 6, 2, 25, 10, 5, 4, '08123', '199509152020122010.jpg'),
(38, 'BURHAN ISLAMI A, S.I.Kom., M.A.', '199505152019021003', 1, 6, 2, 19, 10, 5, 3, '08123', '199505152019021003.jpg'),
(39, 'MUHAMMAD FATCHAN HELVIAN, A.Md.Vet.', '199712232024211000', 1, 6, 2, 26, 24, 2, 5, '08123', '199712232024211000.jpg'),
(40, 'MUHAMMAD SIDIQ NOVIANTORO, A.Md', '198111072024211003', 1, 6, 2, 26, 24, 2, 5, '08123', '198111072024211003.jpg'),
(41, 'NURLIANA DWI UTARI, A.Md.', '199511152024212024', 2, 6, 2, 26, 24, 2, 5, '08123', '199511152024212024.jpg'),
(42, 'ACHMAD SIDIQ ASAD, S.Pd', '199502282025211000', 1, 6, 2, 27, 26, 2, 4, '08123', '199502282025211000.jpg'),
(43, 'AZOLLA SILVIANI, S.Sos.', '199010012025212000', 2, 6, 2, 27, 26, 2, 4, '08123', '199010012025212000.jpg'),
(44, 'DIMAS DWI NUGROHO, S.Kom', '199512202025211000', 1, 6, 2, 27, 26, 2, 4, '08123', '199512202025211000.jpg'),
(45, 'FRANSISCA TRIGIASMI, S.Pd.', '199605242025212000', 2, 6, 2, 27, 26, 2, 4, '08123', '199605242025212000.jpg'),
(46, 'EKO ISWANDONO', '198611192025211000', 1, 6, 2, 28, 22, 2, 6, '08123', '198611192025211000.jpg'),
(47, 'SULISTYO NUGROHO', '199002092025211000', 1, 6, 2, 29, 22, 2, 6, '08123', '199002092025211000.jpg'),
(48, 'DWI HARYONO, S.H.', '196902061993031000', 1, 4, 2, 30, 14, 1, 4, '08123', '196902061993031000.jpg'),
(49, 'ENDAH SARI RAHAYU, S.E.', '197210181993032000', 2, 4, 2, 30, 14, 1, 4, '08123', '197210181993032000.jpg'),
(50, 'MOH. HUSAENI, S.IP', '196906161994031000', 1, 4, 2, 30, 13, 1, 4, '08123', '196906161994031000.jpg'),
(51, 'SUYATNO, S.E.,  M.M.', '197403231999021000', 1, 4, 2, 30, 13, 1, 3, '08123', '197403231999021000.jpg'),
(52, 'ANDAYANI, S.Sos', '196709271987112000', 2, 4, 2, 30, 13, 1, 4, '08123', '196709271987112000.jpg'),
(53, 'SUWANTO, S.Sos', '196910121990081000', 1, 4, 2, 7, 12, 1, 4, '08123', '196910121990081000.jpg'),
(54, 'AGUS WIDODO, S.Sos', '198204012008011000', 1, 4, 2, 7, 11, 1, 4, '08123', '198204012008011000.jpg'),
(55, 'DEDY HERMAWAN, S.A.P.', '198705032009121000', 1, 4, 2, 31, 11, 1, 4, '08123', '198705032009121000.jpg'),
(56, 'TRIANI MEILANI, SAP.', '198205182008012000', 2, 4, 2, 4, 11, 1, 4, '08123', '198205182008012000.jpg'),
(57, 'NORIN MUSTIKA RAHADIRI ABHESEKA, S.I.P.', '199410262020122007', 2, 4, 2, 4, 10, 1, 4, '08123', '199410262020122007.jpg'),
(58, 'HANKENINA DEAFINOLA, S.I.P', '199702052022032010', 2, 4, 2, 4, 10, 1, 4, '08123', '199702052022032010.jpg'),
(59, 'MUHAMMAD AJI SUKMA, S.M.', '199610232020121005', 1, 4, 2, 4, 10, 1, 4, '08123', '199610232020121005.jpg'),
(60, 'DHEA APTA MONICA, S.A.P', '199812032022032000', 2, 4, 2, 4, 10, 1, 4, '08123', '199812032022032000.jpg'),
(61, 'LAILYTA KHAIRINNISA, S.M', '199702262022032000', 2, 4, 2, 4, 10, 1, 4, '08123', '199702262022032000.jpg'),
(62, 'MUHAMMAD CHANDRA ADIWIGUNA, S.M.', '199508062020121005', 1, 4, 2, 4, 10, 1, 4, '08123', '199508062020121005.jpg'),
(63, 'AHMAD YURIYANTO, S.A.P', '199301082015031000', 1, 4, 2, 32, 10, 1, 5, '08123', '199301082015031000.jpg'),
(64, 'JUNIARTO SETYO BUDHI, A.Md', '197906122014021000', 1, 4, 2, 33, 10, 1, 5, '08123', '197906122014021000.jpg'),
(65, 'DIAS TRIYADI, SE', '197810032009121000', 1, 4, 2, 4, 12, 1, 4, '08123', '197810032009121000.jpg'),
(66, 'BADARNO', '196906181992031000', 1, 4, 2, 34, 10, 1, 6, '08123', '196906181992031000.jpg'),
(67, 'SUTARTO', '197801071999021000', 1, 4, 2, 34, 10, 1, 6, '08123', '197801071999021000.jpg'),
(68, 'FATIMA HANA FITRIATI, S.I.P.', '199503112019022000', 2, 4, 2, 7, 10, 1, 4, '08123', '199503112019022000.jpg'),
(69, 'LIA BUNYATI, A.Md.A.Pkt', '199209092024212000', 2, 4, 2, 17, 24, 2, 5, '08123', '199209092024212000.jpg'),
(70, 'NDARI WAHYUNINGSIH, A.Md.Sek.', '199606062023212000', 2, 4, 2, 17, 24, 2, 5, '08123', '199606062023212000.jpg'),
(71, 'WIJI LESTARI, A.Md.Kom.', '199701072024212028', 0, 4, 2, 17, 24, 2, 5, '08123', '199701072024212028.jpg'),
(72, 'SITI ZUNTIKHANAH, A.Md.', '198102282024212007', 2, 4, 2, 35, 24, 2, 5, '08123', '198102282024212007.jpg'),
(73, 'TOFIK RIYADI, A.Md.', '198108142024211002', 1, 4, 2, 35, 24, 2, 5, '08123', '198108142024211002.jpg'),
(74, 'INA RESTI FAUZI, A.Md', '199408012023212000', 2, 4, 2, 26, 24, 2, 5, '08123', '199408012023212000.jpg'),
(75, 'SUKISNA, S.H., M.M.', '196801271987111000', 1, 5, 2, 30, 15, 1, 3, '08123', '196801271987111000.jpg'),
(76, 'SRI NARIYA, S.IP', '196606111986031000', 1, 5, 2, 30, 13, 1, 4, '08123', '196606111986031000.jpg'),
(77, 'TRI WIHARJANTI, S.IP', '197509151998032001', 2, 5, 2, 30, 13, 1, 4, '08123', '197509151998032001.jpg'),
(78, 'KUN BUDI WURYANI, S.IP.MM ', '196712201987112000', 2, 5, 2, 30, 13, 1, 3, '08123', '196712201987112000.jpg'),
(79, 'ENDANG PURWATI, S.Sos', '197112291998032000', 2, 5, 2, 30, 13, 1, 4, '08123', '197112291998032000.jpg'),
(80, 'RINI, SE', '198310162002112001', 2, 5, 2, 7, 12, 1, 4, '08123', '198310162002112001.jpg'),
(81, 'SUHARTONO, S.Sos', '197002171992031000', 1, 5, 2, 30, 13, 1, 4, '08123', '197002171992031000.jpg'),
(82, 'AHMAD BUDI SUTRISNA', '197107111993031000', 1, 5, 2, 31, 11, 1, 6, '08123', '197107111993031000.jpg'),
(83, 'ATHO` ZULIANTA, S.IP', '197507272006041000', 1, 5, 2, 4, 10, 1, 4, '08123', '197507272006041000.jpg'),
(84, 'ELISA FIRDA AMALIA, S.E.', '199512062020122011', 2, 5, 2, 4, 10, 1, 4, '08123', '199512062020122011.jpg'),
(85, 'FITRIA TAHTA MAULA, S.H.', '199710072020122012', 2, 5, 2, 4, 10, 1, 4, '08123', '199710072020122012.jpg'),
(86, 'BAYU PRASTIANTO,S.E', '199405162022031004', 1, 5, 2, 4, 10, 1, 4, '08123', '199405162022031004.jpg'),
(87, 'AMIR  NUGROHO', '197404172000121000', 1, 5, 2, 32, 9, 1, 6, '08123', '197404172000121000.jpg'),
(88, 'SUPARGIYANTO, S.SOS', '196805171996031001', 1, 5, 2, 36, 12, 1, 4, '08123', '196805171996031001.jpg'),
(89, 'PUJI AGUNG SUPADI, A.Md', '196904091998031000', 1, 5, 2, 9, 11, 1, 5, '08123', '196904091998031000.jpg'),
(90, 'RIZAL BUDIYANTO, A.Md.T.', '199208032024211019', 1, 5, 2, 17, 24, 2, 5, '08123', '199208032024211019.jpg'),
(91, 'ERNI PAJARWATI, A.Md.', '198606012024212015', 2, 5, 2, 17, 24, 2, 5, '08123', '198606012024212015.jpg'),
(92, 'ANANG PIKUKUH PURWOKO, SE, M.M.', '197707302008121000', 1, 3, 2, 30, 13, 1, 3, '08123', '197707302008121000.jpg'),
(93, 'DELI INDRA WAHYUDI, SH, M.M.', '197609231998031000', 1, 3, 2, 30, 14, 1, 3, '08123', '197609231998031000.jpg'),
(94, 'DEWI FAUZIYATI, S.Psi, M.A.', '198412292010122000', 2, 3, 2, 30, 13, 1, 3, '08123', '198412292010122000.jpg'),
(95, 'ADI WIBOWO, SH', '198512252014021000', 1, 3, 2, 30, 13, 1, 4, '08123', '198512252014021000.jpg'),
(96, 'RANI ADHITA NANDURI SIREGAR, SH, MIR., MIL.', '198708122014022000', 2, 3, 2, 7, 12, 1, 3, '08123', '198708122014022000.jpg'),
(97, 'NELLY ELIANINGTYAS, S.M.', '199603212022032000', 2, 3, 2, 4, 10, 1, 4, '08123', '199603212022032000.jpg'),
(98, 'SEPSA KUSUMAWARDANI, S.M.', '199809012022032000', 2, 3, 2, 4, 10, 1, 4, '08123', '199809012022032000.jpg'),
(99, 'ETSA JUWITA SARI, SH', '199304232018012003', 2, 3, 2, 37, 10, 1, 4, '08123', '199304232018012003.jpg'),
(100, 'ADITYA PRAMUDITO, S.Psi', '199412022019021000', 1, 3, 2, 4, 10, 1, 4, '08123', '199412022019021000.jpg'),
(101, 'MUHAMMAD ADDRES AKMALUDDIN, S.H.', '199806222025061001', 1, 3, 2, 38, 9, 1, 4, '08123', '199806222025061001.jpg'),
(102, 'ARIF RAHMAD YULIA MUSTAFA, S.A.P.', '198607062014021001', 1, 3, 2, 4, 9, 1, 4, '08123', '198607062014021001.jpg'),
(103, 'TIN YUNIATI, S.Psi ', '197806182008012000', 2, 3, 2, 39, 12, 1, 4, '08123', '197806182008012000.jpg'),
(104, 'YUSSI HENDRAYANTI, S.SOS', '197406101998032000', 2, 3, 2, 39, 12, 1, 4, '08123', '197406101998032000.jpg'),
(105, 'AYA SALIKHA SUBAGYO, S.Psi', '199212112015032000', 2, 3, 2, 39, 11, 1, 4, '08123', '199212112015032000.jpg'),
(106, 'GILANG ARTHYO LUMAKSONO, S.Psi', '198507052015031001', 1, 3, 2, 39, 11, 1, 4, '08123', '198507052015031001.jpg'),
(107, 'AULIA ROKHMAH, SE', '198201282015032000', 2, 3, 2, 39, 10, 1, 4, '08123', '198201282015032000.jpg'),
(108, 'ANDHANI HARISHA CHABIB, S.Psi, M.Psi, Psikolog', '198804212019021001', 1, 3, 2, 40, 10, 1, 3, '08123', '198804212019021001.jpg'),
(109, 'MAHDA DALUAS WIDAYANI, A.Md.', '199507152024212029', 2, 3, 2, 17, 24, 2, 5, '08123', '199507152024212029.jpg'),
(110, 'CICIH LASMIYATI, S.Sos. M.Si.', '198508062008122000', 2, 2, 2, 41, 13, 1, 3, '08123', '198508062008122000.jpg'),
(111, 'TUTIK WINARTI, S.IP.  M.Si.', '196705281987112000', 2, 2, 2, 41, 13, 1, 3, '08123', '196705281987112000.jpg'),
(112, 'BS.SURYANINGSIH HANDAYANI, S.Sos', '196612101987112000', 2, 2, 2, 41, 13, 1, 4, '08123', '196612101987112000.jpg'),
(113, 'EKA PANGESTUTI, S.IP, M.P.A', '198609032009122001', 2, 2, 2, 42, 13, 1, 3, '08123', '198609032009122001.jpg'),
(114, 'RIDLOWI, S.Sos. MA.', '198204052009121000', 1, 2, 2, 42, 12, 1, 3, '08123', '198204052009121000.jpg'),
(115, 'ENI ISNIWATI, S.IP.,  M.M.', '196906111997032000', 2, 2, 2, 41, 13, 1, 3, '08123', '196906111997032000.jpg'),
(116, 'ALBERTUS TRIKUMORO, S.H.', '196812151987111000', 1, 2, 2, 42, 12, 1, 4, '08123', '196812151987111000.jpg'),
(117, 'RUSMIN NURYADIN, SE', '197212011993031000', 1, 2, 2, 42, 12, 1, 4, '08123', '197212011993031000.jpg'),
(118, 'IBNU SUTRIYANTO, S.IP', '197203121993031000', 1, 2, 2, 42, 11, 1, 4, '08123', '197203121993031000.jpg'),
(119, 'BINTARI RURANTI WISARINI, S.A.P', '197901222000032000', 2, 2, 2, 43, 11, 1, 4, '08123', '197901222000032000.jpg'),
(120, 'LATIFAH, SE', '197610082008012000', 2, 2, 2, 43, 11, 1, 4, '08123', '197610082008012000.jpg'),
(121, 'TRIA MERINA CAHYADEWI, M. Acc.', '199304082020122010', 2, 2, 2, 43, 10, 1, 3, '08123', '199304082020122010.jpg'),
(122, 'NUR ICHSANUDIN, S.I.P', '199407282022031003', 1, 2, 2, 43, 10, 1, 4, '08123', '199407282022031003.jpg'),
(123, 'RIDWAN KUSUMA MAWARDANI, S.H.', '199108142022031000', 1, 2, 2, 43, 10, 1, 4, '08123', '199108142022031000.jpg'),
(124, 'REZA INDRIANTO, S.Sos.', '199601182025061001', 1, 2, 2, 44, 9, 1, 4, '08123', '199601182025061001.jpg'),
(125, 'STEPHANUS FIRMANTO T, S.Kom', '196804171994031000', 1, 1, 2, 45, 13, 1, 4, '08123', '196804171994031000.jpg'),
(126, 'KASTIYAH YOHANA, S.H, M.M.', '196807311987112000', 2, 1, 2, 46, 13, 1, 3, '08123', '196807311987112000.jpg'),
(127, 'BAYU WIDYO HASTORO, S.Sos', '197302252001121001', 1, 1, 2, 7, 12, 1, 4, '08123', '197302252001121001.jpg'),
(128, 'Y. SOETONO, S.Sos', '196808101993031000', 1, 1, 2, 7, 12, 1, 4, '08123', '196808101993031000.jpg'),
(129, 'TRIAS PURNOMO, S.Kom.', '198106152006041005', 1, 1, 2, 7, 12, 1, 4, '08123', '198106152006041005.jpg'),
(130, 'AGUS SALIM, S.IP', '197308112000031000', 1, 1, 2, 7, 12, 1, 4, '08123', '197308112000031000.jpg'),
(131, 'ADI CHANDRA NEGARA, S.Sos, MM', '198606272008121000', 1, 1, 2, 7, 12, 1, 3, '08123', '198606272008121000.jpg'),
(132, 'AROHMAN SHOLEH, S.Kom.', '198502192009121001', 1, 1, 2, 47, 12, 1, 4, '08123', '198502192009121001.jpg'),
(133, 'HANIF RAHMAWAN, S.Kom. M.Cs', '198403302009121000', 1, 1, 2, 47, 12, 1, 3, '08123', '198403302009121000.jpg'),
(134, "SA'DIYAH NOOR NOVITA  ALFISAHRIN, S.Kom, M.Kom.", '198408092015032001', 2, 1, 2, 47, 11, 1, 3, '08123', '198408092015032001.jpg'),
(135, 'SUYANTI', '196807051991032000', 2, 1, 2, 31, 12, 1, 6, '08123', '196807051991032000.jpg'),
(136, 'AAN CANDRA ROKHANI, A.Md', '197301092000032000', 2, 1, 2, 6, 12, 1, 5, '08123', '197301092000032000.jpg'),
(137, 'SUMANTRI, S.IP.', '197206081993031000', 1, 1, 2, 6, 12, 1, 4, '08123', '197206081993031000.jpg'),
(138, 'VIVID SUDIARTO, S.Kom', '197906212000031000', 1, 1, 2, 48, 10, 1, 4, '08123', '197906212000031000.jpg'),
(139, 'SRI LESTARI, S.Kom', '198907052019022007', 2, 1, 2, 48, 10, 1, 4, '08123', '198907052019022007.jpg'),
(140, 'INDRI RISANTI TAUFIQ, ST', '198412082019022002', 2, 1, 2, 48, 10, 1, 4, '08123', '198412082019022002.jpg'),
(141, 'MUHAMAD IMAM SETYAWAN, S.Kom', '199204042019021004', 1, 1, 2, 48, 10, 1, 4, '08123', '199204042019021004.jpg'),
(142, 'MAGHFlRA MAULANI, S.Kom.', '199511082022032000', 2, 1, 2, 12, 10, 1, 4, '08123', '199511082022032000.jpg'),
(143, 'YASITA YULIANA SARI, S.S.T.Ars.', '199207142015032002', 2, 1, 2, 12, 9, 1, 4, '08123', '199207142015032002.jpg'),
(144, 'BRIGIDA ARIE MINARTININGTYAS,S.Kom., M.Kom.', '198702012022032001', 2, 1, 2, 12, 10, 1, 3, '08123', '198702012022032001.jpg'),
(145, 'SULPICIUS SUHERYANTO, S.AP', '198004192014021001', 1, 1, 2, 12, 9, 1, 4, '08123', '198004192014021001.jpg'),
(146, 'WENING PRASETYO PAMEKAS, S.AP', '199003092014022006', 2, 1, 2, 12, 10, 1, 4, '08123', '199003092014022006.jpg'),
(147, 'SONY SATYA NUGRAHA, S.Kom.', '198503062010121000', 1, 1, 2, 49, 11, 1, 4, '08123', '198503062010121000.jpg'),
(148, 'NISMA DEWI PRAPTANI, S.S.T.Ars. ', '199208182014022001', 2, 1, 2, 12, 10, 1, 4, '08123', '199208182014022001.jpg'),
(149, 'SURYANTA', '196810061992031000', 1, 1, 2, 33, 10, 1, 6, '08123', '196810061992031000.jpg'),
(150, 'EKO MARTIYANTO PRAYOGI', '197702221998031000', 1, 1, 2, 33, 10, 1, 6, '08123', '197702221998031000.jpg'),
(151, 'ISNAINI ARDI SAPUTRA, S.Si.', '198807232020121000', 1, 1, 2, 50, 10, 1, 4, '08123', '198807232020121000.jpg'),
(152, 'ANNISA ARTI JAYANTI, S.Kom.', '199411212022032000', 2, 1, 2, 50, 10, 1, 4, '08123', '199411212022032000.jpg'),
(153, 'FIDDYANTO HIDAYAT, S, Kom.', '197902252008121000', 1, 1, 2, 50, 11, 1, 4, '08123', '197902252008121000.jpg'),
(154, 'MIFTAHUL ULUM, S.Kom.', '199009082022031000', 1, 1, 2, 50, 10, 1, 4, '08123', '199009082022031000.jpg'),
(155, 'AGUSTIN AYU KUSUMAWATI, S.Si., M.E.K.K.', '199208192015032000', 2, 1, 2, 50, 11, 1, 3, '08123', '199208192015032000.jpg'),
(156, 'TARMIJAH', '196806041987112000', 2, 1, 2, 9, 10, 1, 6, '08123', '196806041987112000.jpg'),
(157, 'FERI BENING PRIHONO, S.Kom.', '199111212024211000', 1, 1, 2, 48, 26, 2, 4, '08123', '199111212024211000.jpg'),
(158, 'NASRUL KURNIAWAN, A.Md.', '198608202023211000', 1, 1, 2, 35, 24, 2, 5, '08123', '198608202023211000.jpg'),
(159, 'DEFI MARDIKASARI, A.Md.', '198603212024212017', 2, 1, 2, 26, 24, 2, 5, '08123', '198603212024212017.jpg'),
(160, 'WINDI LESTARI, A.Md.A.B.', '199502182024212023', 2, 1, 2, 26, 24, 2, 5, '08123', '199502182024212023.jpg'),
(161, 'AHYU WULANDARI, S.Kom', '196805101994032001', 2, 7, 2, 51, 12, 1, 4, '08123', '196805101994032001.jpg'),
(162, 'SHINTA TRI WINDARTI, A.Md', '198811042015032007', 2, 7, 2, 52, 10, 1, 5, '08123', '198811042015032007.jpg'),
(163, 'HIDAYATULLOH HASANI, S.A.P', '198610072015031004', 1, 7, 2, 32, 10, 1, 4, '08123', '198610072015031004.jpg'),
(164, 'DWI FIRSAYANTI, S.Sos', '199001132010122000', 2, 7, 2, 5, 11, 1, 4, '08123', '199001132010122000.jpg'),
(165, 'FATHAN HUDYAUSSIE SANTOSO, S.T.', '200005302025061004', 1, 7, 2, 53, 9, 1, 4, '08123', '200005302025061004.jpg'),
(166, 'NURUL IFTIANA, A.Md.Sek.', '199603202025062002', 2, 7, 2, 22, 7, 1, 5, '08123', '199603202025062002.jpg'),
(167, 'VITARA CINTA TRIA HANIFA, A.Md.', '200207252025062003', 2, 7, 2, 22, 7, 1, 5, '08123', '200207252025062003.jpg'),
(168, 'FATKHIYA FIRDAUSY NUZULIA SURYONEGORO, A.Md.Kom.', '200304032025062001', 2, 7, 2, 54, 7, 1, 5, '08123', '200304032025062001.jpg'),
(169, 'IBNU NAUFAL, A.Md.Kom.', '199909222025061002', 1, 7, 2, 54, 7, 1, 5, '08123', '199909222025061002.jpg'),
(170, 'MUCHAMAD RAGIL SAPUTRA, A.Md.Kom.', '199501042025061001', 1, 7, 2, 54, 7, 1, 5, '08123', '199501042025061001.jpg'),
(171, 'AHMAD ALI AZHARY, A.Md.Kom.', '199907252025061001', 1, 7, 2, 55, 7, 1, 5, '08123', '199907252025061001.jpg'),
(172, 'LAILA ZORAYA AHMAD, A.Md.', '199004102025062001', 2, 7, 2, 55, 7, 1, 5, '08123', '199004102025062001.jpg'),
(173, 'AGUS AHMAD KHOIR, S.Kom.', '199708202025061001', 1, 7, 2, 56, 9, 1, 4, '08123', '199708202025061001.jpg'),
(174, 'ARDI NUR HANDOYO MUKTI, S.Kom.', '200102022025061001', 1, 7, 2, 56, 9, 1, 4, '08123', '200102022025061001.jpg'),
(175, 'M. FAQIH FAJRUNNAJA, S.T.', '200009012025061005', 1, 7, 2, 23, 9, 1, 4, '08123', '200009012025061005.jpg'),
(176, 'MUHAMMAD ADITYA MH, A.Md.', '199807012025061002', 1, 7, 2, 24, 7, 1, 5, '08123', '199807012025061002.jpg'),
(177, 'ERIKA DWI ANDININGTYAS, S.E.', '199308202019022000', 2, 7, 2, 57, 10, 5, 4, '08123', '199308202019022000.jpg'),
(178, 'PUTUT DWI SULISTYANTO, S.Sos.,M.M.', '196910261995111001', 1, 7, 2, 42, 12, 1, 3, '08123', '196910261995111001.jpg'),
(179, 'AHMAD KOMARUDIN', '198804042025211044', 1, 7, 2, 29, 22, 2, 6, '08123', '198804042025211044.jpg');
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
(5, 'DIII'),
(6, 'SMA/SMK/SLTA'),
(7, 'SMP'),
(8, 'SD');

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

INSERT INTO jenis_jabatan (id_jenis_jabatan, nama_jenis_jabatan) VALUES
(1, 'Kepala Kantor'),
(2, 'Kepala Bagian Tata Usaha'),
(3, 'Kasubag Kepegawaian'),
(4, 'Analis Sumber Daya Manusia Aparatur Ahli Pertama'),
(5, 'Penelaah Teknis Kebijakan'),
(6, 'Arsiparis Penyelia'),
(7, 'Analis Sumber Daya Manusia Aparatur Ahli Muda'),
(8, 'Pranata SDM Mahir'),
(9, 'Pengolah Data dan Informasi'),
(10, 'Analis Sumber Daya Manusia Aparatur Ahli Pertama'),
(11, 'Kasubag Perencanaan dan Keuangan'),
(12, 'Arsiparis Ahli Pertama'),
(13, 'Analis Peng Keu APBN Madya'),
(14, 'Analis Peng Keu APBN Pertama'),
(15, 'Analis Peng Keu APBN Muda'),
(16, 'Pranata Keuangan APBN Penyelia'),
(17, 'Pranata Sumber Daya Manusia Aparatur Terampil'),
(18, 'Kasubag Umum'),
(19, 'Pranata Humas Ahli Muda'),
(20, 'Pengelola Layanan Operasional'),
(21, 'Pranata Humas Ahli Pertama'),
(22, 'Arsiparis Keterampilan'),
(23, 'Teknisi Sarana dan Prasarana'),
(24, 'Pengelola Keprotokolan'),
(25, 'Pengelola pengadaan Barang/Jasa Pertama'),
(26, 'Arsiparis Terampil'),
(27, 'Penata Layanan Operasional'),
(28, 'Pengadministrasi Perkantoran'),
(29, 'Operator Layanan Operasional'),
(30, 'Analis Sumber Daya Manusia Aparatur Ahli Madya'),
(31, 'Pranata Sumber Daya Manusia Aparatur Penyelia'),
(32, 'Pranata Sumber Daya Manusia Aparatur Mahir'),
(33, 'Arsiparis Mahir'),
(34, 'Pengadministrasi Perkantoran'),
(35, 'Pranata Komputer Terampil'),
(36, 'Penata Kelola Hukum dan Perundang-Undangan'),
(37, 'Penata Kelola Hukum dan Perundang-Undangan'),
(38, 'Analis Hukum Keahlian'),
(39, 'Asesor Sumber Daya Manusia Aparatur Ahli Muda'),
(40, 'Asesor Sumber Daya Manusia Aparatur Ahli Pertama'),
(41, 'Auditor Manajemen Aparatur Sipil Negara Ahli Madya'),
(42, 'Auditor Manajemen Aparatur Sipil Negara Ahli Muda'),
(43, 'Auditor Manajemen Aparatur Sipil Negara Ahli Pertama'),
(44, 'Auditor Manajemen Aparatur Sipil Negara Keahlian'),
(45, 'Pranata Komputer Ahli Madya'),
(46, 'Arsiparis Ahli Madya'),
(47, 'Pranata Komputer Ahli Muda'),
(48, 'Pranata Komputer Ahli Pertama'),
(49, 'Pranata Komputer Penyelia'),
(50, 'Penata Kelola Sistem dan Teknologi Informasi'),
(51, 'Kepala UPT'),
(52, 'Pranata Komputer Mahir'),
(53, 'Pranata Komputer Keahlian'),
(54, 'Pranata Komputer Keterampilan'),
(55, 'Pranata Sumber Daya Manusia Aparatur Keterampilan'),
(56, 'Penata Kelola Sistem dan Teknologi Informasi'),
(57, 'Penelaah Teknis Kebijakan');

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
(32, 'Golongan XV'),
(33, 'Golongan XVI'),
(34, 'Golongan XVII');

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
