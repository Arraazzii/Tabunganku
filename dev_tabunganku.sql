-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 09:19 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_tabunganku`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_celengan`
--

CREATE TABLE `table_celengan` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_celengan` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_uang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_celengan`
--

INSERT INTO `table_celengan` (`id`, `username`, `nama_celengan`, `deskripsi`, `jumlah_uang`) VALUES
(2, 'mumaraziz2014@gmail.com', 'ASFA', 'ASF', '0'),
(3, 'mumaraziz2014@gmail.com', 'asfa', 'asfsaf', '0'),
(4, 'Uni', 'Celengan Pertama Uni', 'Tabungan Untuk Nikah', '6051000');

-- --------------------------------------------------------

--
-- Table structure for table `table_keinginan`
--

CREATE TABLE `table_keinginan` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `keinginan` text NOT NULL,
  `deadline` date NOT NULL,
  `jumlah_uang` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_keinginan`
--

INSERT INTO `table_keinginan` (`id`, `username`, `keinginan`, `deadline`, `jumlah_uang`, `deskripsi`, `photo`) VALUES
(1, 'Uni', 'Menikah', '2019-11-05', '15000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_nabung`
--

CREATE TABLE `table_nabung` (
  `id` int(11) NOT NULL,
  `tanggal_menabung` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah_nabung` varchar(30) NOT NULL,
  `catatan` text NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_nabung`
--

INSERT INTO `table_nabung` (`id`, `tanggal_menabung`, `jumlah_nabung`, `catatan`, `username`) VALUES
(34, '2019-02-20 15:45:37', '500', 'Tai', 'Uni'),
(35, '2019-02-20 15:45:50', '500', 'lagi', 'Uni'),
(36, '2019-02-20 15:50:52', '1000000', 'asfasf', 'Uni'),
(37, '2019-02-20 16:32:56', '5000000', 'sadfasdf', 'Uni'),
(38, '2019-02-21 06:44:36', '50000', 'lagi', 'Uni');

-- --------------------------------------------------------

--
-- Table structure for table `table_simpanan`
--

CREATE TABLE `table_simpanan` (
  `username` varchar(30) NOT NULL,
  `jumlah_tabungan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_simpanan`
--

INSERT INTO `table_simpanan` (`username`, `jumlah_tabungan`) VALUES
('Uni', '6051000');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `username`, `password`, `nama_depan`, `nama_belakang`, `tanggal_daftar`, `photo`, `status`) VALUES
('3165748111392613330', 'Uni', 'e52805d8344b67b9b3554d45f1c8958f', 'Seruni', 'Sandya', '2019-02-13 05:57:45', 'default-avatar.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_celengan`
--
ALTER TABLE `table_celengan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_keinginan`
--
ALTER TABLE `table_keinginan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nabung`
--
ALTER TABLE `table_nabung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_simpanan`
--
ALTER TABLE `table_simpanan`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_celengan`
--
ALTER TABLE `table_celengan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_keinginan`
--
ALTER TABLE `table_keinginan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_nabung`
--
ALTER TABLE `table_nabung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
