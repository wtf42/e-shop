-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.5.21 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных yii_db
CREATE DATABASE IF NOT EXISTS `yii_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii_db`;


-- Дамп структуры для таблица yii_db.yii_cards
CREATE TABLE IF NOT EXISTS `yii_cards` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `producerID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sizeX` int(11) NOT NULL,
  `sizeY` int(11) NOT NULL,
  `sizeZ` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_yii_cards_yii_producers` (`producerID`),
  CONSTRAINT `FK_yii_cards_yii_producers` FOREIGN KEY (`producerID`) REFERENCES `yii_producers` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_cards: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `yii_cards` DISABLE KEYS */;
INSERT INTO `yii_cards` (`ID`, `name`, `description`, `producerID`, `price`, `sizeX`, `sizeY`, `sizeZ`, `weight`) VALUES
	(1, 'открытка "поздравляю"', 'обычная себе открытка', 1, 100, 20, 30, 3, 10),
	(2, 'еще одна простая открытка', 'совсем неинтересная', 1, 42, 10, 10, 3, 5),
	(3, 'крутая-красивая открытка', 'красивая расписная, с украшениями и прочее', 2, 200, 20, 30, 3, 25);
/*!40000 ALTER TABLE `yii_cards` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_card_tags
CREATE TABLE IF NOT EXISTS `yii_card_tags` (
  `cardID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL,
  PRIMARY KEY (`cardID`,`tagID`),
  KEY `FK_yii_card_tags_yii_tags` (`tagID`),
  CONSTRAINT `FK_yii_card_tags_yii_cards` FOREIGN KEY (`cardID`) REFERENCES `yii_cards` (`ID`),
  CONSTRAINT `FK_yii_card_tags_yii_tags` FOREIGN KEY (`tagID`) REFERENCES `yii_tags` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_card_tags: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `yii_card_tags` DISABLE KEYS */;
INSERT INTO `yii_card_tags` (`cardID`, `tagID`) VALUES
	(3, 2),
	(1, 5),
	(3, 8);
/*!40000 ALTER TABLE `yii_card_tags` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_producers
CREATE TABLE IF NOT EXISTS `yii_producers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_producers: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `yii_producers` DISABLE KEYS */;
INSERT INTO `yii_producers` (`ID`, `name`) VALUES
	(1, 'Иванов Иван Иванович'),
	(2, '"ОАО" Супер-Открытко-Производитель');
/*!40000 ALTER TABLE `yii_producers` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_purchases
CREATE TABLE IF NOT EXISTS `yii_purchases` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userComment` varchar(500) NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentState` varchar(50) DEFAULT NULL,
  `deliveryState` varchar(50) DEFAULT NULL,
  `marker` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_yii_purchases_yii_users` (`userID`),
  CONSTRAINT `FK_yii_purchases_yii_users` FOREIGN KEY (`userID`) REFERENCES `yii_users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_purchases: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `yii_purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `yii_purchases` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_purchase_items
CREATE TABLE IF NOT EXISTS `yii_purchase_items` (
  `purchaseID` int(11) NOT NULL,
  `cardID` int(11) NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`purchaseID`,`cardID`),
  KEY `FK_yii_purchase_items_yii_cards` (`cardID`),
  CONSTRAINT `FK_yii_purchase_items_yii_purchases` FOREIGN KEY (`purchaseID`) REFERENCES `yii_purchases` (`ID`),
  CONSTRAINT `FK_yii_purchase_items_yii_cards` FOREIGN KEY (`cardID`) REFERENCES `yii_cards` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_purchase_items: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `yii_purchase_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `yii_purchase_items` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_subtags
CREATE TABLE IF NOT EXISTS `yii_subtags` (
  `tagID` int(11) NOT NULL,
  `parentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`tagID`),
  KEY `FK_yii_subtags_yii_tags_2` (`parentID`),
  CONSTRAINT `FK_yii_subtags_yii_tags` FOREIGN KEY (`tagID`) REFERENCES `yii_tags` (`ID`),
  CONSTRAINT `FK_yii_subtags_yii_tags_2` FOREIGN KEY (`parentID`) REFERENCES `yii_tags` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_subtags: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `yii_subtags` DISABLE KEYS */;
INSERT INTO `yii_subtags` (`tagID`, `parentID`) VALUES
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1);
/*!40000 ALTER TABLE `yii_subtags` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_tags
CREATE TABLE IF NOT EXISTS `yii_tags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_tags: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `yii_tags` DISABLE KEYS */;
INSERT INTO `yii_tags` (`ID`, `name`) VALUES
	(1, 'Для праздников'),
	(2, 'ручной работы'),
	(3, 'музыкальные открытки'),
	(4, '3d-открытки'),
	(5, 'новый год'),
	(6, '23 февраля'),
	(7, '8 марта'),
	(8, 'день рождения');
/*!40000 ALTER TABLE `yii_tags` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_users
CREATE TABLE IF NOT EXISTS `yii_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIO` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `yii_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `yii_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
