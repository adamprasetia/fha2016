-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.26 - MySQL Community Server (GPL)
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


-- Dumping structure for table fha2016.call_history
CREATE TABLE IF NOT EXISTS `call_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table fha2016.call_history: ~3 rows (approximately)
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
  `title` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `event` int(11) NOT NULL,
  `telemarketer` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `audit` tinyint(4) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table fha2016.candidate: ~6 rows (approximately)
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` (`id`, `sn`, `name`, `title`, `company`, `tlp`, `date`, `event`, `telemarketer`, `status`, `audit`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '111', 'ARIEL NOAH', 'MUSISI', 'NOAH BAND', '081234567890', '2016-02-02', 4, 0, 11, 0, 12, '2016-02-02 20:24:25', 0, '0000-00-00 00:00:00'),
	(2, '222', 'JULIA PERES', 'ARTIS', 'DANGDUT INC', '089876543210', '2016-02-02', 4, 0, 12, 1, 12, '2016-02-02 20:24:25', 0, '0000-00-00 00:00:00'),
	(3, '111', 'ARIEL NOAH', 'MUSISI', 'NOAH BAND', '081234567890', '2016-02-02', 5, 0, 21, 0, 12, '2016-02-02 20:25:15', 0, '0000-00-00 00:00:00'),
	(4, '222', 'JULIA PERES', 'ARTIS', 'DANGDUT INC', '089876543210', '2016-02-02', 5, 0, 14, 0, 12, '2016-02-02 20:25:15', 0, '0000-00-00 00:00:00'),
	(5, '111', 'Ariel Noah', 'Musisi', 'Noah Band', '081234567890', '2016-02-02', 6, 0, 0, 1, 12, '2016-02-02 21:46:51', 0, '0000-00-00 00:00:00'),
	(6, '222', 'Julia Peres', 'Artis', 'Dangdut Inc', '089876543210', '2016-02-02', 6, 0, 11, 0, 12, '2016-02-02 21:46:51', 0, '0000-00-00 00:00:00');
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

-- Dumping data for table fha2016.candidate_status: ~8 rows (approximately)
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
	(6, 'FHA & PWA 2016 Combined', 12, '2016-02-02 19:55:40', 0, '0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.user: ~7 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(12, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '::1', '2016-02-04 11:21:58', 'Windows 8.1(Google Chrome 48.0.2564.97)', 1, 0, '0000-00-00 00:00:00', 12, '2016-02-01 23:44:22'),
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
