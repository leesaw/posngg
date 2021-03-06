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
INSERT INTO `log_login` VALUES ('2016-11-04 06:31:44',1,'127.0.0.1'),('2016-11-04 06:32:22',1,'127.0.0.1'),('2016-11-04 06:33:07',1,'127.0.0.1'),('2016-11-04 07:19:15',1,'127.0.0.1'),('2016-11-04 07:33:07',2,'127.0.0.1'),('2016-11-04 07:35:09',2,'127.0.0.1'),('2016-11-04 08:22:05',2,'127.0.0.1'),('2016-11-04 09:22:57',1,'127.0.0.1'),('2016-11-04 09:23:06',2,'127.0.0.1'),('2016-11-04 09:56:00',2,'127.0.0.1'),('2016-11-07 02:12:27',2,'127.0.0.1'),('2016-11-07 02:18:59',2,'127.0.0.1'),('2016-11-07 02:38:02',2,'127.0.0.1'),('2016-11-07 02:38:35',2,'127.0.0.1'),('2016-11-07 11:29:59',2,'127.0.0.1'),('2016-11-07 11:30:11',2,'127.0.0.1'),('2016-11-08 02:20:41',2,'127.0.0.1'),('2016-11-08 09:11:37',2,'127.0.0.1'),('2016-11-08 10:52:03',2,'192.168.10.244'),('2016-11-09 02:14:19',2,'127.0.0.1'),('2016-11-09 03:28:58',2,'127.0.0.1'),('2016-11-10 02:24:47',2,'127.0.0.1'),('2016-11-10 02:27:10',2,'127.0.0.1'),('2016-11-11 02:29:36',2,'127.0.0.1'),('2016-11-11 04:15:43',2,'192.168.10.24'),('2016-11-14 04:17:52',2,'127.0.0.1'),('2016-11-14 08:55:49',2,'127.0.0.1'),('2016-11-15 03:41:02',2,'127.0.0.1'),('2016-11-15 03:42:49',2,'127.0.0.1'),('2016-11-15 03:44:43',2,'127.0.0.1'),('2016-11-15 08:05:14',2,'127.0.0.1'),('2016-11-15 10:44:08',2,'192.168.10.212'),('2016-11-15 11:28:47',2,'192.168.10.212'),('2016-11-16 02:00:44',2,'127.0.0.1'),('2016-11-16 06:44:27',2,'127.0.0.1'),('2016-11-16 10:49:44',2,'127.0.0.1'),('2016-11-16 11:36:43',2,'192.168.10.180'),('2016-11-16 11:38:25',2,'127.0.0.1'),('2016-11-17 02:22:52',2,'127.0.0.1'),('2016-11-17 08:50:39',2,'127.0.0.1'),('2016-11-18 07:55:32',2,'127.0.0.1'),('2016-11-18 11:03:58',2,'127.0.0.1'),('2016-11-18 12:14:46',2,'127.0.0.1'),('2016-11-21 06:36:44',2,'127.0.0.1'),('2016-11-21 09:20:00',2,'127.0.0.1');
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
  `posp_small_invoice_number` varchar(20) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_payment`
--

LOCK TABLES `pos_payment` WRITE;
/*!40000 ALTER TABLE `pos_payment` DISABLE KEYS */;
INSERT INTO `pos_payment` VALUES (1,'2016-11-11','เงินสด',7.00,100.00,0.00,0.00,0.00,0,'2',NULL,'N','','2016-11-11 11:33:12',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(2,'2016-11-11','เงินสด',7.00,20000.00,0.00,0.00,0.00,0,'2',NULL,'N','','2016-11-11 11:43:36',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(3,'2016-11-11','เงินสด',6000.01,10000000.00,1500.00,2000.00,0.00,0,'2',NULL,'N','','2016-11-11 11:44:17',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(4,'2016-11-11','เงินสด',1025250.00,200000000.00,27250.00,52500.00,67072.43,3,'2',NULL,'N','','2016-11-11 11:46:43',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(5,'2016-11-11','เงินสด',836000.00,2000000.00,209000.00,36000.00,54691.59,1,'2',NULL,'N','','2016-11-11 12:01:37',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(6,'2016-11-11','เงินสด',836000.00,23232312.00,209000.00,36000.00,52336.45,2,'2',NULL,'N','test remark','2016-11-11 12:04:17',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(7,'2016-11-15','เงินสด',1052500.00,10.00,0.00,0.00,68855.14,0,'2',NULL,'N','','2016-11-15 15:24:02',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(8,'2016-11-15','เงินสด',7500.00,7500.00,0.00,0.00,490.65,0,'2',NULL,'N','','2016-11-15 15:32:33',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(9,'2016-11-15','เงินสด',6750.00,134.00,750.00,750.00,392.52,0,'2',NULL,'N','','2016-11-15 15:33:56',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(10,'2016-11-15','เงินสด',1052500.00,1052500.00,0.00,0.00,68855.14,0,'2',NULL,'N','','2016-11-15 18:29:07',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(11,'2016-11-15','เงินสด',947250.00,9500000.00,105250.00,5000.00,61642.52,0,'2',NULL,'N','','2016-11-15 18:35:13',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(12,'2016-11-16','เงินสด',947250.00,1000000.00,105250.00,0.00,61969.63,1,'2',NULL,'N','','2016-11-16 10:12:21',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(13,'2016-11-16','เงินสด',999875.00,1000000.00,52625.00,20.00,65411.07,0,'2',NULL,'N','','2016-11-16 11:22:14',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(14,'2016-11-16','เงินสด',1690000.00,1655000.00,422500.00,35000.00,108271.03,2,'2',NULL,'N','','2016-11-16 14:15:33',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(15,'2016-11-21','เงินสด',2848875.00,2.00,316125.00,60000.00,182449.77,2,'2',NULL,'N','','2016-11-21 15:54:32',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(16,'2016-11-21','เงินสด',3157500.00,3.00,0.00,2000.00,206434.58,0,'2',NULL,'N','','2016-11-21 16:20:22',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(17,'2016-11-21','เงินสด',4217500.00,313.00,0.00,300000.00,256285.05,0,'2',NULL,'N','','2016-11-21 16:28:24',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(18,'2016-11-21','เงินสด',5270000.00,63.00,0.00,3000000.00,148504.67,0,'2',NULL,'N','','2016-11-21 16:29:00',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(19,'2016-11-21','เงินสด',4217500.00,65.00,0.00,0.00,275911.21,2,'2',NULL,'N','','2016-11-21 17:00:05',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(20,'2016-11-21','เงินสด',7500.00,7500000.00,0.00,0.00,490.65,0,'2',NULL,'N','','2016-11-21 17:46:24',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(21,'2016-11-21','เงินสด',1052500.00,1052520.00,0.00,0.00,68855.14,0,'2',NULL,'N','','2016-11-21 18:10:55',2,NULL,0,0,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(22,'2016-11-21','เงินสด',7500.00,1234.00,0.00,0.00,490.65,0,'2',NULL,'N','','2016-11-21 18:17:34',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(23,'2016-11-21','เงินสด',7500.00,7500.00,0.00,0.00,490.65,0,'2',NULL,'N','','2016-11-21 18:23:53',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(24,'2016-11-21','เงินสด',7500.00,7500.00,0.00,0.00,490.65,0,'2','A110024','N','','2016-11-21 18:26:08',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(25,'2016-11-21','เงินสด',7500.00,7500.00,0.00,0.00,490.65,0,'2','A110025','N','','2016-11-21 18:28:11',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(26,'2016-11-21','เงินสด',7500.00,7500.00,0.00,0.00,490.65,0,'2','A59110026','N','','2016-11-21 18:29:09',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1);
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
  `popi_item_name` varchar(255) DEFAULT NULL,
  `popi_item_number` varchar(100) DEFAULT NULL,
  `popi_item_brand` varchar(100) DEFAULT NULL,
  `popi_item_description` varchar(255) DEFAULT NULL,
  `popi_item_serial` varchar(45) DEFAULT NULL,
  `popi_item_uom` varchar(50) DEFAULT NULL,
  `popi_enable` int(1) DEFAULT '1',
  PRIMARY KEY (`popi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_payment_item`
--

LOCK TABLES `pos_payment_item` WRITE;
/*!40000 ALTER TABLE `pos_payment_item` DISABLE KEYS */;
INSERT INTO `pos_payment_item` VALUES (1,1,1,'1234',7500.00,0.00,0.00,7.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(2,1,2,'2234',1045000.00,0.00,0.00,1.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(3,2,1,'1234',7500.00,0.00,0.00,7.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(4,2,2,'2234',1045000.00,0.00,0.00,1.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(5,3,1,'1234',7500.00,1500.00,20.00,6000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(6,3,2,'2234',1045000.00,104500.00,10.00,940500.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(7,4,1,'1234',7500.00,2250.00,30.00,5250.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(8,4,2,'2234',1045000.00,25000.00,0.00,1020000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(9,5,2,'2234',1045000.00,209000.00,20.00,836000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(10,6,2,'2234',1045000.00,209000.00,20.00,836000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(11,7,1,'1234',7500.00,0.00,0.00,7500.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(12,7,2,'2234',1045000.00,0.00,0.00,1045000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(13,8,1,'1234',7500.00,0.00,0.00,7500.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(14,9,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(15,10,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(16,10,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial',NULL,'เรือน',1),(17,11,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(18,11,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial',NULL,'เรือน',1),(19,12,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(20,12,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial',NULL,'เรือน',1),(21,13,1,'1234',7500.00,375.00,5.00,7125.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(22,13,2,'2234',1045000.00,52250.00,5.00,992750.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(23,14,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(24,14,2,'2234',1045000.00,209000.00,20.00,836000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(25,14,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(26,14,2,'2234',1045000.00,209000.00,20.00,836000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(27,14,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(28,15,1,'1234',7500.00,375.00,5.00,7125.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(29,15,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(30,15,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(31,15,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(32,15,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(33,15,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(34,15,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(35,16,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(36,16,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(37,16,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(38,16,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(39,16,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(40,16,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(41,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(42,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(43,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(44,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(45,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(46,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(47,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(48,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(49,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(50,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(51,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(52,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(53,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(54,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(55,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(56,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(57,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(58,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(59,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(60,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(61,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(62,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(63,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(64,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(65,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(66,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(67,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(68,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(70,20,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(71,21,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(72,21,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(73,22,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(74,23,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(75,24,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(76,25,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(77,26,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1);
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
  `posh_print_tax` int(1) DEFAULT NULL,
  `posh_enable` int(1) DEFAULT NULL,
  PRIMARY KEY (`posh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_shop`
--

LOCK TABLES `pos_shop` WRITE;
/*!40000 ALTER TABLE `pos_shop` DISABLE KEYS */;
INSERT INTO `pos_shop` VALUES (1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',NULL,NULL,NULL,NULL,NULL,NULL,1,1,1);
/*!40000 ALTER TABLE `pos_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_small_invoice`
--

DROP TABLE IF EXISTS `pos_small_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_small_invoice` (
  `posi_id` int(11) NOT NULL AUTO_INCREMENT,
  `posi_payment_id` int(11) DEFAULT NULL,
  `posi_number` varchar(20) DEFAULT NULL,
  `posi_issuedate` date DEFAULT NULL,
  `posi_status` varchar(1) DEFAULT NULL,
  `posi_dateadd` datetime DEFAULT NULL,
  `posi_dateadd_by` int(11) DEFAULT NULL,
  `posi_enable` int(1) DEFAULT NULL,
  PRIMARY KEY (`posi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_small_invoice`
--

LOCK TABLES `pos_small_invoice` WRITE;
/*!40000 ALTER TABLE `pos_small_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_small_invoice` ENABLE KEYS */;
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
  `tiit_serial` varchar(45) DEFAULT NULL,
  `tiit_enable` int(1) DEFAULT NULL,
  PRIMARY KEY (`tiit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_item`
--

LOCK TABLES `time_item` WRITE;
/*!40000 ALTER TABLE `time_item` DISABLE KEYS */;
INSERT INTO `time_item` VALUES (1,'1234','ES1234','Esprit - ES1234','Esprit','Stainless Steel, Blue Dial','เรือน',7500.00,'ES/1234.jpg',NULL,1),(2,'2234','ES2234','Esprit - ES2234','Esprit','Stainless Steel, Gold Dial','เรือน',1045000.00,'ES/2234.jpg','39P438A9',1);
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

-- Dump completed on 2016-11-21 19:08:58
