-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2020 at 01:24 PM
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
-- Table structure for table `tdf_dr_cr_note`
--

CREATE TABLE `tdf_dr_cr_note` (
  `trans_dt` date NOT NULL,
  `trans_no` int(10) NOT NULL,
  `soc_id` int(10) NOT NULL DEFAULT '0',
  `comp_id` int(10) NOT NULL,
  `tot_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `trans_flag` enum('R','A') NOT NULL,
  `note_type` enum('D','C') NOT NULL,
  `branch_id` int(5) NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdf_dr_cr_note`
--

INSERT INTO `tdf_dr_cr_note` (`trans_dt`, `trans_no`, `soc_id`, `comp_id`, `tot_amt`, `trans_flag`, `note_type`, `branch_id`, `fin_yr`, `remarks`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('2020-08-10', 2, 3, 1, '150000.00', 'R', 'D', 337, 1, 'Debit Note from IPL', 'synergic', '2020-08-11 11:05:01', 'synergic', '2020-08-11 00:00:00'),
('2020-08-10', 3, 0, 1, '800000.00', 'R', 'C', 342, 1, 'Credit note from Coromandelwdwdwdwad', 'synergic', '2020-08-11 01:04:40', 'synergic', '2020-08-11 01:23:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_dr_cr_note`
--
ALTER TABLE `tdf_dr_cr_note`
  ADD PRIMARY KEY (`trans_dt`,`trans_no`) USING BTREE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
