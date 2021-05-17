-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 05:32 PM
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
-- Database: `skill`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Admin', 'ad@a.com', '123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cour`
--

CREATE TABLE `cour` (
  `c_id` int(5) NOT NULL,
  `c_name` varchar(35) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cour`
--

INSERT INTO `cour` (`c_id`, `c_name`, `status`) VALUES
(1, 'Web Dev', '1'),
(3, 'Data science', '1'),
(4, 'ML', '1'),
(5, 'SEO', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `name` varchar(35) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `amount` int(25) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `session` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `address`, `email`, `phone`, `amount`, `transaction`, `session`, `status`) VALUES
(1, 'Shruti', '20/5 Mg Rd', 's@s.com', '8017075764', 3300, 'cf2a8a63af7e3f3d0574', '', 'unpaid'),
(2, 'Shruti', '20/5 Mg Rd', 's@s.com', '8017075764', 3300, '58cd34348b136b160f1e', '', 'unpaid'),
(3, 'Shruti', '20/5 Mg Rd', 's@s.com', '8017075764', 4800, '5fb47421a88f48617954', '', 'unpaid'),
(4, 'Shruti', '20/5 Mg Rd', 's@s.com', '8017075764', 4800, '50565b7a0e96be8e7010', '', 'unpaid'),
(5, 'Shruti', '20/5 Mg Rd', 's@s.com', '8017075764', 4800, 'e3702f5362f1e1503c6a', '', 'unpaid'),
(6, 'Shruti', '20/5 Mg Rd', 's@s.com', '8017075764', 4800, '290cbf080aea0a801d34', '', 'unpaid'),
(7, 'Shruti', '20/5 Mg Rd', 's@s.com', '8017075764', 4800, '2aba097c9744b9ba875a', 'rfbbodtb5e0khs3b8nt8gfb5tk', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `u_id`, `qty`, `session`) VALUES
(1, 1, 2, 'rfbbodtb5e0khs3b8nt8gfb5tk'),
(2, 2, 1, 'rfbbodtb5e0khs3b8nt8gfb5tk');

-- --------------------------------------------------------

--
-- Table structure for table `prog`
--

CREATE TABLE `prog` (
  `u_id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `c_id` int(10) NOT NULL,
  `price` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prog`
--

INSERT INTO `prog` (`u_id`, `name`, `c_id`, `price`) VALUES
(1, 'html', 1, 1500),
(2, 'css', 1, 1800),
(6, 'data mining', 3, 1900),
(7, 'dta', 4, 1000),
(8, 'aBC', 3, 600);

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
-- Indexes for table `cour`
--
ALTER TABLE `cour`
  ADD PRIMARY KEY (`c_id`);

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
-- Indexes for table `prog`
--
ALTER TABLE `prog`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cour`
--
ALTER TABLE `cour`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prog`
--
ALTER TABLE `prog`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
