-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 05:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `Dstatus` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `role`, `email`, `password`, `images`, `Dstatus`) VALUES
(1, 'admin123', 1, 'admin@gmail.com', 'admin123', 'profile.jpg', 0),
(2, 'parthpatel', 2, 'parth@gmail.com', 'parthpatel', 'girl-g9ff848c34_1920.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cars_booking`
--

CREATE TABLE `cars_booking` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `cars` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars_booking`
--

INSERT INTO `cars_booking` (`id`, `name`, `email`, `mobile`, `cars`) VALUES
(1, 'Rakesh', 'rakesh@gmail.com', 7458963210, 'book'),
(2, 'kaushikjotav', 'kaushik@gmail.com', 7536984120, 'Meet -> GJ03-EG-4820');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `room_no` int(255) DEFAULT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `member` int(255) DEFAULT NULL,
  `children` int(255) DEFAULT NULL,
  `mobile` bigint(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `price` bigint(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `Dstatus` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `fname`, `lname`, `room_no`, `room_type`, `checkin`, `checkout`, `member`, `children`, `mobile`, `email`, `address`, `price`, `status`, `Dstatus`) VALUES
(1, 'parth', 'dhaduk', 151, 'Single Ac', '2020-02-15', '2020-02-25', 2, 0, 9874563210, 'parth@gmail.com', 'nakra', 4000, 1, 0),
(2, 'rajan', 'dhokiya', 155, 'Single Ac', '2020-02-01', '2021-02-28', 2, 0, 9874152630, 'rajan@gmail.com', 'saradiya', 4000, -1, 0),
(3, 'kaushik', 'jotav', 102, 'Single Ac', '2021-09-01', '2021-09-16', 2, 0, 7536984120, 'kaushik@gmail.com', 'talala', 4000, 1, 0),
(4, 'parth', 'patel', 202, 'Single Non Ac', '2023-05-06', '2023-05-30', 5, 3, 7891230456, 'p@gmail.com', 'patel nagar,\r\njunagadh', 3000, 0, 0),
(5, 'mital', 'mital', 151, 'Single Ac', '2015-07-07', '2015-07-10', 1, 0, 7722445588, 'mital@gmail.com', 'rajkot', 4000, 0, 0),
(6, 'rutvik', 'rutvik', 451, 'Double Non Ac', '2015-04-07', '2015-04-08', 1, 0, 4488556622, 'rutvik@gmail.com', 'junagadh', 5000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(25) NOT NULL,
  `room_no` int(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_price` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `Dstatus` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `room_type`, `room_price`, `status`, `Dstatus`) VALUES
(1, 101, 'Single Ac', 4000, 1, 0),
(2, 102, 'Single Ac', 4000, 1, 0),
(3, 103, 'Single Ac', 4000, 1, 0),
(4, 104, 'Single Ac', 4000, 1, 0),
(5, 105, 'Single Ac', 4000, 1, 0),
(6, 151, 'Single Ac', 4000, 0, 0),
(7, 152, 'Single Ac', 4000, 1, 0),
(8, 153, 'Single Ac', 4000, 1, 0),
(9, 154, 'Single Ac', 4000, 1, 0),
(10, 155, 'Single Ac', 4000, -1, 0),
(11, 201, 'Single Non Ac', 3000, 1, 0),
(12, 202, 'Single Non Ac', 3000, 0, 0),
(13, 203, 'Single Non Ac', 3000, 1, 0),
(14, 204, 'Single Non Ac', 3000, 1, 0),
(15, 205, 'Single Non Ac', 3000, 1, 0),
(16, 251, 'Single Non Ac', 3000, 1, 0),
(17, 252, 'Single Non Ac', 3000, 1, 0),
(18, 253, 'Single Non Ac', 3000, 1, 0),
(19, 254, 'Single Non Ac', 3000, 1, 0),
(20, 255, 'Single Non Ac', 3000, 1, 0),
(21, 301, 'Double Ac', 6000, 1, 0),
(22, 302, 'Double Ac', 6000, 1, 0),
(23, 303, 'Double Ac', 6000, 1, 0),
(24, 304, 'Double Ac', 6000, 1, 0),
(25, 305, 'Double Ac', 6000, 1, 0),
(26, 351, 'Double Ac', 6000, 1, 0),
(27, 352, 'Double Ac', 6000, 1, 0),
(28, 353, 'Double Ac', 6000, 1, 0),
(29, 354, 'Double Ac', 6000, 1, 0),
(30, 355, 'Double Ac', 6000, 1, 0),
(31, 401, 'Double Non Ac', 5000, 1, 0),
(32, 402, 'Double Non Ac', 5000, 1, 0),
(33, 403, 'Double Non Ac', 5000, 1, 0),
(34, 404, 'Double Non Ac', 5000, 1, 0),
(35, 405, 'Double Non Ac', 5000, 1, 0),
(36, 451, 'Double Non Ac', 5000, 0, 0),
(37, 452, 'Double Non Ac', 5000, 1, 0),
(38, 453, 'Double Non Ac', 5000, 1, 0),
(39, 454, 'Double Non Ac', 5000, 1, 0),
(40, 455, 'Double Non Ac', 5000, 1, 0),
(41, 501, 'Luxury', 10000, 1, 0),
(42, 502, 'Luxury', 10000, 1, 0),
(43, 503, 'Luxury', 10000, 1, 0),
(44, 504, 'Luxury', 10000, 1, 0),
(45, 505, 'Luxury', 10000, 1, 0),
(46, 551, 'Luxury', 10000, 1, 0),
(47, 552, 'Luxury', 10000, 1, 0),
(48, 553, 'Luxury', 10000, 1, 0),
(49, 554, 'Luxury', 10000, 1, 0),
(50, 555, 'Luxury', 10000, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_booking`
--
ALTER TABLE `cars_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars_booking`
--
ALTER TABLE `cars_booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
