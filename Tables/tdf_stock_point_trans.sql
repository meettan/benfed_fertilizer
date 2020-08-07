-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 02:40 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

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
-- Table structure for table `tdf_stock_point_trans`
--

CREATE TABLE `tdf_stock_point_trans` (
  `trans_dt` date NOT NULL,
  `ro_inv_no` varchar(30) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `point_id` int(10) NOT NULL,
  `trans_type` enum('I','O','R') NOT NULL,
  `unit` int(5) NOT NULL,
  `quantity` decimal(10,0) NOT NULL DEFAULT '0',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdf_stock_point_trans`
--

INSERT INTO `tdf_stock_point_trans` (`trans_dt`, `ro_inv_no`, `branch_id`, `fin_yr`, `point_id`, `trans_type`, `unit`, `quantity`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('2020-08-06', '2001140', 337, 1, 1, 'I', 1, '50', 'synergic', '2020-08-06 11:07:45', NULL, NULL),
('2020-08-06', '260443', 337, 1, 1, 'I', 1, '30', 'synergic', '2020-08-06 10:45:17', NULL, NULL),
('2020-08-06', '80014', 337, 1, 1, 'I', 1, '50', 'synergic', '2020-08-06 01:58:14', NULL, NULL),
('2020-09-30', '260443', 337, 1, 1, 'O', 0, '2', 'synergic', '2020-08-06 02:34:32', NULL, NULL),
('2020-09-30', '80014', 337, 1, 1, 'O', 0, '1', 'synergic', '2020-08-06 02:34:32', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_stock_point_trans`
--
ALTER TABLE `tdf_stock_point_trans`
  ADD PRIMARY KEY (`trans_dt`,`ro_inv_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
