-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 02:41 AM
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
-- Table structure for table `mm_ferti_soc`
--

CREATE TABLE `mm_ferti_soc` (
  `soc_id` int(5) NOT NULL,
  `soc_name` varchar(100) NOT NULL,
  `soc_add` text NOT NULL,
  `district` varchar(20) NOT NULL,
  `ph_no` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `gstin` varchar(20) DEFAULT NULL,
  `mfms` varchar(20) DEFAULT NULL,
  `status` enum('N','O','R') DEFAULT 'N',
  `stock_point_flag` enum('Y','N') NOT NULL DEFAULT 'N',
  `buffer_flag` enum('N','B','I') NOT NULL DEFAULT 'N',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_ferti_soc`
--

INSERT INTO `mm_ferti_soc` (`soc_id`, `soc_name`, `soc_add`, `district`, `ph_no`, `email`, `gstin`, `mfms`, `status`, `stock_point_flag`, `buffer_flag`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Dharampur SKUS Ltd', 'Dharampur,Po.: Dharampur,\r\nDist. : 24PGS(N)', '337', '1234567890', '', '19AABAD6387P3ZW', '772292', 'R', 'Y', 'I', 'synergic', '2020-08-06 10:07:33', 'synergic', '2020-08-06 10:07:46'),
(2, 'Amdanga L/S Thana L/S PCAMS  Ltd. ', 'Vill Amdanga, \r\nNorth 24 Parganas', '337', '', '', '19AACAA1194Q1ZB', '373442', 'N', 'N', 'N', 'synergic', '2020-08-06 10:08:45', NULL, NULL),
(3, 'Gopalpur Naigachi S.K.U,S Ltd ', 'Gopalpur Gaighata', '337', '', '', '19AABAG8780H1ZB', '387972', 'N', 'N', 'N', 'synergic', '2020-08-06 10:09:53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_ferti_soc`
--
ALTER TABLE `mm_ferti_soc`
  ADD PRIMARY KEY (`soc_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
