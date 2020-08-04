-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 06:04 AM
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
-- Table structure for table `td_dr_note`
--

CREATE TABLE `td_dr_note` (
  `trans_dt` date NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `invoice_dt` date NOT NULL,
  `ro_no` varchar(20) NOT NULL,
  `ro_dt` date NOT NULL,
  `soc_id` int(10) NOT NULL,
  `tot_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `trans_flag` enum('R','A') NOT NULL,
  `branch_id` int(5) NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_dr_note`
--
ALTER TABLE `td_dr_note`
  ADD PRIMARY KEY (`trans_dt`,`invoice_no`,`ro_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
