-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2020 at 02:46 PM
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
(1, 'abcd', 'xyz', '337', '121233', 'qwq@gmail.com', NULL, NULL, NULL, 'Y', 'B', 'synergic', '2020-03-06 00:00:00', 'synergic', '2020-03-06 00:00:00'),
(2, 'sss', 'hgh', '338', '45345556', 'abc@gmail.com', NULL, NULL, NULL, 'Y', 'N', 'synergic', '2020-03-06 00:00:00', 'synergic', '2020-03-06 00:00:00'),
(3, 'test', 'KOSBA,KOLKATA 700107', '337', '78899999', 'abcs@gmail.com', '44444', 'vv556', 'N', 'Y', 'B', 'synergic', '2020-07-09 00:00:00', '', '2020-03-06 00:00:00'),
(4, 'asdfghjl;loueyewtw4t4wtw4tw4etwe4', 'fegegesgesggrrgrsgbsdbvsdkbsdbkhkhfuehfuohefoaef\r\nqfqaefhleahfheuofhuoeyfryohfahfhalfhlahflahslfhslh', '338', '12222', 'opentech4u@gmail.com', 'gegeg', 'fsfesdg', 'N', 'Y', 'I', 'synergic', '2020-07-10 00:00:00', 'synergic', '2020-07-10 00:00:00'),
(5, 'SKUS', 'clscnlaskcalscnl', '329', '12588', 'eewdwdwqdwdwd', '1234566', '555', 'O', 'N', 'N', 'synergic', '2020-07-10 00:00:00', 'synergic', '2020-07-10 00:00:00'),
(6, 'test10', 'KOSBA,KOLKATA 700107', '337', '', '', 'kgvv', '', 'N', 'Y', 'N', 'synergic', '2020-07-25 00:00:00', '', '2020-07-10 00:00:00'),
(7, 'XYZ Skus ltd', 'Barasat 24PGS(N)', '337', '', '', '12300123', 'ASDFGHT', 'N', 'N', 'N', 'synergic', '2020-07-25 00:00:00', '', '2020-07-10 00:00:00'),
(8, 'ABCDEFGH', ';kdjvsdv;nsd;kvjn;sdgv\r\n;sdgv;lsdjgajd;fj;', '329', '09850224189', 'opentech4u@gmail.com', 'gergrg', 'fgbrfg', 'O', 'Y', 'B', 'synergic', '2020-07-28 04:57:04', NULL, NULL),
(9, 'dwdwdwd', 'qds', '336', '09850224189', 'opentech4u@gmail.com', 'qd', 'ddwd', 'N', 'N', 'N', 'synergic', '2020-07-28 05:00:31', NULL, NULL);

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
