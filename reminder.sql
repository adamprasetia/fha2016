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

-- Dumping structure for table fha2016.reminder_call_history
CREATE TABLE IF NOT EXISTS `reminder_call_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.reminder_call_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `reminder_call_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminder_call_history` ENABLE KEYS */;


-- Dumping structure for table fha2016.reminder_candidate
CREATE TABLE IF NOT EXISTS `reminder_candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `tlp_new` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `event` int(11) NOT NULL,
  `dist_date` date NOT NULL,
  `telemarketer` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `audit` tinyint(4) NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `note` varchar(100) NOT NULL,
  `new_contact` tinyint(4) NOT NULL,
  `called` tinyint(4) NOT NULL,
  `fminute` tinyint(4) NOT NULL,
  `push` tinyint(4) NOT NULL,
  `attend` tinyint(4) NOT NULL,
  `email` tinyint(4) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.reminder_candidate: ~4 rows (approximately)
/*!40000 ALTER TABLE `reminder_candidate` DISABLE KEYS */;
INSERT INTO `reminder_candidate` (`id`, `sn`, `name`, `title`, `dept`, `company`, `tlp`, `tlp_new`, `mobile`, `event`, `dist_date`, `telemarketer`, `status`, `audit`, `valid`, `note`, `new_contact`, `called`, `fminute`, `push`, `attend`, `email`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '111', 'Ariel Noah', 'Musisi', 'Noah', 'Noah Band', '021-234567', '', '081234567890', 4, '0000-00-00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 12, '2016-04-07 07:58:49', 0, '0000-00-00 00:00:00'),
	(2, '222', 'Julia Peres', 'Artis', 'Dangdut', 'Dangdut Inc', '021-343223', '', '089876543210', 4, '0000-00-00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 12, '2016-04-07 07:58:49', 0, '0000-00-00 00:00:00'),
	(3, '111', 'Ariel Noah', 'Musisi', 'Noah', 'Noah Band', '021-234567', '', '081234567890', 5, '0000-00-00', 0, 0, 0, 0, '', 0, 1, 1, 0, 1, 1, 12, '2016-04-07 07:58:54', 0, '0000-00-00 00:00:00'),
	(4, '222', 'Julia Peres', 'Artis', 'Dangdut', 'Dangdut Inc', '021-343223', '', '089876543210', 5, '0000-00-00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 12, '2016-04-07 07:58:54', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `reminder_candidate` ENABLE KEYS */;


-- Dumping structure for table fha2016.reminder_candidate_status
CREATE TABLE IF NOT EXISTS `reminder_candidate_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fha2016.reminder_candidate_status: ~11 rows (approximately)
/*!40000 ALTER TABLE `reminder_candidate_status` DISABLE KEYS */;
INSERT INTO `reminder_candidate_status` (`id`, `name`, `parent`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Not Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 'Attend', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(12, 'Consider Attend', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(13, 'Not Attend', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(14, 'Wrong Number', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 'Call Back', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(21, 'No Answer', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(22, 'Busy', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(23, 'Reject', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(24, 'Foreign Number', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `reminder_candidate_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
