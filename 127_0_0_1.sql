-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Mar 2017 pada 01.07
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
DROP DATABASE `twowinsistem`;
CREATE DATABASE IF NOT EXISTS `twowinsistem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `twowinsistem`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `id` int(20) NOT NULL,
  `orderid` varchar(20) DEFAULT NULL,
  `kandidatid` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `flag_checklist` varchar(20) DEFAULT 'IN PROGRESS',
  `ktp` varchar(100) DEFAULT NULL,
  `lamaran` varchar(100) DEFAULT NULL,
  `ijazah` varchar(100) DEFAULT NULL,
  `transkrip` varchar(100) DEFAULT NULL,
  `kartukel` varchar(100) DEFAULT NULL,
  `suratkuning` varchar(100) DEFAULT NULL,
  `pengalamankerja` varchar(100) DEFAULT NULL,
  `flag_pembekalan` varchar(20) DEFAULT 'N',
  `pembekalan_id` varchar(20) DEFAULT NULL,
  `date_bekal` date DEFAULT NULL,
  `time_bekal` time DEFAULT NULL,
  `nama_bekal` varchar(100) DEFAULT NULL,
  `trainer_bekal` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `flag_test` varchar(20) DEFAULT NULL,
  `nilai_test` int(11) DEFAULT NULL,
  `tgl_test` date DEFAULT NULL,
  `hasil_test` varchar(20) DEFAULT NULL,
  `periode_kontrak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `delivery`
--

