-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.31 - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for shop
CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `shop`;

-- Dumping structure for table shop.ShirtOrder
CREATE TABLE IF NOT EXISTS `ShirtOrder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerId` int(11) unsigned NOT NULL DEFAULT '0',
  `fabricId` int(11) unsigned NOT NULL DEFAULT '0',
  `collarSize` int(11) unsigned NOT NULL DEFAULT '0',
  `chestSize` int(11) unsigned NOT NULL DEFAULT '0',
  `waistSize` int(11) unsigned NOT NULL DEFAULT '0',
  `wristSize` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `customerId` (`customerId`),
  KEY `fabricId` (`fabricId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.

-- Dumping structure for table shop.ShirtOrderRepository
CREATE TABLE IF NOT EXISTS `ShirtOrderRepository` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shoporderId` int(10) unsigned NOT NULL DEFAULT '0',
  `source` varchar(255) NOT NULL,
  `cdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
