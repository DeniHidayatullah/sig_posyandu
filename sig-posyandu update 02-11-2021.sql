-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 05:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

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
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id` int(11) NOT NULL,
  `nama_vaksin` varchar(120) NOT NULL,
  `umur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_imunisasi`
--

CREATE TABLE `jadwal_imunisasi` (
  `id` int(90) NOT NULL,
  `tgl_imunisasi` datetime NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pos` varchar(100) NOT NULL,
  `imunisasi` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE `posyandu` (
  `id` int(50) NOT NULL,
  `nama_posyandu` varchar(90) NOT NULL,
  `penanggung_jawab` varchar(90) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`id`, `nama_posyandu`, `penanggung_jawab`, `longitude`, `latitude`, `keterangan`) VALUES
(1, 'Darma Bakti', 'Maretta', '-12944', '-12944', '- Baik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(35) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `foto_ktp` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `role` enum('user','bidan','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `tgl_lahir`, `alamat`, `no_tlp`, `foto_ktp`, `longitude`, `latitude`, `is_active`, `role`) VALUES
(1, 'alifia', 'alifia', 'alif@gmail.com', '$2y$10$7/uGm4Z6p9LtizSxE7IQiOeZ7f2ybARwABmcie0yY9IAFznRPp9sG', '2021-11-01', 'jember', '081515868592', 'default.png', '112.7520883', '-7.2574719', 1, 'user'),
(3, 'riski', 'riski', 'riski@gmail.com', '$2y$10$PFiNxlyZ.GaAxNTSavyNZedgXU59v7MAwYbBylFi7UUSqxsP7JeUS', '2021-11-01', 'bondowoso', '081515868592', 'default.png', '112.7520883', '-7.2574719', 1, 'user'),
(4, 'mega', 'mega', 'mega@gmail.com', '$2y$10$SuNClFHc2J9FUfmCoslxvey2Lbw9qjje9EjrVBMggUfS1GDCgXPpC', '2021-11-01', 'jember', '081515868592', 'default.png', '113.3185405', '-8.2503006', 1, 'user'),
(5, 'fabi', 'fabi', 'fabi@gmail.com', '$2y$10$MCgPxkHJj5O/GtRzxUic2OuUfjNg8JbIFPjW/4ds7beFWFRl.I3MO', '2021-11-01', 'jember', '081515868592', 'default.png', '112.7520883', '-7.2574719', 1, 'admin'),
(6, 'nina', 'nina', 'nina@gmail.com', '$2y$10$CnnwUG2MXxsqCd5GsF9QBei8Ffuts9tvSb3mcOmH3MJ61Ot0wWcZ2', '2021-11-01', 'jember', '081515868592', 'default.png', '112.7520883', '-7.2574719', 0, 'user'),
(7, 'Aji Pratama', 'aji', 'ajip2606@gmail.com', '$2y$10$4i6lw1U/lkWm/.G6EWE4yO2hcuwSwyRlToBCTUdgyRx0QnQdOTuUq', '2021-11-01', 'lumajang', '081515868592', 'FOTO-(1).png', '112.7520883', '-7.2574719', 1, 'user'),
(9, 'Maretta', 'maretta', 'maretta@gmail.com', '$2y$10$qSnHQvCrTUabN5iMtlhga.8hWIiPpNU6p1r79NUcekhT3xuUTMMYa', '2021-11-01', 'situbondo', '081515868592', 'default.png', '-', '-', 1, 'bidan'),
(10, 'Rendhy Pratama Putra', 'rendhy11', 'rendhy@gmail.com', '$2y$10$cBfVdMrg1OMWEKsWl9DAJu.AoDE0Co/bvxQ9o8pWHX89VV.IvfJvi', '2019-06-02', 'Kemuningsari Kidul, Jenggawah', '081615288394', 'foto_berwarna-compress1.jpg', '113.6740257', '-8.189193', 0, 'user'),
(11, 'Niske Elmy Paulina S.Tr.Kes', 'niskey12', 'niskeelmy12@gmail.com', '$2y$10$VFivIO0UR1npSi8q4ytEFOXaFC/wGsE/SLQo7/ZuHqs04W/Fs9H6m', '1994-03-16', 'Rogojampi', '', 'default.jpg', '-', '-', 0, 'bidan');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `posyandu`
--
ALTER TABLE `posyandu`
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
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_imunisasi`
--
ALTER TABLE `jadwal_imunisasi`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
