-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 02:39 AM
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
-- Table structure for table `td_purchase`
--

CREATE TABLE `td_purchase` (
  `trans_cd` int(10) NOT NULL,
  `trans_dt` date NOT NULL,
  `trans_flag` enum('1','2') DEFAULT NULL,
  `comp_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `ro_no` varchar(30) NOT NULL,
  `ro_dt` date DEFAULT NULL,
  `invoice_no` varchar(30) DEFAULT NULL,
  `invoice_dt` date DEFAULT NULL,
  `due_dt` date DEFAULT NULL,
  `qty` decimal(20,3) NOT NULL DEFAULT '0.000',
  `unit` int(10) NOT NULL,
  `stock_qty` decimal(10,3) NOT NULL DEFAULT '0.000',
  `no_of_bags` int(10) NOT NULL DEFAULT '0',
  `delivery_mode` enum('1','2','3') NOT NULL,
  `reck_pt_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reck_pt_n_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `govt_sale_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `iffco_buf_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `iffco_n_buff_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `challan_flag` varchar(5) NOT NULL DEFAULT 'N',
  `rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `base_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `retlr_margin` decimal(10,2) NOT NULL DEFAULT '0.00',
  `spl_rebt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rbt_add` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rbt_less` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rnd_of_add` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rnd_of_less` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tot_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `net_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `add_adj_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `less_adj_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL,
  `br` int(11) DEFAULT NULL,
  `fin_yr` varchar(20) DEFAULT NULL,
  `stock_point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_purchase`
--

INSERT INTO `td_purchase` (`trans_cd`, `trans_dt`, `trans_flag`, `comp_id`, `prod_id`, `ro_no`, `ro_dt`, `invoice_no`, `invoice_dt`, `due_dt`, `qty`, `unit`, `stock_qty`, `no_of_bags`, `delivery_mode`, `reck_pt_rt`, `reck_pt_n_rt`, `govt_sale_rt`, `iffco_buf_rt`, `iffco_n_buff_rt`, `challan_flag`, `rate`, `base_price`, `cgst`, `sgst`, `retlr_margin`, `spl_rebt`, `rbt_add`, `rbt_less`, `rnd_of_add`, `rnd_of_less`, `tot_amt`, `net_amt`, `add_adj_amt`, `less_adj_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `br`, `fin_yr`, `stock_point`) VALUES
(22, '2020-08-06', '1', 3, 20, '2001140', '2020-08-01', '102457', '2020-08-01', '2020-09-30', '50.000', 1, '50.000', 1000, '1', '0.00', '0.00', '0.00', '0.00', '0.00', 'N', '1000.00', '50000.00', '1250.00', '1250.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '52500.00', '50000.00', '0.00', '0.00', 'synergic', '2020-08-06', NULL, NULL, 337, '1', 1),
(21, '0000-00-00', '1', 1, 28, '260443', '2020-07-09', '100529', '2020-07-09', '2019-09-30', '30.000', 1, '30.000', 600, '1', '0.00', '0.00', '0.00', '0.00', '0.00', 'N', '1400.00', '42000.00', '1053.69', '1053.69', '147.53', '0.00', '1200.00', '0.00', '0.00', '0.00', '45455.00', '42147.53', '0.00', '0.00', 'synergic', '2020-08-06', NULL, NULL, 337, '1', 1),
(23, '2020-08-06', '1', 1, 80, '80014', '2020-07-29', '12004', '2020-07-29', '2020-09-30', '50.000', 1, '50.000', 1111, '1', '0.00', '0.00', '0.00', '0.00', '0.00', 'N', '1200.00', '60000.00', '1472.48', '1472.48', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '61844.00', '58899.37', '0.00', '1100.63', 'synergic', '2020-08-06', NULL, NULL, 337, '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_purchase`
--
ALTER TABLE `td_purchase`
  ADD PRIMARY KEY (`ro_no`,`comp_id`),
  ADD KEY `trans_cd` (`trans_cd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `td_purchase`
--
ALTER TABLE `td_purchase`
  MODIFY `trans_cd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
