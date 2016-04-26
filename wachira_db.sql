CREATE DATABASE  IF NOT EXISTS `wachira_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wachira_db`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: wachira_db
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','1234','Administrator','admin@email.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(300) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'แหวนผู้ชาย'),(3,'แหวนผู้หญิง'),(4,'สร้อยคอ'),(5,'จี้'),(6,'ต่างหู'),(7,'สร้อยข้อมือ/กำไร'),(8,'โทแพส'),(9,'แอเมทิสต์'),(10,'พลอยสตาร์'),(11,'ซีทริน'),(12,'เพอริโต'),(13,'ทับทิม'),(14,'บุษราคัม'),(15,'ไพลิน'),(16,'มรกต'),(17,'โกเมน'),(18,'เพทาย');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_title` varchar(300) NOT NULL,
  `contact_full_name` varchar(120) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_detail` varchar(300) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `member_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_username` varchar(30) NOT NULL,
  `member_password` varchar(16) NOT NULL,
  `member_full_name` varchar(100) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_tel` varchar(100) NOT NULL,
  `member_birthday` date DEFAULT NULL,
  `member_gender` varchar(30) DEFAULT NULL,
  `member_address` varchar(300) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'tonhom','1234','Rattapron Chinaon','tonhom.buu@gmail.com','0806340768','1990-07-28','ชาย','บางแสน');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `order_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `order_date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_total_price` float NOT NULL DEFAULT '0',
  `order_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = รอการชำระเงิน\n2 = รอการจัดส่ง\n3 = จัดส่งแล้ว\n4 = ไม่ชำระเงินภายใน 7 วัน',
  PRIMARY KEY (`order_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (00000001,1,'2016-04-26 09:02:58',5350,2),(00000002,1,'2016-04-19 09:03:51',3210,4);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `order_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `order_detail_amount` int(11) NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `product_id` (`product_id`),
  KEY `order_detail_ibfk_2_idx` (`order_id`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `order_id` int(8) unsigned zerofill NOT NULL,
  `payment_bank` varchar(100) NOT NULL,
  `payment_branch` varchar(100) NOT NULL,
  `payment_amount` float NOT NULL DEFAULT '0',
  `payment_date_transfer` date DEFAULT NULL,
  `payment_time_transfer` varchar(50) NOT NULL,
  `payment_remark` varchar(300) DEFAULT NULL,
  `payment_evidence` varchar(300) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `member_id` (`member_id`),
  KEY `payment_ibfk_2_idx` (`order_id`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(300) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_price` float NOT NULL DEFAULT '0',
  `product_stock` int(5) NOT NULL DEFAULT '0',
  `product_date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `product_imgDir` varchar(256) DEFAULT NULL,
  `product_thumbnail` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'แหวนเพชร A01','แหวนเพชร A01',3000,7,'2016-03-14 23:06:24',3,'A01','1.JPG'),(2,'แหวนเพชร 02','แหวนเพชร 02',5000,17,'2016-03-14 23:31:56',3,'A02','1.JPG'),(3,'แหวนเพชร 03','แหวนเพชร 03',4000,0,'2016-03-14 23:31:56',3,'A03','1.JPG'),(4,'แหวน 04','แหวน 04',5000,0,'2016-03-14 23:33:32',3,'A04','1.JPG'),(7,'แหวน 05','แหวน 05',5000,0,'2016-03-27 18:25:11',3,'A05','1.JPG'),(8,'แหวผู้ชาย 06','แหวนผู้ชายสีเงิน',3000,0,'2016-03-27 18:54:41',1,'A06','1.jpg'),(9,'แหวนผู้หญิง 07','แหวนผู้หญิง 07',4000,0,'2016-03-27 18:55:49',3,'A07','1.jpg'),(10,'แหวนผู้ชาย 08','แหวนผู้ชาย 08',3000,0,'2016-03-27 18:57:05',1,'A08','1.jpg'),(11,'แหวนผู้ชาย 09','แหวนผู้ชาย 09',3000,0,'2016-03-27 18:57:31',1,'A09','1.jpg'),(12,'แหวนผู้หญิง 10','แหวนผู้หญิง 10',3000,0,'2016-03-27 18:58:01',3,'A10','1.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-26 14:24:33
