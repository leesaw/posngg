-- MySQL dump 10.13  Distrib 5.7.11, for Linux (x86_64)
--
-- Host: localhost    Database: ngg_pos
-- ------------------------------------------------------
-- Server version	5.7.11-0ubuntu6

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
-- Table structure for table `list_province`
--

DROP TABLE IF EXISTS `list_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list_province` (
  `province_code` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `province_name` text NOT NULL,
  `country_code` int(3) NOT NULL,
  PRIMARY KEY (`province_code`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `list_province`
--

LOCK TABLES `list_province` WRITE;
/*!40000 ALTER TABLE `list_province` DISABLE KEYS */;
INSERT INTO `list_province` VALUES (81,'กระบี่',66),(10,'กรุงเทพมหานคร',66),(71,'กาญจนบุรี',66),(46,'กาฬสินธุ์',66),(62,'กำแพงเพชร',66),(40,'ขอนแก่น',66),(22,'จันทบุรี',66),(24,'ฉะเชิงเทรา',66),(20,'ชลบุรี',66),(18,'ชัยนาท',66),(36,'ชัยภูมิ',66),(86,'ชุมพร',66),(57,'เชียงราย',66),(50,'เชียงใหม่',66),(92,'ตรัง',66),(23,'ตราด',66),(63,'ตาก',66),(26,'นครนายก',66),(73,'นครปฐม',66),(48,'นครพนม',66),(30,'นครราชสีมา',66),(80,'นครศรีธรรมราช',66),(60,'นครสวรรค์',66),(12,'นนทบุรี',66),(96,'นราธิวาส',66),(55,'น่าน',66),(31,'บุรีรัมย์',66),(13,'ปทุมธานี',66),(77,'ประจวบคีรีขันธ์',66),(25,'ปราจีนบุรี',66),(94,'ปัตตานี',66),(14,'พระนครศรีอยุธยา',66),(56,'พะเยา',66),(82,'พังงา',66),(93,'พัทลุง',66),(66,'พิจิตร',66),(65,'พิษณุโลก',66),(76,'เพชรบุรี',66),(67,'เพชรบูรณ์',66),(54,'แพร่',66),(83,'ภูเก็ต',66),(44,'มหาสารคาม',66),(49,'มุกดาหาร',66),(58,'แม่ฮ่องสอน',66),(35,'ยโสธร',66),(95,'ยะลา',66),(45,'ร้อยเอ็ด',66),(85,'ระนอง',66),(21,'ระยอง',66),(70,'ราชบุรี',66),(16,'ลพบุรี',66),(52,'ลำปาง',66),(51,'ลำพูน',66),(42,'เลย',66),(33,'ศรีสะเกษ',66),(47,'สกลนคร',66),(90,'สงขลา',66),(91,'สตูล',66),(11,'สมุทรปราการ',66),(75,'สมุทรสงคราม',66),(74,'สมุทรสาคร',66),(27,'สระแก้ว',66),(19,'สระบุรี',66),(17,'สิงห์บุรี',66),(64,'สุโขทัย',66),(72,'สุพรรณบุรี',66),(84,'สุราษฎร์ธานี',66),(32,'สุรินทร์',66),(43,'หนองคาย',66),(39,'หนองบัวลำภู',66),(15,'อ่างทอง',66),(37,'อำนาจเจริญ',66),(41,'อุดรธานี',66),(53,'อุตรดิตถ์',66),(61,'อุทัยธานี',66),(34,'อุบลราชธานี',66),(97,'บึงกาฬ',66);
/*!40000 ALTER TABLE `list_province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_login`
--

DROP TABLE IF EXISTS `log_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_login` (
  `logl_dateadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logl_nggu_id` int(11) NOT NULL,
  `logl_ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`logl_dateadd`,`logl_nggu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_login`
--

LOCK TABLES `log_login` WRITE;
/*!40000 ALTER TABLE `log_login` DISABLE KEYS */;
INSERT INTO `log_login` VALUES ('2016-11-04 06:31:44',1,'127.0.0.1'),('2016-11-04 06:32:22',1,'127.0.0.1'),('2016-11-04 06:33:07',1,'127.0.0.1'),('2016-11-04 07:19:15',1,'127.0.0.1'),('2016-11-04 07:33:07',2,'127.0.0.1'),('2016-11-04 07:35:09',2,'127.0.0.1'),('2016-11-04 08:22:05',2,'127.0.0.1'),('2016-11-04 09:22:57',1,'127.0.0.1'),('2016-11-04 09:23:06',2,'127.0.0.1'),('2016-11-04 09:56:00',2,'127.0.0.1'),('2016-11-07 02:12:27',2,'127.0.0.1'),('2016-11-07 02:18:59',2,'127.0.0.1'),('2016-11-07 02:38:02',2,'127.0.0.1'),('2016-11-07 02:38:35',2,'127.0.0.1'),('2016-11-07 11:29:59',2,'127.0.0.1'),('2016-11-07 11:30:11',2,'127.0.0.1'),('2016-11-08 02:20:41',2,'127.0.0.1'),('2016-11-08 09:11:37',2,'127.0.0.1'),('2016-11-08 10:52:03',2,'192.168.10.244'),('2016-11-09 02:14:19',2,'127.0.0.1'),('2016-11-09 03:28:58',2,'127.0.0.1'),('2016-11-10 02:24:47',2,'127.0.0.1'),('2016-11-10 02:27:10',2,'127.0.0.1'),('2016-11-11 02:29:36',2,'127.0.0.1'),('2016-11-11 04:15:43',2,'192.168.10.24');
/*!40000 ALTER TABLE `log_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ngg_users`
--

DROP TABLE IF EXISTS `ngg_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ngg_users` (
  `nggu_id` int(11) NOT NULL AUTO_INCREMENT,
  `nggu_number` varchar(45) DEFAULT NULL,
  `nggu_username` varchar(255) NOT NULL,
  `nggu_password` varchar(255) NOT NULL,
  `nggu_remember_token` varchar(100) DEFAULT NULL,
  `nggu_firstname` varchar(150) DEFAULT NULL,
  `nggu_lastname` varchar(150) DEFAULT NULL,
  `nggu_email` varchar(255) DEFAULT NULL,
  `nggu_position` varchar(50) DEFAULT NULL,
  `nggu_shop_id` int(11) DEFAULT NULL,
  `nggu_company` varchar(50) DEFAULT NULL,
  `nggu_status` varchar(50) DEFAULT NULL,
  `nggu_createat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nggu_enable` int(1) DEFAULT '1',
  PRIMARY KEY (`nggu_id`),
  UNIQUE KEY `nggu_username_UNIQUE` (`nggu_username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ngg_users`
--

LOCK TABLES `ngg_users` WRITE;
/*!40000 ALTER TABLE `ngg_users` DISABLE KEYS */;
INSERT INTO `ngg_users` VALUES (1,NULL,'admincck','$2y$10$rr2ij0BLlPfdq6oqZltwtObAbleR5RVU.KnaR3e4Ui6grIIjpFuFu',NULL,'Chaichan','Kusoljittakorn',NULL,'ADMIN',0,'0','1',NULL,1),(2,'80000','user2','$2y$10$d8rk7.HLAjmgS.6Av1GmmeU6EdrfnHKSnndSbmpBYenAcx.s51XVu','','Test','User2','','พนักงานขาย',1,'NGG Timepieces','2','2016-11-04 07:32:42',1),(3,'80001','user3','$2y$10$d8rk7.HLAjmgS.6Av1GmmeU6EdrfnHKSnndSbmpBYenAcx.s51XVu','','Test','User3',NULL,'พนักงานขาย',1,'NGG Timepieces','3','2016-11-09 09:51:18',1);
/*!40000 ALTER TABLE `ngg_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_customer`
--

DROP TABLE IF EXISTS `pos_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_customer` (
  `posc_id` int(11) NOT NULL AUTO_INCREMENT,
  `posc_name` varchar(255) DEFAULT NULL,
  `posc_address` varchar(500) DEFAULT NULL,
  `posc_province` varchar(150) DEFAULT NULL,
  `posc_telephone` varchar(100) DEFAULT NULL,
  `posc_taxid` varchar(40) DEFAULT NULL,
  `posc_enable` int(1) DEFAULT '1',
  PRIMARY KEY (`posc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_customer`
--

LOCK TABLES `pos_customer` WRITE;
/*!40000 ALTER TABLE `pos_customer` DISABLE KEYS */;
INSERT INTO `pos_customer` VALUES (1,'นาย สมชาย แมนมาก','99/99 หมู่ 9 ต.สีลม อ.เมือง','กรุงเทพ','0881234567','1-1111-11111-11-1',1),(2,'นาย สมชาย แมนมาก','99/99 หมู่ 9 ซอย สีลมคอมเพล็กซื แยก 13 ซอย 13 ต.สีลม อ.เมือง','กรุงเทพมหานคร','0991234567','-',1),(3,'ลูกค้า 1','ไม่รู้','กรุงเทพมหานคร','1234','1-100',1),(4,'ลูกค้า สอง','','กระบี่','2234','',1),(5,'สมหญิง กกกก','','กาญจนบุรี','0156456557','',1),(6,'สมสม มมมม','','ฉะเชิงเทรา','01232654621','',1),(7,'สสมสมส สมสมหฟก','','กำแพงเพชร','01321321','',1),(8,'asdaasd','','กระบี่','999','',1),(9,'2','','กระบี่','12','',1);
/*!40000 ALTER TABLE `pos_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_payment`
--

DROP TABLE IF EXISTS `pos_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_payment` (
  `posp_id` int(11) NOT NULL AUTO_INCREMENT,
  `posp_issuedate` date DEFAULT NULL,
  `posp_gateway` varchar(20) DEFAULT NULL,
  `posp_price_net` decimal(12,2) DEFAULT '0.00',
  `posp_price_paid` decimal(12,2) DEFAULT '0.00',
  `posp_price_discount` decimal(12,2) DEFAULT '0.00',
  `posp_price_topup` decimal(12,2) DEFAULT '0.00',
  `posp_price_tax` decimal(12,2) DEFAULT '0.00',
  `posp_customer_id` int(11) DEFAULT '0',
  `posp_saleperson_id` varchar(10) DEFAULT NULL,
  `posp_status` varchar(10) DEFAULT 'N',
  `posp_remark` varchar(500) DEFAULT NULL,
  `posp_dateadd` datetime DEFAULT NULL,
  `posp_dateadd_by` int(11) DEFAULT NULL,
  `posp_updatedate` datetime DEFAULT NULL,
  `posp_update_by` int(11) DEFAULT '0',
  `posp_shop_id` int(11) DEFAULT NULL,
  `posp_shop_name` varchar(255) DEFAULT NULL,
  `posp_enable` int(1) DEFAULT '1',
  PRIMARY KEY (`posp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_payment`
--

LOCK TABLES `pos_payment` WRITE;
/*!40000 ALTER TABLE `pos_payment` DISABLE KEYS */;
INSERT INTO `pos_payment` VALUES (1,'2016-11-11','เงินสด',7.00,100.00,0.00,0.00,0.00,0,'2','N','','2016-11-11 11:33:12',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(2,'2016-11-11','เงินสด',7.00,20000.00,0.00,0.00,0.00,0,'2','N','','2016-11-11 11:43:36',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(3,'2016-11-11','เงินสด',6000.01,10000000.00,1500.00,2000.00,0.00,0,'2','N','','2016-11-11 11:44:17',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(4,'2016-11-11','เงินสด',1025250.00,200000000.00,27250.00,52500.00,67072.43,3,'2','N','','2016-11-11 11:46:43',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1);
/*!40000 ALTER TABLE `pos_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_payment_item`
--

DROP TABLE IF EXISTS `pos_payment_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_payment_item` (
  `popi_id` int(11) NOT NULL AUTO_INCREMENT,
  `popi_posp_id` int(11) DEFAULT NULL,
  `popi_item_id` int(11) DEFAULT NULL,
  `popi_barcode` varchar(45) DEFAULT NULL,
  `popi_item_srp` decimal(12,2) DEFAULT NULL,
  `popi_item_dc_baht` decimal(12,2) DEFAULT NULL,
  `popi_item_dc_percent` decimal(12,2) DEFAULT NULL,
  `popi_item_net` decimal(12,2) DEFAULT NULL,
  `popi_item_qty` int(4) DEFAULT NULL,
  `popi_enable` int(1) DEFAULT '1',
  PRIMARY KEY (`popi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_payment_item`
--

LOCK TABLES `pos_payment_item` WRITE;
/*!40000 ALTER TABLE `pos_payment_item` DISABLE KEYS */;
INSERT INTO `pos_payment_item` VALUES (1,1,1,'1234',7500.00,0.00,0.00,7.00,1,1),(2,1,2,'2234',1045000.00,0.00,0.00,1.00,1,1),(3,2,1,'1234',7500.00,0.00,0.00,7.00,1,1),(4,2,2,'2234',1045000.00,0.00,0.00,1.00,1,1),(5,3,1,'1234',7500.00,1500.00,20.00,6000.00,1,1),(6,3,2,'2234',1045000.00,104500.00,10.00,940500.00,1,1),(7,4,1,'1234',7500.00,2250.00,30.00,5250.00,1,1),(8,4,2,'2234',1045000.00,25000.00,0.00,1020000.00,1,1);
/*!40000 ALTER TABLE `pos_payment_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_shop`
--

DROP TABLE IF EXISTS `pos_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_shop` (
  `posh_id` int(11) NOT NULL AUTO_INCREMENT,
  `posh_name` varchar(255) DEFAULT NULL,
  `posh_address1` varchar(255) DEFAULT NULL,
  `posh_address2` varchar(255) DEFAULT NULL,
  `posh_telephone` varchar(100) DEFAULT NULL,
  `posh_fax` varchar(100) DEFAULT NULL,
  `posh_taxid` varchar(20) DEFAULT NULL,
  `posh_branch` varchar(50) DEFAULT NULL,
  `posh_branch_no` int(1) DEFAULT NULL,
  `posh_enable` int(1) DEFAULT NULL,
  PRIMARY KEY (`posh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_shop`
--

LOCK TABLES `pos_shop` WRITE;
/*!40000 ALTER TABLE `pos_shop` DISABLE KEYS */;
INSERT INTO `pos_shop` VALUES (1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',NULL,NULL,NULL,NULL,NULL,NULL,1,1);
/*!40000 ALTER TABLE `pos_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_item`
--

DROP TABLE IF EXISTS `time_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_item` (
  `tiit_id` int(11) NOT NULL AUTO_INCREMENT,
  `tiit_barcode` varchar(50) DEFAULT NULL,
  `tiit_number` varchar(100) DEFAULT NULL,
  `tiit_name` varchar(255) DEFAULT NULL,
  `tiit_brand` varchar(100) DEFAULT NULL,
  `tiit_description` varchar(255) DEFAULT NULL,
  `tiit_uom` varchar(50) DEFAULT NULL,
  `tiit_srp` decimal(12,2) DEFAULT NULL,
  `tiit_picture` varchar(255) DEFAULT NULL,
  `tiit_enable` int(1) DEFAULT NULL,
  PRIMARY KEY (`tiit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_item`
--

LOCK TABLES `time_item` WRITE;
/*!40000 ALTER TABLE `time_item` DISABLE KEYS */;
INSERT INTO `time_item` VALUES (1,'1234','ES1234','Esprit - ES1234','Esprit','Stainless Steel, Blue Dial','เรือน',7500.00,'ES/1234.jpg',1),(2,'2234','ES2234','Esprit - ES2234','Esprit','Stainless Steel, Gold Dial','เรือน',1045000.00,'ES/2234.jpg',1);
/*!40000 ALTER TABLE `time_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-11 11:50:05
