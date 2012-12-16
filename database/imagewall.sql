-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2012 at 02:37 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imagewall`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinate`
--

CREATE TABLE IF NOT EXISTS `coordinate` (
  `prefix` varchar(255) CHARACTER SET latin1 NOT NULL,
  `xcoordinate` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ycoordinate` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `coordinate`
--

INSERT INTO `coordinate` (`prefix`, `xcoordinate`, `ycoordinate`) VALUES
('bcc', '0', '0'),
('estudent', '7', '1');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(13) NOT NULL,
  `prefix` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `prefix`) VALUES
(1, 'Best_Code_Challange'),
(2, 'Best_Code_Challange'),
(3, 'Best_Code_Challange'),
(4, 'estudent'),
(5, 'estudent'),
(6, 'sajam'),
(7, 'sajam'),
(8, 'sajam'),
(9, 'sajam'),
(10, 'vecera'),
(11, 'vecera'),
(12, 'vecera'),
(13, 'vecera'),
(14, 'sajam');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `name`, `extension`, `time`) VALUES
(1, 'auto1', 'jpeg', '2012-12-13 20:46:45'),
(2, 'auto2', 'jpg', '2012-12-13 20:46:45'),
(3, 'auto3', 'jpg', '2012-12-13 20:46:45'),
(4, 'auto4', 'jpg', '2012-12-13 20:46:45'),
(5, 'auto5', 'jpg', '2012-12-13 20:46:45'),
(6, 'zena1', 'jpg', '2012-12-14 19:37:35'),
(7, 'zena2', 'jpg', '2012-12-14 19:37:35'),
(8, 'zena3', 'jpg', '2012-12-14 19:37:35'),
(9, 'zena4', 'jpg', '2012-12-14 19:37:35'),
(10, 'janjetina1', 'jpg', '2012-12-14 19:37:35'),
(11, 'janjetina2', 'jpg', '2012-12-14 19:37:35'),
(12, 'janjetina3', 'jpg', '2012-12-14 19:37:35'),
(13, 'janjetina4', 'jpg', '2012-12-14 19:37:35'),
(14, 'zena', 'jpg', '2012-12-14 19:37:35'),
(15, 'janjetina', 'jpg', '2012-12-14 19:37:35'),
(47, 'slika', 'jpg', '2012-12-16 10:38:18'),
(48, 'slika', 'jpg', '2012-12-16 10:38:37'),
(49, 'slika', 'jpg', '2012-12-16 10:49:42'),
(50, 'slika', 'jpg', '2012-12-16 10:50:02'),
(51, 'slika', 'jpg', '2012-12-16 10:50:57'),
(52, 'slika', 'jpg', '2012-12-16 10:51:28'),
(53, 'slika', 'jpg', '2012-12-16 10:51:34'),
(54, 'slika', 'jpg', '2012-12-16 10:52:21'),
(55, 'slika', 'jpg', '2012-12-16 10:53:07'),
(56, 'slika', 'jpg', '2012-12-16 12:04:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
