-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for bukutamu
CREATE DATABASE IF NOT EXISTS `bukutamu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bukutamu`;

-- Dumping structure for table bukutamu.tbl_bagian
CREATE TABLE IF NOT EXISTS `tbl_bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(200) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bukutamu.tbl_bagian: ~10 rows (approximately)
INSERT INTO `tbl_bagian` (`id`, `nama_bagian`, `status`) VALUES
	(9, 'Ruang Kepala Sekolah', '1'),
	(10, 'Ruang Guru', '1'),
	(11, 'Ruang Kaprog', '1'),
	(12, 'Ruang Kurikulum', '1'),
	(13, 'Ruang UP RPL', '1'),
	(14, 'Ruang Instruktur RPS', '1'),
	(15, 'Ruang BKK', '1'),
	(16, 'Ruang Tata Usaha', '1'),
	(17, 'Kelas', '1'),
	(18, 'Mesjid', '1');

-- Dumping structure for table bukutamu.tbl_jabatan
CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(200) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bukutamu.tbl_jabatan: ~5 rows (approximately)
INSERT INTO `tbl_jabatan` (`id`, `nama_jabatan`, `status`) VALUES
	(5, 'Kepala Sekolah', '1'),
	(6, 'Wakil Kepala Sekolah', '1'),
	(7, 'Staf Tata Usaha', '1'),
	(8, 'Guru', '1'),
	(9, 'Siswa', '1');

-- Dumping structure for table bukutamu.tbl_kartu_tamu
CREATE TABLE IF NOT EXISTS `tbl_kartu_tamu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tamu` int(11) NOT NULL,
  `serial_kartu` varchar(100) NOT NULL,
  `tgl_dipakai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_dikembalikan` datetime DEFAULT NULL,
  `status` enum('y','t') NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table bukutamu.tbl_kartu_tamu: ~2 rows (approximately)
INSERT INTO `tbl_kartu_tamu` (`id`, `id_tamu`, `serial_kartu`, `tgl_dipakai`, `tgl_dikembalikan`, `status`) VALUES
	(17, 12, '41356346734754854854845', '2022-06-05 19:36:08', NULL, 'y'),
	(19, 14, '0123456789', '2023-01-06 10:14:03', NULL, 'y');

-- Dumping structure for table bukutamu.tbl_lampiran
CREATE TABLE IF NOT EXISTS `tbl_lampiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tamu` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table bukutamu.tbl_lampiran: ~0 rows (approximately)
INSERT INTO `tbl_lampiran` (`id`, `id_tamu`, `file`, `tgl_upload`) VALUES
	(7, 12, 'Celine Evangelista - Wikipedia bahasa Indonesia, ensiklopedia bebas.pdf', '2022-06-05 19:36:09');

-- Dumping structure for table bukutamu.tbl_paket_surat
CREATE TABLE IF NOT EXISTS `tbl_paket_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asal_surat` varchar(100) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `isi_paket` varchar(200) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `tgl_simpan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bukutamu.tbl_paket_surat: ~0 rows (approximately)

-- Dumping structure for table bukutamu.tbl_pegawai
CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `bagian` varchar(150) NOT NULL,
  `no_hp` varchar(35) NOT NULL,
  `status` enum('aktif','blok') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

