-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 04:37 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcity_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `grup_akses`
--

CREATE TABLE `grup_akses` (
  `akses_id` int(10) NOT NULL,
  `nama_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup_akses`
--

INSERT INTO `grup_akses` (`akses_id`, `nama_akses`) VALUES
(1, 'read only'),
(2, 'full access');

-- --------------------------------------------------------

--
-- Table structure for table `grup_menu`
--

CREATE TABLE `grup_menu` (
  `grup_menu_id` int(10) NOT NULL,
  `grup_user_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `akses_id` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup_menu`
--

INSERT INTO `grup_menu` (`grup_menu_id`, `grup_user_id`, `menu_id`, `akses_id`) VALUES
(1, 1, 6, 2),
(2, 1, 7, 2),
(3, 3, 4, 1),
(4, 3, 5, 1),
(5, 2, 1, 1),
(6, 5, 6, 2),
(7, 2, 2, 1),
(8, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_aplikasi`
--

CREATE TABLE `m_aplikasi` (
  `aplikasi_id` int(10) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `pic` varchar(50) NOT NULL,
  `telp_pic` varchar(50) NOT NULL,
  `logo_aplikasi` text NOT NULL,
  `url_aplikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_aplikasi`
--

INSERT INTO `m_aplikasi` (`aplikasi_id`, `nama_aplikasi`, `deskripsi`, `pic`, `telp_pic`, `logo_aplikasi`, `url_aplikasi`) VALUES
(1, 'Portal Eksekutif', 'Portal Eksekutif adalah Portal yang dibuat untuk mengentry laporan', 'Aldo', '12345', '2e45e022dad2a7342ed10d0252e75dd0.png', '-'),
(2, 'Portal Smartcity', 'Portal Smartcity adalah Portal yang dibuat untuk mengatur beberapa aplikasi di dalamnya', 'Ami', '12345', 'f0fa2630bd7d8454c89b068e5e5b0598.png', '-'),
(3, 'Portal Kelurahan', 'Portal Kelurahan adalah website yang dibuat untuk melayani warga ditingkat kelurahan', 'Gilang', '12345', '376f550dbcb6749004da7f20a2885bd2.png', '-'),
(4, 'Data Warehouse', 'Data Warehouse adalah aplikasi yang digunakan untuk menjadi gudang data pemerintahan', 'Rendy', '12345', '67d43bb255528b1cb9ead2bb0a15614c.jpg', '-'),
(5, 'Depok Single Window', '-', '-', '-', 'a27798054a49d6b0b44f7b19756fdf4d.gif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `m_berita`
--

CREATE TABLE `m_berita` (
  `id_berita` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_berita`
--

INSERT INTO `m_berita` (`id_berita`, `judul`, `content`, `penulis`, `status`, `tgl_update`, `foto`) VALUES
(13, 'tst', '<p>tst</p>\r\n<p>&nbsp;</p>', NULL, 'Publish', NULL, '8a0f7144149ca27498de51a1cf958bc9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `m_grup`
--

CREATE TABLE `m_grup` (
  `grup_user_id` int(10) NOT NULL,
  `nama_grup` varchar(50) NOT NULL,
  `aplikasi_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_grup`
--

INSERT INTO `m_grup` (`grup_user_id`, `nama_grup`, `aplikasi_id`) VALUES
(1, 'Eksekutif-Admin', 1),
(2, 'Super-User', 2),
(3, 'Kelurahan-Admin', 3),
(4, 'Eksekutif-Opd', 1),
(5, 'eksekutif-apa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_menu`
--

CREATE TABLE `m_menu` (
  `menu_id` int(10) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `url_menu` varchar(255) NOT NULL,
  `aplikasi_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_menu`
--

INSERT INTO `m_menu` (`menu_id`, `nama_menu`, `url_menu`, `aplikasi_id`) VALUES
(1, 'Rating', '-', 2),
(2, 'Running Text', '-', 2),
(3, 'Berita', '-', 2),
(4, 'Profil Kelurahan', '-', 3),
(5, 'Lembaga Kelurahan', '-', 3),
(6, 'Entry Report', '-', 1),
(7, 'Entry Parameter', '-', 1),
(8, 'Pembangunan', '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `m_running`
--

CREATE TABLE `m_running` (
  `id_running_text` int(10) NOT NULL,
  `isi` text NOT NULL,
  `tgl_update` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_aplikasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `nik` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`nik`, `email`, `password`, `nama`, `tgl_lahir`, `alamat`, `pekerjaan`) VALUES
('123', 'curotz@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'amiana', '2018-10-16', 'JL. TAPOS NO 100', 'test'),
('327123456789123', 'pulan@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Pulan bin pulan', '2018-10-13', 'Beji', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `publish`
--

CREATE TABLE `publish` (
  `id_article` int(10) NOT NULL,
  `aplikasi_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publish`
--

INSERT INTO `publish` (`id_article`, `aplikasi_id`) VALUES
(28, 4),
(28, 4),
(28, 4),
(29, 5),
(29, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_article` int(11) NOT NULL,
  `jenis` enum('pariwisata','berita','hotnews','article') NOT NULL,
  `judul` text,
  `content` text NOT NULL,
  `Kordinat` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `foto` text,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_article`, `jenis`, `judul`, `content`, `Kordinat`, `kategori`, `kelurahan`, `tanggal`, `foto`, `update`, `tgl_mulai`, `tgl_akhir`, `lat`, `lng`, `id_profile`) VALUES
(28, '', 'susu ultra', '<p>Masukan Desripsi Berita</p>', NULL, 'sosial', NULL, '2018-10-20', NULL, '2018-10-21 14:55:18', '2018-10-20', '2018-10-20', NULL, NULL, 0),
(29, '', 'Bintang1', '<p>Masukan Desripsi Berita</p>', NULL, 'sosial', NULL, '2018-10-20', NULL, '2018-10-21 16:27:18', '2018-10-17', '2018-10-24', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_aplikasi`
--

CREATE TABLE `user_aplikasi` (
  `user_aplikasi_id` int(10) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `grup_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_aplikasi`
--

INSERT INTO `user_aplikasi` (`user_aplikasi_id`, `nik`, `grup_user_id`) VALUES
(1, '327123456789123', 3),
(2, '123', 5),
(3, '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grup_akses`
--
ALTER TABLE `grup_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- Indexes for table `grup_menu`
--
ALTER TABLE `grup_menu`
  ADD PRIMARY KEY (`grup_menu_id`),
  ADD KEY `grup_user_id` (`grup_user_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `akses_id` (`akses_id`);

--
-- Indexes for table `m_aplikasi`
--
ALTER TABLE `m_aplikasi`
  ADD PRIMARY KEY (`aplikasi_id`);

--
-- Indexes for table `m_berita`
--
ALTER TABLE `m_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `m_grup`
--
ALTER TABLE `m_grup`
  ADD PRIMARY KEY (`grup_user_id`),
  ADD KEY `aplikasi_id` (`aplikasi_id`);

--
-- Indexes for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `aplikasi_id` (`aplikasi_id`);

--
-- Indexes for table `m_running`
--
ALTER TABLE `m_running`
  ADD PRIMARY KEY (`id_running_text`),
  ADD KEY `id_aplikasi` (`id_aplikasi`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `publish`
--
ALTER TABLE `publish`
  ADD KEY `id_article` (`id_article`),
  ADD KEY `aplikasi_id` (`aplikasi_id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `user_aplikasi`
--
ALTER TABLE `user_aplikasi`
  ADD PRIMARY KEY (`user_aplikasi_id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `grup_user_id` (`grup_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grup_akses`
--
ALTER TABLE `grup_akses`
  MODIFY `akses_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grup_menu`
--
ALTER TABLE `grup_menu`
  MODIFY `grup_menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_aplikasi`
--
ALTER TABLE `m_aplikasi`
  MODIFY `aplikasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_berita`
--
ALTER TABLE `m_berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_grup`
--
ALTER TABLE `m_grup`
  MODIFY `grup_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_menu`
--
ALTER TABLE `m_menu`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_running`
--
ALTER TABLE `m_running`
  MODIFY `id_running_text` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_aplikasi`
--
ALTER TABLE `user_aplikasi`
  MODIFY `user_aplikasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grup_menu`
--
ALTER TABLE `grup_menu`
  ADD CONSTRAINT `grup_menu_ibfk_1` FOREIGN KEY (`akses_id`) REFERENCES `grup_akses` (`akses_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grup_menu_ibfk_2` FOREIGN KEY (`grup_user_id`) REFERENCES `m_grup` (`grup_user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grup_menu_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `m_menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_grup`
--
ALTER TABLE `m_grup`
  ADD CONSTRAINT `m_grup_ibfk_1` FOREIGN KEY (`aplikasi_id`) REFERENCES `m_aplikasi` (`aplikasi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD CONSTRAINT `m_menu_ibfk_1` FOREIGN KEY (`aplikasi_id`) REFERENCES `m_aplikasi` (`aplikasi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_running`
--
ALTER TABLE `m_running`
  ADD CONSTRAINT `m_running_ibfk_1` FOREIGN KEY (`id_aplikasi`) REFERENCES `m_aplikasi` (`aplikasi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publish`
--
ALTER TABLE `publish`
  ADD CONSTRAINT `publish_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `tbl_berita` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publish_ibfk_2` FOREIGN KEY (`aplikasi_id`) REFERENCES `m_aplikasi` (`aplikasi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_aplikasi`
--
ALTER TABLE `user_aplikasi`
  ADD CONSTRAINT `user_aplikasi_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `m_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_aplikasi_ibfk_6` FOREIGN KEY (`grup_user_id`) REFERENCES `m_grup` (`grup_user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
