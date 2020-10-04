-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 08:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naskul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan`
--

CREATE TABLE `tb_bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `berat_bahan` char(10) NOT NULL,
  `harga_bahan` char(15) NOT NULL,
  `id_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bahan`
--

INSERT INTO `tb_bahan` (`id_bahan`, `nama_bahan`, `berat_bahan`, `harga_bahan`, `id_satuan`) VALUES
(1, 'Ayam', '5', '49500', 1),
(2, 'Kulit', '10', '40000', 1),
(3, 'Serundeng', '1', '80000', 1),
(4, 'Paru', '5', '49500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_franchise`
--

CREATE TABLE `tb_franchise` (
  `id_franchise` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_franchise`
--

INSERT INTO `tb_franchise` (`id_franchise`, `namalengkap`, `email`, `no_wa`, `pesan`) VALUES
(1, 'Ageng Nugroho Adi', 'agengnugrohoadi@gmail.com', '085778654890', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `kode_outlet` varchar(20) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`kode_outlet`, `nama_outlet`) VALUES
('NKS001', 'Nasi Kulit Syuurga Pasar Santa'),
('NKS002', 'Nasi Kulit Syuurga Fatmawati'),
('NKS003', 'Nasi Kulit Syuurga Tebet'),
('NKS004', 'Nasi Kulit Syuurga Kalibata'),
('NKS005', 'Nasi Kulit Syuurga Tanjung Duren'),
('NKS006', 'Nasi Kulit Syuurga Meruya'),
('NKS007', 'Nasi Kulit Syuurga Kelapa Gading'),
('NKS008', 'Nasi Kulit Syuurga Rawamangun'),
('NKS009', 'Nasi Kulit Syuurga Bintaro'),
('NKS010', 'Nasi Kulit Syuurga Pamulang'),
('NKS011', 'Nasi Kulit Syuurga Cipondoh/Poris'),
('NKS012', 'Nasi Kulit Syuurga Depok Margonda'),
('NKS013', 'Nasi Kulit Syuurga Grand Depok City (GDC)'),
('NKS014', 'Nasi Kulit Syuurga Bekasi Timur'),
('NKS015', 'Nasi Kulit Syuurga Bandung'),
('NKS016', 'Nasi Kulit Syuurga Bogor'),
('NKS017', 'Nasi Kulit Syuurga Dapur Jogja'),
('NKS018', 'Nasi Kulit Syuurga Bali'),
('NKS019', 'Nasi Kulit Syuurga Cirebon');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan_bahan`
--

CREATE TABLE `tb_satuan_bahan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_satuan_bahan`
--

INSERT INTO `tb_satuan_bahan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'kg'),
(2, 'ml'),
(3, 'pcs'),
(4, 'gram');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimonial`
--

CREATE TABLE `tb_testimonial` (
  `id_testimonial` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `kode_outlet` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `fotobukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_penjualan`
--

CREATE TABLE `tb_trans_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `kode_outlet` varchar(20) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `berat` varchar(20) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `jumlah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_trans_penjualan`
--

INSERT INTO `tb_trans_penjualan` (`id_penjualan`, `no_faktur`, `kode_outlet`, `tgl_penjualan`, `keterangan`, `id_bahan`, `berat`, `id_satuan`, `harga`, `jumlah`) VALUES
(1, '661/FP/NKS/2020', 'NKS001', '2020-09-24', 'pembelian bahan baku', 1, '5', 1, '49500', '247500'),
(3, '661/FP/NKS/2020', 'NKS001', '2020-09-24', 'pembelian bahan baku', 2, '10', 1, '40000', '400000'),
(4, '661/FP/NKS/2020', 'NKS001', '2020-09-24', 'pembelian bahan baku', 3, '1', 1, '80000', '80000'),
(5, '661/FP/NKS/2020', 'NKS001', '2020-09-24', 'pembelian bahan baku', 4, '5', 1, '100000', '500000'),
(6, '662/FP/NKS/2020', 'NKS002', '2020-09-25', 'pembelian bahan baku', 1, '10', 1, '49500', '495000'),
(7, '663/FP/NKS/2020', 'NKS002', '2020-09-26', 'bahan', 2, '8', 1, '40000', '320000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `tb_franchise`
--
ALTER TABLE `tb_franchise`
  ADD PRIMARY KEY (`id_franchise`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`kode_outlet`);

--
-- Indexes for table `tb_satuan_bahan`
--
ALTER TABLE `tb_satuan_bahan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_testimonial`
--
ALTER TABLE `tb_testimonial`
  ADD PRIMARY KEY (`id_testimonial`),
  ADD KEY `kode_outlet` (`kode_outlet`);

--
-- Indexes for table `tb_trans_penjualan`
--
ALTER TABLE `tb_trans_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `kode_outlet` (`kode_outlet`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_franchise`
--
ALTER TABLE `tb_franchise`
  MODIFY `id_franchise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_satuan_bahan`
--
ALTER TABLE `tb_satuan_bahan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_testimonial`
--
ALTER TABLE `tb_testimonial`
  MODIFY `id_testimonial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_trans_penjualan`
--
ALTER TABLE `tb_trans_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
