-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 04:45 AM
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
-- Table structure for table `tdf_company_payment`
--

CREATE TABLE `tdf_company_payment` (
  `sl_no` int(11) NOT NULL,
  `pay_no` varchar(20) NOT NULL,
  `pay_dt` datetime NOT NULL,
  `district` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `sale_inv_no` varchar(20) NOT NULL,
  `pur_ro` varchar(20) NOT NULL,
  `pur_inv_no` varchar(20) NOT NULL,
  `purchase_rt` decimal(20,2) NOT NULL,
  `bnk_id` int(10) NOT NULL,
  `pay_mode` int(5) NOT NULL,
  `paid_amt` decimal(20,2) NOT NULL,
  `ref_no` varchar(20) DEFAULT NULL,
  `ref_dt` date DEFAULT NULL,
  `bnk_ac_no` varchar(20) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `virtual_ac` varchar(20) DEFAULT NULL,
  `remarks` varchar(30) DEFAULT NULL,
  `fin_yr` int(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdf_company_payment`
--

INSERT INTO `tdf_company_payment` (`sl_no`, `pay_no`, `pay_dt`, `district`, `comp_id`, `prod_id`, `qty`, `sale_inv_no`, `pur_ro`, `pur_inv_no`, `purchase_rt`, `bnk_id`, `pay_mode`, `paid_amt`, `ref_no`, `ref_dt`, `bnk_ac_no`, `ifsc`, `virtual_ac`, `remarks`, `fin_yr`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(7, '', '0000-00-00 00:00:00', 338, 4, 15, '800.00', 'RCPT/HOG/2020-21/1', 'RO-98', 'INV-711', '80.55', 0, 0, '0.00', NULL, NULL, '', '', NULL, NULL, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, '', '0000-00-00 00:00:00', 338, 1, 42, '400.00', 'RCPT/HOG/2020-21/2', 'RO-1234', 'INV-1234', '53.44', 0, 0, '0.00', NULL, NULL, '', '', NULL, NULL, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(9, '', '0000-00-00 00:00:00', 337, 2, 10, '1200.00', 'RCPT/N24/2020-21/1', 'RO-558', 'INV8922', '53.44', 0, 0, '0.00', NULL, NULL, '', '', NULL, NULL, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(10, '', '0000-00-00 00:00:00', 337, 1, 42, '400.00', 'RCPT/N24/2020-21/2', 'RO-1234', 'INV-1234', '53.44', 0, 0, '0.00', NULL, NULL, '', '', NULL, NULL, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_company_payment`
--
ALTER TABLE `tdf_company_payment`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tdf_company_payment`
--
ALTER TABLE `tdf_company_payment`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
