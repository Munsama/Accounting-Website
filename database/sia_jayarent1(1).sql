-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 11:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_jayarent1`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kode_akun` int(20) NOT NULL,
  `nama_akun` text NOT NULL,
  `bagan` int(1) NOT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `laba_rugi` varchar(255) DEFAULT NULL,
  `pm` varchar(255) DEFAULT NULL,
  `grup` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kode_akun`, `nama_akun`, `bagan`, `posisi`, `laba_rugi`, `pm`, `grup`) VALUES
(11, 'Kas', 1, 'L', 'N', '0', 'debit'),
(12, 'Kendaraan', 1, 'L', 'N', '0', 'debit'),
(13, 'Gudang', 1, 'L', 'N', '0', 'debit'),
(14, 'Piutang', 1, 'L', 'N', '0', 'debit'),
(15, 'Prive', 1, '', 'N', '1', 'debit'),
(21, 'Hutang Dagang', 2, 'R', 'N', '0', 'kredit'),
(31, 'Modal', 3, 'R', 'N', '1', 'kredit'),
(41, 'Pendapatan Sewa', 4, '', 'T', '0', 'kredit'),
(51, 'Beban Air, Listrik, dan Telepon', 5, '', 'B', '0', 'debit'),
(52, 'Beban Gaji Karyawan', 5, '', 'B', '0', 'debit'),
(53, 'Beban Pajak Kendaraan', 5, '', 'B', '0', 'debit'),
(54, 'Beban Perawatan Kendaraan', 5, '', 'B', '0', 'debit'),
(55, 'Beban Asuransi Kendaraan ', 5, '', 'B', '0', 'debit');

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id_beban` int(20) NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_akun` int(20) NOT NULL,
  `tanggal_beban` date NOT NULL,
  `nominal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id_beban`, `no_bukti`, `keterangan`, `kode_akun`, `tanggal_beban`, `nominal`) VALUES
(12, 'D0001', 'Pembayaran Air, Listrik dan Telepon', 51, '2019-02-10', 500000),
(13, 'D0002', 'Pembayaran Gaji Karyawan', 52, '2019-02-24', 2600000),
(14, 'D0003', 'pembayaran Pajak Kendaraan', 53, '2019-02-26', 5000000),
(15, 'D0004', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-04', 600000),
(16, 'D0005', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-07', 600000),
(17, 'D0006', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-13', 600000),
(18, 'D0007', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-17', 600000),
(19, 'D0008', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-20', 600000),
(20, 'D0009', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-23', 600000),
(21, 'D0010', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-26', 600000),
(22, 'D0011', 'Pembayaran Perawatan Kendaraan', 54, '2019-02-28', 300000),
(23, 'D0012', 'Pembayaran Premi Asuransi 15 Mobil', 55, '2019-02-14', 3000000),
(24, 'D0013', 'Membayar Utang dagang', 21, '2019-02-01', 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(20) NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_akun` int(20) NOT NULL,
  `tanggal_hutang` date NOT NULL,
  `nominal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `no_bukti`, `keterangan`, `kode_akun`, `tanggal_hutang`, `nominal`) VALUES
(6, 'E0001', 'Hutang Dagang Bulan Lalu', 12, '2019-02-01', 200000000);

-- --------------------------------------------------------

--
-- Table structure for table `ju`
--

CREATE TABLE `ju` (
  `id_ju` int(255) NOT NULL,
  `tgl` date NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_akun` int(255) NOT NULL,
  `debit` int(255) NOT NULL,
  `kredit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ju`
--

