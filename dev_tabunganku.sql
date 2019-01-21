-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 04:24 PM
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
-- Table structure for table `table_keinginan`
--

CREATE TABLE `table_keinginan` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `keinginan` text NOT NULL,
  `deadline` date NOT NULL,
  `jumlah_uang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `table_simpanan`
--

CREATE TABLE `table_simpanan` (
  `username` varchar(30) NOT NULL,
  `mata_uang` varchar(30) NOT NULL,
  `jumlah_tabungan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `username`, `password`, `nama_depan`, `nama_belakang`, `tanggal_daftar`, `photo`) VALUES
(1, 'uniuniuni', 'ee11cbb19052e40b07aac0ca060c23ee', 'Umar', 'Aziz', '2019-01-21 15:04:31', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `table_keinginan`
--
ALTER TABLE `table_keinginan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_nabung`
--
ALTER TABLE `table_nabung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
