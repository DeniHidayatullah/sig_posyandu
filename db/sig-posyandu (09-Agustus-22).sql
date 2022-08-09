-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 01:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig-posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `balita`
--

CREATE TABLE `balita` (
  `id` int(11) NOT NULL,
  `nama_balita` varchar(255) NOT NULL,
  `jk_balita` varchar(255) NOT NULL,
  `tempat_lahir_balita` varchar(255) NOT NULL,
  `tanggal_lahir_balita` date NOT NULL,
  `alamat_balita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id`, `nama_balita`, `jk_balita`, `tempat_lahir_balita`, `tanggal_lahir_balita`, `alamat_balita`) VALUES
(1, 'ahmad', 'L', 'jember', '2022-07-27', 'jember'),
(2, 'Jel', 'P', 'jember', '2014-02-27', 'jember');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `id_posyandu` int(11) NOT NULL,
  `id_bidan` int(11) NOT NULL,
  `id_jenis_imunisasi` int(11) NOT NULL,
  `tgl_imunisasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id`, `id_balita`, `id_posyandu`, `id_bidan`, `id_jenis_imunisasi`, `tgl_imunisasi`) VALUES
(2, 1, 1, 11, 1, '2022-07-23'),
(4, 1, 3, 9, 1, '2022-07-27'),
(6, 2, 5, 11, 5, '2022-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_imunisasi`
--

CREATE TABLE `jadwal_imunisasi` (
  `id` int(90) NOT NULL,
  `tgl_imunisasi` date NOT NULL,
  `jam` varchar(255) NOT NULL,
  `id_posyandu` varchar(100) NOT NULL,
  `id_jenis_imunisasi` varchar(80) NOT NULL,
  `id_bidan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_imunisasi`
--

INSERT INTO `jadwal_imunisasi` (`id`, `tgl_imunisasi`, `jam`, `id_posyandu`, `id_jenis_imunisasi`, `id_bidan`) VALUES
(2, '2022-08-09', '10:10', '3', '1', 9),
(4, '2022-07-25', '13:15', '4', '5', 11);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_imunisasi`
--

CREATE TABLE `jenis_imunisasi` (
  `id` int(11) NOT NULL,
  `nama_vaksin` varchar(120) NOT NULL,
  `umur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_imunisasi`
--

INSERT INTO `jenis_imunisasi` (`id`, `nama_vaksin`, `umur`) VALUES
(1, 'a', '14'),
(5, 'b', '5');

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE `posyandu` (
  `id` int(50) NOT NULL,
  `nama_posyandu` varchar(90) NOT NULL,
  `penanggung_jawab` varchar(90) NOT NULL,
  `alamat_posyandu` varchar(255) NOT NULL,
  `id_titik` varchar(110) DEFAULT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`id`, `nama_posyandu`, `penanggung_jawab`, `alamat_posyandu`, `id_titik`, `longitude`, `latitude`) VALUES
(3, 'POS C', 'Maretta', 'Bondowoso', '48', '', ''),
(4, 'POS D', 'Maretta', 'Bondowoso', '6', '', ''),
(5, 'POS E', 'Maretta', 'Bondowoso', '7', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `id_titik_awal` varchar(110) NOT NULL,
  `id_titik_tujuan` varchar(110) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `id_titik_awal`, `id_titik_tujuan`, `nilai`) VALUES
(1, '49', '1', '0.59658991803568'),
(2, '1', '4', '0.065987119'),
(3, '1', '2', '0.31465825730689'),
(4, '1', '25', '0.54790892719697'),
(5, '2', '3', '0.80087960412573'),
(6, '3', '31', '0.43260631177776'),
(7, '31', '30', '0.28722278850059'),
(8, '30', '29', '0.073970738276922'),
(9, '29', '28', '0.1682746014923'),
(10, '28', '27', '0.080447738476872'),
(11, '27', '26', '0.12244493054812'),
(12, '25', '26', '0.84979004278819'),
(13, '26', '27', '0.12244493054812'),
(14, '27', '28', '0.080447738476872'),
(15, '29', '30', '0.073970738276922'),
(16, '30', '31', '0.28722278850059'),
(17, '31', '32', '0.34177219904025'),
(18, '32', '33', '0.15741036869392'),
(19, '33', '34', '0.14921436751658'),
(20, '34', '35', '0.031814653320117'),
(21, '35', '36', '0.1308434600197'),
(22, '32', '37', '0.19447458930347'),
(23, '37', '38', '0.29424918705913'),
(24, '26', '36', '0.36678857404656'),
(25, '4', '5', '0.16626713286858'),
(26, '5', '6', '0.15315983559681'),
(27, '5', '19', '0.29659844683082'),
(28, '6', '7', '0.08327640290695'),
(29, '7', '8', '0.34089174165383'),
(30, '7', '22', '0.10593641753992'),
(31, '22', '21', '0.082838682207937'),
(32, '21', '20', '0.028531089509693'),
(33, '20', '19', '0.14768669834915'),
(34, '19', '23', '0.58682992906216'),
(35, '23', '24', '0.073426758163572'),
(36, '24', '25', '0.3818024600953'),
(37, '23', '46', '0.69815071609608'),
(38, '46', '45', '0.073183188700257'),
(39, '45', '44', '0.06755147062518'),
(40, '44', '43', '0.077032638198147'),
(41, '43', '42', '0.10501021055898'),
(42, '42', '41', '0.71857693361736'),
(43, '41', '40', '0.39213303330229'),
(44, '41', '39', '0.3630697518644'),
(45, '39', '38', '1.3192668906681'),
(46, '38', '48', '0.044371657774559'),
(47, '36', '48', '0.053971899265615');

-- --------------------------------------------------------

--
-- Table structure for table `titik_simpul`
--

CREATE TABLE `titik_simpul` (
  `id` int(11) NOT NULL,
  `nama_simpul` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titik_simpul`
--

INSERT INTO `titik_simpul` (`id`, `nama_simpul`, `latitude`, `longitude`) VALUES
(1, '1', '-8.014802', '113.829529'),
(2, '2', '-8.01297', '113.831707'),
(3, '3', '-8.006125', '113.83397'),
(4, '4', '-8.015283', '113.829178'),
(5, '5', '-8.016149', '113.827947'),
(6, '6', '-8.016743', '113.826692'),
(7, '7', '-8.01654', '113.825964'),
(8, '8', '-8.0195', '113.825158'),
(9, '9', '-8.020124', '113.827386'),
(10, '10', '-8.021423', '113.831598'),
(11, '11', '-8.024519', '113.840386'),
(12, '12', '-8.024011', '113.840819'),
(13, '13', '-8.024927', '113.845511'),
(14, '14', '-8.021463', '113.845422'),
(15, '15', '-8.017579', '113.835482'),
(16, '16', '-8.018554', '113.835056'),
(17, '17', '-8.018281', '113.832883'),
(18, '18', '-8.017206', '113.82919'),
(19, '19', '-8.014134', '113.826182'),
(20, '20', '-8.015333', '113.825605'),
(21, '21', '-8.015404', '113.825356'),
(22, '22', '-8.016107', '113.825107'),
(23, '23', '-8.009789', '113.823157'),
(24, '24', '-8.00966', '113.823811'),
(25, '25', '-8.010456', '113.827184'),
(26, '26', '-8.002941', '113.825781'),
(27, '27', '-8.003336', '113.826819'),
(28, '28', '-8.002754', '113.827253'),
(29, '29', '-8.002967', '113.828766'),
(30, '30', '-8.002366', '113.829054'),
(31, '31', '-8.003044', '113.831571'),
(32, '32', '-8.000668', '113.829602'),
(33, '33', '-8.000149', '113.828272'),
(34, '34', '-7.999689', '113.826999'),
(35, '35', '-7.999943', '113.826866'),
(36, '36', '-7.999643', '113.825717'),
(37, '37', '-7.999515', '113.828274'),
(38, '38', '-7.99879', '113.825704'),
(39, '39', '-7.994102', '113.814698'),
(40, '40', '-7.997249', '113.813819'),
(41, '41', '-7.998249', '113.817234'),
(42, '42', '-8.00463', '113.816202'),
(43, '43', '-8.005064', '113.817049'),
(44, '44', '-8.005756', '113.817016'),
(45, '45', '-8.006033', '113.817562'),
(46, '46', '-8.006686', '113.817645'),
(47, '47', '-8.017273', '113.828378'),
(48, 'L', '-7.99917', '113.825827'),
(49, 'A', '-8.017045', '113.834451');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(35) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `foto_ktp` varchar(200) DEFAULT NULL,
  `id_titik` varchar(110) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `role` enum('user','bidan','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `alamat`, `no_telp`, `foto_ktp`, `id_titik`, `longitude`, `latitude`, `is_active`, `role`) VALUES
(1, 'alifia', 'alifia', 'alif@gmail.com', '$2y$10$SuNClFHc2J9FUfmCoslxvey2Lbw9qjje9EjrVBMggUfS1GDCgXPpC', 'jember', NULL, 'default.png', NULL, NULL, NULL, 1, 'user'),
(3, 'riski', 'riski', 'riski@gmail.com', '$2y$10$PFiNxlyZ.GaAxNTSavyNZedgXU59v7MAwYbBylFi7UUSqxsP7JeUS', 'bondowoso', NULL, 'default.png', NULL, NULL, NULL, 1, 'user'),
(4, 'mega', 'mega', 'mega@gmail.com', '$2y$10$SuNClFHc2J9FUfmCoslxvey2Lbw9qjje9EjrVBMggUfS1GDCgXPpC', 'jember', NULL, 'default.png', NULL, NULL, NULL, 1, 'admin'),
(5, 'fabi', 'fabi', 'fabi@gmail.com', '$2y$10$MCgPxkHJj5O/GtRzxUic2OuUfjNg8JbIFPjW/4ds7beFWFRl.I3MO', 'jember', NULL, 'default.png', NULL, NULL, NULL, 1, 'admin'),
(6, 'nina', 'nina', 'nina@gmail.com', '$2y$10$CnnwUG2MXxsqCd5GsF9QBei8Ffuts9tvSb3mcOmH3MJ61Ot0wWcZ2', 'jember', NULL, 'default.png', NULL, NULL, NULL, 1, 'user'),
(9, 'Maretta', 'maretta', 'maretta@gmail.com', '$2y$10$qSnHQvCrTUabN5iMtlhga.8hWIiPpNU6p1r79NUcekhT3xuUTMMYa', 'situbondo', '08764174726', 'default.png', NULL, NULL, NULL, 1, 'bidan'),
(11, 'Niske Elmy Paulina S.Tr.Kes', 'niskey12', 'niskeelmy12@gmail.com', '$2y$10$VFivIO0UR1npSi8q4ytEFOXaFC/wGsE/SLQo7/ZuHqs04W/Fs9H6m', 'Rogojampi', '086414676224', 'default.jpg', NULL, NULL, NULL, 1, 'bidan'),
(12, 'Deni Hidayatullah', 'Deni Hidayatullah', 'denih1360@gmail.com', '$2y$10$wImGOqqMUjPZYzdyd3Tre.4A5VpAwJDT3nxpwG5lDLpug8vFRMDJW', 'a', '086414676224', '1.jpg', '49', '113.3864594', '-8.1274015', 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_imunisasi`
--
ALTER TABLE `jadwal_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_imunisasi`
--
ALTER TABLE `jenis_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titik_simpul`
--
ALTER TABLE `titik_simpul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balita`
--
ALTER TABLE `balita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_imunisasi`
--
ALTER TABLE `jadwal_imunisasi`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_imunisasi`
--
ALTER TABLE `jenis_imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `titik_simpul`
--
ALTER TABLE `titik_simpul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
