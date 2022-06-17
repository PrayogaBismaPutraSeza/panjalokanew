-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 08:22 AM
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
(15, 234, '8', 2, 'Any', 'Dhaka', '05/23/2018', '05/24/2018', 60000, 50000, 0, NULL, '0', '1'),
(16, 2233, '8', 1, 'fdhgfh', 'fgh', '05/22/2018', '00/00/0000', 50000, 0, 0, NULL, '0', '1'),
(19, 1233, '10', 2, 'fdghfg', 'srsr', '05/26/2018', '12/19/2018', 50000, 10000, 0, NULL, '2', '0'),
(20, 1232, '10', 1, 'any', 'Dhaka', '05/23/2018', '07/01/2018', 40000, 20000, 0, NULL, '2', '0');

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
  `d_amount` int(10) NOT NULL,
  `d_method` set('cash','bkash') NOT NULL DEFAULT 'cash'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_id`, `emp_id`, `d_date`, `d_cause`, `d_amount`, `d_method`) VALUES
(32, 18, '06/08/2018', 'Payment', 15000, 'bkash');

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
  `salary` int(10) NOT NULL DEFAULT '0',
  `bonus` int(10) NOT NULL DEFAULT '0',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `lname`, `fname`, `gender`, `emp_type`, `division`, `mobileNo`, `salary`, `bonus`, `delete_status`) VALUES
(8, 'Pasadas', 'Renz', 'Male', 'Job Order', 'Human Resource', '01834343456', 10000, 0, '0'),
(9, 'Maglangit', 'Karen', 'Female', 'Casual', 'Admin', '01743565434', 500, 50, '0'),
(10, 'Hasan', 'Ali', 'Male', 'Regular', 'Maintenance', '0192342324', 15000, 200, '0'),
(11, 'Sakif', 'Taswafreza', 'Male', 'Job Order', 'Supply', '01678345678', 6000, 0, '0'),
(17, 'Hasan', 'Abir', 'Male', 'Regular', 'Maintenance', '23423423', 12000, 100, '0'),
(21, 'Islam', 'Ratan', 'Male', 'Regular', 'Control', '028453456', 10000, 100, '0'),
(22, 'Mahamud', 'Imran', 'Male', 'Casual', 'MIS', '01675456754', 600, 50, '0');

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
  `pay_date` date NOT NULL DEFAULT '0000-00-00',
  `pay_amount` int(10) NOT NULL DEFAULT '0',
  `paid_in_cash` int(10) NOT NULL DEFAULT '0',
  `paid_in_bkash` int(10) NOT NULL DEFAULT '0',
  `due` int(10) NOT NULL DEFAULT '0',
  `due_status` enum('0','1') NOT NULL DEFAULT '0',
  `advance` int(10) NOT NULL DEFAULT '0',
  `advance_status` enum('0','1') NOT NULL DEFAULT '0',
  `pay_remark` varchar(100) DEFAULT NULL,
  `pay_status` enum('0','1') NOT NULL DEFAULT '0',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `emp_id`, `pay_date`, `pay_amount`, `paid_in_cash`, `paid_in_bkash`, `due`, `due_status`, `advance`, `advance_status`, `pay_remark`, `pay_status`, `delete_status`) VALUES
(52, 10, '2018-05-25', 1500, 500, 1000, 13500, '1', 0, '0', '', '1', '0'),
(54, 17, '2018-05-03', 12950, 500, 12000, 0, '0', 0, '0', '* Got advance money 450.00 on May-2018', '1', '0'),
(56, 21, '2018-05-17', 20000, 0, 20000, 0, '0', 0, '0', '* Had due 17000.00 on May-2018', '1', '0'),
(57, 21, '2018-06-06', 0, 0, 0, 17000, '1', 0, '0', '* Had due 7000.00 on May-2018', '1', '0'),
(58, 17, '2018-06-06', 12150, 700, 11000, 0, '0', 100, '1', '* Got advance money 450.00 on May-2018', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_company` varchar(100) NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `p_quantity` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `delete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_company`, `p_type`, `p_quantity`, `price`, `delete_status`) VALUES
(1, 'Roxy Paint', 'Roxy', 'Paint', '150 gln', 1500, '0'),
(2, 'Berger ', 'RFL', 'paint ', '5G ', 500, '0');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `salary_rate` int(10) NOT NULL,
  `bonus` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `emp_id`, `salary_rate`, `bonus`) VALUES
(5, 10, 15000, 200),
(9, 17, 12000, 100),
(10, 9, 500, 600),
(11, 11, 6000, 0),
(14, 8, 10000, 0),
(18, 11, 6000, 0),
(22, 17, 12000, 100),
(23, 21, 10000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(10) NOT NULL,
  `t_date` date NOT NULL,
  `amount` int(10) NOT NULL,
  `cause` varchar(50) NOT NULL,
  `method` set('cash','bkash') NOT NULL DEFAULT 'cash',
  `delete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `t_date`, `amount`, `cause`, `method`, `delete_status`) VALUES
(1, '0000-00-00', 547, 'any', 'cash', '1'),
(2, '2018-06-13', 67, 'vgvg', 'bkash', '0'),
(3, '2018-06-20', 3000, 'any', 'bkash', '0'),
(4, '2018-06-01', 300, 'Iftar', 'cash', '0'),
(5, '2018-06-06', 200, 'Eftar', 'cash', '0');

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

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
  MODIFY `deduction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `ot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `w_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
