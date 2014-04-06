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
  `description` varchar(2000) NOT NULL,
  `producerID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sizeX` int(11) NOT NULL,
  `sizeY` int(11) NOT NULL,
  `sizeZ` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_yii_cards_yii_producers` (`producerID`),
  CONSTRAINT `FK_yii_cards_yii_producers` FOREIGN KEY (`producerID`) REFERENCES `yii_producers` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_cards: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `yii_cards` DISABLE KEYS */;
INSERT INTO `yii_cards` (`ID`, `name`, `description`, `producerID`, `price`, `sizeX`, `sizeY`, `sizeZ`, `weight`) VALUES
	(2, 'еще одна простая открытка', 'совсем неинтересная', 1, 42, 10, 10, 3, 5),
	(3, 'крутая-красивая открытка', 'красивая расписная, с украшениями и прочее', 2, 200, 20, 30, 3, 25),
	(5, '3D открытка "Елочка"', 'Оригинальная новогодняя открытка, выполненная из картона, одним движением руки из плоского состояния превращается в объемную елочку в "стеклянном шаре".\r\nК открытке прилагается конверт.', 4, 100, 10, 7, 7, 15),
	(6, 'Бумажный пакет-открытка "Снеговик"', 'Бумажный подарочный пакет-открытка "Снеговик" станет незаменимым дополнением к выбранному подарку. Глиттерное покрытие делает изображение ярким и насыщенным. Для удобной переноски на пакете имеются две ручки из атласного материала голубого цвета. \r\nПодарок, преподнесенный в оригинальной упаковке, всегда будет самым эффектным и запоминающимся. Окружите близких людей вниманием и заботой, вручив презент в нарядном, праздничном оформлении.', 5, 61, 19, 16, 6, 35),
	(7, 'Я желаю тебе счастья!', 'Жизнь измеряется не количеством сделанных вдохов и выдохов, а количеством тех моментов, когда от счастья захватывает дух... \r\nВиктория Кирдий - замечательная, солнечная и светлая художница, которая создает улыбчивые, теплые и удивительно радостные картины, рисует мультики для студии "Пилот" и вдохновляет окружающих на творчество.', 3, 210, 175, 125, 30, 104),
	(8, 'Открытка сувенирная "Снеговик в красной шляпе и шарфе" на магните', 'Миниатюрная сувенирная открытка "Снеговик в красной шляпе и шарфе" с магнитом в виде снеговика, станет идеальным дополнением к подарку! \r\nОткрытка имеет поле для поздравлений, а благодаря магниту ее можно прикрепить в удобном месте, где она будет радовать глаз и дарить положительные эмоции!', 6, 39, 8, 14, 5, 11),
	(9, 'Мини-открытка "С Новым Годом!"', 'Мини-открытка "С Новым Годом!" выполнена из плотного картона и оформлена изображением Деда Мороза на коне. На обороте открытки - новогоднее поздравление: "С Новым годом! С новым счастьем!".\r\nТакая открытка станет отличным дополнением к подарку, а поздравительные слова порадуют получателя.', 5, 39, 5, 8, 1, 10),
	(10, 'Тихвинский Богородицкий монастырь на старых открытках ', 'На предлагаемых вашему вниманию коллекционных открытках вы можете увидеть, как выглядел Тихвинский Богородицкий монастырь в начале XX века, рассмотреть утраченные гостиницу монастыря и Никольскую надвратную церковь. Обратите внимание на церковь Тихвинской иконы Божией Матери "На Крылечке", на уникальный, ушедший в историю мост и шлюз Тихвинской Водной системы. За ними - утраченные восточная и северная стены обители. Вы можете заметить, что колокольня выглядела в те годы совершенно иначе. \r\nЭти старые открытки возвращают нас во время расцвета Тихвинского монастыря. Сохранившиеся до наших дней главные ворота обители и воссозданные Святые ворота с надвратной церковью Вознесения Господня и сегодня встречают многочисленных паломников, посещающих монастырь с молитвой.', 1, 213, 100, 150, 5, 70);
/*!40000 ALTER TABLE `yii_cards` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_card_pix
CREATE TABLE IF NOT EXISTS `yii_card_pix` (
  `cardID` int(11) NOT NULL,
  `pixID` int(11) NOT NULL,
  PRIMARY KEY (`cardID`,`pixID`),
  KEY `FK__yii_pix` (`pixID`),
  CONSTRAINT `FK__yii_cards` FOREIGN KEY (`cardID`) REFERENCES `yii_cards` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `FK__yii_pix` FOREIGN KEY (`pixID`) REFERENCES `yii_pix` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_card_pix: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `yii_card_pix` DISABLE KEYS */;
INSERT INTO `yii_card_pix` (`cardID`, `pixID`) VALUES
	(5, 6),
	(6, 7),
	(7, 8),
	(8, 9),
	(9, 10),
	(10, 11);
/*!40000 ALTER TABLE `yii_card_pix` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_card_tags
CREATE TABLE IF NOT EXISTS `yii_card_tags` (
  `cardID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL,
  PRIMARY KEY (`cardID`,`tagID`),
  KEY `FK_yii_card_tags_yii_tags` (`tagID`),
  CONSTRAINT `FK_yii_card_tags_yii_cards` FOREIGN KEY (`cardID`) REFERENCES `yii_cards` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `FK_yii_card_tags_yii_tags` FOREIGN KEY (`tagID`) REFERENCES `yii_tags` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_card_tags: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `yii_card_tags` DISABLE KEYS */;
INSERT INTO `yii_card_tags` (`cardID`, `tagID`) VALUES
	(6, 1),
	(3, 2),
	(7, 2),
	(5, 4),
	(6, 5),
	(9, 5),
	(3, 8),
	(6, 10),
	(9, 12);