INSERT INTO `delivery` (`id`, `orderid`, `kandidatid`, `status`, `flag_checklist`, `ktp`, `lamaran`, `ijazah`, `transkrip`, `kartukel`, `suratkuning`, `pengalamankerja`, `flag_pembekalan`, `pembekalan_id`, `date_bekal`, `time_bekal`, `nama_bekal`, `trainer_bekal`, `keterangan`, `flag_test`, `nilai_test`, `tgl_test`, `hasil_test`, `periode_kontrak`) VALUES
(1, 'sadad', 'asd', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1', 'K1', 'AKTIF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '1', 'K1', 'AKTIF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2', 'K1', 'NON AKTIF', 'COMPLETE', '', 'v-g0nrFKaUDesert.jpg', 'xwktBraVlnHydrangeas.jpg', '', 'fBDxRghFsqTulips.jpg', '', 'IpmSPU8FDMPenguins.jpg', 'Y', NULL, '2017-03-01', '23:56:00', 'asd', 'asda', 'asdad', 'Y', 85, '2017-02-19', 'Lulus', '2017-2019'),
(6, '3', 'K4', 'NON AKTIF', 'IN PROGRESS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '3', 'K5', 'AKTIF', 'COMPLETE', 'LerUpRcW2bSmartSelectImage_2017-01-26-00-41-36.jpg', 'WQ6iL-4l8KPenguins.jpg', '', '', '', '', '', 'Y', NULL, '2017-02-02', '23:10:00', 'sopan santun bekerja', 'anwar', '', 'Y', 80, '2017-03-01', 'Lulus', '2 tahun'),
(8, '3', 'K3', 'AKTIF', 'IN PROGRESS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '6j4JodnuOAkt2xwrXZdk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2', 'K5', 'AKTIF', 'IN PROGRESS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'OTm1gIGYhz-EnI5BzYuI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2', 'K6', 'AKTIF', 'IN PROGRESS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'OTm1gIGYhz-EnI5BzYuI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2', 'K3', 'AKTIF', 'IN PROGRESS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
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
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id`, `kandidatid`, `namalengkap`, `jenkel`, `status`, `tempatlahir`, `tanggallahir`, `alamat`, `kodepos`, `notelp`, `agama`, `namasekolah`, `jurusan`, `namacomp1`, `jabatan1`, `lamabkrj1`, `namacomp2`, `jabatan2`, `lamabkrj2`, `namacomp3`, `jabatan3`, `lamabkrj3`, `nmbpk`, `nmibu`, `pkrjortu`, `nama_kerabat`, `telp_kerabat`, `msoffice`, `photosh`, `autoca`, `others`, `inggris`, `mengemudi`, `sim`, `fotokandidat`, `jabatan`, `refferer`, `date_add`, `flag_interview`, `flag_member`, `flag_aktif`) VALUES
(1, 'K1', 'sadad', 'Laki-laki', 'Pelajar', 'asdad', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'cOjf5dKHCNSmartSelectImage_2017-01-26-00-42-07.jpg', 'Cleaning Service', 'Browser', '2017-02-11', 'Y', 'N', 'Y'),
(2, 'K2', 'sdfsadfsd', 'Laki-laki', '', '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss', 'Koran', '2017-02-16', 'N', 'N', 'Y'),
(3, 'K3', 'kandidat A', 'Laki-laki', 'Single', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '29fS_TjKKxSmartSelectImage_2017-01-26-00-41-36.jpg', 'Security', 'Browser', '2017-03-04', 'Y', 'N', 'Y'),
(4, 'K4', 'Kandidat B', 'Perempuan', 'Pelajar', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'soHgPO0I6BWhatsApp Image 2016-12-13 at 02.55.08.jpg', 'Cleaning Service,Operator', 'Koran', '2017-03-04', 'Y', 'N', 'Y'),
(5, 'K5', 'Kandidat C', 'Perempuan', 'Pelajar', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ya', '', 'RomKFOvVkCSmartSelectImage_2017-01-26-00-41-36.jpg', 'Security,Operator', 'Browser', '2017-03-04', 'Y', 'N', 'Y'),
(6, 'K6', 'Kandidat D', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'vausf814raKoala.jpg', 'Security,Operator', '', '2017-03-14', 'Y', 'N', 'Y'),
(7, 'K7', 'Kandidat E', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'oI_lmFJnwBPenguins.jpg', 'Cleaning Service', '', '2017-03-14', 'Y', 'N', 'Y'),
(8, 'K8', 'Kandidat F', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'eDQ2j-0hY9Jellyfish.jpg', 'Cleaning Service', '', '2017-03-14', 'Y', 'N', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

DROP TABLE IF EXISTS `konfigurasi`;
CREATE TABLE `konfigurasi` (
  `id` int(10) NOT NULL,
  `items` varchar(20) DEFAULT NULL,
  `nilai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Dumping data untuk tabel `kontrak`
--

INSERT INTO `kontrak` (`id`, `mitraid`, `lampiran`, `penjelasan`, `tahun`, `status`, `periode`, `nokontrak`, `ttd`) VALUES
(1, 2, 'o1RWTkv18-Lighthouse.jpg', '', '', 'Aktif', '', '8908908', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
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
  `namapictwi` varchar(50) DEFAULT NULL,
  `emailpictwi` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `lampiran2` varchar(255) DEFAULT NULL,
  `lampiran3` varchar(255) DEFAULT NULL,
  `lampiran4` varchar(255) DEFAULT NULL,
  `lampiran5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `mitraid`, `namamitra`, `alamatmitra`, `namapic`, `jabatanpic`, `telppic`, `emailpic`, `deskripsi`, `namapictwi`, `emailpictwi`, `status`, `lampiran`, `lampiran2`, `lampiran3`, `lampiran4`, `lampiran5`) VALUES
(1, '', 'nama mitra', 'sfds', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(2, '', 'perusahaan codo', '', '', '', '', '', '', '', '', 'Aktif', NULL, NULL, NULL, NULL, NULL),
(3, '', 'Mitra B', '', '', '', '', '', '', '', '', 'Aktif', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_biaya`
--

DROP TABLE IF EXISTS `mst_biaya`;
CREATE TABLE `mst_biaya` (
  `id` int(10) NOT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL,
  `biaya` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CREATE TABLE `mst_jabatan` (
  `id` int(20) NOT NULL,
  `nmjabatan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id`, `nmjabatan`, `keterangan`) VALUES
(1, 'Cleaning Service', NULL),
(2, 'Operator', NULL),
(3, 'Security', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(20) NOT NULL,
  `mitraid` int(20) NOT NULL,
  `namapictwo` varchar(50) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `posisi` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `spesifikasi` varchar(100) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `sat_periode` varchar(20) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `nilai_kontrak` varchar(20) DEFAULT NULL,
  `bpjs` varchar(100) DEFAULT NULL,
  `gaji` varchar(20) DEFAULT NULL,
  `thr` varchar(20) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `mitraid`, `namapictwo`, `kategori`, `posisi`, `qty`, `spesifikasi`, `periode`, `sat_periode`, `tgl_mulai`, `tgl_selesai`, `nilai_kontrak`, `bpjs`, `gaji`, `thr`, `lampiran`, `status`) VALUES
(1, 1, 'jono', 'Outsourcing', 'Operator', 200, 'bisa baca', '2 tahun', 'Bulan', '2017-02-01', '2017-03-01', '2000000', 'Tenaga Kerja,Hari Tua', 'UMP', 'Exclude', 'atAFO8yoonSmartSelectImage_2017-01-26-00-42-07.jpg', 'DISABLE'),
(2, 2, 'komar', 'Outsourcing', 'Security', 100, 'bisa nulis', '10', 'Bulan', '2017-01-01', '2017-01-04', '34000000', 'Tenaga Kerja,Kematian,Hari Tua', 'UMP', 'Exclude', '', 'OPEN'),
(3, 3, 'komar', 'Supply', 'Cleaning Service', 2, 'bisa baca', '2', 'Bulan', '2017-01-01', '2017-02-01', '80000000', 'Tenaga Kerja,Kematian', 'UMP', 'Exclude', '', 'OPEN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembekalan`
--

DROP TABLE IF EXISTS `pembekalan`;
CREATE TABLE `pembekalan` (
  `id` varchar(20) NOT NULL,
  `delivery_id` int(20) DEFAULT NULL,
  `date_bekal` date DEFAULT NULL,
  `time_bekal` time DEFAULT NULL,
  `nama_bekal` varchar(100) DEFAULT NULL,
  `trainer_bekal` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembekalan`
--

INSERT INTO `pembekalan` (`id`, `delivery_id`, `date_bekal`, `time_bekal`, `nama_bekal`, `trainer_bekal`, `keterangan`) VALUES
('1', NULL, NULL, NULL, NULL, NULL, NULL),
('6j4JodnuOAkt2xwrXZdk', 8, '2011-11-11', '22:22:00', 'pembekalan 1', 'trainer 1', 'keterangan 1'),
('8', NULL, NULL, NULL, NULL, NULL, NULL),
('CD22FHvuTTBPPDVZSgR-', NULL, NULL, NULL, NULL, NULL, NULL),
('CsLYxUNF0EwL3mRIJ7t4', NULL, NULL, NULL, NULL, NULL, NULL),
('OTm1gIGYhz-EnI5BzYuI', NULL, '2022-02-22', '12:45:00', 'pembekalan 4', 'trainer 4', 'keterangan 4'),
('s2CMfC3upkSnfPSXQhQ1', NULL, NULL, NULL, NULL, NULL, NULL),
('v5oBaWkFShbpxgK3_iSg', NULL, '2022-02-22', '11:11:00', 'pembekalan 2', 'trainer 2', 'keterangan 2'),
('XrVZ9-GwkFoE0o0JVfWr', NULL, '2022-02-22', '11:11:00', 'pembekalan 3', 'trainer 3', 'keterngan 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_test`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_jabatan`
--

DROP TABLE IF EXISTS `tran_jabatan`;
CREATE TABLE `tran_jabatan` (
  `jabatanid` int(11) DEFAULT NULL,
  `kandidatid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `password_reset_token`) VALUES
(2, 'admin', '0192023a7bbd73250516f069df18b500', '12345', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembekalan`
--
ALTER TABLE `pembekalan`
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
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report_test`
--
ALTER TABLE `report_test`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
