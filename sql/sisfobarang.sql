-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2017 at 08:45 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-1~ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfobarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `nama_barang`, `stock`) VALUES
(1, 'Komputer', 20),
(2, 'TV', 19),
(4, 'CONECTOR', 19),
(5, 'CCTV Indoor - SPC', 18),
(6, 'CCTV Indoor - Hikvision', 18),
(7, 'NVR - Hikvision', 13),
(8, 'DVR - SPC', 25),
(9, 'LCD Monitor', 10),
(10, 'Handy Talk - HT SPC', 20),
(12, 'CCTV Outdoor - SPC', 6),
(13, 'CCTV Outdoor - Hikvision', 6),
(15, 'Monitor LED', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `kd_customer` int(11) NOT NULL,
  `nama_customer` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`kd_customer`, `nama_customer`) VALUES
(1, 'cuppi'),
(2, 'chitos'),
(4, 'erwin ariansa'),
(5, 'Andi Rafiq'),
(6, 'Sufriyadi Yusuf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `kd_project` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`kd_project`, `kd_barang`, `jml_barang`) VALUES
(66, 5, 1),
(66, 6, 1),
(67, 12, 1),
(68, 8, 2),
(68, 9, 2),
(68, 10, 8),
(69, 8, 1),
(69, 9, 1),
(69, 7, 2),
(69, 9, 1),
(69, 10, 1),
(69, 12, 1),
(70, 5, 2),
(70, 15, 1),
(71, 5, 1),
(71, 6, 1),
(71, 1, 1),
(71, 2, 1),
(72, 1, 1),
(72, 2, 1),
(72, 4, 1),
(73, 1, 2),
(73, 2, 1),
(73, 4, 1),
(73, 1, 1),
(73, 5, 1),
(73, 6, 1),
(73, 8, 1),
(73, 1, 1),
(73, 5, 1),
(73, 6, 2),
(73, 8, 1),
(73, 12, 1),
(73, 13, 1),
(73, 1, 1),
(73, 2, 1),
(73, 4, 1),
(73, 1, 1),
(73, 2, 1),
(73, 4, 1),
(73, 1, 1),
(73, 2, 1),
(73, 4, 1),
(74, 1, 1),
(74, 2, 1),
(74, 4, 1),
(75, 2, 1),
(75, 4, 1),
(75, 5, 1),
(75, 2, 1),
(75, 4, 1),
(75, 5, 1),
(75, 2, 1),
(75, 4, 1),
(75, 5, 1),
(76, 4, 1),
(76, 5, 1),
(76, 6, 1),
(77, 5, 1),
(77, 6, 1),
(77, 7, 1),
(78, 2, 1),
(78, 4, 1),
(78, 7, 1),
(78, 8, 1),
(78, 12, 1),
(78, 13, 1),
(79, 5, 1),
(79, 6, 1),
(79, 8, 1),
(79, 12, 1),
(79, 13, 1),
(80, 5, 1),
(80, 6, 1),
(80, 8, 1),
(80, 12, 1),
(80, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `kd_project` int(11) NOT NULL,
  `customer` varchar(110) NOT NULL,
  `alamat` varchar(110) DEFAULT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_project` date DEFAULT NULL,
  `status` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`kd_project`, `customer`, `alamat`, `no_telepon`, `tgl_project`, `status`) VALUES
(66, 'cuppi', 'jl. bumi kartika IV blok b4 no 10', '08996709951', '2017-07-31', 'selesai'),
(68, 'erwin ariansa', 'jl. bumi kartika IV blok b4 no 10', '089123456789', '2017-07-31', 'selesai'),
(69, 'chitos', 'jl. antang', '089123456789', '2017-08-01', 'selesai'),
(71, 'chitos', 'jl. bumi kartika IV blok b4 no 10', '08996709951', '2017-08-31', 'selesai'),
(72, 'Andi Rafiq', 'Jl. Bumi Kartika Blok. B 4', '085342238666', '2017-08-06', 'selesai'),
(73, 'erwin ariansa', 'Moncongloe lappara', '085342213455', '2017-08-06', 'selesai'),
(74, 'Sufriyadi Yusuf', 'Jl. Bumi Kartika Blok. B 4', '085342238666', '2017-08-06', 'proses'),
(75, 'Andi Rafiq', 'Jl. Sultan Alauddin', '085342238666', '2017-08-06', 'proses'),
(76, 'Erwin Ariansa', 'Moncongloe lappara', '085342238666', '2017-08-06', 'proses'),
(77, 'Andi Rafiq', 'Jl. Antang Raya', '085342238666', '2017-08-06', 'proses'),
(78, 'Andi Rafiq', 'jl. sultan alauddin', '085342668286', '2017-08-08', 'proses'),
(79, 'Sufriyadi Yusuf', 'jl. bumi kartika blok. iv ', '08975566269', '2017-08-09', 'proses'),
(80, 'Sufriyadi Yusuf', 'jl. bumi kartika blok. iv ', '08975566269', '2017-08-09', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user`, `pass`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('admin', 'admin'),
('admin1', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`kd_customer`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`kd_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `kd_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `kd_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
