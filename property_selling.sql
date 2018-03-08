-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2018 at 12:47 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `title`, `description`, `facebook_url`, `twitter_url`, `linked_in_url`, `google_plus_url`, `vimeo-square_url`, `youtube_url`, `website`, `email`, `address`, `profile`, `password`, `mobile_no`, `created_on`, `is_delete`) VALUES
(1, 'real estate agency', 'Donec faucibus metus sed eros euismod, eu viverra augue viverra. Sed auctor vel ligula nec molestie. Aenean a gravida metus, non sagittis nisl. Nunc quis sem sit amet leo tincidunt laoreet. Praesent a tempor nisl, id suscipit elit. Cras dolor turpis, posuere ut mollis id, rutrum eget augue. Aenean ut ligula quis neque ullamcorper tristique ut a ante. Vivamus enim erat, sollicitudin non facilisis accumsan, dictum nec libero. ', 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'www.real.com', 'real@gmail.com', '', 'xyz', '123456', 1234567890, '2018-03-08 04:08:47', 0),
(2, 'krishna agency', 'Donec faucibus metus sed eros euismod, eu viverra augue viverra. Sed auctor vel ligula nec molestie. Aenean a gravida metus, non sagittis nisl. Nunc quis sem sit amet leo tincidunt laoreet. Praesent a tempor nisl, id suscipit elit. Cras dolor turpis, posuere ut mollis id, rutrum eget augue. Aenean ut ligula quis neque ullamcorper tristique ut a ante. Vivamus enim erat, sollicitudin non facilisis accumsan, dictum nec libero. ', 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'www.krishna.com', 'krishna@gmail.com', '', 'xyz', '123456', 1234567890, '2018-03-08 04:10:39', 0),
(3, 'allison agency', 'Donec faucibus metus sed eros euismod, eu viverra augue viverra. Sed auctor vel ligula nec molestie. Aenean a gravida metus, non sagittis nisl. Nunc quis sem sit amet leo tincidunt laoreet. Praesent a tempor nisl, id suscipit elit. Cras dolor turpis, posuere ut mollis id, rutrum eget augue. Aenean ut ligula quis neque ullamcorper tristique ut a ante. Vivamus enim erat, sollicitudin non facilisis accumsan, dictum nec libero. ', 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'www.allison.com', 'allison@gmail.com', '', 'xyz', '123456', 1234567890, '2018-03-08 04:10:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agency_agents`
--

DROP TABLE IF EXISTS `agency_agents`;
CREATE TABLE IF NOT EXISTS `agency_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency_agents`
--

INSERT INTO `agency_agents` (`id`, `agency_id`, `agent_id`) VALUES
(1, 1, 1),
(2, 1, 2);

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
  `id_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
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
  `contact_no` varchar(255) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `first_name`, `last_name`, `profile`, `facebook_url`, `twitter_url`, `linked_in_url`, `google_plus_url`, `vimeo-square_url`, `you_tube_url`, `post`, `current_status`, `email`, `contact_no`, `skype_id`, `is_delete`, `created_on`) VALUES
(1, 'John', 'Doe ', 'xyz', 'www.facebook.com', 'www.twitter.com', 'wwww.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'senior Agent', 'retire', 'john@gmail.com', '9876543210', 'john@hotmail.com', 0, '2018-03-08 04:00:46'),
(2, 'harry', 'roy ', 'xyz', 'www.facebook.com', 'www.twitter.com', 'wwww.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'junior Agent', 'elite', 'harry@gmail.com', '1234567890', 'harry@hotmail.com', 0, '2018-03-08 04:05:36'),
(3, 'mellisa', 'anderson ', 'xyz', 'www.facebook.com', 'www.twitter.com', 'wwww.linkedin.com', 'www.google_plus.com', 'www.vimeo_square.com', 'www.you_tube.com', 'senior Agent', 'retire', 'mellisa@gmail.com', '9999999999', 'mellisa@hotmail.com', 0, '2018-03-08 04:05:36');

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
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role`) VALUES
(1, 'user@gmail.com', 123456, 0),
(2, 'agency@gmail.com', 123456, 1),
(3, 'agent@gmail.com', 123456, 2),
(4, 'riddhi@gmail.com', 123456, 0),
(5, 'harry@gmail.com', 1234, 0),
(6, 'rr@gmail.com', 1111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_agency`
--

DROP TABLE IF EXISTS `project_agency`;
CREATE TABLE IF NOT EXISTS `project_agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_agency`
--

INSERT INTO `project_agency` (`id`, `agency_id`, `pro_id`) VALUES
(1, 1, 1),
(2, 1, 2);

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
  `bath` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `garages` int(11) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `linked_in_url` varchar(255) NOT NULL,
  `vimeo-square_url` varchar(255) NOT NULL,
  `you_tube_url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pro_type_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pro_id` (`pro_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `thumbnail`, `description`, `prize`, `area`, `bath`, `beds`, `garages`, `facebook_url`, `twitter_url`, `linked_in_url`, `vimeo-square_url`, `you_tube_url`, `email`, `address`, `street`, `city`, `state`, `country`, `status`, `pro_type_id`, `created_on`, `is_delete`) VALUES
