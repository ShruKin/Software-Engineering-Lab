-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 03:18 PM
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
-- Database: `railway`
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pid`, `qty`, `session`) VALUES
(1, 1, 0, 'q836j5kuf9q3hse45do18r2bbf'),
(2, 3, 2, 'q836j5kuf9q3hse45do18r2bbf'),
(3, 4, 4, 'q836j5kuf9q3hse45do18r2bbf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `active`) VALUES
(1, 'Local', 1),
(2, 'Duronto', 1),
(3, 'Rajdhani', 1),
(6, 'Express', 0),
(7, 'Superfast', 1);

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
(1, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 6400, '1e29da8dcfb1fa7b1e2d', 't0sus52idijihj42mjjhbndhta', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pid`, `qty`, `session`) VALUES
(4, 3, 2, 't0sus52idijihj42mjjhbndhta'),
(5, 1, 4, 't0sus52idijihj42mjjhbndhta');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `sid` int(10) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `scode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`sid`, `sname`, `scode`) VALUES
(1, 'Howrah', 'HWH'),
(3, 'Sealdah', 'SDAH'),
(4, 'New Jalpaiguri', 'NJP'),
(5, 'Delhi', 'DLI'),
(6, 'Sodpur', 'SEP');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `tid` int(11) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `tnum` varchar(10) NOT NULL,
  `cat` int(11) NOT NULL,
  `startStn` int(11) NOT NULL,
  `endStn` int(11) NOT NULL,
  `price` float NOT NULL,
  `startTime` int(11) NOT NULL,
  `travelTime` int(11) NOT NULL,
  `active` int(2) NOT NULL DEFAULT 1,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`tid`, `tname`, `tnum`, `cat`, `startStn`, `endStn`, `price`, `startTime`, `travelTime`, `active`, `image`) VALUES
(1, 'SBC NTSK SUPERFAST EXP', '22501', 7, 1, 4, 850, 1425, 554, 1, '16ab46d41995406aaa42adb5c3227f31.jpg'),
(2, 'ARONAI EXPRESS', '12507', 6, 1, 4, 570, 1450, 663, 1, 'fd5fe1ec622f57a19b2bedb6f89037ec.jpg'),
(3, 'Howrah - New Delhi Rajdhani Express (Via Gaya)', '12301', 3, 1, 5, 1500, 1650, 1070, 1, '31aee1ce493f2d7f57bc31c4429b8004.jpg'),
(4, 'Sodpur Local', '15672', 1, 3, 6, 80, 1208, 75, 1, '17e71f14e2b667ff5253298c369e966f.jpg'),
(7, 'sgd', '', 1, 1, 1, 0, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

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
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
