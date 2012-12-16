-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2012 at 03:10 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tagId` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `name`, `extension`, `time`, `tagId`) VALUES
(1, 'auto1', 'jpeg', '2012-12-13 20:46:45', 3),
(2, 'auto2', 'jpg', '2012-12-13 20:46:45', 3),
(3, 'auto3', 'jpg', '2012-12-13 20:46:45', 3),
(4, 'auto4', 'jpg', '2012-12-13 20:46:45', 3),
(5, 'auto5', 'jpg', '2012-12-13 20:46:45', 3),
(6, 'zena1', 'jpg', '2012-12-14 19:37:35', 2),
(7, 'zena2', 'jpg', '2012-12-14 19:37:35', 2),
(8, 'zena3', 'jpg', '2012-12-14 19:37:35', 2),
(9, 'zena4', 'jpg', '2012-12-14 19:37:35', 2),
(10, 'janjetina1', 'jpg', '2012-12-14 19:37:35', 2),
(11, 'janjetina2', 'jpg', '2012-12-14 19:37:35', 1),
(12, 'janjetina3', 'jpg', '2012-12-14 19:37:35', 1),
(13, 'janjetina4', 'jpg', '2012-12-14 19:37:35', 1),
(14, 'zena', 'jpg', '2012-12-14 19:37:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(13) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `y` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `x`, `y`) VALUES
(1, 'cars', '3', '3'),
(2, 'Women', '3', '3'),
(3, 'stuff', '3', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
