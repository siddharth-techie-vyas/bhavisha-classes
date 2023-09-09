-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2023 at 05:56 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u610044665_bhavishaclasse`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `amt_type` text NOT NULL,
  `amt` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `syear` int(3) NOT NULL,
  `branchid` int(3) NOT NULL,
  `transaction_type` int(3) NOT NULL,
  `debit_credit` int(3) NOT NULL,
  `account_type` int(3) NOT NULL,
  `upi` int(11) NOT NULL DEFAULT 0,
  `tra_id` text NOT NULL,
  `chaque_nu` text NOT NULL,
  `sign_auth` text NOT NULL,
  `chaque_date` text NOT NULL,
  `status` text NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `stu_id`, `emp_id`, `amt_type`, `amt`, `date_time`, `syear`, `branchid`, `transaction_type`, `debit_credit`, `account_type`, `upi`, `tra_id`, `chaque_nu`, `sign_auth`, `chaque_date`, `status`, `approval`) VALUES
(1, 3, 0, '', 25000, '2022-11-09 14:58:38', 2, 2, 1, 1, 1, 0, '', '', '', '', '1', 0),
(2, 4, 0, '', 8000, '2022-11-09 15:00:03', 2, 2, 1, 1, 2, 0, '', '015239', 'Madhav ', '2022-11-10', '1', 0),
(3, 5, 0, '', 4000, '2022-11-09 15:01:21', 2, 2, 1, 1, 8, 0, 'aayushiarora45@gmail.com', '', '', '', '1', 0),
(4, 6, 0, '', 22000, '2022-11-09 15:02:56', 2, 2, 1, 1, 1, 0, '', '', '', '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_transaction`
--

CREATE TABLE `accounts_transaction` (
  `id` int(11) NOT NULL,
  `tra_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `debit_credit` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `balance` float NOT NULL,
  `date_time` datetime NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_master_bank_ac`
--

CREATE TABLE `acc_master_bank_ac` (
  `id` int(11) NOT NULL,
  `acc_name` text NOT NULL,
  `bank_name` text NOT NULL,
  `ifsc` text NOT NULL,
  `acc_nu` text NOT NULL,
  `opening_balance` float NOT NULL,
  `opening_balance_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `acc_type` text NOT NULL,
  `upi` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_master_bank_ac`
--

INSERT INTO `acc_master_bank_ac` (`id`, `acc_name`, `bank_name`, `ifsc`, `acc_nu`, `opening_balance`, `opening_balance_datetime`, `acc_type`, `upi`, `status`) VALUES
(1, 'Cash', '', '', '', 53210.4, '2022-10-20 11:26:25', 'cash', '', 'enabled'),
(2, 'Bhavisha Institute USFB', 'Utkarsh Small Finance Bank', 'UTKS0001564', '15640011086', 65482.1, '2022-10-20 11:26:25', 'current', '', 'enabled'),
(3, 'Petty Cash', '0', '0', '0', 0, '2022-10-20 11:40:42', 'cash', '0', 'enabled'),
(8, 'Bhavisha Institute For CA', 'HDFC', 'HDFC0031330', '311002258932', 125973000, '2022-10-20 11:56:26', 'current', '925647812@axl', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `acc_master_beneficiery_type`
--

CREATE TABLE `acc_master_beneficiery_type` (
  `id` int(11) NOT NULL,
  `bene_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_master_transaction`
--

CREATE TABLE `acc_master_transaction` (
  `id` int(11) NOT NULL,
  `tra_id` int(11) NOT NULL,
  `amt` float NOT NULL,
  `date_approved` datetime NOT NULL,
  `bankacc` int(11) NOT NULL,
  `balancenow` float NOT NULL,
  `tra_type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_master_transaction_type`
--

CREATE TABLE `acc_master_transaction_type` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `type_name` text NOT NULL,
  `type_transaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_master_transaction_type`
--

INSERT INTO `acc_master_transaction_type` (`id`, `tid`, `type_name`, `type_transaction`) VALUES
(1, 0, 'Fee', 0),
(2, 0, 'Salary', 0),
(3, 0, 'Fixed Assets', 0),
(4, 0, 'Current Assets', 1),
(5, 0, 'Loan', 0),
(6, 0, 'Direct Income', 1),
(7, 0, 'InDirect Income', 1),
(8, 0, 'InDirect Expenses', 2),
(9, 0, 'Direct Expenses', 2),
(10, 0, 'Other Liabilities', 2),
(11, 0, 'Capital Drawing / Personal Expenses', 2),
(12, 8, 'Miscellaneous', 2),
(13, 8, 'Travel ', 2),
(14, 8, 'Car & Other', 2),
(15, 8, 'Broadband', 2),
(16, 4, 'Books', 1),
(17, 4, 'Notes', 1),
(18, 4, 'Bags', 1),
(19, 4, 'T Shirts', 1),
(20, 19, 'Student T - Shirt', 1),
(21, 19, 'Teacher T- Shirt', 1),
(22, 6, 'School Fees', 0),
(23, 3, 'Furniture', 0),
(24, 23, 'Chairs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_pdf`
--

CREATE TABLE `assessment_pdf` (
  `id` int(11) NOT NULL,
  `qids` text NOT NULL,
  `max_marks` int(11) NOT NULL,
  `neg_marks` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `user` text NOT NULL,
  `asid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment_pdf`
--

INSERT INTO `assessment_pdf` (`id`, `qids`, `max_marks`, `neg_marks`, `hours`, `minutes`, `datetime`, `user`, `asid`) VALUES
(1, '34,35,36,37', 0, 0, 0, 0, '2022-01-16 08:34:22', '1', 0),
(2, '', 0, 0, 0, 0, '2022-01-29 03:30:56', '1', 0),
(3, '89,90', 12, 0, 0, 0, '2022-01-29 03:49:39', '1', 0),
(4, '89,90', 12, 0, 0, 0, '2022-01-29 03:50:26', '1', 0),
(5, '89,90', 12, 0, 0, 0, '2022-01-29 03:50:39', '1', 0),
(6, '89,90', 11, 0, 0, 5, '2022-01-29 04:41:59', '1', 0),
(7, '89,90', 11, 0, 1, 1, '2022-01-29 04:42:46', '1', 0),
(8, '89,90', 10, 0, 0, 7, '2022-01-29 04:48:22', '1', 70),
(9, '89,90', 13, 0, 1, 0, '2022-01-29 01:50:05', '1', 69),
(10, '335,334,336,337', 10, 25, 0, 5, '2022-04-16 05:10:53', '1', 101),
(11, '335,334,336,337', 10, 25, 0, 5, '2022-04-16 05:12:13', '1', 101),
(12, '341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359', 19, 25, 0, 19, '2022-05-02 06:10:46', '1', 235),
(13, '366,367,368,369,360,361,362,363,364,365', 10, 25, 0, 0, '2022-05-24 07:21:05', '1', 266),
(14, '360,361,362,363,364,371,372,373,374,376', 12, 25, 0, 0, '2022-06-07 09:26:25', '1', 268),
(15, '376,377,378', 15, 1, 0, 10, '2022-06-07 09:44:26', '1', 269),
(16, '335,334,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,361,362,363,364,376,377,378,336,337', 30, 25, 0, 30, '2022-07-21 01:53:48', '1', 270);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `batch_name` text NOT NULL,
  `course` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_name`, `course`, `session`, `branch`, `start_date`) VALUES
(5, 'CMAF', 202, 2, 2, '2022-05-20'),
(6, 'CAI Gr II - May 23', 267, 2, 2, '2022-05-20'),
(7, 'CMAI', 224, 2, 2, '2022-05-20'),
(8, 'CLASS XII', 210, 2, 2, '2022-07-06'),
(9, 'CLASS XI', 209, 2, 2, '2022-07-06'),
(10, 'CLASS X', 208, 2, 2, '2022-07-06'),
(11, 'CLASS IX', 207, 2, 2, '2022-07-06'),
(12, 'CLASS VIII', 206, 2, 2, '2022-07-06'),
(15, 'CAI Gr I - May 2023', 1591, 2, 2, '2022-10-01'),
(17, 'CMA Gr II - June / Dec 23', 224, 2, 2, '0000-00-00'),
(18, 'CMAI - Gr I - June / Dec 23', 223, 2, 2, '2023-02-01'),
(19, 'CAF May 2023', 63, 2, 2, '2023-01-02'),
(20, 'CMAF M23', 202, 2, 2, '2023-01-02'),
(22, 'CMAI Grp 1 N23', 223, 2, 2, '2023-02-01'),
(23, 'CAI Grp I : Nov 23', 1591, 2, 2, '2023-02-07'),
(24, 'CAI Grp II : Nov 23', 1592, 2, 2, '2023-02-07'),
(25, 'rishabjain', 63, 4, 12, '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_name` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `address`, `contact`) VALUES
(2, 'Main Branch Chopasani Road', 'Behind bhandari hospital chopasani road', '2147483647'),
(11, 'INIFD', 'Dalle khan ki chakki, pal road', '1111111'),
(12, 'Sangariya', 'Sangariya Fanta Circle', '6367932462');

-- --------------------------------------------------------

--
-- Table structure for table `branch_room`
--

CREATE TABLE `branch_room` (
  `id` int(11) NOT NULL,
  `room` text NOT NULL,
  `nu_seats` int(11) NOT NULL,
  `branchid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch_room`
--

INSERT INTO `branch_room` (`id`, `room`, `nu_seats`, `branchid`) VALUES
(13, '1', 16, 2),
(14, '3', 14, 2),
(15, '4', 15, 2),
(16, '1', 12, 11),
(17, '2', 34, 11),
(18, '3', 65, 11),
(19, '4', 54, 11),
(22, '1', 0, 12),
(23, '2', 0, 12),
(24, '3', 0, 12),
(25, '4', 0, 12),
(26, '5', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `id` int(11) NOT NULL,
  `day` text NOT NULL,
  `timing` time NOT NULL,
  `duration` int(11) NOT NULL,
  `teacherid` int(10) NOT NULL,
  `syear` int(11) NOT NULL,
  `branchid` int(10) NOT NULL,
  `batchid` int(11) NOT NULL,
  `courseid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`id`, `day`, `timing`, `duration`, `teacherid`, `syear`, `branchid`, `batchid`, `courseid`, `subjectid`, `start_date`) VALUES
(1, '1,2,3,4,5,6', '16:00:00', 60, 9, 2, 2, 21, 267, 274, '2022-12-01'),
(2, '1,2,3,4,5,6', '08:30:00', 60, 13, 2, 2, 19, 63, 95, '2023-01-02'),
(3, '1,2,3,4,5,6', '09:30:00', 60, 0, 2, 2, 19, 63, 192, '2023-01-02'),
(4, '1,2,3,4,5,6', '10:45:00', 45, 10, 2, 2, 19, 63, 251, '2023-01-02'),
(5, '1,2,3,4,5,6', '12:00:00', 60, 14, 2, 2, 19, 63, 248, '2023-01-02'),
(7, '1,2', '13:00:00', 60, 212, 4, 12, 25, 63, 95, '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `subject` text NOT NULL,
  `chapter` text DEFAULT NULL,
  `topic` text DEFAULT NULL,
  `topic_level` int(11) NOT NULL,
  `content` text NOT NULL,
  `assessment` text NOT NULL,
  `fee` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `subject`, `chapter`, `topic`, `topic_level`, `content`, `assessment`, `fee`, `test`, `sort`) VALUES
(63, 'CA FOUNDATION', '', NULL, NULL, 0, '', '', 0, 0, 1),
(65, '63', '64', 'Measures of Central Tendency', '', 0, '', '', 0, 0, 0),
(66, '63', '64', 'Measures of Dispersion', '', 0, '', '', 0, 0, 0),
(95, '63', 'Economics', NULL, NULL, 0, '', '', 0, 0, 0),
(96, '63', '95', 'Demand', NULL, 0, '', '', 0, 0, 0),
(101, '63', '95', '96', NULL, 0, '', 'demand assessment', 0, 0, 0),
(102, '63', '64', 'correlation', NULL, 0, '', '', 0, 0, 0),
(103, '63', '64', 'Regression', NULL, 0, '', '', 0, 0, 0),
(104, '63', '64', 'Probability', NULL, 0, '', '', 0, 0, 0),
(105, '63', '64', 'Probability distribution', NULL, 0, '', '', 0, 0, 0),
(106, '63', '64', 'Index number', NULL, 0, '', '', 0, 0, 0),
(107, '63', '64', 'Statistical description of data', NULL, 0, '', '', 0, 0, 0),
(108, '63', '64', '65', 'Arithmetic mean in individual series', 1, ' ', '', 0, 0, 0),
(109, '63', '64', '65', 'Arithmetic mean in discrete series', 1, ' ', '', 0, 0, 0),
(110, '63', '64', '65', 'Arithmetic mean in continuous series', 1, ' ', '', 0, 0, 0),
(111, '63', '64', '65', 'Combined arithmetic mean', 1, ' ', '', 0, 0, 0),
(112, '63', '64', '65', 'Arithmetic mean - Miscellaneous', 1, ' ', '', 0, 0, 0),
(113, '63', '64', '65', 'Median in Individual series', 1, ' ', '', 0, 0, 0),
(114, '63', '64', '65', 'Median in discrete series', 1, ' ', '', 0, 0, 0),
(115, '63', '64', '65', 'Median in continuous series', 1, ' ', '', 0, 0, 0),
(116, '63', '64', '65', 'Change of origin and Scale', 1, ' ', '', 0, 0, 0),
(117, '63', '64', '65', 'Quartiles in individual series', 1, ' ', '', 0, 0, 0),
(118, '63', '64', '65', 'Quartiles - Miscellaneous', 1, ' ', '', 0, 0, 0),
(119, '63', '64', '65', 'Positional values', 1, ' ', '', 0, 0, 0),
(120, '63', '64', '65', 'Geometric mean', 1, ' ', '', 0, 0, 0),
(121, '63', '64', '65', 'Harmonic mean', 1, ' ', '', 0, 0, 0),
(122, '63', '64', '65', 'Mode in individual series', 1, ' ', '', 0, 0, 0),
(123, '63', '64', '65', 'Mode in Discrete and continuous series', 1, ' ', '', 0, 0, 0),
(124, '63', '64', '65', 'Relationship between AM, GM, and HM', 1, ' ', '', 0, 0, 0),
(125, '63', '64', '65', 'Relationship between Mean, Median and Mode', 1, ' ', '', 0, 0, 0),
(126, '63', '64', '65', 'MCT - Theoretical Questions', 1, ' ', '', 0, 0, 0),
(127, '63', '64', '65', 'MCT - Miscellaneous', 1, ' ', '', 0, 0, 0),
(128, '63', '64', '66', 'Range', 1, ' ', '', 0, 0, 0),
(129, '63', '64', '66', 'Coefficient of range', 1, ' ', '', 0, 0, 0),
(130, '63', '64', '66', 'Quartile Deviation', 1, ' ', '', 0, 0, 0),
(131, '63', '64', '66', 'Coefficient of quartile deviation', 1, ' ', '', 0, 0, 0),
(132, '63', '64', '66', 'Mean deviation from mean in individual series', 1, ' ', '', 0, 0, 0),
(133, '63', '64', '66', 'Mean deviation from median in individual series', 1, ' ', '', 0, 0, 0),
(134, '63', '64', '66', 'Mean deviation from mode in individual series', 1, ' ', '', 0, 0, 0),
(135, '63', '64', '66', 'Mean deviation in discrete and continuous series', 1, ' ', '', 0, 0, 0),
(136, '63', '64', '66', 'Coefficient of mean deviation', 1, ' ', '', 0, 0, 0),
(137, '63', '64', '66', 'Standard deviation in individual series', 1, ' ', '', 0, 0, 0),
(138, '63', '64', '66', 'Coefficient of variation', 1, ' ', '', 0, 0, 0),
(139, '63', '64', '66', 'Change of origin and scale', 1, ' ', '', 0, 0, 0),
(140, '63', '64', '66', 'Relation between QD, MD & SD', 1, ' ', '', 0, 0, 0),
(141, '63', '64', '66', 'MCT - Theoretical Questions', 1, ' ', '', 0, 0, 0),
(142, '63', '64', '66', 'MCT - Miscellaneous', 1, ' ', '', 0, 0, 0),
(143, '63', '64', '102', 'Introduction to correlation', 1, ' ', '', 0, 0, 0),
(144, '63', '64', '102', 'Bivariate frequency distribution', 1, ' ', '', 0, 0, 0),
(145, '63', '64', '102', 'Karl Pearson\'s moment correlation coefficient', 1, ' ', '', 0, 0, 0),
(146, '63', '64', '102', 'Change of origin and scale', 1, ' ', '', 0, 0, 0),
(147, '63', '64', '102', 'Spearman\'s rank correlation coefficient', 1, ' ', '', 0, 0, 0),
(148, '63', '64', '102', 'Concurrent deviation method', 1, ' ', '', 0, 0, 0),
(149, '63', '64', '102', 'Theoretical questions', 1, ' ', '', 0, 0, 0),
(150, '63', '64', '102', 'Correlation - Miscellaneous', 1, ' ', '', 0, 0, 0),
(151, '63', '64', '103', 'Introduction to regression', 1, ' ', '', 0, 0, 0),
(152, '63', '64', '103', 'Properties of regression', 1, ' ', '', 0, 0, 0),
(153, '63', '64', '103', 'Regression coefficient', 1, ' ', '', 0, 0, 0),
(154, '63', '64', '103', 'To find X or Y', 1, ' ', '', 0, 0, 0),
(155, '63', '64', '103', 'To find equation X on Y and Y on X', 1, ' ', '', 0, 0, 0),
(156, '63', '64', '103', 'Regression - Miscellaneous', 1, ' ', '', 0, 0, 0),
(157, '63', '64', '104', 'Introduction', 1, ' ', '', 0, 0, 0),
(158, '63', '64', '104', 'Two dice', 1, ' ', '', 0, 0, 0),
(159, '63', '64', '104', 'Three dice', 1, ' ', '', 0, 0, 0),
(160, '63', '64', '104', 'Leap and non-leap year', 1, ' ', '', 0, 0, 0),
(161, '63', '64', '104', 'Basic- Miscellaneous', 1, ' ', '', 0, 0, 0),
(162, '63', '64', '104', 'Additional rule', 1, ' ', '', 0, 0, 0),
(163, '63', '64', '104', 'Multiplication rule', 1, ' ', '', 0, 0, 0),
(164, '63', '64', '104', 'Conditional probability', 1, ' ', '', 0, 0, 0),
(165, '63', '64', '104', 'Combination in probability', 1, ' ', '', 0, 0, 0),
(166, '63', '64', '104', 'Probability- Miscellaneous', 1, ' ', '', 0, 0, 0),
(167, '63', '64', '105', 'Introduction', 1, ' ', '', 0, 0, 0),
(168, '63', '64', '105', 'Binomial Distribution- Theory', 1, ' ', '', 0, 0, 0),
(169, '63', '64', '105', 'Binomial Distribution- Practical', 1, ' ', '', 0, 0, 0),
(170, '63', '64', '105', 'Poisson Distribution- Theory', 1, ' ', '', 0, 0, 0),
(171, '63', '64', '105', 'Poisson Distribution- Practical', 1, ' ', '', 0, 0, 0),
(172, '63', '64', '105', 'Normal distribution- Theory', 1, ' ', '', 0, 0, 0),
(173, '63', '64', '105', 'Normal Distribution- Practical', 1, ' ', '', 0, 0, 0),
(174, '63', '64', '105', 'PD - Miscellaneous', 1, ' ', '', 0, 0, 0),
(175, '63', '64', '106', 'Introduction', 1, ' ', '', 0, 0, 0),
(176, '63', '64', '106', 'Simple aggregative method', 1, ' ', '', 0, 0, 0),
(177, '63', '64', '106', 'Simple price relative method', 1, ' ', '', 0, 0, 0),
(178, '63', '64', '106', 'Weighted aggregative method', 1, ' ', '', 0, 0, 0),
(179, '63', '64', '106', 'weighted price relative method', 1, ' ', '', 0, 0, 0),
(180, '63', '64', '106', 'Cost of living index number', 1, ' ', '', 0, 0, 0),
(181, '63', '64', '106', 'Quantity index number', 1, ' ', '', 0, 0, 0),
(182, '63', '64', '106', 'Deflating of index number', 1, ' ', '', 0, 0, 0),
(183, '63', '64', '107', 'Definition of statistics', 1, ' ', '', 0, 0, 0),
(184, '63', '64', '107', 'Variable and attribute', 1, ' ', '', 0, 0, 0),
(185, '63', '64', '107', 'Data and classification of data', 1, ' ', '', 0, 0, 0),
(186, '63', '64', '107', 'Classification and tabulation', 1, ' ', '', 0, 0, 0),
(187, '63', '64', '107', 'Diagramatic Presentation of data', 1, ' ', '', 0, 0, 0),
(188, '63', '95', '96', 'Meaning,determinants', 0, '    NULL', '', 0, 0, 0),
(189, '63', '95', '96', 'law of demand', 0, 'NULL', '', 0, 0, 0),
(190, '63', '95', '96', 'Movement and shift of demand', 0, 'NULL', '', 0, 0, 0),
(191, '63', '95', '96', 'Demand forecasting', 0, 'NULL', '', 0, 0, 0),
(192, '63', 'Maths', NULL, NULL, 0, '', '', 0, 0, 0),
(194, '63', '192', 'Time value of money', NULL, 0, '', '', 0, 0, 0),
(196, '63', '192', '194', 'simple interest', 0, 'NULL', '', 0, 0, 0),
(198, '63', '95', '96', NULL, 0, '', '', 0, 0, 0),
(202, 'CMA FOUNDATION', '', NULL, NULL, 0, '', '', 0, 0, 15),
(204, 'CS-EET', '', NULL, NULL, 0, '', '', 0, 0, 14),
(205, 'CS EXECUTIVE', '', NULL, NULL, 0, '', '', 0, 0, 13),
(206, 'VIII CLASS', '', NULL, NULL, 0, '', '', 0, 0, 12),
(207, 'IX CLASS', '', NULL, NULL, 0, '', '', 0, 0, 11),
(208, 'X CLASS', '', NULL, NULL, 0, '', '', 0, 0, 10),
(209, 'XI CLASS', '', NULL, NULL, 0, '', '', 0, 0, 9),
(210, 'XII CLASS', '', NULL, NULL, 0, '', '', 0, 0, 8),
(211, 'B.COM PART - I', '', NULL, NULL, 0, '', '', 0, 0, 7),
(212, 'B.COM PART - II', '', NULL, NULL, 0, '', '', 0, 0, 16),
(213, 'B.COM PART - III', '', NULL, NULL, 0, '', '', 0, 0, 6),
(223, 'CMA INTERMEDIATE Grp I -duplicate', '', '', '', 0, '', '', 0, 0, 5),
(224, 'CMA INTERMEDIATE Grp II', '', NULL, NULL, 0, '', '', 0, 0, 4),
(232, '63', '64', '65', NULL, 0, '', '', 0, 0, 0),
(233, '63', '64', '65', NULL, 0, '', 'measures of central tendency', 0, 0, 0),
(234, '63', '95', '96', NULL, 0, '', 'demand assessment', 0, 0, 0),
(235, '63', '192', '194', NULL, 0, '', 'time value of money assessment', 0, 0, 0),
(239, '208', 'Maths', NULL, NULL, 0, '', '', 11000, 0, 0),
(240, '208', 'Science', NULL, NULL, 0, '', '', 11000, 0, 0),
(248, '63', 'Accounts', NULL, NULL, 0, '', '', 0, 0, 0),
(249, '63', 'BCR', NULL, NULL, 0, '', '', 0, 0, 0),
(250, '63', 'BCK', NULL, NULL, 0, '', '', 0, 0, 0),
(251, '63', 'Business Law', NULL, NULL, 0, '', '', 0, 0, 0),
(252, '63', '192', 'Ratio and Proportion', NULL, 0, '', '', 0, 0, 0),
(253, '63', '192', 'Law of Indices', NULL, 0, '', '', 0, 0, 0),
(254, '63', '192', 'Logarithm', NULL, 0, '', '', 0, 0, 0),
(255, '63', '192', '252', 'Basic - Ratio and Proportion', 0, 'NULL', '', 0, 0, 0),
(256, '63', '192', '252', 'Properties of Ratio and Proportion', 0, 'NULL', '', 0, 0, 0),
(257, '63', '192', '252', NULL, 0, '', '', 0, 0, 0),
(258, '207', 'Maths', NULL, NULL, 0, '', '', 11000, 0, 1),
(259, '207', 'Science', NULL, NULL, 0, '', '', 11000, 0, 1),
(262, '207', 'Social Studies', NULL, NULL, 0, '', '', 9000, 0, 1),
(263, '63', '192', 'Quadratic Equation', NULL, 0, '', '', 0, 0, 0),
(264, '63', '192', 'Linear Equations', NULL, 0, '', '', 0, 0, 0),
(266, '63', '192', '252', NULL, 0, '', 'TEST R & P 24.5.22', 0, 1, 0),
(268, '63', '192', '252', NULL, 0, '', 'test 7.6.22', 0, 1, 0),
(269, '63', '192', '252', NULL, 0, '', 'trial 7.6.22', 0, 1, 0),
(274, '1592', 'CAI Grp II : ADV. ACCOUNTS', '', '', 0, '', '', 10000, 0, 1),
(275, '1592', 'CAI Grp II : AUDIT', '', '', 0, '', '', 5000, 0, 2),
(276, '1592', 'CAI Grp II : EIS / SM', '', '', 0, '', '', 7500, 0, 0),
(282, '224', 'COSTING', NULL, NULL, 0, '', '', 10000, 0, 0),
(283, '224', 'OMSM', NULL, NULL, 0, '', '', 10000, 0, 0),
(284, '224', 'IDT', NULL, NULL, 0, '', '', 10000, 0, 0),
(285, '224', 'AUDIT', NULL, NULL, 0, '', '', 10000, 0, 0),
(286, '224', 'CO. ACCOUNTS', NULL, NULL, 0, '', '', 10000, 0, 0),
(287, '210', 'ACCOUNTS', NULL, NULL, 0, '', '', 14000, 0, 0),
(288, '210', 'ECONOMICS', NULL, NULL, 0, '', '', 13000, 0, 0),
(289, '210', 'ENGLISH', NULL, NULL, 0, '', '', 10000, 0, 0),
(290, '210', 'BST', NULL, NULL, 0, '', '', 9000, 0, 0),
(291, '210', 'IP / CS', NULL, NULL, 0, '', '', 10000, 0, 0),
(292, '209', 'BST', NULL, NULL, 0, '', '', 10000, 0, 0),
(293, '209', 'MATHS', NULL, NULL, 0, '', '', 10000, 0, 0),
(294, '209', 'ACCOUNTS', NULL, NULL, 0, '', '', 10000, 0, 0),
(295, '209', 'ECONOMICS', NULL, NULL, 0, '', '', 10000, 0, 0),
(297, '207', 'ENGLISH', NULL, NULL, 0, '', '', 10000, 0, 0),
(298, '206', 'ENGLISH', NULL, NULL, 0, '', '', 10000, 0, 0),
(299, '206', 'SST', NULL, NULL, 0, '', '', 10000, 0, 0),
(300, '206', 'SCIENCE', NULL, NULL, 0, '', '', 10000, 0, 0),
(301, '206', 'MATHS', NULL, NULL, 0, '', '', 10000, 0, 0),
(302, '202', 'Stats / Maths', NULL, NULL, 0, '', '', 10000, 0, 0),
(303, '202', 'Eco & mgmt.', NULL, NULL, 0, '', '', 10000, 0, 0),
(304, '202', 'Accounts', NULL, NULL, 0, '', '', 10000, 0, 0),
(305, '202', 'Law', NULL, NULL, 0, '', '', 10000, 0, 0),
(307, '209', 'English', NULL, NULL, 0, '', '', 10000, 0, 0),
(308, '1591', 'CAI Grp I : Accounts', '', '', 0, '', '', 9000, 0, 0),
(309, '1591', 'CAI Grp I : Direct tax', '', '', 0, '', '', 7000, 0, 0),
(310, '1591', 'CAI Grp I : Indirect tax', '', '', 0, '', '', 6000, 0, 0),
(311, '1591', 'CAI Grp I : Cost ', '', '', 0, '', '', 8000, 0, 0),
(312, '1591', 'CAI Grp I : Corporate Law', '', '', 0, '', '', 5000, 0, 0),
(317, '1592', 'CAI Grp II : ECONOMICS', '', '', 0, '', '', 4500, 0, 0),
(325, '213', 'Mgmt. Accounting and GST', NULL, NULL, 0, '', '', 4000, 0, 0),
(326, '213', 'Income Tax', NULL, NULL, 0, '', '', 4000, 0, 0),
(327, '213', 'Financial Management', NULL, NULL, 0, '', '', 4000, 0, 0),
(328, '211', 'Financial Accounting', NULL, NULL, 0, '', '', 4000, 0, 0),
(329, '211', 'Cost Accountancy', NULL, NULL, 0, '', '', 4000, 0, 0),
(330, '205', 'Tax Law', NULL, NULL, 0, '', '', 10000, 0, 0),
(331, '205', 'Corporate and Management Accounting ', NULL, NULL, 0, '', '', 10000, 0, 0),
(332, '205', 'Securities Laws and Capital Market', NULL, NULL, 0, '', '', 0, 0, 0),
(333, '205', 'Economic, Business and commercial laws', NULL, NULL, 0, '', '', 10000, 0, 0),
(334, '210', '287', 'Cash Flow Statement', NULL, 0, '', '', 0, 0, 0),
(335, '210', '287', 'Fundamental of Partnership', NULL, 0, '', '', 0, 0, 0),
(336, '210', '287', 'Valuation of Goodwill', NULL, 0, '', '', 0, 0, 0),
(337, '210', '287', '336', 'Simple Average Profit Method', 0, 'NULL', '', 0, 0, 0),
(338, '210', '287', '336', 'Weighted Average Profit Method', 0, 'NULL', '', 0, 0, 0),
(339, '210', '287', '336', 'Super Profit Method', 0, 'NULL', '', 0, 0, 0),
(340, '210', '287', '336', 'Capitalisation of Normal Profit Method ', 0, 'NULL', '', 0, 0, 0),
(341, '210', '287', '336', 'Capitalisation of Super Profit', 0, 'NULL', '', 0, 0, 0),
(345, '267', '274', 'Amalgamation of Companies', NULL, 0, '', '', 0, 0, 0),
(346, '1592', '274', '345', 'Purchase Consideration Calculation', 0, ' NULL', '', 0, 0, 0),
(347, '1592', '274', '345', 'Close of Vendor Company books', 0, ' NULL', '', 0, 0, 0),
(348, '1592', '274', '345', 'Purchasing Company - Amalgamation in the nature of Purchase', 0, ' NULL', '', 0, 0, 0),
(349, '1592', '274', '345', 'Purchasing Company - Amalgamation in the nature of Merger', 0, ' NULL', '', 0, 0, 0),
(350, '224', '284', 'Custom Rules', NULL, 0, '', '', 0, 0, 0),
(351, '224', '284', 'Array', 'Import at Concessional Rate', 0, 'NULL', '', 0, 0, 0),
(352, '218', '312', 'Preliminary of Companies', NULL, 0, '', '', 0, 0, 0),
(353, '218', '312', 'Prospectus Of Companies', NULL, 0, '', '', 0, 0, 0),
(363, '1591', '312', '353', 'Basics of prospectus', 0, '  NULL', '', 0, 0, 0),
(364, '1591', '312', '353', 'Shelf Prospectus , Red Herring Prospectus', 0, '   NULL', '', 0, 0, 0),
(365, '1591', '312', '353', 'Definations related to Prospectus', 0, ' NULL', '', 0, 0, 0),
(366, '218', '312', '352', NULL, 0, '', 'Assessment 007', 0, 1, 0),
(367, '208', '239', 'Triangles', NULL, 0, '', '', 0, 0, 0),
(368, '208', '239', '367', 'Basic Proportionality Theorem', 0, 'NULL', '', 0, 0, 0),
(369, '208', '239', '367', 'Converse of Basic Proportionality Theorem', 0, 'NULL', '', 0, 0, 0),
(370, '208', '239', '367', '', 0, 'NULL', '', 0, 0, 0),
(371, '208', '239', 'Array', 'Basic proportionality Theorem', 0, 'NULL', '', 0, 0, 0),
(372, '63', '192', 'Linear Inequality ', NULL, 0, '', '', 0, 0, 0),
(373, '63', '192', 'Permutation & Combination ', NULL, 0, '', '', 0, 0, 0),
(374, '63', '192', 'Sets, Relation & Function ', NULL, 0, '', '', 0, 0, 0),
(375, '63', '192', 'Differentiation', NULL, 0, '', '', 0, 0, 0),
(376, '63', '192', 'Integration ', NULL, 0, '', '', 0, 0, 0),
(377, '63', 'Logical Reasoning ', NULL, NULL, 0, '', '', 0, 0, 0),
(378, '63', '377', 'Number series, Coding Decoding', NULL, 0, '', '', 0, 0, 0),
(379, '63', '377', 'Direction Test', NULL, 0, '', '', 0, 0, 0),
(380, '63', '377', 'Seating Arrangement ', NULL, 0, '', '', 0, 0, 0),
(381, '63', '377', 'Blood Relation', NULL, 0, '', '', 0, 0, 0),
(382, '218', '309', 'Residential Status', NULL, 0, '', '', 0, 0, 0),
(383, '218', '309', 'Basic Concept', NULL, 0, '', '', 0, 0, 0),
(384, '218', '309', 'Income which do not form part of Total Income', '', 0, '', '', 0, 0, 0),
(385, '218', '309', 'Income from Salary', NULL, 0, '', '', 0, 0, 0),
(386, '218', '309', 'Income from House Property', NULL, 0, '', '', 0, 0, 0),
(387, '218', '309', 'Income from PGBP', NULL, 0, '', '', 0, 0, 0),
(388, '218', '309', 'Income from Capital Gain', NULL, 0, '', '', 0, 0, 0),
(389, '218', '309', 'Income from Other Sources', NULL, 0, '', '', 0, 0, 0),
(390, '218', '309', 'Clubbing of Income', NULL, 0, '', '', 0, 0, 0),
(391, '218', '309', 'Set off and Carry Forward of Losses', NULL, 0, '', '', 0, 0, 0),
(392, '218', '309', 'Deduction from Total Income', NULL, 0, '', '', 0, 0, 0),
(393, '218', '309', 'Computation of Total Income & Tax Payable', NULL, 0, '', '', 0, 0, 0),
(394, '218', '309', 'Advance  Tax', NULL, 0, '', '', 0, 0, 0),
(395, '218', '309', 'TDS & TCS', NULL, 0, '', '', 0, 0, 0),
(396, '218', '309', 'Return Filing', NULL, 0, '', '', 0, 0, 0),
(398, '236', '', NULL, NULL, 0, '', '', 0, 0, 0),
(399, '216', '', NULL, NULL, 0, '', '', 0, 0, 0),
(400, '63', '192', 'AP', NULL, 0, '', '', 0, 0, 0),
(401, '63', '192', 'GP', NULL, 0, '', '', 0, 0, 0),
(402, '63', '192', 'Sets, Relation and Functions ', NULL, 0, '', '', 0, 0, 0),
(403, '63', 'Statistics ', NULL, NULL, 0, '', '', 0, 0, 0),
(404, '63', '403', 'Statistical Description of Data ', NULL, 0, '', '', 0, 0, 0),
(405, '63', '403', 'Measures of Central Tendency ', NULL, 0, '', '', 0, 0, 0),
(406, '63', '403', 'Measures of Dispersion', NULL, 0, '', '', 0, 0, 0),
(407, '63', '403', 'Correlation ', NULL, 0, '', '', 0, 0, 0),
(408, '63', '403', 'Regression ', NULL, 0, '', '', 0, 0, 0),
(409, '63', '403', 'Probability ', NULL, 0, '', '', 0, 0, 0),
(410, '63', '403', 'Probability distribution ', NULL, 0, '', '', 0, 0, 0),
(411, '63', '403', 'Index Number', NULL, 0, '', '', 0, 0, 0),
(412, '1591', '312', '353', 'Sec 39 and Sec 42 Public offer and private placement', 0, ' NULL', '', 0, 0, 0),
(413, '1591', '312', '353', 'Liablities for prospectus Sec 34,35,36,37', 0, ' NULL', '', 0, 0, 0),
(415, '218', '312', 'Incorporation of companies', NULL, 0, '', '', 0, 0, 0),
(417, '211', '328', 'Royalty Account', NULL, 0, '', '', 0, 0, 0),
(418, '211', '328', '417', 'Short Working Calculation', 0, 'NULL', '', 0, 0, 0),
(419, '211', '328', '417', 'Short Working Calculation', 0, 'NULL', '', 0, 0, 0),
(420, '211', '328', '417', NULL, 0, '', 'Dummy', 0, 1, 0),
(421, '202', '302', 'Ratio and Proportion', NULL, 0, '', '', 0, 0, 0),
(422, '202', '302', 'Law of Indices', NULL, 0, '', '', 0, 0, 0),
(423, '202', '302', 'Logarithm', NULL, 0, '', '', 0, 0, 0),
(424, '202', '302', 'Equations', NULL, 0, '', '', 0, 0, 0),
(425, '202', '302', 'Simple & Compound Interest', NULL, 0, '', '', 0, 0, 0),
(426, '202', '302', 'Sets', NULL, 0, '', '', 0, 0, 0),
(427, '202', '302', 'AP and GP', NULL, 0, '', '', 0, 0, 0),
(428, '202', '302', 'Permutation & Combination', NULL, 0, '', '', 0, 0, 0),
(429, '202', '302', 'Measures of Central Tendency', NULL, 0, '', '', 0, 0, 0),
(430, '202', '302', 'Measures of Dispersion', NULL, 0, '', '', 0, 0, 0),
(431, '202', '302', 'Correlation', NULL, 0, '', '', 0, 0, 0),
(432, '202', '302', 'Regression', NULL, 0, '', '', 0, 0, 0),
(433, '202', '302', 'Probability', NULL, 0, '', '', 0, 0, 0),
(434, '202', '302', 'Statistical Representation of Data', NULL, 0, '', '', 0, 0, 0),
(435, '210', 'Applied Maths', NULL, NULL, 0, '', '', 0, 0, 0),
(436, '210', '435', 'Numbers, Quantification & Applications', NULL, 0, '', '', 0, 0, 0),
(437, '210', '435', 'Numerical Inequalities', NULL, 0, '', '', 0, 0, 0),
(438, '210', '435', 'Matrices', NULL, 0, '', '', 0, 0, 0),
(439, '210', '435', 'Determinants', NULL, 0, '', '', 0, 0, 0),
(440, '210', '435', 'Differentiation', NULL, 0, '', '', 0, 0, 0),
(441, '210', '435', 'Application of Derivatives', NULL, 0, '', '', 0, 0, 0),
(442, '210', '435', 'Integration', NULL, 0, '', '', 0, 0, 0),
(443, '210', '435', 'Differential Equations', NULL, 0, '', '', 0, 0, 0),
(444, '210', '435', 'Probability Distribution', NULL, 0, '', '', 0, 0, 0),
(445, '210', '435', 'Inferential Statistics', NULL, 0, '', '', 0, 0, 0),
(446, '210', '435', 'Time based Data', NULL, 0, '', '', 0, 0, 0),
(447, '210', '435', 'Perpetuity, Sinking Fund, EMI', NULL, 0, '', '', 0, 0, 0),
(448, '210', '435', 'Returns, Growth & Depreciation', NULL, 0, '', '', 0, 0, 0),
(449, '210', '435', 'Linear Programming', NULL, 0, '', '', 0, 0, 0),
(450, '209', 'Applied Maths', NULL, NULL, 0, '', '', 0, 0, 0),
(451, '209', '450', 'Binary Numbers', NULL, 0, '', '', 0, 0, 0),
(452, '209', '450', 'Indices, Logarithm', NULL, 0, '', '', 0, 0, 0),
(453, '209', '450', 'Average, Clock & Calendar Numerical Application', NULL, 0, '', '', 0, 0, 0),
(454, '209', '450', 'Sets, Relations', NULL, 0, '', '', 0, 0, 0),
(455, '209', '450', 'Sequence & Series (AP, GP)', NULL, 0, '', '', 0, 0, 0),
(456, '209', '450', 'Permutation & Combination', NULL, 0, '', '', 0, 0, 0),
(457, '209', '450', 'Functions', NULL, 0, '', '', 0, 0, 0),
(458, '209', '450', 'Limits & Continuity', NULL, 0, '', '', 0, 0, 0),
(459, '209', '450', 'Differentiation', NULL, 0, '', '', 0, 0, 0),
(460, '209', '450', 'Probability', NULL, 0, '', '', 0, 0, 0),
(461, '209', '450', 'Descriptive Statistics', NULL, 0, '', '', 0, 0, 0),
(462, '209', '450', 'Compound Interest & Annuity', '', 0, '', '', 0, 0, 0),
(463, '209', '450', 'Straight Lines', NULL, 0, '', '', 0, 0, 0),
(464, '1591', '312', '353', 'Sec 23 Types of issues', 0, '  NULL', '', 0, 0, 0),
(465, '209', '450', 'Circle and Parabola', NULL, 0, '', '', 0, 0, 0),
(466, '211', '328', 'Royalty', NULL, 0, '', '', 0, 0, 0),
(467, '211', '328', 'Insurance Claim', NULL, 0, '', '', 0, 0, 0),
(468, '211', '328', 'Array', 'loss of stock', 2, 'NULL', '', 0, 0, 0),
(469, '208', '239', 'Real Number', NULL, 0, '', '', 0, 0, 0),
(470, '208', '239', 'Polynomials', NULL, 0, '', '', 0, 0, 0),
(471, '208', '239', 'Linear Equation ', NULL, 0, '', '', 0, 0, 0),
(472, '208', '239', 'Quadratic Equation ', NULL, 0, '', '', 0, 0, 0),
(473, '208', '239', 'Arithmetic Progression ', NULL, 0, '', '', 0, 0, 0),
(474, '208', '239', 'Triangels', NULL, 0, '', '', 0, 0, 0),
(475, '208', '239', 'Circles', NULL, 0, '', '', 0, 0, 0),
(476, '208', '239', 'Trigonometry ', NULL, 0, '', '', 0, 0, 0),
(477, '208', '239', 'Heights & Distances', NULL, 0, '', '', 0, 0, 0),
(478, '208', '239', 'Area related to circle', NULL, 0, '', '', 0, 0, 0),
(479, '208', '239', 'Surface Area and Volume ', NULL, 0, '', '', 0, 0, 0),
(480, '208', '239', 'Statistics ', NULL, 0, '', '', 0, 0, 0),
(481, '208', '239', 'Probability ', NULL, 0, '', '', 0, 0, 0),
(482, '207', '258', 'Real Numbers ', NULL, 0, '', '', 0, 0, 0),
(483, '207', '258', 'Polynomials ', NULL, 0, '', '', 0, 0, 0),
(484, '207', '258', 'Linear Equations ', NULL, 0, '', '', 0, 0, 0),
(485, '207', '258', 'Coordinate Geometry ', NULL, 0, '', '', 0, 0, 0),
(486, '207', '258', 'Introduction to Geometry ', NULL, 0, '', '', 0, 0, 0),
(487, '207', '258', 'Lines and Angles', NULL, 0, '', '', 0, 0, 0),
(488, '207', '258', 'Triangles', NULL, 0, '', '', 0, 0, 0),
(489, '207', '258', 'Quadrilaterals ', NULL, 0, '', '', 0, 0, 0),
(490, '207', '258', 'Area of Triangle - Herons formula', NULL, 0, '', '', 0, 0, 0),
(491, '207', '258', 'Surface Area & Volume', NULL, 0, '', '', 0, 0, 0),
(492, '207', '258', 'Statistics ', NULL, 0, '', '', 0, 0, 0),
(493, '207', '258', 'Probability ', NULL, 0, '', '', 0, 0, 0),
(494, '210', '289', 'The Last Lesson', NULL, 0, '', '', 0, 0, 0),
(495, '209', '307', 'The portrait of a lady', NULL, 0, '', '', 0, 0, 0),
(496, '63', '192', '252', '1. Basic of Ratios', 0, 'NULL', '', 0, 0, 0),
(497, '63', '192', '252', '2. Properties of Ratios', 0, 'NULL', '', 0, 0, 0),
(498, '63', '192', '252', '3. Word Problems of Ratios & Proportion', 0, 'NULL', '', 0, 0, 0),
(499, '63', '192', '252', '4. Basic of Proportion', 0, 'NULL', '', 0, 0, 0),
(500, '63', '192', '252', '5. Properties of Proportion', 0, 'NULL', '', 0, 0, 0),
(501, '63', '192', '253', '1. Basic Indices', 0, 'NULL', '', 0, 0, 0),
(502, '63', '192', '253', '2. Complex Questions of Indices', 0, 'NULL', '', 0, 0, 0),
(503, '218', '311', 'Material Costing', NULL, 0, '', '', 0, 0, 0),
(504, '218', '311', 'Marginal Costing', NULL, 0, '', '', 0, 0, 0),
(505, '1591', '311', '503', '1. Economic order quantity (EOQ)', 0, '  NULL', '', 0, 0, 0),
(506, '1591', '311', '503', '2. Material Levels', 0, ' NULL', '', 0, 0, 0),
(507, '1591', '311', '503', '3. Stock Out', 0, ' NULL', '', 0, 0, 0),
(508, '1591', '311', '503', '4. Valuation Of Inventory - FIFO', 0, ' NULL', '', 0, 0, 0),
(509, '1591', '311', '503', '5. Valuation Of Inventory - LIFO', 0, ' NULL', '', 0, 0, 0),
(510, '1591', '311', '503', '6. Valuation Of Inventory - Simple Average', 0, ' NULL', '', 0, 0, 0),
(511, '1591', '311', '503', '7. Valuation Of Inventory - Weighted Average', 0, ' NULL', '', 0, 0, 0),
(512, '1591', '311', '503', '8. MICS. QUESTION', 0, ' NULL', '', 0, 0, 0),
(513, '213', '325', 'Financial statement', NULL, 0, '', '', 0, 0, 0),
(514, '213', '325', 'Array', 'Comparative ', 0, 'NULL', '', 0, 0, 0),
(515, '213', '325', 'Array', 'Comparative ', 0, 'NULL', '', 0, 0, 0),
(516, '213', '325', '513', 'Comparative statement', 0, 'NULL', '', 0, 0, 0),
(517, '213', '325', '513', 'common size statement', 0, 'NULL', '', 0, 0, 0),
(518, '213', '325', '513', 'Trend analysis ', 0, 'NULL', '', 0, 0, 0),
(519, '213', '325', '513', 'Comparative statement', 0, 'NULL', '', 0, 0, 0),
(520, '213', '325', '513', 'common size statement', 0, 'NULL', '', 0, 0, 0),
(521, '213', '325', '513', 'Trend analysis ', 0, 'NULL', '', 0, 0, 0),
(522, '213', '325', 'Ratio Analysis ', NULL, 0, '', '', 0, 0, 0),
(523, '213', '325', '522', 'Profitability Ratio', 0, 'NULL', '', 0, 0, 0),
(524, '213', '325', '522', 'Activity Ratio', 0, 'NULL', '', 0, 0, 0),
(525, '213', '325', '522', 'Financial Ratio', 0, 'NULL', '', 0, 0, 0),
(526, '213', '325', 'Cash Flow Statement', NULL, 0, '', '', 0, 0, 0),
(527, '213', '325', '526', 'Operating Activity', 0, 'NULL', '', 0, 0, 0),
(528, '213', '325', '526', 'Investing Activity', 0, 'NULL', '', 0, 0, 0),
(529, '213', '325', '526', 'Financial Activity', 0, 'NULL', '', 0, 0, 0),
(530, '213', '325', '526', '', 0, 'NULL', '', 0, 0, 0),
(531, '1591', '312', '353', 'Sec 25 Documents / Demeed Prospectus', 0, ' NULL', '', 0, 0, 0),
(532, '1591', '312', '353', 'Sec 26 Matters to be Stated in prospectus', 0, ' NULL', '', 0, 0, 0),
(533, '1591', '312', '353', 'Sec 27 Variation in Object', 0, ' NULL', '', 0, 0, 0),
(534, '1591', '312', '353', 'Sec 28 Offer for Sale', 0, ' NULL', '', 0, 0, 0),
(535, '1591', '312', '353', 'Sec 29 DMAT', 0, ' NULL', '', 0, 0, 0),
(536, '1591', '312', '353', 'Sec 30 Advertisement', 0, ' NULL', '', 0, 0, 0),
(537, '1591', '312', '353', 'Sec 40 Stock Exchange', 0, ' NULL', '', 0, 0, 0),
(538, '218', '312', 'Share Capital', NULL, 0, '', '', 0, 0, 0),
(539, '218', '312', 'Deposits', NULL, 0, '', '', 0, 0, 0),
(540, '218', '312', 'Charges', NULL, 0, '', '', 0, 0, 0),
(541, '218', '312', 'Management and Administration (Meetings)', NULL, 0, '', '', 0, 0, 0),
(542, '218', '312', 'Dividend Of Companies', NULL, 0, '', '', 0, 0, 0),
(543, '218', '312', 'Accounts Of Companies', NULL, 0, '', '', 0, 0, 0),
(544, '218', '312', 'Audit and Auditors', NULL, 0, '', '', 0, 0, 0),
(545, '211', '328', 'Single Entry System (Incomplete Records)', NULL, 0, '', '', 0, 0, 0),
(546, '211', '328', '545', 'Ascertainment of Buss. Results Under Single Entry System', 0, 'NULL', '', 0, 0, 0),
(547, '211', '328', '545', 'Ascertainment of Profit and Loss By Partnership Firm', 0, 'NULL', '', 0, 0, 0),
(548, '211', '328', '545', 'Preparing Final Account Under Single Entry System', 0, 'NULL', '', 0, 0, 0),
(549, '211', '328', '467', 'Claim Under Insurance of Stock', 0, 'NULL', '', 0, 0, 0),
(550, '211', '328', '467', 'Claim Under Insurance of Consequential Losses', 0, 'NULL', '', 0, 0, 0),
(551, '211', '328', '467', 'Comprehensive Insurance', 0, 'NULL', '', 0, 0, 0),
(552, '211', '328', 'Departmental Accounts', NULL, 0, '', '', 0, 0, 0),
(553, '211', '328', 'Accounting For Joint Venture', '', 0, '', '', 0, 0, 0),
(554, '211', '328', 'Consignment Accounts', NULL, 0, '', '', 0, 0, 0),
(555, '211', '328', 'Accounting For Non profit Organizations', NULL, 0, '', '', 0, 0, 0),
(556, '1591', '312', '540', 'Sec 77 Duty to Register Charges by Co', 0, ' NULL', '', 0, 0, 0),
(557, '1591', '312', '540', 'Sec 78 Application for Registration of charge by Charge holder', 0, ' NULL', '', 0, 0, 0),
(558, '1591', '312', '540', 'Sec 79 Modification of charges', 0, ' NULL', '', 0, 0, 0),
(559, '1591', '312', '540', 'Sec 80 Constructive notice', 0, ' NULL', '', 0, 0, 0),
(560, '1591', '312', '540', 'Sec 82 Company to Report Satisfaction of Charge', 0, ' NULL', '', 0, 0, 0),
(561, '1591', '312', '540', 'Sec 83 Power of Registrar of Co to Make Entries of Satisfaction and Release in Absence', 0, ' NULL', '', 0, 0, 0),
(562, '1591', '312', '540', 'Sec 84 Intimation of Appointment of Receiver or manager', 0, ' NULL', '', 0, 0, 0),
(563, '1591', '312', '540', 'Sec 86 Punishment for Contravention', 0, ' NULL', '', 0, 0, 0),
(564, '1591', '312', '540', 'Sec 87 Rectification by Central Government in Register of Charges and condonation of delay', 0, ' NULL', '', 0, 0, 0),
(565, '1591', '312', '352', 'Basics of Companies', 0, ' NULL', '', 0, 0, 0),
(566, '1591', '312', '352', 'Characterstics of Companies', 0, ' NULL', '', 0, 0, 0),
(567, '1591', '312', '352', 'Case laws', 0, ' NULL', '', 0, 0, 0),
(568, '1591', '312', '352', 'Lifting of Corporate Veil', 0, ' NULL', '', 0, 0, 0),
(569, '1591', '312', '352', 'Kinds of Companies', 0, ' NULL', '', 0, 0, 0),
(570, '1591', '312', '352', 'Basics of Resolutions', 0, ' NULL', '', 0, 0, 0),
(571, '1591', '312', '352', 'Definations ', 0, ' NULL', '', 0, 0, 0),
(572, '1591', '312', '415', 'Section 3 Formation of company', 0, ' NULL', '', 0, 0, 0),
(573, '1591', '312', '415', 'Section 3A Members severally liable in certain cases', 0, ' NULL', '', 0, 0, 0),
(574, '1591', '312', '415', 'Section 4 Memorandum of Association', 0, ' NULL', '', 0, 0, 0),
(575, '1591', '312', '415', 'Section 5 Articles of Association', 0, ' NULL', '', 0, 0, 0),
(576, '1591', '312', '415', 'Section 6 Act to override memorandum, articles, etc.', 0, ' NULL', '', 0, 0, 0),
(577, '1591', '312', '415', 'Section 7 Incorporation of company', 0, ' NULL', '', 0, 0, 0),
(578, '1591', '312', '415', 'Section 8 Formation of companies with charitable objects, etc.', 0, ' NULL', '', 0, 0, 0),
(579, '1591', '312', '415', 'Section 9 Effect of registration', 0, ' NULL', '', 0, 0, 0),
(580, '1591', '312', '415', 'Section 10 Effect of memorandum and articles', 0, ' NULL', '', 0, 0, 0),
(581, '1591', '312', '415', 'Section 10A Commencement of business etc.', 0, ' NULL', '', 0, 0, 0),
(582, '1591', '312', '415', 'Section 12 Registered office of company', 0, ' NULL', '', 0, 0, 0),
(583, '1591', '312', '415', 'Section 13 Alteration of memorandum of association', 0, ' NULL', '', 0, 0, 0),
(584, '1591', '312', '415', 'Section 14 Alteration of articles of association', 0, ' NULL', '', 0, 0, 0),
(585, '1591', '312', '415', 'Section 15 Alteration of memorandum or articles to be noted in every copy', 0, ' NULL', '', 0, 0, 0),
(586, '1591', '312', '415', 'Section 16 Rectification of name of company', 0, ' NULL', '', 0, 0, 0),
(587, '1591', '312', '415', 'Section 17 Copies of memorandum,articles,etc., to be given to members', 0, ' NULL', '', 0, 0, 0),
(588, '1591', '312', '415', 'Section 18 Conversion of companies already registered', 0, ' NULL', '', 0, 0, 0),
(589, '1591', '312', '415', 'Section 19 Subsidiary company not to hold shares in its holding company', 0, ' NULL', '', 0, 0, 0),
(590, '1591', '312', '415', 'Section 20 Service of documents', 0, ' NULL', '', 0, 0, 0),
(591, '1591', '312', '415', 'Section 21 Authentication of documents, proceedings ans contracts', 0, ' NULL', '', 0, 0, 0),
(592, '1591', '312', '415', 'Section 22 Execution of bills of exchange etc.', 0, ' NULL', '', 0, 0, 0),
(593, '211', '328', '554', 'Valuation of Unsold Stock', 0, 'NULL', '', 0, 0, 0),
(594, '211', '328', '554', 'Loss of Good Sent on Consignment', 0, 'NULL', '', 0, 0, 0),
(595, '211', '328', '554', 'When Goods are Consigned at Invoice Price and Accounting', 0, 'NULL', '', 0, 0, 0),
(596, '211', '328', '554', 'Fall in Market Price of Stock', 0, 'NULL', '', 0, 0, 0),
(597, '211', '328', '554', 'Sale of Damaged Goods by Consignee', 0, 'NULL', '', 0, 0, 0),
(598, '211', '328', '554', 'Conversion of Consignment into Joint Venture', 0, 'NULL', '', 0, 0, 0),
(599, '211', '328', '553', 'Separate Set of Books is kept for Joint Venture.', 0, 'NULL', '', 0, 0, 0),
(600, '211', '328', '553', 'No Separate Set of Books is kept -- Each co-venture keeps record his own transaction ', 0, 'NULL', '', 0, 0, 0),
(601, '211', '328', '553', 'Separate Set of Books is kept for Joint Venture.', 0, 'NULL', '', 0, 0, 0),
(602, '211', '328', '553', 'No Separate Set of Books is kept -- Each co-venture keeps record his own transaction ', 0, 'NULL', '', 0, 0, 0),
(603, '211', '328', '553', 'No Separate Set of Books is kept -- Each co-venture keeps record All transaction', 0, 'NULL', '', 0, 0, 0),
(604, '63', '248', 'Consignment Accounting', NULL, 0, '', '', 0, 0, 0),
(605, '211', '328', '555', 'Receipts and Payment Account', 0, 'NULL', '', 0, 0, 0),
(606, '211', '328', '555', 'Income and Expenditure Account', 0, 'NULL', '', 0, 0, 0),
(607, '211', '328', '555', 'Balance Sheet', 0, 'NULL', '', 0, 0, 0),
(608, '211', '328', '555', 'Receipts and Payments Account from Income and Expenditure Account', 0, 'NULL', '', 0, 0, 0),
(609, '211', '328', '555', 'Opening and Closing Balance Sheet from R&P and I&E', 0, 'NULL', '', 0, 0, 0),
(610, '211', '328', '552', 'Prepation of Final Account with Apportionment of Exp.', 0, 'NULL', '', 0, 0, 0),
(611, '211', '328', '552', 'Accounting Stock Reserve or Unrealised Profit', 0, 'NULL', '', 0, 0, 0),
(612, '211', '328', '552', 'Inter Deparment Tranfer', 0, 'NULL', '', 0, 0, 0),
(613, '211', '328', '417', 'Mining Royalty', 0, 'NULL', '', 0, 0, 0),
(614, '211', '328', '417', 'Patent Royalty', 0, 'NULL', '', 0, 0, 0),
(615, '211', '328', '417', 'Copyright Roylty', 0, 'NULL', '', 0, 0, 0),
(616, '211', '328', '417', 'Short Working Recoup and Irrecoup', 0, 'NULL', '', 0, 0, 0),
(617, '211', '328', 'Introduction of Partnership', NULL, 0, '', '', 0, 0, 0),
(618, '211', '328', 'Admission of New Partner', NULL, 0, '', '', 0, 0, 0),
(619, '211', '328', 'Accounting of Retirement and Death of partner', NULL, 0, '', '', 0, 0, 0),
(620, '211', '328', 'Dissolution of the firm', NULL, 0, '', '', 0, 0, 0),
(621, '211', '328', 'Dissolution of the firm Related aspect', NULL, 0, '', '', 0, 0, 0),
(622, '211', '328', '617', 'P&L Appropriation Account', 0, 'NULL', '', 0, 0, 0),
(623, '211', '328', '617', 'Partners Capital Account', 0, 'NULL', '', 0, 0, 0),
(624, '211', '328', '617', 'Interest on Capital, Interest on Drawings', 0, 'NULL', '', 0, 0, 0),
(625, '211', '328', '617', 'Commission and Remuneration', 0, 'NULL', '', 0, 0, 0),
(626, '211', '328', '617', 'Past Adjustment/Adjustment in Closed Books', 0, 'NULL', '', 0, 0, 0),
(627, '211', '328', '617', 'Gaurantee of MInimum Profit to a patner and Gaurantee by New Partner to Firm', 0, 'NULL', '', 0, 0, 0),
(628, '267', '274', 'AS 4 : Contingencies and Event Occurring after the Balance Sheet Date', NULL, 0, '', '', 0, 0, 0),
(629, '267', '274', 'AS 5 : Net Profit or Loss for the Period prior period Item & change in accounting Policies ', '', 0, '', '', 0, 0, 0),
(630, '267', '274', 'AS 7 : Construction Contract', NULL, 0, '', '', 0, 0, 0),
(631, '267', '274', 'AS 9 : Revenue Recognition ', NULL, 0, '', '', 0, 0, 0),
(632, '267', '274', 'AS 14: Accounting For Amalgamations', NULL, 0, '', '', 0, 0, 0),
(633, '267', '274', 'AS 17: Segment Reporting', NULL, 0, '', '', 0, 0, 0),
(634, '267', '274', 'AS 18: Related Party Disclosures', NULL, 0, '', '', 0, 0, 0),
(635, '267', '274', 'AS 19: Leases', NULL, 0, '', '', 0, 0, 0),
(636, '267', '274', 'AS 20: Earnings Per Share', NULL, 0, '', '', 0, 0, 0),
(637, '267', '274', 'AS 22: Accounting For Taxes On Income', NULL, 0, '', '', 0, 0, 0),
(638, '267', '274', 'AS 24: Discontinuing Operations', NULL, 0, '', '', 0, 0, 0),
(639, '267', '274', 'AS 26: Intangible Assets', NULL, 0, '', '', 0, 0, 0),
(640, '267', '274', 'AS 29: Provisions Contingent Liabilities & Contingent Assets', '', 0, '', '', 0, 0, 0),
(641, '267', '274', 'Dissolution Of Partnership Firms', NULL, 0, '', '', 0, 0, 0),
(642, '267', '274', 'Amalgamation Conversion And Sale Of Partnership Firms', '', 0, '', '', 0, 0, 0),
(643, '267', '274', 'Accounting For Employee Stock Option Plans', NULL, 0, '', '', 0, 0, 0),
(644, '267', '274', 'Buyback Of Securities And Equity Shares With Differential Rights', NULL, 0, '', '', 0, 0, 0),
(645, '267', '274', 'Accounting For Reconstruction Of Companies', NULL, 0, '', '', 0, 0, 0),
(646, '267', '274', 'Accounting For Liquidation Of Companies', NULL, 0, '', '', 0, 0, 0),
(647, '267', '274', 'Financial Statements Of Banking Companies', NULL, 0, '', '', 0, 0, 0),
(648, '267', '274', 'Non-Banking Financial Companies', NULL, 0, '', '', 0, 0, 0),
(649, '267', '274', 'Consolidated Financial Statements', NULL, 0, '', '', 0, 0, 0),
(650, '1592', '274', '647', 'Relevant Provisions Of The Banking Regulations Act, 1949', 0, ' NULL', '', 0, 0, 0),
(651, '1592', '274', '647', 'Books Of Accounts, Returns and forms Of Financial Statements', 0, ' NULL', '', 0, 0, 0),
(652, '1592', '274', '647', 'Capital Adequacy Norms', 0, ' NULL', '', 0, 0, 0),
(653, '1592', '274', '647', 'Income Recognition, Classification Of Assets and Provisions', 0, ' NULL', '', 0, 0, 0),
(654, '1592', '274', '647', 'Some Special Transactions Of Banks', 0, ' NULL', '', 0, 0, 0),
(655, '1592', '274', '647', 'Preparation Of Financial Statements Of Banks', 0, ' NULL', '', 0, 0, 0),
(656, '267', '275', 'Nature, Objective and Scope Of Audit', NULL, 0, '', '', 0, 0, 0),
(657, '267', '275', 'Audit Strategy, Audit Planning and Audit Programme', NULL, 0, '', '', 0, 0, 0),
(658, '267', '275', 'Audit Documentation and Audit Evidence', NULL, 0, '', '', 0, 0, 0),
(659, '267', '275', 'Risk Assessment and Internal control', NULL, 0, '', '', 0, 0, 0),
(660, '267', '275', 'Fraud and Responsibilities Of The Auditor In This Regard', NULL, 0, '', '', 0, 0, 0),
(661, '267', '275', 'Audit in an Automated Environment', NULL, 0, '', '', 0, 0, 0),
(662, '267', '275', 'Audit Sampling', NULL, 0, '', '', 0, 0, 0),
(663, '267', '275', 'Analytical Procedures', NULL, 0, '', '', 0, 0, 0),
(664, '267', '275', 'Audit Of Items Of Financial Statements', NULL, 0, '', '', 0, 0, 0),
(665, '267', '275', 'The Company Audit', NULL, 0, '', '', 0, 0, 0),
(666, '267', '275', 'Audit Report', NULL, 0, '', '', 0, 0, 0),
(667, '267', '275', 'Audit Of Banks', NULL, 0, '', '', 0, 0, 0),
(668, '267', '275', 'Audit Of Different Types Of Entities', NULL, 0, '', '', 0, 0, 0),
(669, '267', '276', 'Automated Business Processes', NULL, 0, '', '', 0, 0, 0),
(670, '267', '276', 'Financial and Accounting Systems', NULL, 0, '', '', 0, 0, 0),
(671, '267', '276', 'Information Systems and It\\\'s Components', NULL, 0, '', '', 0, 0, 0),
(672, '267', '276', 'E-Commerce M-Commerce and Emerging Technologies', '', 0, '', '', 0, 0, 0),
(673, '267', '276', 'Core Banking Systems', NULL, 0, '', '', 0, 0, 0),
(674, '267', '277', 'Scope and Objectives Of Financial Management', NULL, 0, '', '', 0, 0, 0),
(675, '267', '277', 'Types Of Financing', NULL, 0, '', '', 0, 0, 0),
(676, '267', '277', 'Financial Analysis and Planning- Ratio Analysis', NULL, 0, '', '', 0, 0, 0),
(677, '267', '277', 'Cost Of Capital', NULL, 0, '', '', 0, 0, 0),
(678, '267', '277', 'Financing Decisions- Capital Structure', NULL, 0, '', '', 0, 0, 0),
(679, '267', '277', 'Financing Decisions- Leverages', NULL, 0, '', '', 0, 0, 0),
(680, '267', '277', 'Investment Decisions', NULL, 0, '', '', 0, 0, 0),
(681, '267', '277', 'Risk Analysis In Capital Budgeting', NULL, 0, '', '', 0, 0, 0),
(682, '267', '277', 'Dividend Decisions', NULL, 0, '', '', 0, 0, 0),
(683, '267', '277', 'Management Of Working Capital', NULL, 0, '', '', 0, 0, 0),
(684, '1592', '1593', '683', 'Introduction to Working Capital Management', 0, ' NULL', '', 0, 0, 0),
(685, '1592', '1593', '683', 'Treasury and Cash Management ', 0, ' NULL', '', 0, 0, 0),
(686, '1591', '1593', '683', 'Management of Inventory', 0, ' NULL', '', 0, 0, 0),
(687, '1591', '1593', '683', 'Management of Receivables', 0, ' NULL', '', 0, 0, 0),
(688, '1592', '1593', '683', 'Management of Payables (Creditors)', 0, ' NULL', '', 0, 0, 0),
(689, '1592', '1593', '683', 'Financing of Working Capital', 0, ' NULL', '', 0, 0, 0),
(690, '218', '311', 'Introduction To Cost and Management Accounting', NULL, 0, '', '', 0, 0, 0),
(691, '218', '311', 'Employee Cost', NULL, 0, '', '', 0, 0, 0),
(692, '218', '311', 'Overheads: Absorption Costing Method', NULL, 0, '', '', 0, 0, 0),
(693, '218', '311', 'Activity Based Costing ', NULL, 0, '', '', 0, 0, 0),
(694, '218', '311', 'Cost Sheet', NULL, 0, '', '', 0, 0, 0),
(695, '218', '311', 'Cost Accounting System', NULL, 0, '', '', 0, 0, 0),
(696, '218', '311', 'Unit and Batch Costing', NULL, 0, '', '', 0, 0, 0),
(697, '218', '311', 'Job Costing and Contract Costing', NULL, 0, '', '', 0, 0, 0),
(698, '218', '311', 'Process & Operation Costing', NULL, 0, '', '', 0, 0, 0),
(699, '218', '311', 'Joint Products & By Products', NULL, 0, '', '', 0, 0, 0),
(700, '218', '311', 'Service Costing', NULL, 0, '', '', 0, 0, 0),
(701, '218', '311', 'Standard Costing', NULL, 0, '', '', 0, 0, 0),
(702, '218', '311', 'Budget and Budgetary Control', NULL, 0, '', '', 0, 0, 0),
(703, '218', '308', 'AS 1: Disclosure Of Accounting Policies', NULL, 0, '', '', 0, 0, 0),
(704, '218', '308', 'AS 2: Valuation Of Inventories', NULL, 0, '', '', 0, 0, 0),
(705, '218', '308', 'AS 3: Cash Flow Statements', NULL, 0, '', '', 0, 0, 0),
(706, '218', '308', 'AS 10: Property Plant and Equipment', '', 0, '', '', 0, 0, 0),
(707, '218', '308', 'AS 11: The Effects Of Changes in Foreign Exchange Rates', NULL, 0, '', '', 0, 0, 0),
(708, '218', '308', 'AS 12: Accounting For Government Grants', NULL, 0, '', '', 0, 0, 0),
(709, '218', '308', 'AS 13: Accounting For Investments', NULL, 0, '', '', 0, 0, 0),
(710, '218', '308', 'AS 16: Borrowing Costs', NULL, 0, '', '', 0, 0, 0),
(711, '218', '308', 'Preparation Of Financial Statements', NULL, 0, '', '', 0, 0, 0),
(712, '218', '308', 'Cash Flow Statement', NULL, 0, '', '', 0, 0, 0),
(713, '218', '308', 'Profit or Loss Pre and Post Incorporation', NULL, 0, '', '', 0, 0, 0),
(714, '218', '308', 'Accounting For Bonus Issue and Right Issue', NULL, 0, '', '', 0, 0, 0),
(715, '218', '308', 'Redemption Of Preference Shares', NULL, 0, '', '', 0, 0, 0),
(716, '218', '308', 'Redemption Of Debentures', NULL, 0, '', '', 0, 0, 0),
(717, '218', '308', 'Investment Accounts', NULL, 0, '', '', 0, 0, 0),
(718, '218', '308', 'Insurance Claims For Loss of Stock and Loss Of Profit', NULL, 0, '', '', 0, 0, 0),
(719, '218', '308', 'Hire Purchase and Instalment Sale Transactions', NULL, 0, '', '', 0, 0, 0),
(720, '218', '308', 'Departmental Accounts', NULL, 0, '', '', 0, 0, 0),
(721, '218', '308', 'Accounting for Branches including Foreign Branches', NULL, 0, '', '', 0, 0, 0),
(722, '218', '308', 'Accounts From Incomplete Records', NULL, 0, '', '', 0, 0, 0),
(723, '218', '310', 'GST- Introduction', NULL, 0, '', '', 0, 0, 0),
(724, '218', '310', 'Supply Under GST', NULL, 0, '', '', 0, 0, 0),
(725, '218', '310', 'Charge of GST', NULL, 0, '', '', 0, 0, 0),
(726, '218', '310', 'Exemptions from GST', NULL, 0, '', '', 0, 0, 0),
(727, '218', '310', 'Time of Supply', NULL, 0, '', '', 0, 0, 0),
(728, '218', '310', 'Value of Supply', NULL, 0, '', '', 0, 0, 0),
(729, '218', '310', 'Input Tax Credit', NULL, 0, '', '', 0, 0, 0),
(730, '218', '310', 'Registration', NULL, 0, '', '', 0, 0, 0),
(731, '218', '310', 'Tax Invoice- Credit and Debit Notes E-Way Bill', '', 0, '', '', 0, 0, 0),
(732, '218', '310', 'Payment of Tax', NULL, 0, '', '', 0, 0, 0),
(733, '218', '310', 'Returns', NULL, 0, '', '', 0, 0, 0),
(734, '211', '328', '618', 'New Ratio and Sacifice Ratio.', 0, 'NULL', '', 0, 0, 0),
(735, '211', '328', '618', 'Meaning, Valuation and Acounting of Goodwill.', 0, 'NULL', '', 0, 0, 0),
(736, '211', '328', '618', 'Revaluation and Memorandum Revaluation.', 0, 'NULL', '', 0, 0, 0),
(737, '211', '328', '618', 'Distribution of Accumulated Profit/Loss and Reserves.', 0, 'NULL', '', 0, 0, 0),
(738, '211', '328', '618', 'Revaluation, Capital Account and Balance Sheet.', 0, 'NULL', '', 0, 0, 0),
(739, '211', '328', '618', 'Adjustment of Capital on the Basis of New Partner.', 0, 'NULL', '', 0, 0, 0),
(740, '211', '328', '618', 'Determination of Capital of New Partner on the Basis of Old Partner\\\'s Capital.', 0, 'NULL', '', 0, 0, 0),
(741, '211', '328', '618', 'Accounting Treatment of Change in Profit Sharing Ratio Among Existing Ratio', 0, 'NULL', '', 0, 0, 0),
(742, '211', '328', '619', 'New Ratio and Gain Ratio.', 0, 'NULL', '', 0, 0, 0),
(743, '211', '328', '619', 'Accounting Treatment of Goodwill.', 0, 'NULL', '', 0, 0, 0),
(744, '211', '328', '619', 'Accumulated Profit/Loss and Reserve.', 0, 'NULL', '', 0, 0, 0),
(745, '211', '328', '619', 'Methods of Payment to Outgoing Partner ', 0, 'NULL', '', 0, 0, 0),
(746, '211', '328', '619', 'Accounting Treatment of Separate and Joint Life Policy', 0, 'NULL', '', 0, 0, 0),
(747, '211', '328', '619', 'Revaluation, Partner\\\'s Capital and Balace Sheet', 0, 'NULL', '', 0, 0, 0),
(748, '211', '328', '619', 'Adjustment of Capital on Death and Retirement of Partner', 0, 'NULL', '', 0, 0, 0),
(749, '211', '328', '619', 'Partner Executor\\\'s Account ', 0, 'NULL', '', 0, 0, 0),
(750, '211', '328', '619', 'Accounting Treament admission Cum Retirement', 0, 'NULL', '', 0, 0, 0),
(751, '1591', '309', '382', 'Residential Status Of Individual', 0, ' NULL', '', 0, 0, 0),
(752, '1591', '309', '382', 'Residential Status Of HUF', 0, ' NULL', '', 0, 0, 0),
(753, '1591', '309', '382', 'Residential Status Of Firm/ AOP/ Local Authorities/ AJP', 0, ' NULL', '', 0, 0, 0),
(754, '1591', '309', '382', 'Residential Status Of a Company', 0, '  NULL', '', 0, 0, 0),
(755, '1591', '309', '382', 'Scope Of Total Income', 0, '  NULL', '', 0, 0, 0),
(756, '1591', '309', '382', 'Income Deemed To Be Received In India', 0, '  NULL', '', 0, 0, 0),
(757, '1591', '309', '382', 'Income Deemed To Accrue or Arise in India', 0, '  NULL', '', 0, 0, 0),
(758, '1591', '309', '382', 'Business Connection and Taxability in India', 0, '  NULL', '', 0, 0, 0),
(759, '1591', '309', '382', 'Interest, Loyalty & Fees for Technical Services', 0, '  NULL', '', 0, 0, 0),
(760, '1591', '309', '385', 'Preliminaries', 0, '  NULL', '', 0, 0, 0),
(761, '1591', '309', '385', 'Definations', 0, '  NULL', '', 0, 0, 0),
(762, '1591', '309', '385', 'Fully Taxable Components of Salary', 0, '  NULL', '', 0, 0, 0),
(763, '1591', '309', '385', 'Fully Exempt Allowances', 0, '  NULL', '', 0, 0, 0),
(764, '1591', '309', '385', 'Partly Exempt Allowances', 0, '  NULL', '', 0, 0, 0),
(765, '1591', '309', '385', 'House Rent Allowance', 0, '  NULL', '', 0, 0, 0),
(766, '1591', '309', '385', 'Gratuity', 0, '  NULL', '', 0, 0, 0),
(767, '1591', '309', '385', 'Pension', 0, '  NULL', '', 0, 0, 0),
(768, '1591', '309', '385', 'Leave Encashment', 0, '  NULL', '', 0, 0, 0),
(769, '1591', '309', '385', 'Retrenchment Compensation', 0, '  NULL', '', 0, 0, 0),
(770, '1591', '309', '385', 'Voluntary Retirement Compensation', 0, '  NULL', '', 0, 0, 0),
(771, '1591', '309', '385', 'Provident Funds', 0, '  NULL', '', 0, 0, 0),
(772, '1591', '309', '385', 'Meaning and Scope of Perquisites', 0, '  NULL', '', 0, 0, 0),
(773, '1591', '309', '385', 'Fully Exempt Perquisites', 0, '  NULL', '', 0, 0, 0),
(774, '1591', '309', '385', 'Employee Stock Option (ESOP)', 0, '  NULL', '', 0, 0, 0),
(775, '1591', '309', '385', 'Leave Travel Assistance (LTA)', 0, '  NULL', '', 0, 0, 0),
(776, '1591', '309', '385', 'Medical Facilities', 0, '  NULL', '', 0, 0, 0),
(777, '1591', '309', '385', 'Accommodation Facilities Provided By Employer', 0, '  NULL', '', 0, 0, 0),
(778, '1591', '309', '385', 'Motor Car Benifits', 0, '  NULL', '', 0, 0, 0),
(779, '1591', '309', '385', 'Various Facilities & Perquisites to Employee/Household', 0, '  NULL', '', 0, 0, 0),
(780, '1591', '309', '385', 'Concessional Loans Given by Employer to Employee', 0, '  NULL', '', 0, 0, 0),
(781, '1591', '309', '385', 'Transfer of Ownership of Movable Asset', 0, '  NULL', '', 0, 0, 0),
(782, '1591', '309', '385', 'Perquisites-Other Matters', 0, '  NULL', '', 0, 0, 0),
(783, '218', '309', '385', 'Deduction under the Head \\\"Salaries\\\"', 0, 'NULL', '', 0, 0, 0),
(784, '1591', '309', '386', 'Preliminary Conditions for Taxation', 0, '  NULL', '', 0, 0, 0),
(785, '1591', '309', '386', 'Property Held as Stock in Trade', 0, '  NULL', '', 0, 0, 0),
(786, '1591', '309', '386', 'Composite Rent', 0, '  NULL', '', 0, 0, 0),
(787, '1591', '309', '386', 'Owner & Deemed Owner', 0, '  NULL', '', 0, 0, 0),
(788, '1591', '309', '386', 'Municipal Value, Fair Rent & Standard Rent', 0, '  NULL', '', 0, 0, 0),
(789, '1591', '309', '386', 'Municipal Taxes', 0, ' NULL', '', 0, 0, 0),
(790, '1591', '309', '386', 'Standard Deduction u/s 24(a)', 0, ' NULL', '', 0, 0, 0),
(791, '1591', '309', '386', 'Interest on Borrowed Capital', 0, ' NULL', '', 0, 0, 0),
(792, '1591', '309', '386', 'Self Occupied House Property or Self Occupied House Property kept Vacant', 0, ' NULL', '', 0, 0, 0),
(793, '1591', '309', '386', 'More than One House Property Self Occupied', 0, ' NULL', '', 0, 0, 0),
(794, '1591', '309', '386', 'Property Let Out for the Whole Year', 0, ' NULL', '', 0, 0, 0),
(795, '1591', '309', '386', 'Deduction for Unrealized Rent', 0, ' NULL', '', 0, 0, 0),
(796, '1591', '309', '386', 'Recovery of Unrealized Rent', 0, ' NULL', '', 0, 0, 0),
(797, '1591', '309', '386', 'Let Out Property kept Vacant for the Whole Year', 0, ' NULL', '', 0, 0, 0),
(798, '1591', '309', '386', 'Let Out Property kept Vacant for the part of the Year', 0, ' NULL', '', 0, 0, 0),
(799, '1591', '309', '386', 'Property Self-Occupied for part of the Year & Let-out for part of the Year', 0, ' NULL', '', 0, 0, 0),
(800, '1591', '309', '386', 'Part of House Property Self-Occupied and Another Portion Let-Out', 0, ' NULL', '', 0, 0, 0),
(801, '1591', '309', '386', 'Annual Value of House Property held as Stock in Trade', 0, ' NULL', '', 0, 0, 0),
(802, '1591', '309', '386', 'Arrears of Rent Received', 0, ' NULL', '', 0, 0, 0),
(803, '1591', '309', '386', 'Co-Ownership', 0, ' NULL', '', 0, 0, 0),
(804, '1591', '309', '386', 'Property situated Outside India', 0, ' NULL', '', 0, 0, 0),
(805, '1591', '309', '387', 'Preliminary', 0, ' NULL', '', 0, 0, 0),
(806, '1591', '309', '387', 'Special Points of PGBP', 0, ' NULL', '', 0, 0, 0),
(807, '1591', '309', '387', 'Taxability of Conversion of Stock-in-Trade into Capital Asset', 0, ' NULL', '', 0, 0, 0),
(808, '1591', '309', '387', 'Principles for Taxability of Interest', 0, ' NULL', '', 0, 0, 0),
(809, '1591', '309', '387', 'Method of Accounting u/s 145,145A', 0, ' NULL', '', 0, 0, 0),
(810, '1591', '309', '387', 'Maintenance of Accounts', 0, ' NULL', '', 0, 0, 0),
(811, '1591', '309', '387', 'Tax Audit u/s 44AB', 0, ' NULL', '', 0, 0, 0);
INSERT INTO `courses` (`id`, `course_name`, `subject`, `chapter`, `topic`, `topic_level`, `content`, `assessment`, `fee`, `test`, `sort`) VALUES
(812, '1591', '309', '387', 'Depreciation', 0, ' NULL', '', 0, 0, 0),
(813, '1591', '309', '387', 'Deduction of Building Related Expenditure [sec.30]', 0, ' NULL', '', 0, 0, 0),
(814, '1591', '309', '387', 'Deduction of Repairs etc. to Plant, Furniture [sec.31]', 0, ' NULL', '', 0, 0, 0),
(815, '1591', '309', '387', 'Deduction of Scientific Research Expenditure', 0, ' NULL', '', 0, 0, 0),
(816, '1591', '309', '387', 'Deduction of Eligible Projects/Programmes [sec.35AC, 35CCA, 35CCC, 35CCD]', 0, ' NULL', '', 0, 0, 0),
(817, '1591', '309', '387', 'Deduction of Specified Business [Sec.35AD]', 0, ' NULL', '', 0, 0, 0),
(818, '1591', '309', '387', 'Deduction of Preliminary Expenses [Sec.35D]', 0, ' NULL', '', 0, 0, 0),
(819, '1591', '309', '387', 'Deduction of VRS Compensation Expenditure [Sec.35DDA]', 0, ' NULL', '', 0, 0, 0),
(820, '1591', '309', '387', 'Specified Deduction u/s 36', 0, ' NULL', '', 0, 0, 0),
(821, '1591', '309', '387', 'General Deduction u/s 37', 0, ' NULL', '', 0, 0, 0),
(822, '1591', '309', '387', 'Expenditures not Allowed as Deduction for All Assessees', 0, ' NULL', '', 0, 0, 0),
(823, '1591', '309', '387', 'Expenditure of Interest & Remuneration to Partners/Member of AOP/ BOI not Allowed', 0, ' NULL', '', 0, 0, 0),
(824, '1591', '309', '387', 'Expenditure of Payments to Relatives/ Specified Persons not Allowed', 0, ' NULL', '', 0, 0, 0),
(825, '1591', '309', '387', 'Expenditure of Payments other than by A/c Payee Cheque/ Draft not Allowed', 0, ' NULL', '', 0, 0, 0),
(826, '1591', '309', '387', 'Expenditure of Payment to Unrecognized Welfare Funds not Allowed', 0, ' NULL', '', 0, 0, 0),
(827, '1591', '309', '387', 'Expenditure of Market to Market Loss or Other Expected Loss not Allowed', 0, ' NULL', '', 0, 0, 0),
(828, '1591', '309', '387', 'Expenditure of Payments not made before Due Date of Return Of Income not Allowed', 0, ' NULL', '', 0, 0, 0),
(829, '1591', '309', '387', 'Deemed Income', 0, ' NULL', '', 0, 0, 0),
(830, '1591', '309', '387', 'Non-Resident Artists/ Sportsmen ', 0, ' NULL', '', 0, 0, 0),
(831, '1591', '309', '387', 'Film Producers/ Distributors', 0, ' NULL', '', 0, 0, 0),
(832, '1591', '309', '387', 'Speculative Business', 0, ' NULL', '', 0, 0, 0),
(833, '1591', '309', '387', 'Exchange Rate Fluctuations [sec.43A]', 0, ' NULL', '', 0, 0, 0),
(834, '1591', '309', '387', 'Taxation of Foreign Exchange [Sec.43AA]', 0, ' NULL', '', 0, 0, 0),
(835, '1591', '309', '387', 'Full Value of Consideration [Sec.43CA]', 0, ' NULL', '', 0, 0, 0),
(836, '1591', '309', '387', 'Construction and Foreign Contracts [Sec.43CB]', 0, ' NULL', '', 0, 0, 0),
(837, '1591', '309', '387', 'Presumptive Income of Eligible Business [Sec.44AD], Profession [Sec.44ADA], Plying Goods Carriages [Sec.44AE]', 0, ' NULL', '', 0, 0, 0),
(838, '1591', '309', '389', 'Income Chargeable under this Head', 0, ' NULL', '', 0, 0, 0),
(839, '1591', '309', '389', 'Allowable Deductions', 0, ' NULL', '', 0, 0, 0),
(840, '1591', '309', '389', 'Inadmissible Expenditure', 0, ' NULL', '', 0, 0, 0),
(841, '1591', '309', '389', 'Deemed Income', 0, ' NULL', '', 0, 0, 0),
(842, '1591', '309', '389', 'Gifts received by Individuals & HUF', 0, ' NULL', '', 0, 0, 0),
(843, '1591', '309', '389', 'Premium on Issue of Shares, by Closely held Company', 0, ' NULL', '', 0, 0, 0),
(844, '1591', '309', '389', 'Determination of FMV of Property (other than Immovable Property)', 0, ' NULL', '', 0, 0, 0),
(845, '1591', '309', '389', 'Deemed Dividends', 0, ' NULL', '', 0, 0, 0),
(846, '1591', '309', '389', 'Basis of Charge of Dividend', 0, ' NULL', '', 0, 0, 0),
(847, '1591', '309', '389', 'Time of Accrual of Dividend Income', 0, ' NULL', '', 0, 0, 0),
(848, '1591', '309', '389', 'Place of Accrual of Dividend Income', 0, ' NULL', '', 0, 0, 0),
(849, '1591', '309', '389', 'Tax on Income from Patents', 0, ' NULL', '', 0, 0, 0),
(850, '1591', '309', '389', 'Family Pension', 0, ' NULL', '', 0, 0, 0),
(851, '1591', '309', '389', 'Interest on Securities', 0, ' NULL', '', 0, 0, 0),
(852, '1591', '309', '389', 'LIC Receipts', 0, '  NULL', '', 0, 0, 0),
(853, '1591', '309', '389', 'Remuneration received by MP/MLA', 0, ' NULL', '', 0, 0, 0),
(854, '1591', '309', '389', 'Awards', 0, ' NULL', '', 0, 0, 0),
(855, '1591', '309', '390', 'Income transfer without Asset transfer', 0, ' NULL', '', 0, 0, 0),
(856, '1591', '309', '390', 'Revocable transfer of Assets', 0, ' NULL', '', 0, 0, 0),
(857, '1591', '309', '390', 'Payments to Spouse from Concern in which Individual has Substantial interest', 0, ' NULL', '', 0, 0, 0),
(858, '1591', '309', '390', 'Transfer to Spouse', 0, ' NULL', '', 0, 0, 0),
(859, '1591', '309', '390', 'Transfer to Son\'s Wife', 0, ' NULL', '', 0, 0, 0),
(860, '1591', '309', '390', 'Transfer for benefit of Spouse/ Son\'s Wife', 0, ' NULL', '', 0, 0, 0),
(861, '1591', '309', '390', 'Cross Transfers', 0, ' NULL', '', 0, 0, 0),
(862, '1591', '309', '390', 'Minor\'s Income', 0, ' NULL', '', 0, 0, 0),
(863, '1591', '309', '390', 'Income from HUF Property', 0, ' NULL', '', 0, 0, 0),
(864, '1591', '309', '383', 'Elements of Tax Law', 0, ' NULL', '', 0, 0, 0),
(865, '1591', '309', '383', 'Heads of Income and Total Income', 0, ' NULL', '', 0, 0, 0),
(866, '1591', '309', '383', 'Rates of Income Tax', 0, ' NULL', '', 0, 0, 0),
(867, '1591', '309', '383', 'Marginal Relief', 0, ' NULL', '', 0, 0, 0),
(868, '1591', '309', '383', 'Assessment Year and Previous Year', 0, ' NULL', '', 0, 0, 0),
(869, '1591', '309', '383', 'Income of Previous Year taxed in Previous Year itself', 0, ' NULL', '', 0, 0, 0),
(870, '1591', '309', '383', 'Previous Year for Undisclosed Income', 0, ' NULL', '', 0, 0, 0),
(871, '1591', '309', '383', 'Assessee, Deemed Assessee and Assessee in Default', 0, ' NULL', '', 0, 0, 0),
(872, '1591', '309', '383', 'Person', 0, ' NULL', '', 0, 0, 0),
(873, '1591', '309', '383', 'Hindu Undivided Family', 0, ' NULL', '', 0, 0, 0),
(874, '1591', '309', '383', 'Firm, AOP, BOI', 0, ' NULL', '', 0, 0, 0),
(875, '1591', '309', '383', 'Company', 0, ' NULL', '', 0, 0, 0),
(876, '1591', '309', '383', 'Income', 0, ' NULL', '', 0, 0, 0),
(877, '1591', '309', '383', 'Capital vs Revenue', 0, ' NULL', '', 0, 0, 0),
(878, '1591', '309', '384', 'Basics', 0, ' NULL', '', 0, 0, 0),
(879, '1591', '309', '384', 'Incomes of Non-Residents/ Foreign Citizens/ Foreign Companies', 0, ' NULL', '', 0, 0, 0),
(880, '1591', '309', '384', 'Disaster related Receipts/ Compensation', 0, ' NULL', '', 0, 0, 0),
(881, '1591', '309', '384', 'Income of certain Funds', 0, ' NULL', '', 0, 0, 0),
(882, '1591', '309', '384', 'Certain Other Incomes Exempt u/s 10 ', 0, ' NULL', '', 0, 0, 0),
(883, '1591', '309', '384', 'Exemption for Units in SEZ [Sec.10AA]', 0, ' NULL', '', 0, 0, 0),
(884, '1591', '309', '391', 'Set-Off of Current Year Loss & Brought Forward Loss', 0, ' NULL', '', 0, 0, 0),
(885, '1591', '309', '391', 'Other Aspects', 0, ' NULL', '', 0, 0, 0),
(886, '211', 'Business Economics', NULL, NULL, 0, '', '', 2500, 0, 0),
(887, '1591', '309', '392', 'Basics', 0, ' NULL', '', 0, 0, 0),
(888, '1591', '309', '392', 'Deduction of Prescribed Investments [Sec.80C]', 0, ' NULL', '', 0, 0, 0),
(889, '1591', '309', '392', 'Deduction of Pension Schemes [Sec.80CCC, 80CCD]', 0, ' NULL', '', 0, 0, 0),
(890, '1591', '309', '392', 'Deduction of Medical Insurance etc. [Sec.80D]', 0, ' NULL', '', 0, 0, 0),
(891, '1591', '309', '392', 'Deduction of Disability of Assessee/ Dependent [Sec.80U, 80DD]', 0, ' NULL', '', 0, 0, 0),
(892, '1591', '309', '392', 'Deduction of Medical Treatment [Sec.80DDB]', 0, ' NULL', '', 0, 0, 0),
(893, '1591', '309', '392', 'Deduction of Interest on Educational Loan [Sec.80E]', 0, ' NULL', '', 0, 0, 0),
(894, '1591', '309', '392', 'Deduction of Interest on Loan for Specified House Property [Sec.80EE]', 0, ' NULL', '', 0, 0, 0),
(895, '1591', '309', '392', 'Deduction towards Interest on Loan taken for Certain House Property [Sec.80EEA]', 0, ' NULL', '', 0, 0, 0),
(896, '1591', '309', '392', 'Deduction towards Interest on Loan taken for Purchase of Electric Vehicle [Sec.80EEB]', 0, ' NULL', '', 0, 0, 0),
(897, '1591', '309', '392', 'Deduction of Rent paid no HRA [Sec.80GG]', 0, ' NULL', '', 0, 0, 0),
(898, '1591', '309', '392', 'Deduction of Royalty on Books [Sec.80QQB]', 0, ' NULL', '', 0, 0, 0),
(899, '1591', '309', '392', 'Deduction of Royalty on Patents [Sec.80RRB]', 0, ' NULL', '', 0, 0, 0),
(900, '1591', '309', '392', 'Deduction of Interest on Savings Account Deposits [Sec.80TTA]', 0, ' NULL', '', 0, 0, 0),
(901, '1591', '309', '392', 'Deduction of  Interest on Deposits in Case of Senior Citizens [Sec.80TTB]', 0, ' NULL', '', 0, 0, 0),
(902, '1591', '309', '392', 'Deduction of Donations to Approved Funds & Charitable Institutions', 0, ' NULL', '', 0, 0, 0),
(903, '1591', '309', '392', 'Deduction of Donations to Research Institutions, etc. [Sec.80GGA]', 0, ' NULL', '', 0, 0, 0),
(904, '1591', '309', '392', 'Deduction of Donations to Political Parties, etc. [Sec.80GGB, 80GGC]', 0, ' NULL', '', 0, 0, 0),
(905, '1591', '309', '392', 'Deduction of Additional Employment for Business [Sec.80JJAA]', 0, ' NULL', '', 0, 0, 0),
(906, '1591', '309', '392', 'Deduction in respect of certain income of Producer Companies [Sec.80PA]', 0, ' NULL', '', 0, 0, 0),
(907, '1591', '309', '388', 'Capital Asset [Sec.2(14)]', 0, ' NULL', '', 0, 0, 0),
(908, '1591', '309', '388', 'Short Term and Long Term Capital Asset/ Gain', 0, ' NULL', '', 0, 0, 0),
(909, '1591', '309', '388', 'Zero Coupon Bonds (ZCB) [Sec.2(48)]', 0, ' NULL', '', 0, 0, 0),
(910, '1591', '309', '388', 'Transfer for Capital Gain Purposes [Sec.2(47)]', 0, ' NULL', '', 0, 0, 0),
(911, '1591', '309', '388', 'Chargeability of Capital Gains [Sec.45(1)]', 0, ' NULL', '', 0, 0, 0),
(912, '1591', '309', '388', 'Capital Gains Computations [Sec.48]', 0, ' NULL', '', 0, 0, 0),
(913, '1591', '309', '388', 'Cost of Acquisition [Sec.55]', 0, ' NULL', '', 0, 0, 0),
(914, '1591', '309', '388', 'Cost of Improvement [Sec.55]', 0, ' NULL', '', 0, 0, 0),
(915, '1591', '309', '388', 'Indexed Cost of Acquisition/ Improvement', 0, ' NULL', '', 0, 0, 0),
(916, '1591', '309', '388', 'Total/Partial Partition of HUF [Sec.47(i)] not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(917, '1591', '309', '388', 'Gift/ Will/ Irrevocable Trust [Sec.47(iii)] not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(918, '1591', '309', '388', 'Transfer between Holding Company & Subsidiary not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(919, '1591', '309', '388', 'Certain transfers in Amalgamation of Companies not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(920, '1591', '309', '388', 'Certain transfers in Demerger of Companies not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(921, '1591', '309', '388', 'Certain transfers in Corporatisation of Stock Exchange not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(922, '1591', '309', '388', 'Units in Consolidating Scheme of Mutual Fund not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(923, '1591', '309', '388', 'Units in Consolidating Scheme Plan of Mutual Fund not regarded as transfer ', 0, ' NULL', '', 0, 0, 0),
(924, '1591', '309', '388', 'Notified Reverse Mortgage Scheme [Sec.47(xvi) not regarded as transfer', 0, ' NULL', '', 0, 0, 0),
(925, '1591', '309', '388', 'Other transactions not regarded as Transfer', 0, ' NULL', '', 0, 0, 0),
(926, '1591', '309', '388', 'Insurance Compensation [Sec.45(1A)]', 0, ' NULL', '', 0, 0, 0),
(927, '1591', '309', '388', 'Conversion of Capital Asset to Stock in Trade [Sec.45(2)]', 0, ' NULL', '', 0, 0, 0),
(928, '1591', '309', '388', 'Conversion of Inventory into Capital Asset', 0, ' NULL', '', 0, 0, 0),
(929, '1591', '309', '388', 'Transfer of Shares held in Demat Form [Sec.45(2A)]', 0, ' NULL', '', 0, 0, 0),
(930, '1591', '309', '388', 'Introduction of Capital Asset by Partner in Firm, etc.[Sec.45(3)]', 0, ' NULL', '', 0, 0, 0),
(931, '1591', '309', '388', 'Distribution of Capital Asset on Dissolution [Sec.45(4)]', 0, ' NULL', '', 0, 0, 0),
(932, '1591', '309', '388', 'Compulsory Acquisition by Government [Sec.45(5)]', 0, ' NULL', '', 0, 0, 0),
(933, '1591', '309', '388', 'Capital Gains based on Specified agreement [Sec.45(5A)]', 0, ' NULL', '', 0, 0, 0),
(934, '1591', '309', '388', 'Distribution of Assets by Company in Liquidation [Sec.46]', 0, ' NULL', '', 0, 0, 0),
(935, '1591', '309', '388', 'Transfer of Shares, etc. by Non-Resident', 0, '  NULL', '', 0, 0, 0),
(936, '1591', '309', '388', 'Slump Sale [Sec.50B]', 0, ' NULL', '', 0, 0, 0),
(937, '1591', '309', '388', 'Transfer of Land/ Building for lower consideration [Sec.50C]', 0, ' NULL', '', 0, 0, 0),
(938, '1591', '309', '388', 'Full Value of Consideration for Transfer of Share [Sec.51]', 0, ' NULL', '', 0, 0, 0),
(939, '1591', '309', '388', 'FMV=Consideration [Sec.50D]', 0, ' NULL', '', 0, 0, 0),
(940, '1591', '309', '388', 'Forfeiture of Advance Received [Sec.51]', 0, ' NULL', '', 0, 0, 0),
(941, '1591', '309', '388', 'Family Arrangements', 0, ' NULL', '', 0, 0, 0),
(942, '1591', '309', '388', 'Investment in Residential House Property [Sec.54] not included in Capital Gain', 0, ' NULL', '', 0, 0, 0),
(943, '1591', '309', '388', 'Transfer of Urban Agriculture Land [Sec.54B] not included in Capital Gain', 0, ' NULL', '', 0, 0, 0),
(944, '1591', '309', '388', 'Compulsory Acquisition of Land & Building [Sec.54D] not included in Capital Gain', 0, ' NULL', '', 0, 0, 0),
(945, '1591', '309', '388', 'Investment in Notified Bonds [Sec.54EC] not included in Capital Gain', 0, ' NULL', '', 0, 0, 0),
(946, '1591', '309', '388', 'Other Points which are Exemptions from Capital Gain', 0, ' NULL', '', 0, 0, 0),
(947, '1591', '309', '388', 'Self Generated Assets', 0, ' NULL', '', 0, 0, 0),
(948, '1591', '309', '388', 'Capital Gains from Financial Assets', 0, ' NULL', '', 0, 0, 0),
(949, '1591', '309', '388', 'Dividend Stripping & Bonus Stripping', 0, ' NULL', '', 0, 0, 0),
(950, '1591', '309', '388', 'Rates of Capital Gains Tax [Sec.112]', 0, ' NULL', '', 0, 0, 0),
(951, '1591', '309', '388', 'Tax on Long Term Capital Gains in Certain Cases [Sec.112A]', 0, ' NULL', '', 0, 0, 0),
(952, '1591', '309', '388', 'Valuation Officer [Sec.55A]', 0, ' NULL', '', 0, 0, 0),
(953, '1592', '309', '388', 'Set-Off and Carry Forward of Capital Losses', 0, ' NULL', '', 0, 0, 0),
(956, '211', '328', '620', 'Preparation of Realisation Account.', 0, 'NULL', '', 0, 0, 0),
(957, '211', '328', '620', 'Entries on Firm\\\'s Dissolution and Prepare Necessary Ledger Accounts.', 0, 'NULL', '', 0, 0, 0),
(958, '211', '328', '620', 'Insolvency of One Partner Applying Garners vs Murray Rule', 0, 'NULL', '', 0, 0, 0),
(959, '211', '328', '620', 'Insolvency of All Partner ', 0, 'NULL', '', 0, 0, 0),
(960, '211', '328', '621', 'Gradual Realisation of Assets and Piecemeal Distribution of Amount.', 0, 'NULL', '', 0, 0, 0),
(961, '211', '328', '621', 'Basis of Gradual of Distribution of Cash Amoungst the Partner.(Surplus and Loss Method)', 0, 'NULL', '', 0, 0, 0),
(962, '211', '328', '621', 'Conversion or Sale Business.', 0, 'NULL', '', 0, 0, 0),
(963, '211', '328', '621', 'Amalgamation of Firms', 0, 'NULL', '', 0, 0, 0),
(964, '211', '328', '621', 'Gradual Realisation of Assets and Piecemeal Distribution of Amount.', 0, 'NULL', '', 0, 0, 0),
(965, '211', '328', '621', 'Basis of Gradual of Distribution of Cash Amoungst the Partner.(Surplus and Loss Method)', 0, 'NULL', '', 0, 0, 0),
(966, '211', '328', '621', 'Conversion or Sale Business.', 0, 'NULL', '', 0, 0, 0),
(967, '211', '328', '621', 'Amalgamation of Firms', 0, 'NULL', '', 0, 0, 0),
(968, '1592', '274', '641', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(969, '1592', '274', '641', 'Circumstances leading to Dissolution of Partnership', 0, ' NULL', '', 0, 0, 0),
(970, '1592', '274', '641', 'Consequences of Dissolution', 0, ' NULL', '', 0, 0, 0),
(971, '1592', '274', '641', 'Closing of Partnership Books on Dissolution', 0, ' NULL', '', 0, 0, 0),
(972, '1592', '274', '641', 'Consequences of Insolvency of a Partner', 0, ' NULL', '', 0, 0, 0),
(973, '1592', '274', '641', 'Loss Arising from Insolvency of a Partner ', 0, ' NULL', '', 0, 0, 0),
(974, '1592', '274', '641', 'Piecemeal Payments', 0, ' NULL', '', 0, 0, 0),
(975, '1592', '274', '641', 'Issues Related to Accounting in Limited Liability Partnerships ', 0, ' NULL', '', 0, 0, 0),
(976, '1592', '274', '645', 'Meaning of Reconstruction', 0, ' NULL', '', 0, 0, 0),
(977, '1592', '274', '645', 'Methods of Internal Reconstruction', 0, ' NULL', '', 0, 0, 0),
(978, '1592', '274', '645', 'Alteration of Share Capital', 0, ' NULL', '', 0, 0, 0),
(979, '1592', '274', '645', 'Variation of Shareholders Rights', 0, ' NULL', '', 0, 0, 0),
(980, '1592', '274', '645', 'Reduction of Share Capital', 0, ' NULL', '', 0, 0, 0),
(981, '1592', '274', '645', 'Compromise/Arrangements', 0, ' NULL', '', 0, 0, 0),
(982, '1592', '274', '645', 'Surrender of Shares', 0, ' NULL', '', 0, 0, 0),
(983, '1592', '274', '645', 'Entries in case of Internal Reconstruction', 0, ' NULL', '', 0, 0, 0),
(985, '1592', '274', '643', 'Employees Stock Option Plans (ESOP)', 0, ' NULL', '', 0, 0, 0),
(986, '1592', '274', '643', 'Provisions of Guidance Note on Accounting for Share-Based Payments', 0, ' NULL', '', 0, 0, 0),
(989, '1592', '274', '644', 'Introduction of Buy Back of Securities', 0, ' NULL', '', 0, 0, 0),
(990, '1592', '274', '644', 'Provision of Section 70 of the Companies Act, 2013', 0, ' NULL', '', 0, 0, 0),
(991, '1592', '274', '644', 'Introduction of Equity Shares with Differential Rights', 0, ' NULL', '', 0, 0, 0),
(992, '1592', '274', '644', 'Voting Rights', 0, ' NULL', '', 0, 0, 0),
(993, '1592', '274', '644', 'Share Capital and Debenture Rules', 0, ' NULL', '', 0, 0, 0),
(994, '1592', '274', '644', 'Dilution in case of Private Companies', 0, ' NULL', '', 0, 0, 0),
(995, '1592', '274', '644', 'Variation of Shareholder\'s Rights', 0, ' NULL', '', 0, 0, 0),
(996, '1592', '274', '644', 'Protection of Minority Shareholder Clause', 0, ' NULL', '', 0, 0, 0),
(997, '1592', '274', '646', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(998, '1592', '274', '646', 'Definition of Winding Up', 0, ' NULL', '', 0, 0, 0),
(999, '1592', '274', '646', 'Winding Up by Tribunal', 0, ' NULL', '', 0, 0, 0),
(1000, '1592', '274', '646', 'Petition for Winding Up', 0, ' NULL', '', 0, 0, 0),
(1001, '1592', '274', '646', 'Voluntary Winding Up', 0, ' NULL', '', 0, 0, 0),
(1002, '1592', '274', '646', 'Liquidator\'s Statement of Account', 0, ' NULL', '', 0, 0, 0),
(1003, '1592', '274', '646', 'Commencement of Winding Up by Tribunal', 0, '   NULL', '', 0, 0, 0),
(1004, '1592', '274', '646', 'Statement of Affairs', 0, '  NULL', '', 0, 0, 0),
(1005, '1592', '274', '646', 'Deficiency Account', 0, ' NULL', '', 0, 0, 0),
(1006, '1592', '274', '646', 'Overriding Preferential Payments ', 0, ' NULL', '', 0, 0, 0),
(1007, '1592', '274', '646', 'Preferential Creditors', 0, ' NULL', '', 0, 0, 0),
(1008, '1592', '274', '646', 'B List Contributories', 0, ' NULL', '', 0, 0, 0),
(1009, '1592', '274', '646', 'Liquidator\'s Final Statement of Account', 0, ' NULL', '', 0, 0, 0),
(1010, '1592', '274', '648', 'Introduction', 0, '  NULL', '', 0, 0, 0),
(1011, '1592', '274', '648', 'Definition of NBFC', 0, '  NULL', '', 0, 0, 0),
(1012, '1592', '274', '648', 'Registration', 0, '  NULL', '', 0, 0, 0),
(1013, '1592', '274', '648', 'Distinction Between an NBFC and a Bank', 0, '   NULL', '', 0, 0, 0),
(1014, '1592', '274', '648', 'Classification of NBFC', 0, ' NULL', '', 0, 0, 0),
(1015, '1592', '274', '648', 'Minimum Net Owned Fund', 0, ' NULL', '', 0, 0, 0),
(1016, '1592', '274', '648', 'Liquid Asset Requirements', 0, ' NULL', '', 0, 0, 0),
(1017, '1592', '274', '648', 'Prudential Accounting Norms', 0, ' NULL', '', 0, 0, 0),
(1018, '1592', '274', '648', 'Important Definitions', 0, ' NULL', '', 0, 0, 0),
(1019, '1592', '274', '648', 'Income Recognition', 0, ' NULL', '', 0, 0, 0),
(1020, '1592', '274', '648', 'Income from Investment', 0, '  NULL', '', 0, 0, 0),
(1021, '1592', '274', '648', 'Accounting for Investments', 0, '  NULL', '', 0, 0, 0),
(1022, '1592', '274', '648', 'Asset Classification', 0, '  NULL', '', 0, 0, 0),
(1023, '1592', '274', '648', 'Non-Performing Asset (NPA)', 0, ' NULL', '', 0, 0, 0),
(1024, '1592', '274', '648', 'Provisioning Requirements', 0, ' NULL', '', 0, 0, 0),
(1025, '1592', '274', '648', 'Accounting Year', 0, ' NULL', '', 0, 0, 0),
(1026, '1592', '274', '648', 'Disclosure in the Balance Sheet', 0, ' NULL', '', 0, 0, 0),
(1027, '1592', '274', '648', 'Preparation of Financial Statements of NBFC', 0, ' NULL', '', 0, 0, 0),
(1028, '1592', '274', '648', 'Requirement as to Capital Adequacy', 0, ' NULL', '', 0, 0, 0),
(1029, '1592', '274', '648', 'Asset-Liability Management (ALM)', 0, ' NULL', '', 0, 0, 0),
(1030, '1592', '274', '649', 'Concept of Group, Holding company and Subsidiary company', 0, ' NULL', '', 0, 0, 0),
(1031, '1592', '274', '649', 'Wholly owned and partly owned subsidiaries', 0, ' NULL', '', 0, 0, 0),
(1032, '1592', '274', '649', 'Purpose of Preparing the Consolidated Financial Statements', 0, ' NULL', '', 0, 0, 0),
(1033, '1592', '274', '649', 'Scope of AS 21', 0, ' NULL', '', 0, 0, 0),
(1034, '1592', '274', '649', 'Control', 0, ' NULL', '', 0, 0, 0),
(1035, '1592', '274', '649', 'Exclusion from Preparation of Consolidated Financial Statements', 0, ' NULL', '', 0, 0, 0),
(1036, '1592', '274', '649', 'Advantages of Consolidated Financial Statements', 0, ' NULL', '', 0, 0, 0),
(1037, '1592', '274', '649', 'Components of Consolidated Financial Statements', 0, ' NULL', '', 0, 0, 0),
(1038, '1592', '274', '649', 'Consolidation Procedures', 0, ' NULL', '', 0, 0, 0),
(1039, '1592', '274', '649', 'Calculation of Goodwill/ Capital reserve (Cost of Control)', 0, ' NULL', '', 0, 0, 0),
(1040, '1592', '274', '649', 'Minority Interests', 0, ' NULL', '', 0, 0, 0),
(1041, '1592', '274', '649', 'Profit or Loss of Subsidiary Company', 0, ' NULL', '', 0, 0, 0),
(1042, '1592', '274', '649', 'Revaluation of assets of Subsidiary Company', 0, ' NULL', '', 0, 0, 0),
(1043, '1592', '274', '649', 'Dividend received from Subsidiary Companies', 0, ' NULL', '', 0, 0, 0),
(1044, '1592', '274', '649', 'Preparation of Consolidated Balance Sheet', 0, ' NULL', '', 0, 0, 0),
(1045, '1592', '274', '649', 'Elimination of Intra-Group Transactions', 0, ' NULL', '', 0, 0, 0),
(1046, '1592', '274', '649', 'Preparation of Consolidated Profit and Loss Account', 0, ' NULL', '', 0, 0, 0),
(1047, '1592', '274', '649', 'Preparation of Consolidated Cash Flow Statement', 0, ' NULL', '', 0, 0, 0),
(1048, '1592', '274', '649', 'Uniform Accounting Policies', 0, ' NULL', '', 0, 0, 0),
(1049, '1592', '274', '649', 'Treatment of Subsidiary Company having Preference Share Capital', 0, ' NULL', '', 0, 0, 0),
(1050, '1592', '274', '649', 'Alignment of Reporting Dates', 0, ' NULL', '', 0, 0, 0),
(1053, '1592', '274', '642', 'Amalgamation of Partnership Firms', 0, ' NULL', '', 0, 0, 0),
(1054, '1592', '274', '642', 'Conversion of Partnership Firm into a Company', 0, '   NULL', '', 0, 0, 0),
(1055, '1592', '274', '642', 'Partnership-Sale to a Company', 0, '   NULL', '', 0, 0, 0),
(1056, '63', '95', 'Theory of Demand', NULL, 0, '', '', 0, 0, 0),
(1057, '63', '95', '1056', 'Factors Affecting Demand', 0, 'NULL', '', 0, 0, 0),
(1059, '1592', '274', '345', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1061, '1592', '274', '641', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1062, '1592', '274', '642', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1063, '1592', '274', '643', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1064, '1592', '274', '644', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1065, '1592', '274', '645', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1066, '1592', '274', '646', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1067, '1592', '274', '647', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1068, '1592', '274', '648', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1069, '1592', '274', '649', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1070, '1591', '309', '382', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1071, '1591', '309', '383', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1072, '1591', '309', '384', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1073, '1591', '309', '385', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1074, '1591', '309', '386', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1075, '1591', '309', '387', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1076, '1591', '309', '388', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1077, '1591', '309', '389', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1078, '1591', '309', '390', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1079, '1591', '309', '391', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1080, '1591', '309', '392', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1081, '1591', '309', '393', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1082, '1591', '309', '394', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1083, '1591', '309', '395', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1084, '1591', '309', '396', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1085, '1592', '274', '628', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1086, '1592', '274', '630', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1087, '1592', '274', '631', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1088, '1592', '274', '632', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1089, '1592', '274', '633', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1090, '1592', '274', '634', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1091, '1592', '274', '635', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1092, '1592', '274', '636', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1093, '1592', '274', '637', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1094, '1592', '274', '638', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1095, '1592', '274', '639', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1097, '63', '248', '123', NULL, 0, '', '', 0, 0, 0),
(1099, '63', '248', 'Bank Reconciliation Statement', NULL, 0, '', '', 0, 0, 0),
(1100, '63', '248', 'Inventories', NULL, 0, '', '', 0, 0, 0),
(1101, '63', '248', 'Concept and Accounting of Depreciation', NULL, 0, '', '', 0, 0, 0),
(1102, '63', '248', 'Accounting for Special Transactions', NULL, 0, '', '', 0, 0, 0),
(1104, '63', '248', 'Average Due Date', NULL, 0, '', '', 0, 0, 0),
(1105, '63', '248', 'Account Current', NULL, 0, '', '', 0, 0, 0),
(1106, '63', '248', 'Financial Statements - Final Accounts of sole proprietorship Entities', NULL, 0, '', '', 0, 0, 0),
(1107, '63', '248', 'Financial Statement of Non-For-Profit Organization ', NULL, 0, '', '', 0, 0, 0),
(1108, '63', '248', 'Rectification of Error', NULL, 0, '', '', 0, 0, 0),
(1123, '1592', '274', '629', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1124, '1592', '274', '640', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1125, '1591', '308', '711', 'Meaning of Company', 0, ' NULL', '', 0, 0, 0),
(1126, '1591', '308', '711', 'Maintenance of Books of Account ', 0, ' NULL', '', 0, 0, 0),
(1127, '1591', '308', '711', 'Statutory Books', 0, ' NULL', '', 0, 0, 0),
(1128, '1591', '308', '711', 'Annual Return', 0, ' NULL', '', 0, 0, 0),
(1129, '1591', '308', '711', 'Final Accounts', 0, ' NULL', '', 0, 0, 0),
(1130, '1591', '308', '711', 'Managerial Remuneration', 0, ' NULL', '', 0, 0, 0),
(1131, '1591', '308', '711', 'Divisible Profit', 0, ' NULL', '', 0, 0, 0),
(1132, '1591', '308', '711', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1133, '1591', '308', '712', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1134, '1591', '308', '712', 'Elements of Cash', 0, ' NULL', '', 0, 0, 0),
(1135, '1591', '308', '712', 'Classification of Cash Flow Activities', 0, ' NULL', '', 0, 0, 0),
(1136, '1591', '308', '712', 'Calculation of Cash Flows from Operating Activities', 0, ' NULL', '', 0, 0, 0),
(1137, '1591', '308', '712', 'Calculation of Cash Flows from Investing Activities', 0, ' NULL', '', 0, 0, 0),
(1138, '1591', '308', '712', 'Calculation of Cash Flows from Financing Activities', 0, ' NULL', '', 0, 0, 0),
(1139, '1591', '308', '712', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1140, '1591', '308', '713', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1141, '1591', '308', '713', 'Computing Profit or Loss Prior to Incorporation', 0, ' NULL', '', 0, 0, 0),
(1142, '1591', '308', '713', 'Basis of Apportionment', 0, ' NULL', '', 0, 0, 0),
(1143, '1591', '308', '713', 'Pre-Incorporation Profits & Losses', 0, ' NULL', '', 0, 0, 0),
(1144, '1591', '308', '713', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1145, '1591', '308', '714', 'Issue of Bonus Shares', 0, ' NULL', '', 0, 0, 0),
(1146, '1591', '308', '714', 'Right Issue', 0, ' NULL', '', 0, 0, 0),
(1147, '1591', '308', '714', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1148, '1591', '308', '715', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1149, '1591', '308', '715', 'Purpose of Issuing Redeemable Preference Shares ', 0, ' NULL', '', 0, 0, 0),
(1150, '1591', '308', '715', 'Provisions of the Companies Act (Section 55)', 0, ' NULL', '', 0, 0, 0),
(1151, '1591', '308', '715', 'Methods of Redemption of Fully Paid-Up Shares', 0, ' NULL', '', 0, 0, 0),
(1152, '1591', '308', '715', 'Redemption of Partly Called-Up Preference Shares', 0, ' NULL', '', 0, 0, 0),
(1153, '1591', '308', '715', 'Redemption of Fully Called but Partly Paid-Up Preference Shares', 0, ' NULL', '', 0, 0, 0),
(1154, '1591', '308', '715', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1155, '1591', '308', '716', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1156, '1591', '308', '716', 'Redemption of Debentures', 0, ' NULL', '', 0, 0, 0),
(1157, '1591', '308', '716', 'Debenture Redemption Reserve', 0, ' NULL', '', 0, 0, 0),
(1158, '1591', '308', '716', 'Methods of Redemption of Debentures', 0, ' NULL', '', 0, 0, 0),
(1159, '1591', '308', '716', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1160, '1591', '308', '717', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1161, '1591', '308', '717', 'Classification of Investments', 0, ' NULL', '', 0, 0, 0),
(1162, '1591', '308', '717', 'Cost of Investments', 0, ' NULL', '', 0, 0, 0),
(1163, '1591', '308', '717', 'Disposal of Investments', 0, ' NULL', '', 0, 0, 0),
(1164, '1591', '308', '717', 'Reclassification of Investments', 0, ' NULL', '', 0, 0, 0),
(1165, '1591', '308', '717', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1166, '1591', '308', '718', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1167, '1591', '308', '718', 'Meaning of Fire', 0, ' NULL', '', 0, 0, 0),
(1168, '1591', '308', '718', 'Claim for Loss of Stock', 0, ' NULL', '', 0, 0, 0),
(1169, '1591', '308', '718', 'Claim for Loss of Profit', 0, ' NULL', '', 0, 0, 0),
(1170, '1591', '308', '718', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1171, '1591', '308', '719', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1172, '1591', '308', '719', 'Nature of Hire Purchase Agreement', 0, ' NULL', '', 0, 0, 0),
(1173, '1591', '308', '719', 'Special Features of Hire Purchase Agreement', 0, ' NULL', '', 0, 0, 0),
(1174, '1591', '308', '719', 'Terms Used in Hire Purchase Agreements ', 0, ' NULL', '', 0, 0, 0),
(1175, '1591', '308', '719', 'Ascertainment of Cash Price', 0, ' NULL', '', 0, 0, 0),
(1176, '1591', '308', '719', 'Ascertainment of Interest', 0, ' NULL', '', 0, 0, 0),
(1177, '1591', '308', '719', 'Accounting for Hire Purchase Transaction', 0, ' NULL', '', 0, 0, 0),
(1178, '1591', '308', '719', 'Repossession', 0, ' NULL', '', 0, 0, 0),
(1179, '1591', '308', '719', 'Instalment Payment System', 0, ' NULL', '', 0, 0, 0),
(1180, '1591', '308', '719', 'Difference of Hire Purchase Agreement and Instalment Payment Agreement', 0, ' NULL', '', 0, 0, 0),
(1181, '1591', '308', '719', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1182, '1591', '308', '721', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1183, '1591', '308', '721', 'Distinct between Branch Accounts and Departmental Accounts', 0, ' NULL', '', 0, 0, 0),
(1184, '1591', '308', '721', 'Dependent Branches', 0, ' NULL', '', 0, 0, 0),
(1185, '1591', '308', '721', 'Methods of Charging Goods to Branches', 0, ' NULL', '', 0, 0, 0),
(1186, '1591', '308', '721', 'Accounting for Dependent Branches', 0, ' NULL', '', 0, 0, 0),
(1187, '1591', '308', '721', 'Accounting for Independent Branches', 0, ' NULL', '', 0, 0, 0),
(1188, '1591', '308', '721', 'Adjustment and Reconciliation of Branch & Head Office Accounts', 0, ' NULL', '', 0, 0, 0),
(1189, '1591', '308', '721', 'Incorporation of Branch Balance in Head Office Books', 0, ' NULL', '', 0, 0, 0),
(1190, '1591', '308', '721', 'Incomplete information in Branch Books', 0, ' NULL', '', 0, 0, 0),
(1191, '1591', '308', '721', 'Foreign Branches', 0, ' NULL', '', 0, 0, 0),
(1192, '1591', '308', '721', 'Accounting for Foreign Branches', 0, ' NULL', '', 0, 0, 0),
(1193, '1591', '308', '721', 'Techniques for Foreign Currency Translation', 0, ' NULL', '', 0, 0, 0),
(1194, '1591', '308', '721', 'Change in Classification', 0, ' NULL', '', 0, 0, 0),
(1195, '1591', '308', '721', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1196, '1591', '308', '722', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1197, '1591', '308', '722', 'Types', 0, ' NULL', '', 0, 0, 0),
(1198, '1591', '308', '722', 'Ascertainment of Profit by Capital Comparison', 0, ' NULL', '', 0, 0, 0),
(1199, '1591', '308', '722', 'Techniques of Obtaining Complete Accounting Information', 0, ' NULL', '', 0, 0, 0),
(1200, '1591', '308', '722', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1201, '1591', '308', '720', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1202, '1591', '308', '720', 'Advantages of Departmental Accounting', 0, ' NULL', '', 0, 0, 0),
(1203, '1591', '308', '720', 'Methods of Departmental Accounting', 0, ' NULL', '', 0, 0, 0),
(1204, '1591', '308', '720', 'Basis of Allocation of Common Expenditure among Different Departments', 0, ' NULL', '', 0, 0, 0),
(1205, '1591', '308', '720', 'Types of Departments', 0, ' NULL', '', 0, 0, 0),
(1206, '1591', '308', '720', 'Inter-Departmental Transfers', 0, ' NULL', '', 0, 0, 0),
(1207, '1591', '308', '720', 'Memorandum Stock and Memorandum Mark Up Account Method', 0, ' NULL', '', 0, 0, 0),
(1208, '1591', '308', '720', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1209, '1591', '308', '703', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1210, '1591', '308', '704', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1211, '1591', '308', '705', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1212, '1591', '308', '707', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1213, '1591', '308', '708', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1214, '1591', '308', '709', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1215, '1591', '308', '710', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1217, '1591', '308', '706', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1218, '1591', '310', '723', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1219, '1591', '310', '723', 'Direct and Indirect Taxes', 0, ' NULL', '', 0, 0, 0),
(1220, '1591', '310', '723', 'Features of Indirect Taxes', 0, ' NULL', '', 0, 0, 0),
(1221, '1591', '310', '723', 'Genesis of GST in India ', 0, ' NULL', '', 0, 0, 0),
(1222, '1591', '310', '723', 'Concept of GST', 0, ' NULL', '', 0, 0, 0),
(1223, '1591', '310', '723', 'Need for GST in India ', 0, ' NULL', '', 0, 0, 0),
(1224, '1591', '310', '723', 'Framework of GST as introduced in India', 0, ' NULL', '', 0, 0, 0),
(1225, '1591', '310', '723', 'Benefit of GST', 0, ' NULL', '', 0, 0, 0),
(1226, '1591', '310', '723', 'Constitutional Provisions', 0, ' NULL', '', 0, 0, 0),
(1227, '1591', '310', '723', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1228, '1591', '310', '724', 'Introduction ', 0, ' NULL', '', 0, 0, 0),
(1229, '1591', '310', '724', 'Relevant Definitions ', 0, ' NULL', '', 0, 0, 0),
(1230, '1591', '310', '724', 'Concept of Supply (Section 7 of CGST Act)', 0, ' NULL', '', 0, 0, 0),
(1231, '1591', '310', '724', 'Composite and Mixed Supplies (Section 8)', 0, ' NULL', '', 0, 0, 0),
(1232, '1591', '310', '724', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1233, '1591', '310', '725', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1234, '1591', '310', '725', 'Relevant Definitions', 0, ' NULL', '', 0, 0, 0),
(1235, '1591', '310', '725', 'Extent and Commencement of GST Law', 0, ' NULL', '', 0, 0, 0),
(1236, '1591', '310', '725', 'Levy & Collection of CGST & IGST (Sec.9 of CGST Act and Sec.5 of IGST Act)', 0, ' NULL', '', 0, 0, 0),
(1237, '1591', '310', '725', 'Composition Levy (Sec.10 of the CGST Act)', 0, ' NULL', '', 0, 0, 0),
(1238, '1591', '310', '725', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1239, '1591', '310', '726', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1240, '1591', '310', '726', 'Power of Grant Exemption from Tax (Sec.11 of the CGST Act/ Sec.6 of the IGST Act)', 0, ' NULL', '', 0, 0, 0),
(1241, '1591', '310', '726', 'Goods Exempt from Tax', 0, ' NULL', '', 0, 0, 0),
(1242, '1591', '310', '726', 'List of Services Exempt from Tax', 0, ' NULL', '', 0, 0, 0),
(1243, '1591', '310', '726', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1244, '1591', '310', '727', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1245, '1591', '310', '727', 'Relevant Definitions', 0, ' NULL', '', 0, 0, 0),
(1246, '1591', '310', '727', 'Time of Supply of Goods (Section 12)', 0, ' NULL', '', 0, 0, 0),
(1247, '1591', '310', '727', 'Time of Supply of Services (Section 13)', 0, '  NULL', '', 0, 0, 0),
(1248, '1591', '310', '727', 'Questions for Practice', 0, '  NULL', '', 0, 0, 0),
(1249, '1591', '310', '728', 'Introduction', 0, '  NULL', '', 0, 0, 0),
(1250, '1591', '310', '728', 'Relevant Definitions', 0, '  NULL', '', 0, 0, 0),
(1251, '1591', '310', '728', 'Value of Supply (Section 15)', 0, ' NULL', '', 0, 0, 0),
(1252, '1591', '310', '728', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1253, '1591', '310', '729', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1254, '1591', '310', '729', 'Relevant Definitions', 0, ' NULL', '', 0, 0, 0),
(1255, '1591', '310', '729', 'Eligibility and Conditions for taking Input Tax Credit (Section 16)', 0, ' NULL', '', 0, 0, 0),
(1256, '1591', '310', '729', 'Apportionment of Credit & Blocked Credits (Section 17)', 0, ' NULL', '', 0, 0, 0),
(1257, '1591', '310', '729', 'Credit in Special Circumstances (Section 18)', 0, ' NULL', '', 0, 0, 0),
(1258, '1591', '310', '729', 'How ITC is utilized', 0, ' NULL', '', 0, 0, 0),
(1259, '1591', '310', '729', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1260, '1591', '310', '730', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1261, '1591', '310', '730', 'Relevant Definitions', 0, ' NULL', '', 0, 0, 0),
(1262, '1591', '310', '730', 'Concept of taxable Person (Section 2(107) )', 0, ' NULL', '', 0, 0, 0),
(1263, '1591', '310', '730', 'Persons Liable for Registration (Section 22)', 0, ' NULL', '', 0, 0, 0),
(1264, '1591', '310', '730', 'Compulsory Registration in Certain Cases (Section 24)', 0, ' NULL', '', 0, 0, 0),
(1265, '1591', '310', '730', 'Persons Not Liable for Registration (Section 23)', 0, ' NULL', '', 0, 0, 0),
(1266, '1591', '310', '730', 'Procedure for Registration (Section 25/26 &27)', 0, ' NULL', '', 0, 0, 0),
(1267, '1591', '310', '730', 'Amendment of Registration (Section 28)', 0, ' NULL', '', 0, 0, 0),
(1268, '1591', '310', '730', 'Cancellation or Suspension of Registration and Revocation of Cancellation (Section 29 & 30)', 0, ' NULL', '', 0, 0, 0),
(1269, '1591', '310', '730', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1270, '1591', '310', '731', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1271, '1591', '310', '731', 'Relevant Definitions', 0, ' NULL', '', 0, 0, 0),
(1272, '1591', '310', '731', 'Tax Invoice (Section 31)', 0, ' NULL', '', 0, 0, 0),
(1273, '1591', '310', '731', 'Credit and Debit Notes (Section 34)', 0, ' NULL', '', 0, 0, 0),
(1274, '1591', '310', '731', 'Prohibition of Unauthorized Collection of Tax (Section 32)', 0, ' NULL', '', 0, 0, 0),
(1275, '1591', '310', '731', 'Amount of Tax to be Indicated in Tax Invoice and other Documents (Section 33)', 0, ' NULL', '', 0, 0, 0),
(1276, '1591', '310', '731', 'E-Way Bill (Section 68 read with relevant CGST Rules,2017)', 0, ' NULL', '', 0, 0, 0),
(1277, '1591', '310', '731', 'Questions for Practice ', 0, ' NULL', '', 0, 0, 0),
(1278, '1591', '310', '732', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1279, '1591', '310', '732', 'Relevant Definitions', 0, ' NULL', '', 0, 0, 0),
(1280, '1591', '310', '732', 'Payment of Tax/Interest/Penalty and Other Amounts (Section 49) ', 0, ' NULL', '', 0, 0, 0),
(1281, '1591', '310', '732', 'Interest on Delayed Payment of Tax (Section 50)', 0, ' NULL', '', 0, 0, 0),
(1282, '1591', '310', '732', 'Transfer of Input Tax Credit (Section 53 of CGST Act & Section 18 of IGST Act)', 0, ' NULL', '', 0, 0, 0),
(1283, '1591', '310', '732', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1284, '1591', '310', '733', 'Introduction', 0, ' NULL', '', 0, 0, 0),
(1285, '1591', '310', '733', 'Relevant Definitions', 0, ' NULL', '', 0, 0, 0),
(1286, '1591', '310', '733', 'Furnishing Details of Outward Supplies (Section 37 read with rule 59 of CGST Rules)', 0, ' NULL', '', 0, 0, 0),
(1287, '1591', '310', '733', 'Furnishing Details of Inward Supplies (Section 38 read with rule 60 of the CGST Rules)', 0, ' NULL', '', 0, 0, 0),
(1288, '1591', '310', '733', 'Furnishing of Returns under Section 39', 0, ' NULL', '', 0, 0, 0),
(1289, '1591', '310', '733', 'Other Returns', 0, ' NULL', '', 0, 0, 0),
(1290, '1591', '310', '733', 'Default/ Delay in Furnishing Return (Sections 46 & 47)', 0, ' NULL', '', 0, 0, 0),
(1291, '1591', '310', '733', 'Goods and Services Tax Practitioners (Section 48)', 0, '  NULL', '', 0, 0, 0),
(1292, '1591', '310', '733', 'Questions for Practice', 0, ' NULL', '', 0, 0, 0),
(1293, '211', '329', 'Material Cost Control', NULL, 0, '', '', 0, 0, 0),
(1294, '211', '329', 'Issue and Valuation of Material', NULL, 0, '', '', 0, 0, 0),
(1295, '211', '329', 'Labour Cost Control 1: General', NULL, 0, '', '', 0, 0, 0),
(1296, '211', '329', 'Labour Cost Control 2: Methods of Remuneration Labour', NULL, 0, '', '', 0, 0, 0),
(1297, '211', '329', 'Overhead Cost Control 1: Classification, Allocation and Appotionmemt', NULL, 0, '', '', 0, 0, 0),
(1298, '211', '329', 'Overhead Cost Control 2: Absorption of Overheads', NULL, 0, '', '', 0, 0, 0),
(1299, '211', '329', 'Unit and Single Output Costing Method ', NULL, 0, '', '', 0, 0, 0),
(1300, '211', '329', 'Reconciliation of Cost and Financial Accounts', NULL, 0, '', '', 0, 0, 0),
(1301, '211', '329', 'Process and Operation Costing Method', NULL, 0, '', '', 0, 0, 0),
(1302, '211', '329', 'Operating Costing Method', NULL, 0, '', '', 0, 0, 0),
(1303, '211', '329', 'Job Batch and Contract Costing Method', NULL, 0, '', '', 0, 0, 0),
(1304, '211', '329', 'Standar Costing : Material and Labour Variance', NULL, 0, '', '', 0, 0, 0),
(1305, '63', '248', 'Sale of Goods On Approval Or Return Basis', NULL, 0, '', '', 0, 0, 0),
(1306, '63', '248', 'Theoretical Framework Theory', NULL, 0, '', '', 0, 0, 0),
(1307, '63', '248', 'Accounting Process', NULL, 0, '', '', 0, 0, 0),
(1308, '63', '248', 'Accounting For Partnership Firms: Fundamentals ', NULL, 0, '', '', 0, 0, 0),
(1309, '63', '248', 'Goodwill: Nature And Valuation', NULL, 0, '', '', 0, 0, 0),
(1310, '63', '248', 'Admission of A Partner', NULL, 0, '', '', 0, 0, 0),
(1311, '63', '248', 'Retirement of A Partner', NULL, 0, '', '', 0, 0, 0),
(1312, '63', '248', 'Death of A Partner', NULL, 0, '', '', 0, 0, 0),
(1313, '63', '248', 'Company Account- Introduction ', NULL, 0, '', '', 0, 0, 0),
(1314, '63', '248', 'Company Account: Issue of Share', NULL, 0, '', '', 0, 0, 0),
(1315, '63', '248', 'Company Account: Issue of Debentures', NULL, 0, '', '', 0, 0, 0),
(1316, '63', '248', NULL, '', 0, 'NULL', '', 0, 0, 0),
(1317, '63', '248', NULL, '', 0, 'NULL', '', 0, 0, 0),
(1320, '63', '248', NULL, '', 0, 'NULL', '', 0, 0, 0),
(1321, '63', '248', 'Array', '', 0, 'NULL', '', 0, 0, 0),
(1322, '63', '248', '604', 'Valuation of Abnormal Loss', 0, 'NULL', '', 0, 0, 0),
(1323, '63', '248', '604', 'Accounting Treatments for advance given by Consignee', 0, 'NULL', '', 0, 0, 0),
(1324, '63', '248', '604', 'Valuation of Closing Stock ', 0, 'NULL', '', 0, 0, 0),
(1325, '63', '248', '604', 'Adjustment for Commission ', 0, 'NULL', '', 0, 0, 0),
(1326, '63', '248', '604', 'Accounting Treatment regarding Dispatch of Goods by Consignor', 0, 'NULL', '', 0, 0, 0),
(1327, '63', '248', '604', 'Accounting Treatment in the books of Consignor', 0, 'NULL', '', 0, 0, 0),
(1328, '63', '248', '604', 'Accounting Treatment in the books of Consignee', 0, 'NULL', '', 0, 0, 0),
(1329, '63', '248', '604', 'Questions and Practice ', 0, 'NULL', '', 0, 0, 0),
(1330, '63', '248', '604', 'Theory ', 0, 'NULL', '', 0, 0, 0),
(1331, '63', '248', '1099', 'Procedure for Bank Reconciliation Statement', 0, 'NULL', '', 0, 0, 0),
(1332, '63', '248', '1099', 'When Debit Balance of Cash Book Given', 0, 'NULL', '', 0, 0, 0),
(1333, '63', '248', '1099', 'When Credit Balance of Cash Book is Given', 0, 'NULL', '', 0, 0, 0),
(1337, '63', '248', '1099', 'When Debit Balance of Cash Book Given', 0, 'NULL', '', 0, 0, 0),
(1338, '63', '248', '1099', 'When Credit Balance of Cash Book is Given', 0, 'NULL', '', 0, 0, 0),
(1339, '63', '248', '1099', 'When Debit Balance of Pass Book Given', 0, 'NULL', '', 0, 0, 0),
(1340, '63', '248', '1099', 'When Credit Balance of Pass Book Given', 0, 'NULL', '', 0, 0, 0),
(1341, '63', '248', '1099', 'Preparation of Adjusted Cash Book and BRS', 0, 'NULL', '', 0, 0, 0),
(1342, '63', '248', '1099', 'Practice Questions', 0, 'NULL', '', 0, 0, 0),
(1343, '63', '248', '1099', 'Theoretical Framework and Concept', 0, 'NULL', '', 0, 0, 0),
(1344, '63', '248', '1100', 'Historical Cost Methods for Valuation of Inventory', 0, 'NULL', '', 0, 0, 0),
(1345, '63', '248', '1100', 'Non Historical Cost Methods for Valuation of Inventory', 0, 'NULL', '', 0, 0, 0),
(1346, '63', '248', '1100', 'Practice Questions ', 0, 'NULL', '', 0, 0, 0),
(1347, '63', '248', '1100', 'Theoretical Framework and Concept', 0, 'NULL', '', 0, 0, 0),
(1348, '63', '248', '1100', 'First In First Out Method (FIFO)', 0, 'NULL', '', 0, 0, 0),
(1349, '63', '248', '1100', 'Lat in First Out Method (LIFO)', 0, 'NULL', '', 0, 0, 0),
(1350, '63', '248', '1100', 'Simple Average Price Method ', 0, 'NULL', '', 0, 0, 0),
(1351, '63', '248', '1100', 'Weighted Average Price Method', 0, 'NULL', '', 0, 0, 0),
(1352, '63', '248', '1100', 'Adjusted Selling Price Method', 0, 'NULL', '', 0, 0, 0),
(1353, '63', '248', '1100', 'Historical Cost Methods for Valuation of Inventory', 0, 'NULL', '', 0, 0, 0),
(1354, '63', '248', '1100', 'Non Historical Cost Methods for Valuation of Inventory', 0, 'NULL', '', 0, 0, 0),
(1355, '63', '248', '1100', 'Practice Questions ', 0, 'NULL', '', 0, 0, 0),
(1356, '63', '248', '1100', 'Theoretical Framework and Concept', 0, 'NULL', '', 0, 0, 0),
(1357, '63', '248', '1100', 'First In First Out Method (FIFO)', 0, 'NULL', '', 0, 0, 0),
(1358, '63', '248', '1100', 'Lat in First Out Method (LIFO)', 0, 'NULL', '', 0, 0, 0),
(1359, '63', '248', '1100', 'Simple Average Price Method ', 0, 'NULL', '', 0, 0, 0),
(1360, '63', '248', '1100', 'Weighted Average Price Method', 0, 'NULL', '', 0, 0, 0),
(1361, '63', '248', '1100', 'Adjusted Selling Price Method', 0, 'NULL', '', 0, 0, 0),
(1362, '211', '328', 'B Com Dummy', NULL, 0, '', '', 0, 0, 0),
(1372, '1592', '276', '670', 'Questions for Practice', 3, '  ', '', 0, 0, 0),
(1373, '211', '329', '1293', 'Computation of Stock Level ', 0, '', '', 0, 0, 0),
(1374, '211', '329', '1293', 'Economic Order QuantitynEOQ', 0, '', '', 0, 0, 0),
(1375, '211', '329', '1293', 'Material Turnover ', 0, '', '', 0, 0, 0),
(1376, '211', '329', '1293', '', 0, '', '', 0, 0, 0),
(1377, '211', '329', '1293', 'Computation of Stock Level ', 0, '', '', 0, 0, 0),
(1378, '211', '329', '1293', 'Economic Order QuantitynEOQ', 0, '', '', 0, 0, 0),
(1379, '211', '329', '1293', 'Material Turnover ', 0, '', '', 0, 0, 0),
(1380, '211', '329', '1294', 'First in First Out', 0, '', '', 0, 0, 0),
(1381, '211', '329', '1294', 'Last in First Out', 0, '', '', 0, 0, 0),
(1382, '211', '329', '1294', 'Simple Average Method', 0, '', '', 0, 0, 0),
(1383, '211', '329', '1294', 'Weighted Average Method', 0, '', '', 0, 0, 0),
(1384, '211', '329', '1304', 'Labour Turnover Ratio', 0, '', '', 0, 0, 0),
(1385, '211', '329', '1304', 'Daily and Weekly Wages', 0, '', '', 0, 0, 0),
(1386, '211', '329', '1296', 'Time Rate Method ', 0, '', '', 0, 0, 0),
(1387, '211', '329', '1296', 'Piece Rate Method ', 0, '', '', 0, 0, 0),
(1388, '211', '329', '1296', 'Halsey Premium Plan', 0, '', '', 0, 0, 0),
(1389, '211', '329', '1296', 'Rowan Bonus Scheme', 0, '', '', 0, 0, 0),
(1390, '63', '248', '1101', 'Straight Line Depreciation Method', 0, '', '', 0, 0, 0),
(1391, '63', '248', '1101', ' Diminishing Balance Method.', 0, '', '', 0, 0, 0),
(1392, '63', '248', '1101', 'Sum of Years\\\' Digits Method', 0, '', '', 0, 0, 0),
(1393, '63', '248', '1101', 'Annuity Method', 0, '', '', 0, 0, 0),
(1394, '63', '248', '1101', 'Sinking Fund Method.', 0, '', '', 0, 0, 0),
(1395, '63', '248', '1101', 'Accounting Treatment of Profit/Loss on sale of Fixed Assets ', 0, '', '', 0, 0, 0),
(1396, '63', '248', '1101', 'Accounting impacts of change in the methods of Deprecation ', 0, '', '', 0, 0, 0),
(1397, '63', '248', '1101', 'Sinking Fund Method', 0, '', '', 0, 0, 0),
(1398, '63', '248', '1101', 'Practice Questions', 0, '', '', 0, 0, 0),
(1399, '63', '248', '1101', 'Depreciation Theory & Concept ', 0, '', '', 0, 0, 0),
(1400, '63', '248', '1104', 'When only one Party is involved', 0, '', '', 0, 0, 0),
(1401, '63', '248', '1104', ' Inter-transactions between two Parties', 0, '', '', 0, 0, 0),
(1402, '63', '248', '1104', 'When the amount is paid in Instalments', 0, '', '', 0, 0, 0),
(1403, '63', '248', '1104', 'Calculation of average due date for calculating interest on drawings.', 0, '', '', 0, 0, 0),
(1404, '63', '248', '1104', 'Practice Questions', 0, '', '', 0, 0, 0),
(1405, '63', '248', '1104', 'Theory of Average Due Date', 0, '', '', 0, 0, 0),
(1406, '63', '248', '1105', 'Interest Table Methods', 0, '', '', 0, 0, 0),
(1407, '63', '248', '1105', 'Product Method', 0, '', '', 0, 0, 0),
(1408, '63', '248', '1105', 'Product Method- Red Ink Method', 0, '', '', 0, 0, 0),
(1409, '63', '248', '1105', 'Product Balance Method', 0, '', '', 0, 0, 0),
(1410, '63', '248', '1105', 'Practice Questions', 0, '', '', 0, 0, 0);
INSERT INTO `courses` (`id`, `course_name`, `subject`, `chapter`, `topic`, `topic_level`, `content`, `assessment`, `fee`, `test`, `sort`) VALUES
(1411, '63', '248', '1105', 'Theory of Account Current', 0, '', '', 0, 0, 0),
(1412, '63', '248', '1106', 'Preparation of Manufacturing A/c', 0, '', '', 0, 0, 0),
(1413, '63', '248', '1106', 'Preparation of Trading A/c', 0, '', '', 0, 0, 0),
(1414, '63', '248', '1106', 'Preparation of Profit and Loss A/c', 0, '', '', 0, 0, 0),
(1415, '63', '248', '1106', 'Preparation of Balance Sheet', 0, '', '', 0, 0, 0),
(1416, '63', '248', '1106', 'Adjustments : Provision for Bad & Doubt Debts', 0, '', '', 0, 0, 0),
(1417, '63', '248', '1106', 'Provision for Discount on Debtors', 0, '', '', 0, 0, 0),
(1418, '63', '248', '1106', 'Reserve for Discount on Creditors', 0, '', '', 0, 0, 0),
(1419, '63', '248', '1106', 'Goods used for other purposes that sale', 0, '', '', 0, 0, 0),
(1420, '63', '248', '1106', 'Adjustment for Income Tax', 0, '', '', 0, 0, 0),
(1421, '63', '248', '1106', 'Summary of treatment for Adjustment before Trial Balance and after Trial Balance', 0, '', '', 0, 0, 0),
(1422, '63', '248', '1106', 'Preparation of Manufacturing A/c', 0, '', '', 0, 0, 0),
(1423, '63', '248', '1106', 'Preparation of Trading A/c', 0, '', '', 0, 0, 0),
(1424, '63', '248', '1106', 'Preparation of Profit and Loss A/c', 0, '', '', 0, 0, 0),
(1425, '63', '248', '1106', 'Preparation of Balance Sheet', 0, '', '', 0, 0, 0),
(1426, '63', '248', '1106', 'Adjustments : Provision for Bad & Doubt Debts', 0, '', '', 0, 0, 0),
(1427, '63', '248', '1106', 'Provision for Discount on Debtors', 0, '', '', 0, 0, 0),
(1428, '63', '248', '1106', 'Reserve for Discount on Creditors', 0, '', '', 0, 0, 0),
(1429, '63', '248', '1106', 'Goods used for other purposes that sale', 0, '', '', 0, 0, 0),
(1430, '63', '248', '1106', 'Adjustment for Income Tax', 0, '', '', 0, 0, 0),
(1431, '63', '248', '1106', 'Summary of treatment for Adjustment before Trial Balance and after Trial Balance', 0, '', '', 0, 0, 0),
(1432, '63', '248', '1106', 'Practice Questions ', 0, '', '', 0, 0, 0),
(1433, '63', '248', '1106', 'Theory', 0, '', '', 0, 0, 0),
(1434, '211', '329', '1299', 'Statement of cost ', 0, '', '', 0, 0, 0),
(1435, '211', '329', '1299', 'Cost Sheet', 0, '', '', 0, 0, 0),
(1436, '211', '329', '1299', 'Valuation of Work in Progress', 0, '', '', 0, 0, 0),
(1437, '211', '329', '1299', 'Valuation of Finished Goods', 0, '', '', 0, 0, 0),
(1438, '211', '329', '1299', 'Determination of Selling Price', 0, '', '', 0, 0, 0),
(1439, '211', '329', '1299', 'Estimated Cost Statement and Tender Price', 0, '', '', 0, 0, 0),
(1440, '211', '329', '1299', 'Prodution Account', 0, '', '', 0, 0, 0),
(1441, '211', '329', '1300', 'From of Reconciliation Statement', 0, '', '', 0, 0, 0),
(1442, '211', '329', '1300', ' Reconciliation Between Cost and Financial Account Profit', 0, '', '', 0, 0, 0),
(1443, '210', 'Math', NULL, NULL, 0, '', '', 6000, 0, 0),
(1444, '63', '248', 'Bank Reconciliation ', NULL, 0, '', '', 0, 0, 0),
(1445, '63', '248', '1107', '', 0, '', '', 0, 0, 0),
(1446, '63', '248', '1107', 'Format of Receipts & Payment Account', 0, '', '', 0, 0, 0),
(1447, '63', '248', '1107', 'Format of Income & Expenditure Account', 0, '', '', 0, 0, 0),
(1448, '63', '248', '1107', 'Accounting Treatment of Subscriptions', 0, '', '', 0, 0, 0),
(1449, '63', '248', '1107', 'Accounting Treatment of Entrance/Admission Fees', 0, '', '', 0, 0, 0),
(1450, '63', '248', '1107', 'Treatment of Donation and Legacies', 0, '', '', 0, 0, 0),
(1451, '63', '248', '1107', 'Treatment of Sale of Old newspapers & Periodicals and Aid from Govt.', 0, '', '', 0, 0, 0),
(1452, '63', '248', '1107', 'Treatment of Consumable items consumed during the year', 0, '', '', 0, 0, 0),
(1453, '63', '248', '1107', 'Treatment of Profit/Loss from Trading Activities', 0, '', '', 0, 0, 0),
(1454, '63', '248', '1107', 'Fund Base Accounting', 0, '', '', 0, 0, 0),
(1455, '63', '248', '1107', 'Preparation of Receipts and Payment Accounts when Cash A/c is given', 0, '', '', 0, 0, 0),
(1456, '63', '248', '1107', 'Preparation of Income and Expenditure when Receipts and Payment & Other information are given is given', 0, '', '', 0, 0, 0),
(1457, '63', '248', '1107', 'Preparation of Receipts and Payments Accounts when Income and Expenditure A/c and Balance sheet given', 0, '', '', 0, 0, 0),
(1458, '63', '248', '1107', 'Preparation of Income and Expenditure when Opening and Closing balance sheet is givern', 0, '', '', 0, 0, 0),
(1459, '63', '248', '1107', 'Treatment of Cash Defalcation ', 0, '', '', 0, 0, 0),
(1460, '63', '248', '1107', 'Theory and Concept  ', 0, '', '', 0, 0, 0),
(1461, '63', '248', '1107', 'Patrice Questions ', 0, '', '', 0, 0, 0),
(1462, '63', '248', '1108', '  Types of Errors', 0, '', '', 0, 0, 0),
(1463, '63', '248', '1108', 'Rectification of Errors', 0, '', '', 0, 0, 0),
(1464, '63', '248', '1108', 'Before Preparation of Trial Balance', 0, '', '', 0, 0, 0),
(1465, '63', '248', '1108', 'After Trial Balance but before the final accounts are drawn', 0, '', '', 0, 0, 0),
(1466, '63', '248', '1108', 'After final accounts or in the next accounting period', 0, '', '', 0, 0, 0),
(1467, '63', '248', '1108', 'Theory ', 0, '', '', 0, 0, 0),
(1468, '63', '248', '1108', 'Practice Questions', 0, '', '', 0, 0, 0),
(1469, '63', '248', '1305', 'When Transactions are very less', 0, '', '', 0, 0, 0),
(1470, '63', '248', '1305', 'When Transactions are very Frequent', 0, '', '', 0, 0, 0),
(1471, '63', '248', '1305', 'When Transactions are very frequent and numerous', 0, '', '', 0, 0, 0),
(1472, '63', '248', '1305', 'Theory', 0, '', '', 0, 0, 0),
(1473, '63', '248', '1305', 'Practice Questions', 0, '', '', 0, 0, 0),
(1474, '63', '248', '1308', 'Final Accounts of Partnership', 0, '', '', 0, 0, 0),
(1475, '63', '248', '1308', 'Fixed and Fluctuating Capital Account', 0, '', '', 0, 0, 0),
(1476, '63', '248', '1308', 'Profit & Loss Appropriation Account', 0, '', '', 0, 0, 0),
(1477, '63', '248', '1308', 'Adjustments of Interest on Capital', 0, '', '', 0, 0, 0),
(1478, '63', '248', '1308', 'Adjustments of Interest on Drawing', 0, '', '', 0, 0, 0),
(1479, '63', '248', '1308', '', 0, '', '', 0, 0, 0),
(1480, '63', '248', '1308', 'Divisible of Profits among Partners', 0, '', '', 0, 0, 0),
(1481, '63', '248', '1308', 'Guarantee of Profit by Firm ', 0, '', '', 0, 0, 0),
(1482, '63', '248', '1308', 'Guarantee of Profit by Partners', 0, '', '', 0, 0, 0),
(1483, '63', '248', '1308', 'Adjustments ', 0, '', '', 0, 0, 0),
(1484, '63', '248', '1308', 'Divisible of Profits among Partners', 0, '', '', 0, 0, 0),
(1485, '63', '248', '1308', 'Guarantee of Profit by Firm ', 0, '', '', 0, 0, 0),
(1486, '63', '248', '1308', 'Guarantee of Profit by Partners', 0, '', '', 0, 0, 0),
(1487, '63', '248', '1308', 'Adjustments ', 0, '', '', 0, 0, 0),
(1488, '63', '248', '1308', 'Adjustment in the closed Accounts', 0, '', '', 0, 0, 0),
(1489, '63', '248', '1308', 'By passing single adjustment entry', 0, '', '', 0, 0, 0),
(1490, '63', '248', '1308', 'By Preparing P&L Appropriation Account', 0, '', '', 0, 0, 0),
(1491, '63', '248', '1308', 'Theories of fundamnetal Accounts', 0, '', '', 0, 0, 0),
(1492, '63', '248', '1308', 'Practice Questions ', 0, '', '', 0, 0, 0),
(1493, '63', '248', '1309', 'Classification of Goodwill: Purchase of Goodwill', 0, '', '', 0, 0, 0),
(1494, '63', '248', '1309', 'Self Generated Goodwill or inherent Goodwill', 0, '', '', 0, 0, 0),
(1495, '63', '248', '1309', 'Methods of Valuation of Goodwill: ', 0, '', '', 0, 0, 0),
(1496, '63', '248', '1309', 'Average Profit Method', 0, '', '', 0, 0, 0),
(1497, '63', '248', '1309', 'Super Profit Method', 0, '', '', 0, 0, 0),
(1498, '63', '248', '1309', 'Capitalisation Method', 0, '', '', 0, 0, 0),
(1499, '63', '248', '1309', 'Hidden Goodwill', 0, '', '', 0, 0, 0),
(1500, '63', '248', '1309', 'Theory ', 0, '', '', 0, 0, 0),
(1501, '63', '248', '1309', 'Practice Questions', 0, '', '', 0, 0, 0),
(1502, '63', '248', '1309', 'Classification of Goodwill: Purchase of Goodwill', 0, '', '', 0, 0, 0),
(1503, '63', '248', '1309', 'Self Generated Goodwill or inherent Goodwill', 0, '', '', 0, 0, 0),
(1504, '63', '248', '1309', 'Methods of Valuation of Goodwill: ', 0, '', '', 0, 0, 0),
(1505, '63', '248', '1309', 'Average Profit Method', 0, '', '', 0, 0, 0),
(1506, '63', '248', '1309', 'Super Profit Method', 0, '', '', 0, 0, 0),
(1507, '63', '248', '1309', 'Capitalisation Method', 0, '', '', 0, 0, 0),
(1508, '63', '248', '1309', 'Hidden Goodwill', 0, '', '', 0, 0, 0),
(1509, '63', '248', '1309', 'Theory ', 0, '', '', 0, 0, 0),
(1510, '63', '248', '1309', 'Practice Questions', 0, '', '', 0, 0, 0),
(1511, '63', '248', '1310', 'Change in Profit-Sharing Ratio: Determining New Profit Ratio and Sacrificing Ratio', 0, '', '', 0, 0, 0),
(1512, '63', '248', '1310', 'Treatment of Goodwill in Different Cases', 0, '', '', 0, 0, 0),
(1513, '63', '248', '1310', 'When the amount of goodwill is bring by incoming partner either in cash or in kind to the firm', 0, '', '', 0, 0, 0),
(1514, '63', '248', '1310', 'When goodwill is hidden', 0, '', '', 0, 0, 0),
(1515, '63', '248', '1310', 'Treatment for Revaluation of Assets and Reasssement of Liabilities ', 0, '', '', 0, 0, 0),
(1516, '63', '248', '1310', '', 0, '', '', 0, 0, 0),
(1517, '63', '248', '1310', 'When Assets and Liabilities appear in the books at Old Value (Memorandum Revaluation A/c) ', 0, '', '', 0, 0, 0),
(1518, '63', '248', '1310', 'Adjustment of Workmen Compensation Reserve ', 0, '', '', 0, 0, 0),
(1519, '63', '248', '1310', 'Adjustment of Investment Fluctuation  Reserve ', 0, '', '', 0, 0, 0),
(1520, '63', '248', '1310', 'Accounting Treatment of Accumulated Losses', 0, '', '', 0, 0, 0),
(1521, '63', '248', '1310', 'Accounting Treatment of Accumulated Profits, Reserves and Losses through Single Journal Entry', 0, '', '', 0, 0, 0),
(1522, '63', '248', '1310', 'Adjustments of Capital ', 0, '', '', 0, 0, 0),
(1529, '63', '248', '1311', '', 0, '', '', 0, 0, 0),
(1530, '63', '248', '1310', 'Accounting Treatment of Accumulated Losses', 0, '', '', 0, 0, 0),
(1531, '63', '248', '1310', 'When Assets and Liabilities appear in the books at New Value ', 0, '', '', 0, 0, 0),
(1532, '63', '248', '1310', 'When Assets and Liabilities appear in the books at Old Value (Memorandum Revaluation A/c)', 0, '', '', 0, 0, 0),
(1533, '63', '248', '1310', 'Adjustment of Workmen Compensation Reserve', 0, '', '', 0, 0, 0),
(1534, '63', '248', '1310', 'Adjustment of Investment Fluctuation Reserve', 0, '', '', 0, 0, 0),
(1535, '63', '248', '1310', 'Accounting Treatment of Accumulated Losses', 0, '', '', 0, 0, 0),
(1536, '63', '248', '1310', 'Accounting Treatment of Accumulated Profits, Reserves and Losses through Single Journal Entry', 0, '', '', 0, 0, 0),
(1537, '63', '248', '1310', 'Adjustments of Capital', 0, '', '', 0, 0, 0),
(1538, '63', '248', '1310', 'Theory Questions', 0, '', '', 0, 0, 0),
(1539, '63', '248', '1310', 'Practice Questions', 0, '', '', 0, 0, 0),
(1540, '63', '248', '1310', 'When Assets and Liabilities appear in the books at New Value ', 0, '', '', 0, 0, 0),
(1541, '63', '248', '1310', 'When Assets and Liabilities appear in the books at Old Value (Memorandum Revaluation A/c)', 0, '', '', 0, 0, 0),
(1542, '63', '248', '1310', 'Adjustment of Workmen Compensation Reserve', 0, '', '', 0, 0, 0),
(1543, '63', '248', '1310', 'Adjustment of Investment Fluctuation Reserve', 0, '', '', 0, 0, 0),
(1544, '63', '248', '1310', 'Accounting Treatment of Accumulated Losses', 0, '', '', 0, 0, 0),
(1545, '63', '248', '1310', 'Accounting Treatment of Accumulated Profits, Reserves and Losses through Single Journal Entry', 0, '', '', 0, 0, 0),
(1546, '63', '248', '1310', 'Adjustments of Capital', 0, '', '', 0, 0, 0),
(1547, '63', '248', '1310', 'Theory Questions', 0, '', '', 0, 0, 0),
(1548, '63', '248', '1310', 'Practice Questions', 0, '', '', 0, 0, 0),
(1549, '63', '248', '1311', '', 0, '', '', 0, 0, 0),
(1551, '63', '248', '1311', 'When Information about new ratio is not given ', 0, '', '', 0, 0, 0),
(1552, '63', '248', '1311', 'When Information about new ratio is given ', 0, '', '', 0, 0, 0),
(1553, '63', '248', '1311', 'Accounting Treatments  of Goodwill', 0, '', '', 0, 0, 0),
(1554, '63', '248', '1311', 'Accounting Treatment of Reserves and Accumulated Profits/Losses', 0, '', '', 0, 0, 0),
(1555, '63', '248', '1311', 'Revaluation of Assets and Reassessment of Liabilities at Old & New Value', 0, '', '', 0, 0, 0),
(1556, '63', '248', '1311', 'When Information about new ratio is not given ', 0, '', '', 0, 0, 0),
(1557, '63', '248', '1311', 'When Information about new ratio is given ', 0, '', '', 0, 0, 0),
(1558, '63', '248', '1311', 'Accounting Treatments  of Goodwill', 0, '', '', 0, 0, 0),
(1559, '63', '248', '1311', 'Accounting Treatment of Reserves and Accumulated Profits/Losses', 0, '', '', 0, 0, 0),
(1560, '63', '248', '1311', 'Revaluation of Assets and Reassessment of Liabilities at Old & New Value', 0, '', '', 0, 0, 0),
(1561, '63', '248', '1311', 'When Information about new ratio is not given ', 0, '', '', 0, 0, 0),
(1562, '63', '248', '1311', 'When Information about new ratio is given ', 0, '', '', 0, 0, 0),
(1563, '63', '248', '1311', 'Accounting Treatments  of Goodwill', 0, '', '', 0, 0, 0),
(1564, '63', '248', '1311', 'Accounting Treatment of Reserves and Accumulated Profits/Losses', 0, '', '', 0, 0, 0),
(1565, '63', '248', '1311', 'Revaluation of Assets and Reassessment of Liabilities at Old & New Value', 0, '', '', 0, 0, 0),
(1566, '63', '248', '1311', 'Settlement of Amount Due to the Retiring Partner: When the amount due is paid in cash or by cheque', 0, '', '', 0, 0, 0),
(1567, '63', '248', '1311', 'When the amount due is transferred to his loan Account', 0, '', '', 0, 0, 0),
(1568, '63', '248', '1311', 'When the amount due is partly paid in cash and the balance is transferred to his loan Account', 0, '', '', 0, 0, 0),
(1569, '63', '248', '1311', 'Capital Adjustment ', 0, '', '', 0, 0, 0),
(1570, '63', '248', '1311', 'When Total Capital of the New Firm is given', 0, '', '', 0, 0, 0),
(1571, '63', '248', '1311', 'When Existing Total Capital of Remaining Partners is to be in New Ratio', 0, '', '', 0, 0, 0),
(1572, '63', '248', '1311', 'When Existing total capital of all partners is to be in New PSR', 0, '', '', 0, 0, 0),
(1573, '63', '248', '1311', 'When the Retiring Partner is to be paid through cash brought in by the Remaining Partners in a manner to make their Capitals Proportionate to New Ration', 0, '', '', 0, 0, 0),
(1574, '63', '248', '1311', 'Through cash brought in by the Remaining Partners in a manner to make their Capitals Proportionate to New Ratio and leave a desired Cash Balance', 0, '', '', 0, 0, 0),
(1575, '63', '248', '1311', 'Settlement of Amount Due to the Retiring Partner: When the amount due is paid in cash or by cheque', 0, '', '', 0, 0, 0),
(1576, '63', '248', '1311', 'When the amount due is transferred to his loan Account', 0, '', '', 0, 0, 0),
(1577, '63', '248', '1311', 'When the amount due is partly paid in cash and the balance is transferred to his loan Account', 0, '', '', 0, 0, 0),
(1578, '63', '248', '1311', 'Capital Adjustment ', 0, '', '', 0, 0, 0),
(1579, '63', '248', '1311', 'When Total Capital of the New Firm is given', 0, '', '', 0, 0, 0),
(1580, '63', '248', '1311', 'When Existing Total Capital of Remaining Partners is to be in New Ratio', 0, '', '', 0, 0, 0),
(1581, '63', '248', '1311', 'When Existing total capital of all partners is to be in New PSR', 0, '', '', 0, 0, 0),
(1582, '63', '248', '1311', 'When the Retiring Partner is to be paid through cash brought in by the Remaining Partners in a manner to make their Capitals Proportionate to New Ration', 0, '', '', 0, 0, 0),
(1583, '63', '248', '1311', 'Through cash brought in by the Remaining Partners in a manner to make their Capitals Proportionate to New Ratio and leave a desired Cash Balance', 0, '', '', 0, 0, 0),
(1584, '63', 'Law and BCR', NULL, NULL, 0, '', '', 0, 0, 0),
(1585, '223', 'Financial Accounting ', NULL, NULL, 0, '', '', 0, 0, 0),
(1587, '223', 'Law, Ethics & Governance ', NULL, NULL, 0, '', '', 0, 0, 0),
(1588, '223', 'Direct Taxation ', NULL, NULL, 0, '', '', 0, 0, 0),
(1589, '223', 'Cost Accounting ', NULL, NULL, 0, '', '', 0, 0, 0),
(1591, 'CA INTERMEDIATE GRP I', '', NULL, NULL, 0, '', '', 35000, 0, 2),
(1592, 'CA INTERMEDIATE GRP II', '', NULL, NULL, 0, '', '', 35000, 0, 3),
(1593, '1592', 'CAI Grp II : FINANCIAL MANAGEMENT', '', '', 0, '', '', 5000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ex_student`
--

CREATE TABLE `ex_student` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `course2` int(11) NOT NULL,
  `subject` text NOT NULL,
  `subject2` text NOT NULL,
  `batchid` int(11) NOT NULL,
  `batchid2` int(11) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handmade_notes`
--

CREATE TABLE `handmade_notes` (
  `id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `chapterid` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `last_updated_on` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `handmade_notes`
--

INSERT INTO `handmade_notes` (`id`, `courseid`, `subjectid`, `chapterid`, `added_by`, `added_on`, `last_updated_on`, `last_updated_by`) VALUES
(0, 218, 309, 382, 1, '2022-12-28 07:44:54', '0000-00-00 00:00:00', 0),
(0, 211, 328, 554, 1, '2022-12-28 07:46:17', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `handmade_notes_detail`
--

CREATE TABLE `handmade_notes_detail` (
  `id` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `tid` text NOT NULL,
  `tcontent` text NOT NULL,
  `file_upload` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `holiday_date` date DEFAULT NULL,
  `holiday` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday_date`, `holiday`) VALUES
(1, '2022-01-01', 'New Year\'s Day'),
(2, '2022-01-02', 'New Year Holiday'),
(3, '2022-01-09', 'Guru Gobind Singh Jayanti'),
(4, '2022-01-11', 'Missionary Day'),
(5, '2022-01-12', 'Swami Vivekananda Jayanti'),
(6, '2022-01-13', 'Boghi'),
(7, '2022-01-14', 'Makara Sankranti'),
(8, '2022-01-14', 'Magh Bihu'),
(9, '2022-01-15', 'Surya Pongal'),
(10, '2022-01-15', 'Thiruvalluvar Day'),
(11, '2022-01-16', 'Mattu Pongal'),
(12, '2022-01-16', 'Uzhavar Thirunal'),
(13, '2022-01-17', 'Kaanum Pongal'),
(14, '2022-01-23', 'Netaji Subhas Chandra Bose Jayanti'),
(15, '2022-01-25', 'State Day'),
(16, '2022-01-26', 'Republic Day'),
(17, '2022-01-31', 'Me-Dum-Me-Phi'),
(18, '2022-02-02', 'Sonam Losar'),
(19, '2022-02-05', 'Vasant Panchami'),
(20, '2022-02-15', 'Lui-Ngai-Ni'),
(21, '2022-02-15', 'Hazrat Ali Jayanti'),
(22, '2022-02-16', 'Guru Ravidas Jayanti'),
(23, '2022-02-19', 'Chhatrapati Shivaji Maharaj Jayanti'),
(24, '2022-02-20', 'State Day'),
(25, '2022-03-01', 'Maha Shivaratri'),
(26, '2022-03-03', 'Losar'),
(27, '2022-03-05', 'Panchayatiraj Divas'),
(28, '2022-03-18', 'Holi'),
(29, '2022-03-18', 'Doljatra'),
(30, '2022-03-19', 'Holi'),
(31, '2022-03-22', 'Bihar Day'),
(32, '2022-03-23', 'S. Bhagat Singh\'s Martyrdom Day'),
(33, '2022-04-01', 'Odisha Day'),
(34, '2022-04-02', 'Telugu New Year'),
(35, '2022-04-02', 'Gudi Padwa'),
(36, '2022-04-04', 'Sarhul'),
(37, '2022-04-05', 'Babu Jagjivan Ram Jayanti'),
(38, '2022-04-10', 'Ram Navami'),
(39, '2022-04-13', 'Ugadi'),
(40, '2022-04-13', 'Bohag Bihu?Holiday'),
(41, '2022-04-14', 'Mahavir Jayanti'),
(42, '2022-04-14', 'Vaisakh'),
(43, '2022-04-14', 'Dr Ambedkar Jayanti'),
(44, '2022-04-14', 'TamilTamil New Year'),
(45, '2022-04-14', 'Vishu'),
(46, '2022-04-14', 'Maha Vishuba Sankranti'),
(47, '2022-04-14', 'Bohag Bihu'),
(48, '2022-04-14', 'Cheiraoba'),
(49, '2022-04-15', 'Good Friday'),
(50, '2022-04-15', 'Bengali New Year'),
(51, '2022-04-15', 'Himachal Day'),
(52, '2022-04-16', 'Easter?Saturday'),
(53, '2022-04-17', 'Easter Sunday'),
(54, '2022-04-21', 'Garia Puja'),
(55, '2022-04-29', 'Shab-i-Qadr'),
(56, '2022-04-29', 'Jumat-ul-Wida'),
(57, '2022-05-01', 'Maharashtra Day'),
(58, '2022-05-01', 'May Day'),
(59, '2022-05-02', 'Maharshi Parasuram Jayanti'),
(60, '2022-05-03', 'Idul Fitr'),
(61, '2022-05-03', 'Basava Jayanti'),
(62, '2022-05-04', 'Idul Fitr Holiday'),
(63, '2022-05-09', 'Guru Rabindranath Jayanti'),
(64, '2022-05-16', 'State Day'),
(65, '2022-05-16', 'Buddha Purnima'),
(66, '2022-05-24', 'Kazi Nazrul Islam Jayanti'),
(67, '2022-06-02', 'Maharana Pratap Jayanti'),
(68, '2022-06-02', 'Telangana Formation?Day'),
(69, '2022-06-03', 'Sri Guru Arjun Dev Ji\'s Martyrdom Day'),
(70, '2022-06-14', 'Sant Guru Kabir Jayanti'),
(71, '2022-06-14', 'Pahili Raja'),
(72, '2022-06-15', 'Raja Sankranti'),
(73, '2022-06-15', 'YMA Day'),
(74, '2022-06-22', 'Kharchi Puja'),
(75, '2022-06-30', 'Remna Ni'),
(76, '2022-07-01', 'Ratha Yathra'),
(77, '2022-07-05', 'Guru Hargobind Ji\'s Birthday'),
(78, '2022-07-06', 'MHIP Day'),
(79, '2022-07-10', 'Bakrid?/ Eid al Adha'),
(80, '2022-07-11', 'Bakrid / Eid al Adha Holiday'),
(81, '2022-07-13', 'Martyrs\' Day'),
(82, '2022-07-13', 'Bhanu Jayanti'),
(83, '2022-07-17', 'U Tirot Sing Day'),
(84, '2022-07-24', 'Bonalu'),
(85, '2022-07-31', 'Haryali Teej'),
(86, '2022-07-31', 'Shaheed Udham Singh\'s Martyrdom Day'),
(87, '2022-08-08', 'Tendong Lho Rum Faat'),
(88, '2022-08-09', 'Muharram'),
(89, '2022-08-12', 'Raksha Bandhan'),
(90, '2022-08-12', 'Jhulan Purnima'),
(91, '2022-08-13', 'Patriots Day'),
(92, '2022-08-15', 'Independence Day'),
(93, '2022-08-16', 'De Jure Transfer Day'),
(94, '2022-08-16', 'Parsi New Year'),
(95, '2022-08-19', 'Janmashtami'),
(96, '2022-08-28', 'Parkash Utsav Sri Guru Granth Sahib Ji'),
(97, '2022-08-29', 'Hartalika Teej'),
(98, '2022-08-31', 'Ganesh Chaturthi'),
(99, '2022-09-01', 'Nuakhai'),
(100, '2022-09-01', 'Ganesh Chaturthi Holiday'),
(101, '2022-09-06', 'Ramdev Jayanti'),
(102, '2022-09-06', 'Teja Dashmi'),
(103, '2022-09-07', 'First?Onam'),
(104, '2022-09-08', 'Thiruvonam'),
(105, '2022-09-09', 'Indra Jatra'),
(106, '2022-09-10', 'Sree Narayana Guru Jayanti'),
(107, '2022-09-21', 'Sree Narayana Guru Samadhi'),
(108, '2022-09-23', 'Heroes\' Martyrdom Day'),
(109, '2022-09-25', 'Mahalaya?Amavasye'),
(110, '2022-09-25', 'First Day of?Bathukamma'),
(111, '2022-09-26', 'Maharaja Agrasen Jayanti'),
(112, '2022-09-26', 'Ghatasthapana'),
(113, '2022-09-28', 'S. Bhagat Singh Ji Jayanti'),
(114, '2022-10-02', 'Maha Saptami'),
(115, '2022-10-02', 'Gandhi Jayanti'),
(116, '2022-10-03', 'Maha Ashtami'),
(117, '2022-10-04', 'Maha Navami'),
(118, '2022-10-05', 'Vijaya Dashami'),
(119, '2022-10-09', 'Lakshmi Puja'),
(120, '2022-10-09', 'Maharishi Valmiki Jayanti'),
(121, '2022-10-09', 'Eid e Milad'),
(122, '2022-10-14', 'Friday Following Eid e Milad'),
(123, '2022-10-24', 'Diwali'),
(124, '2022-10-25', 'Diwali'),
(125, '2022-10-25', 'Vikram Samvat New Year'),
(126, '2022-10-26', 'Deepavali Holiday'),
(127, '2022-10-27', 'Bhai Dooj'),
(128, '2022-10-30', 'Chhath Puja'),
(129, '2022-10-31', 'Chhath Puja Holiday'),
(130, '2022-10-31', 'Sardar Vallabhbhai Patel Jayanti'),
(131, '2022-11-01', 'Kut'),
(132, '2022-11-01', 'Puducherry Liberation Day'),
(133, '2022-11-01', 'Haryana Day'),
(134, '2022-11-01', 'Kannada Rajyothsava'),
(135, '2022-11-08', 'Karthika Purnima'),
(136, '2022-11-08', 'Guru Nanak Jayanti'),
(137, '2022-11-15', 'Lhabab Duchen'),
(138, '2022-11-22', 'Kanakadasa Jayanti'),
(139, '2022-11-23', 'Seng Kut Snem'),
(140, '2022-11-28', 'Sri Guru Teg Bahadur Ji\'s Martyrdom Day'),
(141, '2022-12-01', 'Indigenous Faith Day'),
(142, '2022-12-03', 'Feast of St Francis Xavier'),
(143, '2022-12-05', 'Sheikh Muhammad Abdullah Jayanti'),
(144, '2022-12-12', 'Pa Togan Nengminza Sangma'),
(145, '2022-12-18', 'Death Anniversary of U SoSo Tham'),
(146, '2022-12-18', 'Guru Ghasidas Jayanti'),
(147, '2022-12-19', 'Liberation Day'),
(148, '2022-12-24', 'Christmas Holiday'),
(149, '2022-12-25', 'Christmas Day'),
(150, '2022-12-26', 'Shaheed Udham Singh Jayanti'),
(151, '2022-12-26', 'Christmas Holiday'),
(152, '2022-12-29', 'Guru Gobind Singh Jayanti'),
(153, '2022-12-30', 'U Kiang Nangbah'),
(154, '2022-12-30', 'Tamu Losar'),
(155, '2022-12-31', 'New Year\'s Eve');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `ldate` date NOT NULL,
  `contact` text NOT NULL,
  `uname` text NOT NULL,
  `subject` text NOT NULL,
  `xper` text NOT NULL,
  `email` text NOT NULL,
  `reference` text NOT NULL,
  `remark` text NOT NULL,
  `dob` date NOT NULL,
  `status` text NOT NULL,
  `course_name` text NOT NULL,
  `school` text NOT NULL,
  `medium` text NOT NULL,
  `branch` int(11) NOT NULL,
  `xiiper` text NOT NULL,
  `demo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `ldate`, `contact`, `uname`, `subject`, `xper`, `email`, `reference`, `remark`, `dob`, `status`, `course_name`, `school`, `medium`, `branch`, `xiiper`, `demo`) VALUES
(1, '2022-08-04', '6376290062', 'Amit Sharma', '222', 'NA', 'NA', 'NA', 'NA', '2004-12-22', 'pending', '202', 'Mangak Newton School (Barmer) CBSE', 'English', 0, 'NA', 0),
(2, '2022-08-05', '7877032540  / 8209402398', 'Karamveer Singh Rathore', '226', 'NA', 'udawatkaramveer@gmail.com', 'online', 'NA', '2003-12-11', 'pending', '224', 'Tulsi Amrit School Amet', 'English', 0, '93', 0),
(4, '2022-08-08', '8955841682', 'Sweety Chouhan', '--No data found --', 'NA', 'nikkisingh6440@gmail.com', 'others', 'NA', '2002-11-13', 'pending', '205', 'Lucky Bal Niketan school', 'English', 0, '83', 0),
(5, '2022-08-08', '9828822207', 'Nikhil Motiwal', '307', '52', 'NA', 'others', 'NA', '2006-09-28', 'pending', '209', 'sanskar International School', 'English', 0, 'NA', 0),
(8, '2022-08-16', '9414301413', 'Aliya Khan', '', 'NA', 'bakshukhan80@gmail.com', '11', 'NA', '0000-00-00', 'pending', '208', 'SPS ', 'English', 0, 'NA', 0),
(9, '2022-08-16', '8003272559', 'Rishabh Mehta', '286', '83', 'rishabhm450@gmail.com', 'others', 'NA', '2002-11-05', 'pending', '224', 'Central  Academy School', 'English', 0, '83', 0),
(11, '2022-08-16', '9079347818', 'Deeya Gehlot', '--No data found --', '89.69', 'diyagehlot174@gmail.com', 'others', 'NA', '2003-12-29', 'pending', '236', 'Williams Academy Sen. Sec. School', 'English', 0, '95', 0),
(13, '2022-08-18', '9468668669', 'Diya Agarwal', '324', '81', 'diyaagrwal@gmail.com', 'others', 'NA', '2022-08-18', 'pending', '236', 'Mahaveer Public School', 'English', 0, '75', 0),
(14, '2022-08-23', '9509190451', 'Varun  Maanju', '64,95,192,248,249,250,251', '55', 'varunmaanju32gmail.com', 'others', 'NA', '2005-12-13', 'pending', '63', 'G. S. Jangid Memorial School', 'English', 0, '61', 0),
(15, '2022-08-27', '9636196335', 'Davyani Thamnani', '315,316,317,318,319,320,321,322,323,324', '88', 'devyanijhamani@gmail.com', 'others', 'NA', '2001-06-16', 'pending', '236', 'Mahila P.G. Mahamandir', 'English', 0, '83', 0),
(16, '2022-08-27', '787702408', 'Suresh Prajapat', '64,95,192,248,249,250,251', '54', 'NA', 'others', 'NA', '2005-08-20', 'demo', '63', 'Rajkiya Uch Vidhyalaya', 'Hindi', 0, '53', 0),
(17, '2022-08-27', '8005922020', 'Shafa Ansari', '294,295', '82', 'NA', '10', 'NA', '2005-07-01', 'demo', '209', 'Central Academy', 'English', 0, 'NA', 0),
(18, '2022-09-02', '9414915720', 'Nitansh Sharma', '292,293,294', '70', 'dineshsharmanp@gmail.com', 'others', 'NA', '2006-08-04', 'pending', '209', 'Sarar Doon School', 'English', 0, 'NA', 0),
(19, '2022-09-03', '9352973460', 'Arsalan Ansari', '239,240,241,242', 'NA', 'heeanansari0320@gmail.com', 'others', 'NA', '2007-02-06', 'pending', '208', 'St. Paul\'s', 'English', 0, 'NA', 0),
(20, '2022-09-03', '9829524103', 'Ramesh', ',', '82', 'Rahul123@gmail.com', 'others', 'Rakesh', '2001-02-09', 'pending', '209', 'DPS', 'English', 0, '', 0),
(21, '2022-09-08', '7976790825', 'Jyoti Sharma', '258,259', 'NA', 'NA', 'others', 'NA', '2008-08-30', 'pending', '207', 'LBN ', 'English', 0, 'NA', 0),
(22, '2022-09-08', '9079231512', 'Akshay Borana', '308,309,310,311,312', '66', 'akshayborana33@gmail.com', 'others', 'NA', '2001-06-19', 'pending', '218', 'JNVU', 'Hindi', 0, '68', 0),
(23, '2022-09-09', '9461396800', 'Harsh Maharshi', '282,283,284,285,286', '72', 'harshmaharshi2408@gmail.com', 'others', 'NA', '2003-07-24', 'pending', '224', 'Aishwarya College', 'English', 0, '83.4', 0),
(24, '2022-09-13', '9351017630', 'Hari om singh chouhan', ',,,', 'NA', 'hari02456@sardardoonschool.com', '11', 'NA', '2009-11-09', 'pending', '206', 'Sardar Doon School', 'English', 0, 'NA', 0),
(25, '2022-09-14', '9309351544', 'Khushi ', '287', '85', 'NA', 'others', 'NA', '2005-05-29', 'pending', '210', 'Agarwal Jamna devi school', 'English', 0, 'NA', 0),
(26, '2022-09-16', '9414725122', 'Khushal Ujwani', '302,303,304,305', 'NA', 'khushalujwani@gmail.com', 'others', 'NA', '2004-07-11', 'pending', '202', 'NMIMS Global', 'English', 0, '68', 0),
(27, '2022-09-16', '9462430073', 'Akshat Bardia', '302,303,304,305', 'NA', 'bardiaakshat@gmail.com', 'others', 'NA', '2005-01-12', 'pending', '202', 'J.N.V.U', 'English', 0, '75', 0),
(28, '2022-09-16', '8107861500', 'SHAKSHAM MATHUR', '287,288,289,290', '60', 'SANDEEPJAIMATHUR@GMAIL.COM', 'others', 'NA', '2005-03-17', 'pending', '210', 'SANSKAR INTERNATIONAL', 'English', 0, 'NA', 0),
(29, '2022-09-20', '6350465079', 'Alveera Bano', '239,240,241,242', 'NA', 'NA', 'others', 'NA', '2007-11-25', 'pending', '208', 'Mother Sa creicent public School', 'English', 0, 'NA', 0),
(30, '2022-09-22', '7737710530', 'Rakshit Sankla', '287', '56', 'rakshitsankla1990@gmail.com', 'others', 'NA', '2004-11-01', 'pending', '210', 'Mahesh Public School', 'English', 0, 'NA', 0),
(31, '2022-09-23', '9462906930', 'Kailash boawat', '302,303,304,305', '52', 'kailashborawat5@gmail.com', 'others', 'NA', '2004-02-20', 'pending', '202', 'J.N.V.U', 'English', 0, '67', 0),
(32, '2022-09-24', '7742180436', 'Radhika Solanki', '293,294', '98', 'NA', 'others', 'NA', '2002-03-20', 'pending', '209', 'SMS', 'English', 0, 'NA', 0),
(33, '2022-09-24', '7357995149', 'Jay prakash', '294', '76', 'jpbhatia73@gmail.com', 'others', 'na', '2007-01-26', 'pending', '209', 'MPS', 'English', 0, 'NA', 0),
(34, '2022-09-30', '830240980', 'Aryan Vaishnav', '282', 'NA', 'aryanvaishnav574@gmail.com', 'others', 'NA', '2001-07-19', 'pending', '224', 'JNVU', 'English', 0, '78', 0),
(35, '2022-09-30', '7976484455', 'Prem Suthar', '282', 'NA', 'fdfccz456@gmsil.com', 'others', 'NA', '2001-12-10', 'pending', '224', 'J.N.V.U', 'English', 0, '77', 0),
(36, '2022-10-11', '9610879286', 'Sahil Balani', '--No data found --', 'NA', 'sahilbalani58@gmail.com', 'others', 'NA', '2000-05-26', 'pending', '213', 'Gurukul College', 'English', 0, '61', 0),
(37, '2022-10-12', '9636501547', 'Varun Jinghar', '--No data found --', 'NA', 'rajcooljsn@yahoo.in', 'others', 'NA', '2005-09-05', 'pending', '211', 'Soomani College', 'English', 0, '57', 0),
(38, '2022-10-21', '7239925725', 'Moh. Sohail', '308,309,310,311,312', 'NA', '0786mehboobkhan@gmail.com', 'others', 'NA', '1998-02-08', 'pending', '218', 'Maulana Ajad Hind College', 'Hindi', 0, 'NA', 0),
(39, '2022-10-27', '7230882653', 'Kanhaiya', '302,303,304,305', 'NA', 'Kanajangid@gmail.com', 'others', 'NA', '2004-02-14', 'pending', '202', 'J.N.V.U', 'English', 0, '85', 0),
(40, '2022-10-27', '7230882653', 'Kanhaiya', '302,303,304,305', 'NA', 'Kanajangid@gmail.com', 'others', 'NA', '2004-02-14', 'pending', '202', 'J.N.V.U', 'English', 0, '85', 0),
(41, '2022-10-29', '8764136639', 'Sohaib Khan', '--No data found --', '58', 'mightykhan6922@gmail.com', 'others', 'NA', '2001-01-17', 'pending', '204', 'Cambridge Sen Sec. School', 'English', 0, '57', 0),
(42, '2022-10-31', '8824102706', 'Lakshit Bharti', '64,95,192,248,249,250,251', '63', 'lakshitbharti2020@gmail.com', 'others', 'NA', '2004-12-22', 'pending', '63', 'Lords Satyam Seniour Secondary School', 'English', 0, '82', 0),
(43, '2022-11-01', '8209553421', 'Palak  Daga', '--No data found --', 'NA', 'palakdaga14@gmail.com', 'others', 'NA', '2004-02-10', 'pending', '211', 'MMV', 'English', 0, '75', 0),
(44, '2022-11-01', '8829902004', 'Sakshi Jain', '--No data found --', 'NA', 'sakshijain0124@gmail.com', 'others', 'NA', '2004-01-24', 'pending', '211', 'MMV', 'English', 0, '87', 0),
(45, '2022-11-02', '9351050895', 'Raghuveer Singh', '--No data found --', 'NA', 'raghuveersingh0895@gmail.com', 'others', 'NA', '2001-02-08', 'pending', '211', 'J.N.V.U', 'Hindi', 0, 'NA', 0),
(46, '2022-11-03', '8560811386', 'Moh. Shareek', '298,299,300,301', 'NA', 'NA', 'others', 'NA', '2009-05-08', 'pending', '206', 'Maulana School', 'English', 0, 'NA', 0),
(47, '2022-11-05', '742788181', 'Prithvi Singh', '--No data found --', 'NA', 'prithvisinghjodh175@gmail.com', 'others', 'NA', '2005-04-05', 'pending', '211', 'Soomani College', 'Hindi', 0, '52', 0),
(48, '2022-11-11', '9079355236', 'Kundal Vang', '328', 'NA', 'kundalvang@gmail.com', 'others', 'NA', '2004-06-18', 'pending', '211', 'J.N.V.U', 'English', 0, '78', 0),
(49, '2022-11-12', '6367477704', 'Krishna Soni', '64,95,192,248,249,250,251', '69', 'NA', 'others', 'NA', '2004-01-06', 'pending', '63', 'Lucky Bal Niketan school', 'English', 0, '75', 0),
(50, '2022-11-12', '7507460101', 'Krishna Khandelwal', '', '71', 'khandelwalk701@gmail.com', 'others', 'NA', '2002-05-04', 'pending', '205', 'Degana Colllege , Ajmer', 'Hindi', 0, '73', 0),
(51, '2022-11-14', '9983053801', 'Gautam Swami', '64,95,192,248,249,250,251', '56', 'NA', 'others', 'NA', '2005-02-10', 'pending', '63', 'MDS University, Ajmer', 'Hindi', 0, '76', 0),
(52, '2022-11-21', '9529587786', 'Saleena Khan', '328,329', 'NA', 'khansaleena343@gmail.com', 'others', 'NA', '2004-01-01', 'pending', '211', 'Aishwarya College', 'English', 0, '73', 0),
(53, '2022-11-21', '8824057996', 'Ashok', '308,309,310,311,312', 'NA', 'ashokgodara887@gmail.com', 'others', 'NA', '2001-05-17', 'pending', '218', 'J.N.V.U', 'Hindi', 0, '55', 0),
(54, '2022-11-24', '7230991427', 'Muskan', '330,331,332', 'NA', 'bpawan799@gmail.com', 'others', 'NA', '1999-10-06', 'pending', '205', 'K.N. College', 'English', 0, 'NA', 0),
(55, '2022-11-24', '9664021837', 'Naresh Gehlot', '295', '70', 'nareshgehlot9364@gmail.com', 'others', 'NA', '2005-01-07', 'pending', '209', 'Central  Academy School', 'English', 0, 'NA', 0),
(56, '2022-11-28', '8426024019', 'Mohammad', '330,331,332', 'NA', 'mk5064099@gmail.com', 'others', 'NA', '2001-05-05', 'pending', '205', 'Mirdha College, Nagaur', 'English', 0, 'NA', 0),
(57, '2022-11-30', '7878311098', 'Mahendra Kumar', '64,95,192,248,249,250,251', 'NA', 'mahendra.menu11@gmail.com', 'others', 'NA', '1991-04-29', 'pending', '63', 'Marwar Engineering College', 'English', 0, 'NA', 0),
(59, '2022-12-15', '9588920115', 'Jyoti ', '330,331,332', 'NA', 'cleanenvirojodhpur@yahoo.co.in', 'others', 'NA', '2005-02-24', 'pending', '205', 'J.N.V.U', 'English', 0, '74', 0),
(60, '2022-12-20', '9024641834', 'Hitesh Bhatiya', '95,192,248,249,250,251,377,403', '60', 'hiteshbhatia756@gmail.com', 'others', 'NA', '2004-05-25', 'pending', '63', 'J.N.V.U', 'English', 0, '58', 0),
(61, '2022-12-20', '6378372559', 'Gautam Mishra', '--No data found --', 'NA', 'jaymishra223366@gmail.com', 'others', 'NA', '2003-06-20', 'pending', '212', 'J.N.V.U', 'Hindi', 0, '85', 0),
(62, '2022-12-21', '9799677986', 'Moh. Rafeek', ',,,,,,,', 'NA', 'mohrafeek1234@gmail.com', 'others', 'NA', '2002-02-02', 'pending', '63', 'J.N.V.U', 'Hindi', 0, '82', 0),
(63, '2022-12-28', '6350669216', 'Bilal Ali', '282,283,284,285,286', 'NA', 'alibilal9898@gmail.com', 'others', 'NA', '1998-11-25', 'pending', '224', 'Maulana ajad college', 'English', 0, '65', 0),
(64, '2023-01-02', '9928360068', 'Moh. Moin', '328', 'NA', 'happy09@gmail.com', 'others', 'NA', '2002-09-17', 'pending', '211', 'Aishwarya College', 'English', 0, '85', 0),
(65, '2023-01-05', '9352353271', 'Anil Jangir', '271,272,273,274,275,276,277', 'NA', 'anilsuthar1990@gmail.com', '17', 'NA', '2003-08-10', 'pending', '267', 'J.N.V.U', 'Hindi', 0, 'NA', 0),
(66, '2023-01-05', '9468562239', 'Lakshaya', '295', '55', 'rajeshchouhan27@gmail.com', 'others', '', '2004-12-21', 'pending', '209', 'Mahatma gandhi government school', 'English', 0, '', 0),
(68, '2023-01-05', '7877861899', 'kavya ', '325', 'NA', 'ranawatlegend20@gmail.com', 'others', 'NA', '1999-09-05', 'pending', '213', 'J.N.V.U', 'Hindi', 0, 'NA', 0),
(69, '2023-01-10', '6367049121', 'neeraj kumar', '308', '78', 'neerajbhimani3@', 'others', 'NA', '2005-10-18', 'pending', '218', 'J.N.V.U', 'English', 0, '84', 0),
(70, '2023-01-11', '9461755755', 'Archit Gandhyi ', '273', 'NA', 'architgandhi.ag@gmail.com', 'others', 'NA', '1998-11-05', 'pending', '267', 'Aishwarya College ', 'English', 0, 'NA', 0),
(71, '2023-01-12', '7339996080', 'Viney Dhadhich ', '302,303,304,305', 'NA', 'vineydhadhich123@gmail.com', 'others', 'NA', '2004-03-09', 'pending', '202', 'J.N.V.U', 'English', 0, '68', 0),
(72, '2023-01-13', '9928535045', 'Harshita Sharma', '287,288,289,290,291,435', '79.33', 'bassant.sharma2009@gmail.com', 'others', 'NA', '2006-11-02', 'pending', '210', 'B.D.R.K.A. Sen Sec School', 'English', 0, 'NA', 0),
(73, '2023-01-16', '8769238861', 'Darshan Mehta', ',,', 'NA', 'darshan747499@gmail.com', 'others', 'NA', '2002-08-25', 'pending', '213', 'Aishwarya college', 'English', 0, '72', 0),
(74, '2023-01-16', '9549548835', 'Lakshay Bhoot', '325,326,327', 'NA', 'lakshaykhatri95@gmail.com', 'others', 'NA', '2003-02-09', 'pending', '213', 'Aishwarya college', 'English', 0, '62', 0),
(75, '2023-01-16', '9549194907', 'Harshita parihar', '326', 'NA', 'harshitaparihar98@gmail.com', 'others', 'NA', '2002-05-18', 'pending', '213', 'J.N.V.U', 'English', 0, '62', 0),
(76, '2023-01-17', '6375425184', 'Dhruv Kothari', '325,326,327', 'NA', 'dhruv1005kothari@gmail.com', 'others', 'NA', '2002-06-23', 'pending', '213', 'Aishwarya  College ', 'English', 0, '76', 0),
(77, '2023-01-17', '6375425184', 'Dhruv Kothari', '325,326,327', 'NA', 'dhruv1005kothari@gmail.com', 'others', 'NA', '2002-06-23', 'pending', '213', 'Aishwarya  College ', 'English', 0, '76', 0),
(78, '2023-01-18', '8955726350', 'pooja dhariwal', '325', 'NA', 'icsicseet92@gmail.com', 'others', 'NA', '2003-05-11', 'pending', '213', 'vyas commerce administratin ', 'English', 0, 'NA', 0),
(79, '2023-01-18', '756887938', 'Yogen Bhafna', '95,192,248,249,250,251,377,403', 'NA', 'yogainbafan@gmail.com', '16', 'NA', '2005-02-05', 'pending', '63', 'J.N.V.U', 'English', 0, '87', 0),
(80, '2023-01-18', '756887938', 'Yogen Bhafna', '95,192,248,249,250,251,377,403', 'NA', 'yogainbafan@gmail.com', '16', 'NA', '2005-02-05', 'pending', '63', 'J.N.V.U', 'English', 0, '87', 0),
(81, '2023-01-24', '9602253475', 'Ritika Aruna ', '326', 'NA', 'arunaritika690@gmai.com', '13', 'NA', '2002-09-05', 'pending', '213', 'J.N.V.U', 'English', 0, 'NA', 0),
(82, '2023-01-24', '8559892511', 'Kanishka Goyal ', '326', 'NA', 'goyalkanishka10@gmail.com', '13', 'NA', '2002-07-10', 'pending', '213', 'J.N.V.U', 'English', 0, 'NA', 0),
(83, '2023-01-24', '7737050268', 'Dikshant Godana ', '331', 'NA', 'dikshanktgodana@gmail.com', 'others', 'NA', '2003-11-29', 'pending', '205', 'J.N.V.U', 'English', 0, 'NA', 0),
(84, '2023-01-28', '9214044779', 'Bhawna Lohiya ', '284', 'NA', 'bhawnalohiya7815@gmail.com', 'others', 'NA', '2003-12-24', 'pending', '224', 'J.N.V.U', 'English', 0, 'NA', 0),
(85, '2023-01-31', '6376076207', 'Akshita Singhvi ', '--No data found --', 'NA', 'akshitasinghvi29@gmail.com', 'others', 'NA', '2003-06-26', 'pending', '212', 'Lucky institute', 'English', 0, 'NA', 0),
(86, '2023-02-03', '9414087000', 'Nikita ', '283', 'NA', 'nlunawat086@gmail.com', '16', 'NA', '2003-11-24', 'pending', '224', 'JNVU', 'English', 0, 'NA', 0),
(87, '2023-02-06', '861933207', 'Praveen Sankhla', '1585,1588,1589', 'NA', 'pravsankhla131@gmail.com', 'others', 'NA', '2000-07-02', 'pending', '223', 'Lucky International college', 'Hindi', 0, 'NA', 0),
(88, '2023-02-07', '7300084852', 'mukul ', '309', 'NA', 'janwarmukul123@gmail.com', 'others', 'NA', '2004-04-29', 'pending', '218', 'J.N.V.U', 'English', 0, 'NA', 0),
(89, '2023-02-07', '8764934640', 'Harshit Soni', '309', 'NA', 'harshitsoni14082005@gmail.com', 'others', 'NA', '2005-08-14', 'pending', '218', 'J.N.V.U', 'English', 0, 'NA', 0),
(90, '2023-02-07', '7297044913', 'Daud qadri', '239,240', 'NA', 'daudqadri06@gmail.com', 'others', 'NA', '2002-10-16', 'pending', '208', 'Lucky college', 'Hindi', 0, 'NA', 0),
(91, '2023-02-07', '7297044913', 'Daud qadri', '239,240', 'NA', 'daudqadri06@gmail.com', 'others', 'NA', '2002-10-16', 'pending', '208', 'Lucky college', 'Hindi', 0, 'NA', 0),
(92, '2023-02-09', '9119108576', 'chetna lodha', '275', 'NA', 'chetnalodha15@gmail.com', 'others', 'NA', '2002-02-15', 'pending', '267', 'J.N.V.U', 'English', 0, 'NA', 0),
(93, '2023-02-09', '9119108576', 'chetna lodha', '275', 'NA', 'chetnalodha15@gmail.com', 'others', 'NA', '2002-02-15', 'pending', '267', 'J.N.V.U', 'English', 0, 'NA', 0),
(94, '2023-02-09', '8003527508', 'DISHA DAGA', '192', 'NA', 'dishadaga15@gmail.com', 'others', 'NA', '2005-01-15', 'pending', '63', 'J.N.V.U', 'English', 0, 'NA', 0),
(95, '2023-02-10', '9829876811', 'divyanshi gehlot', '308', 'NA', 'divyanshi.gehlot30@gmail.com', 'others', 'NA', '2004-09-30', 'pending', '218', 'J.N.V.U', 'English', 0, 'NA', 0),
(96, '2023-02-10', '9680239860', 'MUKUL bhati', '329', 'NA', 'bhatimukul48@gmail.com', 'others', 'NA', '2003-08-01', 'pending', '211', 'J.N.V.U', 'English', 0, 'NA', 0),
(97, '2023-02-10', '9680239860', 'MUKUL bhati', '329', 'NA', 'bhatimukul48@gmail.com', 'others', 'NA', '2003-08-01', 'pending', '211', 'J.N.V.U', 'English', 0, 'NA', 0),
(98, '2023-02-11', '8118826735', 'nadeem balem', '192', 'NA', 'khannadeem.d7@gmail.com', 'others', 'NA', '2002-07-18', 'pending', '63', 'Lucky institute', 'English', 0, 'NA', 0),
(99, '2023-02-15', '7610088164', 'Ahmed', '95,192,248,249,250,251,377,403,1584', '75', 'ahmedraza200422@gmail.com', 'others', 'NA', '2004-06-21', 'pending', '63', 'Mahatma Gandhi Sen. Sec. School', 'English', 0, '80', 0),
(100, '2023-02-16', '9708802526', 'Abhishek Kumar', '248', 'NA', 'abhi21kumar12@gmail.com', 'others', 'NA', '2002-03-12', 'pending', '63', 'n.a.', 'English', 0, 'NA', 0),
(102, '2023-02-17', '9460686707', 'Prerna ', '325,326,327', 'NA', 'gehlotnakul99@gmail.com', 'others', 'NA', '2001-12-10', 'pending', '213', 'J.N.V.U', 'English', 0, '84', 0),
(103, '2023-02-17', '9460686707', 'Prerna ', '325,326,327', 'NA', 'gehlotnakul99@gmail.com', 'others', 'NA', '2001-12-10', 'pending', '213', 'J.N.V.U', 'English', 0, '84', 0),
(104, '2023-02-22', '9214985777', 'Pragati', '287,288,289,290,291,435,1443', '68', 'Pragati2312@gmail.com', 'others', 'NA', '2000-02-02', 'pending', '210', 'SPS', 'English', 0, 'NA', 0),
(106, '2023-03-14', '8073762094', 'Harish Patel', '192', '69', 'harishpatelka07@gmail.com', 'others', 'NA', '2003-10-03', 'pending', '63', 'Karnataka Government School, Bengaluru', 'English', 0, '62', 0),
(108, '2023-03-20', '8947043461', 'mahek dabi ', '287', '79%', 'anitadabi2016@gmail.com', 'others', 'NA', '2006-03-06', 'pending', '210', 'Central Academy ', 'English', 0, 'N.A. ', 0),
(109, '2023-03-20', '9636304108', 'Himesh Punjabi ', '95', '93% ', 'punjabihimesh93@gmail.com', 'others', 'NA', '2005-02-09', 'pending', '63', 'Central Academy ', 'English', 0, 'N.A.', 0),
(110, '2023-03-28', '7062838454', 'Gaurang nagal', '240', 'NA', 'nagalgaurang@gmail.com', 'others', 'NA', '2008-03-06', 'pending', '208', 'Central Academy', 'English', 0, 'NA', 0),
(111, '2023-04-02', '78785551214', 'Kartik chopra', '248', '82%', 'choprakartik1214@gmail.com', '13', 'NA', '0000-00-00', 'pending', '63', 'Sardaar Doon School', 'English', 0, 'NA', 0),
(112, '2023-04-02', '9829630116', 'Nikita Lalwani', '293', 'NA', 'dilip100124@gmail.com', 'others', 'NA', '2007-10-11', 'pending', '209', 'Central Academy', 'English', 0, 'NA', 0),
(113, '2023-04-05', '8005699034', 'Kanak Dodwani', '192', '77%', 'kanakdodwani756@gmail.com', 'others', 'NA', '0000-00-00', 'pending', '63', 'Mahesh Public School', 'English', 0, 'NA', 0),
(114, '2023-04-05', '7976059783', 'Krishna Sharma', '287', '70%', 'sharmajyoti.sharma5@gmail.com', 'others', 'NA', '2006-04-04', 'pending', '210', 'DPS (Pali rd)', 'English', 0, 'NA', 0),
(115, '2023-04-05', '9929956044', 'Mohit Mehta ', '287', '73%', 'sandeepmehta306@gmail.com', 'others', 'NA', '2006-11-12', 'pending', '210', 'DPS', 'English', 0, 'NA', 0),
(116, '2023-04-05', '8949659536', 'Ishaan Phophaliya', '287', 'NA', 'ishaanphophaliya@gmail.com', 'others', 'NA', '2006-02-07', 'pending', '210', 'LBN', 'English', 0, 'NA', 0),
(117, '2023-04-07', '9610878188', 'Yogesh Choudhary', '192', 'NA', 'anaaramsou9591@gmail.com', 'others', 'NA', '2005-12-10', 'pending', '63', 'Central Academy', 'English', 0, 'NA', 0),
(119, '2023-04-07', '7597723700', 'Shreya Maheshwari ', '95', '90%', 'maheshwarishreya004@gmail.com', 'others', 'NA', '2006-04-10', 'pending', '63', 'Central Academy', 'English', 0, 'NA', 0),
(121, '2023-04-07', '8209210695', 'Shivang Parihar ', '303', '80%', 'shivnagparihar12@gmail.com', 'others', 'NA', '2005-07-04', 'pending', '202', 'LDM ', 'English', 0, 'NA', 0),
(122, '2023-04-07', '7976636061', 'Bhagyesh Modi ', '304', '76%', 'modibhagyesh117@gmail.com', 'others', 'NA', '2005-07-11', 'pending', '202', 'LDM', 'English', 0, 'NA', 0),
(123, '2023-04-07', '9982269999', 'Deepak Soni', '95', 'NA', 'deepak2004soni@gmail.com', 'others', 'NA', '2004-04-08', 'pending', '63', 'Central Academy', 'English', 0, 'NA', 0),
(124, '2023-04-08', '7062838454', 'Sakshi Nagal ', '287', '70% ', 'bhavisha.co.in@gmail.com', 'others', 'NA', '2006-07-09', 'pending', '210', 'Central Academy', 'English', 0, 'NA', 0),
(125, '2023-04-08', '9782500655', 'Uday Rathore ', '288', '44% ', 'rathoreuday9829@gmail.com', 'others', 'NA', '2006-10-10', 'pending', '210', 'LDM ', 'English', 0, 'NA', 0),
(126, '2023-04-08', '9414494742', 'Varshita Goswami', '95', 'NA', 'yogendrapuri2010@yahoo.com', 'others', 'NA', '2005-02-10', 'pending', '63', 'St. Paul ', 'English', 0, 'NA', 0),
(127, '2023-04-08', '9413037760', 'Dimple Thadani ', '293', 'NA', 'leenathandani7760@gmail.com', 'others', 'NA', '0000-00-00', 'pending', '209', 'St. Annes ', 'English', 0, 'NA', 0),
(128, '2023-04-10', '7014978295', 'Siddhi Parakh', '95', '80%', 'dineshjain7017@rediffmail.com', 'others', 'NA', '0000-00-00', 'pending', '63', 'LBN', 'English', 0, 'NA', 0),
(129, '2023-04-10', '7300430148', 'Janvi Daga', '293', 'NA', 'janvidaga954@gmail.com', 'others', 'NA', '2008-04-14', 'pending', '209', 'LBN', 'English', 0, 'NA', 0),
(130, '2023-04-11', '8764486684', 'Ridhi Bhootra', '95,192,248,249,250,251,377,403,1584', '60', '', 'others', '', '2005-10-04', 'pending', '63', 'DPS - Pali Road', 'English', 0, 'waiting', 0),
(131, '2023-04-12', '9950781127', 'Ranu Chandak', '95', '85%', 'ranu chandak', 'others', 'NA', '2005-10-15', 'pending', '63', 'Central Academy', 'English', 0, '', 0),
(132, '2023-04-12', '9950781127', 'Ranu Chandak', '95', '85%', 'ranu chandak', 'others', 'NA', '2005-10-15', 'pending', '63', 'Central Academy', 'English', 0, '', 0),
(133, '2023-04-12', '9461764621', 'Bhavya Mehta ', '299', 'NA', '', 'others', 'NA', '2009-10-24', 'pending', '206', 'Out Lady of Pillar Convent School ', 'English', 0, 'NA', 0),
(134, '2023-04-12', '6350182534', 'Saloni Jain ', '303', '80% ', 'salonijain281104@gmail.com', 'others', 'NA', '2004-11-28', 'pending', '202', 'Rajmata ', 'English', 0, 'NA', 0),
(135, '2023-04-12', '7425075057', 'Sohani Jain ', '302', '82% ', 'sohanijain281104@gmail.com', 'others', 'NA', '2004-10-28', 'pending', '202', 'Rajmata School ', 'English', 0, 'NA', 0),
(137, '2023-04-13', '9309056362', 'Nishant Purohit ', '303', '73% ', 'sunil10814@gmail.com', 'others', 'NA', '2005-07-19', 'pending', '202', 'Sardar Doon ', 'English', 0, 'NA', 0),
(138, '2023-05-09', '8824494384', 'Yusuf Gazdhar', '239', 'NA', 'kanaz7000@gmail.com', 'others', 'NA', '2008-08-15', 'pending', '208', 'Maulana Azad School', 'English', 0, 'NA', 0),
(139, '2023-05-09', '9057188043', 'Komal Diwakar', '1585', '53', 'diwakarkomal57@gmail.com', 'others', 'NA', '1994-05-04', 'pending', '223', 'J.N.V.U', 'Hindi', 0, '75', 0);

-- --------------------------------------------------------

--
-- Table structure for table `library_allotment`
--

CREATE TABLE `library_allotment` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `copies` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `alloted_date` date NOT NULL,
  `return_date` date NOT NULL,
  `schedule_return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_allotment`
--

INSERT INTO `library_allotment` (`id`, `book_id`, `user_type`, `user_id`, `copies`, `status`, `alloted_date`, `return_date`, `schedule_return_date`) VALUES
(0, 2, 3, 1, 1, 0, '2023-03-23', '2023-03-29', '2023-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `library_authors`
--

CREATE TABLE `library_authors` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library_authors`
--

INSERT INTO `library_authors` (`id`, `author`, `remark`) VALUES
(1, 'CA G Sekar', ''),
(3, 'Ca Dr K.M. Bansal', ''),
(4, 'Dr Ritu Gupta', ''),
(5, 'CA Namit Arora', ''),
(6, 'Kailash Thakur', ''),
(7, 'CA Pankaj Garg', '');

-- --------------------------------------------------------

--
-- Table structure for table `library_books`
--

CREATE TABLE `library_books` (
  `id` int(11) NOT NULL,
  `book_name` text NOT NULL,
  `author` int(11) NOT NULL,
  `copies` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `alloted` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `publication` int(11) NOT NULL,
  `remark` text NOT NULL,
  `upc` text NOT NULL,
  `edition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library_books`
--

INSERT INTO `library_books` (`id`, `book_name`, `author`, `copies`, `location`, `alloted`, `course`, `subject`, `publication`, `remark`, `upc`, `edition`) VALUES
(2, 'Taxation with application based MCQ & integrated case studies', 3, 1, 6, 0, 1591, 309, 1, '5th edition, 2023', '', ''),
(4, 'Business Matematics Logical Reasoning & Statics', 6, 1, 7, 0, 63, 192, 1, '', '3806548385169', '2022 - 23'),
(5, 'Financial Management & Economics For Finance', 5, 1, 7, 0, 63, 95, 1, '', '3806548686215', '2023 - 24'),
(6, 'Business Economics & Business and commercial knowledge', 4, 1, 7, 0, 63, 95, 1, '', '3806548146753', '2022 - 23'),
(7, 'Auditing & Assurance', 7, 1, 7, 0, 1592, 275, 1, '', '3806548124801', '2023 - 24'),
(8, 'Corporate and other laws', 7, 1, 7, 0, 1591, 312, 1, '', '3806548597270', '2023 - 24');

-- --------------------------------------------------------

--
-- Table structure for table `library_location`
--

CREATE TABLE `library_location` (
  `id` int(11) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library_location`
--

INSERT INTO `library_location` (`id`, `location`) VALUES
(6, 'Rack 1'),
(7, 'Almirah 1');

-- --------------------------------------------------------

--
-- Table structure for table `library_publication`
--

CREATE TABLE `library_publication` (
  `id` int(11) NOT NULL,
  `publication` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library_publication`
--

INSERT INTO `library_publication` (`id`, `publication`) VALUES
(1, 'Taxmann Publication Pvt Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `id` int(11) NOT NULL,
  `meta_name` text NOT NULL,
  `meta_value1` text NOT NULL,
  `meta_value2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta_data`
--

INSERT INTO `meta_data` (`id`, `meta_name`, `meta_value1`, `meta_value2`) VALUES
(1, 'topic_level', 'Low', '1'),
(2, 'topic_level', 'Medium', '2'),
(3, 'topic_level', 'High', '3'),
(4, 'topic_level', 'Advance', '4'),
(5, 'question_type_level', 'Fill in the blanks', '1'),
(6, 'question_type_level', 'MCQ', '2'),
(7, 'question_type_level', 'Short Questions', '3'),
(8, 'question_type_level', 'Long Questions', '4'),
(9, 'question_type_level', 'Question Group', '5'),
(10, 'question_used', 'Question Bank', '1'),
(11, 'question_used', 'Notes', '2'),
(12, 'question_used', 'Both', '3'),
(13, 'user_type', 'admin', '1'),
(14, 'user_type', 'teacher', '2'),
(16, 'user_type', 'student', '3'),
(17, 'weekdays', 'Monday', '1'),
(18, 'weekdays', 'Tuesday', '2'),
(19, 'weekdays', 'Wednesday', '3'),
(20, 'weekdays', 'Thursday', '4'),
(21, 'weekdays', 'Friday', '5'),
(22, 'weekdays', 'Saturday', '6'),
(23, 'weekdays', 'Sunday', '7'),
(24, 'class_duration', '15', '15 min'),
(25, 'class_duration', '30', '30 min'),
(26, 'class_duration', '45', '45 min'),
(27, 'class_duration', '60', '60 min'),
(28, 'reference', 'Online', 'others'),
(29, 'reference', 'Offline / Banners / Pamplates', 'others'),
(30, 'reference', 'Previous Student', 'others'),
(31, 'default_fee', 'caution money', '1000'),
(32, 'default_fee', 'books', '500'),
(33, 'default_fee', 'Registration Fee', '500'),
(34, 'mode_of_payment', 'Chaque', '1'),
(35, 'mode_of_payment', 'Cash', '2'),
(36, 'mode_of_payment', 'Bank Transfer', '3'),
(37, 'mode_of_payment', 'UPI', '4'),
(38, 'payment_status', 'received', '1'),
(39, 'payment_status', 'pending', '2'),
(40, 'payment_status', 'declined / cancelled', '3'),
(41, 'user_type', 'accounts', '4'),
(42, 'user_type', 'back office', '5');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `part1` text NOT NULL,
  `part2` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `opt4` text NOT NULL,
  `qtype` text NOT NULL,
  `solution` text NOT NULL,
  `explanation` text NOT NULL,
  `level` int(11) NOT NULL,
  `qused` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic`, `part1`, `part2`, `opt1`, `opt2`, `opt3`, `opt4`, `qtype`, `solution`, `explanation`, `level`, `qused`, `marks`) VALUES
(1, 25, '1', '2', '', '', '', '', '1', '3', '', 0, 0, 0),
(2, 25, '1', '0', '2', '0', '0', '0', '2', '6', '', 0, 0, 0),
(3, 25, '1', '0', '2', '3', '4', '5', '2', '6', '', 0, 0, 0),
(4, 25, '1', '0', '2', '3', '4', '5', '2', '6', '', 0, 0, 0),
(5, 25, '7', '', '8', '9', '10', '11', '2', '12', '', 0, 0, 0),
(6, 25, 'this is question?', '0', '0', '0', '0', '0', '3', 'yes this is answer', '', 0, 0, 0),
(7, 25, 'this is working?', '0', '0', '0', '0', '0', '3', 'yes', '', 0, 0, 0),
(8, 25, 'explain accounting in 250 words ?', '0', '0', '0', '0', '0', '4', '250 words ....', '', 0, 0, 0),
(9, 25, 'p', 'question 1', '0', '0', '0', '0', '5', 'solution', '', 0, 0, 0),
(10, 25, 'p', 'part 2', '0', '0', '0', '0', '5', 'solution', '', 0, 0, 0),
(11, 25, 'what is', 'machine', '0', '0', '0', '0', '1', 'any combination', '', 0, 0, 0),
(12, 25, 'what is', 'machine', '0', '0', '0', '0', '1', 'combination', '', 2, 0, 0),
(13, 25, 'this is level question', '0', 'a', 'b', 'c', 'd', '2', 'solution', '', 3, 0, 0),
(14, 25, 'question', '0', '0', '0', '0', '0', '3', 'solution short', '', 2, 0, 0),
(15, 25, 'question 1', '0', '0', '0', '0', '0', '4', 'solution 1', '', 1, 0, 0),
(16, 25, 'question 2', '', '', '', '', '', '4', 'solution 2', '', 2, 0, 0),
(17, 25, 't', 'question 1', '0', '0', '0', '0', '5', 'solution', '', 1, 0, 0),
(18, 24, 'Dvides an arranged ---', 'series into two parts', '0', '0', '0', '0', '1', 'median', '', 2, 0, 0),
(19, 41, 'machine is ', '', '0', '0', '0', '0', '1', 'combination', '', 1, 0, 0),
(20, 41, 'local work is ', '', '0', '0', '0', '0', '1', 'good', '', 1, 0, 0),
(21, 41, '', 'is right', '', '', '', '', '1', 'second question', '', 4, 0, 0),
(22, 41, 'Which is the final answer', '0', 'a', 'b', 'c', 'd', '2', 'testing', '', 1, 0, 0),
(23, 41, 'this is a second question', '', 'a', 'b', 'c', 'd', '2', 'testing 2', '', 2, 0, 0),
(24, 41, 'short 1', '0', '0', '0', '0', '0', '3', 'short ans 1', 'explain 1', 1, 0, 0),
(25, 41, 'short 2', '', '', '', '', '', '3', 'short and 2', 'explain 2', 2, 0, 0),
(26, 41, 'short 3', '', '', '', '', '', '3', 'solution 3', 'explain 3', 3, 0, 0),
(27, 41, 'question 1', '0', '0', '0', '0', '0', '4', 'solution 1', 'exaplain 1', 1, 0, 0),
(28, 41, 'question 2', '', '', '', '', '', '4', 'solution 2', 'explain 2', 2, 0, 0),
(29, 41, 'p', 'question 1', '0', '0', '0', '0', '5', 'solution 1', 'explaination 1', 2, 0, 0),
(30, 40, 'working chapter 40', '', '0', '0', '0', '0', '1', 'solution', 'explain', 1, 0, 0),
(31, 40, 'question 40', '0', 'a', 'b', 'c', 'd', '2', 'solution', 'explain', 1, 0, 0),
(32, 40, 'question', '0', '0', '0', '0', '0', '4', 'solution', 'exlpain', 1, 0, 0),
(33, 40, 'q', 'question 40 1', '0', '0', '0', '0', '5', 'solution', 'explain 1', 1, 0, 0),
(34, 39, 'fill 39', '', '0', '0', '0', '0', '1', 'solution', 'explain', 2, 0, 0),
(35, 39, 'mcq 1', '0', 'a ', 'b', 'c', ' d', '2', 'solution', 'explain', 1, 0, 0),
(36, 39, 'questin 1 39', '0', '0', '0', '0', '0', '3', 'solution ', 'explain ', 1, 0, 0),
(37, 39, 'p', 'question 1', '0', '0', '0', '0', '5', 'solution', 'explain', 1, 0, 0),
(38, 40, 'introducton chapter 3', '', '0', '0', '0', '0', '1', 'test', 'test', 2, 0, 0),
(39, 40, 'working chapter 1', '0', 'a', 'b', 'c', 'd', '2', 'solution', 'explain', 1, 0, 0),
(40, 40, 'working chapter 1', '0', '0', '0', '0', '0', '3', 'solution', 'explain', 3, 0, 0),
(41, 40, 'long question working chapter 1', '0', '0', '0', '0', '0', '4', 'solution', 'explain', 2, 0, 0),
(42, 40, 'Find Mean of the series 10, 20, 30, 40, 50', '0', '10', '20', '30', '40', '2', 'The mean of the series is 10+20+30+40+50/5 = 30.....', 'The mean of the series is 10+20+30+40+50/5 = 30', 1, 0, 0),
(43, 50, 'compute mean from the following  1, 2, 3 , 4, 5', '0', '2', '3', '4', 'none', '2', '4', '', 0, 0, 0),
(44, 50, 'WHAT IS MEAN', '0', '0', '0', '0', '0', '3', 'Mean is the middle most obs', '', 1, 0, 0),
(45, 50, 'what is mode', '0', '0', '0', '0', '0', '3', 'max freq', '', 2, 0, 0),
(47, 50, '', '', '', '', '', '', '3', '', '', 0, 0, 0),
(48, 50, '', '', '', '', '', '', '3', '', '', 0, 0, 0),
(50, 50, '', '', '', '', '', '', '4', '', '', 0, 0, 0),
(52, 50, 'question', '0', '0', '0', '0', '0', '3', '', '', 1, 2, 0),
(53, 50, 'question 2 testing', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(54, 50, 'question 3 testing', '0', '0', '0', '0', '0', '3', '', '', 3, 1, 0),
(55, 50, 'question 4 testing', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(56, 50, 'qusetion testing 3', '0', '0', '0', '0', '0', '3', 'dsgfsdhg', '', 1, 1, 0),
(57, 50, 'que ', '0', '0', '0', '0', '0', '3', 'dsvsdv', '', 2, 2, 0),
(58, 50, 'dsbdsmh', '0', '0', '0', '0', '0', '3', '', '', 1, 0, 0),
(59, 50, 'sdasdfhjk', '0', '0', '0', '0', '0', '3', '', '', 1, 0, 0),
(60, 50, 'dfhjdksfh', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(61, 50, 'dssdfhjtttttt', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(62, 50, 'qqqqqqqqq', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(64, 50, 'jjjjjjjjjjj', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(65, 50, 'wwwwwwwwwwwww', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(67, 50, 'hhhhhh', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(68, 50, 'uuuuuuuuuuuuuuuuu', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(69, 50, 'kkkkkkkkkkk', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(70, 50, 'hhhhhhh11111', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(71, 50, 'jhjjjjjjjjjjjj', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(72, 50, 'lllllllll', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(73, 50, 'kkkkkkkk', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(74, 50, 'lllllllll', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(75, 50, 'llllllllllllllllllllllllllllllllll', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(76, 50, 'kkkkkkkkkkkk', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(77, 50, 'lllll', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(78, 50, 'kkkkkkkk', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(79, 50, 'llllll', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(80, 50, 'kkkkkkkkk', '0', '0', '0', '0', '0', '3', '', '', 1, 1, 0),
(81, 50, 'lllllllllllll', '0', '0', '0', '0', '0', '3', '<p>lllllllllllllllllllllll</p>\\r\\n', '', 1, 1, 0),
(82, 50, 'this is final testing', '0', '0', '0', '0', '0', '3', '<p>this is final answer</p>\\r\\n', '', 1, 1, 0),
(83, 50, 'long test one', '0', '0', '0', '0', '0', '4', '<p><em><strong>long solution&nbsp;</strong></em></p>\\r\\n', '', 1, 1, 0),
(84, 50, 'one', '0', '0', '0', '0', '0', '4', '<p><em>sol one</em></p>\\r\\n', '', 1, 1, 0),
(85, 50, 'two', '', '', '', '', '', '4', '<p>sol twp</p>\\r\\n', '', 1, 1, 0),
(87, 50, 'part 1', '2', '0', '0', '0', '0', '1', 'solution', 'expl', 1, 1, 3),
(88, 50, 'questiond', '0', 'a', 'b', 'c', 'd', '2', 'solution', '<p>explaint</p>\\r\\n', 1, 1, 3),
(89, 49, 'wvd 1', '0', 'a', 'b', 'c', 'd', '2', 'solition', '<p>explaintation</p>\\r\\n', 1, 1, 2),
(90, 48, 'straight line mcq', '0', 'a', 'b', 'c', 'd', '2', 'solution', '<p>dsdfkhksdjfkj</p>\\r\\n', 1, 1, 4),
(91, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(92, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(93, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(94, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(95, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(96, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(97, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(98, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(99, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(100, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(101, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(102, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(103, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(104, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(105, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(106, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(107, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(108, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(109, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(110, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(111, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(112, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(113, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(114, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(115, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(116, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(117, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(118, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(119, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(120, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(121, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(122, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(123, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(124, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(125, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(126, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(127, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(128, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(129, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(130, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(131, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(132, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(133, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(134, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(135, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(136, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(137, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(138, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(139, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(140, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(141, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(142, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(143, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(144, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(145, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(146, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(147, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(148, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(149, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(150, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(151, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '', 'Answer', 'Explanation', 0, 0, 0),
(152, 65, 'q1', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(153, 65, 'q2', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(154, 65, 'q3', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(155, 65, 'q4', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(156, 65, 'q5', '', '1', '2', '3', '4', '', 'ans 1', 'exp 1', 1, 1, 0),
(157, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(158, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(159, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(160, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(161, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(162, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(163, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(164, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(165, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(166, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(167, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(168, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(169, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(170, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(171, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(172, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(173, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(174, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(175, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(176, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(177, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(178, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(179, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(180, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(181, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(182, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(183, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(184, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(185, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(186, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(187, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(188, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(189, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(190, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(191, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(192, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 0),
(193, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(194, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(195, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(196, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(197, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(198, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(199, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(200, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(201, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(202, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(203, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(204, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(205, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(206, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(207, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(208, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(209, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(210, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(211, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(212, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(213, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(214, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(215, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(216, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(217, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(218, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(219, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(220, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(221, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(222, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(223, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(224, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(225, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(226, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(227, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(228, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(229, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(230, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(231, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(232, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(233, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(234, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(235, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(236, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(237, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(238, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(239, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(240, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(241, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(242, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(243, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(244, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(245, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(246, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(247, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(248, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(249, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(250, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(251, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(252, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(253, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(254, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(255, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(256, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(257, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(258, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(259, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(260, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(261, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(262, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(263, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(264, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(265, 65, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(266, 65, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(267, 65, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(268, 65, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(269, 65, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(270, 65, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(271, 77, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(272, 77, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(273, 77, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(274, 77, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(275, 77, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(276, 77, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(277, 77, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(278, 77, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(279, 77, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(280, 77, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(281, 77, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(282, 77, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(283, 77, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(284, 77, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 9),
(285, 77, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 8),
(286, 77, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 7),
(287, 77, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 6),
(288, 77, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 5),
(289, 77, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(290, 77, 'q1', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 1),
(291, 77, 'q2', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 1),
(292, 77, 'q3', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 1),
(293, 77, 'q4', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 1),
(294, 77, 'q5', '', '1', '2', '3', '4', '2', 'ans 1', 'exp 1', 1, 1, 1),
(296, 83, 'q1', '', '1', '2', '3', '4', '2', '1', 'exp 1', 1, 1, 1),
(297, 83, 'q2', '', '1', '2', '3', '4', '2', '1', 'exp 2', 2, 2, 2),
(298, 83, 'q3', '', '1', '2', '3', '4', '2', '1', 'exp 3', 3, 3, 3),
(299, 83, 'q4', '', '1', '2', '3', '4', '2', '1', 'exp 4', 4, 1, 1),
(300, 82, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(301, 82, 'q1', '', '1', '2', '3', '4', '2', '1', 'exp 1', 1, 1, 1),
(302, 82, 'q2', '', '1', '2', '3', '4', '2', '1', 'exp 2', 2, 2, 2),
(303, 82, 'q3', '', '1', '2', '3', '4', '2', '1', 'exp 3', 3, 3, 3),
(304, 82, 'q4', '', '1', '2', '3', '4', '2', '1', 'exp 4', 4, 1, 1),
(305, 83, '﻿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(306, 83, 'q1', '0', '1', '2', '3', '4', '2', '1', 'exp 1', 1, 1, 1),
(307, 83, 'q2', '', '1', '2', '3', '4', '2', '1', 'exp 2', 2, 2, 2),
(308, 83, 'q3', '', '1', '2', '3', '4', '2', '1', 'exp 3', 3, 3, 3),
(309, 83, 'q4', '', '1', '2', '3', '4', '2', '1', 'exp 4', 4, 1, 1),
(310, 83, '﻿Question', '', '', '', '', '', '3', 'Answer', 'Explanation', 0, 0, 0),
(311, 83, 'sh1', '', '', '', '', '', '3', 'ans1', 'exp1', 1, 1, 5),
(312, 83, 'sh2', '', '', '', '', '', '3', 'ans2', 'exp2', 2, 2, 6),
(313, 83, 'sh3', '', '', '', '', '', '3', 'ans3', 'exp3', 3, 3, 7),
(314, 83, 'sh4', '', '', '', '', '', '3', 'ans4', 'exp4', 1, 1, 9),
(315, 83, 'sh5', '', '', '', '', '', '3', 'ans5', 'exp5', 4, 1, 2),
(316, 83, '﻿Question', '', '', '', '', '', '3', 'Answer', 'Explanation', 0, 0, 0),
(317, 83, 'sh1', '', '', '', '', '', '3', 'ans1', 'exp1', 1, 1, 5),
(318, 83, 'sh2', '', '', '', '', '', '3', 'ans2', 'exp2', 2, 2, 6),
(319, 83, 'sh3', '', '', '', '', '', '3', 'ans3', 'exp3', 3, 3, 7),
(320, 83, 'sh4', '', '', '', '', '', '3', 'ans4', 'exp4', 1, 1, 9),
(321, 83, 'sh5', '', '', '', '', '', '3', 'ans5', 'exp5', 4, 1, 2),
(322, 83, '﻿Question', '', '', '', '', '', '3', 'Answer', 'Explanation', 0, 0, 0),
(323, 83, 'sh1', '', '', '', '', '', '3', 'ans1', 'exp1', 1, 1, 5),
(324, 83, 'sh2', '', '', '', '', '', '3', 'ans2', 'exp2', 2, 2, 6),
(325, 83, 'sh3', '', '', '', '', '', '3', 'ans3', 'exp3', 3, 3, 7),
(326, 83, 'sh4', '', '', '', '', '', '3', 'ans4', 'exp4', 1, 1, 9),
(327, 83, 'sh5', '', '', '', '', '', '3', 'ans5', 'exp5', 4, 1, 2),
(328, 83, '﻿Question', '', '', '', '', '', '4', 'Answer', 'Explanation', 0, 0, 0),
(329, 83, 'sh1', '', '', '', '', '', '4', 'ans1', 'exp1', 1, 1, 5),
(330, 83, 'sh2', '', '', '', '', '', '4', 'ans2', 'exp2', 2, 2, 6),
(331, 83, 'sh3', '', '', '', '', '', '4', 'ans3', 'exp3', 3, 3, 7),
(332, 83, 'sh4', '', '', '', '', '', '4', 'ans4', 'exp4', 1, 1, 9),
(333, 83, 'sh5', '', '', '', '', '', '4', 'ans5', 'exp5', 4, 1, 2),
(334, 191, '', '0', 'a', 'b', 'c', 'd', '2', 'd', '<p>explanation</p>\\r\\n', 1, 3, 1),
(335, 191, 'Demand for a commodity refers to:', '', '0', '0', '0', '0', '1', 'B', 'explantion', 1, 3, 2),
(336, 191, 'when the price of petrol goes up, demand for automobiles decreases. it implies that petrol and automobiles are', '0', '0', '0', '0', '0', '3', '<p>solution short question</p>\\r\\n', '', 2, 1, 3),
(337, 191, 'demand can be defined as', '0', '0', '0', '0', '0', '4', '<p>solution</p>\\r\\n', '', 3, 2, 5),
(341, 196, 'ï»¿Question', '', 'option 1', 'option 2', 'option 3', 'option 4', '2', 'Answer', 'Explanation', 0, 0, 0),
(342, 196, 'How much interest will be earned on Rs. 2000 at 6% simple interest for 2 years', '', '240', '540', '462', '124', '2', '1', '', 1, 3, 3),
(343, 196, 'Sonu deposited Rs. 50,000 in a bank for 2 years with the interest rate 5.5% p.a. How much interest would she earned also find amount', '', 'â‚¹ 5320, â‚¹53200', 'â‚¹ 5500, â‚¹55500', 'â‚¹ 6500, â‚¹ 65000', 'â‚¹4500,â‚¹ 45000', '2', '2', '', 1, 3, 3),
(344, 196, 'sachin deposited â‚¹ 100000 in his bank for 2 years at simple interest rate of 6%. How much would be the final value of deposite', '', 'â‚¹11000, â‚¹1,11,000', 'â‚¹15000, â‚¹1,15,000', 'â‚¹12000, â‚¹112000', 'â‚¹19000, â‚¹119000', '2', '3', '', 1, 3, 3),
(345, 196, 'A person borrows â‚¹5000 for 2 years at 4% p.a. S.I. He immediately lends to another person at 6.25% S.I for 2 years.Find the gain in the transaction per year', '', '452', '893', '225', '325', '2', '3', '', 1, 3, 3),
(346, 196, 'If a simple interest on a sum of money at 6% p.a. for 7 years is equal to twice the simple interest on another sum of money for 9 years at 5%. Find the ratio of sum of money.', '', '15:07', '07:15', '17:05', '05:17', '2', '1', '', 1, 3, 3),
(347, 196, 'by mistake a clerk calculated the S.I on principal for 5 months at 6.5% p.a. instead of 6 months at 5.5% p.a. If the error in calculation was Rs. 25.40 find the original sum of money', '', '69,690', '69,250', '54,240', '60,960', '2', '4', '', 1, 3, 3),
(348, 196, 'Kapil deposited some amount in a bank for 7.5 years at the rate of 6% p.a. simple interest Kapil received Rs. 101500 at the end of the term. Compute initial deposite of Kapil.', '', 'â‚¹ 80,000', 'â‚¹ 90,000', 'â‚¹ 65,000', 'â‚¹ 70,000', '2', '4', '', 1, 3, 3),
(349, 196, 'What sum of money will produce â‚¹ 28600 as an interest in 3 years and 3 months at 2.5% p.a. S.I?', '', 'â‚¹ 5,55,000', 'â‚¹ 5,32,000', 'â‚¹ 4,25,333', 'â‚¹ 3,52,000', '2', '4', '', 1, 3, 3),
(350, 196, 'The rate of simple interest in a sum of money is 6% for first 3 years and 8% for next 5 years and 10% for the period beyond 8 years. If the simple interest occurred by the sum of 10 years is â‚¹1560 find the sum.', '', 'â‚¹ 4,000', 'â‚¹ 3,000', 'â‚¹ 2,000', 'â‚¹ 1,000', '2', '3', '', 1, 3, 3),
(351, 196, 'what sum of money will amount to â‚¹1380 in 3 years at 5% S.I', '', 'â‚¹ 1,200', 'â‚¹ 1,899', 'â‚¹ 1,290', 'â‚¹ 1,000', '2', '1', '', 1, 3, 3),
(352, 196, 'divide Rs. 2760 in two parts such that S.I on one part at 10% p.a. for 2 years is equal to S.I on the another part at 12.5% for 3 years.', '', 'â‚¹ 2650, â‚¹568', 'â‚¹1800, â‚¹ 960', 'â‚¹1600, â‚¹690', 'â‚¹1900, â‚¹560', '2', '2', '', 1, 3, 3),
(353, 196, 'two equal sum of money lent at S.I 11% p.a. for 3.5 years and 4.5 years. If the difference of interest of two period was Rs. 412.50 find the sum', '', 'â‚¹ 2,750', 'â‚¹ 3,520', 'â‚¹ 3,750', 'â‚¹ 2,520', '2', '3', '', 1, 3, 3),
(354, 196, 'a sum of Rs. 46875 was lent out at simple interest and at the end of 1 year and 8 months the totals amount was Rs. 50000 find the rate of interest percent p.a. ', '', '5%', '6%', '4%', '7%', '2', '3', '', 1, 3, 3),
(355, 196, 'find the rate of interest owed after 6 months is Rs.1050 borrowed amount being Rs. 1000 ', '', '11%', '15%', '18%', '10%', '2', '4', '', 1, 3, 3),
(356, 196, 'a certain sum of money amounts to Rs. 6300 in 2 years and Rs. 7875 in 3 years and 9 months at S.I. Find the rate of interest.', '0', '10%', '30%', '20%', '40%', '2', '3', '', 1, 3, 3),
(357, 196, 'what is the rate of S.I a sum of money amount to Rs. 2784 in 4 years and Rs. 2686 in 3 years.', '', '3%', '5%', '6%', '2%', '2', '1', '', 1, 3, 3),
(358, 196, 'if the S.I on Rs. 1400 for 3 years is less than the SI. On Rs. 1800 for the same period by Rs. 80. Find the rate of interest', '', '1%', '2%', '4%', '6%', '2', '4', '', 1, 3, 3),
(359, 196, 'in what time will Rs. 85000 amount to Rs. 1,57,675 at 4.5% p.a.', '', '9 years', '12 years', '15 years', '19 years', '2', '4', '', 1, 3, 3),
(361, 255, '', '0', '1:3', '1:3 Kg', '3:1', 'None of these', '2', 'a', '<p><img src=\\\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAAAnCAIAAAAHGNQaAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAABNhJREFUeF7tWz2asjAQxu8sYOHjCfAEss1W224npTZ2W25nA6V2tlbbLJxgPYGPhXAXv5mQQMKPi2wgibupBPM382bemUzC6Hq9Wn/lcTXw72FEi/0wfRhh5AliMMBpOBtxxTvlWol9fD9TBnga+zN1o4uLw2CAURA3SMDHZOVraVPZ5ttoYbkvT+xZnj1831Ma+jPH2x2nYxWjV+dnOMANCk8vJ0uFhgHdzXj9BctLm/KYACfn4+J5DkoGskS29uNC4WhihMH9MA4l+217ud3O9bBcJrDJAI+n1nHlZG4Y4CpCrPhj504cIuLlhCy+RbCxAN7OwXpDXt9Pzt7K0oRI+zN4gwG251vmfpNouls5zE4pQWOosxnvC9dspeH7zg32mZHZY3DhdBn0p1/1Pecxitk/ksBlERf+pGUR8VJxdeA1xmFciCZTfPTB4tAye7+vL4MtuMk4wAEjcgjn6cJvjeGPPPRCY1YShw1t0uYCjNtgP84ATOPN6kj3ReCACXL204t7PHymwNRcjEUgT+Nwc572S9Di2hoaVm68+wxeo9pJtHBzLnYXjG3RcCk9ZlztFmRJyRveQONeCBrnlE/KcotpKVOcRZxRtbR0IVFEvZxObqdWmaB6zuNqP11pC4ICXMIT5f8+AjFIS0J8hebbQjxpOv55R4Stvo8IE6xHjZWRR70Pnq8D4r8Uug65Q9vLt8A60D2z824FCbd7kjuU7N5a5z7T8NX5mOzJckoCa7d6JamBjKLLjCzuKMo0jrU5YmePeSfFfy2W3c/X9wP3kAQLCBhqIbotdQ5gG4omsYmIHnniV0bxm+c/47hQ07VynzMkTI2RJEpDKXrn8SdvI+/Ec5i9/LoW2b75881UOu5SFm/0YKcF1ZcO/fhp6HDiJn16UjoknfAJduYXyB8OnGZZ04lDkuIU4Nw+ibVCOi8/eqNNuXlB6+aCaUIuAWhjvvic3GhAVk99KbtJYQ329iDOVcL0OnfYwZvT6WapW2Ig5SDLXu4hviryuiSNAMvCWUFgkuGg7DBsGP7soNasSdP0OnfY3FDk1Go9SNMDSiRMrkbRBGJr5+UMkH4eMPfH7Alt9MbQosmWDLqmnRTK6kGHVeYqc0Y3DzKkvORIvDaKpkTNmSwLh2kyiFA6lzTiAq6/IEs+05SDVTHspeNlkViGWVGhYZtEeZi5ZmFPVDRmqT8gbyHOU75NivLMpXxlD9tjfe6zFuBrEgWVPMe10XMMK8edo1UyO9wRIeHWYv+dLbah9uN1uaQ7ZZNc3TyAYe9P0nFCbqacmOG11NO5Qg0QxGfRWFT0cpJRu6M7w44LO9xqG/ACHga3W7rBxNPK/mK/9j0bBnCHW20qLuDhIfTrYRpV0gntgZFV0zCAG8XW5gJeNZckC6qO/dxB5/pUvZWbJYeBuYemWzmMytgWIhOj5wta2SyGiu1uIGNekMWSac1XEjS5gKfHScujUHQDf6m+gKfi8wpRFeYCzN9q0+QCHn5Gkd8DxGub2ecVaos+jrXVTBoyO5pcwKvNJbWSq7dKI+hZ7QpTMDp88nBZ54eRYHeeFRUH3gom1OOQ5lJ0Z6WQO++swIbVg89Z1uqptLM8txv+QoANvoDXYRH8SoruoCdjm/xCCzYWq04T/wO4k9rMafQfjumtJdstHVwAAAAASUVORK5CYII=\\\" style=\\\"height:39px; width:160px\\\" /></p>\\r\\n\\r\\n<p>They have same units, so it is a ratio.</p>\\r\\n', 1, 3, 1),
(362, 255, '', '0', '5:200', '5:2', 'Not a ratio', 'None of these', '2', 'b', '<p>(b) is correct</p>\\r\\n\\r\\n<p>Since 1 metre = 100 cm</p>\\r\\n\\r\\n<p>Ratio of 5 m &amp; 200 cm = <em>5&times;100cm</em><em>200cm</em><em>=</em><em>5</em><em>2</em><em>=5:2</em><img src=\\\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHMAAAAcCAIAAADdgxc+AAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAAA4VJREFUaEPtWT+WsjAQx+8saOHzBHACdhurbe2gZJvtttzOBkvsaK22WTkBnmCfhXAXv5lMCMEEUf6sPB80kmFmkvll/iTj5Hw+G+PTAwL/etA5qkQEENnYm+SPvclqcMliz554seDKNjYTtgVNpfwV1HcZ0veiyGfdPSQFfBLfhCFgU8aOjwBVLzXm0pqyzWr3loLgfrF9YVwqpW8TZP0Xhvzl1JdzabOB6UfLbwI323hrIwodJmc6YehMZWB/dofFDDfDWbrG7ykzMoWC7KCFPJt5O428mFMhTjAO+MdHgtHp3ITs9oXsFskAMERwbXt1XIbMj6sea05QT+fW4Zji2yUFImC6m3+CZ6eBC9xZOvuIAmv7tZ59JOe9e3hfnZYRvHRgmGJIBzobqkBknZBSQRos3ldFoj3dpJLDKUF6QQEvNoLId2B7TB93yXQcAzzb/QyBlp1+LfYVX/gm3TSvjqnCkMb6WgkCshCKSt2C+ARvTZIkmvO0oJ3FnC2M7TfLGjwLqJT0eCBZzNK88gHNXWKGQdjfXgF0ejHiuK6CXrFWZ0grcArh2Kst7cpMUHwCi1Mtd4/VCKNWlAIcAZ28Wo5YK2C8e5ekBY9CAXliIAFSQxrhE1fDmPL5Odu9P6oh92oo+PmiBVx8mRUK0xRg4CjmdhrNJ39qSUT2OprlXch5yUPQh8abQvt8YfoJP65CKXl9swxWaUZk2yOraKBSPOyYvkx3khG3xmpu4H2qIHEWcxUlgimRapCCHorR9x52rJ3KxjutTttYVVmQQBYl9wqyWJD5IQCQ7Wj6p1ZzUzljxwNx/Bl8Bcu7O6JlVLzUN4/KXtyhKk1Uwvn/ax5R24U/T+1sjY1DL83jmmUD+dit5llwV4kII/DdMRto0ZdO/qU7jraCqR0PhHkyxCrWrgYORLryPJt39qClnV+Zh9Tk1sKnWfMDYdanInGhZ0mG5RBBukJpnNe6ENSsuQu1TXXU5tm8H0M5nU0D0GKKVin4Ebo5vDWB3DSCWkBUEOMdnGun7aa2CDmph9RaV2MFNbfbbLM+Qh+VYmpYTe7KOC+teXDZgO0UOFqQ/0EmeygPO8lnC4py5yy4imgVvcPGDlEpWFpz9+rv0FhdweAPsFnog7tSw3pYTW69K+KfdvKaH+iwlR2ZcvtC5NfBNLl1vqNd8x1O1jHreJ7ty7HH/mxfyP4HFGLowgO9sb4AAAAASUVORK5CYII=\\\" style=\\\"height:28px; width:115px\\\" /></p>\\r\\n', 1, 3, 1),
(363, 255, '', '', '17:6', '17cm : 6 kg', 'Not a ratio', 'None of these', '2', 'c', '<p>(c) is correct</p>\\r\\n\\r\\n<p>Cm is unit of length and kg is unit of mass. So, they cannot be converted in same units.</p>\\r\\n\\r\\n<p>170 cm : 60 kg is not a ratio.</p>\\r\\n', 1, 1, 1),
(364, 255, '', '', '5:3', '3:5', 'Not a ratio', 'None of these', '2', 'b', '<p>(b) 3:5</p>\\r\\n\\r\\n<p>Ratio <em>=</em> Antecedent &nbsp;Consequent <em>=</em><em>3</em><em>5</em><em>=3:5</em><img src=\\\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANYAAAAnCAIAAAD8TyHFAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAABohJREFUeF7tXDty2zAQpXIWKYVHJ6BPYKZJ5dYdVVpNupTp0sil2bl1pcbkCaITeFJEuouCPxYgVgRFgB8NUdgjaLFYLh4X+wG0OJ/PydxmDQyngS/DTT3PPGuAauBmIHh6uV8s7l9OvstaVZUv6TV0VJwW0phTRJbtmueJOOZWIFj93iZpenj/8MJgtVlk+4ha7cI6smynU7UhLytr9xv/V7bLI10eeyMQrPZF+vj2Mz9sf0c1bvEWoh/Op5en1f7ujQQA5/NxlxTbpxGAkEkz8XbcpUm6O57PZZ4keamfhn+mf3lTROKzpNUUnEQ20A/ZsnkgS0Gvu/OdFIl95aL3lS3e2ii1xZvCh3PiQzRyGqBKS6t86SHQOMIgVOkQjVv6Dadh/RKQupv3K0Ca9JDc4OOg95EtnuKPxzJP07wE71u8yS5zvgEIGqbPxCBAjjRGDAxgCB1Qs3CkwwKzAh5GbxlgNTNGz2QAJleNty15cGSwR2F7Qg4tfvB5fBlO3xckbmCSf38Q++Ly22NqOoTrr8tLftbx7yEpMuGf039ZwchpPxi6fP5zPr+SWRD607/PJL1bqZlWd2KdMf6MskG2OP4hexRi5ct1sV1dHbWHk23qEDy9/CKQARhabQ/k8943KKHQMa0gXR6KNXeLTR9uZZs4LR9eicH1zSE0cevw/cQhePp4PxgBhNhvi1+ekd7y6zpJPv/VUznUjMF+kitZbKoEo6f9h79HtRLU+NGG8u+wZkGHDmKIzSfw3bFHSWf5UzCQdUXIys2CDpoRdnA3kY01+kEMcpFeeJXc3XKENYC/w3lko2vOY0jN80l5DGLGVSFnacdryuEIrkP5DbbMXP0qHFAOOuhjakSSMhi97jeTMk56T9naLWcj9bHc5cJLHUs4QiAI9KwNpBEk4g9WliILFz2Oa1TuTDAtDZQyHhe+oIW4Mi+y5lgJlpIeXi858UG9l5nZqDTgXfFjVXzdMhIHsuYORx5+7LzrraPSxyxMzxpoWfGDoeOfZ54t84yIaTyoG4kME2oCRTpEfKQBI2+autmU9qyyebqwGqBJxleBJZqTvYK7G4Lk3MkhffwmcrrEgmYFLDEV2aYiO6/0/8wsGsXmp0i7l+tRJD+v0Ms8pKUG6H789L4u3wQeWwx3hyO1XBtwdZ2lJKS+1FwJN6JFU+5LQkzL9Y4pbXAFtmboqvg5shWkKq3XFxQHRUSsbJyV9VK6s+SyK63KItqYCxkpt3ixbpe0C5oxrXThqcdyiAm7cTnpyEkF6OyNePn8RiKR7Ur5dYSUhjKrbSJr2s4kTh9rHkZTE+fSRdHYo3fhqccaFT9VU3fyXtJ4Vxaf6r4gAyGpuioQiiKYDGBYlRRtVqHKrt7Xx1mhOox65ljGBxvBFdiRYfuKX/2cp6zdKFcMlsHEhlwrJekNF1IjBbSJG6JZfK0BrOJX34h54VHUBiEwbF8QllnNw57ijSRc1JlNUOYyfD69VcePKEwn1bOoMxUQqeJTLIFVieLqCZCKnwOC9IysNOvwqOKUa8S8tAhQjsVSV+t30IEhIzksrDTvKQzzuJ6paR+npG+aapMVBH/SRyXTEx+4JDeYxnAlp29ltJnPVaJoMz407TDIDzCrl5FwuQR8oOMbY083t3SQBYALqLsZw/rFFHHaxrg6IlbQcLV97lgF0Bk/oRXfO2ol6mStYHOszWqISJ2myPbfuZ6U2aw2RuJJpwRohJgl8l6eLvjAolGZZOLAP24iMD50RE0etPgU2gSNgF8rwI6IuPlkp2km9etvhemSDLOqtYkEoUWvuTq+oFYQ49PvPSasRDHgyk7WCtK313XgXr3Vlpk0E5aO5BXNlso7KDAx3/a+EmZWxnGPieSPJdr4/SX4qMNYxMlC0L6sIdVHt7vr1CpvlrHEPEmRcy7YfSV2KQQ0+7O9nG3vPcWHg1GiiD8dOsNkIZgwq1W7pcTO+LDLlK3rNEJHDIl01+Q29tL9Jnj9DCsayf7R32MaDoQDOgGdp27ICyJ1GsRXqyXXZRhrZRsVV5h95cE08jMMIsWP8UHkiXKPCS1RdF6L6xlMOjXNI1r4+trVETwpo1SmEQCTMmbiwnn/SBYy2fxpTm4FGXkWLhbPthholvLCX/8ActfkCZlDYT/joQQYx68pLIgihzPBNzQz8UFX748wUX5DDxf1UabrC0ZVy8y8Pw3MEOxP1/NMTg3MG/EMjIE1MFvBgRdgnv4/zEkFgkuQ1UMAAAAASUVORK5CYII=\\\" style=\\\"height:39px; width:214px\\\" /></p>\\r\\n', 1, 1, 1),
(376, 255, '<p>Which ratio out of the following ratios is greater.</p>\\r\\n\\r\\n<p><img src=\\\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH4AAAAkCAIAAADAVBlOAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAAA+ZJREFUaEPtWT16ozAQxXsW48KfT4BPkBwg7XZQOs12W7rbBpd2t236hRPYJ8iXInAXVhr9IGFBRmbWIlloEuPRmzdPo9FIXjRNE81PCAW+hXA6++QK+Ehfl9l2e6jphCMHpKN2DyRWcDBPlacJp5MWGGuEDTkgwue0TFBZXx+yX6sf5yKlygVyQCpi98RBSb/cHY8PS0Ja5ICE3O4GhZL+bmz+K0ez9MGme5Z+lj6YAsEc+2b96zthX8+jJgcMJqW3Y1SvW6RJAm09PEmS5hVqXK8ROeA4OkFGL774HU592MYvT9V5R9kbe+e3cwAUnBpO9At4thnBVQEACjwaQJpgDRQsQ6VMVmIosIleOK9a6vKgBdGKNE2VJ1EiKwj/X3+4dRlyEFWSSABvJcLGmcG1MDiGknuBLa5g71IPvkglTgWXAuxCJuqEJa1GBOsAVBN7K6p9gyGvkfjLtGi/Mpy0L9PcyKse9+7ZaQQ+njKDATqOYDtQ/COzckk/VilNt2IzzPZkdNo447STQaVMA9K04shwOnkubAbi6WXYMx+9MwHCAymHNxGCKixqIjrS+061DPU6PcTi43GP7obscDXDVmwwUO/dGeaQbJAhKJ+y21odhcj/nqLAMkwsELf0MFDc/EK6iEkw+3q2Seyjojo+WDuK3C2v/gxvO8vdGagWm9NzbO88NwDy7Us+jyfD8WbVbVzq99coWcfaJl63TbHNeIBhFFVvlyhas9taHgVbu5fTY/9GW2b76KelWpnZ1mX2/Tl6EntGlb9KRVQ+QG0Y26671mMnO/HFU1p2Ni8r641aLN93CwWmcDgYdtbOEIpePdbMmrtEd6lIfzLr2bTs17//Wfd7nZ2YVg1s6j8vF5YSihrP6qFnudpEl7dKm0D6Ih4HQ+Q5W64ekSi64HRKh8VArUQxQJYqOdwr+6/Ln0gZtbygr/LO9XaAmZMywwDPUdThvcmnr93rYWgMBa8yCGgHhSYfNYBmrW9trQ6bVX2BxrbZthXT+4CPVA42VdFuKgTbrEGQiSF65H7plUByR3M3l26GVii8AktB2hgGpdelR6SalQNFrm9iFFq3uXSnJ/RgVzxGpDI54AguoYZipOfTR3o6JQcMpd4ovxjpLQeYlsGLETmgl/eAxl7Sk5xOzWDJAQMq6e0a+1MJHGrimB1oNuuY4gKWHBDRQU7MxG+yxLWbV/M57IAc0C+ekNZeBUedGii1F10i4WSGVNPLN7bg2Gt1xOnUvejJASdWW5x0EBNFezrVB1Gq4y4igkmaoAoO8emU3wWSHncnqeyHpL76z+ITLjy31foJB/R5qM3SB5urv6jN/sNDFhz5AAAAAElFTkSuQmCC\\\" style=\\\"height:36px; width:126px\\\" /></p>\\r\\n', '0', ' 2 1/3:3 1/3', '3.6: 4.8', 'Both are equal', 'None', '2', 'b', '<p><a name=\\\"bookmark7\\\"><strong>Calculator Tricks</strong></a></p>\\r\\n\\r\\n<p><strong>StepI:</strong><em> </em><em>2</em><em>1</em><em>3</em><em>:3</em><em>1</em><em>3</em><em>:=</em><em>7</em><em>3</em><em>:</em><em>10</em><em>3</em><em>=7:10</em><img src=\\\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJIAAAAcCAIAAAAFo3FxAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAAA71JREFUaEPtWrF64jAMNvcspAMfT5A8QbnlJtZuYaRLtxvZusDYbF0zdWnyBOURWJx36ckOJo6dxJZwDuiHJwrWr9+SZUl2J9/f3+w+bs0Cv26N8J2vsADabVW5SiarMoT1AkJpdMrVpBnJrnIyNWlUu0QCJGFW6dRPmYByGyxwxdmMoseUCQjVhgY3bTmc/DCKNF3+ng6ytWlUu6d8KQCKeba4XsfVK0QMvo1ZWiAE+qcGhLKV8G3qSVOnoX0uUharHRBkuQFBUNEWIsz+F0b5ms9eHina4lkkxaJZvD9wCsL4Mj/UbdVuw/6uhw/IPuNqvlIeHN8PSA0/020QaktaqE0f5iz7EBVX9Znv5w80zyOdQJjeOnA5L9I4rlHi1D7Y4bg/Dfe5L9GO8y00HBQqLUB+cpM7InbQUKRjz9Q4xE2kSmM4UKUHDMtDmlZOOf7CNKVCh5KQ+rwX38VcJvejlvPRUH67nsmw8MYFun07KSr3tD0rdlaNIs0of9Td1g6805QQRnAyDqHkyjEcNpCVL4eu5egZtZrWF8qFg7ktTEauoDl6yufFO7FEIJz81yhSvj7v04Eyabp+e3u0U2n5kbHGD1DdMlEy9bnNpaRlGHmv0NWayh+iaJGx+Szyze42mrq30K4/1Eefa5AT116eGDcTyQjzp39UR4Jj0lRGomISo9NtALphBX9rtz220Zyrna6/RKxzuHF4jjQLI6GOMF2H4JcRwijkjm1gfWWtEUGmkYWGJIu3tOK208qWLbpKmfOzRpNXz8e6PQTE6s3c1hZVRYkZbZCGNrN3cw87w8prArkLIp5LXqTQkwhk5AFJ7P5VNqt58sO+PmpbWxd6Bq34hL/87uSawlRDq7dNfavbOaEvaFCTUZE3HrKrd7M7MVXKm5JWYGrNU8Nfj7Zytcj22eJ0vC8ycnzAxnh8KbZsE0m0KJ9vzVSJ3uY3KiBuW2LXS4RYG7yIJckEyje2f44mSbKqH50gl4Ir4RvdjBPRu93HrVkAdScJx3r9gghPiB7vj0O2CAhlqKEh06Qu5m2U2/iByRdE8YSYf7rfjQdWFRDK0EJDpkldzG29l1sDSZYX9T1MgBEQymBDQ6ZJBTAEEgIVbTJvQmZc5Mz/0qN3RwaEMnTQkGlSFwo4pJvret6676SghIayws28lPUhGXBpPuqoczDRJtK2rESmogc8awSE6qhI8CTH43OWmfqFMf5unj3PfkIMCGVH2emh1/8/lcbjgzGw99x73zZSOIwLizkkx2VyR0dY4B9AgGc4id04cQAAAABJRU5ErkJggg==\\\" style=\\\"height:28px; width:146px\\\" /></p>\\r\\n\\r\\n<p>By calculator 7:10 = 0.70</p>\\r\\n\\r\\n<p><strong>Step II</strong>: By calculator Find <em>3.6</em><em>4.8</em><em>=0.75.</em><img src=\\\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAAAcCAIAAABeRy4FAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAldJREFUWEfdVzFygzAQFLwFXHh4AbzASZPKbTooTeMuZToaKOMnuEoTeIF5gYfC4i/kdEKAADkwMB451xhkIe1Ke6uTUVUVeeYwnxk8ww4EysTzDAwvSMoeoTILAi8YtuvDu6pS340pKAkeSP3E3rDBlRvqdp1+SAOGprHvp8iEB40RPoXQCXEPCycAaw/h+nwnGvzQhAH/+ammJNodqCij0QKtN0AQ1JWBiTmMuWvZW7bWrMEIMvaUFz+Y1OXtqk/SZj1HAa1DrnJ8Li4zLD3fCBrLfywWUWfArlg7kpXXie86w9MN2Vc6ElqM748BmEL55Aipr0lobFmxHuK1+zyc4nEEpAxryYyyljDfJ/Cwkzj7PhF3a9daYOmWF1SRWVkU5v7HwZqSeEsIsGxXBLeFfjgbgcnaOGp0jKv/tms6QN88tJXFwhSaos+CNJE9Gk+ecWe+pxh0evk7cxamOWRH+l5vYl/Uxszk4+5fx+Vj7Y6Q3e0wMMfDJCSrnha5pJKGLcpnovz5R7N2YEln9M6BjcqOOiYffizxGgclJI+xZAfmCco6XGB6TEb77MT0q81SMVD5cx6Rz8Zxry88h+1PEtOLZE8G8JoHRLPezQ4wT+yZX5kE6puOLjxqAmUSFY5ccpTJe0j2ePKnzimMsLzTL5BAFkTkeNyq0IGlue0hqhsHdpsRRSjkdxp3Kqq2TB0Wj0sMac1vibJY7dhXKgrsNWdeaSwT3K2px5nDXg6kudAItYgSTDf1SAcZXDbgHW/xYr0bBdU3nZXWbN1h/s85oKU8JoD6BZO6jKaZyAdiAAAAAElFTkSuQmCC\\\" style=\\\"height:28px; width:64px\\\" />&nbsp;Clearly 3.6 : 4.8 is greater ratio.</p>\\r\\n', 0, 0, 1),
(377, 256, '<p>Ratio of 5m and 200 cm; is</p>\\r\\n', '0', '5:200', '5:2', 'Not a ratio', 'None of these', '2', 'b', '<p>Since 1 metre = 100 cm</p>\\r\\n\\r\\n<p>Ratio of 5 m &amp; 200 cm = <img id=\\\"_x0000_i1025\\\" src=\\\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHMAAAAcCAIAAADdgxc+AAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAAA4VJREFUaEPtWT+WsjAQx+8saOHzBHACdhurbe2gZJvtttzOBkvsaK22WTkBnmCfhXAXv5lMCMEEUf6sPB80kmFmkvll/iTj5Hw+G+PTAwL/etA5qkQEENnYm+SPvclqcMliz554seDKNjYTtgVNpfwV1HcZ0veiyGfdPSQFfBLfhCFgU8aOjwBVLzXm0pqyzWr3loLgfrF9YVwqpW8TZP0Xhvzl1JdzabOB6UfLbwI323hrIwodJmc6YehMZWB/dofFDDfDWbrG7ykzMoWC7KCFPJt5O428mFMhTjAO+MdHgtHp3ITs9oXsFskAMERwbXt1XIbMj6sea05QT+fW4Zji2yUFImC6m3+CZ6eBC9xZOvuIAmv7tZ59JOe9e3hfnZYRvHRgmGJIBzobqkBknZBSQRos3ldFoj3dpJLDKUF6QQEvNoLId2B7TB93yXQcAzzb/QyBlp1+LfYVX/gm3TSvjqnCkMb6WgkCshCKSt2C+ARvTZIkmvO0oJ3FnC2M7TfLGjwLqJT0eCBZzNK88gHNXWKGQdjfXgF0ejHiuK6CXrFWZ0grcArh2Kst7cpMUHwCi1Mtd4/VCKNWlAIcAZ28Wo5YK2C8e5ekBY9CAXliIAFSQxrhE1fDmPL5Odu9P6oh92oo+PmiBVx8mRUK0xRg4CjmdhrNJ39qSUT2OprlXch5yUPQh8abQvt8YfoJP65CKXl9swxWaUZk2yOraKBSPOyYvkx3khG3xmpu4H2qIHEWcxUlgimRapCCHorR9x52rJ3KxjutTttYVVmQQBYl9wqyWJD5IQCQ7Wj6p1ZzUzljxwNx/Bl8Bcu7O6JlVLzUN4/KXtyhKk1Uwvn/ax5R24U/T+1sjY1DL83jmmUD+dit5llwV4kII/DdMRto0ZdO/qU7jraCqR0PhHkyxCrWrgYORLryPJt39qClnV+Zh9Tk1sKnWfMDYdanInGhZ0mG5RBBukJpnNe6ENSsuQu1TXXU5tm8H0M5nU0D0GKKVin4Ebo5vDWB3DSCWkBUEOMdnGun7aa2CDmph9RaV2MFNbfbbLM+Qh+VYmpYTe7KOC+teXDZgO0UOFqQ/0EmeygPO8lnC4py5yy4imgVvcPGDlEpWFpz9+rv0FhdweAPsFnog7tSw3pYTW69K+KfdvKaH+iwlR2ZcvtC5NfBNLl1vqNd8x1O1jHreJ7ty7HH/mxfyP4HFGLowgO9sb4AAAAASUVORK5CYII=\\\" style=\\\"height:21pt; width:86.25pt\\\" /></p>\\r\\n', 1, 0, 1),
(378, 256, '<p>Ratio of the height 170 cm and weight 60 kg of a person is</p>\\r\\n', '0', '17:6', '17cm : 6 kg', 'not a ratio', 'None', '2', 'c', '<p>Cm is unit of length and kg is unit of mass</p>\\r\\n\\r\\n<p>So, they cannot be converted in same units.</p>\\r\\n\\r\\n<p>170 cm : 60 kg is not a ratio.</p>\\r\\n', 1, 1, 1),
(379, 1329, ' DR.	SUNDARAM’S ACCOUNT	CR. Particulars	`	Particulars	 ` To Consignment to Madras A/c	98,000	By Consignment to Madras A/c	3,150 (Sales)		(Expenses)	5,250 		By Consignment to Madras A/c (Commission)	9,800 		By Balance c/d	85,050 	98,000		98,000  Working Note: Calculation of Cost of Loss-in-transit, Goods-in-transit and Goods in hand 	Particulars	Loss in transit (50 Units)	Goods in transit (100 Units)	Goods in hand (150 Units) A.	Cost of Units @  Rs.100	5,000	10,000	15,000 B.	Add: Consignor’s proportionate expenses @  Rs.5	250	500	750 C.	Add: Consignee\\\'s proportionate expenses @ Re. 1	—	—	150 D.	Total Cost	5,250	10,500	15,900', '0', '0', '0', '0', '0', '4', '\\r\\nDR.	SUNDARAM’S ACCOUNT	CR.\\r\\nParticulars	`	Particulars	 `\\r\\nTo Consignment to Madras A/c	98,000	By Consignment to Madras A/c	3,150\\r\\n(Sales)		(Expenses)	5,250\\r\\n		By Consignment to Madras A/c (Commission)	9,800\\r\\n		By Balance c/d	85,050\\r\\n	98,000		98,000\\r\\n\\r\\nWorking Note: Calculation of Cost of Loss-in-transit, Goods-in-transit and Goods in hand\\r\\n	Particulars	Loss in transit (50 Units)	Goods in transit (100 Units)	Goods in hand (150 Units)\\r\\nA.	Cost of Units @  Rs.100	5,000	10,000	15,000\\r\\nB.	Add: Consignor’s proportionate expenses @  Rs.5	250	500	750\\r\\nC.	Add: Consignee\\\'s proportionate expenses @ Re. 1	—	—	150\\r\\nD.	Total Cost	5,250	10,500	15,900\\r\\n', '', 2, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `syear` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `syear`) VALUES
(1, '2021-22'),
(2, '2022-23'),
(4, '2023-24');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `focc` text NOT NULL,
  `mocc` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `course` text NOT NULL,
  `status` text NOT NULL,
  `subject` text NOT NULL,
  `school` text NOT NULL,
  `grace_period` int(11) NOT NULL,
  `xper` text NOT NULL,
  `reference` text NOT NULL,
  `dob` text NOT NULL,
  `medium` text NOT NULL,
  `jdate` date NOT NULL,
  `xiiper` text NOT NULL,
  `branch` int(11) NOT NULL,
  `batchid` int(11) NOT NULL,
  `syear` int(11) NOT NULL,
  `democlass` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fcontact` text NOT NULL,
  `mcontact` text NOT NULL,
  `course2` int(11) NOT NULL,
  `subject2` text NOT NULL,
  `batchid2` int(11) NOT NULL,
  `ex_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `uname`, `fname`, `mname`, `focc`, `mocc`, `address`, `email`, `contact`, `course`, `status`, `subject`, `school`, `grace_period`, `xper`, `reference`, `dob`, `medium`, `jdate`, `xiiper`, `branch`, `batchid`, `syear`, `democlass`, `uid`, `fcontact`, `mcontact`, `course2`, `subject2`, `batchid2`, `ex_student`) VALUES
(1, 'Sanjana Lakhara', 'Nandkishore  Lakhara', 'Santosh Lakhara', 'Businessman', 'Housewife', 'Kamla NEhru Nagar , Karni Colony', 'sanjanalakhara0000@gmail.com', '8955494592', '63', 'demo', '64,95,192,248,249,250,251', 'Lucky Bal Niketan school', 0, '62', '10', '2002-07-28', 'english', '2022-08-05', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(3, 'Maulik Arora', 'Ravi Shankar Arora', 'Monika Arora', 'Service', 'Housewife', 'B-12 , p&t Colony , Shastri Nagar', 'ravi.s.arora@gmail.com', '7023600222', '208', 'demo', '239,240,241,242', 'Happy Hours School', 0, 'NA', 'others', '2007-03-04', 'english', '2022-04-01', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(4, 'Madhav Raj Parihar', 'Mukesh Parihar ', 'Priya Parihar', 'Businessman', 'Housewife', 'Singhiyon Ki Gali , Soorsagar , Jodhpur', 'pariharmukesh01@gmail.com', '9413871676', '206', 'demo', '300,301', 'DPS ', 0, 'NA', 'others', '2009-01-15', 'english', '2022-07-12', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(5, 'Aayushi Arora', 'Nitin Arora', 'Anjana Arora', 'Shop', 'Houusewife', 'Moti Chalk goro ki gali , jodhpur', 'nitinarora11134@gmail.com', '7014408020', '206', 'demo', '298,299,300,301', 'Sohan Lal Manihar', 0, 'NA', 'others', '2009-09-09', 'english', '2022-07-01', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(6, 'Mohammad Mukkaram', 'Mobin Ahmed', 'Samina Bano', 'Private Job', 'Housewife', 'C-18 Mahaveer Nagar Near Kamla Nagar Hospital Pal Link Road ', 'moh.mukkaram@gmail.com', '7413871893', '207', 'demo', '258,259,262', 'Mahesh Public School', 0, 'NA', 'others', '2009-01-10', 'english', '2022-05-19', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(7, 'Riddhi Lodha', 'Hitesh Lodha', 'Nikita Lodha', 'Businessman', 'Housewife', '38 A , shyam nagar , pal road ext. , behind spicy kitchen , jodhpur', 'nikita20lodha@gmail.com', '8385988777', '208', 'demo', '239,240,241', 'Central Academy School', 0, 'NA', 'others', '2007-03-08', 'english', '2022-03-28', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(8, 'Soumya Parihar', 'Mukesh Parihar', 'Priya Parihar', 'Businessman', 'Homemaker', 'Singhiyo Ki Gali , Soorsagar , Jodhpur', 'mukeesh89@gmail.com', '941871676', '208', 'demo', '239,240', 'DPS Pal road', 0, 'NA ', '10', '2007-04-15', 'english', '2022-03-19', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(9, 'Vaibhav Bhati', 'Rakesh Bhati', 'Sita Bhati', 'Na', 'NA', 'Suraj bera Soorsagar , jodhpur', 'vaibhavbhati67@gmail.com', '9649963190', '208', 'demo', '239,240,241', 'Central Academy School', 0, 'NA', '', '2006-08-18', 'english', '2022-03-19', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(10, 'Lakshit parakh', 'Ajay Parakh', 'Santosh Parakh', 'Businessman', 'Housewife', '52 Arihant Nagar Jodhpur', 'lakshitparakh2@gmail.com', '8905666558', '208', 'demo', '239,240,241', 'Lucky Bal Niketan', 0, 'NA', 'others', '2004-10-27', 'english', '2022-03-19', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(11, 'Nakul jangid ', 'Vishnu Pratap Jangid', 'Seema Jangid', 'Businessman', 'Housewife', '25th , Ganesh Nagar Salawas Road Jodhpur', 'jangidnakul929@gmail.com', '9783644842', '208', 'demo', '239,240,241', 'DPS ', 0, 'NA', 'others', '2006-10-24', 'english', '2022-03-19', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 0, 0),
(12, 'Radhika Vyas', 'Pukhraj Bhootra', 'Raksha Raj', 'Businessman', 'Housewife', 'U.I.T. Colony D-93 Pratap Nagar Jodhpur', 'radhikabhootra@gmail.com', '9460880299', '208', 'demo', '239,240,241', 'Sri Aurobindo School', 0, 'NA', 'others', '2007-05-29', 'english', '2022-03-02', 'NA', 2, 22, 2, 1, 0, '', '', 0, '', 20, 0),
(13, 'Sagar Kandara', 'Mahendra Kandara', 'Sampat Kandara', 'Private Job', 'Housewife', '8/354 Chopasni Housing Board Kothari hospital street , Jodhpur', 'sagar11kandara@gmail.com', '8079047293', '210', 'demo', '287,288,289,290,291', 'Varun Public sen sec school', 0, '86.17', '10', '2003-01-11', 'english', '2022-04-07', 'NA', 2, 0, 2, 1, 0, '', '', 0, '', 0, 0),
(14, 'Parul Birla', 'Sanjay Birla ', 'Anita Birla', 'Businessman', 'Housewife', '804, Siddharth Avenue Kaylana Road , Jodhpur', 'parulbirla14@gmail.com', '7742564307', '210', 'demo', '288', 'Rajmata Krishna Kumari Girls Public School', 0, 'NA', 'others', '2005-03-25', 'english', '2022-05-15', 'NA', 2, 20, 2, 1, 0, '', '', 0, '', 0, 0),
(15, 'Aayush Suthar', 'Manish Suthar ', 'Laxmi Suthar', 'Businessman', 'Housewife', '51-5 , Behind Sancheti Hospital , Baldev Nagar , Jodhpur ', 'jangidaayush520@gmail.com', '7426028235', '210', 'demo', '287', 'St. Devaram Public Sr. Sec. School', 0, '77', 'others', '2005-09-29', 'english', '2022-05-15', 'NA', 2, 20, 2, 1, 0, '', '', 0, '', 0, 0),
(16, 'Sujot', 'Akhtar', 'Samim', 'property Dealer', 'Housewife', 'Inside Jalori Gate Kabutron ka Chowk', 'sujot@gmail.com', '8005632893', '210', 'demo', '287,288,289', 'R.K. Public School ', 0, '76', 'others', '2005-02-15', 'english', '2022-07-16', 'NA', 2, 0, 2, 1, 0, '', '', 0, '', 20, 0),
(17, 'Priyanka Tulswani', 'Ashak Tulswani', 'Madhuri Tulswani', 'Service', 'Housewife', 'A-15 Mahaveer Nagar Kamla Nehru Nagar Hospital Street Jodhpur', 'tulswanipriyanka4@gmail.com', '7300036327', '210', 'demo', '287,288,289,290,291', 'DPS ', 0, '84', 'others', '2006-02-18', 'english', '2022-07-04', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(44, 'Shafa Ansari', 'fntt', 'brbrtt', 'bgbgf', 'Housewife', 'Singhiyon Ki Gali , Soorsagar Jodhpur', 'yaminigehlot36@gmail.com', '8005922020', '209', 'demo', '294,295', 'Central Academy', 0, '82', '10', '2005-07-01', 'English', '2022-08-27', 'NA', 2, 0, 2, 1, 0, '', '', 0, '', 0, 0),
(45, 'Radhika Bohra', 'Manish Bohra', 'Anita Bohra', 'Businessman', 'Housewife', 'Jodhpur', 'bohraradhika905@gmail.com', '9352844006', '63', '1', '64,95,192,248,249,250,251', 'St. Annes\'s School', 1, '73', 'Previous student', '2004-07-19', 'english', '2022-08-22', '63', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(46, 'Annu Prajapat  ', 'Rajesh Prajapat', 'Suman Devi', 'NA', '', 'Mandore', '', '9413115748', '63', '1', '64,95,192,248,249,250,251', 'Mandore Public School', 0, '92.75', 'Hemant sir', '2004-04-24', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(47, 'Arman Khan', 'Manan Ahmed', 'Nazma Bano', 'CA', 'Housewife', 'Jodhpur', 'ca_manan_ahmed@yahoo.com', '9784007100', '63', '1', '64,95,192,248,249,250,251', 'St. Annes\'s School', 0, '68', 'NA', '2005-07-04', 'English', '2021-09-02', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(48, 'Palak Balar', 'Mahendra balar', 'Bharti Balar', 'Businessman', 'Housewife', 'Jodhpur', 'balarpalak@gmail.com', '9462867754', '218', '1', '308,309,310,311,312', 'Sardar doon Public School', 0, '86', '', '2003-11-19', '', '1970-01-01', '90.6', 2, 15, 2, 0, 0, '9865768', '87687', 267, '274,275,276,277', 6, 0),
(49, 'Dheeraj Gaur', 'Murari lal Gaur', 'Chandrakanta', 'Chemist', 'Housewife', 'Jodhpur', 'dheerajgaur231@gmail.com', '9875238212', '63', '1', '64,95,192,248,249,250,251', 'M.G.G.S. Jodhpur', 0, '50', 'Online', '2006-09-02', 'English', '2022-05-17', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(50, 'Dolly Varwani ', 'Rajkumar Varwani', 'Manju', 'NA', 'Housewife', 'Jodhpur', 'dolly.varwani@gmail.com', '7014525791', '63', '1', '64,95,192,248,249,250,251', 'K.V. No. 1 Jodhpur', 0, '84', 'Previous Student', '2004-12-29', 'English', '2022-03-29', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(51, 'Drishan Maheshwari ', 'Naresh Taparia', 'Akankoha', 'Lawyer', 'Housewife', 'Jodhpur', 'drishanmaheshwari@gmail.com', '9799981963', '63', '1', '64,95,192,248,249,250,251', 'St. Annes\'s School', 0, '80', 'Online', '2004-07-07', 'English', '2022-06-08', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(52, 'Kinjal Loonkar', 'Surendra Loonker', 'Kusum ', 'Job', 'Business', 'Jodhpur', 'kinguner08@gmail.com', '9462093423', '63', '1', '64,95,192,248,249,250,251', 'Central Academy Jodhpur', 0, '85', 'Adesh Sir.', '2004-11-02', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(53, 'Laxita Varma ', 'Naveen Verma', 'Neetu Verma', 'Engineer', 'Housewife', 'Jodhpur', 'lakshitaverma387@gmail.com', '9024400237', '63', '1', '64,95,192,248,249,250,251', 'Mahaveer Public School', 0, '78', 'Abhishek Verma', '2004-10-28', 'English', '2022-06-08', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(54, 'Mukesh Jakhar ', 'Ram jeevan', 'Sushila', 'B.S.F', 'Housewife', 'Jodhpur', 'mukesh64742jakhar@gmail.com', '8769400301', '63', '1', '64,95,192,248,249,250,251', 'Anant Lewis Public School', 0, '59', 'Narendra singh Shek', '2005-01-27', 'Emglish', '1970-01-01', '68', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(55, 'Neha Chellani ', 'Tulsi Chellani', 'Durga Chellani', 'Businessman', 'Teacher', 'Jodhpur', 'd2206678@gmail.com', '8005766181', '63', '1', '64,95,192,248,249,250,251', 'Central Academy Jodhpur', 0, '83', 'Priyanshi Karwa', '2005-05-25', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(56, 'Palak Tiwari ', 'Dharmendra Tiwari', 'Alka Tiwari', 'Private ', 'Housewife', 'Jodhpur', 'palaktiwari513@gmail.com', '8107153789', '63', '1', '64,95,192,248,249,250,251', 'K.V. No. 2 Jodhpur', 0, '82', ' Offline', '2005-05-12', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(57, 'Priyanshi Karwa ', 'Rajendra Karwa', 'Supriya Karwa', 'Businessman', 'Housewife', 'Jodhpur', 'NA', '7877730037', '63', '1', '64,95,192,248,249,250,251', 'Central Academy Jodhpur', 0, 'NA', 'NA', '2005-01-31', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(58, 'Rahul Verma ', 'Rupinder Verma', 'Rajan Verma', 'Gov. Service', 'Cosmetologist', 'Punjab', '30vrahul@gmail.com', '7717374607', '63', '1', '64,95,192,248,249,250,251', 'NA', 0, '86', 'Jatinder Verma', '2002-11-30', 'English', '2022-06-07', '78', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(59, 'Rishika Tailor', 'Rajesh Tailor', 'Suman Tailor', 'Businessman', 'Housewife', 'Jodhpur', 'vermarishika329@gmail.com', '8949970776', '63', '1', '64,95,192,248,249,250,251', 'Central Academy Jodhpur', 0, '61', 'NA', '2004-07-19', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(60, 'Sabha Sohail ', 'Moh. Sohail', 'Firoza Bano', 'Private', 'Housewife', 'Jodhpur', 'ayesharhemani645@gmail.com', '7023498200', '63', '1', '64,95,192,248,249,250,251', 'Adarsh Bal School', 0, '80', 'Akansha jain', '2004-05-26', 'English', '1970-01-01', '81', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(61, 'Usmaan', 'Moh. Sharu', 'Hajra Bano', 'Builder', 'Housewife', 'Jodhpur', 'uk8619890@gmail.com', '8619890720', '63', '1', '64,95,192,248,249,250,251', 'M.G.G.S. Jodhpur', 0, '50', 'Online', '2004-04-20', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(62, 'Utkarsha Loonkar ', 'Rakesh Loonker', 'Sonal Loonker', 'Businessman', 'Housewife', 'Jodhpur', 'utkarshajain73@gmail.com', '9079000872', '63', '1', '64,95,192,248,249,250,251', 'Central Acdemy School', 0, '75', 'Priyanshi karwa', '2004-02-27', 'English', '2022-06-08', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(63, 'Vankit Bhotra ', 'Jagdish Chandra', 'Pappu Devi', 'Service', 'Housewife', 'Jodhpur', 'vankitjain123@gmail.com', '9468622380', '63', '1', '64,95,192,248,249,250,251', 'Central Acdemy School', 0, '80', 'Priyanhsi Karwa', '2004-07-15', 'English', '2022-06-08', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(64, 'Kiran G ', 'Arjunram Gehlot', 'Dhapu Devi', 'Businessman', 'Housewife', 'Jodhpur', 'kirangehlot13112gmail.com', '9024144890', '63', '1', '64,95,192,248,249,250,251', 'School', 0, '95', 'NA', '2003-11-13', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(65, 'Megha Rochani', 'Rajesh Rochani', 'Shilpa Rochani', 'Accountant', 'Housewife', 'Jodhpur', 'megharochani@gmail.com', '7426810687', '63', '1', '64,95,192,248,249,250,251', 'Keadriya Vidyalaya No.1 School', 0, 'NA', 'NA', '2005-06-14', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(66, 'Moh. Sahdaab Gauri ', 'Abdul Saleem', 'Jareena', 'NA', 'NA', 'Jodhpur', 'shadaabgauri978@gmail.com', '7014088519', '63', '1', '64,95,192,248,249,250,251', 'Global International School', 0, '53', 'Armaan', '2003-02-01', 'English', '2022-06-08', '54', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(67, 'Yash Vardhan Bhandari ', 'Akshay Bhandari', 'Nidhi Bhandari', 'Businessman', 'Housewife', 'Jodhpur', 'NA', '9468712810', '63', '1', '64,95,192,248,249,250,251', 'DPS pal road', 0, '92', 'Manan Jain', '2004-08-25', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(68, 'Krishna Rathi ', 'Jugal Rathi', 'Savita rathi', 'Businessman', 'Housewife', 'Jodhpur', 'krishnarathi12345@gmail.com', '8302329531', '63', '1', '64,95,192,248,249,250,251', 'Central Acdemy School', 0, '62', 'Priyanshi karwa', '2004-01-15', 'English', '2022-06-09', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(69, 'Rohan Rathi ', 'Ashok Rathi', 'leela Rathi', 'Govt. Job', 'Govt. Job', 'Jodhpur', 'rohanrathi2004.rr@gmail.com', '9414858522', '63', '1', '64,95,192,248,249,250,251', 'St. Johns School', 0, '93', 'Ashok Rathi', '2004-06-28', 'English', '2022-06-08', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(70, 'Dhruvi Bothra', 'Umesh Bothra', 'Gauri Bothra', 'Businessman', 'Housewife', 'Jodhpur', 'dhruvibothra06@gmail.com', '7852873687', '63', '1', '64,95,192,248,249,250,251', 'DPS pal road', 0, '88', 'Online', '2005-02-06', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(71, 'Anil Chaudhary ', 'Varingram ', 'Kamla Chaudhary', 'Motor Mechanique', 'Housewife', 'Jodhpur', 'ansachaudhary1515@gmail.com', '9672901515', '63', '1', '64,95,192,248,249,250,251', 'St. Johns School', 0, '87', 'Rohan Rathi', '2004-09-15', 'English', '2022-06-13', 'Na', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(72, 'Takshit Parihar', 'Ajeet Parihar', 'jayshree Parihar', 'Private', 'Teacher', 'Jodhpur', 'takshit18parihar@gmail.com', '8890432005', '63', '1', '64,95,192,248,249,250,251', 'L.B.N. School', 0, '60', 'NA', '2004-09-18', 'English', '2022-06-14', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(73, 'Lakshita Gandhi ', 'Mahesh Gandhi', 'Kanchan Gandhi', 'Businessman', 'Housewife', 'Jodhpur', 'lakshitagandhi3135@gmail.com', '8302925658', '63', '1', '64,95,192,248,249,250,251', 'L.B.N. School', 0, '75', 'NA', '2003-12-05', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(74, 'Vidhi Agarwal ', 'Ramesh Kumar', 'Sangeeta ', 'Businessman', 'Housewife', 'Badmer', 'vidhiagarwal2323@gmail.com', '9462450160', '63', '1', '64,95,192,248,249,250,251', 'St. Paul\'s Badmer', 0, 'NA', 'Ravi Garg', '2004-12-23', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(75, 'Divya Jain ', 'Surajmal Jain', 'Vimla Jain', 'Businessman', 'Housewife', 'Jodhpur', 'NA', '7357848406', '63', '1', '64,95,192,248,249,250,251', 'L.B.N. School', 0, 'NA', 'NA', '2006-10-16', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(76, 'Harsh Bohra ', 'Sunil Bohra', 'Ritu Bohra', 'CA', 'Housewife', 'Jodhpur', 'bohraharsh15@gmail.com', '6375690283', '63', '1', '64,95,192,248,249,250,251', 'St. Paul\'s School', 0, '76', 'Kratish Mehta', '2003-11-15', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(77, 'Moh Ovesh B ', 'Akhtar ali', 'Saina Bano', 'Businessman', 'Housewife', 'Balotra', 'oveshkt@gmail.com', '9887402201', '63', '1', '64,95,192,248,249,250,251', 'Mother Teresa School', 0, '91', 'Poonamchand Bhargar', '2005-05-06', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(78, 'Nagraj B ', 'Omprakash ', 'Jeeva Devi', 'Businessman', 'Housewife', 'Balotra', 'prashantgehlot@gmail.com', '9079064107', '63', '1', '64,95,192,248,249,250,251', 'NA', 0, '70', 'Poonamchand Bhargar', '2003-06-09', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(79, 'Vinod Kumar Chaudhary B ', 'C. Babulal', 'C. Latha', 'Businessman', 'Housewife', 'Balotra', 'nareshchowdary2001@gmail.com', '7877254861', '63', '1', '64,95,192,248,249,250,251', 'Mother Teresa School', 0, '70', '', '2004-04-22', '', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(80, 'Tisha Jain ', 'Mahendra jain', 'Basanti Jain', 'Businessman', 'Housewife', 'Jodhpur', 'tishajain315@gmail.com', '6376484306', '63', '1', '64,95,192,248,249,250,251', 'L.B.N. School', 0, '8', 'NA', '2004-08-17', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(81, 'Piyunuka Sharma', 'Puran Sharma', 'Monika Sharma', 'Businessman', 'Housewife', 'Jodhpur', 'NA', '8769994448', '63', '1', '64,95,192,248,249,250,251', 'L.B.N. School', 0, '75', 'Online', '2004-09-17', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(82, 'Tanishka Sharma', 'Shailendra Sharma', 'Sunita Sharma', 'Engineer', 'Principal', 'Jodhpur', 'tanishkas491@gmail.com', '7976658927', '63', '1', '64,95,192,248,249,250,251', 'Our Lady Of Pillar Convent School', 0, 'NA', 'NA', '2004-01-16', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(83, 'Garima Bohra', 'K.K. Bohra', 'Premlata Bohra', 'CA', 'Housewife', 'Jodhpur', 'kkbohra@gmail.com', '8955388823', '63', '1', '64,95,192,248,249,250,251', 'Our Lady Of Pillar Convent School', 0, 'NA', 'NA', '2004-05-11', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(84, 'Vanshika Garg ', 'Sunil Garg', 'Sangeeta Garg', 'Businessman', 'Housewife', 'Jodhpur', 'vanshikagarg1764@gmail.com', '9414475441', '63', '1', '64,95,192,248,249,250,251', 'NA', 0, '91', 'NA', '2004-06-17', 'English', '2022-05-30', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(85, 'Awaish Sheikh', 'Moh. Naqui Sheikh', 'Khushnood Sheikh', 'Businessman', 'Housewife', 'Jodhpur', 'nabeedsheikh14@gmail.com', '7727972086', '63', '1', '64,95,192,248,249,250,251', 'St. Paul\'s Sr. Sec. School', 0, '83', 'NA', '2004-04-19', 'English', '2022-09-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(86, 'Yash Jain ', 'Sunil Jain', 'sangeeta Jain', 'NA', 'NA', 'Jodhpur', 'yashjainism13@gmail.com', '9413871757', '63', '1', '64,95,192,248,249,250,251', 'Srdar Doon Public School', 0, '75', '85', '2004-03-13', 'English', '1970-01-01', '85', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(87, 'Aditya Bhatnagar', 'Mayank Bhatnagar', 'Geeta Bhatnagar', 'Teacher', 'Teacher', 'Jodhpur', 'adityabhatnagar0311@gmail.com', '9120137001', '1591', '1', '308,309,310,311,312', 'G.D. Higher sec. School ', 0, '94', '16', '2004-03-22', '', '1970-01-01', 'NA', 2, 23, 2, 0, 0, '9810060308', '9810060308', 1592, '274,275,276,317,1593', 6, 0),
(88, 'Divyanshu upadhyay ', 'Ashok Kumar', 'Krishna Upadhyay', 'Accontant', 'Housewife', 'Jodhpur', 'ashokkumar3528@gmail.com', '9460767525', '63', '1', '64,95,192,248,249,250,251', 'NA', 0, '75', 'NA', '2004-09-01', 'English', '1970-01-01', '74', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(89, 'Sagar Soni ', 'Prem Prakash Soni', 'Basanti Soni', 'NA', 'NA', 'Jodhpur', 'urmy2020@gmail.com', '9001488424', '63', '1', '64,95,192,248,249,250,251', 'Sumer School', 0, '77', 'CA Abhishek Varma', '2005-02-13', 'English', '2022-05-21', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(90, 'Swai Singh ', 'Sadul Singh', 'Chandan Kanwar', 'Farmer', 'Housewife', 'Barmer', 'khumansinghgo@gmail.com', '9822149623', '63', '1', '64,95,192,248,249,250,251', 'J.N.V.U. Badmer', 0, '76', 'Arjun ', '2005-07-08', 'English', '2022-05-23', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(91, 'Divyansh B ', 'Kailash', 'Kalpana', 'Businessman', 'Housewife', 'Balotra', 'divyanshgupta1220@gmail.com', '7597700441', '63', '1', '64,95,192,248,249,250,251', 'NA', 0, '78', 'NA', '2022-04-20', 'English', '2022-06-08', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(92, 'Rakesh Patel ', 'Chenaram patel', 'Suadevi Patel', 'LIC Agent', 'Housewife', 'Jodhpur', 'dinesh27521@gmail.com', '8107625808', '63', '1', '64,95,192,248,249,250,251', 'Central Academy CHB school', 0, '70', 'Hitesh Motwani Sir', '2005-01-21', 'English', '2022-04-07', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(93, 'Aayush Jangir ', 'Mukesh Jangid', 'Suman Jangid', 'Carpainter', 'Housewife', 'Jodhpur', 'aayushjangid24@gmail.com', '9024675919', '1591', '1', '308,309,310,311,312', 'Tagore Sr. Sec. School', 0, '75', '', '2004-10-24', '', '1970-01-01', '83', 2, 23, 2, 0, 0, '9810060308', '9810060308', 1592, '274,275,276,317,1593', 24, 0),
(94, 'Aashish Lohaar  ', 'Ramesh Lohar', 'Pinky Lohar', 'Self-Employee', 'Housewife', 'Jodhpur', 'ashish9373246316@gmail.com', '9373246316', '63', '1', '64,95,192,248,249,250,251', 'Delhi Convent School', 0, '75', 'Kailash Ojha', '2003-09-17', 'English', '1970-01-01', '80', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(95, 'Ronit Jangir ', 'Dinesh Jangid', 'Rekha Jangid', 'Businessman', 'Housewife', 'Jodhpur', 'atharvaarts18@gmail.com', '9460215698', '63', '1', '64,95,192,248,249,250,251', 'Mahesh Public School', 0, '59', 'Online', '2004-10-14', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(96, 'Mahesh Jain ', 'Rajendra Jain', 'Rekha Jain', 'Real estate', 'Housewife', 'Jodhpur', 'maheshlourishab@gmail.com', '6381660128', '63', '1', '64,95,192,248,249,250,251', 'St. Johns', 0, '92', '10', '2004-08-16', '', '2022-09-02', '73', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(97, 'Nikita Soni ', 'Rakesh Soni', 'Harsha Soni', 'Service', 'Housewife', 'Jodhpur', 'nikita.soni050504@gmail.com', '8000811284', '63', '1', '64,95,192,248,249,250,251', 'Happy Hours School', 0, '88', 'CA Abhishek Varma', '2004-05-05', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(98, 'Priya Goswami ', 'Krishan Singh', 'Heena Swami', 'NA', 'NA', 'Barmer', 'krishansingh5481@gmail.com', '9983052000', '63', '1', '64,95,192,248,249,250,251', 'Tiny Tots Public School ', 0, '62.5', 'Online', '2004-09-16', 'English', '2022-06-25', '77', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(99, 'Khushi Joshi ', 'Om Prakash Joshi', 'Urmila Joshi', 'NA', 'NA', 'Jodhpur', 'khushijoshi183@gmail.com', '8619187766', '63', '1', '64,95,192,248,249,250,251', 'Lucky Institute of Professional Studies', 0, '68', 'Aisha Khan', '2003-06-13', 'English', '1970-01-01', '87', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(100, 'Kaushal Jangid ', 'Ravindra Jangid', 'Damyanti Jangid', 'Photographer', 'Housewife', 'Jodhpur', 'kaushaljangid07@gmail.com', '9950682226', '63', '1', '64,95,192,248,249,250,251', 'Central Academy School', 0, '91', 'Online', '2004-08-24', 'English', '2022-06-26', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(101, 'Hemant Bhati ', 'Babulal Bhati', 'Pyari Devi', 'Accountant', 'Housewife', 'Pali', 'bhatihemant42@gmail.com', '6378952905', '63', '1', '64,95,192,248,249,250,251', 'MLSV Udaipur', 0, '60', 'Online', '2002-10-01', 'English', '1970-01-01', '60', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(102, 'Priyanka Chaudhary ', 'Hanuman Chaudhary', 'Kehri Devi', 'NA', 'NA', 'Jalore', 'NA', '6355715114', '63', '1', '64,95,192,248,249,250,251', 'St. Franci\'s High Schol', 0, '72', 'Mittal Classes', '2004-03-24', 'English', '1970-01-01', '69', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(103, 'Vishaal Khatri ', 'Ganesh Mal Khatri ', 'kamla Khatri', 'Private job', 'Housewife', 'Jodhpur', 'vishal28khatri2004gmail.com', '9079345108', '63', '1', '64,95,192,248,249,250,251', 'Sanskar International School', 0, '75', 'Online', '2004-02-28', 'English', '2022-06-26', 'Na', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(104, 'Yogesh Sharma ', 'Nandkishore Sharma', 'Sunita Sharma', 'Manager', 'Housewife', 'Jodhpur', 'yogesgsankhi29@gmail.co', '9958047799', '63', '1', '64,95,192,248,249,250,251', 'Sanskar International School', 0, '89', 'Online', '2005-01-29', 'English', '2022-06-26', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(105, 'Vaishaali Soni ', 'Dinesh Soni', 'Kiran Soni', 'Goldsmith', 'Housewife', 'Jaitaran', 'NA', '9413916018', '63', '1', '64,95,192,248,249,250,251', 'Govt. Girls Sen. Sec. School', 0, '80', 'Online', '2004-12-25', 'English', '2022-04-30', '91', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(106, 'Himmat Kumar ', 'Ram Lal Chaudhary ', 'Jethi devi', 'Farmer', 'Housewife', 'Barmer', 'himmatrchoudhary@gmail.com', '8949540343', '63', '1', '64,95,192,248,249,250,251', 'S.S. Jain Subodh P.G. College Jaipur', 0, '87', 'Online', '2005-03-21', 'English', '2022-06-28', '95', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(107, 'Rahul Soni ', 'Radhakrishna Soni', 'Sunita Soni', 'Businesman', 'Housewife', 'Jodhpur', 'NA', '7790989441', '63', '1', '64,95,192,248,249,250,251', 'Varun Public Sr. Sec. School', 0, '76', 'NA', '2005-07-25', 'English', '1970-01-01', '81', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(108, 'Dinesh Janyaani ', 'Rajesh Janyani', 'Hemlata Janyani', 'NA', 'NA', 'Jodhpur', 'janyanidev@gmail.com', '9460670077', '63', '1', '64,95,192,248,249,250,251', 'Bal Mandir Public School', 0, 'NA', 'NA', '2004-06-10', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(109, 'Sumit Gahlot ', 'Jotha singh gehlot', 'Veena Gehlot', 'Businesman', 'Housewife', 'Jodhpur', 'gehlotsumit33@gmail.com', '7737171035', '63', '1', '64,95,192,248,249,250,251', 'NA', 0, '44', 'Dinesh Dhadhich', '2003-10-06', 'English', '2022-06-07', '55', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(110, 'Nandani Dujari ', 'Sunil Dujari', 'Sujata Dujari', 'Businesman', 'Housewife', 'Jodhpur', 'dujarinandini@gmail.com', '9772872911', '63', '1', '64,95,192,248,249,250,251', 'Delhi Public School', 0, '82', 'NA', '2004-05-11', 'English', '2022-06-30', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(111, 'Sujal Gahlot ', 'Sawai Singh', 'Monika Gehlot', 'Businesman', 'Housewife', 'Jodhpur', 'www.gehlotsujal388@gmail.com', '7597454674', '63', '1', '64,95,192,248,249,250,251', 'Central Academy School', 0, '87', 'Online', '2004-06-01', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(112, 'Mayank Jain ', 'Mahendra Jain', 'Mamta Jain', 'Businesman', 'Housewife', 'Jodhpur', 'NA', '7665670583', '63', '1', '64,95,192,248,249,250,251', 'Central Academy School', 0, '86', 'Sujal Gehlot', '2004-04-02', 'English', '2022-07-11', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 23, 0),
(113, 'Roshan ', 'Kailash Cahndra', 'Mamta', 'Businesman', 'Housewife', 'Jaiselmer', 'ravikela234@gmail.com', '6377325690', '63', '1', '64,95,192,248,249,250,251', 'J.N.V.U.', 0, '91', 'Arihant Jain', '2004-03-05', 'English', '1970-01-01', '90', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(114, 'Kishan ', 'Murlidhar Rathi', 'Manju RAthi', 'Businesman', 'Housewife', 'Jaiselmer', 'kishanrathi2005@gmail.com', '6367891688', '63', '1', '64,95,192,248,249,250,251', 'J.N.V.U.', 0, '86', 'Arihant Jain', '2004-05-23', 'English', '2022-07-04', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(115, 'Raghuvendra ', 'Ram Gopal ', 'Manju Devi', 'Shopkeeper', 'Housewife', 'Jaiselmer', 'raghurathi2005@gmail.com', '9001441319', '63', '1', '64,95,192,248,249,250,251', 'S.V.M. Pokaran', 0, '81', 'NA', '2005-10-05', 'English', '1970-01-01', '91', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(116, 'Namra bhandari', 'Anand Bhandari', 'Shilpa Bhandari', 'Businessman', 'housewife', '5b-32 CHB 3 puliya Jodhpur', 'sbbhandarishilpa@gmail.com', '9610700932', '209', '1', '292,293,294,295,307', 'Sardar doon public school', 0, '65', 'Online', '2006-12-18', 'English', '2022-09-27', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(117, 'Jai Prakash', 'Ashok Kumar', 'Indira Devi', 'Teacher', 'housewife', '337 Kamla nehru nagar, balaji school', 'jpbhatia73@gmail.com', '7357995149', '209', '1', '292,293,294,295,307', 'Mahesh public school', 0, '76', 'Lovejeet', '2007-01-20', 'English', '2022-09-25', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(118, 'Devashish Sankhla', 'Prakash Sankhla', 'Mohini Sankhla', 'Job', 'housewife', 'Pratap nagar F-13 UIT Colony Jodhpur', 'mrprakash7@gmail.com', '8949553315', '209', '1', '292,293,294,295,307', 'Lucky bal niketan', 0, '73', 'Harsh pareek', '2006-01-07', 'English', '2021-12-17', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(119, 'Nitansh Sharma', 'Dinesh Sharma', 'Priyanka Sharma', 'Private job', 'housewife', 'C1/1, Janki Nagar, near vardhaman heights appartment, pal road, jodhpur', 'dineshsharmanp2gmail.com', '9414915720', '209', '1', '292,293,294,295,307', 'Sardar doon public school', 0, '70', 'Pranjal Limba', '2006-08-04', 'English', '2021-12-03', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(120, 'Lovejeet Panwar', 'Chandra Prakash', 'Sulekha Panwar', 'Businessman', 'housewife', '337 Kamla nehru nagar, near blind school, jodhpur', 'panwarlovejeet182006@gmail.com', '9460668280', '209', '1', '292,293,294,295,307', 'Laxmi Devi Mundra', 0, '55', 'Garauv', '2006-07-18', 'English', '2022-08-11', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(121, 'Pearl Manani', 'Rajesh Manani', 'Rajni Manani', 'General Manager', 'housewife', 'CHB 11 sector/965', 'p66546@gmail.com', '8107999088', '209', '1', '292,293,294,295,307', 'Rajmata school', 0, '81.6', 'Rohit Sir', '2006-06-05', 'English', '2022-08-29', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(122, 'Nikhil Prajapat', 'Rajesh Prajapat', 'Radhika Prajapat', 'businessman', 'housewife', 'Akhliya circle pratap nagar house no.-k-19', 'nikhilprajapat28092006@gmail.com', '9664016201', '209', '1', '292,293,294,295,307', 'Sanskar International School', 0, '49', 'Previous Student ', '2006-09-28', 'English', '2022-08-24', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(123, 'Vikram Jawa', 'Amit Jawa ', 'Seema Jawa', 'NA', 'NA', '23 sector pal road near, ashok udhyaan plot no.23/699', 'amitjawa@gmail.com', '8209006436', '209', '1', '292,293,294,295,307', 'Mahesh public school', 0, '57', 'Vimlesh Sir', '2006-01-01', 'English', '2022-08-26', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(124, 'Tanya Tanwar', 'Sanjay nath Tanwar', 'Saroj Deora', 'Private job', 'Govt. Job', 'Flat no.6th, 2nd floor, MDM Hospital Shastri Nagar', 'sanjay.nathtanwar@gmail.com', '6367425453', '209', '1', '292,293,294,295,307', 'Central Academy School', 0, '65', 'Kamlesh Parihar', '2006-11-25', 'English', '2022-08-29', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(125, 'Himanshu Vaishnav', 'Ramesh Vaishnav', 'Mamta vaishnav', 'Private job', 'housewife', '8/216, 5th puliya Chopasni Housing Board, Jodhpur ', 'radvaishnav@gnail.com', '9680462330', '209', '1', '292,293,294,295,307', 'Sant shri devaram seniour secondary school', 0, '47', 'NA', '2006-04-08', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(126, 'Arun ', 'Anil Kumar', 'Naveena Chouhan', 'Govt. Job', 'Teacher', '11 krishnanagar near p.f. Office, jodhpur', 'arun03092006@gmail.com', '9828046995', '209', '1', '292,293,294,295,307', 'Sri Aurbindo School', 0, '78', 'Online', '2006-09-03', 'English', '2022-08-19', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(127, 'Hasti Dolwani', 'Pramod Dolwani', 'Varsha Dolwani', 'Businessman', 'housewife', '12/268 CHB', 'dolwanigreat27@icloud.com', '9828826445', '209', '1', '292,293,294,295,307', 'DPS ', 0, 'NA', 'NA', '2006-06-27', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(128, 'Aditi joshi', 'J.P. Joshi', 'Hemlata Joshi', 'Govt. job', 'housewife', '3e/36, B/h shopping centre, pratap nagar', 'jphpjoshi@gmail.com', '9829022353', '209', '1', '292,293,294,295,307', 'Our lady of pillar convent school', 0, 'NA', 'Previous Student ', '2005-08-31', 'English', '2022-07-18', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(129, 'Suresh Panwar', 'Jai narayan Panwar', 'Devi Panwar', 'Businessman', 'housewife', 'Street no.11, Baldev Nagar, Masuriya, Jodhpur', 'sureshpanwar2306@gmail.com', '7297846495', '209', '1', '292,293,294,295,307', 'NA', 0, '76', 'Previous Student ', '2005-06-23', 'English', '2022-07-12', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(130, 'Divyansh Khatri', 'Vikram Khatri', 'Pooja Khatri', 'Businessman', 'housewife', 'Khatri grahasthi dep. Store, romolla road, Jodhpur', 'khatridivyansh060@gmail.com', '9413555650', '209', '1', '292,293,294,295,307', 'DPS ', 0, '94', 'J.J. Sir', '2006-10-06', 'English', '2022-08-06', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(131, 'Nabid khan', 'Ayub Khan', 'Babby bano', 'NA', 'housewife', 'plot no.73, Sindhiyon ka baas, masuriya. Jodhpur', 'NA', '9057999797', '209', '1', '292,293,294,295,307', 'Al huda international', 0, '71', 'NA', '2005-04-22', 'English', '2022-07-13', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(132, 'Mahi Mathur', 'Manish Mathur', 'Deepa Mathur', 'Private job', 'housewife', 'House no.276, Kamla nehru nagar, Jodhpur', 'NA', '9414128257', '209', '1', '292,293,294,295,307', 'St. Patrick\'s School', 0, '64', 'Previous Student ', '2006-09-28', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(133, 'Pragati Adwani', 'Ramesh Adwani', 'Veena Adwani', 'Salesman', 'housewife', '5B31, Chpasani housing board, jodhpur ', '1/.B.754957@gmail.com', '9057224071', '209', '1', '292,293,294,295,307', 'Alok Sr. Sec. School', 0, '68', 'Online', '2006-10-19', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(134, 'Anas Ansari', 'Aasif ansari', 'Monika ansari', 'Businessman', 'housewife', 'Pratap Nagar, Behind power house, Jodhpur', 'khananas0626@gmail.com', '9587567860', '209', '1', '292,293,294,295,307', 'Lucky bal niketan', 0, '90', 'Online', '2006-10-04', 'English', '2022-07-04', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(135, 'Sumit Tak', 'Mahendra Tak', 'Mamta Tak', 'Businessman', 'housewife', '262, Vardhman nagar, near sobhawato ki dhani, pal road,Jodhpur', 'sumitchemtak@gmail.com', '9414025950', '209', '1', '292,293,294,295,307', 'DPS ', 0, 'NA', 'NA', '2006-01-09', 'English', '2021-08-09', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(136, 'Harshit Pareek', 'Bharat Pareek', 'Aruna Pareek', 'Private job', 'housewife', 'Behind sisodia garden, pal link road, Jodhpur', 'NA', '9828037557', '209', '1', '292,293,294,295,307', 'Lucky bal niketan', 0, '70', 'Online', '2005-09-02', 'English', '2022-08-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(137, 'Harsh Pareek', 'Bharat Pareek', 'Aruna Pareek', 'Private job', 'housewife', 'Behind sisodia garden, pal link road, Jodhpur', 'NA', '9828031556', '209', '1', '292,293,294,295,307', 'Lucky bal niketan', 0, '65', 'Online', '2005-09-02', 'English', '2022-08-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(138, 'Priyal Gulecha', 'Piyush Gulecha', 'Richa Gulecha', 'Manager', 'housewife', '12/48 CHB near rudra photography', 'NA', '9328312446', '209', '1', '292,293,294,295,307', 'St. Patrick\'s School', 0, '78', 'Ritesh Lodha', '2006-09-11', 'English', '2022-08-02', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(139, 'Ashwini Datwani', 'Suresh Datwani', 'Kashika Datwani', 'Businessman', 'housewife', 'House no. 59b, jwala vihar. CHB Behind jivan jyoti nursing home, Jodhpur', 'anshudatwani7@gmail.com', '8000268783', '209', '1', '292,293,294,295,307', 'DPS ', 0, 'NA', 'Hiten Jain', '2006-09-10', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(140, 'Hiten Binodani', 'Rajesh Binodani', 'Sapna Binodani', 'Businessman', 'housewife', '62-B, Jwala Vihar, Jodhpur ', 'hitenbinodani24@gmail.com', '6376796668', '209', '1', '292,293,294,295,307', 'St. Paul\'s School, Jodhpur', 0, 'NA', 'Prince Binodani', '2005-10-24', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(141, 'Hiten Jain', 'Vikas Jain', 'Neelu Jain', 'NA', 'NA', '109 vardhman nagar pal road, Jodhpur', 'hitenjain651@gmail.com', '7014430037', '209', '1', '292,293,294,295,307', 'DPS ', 0, 'NA', 'NA', '2005-08-05', 'English', '2022-07-19', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(142, 'Bhumika Kanwar', 'Bhagwan Singh', 'Suman Kanwar', 'BSF', 'housewife', 'Plot no.58A, Shivji nagar balsamand, Mandore road , jodhpur', 'sbhumikakanwar786@gmail.com', '7597449603', '209', '1', '292,293,294,295,307', 'K.V. BSF Jodhpur', 0, 'NA', '', '2006-08-07', '', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '7597904117', '8356045367', 0, '', 0, 0),
(143, 'Himanshi Agarwal', 'Surendra Agarwal', 'Rajal Agarwal', 'Businessman', 'housewife', 'H.No. 185, Vasundhara nagar, near pal balajitemple, pal road, jodhpur', 'NA', '9214401074', '209', '1', '292,293,294,295,307', 'B.D.R.K.A. School', 0, '67', 'Previous Student ', '2007-01-05', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(144, 'Sanyam Jain', 'Rajendra Kumar Jain', 'Sapna Jain', 'Businessman', 'housewife', 'H.no.40 a/1 gokul vihar arihant nagar goro ka talab road, jodhpur', 'rrjain5641@gmail.com', '9414915031', '209', '1', '292,293,294,295,307', 'Sardar doon public school', 0, '48', 'Pratham Nahata', '2006-09-07', 'English', '2022-06-17', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(145, 'Jennifer Ali Khan', 'Sultan Khan', 'firoza Bano', 'NA', 'NA', 'Near new bus stand sunshine hotel sayala Jalore', 'NA', '7300425545', '209', '1', '292,293,294,295,307', 'Golden future secondary school', 0, 'NA', 'Online', '2007-03-06', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(146, 'Devesh Choudhary', 'Rakesh Choudhary', 'Deepshika Choudhary', 'Fitness Comp.', 'Housewife', 'B-14 UIT cote masuriya , Jodhpur', 'deveshchoudhary6166@gmail.com', '7976187493', '210', '1', '287,288,289,290,291,306', 'Sanskar International School', 0, '72', 'Akhilesh', '2005-11-12', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(147, 'Anishka Dugat', 'Umesh Dugat', 'Asha Dugat', 'Accountant', 'Housewife', 'Plot 244 Marudhar kesari nagar pal road, Jodhpur', 'NA', '6377143896', '210', '1', '287,288,289,290,291,306', 'Saint Anne\'s School', 0, '8', 'Deeksha', '2005-08-05', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(148, 'Prince Jain', 'Bhanwarlal Jain', 'Rashmi Jain', 'NA', 'NA', 'A/2 Gokul vihar guron ka talab road, Jodhpur', 'princejain6387@gmail.com', '6378581630', '210', '1', '287,288,289,290,291,306', 'Laxmi Devi Mundra Public School', 0, 'NA', 'NA', '2005-08-09', 'English', '2022-06-25', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(149, 'Dushyant Prajapat', 'Kamal Kishore Prajapat', 'Santosh Prajapat', 'Govt. Job', 'Housewife', 'Manna ki badi, Bypass Road, Soorsagar, Jodhpur', 'dushyantprajapat2005@gmail.com', '6375414705', '210', '1', '287,288,289,290,291,306', 'NA', 0, 'NA', 'NA', '2005-12-09', 'English', '2022-06-16', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(150, 'Yash Purohit', 'Shailendra Purohit', 'Neelam Purohit', 'Professor', 'Professor', 'CHB 17/e, 133', 'stannes.12098@gmail.com', '9828138540', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, 'NA', 'Shriyansh Pungalia', '2004-07-28', 'English', '2022-05-31', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(151, 'Jiya Kalwani', 'Deepak Kalwani', 'Usha Kalwani', 'Businessman', 'Meditation Trainer', '318, 4-A Road, Kalwani Bhawan, Sardarpura, Jodhpur', '17jiyakalwani@gmail.com', '8955881276', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, '93', 'Shriyansh Parihar', '2004-11-17', 'English', '2022-05-31', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(152, 'Devraj Singh Bhati', 'Harisingh Bhati', 'Durga Bhati', 'Govt. Job', 'Housewife', 'Naya pura , Choka', 'draj34596@gmail.com', '8740050099', '210', '1', '287,288,289,290,291,306', 'Sanskar International School', 0, 'NA', 'Akhilesh', '2005-06-26', 'English', '2022-05-09', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(153, 'Himanshu Kuamar', 'Rajkumar', 'Rekha', 'Govt. Job', 'Housewife', 'ITHT Campus Chokha Road', 'NA', '9910068310', '210', '1', '287,288,289,290,291,306', 'Sanskar International School', 0, '70', 'NA', '2005-04-02', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(154, 'Mahima Dadhich', 'Lalit Kumar Dhadhich', 'Shashi Kala Dhadhich', 'Service', 'Housewife', 'Maliyon ka rajbagh, Kaluram ji ki bawri, Behind II petrol pump, Soorsagar, Jodhpur', 'mahima80111@gmail.com', '9680128420', '210', '1', '287,288,289,290,291,306', 'Central Academy', 0, '84', 'Previous Student', '2005-04-19', 'English', '2022-04-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(155, 'Aayushi Vyas', 'Sandeep Vyas', 'Seema Vyas', 'Engineer', 'Teacher', 'CHH-9 Bhagat ki kothi, Jodhpur', 'aayushivyas1205@gmail.com', '8107669788', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, '89', 'Previous Student', '2005-11-12', 'English', '2022-04-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(156, 'Mahak Jain', 'Alok Jain', 'Amita Jain', 'Private job', 'Housewife', '11/631, Chopasani Housing Board, Jodhpur', 'alokjain52782@gmail.com', '9529428206', '210', '1', '287,288,289,290,291,306', 'Central Academy', 0, '89', 'Previous Student', '2004-11-07', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(157, 'Jiya Gurnani', 'Gulshan Gurnani', 'Komal Gurnani', 'Businessman', 'Housewife', 'Radhe Shyam Niwas\' 10th \'B\' road Sardarpura, Jodhpur', 'jiyagurnani.14@gmail.com', '9828337702', '210', '1', '287,288,289,290,291,306', 'Central Academy', 0, '93', 'Previous Student', '2006-01-01', 'English', '2022-04-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(158, 'Bhumi chouhan', 'Saroj Chouhan', 'Preeti Chouhan', 'C.P.O.', 'Housewife', '23,Arihant Nagar, Gorum ka talab road, near dau ki dhani, Jodhpur', 'NA', '9414201046', '210', '1', '287,288,289,290,291,306', 'Lucky Bal Niketan Sr. Sec. School', 0, 'NA', 'Riddhi Jain', '2005-12-04', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(159, 'Hanish Singhvi', 'Prashant Singhvi', 'Smita Singhvi', 'Businessman', 'Housewife', 'Bhandariyo ki pol jatabaas, Jodhpur', 'hshssinghvi@gmail.com', '9414243826', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, 'NA', 'NA', '2005-01-24', 'English', '2022-04-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(160, 'Antriksh Parashar', 'Ajay Parashar', 'Anju Parashar', 'Govt. Job', 'Housewife', '5/D/57 Kudi Bhagtasni housing board, Jodhpur', 'akparashar@gmail.com', '9460624994', '210', '1', '287,288,289,290,291,306', 'St. Paul\'s School', 0, '89', 'NA', '2005-06-10', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(161, 'Disha Daga', 'Vishnu Prakash Daga', 'Kiran Daga', 'Businessman', 'Housewife', 'New rakashni soorsagar, Jodhpur', 'shivanidaga20312gmail.com', '9001923159', '210', '1', '287,288,289,290,291,306', 'Lucky Bal Niketan Sr. Sec. School', 0, '82', 'NA', '2005-01-15', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(162, 'Shriyansh Parihar', 'Kamlesh Parihar', 'Dimple Parihar', 'Teacher', 'Housewife', '50, Mahaveerpuram, behind fun world, chopasani road, Jodhpur', 'shriyanshparihar27@gmail.com', '9982030805', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, 'NA', 'Online', '2005-01-14', 'English', '2022-04-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(163, 'Jasoda Daiya', 'Vishnu daiya', 'Kanchan daiya', 'NA', 'NA', '156, gali no.8, milk man colony, Pal road, Jodhpur', 'jasodadaiya26@gmail.com', '7014438763', '210', '1', '287,288,289,290,291,306', 'Central Academy', 0, '89', 'Vimlesh Sir', '2005-07-26', 'English', '2022-04-04', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(164, 'Maulik Singariya', 'Rakesh Singariya', 'Namrata Singariya', 'Govt. Job', 'Teacher', 'D-7 Shankar Nagar', 'mauliksingariya759@gmail.com', '9413706750', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, '60', 'Previous Student', '2005-03-23', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(165, 'Eeshaan puri', 'Arun dev Puri', 'Garima Goswami', 'NA', 'Teacher', '4A6 Prtaap pratap nagar behind shopping centre, Housing Board, Jodhpur', 'eeshaanpuri@gmail.com', '9460924548', '210', '1', '287,288,289,290,291,306', 'Mayoor Chpasani School', 0, '87', 'Gaurav Sir', '2006-04-10', 'English', '2022-04-02', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(166, 'Mitali Dhoot', 'Dinesh Dhoot', 'Santosh Dhoot', 'Businessman', 'Housewife', 'Lodah street, 1st A road, Sardarpura, Jodhpur', 'mitalidhoot132gmail.com', '8003587777', '210', '1', '287,288,289,290,291,306', 'Rajmata Krishna Kumari Girls Public School', 0, 'NA', 'Previous Student', '2005-06-13', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(167, 'Akhilesh Singh Rathore', 'Jabar Singh Rathore', 'Anita Kanwar', 'NA', 'NA', 'Pavan Vihar, house-13 opp. B.R. Birla', 'akhileshsinghrathore7890@gmail.com', '8209417083', '210', '1', '287,288,289,290,291,306', 'NA', 0, '52', 'NA', '2005-05-08', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(168, 'Shreyansh Punglia ', 'Sunil Punglia', 'Leena Punglia', 'Businessman', 'Housewife', '1/1B near mudit mansion complex pal link road, Jodhpur ', 'shreyanshpunglia0@gmail.com', '7014740426', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, 'NA', 'Online', '2005-04-20', 'English', '2022-04-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(169, 'Bhavesh Bhootra', 'Pukhraj Bhootra', 'Raksha Bhootra', 'Businessman', 'Housewife', 'Pratap Nagar UIT Colony D-93 opp. LDM School, Jodhpur', 'bhaveshbhootra23@gmail.com', '6350441560', '210', '1', '287,288,289,290,291,306', 'Sri Aurbindo Centre Of New Education', 0, '71', 'Shivani Jain', '2005-06-23', 'English', '2022-04-04', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(170, 'Dhruv Jain', 'Chetan Kumar Jain', 'Kanita Jain', 'Businessman', 'Housewife', '269, Vardhnam Nagar, Shoubhauto Ki dhani, Pal road, Jodhpur', 'dhruv02032006@gmail.com', '9214780655', '210', '1', '287,288,289,290,291,306', 'Sardar Doon Publich School', 0, '64', 'Jinesh Jain', '2006-03-02', 'English', '2022-04-23', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(171, 'Jatin boob', 'Madhusudan Boob', 'Pramila Boob', 'Broker', 'Housewife', 'Radha Madhav, 249/1 Sector B, Rajbagh, Soorsagar, Jodhpur', 'jatinboob0@gmail.com', '8104665431', '210', '1', '287,288,289,290,291,306', 'Mahesh Public School', 0, '58', 'NA', '2005-02-07', 'English', '2022-04-06', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(172, 'Gauransh Shar,a', 'Gaurav Sharma', 'Ranu Sharma', 'Businessman', 'Housewife', '18-E/549, Chpasani Housing Board, Jodhpur', 'igauransh20052@gmail.com', '9079326979', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, '70', 'NA', '2005-06-04', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(173, 'Bhavesh Boob', 'Radheshyam Boob', 'Sangeeta Boob', 'Businessman', 'Housewife', 'Suraj bera, Soorsagsar, Jodhpur', 'bhaveshboob3@gmail.com', '9928603800', '210', '1', '287,288,289,290,291,306', 'Laxmi Devi Mundra Public School', 0, 'NA', 'NA', '2004-10-20', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(174, 'Harsh Mirchandani', 'Manoj Mirchandani', 'Nirmala mirchandani', 'MFD', 'Agent', '17E689 CHB, Jodhpur', 'NA', '9414450662', '210', '1', '287,288,289,290,291,306', 'St. Paul\'s School', 0, '77', 'Previous Student', '2005-05-15', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(175, 'Gunjeet Gehlot ', 'Praveen Gehlot', 'Rameshwari Gehlot ', 'Businessman', 'Housewife', 'Plot no. 147, street 2, near mata temple, kheme ka kuan, Pal road, Jodhpur', 'gunjeetgehlot@gmail.com', '9829057869', '210', '1', '287,288,289,290,291,306', 'NA', 0, '73', 'NA', '2003-07-23', 'English', '2022-04-12', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(176, 'Shubham Solanki ', 'Praveen Kumar Soalnki', 'Snehlata Soalnki', 'Advocate', 'Housewife', 'Kaylana circle, posr pratap nagar, soorsagar, Jodhpur', 'psolanki739@gmail.com', '9461120739', '210', '1', '287,288,289,290,291,306', 'Lucky Bal Niketan Sr. Sec. School', 0, '76', 'NA', '2005-01-13', 'English', '2022-04-16', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(177, 'Prince Binodani', 'Lalit Binodani', 'Lata Binodani', 'Businessman', 'Housewife', 'Laxmi Daya 658 12th C road Sardarpura, Jodhpur', 'rajkumarbinodani@gmail.com', '9414132291', '210', '1', '287,288,289,290,291,306', 'Our lady of pillar convent school', 0, 'NA', 'NA', '2004-07-23', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(178, 'Hradaya Maheshwari', 'Ravi Pangalia', 'Bhwna Pangalia', 'NA', 'NA', 'D-1 UIT  Colony near baba ramdev mandir, Jodhpur', 'hradayamaheshwari@gmail.com', '9983411342', '210', '1', '287,288,289,290,291,306', 'Sardar Doon Publich School', 0, '87', 'Jiya kalwani', '2006-04-27', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(179, 'Vineet Detha', 'Kailash Detha', 'Bindu detha', 'Govt. Job', 'Teacher', 'Plot no.729, AFRI Colony, 2no. IV/10 Basni 2nd phase, near AIIMS Jodhpur', 'vineetdethabharat@gmail.com', '9602377976', '210', '1', '287,288,289,290,291,306', 'St. Anne\'s Sr. Sec. School', 0, '95', 'Jiya kalwani', '2005-02-17', 'English', '2022-09-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(180, 'Amit Sharma ', 'Kanhaiya Lal Sharma', 'Kavita Sharma', 'Businessman', 'Housewife', 'Masuda , Ajmer', 'amit222sh@gmail.com', '6376290062', '202', '1', '302,303,304,305', 'Mangal Newton School', 0, 'NA', 'NA ', '1970-01-01', 'English', '2022-08-04', '', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(181, 'Vandana ', 'Sanitosh Kumar', 'Chandra Lohiya ', 'Businessman', 'Housewife', '15, Rajat Residency, Neae dalibai Circle, Jhanwar Road', 'pariharvandana19@gmail.com', '8107901076', '202', '1', '302,303,304,305', 'Our Lady School', 0, 'NA', 'Kratika Lohiya', '2001-01-25', 'English', '2022-07-29', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(182, 'Prachi Lohiya', 'Basant Lohiya', 'Anita Lohiya', 'NA', 'NA', 'Kamla-Nehru Nagar C-202', 'prachilohiya67@gmail.com', '8619187140', '202', '1', '302,303,304,305', 'MPS', 0, '60', 'keshav Bohra', '2004-11-09', 'English', '1970-01-01', '80', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(183, 'Ayushi Gurnani', 'Sanjay Gurnani', 'Nisha Gurnani', 'Businessman', 'Housewife', '240, Jwala Vihar Behind Somani College', 'ayushigurnani12@gmail.com', '8955627798', '202', '1', '302,303,304,305', 'Central Academy', 0, '75', 'Online', '2004-07-12', 'English', '2022-07-28', '78', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(184, 'Kratika Lohiya', 'Dev Kishan Lohiya', 'Kavita Lohiya', 'Businessman', 'Housewife', 'Plot No. 14, Rajast Residency, Dali bai circle, Jodhpur', 'kratikalohiya04@gmail.com', '9413488348', '202', '1', '302,303,304,305', 'K.N. College', 0, 'NA', 'NA', '2004-06-18', 'English', '2022-07-28', '81', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0);
INSERT INTO `student` (`id`, `uname`, `fname`, `mname`, `focc`, `mocc`, `address`, `email`, `contact`, `course`, `status`, `subject`, `school`, `grace_period`, `xper`, `reference`, `dob`, `medium`, `jdate`, `xiiper`, `branch`, `batchid`, `syear`, `democlass`, `uid`, `fcontact`, `mcontact`, `course2`, `subject2`, `batchid2`, `ex_student`) VALUES
(185, 'Aditi Mathur', 'Akshay Mathur', 'Shobha Mathur', 'Govt. Teacher', 'Housewife', '1117, Naya vas, desuri, Dist.-pali ', 'mathur06aditi@gmail.com', '7014866102', '202', '1', '302,303,304,305', 'NA', 0, '76', 'Previous Student', '2006-05-10', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(186, 'Tanu Bhati', 'Madhu Singh Bhati', 'Sushila Bhati', 'NA', 'NA', 'Plot No. A72, Sukhram Nagar, Raj bagh, Soor Sagar, jodhpur', 'NA', '9829142967', '202', '1', '302,303,304,305', 'NA', 0, '62', 'NA', '2001-09-06', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(187, 'pooja Sirvi', 'Suresh Sirvi', 'Sukhi Devi', 'Shopkeper', 'Housewife', 'Tuharo ka baas, gudalas, Bali Dist. Pali ', 'pojasirvi04@gmail.com', '8422097251', '202', '1', '302,303,304,305', 'NA', 0, '69', 'Vishal Rathore', '2004-10-04', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(188, 'Narayan Sharma', 'Anil Kumar', 'Santosh Sharma', 'Transport', 'Housewife', 'Chandaroon Sadar Bazar Jodhpur', 'NA', '7357688722', '202', '1', '302,303,304,305', 'Govt. Sen. Sec. School', 0, '49', 'NA', '2004-10-17', 'English', '1970-01-01', '59', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(189, 'Rahul dhadhich', 'Shyam Lal', 'Mamta Dhadhich', 'Driver', 'Housewife', '23/230 Chopasani Housing Board', 'mamtaji098@gmail.com', '7727958173', '202', '1', '302,303,304,305', 'Cambridge Sen. Sec. School', 0, '82', 'Nandani Laxkar', '2005-03-04', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(190, 'Lalima Panwar', 'Manish Panwar', 'Vinod Panwar', 'Businessman', 'Housewife', 'Kailana Circle Paswarnath Colony Plot No. 75', 'lalimapanwar@gmail.com', '7014134309', '202', '1', '302,303,304,305', 'Lucky Bal Niketan', 0, '55', 'Previous Student', '2005-01-19', 'English', '2022-06-29', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(191, 'Shreya Acharya', 'Mukesh acharya', 'smita Acharya', 'Businessman', 'Housewife', 'Acharya para, Near Hukme ki chakki,Jaiselmer', 'shreyaacharya0011@gmail.com', '9351780095', '202', '1', '302,303,304,305', 'SBK College', 0, '67', 'Online', '2003-10-07', 'English', '2022-06-27', '78', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(192, 'Saloni Goyal', 'Somlal Goyal', 'Bharti Goyal ', 'Businessman', 'Housewife', '107, Megh Nagar Road, near 25 sector, Chopasani, Housing Board, Jodhpur', 'goyalsaloni946@gmail.com', '9660912496', '202', '1', '302,303,304,305', 'NA', 0, 'NA', 'Piyunika Sharma', '2004-02-02', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(193, 'Ishan Ali Khan', 'Sultan Khan', 'firoza Khan', 'Contractor', 'Housewife', 'New bus stand, Sayla Dist. Jalore', 'NA', '9636504435', '202', '1', '302,303,304,305', 'Jalore Public School', 0, '60', 'Online', '2004-08-20', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(194, 'Haider Ali Ansari', 'Mushaid ali Ansari', 'Daulat ansari', 'Businessman', 'Housewife', '217 Pal link Road Kamla Nehru Nagar Jodhpur', 'safdar.jd@gmail.com', '9680041745', '202', '1', '302,303,304,305', 'Lucky Bal Niketan', 0, '72', 'NA', '2004-01-09', 'English', '1970-01-01', '74', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(195, 'Nandani Laxkar', 'Dinesh Laxkar', 'Durgawati laxkar', 'Manager', 'Housewife', '474, Devi road, Chandra Bhakar Jodhpur', 'nandanilaxkar@gmail.com', '7220950100', '202', '1', '302,303,304,305', 'Cambridge Sen. Sec. School', 0, '73', 'Previous Student', '2004-01-17', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(196, 'Dishan Solanki', 'Heeralal Solanki', 'Hemlata Solanki', 'Businessman', 'Housewife', 'Khanda Falsa, Jodhpur', 'dishanbuddy1@gmail.com', '8905137526', '202', '1', '302,303,304,305', 'Vyas Collage', 0, '62', 'Online', '2003-08-31', 'English', '1970-01-01', '68', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(197, 'Aditya Soni', 'Kailash Soni', 'Jaya Soni', 'Gold Smith', 'Housewife', 'Suna ro ka bas, Moti chowk, Jodhpur', 'NA', '9461436029', '202', '1', '302,303,304,305', 'Cambridge Sen. Sec. School', 0, '82', 'Rahul Dadhich', '2006-02-07', 'English', '2022-05-20', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(198, 'Gaurav Rathore', 'Keval Chand', 'Mamta Rathore', 'Tailor', 'Housewife', 'Sunaro ka baas, Sojat City Pali', 'NA', '9024338865', '202', '1', '302,303,304,305', 'Birla S. International School', 0, '63', 'Ankit Sir', '2004-01-23', 'English', '2022-06-04', '67', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(199, 'Renuka Lalwani', 'Narayan Lalwani', 'Sona Lalwani', 'Salesman', 'NA', 'Prithvipura Rasala Road near bawani part Jodhpur', 'renukalalwani777@gmail.com', '6375998563', '202', '1', '302,303,304,305', 'Anant Lewis Public School, Jodhpur', 0, '', 'NA', '2003-07-08', 'English', '2022-06-08', '85', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(200, 'Gautam Prajapat', 'Rajesh Prajapat', 'Vimla Prajapat', 'Govt. Employee', 'Housewife', 'A-139, Iind Extension, Kamla Nehru Nagar, Jodhpur', 'gp952123@gmail.com', '9521235800', '202', '1', '302,303,304,305', 'Lucky Bal Niketan', 0, 'NA', 'NA', '2004-10-23', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(201, 'Keshav Bohra ', 'Bhavesh Bohra', 'Minaxi Bohra', 'NA', 'NA', 'Khanda Falsa, Jodhpur', 'NA', '9461478079', '202', '1', '302,303,304,305', 'Mahesh Public School', 0, 'NA', 'NA', '2004-10-06', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(202, 'Anirudh Sharma', 'Madh sudan', 'Basu Sharma', 'Businessman', 'Housewife', 'E-5, 302/ Arihant Agrima Complex/ Behind India Greens Dali Bai Chokhan', 'anirudhsharma641@gmail.com', '9829558088', '202', 'demo', '304', 'Apex Academy Se. Sec. School', 0, '66', '', '2003-09-16', 'english', '2022-09-07', '84', 2, 0, 2, 0, 185, '', '', 0, '', 0, 0),
(203, 'Anirudh Soni', 'Lokesh Soni', 'Neelima Soni', 'Jeweller', 'Housewife', 'Shri Satyam Jewellers, hatthion ka chowk, Pungal para road', 'anirudhsoni501@gmail.com', '895553655', '267', '1', '271,272,273,274,275,276,277,313', 'Somani College', 0, '68', 'NA', '2003-10-13', 'English', '2022-08-02', '78', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(204, 'Diya Agarwal', 'Dushyant Agarwal', 'Vinita Agarwal', 'Businessmen', 'Housewife', '44-B, Bank Colony raika bagh, jodhpur', 'diyagrwl@gmail.com', '9468668669', '267', '1', '271,272,273,274,275,276,277,313', 'Kamla nehru girls college, Jodhpur', 0, '81', 'B.R. Jain', '2003-06-22', 'English', '2022-08-18', '75', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(205, 'Sumit Prajapat', 'Ramesh Prajapat', 'Nirmala Prajapat', 'Electric Contractor', 'Housewife', 'Masuria Shubhash Marg Main Pal Road', 'sumitprajapat2004@gmsil.com', '9950572464', '267', '1', '271,272,273,274,275,276,277,313', 'JNVU', 0, 'NA', 'NA', '2003-12-03', 'English', '2022-08-20', '85', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(206, 'Khushi Maheshwari', 'Sanjay Maheshwari', 'Sweety Maheshwari', 'Businessmen', 'Businesswomen', 'Daga Bazar, Vachnalya ki Gali, Jodhpur', 'khushimaheshwari431@gmail.com', '6375450952', '267', '1', '271,272,273,274,275,276,277,313', 'K.N. College', 0, 'NA', 'Previous Student', '2001-12-30', 'English', '2022-08-24', '76', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(207, 'Tanya Vaishnav', 'Santosh Kumar', 'Sumitra Vaishnav', 'Cable Operator', 'Teacher', 'House No. 8, Gokul Vihar Colony, Arihant Nagar, KNN, Jodhpur ', 'taanyavaishnav0608@gmail.com', '9079905101', '267', '1', '271,272,273,274,275,276,277,313', 'Aishwarya College of College', 0, 'NA', 'NA', '2002-08-06', 'English', '2022-08-30', '78', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(208, 'Simran Rupani', 'Kishore Rupani', 'Reshma Rupani', 'Businessmen', 'Teacher', '18/E70 Chopasani Housing Board, Jodhpur', 'simranrupani04@gmail.com', '8769953448', '267', '1', '271,272,273,274,275,276,277,313', 'Our lady of pillar convent school', 0, '77', 'NA', '2004-02-21', 'English', '2022-08-25', '83', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(209, 'Megha Dhanandia', 'Ajay Kumar', 'Anita Dhanandia', 'Private Service', 'Housewife', 'Plot no. 308 milk man company street no.14 pal road, Jodhpur', 'ak.dhanadia@gmail.com', '9460426811', '267', '1', '271,272,273,274,275,276,277,313', 'Indigo Public School', 0, '70', 'Piyush Rathore', '2003-07-05', 'English', '2022-06-09', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(210, 'Tanushree Tak', 'Chetan Prakash Tak', '', 'NA', 'NA', '464/1b, Kehme Ka kua, Pal road ', 'tanushree.tak28@gmail.com', '9829008453', '267', '1', '271,272,273,274,275,276,277,313', 'Delhi Public School, Pali road', 0, '64', 'NA', '2002-11-28', 'English', '2022-09-02', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(211, 'Megha Jose', 'Jose Varghese', 'Mariamma A.', 'NA', 'Nurse', '10/490 Chopasani Housing Board, Jodhpur', 'meghajose193@gmail.com', '8619316838', '267', '1', '271,272,273,274,275,276,277,313', 'K.N. College', 0, '93', 'Anil Parihar', '2003-03-19', 'English', '2022-09-05', '90', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(212, 'Sanidhya Joshi', 'Anil Joshi', 'Vinita Joshi', 'Cashier', 'Teacher', '17/692, CHB, Jodhpur', 'sanidhyajoshi27@gmail.com', '6377745093', '267', '1', '271,272,273,274,275,276,277,313', 'JNVU College', 0, '84', 'Parents', '2002-09-20', 'English', '2022-09-08', '92', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(213, 'Sonal Mehta', 'Pradeep Mehta', 'Poonam Mehta', 'Businessmen', 'Housewife', '11/844 Chopasani Housing Board', 'sonalmehta2083@gmail.com', '9509832235', '267', '1', '271,272,273,274,275,276,277,313', 'K.N. College', 0, '88', 'Nehal Mehta', '2003-06-20', 'English', '1970-01-01', '92', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(214, 'Zoya Noorani', 'Javed Ahmed ', 'Nasreen Bano', 'NA', 'NA', '69, Behind naiyon ki agechi, Chopassani Road, Jodhpur', 'naved625.na@gmail.com', '6350494132', '267', '1', '271,272,273,274,275,276,277,313', 'Indian Sr. Sec. School', 0, '89', 'NA', '2003-01-01', 'English', '1970-01-01', 'Promoted', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(215, 'Tarun singh', 'Prem Singh', 'Neehu Singh', 'Farmer', 'Housewife', 'Prithviraj nagar, Jhalamand', 'thakarsn2000@gmail.com', '9664498019', '267', '1', '271,272,273,274,275,276,277,313', 'J.N.V.U.', 0, 'NA', 'Online', '1998-08-17', 'English', '1970-01-01', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(216, 'Neeranshi Agarwal ', 'Rajesh Agarwal ', 'Nikita Agarwal', 'Businessmen', 'Teacher', 'Opposite ayurvedic hospital, khanda falsa, jalori gate, Jodhpur', 'agarwalneeranshi@gmail.com', '8233558578', '267', '1', '271,272,273,274,275,276,277,313', 'K.N. College', 0, '89', 'Advertisement', '2005-03-13', 'English', '1970-01-01', '85', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(217, 'Ansh Patwa', 'Shekhar Patwa', 'Neetu Patwa', 'Businessmen', 'Homemaker', '51, Kushal Nagar, Shobhaton ki dhani, khemeka kua', 'aanshpatwa2@gmail.com', '9079948866', '267', '1', '271,272,273,274,275,276,277,313', 'J.N.V.U.', 0, '92', 'Manan Jain', '2004-01-10', 'English', '1970-01-01', '85', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(218, 'Nikhil Harnandani', 'Ramesh Harnandani', 'Shilpa Harnandani', 'Businessmen', 'Homemaker', '21/174, CHB, Jodhpur', 'nikhilharnandani786@gmail.com', '8302505306', '267', '1', '274,275,276,277', 'J.N.V.U.', 0, '71', 'others', '2003-05-16', 'english', '1970-01-01', '91', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(219, 'Keshav Pareek', 'Dhanraj Pareek', 'Santosh Pareek', 'Teacher', 'NA', 'Bhakri Maulash Th. Parbatsav pin code 341512', 'keshavpareekcom@gmail.com', '8824947849', '63', '1', '95,192,248,249,250,251,377,403', 'JNVU', 0, 'NA', 'Online', '2005-06-04', 'English', '2022-12-05', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(220, 'Goutam Swami', 'Banshidhar', 'Suman', 'Farmer', 'Housewife', 'Bakliya, ladnun Nagaur', 'tajuswami2245@gmail.com', '9830053801', '63', '1', '95,192,248,249,250,251,377,403', 'NA', 0, 'NA', 'Online', '2005-02-10', 'English', '2022-11-14', '76', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(221, 'Krishna Soni', 'Manoj Soni', 'Mamta Soni', 'Jeweller', 'NA', 'Kabbutron ka chowk , ram gali near bhati diary', 'kkrishnasoni3999@gmail.com', '6367477704', '63', '1', '95,192,248,249,250,251,377,403', 'Lucky bal niketan school', 0, '68', 'Previous Student', '2004-01-06', 'English', '2022-11-12', '74', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(222, 'Harshit Mehra', 'Dharmendra Mehra', 'Rekha Mehra', 'Businessman', 'Housewife', '65, Parihar nagar dali bai ki circle', 'h.m.enterprises089@gmail.com', '9929932944', '63', '1', '95,192,248,249,250,251,377,403', 'Soumani Colalge', 0, '70', 'NA', '2003-01-19', 'English', '2022-11-10', '66', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(223, 'Mahendra kumar prajapati', 'Vijay kumar ', 'Sita devi', 'Advocate', 'Housewife', 'C-314 kirti nagar, magra, punjla jodhpur', 'mahendra.menu11@gmail.com', '7878311098', '63', '1', '95,192,248,249,250,251,377,403', 'Marwar ingineering college & research centre jodhpur', 0, 'NA', 'Online', '1991-04-29', 'English', '2022-11-30', 'NA', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(224, 'Raheel Jain', 'Kevalchand', 'Archana', 'Businessman', 'Housewife', 'H-14 UIT Colony pratap nagar, jodhpur', 'rahilsancheti@gmail.com', '7014367659', '63', '1', '95,192,248,249,250,251,377,403', 'Lucky bal niketan school', 0, '76', 'Previous Student', '2003-06-18', 'English', '2022-12-04', '80', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(225, 'Rashmi Surana', 'Ashok Surana', 'Manisha Surana', 'Accountant', 'Housewife', 'Dhara ka baas, near jain school, mahamandir jodhpur', 'rashmisurana35@gmail.com', '9529201664', '202', '1', '302,303,304,305', 'K.N. ', 0, '75', 'Relative', '2004-12-09', 'English', '2022-10-31', '71', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(226, 'Jay Bhati', 'Dinesh Bhati', 'Seema Bhati', 'Businessman', 'Housewife', 'Basni 2nd phase, infront of police station jodhpur', 'ishanbhati667@gmail.com', '7300187191', '202', '1', '302,303,304,305', 'JNVU', 0, 'NA', 'previous Student', '2003-12-25', 'English', '2022-11-08', '84', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0),
(227, 'Kanhaiya lal ', 'Gangaram Jangid', 'Padma devi', 'Shopkeeper', 'Housewife', 'P217 shanti nagar salawas road sangaria jodhpur                                                                                                                                                                                                                                          ', 'kanajangid04@gmail.com', '7230882653', '202', '1', '302,303,304,305', 'JNVU', 0, 'NA', 'previous Student', '2004-02-14', 'English', '2022-12-02', '84', 2, 0, 2, 0, 0, '', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendence`
--

CREATE TABLE `student_attendence` (
  `id` int(11) NOT NULL,
  `stu_ids` text NOT NULL,
  `batch` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `teacherid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `chapterid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendence`
--

INSERT INTO `student_attendence` (`id`, `stu_ids`, `batch`, `session`, `added_by`, `date_time`, `teacherid`, `subjectid`, `classid`, `chapterid`, `topicid`, `remark`) VALUES
(1, '5,4,3,6,13,1', 22, 2, 1, '2023-02-09 11:51:48', 9, 274, 1, 633, 1089, '111'),
(2, '5,4,3,6,13,1', 22, 2, 1, '2023-02-10 06:49:41', 9, 274, 1, 631, 1087, 'we');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `upass` text NOT NULL,
  `utype` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `branchid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `uname`, `upass`, `utype`, `email`, `phone`, `branchid`) VALUES
(1, 'admin', 'admin123', '1', 'info@bhavishaclasses.com', '9876543210', 0),
(7, 'Smita Jain', 'Smi123', '2', '', '', 2),
(8, 'Rohit Limba', 'Roh123', '2', '', '', 2),
(9, 'jitender sir', '123456', '2', 'NA', 'NA', 2),
(10, 'Safdar Sir', '123456', '2', 'NA', 'NA', 2),
(11, 'Rajul Mam', '123456', '2', 'NA', 'NA', 2),
(12, 'S.L. JAIN', '123456', '2', 'NA', 'NA', 2),
(13, 'GAURAV SIR', '123456', '2', 'NA', 'NA', 2),
(14, 'VIMLESH SIR', '123456', '2', 'NA', 'NA', 2),
(15, 'Deepak Sir', '123456', '2', 'NA', 'NA', 11),
(16, 'Ankit Sir', '123456', '2', 'NA', 'NA', 2),
(17, 'Dilip Sir', '123456', '2', 'NA', 'NA', 11),
(18, 'Rashmi Mam', '123456', '2', 'NA', 'NA', 2),
(20, 'Poonam Ma\'am', '123456', '2', 'NA', 'NA', 2),
(27, 'Radhika Bohra', '897847', '3', 'bohraradhika905@gmail.com', '9352844006', 2),
(28, 'Annu Prajapat  ', '183990', '3', '', '9413115748', 2),
(29, 'Arman Khan', '276199', '3', 'ca_manan_ahmed@yahoo.com', '9784007100', 2),
(30, 'Palak Balar', '294282', '3', 'balarpalak@gmail.com', '9462867754', 2),
(31, 'Dheeraj Gaur', '191803', '3', 'dheerajgaur231@gmail.com', '9875238212', 2),
(32, 'Dolly Varwani ', '529529', '3', 'dolly.varwani@gmail.com', '7014525791', 2),
(33, 'Drishan Maheshwari ', '231914', '3', 'drishanmaheshwari@gmail.com', '9799981963', 2),
(34, 'Kinjal Loonkar', '842831', '3', 'kinguner08@gmail.com', '9462093423', 2),
(35, 'Laxita Varma ', '625155', '3', 'lakshitaverma387@gmail.com', '9024400237', 2),
(36, 'Mukesh Jakhar ', '87048', '3', 'mukesh64742jakhar@gmail.com', '8769400301', 2),
(37, 'Neha Chellani ', '304536', '3', 'd2206678@gmail.com', '8005766181', 2),
(38, 'Palak Tiwari ', '297053', '3', 'palaktiwari513@gmail.com', '8107153789', 2),
(39, 'Priyanshi Karwa ', '266380', '3', 'NA', '7877730037', 2),
(40, 'Rahul Verma ', '349526', '3', '30vrahul@gmail.com', '7717374607', 2),
(41, 'Rishika Tailor', '242666', '3', 'vermarishika329@gmail.com', '8949970776', 2),
(42, 'Sabha Sohail ', '289939', '3', 'ayesharhemani645@gmail.com', '7023498200', 2),
(43, 'Usmaan', '455214', '3', 'uk8619890@gmail.com', '8619890720', 2),
(44, 'Utkarsha Loonkar ', '508170', '3', 'utkarshajain73@gmail.com', '9079000872', 2),
(45, 'Vankit Bhotra ', '635611', '3', 'vankitjain123@gmail.com', '9468622380', 2),
(46, 'Kiran G ', '965557', '3', 'kirangehlot13112gmail.com', '9024144890', 2),
(47, 'Megha Rochani', '22368', '3', 'megharochani@gmail.com', '7426810687', 2),
(48, 'Moh. Sahdaab Gauri ', '236847', '3', 'shadaabgauri978@gmail.com', '7014088519', 2),
(49, 'Yash Vardhan Bhandari ', '8274', '3', 'NA', '9468712810', 2),
(50, 'Krishna Rathi ', '361025', '3', 'krishnarathi12345@gmail.com', '8302329531', 2),
(51, 'Rohan Rathi ', '311077', '3', 'rohanrathi2004.rr@gmail.com', '9414858522', 2),
(52, 'Dhruvi Bothra', '562747', '3', 'dhruvibothra06@gmail.com', '7852873687', 2),
(53, 'Anil Chaudhary ', '236806', '3', 'ansachaudhary1515@gmail.com', '9672901515', 2),
(54, 'Takshit Parihar', '597464', '3', 'takshit18parihar@gmail.com', '8890432005', 2),
(55, 'Lakshita Gandhi ', '753140', '3', 'lakshitagandhi3135@gmail.com', '8302925658', 2),
(56, 'Vidhi Agarwal ', '18006', '3', 'vidhiagarwal2323@gmail.com', '9462450160', 2),
(57, 'Divya Jain ', '778094', '3', 'NA', '7357848406', 2),
(58, 'Harsh Bohra ', '737559', '3', 'bohraharsh15@gmail.com', '6375690283', 2),
(59, 'Moh Ovesh B ', '363492', '3', 'oveshkt@gmail.com', '9887402201', 2),
(60, 'Nagraj B ', '822872', '3', 'prashantgehlot@gmail.com', '9079064107', 2),
(61, 'Vinod Kumar Chaudhary B ', '278042', '3', 'nareshchowdary2001@gmail.com', '7877254861', 2),
(62, 'Tisha Jain ', '461986', '3', 'tishajain315@gmail.com', '6376484306', 2),
(63, 'Piyunuka Sharma', '639158', '3', 'NA', '8769994448', 2),
(64, 'Tanishka Sharma', '583714', '3', 'tanishkas491@gmail.com', '7976658927', 2),
(65, 'Garima Bohra', '501077', '3', 'kkbohra@gmail.com', '8955388823', 2),
(66, 'Vanshika Garg ', '369399', '3', 'vanshikagarg1764@gmail.com', '9414475441', 2),
(67, 'Awaish Sheikh', '2094', '3', 'nabeedsheikh14@gmail.com', '7727972086', 2),
(68, 'Yash Jain ', '57760', '3', 'yashjainism13@gmail.com', '9413871757', 2),
(69, 'Aditya Bhatnagar', '168586', '3', 'adityabhatnagar0311@gmail.com', '9120137001', 2),
(70, 'Divyanshu upadhyay ', '265061', '3', 'ashokkumar3528@gmail.com', '9460767525', 2),
(71, 'Sagar Soni ', '164745', '3', 'urmy2020@gmail.com', '9001488424', 2),
(72, 'Swai Singh ', '812701', '3', 'khumansinghgo@gmail.com', '9822149623', 2),
(73, 'Divyansh B ', '10006', '3', 'divyanshgupta1220@gmail.com', '7597700441', 2),
(74, 'Rakesh Patel ', '78474', '3', 'dinesh27521@gmail.com', '8107625808', 2),
(75, 'Aayush Jangir ', '779687', '3', 'aayushjangid24@gmail.com', '9024675919', 2),
(76, 'Aashish Lohaar  ', '105258', '3', 'ashish9373246316@gmail.com', '9373246316', 2),
(77, 'Ronit Jangir ', '236286', '3', 'atharvaarts18@gmail.com', '9460215698', 2),
(78, 'Mahesh Jain ', '67180', '3', 'maheshlourishab@gmail.com', '6381660128', 2),
(79, 'Nikita Soni ', '955656', '3', 'nikita.soni050504@gmail.com', '8000811284', 2),
(80, 'Priya Goswami ', '953453', '3', 'krishansingh5481@gmail.com', '9983052000', 2),
(81, 'Khushi Joshi ', '107695', '3', 'khushijoshi183@gmail.com', '8619187766', 2),
(82, 'Kaushal Jangid ', '314489', '3', 'kaushaljangid07@gmail.com', '9950682226', 2),
(83, 'Hemant Bhati ', '452261', '3', 'bhatihemant42@gmail.com', '6378952905', 2),
(84, 'Priyanka Chaudhary ', '605252', '3', 'NA', '6355715114', 2),
(85, 'Vishaal Khatri ', '350659', '3', 'vishal28khatri2004gmail.com', '9079345108', 2),
(86, 'Yogesh Sharma ', '381767', '3', 'yogesgsankhi29@gmail.co', '9958047799', 2),
(87, 'Vaishaali Soni ', '764036', '3', 'NA', '9413916018', 2),
(88, 'Himmat Kumar ', '827786', '3', 'himmatrchoudhary@gmail.com', '8949540343', 2),
(89, 'Rahul Soni ', '213402', '3', 'NA', '7790989441', 2),
(90, 'Dinesh Janyaani ', '219155', '3', 'janyanidev@gmail.com', '9460670077', 2),
(91, 'Sumit Gahlot ', '467540', '3', 'gehlotsumit33@gmail.com', '7737171035', 2),
(92, 'Nandani Dujari ', '997378', '3', 'dujarinandini@gmail.com', '9772872911', 2),
(93, 'Sujal Gahlot ', '339153', '3', 'www.gehlotsujal388@gmail.com', '7597454674', 2),
(94, 'Mayank Jain ', '727779', '3', 'NA', '7665670583', 2),
(95, 'Roshan ', '826254', '3', 'ravikela234@gmail.com', '6377325690', 2),
(96, 'Kishan ', '881820', '3', 'kishanrathi2005@gmail.com', '6367891688', 2),
(97, 'Raghuvendra ', '102921', '3', 'raghurathi2005@gmail.com', '9001441319', 2),
(98, 'Namra bhandari', '592126', '3', 'sbbhandarishilpa@gmail.com', '9610700932', 2),
(99, 'Jai Prakash', '208177', '3', 'jpbhatia73@gmail.com', '7357995149', 2),
(100, 'Devashish Sankhla', '80468', '3', 'mrprakash7@gmail.com', '8949553315', 2),
(101, 'Nitansh Sharma', '992327', '3', 'dineshsharmanp2gmail.com', '9414915720', 2),
(102, 'Lovejeet Panwar', '157266', '3', 'panwarlovejeet182006@gmail.com', '9460668280', 2),
(103, 'Pearl Manani', '848528', '3', 'p66546@gmail.com', '8107999088', 2),
(104, 'Nikhil Prajapat', '561393', '3', 'nikhilprajapat28092006@gmail.com', '9664016201', 2),
(105, 'Vikram Jawa', '313606', '3', 'amitjawa@gmail.com', '8209006436', 2),
(106, 'Tanya Tanwar', '923612', '3', 'sanjay.nathtanwar@gmail.com', '6367425453', 2),
(107, 'Himanshu Vaishnav', '900121', '3', 'radvaishnav@gnail.com', '9680462330', 2),
(108, 'Arun ', '599884', '3', 'arun03092006@gmail.com', '9828046995', 2),
(109, 'Hasti Dolwani', '60564', '3', 'dolwanigreat27@icloud.com', '9828826445', 2),
(110, 'Aditi joshi', '763371', '3', 'jphpjoshi@gmail.com', '9829022353', 2),
(111, 'Suresh Panwar', '862477', '3', 'sureshpanwar2306@gmail.com', '7297846495', 2),
(112, 'Divyansh Khatri', '847433', '3', 'khatridivyansh060@gmail.com', '9413555650', 2),
(113, 'Nabid khan', '957984', '3', 'NA', '9057999797', 2),
(114, 'Mahi Mathur', '340746', '3', 'NA', '9414128257', 2),
(115, 'Pragati Adwani', '151496', '3', '1/.B.754957@gmail.com', '9057224071', 2),
(116, 'Anas Ansari', '677252', '3', 'khananas0626@gmail.com', '9587567860', 2),
(117, 'Sumit Tak', '273702', '3', 'sumitchemtak@gmail.com', '9414025950', 2),
(118, 'Harshit Pareek', '294301', '3', 'NA', '9828037557', 2),
(119, 'Harsh Pareek', '551609', '3', 'NA', '9828031556', 2),
(120, 'Priyal Gulecha', '339251', '3', 'NA', '9328312446', 2),
(121, 'Ashwini Datwani', '559687', '3', 'anshudatwani7@gmail.com', '8000268783', 2),
(122, 'Hiten Binodani', '826107', '3', 'hitenbinodani24@gmail.com', '6376796668', 2),
(123, 'Hiten Jain', '79441', '3', 'hitenjain651@gmail.com', '7014430037', 2),
(124, 'Bhumika Kanwar', '740434', '3', 'sbhumikakanwar786@gmail.com', '7597449603', 2),
(125, 'Himanshi Agarwal', '651771', '3', 'NA', '9214401074', 2),
(126, 'Sanyam Jain', '5044', '3', 'rrjain5641@gmail.com', '9414915031', 2),
(127, 'Jennifer Ali Khan', '554105', '3', 'NA', '7300425545', 2),
(128, 'Devesh Choudhary', '638141', '3', 'deveshchoudhary6166@gmail.com', '7976187493', 2),
(129, 'Anishka Dugat', '490342', '3', 'NA', '6377143896', 2),
(130, 'Prince Jain', '884893', '3', 'princejain6387@gmail.com', '6378581630', 2),
(131, 'Dushyant Prajapat', '386478', '3', 'dushyantprajapat2005@gmail.com', '6375414705', 2),
(132, 'Yash Purohit', '866665', '3', 'stannes.12098@gmail.com', '9828138540', 2),
(133, 'Jiya Kalwani', '499638', '3', '17jiyakalwani@gmail.com', '8955881276', 2),
(134, 'Devraj Singh Bhati', '810244', '3', 'draj34596@gmail.com', '8740050099', 2),
(135, 'Himanshu Kuamar', '60147', '3', 'NA', '9910068310', 2),
(136, 'Mahima Dadhich', '786222', '3', 'mahima80111@gmail.com', '9680128420', 2),
(137, 'Aayushi Vyas', '479161', '3', 'aayushivyas1205@gmail.com', '8107669788', 2),
(138, 'Mahak Jain', '311990', '3', 'alokjain52782@gmail.com', '9529428206', 2),
(139, 'Jiya Gurnani', '36968', '3', 'jiyagurnani.14@gmail.com', '9828337702', 2),
(140, 'Bhumi chouhan', '794473', '3', 'NA', '9414201046', 2),
(141, 'Hanish Singhvi', '202585', '3', 'hshssinghvi@gmail.com', '9414243826', 2),
(142, 'Antriksh Parashar', '567433', '3', 'akparashar@gmail.com', '9460624994', 2),
(143, 'Disha Daga', '537378', '3', 'shivanidaga20312gmail.com', '9001923159', 2),
(144, 'Shriyansh Parihar', '160987', '3', 'shriyanshparihar27@gmail.com', '9982030805', 2),
(145, 'Jasoda Daiya', '756738', '3', 'jasodadaiya26@gmail.com', '7014438763', 2),
(146, 'Maulik Singariya', '776353', '3', 'mauliksingariya759@gmail.com', '9413706750', 2),
(147, 'Eeshaan puri', '210325', '3', 'eeshaanpuri@gmail.com', '9460924548', 2),
(148, 'Mitali Dhoot', '272292', '3', 'mitalidhoot132gmail.com', '8003587777', 2),
(149, 'Akhilesh Singh Rathore', '523415', '3', 'akhileshsinghrathore7890@gmail.com', '8209417083', 2),
(150, 'Shreyansh Punglia ', '936468', '3', 'shreyanshpunglia0@gmail.com', '7014740426', 2),
(151, 'Bhavesh Bhootra', '803276', '3', 'bhaveshbhootra23@gmail.com', '6350441560', 2),
(152, 'Dhruv Jain', '509488', '3', 'dhruv02032006@gmail.com', '9214780655', 2),
(153, 'Jatin boob', '834208', '3', 'jatinboob0@gmail.com', '8104665431', 2),
(154, 'Gauransh Shar,a', '11687', '3', 'igauransh20052@gmail.com', '9079326979', 2),
(155, 'Bhavesh Boob', '737735', '3', 'bhaveshboob3@gmail.com', '9928603800', 2),
(156, 'Harsh Mirchandani', '515175', '3', 'NA', '9414450662', 2),
(157, 'Gunjeet Gehlot ', '194644', '3', 'gunjeetgehlot@gmail.com', '9829057869', 2),
(158, 'Shubham Solanki ', '968754', '3', 'psolanki739@gmail.com', '9461120739', 2),
(159, 'Prince Binodani', '208769', '3', 'rajkumarbinodani@gmail.com', '9414132291', 2),
(160, 'Hradaya Maheshwari', '195651', '3', 'hradayamaheshwari@gmail.com', '9983411342', 2),
(161, 'Vineet Detha', '26053', '3', 'vineetdethabharat@gmail.com', '9602377976', 2),
(162, 'Amit Sharma ', '411523', '3', 'amit222sh@gmail.com', '6376290062', 2),
(163, 'Vandana ', '311437', '3', 'pariharvandana19@gmail.com', '8107901076', 2),
(164, 'Prachi Lohiya', '582614', '3', 'prachilohiya67@gmail.com', '8619187140', 2),
(165, 'Ayushi Gurnani', '382521', '3', 'ayushigurnani12@gmail.com', '8955627798', 2),
(166, 'Kratika Lohiya', '263008', '3', 'kratikalohiya04@gmail.com', '9413488348', 2),
(167, 'Aditi Mathur', '689184', '3', 'mathur06aditi@gmail.com', '7014866102', 2),
(168, 'Tanu Bhati', '879968', '3', 'NA', '9829142967', 2),
(169, 'pooja Sirvi', '886009', '3', 'pojasirvi04@gmail.com', '8422097251', 2),
(170, 'Narayan Sharma', '316275', '3', 'NA', '7357688722', 2),
(171, 'Rahul dhadhich', '18992', '3', 'mamtaji098@gmail.com', '7727958173', 2),
(172, 'Lalima Panwar', '847384', '3', 'lalimapanwar@gmail.com', '7014134309', 2),
(173, 'Shreya Acharya', '467179', '3', 'shreyaacharya0011@gmail.com', '9351780095', 2),
(174, 'Saloni Goyal', '864810', '3', 'goyalsaloni946@gmail.com', '9660912496', 2),
(175, 'Ishan Ali Khan', '183050', '3', 'NA', '9636504435', 2),
(176, 'Haider Ali Ansari', '536598', '3', 'safdar.jd@gmail.com', '9680041745', 2),
(177, 'Nandani Laxkar', '336195', '3', 'nandanilaxkar@gmail.com', '7220950100', 2),
(178, 'Dishan Solanki', '434614', '3', 'dishanbuddy1@gmail.com', '8905137526', 2),
(179, 'Aditya Soni', '191637', '3', 'NA', '9461436029', 2),
(180, 'Gaurav Rathore', '859459', '3', 'NA', '9024338865', 2),
(181, 'Renuka Lalwani', '321072', '3', 'renukalalwani777@gmail.com', '6375998563', 2),
(182, 'Gautam Prajapat', '897972', '3', 'gp952123@gmail.com', '9521235800', 2),
(183, 'Keshav Bohra ', '560185', '3', 'NA', '9461478079', 2),
(184, 'yamini', 'yam@123', '5', 'yamini@gmail.com', '9660155990', 2),
(185, 'Aniru650', 'YixzW8aFms', 'student', 'anirudhsharma641@gmail.com', '9829558088', 2),
(186, 'Anirudh Soni', '20967', '3', 'anirudhsoni501@gmail.com', '895553655', 2),
(187, 'Diya Agarwal', '424563', '3', 'diyagrwl@gmail.com', '9468668669', 2),
(188, 'Sumit Prajapat', '634024', '3', 'sumitprajapat2004@gmsil.com', '9950572464', 2),
(189, 'Khushi Maheshwari', '572007', '3', 'khushimaheshwari431@gmail.com', '6375450952', 2),
(190, 'Tanya Vaishnav', '623987', '3', 'taanyavaishnav0608@gmail.com', '9079905101', 2),
(191, 'Simran Rupani', '847059', '3', 'simranrupani04@gmail.com', '8769953448', 2),
(192, 'Megha Dhanandia', '857859', '3', 'ak.dhanadia@gmail.com', '9460426811', 2),
(193, 'Tanushree Tak', '202225', '3', 'tanushree.tak28@gmail.com', '9829008453', 2),
(194, 'Megha Jose', '879965', '3', 'meghajose193@gmail.com', '8619316838', 2),
(195, 'Sanidhya Joshi', '237362', '3', 'sanidhyajoshi27@gmail.com', '6377745093', 2),
(196, 'Sonal Mehta', '254054', '3', 'sonalmehta2083@gmail.com', '9509832235', 2),
(197, 'Zoya Noorani', '320242', '3', 'naved625.na@gmail.com', '6350494132', 2),
(198, 'Tarun singh', '472086', '3', 'thakarsn2000@gmail.com', '9664498019', 2),
(199, 'Neeranshi Agarwal ', '710043', '3', 'agarwalneeranshi@gmail.com', '8233558578', 2),
(200, 'Ansh Patwa', '102780', '3', 'aanshpatwa2@gmail.com', '9079948866', 2),
(201, 'Nikhil Harnandani', '382106', '3', 'nikhilharnandani786@gmail.com', '8302505306', 2),
(202, 'Keshav Pareek', '16036', '3', 'keshavpareekcom@gmail.com', '8824947849', 2),
(203, 'Goutam Swami', '914338', '3', 'tajuswami2245@gmail.com', '9830053801', 2),
(204, 'Krishna Soni', '345867', '3', 'kkrishnasoni3999@gmail.com', '6367477704', 2),
(205, 'Harshit Mehra', '182529', '3', 'h.m.enterprises089@gmail.com', '9929932944', 2),
(206, 'Mahendra kumar prajapati', '152077', '3', 'mahendra.menu11@gmail.com', '7878311098', 2),
(207, 'Raheel Jain', '75665', '3', 'rahilsancheti@gmail.com', '7014367659', 2),
(208, 'Rashmi Surana', '375073', '3', 'rashmisurana35@gmail.com', '9529201664', 2),
(209, 'Jay Bhati', '152776', '3', 'ishanbhati667@gmail.com', '7300187191', 2),
(210, 'Kanhaiya lal ', '827608', '3', 'kanajangid04@gmail.com', '7230882653', 2),
(211, 'Yamini Gehlot', '', '-- Select --', '', '', 0),
(212, 'rishabjain', 'rishabjain', '2', 'i2hy7hivi.movies@gmail.com', '6367932462', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_transaction`
--
ALTER TABLE `accounts_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_master_bank_ac`
--
ALTER TABLE `acc_master_bank_ac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_master_beneficiery_type`
--
ALTER TABLE `acc_master_beneficiery_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_master_transaction`
--
ALTER TABLE `acc_master_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_master_transaction_type`
--
ALTER TABLE `acc_master_transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_pdf`
--
ALTER TABLE `assessment_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_room`
--
ALTER TABLE `branch_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_student`
--
ALTER TABLE `ex_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_authors`
--
ALTER TABLE `library_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_books`
--
ALTER TABLE `library_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_location`
--
ALTER TABLE `library_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_publication`
--
ALTER TABLE `library_publication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendence`
--
ALTER TABLE `student_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `accounts_transaction`
--
ALTER TABLE `accounts_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_master_bank_ac`
--
ALTER TABLE `acc_master_bank_ac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `acc_master_beneficiery_type`
--
ALTER TABLE `acc_master_beneficiery_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_master_transaction`
--
ALTER TABLE `acc_master_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_master_transaction_type`
--
ALTER TABLE `acc_master_transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `assessment_pdf`
--
ALTER TABLE `assessment_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `branch_room`
--
ALTER TABLE `branch_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1594;

--
-- AUTO_INCREMENT for table `ex_student`
--
ALTER TABLE `ex_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `library_authors`
--
ALTER TABLE `library_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library_books`
--
ALTER TABLE `library_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library_location`
--
ALTER TABLE `library_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `library_publication`
--
ALTER TABLE `library_publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `student_attendence`
--
ALTER TABLE `student_attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
