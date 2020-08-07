-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 02:39 AM
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
  `adv_amt` decimal(10,0) NOT NULL DEFAULT '0',
  `inv_no` varchar(50) DEFAULT NULL,
  `ro_no` varchar(30) DEFAULT NULL,
  `remarks` text,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modifed_by` varchar(50) DEFAULT NULL,
  `modifed_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdf_advance`
--

INSERT INTO `tdf_advance` (`trans_dt`, `sl_no`, `receipt_no`, `fin_yr`, `branch_id`, `soc_id`, `trans_type`, `adv_amt`, `inv_no`, `ro_no`, `remarks`, `created_by`, `created_dt`, `modifed_by`, `modifed_dt`) VALUES
('2020-08-02', 1, 'Adv/N24/2020-21/1', 1, 337, 3, 'I', '100000', NULL, NULL, 'Advance paid for the purchase of Urea-10-26-26', 'synergic', '2020-08-06 11:32:23', NULL, NULL);

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
