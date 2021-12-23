-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 04:34 PM
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
-- Database: `servicepicker`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) NOT NULL,
  `a_email` varchar(60) NOT NULL,
  `a_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `asset_tb`
--

CREATE TABLE `asset_tb` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(60) NOT NULL,
  `a_date` date NOT NULL,
  `a_available` int(60) NOT NULL,
  `a_total` int(60) NOT NULL,
  `a_ocost` int(60) NOT NULL,
  `a_scost` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_tb`
--

INSERT INTO `asset_tb` (`a_id`, `a_name`, `a_date`, `a_available`, `a_total`, `a_ocost`, `a_scost`) VALUES
(1, 'Pc', '2021-02-08', 18, 20, 45000, 70000),
(4, 'Monitor', '2021-02-10', 5, 10, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` varchar(60) NOT NULL,
  `request_desc` varchar(500) NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` varchar(60) NOT NULL,
  `requester_add2` varchar(60) NOT NULL,
  `requester_city` varchar(60) NOT NULL,
  `requester_state` varchar(60) NOT NULL,
  `requester_zip` varchar(60) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` varchar(60) NOT NULL,
  `assign_tech` varchar(60) NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(15, 19, 'Need Plumber', 'My kitchen has some issue. I need plumber for service. ', 'Hasib Hossen', 'College gate, Tongi.', 'avijan:293', 'Gazipur', 'Dhaka', '1211', 'user@gmail.com', '123456789', 'maruf', '2021-02-20'),
(16, 25, 'phone ', 'phone problem', 'hasib', 'tongi', 'gazipur', 'dhaka', 'dhaka', '1211', 'user@gmail.com', '01234567', 'maruf', '2021-02-08'),
(17, 23, 'TV problem', 'phone problem', 'hasib', 'tongi', 'gazipur', 'dhaka', 'dhaka', '1211', 'user@gmail.com', '01234567', 'maruf', '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `cusid` int(11) NOT NULL,
  `cusname` varchar(60) NOT NULL,
  `cusadd` varchar(60) NOT NULL,
  `cpname` varchar(60) NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`cusid`, `cusname`, `cusadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(12, 'hasib', 'tongi', 'Monitor', 1, 10000, 10000, '2021-02-08'),
(13, 'hasib', 'tongi', 'Pc', 5, 70000, 350000, '2021-02-08'),
(14, 'hasib', 'tongi', 'Pc', 1, 70000, 10000, '2021-02-09'),
(15, 'hasib', 'tongi', 'Monitor', 5, 10000, 10000, '2021-02-09'),
(16, 'hasib', 'tongi', 'Pc', 1, 70000, 10000, '2021-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tb`
--

CREATE TABLE `employee_tb` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(60) NOT NULL,
  `e_email` varchar(60) NOT NULL,
  `e_mobile` int(60) NOT NULL,
  `e_city` varchar(60) NOT NULL,
  `e_type` varchar(60) NOT NULL,
  `e_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_tb`
--

INSERT INTO `employee_tb` (`e_id`, `e_name`, `e_email`, `e_mobile`, `e_city`, `e_type`, `e_password`) VALUES
(1, 'Maruf', 'Maruf@gmail.com', 123456789, 'Dhaka', 'Electrician', '12345'),
(2, 'Kusum', 'emp@gmail.com', 123456, 'dhaka', 'plumber', '12345'),
(3, 'Kumar', 'user@gmail.com', 123456, 'dhaka', 'plumber', '12345678'),
(4, 'Emp01', 'user@gmail.com', 123456, 'dhaka', 'plumber', '1234596');

-- --------------------------------------------------------

--
-- Table structure for table `registration_tb`
--

CREATE TABLE `registration_tb` (
  `requester_id` int(11) NOT NULL,
  `requester_name` varchar(30) NOT NULL,
  `requester_email` varchar(30) NOT NULL,
  `requester_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_tb`
--

INSERT INTO `registration_tb` (`requester_id`, `requester_name`, `requester_email`, `requester_password`) VALUES
(12, 'hasib', 'hasib@gmail.com', '12345'),
(13, 'NIshu', 'nishu@gmail.com', '123456'),
(14, 'hasib123', 'user@gmail.com', '12345'),
(15, 'Rahat', 'rahat@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `request_info` varchar(60) NOT NULL,
  `request_desc` varchar(500) NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` varchar(60) NOT NULL,
  `requester_add2` varchar(60) NOT NULL,
  `requester_city` varchar(60) NOT NULL,
  `requester_state` varchar(60) NOT NULL,
  `requester_zip` int(60) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` varchar(60) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(23, 'TV problem', 'phone problem', 'hasib', 'tongi', 'gazipur', 'dhaka', 'dhaka', 1211, 'user@gmail.com', '01234567', '2021-02-08'),
(24, 'TV problem', 'phone problem', 'hasib', 'tongi', 'gazipur', 'dhaka', 'dhaka', 1211, 'user@gmail.com', '01234567', '2021-02-08'),
(26, 'phone ', 'phone problem', 'hasib', 'tongi', 'gazipur', 'dhaka', 'dhaka', 1211, 'user@gmail.com', '01234567', '2021-02-08'),
(27, 'phone ', 'phone problem', 'hasib', 'tongi', 'gazipur', 'dhaka', 'dhaka', 1211, 'user@gmail.com', '01234567', '2021-02-08'),
(28, 'phone ', 'phone problem', 'hasib', 'tongi', 'gazipur', 'dhaka', 'dhaka', 1211, 'user@gmail.com', '01234567', '2021-02-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `asset_tb`
--
ALTER TABLE `asset_tb`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`cusid`);

--
-- Indexes for table `employee_tb`
--
ALTER TABLE `employee_tb`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `registration_tb`
--
ALTER TABLE `registration_tb`
  ADD PRIMARY KEY (`requester_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset_tb`
--
ALTER TABLE `asset_tb`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `cusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_tb`
--
ALTER TABLE `employee_tb`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration_tb`
--
ALTER TABLE `registration_tb`
  MODIFY `requester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
