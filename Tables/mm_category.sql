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
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
