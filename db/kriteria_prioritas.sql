-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2016 at 01:19 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.17-3+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_penjurusan_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_prioritas`
--

CREATE TABLE IF NOT EXISTS `kriteria_prioritas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(30) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `minat` int(11) DEFAULT NULL,
  `psikotes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kriteria_prioritas`
--

INSERT INTO `kriteria_prioritas` (`id`, `kriteria`, `nilai`, `minat`, `psikotes`) VALUES
(1, 'nilai', 1, 2, 3),
(2, 'minat', NULL, 1, 2),
(3, 'psikotes', NULL, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
