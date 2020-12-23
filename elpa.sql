-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 06:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `a_number` int(11) NOT NULL,
  `a_date` date NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_firstname` varchar(20) NOT NULL,
  `a_lastname` varchar(20) NOT NULL,
  `a_email` varchar(20) NOT NULL,
  `a_phonenumber` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_firstname`, `a_lastname`, `a_email`, `a_phonenumber`, `username`, `password`) VALUES
(1, 'biruk', 'tesfaye', 'biruke49@gmail.com', 913922700, 'biruk', 'brook'),
(2, 'Daniel', 'Mekura', 'dani@gmail.com', 913922700, 'dani', 'dani'),
(3, 'Kal', 'Fekadu', 'kal@gmail.com', 913924578, 'kal', 'kal');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `C_ID` int(11) NOT NULL,
  `C_number` int(11) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `c_date` date NOT NULL,
  `grievance` varchar(40) NOT NULL,
  `remark` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`C_ID`, `C_number`, `Email`, `c_date`, `grievance`, `remark`) VALUES
(1, 0, 'nahome@gmail.com', '2020-12-18', 'My name is Nahome', ''),
(2, 1, 'biruk@gmail.com', '2020-12-03', 'my name is biruk', ''),
(3, 1, 'nahom@gmail.com', '2020-12-04', 'my name is nahom', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_number` int(11) NOT NULL,
  `customer_firstname` varchar(20) NOT NULL,
  `customer_lastname` varchar(20) NOT NULL,
  `customer_phonenumber` varchar(10) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `house_blueprint` blob NOT NULL,
  `personal_id` blob NOT NULL,
  `house_no` int(11) NOT NULL,
  `kebele` int(11) NOT NULL,
  `subcity` varchar(20) NOT NULL,
  `woreda` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_number`, `customer_firstname`, `customer_lastname`, `customer_phonenumber`, `customer_email`, `house_blueprint`, `personal_id`, `house_no`, `kebele`, `subcity`, `woreda`, `username`, `password`) VALUES
(1, 'biruk', 'tesfaye', '0913922700', 'biruke49@gmail.com', '', '', 1493, 8, 'bole', 5, 'biruk', 'brook'),
(2, 'Nahome', 'Tesfaye', '0900794512', 'nahome@gmail.com', '', '', 1493, 8, 'Addis Ababa', 5, 'nahome', 'nahome'),
(3, 'Kalkidan', 'Fekadu', '0913924578', 'nahome@gmail.com', '', '', 1493, 8, 'Addis Ababa', 5, 'kal', 'kal'),
(4, 'Abel', 'Haile', '0913924578', 'aman@gmail.com', '', '', 1493, 8, 'Addis Ababa', 5, 'abel', 'abel');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `e_firstname` varchar(20) NOT NULL,
  `e_lastname` varchar(20) NOT NULL,
  `e_email` varchar(20) NOT NULL,
  `e_phonenumber` varchar(15) NOT NULL,
  `e_position` varchar(20) NOT NULL,
  `e_kebele` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_firstname`, `e_lastname`, `e_email`, `e_phonenumber`, `e_position`, `e_kebele`, `username`, `password`) VALUES
(1, 'Betty', 'Hailu', 'betty@@gmail.com', '0911112222', 'clerk', 8, 'betty', 'betty'),
(3, 'Adey', 'Tezera', 'adey@gmail.com', '0900794512', 'clerk', 8, 'adey', 'adey'),
(4, 'Nahome', 'Tesfaye', 'nahome@gmail.com', '0913924578', 'clerk', 8, 'nahome', 'nahome'),
(5, 'Biruk', 'Tesfaye', 'nahome@gmail.com', '0913924578', 'clerk', 8, 'biruk', 'biruk');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(11) NOT NULL,
  `c_number` int(11) NOT NULL,
  `customer_firstname` varchar(20) NOT NULL,
  `customer_lastname` varchar(20) NOT NULL,
  `r_date` date NOT NULL,
  `bill_amount` int(11) NOT NULL,
  `Previous_reading` bigint(20) NOT NULL,
  `Current_reading` bigint(20) NOT NULL,
  `complaint_number` int(11) NOT NULL,
  `Meter Pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `c_number`, `customer_firstname`, `customer_lastname`, `r_date`, `bill_amount`, `Previous_reading`, `Current_reading`, `complaint_number`, `Meter Pic`) VALUES
(7, 9, 'Biruk', 'mati', '2020-07-09', 260, 123456, 123458, 2, ''),
(8, 2, 'Nahome', 'Berhanu', '2020-10-15', 123, 0, 0, 2, ''),
(9, 2, 'Nahome', 'Berhanu', '2020-10-19', 123, 123456, 123458, 2, ''),
(10, 1, 'Nahome', 'Arabica', '2020-10-20', 123, 123456, 123458, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_number`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `a_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