/*!40000 ALTER TABLE `yii_card_tags` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_news
CREATE TABLE IF NOT EXISTS `yii_news` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` int(11) NOT NULL DEFAULT '0',
  `header` varchar(200) NOT NULL DEFAULT '',
  `text` varchar(2000) NOT NULL DEFAULT '',
  `pix` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_news: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `yii_news` DISABLE KEYS */;
INSERT INTO `yii_news` (`ID`, `date`, `visible`, `header`, `text`, `pix`) VALUES
	(1, '2014-03-28 19:13:47', 1, 'супер-новость', 'Ура! в продаже новые бесполезные товары, спешите купить!', '/_/img/64x64.svg'),
	(2, '2014-03-20 19:14:44', 1, 'супер-скидки', 'на бесполезную хрень, которую никто не покупает, только сегодня!', '/_/img/64x64.svg'),
	(4, '2014-03-30 23:01:56', 0, 'тестовая новость', 'скоро будут в продаже супер-крутые товары, но никому не надо об этом говорить', '/_/img/64x64.svg');
/*!40000 ALTER TABLE `yii_news` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_pix
CREATE TABLE IF NOT EXISTS `yii_pix` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_pix: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `yii_pix` DISABLE KEYS */;
INSERT INTO `yii_pix` (`ID`, `path`) VALUES
	(1, '/_/img/300x200.svg'),
	(5, 'basket.png'),
	(6, '3d_el_1.jpg'),
	(7, 'snow_box_1.jpg'),
	(8, 'wtf1_1.jpg'),
	(9, 'snow_men_1.jpg'),
	(10, 'new_year_1.jpg'),
	(11, 'old_1.jpg');
/*!40000 ALTER TABLE `yii_pix` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_producers
CREATE TABLE IF NOT EXISTS `yii_producers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_producers: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `yii_producers` DISABLE KEYS */;
INSERT INTO `yii_producers` (`ID`, `name`) VALUES
	(1, 'неизвестный производитель'),
	(2, '"ОАО" Супер-Открытко-Производитель'),
	(3, 'Иванов Иван Иванович'),
	(4, 'Проект 111'),
	(5, 'Sima-land'),
	(6, 'Минимакс');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_purchases: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `yii_purchases` DISABLE KEYS */;
INSERT INTO `yii_purchases` (`ID`, `userID`, `userComment`, `date`, `paymentState`, `deliveryState`, `marker`) VALUES
	(1, 1, 'lol', '2014-04-05 04:26:20', 'end', 'begin', 1),
	(2, 1, 'lol2', '2014-04-05 04:28:19', 'end', 'end', 2),
	(3, 2, 'qqq', '2014-04-05 04:44:54', '', '', 0),
	(4, 3, 'qqq', '2014-04-05 04:54:46', 'end', 'begin', 1),
	(5, 3, '1', '2014-04-06 04:22:37', 'end', '', 1);
/*!40000 ALTER TABLE `yii_purchases` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_purchase_items
CREATE TABLE IF NOT EXISTS `yii_purchase_items` (
  `purchaseID` int(11) NOT NULL,
  `cardID` int(11) NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`purchaseID`,`cardID`),
  KEY `FK_yii_purchase_items_yii_cards` (`cardID`),
  CONSTRAINT `FK_yii_purchase_items_yii_cards` FOREIGN KEY (`cardID`) REFERENCES `yii_cards` (`ID`),
  CONSTRAINT `FK_yii_purchase_items_yii_purchases` FOREIGN KEY (`purchaseID`) REFERENCES `yii_purchases` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_purchase_items: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `yii_purchase_items` DISABLE KEYS */;
INSERT INTO `yii_purchase_items` (`purchaseID`, `cardID`, `count`) VALUES
	(1, 5, 1),
	(1, 6, 1),
	(2, 5, 3),
	(2, 6, 1),
	(3, 5, 1),
	(3, 6, 1),
	(4, 5, 1),
	(4, 6, 3);
/*!40000 ALTER TABLE `yii_purchase_items` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_tags
CREATE TABLE IF NOT EXISTS `yii_tags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_yii_tags_yii_tags` (`parentID`),
  CONSTRAINT `FK_yii_tags_yii_tags` FOREIGN KEY (`parentID`) REFERENCES `yii_tags` (`ID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_tags: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `yii_tags` DISABLE KEYS */;
INSERT INTO `yii_tags` (`ID`, `name`, `parentID`) VALUES
	(1, 'Для праздников', NULL),
	(2, 'ручной работы', NULL),
	(3, 'музыкальные открытки', NULL),
	(4, '3d-открытки', NULL),
	(5, 'новый год', 1),
	(6, '23 февраля', 1),
	(7, '8 марта', 1),
	(8, 'день рождения', 1),
	(9, '___тест2', 8),
	(10, 'рельефные', NULL),
	(11, 'с магнитом', NULL),
	(12, 'почтовый конверт', NULL);
/*!40000 ALTER TABLE `yii_tags` ENABLE KEYS */;


-- Дамп структуры для таблица yii_db.yii_users
CREATE TABLE IF NOT EXISTS `yii_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL,
  `FIO` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_db.yii_users: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `yii_users` DISABLE KEYS */;
INSERT INTO `yii_users` (`ID`, `token`, `FIO`, `address`, `mail`, `phone`) VALUES
	(1, 'admin', 'admin', '1', 'admin', '1'),
	(2, '533f349cc91241.99010480', 'lol', 'internet', 'qwe', '12345'),
	(3, 'qqq', 'qqq', 'qqq', 'qqq', 'qqq');
/*!40000 ALTER TABLE `yii_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
