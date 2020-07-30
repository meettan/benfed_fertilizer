-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2020 at 02:44 PM
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
-- Table structure for table `mm_company_dtls`
--

CREATE TABLE `mm_company_dtls` (
  `COMP_ID` int(10) NOT NULL,
  `COMP_NAME` varchar(100) NOT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `COMP_PN_NO` varchar(30) DEFAULT NULL,
  `COMP_EMAIL_ID` varchar(50) DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DT` datetime DEFAULT NULL,
  `MODIFIED_BY` varchar(50) DEFAULT NULL,
  `MODIFIED_DT` datetime DEFAULT NULL,
  `COMP_ADD` text,
  `PAN_NO` varchar(20) NOT NULL,
  `GST_NO` varchar(20) NOT NULL,
  `CIN` varchar(50) DEFAULT NULL,
  `MFMS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_company_dtls`
--

INSERT INTO `mm_company_dtls` (`COMP_ID`, `COMP_NAME`, `short_name`, `COMP_PN_NO`, `COMP_EMAIL_ID`, `CREATED_BY`, `CREATED_DT`, `MODIFIED_BY`, `MODIFIED_DT`, `COMP_ADD`, `PAN_NO`, `GST_NO`, `CIN`, `MFMS`) VALUES
(1, 'IFFCO', 'IFFCO', 'edefffr', 'ssqsaqsaqs@fqef.com', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-07-28 02:49:43', '        8 A.J.C. BOSE ROAD, CIRCULAR ROAD (1ST Floor), KOLKATA 700017, WEST BENGAL\r\n    \r\n    \r\n   ', '', '19AAAAI0050M1ZS', '', ''),
(2, 'KRIBHCO', '', '033-25214157', 'KRIBHCOWB06@GMAIL.COM', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-07-10 00:00:00', '14B,LAKE TOWN BLOCK- A, KOLKATA-700089    \r\n    \r\n    \r\n   ', 'sfasfasfa', '19AAAAK0203G1Z8', '', 'SDWD'),
(3, 'INDIAN POTASH LIMITED', 'IPL', '033-22882006', 'plcal@potindia.com', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-04-03 00:00:00', '        EVEREST HOUSE, 11TH FLOOR, 46-C, JAWAHARLAL NEHRU ROAD,KOLKATA 700071,WEST BENGAL\r\n    \r\n   ', '', '19AAAC10888H1ZD', '', ''),
(4, 'Coromandel', NULL, '', '', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-03-06 00:00:00', '     COSSIMBAZAR DAMAN DAFTARI LANE, NEAR COSSIMBAZAR; WEST BENGAL-742102    \r\n   ', '', '19AAACC7852K1ZA', NULL, NULL),
(5, 'Khatian', NULL, '', '', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-03-06 00:00:00', '46, C RAFI AHMEND KIDWAI ROAD, KOLKATA\r\n   ', '', '19AAACK2342Q1Z7', NULL, NULL),
(6, 'JAYASHREE', NULL, '033-2282-7531;9827;9436 ', 'JCF@JAYSHREETEA.COM', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-03-06 00:00:00', '       INDUSTRY , 15TH FLOOR, 10 CAMAC STREET, KOLKATA-700017  \r\n   ', '', '19AAACJ7788D1Z7', NULL, NULL),
(7, 'MOSAIC', NULL, '', '', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-03-06 00:00:00', '11TH FLOOR,DLF CYBER CITY-II ; GURGAON, HARYANA-122002\r\n   ', '', '19AACCC4033C1Z6', NULL, NULL),
(8, 'Others', NULL, '', '', 'synergic', '2020-03-13 00:00:00', '', '2020-06-30 00:00:00', '', '', '', NULL, NULL),
(9, 'Synergic Fertilizer Ltd', 'SFL', '25664312', 'dd@ljcnaldn.com', 'synergic', '2020-07-28 00:00:00', '', '2020-06-30 00:00:00', '7/18 Acropolis\r\nKolakaya', 'dwdwde', 'dwdqwd23', 'wde', ''),
(10, 'AXCVB', 'CDC', '25664312', 'ldkvnla@nldasnl.com', 'synergic', '2020-07-28 02:36:35', 'synergic', '2020-07-28 02:48:13', ';njadjf;adjf;oaf\\', '125', '848', 'sdsdc', 'scsc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_company_dtls`
--
ALTER TABLE `mm_company_dtls`
  ADD PRIMARY KEY (`COMP_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