(1, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(2, 'st john pl', 'satellight street', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'rent', 1, '0000-00-00 00:00:00', 0),
(3, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(4, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(5, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(6, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(7, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'rent', 1, '0000-00-00 00:00:00', 0),
(8, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(9, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(10, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(11, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(12, 'st john pl', '', 'Vestibulum feugiat tempor mattis. Maecenas venenatis at erat sit amet viverra. Fusce sagittis pretium est vel iaculis. Proin vel tincidunt nisi. Sed non vehicula purus. In auctor sodales metus, ac fermentum odio sagittis quis. Curabitur volutpat, erat nec varius dapibus, felis libero malesuada mauris, at vestibulum enim erat non nibh. Donec ac nibh dapibus, sagittis libero a, sodales enim. Quisque a viverra mi.', ' 680 000', '125', 2, 2, 4, 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.vimeo.com', 'www.youtube.com', '', '', 'satellight Street', 'Brooklyn', 'New York,', 'US', 'Sale', 1, '0000-00-00 00:00:00', 0),
(13, 'xyz', 'nhjfygj', 'fvbgnf', '11', '111', 1, 1, 1, 'www.facebook.com', 'www.twitter.com', 'www.lnkedin.com', 'wwww.vimeo-aqure.com', 'www.you_tube.com', 'xyz@gmail.com', 'grdfeg', 'fv', 'fvbg', 'fvgb', 'dbfr', 'rent', 1, '2018-03-06 18:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_agent`
--

DROP TABLE IF EXISTS `property_agent`;
CREATE TABLE IF NOT EXISTS `property_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_agent`
--

INSERT INTO `property_agent` (`id`, `agent_id`, `pro_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

DROP TABLE IF EXISTS `property_amenities`;
CREATE TABLE IF NOT EXISTS `property_amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `amen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pro_id` (`pro_id`),
  KEY `amen_id` (`amen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_amenities`
--

INSERT INTO `property_amenities` (`id`, `pro_id`, `amen_id`) VALUES
(1, 1, 12),
(2, 1, 4),
(3, 1, 23),
(4, 1, 17),
(6, 1, 7),
(7, 1, 28),
(8, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `property_contact`
--

DROP TABLE IF EXISTS `property_contact`;
CREATE TABLE IF NOT EXISTS `property_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `message` text NOT NULL,
  `pro_id` int(11) NOT NULL,
  KEY `agent_id` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

DROP TABLE IF EXISTS `property_image`;
CREATE TABLE IF NOT EXISTS `property_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

DROP TABLE IF EXISTS `property_type`;
CREATE TABLE IF NOT EXISTS `property_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `name`, `is_delete`) VALUES
(1, 'apartment', 0),
(2, 'building area', 0),
(3, 'house', 0),
(4, 'villa', 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `is_delete`) VALUES
(1, 'fghj@fg.tfgh', 'fgbg', 'fgh', 'gfh', 0),
(2, 'riddhi@gmail.com', 'riddhi', 'dudhat', '123456', 0),
(3, 'riddhi@gmail.com', 'riddhi', 'dudhat', '123456', 0),
(4, 'harry@gmail.com', 'harry', 'dudhat', '1234', 0),
(5, 'rr@gmail.com', 'ds', 'd', '1111', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agency_agents`
--
ALTER TABLE `agency_agents`
  ADD CONSTRAINT `agency_agents_ibfk_2` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`),
  ADD CONSTRAINT `agency_agents_ibfk_3` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`);

--
-- Constraints for table `agency_contact`
--
ALTER TABLE `agency_contact`
  ADD CONSTRAINT `agency_contact_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`);

--
-- Constraints for table `project_agency`
--
ALTER TABLE `project_agency`
  ADD CONSTRAINT `project_agency_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`),
  ADD CONSTRAINT `project_agency_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `property_agent`
--
ALTER TABLE `property_agent`
  ADD CONSTRAINT `property_agent_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
