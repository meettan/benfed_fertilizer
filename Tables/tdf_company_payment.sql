-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 05:45 AM
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
  `pay_no` varchar(20) NOT NULL,
  `pay_dt` datetime NOT NULL,
  `district` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `inv_no` varchar(20) NOT NULL,
  `pur_ro` varchar(20) NOT NULL,
  `pur_inv_no` varchar(20) NOT NULL,
  `purchase_rt` decimal(20,2) NOT NULL,
  `bnk_id` int(10) NOT NULL,
  `pay_mode` int(5) NOT NULL,
  `paid_amt` decimal(20,2) NOT NULL,
  `ref_no` varchar(20) NOT NULL,
  `bnk_ac_no` varchar(20) NOT NULL,
  `ifcs_code` varchar(20) NOT NULL,
  `virtual_ac` varchar(20) NOT NULL,
  `remarks` varchar(30) NOT NULL,
  `fin_yr` int(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
