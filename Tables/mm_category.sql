-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2020 at 08:06 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

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
-- Table structure for table `mm_category`
--

CREATE TABLE `mm_category` (
  `sl_no` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `cate_desc` varchar(255) NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(55) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mm_category`
--

INSERT INTO `mm_category` (`sl_no`, `comp_id`, `cate_desc`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 1, 'Buffered Society(Cash)', 'synergic', '2020-07-31 11:03:25', '', '0000-00-00 00:00:00'),
(2, 1, 'Buffered Society(Credit)', 'synergic', '2020-07-31 11:03:37', '', '0000-00-00 00:00:00'),
(3, 1, 'Non Buffered Society(Credit)', 'synergic', '2020-07-31 11:03:48', '', '0000-00-00 00:00:00'),
(4, 1, 'Non Buffered Society(Cash)', 'synergic', '2020-07-31 11:04:07', '', '0000-00-00 00:00:00'),
(5, 2, 'Cash', 'synergic', '2020-07-31 11:07:26', '', '0000-00-00 00:00:00'),
(6, 2, 'Credit', 'synergic', '2020-07-31 11:07:34', '', '0000-00-00 00:00:00'),
(7, 3, 'EX- Rail', 'synergic', '2020-07-31 11:09:39', '', '0000-00-00 00:00:00'),
(8, 3, 'EX Godown', 'synergic', '2020-07-31 11:10:11', '', '0000-00-00 00:00:00'),
(9, 3, 'FOL Delivery', 'synergic', '2020-07-31 11:10:31', '', '0000-00-00 00:00:00'),
(10, 3, 'SOUTH BENGAL FOL DELIVERY', 'synergic', '2020-07-31 11:11:50', '', '0000-00-00 00:00:00'),
(11, 3, 'NORTH BENGAL FOL DELIVERY', 'synergic', '2020-07-31 11:12:19', '', '0000-00-00 00:00:00'),
(12, 6, 'Ex-factory', 'synergic', '2020-07-31 11:14:50', 'synergic', '2020-07-31 11:15:25'),
(13, 6, 'FOL', 'synergic', '2020-07-31 11:15:12', '', '0000-00-00 00:00:00'),
(14, 7, 'FOL Delivery', 'synergic', '2020-07-31 11:16:28', '', '0000-00-00 00:00:00'),
(15, 4, 'Ex-Godown & Rail', 'synergic', '2020-07-31 11:19:18', '', '0000-00-00 00:00:00'),
(16, 4, 'Ex-Godown', 'synergic', '2020-07-31 11:19:36', '', '0000-00-00 00:00:00'),
(17, 4, 'Ex-Rail', 'synergic', '2020-07-31 11:19:55', '', '0000-00-00 00:00:00'),
(18, 4, 'Ex-Godown Old Stock', 'synergic', '2020-07-31 11:20:21', '', '0000-00-00 00:00:00'),
(19, 4, 'Ex-Rail & Godown', 'synergic', '2020-07-31 11:21:04', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_category`
--
ALTER TABLE `mm_category`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mm_category`
--
ALTER TABLE `mm_category`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
