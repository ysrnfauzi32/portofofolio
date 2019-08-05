-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 10:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes_ol`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(126) DEFAULT NULL,
  `description` text,
  `color` varchar(24) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` varchar(64) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `description`, `color`, `start_date`, `end_date`, `create_at`, `create_by`, `modified_at`, `modified_by`) VALUES
(8, 'Libur', 'test', '#0071c5', '2019-07-17', '2019-07-18', '2019-07-02 10:44:25', NULL, NULL, NULL),
(9, 'jnjn', 'jnljnln', '#FF0000', '2019-07-19', '2019-07-20', '2019-07-03 01:53:29', NULL, NULL, NULL),
(10, 'Pengajian akbar', 'maxklm', '#008000', '2019-07-24', '2019-07-25', '2019-07-05 10:15:40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(3) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` varchar(8) NOT NULL,
  `jam_akhir` varchar(8) NOT NULL,
  `materi` varchar(50) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `pengajar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi_pengajaran`
--

CREATE TABLE `materi_pengajaran` (
  `id_materi` int(3) NOT NULL,
  `kode_materi` varchar(6) NOT NULL,
  `materi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(3) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama_pengajar` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nip`, `nama_pengajar`, `no_hp`) VALUES
(2, 1155, 'Arif Rosyidin', '088769543275'),
(3, 7865, 'Mahfud', '089765432176');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(3) NOT NULL,
  `ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `nama_santri` varchar(64) NOT NULL,
  `kelas` enum('1','2') NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `nama_santri`, `kelas`, `jenis_kelamin`, `alamat`) VALUES
(1, 'Yusron Fauzi', '1', 'L', 'Kulon Progo'),
(2, 'Arbian Khoiri', '2', 'L', 'Kulonprogo'),
(3, 'Fathur Rohmat', '1', 'L', 'Kulonprogo'),
(4, 'Zulfa Putri', '2', 'P', 'Temanggung'),
(5, 'Fathurohmat Fauzi', '1', 'L', 'Kulonprogo'),
(6, 'Paijo', '2', 'L', 'Bantul'),
(8, 'Sri', '2', 'P', 'Klaten'),
(10, 'Sri', '1', 'P', 'Jogja'),
(13, 'Paijem', '2', 'P', 'Gunungkidul'),
(14, 'Sumanto', '1', 'L', 'Kulonprogo'),
(15, 'Bambang', '2', 'L', 'Magelang'),
(16, 'Ronaldo', '1', 'L', 'Portugal'),
(17, 'Lionel Messi', '2', 'L', 'Argentina'),
(18, 'Rihana', '2', 'P', 'Amerika'),
(19, 'Steven Gerrard', '2', 'L', 'England'),
(20, 'Lucinta Luna', '1', 'P', 'Gunungkidul'),
(21, 'Tony Stark', '1', 'L', 'Amerika'),
(22, 'Gal Gadot', '2', 'P', 'Israel'),
(23, 'Tim Holland', '1', 'L', 'Amerika'),
(25, 'Sasuke', '2', 'L', 'Jepun'),
(26, 'Naruto', '1', 'L', 'Konoha'),
(27, 'Sakura', '2', 'P', 'Konoha'),
(28, 'John Cena', '1', 'L', 'Amerika'),
(29, 'Thanos', '2', 'L', 'Wakanda'),
(30, 'Mia Khalifa', '2', 'P', 'Amerika'),
(31, 'Boruto', '1', 'L', 'Konoha'),
(32, 'Pak ndul', '1', 'L', 'Amerika'),
(34, 'Fauzi', '2', 'L', 'Kulonprogo'),
(35, 'Fathur', '1', 'L', 'Kulonprogo'),
(36, 'Mohammad Salah', '1', 'L', 'Mesir'),
(37, 'Eden Hazard', '2', 'L', 'Belgia'),
(38, 'Sadio Mane', '2', 'L', 'Senegal'),
(46, 'Yusron Fauzi', '1', 'L', 'Kulon Progo'),
(47, 'Tony Stark', '2', 'L', 'Zimbabwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
