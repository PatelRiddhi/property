-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2018 at 12:41 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property_selling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 0),
(2, 'root', 'root', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

DROP TABLE IF EXISTS `agencies`;
CREATE TABLE IF NOT EXISTS `agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `linked_in_url` varchar(255) NOT NULL,
  `google_plus_url` varchar(255) NOT NULL,
  `vimeo-square_url` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `title`, `description`, `facebook_url`, `twitter_url`, `linked_in_url`, `google_plus_url`, `vimeo-square_url`, `youtube_url`, `website`, `email`, `address`, `profile`, `password`, `mobile_no`, `created_on`, `is_delete`) VALUES
(2, 'krishna agency', 'Donec faucibus metus sed eros euismod, eu viverra augue viverra. Sed auctor vel ligula nec molestie. Aenean a gravida metus, non sagittis nisl. Nunc quis sem sit amet leo tincidunt laoreet. Praesent a tempor nisl, id suscipit elit. Cras dolor turpis, posuere ut mollis id, rutrum eget augue. Aenean ut ligula quis neque ullamcorper tristique ut a ante. Vivamus enim erat, sollicitudin non facilisis accumsan, dictum nec libero. ', 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'www.krishna.com', 'krishna@gmail.com', '', 'uploads/properties/1.jpg', '123456', 1234567890, '2018-03-08 04:10:39', 0),
(3, 'allison agency', 'Donec faucibus metus sed eros euismod, eu viverra augue viverra. Sed auctor vel ligula nec molestie. Aenean a gravida metus, non sagittis nisl. Nunc quis sem sit amet leo tincidunt laoreet. Praesent a tempor nisl, id suscipit elit. Cras dolor turpis, posuere ut mollis id, rutrum eget augue. Aenean ut ligula quis neque ullamcorper tristique ut a ante. Vivamus enim erat, sollicitudin non facilisis accumsan, dictum nec libero. ', 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'www.allison.com', 'allison@gmail.com', '', 'uploads/properties/1.jpg', '123456', 1234567890, '2018-03-08 04:10:39', 0),
(5, 'amit', '<p>nmdsjfbhjbnj</p>\r\n', 'lknk,lnn', 'mk,ln', 'lknkl', 'n', 'lklk', 'lk', 'www.amit.com', 'amit@yahoo.com', 'nk', 'uploads/properties/1.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '2018-03-13 07:41:51', 1),
(6, 'riddhi', '<p>fgvfrhbh</p>\r\n', '', '', '', '', '', '', 'riddhi.com', 'riddhi@gmail.com', 'abc', 'uploads/agencies/crew-56835_-_Copy_-_Copy.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1234567890, '2018-03-14 10:43:18', 0),
(7, 'riddhi', '<p>fgvfrhbh</p>\r\n', '', '', '', '', '', '', 'riddhi.com', 'rr@gmail.com', 'abc', 'uploads/agencies/crew-56835_-_Copy_-_Copy1.jpg', 'e10adc3949ba59abbe56e057f20f883e', 1234567890, '2018-03-14 10:43:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agency_agents`
--

DROP TABLE IF EXISTS `agency_agents`;
CREATE TABLE IF NOT EXISTS `agency_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  KEY `agency_agents_ibfk_2` (`agency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency_agents`
--

INSERT INTO `agency_agents` (`id`, `agency_id`, `agent_id`, `is_delete`) VALUES
(3, 2, 1, 1),
(5, 5, 1, 0),
(6, 5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `agency_contact`
--

DROP TABLE IF EXISTS `agency_contact`;
CREATE TABLE IF NOT EXISTS `agency_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency_contact`
--

INSERT INTO `agency_contact` (`id`, `agency_id`, `email`, `subject`, `message`, `is_delete`) VALUES
(1, 2, 'test', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `linked_in_url` varchar(255) NOT NULL,
  `google_plus_url` varchar(255) NOT NULL,
  `vimeo-square_url` varchar(255) NOT NULL,
  `you_tube_url` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `current_status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `first_name`, `last_name`, `profile`, `facebook_url`, `twitter_url`, `linked_in_url`, `google_plus_url`, `vimeo-square_url`, `you_tube_url`, `post`, `current_status`, `email`, `password`, `contact_no`, `skype_id`, `is_delete`, `created_on`) VALUES
