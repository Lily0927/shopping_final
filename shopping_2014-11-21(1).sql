# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.39)
# Database: shopping
# Generation Time: 2014-11-21 23:29:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `addressid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `ship_name` varchar(30) DEFAULT NULL,
  `ship_address` varchar(30) DEFAULT NULL,
  `ship_city` varchar(30) DEFAULT NULL,
  `ship_state` varchar(30) DEFAULT NULL,
  `ship_country` varchar(30) DEFAULT NULL,
  `ship_zip` int(11) DEFAULT NULL,
  `ship_phonenumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`addressid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;

INSERT INTO `address` (`addressid`, `username`, `ship_name`, `ship_address`, `ship_city`, `ship_state`, `ship_country`, `ship_zip`, `ship_phonenumber`)
VALUES
	(1,'lily','www','wdddd','ssss','ss','xxx',2,33),
	(2,'lily','ee','eerererer','ee','rr','eee',2,334);

/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categoryone
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categoryone`;

CREATE TABLE `categoryone` (
  `cgo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cgo_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cgo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categoryone` WRITE;
/*!40000 ALTER TABLE `categoryone` DISABLE KEYS */;

INSERT INTO `categoryone` (`cgo_id`, `cgo_name`)
VALUES
	(1,'Electronics & computer'),
	(2,'Books & Audio'),
	(3,'Toy & Baby'),
	(4,'Clothing');

/*!40000 ALTER TABLE `categoryone` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categorytwo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categorytwo`;

CREATE TABLE `categorytwo` (
  `cgt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  `cgo_id` int(11) NOT NULL,
  PRIMARY KEY (`cgt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categorytwo` WRITE;
/*!40000 ALTER TABLE `categorytwo` DISABLE KEYS */;

INSERT INTO `categorytwo` (`cgt_id`, `cat_name`, `cgo_id`)
VALUES
	(1,'TV&video',1),
	(2,'Home Audio',1),
	(3,'camera photo',1),
	(4,'video games',1),
	(5,'MP3 player',1),
	(6,'laptop&Tablets',1);

/*!40000 ALTER TABLE `categorytwo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `cgo_id` int(11) NOT NULL,
  `cgt_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `pic_name` varchar(30) DEFAULT NULL,
  `info` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;

INSERT INTO `item` (`id`, `name`, `cgo_id`, `cgt_id`, `price`, `pic_name`, `info`)
VALUES
	(2,'ViewSonic Monitor VA2037M-LED ',1,1,400,'1.png','ViewSonic\\\'s new VA2037m-LED features an LED backlight'),
	(3,'Home Mini Audio',1,2,30,'2.png','Model: 020;Brand: hifier;Made in China;The USB interface;Classification:MINI'),
	(4,'Canno IXUS 510 HS',1,3,800,'4.png','Model: the IXUS 510 HS;Pixel: 11 million;Screen size: 3.2;Product weight: 101-150g'),
	(5,'PC game handle rocker',1,4,48,'5.png','Product name: Betop BTP - 2126;Interface type: USB;Features: vibration'),
	(6,'iPod shuffle',1,5,338,'6.png',NULL),
	(7,'I CAN READ',2,7,128,'7.png',NULL),
	(8,'The project management',2,8,40,'8.png',NULL),
	(9,'TIME(AE) ',2,9,25,'9.png',NULL),
	(10,'LEGO',3,13,224,'10.png',NULL),
	(11,'Baby jumpsuit',3,14,100,'11.png',NULL),
	(12,'The teddy bear',3,17,50,'12.png',NULL),
	(13,'video games for kids ',3,15,400,'13.png',NULL),
	(14,'Adidas men shoes',4,19,399,'14.png',NULL),
	(15,'POLO Oxford shirt',4,20,255,'15.png',NULL),
	(16,'JackJones Jeans',4,23,280,'16.png',NULL),
	(17,'Coat',4,22,300,'17.png',NULL),
	(18,'Maxi Skirt',4,24,80,'18.png',NULL);

/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_id
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_id`;

CREATE TABLE `order_id` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `username` varchar(14) NOT NULL,
  `num` int(11) NOT NULL,
  `price` float NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `order_id` WRITE;
/*!40000 ALTER TABLE `order_id` DISABLE KEYS */;

INSERT INTO `order_id` (`orderid`, `id`, `username`, `num`, `price`, `startdate`, `enddate`)
VALUES
	(38,8,'lily',1,40,NULL,NULL),
	(42,8,'lily',1,40,NULL,NULL),
	(43,8,'lily',1,40,NULL,NULL),
	(45,8,'lily',1,40,NULL,NULL),
	(46,8,'lily',1,40,NULL,NULL),
	(47,8,'lily',1,40,NULL,'2014-11-20'),
	(48,7,'lily',1,128,NULL,NULL),
	(51,7,'lily',1,128,NULL,NULL),
	(53,7,'lily',1,128,NULL,NULL),
	(64,7,'lily',1,128,NULL,'2014-11-21'),
	(65,2,'lily',1,400,NULL,NULL),
	(67,10,'lily',1,224,NULL,'2014-11-21'),
	(68,15,'lily',1,255,NULL,'2014-11-21'),
	(69,16,'lily',1,280,NULL,'2014-11-21'),
	(70,17,'lily',1,300,NULL,NULL),
	(72,17,'lily',1,300,NULL,NULL),
	(73,15,'lily',1,255,NULL,NULL),
	(74,17,'lily',1,300,NULL,'2014-11-21'),
	(75,15,'lily',1,255,NULL,'2014-11-21');

/*!40000 ALTER TABLE `order_id` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table shipinfor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shipinfor`;

CREATE TABLE `shipinfor` (
  `orderid` int(11) NOT NULL,
  `ship_name` varchar(30) DEFAULT NULL,
  `ship_address` varchar(30) NOT NULL DEFAULT '',
  `ship_city` varchar(30) NOT NULL DEFAULT '',
  `ship_state` varchar(30) NOT NULL DEFAULT '',
  `ship_country` varchar(30) NOT NULL DEFAULT '',
  `ship_zip` int(11) NOT NULL,
  PRIMARY KEY (`orderid`),
  CONSTRAINT `shipinfor_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `order_id` (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `shipinfor` WRITE;
/*!40000 ALTER TABLE `shipinfor` DISABLE KEYS */;

INSERT INTO `shipinfor` (`orderid`, `ship_name`, `ship_address`, `ship_city`, `ship_state`, `ship_country`, `ship_zip`)
VALUES
	(72,'www','wdddd','ssss','ss','xxx',2),
	(73,'www','wdddd','ssss','ss','xxx',2),
	(74,'ee','eerererer','ee','rr','eee',2),
	(75,'ee','eerererer','ee','rr','eee',2);

/*!40000 ALTER TABLE `shipinfor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table shoppingcart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shoppingcart`;

CREATE TABLE `shoppingcart` (
  `order_id` varchar(11) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `itemid` int(30) DEFAULT NULL,
  `num` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(14) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastname` varchar(40),
  `firstname` varchar(40),
  `company` varchar(40),
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`username`, `password`, `email`)
VALUES
	('lily','7c4a8d09ca3762af61e59520943dc26494f8941b','sdsd@sas.com');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
