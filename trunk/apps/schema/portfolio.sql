-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2013 at 11:59 AM
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
  `author` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(500) NOT NULL,
  `mime_type` varchar(250) NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'published',
  `slug` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `order` int(11) NOT NULL,
  `total_views` int(11) NOT NULL,
  `total_comments` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `type`, `mime_type`, `status`, `slug`, `url`, `order`, `total_views`, `total_comments`, `created_at`, `modified_at`) VALUES
(1, 6, 'Sample Post', '<span style="font-family: arial; font-size: 13px; background-color: rgb(255, 255, 255);">Dignissim tristique turpis, vel tristique in adipiscing sed auctor hac arcu urna, augue ac, duis. Porttitor, magnis in amet elementum, mattis dictumst turpis vel! Et ut mid. A! In tempor. Nunc ut mattis tristique? Aenean rhoncus!</span>', 'post', '', 'published', 'sample-post', '/?p=1', 0, 0, 0, '2012-11-25 06:21:47', '0000-00-00 00:00:00'),
(2, 6, 'p17k185lgfm1c1jce1knc14ar1ubi7.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lgfm1c1jce1knc14ar1ubi7.jpg', '/assets/41582da/uploads/p17k185lgfm1c1jce1knc14ar1ubi7.jpg', 0, 0, 0, '2013-02-22 15:26:04', '0000-00-00 00:00:00'),
(3, 6, 'p17k185lgfpoahsofaosnb1oiv8.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lgfpoahsofaosnb1oiv8.jpg', '/assets/41582da/uploads/p17k185lgfpoahsofaosnb1oiv8.jpg', 0, 0, 0, '2013-02-22 15:26:04', '0000-00-00 00:00:00'),
(4, 6, 'p17k185lggic2v2e18f8me0hna9.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lggic2v2e18f8me0hna9.jpg', '/assets/41582da/uploads/p17k185lggic2v2e18f8me0hna9.jpg', 0, 0, 0, '2013-02-22 15:26:04', '0000-00-00 00:00:00'),
(5, 6, 'p17k185lgg869h8ros6189j13dia.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lgg869h8ros6189j13dia.jpg', '/assets/41582da/uploads/p17k185lgg869h8ros6189j13dia.jpg', 0, 0, 0, '2013-02-22 15:26:05', '0000-00-00 00:00:00'),
(6, 6, 'p17k185lgg11er2l61eqfkoff5ib.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lgg11er2l61eqfkoff5ib.jpg', '/assets/41582da/uploads/p17k185lgg11er2l61eqfkoff5ib.jpg', 0, 0, 0, '2013-02-22 15:26:05', '0000-00-00 00:00:00'),
(7, 6, 'p17k185lgg1c2fqsc6h61ehv1902c.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lgg1c2fqsc6h61ehv1902c.jpg', '/assets/41582da/uploads/p17k185lgg1c2fqsc6h61ehv1902c.jpg', 0, 0, 0, '2013-02-22 15:26:05', '0000-00-00 00:00:00'),
(8, 6, 'p17k185lgg1qe61mf9d4fg9fu4ud.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lgg1qe61mf9d4fg9fu4ud.jpg', '/assets/41582da/uploads/p17k185lgg1qe61mf9d4fg9fu4ud.jpg', 0, 0, 0, '2013-02-22 15:26:05', '0000-00-00 00:00:00'),
(9, 6, 'p17k185lgghhkm4jegvj32jlue.jpg', '', 'attachment', 'image/jpg', 'published', 'p17k185lgghhkm4jegvj32jlue.jpg', '/assets/41582da/uploads/p17k185lgghhkm4jegvj32jlue.jpg', 0, 0, 0, '2013-02-22 15:26:05', '0000-00-00 00:00:00'),
(10, 6, '17-Aug-2010', '<font face="Arial, Verdana" style="font-family: Arial, Verdana; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal;"><span style="font-size: 12px;">Sed platea sed donec venenatis, magnam? Asperiores venenatis minima, quos, mi dui? Minim qui ad nulla, vestibulum aliquip! Magni hymenaeos, lorem facilis!</span></font>', 'post', '', 'published', '01-Oct-1991', '/?p=10', 0, 0, 0, '2013-02-22 15:26:37', '0000-00-00 00:00:00'),
(23, 6, 'News', '', 'field', '', 'published', 'field_news', '', 0, 0, 0, '2013-02-25 06:30:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_metas`
--

CREATE TABLE IF NOT EXISTS `post_metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `post_metas`
--

INSERT INTO `post_metas` (`id`, `post_id`, `meta_key`, `meta_value`) VALUES
(36, 23, 'data_1', 'a:6:{s:5:"label";s:3:"URL";s:4:"name";s:3:"url";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:2:"no";s:7:"default";s:0:"";}'),
(37, 23, 'field_count', '1'),
(38, 23, 'rules', 'a:3:{s:3:"key";s:8:"category";s:9:"condition";s:11:"is_equal_to";s:5:"value";s:1:"6";}'),
(53, 10, 'featured_image', '/assets/41582da/uploads/p17k185lgg11er2l61eqfkoff5ib.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `slug`) VALUES
(5, 'Uncategorized', 'uncategorized'),
(6, 'Test1', 'test1'),
(7, 'Test2', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `term_relationships`
--

CREATE TABLE IF NOT EXISTS `term_relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `term_relationships`
--

INSERT INTO `term_relationships` (`id`, `post_id`, `category_id`) VALUES
(16, 10, 6),
(17, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `term_taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term_id` int(11) NOT NULL,
  `taxonomy` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `parent` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `term_taxonomy`
--

INSERT INTO `term_taxonomy` (`id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(3, 5, 'category', '', 0, 0),
(4, 6, 'category', '', 5, 0),
(5, 7, 'category', '', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nickname` varchar(500) NOT NULL,
  `domain` varchar(500) DEFAULT NULL,
  `user_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nickname`, `domain`, `user_status`, `created_at`, `modified_at`) VALUES
(6, 'eyesimple', 'yo_ra_won@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', 'eyesimple', NULL, 0, '2012-11-23 08:56:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE IF NOT EXISTS `user_metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(500) NOT NULL,
  `meta_value` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_metas`
--

INSERT INTO `user_metas` (`id`, `meta_key`, `meta_value`, `user_id`) VALUES
(6, 'user_role', 'admin', 6),
(7, 'firstname', 'Yohanes', 6),
(8, 'lastname', 'Raymond', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
