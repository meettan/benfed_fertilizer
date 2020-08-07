-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 02:40 AM
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
-- Table structure for table `tdf_payment_recv`
--

CREATE TABLE `tdf_payment_recv` (
  `paid_id` int(10) NOT NULL,
  `paid_dt` int(10) NOT NULL,
  `soc_id` int(10) NOT NULL,
  `sale_invoice_no` varchar(20) NOT NULL,
  `sale_invoice_dt` datetime NOT NULL,
  `ro_no` varchar(20) NOT NULL,
  `pay_type` varchar(10) NOT NULL,
  `ref_no` varchar(20) DEFAULT NULL,
  `tot_recvble_amt` decimal(10,2) NOT NULL,
  `adj_dr_note_amt` decimal(10,2) NOT NULL,
  `adj_adv_amt` decimal(10,2) NOT NULL,
  `net_recvble_amt` decimal(10,2) NOT NULL,
  `paid_amt` decimal(10,2) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_dt` datetime NOT NULL,
  `branch_id` int(10) NOT NULL,
  `fin_yr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdf_payment_recv`
--

INSERT INTO `tdf_payment_recv` (`paid_id`, `paid_dt`, `soc_id`, `sale_invoice_no`, `sale_invoice_dt`, `ro_no`, `pay_type`, `ref_no`, `tot_recvble_amt`, `adj_dr_note_amt`, `adj_adv_amt`, `net_recvble_amt`, `paid_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `branch_id`, `fin_yr`) VALUES
(1, 2020, 3, 'SRO/N24/20-21/1', '2020-08-02 00:00:00', '260443', '4', NULL, '2310.00', '0.00', '100000.00', '3202.50', '500.00', 'synergic', '2020-08-06 00:00:00', '', '0000-00-00 00:00:00', 337, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_payment_recv`
--
ALTER TABLE `tdf_payment_recv`
  ADD PRIMARY KEY (`paid_id`,`paid_dt`,`soc_id`,`pay_type`,`paid_amt`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
