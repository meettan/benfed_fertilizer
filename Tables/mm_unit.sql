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
-- Table structure for table `mm_unit`
--

CREATE TABLE `mm_unit` (
  `id` int(5) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_unit`
--

INSERT INTO `mm_unit` (`id`, `unit_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'MT', 'synergic', '2020-03-06 00:00:00', 'synergic', '2020-03-06 00:00:00'),
(2, 'KG', 'synergic', '2020-03-06 00:00:00', '', '2020-03-06 00:00:00'),
(3, 'LITER', 'synergic', '2020-03-06 00:00:00', 'synergic', '2020-03-18 00:00:00'),
(4, 'Quintal', 'synergic', '2020-03-18 00:00:00', '', '2020-03-06 00:00:00'),
(5, 'assddd', 'synergic', '2020-07-10 00:00:00', '', '2020-03-06 00:00:00'),
(6, 'dwdqwdqwdfwqdfwqdwq', 'synergic', '2020-07-28 03:04:33', 'synergic', '2020-07-28 03:07:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_unit`
--
ALTER TABLE `mm_unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mm_unit`
--
ALTER TABLE `mm_unit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
