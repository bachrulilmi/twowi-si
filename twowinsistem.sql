-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jan 2017 pada 15.15
-- Versi Server: 10.1.9-MariaDB
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

DROP TABLE IF EXISTS `kandidat`;
CREATE TABLE IF NOT EXISTS `kandidat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `msoffice` varchar(20) DEFAULT NULL,
  `photosh` varchar(20) DEFAULT NULL,
  `autoca` varchar(20) DEFAULT NULL,
  `others` varchar(50) DEFAULT NULL,
  `inggris` varchar(20) DEFAULT NULL,
  `mengemudi` varchar(20) DEFAULT NULL,
  `sim` varchar(20) DEFAULT NULL,
  `fotokandidat` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `flag_interview` varchar(20) DEFAULT 'N',
  `flag_member` varchar(20) DEFAULT 'N',
  `flag_aktif` varchar(20) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id`, `kandidatid`, `namalengkap`, `jenkel`, `status`, `tempatlahir`, `tanggallahir`, `alamat`, `kodepos`, `notelp`, `agama`, `namasekolah`, `jurusan`, `namacomp1`, `jabatan1`, `lamabkrj1`, `namacomp2`, `jabatan2`, `lamabkrj2`, `namacomp3`, `jabatan3`, `lamabkrj3`, `nmbpk`, `nmibu`, `pkrjortu`, `msoffice`, `photosh`, `autoca`, `others`, `inggris`, `mengemudi`, `sim`, `fotokandidat`, `jabatan`, `flag_interview`, `flag_member`, `flag_aktif`) VALUES
(1, 'K1', 'Bachrul Ilmi', 'Laki-laki', 'Single', 'Surabaya', '1990-02-15', '', '', '', 'Katolik', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'iOPAsBW2AdTulips.jpg', 'Cleaning Service', 'Y', 'N', 'Y'),
(2, 'K2', 'Anton Timur', 'Laki-laki', 'Menikah', 'Jakarta Selatan', '1978-03-12', 'Ciledug', '', '', 'Katolik', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mPqipBi75wLighthouse.jpg', 'Cleaning Service', 'Y', 'N', 'Y'),
(3, 'K3', 'Joko Anwar', 'Laki-laki', 'Menikah', 'Merauke', '1960-05-30', 'Jakarta', '', '081232123', 'Budha', 'Universitas Indonesia', 'Sastra Indonesia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'C1YyCX077ITulips.jpg', 'Cleaning Service', 'N', 'N', 'Y'),
(4, 'K4', 'Pakde', 'Perempuan', 'Pelajar', '', NULL, '', '', '', 'Katolik', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Cleaning Service', 'N', 'N', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

DROP TABLE IF EXISTS `konfigurasi`;
CREATE TABLE IF NOT EXISTS `konfigurasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `items` varchar(20) DEFAULT NULL,
  `nilai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `items`, `nilai`) VALUES
(1, 'potongan-member', '50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak`
--

DROP TABLE IF EXISTS `kontrak`;
CREATE TABLE IF NOT EXISTS `kontrak` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mitraid` int(10) NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `penjelasan` varchar(100) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

DROP TABLE IF EXISTS `mitra`;
CREATE TABLE IF NOT EXISTS `mitra` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `mitraid` varchar(10) NOT NULL,
  `namamitra` varchar(50) DEFAULT NULL,
  `alamatmitra` varchar(255) DEFAULT NULL,
  `namapic` varchar(100) DEFAULT NULL,
  `telppic` varchar(25) DEFAULT NULL,
  `emailpic` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `lampiran2` varchar(255) DEFAULT NULL,
  `lampiran3` varchar(255) DEFAULT NULL,
  `lampiran4` varchar(255) DEFAULT NULL,
  `lampiran5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`mitraid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `mitraid`, `namamitra`, `alamatmitra`, `namapic`, `telppic`, `emailpic`, `deskripsi`, `status`, `lampiran`, `lampiran2`, `lampiran3`, `lampiran4`, `lampiran5`) VALUES
(1, '', 'Garuda Indonesia', '', 'Joko', '', '', '', 'Aktif', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_biaya`
--

DROP TABLE IF EXISTS `mst_biaya`;
CREATE TABLE IF NOT EXISTS `mst_biaya` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_bayar` varchar(20) DEFAULT NULL,
  `biaya` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_biaya`
--

INSERT INTO `mst_biaya` (`id`, `jenis_bayar`, `biaya`) VALUES
(1, 'Security', '1000000'),
(2, 'Operator', '1500000'),
(3, 'Cleaning Service', '800000'),
(4, 'Borongan', '500000'),
(5, 'Skill', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jabatan`
--

DROP TABLE IF EXISTS `mst_jabatan`;
CREATE TABLE IF NOT EXISTS `mst_jabatan` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nmjabatan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id`, `nmjabatan`, `keterangan`) VALUES
(1, 'Cleaning Service', NULL),
(2, 'Operator', NULL),
(3, 'Security', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kandidatid` varchar(20) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `nominal` decimal(10,0) DEFAULT NULL,
  `picbayar` varchar(100) DEFAULT NULL,
  `jenisbayar` varchar(100) DEFAULT NULL,
  `viabayar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_jabatan`
--

DROP TABLE IF EXISTS `tran_jabatan`;
CREATE TABLE IF NOT EXISTS `tran_jabatan` (
  `jabatanid` int(11) DEFAULT NULL,
  `kandidatid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `password_reset_token`) VALUES
(2, 'admin', '0192023a7bbd73250516f069df18b500', '12345', '12345678');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
