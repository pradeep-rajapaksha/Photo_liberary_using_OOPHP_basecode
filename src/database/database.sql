-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Dumping data for table lab_oop_photogallery2.tbl_comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_comments` DISABLE KEYS */;
INSERT INTO `tbl_comments` (`id`, `photograph_id`, `author`, `body`, `created`, `modified`) VALUES
	(1, 5, 'gfhfgh', 'hhh', '2015-08-30 11:05:59', '2015-08-30 11:05:59'),
	(2, 5, 'silva', 'good one', '2015-08-30 11:09:22', '2015-08-30 11:09:22'),
	(3, 5, 'silva', 'good one', '2015-08-30 11:09:53', '2015-08-30 11:09:53'),
	(4, 5, 'ruwan', 'google', '2015-08-30 11:21:28', '2015-08-30 11:21:28'),
	(5, 5, 'iii', 'iii', '2015-08-30 11:31:21', '2015-08-30 11:31:21'),
	(6, 5, 'hilda', 'yahoo', '2015-08-30 11:32:41', '2015-08-30 11:32:41');
/*!40000 ALTER TABLE `tbl_comments` ENABLE KEYS */;

-- Dumping data for table lab_oop_photogallery2.tbl_photographs: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_photographs` DISABLE KEYS */;
INSERT INTO `tbl_photographs` (`id`, `upload_image`, `type`, `size`, `caption`, `created`, `modified`) VALUES
	(1, '1378244_217756258400396_1023568497_n.png', 'image/png', 9399, 'sample', '2015-08-30 08:22:47', '2015-08-30 08:22:47'),
	(5, '581932_10152092460962334_948827063_n.jpg', 'image/jpeg', 56075, 'sample ddd', '2015-08-30 10:10:43', '2015-08-30 10:10:43'),
	(6, '1383382_662396440463603_1515168658_n.jpg', 'image/jpeg', 77309, 'mad', '2015-08-31 12:50:13', '2015-08-31 12:50:13');
/*!40000 ALTER TABLE `tbl_photographs` ENABLE KEYS */;

-- Dumping data for table lab_oop_photogallery2.tbl_users: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`, `username`, `password`, `firstname`, `lastname`, `created`, `modified`) VALUES
	(1, 'sanda', 'sanda200', 'Nadeeshae', 'Skoglund', NULL, NULL),
	(2, 'sample username 4', 'sample password 3', 'firstname 3 ', 'persons lastname 5', '0000-00-00 00:00:00', '2014-08-24 03:33:51'),
	(3, 'sample username 5', 'sample password 3', 'firstname 3 ', 'persons lastname 5', '0000-00-00 00:00:00', '2014-08-24 04:19:44'),
	(15, 'sample username', 'sample password', 'firstname ', 'persons lastname', '2014-08-24 04:48:52', '2014-08-24 04:48:52'),
	(16, 'samplez', 'samplez', 'hisdf', 'dfsdf', NULL, NULL),
	(17, 'samplez', 'samplez', 'hisdf', 'dfsdf', NULL, NULL),
	(18, 'samplez', 'samplez', 'hisdf', 'dfsdf', NULL, NULL),
	(19, 'bandara', 'bandara', 'bandara', 'bandara', NULL, NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
