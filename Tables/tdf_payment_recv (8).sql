-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 05:21 PM
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
  `paid_id` varchar(30) NOT NULL,
  `paid_dt` date NOT NULL,
  `soc_id` int(10) NOT NULL,
  `sale_invoice_no` varchar(20) NOT NULL,
  `sale_invoice_dt` datetime NOT NULL,
  `ro_no` varchar(20) NOT NULL,
  `pay_type` varchar(10) NOT NULL,
  `ref_no` varchar(20) DEFAULT NULL,
  `ref_dt` date NOT NULL,
  `bnk_id` int(5) NOT NULL,
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

INSERT INTO `tdf_payment_recv` (`sl_no`, `paid_id`, `paid_dt`, `soc_id`, `sale_invoice_no`, `sale_invoice_dt`, `ro_no`, `pay_type`, `ref_no`, `ref_dt`, `bnk_id`, `tot_recvble_amt`, `adj_dr_note_amt`, `adj_adv_amt`, `net_recvble_amt`, `paid_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `branch_id`, `fin_yr`, `remarks`, `approval_status`) VALUES
(6, 'RCPT//2020-21/6', '2020-08-19', 2, 'INV/N24/20-21/2', '2020-08-18 00:00:00', 'RO-558', '5', '', '0000-00-00', 0, '409657.50', '0.00', '0.00', '407357.50', '500.00', 'synergic', '2020-08-20 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U'),
(1, 'RCPT/HOG/2020-21/1', '2020-08-18', 3, 'INV/HOG/20-21/1', '2020-08-18 00:00:00', 'RO-98', '4', 'kk', '2020-08-18', 0, '418509.00', '70000.00', '0.00', '418509.00', '10000.00', 'synergic', '2020-08-18 00:00:00', '', '0000-00-00 00:00:00', 338, 1, '', 'A'),
(1, 'RCPT/HOG/2020-21/1', '2020-08-18', 3, 'INV/HOG/20-21/1', '2020-08-18 00:00:00', 'RO-98', '5', '', '0000-00-00', 0, '418509.00', '70000.00', '0.00', '418509.00', '2500.00', 'synergic', '2020-08-18 00:00:00', '', '0000-00-00 00:00:00', 338, 1, '', 'A'),
(2, 'RCPT/HOG/2020-21/2', '2020-08-18', 3, 'INV/HOG/20-21/2', '2020-08-18 00:00:00', 'RO-1234', '3', 'sssss', '2020-08-17', 0, '252000.00', '70000.00', '0.00', '252000.00', '15000.00', 'synergic', '2020-08-18 00:00:00', '', '0000-00-00 00:00:00', 338, 1, '', 'A'),
(3, 'RCPT/HOG/2020-21/3', '2020-08-06', 3, 'INV/HOG/20-21/1', '2020-08-18 00:00:00', 'RO-98', '5', '', '0000-00-00', 0, '418509.00', '70000.00', '0.00', '406009.00', '200.00', 'synergic', '2020-08-19 00:00:00', '', '0000-00-00 00:00:00', 338, 1, '', 'U'),
(5, 'RCPT/N24//2020-21/5', '2020-08-20', 1, 'INV/N24/20-21/1', '2020-08-18 00:00:00', 'RO-1234', '4', '', '0000-00-00', 0, '84000.00', '0.00', '-90000.00', '76800.00', '200.00', 'synergic', '2020-08-20 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U'),
(3, 'RCPT/N24/2020-21/', '2020-08-12', 1, 'INV/N24/20-21/1', '2020-08-18 00:00:00', 'RO-1234', '3', '', '0000-00-00', 0, '84000.00', '0.00', '-90000.00', '79000.00', '2000.00', 'synergic', '2020-08-19 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U'),
(1, 'RCPT/N24/2020-21/1', '2020-08-18', 2, 'INV/N24/20-21/2', '2020-08-18 00:00:00', 'RO-558', '3', 'sssss', '2020-08-17', 0, '409657.50', '0.00', '0.00', '409657.50', '2000.00', 'synergic', '2020-08-18 00:00:00', '', '0000-00-00 00:00:00', 337, 1, 'hhh', 'A'),
(1, 'RCPT/N24/2020-21/1', '2020-08-18', 2, 'INV/N24/20-21/2', '2020-08-18 00:00:00', 'RO-558', '4', 'kk', '2020-08-12', 0, '409657.50', '0.00', '0.00', '409657.50', '300.00', 'synergic', '2020-08-18 00:00:00', '', '0000-00-00 00:00:00', 337, 1, 'hhh', 'A'),
(2, 'RCPT/N24/2020-21/2', '2020-08-18', 1, 'INV/N24/20-21/1', '2020-08-18 00:00:00', 'RO-1234', '5', '', '0000-00-00', 0, '84000.00', '0.00', '-90000.00', '84000.00', '5000.00', 'synergic', '2020-08-18 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'A'),
(4, 'RCPT/N24/Array/2020-', '0000-00-00', 1, 'INV/N24/20-21/1', '2020-08-18 00:00:00', 'RO-1234', '4', '', '0000-00-00', 0, '84000.00', '0.00', '-90000.00', '77000.00', '200.00', 'synergic', '2020-08-20 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U'),
(10, 'RCPT/N24/IFFCO/09/2020-21/10', '2020-08-31', 1, 'INV/N24/IFFCO/08/20-', '2020-08-20 00:00:00', 'RO-1234', '3', 'sssss', '2020-08-31', 2, '8400.00', '6500.00', '-90000.00', '8400.00', '1000.00', 'synergic', '2020-09-02 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U'),
(9, 'RCPT/N24/IFFCO/09/2020-21/9', '2020-09-02', 1, 'INV/N24/IFFCO/08/20-', '2020-08-21 00:00:00', 'Ro-989', '3', '5677', '2020-08-31', 1, '1260.00', '6500.00', '-90000.00', '1260.00', '200.00', 'synergic', '2020-09-02 00:00:00', '', '0000-00-00 00:00:00', 337, 1, 'test', 'U'),
(9, 'RCPT/N24/IFFCO/09/2020-21/9', '2020-09-02', 1, 'INV/N24/IFFCO/08/20-', '2020-08-21 00:00:00', 'Ro-989', '4', '6y7888', '2020-09-02', 1, '1260.00', '6500.00', '-90000.00', '1260.00', '300.00', 'synergic', '2020-09-02 00:00:00', '', '0000-00-00 00:00:00', 337, 1, 'test', 'U'),
(8, 'RCPT/N24/KRIBHCO/08/2020-21/8', '2020-08-20', 2, 'INV/N24/20-21/2', '2020-08-18 00:00:00', 'RO-558', '5', '', '0000-00-00', 0, '409657.50', '0.00', '0.00', '406557.50', '300.00', 'synergic', '2020-08-20 00:00:00', '', '0000-00-00 00:00:00', 337, 1, '', 'U');

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
