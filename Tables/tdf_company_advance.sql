-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 06:14 AM
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
-- Table structure for table `tdf_company_advance`
--

CREATE TABLE `tdf_company_advance` (
  `trans_dt` date NOT NULL,
  `sl_no` int(5) NOT NULL,
  `receipt_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `trans_type` enum('I','O') CHARACTER SET latin1 NOT NULL,
  `adv_amt` decimal(10,0) NOT NULL DEFAULT 0,
  `inv_no` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ro_no` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` text CHARACTER SET latin1 DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modifed_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `modifed_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdf_company_advance`
--

INSERT INTO `tdf_company_advance` (`trans_dt`, `sl_no`, `receipt_no`, `fin_yr`, `branch_id`, `comp_id`, `trans_type`, `adv_amt`, `inv_no`, `ro_no`, `remarks`, `created_by`, `created_dt`, `modifed_by`, `modifed_dt`) VALUES
('2020-08-10', 1, 'CompAdv/KOL/2020-21/1', 1, 342, 1, 'I', '5000', NULL, NULL, 'ss', 'synergic', '2020-08-10 01:54:52', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
