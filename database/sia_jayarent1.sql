-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 09:52 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
(1, 'D0001', 'Bayar ALT ', 51, '2019-05-10', 500000),
(2, 'D0002', 'Biaya Service Mobil', 54, '2019-05-11', 600000),
(5, 'D0003', 'Bayar Premi Asuransi', 55, '2019-05-15', 1000000),
(6, 'D0004', 'Biaya Service Mobil', 54, '2019-05-18', 600000),
(7, 'D0005', 'Bayar Gaji Karyawan', 52, '2019-05-28', 2600000),
(8, 'D0006', 'Bayar Pajak Mobil', 53, '2019-05-31', 2000000);

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
(1, 'E0001', 'Kredit Mobil', 12, '2019-05-02', 200000000),
(2, 'E0002', 'Kredit Mobil', 12, '2019-05-03', 250000000);

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
(1, '2019-05-01', 'B0001', 'Setor Modal Awal', 11, 1000000000, 0),
(2, '2019-05-01', 'B0001', 'Setor Modal Awal', 31, 0, 1000000000),
(3, '2019-05-10', 'D0001', 'Bayar ALT ', 51, 500000, 0),
(4, '2019-05-10', 'D0001', 'Bayar ALT ', 11, 0, 500000),
(5, '2019-05-01', 'C0001', 'Beli Gudang ', 13, 100000000, 0),
(6, '2019-05-01', 'C0001', 'Beli Gudang ', 11, 0, 100000000),
(7, '2019-05-02', 'C0002', 'Beli Mobil', 12, 300000000, 0),
(8, '2019-05-02', 'C0002', 'Beli Mobil', 11, 0, 300000000),
(9, '2019-05-02', 'E0001', 'Kredit Mobil', 12, 200000000, 0),
(10, '2019-05-02', 'E0001', 'Kredit Mobil', 21, 0, 200000000),
(11, '2019-05-15', 'A0001', 'Muqit Pinjam Uang', 14, 2000000, 0),
(12, '2019-05-15', 'A0001', 'Muqit Pinjam Uang', 11, 0, 2000000),
(15, '2019-05-04', 'B0002', 'Jasa Sewa Mobil', 11, 1000000, 0),
(16, '2019-05-04', 'B0002', 'Jasa Sewa Mobil', 41, 0, 1000000),
(19, '2019-05-11', 'D0002', 'Biaya Service Mobil', 54, 600000, 0),
(20, '2019-05-11', 'D0002', 'Biaya Service Mobil', 11, 0, 600000),
(27, '2019-05-03', 'E0002', 'Kredit Mobil', 12, 250000000, 0),
(28, '2019-05-03', 'E0002', 'Kredit Mobil', 21, 0, 250000000),
(29, '2019-05-15', 'D0003', 'Bayar Premi Asuransi', 55, 1000000, 0),
(30, '2019-05-15', 'D0003', 'Bayar Premi Asuransi', 11, 0, 1000000),
(31, '2019-05-18', 'D0004', 'Biaya Service Mobil', 54, 600000, 0),
(32, '2019-05-18', 'D0004', 'Biaya Service Mobil', 11, 0, 600000),
(33, '2019-05-28', 'D0005', 'Bayar Gaji Karyawan', 52, 2600000, 0),
(34, '2019-05-28', 'D0005', 'Bayar Gaji Karyawan', 11, 0, 2600000),
(35, '2019-05-31', 'D0006', 'Bayar Pajak Mobil', 53, 2000000, 0),
(36, '2019-05-31', 'D0006', 'Bayar Pajak Mobil', 11, 0, 2000000),
(37, '2019-05-04', 'B0003', 'Jasa Sewa Mobil', 11, 1500000, 0),
(38, '2019-05-04', 'B0003', 'Jasa Sewa Mobil', 41, 0, 1500000),
(39, '2019-05-10', 'B0004', 'Jasa Sewa Mobil', 11, 1800000, 0),
(40, '2019-05-10', 'B0004', 'Jasa Sewa Mobil', 41, 0, 1800000),
(41, '2019-05-14', 'B0005', 'Jasa Sewa Mobil', 11, 1000000, 0),
(42, '2019-05-14', 'B0005', 'Jasa Sewa Mobil', 41, 0, 1000000),
(43, '2019-05-16', 'B0006', 'Jasa Sewa Mobil', 11, 700000, 0),
(44, '2019-05-16', 'B0006', 'Jasa Sewa Mobil', 41, 0, 700000),
(45, '2019-05-19', 'B0007', 'Jasa Sewa Mobil', 11, 1200000, 0),
(46, '2019-05-19', 'B0007', 'Jasa Sewa Mobil', 41, 0, 1200000),
(47, '2019-05-23', 'B0008', 'Jasa Sewa Mobil', 11, 2000000, 0),
(48, '2019-05-23', 'B0008', 'Jasa Sewa Mobil', 41, 0, 2000000),
(49, '2019-05-25', 'B0009', 'Jasa Sewa Mobil', 11, 1500000, 0),
(50, '2019-05-25', 'B0009', 'Jasa Sewa Mobil', 41, 0, 1500000),
(51, '2019-05-29', 'B0010', 'Jasa Sewa Mobil', 11, 1800000, 0),
(52, '2019-05-29', 'B0010', 'Jasa Sewa Mobil', 41, 0, 1800000),
(53, '2019-05-31', 'F0001', 'Bos Ambil Uang', 15, 5000000, 0),
(54, '2019-05-31', 'F0001', 'Bos Ambil Uang', 11, 0, 5000000);

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
(1, 'C0001', 'Beli Gudang ', 13, '2019-05-01', 100000000),
(2, 'C0002', 'Beli Mobil', 12, '2019-05-02', 300000000);

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
(3, 'B0001', 'Setor Modal Awal', 31, '2019-05-01', 1000000000),
(4, 'B0002', 'Jasa Sewa Mobil', 41, '2019-05-04', 1000000),
(6, 'B0003', 'Jasa Sewa Mobil', 41, '2019-05-04', 1500000),
(7, 'B0004', 'Jasa Sewa Mobil', 41, '2019-05-10', 1800000),
(8, 'B0005', 'Jasa Sewa Mobil', 41, '2019-05-14', 1000000),
(9, 'B0006', 'Jasa Sewa Mobil', 41, '2019-05-16', 700000),
(10, 'B0007', 'Jasa Sewa Mobil', 41, '2019-05-19', 1200000),
(11, 'B0008', 'Jasa Sewa Mobil', 41, '2019-05-23', 2000000),
(12, 'B0009', 'Jasa Sewa Mobil', 41, '2019-05-25', 1500000),
(13, 'B0010', 'Jasa Sewa Mobil', 41, '2019-05-29', 1800000);

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

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`id_piutang`, `no_bukti`, `keterangan`, `kode_akun`, `tanggal_piutang`, `nominal`) VALUES
(1, 'A0001', 'Muqit Pinjam Uang', 11, '2019-05-15', 2000000);

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

--
-- Dumping data for table `prive`
--

INSERT INTO `prive` (`id_prive`, `no_bukti`, `keterangan`, `kode_akun`, `tanggal_prive`, `nominal`) VALUES
(1, 'F0001', 'Bos Ambil Uang', 15, '2019-05-31', 5000000);

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
('a', 'a', 'a@gmail.com', 'a', 'admin'),
('Admin1', 'admin', 'admin1@gmail.com', '1231', 'akuntan'),
('Muqit Nur Salam M', 'muu', 'muqitryu@gmail.com', 'muu123', 'pemilik'),
('Nurul Hidayat', 'nuhi', 'nurul.hidayat@gmail.com', '@Nuhi123', 'pemilik'),
('Salam', 'salam', 'salam@gmail.com', 'ass.wr.wb', 'admin'),
('SAO', 'sao', 'sao@gmail.com', 'sao', 'akuntan');

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
  MODIFY `id_beban` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ju`
--
ALTER TABLE `ju`
  MODIFY `id_ju` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prive`
--
ALTER TABLE `prive`
  MODIFY `id_prive` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
