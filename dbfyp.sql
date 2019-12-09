-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 07:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `aduan_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blok` varchar(11) NOT NULL,
  `aras` int(11) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `mesej` text NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`aduan_id`, `nama`, `email`, `blok`, `aras`, `jenis`, `subjek`, `mesej`, `file`) VALUES
(1, 'Ali bin Abu', 'abu@gmail.com', 'G2', 2, 'Bilik Air', 'Bilik Air Aras 2', 'Bilik Air tidak dibersihkan walaupun sudah hari rabu ', 'bukti'),
(2, 'Siti Hairan', 'ctheran@f.co', 'A1', 0, 'Kafetaria', 'Nasi Lemak tk ada', 'Alamakkkk, Nasi Lemak tak adaaaaaa!!!!!', 'nasi-lemak.jpg'),
(3, 'Harun bin Toman ', 'harun@g.go', 'G1', 3, 'Bilik Air', 'Tidak bersih', 'Bilik air tidak dibersihkan sepenuhnya ', '6789511-wallpapers-for-my-laptop.png');

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `blok_id` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `aras` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `bilangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`blok_id`, `nama`, `aras`, `jenis`, `bilangan`) VALUES
(1, 'G1', 1, 'Tandas', 5),
(2, 'G1', 1, 'Bilik Air', 5),
(3, 'H1', 1, 'Tandas', 5),
(4, 'H1', 1, 'Bilik Air', 5),
(5, 'H1', 0, 'Sampah Sarap', 2),
(6, 'H1', 2, 'Bilik Air', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jadual`
--

CREATE TABLE `jadual` (
  `jadual_id` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `masa` time NOT NULL,
  `tarikh` date NOT NULL,
  `blok_id` int(11) NOT NULL,
  `aras` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadual`
--

INSERT INTO `jadual` (`jadual_id`, `jenis`, `masa`, `tarikh`, `blok_id`, `aras`) VALUES
(1, 'Tandas', '08:30:00', '2018-04-03', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kebersihan`
--

CREATE TABLE `kebersihan` (
  `bersih_id` int(11) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `blok_id` int(11) NOT NULL,
  `ketua_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kebersihan`
--

INSERT INTO `kebersihan` (`bersih_id`, `jenis`, `status`, `blok_id`, `ketua_id`) VALUES
(1, 'Tandas 1', 'Ya', 1, 1),
(2, 'Tandas 2', 'Ya', 1, 2),
(3, 'Tandas 1', 'Ya', 3, 1),
(4, 'Tandas 2', 'Ya', 3, 1),
(5, 'Tandas 3', 'Tidak', 3, 1),
(6, 'Tandas 4', 'Tidak', 3, 1),
(7, 'Tandas 5', 'Tidak', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ketua`
--

CREATE TABLE `ketua` (
  `ketua_id` int(11) NOT NULL,
  `no_matrik` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_phone` varchar(15) NOT NULL,
  `blok` varchar(11) NOT NULL,
  `aras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ketua`
--

INSERT INTO `ketua` (`ketua_id`, `no_matrik`, `password`, `nama`, `no_phone`, `blok`, `aras`) VALUES
(1, 'A123456', '123', 'Ali Bin Abu', '01222223456', 'H1', 1),
(2, 'A111111', '123', 'Aminah Binti Abu', '0111112345', 'F2', 3),
(3, 'a155297', 'a155297', 'Farhan', '0122222222', 'H1', 0),
(4, 'a155555', 'a155555', 'Anne', '0122222233', 'F1', 2),
(5, 'a155111', 'a155111', 'Haris', '0122222244', 'B2', 3),
(6, 'a155222', 'a155222', 'Raja', '0122222255', 'H2', 4),
(7, 'A100000', 'a100000', 'Juragan', '0189090909', 'C2', 4),
(8, 'A155252', 'a155252', 'filzah', '0189099999', 'F1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `pengurus_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`pengurus_id`, `username`, `password`, `nama`) VALUES
(1, 'kpz', '123', 'Pendeta Za\'ba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`aduan_id`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`blok_id`);

--
-- Indexes for table `jadual`
--
ALTER TABLE `jadual`
  ADD PRIMARY KEY (`jadual_id`);

--
-- Indexes for table `kebersihan`
--
ALTER TABLE `kebersihan`
  ADD PRIMARY KEY (`bersih_id`);

--
-- Indexes for table `ketua`
--
ALTER TABLE `ketua`
  ADD PRIMARY KEY (`ketua_id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`pengurus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `aduan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `blok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadual`
--
ALTER TABLE `jadual`
  MODIFY `jadual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kebersihan`
--
ALTER TABLE `kebersihan`
  MODIFY `bersih_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ketua`
--
ALTER TABLE `ketua`
  MODIFY `ketua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `pengurus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
