-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2023 at 08:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_client` varchar(50) NOT NULL,
  `project_leaders_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`project_id`, `project_name`, `project_client`, `project_leaders_id`, `start_date`, `end_date`, `progress`) VALUES
(1, 'Pembuatan SI Keuangan', 'Bakeuda Prov. Kalsel', 1, '2022-01-14', '2022-08-14', 30),
(2, 'Learning Management System', 'Ruang Guru', 2, '2022-01-30', '2022-03-10', 80),
(3, 'SI Pendataan Atlet Daerah', 'Dispora Jawa TImur', 3, '2022-02-02', '2022-05-30', 40),
(4, 'Employee Monitoring', 'PT. Bina Sarana Sukses', 4, '2021-09-02', '2022-01-15', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_project_leaders`
--

CREATE TABLE `tb_project_leaders` (
  `project_leaders_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_project_leaders`
--

INSERT INTO `tb_project_leaders` (`project_leaders_id`, `fullname`, `email`, `avatar`) VALUES
(1, 'Indra Setiawan', 'indra.setiawan@gmail.com', 'avatar1.png'),
(2, 'Hilman Syaputera', 'hilman.syah@gmail.com', 'avatar2.png'),
(3, 'Febri Gunawan', 'febri.gunawan@gmail.com', 'avatar3.png'),
(4, 'Handoko Aji', 'handoko.aji@gmail.com', 'avatar4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tb_project_leaders`
--
ALTER TABLE `tb_project_leaders`
  ADD PRIMARY KEY (`project_leaders_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_project_leaders`
--
ALTER TABLE `tb_project_leaders`
  MODIFY `project_leaders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