(1, 'John', 'Doe ', 'xyz', 'www.facebook.com', 'www.twitter.com', 'wwww.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'senior Agent', 'retire', 'john@gmail.com', '', '9876543210', 'john@hotmail.com', 1, '2018-03-08 04:00:46'),
(2, 'harry', 'roy ', 'xyz', 'www.facebook.com', 'www.twitter.com', 'wwww.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'junior Agent', 'elite', 'harry@gmail.com', '', '1234567890', 'harry@hotmail.com', 1, '2018-03-08 04:05:36'),
(3, 'mellisa', 'anderson ', 'xyz', 'www.facebook.com', 'www.twitter.com', 'wwww.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'senior Agent', 'retire', 'mellisa@gmail.com', '', '9999999999', 'mellisa@hotmail.com', 0, '2018-03-08 04:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `aminities`
--

DROP TABLE IF EXISTS `aminities`;
CREATE TABLE IF NOT EXISTS `aminities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aminities`
--

INSERT INTO `aminities` (`id`, `name`, `is_delete`) VALUES
(1, ' Air conditioning', 0),
(2, 'Cable TV', 0),
(3, ' Computer', 0),
(4, 'DVD', 0),
(5, ' Grill', 0),
(6, ' Hi-fi', 0),
(7, ' Juicer', 0),
(8, ' Oven', 0),
(9, ' Radio', 0),
(10, 'Terrace', 0),
(11, '  Use of pool', 0),
(12, 'Balcony', 0),
(13, ' Cleaning after exit', 0),
(14, 'Cot', 0),
(15, ' Fan', 0),
(16, 'Hairdryer', 0),
(17, ' Internet', 0),
(18, 'Lift', 0),
(19, ' Parking', 0),
(20, ' Roof terrace', 0),
(21, ' Toaster', 0),
(22, 'Video', 0),
(23, ' Bedding', 0),
(24, ' Cofee pot', 0),
(25, ' Dishwasher', 0),
(26, 'Fridge', 0),
(27, ' Heating', 0),
(28, 'Iron', 0),
(29, ' Microwave', 0),
(30, 'Parquet', 0),
(31, '  Smoking allowed', 0),
(32, 'Towelwes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `is_delete`) VALUES
(1, 'Guindy', 1, 0),
(2, 'pallavaran', 1, 0),
(3, 'surat', 2, 0),
(4, 'ahemdabad', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `is_delete`) VALUES
(1, 'India', 0),
(2, 'Newzealand', 0),
(3, 'China', 0),
(4, 'US', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role`, `record_id`, `is_active`) VALUES
(1, 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0),
(2, 'agency@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 1),
(7, 'agent@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 0, 0),
(4, 'riddhi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0),
(13, 'rr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 7, 1),
(8, 'hetal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0),
(12, 'amit@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_agency`
--

DROP TABLE IF EXISTS `project_agency`;
CREATE TABLE IF NOT EXISTS `project_agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_agency`
--

INSERT INTO `project_agency` (`id`, `agency_id`, `pro_id`, `is_delete`) VALUES
(4, 2, 2, 0),
(7, 2, 3, 0),
(8, 5, 1, 0),
(9, 5, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prize` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `bath` int(11) NOT NULL DEFAULT '0',
  `beds` int(11) NOT NULL DEFAULT '0',
  `garages` int(11) NOT NULL DEFAULT '0',
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `linked_in_url` varchar(255) NOT NULL,
  `vimeo-square_url` varchar(255) NOT NULL,
  `you_tube_url` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pro_type_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pro_id` (`pro_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `thumbnail`, `description`, `prize`, `area`, `bath`, `beds`, `garages`, `facebook_url`, `twitter_url`, `linked_in_url`, `vimeo-square_url`, `you_tube_url`, `address`, `city`, `state`, `country`, `status`, `pro_type_id`, `created_on`, `is_delete`) VALUES
(1, 'st john pl', 'uploads/properties/1.jpg', '<p>Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.</p>\r\n', '123546', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', 'abc', '1', '1', '1', 'sale', 1, '0000-00-00 00:00:00', 1),
(2, 'st john pl', 'uploads/properties/1.jpg', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', 'Brooklyn', 'New York,', 'US', 'rent', 1, '0000-00-00 00:00:00', 1),
(3, 'st john pl', 'uploads/properties/1.jpg', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 1),
(4, 'st john pl', 'uploads/properties/1.jpg', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(6, 'st john pl', 'uploads/properties/1.jpg', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(7, 'st john pl', 'uploads/properties/1.jpg', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', 'Brooklyn', 'New York,', 'US', 'rent', 1, '0000-00-00 00:00:00', 1),
(8, 'st john pl', 'uploads/properties/1.jpg', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(9, 'st john pl', 'uploads/properties/1.jpg', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(34, 'Amit\'s House', 'uploads/properties/fabian-grohs-4484191.jpg', '<p>fvfhgtrhtyryuthgtuytr6hgrtytgfhtryr5ty</p>\r\n', '25000000', '500', 3, 4, 1, 'www.facebook.com/connect2amitu', 'www.twitter.com/connect2amitu', 'www.linkedin.com/connect2amitu', 'www.vimeo-squre.com/connect2amitu', 'www.youtube.com/connect2amitu', '101, parimal', '1', '1', '1', '-1', 1, '2018-03-13 06:47:36', 0),
(35, 'sangrilla', 'uploads/properties/crew-56835_-_Copy_-_Copy2.jpg', '<p>bfgyhftgbhtryhghgtuyhgtgjtgbn</p>\r\n', '1111', '111', 2, 2, 2, '', '', '', '', '', 'bghjytjhn', '1', '1', '1', 'sale', 1, '2018-03-13 12:09:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_agent`
--

DROP TABLE IF EXISTS `property_agent`;
CREATE TABLE IF NOT EXISTS `property_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_agent`
--

INSERT INTO `property_agent` (`id`, `agent_id`, `pro_id`, `is_delete`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 1),
(3, 2, 3, 1),
(4, 2, 4, 1),
(8, 2, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

DROP TABLE IF EXISTS `property_amenities`;
CREATE TABLE IF NOT EXISTS `property_amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `amen_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pro_id` (`pro_id`),
  KEY `amen_id` (`amen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_amenities`
--

INSERT INTO `property_amenities` (`id`, `pro_id`, `amen_id`, `is_delete`) VALUES
(8, 2, 6, 0),
(22, 1, 2, 1),
(23, 1, 15, 1),
(24, 1, 12, 0),
(25, 1, 5, 0),
(26, 34, 1, 1),
(27, 34, 5, 0),
(28, 34, 6, 0),
(29, 34, 7, 0),
(30, 34, 9, 0),
(31, 34, 12, 0),
(32, 34, 15, 0),
(33, 34, 17, 0),
(34, 34, 19, 0),
(35, 34, 20, 0),
(36, 34, 23, 0),
(37, 34, 25, 0),
(38, 34, 26, 0),
(39, 34, 28, 0),
(40, 34, 30, 0),
(41, 34, 32, 0),
(42, 35, 1, 1),
(43, 35, 5, 0),
(44, 35, 9, 0),
(45, 35, 13, 0),
(46, 35, 17, 0),
(47, 35, 21, 0),
(48, 35, 25, 0),
(49, 1, 17, 0),
(50, 1, 18, 0),
(51, 1, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_contact`
--

DROP TABLE IF EXISTS `property_contact`;
CREATE TABLE IF NOT EXISTS `property_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `message` text NOT NULL,
  `pro_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `agent_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_contact`
--

INSERT INTO `property_contact` (`id`, `email`, `date_from`, `date_to`, `message`, `pro_id`, `is_delete`) VALUES
(1, 'riddhi@gmail.com', '2018-03-06', '2018-03-08', 'test', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

DROP TABLE IF EXISTS `property_image`;
CREATE TABLE IF NOT EXISTS `property_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`id`, `pro_id`, `path`, `is_delete`) VALUES
(31, 1, 'uploads/properties/1.jpg', 0),
(32, 1, 'uploads/properties/1.jpg', 0),
(33, 2, 'uploads/properties/1.jpg', 0),
(34, 2, 'uploads/properties/1.jpg', 0),
(35, 34, 'uploads/properties/crew-56835_-_Copy_-_Copy.jpg', 0),
(36, 34, 'uploads/properties/fabian-grohs-448419.jpg', 0),
(37, 34, 'uploads/properties/glenn-carstens-peters-203007_-_Copy.jpg', 0),
(38, 34, 'uploads/properties/glenn-carstens-peters-203007.jpg', 0),
(39, 34, 'uploads/properties/test_zip2.jpg', 0),
(40, 34, 'uploads/properties/test_zip3.jpg', 0),
(41, 35, 'uploads/properties/crew-56835_-_Copy_-_Copy1.jpg', 0),
(42, 35, 'uploads/properties/crew-56835_-_Copy_(2).jpg', 0),
(43, 35, 'uploads/properties/crew-56835_-_Copy.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

DROP TABLE IF EXISTS `property_type`;
CREATE TABLE IF NOT EXISTS `property_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `name`, `is_delete`, `created_on`) VALUES
(1, 'apartment', 0, '2018-03-12 05:18:03'),
(2, 'building area', 0, '2018-03-12 05:18:03'),
(3, 'house', 0, '2018-03-12 05:18:03'),
(4, 'villa', 0, '2018-03-12 05:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `linked_in_url` varchar(255) NOT NULL,
  `flickr_url` varchar(255) NOT NULL,
  `pinterest_url` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `google_plus_url` varchar(255) NOT NULL,
  `vimeo-square_url` varchar(255) NOT NULL,
  `dribbble_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone_no`, `facebook_url`, `twitter_url`, `linked_in_url`, `flickr_url`, `pinterest_url`, `youtube_url`, `google_plus_url`, `vimeo-square_url`, `dribbble_url`) VALUES
(1, 'property@gmail.com', 123456789, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'tps://www.flickr.com/', 'https://www.pinterest.com/', 'https://www.youtube.com/', 'https://plus.google.com', 'https://vimeo.com', 'http://dribble.com/');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `is_delete`) VALUES
(1, 'chennai', 1, 0),
(2, 'gujarat', 1, 0),
(3, 'dunedin', 2, 0),
(4, 'auckland', 2, 0),
(5, 'newjersy', 4, 0),
(6, 'Newyork', 4, 0),
(7, 'Zhejiang', 3, 0),
(8, 'Jiangsu', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `is_delete`) VALUES
(2, 'riddhi@gmail.com', 'riddhi', 'dudhat', '123456', 0),
(4, 'harry@gmail.com', 'harry', 'dudhat', '1234', 0),
(6, 'hetal@gmail.com', 'hetal', 'dobariya', '123456', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agency_agents`
--
ALTER TABLE `agency_agents`
  ADD CONSTRAINT `agency_agents_ibfk_2` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agency_agents_ibfk_3` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agency_contact`
--
ALTER TABLE `agency_contact`
  ADD CONSTRAINT `agency_contact_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `project_agency`
--
ALTER TABLE `project_agency`
  ADD CONSTRAINT `project_agency_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_agency_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `property_agent`
--
ALTER TABLE `property_agent`
  ADD CONSTRAINT `property_agent_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `property_agent_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD CONSTRAINT `property_amenities_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `property_amenities_ibfk_3` FOREIGN KEY (`amen_id`) REFERENCES `aminities` (`id`);

--
-- Constraints for table `property_contact`
--
ALTER TABLE `property_contact`
  ADD CONSTRAINT `property_contact_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `property_image`
--
ALTER TABLE `property_image`
  ADD CONSTRAINT `property_image_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
