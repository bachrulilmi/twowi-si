-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2017 at 10:56 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twowinsistem`
--
DROP DATABASE `twowinsistem`;
CREATE DATABASE IF NOT EXISTS `twowinsistem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `twowinsistem`;

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

DROP TABLE IF EXISTS `kandidat`;
CREATE TABLE `kandidat` (
  `id` int(10) NOT NULL,
  `kandidatid` varchar(10) NOT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tempatlahir` varchar(100) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `alamat` text,
  `kodepos` varchar(20) DEFAULT NULL,
  `notelp` varchar(50) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `namasekolah` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `namacomp1` varchar(50) DEFAULT NULL,
  `jabatan1` varchar(50) DEFAULT NULL,
  `lamabkrj1` varchar(20) DEFAULT NULL,
  `namacomp2` varchar(50) DEFAULT NULL,
  `jabatan2` varchar(50) DEFAULT NULL,
  `lamabkrj2` varchar(20) DEFAULT NULL,
  `namacomp3` varchar(50) DEFAULT NULL,
  `jabatan3` varchar(50) DEFAULT NULL,
  `lamabkrj3` varchar(20) DEFAULT NULL,
  `nmbpk` varchar(100) DEFAULT NULL,
  `nmibu` varchar(100) DEFAULT NULL,
  `pkrjortu` varchar(100) DEFAULT NULL,
  `nama_kerabat` varchar(50) DEFAULT NULL,
  `telp_kerabat` varchar(20) DEFAULT NULL,
  `msoffice` varchar(20) DEFAULT NULL,
  `photosh` varchar(20) DEFAULT NULL,
  `autoca` varchar(20) DEFAULT NULL,
  `others` varchar(50) DEFAULT NULL,
  `inggris` varchar(20) DEFAULT NULL,
  `mengemudi` varchar(20) DEFAULT NULL,
  `sim` varchar(20) DEFAULT NULL,
  `fotokandidat` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `refferer` varchar(50) DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  `flag_interview` varchar(20) DEFAULT 'N',
  `flag_member` varchar(20) DEFAULT 'N',
  `flag_aktif` varchar(20) DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `kandidatid`, `namalengkap`, `jenkel`, `status`, `tempatlahir`, `tanggallahir`, `alamat`, `kodepos`, `notelp`, `agama`, `namasekolah`, `jurusan`, `namacomp1`, `jabatan1`, `lamabkrj1`, `namacomp2`, `jabatan2`, `lamabkrj2`, `namacomp3`, `jabatan3`, `lamabkrj3`, `nmbpk`, `nmibu`, `pkrjortu`, `nama_kerabat`, `telp_kerabat`, `msoffice`, `photosh`, `autoca`, `others`, `inggris`, `mengemudi`, `sim`, `fotokandidat`, `jabatan`, `refferer`, `date_add`, `flag_interview`, `flag_member`, `flag_aktif`) VALUES
(1, 'K1', 'Bachrul Ilmi', 'Laki-laki', 'Single', 'Surabaya', '1990-02-15', '', '', '', 'Katolik', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', 'iOPAsBW2AdTulips.jpg', 'Cleaning Service', NULL, NULL, 'Y', 'Y', 'Y'),
(2, 'K2', 'Anton Timur', 'Laki-laki', 'Menikah', 'Jakarta Selatan', '1978-03-12', 'Ciledug', '', '', 'Katolik', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', 'mPqipBi75wLighthouse.jpg', 'Cleaning Service', NULL, NULL, 'Y', 'Y', 'Y'),
(3, 'K3', 'Joko Anwar', 'Laki-laki', 'Menikah', 'Merauke', '1960-05-30', 'Jakarta', '', '081232123', 'Budha', 'Universitas Indonesia', 'Sastra Indonesia', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', 'wyTKoXfAcXHydrangeas.jpg', 'Cleaning Service', NULL, NULL, 'Y', 'Y', 'Y'),
(4, 'K4', 'Pakde', 'Perempuan', 'Pelajar', '', NULL, '', '', '', 'Katolik', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '1V50uXivdGKoala.jpg', 'Cleaning Service', NULL, NULL, 'Y', 'Y', 'Y'),
(5, 'K5', 'Susilo', 'Laki-laki', 'Pelajar', '', NULL, '', '', '', 'Islam', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', 'ycAGjN_DLAChrysanthemum.jpg', 'Cleaning Service,Operator', NULL, NULL, 'Y', 'Y', 'Y'),
(6, 'K6', 'Joko Bektio', 'Laki-laki', 'Single', 'Medan', '1990-02-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', 'eNsojtKTWUPenguins.jpg', 'Security', NULL, NULL, 'Y', 'Y', 'Y'),
(7, 'K7', 'Jengki Joko', 'Perempuan', 'Pelajar', '', NULL, '', '', '', 'Katolik', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Silo', '123983812', '', '', '', '', '', '', '', 'fIHIsPFTUfLighthouse.jpg', 'Cleaning Service,Operator', NULL, NULL, 'Y', 'Y', 'Y'),
(8, 'K8', 'sddfdsf', 'Laki-laki', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'UVqB5NnlWSTulips.jpg', 'Cleaning Service', 'Internet', '0000-00-00', 'Y', 'Y', 'Y'),
(9, 'K9', 'asdasdasd', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'yfwWx84BOrKoala.jpg', 'Security,Cleaning Service', 'Browser', '2017-02-02', 'Y', 'Y', 'Y'),
(10, 'K10', 'sadad', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'wpsirtvxHpLighthouse.jpg', 'Operator', 'Browser', '2017-02-02', 'Y', 'Y', 'Y'),
(11, 'K11', 'sadad', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ZpEz6JLyRYKoala.jpg', 'Cleaning Service', '', '2017-02-02', 'Y', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

DROP TABLE IF EXISTS `konfigurasi`;
CREATE TABLE `konfigurasi` (
  `id` int(10) NOT NULL,
  `items` varchar(20) DEFAULT NULL,
  `nilai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `items`, `nilai`) VALUES
