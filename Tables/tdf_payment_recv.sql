-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 01:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sssproje_benfed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tdf_payment_recv`
--

CREATE TABLE `tdf_payment_recv` (
  `sl_no` int(10) NOT NULL,
  `paid_id` varchar(20) NOT NULL,
  `paid_dt` date NOT NULL,
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
  `fin_yr` int(10) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `approval_status` enum('U','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdf_payment_recv`
--

INSERT INTO `tdf_payment_recv` (`sl_no`, `paid_id`, `paid_dt`, `soc_id`, `sale_invoice_no`, `sale_invoice_dt`, `ro_no`, `pay_type`, `ref_no`, `tot_recvble_amt`, `adj_dr_note_amt`, `adj_adv_amt`, `net_recvble_amt`, `paid_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `branch_id`, `fin_yr`, `remarks`, `approval_status`) VALUES
(1, 'RCPT/N24/2020-21/1', '2020-08-10', 1, 'INV/N24/20-21/1', '2020-08-10 00:00:00', 'RO-1234', '1', NULL, '168000.00', '10000.00', '100000.00', '168000.00', '1000.00', 'synergic', '2020-08-10 00:00:00', '', '0000-00-00 00:00:00', 337, 1, 'paymet recived', 'A'),
(2, 'RCPT/N24/2020-21/2', '2020-08-10', 1, 'INV/N24/20-21/3', '2020-08-10 00:00:00', 'RO-1234', '2', NULL, '84000.00', '0.00', '50000.00', '84000.00', '50000.00', 'synergic', '2020-08-10 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'A'),
(3, 'RCPT/N24/2020-21/3', '2020-08-10', 1, 'INV/N24/20-21/3', '2020-08-10 00:00:00', 'RO-1234', '1', NULL, '84000.00', '0.00', '0.00', '24000.00', '24000.00', 'synergic', '2020-08-10 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'A'),
(4, 'RCPT/N24/2020-21/4', '2020-08-10', 1, 'INV/N24/20-21/2', '2020-08-10 00:00:00', 'RO-1234', '2', NULL, '84000.00', '0.00', '0.00', '84000.00', '10000.00', 'synergic', '2020-08-10 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U'),
(5, 'RCPT/N24/2020-21/5', '0000-00-00', 1, 'INV/N24/20-21/1', '2020-08-10 00:00:00', 'RO-1234', '5', NULL, '168000.00', '10000.00', '-9800.00', '117000.00', '1000.00', 'synergic', '2020-08-11 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U'),
(6, 'RCPT/N24/2020-21/6', '2020-08-11', 1, 'INV/N24/20-21/2', '2020-08-10 00:00:00', 'RO-1234', '4', NULL, '84000.00', '0.00', '9800.00', '74000.00', '500.00', 'synergic', '2020-08-11 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'A'),
(6, 'RCPT/N24/2020-21/6', '2020-08-11', 1, 'INV/N24/20-21/2', '2020-08-10 00:00:00', 'RO-1234', '5', NULL, '84000.00', '0.00', '9800.00', '74000.00', '500.00', 'synergic', '2020-08-11 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'A');

--
-- Triggers `tdf_payment_recv`
--
DELIMITER $$
CREATE TRIGGER `ad_tdf_py_recv` AFTER DELETE ON `tdf_payment_recv` FOR EACH ROW update td_sale
set paid_amt=paid_amt - old.paid_amt
where trans_do=old.sale_invoice_no
and sale_ro=old.ro_no
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ai_td_tdf_py_recv` AFTER INSERT ON `tdf_payment_recv` FOR EACH ROW BEGIN
update td_sale
set paid_amt=paid_amt + new.paid_amt
where trans_do=new.sale_invoice_no
and sale_ro=new.ro_no;

/*SET @district=(SELECT br_cd
FROM td_sale 
WHERE trans_do=new.sale_invoice_no
AND SALE_RO=new.ro_no);
           
SET @qty= (SELECT sum(QTY)
FROM td_sale 
WHERE trans_do=new.sale_invoice_no
AND SALE_RO=new.ro_no);

set @rate=(SELECT rate
FROM td_purchase
WHERE ro_no=new.ro_no);

    
set @prod_id=(SELECT prod_id
FROM td_purchase
WHERE ro_no=new.ro_no);
           
set @comp_id=(SELECT comp_id
FROM td_purchase
WHERE ro_no=new.ro_no);
           
set @invoice_no=(SELECT invoice_no
FROM td_purchase
WHERE ro_no=new.ro_no);
           INSERT INTO tdf_company_payment
(comp_id,district,prod_id,qty,sale_inv_no,pur_inv_no,pur_ro,purchase_rt)
values(@comp_id,@district,@prod_id,@qty,new.sale_invoice_no,@invoice_no,new.ro_no,@rate);
*/

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_payment_recv`
--
ALTER TABLE `tdf_payment_recv`
  ADD PRIMARY KEY (`paid_id`,`paid_dt`,`soc_id`,`pay_type`,`paid_amt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
