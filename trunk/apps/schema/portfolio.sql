-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2012 at 05:12 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Uncategorized', 'uncategorized');

-- --------------------------------------------------------

--
-- Table structure for table `category_relationships`
--

CREATE TABLE IF NOT EXISTS `category_relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'theme', 'default'),
(2, 'siteurl', 'http://portfolio.local'),
(3, 'sitename', 'CMS EYESIMPLE'),
(4, 'sitedescription', ''),
(5, 'admin_email', 'admin@eyesimple.us');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'published',
  `slug` varchar(500) NOT NULL,
  `order` int(11) NOT NULL,
  `total_views` int(11) NOT NULL,
  `total_comments` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `type`, `status`, `slug`, `order`, `total_views`, `total_comments`, `created_at`, `modified_at`) VALUES
(1, '12/05/2007', 'asdsad', 'page', 'published', '09/06/1992', 0, 0, 0, '2012-11-04 04:08:53', '0000-00-00 00:00:00'),
(2, '08/11/1988', 'sdfsdfds', 'post', 'published', '12/12/1975', 0, 0, 0, '2012-11-04 04:08:53', '0000-00-00 00:00:00'),
(3, '12/06/1999', 'sdasdas', 'page', 'published', '10/07/1991', 0, 0, 0, '2012-11-04 04:08:53', '0000-00-00 00:00:00'),
(4, '04/05/2011', 'trtyt', 'page', 'published', '11/07/1993', 0, 0, 0, '2012-11-04 04:08:53', '0000-00-00 00:00:00'),
(5, '05/05/1991', 'asaas', 'page', 'published', '11/05/1997', 0, 0, 0, '2012-11-04 04:08:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nickname` varchar(500) NOT NULL,
  `domain` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nickname`, `domain`, `created_at`, `modified_at`) VALUES
(1, 'admin@eyesimple.us', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, '2012-11-03 00:50:34', '2012-11-03 07:49:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