(1, 'potongan-member', '50');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

DROP TABLE IF EXISTS `kontrak`;
CREATE TABLE `kontrak` (
  `id` int(10) NOT NULL,
  `mitraid` int(10) NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `penjelasan` varchar(100) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `nokontrak` varchar(50) DEFAULT NULL,
  `ttd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`id`, `mitraid`, `lampiran`, `penjelasan`, `tahun`, `status`, `periode`, `nokontrak`, `ttd`) VALUES
(1, 1, 'YFnplCOwJ0Chrysanthemum.jpg', 'codot', '20123', 'Aktif', '2323', NULL, NULL),
(2, 1, '', '', 'dada', 'Aktif', '', '24132123', 'adasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
CREATE TABLE `mitra` (
  `id` int(12) NOT NULL,
  `mitraid` varchar(10) NOT NULL,
  `namamitra` varchar(50) DEFAULT NULL,
  `alamatmitra` varchar(255) DEFAULT NULL,
  `namapic` varchar(100) DEFAULT NULL,
  `jabatanpic` varchar(20) NOT NULL,
  `telppic` varchar(25) DEFAULT NULL,
  `emailpic` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `lampiran2` varchar(255) DEFAULT NULL,
  `lampiran3` varchar(255) DEFAULT NULL,
  `lampiran4` varchar(255) DEFAULT NULL,
  `lampiran5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `mitraid`, `namamitra`, `alamatmitra`, `namapic`, `jabatanpic`, `telppic`, `emailpic`, `deskripsi`, `status`, `lampiran`, `lampiran2`, `lampiran3`, `lampiran4`, `lampiran5`) VALUES
