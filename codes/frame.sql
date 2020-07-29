-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2019 at 06:06 AM
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
-- Database: `frame`
--

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

DROP TABLE IF EXISTS `mytable`;
CREATE TABLE IF NOT EXISTS `mytable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `slug` varchar(90) DEFAULT NULL,
  `img` text,
  `desp` text NOT NULL,
  `ordr` int(11) DEFAULT NULL,
  `feat` int(11) NOT NULL DEFAULT '0',
  `datec` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `slug`, `img`, `desp`, `ordr`, `feat`, `datec`) VALUES
(9, 'Final Testing 2', 'final-testing-page', 'c19e508c51607656ad57ee36233a770c1.png', 'This is the Final testing page', 100, 0, '2019-12-10'),
(7, 'Sub Page 2', 'pro-2', '64e6de9c40bd1a8b5849c5dc62031ae61.png', 'Lol New Desp for multiline', 8, 0, '2019-12-08'),
(8, 'Sports 1', 'su34', 'f518d86847d812e9411913b834b05b6c1.png', 'some text here\'s with app\r\n', 4, 0, '2019-12-08'),
(10, 'New Test', 'new-test', '250a3524f305bbd5251be5c8e3c717c11.png', 'New Desp for Testing', 4, 1, '2019-12-10'),
(11, 'Checking the Feat Box', 'checking-the-feat-box', '0bf9627b39c940e5ec3e222e90962a211.png', 'Testing', 30, 0, '2019-12-10'),
(12, 'Sub Page 2', 'sub-page-2', 'd8a94960c6ef78cbfc22d07aa05327821.png', 'Sub Page 2 EEsp', 45, 1, '2019-12-10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
