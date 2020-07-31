-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2020 at 03:57 PM
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
-- Table structure for table `td_sale`
--

CREATE TABLE `td_sale` (
  `trans_do` varchar(20) NOT NULL,
  `trans_no` int(10) NOT NULL,
  `do_dt` date NOT NULL,
  `sale_due_dt` date DEFAULT NULL,
  `trans_type` varchar(15) NOT NULL,
  `soc_id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `sale_ro` varchar(15) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `stock_point` varchar(50) NOT NULL,
  `gov_sale_rt` enum('Y','N') NOT NULL,
  `qty` decimal(10,3) NOT NULL DEFAULT '0.000',
  `sale_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `base_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxable_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dis` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tot_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL,
  `br_cd` int(10) DEFAULT NULL,
  `fin_yr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_sale`
--

INSERT INTO `td_sale` (`trans_do`, `trans_no`, `do_dt`, `sale_due_dt`, `trans_type`, `soc_id`, `comp_id`, `sale_ro`, `prod_id`, `stock_point`, `gov_sale_rt`, `qty`, `sale_rt`, `base_price`, `taxable_amt`, `cgst`, `sgst`, `dis`, `tot_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `br_cd`, `fin_yr`) VALUES
('SRO/N24/20-21/1', 1, '2020-07-31', '2020-07-31', 'Credit', 1, 1, 'raja_teat10', 19, '1', 'N', '15.000', '77.58', '0.00', '1163.70', '29.09', '29.09', '0.00', '1163.71', 'synergic', '2020-07-31', NULL, NULL, 337, '1'),
('SRO/N24/20-21/1', 1, '2020-07-31', '2020-07-31', 'Credit', 1, 1, 'raja_test15', 19, '3', 'N', '100.000', '77.58', '0.00', '7758.00', '193.95', '193.95', '0.00', '7758.00', 'synergic', '2020-07-31', NULL, NULL, 337, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_sale`
--
ALTER TABLE `td_sale`
  ADD PRIMARY KEY (`trans_do`,`do_dt`,`sale_ro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
