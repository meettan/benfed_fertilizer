-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2020 at 08:07 PM
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
-- Table structure for table `mm_sale_rate`
--

CREATE TABLE `mm_sale_rate` (
  `district` int(10) NOT NULL,
  `frm_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `comp_id` int(10) NOT NULL,
  `catg_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `sp_mt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sp_bag` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sp_govt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_sale_rate`
--

INSERT INTO `mm_sale_rate` (`district`, `frm_dt`, `to_dt`, `comp_id`, `catg_id`, `prod_id`, `sp_mt`, `sp_bag`, `sp_govt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(333, '2020-07-31', '2020-09-26', 1, 2, 81, '5000.00', '500.00', '2300.00', 'synergic', '2020-07-31', NULL, NULL),
(334, '2020-07-31', '2020-09-26', 1, 2, 81, '5000.00', '500.00', '2300.00', 'synergic', '2020-07-31', NULL, NULL),
(336, '2020-07-31', '2020-08-28', 1, 1, 81, '12.00', '12.00', '23.00', 'synergic', '2020-07-31', NULL, NULL),
(337, '2020-07-31', '2020-08-28', 1, 1, 81, '12.00', '12.00', '23.00', 'synergic', '2020-07-31', NULL, NULL),
(337, '2020-07-31', '2020-09-26', 1, 2, 81, '5000.00', '500.00', '2300.00', 'synergic', '2020-07-31', NULL, NULL),
(338, '2020-07-31', '2020-09-26', 1, 2, 81, '5000.00', '500.00', '2300.00', 'synergic', '2020-07-31', NULL, NULL),
(339, '2020-07-31', '2020-09-26', 1, 2, 81, '5000.00', '500.00', '2300.00', 'synergic', '2020-07-31', NULL, NULL),
(341, '2020-07-31', '2020-09-26', 1, 2, 81, '5000.00', '500.00', '2300.00', 'synergic', '2020-07-31', NULL, NULL),
(347, '2020-07-31', '2020-09-26', 1, 2, 81, '5000.00', '500.00', '2300.00', 'synergic', '2020-07-31', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_sale_rate`
--
ALTER TABLE `mm_sale_rate`
  ADD UNIQUE KEY `idx_mm_sale_rt` (`district`,`frm_dt`,`to_dt`,`comp_id`,`prod_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
