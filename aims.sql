-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2020 at 05:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(0, 'None');

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
  `rollno` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(14) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fee` int(11) NOT NULL,
  `datec` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
  `attend` int(11) NOT NULL DEFAULT '0',
  `dates` date NOT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
  `fine` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `dates` date DEFAULT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `teacher` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `datec` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `teacher`, `class`, `datec`) VALUES
(0, 'None', 0, '0', '2020-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `contact` varchar(14) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `pay` int(11) NOT NULL,
  `lecture` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `datec` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `contact`, `subject_id`, `pay`, `lecture`, `total`, `datec`) VALUES
(0, 'None', '0', '0', 0, 0, 0, '2019-12-12');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'hamza56', 'admin990', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
