-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 07:47 PM
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
(1, 'ahmad', 'L', 'jember', '2022-07-23', 'jember');

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
(2, 1, 1, 11, 1, '2022-07-23');

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
(2, '2022-07-23', '10:10', '1', '1', 9),
(4, '2022-07-24', '13:14', '4', '1', 11);

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
(1, 'a', '14');

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE `posyandu` (
  `id` int(50) NOT NULL,
  `nama_posyandu` varchar(90) NOT NULL,
  `penanggung_jawab` varchar(90) NOT NULL,
  `alamat_posyandu` varchar(255) NOT NULL,
  `id_rute` int(11) DEFAULT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`id`, `nama_posyandu`, `penanggung_jawab`, `alamat_posyandu`, `id_rute`, `longitude`, `latitude`, `keterangan`) VALUES
(1, 'Darma Bakti', 'Maretta', 'Bondowoso', 3, '', '', 'Baik'),
(2, 'POS B', 'Maretta', 'Bondowoso', 4, '', '', 'Baik'),
(3, 'POS C', 'Maretta', 'Bondowoso', 5, '', '', 'Baik'),
(4, 'POS D', 'Maretta', 'Bondowoso', 6, '', '', 'Baik'),
(5, 'POS E', 'Maretta', 'Bondowoso', 7, '', '', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `id_titik_awal` int(11) NOT NULL,
  `id_titik_tujuan` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `id_titik_awal`, `id_titik_tujuan`, `nilai`) VALUES
(5, 1, 4, ''),
(6, 1, 15, '');

-- --------------------------------------------------------

--
-- Table structure for table `titik_simpul`
--

CREATE TABLE `titik_simpul` (
  `id` int(11) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titik_simpul`
--

INSERT INTO `titik_simpul` (`id`, `latitude`, `longitude`) VALUES
(1, '-8.014802', '113.829529'),
(2, '-8.01297', '113.831707'),
(3, '-8.006125', '113.83397'),
(4, '-8.015283', '113.829178'),
(5, '-8.016149', '113.827947'),
(6, '-8.016743', '113.826692'),
(7, '-8.01654', '113.825964'),
(8, '-8.0195', '113.825158'),
(9, '-8.020124', '113.827386'),
(10, '-8.021423', '113.831598'),
(11, '-8.024519', '113.840386'),
(12, '-8.024011', '113.840819'),
(13, '-8.024927', '113.845511'),
(14, '-8.021463', '113.845422'),
(15, '-8.017579', '113.835482'),
(16, '-8.018554', '113.835056'),
(17, '-8.018281', '113.832883'),
(18, '-8.017206', '113.82919'),
(19, '-8.014134', '113.826182'),
(20, '-8.015333', '113.825605'),
(21, '-8.015404', '113.825356'),
(22, '-8.016107', '113.825107'),
(23, '-8.009789', '113.823157'),
(24, '-8.00966', '113.823811'),
(25, '-8.010456', '113.827184'),
(26, '-8.002941', '113.825781'),
(27, '-8.003336', '113.826819'),
(28, '-8.002754', '113.827253'),
(29, '-8.002967', '113.828766'),
(30, '-8.002366', '113.829054'),
(31, '-8.003044', '113.831571'),
(32, '-8.000668', '113.829602'),
(33, '-8.000149', '113.828272'),
(34, '-7.999689', '113.826999'),
(35, '-7.999943', '113.826866'),
(36, '-7.999643', '113.825717'),
(37, '-7.999515', '113.828274'),
(38, '-7.99879', '113.825704'),
(39, '-7.994102', '113.814698'),
(40, '-7.997249', '113.813819'),
(41, '-7.998249', '113.817234'),
(42, '-8.00463', '113.816202'),
(43, '-8.005064', '113.817049'),
(44, '-8.005756', '113.817016'),
(45, '-8.006033', '113.817562'),
(46, '-8.006686', '113.817645'),
(47, '-8.017273', '113.828378');

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
  `id_rute` int(11) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `role` enum('user','bidan','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `alamat`, `no_telp`, `foto_ktp`, `id_rute`, `longitude`, `latitude`, `is_active`, `role`) VALUES
(1, 'alifia', 'alifia', 'alif@gmail.com', '$2y$10$SuNClFHc2J9FUfmCoslxvey2Lbw9qjje9EjrVBMggUfS1GDCgXPpC', 'jember', NULL, 'default.png', 0, NULL, NULL, 1, 'user'),
(3, 'riski', 'riski', 'riski@gmail.com', '$2y$10$PFiNxlyZ.GaAxNTSavyNZedgXU59v7MAwYbBylFi7UUSqxsP7JeUS', 'bondowoso', NULL, 'default.png', 0, NULL, NULL, 1, 'user'),
(4, 'mega', 'mega', 'mega@gmail.com', '$2y$10$SuNClFHc2J9FUfmCoslxvey2Lbw9qjje9EjrVBMggUfS1GDCgXPpC', 'jember', NULL, 'default.png', 0, NULL, NULL, 1, 'admin'),
(5, 'fabi', 'fabi', 'fabi@gmail.com', '$2y$10$MCgPxkHJj5O/GtRzxUic2OuUfjNg8JbIFPjW/4ds7beFWFRl.I3MO', 'jember', NULL, 'default.png', 0, NULL, NULL, 1, 'admin'),
(6, 'nina', 'nina', 'nina@gmail.com', '$2y$10$CnnwUG2MXxsqCd5GsF9QBei8Ffuts9tvSb3mcOmH3MJ61Ot0wWcZ2', 'jember', NULL, 'default.png', 0, NULL, NULL, 1, 'user'),
(9, 'Maretta', 'maretta', 'maretta@gmail.com', '$2y$10$qSnHQvCrTUabN5iMtlhga.8hWIiPpNU6p1r79NUcekhT3xuUTMMYa', 'situbondo', '08764174726', 'default.png', 0, NULL, NULL, 1, 'bidan'),
(11, 'Niske Elmy Paulina S.Tr.Kes', 'niskey12', 'niskeelmy12@gmail.com', '$2y$10$VFivIO0UR1npSi8q4ytEFOXaFC/wGsE/SLQo7/ZuHqs04W/Fs9H6m', 'Rogojampi', '086414676224', 'default.jpg', 0, NULL, NULL, 1, 'bidan'),
(12, 'Deni Hidayatullah', 'Deni Hidayatullah', 'denih1360@gmail.com', '$2y$10$wImGOqqMUjPZYzdyd3Tre.4A5VpAwJDT3nxpwG5lDLpug8vFRMDJW', 'a', '086414676224', '1.jpg', NULL, '113.3864594', '-8.1274015', 1, 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_imunisasi`
--
ALTER TABLE `jadwal_imunisasi`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_imunisasi`
--
ALTER TABLE `jenis_imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `titik_simpul`
--
ALTER TABLE `titik_simpul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
