-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2012 at 11:53 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `malthusian`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE IF NOT EXISTS `checkins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `player_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `codename` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `postcode` varchar(32) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `player_info`
--

CREATE TABLE IF NOT EXISTS `player_info` (
  `player_id` bigint(20) NOT NULL,
  `q1` varchar(128) NOT NULL,
  `q2` varchar(128) NOT NULL,
  `q3` varchar(128) NOT NULL,
  `q4` varchar(128) NOT NULL,
  `q5` varchar(128) NOT NULL,
  `q6` varchar(128) NOT NULL,
  `q7` varchar(128) NOT NULL,
  `q8` varchar(128) NOT NULL,
  `c1` tinyint(1) NOT NULL DEFAULT '0',
  `c2` tinyint(1) NOT NULL DEFAULT '0',
  `c3` tinyint(1) NOT NULL DEFAULT '0',
  `c4` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player_tag`
--

CREATE TABLE IF NOT EXISTS `player_tag` (
  `tag_id` bigint(20) NOT NULL,
  `player_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10010 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
