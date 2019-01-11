-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 03:37 PM
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
  `kode_tabungan` varchar(11) NOT NULL,
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
  `kode_tabungan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_simpanan`
--

CREATE TABLE `table_simpanan` (
  `kode_tabungan` varchar(11) NOT NULL,
  `mata_uang` varchar(30) NOT NULL,
  `jumlah_tabungan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode_tabungan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`kode_tabungan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
