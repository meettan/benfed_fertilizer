-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 05:20 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sssproje_benfed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tdf_dr_cr_note`
--

CREATE TABLE `tdf_dr_cr_note` (
  `trans_dt` date NOT NULL,
  `trans_no` int(10) NOT NULL,
  `recpt_no` varchar(30) DEFAULT NULL,
  `soc_id` int(10) NOT NULL DEFAULT 0,
  `comp_id` int(10) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `ro` varchar(30) NOT NULL,
  `catg` int(5) DEFAULT NULL,
  `tot_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
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

INSERT INTO `tdf_dr_cr_note` (`trans_dt`, `trans_no`, `recpt_no`, `soc_id`, `comp_id`, `invoice_no`, `ro`, `catg`, `tot_amt`, `trans_flag`, `note_type`, `branch_id`, `fin_yr`, `remarks`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('2020-08-10', 2, 'test1', 3, 1, '', '', NULL, '150000.00', 'R', 'D', 337, 1, 'Debit Note from IPL', 'synergic', '2020-08-11 11:05:01', 'synergic', '2020-08-11 00:00:00'),
('2020-08-10', 3, 'test2', 3, 1, '', '', NULL, '80000.00', 'A', 'D', 337, 1, 'Credit note from Coromandelwdwdwdwad', 'synergic', '2020-08-11 01:04:40', 'synergic', '2020-08-11 01:23:14'),
('2020-08-25', 4, 'test3', 3, 1, 'INV/HOG/20-21/2', 'RO-1234', NULL, '10000.00', 'R', 'D', 337, 1, '', 'synergic', '2020-08-26 06:57:50', NULL, NULL),
('2020-08-25', 5, 'test4', 1, 3, 'INV/N24/IFFCO/08/20-21/5', 'Ro-989', 1, '6000.00', 'R', 'D', 337, 1, '', 'synergic', '2020-08-26 01:47:05', NULL, NULL),
('2020-08-31', 6, 'Crnote/N24/2020-21/6', 1, 2, 'INV/N24/20-21/1', 'RO-1234', 2, '500.00', 'R', 'D', 337, 1, 'test', 'synergic', '2020-09-01 09:05:13', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_dr_cr_note`
--
ALTER TABLE `tdf_dr_cr_note`
  ADD PRIMARY KEY (`trans_dt`,`trans_no`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
