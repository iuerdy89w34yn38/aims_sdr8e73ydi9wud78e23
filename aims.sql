-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2020 at 06:14 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aims`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `code`, `del`, `datec`) VALUES
(16, 'Pre 9th Bio-Sc', 'P9BioS', 0, '2020-01-22 05:54:02'),
(17, 'Pre 9th Comp-Sc', 'P9CS', 0, '2020-01-22 05:59:38'),
(18, 'Pre 9th Arts 1', 'P9A', 0, '2020-01-22 05:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `color1` text NOT NULL,
  `color2` text NOT NULL,
  `color3` text NOT NULL,
  `fcolor` text,
  `factive` text,
  `bg` text,
  `bgcolor` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `color1`, `color2`, `color3`, `fcolor`, `factive`, `bg`, `bgcolor`) VALUES
(1, 'Blue', '#0D83DD', '#146fb4', '#0b5da0', '#fff', '#146fb4', 'bluebg.jpg', '#fff'),
(2, 'Red', '#d61515', '#a21212', 'redbg.jpg', '#fff', '#f7d50c', 'redbg.jpg', '#fff'),
(3, 'Green', '#35c313', '#239009', '#58ce3c', '#fff', '#754b3b', 'greenbg.jpg', '#fff'),
(4, 'Black', '#000000', '#2b2b2b', '#e8e8e8', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inst`
--

DROP TABLE IF EXISTS `inst`;
CREATE TABLE IF NOT EXISTS `inst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inst`
--

INSERT INTO `inst` (`id`, `name`, `address`, `phone`) VALUES
(1, 'AIMS ', 'Lahore', '03204157040');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

DROP TABLE IF EXISTS `months`;
CREATE TABLE IF NOT EXISTS `months` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `name`) VALUES
(1, 'january'),
(2, 'february'),
(3, 'march'),
(4, 'april'),
(5, 'may'),
(6, 'june'),
(7, 'july'),
(8, 'august'),
(9, 'september'),
(10, 'october'),
(11, 'november'),
(12, 'december');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rollno` varchar(40) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(14) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fee` int(11) NOT NULL,
  `datec` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `rollno`, `name`, `contact`, `class`, `fee`, `datec`) VALUES
