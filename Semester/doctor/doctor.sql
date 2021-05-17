-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 05:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `active`, `name`) VALUES
(1, 'admin@admin.com', '123456', 1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cid`, `cname`, `active`) VALUES
(2, 'Hematologist', 1),
(3, 'Cardiologist', 1),
(4, 'Gynecologist', 1),
(5, 'Neurologist', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `speed` varchar(11) DEFAULT NULL,
  `dept` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `price`, `active`, `speed`, `dept`) VALUES
(5, 'Souvik Ghata', 5000, 1, 'Monday ', '2'),
(6, 'Pooja Agarwal', 4500, 1, 'Tuesday', '3'),
(7, 'Kinjal Raikarmakar', 5000, 1, 'Friday', '4'),
(8, 'Somsubra Das', 6000, 1, 'Sunday', '3'),
(9, 'Shruti Harrison ', 6000, 1, 'Thursday ', '5');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `session` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `address`, `email`, `phone`, `amount`, `transaction`, `session`, `status`) VALUES
(4, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '0801729908', 1000, 'ca4ce07544b464fa11cb', '3', 'success'),
(5, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 850, '2daa64a1ba87309649e0', '2', 'success'),
(6, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 700, '2cc998f7428b3dceb0ad', '1', 'success'),
(7, 'souvik', 'University Area, Plot, Street Number 03, Action Area III, B/5, Newtown, Kolkata', 'ghatasouvik2@gmail.com', '7044134298', 700, '78cb5bb69f22a674942b', '1', 'unpaid'),
(11, 'souvik', 'University Area, Plot, Street Number 03, Action Area III, B/5, Newtown, Kolkata', 'souvikghata2@gmail.com', '7044134298', 5000, '93c1a07a506790738e21', '5', 'unpaid'),
(12, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '08017299080', 4500, '33b5dd99fb3c00f8216c', '6', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pid`) VALUES
(1, 3),
(2, 2),
(3, 1),
(4, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
