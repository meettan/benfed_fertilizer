-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2020 at 02:43 PM
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