(1, '', 'Garuda Indonesia', '', 'Joko', '', '', '', '', 'Aktif', NULL, NULL, NULL, NULL, NULL),
(2, '', 'aasd', 'asda', 'asdafdsfs', 'asd34234', 'asd', 'lhjklh', 'dgfdg', 'Aktif', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_biaya`
--

DROP TABLE IF EXISTS `mst_biaya`;
CREATE TABLE `mst_biaya` (
  `id` int(10) NOT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL,
  `biaya` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_biaya`
--

INSERT INTO `mst_biaya` (`id`, `jenis_bayar`, `biaya`) VALUES
(1, 'Security', '1000000'),
(2, 'Operator', '1500000'),
(3, 'Cleaning Service', '800000'),
(4, 'Borongan', '500000'),
(5, 'Skill', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

DROP TABLE IF EXISTS `mst_jabatan`;
CREATE TABLE `mst_jabatan` (
  `id` int(20) NOT NULL,
  `nmjabatan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id`, `nmjabatan`, `keterangan`) VALUES
(1, 'Cleaning Service', NULL),
(2, 'Operator', NULL),
(3, 'Security', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `kandidatid` varchar(20) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `nominal` decimal(10,0) DEFAULT NULL,
  `picbayar` varchar(100) DEFAULT NULL,
  `jenisbayar` varchar(100) DEFAULT NULL,
  `viabayar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kandidatid`, `tglbayar`, `nominal`, `picbayar`, `jenisbayar`, `viabayar`) VALUES
(1, '1', '2017-01-21', '1000000', NULL, '1', 'Tunai'),
(2, '5', '2017-01-21', '1500000', NULL, '2', 'Tunai'),
(3, '2', '2017-01-21', '1000000', NULL, '1', 'Tunai'),
(4, '3', '2017-02-02', '1000000', NULL, '1', 'Tunai'),
(5, '3', '2017-02-02', '1000000', NULL, '1', 'Tunai'),
(6, '4', '2017-02-02', '1000000', NULL, '1', 'Tunai'),
(7, '4', '2017-02-02', '1000000', NULL, '1', 'Tunai'),
(8, '6', '2017-02-02', '1500000', NULL, '2', 'Tunai'),
(9, '6', '2017-02-02', '1500000', NULL, '2', 'Tunai'),
(10, '7', '2017-02-02', NULL, NULL, '1', 'DP'),
(11, '8', '2017-02-02', NULL, NULL, '1', 'DP'),
(12, '9', '2017-02-02', '1500000', NULL, '2', 'Tunai'),
(13, '10', '2017-02-02', '1500000', NULL, '2', 'Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `report_test`
--

DROP TABLE IF EXISTS `report_test`;
CREATE TABLE `report_test` (
  `id` int(20) NOT NULL,
  `kandidatid` int(20) NOT NULL,
  `name_test` varchar(50) DEFAULT NULL,
  `result_test` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `flag_aktif` varchar(20) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_test`
--

INSERT INTO `report_test` (`id`, `kandidatid`, `name_test`, `result_test`, `keterangan`, `flag_aktif`) VALUES
(1, 9, 'ujian matematika', '900', 'lulus', 'Y'),
(2, 9, 'asdsad', '232', 'sdasd', 'N'),
(3, 9, 'saasd', 'asda', 'asdas', 'N'),
(4, 3, 'psikotes', '70', 'ga lulus', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tran_jabatan`
--

DROP TABLE IF EXISTS `tran_jabatan`;
CREATE TABLE `tran_jabatan` (
  `jabatanid` int(11) DEFAULT NULL,
  `kandidatid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `password_reset_token`) VALUES
(2, 'admin', '0192023a7bbd73250516f069df18b500', '12345', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`,`mitraid`);

--
-- Indexes for table `mst_biaya`
--
ALTER TABLE `mst_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_test`
--
ALTER TABLE `report_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_biaya`
--
ALTER TABLE `mst_biaya`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `report_test`
--
ALTER TABLE `report_test`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
