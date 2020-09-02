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
  `adv_amt` decimal(10,0) NOT NULL DEFAULT 0,
  `inv_no` varchar(50) DEFAULT NULL,
  `ro_no` varchar(30) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modifed_by` varchar(50) DEFAULT NULL,
  `modifed_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdf_advance`
--

INSERT INTO `tdf_advance` (`trans_dt`, `sl_no`, `receipt_no`, `fin_yr`, `branch_id`, `soc_id`, `trans_type`, `adv_amt`, `inv_no`, `ro_no`, `remarks`, `created_by`, `created_dt`, `modifed_by`, `modifed_dt`) VALUES
('2020-08-10', 3, 'Adv/N24/2020-21/3', 1, 337, 1, 'O', '50000', 'INV/N24/20-21/3', 'RO-1234', 'ADV ADJ', 'synergic', '2020-08-10 00:00:00', NULL, NULL),
('2020-08-10', 2, 'Adv/N24/2020-21/2', 1, 337, 1, 'O', '50000', 'INV/N24/20-21/1', 'RO-1234', 'ADV ADJ', 'synergic', '2020-08-10 00:00:00', NULL, NULL),
('2020-08-10', 4, 'Adv/N24/2020-21/4', 1, 337, 1, 'O', '10000', 'INV/N24/20-21/2', 'RO-1234', 'ADV ADJ', 'synergic', '2020-08-10 00:00:00', NULL, NULL),
('2020-08-11', 1, 'Adv/KOL/2020-21/1', 1, 342, 1, 'I', '200000', NULL, NULL, 'ccc', 'synergic', '2020-08-10 01:41:26', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_advance`
--
ALTER TABLE `tdf_advance`
  ADD PRIMARY KEY (`trans_dt`,`sl_no`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
