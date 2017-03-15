-- --------------------------------------------------------
-- Host:                         140.128.74.85
-- Server version:               5.6.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5114
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for vote
CREATE DATABASE IF NOT EXISTS `vote` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vote`;

-- Dumping structure for table vote.award
CREATE TABLE IF NOT EXISTS `award` (
  `AwardIndex` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(8) DEFAULT NULL,
  `AwardTitle` varchar(50) DEFAULT NULL,
  `PublishDatetime` datetime DEFAULT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AwardIndex`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='得獎名單\r\n';

-- Data exporting was unselected.
-- Dumping structure for table vote.counters
CREATE TABLE IF NOT EXISTS `counters` (
  `CounterIndex` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '計數器索引',
  `CounterName` varchar(50) NOT NULL COMMENT '計數器名稱',
  `Hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '目前次數',
  PRIMARY KEY (`CounterIndex`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table vote.item
CREATE TABLE IF NOT EXISTS `item` (
  `ItemIndex` int(11) NOT NULL AUTO_INCREMENT,
  `EventIndex` int(11) DEFAULT '1',
  `ItemName` varchar(50) DEFAULT NULL,
  `MemberIndex` varchar(50) DEFAULT NULL,
  `Username` varchar(8) DEFAULT NULL,
  `Enabled` bit(1) DEFAULT b'1',
  `CreateDateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ItemIndex`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table vote.login_address
CREATE TABLE IF NOT EXISTS `login_address` (
  `LoginAddrIndex` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '登入索引',
  `Level` varchar(10) DEFAULT NULL COMMENT '權限',
  `Username` varchar(10) NOT NULL COMMENT '身分證號',
  `LoginIP` varchar(15) NOT NULL COMMENT '登入IP',
  `LoginDateTime` datetime NOT NULL COMMENT '登入日期/時間',
  `LoginStatus` enum('Success','Failed','UniPass','SSO') NOT NULL DEFAULT 'Success' COMMENT '登入的狀態',
  `FailedPassword` varchar(32) DEFAULT NULL COMMENT '登入失敗的密碼',
  PRIMARY KEY (`LoginAddrIndex`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8 COMMENT='登入記錄';

-- Data exporting was unselected.
-- Dumping structure for table vote.member
CREATE TABLE IF NOT EXISTS `member` (
  `MemberIndex` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(8) DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `PersonName` varchar(10) DEFAULT NULL,
  `Level` varchar(3) NOT NULL DEFAULT 'mem',
  `Mobile` varchar(11) DEFAULT NULL COMMENT '手機',
  `Email` varchar(100) DEFAULT NULL COMMENT '電子信箱',
  `CreateDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MemberIndex`),
  UNIQUE KEY `Username` (`Username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29062 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table vote.vote
CREATE TABLE IF NOT EXISTS `vote` (
  `VoteIndex` int(11) NOT NULL AUTO_INCREMENT,
  `MemberIndex` int(11) DEFAULT NULL,
  `Username` varchar(8) DEFAULT NULL,
  `ItemIndex` int(11) DEFAULT NULL,
  `VoteDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`VoteIndex`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
