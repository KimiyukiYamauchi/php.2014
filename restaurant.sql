-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: restaurant
-- ------------------------------------------------------
-- Server version	5.5.38-0+wheezy1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishes` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(255) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `is_spicy` int(11) DEFAULT NULL,
  PRIMARY KEY (`dish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishes`
--

LOCK TABLES `dishes` WRITE;
/*!40000 ALTER TABLE `dishes` DISABLE KEYS */;
INSERT INTO `dishes` VALUES (1,'カツ丼',60.00,0),(2,'天丼',57.50,0),(3,'親子丼',57.50,0),(4,'刺身定食',62.15,0),(5,'幕の内',73.00,0),(6,'焼肉定食',65.15,0),(7,'焼肉定食',65.15,0),(8,'焼肉定食',65.15,0),(9,'焼肉定食',65.15,0),(10,'焼肉定食',65.15,0),(11,'卵丼',5.00,0),(12,'ざるそば',5.00,0),(13,'天ぷらうどん',15.00,0),(14,'天ぷらうどん',15.00,0),(15,'天ぷらうどん',15.00,0),(16,'天ぷらうどん',15.00,0),(17,'味噌ラーメン',5.00,1),(18,'焼肉%',99.99,0);
/*!40000 ALTER TABLE `dishes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishes2`
--

DROP TABLE IF EXISTS `dishes2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishes2` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(255) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `is_spicy` int(11) DEFAULT NULL,
  PRIMARY KEY (`dish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishes2`
--

LOCK TABLES `dishes2` WRITE;
/*!40000 ALTER TABLE `dishes2` DISABLE KEYS */;
INSERT INTO `dishes2` VALUES (2,'カツカレー',7.25,1),(3,'チキンカレー',11.00,1),(4,'天丼',20.75,0);
/*!40000 ALTER TABLE `dishes2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishes2_seq`
--

DROP TABLE IF EXISTS `dishes2_seq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishes2_seq` (
  `sequence` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sequence`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishes2_seq`
--

LOCK TABLES `dishes2_seq` WRITE;
/*!40000 ALTER TABLE `dishes2_seq` DISABLE KEYS */;
INSERT INTO `dishes2_seq` VALUES (3);
/*!40000 ALTER TABLE `dishes2_seq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishes_old`
--

DROP TABLE IF EXISTS `dishes_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishes_old` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(255) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `is_spicy` int(11) DEFAULT NULL,
  PRIMARY KEY (`dish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishes_old`
--

LOCK TABLES `dishes_old` WRITE;
/*!40000 ALTER TABLE `dishes_old` DISABLE KEYS */;
INSERT INTO `dishes_old` VALUES (1,'天丼',5.00,0),(2,'カツ丼',6.25,0);
/*!40000 ALTER TABLE `dishes_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishes_seq`
--

DROP TABLE IF EXISTS `dishes_seq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishes_seq` (
  `sequence` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sequence`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishes_seq`
--

LOCK TABLES `dishes_seq` WRITE;
/*!40000 ALTER TABLE `dishes_seq` DISABLE KEYS */;
INSERT INTO `dishes_seq` VALUES (17);
/*!40000 ALTER TABLE `dishes_seq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yakiniku_seq`
--

DROP TABLE IF EXISTS `yakiniku_seq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yakiniku_seq` (
  `sequence` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sequence`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yakiniku_seq`
--

LOCK TABLES `yakiniku_seq` WRITE;
/*!40000 ALTER TABLE `yakiniku_seq` DISABLE KEYS */;
INSERT INTO `yakiniku_seq` VALUES (10);
/*!40000 ALTER TABLE `yakiniku_seq` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-28 21:29:16
