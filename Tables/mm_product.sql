-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 02:42 AM
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
-- Table structure for table `mm_product`
--

CREATE TABLE `mm_product` (
  `PROD_ID` int(10) NOT NULL,
  `PROD_DESC` varchar(100) NOT NULL,
  `COMPANY` varchar(30) NOT NULL,
  `PROD_TYPE` varchar(30) DEFAULT NULL,
  `CREATED_BY` varchar(30) DEFAULT NULL,
  `CREATED_DT` datetime DEFAULT NULL,
  `MODIFIED_BY` varchar(30) DEFAULT NULL,
  `MODIFIED_DT` datetime DEFAULT NULL,
  `COMMODITY_ID` varchar(30) DEFAULT NULL,
  `GST_RT` decimal(10,2) DEFAULT '0.00',
  `HSN_CODE` int(20) DEFAULT NULL,
  `QTY_PER_BAG` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mm_product`
--

INSERT INTO `mm_product` (`PROD_ID`, `PROD_DESC`, `COMPANY`, `PROD_TYPE`, `CREATED_BY`, `CREATED_DT`, `MODIFIED_BY`, `MODIFIED_DT`, `COMMODITY_ID`, `GST_RT`, `HSN_CODE`, `QTY_PER_BAG`) VALUES
(1, 'Ammonium Sulphate-50 Kg', '8', '1', NULL, NULL, 'synergic', '2020-07-24 00:00:00', '1', '5.00', 3102, 50),
(2, 'BORON-14.6-20Kg', '8', '1', NULL, NULL, 'synergic', '2020-08-06 09:26:13', '1', '18.00', 3102, 20),
(3, 'Calcium Nitrate-10Kg', '8', '3', NULL, NULL, 'synergic', '2020-08-06 09:26:49', '1', '5.00', 3102, 10),
(4, 'Calcium Nitrate-1Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(5, 'Calcium Nitrate-25 Kg.', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31000000, NULL),
(6, 'City Compost-KRIBHCO-50 Kg', '2', '1', NULL, NULL, 'synergic', '2020-03-04 00:00:00', '1', '5.00', 3101, NULL),
(7, 'City Compost-IPL-50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-08-06 10:25:02', '1', '5.00', 31000000, 50),
(8, 'D A P (Zn)50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31053000, NULL),
(9, 'D. A. P. (Paradeep)50  Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(10, 'DAP(KRIBHCO)', '2', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(11, 'DAP(IPL)', '3', '3', NULL, NULL, 'synergic', '2020-08-06 10:25:11', '1', '5.00', 31053000, 50),
(12, 'DAP (Imported)50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31053000, NULL),
(13, 'DAP (Manufactured)50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31053000, NULL),
(14, 'DAP50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31053000, NULL),
(15, 'KARBON+50 Kg', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 31010099, NULL),
(16, 'Liquid Consortia-100ml', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(17, 'Liquid Consortia-1lit.', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(18, 'Liquid Consortia-250ml', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(19, 'Liquid Consortia-500ml', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(20, 'M.O.P.(IPL)-50 Kg', '3', '3', NULL, NULL, 'synergic', '2020-08-06 10:25:21', '1', '5.00', 31042000, 50),
(21, 'Magnesium Sulphate-1Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '12.00', 2833, NULL),
(22, 'Magnesium Sulphate-25Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '12.00', 2833, NULL),
(23, 'Magnesium Sulphate-2Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '12.00', 2833, NULL),
(24, 'Magnesium Sulphate-50Kg.', '8', '3', NULL, NULL, NULL, NULL, '1', '12.00', 2833, NULL),
(25, 'MOP(MOSAIC)50 Kg', '7', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31042000, NULL),
(26, 'NPK 18.18.18', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(27, 'N P K (Zn)-10-26-26(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(28, 'N P K -10-26-26-IFFCO (50 Kg)', '1', '3', NULL, NULL, 'synergic', '2020-08-06 10:23:35', '1', '5.00', 3105, 50),
(29, 'N P K -10-26-26-COROMONDAL (50 Kg)', '4', '3', NULL, NULL, NULL, NULL, '1', '0.00', 31052000, NULL),
(30, 'N P K -10-26-26-KRIBCO (50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '0.00', 3105, NULL),
(31, 'N P K -12.32.16(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(32, 'N P K -14-35-14(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(33, 'N P K -20.20.0.13(50 )', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(34, 'N P K -24.24.0.8(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(35, 'N P K -28-28-0(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(36, 'N P K S-15:15:15:09(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(37, 'N P K S-16:20:0:13(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(38, 'N P K S-20:20:0:13(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(39, 'N P K-17.17.17( 50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(40, 'N.P.K.-20.20.0(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(41, 'N:P:K:S(IMP) 20.20.0-50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(42, 'NPK I-10.26.26( 50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(43, 'NPK-16.16.16(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(44, 'NPK-II-12:32:16 -50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(45, 'NPKS-13.33.0.06(50kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(46, 'NPKS-20.20.0.13(50 Kg)', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31052000, NULL),
(47, 'Phospho Zypsum-10 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3824, NULL),
(48, 'Phospho Zypsum-1kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3824, NULL),
(49, 'Phospho Zypsum-25 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3824, NULL),
(50, 'Phospho Zypsum-5Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3824, NULL),
(51, 'PSB Bio Fert.-1kg', '8', '2', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(52, 'PSB Bio Fert.-500gm', '8', '2', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(53, 'PSB Bio Fert-250gm', '8', '2', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(54, 'S S P (G) SAI-50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(55, 'S S P (P) SAI-50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(56, 'S S P- G(Mangalam)-50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(57, 'S S P -P (Mangalam)-50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(58, 'S.S.P (G)-IPL -50 Kg', '3', '3', NULL, NULL, 'synergic', '2020-08-06 10:25:28', '1', '5.00', 31031000, 50),
(59, 'S.S.P.(G)-KHAITAN 50 Kg', '5', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(60, 'S.S.P.(P)-IPL 50 Kg', '3', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(61, 'S.S.P.(P)-KHAITAN 50 Kg', '5', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(62, 'SAGARIKA (Granular)-1 Kg', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(63, 'SAGARIKA (Granular)-10 Kg', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(64, 'SAGARIKA (Granular)-25 Kg', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(65, 'SAGARIKA (Liquid)-100ml', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(66, 'SAGARIKA (Liquid)-1Lit', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(67, 'SAGARIKA (Liquid)-250ml', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(68, 'SAGARIKA (Liquid)-5 lit', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(69, 'SAGARIKA (Liquid)-500 ml', '8', '1', NULL, NULL, NULL, NULL, '1', '5.00', 3101, NULL),
(70, 'SSP (P)(JAYASREE) 50 Kg', '4', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31031000, NULL),
(71, 'Sulpher Bentonite-1 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 25030090, NULL),
(72, 'Sulpher Bentonite-10Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 25030090, NULL),
(73, 'Sulpher Bentonite-25 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 25030090, NULL),
(74, 'Sulpher Bentonite-5 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 25030090, NULL),
(75, 'UREA  (Ph-I)45 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(76, 'UREA  (Ph-I)50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(77, 'UREA ( NEEM) IPL -50 Kg', '3', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31021000, NULL),
(78, 'Urea (Imported)-45 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(79, 'Urea (KFL)-45 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(80, 'UREA (Neem)-IFFCO 45 Kg', '1', '3', NULL, NULL, 'synergic', '2020-07-24 00:00:00', '1', '5.00', 3102, 45),
(81, 'UREA (Neem)-IFFCO  50 Kg', '1', '3', NULL, NULL, 'synergic', '2020-08-06 10:24:43', '1', '5.00', 3102, 50),
(82, 'UREA (NEEM)-COROMONDAL 50 Kg', '4', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31021000, NULL),
(83, 'UREA (Om)45 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(84, 'UREA (Om)50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(85, 'UREA (Ph-II)45Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(86, 'UREA (Ph-II)50 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(87, 'Urea Phos-10Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(88, 'Urea Phos-2 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(89, 'Urea Phos-25 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(90, 'Urea Phos-5 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(91, 'Urea-IPL 45 Kg', '3', '3', NULL, NULL, NULL, NULL, '1', '5.00', 31021000, NULL),
(92, 'WSF SOP-10 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(93, 'WSF SOP-1kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(94, 'WSF SOP-25 Kg.', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(95, 'WSF SOP-5Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3105, NULL),
(96, 'WSF-0.0.50- 1 Kg', '8', NULL, NULL, NULL, 'synergic', '2020-03-04 00:00:00', '1', '5.00', 3105, NULL),
(97, 'WSF-0.0.50 - 10Kg', '8', NULL, NULL, NULL, 'synergic', '2020-03-04 00:00:00', '1', '5.00', 3105, NULL),
(98, 'WSF-0.0.50-  25 Kg', '8', NULL, NULL, NULL, 'synergic', '2020-03-04 00:00:00', '1', '5.00', 3105, NULL),
(99, 'WSF-0.0.50 - 5 Kg', '8', NULL, NULL, NULL, 'synergic', '2020-03-04 00:00:00', '1', '5.00', 3105, NULL),
(100, 'Zinc Sulphate Mono. (33%)10 Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '18.00', 28332990, NULL),
(101, 'Zinc Sulphate Mono. (33%)1kg', '8', '3', NULL, NULL, NULL, NULL, '1', '18.00', 28332990, NULL),
(102, 'Zinc Sulphate Mono. (33%)5Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '18.00', 28332990, NULL),
(103, 'Zinc Sulphate-10 Kg.', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(104, 'Zinc Sulphate-1kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL),
(105, 'Zinc Sulphate-5Kg', '8', '3', NULL, NULL, NULL, NULL, '1', '5.00', 3102, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_product`
--
ALTER TABLE `mm_product`
  ADD PRIMARY KEY (`PROD_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mm_product`
--
ALTER TABLE `mm_product`
  MODIFY `PROD_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
