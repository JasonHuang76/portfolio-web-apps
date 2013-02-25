-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2013 at 06:12 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `type`, `mime_type`, `status`, `slug`, `url`, `order`, `total_views`, `total_comments`, `created_at`, `modified_at`) VALUES
(44, 6, 'Sample Post', '<font face="Arial, Verdana"><span style="font-size: 12px;">Ullam ratione eligendi. Rutrum nam curae, doloremque. Cillum vulputate, rutrum, primis commodi condimentum? Elementum, libero, veniam, eveniet ea voluptas porttitor placeat? Luctus primis dolores, ullamcorper a integer eveniet. Pharetra sollicitudin, cillum, proin facilis massa excepturi voluptatem rerum atque, recusandae mi excepturi arcu auctor accusamus? Facilisi dignissimos senectus hymenaeos. Esse quo augue optio sit error repudiandae metus felis, facilisi voluptatem imperdiet platea et fuga quas hic voluptatem justo laboris ultricies cupidatat saepe rutrum, elementum augue ullam parturient, nemo placerat quod quidem, erat auctor quas convallis. Aspernatur eos sequi? Platea ratione primis. Iure nec luctus neque eaque optio? Esse facere deserunt, impedit.</span></font>', 'post', '', 'published', 'sample-post', '/?p=44', 0, 0, 0, '2013-02-25 17:12:22', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

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
