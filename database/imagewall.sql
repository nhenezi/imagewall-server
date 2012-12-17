-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2012 at 04:47 AM
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
  `md5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=116 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `name`, `extension`, `time`, `tagId`, `md5`) VALUES
(98, '1', 'jpg', '2012-12-17 03:40:54', 10, 'c6d51adbc571bfc647d1c2e2739dfae8'),
(99, '2', 'jpg', '2012-12-17 03:41:16', 10, '0f8ea6c7ce9be3feae0e0919daa47f29'),
(100, '3', 'jpg', '2012-12-17 03:41:29', 11, 'dd4a6f651ebd9b228f9c7a5e8972d3b7'),
(101, '3', 'png', '2012-12-17 03:41:37', 12, 'a9e1cb99f696eb6188594d0a57d8afbd'),
(102, '4', 'jpg', '2012-12-17 03:41:46', 12, '330edfb2f69866cc95c6404414f33c47'),
(103, '5', 'jpg', '2012-12-17 03:42:00', 11, '69b52b00af956a2daf7bc58d53561352'),
(104, '6', 'jpg', '2012-12-17 03:42:30', 11, 'b5b66d0da63d8097c093f535d783b32e'),
(105, '7', 'jpg', '2012-12-17 03:42:37', 10, '31374147658814b4ea3c2c486be3f7ee'),
(106, '8', 'jpg', '2012-12-17 03:42:46', 11, '296094d13249c2849aebc6cea793eac6'),
(107, '9', 'jpg', '2012-12-17 03:43:01', 12, '6de5d4f653f802a21a70c8c4faef9ed4'),
(108, '10', 'jpg', '2012-12-17 03:43:11', 13, 'bed911e128beb9b6c1ef3bf0f75dd161'),
(109, '11', 'jpg', '2012-12-17 03:43:18', 11, 'a7441f2f154f724b2f0d72c571cf4bd7'),
(110, '12', 'jpg', '2012-12-17 03:43:26', 11, 'd1f6fd6798461fde1b9f470300b73996'),
(111, '13', 'jpg', '2012-12-17 03:43:45', 14, 'b3b809aa06a8ab748e84e3add07cf435'),
(112, '14', 'jpg', '2012-12-17 03:43:53', 14, 'd4060a2d4d1509326fcf3cb0fee7c49a'),
(113, '15', 'jpg', '2012-12-17 03:44:00', 12, '97f174c2dd5a4f3c7e5e8480fc78de91'),
(114, '16', 'jpg', '2012-12-17 03:44:10', 14, '08fc35ac16f099db66f7ae6b4c279754'),
(115, '17', 'jpg', '2012-12-17 03:44:17', 12, '8dec8d8dbf00695e2dff08eca97f3af1');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `y` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `x`, `y`) VALUES
(10, 'nature', '', ''),
(11, 'beauty', '', ''),
(12, 'abstract', '', ''),
(13, 'animal', '', ''),
(14, 'uncategorized', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