-- Dumping data for table bukutamu.tbl_pegawai: ~107 rows (approximately)
INSERT INTO `tbl_pegawai` (`id`, `nip`, `nama`, `jabatan`, `bagian`, `no_hp`, `status`) VALUES
	(2, '197106032007011012', 'Adang', 'Guru', 'Ruang Guru', '085221379437', 'aktif'),
	(3, '196905062022211002', 'Ade Mulyana', 'Guru', 'Ruang Guru', '081214599722', 'aktif'),
	(4, '197610312021212003', 'Ade Nurdawati', 'Guru', 'Ruang Guru', '085215036341', 'aktif'),
	(5, '196309271988031006', 'Ade Yuhana', 'Guru', 'Ruang Guru', '082117902129', 'aktif'),
	(6, '197107282007011010', 'Agus Kusmana', 'Guru', 'Ruang Guru', '085703490318', 'aktif'),
	(7, '198108162022211016', 'Ahmad Aripin', 'Guru', 'Ruang Guru', '085224303770', 'aktif'),
	(8, '198511242022212015', 'Ai Anita', 'Guru', 'Ruang Guru', '085220246531', 'aktif'),
	(9, '198007162022212009', 'Ai Yulianti', 'Guru', 'Ruang Guru', '082167489238', 'aktif'),
	(10, '197903072009022002', 'Angi Remainatatit', 'Guru', 'Ruang Guru', '085294895120', 'aktif'),
	(11, '196906032008012012', 'Ani Raena', 'Guru', 'Ruang Guru', '082119423320', 'aktif'),
	(12, '199202052022212017', 'Arumsari Daniyati', 'Guru', 'Ruang Guru', '081910488602', 'aktif'),
	(13, '197502042014122001', 'Aryanti Reni Sari', 'Guru', 'Ruang Guru', '08122139880', 'aktif'),
	(14, '197907282010011006', 'Asep Wahyudin', 'Guru', 'Ruang Kaprog', '08122250189', 'aktif'),
	(15, '196608041995122002', 'Asmayawati', 'Guru', 'Ruang Guru', '082115172442', 'aktif'),
	(16, '', 'Asri Rachmayani', 'Guru', 'Ruang Guru', '085794264043', 'aktif'),
	(17, '198205022022211026', 'Atang Hidayat', 'Guru', 'Ruang Guru', '085769865311', 'aktif'),
	(18, '196505101988111003', 'Ateng Drajat', 'Guru', 'Ruang Guru', '085222193565', 'aktif'),
	(19, '196903141992032005', 'Atik Rostika', 'Guru', 'Ruang Guru', '081321693175', 'aktif'),
	(20, '196910081998021002', 'Dani Nugraha Muliadi', 'Guru', 'Ruang Guru', '085872216049', 'aktif'),
	(21, '197609152022212012', 'Dedeh Kurniasih', 'Guru', 'Ruang Guru', '082119270325', 'aktif'),
	(22, '196905111994032009', 'Dety Ninawaty', 'Guru', 'Ruang Kaprog', '081394336190', 'aktif'),
	(23, '199411152022211002', 'Deviandra Sandhika', 'Guru', 'Ruang Kaprog', '081394786988', 'aktif'),
	(24, '', 'Dini Karlina Siti Hodijah', 'Guru', 'Ruang BK', '082218312442', 'aktif'),
	(25, '', 'Dwi Arin Fajriyani', 'Guru', 'Ruang Guru RPL', '082219098876', 'aktif'),
	(26, '196510271989031009', 'Edi Sopyan', 'Guru', 'Ruang Guru', '081270010762', 'aktif'),
	(27, '198611262022212019', 'Eli Kurnia Hamid', 'Guru', 'Ruang Guru', '085314440155', 'aktif'),
	(28, '197903132023212008', 'Elis Herna Mulyawati', 'Guru', 'Ruang Guru', '085624267654', 'aktif'),
	(29, '', 'Endra Kusumah', 'Guru', 'Ruang Guru RPL', '082120139495', 'aktif'),
	(30, '197202222005012005', 'Eri Febriantini', 'Guru', 'Ruang Guru RPL', '082116741672', 'aktif'),
	(31, '198008152023212008', 'Euis Juariah', 'Guru', 'Ruang Guru', '085220488845', 'aktif'),
	(32, '199207062023212032', 'Gilang Citra Dwi Rosalina', 'Guru', 'Ruang Guru', '08996219854', 'aktif'),
	(33, '197701082008011003', 'Harna', 'Guru', 'Ruang Guru', '082335850550', 'aktif'),
	(34, '', 'Hasna Latifah', 'Guru', 'Ruang BK', '081299546482', 'aktif'),
	(35, '198703302023211006', 'Hendra Kurniawan', 'Guru', 'Ruang Guru', '087839291048', 'aktif'),
	(36, '199303212022212018', 'Heni Andriyani', 'Guru', 'Ruang Guru RPL', '082315235856', 'aktif'),
	(37, '197810292009021003', 'Idad', 'Guru', 'Ruang Kaprog', '081321225771', 'aktif'),
	(38, '197803292022212010', 'Imas Imaniyyah', 'Guru', 'Ruang Guru', '081320107654', 'aktif'),
	(39, '198103192022212014', 'Indriyati Nurbaini', 'Guru', 'Ruang Guru', '081224088084', 'aktif'),
	(40, '198406132022211012', 'Irlan Sugih Pranoto', 'Guru', 'Ruang Guru RPL', '08121455787', 'aktif'),
	(41, '198801152023211013', 'Irman Ariyana', 'Guru', 'Ruang Tata Usaha', '085320221228', 'aktif'),
	(42, '197005271995121001', 'Ishak Iskandar', 'Guru', 'Ruang Guru', '081321917311', 'aktif'),
	(43, '198109092014122001', 'Iyan Rohaeni', 'Guru', 'Ruang Kurikulum', '08122254602', 'aktif'),
	(44, '198309092023211006', 'Jejen Zenal Arifin', 'Guru', 'Mesjid', '082320419944', 'aktif'),
	(45, '197911022022212011', 'Kiki Indriani Iskandar, S.pd', 'Guru', 'Ruang Guru', '082111779484', 'aktif'),
	(46, '198202282006042010', 'Kiki Santika', 'Guru', 'Ruang Kurikulum', '087712390139', 'aktif'),
	(47, '197705052022212008', 'Kokom Komalasari', 'Guru', 'Ruang Guru', '087718598877', 'aktif'),
	(48, '196505061988032007', 'Kokom Komariah', 'Guru', 'Ruang BK', '081223844843', 'aktif'),
	(49, '196907111995122001', 'Leli Yuliati', 'Guru', 'Ruang Guru', '081224631353', 'aktif'),
	(50, '197804282009022001', 'Lia Rulianti Milyarria', 'Guru', 'Ruang Guru', '081389688598', 'aktif'),
	(51, '198106142014112001', 'Lilis Resmiati', 'Guru', 'Ruang Guru', '081313264647', 'aktif'),
	(52, '198504062009022003', 'Lina Apri Ani Gustina', 'Guru', 'Ruang Kurikulum', '082113955139', 'aktif'),
	(53, '197903272005011009', 'M. Fazjar Alamsyah', 'Guru', 'Ruang Hubinmas', '081321386789', 'aktif'),
	(54, '196608051994032004', 'Martiah', 'Guru', 'Ruang Guru', '085222152849', 'aktif'),
	(55, '197010091995122001', 'Mimin Aryani', 'Guru', 'Ruang Kurikulum', '081394234989', 'aktif'),
	(56, '198010072014082002', 'Neng Yayas Ismayati', 'Guru', 'Ruang Guru', '081312291911', 'aktif'),
	(57, '197905262023212006', 'Noneng Suartini', 'Guru', 'Ruang Guru', '082117890717', 'aktif'),
	(58, '', 'Nukeu St. Faradina Arofah', 'Guru', 'Ruang Guru', '081214281098', 'aktif'),
	(59, '196311251988032003', 'Nurhayati', 'Guru', 'Ruang Guru', '085298262290', 'aktif'),
	(60, '199111262023212012', 'Nurmaya Dewi', 'Guru', 'Ruang Guru', '081244444029', 'aktif'),
	(61, '197004211998021003', 'Nuryakin Zuhud', 'Guru', 'Ruang Guru', '081220122919', 'aktif'),
	(62, '196502181993031007', 'Ojo Sudarja', 'Guru', 'Ruang Kurikulum', '082120929219', 'aktif'),
	(63, '196311231983052005', 'Popon Ipah Sofiyah', 'Guru', 'Ruang Guru', '085222711963', 'aktif'),
	(64, '196608121996032001', 'Pupuy Yartini', 'Guru', 'Ruang Kaprog', '081320600916', 'aktif'),
	(65, '', 'R.M.DONI HA.WARDHANA, S.Pd', 'Guru', 'Ruang Guru', '089655340417', 'aktif'),
	(66, '198105182022211010', 'RADEN IRSAN SURYADRAJAT', 'Guru', 'Ruang Guru RPL', '081212142442', 'aktif'),
	(67, '', 'Rendra', 'Guru', 'Ruang Guru', '085221987300', 'aktif'),
	(68, '', 'Renra Noviana', 'Guru', 'Ruang Guru RPL', '085900210111', 'aktif'),
	(69, '198905312023212022', 'Retno Ayu Lestari', 'Guru', 'Ruang Guru', '089666533486', 'aktif'),
	(70, '198404112022211012', 'Robi Iskandar', 'Guru', 'Ruang Guru', '081222355771', 'aktif'),
	(71, '', 'Said Harismansyah', 'Guru', 'Mesjid', '085220980792', 'aktif'),
	(72, '196911252005012008', 'Siti Aan Rohanah', 'Guru', 'Ruang Kaprog', '081220043981', 'aktif'),
	(73, '196712242014112001', 'Siti Maemunah', 'Guru', 'Ruang Guru', '082218314441', 'aktif'),
	(74, '199408012022212009', 'Siti Wulansari', 'Guru', 'Ruang Guru', '083821946707', 'aktif'),
	(75, '198405112022212036', 'Sri Hartati, S.pd', 'Guru', 'Ruang Guru', '085648133776', 'aktif'),
	(76, '198211022022212019', 'Sunarti Sitoresmi Supono', 'Guru', 'Ruang Guru', '0895358256400', 'aktif'),
	(77, '197008102006041006', 'Supandi', 'Guru', 'Ruang Kurikulum', '082116326499', 'aktif'),
	(78, '', 'Syamsul Mujadid', 'Guru', 'Ruang BK', '081293083401', 'aktif'),
	(79, '', 'Syifa Mufidah', 'Guru', 'Ruang Guru', '081280273629', 'aktif'),
	(80, '197410182002122003', 'Tanti Setohariati', 'Guru', 'Ruang Guru', '081211984865', 'aktif'),
	(81, '196408081992032006', 'Tini Wartini', 'Guru', 'Ruang Kaprog', '082218340404', 'aktif'),
	(82, '', 'Toni Sontany', 'Guru', 'Ruang Guru', '085317671310', 'aktif'),
	(83, '198206242022211008', 'Untung Prihartono', 'Guru', 'RuangGuru RPL', '087827841999', 'aktif'),
	(84, '198607032022212037', 'Wida Dewiyarti', 'Guru', 'Ruang Guru', '085294201986', 'aktif'),
	(85, '197907072022212010', 'Wilda Nuryuliani', 'Guru', 'Ruang Guru', '089665345365', 'aktif'),
	(86, '', 'Wildan Muhammad Hafizh', 'Guru', 'Ruang Guru RPL', '082116390535', 'aktif'),
	(87, '199211052020122012', 'WULAN NOPIANTI', 'Guru', 'RuangGuru', '081218146690', 'aktif'),
	(88, '196503221992032003', 'Yeti Nurmiati', 'Guru', 'Ruang Guru', '081322034814', 'aktif'),
	(89, '', 'Aeni Inayah, S.Pd.', 'Guru', 'Ruang BK', '8562340014', 'aktif'),
	(90, '', ' Aan Maryati Andriani A.Ma. Pust', 'Staf TU', 'Ruang Tata Usaha', '85323326858', 'aktif'),
	(91, '', ' Dadad Suhada', 'Staf TU', 'Ruang Tata Usaha', '89692553770', 'aktif'),
	(92, '196602111986022001', 'Dewi Hayati', 'Staf TU', 'Ruang Tata Usaha', '81321997830', 'aktif'),
	(93, '', ' Didi', 'Staf TU', 'Ruang Tata Usaha', '87827506648', 'aktif'),
	(94, '', ' Edi', 'Staf TU', 'Ruang Tata Usaha', '85942974380', 'aktif'),
	(95, '196702021993032006', 'Elis Herawati', 'Kepala Sekolah', 'Ruang Kepala Sekolah', '81214209697', 'aktif'),
	(96, '', ' Entang Koswara', 'Staf TU', 'Ruang Tata Usaha', '87884660988', 'aktif'),
	(97, '', ' Gian Libia Samantha', 'Staf TU', 'Ruang Tata Usaha', '87827513411', 'aktif'),
	(98, '', ' Irfan Arif Hidayat', 'Staf TU', 'Ruang Tata Usaha', '8,82E+11', 'aktif'),
	(99, '196896121993032000', ' Neny Yunia', 'Staf TU', 'Ruang Tata Usaha', '81322429119', 'aktif'),
	(100, '', ' Nia Kurniasari', 'Staf TU', 'Ruang Tata Usaha', '82319610324', 'aktif'),
	(101, '', ' Ramdhan Sulaeman', 'Staf TU', 'Ruang Tata Usaha', '82117304753', 'aktif'),
	(102, '', ' Supandi', 'Staf TU', 'Ruang Tata Usaha', '83825936593', 'aktif'),
	(103, '', ' Yuyu Junaedi, S.Pd. I', 'Staf TU', 'Ruang Tata Usaha', '85222881139', 'aktif'),
	(104, '', 'Wisnu Pratama Putra', 'Staf TU', 'Ruang Tata Usaha', '81953726867', 'aktif'),
	(105, '', 'Devi', 'Staf TU', 'Ruang Tata Usaha', '85795659942', 'aktif'),
	(106, '', 'Guru', 'Guru', 'Ruang Guru', '', 'aktif'),
	(107, '', 'Staf TU', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
	(108, '', 'Siswa', 'Siswa', 'Kelas', '', 'aktif');

-- Dumping structure for table bukutamu.tbl_tamu
CREATE TABLE IF NOT EXISTS `tbl_tamu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenkel` varchar(2) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `tgl_datang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keperluan` text NOT NULL,
  `nama_tujuan` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table bukutamu.tbl_tamu: ~6 rows (approximately)
INSERT INTO `tbl_tamu` (`id`, `nama`, `alamat`, `jenkel`, `no_hp`, `tujuan`, `tgl_datang`, `keperluan`, `nama_tujuan`, `photo`, `user_id`, `nama_user`) VALUES
	(12, 'Sudjatmiko', 'Mojolebak Kupang Jetis Kab. Mojokerto', 'L', '083435235235623', 'Gudang Belakang', '2022-06-05 19:36:08', 'Setor Indomie ', '59', 'foto_sudjatmiko_tamu_2022-06-05.jpeg', 1, '1'),
	(14, 'Hasya Nurul Ikrima', 'Jl. Angkrek No. 93 Sumedang ', 'P', '0899999999999', 'Gudang Belakang', '2023-01-06 10:14:03', 'Mengirim makanan', '7', 'foto_hasya-nurul-ikrima_tamu_2023-01-06.jpeg', 1, '1'),
	(15, 'Eri Febriantini', 'Jl. Angkrek No. 93 Sumedang', 'P', '082116741672', 'Main Office', '2023-02-15 08:58:29', 'Studi banding', '15', 'foto_eri-febriantini_tamu_2023-02-15.jpeg', 1, 'Cak Admin'),
	(16, 'Asep', 'Cikole', 'L', '0000000', 'Kesiswaan', '2023-02-15 11:39:29', 'Bertamu', '1', 'foto_asep_tamu_2023-02-15.jpeg', 7, '7'),
	(17, 'ADID', 'Jl Agddbf', 'L', '6545666', 'Akademis/Kurikulum', '2023-02-15 12:06:05', 'xfvgbhbhnh', '2', 'foto_adid_tamu_2023-02-15.jpeg', 7, '7'),
	(18, 'Budi Doremi', 'Cimalaka', 'L', '08123456789', 'Ruang Instruktur RPS', '2023-02-17 16:39:05', 'Silaturahmi', '24', 'foto_budi-doremi_tamu_2023-02-17.jpeg', 7, '7');

-- Dumping structure for table bukutamu.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `moto` varchar(100) DEFAULT NULL,
  `jenkel` varchar(2) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `tentang` text,
  `email` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `level` varchar(3) DEFAULT NULL,
  `register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table bukutamu.tbl_user: ~4 rows (approximately)
INSERT INTO `tbl_user` (`user_id`, `nama`, `moto`, `jenkel`, `username`, `password`, `tentang`, `email`, `nohp`, `status`, `level`, `register`, `photo`) VALUES
	(1, 'Cak Admin', 'Just do it', 'L', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'I am a mountainner. to me mountainerring is a life', 'admine_jhon@gmail.com', '082244339826', 1, '1', '2022-02-03 06:07:55', 'e1b0bef49766ac35512dec14d158f7bc.jpg'),
	(5, 'Celine Evangelista', NULL, 'P', 'celine', 'dba7b8a81dc064a62919df57e69d0054', NULL, 'celine_evangelista@gmail.com', '082244339826', 1, '1', '2022-06-05 12:32:34', '966d0fd03a9785fb6526a219a054f465.jpeg'),
	(6, 'Eri Febriantini', NULL, 'P', 'Eri Febrianitni', '41757e81f488fee333fd59c40025ecab', NULL, 'erifebriantini22@guru.smk.belajar.id', '082116741672', 1, '1', '2023-02-15 02:09:08', '91a15428da8d721919f502c1f3cdd9db.jpg'),
	(7, 'Petugas Admin', NULL, 'P', 'Petugas Admin', '3710f767e2ea0372051e3342eee556b0', NULL, 'admin@gmail.com', '08111111', 1, '2', '2023-02-15 02:11:15', '8c6bdb151e19a1908f5b5a6c1f69b487.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
