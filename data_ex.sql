-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 11:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_ex`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`, `alamat`) VALUES
(18, 'ojet', 'shynoda', '0cc175b9c0f1b6a831c399e269772661', 'baginda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agam`
--

CREATE TABLE `tb_agam` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agam`
--

INSERT INTO `tb_agam` (`id_agama`, `nama_agama`) VALUES
(2, 'Islam'),
(5, 'hindu'),
(6, 'Budha'),
(7, 'Khatolik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `no_induk` varchar(7) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`no_induk`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `id_pendidikan`, `id_agama`, `alamat`, `asal_sekolah`, `gambar`) VALUES
('20tk018', 'Hamka Rhashydi', ' Tembelok ', '2001-01-01', 'Laki-Laki', 1, 2, ' sandubaya', ' UNIQHBA', ''),
('20tk020', 'rofi', 'mataram', '2001-01-01', 'Perempuan', 4, 2, 'mataram', 'SMA 1 mataram', '62b4974234758.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `kode_pendidikan` varchar(20) NOT NULL,
  `nama_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `kode_pendidikan`, `nama_pendidikan`) VALUES
(1, 'TK', ' TK '),
(2, 'SD', ' SD '),
(3, ' SMP', ' SMP '),
(4, 'SMA', ' SMA '),
(5, 'UMUM', ' UMUM ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_agam`
--
ALTER TABLE `tb_agam`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_agam`
--
ALTER TABLE `tb_agam`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
