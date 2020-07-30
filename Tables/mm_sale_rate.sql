-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2020 at 02:47 PM
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
-- Table structure for table `mm_sale_rate`
--

CREATE TABLE `mm_sale_rate` (
  `district` int(10) NOT NULL,
  `frm_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `comp_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_sale_rate`
--

INSERT INTO `mm_sale_rate` (`district`, `frm_dt`, `to_dt`, `comp_id`, `prod_id`, `rate`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(328, '2020-07-31', '2020-07-31', 1, 19, '77.58', 'synergic', '2020-07-15', NULL, NULL),
(329, '2020-07-01', '2020-07-31', 5, 59, '50.00', 'synergic', '2020-07-16', NULL, NULL),
(332, '2020-07-01', '2020-07-31', 1, 28, '500.00', 'synergic', '2020-07-17', NULL, NULL),
(332, '2020-07-15', '2020-07-31', 1, 18, '8.22', 'synergic', '2020-07-15', NULL, NULL),
(334, '2020-07-01', '2020-07-31', 7, 25, '100.00', 'synergic', '2020-07-16', NULL, NULL),
(337, '2020-07-01', '2020-08-31', 1, 28, '200.00', 'synergic', '2020-07-20', NULL, NULL),
(337, '2020-07-01', '2020-08-31', 1, 80, '512.00', 'synergic', '2020-07-20', NULL, NULL),
(337, '2020-07-01', '2020-08-31', 1, 81, '256.25', 'synergic', '2020-07-20', NULL, NULL),
(340, '2020-07-07', '2020-07-23', 7, 25, '23.33', 'synergic', '2020-07-15', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_sale_rate`
--
ALTER TABLE `mm_sale_rate`
  ADD UNIQUE KEY `idx_mm_sale_rt` (`district`,`frm_dt`,`to_dt`,`comp_id`,`prod_id`,`rate`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
