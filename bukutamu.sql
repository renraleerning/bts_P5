-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 09:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id` int(11) NOT NULL,
  `nama_bagian` varchar(200) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bagian`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `nama_jabatan`, `status`) VALUES
(5, 'Kepala Sekolah', '1'),
(6, 'Wakil Kepala Sekolah', '1'),
(7, 'Staf Tata Usaha', '1'),
(8, 'Guru', '1'),
(9, 'Siswa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kartu_tamu`
--

CREATE TABLE `tbl_kartu_tamu` (
  `id` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `serial_kartu` varchar(100) NOT NULL,
  `tgl_dipakai` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_dikembalikan` datetime DEFAULT NULL,
  `status` enum('y','t') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kartu_tamu`
--

INSERT INTO `tbl_kartu_tamu` (`id`, `id_tamu`, `serial_kartu`, `tgl_dipakai`, `tgl_dikembalikan`, `status`) VALUES
(17, 12, '41356346734754854854845', '2022-06-05 19:36:08', NULL, 'y'),
(19, 14, '0123456789', '2023-01-06 10:14:03', NULL, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lampiran`
--

CREATE TABLE `tbl_lampiran` (
  `id` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lampiran`
--

INSERT INTO `tbl_lampiran` (`id`, `id_tamu`, `file`, `tgl_upload`) VALUES
(7, 12, 'Celine Evangelista - Wikipedia bahasa Indonesia, ensiklopedia bebas.pdf', '2022-06-05 19:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_surat`
--

CREATE TABLE `tbl_paket_surat` (
  `id` int(11) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `isi_paket` varchar(200) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `tgl_simpan` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `bagian` varchar(150) NOT NULL,
  `no_hp` varchar(35) NOT NULL,
  `status` enum('aktif','blok') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nip`, `nama`, `jabatan`, `bagian`, `no_hp`, `status`) VALUES
(2, '196309271988031006', ' Ade Yuhana, SE, Amd. Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(3, '196503221992032003', ' Dra. Yeti Nurmiati', 'Guru', 'Ruang Guru', '', 'aktif'),
(4, '196608051994032004', ' Dra. Martiah', 'Guru', 'Ruang Guru', '', 'aktif'),
(5, '196311231983052005', ' Popon Ipah Sofiyah, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(6, '196303281985121002', ' H. Karya Sukarya, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(7, '196305161989032004', ' Yuyet Herawati, S.Pd. Ing.', 'Guru', 'Ruang Guru', '', 'aktif'),
(8, '196505061988032007', ' Hj. Kokom Komariah, S.Pd.', 'Guru', 'Ruang BK', '', 'aktif'),
(9, '196505101988111003', ' Ateng Drajat, S.Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(10, '196408081992032006', ' Dra. Tini Wartini', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(11, '196510271989031009', ' Edi Sopyan, S.Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(12, '196903141992032005', ' Atik Rostika, SST', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(13, '196905111994032009', ' Dra. Dety Ninawaty, MT', 'Guru', 'Ruang Guru', '', 'aktif'),
(14, '197005271995121001', ' Drs. Ishak Iskandar', 'Guru', 'Ruang Guru', '', 'aktif'),
(15, '197010091995122001', ' Mimin Aryani, S.Pd', 'Guru', 'Ruang Kurikulum', '', 'aktif'),
(16, '196608121996032001', ' Dra. Pupuy Yartini', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(17, '196907111995122001', ' Dra. Leli Yuliati', 'Guru', 'Ruang Guru', '', 'aktif'),
(18, '196910081998021002', ' Dani Nugraha M, S.Pd', 'Guru', 'Ruang UP RPL', '', 'aktif'),
(19, '196608041995122002', ' Asmayawati, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(20, '197004211998021003', ' Nuryakin Zuhud, M.Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(21, '197410182002122003', ' Tanti Setohariati, S.Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(22, '196502181993031007', ' Ojo Sudarja, S.Pd', 'Guru', 'Ruang Kurikulum', '', 'aktif'),
(23, '196911252005012008', ' Dra. Siti Aan Rohanah', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(24, '197202222005012005', ' Eri Febriantini, S.SI', 'Guru', 'Ruang Instruktur RPS', '082116741672', 'aktif'),
(25, '197008102006041006', ' Supandi, S.Pd', 'Guru', 'Ruang Kurikulum', '', 'aktif'),
(26, '197701082008011003', ' Harna, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(27, '197903272005011009', ' M. Fazjar Alamsyah, MT', 'Guru', 'Ruang BKK', '', 'aktif'),
(28, '198202282006042010', ' Kiki Santika, S.Kom', 'Guru', 'Ruang Kurikulum', '', 'aktif'),
(29, '197106032007011012', ' Adang, S.Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(30, '197107282007011010', ' Agus Kusmana, SE.', 'Guru', 'Ruang Guru', '', 'aktif'),
(31, '196906032008012012', ' Dra. Ani Raena, M.Pd.', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(32, '198504062009022003', ' Lina Apri Ani Gustina, S.Pd', 'Guru', 'Ruang Kurikulum', '', 'aktif'),
(33, '197810292009021003', ' Idad, S.Pd', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(34, '197903072009022002', ' Angi Remainatatit, S.Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(35, '197804282009022001', ' Lia Rulianti Milyarria, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(36, '197907282010011006', ' Asep Wahyudin, S.T.', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(37, '198010072014082002', ' Neng Yayas Ismayati, M.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(38, '196712242014112001', ' Dra. Siti Maemunah', 'Guru', 'Ruang Guru', '', 'aktif'),
(39, '197502042014122001', ' Aryanti Reni Sari, SP, MM', 'Guru', 'Ruang Guru', '', 'aktif'),
(40, '198109092014122001', ' Iyan Rohaeni, S.Pd', 'Guru', 'Ruang Kurikulum', '', 'aktif'),
(41, '198106142014112001', ' Lilis Resmiati, SE, MM', 'Guru', 'Ruang Guru', '', 'aktif'),
(42, '', ' Nurhayati, S.Ag', 'Guru', 'Ruang Guru', '', 'aktif'),
(43, '', ' Hj. Winy Roswinawati, S.Ag., M.Si', 'Guru', 'Ruang Guru', '', 'aktif'),
(44, ' 199211052020122012', ' Wulan Nopianti, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(46, '', ' Ade Nurdawati, SS', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(47, '', ' Ai Anita, SPd', 'Guru', 'Ruang Guru', '', 'aktif'),
(48, '', ' Untung Prihartono, SST.', 'Guru', 'Ruang Instruktur RPS', '', 'aktif'),
(49, '', ' Siti Wulansari, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(50, '', ' Kokom Komalasari,S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(51, '', ' Deviandra Sandhika, S.Pd.', 'Guru', 'Ruang Kaprog', '', 'aktif'),
(52, '', ' Ai Yulianti, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(53, '', ' Ade Mulyana, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(54, '', 'Arumsari Daniyati, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(55, '', 'Wilda Nuryuliani, SE', 'Guru', 'Ruang Guru', '', 'aktif'),
(56, '', 'Imas Imaniyyah, S.Sos, MM', 'Guru', 'Ruang Guru', '', 'aktif'),
(57, '', 'Robi Iskandar', 'Guru', 'Ruang Guru', '', 'aktif'),
(58, '', 'Wida Dewiyarti, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(59, '', 'Sunarti Setoresmi Supono, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(60, '', 'Kiki Indriani Iskandar, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(61, '', 'Indriyani Nurbaini, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(62, '', 'Dedeh Kurniasih, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(63, '', 'Eli Kurnia Hamid, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(64, '', 'Sri Hartati, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(65, '', 'Heni Andriyani, S.Kom', 'Guru', 'Ruang Guru', '', 'aktif'),
(66, '', 'Irlan Sugih Pranoto, S.Kom', 'Guru', 'Ruang Guru', '', 'aktif'),
(67, '', 'Ahmad Arifin , S.Kom. M.Kom', 'Guru', 'Ruang UP RPL', '', 'aktif'),
(68, '', 'Raden Irsan Suryadrajat', 'Guru', 'Ruang Guru', '', 'aktif'),
(69, '', 'Atang Hidayat', 'Guru', 'Ruang Guru', '', 'aktif'),
(70, '', ' Euis Juariah, SS', 'Guru', 'Ruang Guru', '', 'aktif'),
(71, '', ' Rendra, S.Pd', 'Guru', 'Ruang BKK', '', 'aktif'),
(72, '', ' Nurmaya Dewi, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(73, '', ' Noneng Suartini, S.Ag.', 'Guru', 'Ruang Guru', '', 'aktif'),
(74, '', ' Endra Kusumah, S.Pd.', 'Guru', 'Ruang Instruktur RPS', '', 'aktif'),
(75, '', ' Irman Ariyana. S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(76, '', ' Said Harismansyah, M.Pd.', 'Guru', 'Mesjid', '', 'aktif'),
(77, '', ' Toni Sontany, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(78, '', ' Jejen Zenal Arifin, S.Pd.I.', 'Guru', 'Mesjid', '', 'aktif'),
(79, '', ' R.M. Doni H.A. W., S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(80, '', ' Dini Karlina Siti Hodijah, S.Pd.', 'Guru', 'Ruang BK', '', 'aktif'),
(81, '', ' Syifa Mufidah, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(82, '', ' Syamsul Mujadid, S.Kom.I.', 'Guru', 'Ruang BK', '', 'aktif'),
(83, '', ' Hasna Latifah, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(84, '', ' Dwi Arin Fajriani, S.Kom.', 'Guru', 'Ruang Instruktur RPS', '', 'aktif'),
(85, '', ' Nukeu Siti Faradina Arofah, S.Pd.', 'Guru', 'Ruang Guru', '', 'aktif'),
(86, '', ' Asri Rachmayani, S.Pd', 'Guru', 'Ruang Guru', '', 'aktif'),
(87, '', ' Wildan Muhammad Hafizh, S.Kom', 'Guru', 'Ruang UP RPL', '', 'aktif'),
(88, '', ' Renra Noviana, S.Pd', 'Guru', 'Ruang Instruktur RPS', '', 'aktif'),
(89, '', 'Pemistry Sandy, SS', 'Guru', 'Ruang Guru', '', 'aktif'),
(90, '', 'Aeni Inayah, S.Pd.', 'Guru', 'Ruang BK', '', 'aktif'),
(91, '196602111986022001', 'Dewi Hayati', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(92, '196806121993032009', ' Neny Yunia', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(93, '', ' Nia Kurniasari', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(94, '', ' Dadad Suhada', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(95, '', ' Didi', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(96, '', ' Ramdhan Sulaeman', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(97, '', ' Gian Libia Samantha', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(98, '', ' Yuyu Junaedi, S.Pd. I', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(99, '', ' Aan Maryati Andriani A.Ma. Pust', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(100, '', ' Supandi', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(101, '', ' Edi', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(102, '', ' Entang Koswara', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(103, '', ' Irfan Arif Hidayat', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(104, '', 'Wisnu Pratama Putra', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(105, '', 'Tita Cahyati', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(106, '', 'Devi', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(107, '', 'Guru', 'Guru', 'Ruang Guru', '', 'aktif'),
(108, '', 'Staf TU', 'Staf TU', 'Ruang Tata Usaha', '', 'aktif'),
(109, '', 'Siswa', 'Siswa', 'Kelas', '', 'aktif'),
(316, '196501211998021001', ' Drs. H. Edi Supriadi, M.Pd', 'Kepala Sekolah', 'Ruang Kepala Sekolah', '', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenkel` varchar(2) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `tgl_datang` datetime NOT NULL DEFAULT current_timestamp(),
  `keperluan` text NOT NULL,
  `nama_tujuan` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`id`, `nama`, `alamat`, `jenkel`, `no_hp`, `tujuan`, `tgl_datang`, `keperluan`, `nama_tujuan`, `photo`, `user_id`, `nama_user`) VALUES
(12, 'Sudjatmiko', 'Mojolebak Kupang Jetis Kab. Mojokerto', 'L', '083435235235623', 'Gudang Belakang', '2022-06-05 19:36:08', 'Setor Indomie ', '59', 'foto_sudjatmiko_tamu_2022-06-05.jpeg', 1, '1'),
(14, 'Hasya Nurul Ikrima', 'Jl. Angkrek No. 93 Sumedang ', 'P', '0899999999999', 'Gudang Belakang', '2023-01-06 10:14:03', 'Mengirim makanan', '7', 'foto_hasya-nurul-ikrima_tamu_2023-01-06.jpeg', 1, '1'),
(15, 'Eri Febriantini', 'Jl. Angkrek No. 93 Sumedang', 'P', '082116741672', 'Main Office', '2023-02-15 08:58:29', 'Studi banding', '15', 'foto_eri-febriantini_tamu_2023-02-15.jpeg', 1, 'Cak Admin'),
(16, 'Asep', 'Cikole', 'L', '0000000', 'Kesiswaan', '2023-02-15 11:39:29', 'Bertamu', '1', 'foto_asep_tamu_2023-02-15.jpeg', 7, '7'),
(17, 'ADID', 'Jl Agddbf', 'L', '6545666', 'Akademis/Kurikulum', '2023-02-15 12:06:05', 'xfvgbhbhnh', '2', 'foto_adid_tamu_2023-02-15.jpeg', 7, '7'),
(18, 'Budi Doremi', 'Cimalaka', 'L', '08123456789', 'Ruang Instruktur RPS', '2023-02-17 16:39:05', 'Silaturahmi', '24', 'foto_budi-doremi_tamu_2023-02-17.jpeg', 7, '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `moto` varchar(100) DEFAULT NULL,
  `jenkel` varchar(2) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT 1,
  `level` varchar(3) DEFAULT NULL,
  `register` timestamp NULL DEFAULT current_timestamp(),
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `nama`, `moto`, `jenkel`, `username`, `password`, `tentang`, `email`, `nohp`, `status`, `level`, `register`, `photo`) VALUES
(1, 'Cak Admin', 'Just do it', 'L', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'I am a mountainner. to me mountainerring is a life', 'admine_jhon@gmail.com', '082244339826', 1, '1', '2022-02-03 06:07:55', 'e1b0bef49766ac35512dec14d158f7bc.jpg'),
(5, 'Celine Evangelista', NULL, 'P', 'celine', 'dba7b8a81dc064a62919df57e69d0054', NULL, 'celine_evangelista@gmail.com', '082244339826', 1, '1', '2022-06-05 12:32:34', '966d0fd03a9785fb6526a219a054f465.jpeg'),
(6, 'Eri Febriantini', NULL, 'P', 'Eri Febrianitni', '41757e81f488fee333fd59c40025ecab', NULL, 'erifebriantini22@guru.smk.belajar.id', '082116741672', 1, '1', '2023-02-15 02:09:08', '91a15428da8d721919f502c1f3cdd9db.jpg'),
(7, 'Petugas Admin', NULL, 'P', 'Petugas Admin', '3710f767e2ea0372051e3342eee556b0', NULL, 'admin@gmail.com', '08111111', 1, '2', '2023-02-15 02:11:15', '8c6bdb151e19a1908f5b5a6c1f69b487.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kartu_tamu`
--
ALTER TABLE `tbl_kartu_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paket_surat`
--
ALTER TABLE `tbl_paket_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kartu_tamu`
--
ALTER TABLE `tbl_kartu_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_paket_surat`
--
ALTER TABLE `tbl_paket_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
