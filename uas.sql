-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2019 at 02:07 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.2.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `email`, `alamat`, `password`) VALUES
('181010850093', 'Ade Iswadi', 'bois234@gmail.com', 'depok', '$2y$10$HMmOiN93tk5bsCbKdb1lbOnf4G.HZzzKBiUniHsSLxiSS33oP58t2'),
('2016140993', 'Muhammad Ilham Fhadilah', '2016140993@uas.com', 'Setu', '$2y$10$ylCCRFfbhsdQFmL8RR.WvOpW9h2zk.7BXyNl9cBVSjqHeIyp.Y0Gu'),
('2016141207', 'Dandy Kesa Ragil Putra', 'Kesa@dandy.com', 'Kunciran Kalo Nggk salah', '$2y$10$ACXmIBanKa3xd/.PnsHQ4.o4svfa/Y2YrcWb6MeC.QMzdHdp/ZCFu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_kelas`, `id_mapel`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 2, 2, 'Senin', '07:30:00', '09:00:00'),
(3, 2, 5, 'Senin', '09:00:00', '11:30:00'),
(5, 1, 7, 'Senin', '07:15:00', '08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `no_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `no_kelas`) VALUES
(2, '7A'),
(1, '7B');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nip`, `nama`, `id_kelas`) VALUES
(2, '2016140993', 'Bahasa Indonesia', 2),
(5, '181010850093', 'Bahasa Inggris', 2),
(7, '2016141207', 'Pendidikan Pancasila', 1);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `nis` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notlpn` varchar(13) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`nis`, `nama`, `password`, `alamat`, `email`, `notlpn`, `id_kelas`) VALUES
('2016141010', 'mulyadih', '$2y$10$M9xUEOyh12g9cNMenhQq9.1N8Y9tl8dqX3gPNpa7G/d7tqvZ8ctv6', 'depok', 'e2016141010@gmail.com', '081222129621', 2),
('2016141011', 'apa aja', '$2y$10$UVxpEhnvwdQiK8HDLrgXAOQ1aZd1QX8dTeMcOXJNXhnSzhtOUtU0a', 'sdadad', 'sdasd@sdads.ada', '3423242342', 1),
('2016141012', 'siapa hayo siapa', '$2y$10$slhQaJ5EGP1WBhtZRSm8gOrjNW9Aokhev0jIKF9eZLqaTn.k5ZIVe', 'dimana mana hatiku senang', '353647477@gmail.com', '0821982936238', 2),
('2016141203', 'Dicky Muladi', '$2y$10$gjvnZUbPggcHYs31ZmPZj.wKIa9Qup7NO7QgscxwmTrCLo9vvBRzS', 'Pamulang', 'Dikoy@ayeaye.com', '0821982936238', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `tugas` int(11) NOT NULL,
  `uts` int(3) NOT NULL,
  `uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nis`, `id_mapel`, `tugas`, `uts`, `uas`) VALUES
(2, '2016141010', 2, 70, 75, 80),
(3, '2016141011', 7, 80, 90, 80);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `nip` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`nip`, `nama`, `password`, `email`) VALUES
('2016141044', 'Ibnu Fajar Yusuf', '$2y$10$1YvoceQDGOnQLlINYyUPBOqOu1tqtEwBwEQeT7uXqCGfTt9FdJJ9e', 'ify@ify.com'),
('201906230001', 'staff', '$2y$10$11hEfCD1VVoCr7EU5iMTh.EnoIuISc1J8S4jnv5Wm0Oc6kuv64Nly', 'staff@staff.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nis` (`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_kelas` (`no_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nis` (`nis`),
  ADD KEY `nis_2` (`nis`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `murid` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