INSERT INTO `ju` (`id_ju`, `tgl`, `no_bukti`, `keterangan`, `kode_akun`, `debit`, `kredit`) VALUES
(141, '2019-02-01', 'B0001', 'Modal Bulan Lalu', 11, 800000000, 0),
(142, '2019-02-01', 'B0001', 'Modal Bulan Lalu', 31, 0, 800000000),
(143, '2019-02-01', 'E0001', 'Hutang Dagang Bulan Lalu', 12, 200000000, 0),
(144, '2019-02-01', 'E0001', 'Hutang Dagang Bulan Lalu', 21, 0, 200000000),
(145, '2019-02-01', 'C0001', 'Gedung Bulan Lalu', 13, 20000000, 0),
(146, '2019-02-01', 'C0001', 'Gedung Bulan Lalu', 11, 0, 20000000),
(147, '2019-05-01', 'C0002', 'Kendaraan Bulan Lalu', 12, 620000000, 0),
(148, '2019-05-01', 'C0002', 'Kendaraan Bulan Lalu', 11, 0, 620000000),
(151, '2019-02-02', 'B0002', 'Jasa Sewa Mobil', 11, 2400000, 0),
(152, '2019-02-02', 'B0002', 'Jasa Sewa Mobil', 41, 0, 2400000),
(153, '2019-02-03', 'B0003', 'Jasa Sewa Mobil', 11, 2800000, 0),
(154, '2019-02-03', 'B0003', 'Jasa Sewa Mobil', 41, 0, 2800000),
(155, '2019-02-05', 'B0004', 'Jasa Sewa Mobil', 11, 2400000, 0),
(156, '2019-02-05', 'B0004', 'Jasa Sewa Mobil', 41, 0, 2400000),
(157, '2019-02-06', 'B0005', 'Jasa Sewa Mobil', 11, 1950000, 0),
(158, '2019-02-06', 'B0005', 'Jasa Sewa Mobil', 41, 0, 1950000),
(159, '2019-05-08', 'B0006', 'Jasa Sewa Mobil', 11, 1800000, 0),
(160, '2019-05-08', 'B0006', 'Jasa Sewa Mobil', 41, 0, 1800000),
(161, '2019-05-09', 'B0007', 'Jasa Sewa Mobil', 11, 3000000, 0),
(162, '2019-05-09', 'B0007', 'Jasa Sewa Mobil', 41, 0, 3000000),
(163, '2019-02-11', 'B0008', 'Jasa Sewa Mobil', 11, 2250000, 0),
(164, '2019-02-11', 'B0008', 'Jasa Sewa Mobil', 41, 0, 2250000),
(165, '2019-02-12', 'B0009', 'Jasa Sewa Mobil', 11, 2000000, 0),
(166, '2019-02-12', 'B0009', 'Jasa Sewa Mobil', 41, 0, 2000000),
(167, '2019-02-15', 'B0010', 'Jasa Sewa Mobil', 11, 2000000, 0),
(168, '2019-02-15', 'B0010', 'Jasa Sewa Mobil', 41, 0, 2000000),
(169, '2019-02-16', 'B0011', 'Jasa Sewa Mobil', 11, 3000000, 0),
(170, '2019-02-16', 'B0011', 'Jasa Sewa Mobil', 41, 0, 3000000),
(171, '2019-02-18', 'B0012', 'Jasa Sewa Mobil', 11, 1950000, 0),
(172, '2019-02-18', 'B0012', 'Jasa Sewa Mobil', 41, 0, 1950000),
(173, '2019-02-19', 'B0013', 'Jasa Sewa Mobil', 11, 1700000, 0),
(174, '2019-02-19', 'B0013', 'Jasa Sewa Mobil', 41, 0, 1700000),
(175, '2019-02-21', 'B0014', 'Jasa Sewa Mobil', 11, 2100000, 0),
(176, '2019-02-21', 'B0014', 'Jasa Sewa Mobil', 41, 0, 2100000),
(177, '2019-05-22', 'B0015', 'Jasa Sewa Mobil', 11, 1500000, 0),
(178, '2019-05-22', 'B0015', 'Jasa Sewa Mobil', 41, 0, 1500000),
(179, '2019-02-25', 'B0016', 'Jasa Sewa Mobil', 11, 1800000, 0),
(180, '2019-02-25', 'B0016', 'Jasa Sewa Mobil', 41, 0, 1800000),
(181, '2019-02-27', 'B0017', 'Jasa Sewa Mobil', 11, 2000000, 0),
(182, '2019-02-27', 'B0017', 'Jasa Sewa Mobil', 41, 0, 2000000),
(183, '2019-02-28', 'B0018', 'Jasa Sewa Mobil', 11, 1450000, 0),
(184, '2019-02-28', 'B0018', 'Jasa Sewa Mobil', 41, 0, 1450000),
(251, '2019-02-10', 'D0001', 'Pembayaran Air, Listrik dan Telepon', 51, 500000, 0),
(252, '2019-02-10', 'D0001', 'Pembayaran Air, Listrik dan Telepon', 11, 0, 500000),
(253, '2019-02-24', 'D0002', 'Pembayaran Gaji Karyawan', 52, 2600000, 0),
(254, '2019-02-24', 'D0002', 'Pembayaran Gaji Karyawan', 11, 0, 2600000),
(255, '2019-02-26', 'D0003', 'pembayaran Pajak Kendaraan', 53, 5000000, 0),
(256, '2019-02-26', 'D0003', 'pembayaran Pajak Kendaraan', 11, 0, 5000000),
(257, '2019-02-04', 'D0004', 'Pembayaran Perawatan Kendaraan', 54, 600000, 0),
(258, '2019-02-04', 'D0004', 'Pembayaran Perawatan Kendaraan', 11, 0, 600000),
(259, '2019-02-07', 'D0005', 'Pembayaran Perawatan Kendaraan', 54, 600000, 0),
(260, '2019-02-07', 'D0005', 'Pembayaran Perawatan Kendaraan', 11, 0, 600000),
(261, '2019-02-13', 'D0006', 'Pembayaran Perawatan Kendaraan', 54, 600000, 0),
(262, '2019-02-13', 'D0006', 'Pembayaran Perawatan Kendaraan', 11, 0, 600000),
(263, '2019-02-17', 'D0007', 'Pembayaran Perawatan Kendaraan', 54, 600000, 0),
(264, '2019-02-17', 'D0007', 'Pembayaran Perawatan Kendaraan', 11, 0, 600000),
(265, '2019-02-20', 'D0008', 'Pembayaran Perawatan Kendaraan', 54, 600000, 0),
(266, '2019-02-20', 'D0008', 'Pembayaran Perawatan Kendaraan', 11, 0, 600000),
(267, '2019-02-23', 'D0009', 'Pembayaran Perawatan Kendaraan', 54, 600000, 0),
(268, '2019-02-23', 'D0009', 'Pembayaran Perawatan Kendaraan', 11, 0, 600000),
(269, '2019-02-26', 'D0010', 'Pembayaran Perawatan Kendaraan', 54, 600000, 0),
(270, '2019-02-26', 'D0010', 'Pembayaran Perawatan Kendaraan', 11, 0, 600000),
(271, '2019-02-28', 'D0011', 'Pembayaran Perawatan Kendaraan', 54, 300000, 0),
(272, '2019-02-28', 'D0011', 'Pembayaran Perawatan Kendaraan', 11, 0, 300000),
(273, '2019-02-14', 'D0012', 'Pembayaran Premi Asuransi 15 Mobil', 55, 3000000, 0),
(274, '2019-02-14', 'D0012', 'Pembayaran Premi Asuransi 15 Mobil', 11, 0, 3000000),
(275, '2019-02-01', 'D0013', 'Membayar Utang dagang', 21, 15000000, 0),
(276, '2019-02-01', 'D0013', 'Membayar Utang dagang', 11, 0, 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(20) NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_akun` int(20) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `nominal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `no_bukti`, `keterangan`, `kode_akun`, `tanggal_pembelian`, `nominal`) VALUES
(7, 'C0001', 'Gedung Bulan Lalu', 13, '2019-02-01', 20000000),
(8, 'C0002', 'Kendaraan Bulan Lalu', 12, '2019-05-01', 620000000);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int(20) NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_akun` int(20) NOT NULL,
  `tanggal_pendapatan` date NOT NULL,
  `nominal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id_pendapatan`, `no_bukti`, `keterangan`, `kode_akun`, `tanggal_pendapatan`, `nominal`) VALUES
(38, 'B0001', 'Modal Bulan Lalu', 31, '2019-02-01', 800000000),
(39, 'B0002', 'Jasa Sewa Mobil', 41, '2019-02-02', 2400000),
(40, 'B0003', 'Jasa Sewa Mobil', 41, '2019-02-03', 2800000),
(41, 'B0004', 'Jasa Sewa Mobil', 41, '2019-02-05', 2400000),
(42, 'B0005', 'Jasa Sewa Mobil', 41, '2019-02-06', 1950000),
(43, 'B0006', 'Jasa Sewa Mobil', 41, '2019-05-08', 1800000),
(44, 'B0007', 'Jasa Sewa Mobil', 41, '2019-05-09', 3000000),
(45, 'B0008', 'Jasa Sewa Mobil', 41, '2019-02-11', 2250000),
(46, 'B0009', 'Jasa Sewa Mobil', 41, '2019-02-12', 2000000),
(47, 'B0010', 'Jasa Sewa Mobil', 41, '2019-02-15', 2000000),
(48, 'B0011', 'Jasa Sewa Mobil', 41, '2019-02-16', 3000000),
(49, 'B0012', 'Jasa Sewa Mobil', 41, '2019-02-18', 1950000),
(50, 'B0013', 'Jasa Sewa Mobil', 41, '2019-02-19', 1700000),
(51, 'B0014', 'Jasa Sewa Mobil', 41, '2019-02-21', 2100000),
(52, 'B0015', 'Jasa Sewa Mobil', 41, '2019-05-22', 1500000),
(53, 'B0016', 'Jasa Sewa Mobil', 41, '2019-02-25', 1800000),
(54, 'B0017', 'Jasa Sewa Mobil', 41, '2019-02-27', 2000000),
(55, 'B0018', 'Jasa Sewa Mobil', 41, '2019-02-28', 1450000);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` int(20) NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_akun` int(20) NOT NULL,
  `tanggal_piutang` date NOT NULL,
  `nominal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prive`
--

CREATE TABLE `prive` (
  `id_prive` int(255) NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_akun` int(255) NOT NULL,
  `tanggal_prive` date NOT NULL,
  `nominal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `username`, `email`, `password`, `level`) VALUES
('A', 'a', 'a@gmail.com', 'a', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_akun`);
ALTER TABLE `akun` ADD FULLTEXT KEY `nama_akun` (`nama_akun`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id_beban`),
  ADD KEY `kode_akun` (`kode_akun`) USING BTREE;

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `kode_akun` (`kode_akun`) USING BTREE;

--
-- Indexes for table `ju`
--
ALTER TABLE `ju`
  ADD PRIMARY KEY (`id_ju`),
  ADD KEY `kode_akun` (`kode_akun`) USING BTREE;

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `kode_akun` (`kode_akun`) USING BTREE;

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD KEY `kode_akun` (`kode_akun`) USING BTREE;

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`),
  ADD KEY `kode_akun` (`kode_akun`) USING BTREE;

--
-- Indexes for table `prive`
--
ALTER TABLE `prive`
  ADD PRIMARY KEY (`id_prive`),
  ADD KEY `kode_akun` (`kode_akun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id_beban` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ju`
--
ALTER TABLE `ju`
  MODIFY `id_ju` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prive`
--
ALTER TABLE `prive`
  MODIFY `id_prive` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beban`
--
ALTER TABLE `beban`
  ADD CONSTRAINT `beban_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`);

--
-- Constraints for table `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `hutang_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`);

--
-- Constraints for table `ju`
--
ALTER TABLE `ju`
  ADD CONSTRAINT `ju_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`);

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`);

--
-- Constraints for table `piutang`
--
ALTER TABLE `piutang`
  ADD CONSTRAINT `piutang_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`);

--
-- Constraints for table `prive`
--
ALTER TABLE `prive`
  ADD CONSTRAINT `Prive0001` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