(42, '2', 'Biology Student', '0400', '16', 5000, '2020-01-22'),
(43, '2', 'New Arts Student', '0300', '18', 4500, '2020-01-23'),
(41, '1', 'Arts Student', '0900', '18', 3500, '2020-01-22'),
(40, '1', 'NewBio Std', '0900', '16', 5000, '2020-01-22'),
(44, '3', 'Another Bio Student', '0900', '16', 6500, '2020-01-23'),
(45, '1', 'Computer Student', '0700', '17', 5000, '2020-01-23'),
(46, '4', 'Haroon  M', '03350550008', '16', 2500, '2020-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `student_atd`
--

DROP TABLE IF EXISTS `student_atd`;
CREATE TABLE IF NOT EXISTS `student_atd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `std_rollno` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `class` varchar(20) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `attend` varchar(1) NOT NULL DEFAULT '0',
  `dates` date NOT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_atd`
--

INSERT INTO `student_atd` (`id`, `std_id`, `std_rollno`, `teacher_id`, `class`, `subject_id`, `attend`, `dates`, `datec`) VALUES
(35, 40, 1, 19, '16', 25, 'P', '2020-01-23', '2020-01-23 14:56:07'),
(36, 42, 2, 19, '16', 25, 'L', '2020-01-23', '2020-01-23 14:56:07'),
(37, 44, 3, 19, '16', 25, 'A', '2020-01-23', '2020-01-23 14:56:07'),
(38, 41, 1, 19, '18', 23, 'P', '2020-01-23', '2020-01-23 15:35:54'),
(39, 43, 2, 19, '18', 23, 'P', '2020-01-23', '2020-01-23 15:35:54'),
(40, 40, 1, 19, '16', 23, 'P', '2020-02-11', '2020-02-11 05:17:57'),
(41, 42, 2, 19, '16', 23, 'P', '2020-02-11', '2020-02-11 05:17:57'),
(42, 44, 3, 19, '16', 23, 'A', '2020-02-11', '2020-02-11 05:17:57'),
(43, 40, 1, 19, '16', 24, 'L', '2020-02-11', '2020-02-11 06:44:30'),
(44, 42, 2, 19, '16', 24, 'L', '2020-02-11', '2020-02-11 06:44:30'),
(45, 44, 3, 19, '16', 24, 'A', '2020-02-11', '2020-02-11 06:44:30'),
(46, 40, 1, 19, '16', 23, 'P', '2020-03-02', '2020-03-02 10:28:36'),
(47, 42, 2, 19, '16', 23, 'L', '2020-03-02', '2020-03-02 10:28:36'),
(48, 44, 3, 19, '16', 23, 'A', '2020-03-02', '2020-03-02 10:28:36'),
(49, 46, 4, 19, '16', 23, 'P', '2020-03-02', '2020-03-02 10:28:36'),
(50, 40, 1, 19, '16', 23, 'P', '2020-03-02', '2020-03-02 10:28:36'),
(51, 42, 2, 19, '16', 23, 'L', '2020-03-02', '2020-03-02 10:28:36'),
(52, 44, 3, 19, '16', 23, 'A', '2020-03-02', '2020-03-02 10:28:36'),
(53, 46, 4, 19, '16', 23, 'P', '2020-03-02', '2020-03-02 10:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

DROP TABLE IF EXISTS `student_fee`;
CREATE TABLE IF NOT EXISTS `student_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `mof` varchar(24) NOT NULL,
  `yof` int(11) NOT NULL,
  `arrears` int(11) NOT NULL DEFAULT '0',
  `desp` text,
  `fee` int(11) NOT NULL DEFAULT '0',
  `fine` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `due` int(11) NOT NULL DEFAULT '0',
  `dates` date DEFAULT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`id`, `std_id`, `mof`, `yof`, `arrears`, `desp`, `fee`, `fine`, `paid`, `due`, `dates`, `datec`) VALUES
(71, 44, '02', 2020, -500, 'Fee Submitted', 6500, 0, 7000, 1, '2020-02-12', '2020-02-12 06:53:23'),
(73, 41, '02', 2020, 3500, 'Previous Fee.', 3500, 3500, 0, 1, '2020-02-12', '2020-02-12 06:56:00'),
(72, 40, '02', 2020, -1000, 'Fee Submitted', 5000, 0, 7000, 1, '2020-02-12', '2020-02-12 06:53:38'),
(70, 45, '02', 2020, 0, 'Fee Submitted', 5000, 0, 5000, 1, '2020-02-12', '2020-02-12 06:53:13'),
(69, 46, '02', 2020, 100, 'Fee Submitted', 2500, 0, 2400, 1, '2020-02-12', '2020-02-12 06:51:59'),
(68, 40, '01', 2020, 1000, 'Fee Discount (-500)', 5000, -500, 0, 0, '2020-01-23', '2020-01-23 14:21:49'),
(67, 40, '01', 2020, 1500, 'Fee Submitted', 5000, 0, 4000, 1, '2020-01-23', '2020-01-23 14:20:25'),
(66, 40, '01', 2020, 500, 'Fine (500)', 5000, 500, 0, 0, '2020-01-23', '2020-01-23 14:19:38'),
(74, 42, '02', 2020, 5000, 'Previous Fee.', 5000, 5000, 0, 1, '2020-02-12', '2020-02-12 06:56:00'),
(75, 43, '02', 2020, 4500, 'Previous Fee.', 4500, 4500, 0, 1, '2020-02-12', '2020-02-12 06:56:00'),
(76, 46, '03', 2020, 0, 'Fee Submitted', 2500, 0, 2600, 1, '2020-03-12', '2020-03-12 07:07:08'),
(77, 41, '03', 2020, 0, 'Fee Submitted', 3500, 0, 7000, 1, '2020-03-12', '2020-03-12 07:11:53'),
(78, 46, '03', 2020, 500, 'Tests Dues (500)', 2500, 500, 0, 0, '2020-03-12', '2020-03-12 07:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `del`, `datec`) VALUES
(23, 'English', 0, '2020-01-22 06:01:53'),
(24, 'English Grammer New', 0, '2020-01-23 14:26:51'),
(25, 'Pak-Studies', 0, '2020-01-23 14:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `pay` int(11) NOT NULL,
  `lecture` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `contact`, `pay`, `lecture`, `total`, `del`, `datec`) VALUES
(19, 'Teacher 1', '03001234567', 5000, 4, 20000, 0, '2020-01-21 19:00:00'),
(20, 'Teacher 2', '03001234567', 3000, 5, 15000, 0, '2020-01-21 19:00:00'),
(21, 'Teacher 3', '0900', 2000, 5, 10000, 0, '2020-01-22 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_fee`
--

DROP TABLE IF EXISTS `teacher_fee`;
CREATE TABLE IF NOT EXISTS `teacher_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `mof` varchar(24) NOT NULL,
  `yof` int(11) NOT NULL,
  `arrears` int(11) NOT NULL DEFAULT '0',
  `desp` text,
  `fee` int(11) NOT NULL DEFAULT '0',
  `fine` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `due` int(11) NOT NULL DEFAULT '0',
  `dates` date DEFAULT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `role` varchar(24) NOT NULL,
  `theme` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `theme`) VALUES
(1, 'hamza56', 'admin990', 'admin', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
