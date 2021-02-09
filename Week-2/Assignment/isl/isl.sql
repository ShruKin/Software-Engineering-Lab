-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 08:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isl`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `mid` int(11) NOT NULL,
  `stadium` varchar(50) NOT NULL,
  `tid1` int(11) NOT NULL,
  `tid2` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`mid`, `stadium`, `tid1`, `tid2`, `date`) VALUES
(1, 'Fatorda Stadium', 2, 1, '2021-02-09'),
(2, 'Salt Lake Stadium', 1, 3, '2021-02-13'),
(3, 'Balewadi Stadium', 2, 3, '2021-02-16'),
(4, 'Indira Gandhi Athletic Stadium', 2, 1, '2021-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `num` int(11) NOT NULL,
  `pos` varchar(3) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`pid`, `pname`, `num`, `pos`, `tid`) VALUES
(1, 'Sumit Rathi', 2, 'DF', 1),
(2, 'Sandesh Jhingan', 5, 'DF', 1),
(3, 'Manvir Singh', 6, 'FW', 1),
(4, 'Komal Thatal', 7, 'FW', 1),
(5, 'Carl McHugh', 8, 'MF', 1),
(6, 'Gurpreet Singh Sandhu', 1, 'GK', 2),
(7, 'Rahul Bheke', 2, 'DF', 2),
(8, 'Pratik Chaudhari', 4, 'DF', 2),
(9, 'Juanan', 5, 'DF', 2),
(10, 'Erik Paartalu', 6, 'MF', 2),
(11, 'Karanjit Singh', 1, 'GK', 3),
(12, 'Reagan Singh', 2, 'DF', 3),
(13, 'Lalchhuanmawia', 3, 'DF', 3),
(14, 'Enes Sipović', 5, 'DF', 3),
(15, 'Lallianzuala Chhangte', 7, 'MF', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `tid` int(11) NOT NULL,
  `tname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`tid`, `tname`) VALUES
(1, 'ATK Mohun Bagan'),
(2, 'Bengaluru'),
(3, 'Chennaiyin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `tid1` (`tid1`),
  ADD KEY `tid2` (`tid2`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`tid1`) REFERENCES `teams` (`tid`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`tid2`) REFERENCES `teams` (`tid`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teams` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
