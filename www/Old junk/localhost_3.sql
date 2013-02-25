-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2011 at 11:02 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `userprofiles`
--
CREATE DATABASE `userprofiles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `userprofiles`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(255) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `comment`, `username`) VALUES
(12, ' 3', 'jward'),
(11, ' 2', 'lcheeseman'),
(10, ' 1\r\n', 'jward');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `admin`) VALUES
('lcheeseman', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 1),
('jward', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 1);
