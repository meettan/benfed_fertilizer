-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 04:47 AM
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
-- Table structure for table `mm_dist_bank`
--

CREATE TABLE `mm_dist_bank` (
  `sl_no` int(11) NOT NULL DEFAULT 0,
  `acc_code` varchar(10) CHARACTER SET latin1 NOT NULL,
  `bank_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `branch_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ac_type` varchar(5) CHARACTER SET latin1 NOT NULL,
  `ac_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ifsc` varchar(25) NOT NULL,
  `br_cd` int(5) NOT NULL,
  `created_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_dist_bank`
--

INSERT INTO `mm_dist_bank` (`sl_no`, `acc_code`, `bank_name`, `branch_name`, `ac_type`, `ac_no`, `ifsc`, `br_cd`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, '10185', 'Axis Bank', '', 'S', '915010065341726', '122333333333', 337, 'Synergic Softek', '2018-10-10 01:25:09', NULL, NULL),
(2, '10188', 'Axis Bank  G.  C.  Ave.  A/c. ', 'G.C Avenue', 'C', '910020036541146', '5889996333', 337, 'Synergic Softek', '2018-10-22 08:40:33', NULL, NULL),
(3, '10184', 'Allahabad  Bank  Int.  A/c. ', '', 'C', '50057591404', '920011111114444', 338, 'Synergic Softek', '2018-10-22 08:42:23', NULL, NULL),
(4, '10207', 'S.B.I.  Park  St. CD I  A/c.  ', 'Park Street', 'C', '30147550851', '32211111117', 338, 'Synergic Softek', '2018-10-22 08:43:39', NULL, NULL),
(5, '10208', 'SBI  Park  St CD II  A/c.  No.', 'Park Street', 'C', '30379602309', '2111111111144444', 0, 'Synergic Softek', '2018-10-22 08:44:17', NULL, NULL),
(6, '10210', 'S.B.I-Suravi  A/c.Sys.(Todiman).', '', 'C', '31426358521', '6622444444', 0, 'Synergic Softek', '2018-10-22 08:45:15', NULL, NULL),
(7, '10010', 'S.B.L-TodiM..Empl.G.Grattiity  Fund', '', 'C', '31895922163', '011554555555', 0, 'Synergic Softek', '2018-10-22 08:45:42', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_dist_bank`
--
ALTER TABLE `mm_dist_bank`
  ADD PRIMARY KEY (`sl_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
