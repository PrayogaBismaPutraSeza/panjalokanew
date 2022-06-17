-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 07:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billsno` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billsno`, `bill_id`, `company_id`, `delete_status`) VALUES
(1, 1, 1, '1'),
(3, 1, 2, '0'),
(7, 1, 3, '1'),
(8, 2, 1, '1'),
(9, 21312, 5, '1'),
(10, 1, 4, '0'),
(11, 3, 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `billreceived`
--

CREATE TABLE `billreceived` (
  `bsno` int(10) NOT NULL,
  `billsno` int(10) NOT NULL,
  `totoal_bill` int(10) NOT NULL,
  `received_date` varchar(10) NOT NULL,
  `received_amount` int(11) NOT NULL,
  `reduced` int(10) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `pay_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billreceived`
--

INSERT INTO `billreceived` (`bsno`, `billsno`, `totoal_bill`, `received_date`, `received_amount`, `reduced`, `remark`, `pay_status`, `delete_status`) VALUES
(5, 3, 30000, 'Wednesday,', 25000, 5000, 'Paid', '1', '0'),
(6, 1, 100000, 'Wednesday,', 29500, 500, 'Paid', '1', '1'),
(7, 8, 110000, 'Friday, Ma', 60000, 0, 'paid', '1', '1');

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
(1, 'BC', 'Dhaka', '0129239123', '1', 'sdfjiwoef'),
(2, 'Barzar', 'Dhaka', '0198239823', '0', 'Paint Company'),
(3, 'Shawon Enterprise', 'Mirpur, Dhaka', '0198372737', '1', 'Food Company'),
(4, 'Anupam IT Industry Ltd. ', 'Rupnagar, Mirpur-2, Dhaka-1216', '01943944463', '0', 'Software Company.'),
(5, 'awef', 'awefwe', '342234', '1', 'sdfwef'),
(6, 'Shawon Enterprise', 'Dhaka', '01965434567', '0', 'Food Company');

-- --------------------------------------------------------

--
-- Table structure for table `companybill`
--

CREATE TABLE `companybill` (
  `s_id` int(100) NOT NULL,
  `bill_no` int(100) NOT NULL DEFAULT '0',
  `billsno` varchar(10) DEFAULT NULL,
  `company_group_id` int(10) NOT NULL,
  `work_type` varchar(50) DEFAULT NULL,
  `work_area` varchar(50) DEFAULT NULL,
  `bill_date` varchar(50) NOT NULL DEFAULT '00/00/0000',
  `receive_date` varchar(50) NOT NULL DEFAULT '00/00/0000',
  `bill_amount` int(11) NOT NULL DEFAULT '0',
  `receive_amount` int(11) NOT NULL DEFAULT '0',
  `reduced` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(50) DEFAULT NULL,
  `pay_status` enum('0','1','2') DEFAULT '0',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companybill`
--

INSERT INTO `companybill` (`s_id`, `bill_no`, `billsno`, `company_group_id`, `work_type`, `work_area`, `bill_date`, `receive_date`, `bill_amount`, `receive_amount`, `reduced`, `remark`, `pay_status`, `delete_status`) VALUES
(1, 1, '1', 1, 'Banner', 'Mirpur', '05/02/2018', '05/22/2018', 20000, 19000, 0, 'Paid', '1', '1'),
(8, 232, '1', 1, 'Poster', 'Mirpur', '05/13/2018', '00/00/0000', 30000, 0, 0, 'Paid', '1', '1'),
(9, 23, '1', 1, 'Stand Banner', 'Dhaka', '05/02/2018', '11/30/2018', 50000, 49000, 0, 'Paid', '1', '1'),
(10, 2324, '3', 2, 'Sign Board', 'Gulshan', '05/21/2018', '09/13/2018', 30000, 2000, 0, 'Paid', '1', '0'),
(15, 234, '8', 2, 'Any', 'Dhaka', '05/23/2018', '05/24/2018', 60000, 50000, 0, NULL, '0', '1'),
(16, 2233, '8', 1, 'fdhgfh', 'fgh', '05/22/2018', '00/00/0000', 50000, 0, 0, NULL, '0', '1'),
(17, 123312, '9', 1, 'sdfsdf', 'asdfdf', '05/24/2018', '11/29/2018', 23423, 3453, 0, NULL, '0', '1'),
(18, 112, '7', 1, 'sdfe', 'asdfew', '05/17/2018', '11/29/2018', 40000, 30000, 0, NULL, '2', '1'),
(19, 1233, '10', 2, 'fdghfg', 'srsr', '05/26/2018', '12/19/2018', 50000, 10000, 0, NULL, '2', '0'),
(20, 1232, '10', 1, 'any', 'Dhaka', '05/23/2018', '00/00/0000', 40000, 0, 0, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `compaygroup`
--

CREATE TABLE `compaygroup` (
  `s_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `g_id` int(11) NOT NULL,
  `g_name` varchar(100) NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compaygroup`
--

INSERT INTO `compaygroup` (`s_id`, `id`, `g_id`, `g_name`, `delete_status`) VALUES
(1, 1, 1, 'RFL', '1'),
(2, 2, 1, 'GI', '0'),
(3, 1, 2, 'Roxy', '1'),
(4, 4, 1, 'Any', '0'),
(5, 1, 3, 'Lux', '1'),
(6, 4, 2, 'Others', '0'),
(7, 5, 1, 'asefe', '1'),
(8, 3, 1, 'Shawon Food', '1'),
(9, 2, 2, 'Group2', '0');

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
(20, 8, '05/02/2018', 'product', 300),
(21, 8, '05/02/2018', 'Cash', 500),
(22, 6, '05/23/2018', 'Cash', 500),
(23, 10, '05/18/2018', 'Cash', 500),
(24, 9, '05/17/2018', 'For any', 500),
(25, 9, '05/18/2018', 'For any', 500);

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
(8, 'Pasadas', 'Renz', 'Male', 'Job Order', 'Human Resource', '01834343456', 0),
(9, 'Maglangit', 'Karen', 'Female', 'Casual', 'Admin', '01743565434', 0),
(10, 'Hasan', 'Ali', 'Male', 'Regular', 'Maintenance', '0192342324', 0),
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
(10, 6, '04/06/2018', 10900, ' bkash ', 0, '0'),
(11, 8, '05/06/2018', 11200, ' bkash ', 0, '0'),
(24, 11, '05/07/2018', 9700, ' bkash ', 0, '0'),
(25, 6, '05/08/2018', 10950, ' bkash ', 0, '0'),
(26, 10, '05/26/2018', 1000, ' bkash ', 8300, '0'),
(27, 9, '05/26/2018', 690, ' bkash ', 2000, '0');

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
(5, 10, 10000, 4000, 0),
(9, 6, 12000, 1000, 50),
(10, 9, 500, 200, 90),
(11, 11, 12000, 2000, 0),
(14, 8, 15000, 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Colins', 'sabit'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
(4, 9, '05/03/2018'),
(5, 9, '05/03/2018'),
(6, 9, '05/05/2018'),
(7, 9, '05/23/2018'),
(8, 9, '05/16/2018'),
(9, 9, '05/17/2018'),
(10, 9, '05/18/2018'),
(11, 9, '05/19/2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billsno`);

--
-- Indexes for table `billreceived`
--
ALTER TABLE `billreceived`
  ADD PRIMARY KEY (`bsno`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companybill`
--
ALTER TABLE `companybill`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `compaygroup`
--
ALTER TABLE `compaygroup`
  ADD PRIMARY KEY (`s_id`);

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
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billsno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `billreceived`
--
ALTER TABLE `billreceived`
  MODIFY `bsno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `companybill`
--
ALTER TABLE `companybill`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `compaygroup`
--
ALTER TABLE `compaygroup`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `deduction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
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
  MODIFY `w_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
