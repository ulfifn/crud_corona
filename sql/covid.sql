-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 03:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `jumlah_OTG` int(11) NOT NULL,
  `jumlah_PP` int(11) NOT NULL,
  `jumlah_ODP` int(11) NOT NULL,
  `jumlah_PDP` int(11) NOT NULL,
  `jumlah_positif` int(11) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id_kecamatan`, `nama_kecamatan`, `jumlah_OTG`, `jumlah_PP`, `jumlah_ODP`, `jumlah_PDP`, `jumlah_positif`, `tanggal_update`) VALUES
(1, 'Kedung', 13, 857, 192, 21, 41, '2020-06-25'),
(2, 'Pecangaan', 12, 1050, 52, 11, 27, '2020-06-25'),
(3, 'Kalinyamatan', 0, 259, 20, 10, 10, '2020-06-25'),
(4, 'Welahan', 0, 1401, 57, 16, 30, '2020-06-25'),
(5, 'Mayong', 0, 977, 64, 14, 9, '2020-06-25'),
(6, 'Nalumsari', 0, 1703, 65, 11, 10, '2020-06-25'),
(7, 'Batealit', 0, 574, 45, 7, 26, '2020-06-25'),
(8, 'Tahunan', 0, 714, 36, 8, 14, '2020-06-25'),
(9, 'Jepara', 0, 1356, 44, 15, 35, '2020-06-25'),
(10, 'Mlonggo', 0, 1436, 53, 15, 11, '2020-06-25'),
(11, 'Bangsri', 0, 2015, 47, 9, 15, '2020-06-25'),
(12, 'Keling', 0, 1393, 138, 9, 1, '2020-06-25'),
(13, 'Karimunjawa', 0, 313, 1, 0, 0, '2020-06-25'),
(14, 'Kembang', 0, 2178, 18, 6, 5, '2020-06-25'),
(15, 'Donorojo', 0, 1752, 42, 5, 0, '2020-06-25'),
(16, 'Pakisaji', 0, 564, 59, 0, 7, '2020-06-25'),
(17, 'Luar Daerah', 0, 0, 6, 14, 20, '2020-06-25'),
(23, 'Selatan', 1, 200, 4, 45, 3, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Ulfi', 'ulfifardiatun@gmail.com', 'ulfi'),
(2, 'Ulfi Far', 'imajibyme@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, 'Ulfi Far', 'ulfi@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
