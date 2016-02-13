-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.8 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for fha2016
CREATE DATABASE IF NOT EXISTS `fha2016` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fha2016`;


-- Dumping structure for table fha2016.actcode
CREATE TABLE IF NOT EXISTS `actcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `priority` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table fha2016.actcode: ~63 rows (approximately)
/*!40000 ALTER TABLE `actcode` DISABLE KEYS */;
INSERT INTO `actcode` (`id`, `event`, `code`, `name`, `priority`) VALUES
	(1, 5, 'C05', 'Food & Beverage / Hospitality Trade Assn', '<ol><li>Secretary General / Executive Director</li></ol>'),
	(2, 5, 'C09', 'Wine & Spirits Trade Assn', '<ol><li>Secretary General / Executive Director</li></ol>'),
	(3, 5, 'H03', 'Consultancy (F&B / Hospitality)', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(4, 5, 'H04', 'F&B Distributor / Importer', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(5, 5, 'H06', 'Distributor / Wholesaler / Importer (Wine & Spirits)', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(6, 5, 'H14', 'Wine Trading', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(7, 5, 'H15', 'Vineyard / Wine Producer', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(8, 5, 'J01', 'Convenience Store / Grocery Store', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(9, 5, 'J05', 'Specialty Food Retailer', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(10, 5, 'J06', 'Supermarket / Hypermarket', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(11, 5, 'J07', 'Wine & Spirits Retailer', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(12, 5, 'P05', 'Event Services', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(13, 5, 'P08', 'Logistics / Transportation (Land only)', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(14, 5, 'P10', 'Logistics / Transportation (Air only)', '<ol><li>Director/Head of Purchasing for Wine</li><li>Director/Head of Beverage, Director/Head of Wine</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(15, 5, 'H08', 'Hotel / Resort', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(16, 5, 'H09', 'Hotel Chain Owner', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(17, 5, 'H10', 'Institutional Catering / Convention Centre', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(18, 5, 'H11', 'Restaurant / Bistro', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(19, 5, 'H12', 'Serviced Apartment / Country Club', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(20, 5, 'H16', 'Bar / Pub / Nightspot Operator', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(21, 5, 'H17', 'Café', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(22, 5, 'P15', 'Places of Interest (eg. Zoo / Museum)', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(23, 5, 'P02', 'Airline / Cruise Liner / Rail (Operator)', '<ol><li>Director/Head of Beverage, Director/Head of Wine, Sommelier</li><li>Director/Head of Purchasing</li><li>Managing Director, General Manager, CEO</li></ol>'),
	(24, 4, 'C05', 'F&B / Hospitality Assn', '<ol><li>Secretary General/Executive Director</li></ol>'),
	(25, 4, 'H01', 'Bakery', '<ol><li>Owner</li><li>Baker / Pastry Chef</li></ol>'),
	(26, 4, 'H02', 'Casino', '<ol><li>Director of F&B / F&B Manager</li><li>Executive Chef</li><li>Purchasing Manager</li></ol>'),
	(27, 4, 'P15', 'Places of Interest', '<ol><li>Director of F&B / F&B Manager</li><li>Executive Chef</li><li>Purchasing Manager</li></ol>'),
	(28, 4, 'H12', 'Serviced Apartment / Country Club', '<ol><li>General Manager</li></ol>'),
	(29, 4, 'H03', 'Consultancy', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Consultant</li></ol>'),
	(30, 4, 'H04', 'F&B Distributor / Importer', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Consultant</li></ol>'),
	(31, 4, 'H05', 'Hospitality Equipment Distributor / Importer', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Consultant</li></ol>'),
	(32, 4, 'H07', 'Hospitality Procurement Services', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Consultant</li></ol>'),
	(33, 4, 'H13', 'Spa & Wellness / Fitness Centre', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Consultant</li></ol>'),
	(34, 4, 'H08', 'Hotel / Resort', '<ol><li>General Manager</li><li>Director of F&B / F&B Manager</li><li>Executive Chef</li><li>Purchasing Director / Manager</li><li>Chief Operating Officer / Operations Manager</li></ol>'),
	(35, 4, 'H09', 'Hotel Chain Owner', '<ol><li>Owner / CEO / General Manager / Managing Director</li></ol>'),
	(36, 4, 'H10', 'Institutional Catering / Convention Centre', '<ol><li>Owner / General Manager</li><li>Executive Chef</li><li>Purchasing Director / Manager</li><li>Chief Operating Officer / Operations Manager</li></ol>'),
	(37, 4, 'H11', 'Restaurant / Bistro', '<ol><li>Owner</li><li>Executive Chef / F&B Manager / Restaurant Manager</li></ol>'),
	(38, 4, 'H17', 'Cafe', '<ol><li>Owner</li><li>Executive Chef / F&B Manager / Restaurant Manager</li></ol>'),
	(39, 4, 'J01', 'Convenience Store / Grocery', '<ol><li>Category / Product Manager, Merchandiser</li><li>Purchasing Manager</li></ol>'),
	(40, 4, 'J05', 'Specialty Food Retailer', '<ol><li>Category / Product Manager, Merchandiser</li><li>Purchasing Manager</li></ol>'),
	(41, 4, 'J06', 'Supermarket / Hypermarket', '<ol><li>Category / Product Manager, Merchandiser</li><li>Purchasing Manager</li></ol>'),
	(42, 4, 'P02', 'Airline / Cruise Liner / Rail', '<ol><li>Purchasing Manager </li><li>Chief Operating Officer / Operations Manager</li></ol>'),
	(43, 4, 'P12', 'Religious Organisations', '<ol><li>Purchasing Manager</li></ol>'),
	(44, 6, 'C05', 'F&B / Hospitality Assn', '<ol><li>Secretary General/Executive Director</li></ol>'),
	(45, 6, 'H01', 'Bakery', '<ol><li>Owner</li><li>Baker / Pastry Chef</li></ol>'),
	(46, 6, 'H02', 'Casino', '<ol><li>Director of F&B / F&B Manager</li><li>Executive Chef</li><li>Purchasing Manager</li></ol>'),
	(47, 6, 'P15', 'Places of Interest', '<ol><li>Director of F&B / F&B Manager</li><li>Executive Chef</li><li>Purchasing Manager</li></ol>'),
	(48, 6, 'H12', 'Serviced Apartment / Country Club', '<ol><li>General Manager</li></ol>'),
	(49, 6, 'H03', 'Consultancy', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Consultant</li></ol>'),
	(50, 6, 'H04', 'F&B Distributor / Importer', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Purchasing Manager</li></ol>'),
	(51, 6, 'H05', 'Hospitality Equipment Distributor / Importer', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Purchasing Manager</li></ol>'),
	(52, 6, 'H07', 'Hospitality Procurement Services', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Purchasing Manager</li></ol>'),
	(53, 6, 'H13', 'Spa & Wellness / Fitness Centre', '<ol><li>Owner / CEO / General Manager / Managing Director</li><li>Purchasing Manager</li></ol>'),
	(54, 6, 'H08', 'Hotel / Resort', '<ol><li>General Manager</li><li>Director of F&B / F&B Manager</li><li>Executive Chef</li><li>Purchasing Director / Manager</li><li>Chief Operating Officer / Operations Manager</li></ol>'),
	(55, 6, 'H09', 'Hotel Chain Owner', '<ol><li>Owner / CEO / General Manager / Managing Director</li></ol>'),
	(56, 6, 'H10', 'Institutional Catering / Convention Centre', '<ol><li>Owner / General Manager</li><li>Executive Chef</li><li>Purchasing Director / Manager</li><li>Chief Operating Officer / Operations Manager</li></ol>'),
	(57, 6, 'H11', 'Restaurant / Bistro', '<ol><li>Owner</li><li>Executive Chef / F&B Manager / Restaurant Manager</li></ol>'),
	(58, 6, 'H17', 'Cafe', '<ol><li>Owner</li><li>Executive Chef / F&B Manager / Restaurant Manager</li></ol>'),
	(59, 6, 'J01', 'Convenience Store / Grocery', '<ol><li>Category / Product Manager, Merchandiser</li><li>Purchasing Manager</li></ol>'),
	(60, 6, 'J05', 'Specialty Food Retailer', '<ol><li>Category / Product Manager, Merchandiser</li><li>Purchasing Manager</li></ol>'),
	(61, 6, 'J06', 'Supermarket / Hypermarket', '<ol><li>Category / Product Manager, Merchandiser</li><li>Purchasing Manager</li></ol>'),
	(62, 6, 'P02', 'Airline / Cruise Liner / Rail', '<ol><li>Purchasing Manager </li><li>Chief Operating Officer / Operations Manager</li></ol>'),
	(63, 6, 'P12', 'Religious Organisations', '<ol><li>Purchasing Manager</li></ol>');
/*!40000 ALTER TABLE `actcode` ENABLE KEYS */;


-- Dumping structure for table fha2016.call_history
CREATE TABLE IF NOT EXISTS `call_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table fha2016.call_history: ~6 rows (approximately)
/*!40000 ALTER TABLE `call_history` DISABLE KEYS */;
INSERT INTO `call_history` (`id`, `candidate`, `date`, `status`) VALUES
	(1, 1, '0000-00-00 00:00:00', 'Answer'),
	(2, 1, '0000-00-00 00:00:00', 'No Answer'),
	(29, 2, '2016-02-04 11:24:41', 'Answer'),
	(30, 6, '2016-02-04 13:20:49', 'Answer'),
	(31, 6, '2016-02-04 13:21:24', 'No Answer'),
	(32, 6, '2016-02-04 13:21:25', 'Answer');
/*!40000 ALTER TABLE `call_history` ENABLE KEYS */;


-- Dumping structure for table fha2016.candidate
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_new` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_new` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `tlp_new` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `mobile_new` varchar(50) NOT NULL,
  `mobile_sms` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `actcode` varchar(10) NOT NULL,
  `event` int(11) NOT NULL,
  `dist_date` date NOT NULL,
  `telemarketer` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `audit` tinyint(4) NOT NULL,
  `note` varchar(100) NOT NULL,
  `new_contact` tinyint(4) NOT NULL,
  `called` tinyint(4) NOT NULL,
  `fminute` tinyint(4) NOT NULL,
  `push` tinyint(4) NOT NULL,
  `eknow` tinyint(4) NOT NULL,
  `sendemail` tinyint(4) NOT NULL,
  `sendsms` tinyint(4) NOT NULL,
  `register` tinyint(4) NOT NULL,
  `attend` tinyint(4) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table fha2016.candidate: ~8 rows (approximately)
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` (`id`, `sn`, `name`, `name_new`, `title`, `title_new`, `dept`, `company`, `tlp`, `tlp_new`, `mobile`, `mobile_new`, `mobile_sms`, `email`, `actcode`, `event`, `dist_date`, `telemarketer`, `status`, `audit`, `note`, `new_contact`, `called`, `fminute`, `push`, `eknow`, `sendemail`, `sendsms`, `register`, `attend`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '111', 'ARIEL NOAH', '', 'MUSISI', '', '', 'NOAH BAND', '081234567890', '', '', '', '', '', 'H01', 4, '0000-00-00', 0, 11, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, '2016-02-02 20:24:25', 0, '0000-00-00 00:00:00'),
	(2, '222', 'JULIA PERES', '', 'ARTIS', '', '', 'DANGDUT INC', '089876543210', '', '', '', '', '', 'H06', 4, '0000-00-00', 0, 12, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, '2016-02-02 20:24:25', 0, '0000-00-00 00:00:00'),
	(3, '111', 'ARIEL NOAH', '', 'MUSISI', '', '', 'NOAH BAND', '081234567890', '', '', '', '', '', 'H06', 5, '2016-02-13', 14, 21, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, '2016-02-02 20:25:15', 0, '0000-00-00 00:00:00'),
	(4, '222', 'JULIA PERES', '', 'ARTIS', '', '', 'DANGDUT INC', '089876543210', '', '', '', '', '', 'H06', 5, '2016-02-13', 14, 14, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, '2016-02-02 20:25:15', 0, '0000-00-00 00:00:00'),
	(5, '111', 'Ariel Noah', '', 'Musisi', '', '', 'Noah Band', '081234567890', '', '', '', '', '', 'H06', 6, '0000-00-00', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, '2016-02-02 21:46:51', 0, '0000-00-00 00:00:00'),
	(6, '222', 'Julia Peres', '', 'Artis', '', '', 'Dangdut Inc', '089876543210', '', '083817321885', '', '', '', 'H06', 6, '0000-00-00', 0, 11, 0, '', 0, 1, 1, 2, 1, 0, 1, 1, 0, 12, '2016-02-02 21:46:51', 0, '0000-00-00 00:00:00'),
	(7, '111', 'Ariel Noah', '', 'Musisi', '', 'Noah', 'Noah Band', '021-234567', '', '', '', '123123123213', '', 'H06', 5, '0000-00-00', 0, 0, 0, '', 0, 1, 1, 0, 1, 0, 1, 1, 0, 12, '2016-02-13 10:36:28', 0, '0000-00-00 00:00:00'),
	(8, '222', 'Julia Peres', 'adam', 'Artis', 'it', 'Dangdut', 'Dangdut Inc', '021-343223', '123123', '', '3232123', '', 'adam@adirect.web.id', 'H06', 5, '0000-00-00', 0, 11, 0, '', 1, 1, 1, 0, 1, 1, 0, 2, 2, 12, '2016-02-13 10:36:28', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


-- Dumping structure for table fha2016.candidate_status
CREATE TABLE IF NOT EXISTS `candidate_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.candidate_status: ~9 rows (approximately)
/*!40000 ALTER TABLE `candidate_status` DISABLE KEYS */;
INSERT INTO `candidate_status` (`id`, `name`, `parent`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Not Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 'Connect to Candidate', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(12, 'Connect to Receptionist', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(13, 'Disconnected', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(14, 'Wrong Number', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(21, 'No Answer', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(22, 'Busy', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(23, 'Tulalit', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `candidate_status` ENABLE KEYS */;


-- Dumping structure for table fha2016.event
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.event: ~3 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(4, 'Food & Hotel Asia 2016', 12, '2016-02-02 19:39:48', 0, '0000-00-00 00:00:00'),
	(5, 'Pro Wine Asia 2016', 12, '2016-02-02 19:40:37', 0, '0000-00-00 00:00:00'),
	(6, 'FHA2016 and ProWine ASIA 2016', 12, '2016-02-02 19:55:40', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;


-- Dumping structure for table fha2016.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `date_login` datetime NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.user: ~7 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(12, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '127.0.0.1', '2016-02-13 10:21:06', 'Windows 7(Google Chrome 48.0.2564.97)', 1, 0, '0000-00-00 00:00:00', 12, '2016-02-01 23:44:22'),
	(13, 'Teguh Santoso', 'teguh', 'e2f9f842fd8e1ae90dc428d39cab7167', 1, '127.0.0.1', '2016-02-01 17:11:28', 'Windows 7(Google Chrome 48.0.2564.97)', 1, 1, '2016-02-01 17:07:02', 0, '0000-00-00 00:00:00'),
	(14, 'Jaka', 'jack', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 'Bhakti', 'bray', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(16, 'Joko', 'jojo', '202cb962ac59075b964b07152d234b70', 2, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(17, 'Irfan Hamidal', 'irfan', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '2016-02-04 09:33:35', 0, '0000-00-00 00:00:00'),
	(18, 'M Suprapto', 'atoe', 'caf1a3dfb505ffed0d024130f58c5cfa', 3, '', '0000-00-00 00:00:00', '', 1, 0, '2016-02-04 09:35:32', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table fha2016.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.user_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Auditor', 0, '0000-00-00 00:00:00', 12, '2016-02-02 22:08:19'),
	(3, 'Telemarketer', 0, '2016-01-03 03:06:57', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for table fha2016.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Active', 0, '2015-10-31 14:00:03', 0, '2015-11-28 02:32:32'),
	(2, 'Not Active', 0, '2015-10-31 14:00:03', 12, '2016-02-01 23:22:27');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
