-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 11:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Mikasa Ackerman', '987654321', 'mikasa@gmail.com', 'Rekayasa Perangkat Lunak', 'Mikasa.jpg'),
(3, 'Eren Jeager', '123456789', 'Eren@gmail.com', 'Teknik Komputer Dan Jaringan', 'Eren.jpg'),
(4, 'Levi Ackerman', '769832541', 'levi@gmail.com', 'Multimedia', 'Levi.jpg'),
(14, 'Annie Leonhart', '657488321', 'Annie@gmail.com', 'Teknik Industri', 'Annie.jpg'),
(23, 'Armin Arlelt', '546389286', 'Armin@gmail.com', 'Sains', 'Armin.jpg'),
(26, 'Historia', '1314551354', 'Historia@gmail.com', 'Teknik Politik', 'Historia.jpg'),
(35, 'Erwin Smith', '654436787', 'Erwin@gmail.com', 'Sosial', 'Erwin1.jpg'),
(43, 'Arie Fajar', '10', 'arie@gmail.com', 'Rekayasa Perangkat Lunak', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `role` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'Honda', 'honda123', 'Ahmad Honda', 1),
(2, 'Yamaha', '321', 'Abdul Yamaha', 2),
(3, 'Sibah', '456', 'Sibah Domek', 2),
(4, 'dayat', 'dayat', 'Mas Dayat', 2),
(5, 'Paijo', '678', 'Paijo Sujak', 2),
(6, 'daliya', 'daliya', 'Daliya Izza', 2),
(7, 'Sidu', 'sidu123', 'Sinar Dunia', 2),
(10, 'Kembang', 'mawar123', 'Kembang Mawar', 1),
(13, 'dewi', '1234567890', 'dewi ismawati', 0),
(15, 'dio', 'sibah', 'dioalvin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
