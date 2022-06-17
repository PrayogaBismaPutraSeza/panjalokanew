-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 12:15 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0',
  `details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `delete_status`, `details`) VALUES
(1, 'BC', 'Dhaka', '0129239123', '0', 'sdfjiwoef'),
(2, 'Bazar', 'Dhaka', '0198239823', '0', 'sdfjwef');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `deduction_id` int(5) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `d_date` varchar(50) NOT NULL,
  `d_cause` varchar(50) NOT NULL,
  `d_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_id`, `emp_id`, `d_date`, `d_cause`, `d_amount`) VALUES
(3, 10, '05/02/2018', 'Cash Money', 500),
(4, 10, '05/03/2018', 'Cash money', 100),
(5, 6, '05/01/2018', 'Cash Money', 100),
(6, 9, '05/02/2018', 'Hand Cash', 100),
(7, 9, '05/03/2018', 'hand Cash', 400),
(14, 9, '05/03/2018', 'product', 110),
(15, 9, '05/03/2018', 'Buy Product', 90),
(16, 10, '05/01/2018', 'cash', 100),
(17, 11, '05/01/2018', 'cash', 100),
(18, 11, '05/02/2018', 'Product', 150),
(19, 11, '05/03/2018', 'cash', 50),
(20, 8, '05/02/2018', 'product', 300);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  `division` varchar(30) NOT NULL,
  `mobileNo` varchar(20) DEFAULT NULL,
  `salary` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `lname`, `fname`, `gender`, `emp_type`, `division`, `mobileNo`, `salary`) VALUES
(6, 'Sabit', 'Colins', 'Male', 'Regular', 'MIS', '01934343233', 0),
(8, 'Pasadas', 'Renz', 'Male', 'Job Order', 'Human Resource', '01834343456', 0),
(9, 'Maglangit', 'Karen', 'Female', 'Casual', 'Admin', '01743565434', 0),
(10, 'Hasan', 'Ali', 'Male', 'Regular', 'Engineering', '0192342324', 0),
(11, 'Sakif', 'Taswafreza', 'Male', 'Job Order', 'Supply', '01678345678', 0);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `ot_id` int(10) NOT NULL,
  `rate` int(10) NOT NULL DEFAULT '0',
  `emp_id` int(10) NOT NULL,
  `ot_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`ot_id`, `rate`, `emp_id`, `ot_date`) VALUES
(1, 10, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `pay_date` varchar(50) NOT NULL,
  `pay_amount` int(10) NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  `due` int(10) NOT NULL DEFAULT '0',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `emp_id`, `pay_date`, `pay_amount`, `pay_method`, `due`, `delete_status`) VALUES
(10, 6, '04/06/2018', 10900, ' bkash ', 50, '0'),
(11, 8, '05/06/2018', 11700, ' bkash ', 0, '0'),
(24, 11, '05/07/2018', 9700, ' bkash ', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `salary_rate` int(10) NOT NULL,
  `advance` int(10) NOT NULL DEFAULT '0',
  `bonus` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `emp_id`, `salary_rate`, `advance`, `bonus`) VALUES
(5, 10, 10000, 0, 0),
(9, 6, 12000, 1000, 50),
(10, 9, 1000, 200, 90),
(11, 11, 12000, 2000, 0),
(14, 8, 15000, 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Colins', 'sabit'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `w_id` int(10) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `w_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`w_id`, `emp_id`, `w_date`) VALUES
(1, 9, '05/01/2018'),
(2, 9, '05/02/2018'),
(3, 9, '05/04/2018'),
(4, 9, '05/03/2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `deduction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `ot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `w_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
