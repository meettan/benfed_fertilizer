-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2020 at 02:35 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benfed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tdf_advance`
--

CREATE TABLE `tdf_advance` (
  `trans_dt` date NOT NULL,
  `sl_no` int(5) NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `soc_id` int(10) NOT NULL,
  `trans_type` enum('I','O') NOT NULL,
  `adv_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `inv_no` varchar(50) DEFAULT NULL,
  `ro_no` varchar(30) DEFAULT NULL,
  `remarks` text,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdf_advance`
--

INSERT INTO `tdf_advance` (`trans_dt`, `sl_no`, `receipt_no`, `fin_yr`, `branch_id`, `soc_id`, `trans_type`, `adv_amt`, `inv_no`, `ro_no`, `remarks`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('2020-07-28', 1, 'Adv/N24/2020-21/1', 1, 337, 1, 'I', '501.14', NULL, NULL, 'sqsqdq', 'synergic', '2020-07-30 12:55:28', 'synergic', '2020-07-30 02:29:20'),
('2020-07-16', 2, 'Adv/N24/2020-21/2', 1, 337, 7, 'O', '20000.00', NULL, NULL, 'fefefesdddddfdfdfwqedf', 'synergic', '2020-07-30 02:00:37', 'synergic', '2020-07-30 02:28:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_advance`
--
ALTER TABLE `tdf_advance`
  ADD PRIMARY KEY (`trans_dt`,`sl_no`) USING BTREE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
