-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2022 at 03:14 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Level` varchar(50) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `harga` int(25) NOT NULL,
  `diskon` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `createtime` datetime NOT NULL,
  `returntime` datetime NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_jasa`
--

CREATE TABLE `jenis_jasa` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `harga` int(25) NOT NULL,
  `diskon` int(11) NOT NULL
);

CREATE TABLE `mid` (
  `id_mid` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `harga` int(25) NOT NULL,
  `diskon` int(11) NOT NULL
);

--
-- Dumping data for table `jenis_jasa`
--

INSERT INTO `jenis_jasa` (`id_jenis`, `nama_jenis`, `harga`, `diskon`) VALUES
(1, 'Satuan', 15000, 0),
(3, 'New Jasa', 3000, 15);

INSERT INTO `mid` (`id_mid`, `nama_jenis`, `harga`, `diskon`) VALUES
(1, 'Satuan', 15000, 0),
(3, 'New Jasa', 3000, 15);
-- --------------------------------------------------------

--
-- Table structure for table `selesai`
--

CREATE TABLE `selesai` (
  `id_selesai` int(11) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `returntime_selesai` datetime NOT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `jenis_jasa`
--
ALTER TABLE `jenis_jasa`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `selesai`
--
ALTER TABLE `selesai`
  ADD PRIMARY KEY (`id_selesai`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_jasa` (`id_jasa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_jasa`
--
ALTER TABLE `jenis_jasa`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `selesai`
--
ALTER TABLE `selesai`
  MODIFY `id_selesai` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jasa`
--
ALTER TABLE `jasa`
  ADD CONSTRAINT `jasa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jasa_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_jasa` (`id_jenis`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `selesai`
--
ALTER TABLE `selesai`
  ADD CONSTRAINT `selesai_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `selesai_ibfk_2` FOREIGN KEY (`id_jasa`) REFERENCES `jasa` (`id_jasa`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
