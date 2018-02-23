-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2015 at 10:06 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bustapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--
CREATE TABLE IF NOT EXISTS `bus` (
  `bus_id` int(11) NOT NULL,
  `seat` varchar(20) NOT NULL,
  `source` tinytext NOT NULL,
  `dest` tinytext NOT NULL,
  `dept_time` datetime(6) NOT NULL,
  `arrival_time` datetime(6) NOT NULL,
  `fare` int(11) NOT NULL,
  `seat_booked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `seat`, `source`, `dest`, `dept_time`, `arrival_time`, `fare`, `seat_booked`) VALUES
(3, 'MA1L01', 'Mumbai', 'Ahmedabad', '2015-10-23 10:00:00.000000', '2015-10-23 14:00:00.000000', 350, 1),
(3, 'MA1L02', 'Mumbai', 'Ahmedabad', '2015-10-23 10:00:00.000000', '2015-10-23 14:00:00.000000', 350, 1),
(6, 'MA2L01', 'Mumbai', 'Ahmedabad', '2015-10-25 12:00:00.000000', '2015-10-24 16:00:00.000000', 400, 0),
(2, 'MN1L01', 'Mumbai', 'Nagpur', '2015-10-23 10:00:00.000000', '2015-10-23 14:00:00.000000', 350, 1),
(2, 'MN1L02', 'Mumbai', 'Nagpur', '2015-10-23 10:00:00.000000', '2015-10-23 14:00:00.000000', 350, 0),
(5, 'MN2L01', 'Mumbai', 'Nagpur', '2015-10-23 12:00:00.000000', '2015-10-23 16:00:00.000000', 500, 1),
(1, 'MP1L01', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L02', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L03', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L04', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L05', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L06', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L07', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L08', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L09', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1L10', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1R01', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1R02', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 0),
(1, 'MP1R03', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(1, 'MP1R04', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(1, 'MP1R05', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(1, 'MP1R06', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(1, 'MP1R07', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(1, 'MP1R08', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(1, 'MP1R09', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(1, 'MP1R10', 'Mumbai', 'Pune', '2015-10-23 06:00:00.000000', '2015-10-23 10:00:00.000000', 350, 1),
(4, 'MP2L01', 'Mumbai', 'Pune', '2015-10-23 12:00:00.000000', '2015-10-23 16:00:00.000000', 400, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `email_id` varchar(40) NOT NULL,
  `password` varchar(18) NOT NULL,
  `bank_name` tinytext NOT NULL,
  `account_no` varchar(18) NOT NULL,
  `name` text NOT NULL,
  `balance` int(11) NOT NULL DEFAULT '15000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email_id`, `password`, `bank_name`, `account_no`, `name`, `balance`) VALUES
('asad@ss.dd', 'dd', 'ddd', 'dd', 'ddd', 14300),
('cfdfklj@hhd.dd', 'hgj', 'Karnatak Bank', '4578215', 'new', 14650),
('dahdghg@ddd.dd', 'asd', 'ead', 'fafa', 'ffdf', 14650),
('kegenrodrigues95@gmail.com', 'qwer', 'SBI', '784512', 'Kegen', 15000),
('paixao@gmail.com', 'ghj', 'Dena Bank', '4578', 'Daddy', 14650),
('roe@gmail.com', 'yuh', 'SBM', '784521', 'Rose', 15000),
('valentinarodrigues93@gmail.com', 'qwerty', 'SBI', '456985623133', 'Valentina', 2050);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `name` tinytext NOT NULL,
  `bus_id` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `trip_cost` int(11) NOT NULL,
  `orderstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`seat`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
