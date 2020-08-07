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
-- Table structure for table `mm_unit`
--

CREATE TABLE `mm_unit` (
  `id` int(5) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `created_dt` date NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_unit`
--

INSERT INTO `mm_unit` (`id`, `unit_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'MT', 'synergic', '2020-03-06', 'synergic', '2020-03-06'),
(2, 'Kg', 'synergic', '2020-03-06', '', '0000-00-00'),
(3, 'Litre', 'synergic', '2020-03-06', 'synergic', '2020-03-18'),
(4, 'Quintal', 'synergic', '2020-03-18', '', '0000-00-00');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
