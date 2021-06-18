-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 06:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `photo`) VALUES
(1, '8.jpg'),
(2, '9.jpg'),
(3, '10.jpg'),
(4, '11.jpg'),
(7, '12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `firstname`, `lastname`, `address`, `contactno`) VALUES
(45, 'Ria', 'Dsouza', 'delhi', '9878786788'),
(46, 'Pia', 'Dcousta', 'London', '7674848888'),
(47, 'Arjun', 'M', 'mumbai', '9099918278'),
(49, 'Raghu', 'Sharma', 'chennai', '9878786544'),
(50, 'Rahul', 'Singh', 'mumbai', '98735463666'),
(51, 'Anita', 'Patil', 'mumbai', '9878768787'),
(52, 'pia', 'mishra', 'mumbai', '9878787878');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `username`, `pw`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `price`, `photo`) VALUES
(1, 'Standard', '2000', '1.jpg'),
(2, 'Superior', '2400', '3.jpg'),
(3, 'Extra Delux', '1500', '10.jpg'),
(4, 'Junior Suite', '700', 'sidekix-media-1vMz2_MclrM-unsplash.jpg'),
(10, 'Sea View', '5000', 'hello-lightbulb-YC8qqp50BdA-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(5) NOT NULL,
  `extra_bed` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int(2) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL DEFAULT current_timestamp(),
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL DEFAULT current_timestamp(),
  `bill` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `guest_id`, `room_id`, `room_no`, `extra_bed`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`) VALUES
(2, 2, 1, 101, 1, 'Check Out', 1, '2021-05-29', '04:49:33', '2021-05-26', '05:48:30', '2800'),
(3, 3, 1, 102, 1, 'Check Out', 2, '2021-06-12', '01:36:26', '2021-06-06', '01:36:39', '4800'),
(5, 6, 2, 103, 1, 'Check Out', 1, '2021-06-25', '01:38:39', '2021-06-08', '01:38:45', '3200'),
(9, 11, 1, 101, 1, 'Check Out', 2, '2021-06-18', '22:20:10', '2021-06-12', '02:37:28', '4800'),
(26, 44, 3, 102, 1, 'Check Out', 1, '2021-06-11', '02:32:49', '2021-06-11', '02:36:34', '2300'),
(27, 45, 4, 101, 1, 'Check Out', 1, '2021-06-30', '19:40:37', '2021-06-13', '23:19:37', '1500'),
(28, 46, 1, 102, 1, 'Check Out', 1, '2021-06-29', '23:12:52', '2021-06-13', '23:19:54', '2800'),
(29, 47, 1, 103, 1, 'Check Out', 1, '2021-06-12', '23:14:25', '2021-06-13', '23:19:50', '2800'),
(32, 50, 3, 101, 1, 'Check In', 1, '2021-06-20', '22:08:40', '2021-06-18', '14:07:31', '2300'),
(33, 51, 3, 102, 1, 'Check Out', 1, '2021-06-30', '04:16:29', '2021-06-19', '04:16:41', '2300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
