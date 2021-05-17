-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 04:22 PM
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
-- Database: `movie`
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
  `qty` int(11) NOT NULL DEFAULT 0,
  `session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pid`, `qty`, `session`) VALUES
(16, 7, 3, 'bslcdn74lr07e91fcetri97ha8'),
(18, 12, 2, '3trooorkinmao5sl7i4gl0cjb3'),
(19, 16, 1, 'bq5a632vl77eqmn3f7h25i2bft');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cid` int(10) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cid`, `cname`, `active`) VALUES
(7, 'Childer', 1),
(8, 'Adult', 1),
(9, 'Family', 1);

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
(3, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 114397, '3237bcea7c642622a993', 'n26o3f2qmp2gbpgnfpkbrqhuhj', 'success'),
(4, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 142000, '9fc786b9054c766e115b', 'ebtsps6p4l3g071b2ek7v4ngum', 'success'),
(5, 'souvik', 'University Area, Plot, Street Number 03, Action Area III, B/5, Newtown, Kolkata', 'souvikghata2@gmail.com', '7044134298', 56899, '930f4e37fc4ff15bc3d0', 'bslcdn74lr07e91fcetri97ha8', 'unpaid'),
(6, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 46, '88f13d994b2881fcd4a3', '3c7b1jp7920ku3qclvtsrmep0c', 'unpaid'),
(7, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 46, '179e061f41715e931cff', '3c7b1jp7920ku3qclvtsrmep0c', 'unpaid'),
(8, 'Kinjal Raykarmakar', '3/3C/2 Netaji Nagar', 'kinjalrk22@gmail.com', '8017299080', 46, 'e998cfd97f6ed0c80077', '3c7b1jp7920ku3qclvtsrmep0c', 'success');

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
(11, 7, 2, 'n26o3f2qmp2gbpgnfpkbrqhuhj'),
(12, 10, 1, 'n26o3f2qmp2gbpgnfpkbrqhuhj'),
(13, 7, 0, 'ebtsps6p4l3g071b2ek7v4ngum'),
(15, 8, 1, 'ebtsps6p4l3g071b2ek7v4ngum'),
(20, 16, 0, '3c7b1jp7920ku3qclvtsrmep0c'),
(21, 18, 2, '3c7b1jp7920ku3qclvtsrmep0c');

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `pid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `TA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`pid`, `cid`, `name`, `image`, `price`, `TA`) VALUES
(16, 7, 'Harry Potter And chamber of Secret', '246d00f9f90376bdf0d8b453ef86beb3.jpg', 300, 7),
(17, 9, 'Jai HO', '55ec33a32ec67be234a5681f9d82c16a.jpg', 250, 10),
(18, 7, 'Harry Potter An Deathly Hellows', '8aba71adf7e8ce829d5130cd8c7da8a6.jpg', 23, 22);

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
-- Indexes for table `cat`
--
ALTER TABLE `cat`
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
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`pid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
