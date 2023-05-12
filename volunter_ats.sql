-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 09:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volunter_ats`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_member` int(11) NOT NULL,
  `waktu_input_data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id_acara`, `nama`, `tempat`, `tanggal`, `penyelenggara`, `status`, `deskripsi`, `foto`, `id_member`, `waktu_input_data`) VALUES
(1, 'volunterr ATS', 'Jakarta', '2023-05-10', 'Pak dadang', '', 'asddssada', '', 25, '2023-05-05 06:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `relawan_acara`
--

CREATE TABLE `relawan_acara` (
  `id_relawan_acara` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `waktu_relawan_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(30) NOT NULL,
  `waktu_admin_konfirmasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relawan_acara`
--

INSERT INTO `relawan_acara` (`id_relawan_acara`, `id_acara`, `id_member`, `waktu_relawan_input`, `status`, `waktu_admin_konfirmasi`) VALUES
(1, 1, 25, '2023-05-05 06:48:44', '', '2023-05-05 06:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_member` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `waktu_input_data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_member`, `name`, `email`, `username`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`, `nohp`, `foto`, `waktu_input_data`) VALUES
(1, 'ee', 'aa@a', 'aa', 's', 'a', '2023-05-04', 'd', '', '3', '', '2023-05-05 06:33:59'),
(22, '', 'r@d', 'q', '0cc175b9c0f1b6a', '', '0000-00-00', '', '', '', '', '2023-05-04 16:28:37'),
(23, '', 'a@a', 'q', '0cc175b9c0f1b6a', '', '0000-00-00', '', '', '', '', '2023-05-04 16:43:28'),
(24, 'a', 'ahmad@a', '', '6f8f57715090da2', '', '0000-00-00', 'nnn', '', '3', '', '2023-05-04 16:56:01'),
(25, 'a', 'g@g', 'g', 'g', 'a', '0000-00-00', 'd', '', '3', '../relawan/23-05-04 09-22-13pm1.PNG', '2023-05-04 19:22:13'),
(26, '', 'hari@gmail', 'hari', 'a', '', '0000-00-00', '', '', '', '', '2023-05-05 06:22:01'),
(27, '', 'hari@gmail', 'hari', 'a', '', '0000-00-00', '', '', '', '', '2023-05-05 06:22:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `relawan_acara`
--
ALTER TABLE `relawan_acara`
  ADD PRIMARY KEY (`id_relawan_acara`),
  ADD KEY `id_acara` (`id_acara`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `relawan_acara`
--
ALTER TABLE `relawan_acara`
  MODIFY `id_relawan_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `acara_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `user` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relawan_acara`
--
ALTER TABLE `relawan_acara`
  ADD CONSTRAINT `relawan_acara_ibfk_1` FOREIGN KEY (`id_acara`) REFERENCES `acara` (`id_acara`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relawan_acara_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `user` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
