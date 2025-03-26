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

INSERT INTO data_pegawai (id_pegawai, nama_pegawai, nip_pegawai, bidang, jabatan, nomor_hp)
VALUES 
(1, 'RESEPSIONIS', '123456789123456789', '1','1', '1'),
(2, 'Drs. PAULUS DWI LAKSONO HARJONO, MAP', '196711101993031001', '1','1', '1'),
(3, 'IWAN SETYO PRIHATIN, SH., M.A.P', '197708311997031001', '1','1', '1'),
(4, 'EKA PANGESTUTI, S.IP, M.P.A', '198609032009122001', '1','1', '1'),
(5, 'YUSSI HENDRAYANTI, S.SOS', '197406101998032001', '1','1', '1'),
(6, 'JUMALI, S.I.P', '197701072010121001', '1','1', '1'),
(7, 'APRIYANI, SE', '198404072006042001', '1','1', '1'),
(8, 'DIAN KUSUMA WARDHANI,A.Md', '198108162008012015', '1','1', '1'),
(9, 'DODY RAHMAT SHOLIHIN, S.IP, MPA', '198812252019021002', '1','1', '1'),
(10, 'NOVANDA FATIH HARDANTI, S.Psi', '199511302022032005', '1','1', '1'),
(11, 'ACHID ANUGRAHANTO, S.E.', '199106142020121008', '1','1', '1'),
(12, 'RADEN RARA FITRI WIKANDARI, A.Md', '198407092015032002', '1','1', '1'),
(13, 'NINIK SETYORINI, SE', '197804222006042003', '1','1', '1'),
(14, 'VIVILIA KUSUMA JAYANTIE BASUKI, S. E.', '198510182014022003', '1','1', '1'),
(15, 'DIYAH RACHMAWATI HASMAMY, SE', '198405202015032002', '1','1', '1'),
(16, 'RETNO MILIASIH, S.E., M.E.', '197507212006042001', '1','1', '1'),
(17, 'RIAN USMAWATI, S.E.', '198306062015032002', '1','1', '1'),
(18, 'EVI RISTIANA, SE', '198606262008012002', '1','1', '1'),
(19, 'FERA TRESNAWATI, M. Acc.', '199302202020122004', '1','1', '1'),
(20, 'HANDRIAN RAHMADANA, S.I.P', '198903042022031003', '1','1', '1'),
(21, 'AULIA TRI HASTUTI WULANDARI, A.Md.Kb.N', '200006152022022001', '1','1', '1'),
(22, 'SUHERI WIDOYOKO, SE', '198004202015031002', '1','1', '1'),
(23, 'SUNARKO, A.Md.Pas.', '199002272023211017', '1','1', '1'),
(24, 'GUNAWAN, S.IP.', '197302171999021001', '1','1', '1'),
(25, 'MAJID SETIYAWAN', '197907062002121001', '1','1', '1'),
(26, 'RIA GUNAWAN, A.Md', '198507092009121001', '1','1', '1'),
(27, 'HANUM SOFIA NUR MERJANTI, S.IP', '199009232019022004', '1','1', '1'),
(28, 'MELA MELATI, S. Tr. S. I.', '199205152014022003', '1','1', '1'),
(29, 'THERESIA NATALIA SABU SUMA TUKAN, S.E.', '199509152020122010', '1','1', '1'),
(30, 'SUHADI ROHANI', '197409152006041004', '1','1', '1'),
(31, 'PIUS DIMAS GUSTAMA PUTRA, A.Md.T', '199704292022031006', '1','1', '1'),
(32, 'IMAM SUPARDI, A.Md', '198408062015031001', '1','1', '1'),
(33, 'ADITYA PRAMUDITO, S.Psi', '199412022019021001', '1','1', '1'),
(34, 'MUHAMMAD FATCHAN HELVIAN,A.Md.Vet.', '199712232024211006', '1','1', '1'),
(35, 'MUHAMMAD SIDIQ NOVIANTORO, A.Md', '198111072024211003', '1','1', '1'),
(36, 'NURLIANA DWI UTARI, A.Md.', '199511152024212024', '1','1', '1'),
(37, 'ANANG PIKUKUH PURWOKO, SE, M.M.', '197707302008121001', '1','1', '1'),
(38, 'MUHAMMAD CHANDRA ADIWIGUNA, S.M.', '199508062020121005', '1','1', '1'),
(39, 'TRIANI MEILANI, SAP.', '198205182008012012', '1','1', '1'),
(40, 'NELLY ELIANINGTYAS, S.M.', '199603212022032007', '1','1', '1'),
(41, 'LAILYTA KHAIRINNISA, S.M', '199702262022032010', '1','1', '1'),
(42, 'DHEA APTA MONICA, S.A.P', '199812032022032003', '1','1', '1'),
(43, 'SEPSA KUSUMAWARDANI, S.M.', '199809012022032010', '1','1', '1'),
(44, 'DIAS TRIYADI, SE', '197810032009121001', '1','1', '1'),
(45, 'SUHARTONO, S.Sos', '197002171992031001', '1','1', '1'),
(46, 'FELIFULA FEBRIYANI', '196802121987112001', '1','1', '1'),
(47, 'HENI SULISTYOWATI, S.IP', '196603061988032001', '1','1', '1'),
(48, 'ENDAH SARI RAHAYU, S.E.', '197210181993032001', '1','1', '1'),
(49, 'BADARNO', '196906181992031001', '1','1', '1'),
(50, 'TRI WIHARJANTI, S.IP', '197509151998032001', '1','1', '1'),
(51, 'ANDAYANI, S.Sos', '196709271987112001', '1','1', '1'),
(52, 'DELI INDRA WAHYUDI, SH', '197609231998031001', '1','1', '1'),
(53, 'SUYATNO, S.E.,  M.M.', '197403231999021001', '1','1', '1'),
(54, 'AGUS WIDODO, S.Sos', '198204012008011010', '1','1', '1'),
(55, 'DEDY HERMAWAN, S.A.P.', '198705032009121001', '1','1', '1'),
(56, 'DEWI FAUZIYATI, S.Psi, M.A.', '198412292010122001', '1','1', '1'),
(57, 'KUN BUDI WURYANI, S.IP.MM ', '196712201987112001', '1','1', '1'),
(58, 'RINI, SE', '198310162002112001', '1','1', '1'),
(59, 'AGUS SALIM, S.IP', '197308112000031001', '1','1', '1'),
(60, 'FITRIA TAHTA MAULA, S.H.', '199710072020122012', '1','1', '1'),
(61, 'SUPARGIYANTO, S.SOS', '196805171996031001', '1','1', '1'),
(62, 'NDARI WAHYUNINGSIH, A.Md.Sek.', '199606062023212036', '1','1', '1'),
(63, 'LIA BUNYATI, A.Md.A.Pkt', '199209092024212030', '1','1', '1'),
(64, 'MAHDA DALUAS WIDAYANI, A.Md.', '199507152024212029', '1','1', '1'),
(65, 'WIJI LESTARI, A.Md.Kom.', '199701072024212028', '1','1', '1'),
(66, 'Drs. ISWAHYUDI SURYANTO', '196704121993031001', '1','1', '1'),
(67, 'ELISA FIRDA AMALIA, S.E.', '199512062020122011', '1','1', '1'),
(68, 'HANKENINA DEAFINOLA, S.I.P', '199702052022032010', '1','1', '1'),
(69, 'BAYU PRASTIANTO,S.E', '199405162022031004', '1','1', '1'),
(70, 'ATHO` ZULIANTA, S.IP', '197507272006041006', '1','1', '1'),
(71, 'SRI NARIYA, S.IP', '196606111986031001', '1','1', '1'),
(72, 'MOH. HUSAENI, S.IP', '196906161994031001', '1','1', '1'),
(73, 'MUHAMMAD AJI SUKMA, S.M.', '199610232020121005', '1','1', '1'),
(74, 'ENDANG PURWATI, S.Sos', '197112291998032001', '1','1', '1'),
(75, 'SUKISNA, S.H., M.M.', '196801271987111001', '1','1', '1'),
(76, 'PUJI AGUNG SUPADI, A.Md', '196904091998031001', '1','1', '1'),
(77, 'SUWANTO, S.Sos', '196910121990081001', '1','1', '1'),
(78, 'AHMAD BUDI SUTRISNA', '197107111993031001', '1','1', '1'),
(79, 'SUTARTO', '197801071999021001', '1','1', '1'),
(80, 'AHMAD YURIYANTO, S.A.P', '199301082015031001', '1','1', '1'),
(81, 'NORIN MUSTIKA RAHADIRI ABHESEKA, S.I.P.', '199410262020122007', '1','1', '1'),
(82, 'AMIR  NUGROHO', '197404172000121001', '1','1', '1'),
(83, 'JUNIARTO SETYO BUDHI, A.Md', '197906122014021001', '1','1', '1'),
(84, 'INA RESTI FAUZI, A.Md', '199408012023212041', '1','1', '1'),
(85, 'RIZAL BUDIYANTO, A.Md.T.', '199208032024211019', '1','1', '1'),
(86, 'ERNI PAJARWATI, A.Md.', '198606012024212015', '1','1', '1'),
(87, 'SITI ZUNTIKHANAH, A.Md.', '198102282024212007', '1','1', '1'),
(88, 'TOFIK RIYADI, A.Md.', '198108142024211002', '1','1', '1'),
(89, 'FATIMA HANA FITRIATI, S.I.P.', '199503112019022003', '1','1', '1'),
(90, 'GILANG ARTHYO LUMAKSONO, S.Psi', '198507052015031001', '1','1', '1'),
(91, 'STEPHANUS FIRMANTO T, S.Kom', '196804171994031001', '1','1', '1'),
(92, 'JOKO SUSILO', '196711021987111001', '1','1', '1'),
(93, 'SUYANTI', '196807051991032001', '1','1', '1'),
(94, 'TARMIJAH', '196806041987112001', '1','1', '1'),
(95, 'SURYANTA', '196810061992031001', '1','1', '1'),
(96, 'BAYU WIDYO HASTORO, S.Sos', '197302252001121001', '1','1', '1'),
(97, 'BRIGIDA ARIE MINARTININGTYAS,S.Kom', '198702012022032001', '1','1', '1'),
(98, 'Y. SOETONO, S.Sos', '196808101993031001', '1','1', '1'),
(99, 'SUMANTRI, S.IP.', '197206081993031001', '1','1', '1'),
(100, 'AAN CANDRA ROKHANI, A.Md', '197301092000032001', '1','1', '1'),
(101, 'WENING PRASETYO PAMEKAS, S.AP', '199003092014022006', '1','1', '1'),
(102, 'EKO MARTIYANTO PRAYOGI', '197702221998031001', '1','1', '1'),
(103, 'MAGHFlRA MAULANI, S.Kom.', '199511082022032005', '1','1', '1'),
(104, 'KASTIYAH YOHANA, S.H, M.M.', '196807311987112001', '1','1', '1'),
(105, 'AROHMAN SHOLEH, S.KOM', '198502192009121001', '1','1', '1'),
(106, 'VIVID SUDIARTO, S.Kom', '197906212000031001', '1','1', '1'),
(107, 'HANIF RAHMAWAN, S.Kom. M.Cs', '198403302009121001', '1','1', '1'),
(108, 'SRI LESTARI, S.Kom', '198907052019022007', '1','1', '1'),
(109, 'ISNAINI ARDI SAPUTRA, S.Si.', '198807232020121002', '1','1', '1'),
(110, 'ANNISA ARTI JAYANTI, S.Kom.', '199411212022032011', '1','1', '1'),
(111, 'FIDDYANTO HIDAYAT, S, Kom.', '197902252008121001', '1','1', '1'),
(112, 'SONY SATYA NUGRAHA, A.Md.', '198503062010121001', '1','1', '1'),
(113, 'INDRI RISANTI TAUFIQ, ST', '198412082019022002', '1','1', '1'),
(114, 'MUHAMAD IMAM SETYAWAN, S.Kom', '199204042019021004', '1','1', '1'),
(115, 'MIFTAHUL ULUM, S.Kom.', '199009082022031003', '1','1', '1'),
(116, 'AGUSTIN AYU KUSUMAWATI, S.Si., M.E.K.K.', '199208192015032002', '1','1', '1'),
(117, 'TRIAS PURNOMO, S.KOM', '198106152006041005', '1','1', '1'),
(118, 'NASRUL KURNIAWAN, A.Md.', '198608202023211015', '1','1', '1'),
(119, 'DEFI MARDIKASARI, A.Md.', '198603212024212017', '1','1', '1'),
(120, 'WINDI LESTARI, A.Md.A.B.', '199502182024212023', '1','1', '1'),
(121, 'FERI BENING PRIHONO, S.Kom.', '199111212024211017', '1','1', '1'),
(122, 'SULPICIUS SUHERYANTO, S.AP', '198004192014021001', '1','1', '1'),
(123, 'RUSMIN NURYADIN, SE', '197212011993031001', '1','1', '1'),
(124, 'BS.SURYANINGSIH HANDAYANI, S.Sos', '196612101987112001', '1','1', '1'),
(125, 'TUTIK WINARTI, S.IP.  M.Si.', '196705281987112001', '1','1', '1'),
(126, 'TIN YUNIATI, S.Psi ', '197806182008012030', '1','1', '1'),
(127, 'DWI SIWI ANGGORO, SH', '196503291992031001', '1','1', '1'),
(128, 'ALBERTUS TRIKUMORO, S.H.', '196812151987111001', '1','1', '1'),
(129, 'ENI ISNIWATI, S.IP.,  M.M.', '196906111997032001', '1','1', '1'),
(130, 'TRIA MERINA CAHYADEWI, M. Acc.', '199304082020122010', '1','1', '1'),
(131, 'CICIH LASMIYATI, S.Sos. M.Si.', '198508062008122001', '1','1', '1'),
(132, 'RIDLOWI, S.Sos. MA.', '198204052009121001', '1','1', '1'),
(133, 'IBNU SUTRIYANTO, S.IP', '197203121993031001', '1','1', '1'),
(134, 'ETSA JUWITA SARI, SH', '199304232018012003', '1','1', '1'),
(135, 'RANI ADHITA NANDURI SIREGAR, SH, MIR., MIL.', '198708122014022004', '1','1', '1'),
(136, 'RIDWAN KUSUMA MAWARDANI, S.H.', '199108142022031004', '1','1', '1'),
(137, 'NUR ICHSANUDIN, S.I.P', '199407282022031003', '1','1', '1'),
(138, 'DWI HARYONO, S.H.', '196902061993031001', '1','1', '1'),
(139, 'LATIFAH, SE', '197610082008012015', '1','1', '1'),
(140, 'ANDHANI HARISHA CHABIB, S.Psi, M.Psi, Psikolog', '198804212019021001', '1','1', '1'),
(141, 'AULIA ROKHMAH, SE', '198201282015032001', '1','1', '1'),
(142, 'AYA SALIKHA SUBAGYO, S.Psi', '199212112015032003', '1','1', '1'),
(143, 'AHYU WULANDARI, S.Kom', '196805101994032001', '1','1', '1'),
(144, 'SADIYAH NOOR NOVITA  ALFISAHRIN, S.Kom', '198408092015032001', '1','1', '1'),
(145, 'SHINTA TRI WINDARTI, A.Md', '198811042015032007', '1','1', '1'),
(146, 'HIDAYATULLOH HASANI, S.A.P', '198610072015031004', '1','1', '1'),
(147, 'DWI FIRSAYANTI, S.Sos', '199001132010122001', '1','1', '1'),
(148, 'ERIKA DWI ANDININGTYAS, S.E.', '199308202019022004', '1','1', '1');
-- --------------------------------------------------------------
-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_jabatan`
--

CREATE TABLE `jenis_jabatan` (
  `id_jabatan` char(3) NOT NULL,
  `nama_jabatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);
--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO jenis_jabatan (id_jabatan, nama_jabatan)
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
