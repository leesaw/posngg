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
INSERT INTO `log_login` VALUES ('2016-11-04 06:31:44',1,'127.0.0.1'),('2016-11-04 06:32:22',1,'127.0.0.1'),('2016-11-04 06:33:07',1,'127.0.0.1'),('2016-11-04 07:19:15',1,'127.0.0.1'),('2016-11-04 07:33:07',2,'127.0.0.1'),('2016-11-04 07:35:09',2,'127.0.0.1'),('2016-11-04 08:22:05',2,'127.0.0.1'),('2016-11-04 09:22:57',1,'127.0.0.1'),('2016-11-04 09:23:06',2,'127.0.0.1'),('2016-11-04 09:56:00',2,'127.0.0.1'),('2016-11-07 02:12:27',2,'127.0.0.1'),('2016-11-07 02:18:59',2,'127.0.0.1'),('2016-11-07 02:38:02',2,'127.0.0.1'),('2016-11-07 02:38:35',2,'127.0.0.1'),('2016-11-07 11:29:59',2,'127.0.0.1'),('2016-11-07 11:30:11',2,'127.0.0.1'),('2016-11-08 02:20:41',2,'127.0.0.1'),('2016-11-08 09:11:37',2,'127.0.0.1'),('2016-11-08 10:52:03',2,'192.168.10.244'),('2016-11-09 02:14:19',2,'127.0.0.1'),('2016-11-09 03:28:58',2,'127.0.0.1'),('2016-11-10 02:24:47',2,'127.0.0.1'),('2016-11-10 02:27:10',2,'127.0.0.1'),('2016-11-11 02:29:36',2,'127.0.0.1'),('2016-11-11 04:15:43',2,'192.168.10.24'),('2016-11-14 04:17:52',2,'127.0.0.1'),('2016-11-14 08:55:49',2,'127.0.0.1'),('2016-11-15 03:41:02',2,'127.0.0.1'),('2016-11-15 03:42:49',2,'127.0.0.1'),('2016-11-15 03:44:43',2,'127.0.0.1'),('2016-11-15 08:05:14',2,'127.0.0.1'),('2016-11-15 10:44:08',2,'192.168.10.212'),('2016-11-15 11:28:47',2,'192.168.10.212'),('2016-11-16 02:00:44',2,'127.0.0.1'),('2016-11-16 06:44:27',2,'127.0.0.1'),('2016-11-16 10:49:44',2,'127.0.0.1'),('2016-11-16 11:36:43',2,'192.168.10.180'),('2016-11-16 11:38:25',2,'127.0.0.1'),('2016-11-17 02:22:52',2,'127.0.0.1'),('2016-11-17 08:50:39',2,'127.0.0.1'),('2016-11-18 07:55:32',2,'127.0.0.1'),('2016-11-18 11:03:58',2,'127.0.0.1'),('2016-11-18 12:14:46',2,'127.0.0.1'),('2016-11-21 06:36:44',2,'127.0.0.1'),('2016-11-21 09:20:00',2,'127.0.0.1'),('2016-11-22 03:36:14',2,'127.0.0.1'),('2016-11-22 04:45:03',2,'127.0.0.1'),('2016-11-22 06:00:36',2,'192.168.10.212'),('2016-11-22 06:02:28',2,'192.168.10.212'),('2016-11-23 09:32:48',2,'127.0.0.1'),('2016-11-24 07:51:57',2,'127.0.0.1'),('2016-11-24 08:14:26',2,'127.0.0.1'),('2016-11-25 02:34:26',2,'127.0.0.1'),('2016-11-28 02:14:27',2,'127.0.0.1'),('2016-11-28 03:26:12',2,'192.168.10.212'),('2016-11-28 04:45:08',2,'127.0.0.1'),('2016-11-28 04:51:13',2,'127.0.0.1'),('2016-11-28 08:23:18',2,'192.168.10.212'),('2016-11-29 02:18:14',2,'127.0.0.1'),('2016-11-29 03:16:29',2,'192.168.10.212'),('2016-11-29 03:42:46',4,'127.0.0.1'),('2016-11-29 05:08:42',2,'127.0.0.1'),('2016-11-29 06:42:16',4,'127.0.0.1'),('2016-11-29 06:46:10',2,'127.0.0.1'),('2016-11-29 06:49:53',4,'127.0.0.1'),('2016-11-29 06:53:12',2,'127.0.0.1'),('2016-11-29 07:08:15',2,'127.0.0.1'),('2016-11-30 12:03:10',2,'127.0.0.1'),('2016-12-01 04:16:28',2,'127.0.0.1'),('2016-12-01 07:33:36',2,'127.0.0.1'),('2016-12-01 11:30:50',4,'127.0.0.1'),('2016-12-02 03:10:39',2,'127.0.0.1'),('2016-12-02 06:43:04',2,'127.0.0.1'),('2016-12-02 08:52:03',2,'192.168.10.212');
/*!40000 ALTER TABLE `log_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pos_invoice`
--

DROP TABLE IF EXISTS `log_pos_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pos_invoice` (
  `log_pinv_id` int(11) NOT NULL AUTO_INCREMENT,
  `pinv_id` int(11) NOT NULL,
  `pinv_issuedate` date DEFAULT NULL,
  `pinv_price_net` decimal(12,2) DEFAULT '0.00',
  `pinv_price_discount` decimal(12,2) DEFAULT '0.00',
  `pinv_price_topup` decimal(12,2) DEFAULT '0.00',
  `pinv_price_tax` decimal(12,2) DEFAULT '0.00',
  `pinv_customer_id` int(11) DEFAULT '0',
  `pinv_saleperson_id` varchar(10) DEFAULT NULL,
  `pinv_invoice_number` varchar(20) DEFAULT NULL,
  `pinv_small_invoice_number` varchar(20) DEFAULT NULL,
  `pinv_status` varchar(10) DEFAULT 'N',
  `pinv_remark` varchar(500) DEFAULT NULL,
  `pinv_dateadd` datetime DEFAULT NULL,
  `pinv_dateadd_by` int(11) DEFAULT NULL,
  `pinv_updatedate` datetime DEFAULT NULL,
  `pinv_update_by` int(11) DEFAULT '0',
  `pinv_shop_id` int(11) DEFAULT NULL,
  `pinv_shop_name` varchar(255) DEFAULT NULL,
  `pinv_enable` int(1) DEFAULT '1',
  `pinv_customer_name` varchar(200) DEFAULT NULL,
  `pinv_customer_address` varchar(500) DEFAULT NULL,
  `pinv_customer_taxid` varchar(100) DEFAULT NULL,
  `pinv_customer_telephone` varchar(50) DEFAULT NULL,
  `pinv_payment_id` int(11) DEFAULT NULL,
  `pinv_shop_company` varchar(255) DEFAULT NULL,
  `pinv_shop_address1` varchar(255) DEFAULT NULL,
  `pinv_shop_address2` varchar(255) DEFAULT NULL,
  `pinv_shop_telephone` varchar(100) DEFAULT NULL,
  `pinv_shop_fax` varchar(100) DEFAULT NULL,
  `pinv_shop_taxid` varchar(200) DEFAULT NULL,
  `pinv_shop_branch_no` int(4) DEFAULT NULL,
  PRIMARY KEY (`log_pinv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pos_invoice`
--

LOCK TABLES `log_pos_invoice` WRITE;
/*!40000 ALTER TABLE `log_pos_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_pos_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pos_payment`
--

DROP TABLE IF EXISTS `log_pos_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pos_payment` (
  `log_posp_id` int(11) NOT NULL AUTO_INCREMENT,
  `posp_id` int(11) NOT NULL,
  `posp_issuedate` date DEFAULT NULL,
  `posp_price_net` decimal(12,2) DEFAULT '0.00',
  `posp_price_discount` decimal(12,2) DEFAULT '0.00',
  `posp_price_topup` decimal(12,2) DEFAULT '0.00',
  `posp_price_tax` decimal(12,2) DEFAULT '0.00',
  `posp_customer_id` int(11) DEFAULT '0',
  `posp_saleperson_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`log_posp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pos_payment`
--

LOCK TABLES `log_pos_payment` WRITE;
/*!40000 ALTER TABLE `log_pos_payment` DISABLE KEYS */;
INSERT INTO `log_pos_payment` VALUES (1,37,'2016-12-02',7500.00,0.00,0.00,490.65,0,2,'ABN01-59120003','V','Test Void','2016-12-02 10:37:29',2,'2016-12-02 15:25:11',2,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',0),(2,39,'2016-12-02',947250.00,105250.00,47250.00,58878.50,0,2,'ABN01-59120005','N','Test Remark 02-12-2016','2016-12-02 15:36:37',2,'2016-12-02 15:36:37',2,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1);
/*!40000 ALTER TABLE `log_pos_payment` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ngg_users`
--

LOCK TABLES `ngg_users` WRITE;
/*!40000 ALTER TABLE `ngg_users` DISABLE KEYS */;
INSERT INTO `ngg_users` VALUES (1,NULL,'admincck','$2y$10$rr2ij0BLlPfdq6oqZltwtObAbleR5RVU.KnaR3e4Ui6grIIjpFuFu',NULL,'Chaichan','Kusoljittakorn',NULL,'ADMIN',0,'0','1',NULL,1),(2,'80000','user2','$2y$10$d8rk7.HLAjmgS.6Av1GmmeU6EdrfnHKSnndSbmpBYenAcx.s51XVu','','Test','User2','','พนักงานขาย',1,'NGG Timepieces','2','2016-11-04 07:32:42',1),(3,'80001','user3','$1$NEb2I9HH$FvX/pkxIdRdk1JWcbL3t31','','Test','User3',NULL,'พนักงานขาย',1,'NGG Timepieces','3','2016-11-09 09:51:18',1),(4,'80002','lad1','$1$NEb2I9HH$FvX/pkxIdRdk1JWcbL3t31','','ทศนิยม','แดงขำ','','พนักงานขาย',2,'NGG Timepieces','2','2016-11-29 03:10:10',1);
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
  `posc_address` varchar(255) DEFAULT NULL,
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
INSERT INTO `pos_customer` VALUES (1,'นาย สมชาย แมนมาก','99/99 หมู่ 9 ต.สีลม อ.เมือง','กรุงเทพ','0881234567','1-1111-11111-11-1',1),(2,'นางสาว สมหญิง สวยมาก','99/99 หมู่ 9 ซอย สีลมคอมเพล็กซื แยก 13 ซอย 13 ต.สีลม อ.เมือง','กรุงเทพมหานคร','0991234567','-',1),(3,'ลูกค้า 1','ไม่รู้','กรุงเทพมหานคร','1234','1-100',1),(4,'ลูกค้า สอง','','กระบี่','2234','',1),(5,'สมหญิง กกกก','','กาญจนบุรี','0156456557','',1),(6,'สมสม มมมม','','ฉะเชิงเทรา','01232654621','',1),(7,'สสมสมส สมสมหฟก','','กำแพงเพชร','01321321','',1),(8,'asdaasd','','กระบี่','999','',1),(9,'2','','กระบี่','12','',1);
/*!40000 ALTER TABLE `pos_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_invoice`
--

DROP TABLE IF EXISTS `pos_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_invoice` (
  `pinv_id` int(11) NOT NULL AUTO_INCREMENT,
  `pinv_issuedate` date DEFAULT NULL,
  `pinv_price_net` decimal(12,2) DEFAULT '0.00',
  `pinv_price_discount` decimal(12,2) DEFAULT '0.00',
  `pinv_price_topup` decimal(12,2) DEFAULT '0.00',
  `pinv_price_tax` decimal(12,2) DEFAULT '0.00',
  `pinv_customer_id` int(11) DEFAULT '0',
  `pinv_saleperson_id` varchar(10) DEFAULT NULL,
  `pinv_invoice_number` varchar(20) DEFAULT NULL,
  `pinv_small_invoice_number` varchar(20) DEFAULT NULL,
  `pinv_status` varchar(10) DEFAULT 'N',
  `pinv_remark` varchar(500) DEFAULT NULL,
  `pinv_dateadd` datetime DEFAULT NULL,
  `pinv_dateadd_by` int(11) DEFAULT NULL,
  `pinv_updatedate` datetime DEFAULT NULL,
  `pinv_update_by` int(11) DEFAULT '0',
  `pinv_shop_id` int(11) DEFAULT NULL,
  `pinv_shop_name` varchar(255) DEFAULT NULL,
  `pinv_enable` int(1) DEFAULT '1',
  `pinv_customer_name` varchar(200) DEFAULT NULL,
  `pinv_customer_address` varchar(500) DEFAULT NULL,
  `pinv_customer_taxid` varchar(100) DEFAULT NULL,
  `pinv_customer_telephone` varchar(50) DEFAULT NULL,
  `pinv_payment_id` int(11) DEFAULT NULL,
  `pinv_shop_company` varchar(255) DEFAULT NULL,
  `pinv_shop_address1` varchar(255) DEFAULT NULL,
  `pinv_shop_address2` varchar(255) DEFAULT NULL,
  `pinv_shop_telephone` varchar(100) DEFAULT NULL,
  `pinv_shop_fax` varchar(100) DEFAULT NULL,
  `pinv_shop_taxid` varchar(200) DEFAULT NULL,
  `pinv_shop_branch_no` int(4) DEFAULT NULL,
  PRIMARY KEY (`pinv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_invoice`
--

LOCK TABLES `pos_invoice` WRITE;
/*!40000 ALTER TABLE `pos_invoice` DISABLE KEYS */;
INSERT INTO `pos_invoice` VALUES (12,'2016-11-25',947250.00,105250.00,2000.00,61838.79,2,'3','IVN59110001','A59110028','N','','2016-11-25 14:34:44',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1,'นางสาว สมหญิง สวยมาก','99/99 หมู่ 9 ซอย สีลมคอมเพล็กซื แยก 13 ซอย 13 ต.สีลม อ.เมือง กรุงเทพมหานคร','123-456','0991234567',28,'NGG TIMEPIECES CO., LTD.','277/1-3,271/5 Prajaksillapakhom Rd., Tambon Markkeang','Amphur Mungudonthani, Udonthani 41000, Thailand','042-921-339','','0105555081331',1),(13,'2016-11-25',4217500.00,0.00,0.00,275911.21,2,'2','IVN59110002','A59110029','N','','2016-11-25 17:31:40',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1,'นางสาว สมหญิง สวยมาก','99/99 หมู่ 9 ซอย สีลมคอมเพล็กซื แยก 13 ซอย 13 ต.สีลม อ.เมือง กรุงเทพมหานคร','123-456789-10000','0991234567',19,'NGG TIMEPIECES CO., LTD.','277/1-3,271/5 Prajaksillapakhom Rd., Tambon Markkeang','Amphur Mungudonthani, Udonthani 41000, Thailand','042-921-339','','0105555081331',1),(14,'2016-12-01',5500.00,2000.00,500.00,327.10,2,'2','IVN-01-1-59120001','ABN01-59120002','N','','2016-12-01 14:36:56',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1,'นางสาว สมหญิง สวยมาก','99/99 หมู่ 9 ซอย สีลมคอมเพล็กซื แยก 13 ซอย 13 ต.สีลม อ.เมือง กรุงเทพมหานคร','1-1023-00031-15-4','0991234567',36,'NGG TIMEPIECES CO., LTD.','277/1-3,271/5 Prajaksillapakhom Rd., Tambon Markkeang','Amphur Mungudonthani, Udonthani 41000, Thailand','042-921-339','042-456-321','0105555081331',1);
/*!40000 ALTER TABLE `pos_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_invoice_item`
--

DROP TABLE IF EXISTS `pos_invoice_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_invoice_item` (
  `pini_id` int(11) NOT NULL AUTO_INCREMENT,
  `pini_pinv_id` int(11) DEFAULT NULL,
  `pini_item_id` int(11) DEFAULT NULL,
  `pini_barcode` varchar(45) DEFAULT NULL,
  `pini_item_srp` decimal(12,2) DEFAULT NULL,
  `pini_item_dc_baht` decimal(12,2) DEFAULT NULL,
  `pini_item_dc_percent` decimal(12,2) DEFAULT NULL,
  `pini_item_net` decimal(12,2) DEFAULT NULL,
  `pini_item_qty` int(4) DEFAULT NULL,
  `pini_item_name` varchar(255) DEFAULT NULL,
  `pini_item_number` varchar(100) DEFAULT NULL,
  `pini_item_brand` varchar(100) DEFAULT NULL,
  `pini_item_description` varchar(255) DEFAULT NULL,
  `pini_item_serial` varchar(45) DEFAULT NULL,
  `pini_item_uom` varchar(50) DEFAULT NULL,
  `pini_enable` int(1) DEFAULT '1',
  PRIMARY KEY (`pini_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_invoice_item`
--

LOCK TABLES `pos_invoice_item` WRITE;
/*!40000 ALTER TABLE `pos_invoice_item` DISABLE KEYS */;
INSERT INTO `pos_invoice_item` VALUES (3,12,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(4,12,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(5,13,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(6,13,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(7,13,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(8,13,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(9,13,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(10,13,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(11,13,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(12,13,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(13,14,1,'1234',7500.00,2000.00,0.00,5500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1);
/*!40000 ALTER TABLE `pos_invoice_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_paid`
--

DROP TABLE IF EXISTS `pos_paid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_paid` (
  `paid_id` int(11) NOT NULL AUTO_INCREMENT,
  `paid_payment_id` int(11) DEFAULT NULL,
  `paid_gateway` varchar(45) DEFAULT NULL,
  `paid_price_paid` decimal(12,2) DEFAULT '0.00',
  `paid_enable` int(1) DEFAULT '1',
  PRIMARY KEY (`paid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_paid`
--

LOCK TABLES `pos_paid` WRITE;
/*!40000 ALTER TABLE `pos_paid` DISABLE KEYS */;
INSERT INTO `pos_paid` VALUES (1,30,'เงินสด',7500.00,1),(2,31,'เงินสด',52500.00,1),(3,31,'บัตรเครดิต',1000000.00,1),(4,32,'เงินสด',400000.00,1),(5,32,'บัตรเครดิต',545250.00,1),(6,33,'เงินสด',600000.00,1),(7,33,'บัตรเครดิต',400000.00,1),(8,34,'เช็ค',1000000.00,1),(9,35,'เงินสด',947250.00,1),(10,36,'บัตรเครดิต',4000.00,1),(11,36,'เงินสด',1000.00,1),(12,37,'เงินสด',7500.00,1),(13,38,'เงินสด',6000.00,1),(14,39,'เงินสด',900000.00,1);
/*!40000 ALTER TABLE `pos_paid` ENABLE KEYS */;
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
  `posp_price_net` decimal(12,2) DEFAULT '0.00',
  `posp_price_discount` decimal(12,2) DEFAULT '0.00',
  `posp_price_topup` decimal(12,2) DEFAULT '0.00',
  `posp_price_tax` decimal(12,2) DEFAULT '0.00',
  `posp_customer_id` int(11) DEFAULT '0',
  `posp_saleperson_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_payment`
--

LOCK TABLES `pos_payment` WRITE;
/*!40000 ALTER TABLE `pos_payment` DISABLE KEYS */;
INSERT INTO `pos_payment` VALUES (1,'2016-11-11',7.00,0.00,0.00,0.00,0,2,NULL,'N','','2016-11-11 11:33:12',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(2,'2016-11-11',7.00,0.00,0.00,0.00,0,2,NULL,'N','','2016-11-11 11:43:36',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(3,'2016-11-11',6000.01,1500.00,2000.00,0.00,0,2,NULL,'N','','2016-11-11 11:44:17',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(4,'2016-11-11',1025250.00,27250.00,52500.00,67072.43,3,2,NULL,'N','','2016-11-11 11:46:43',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(5,'2016-11-11',836000.00,209000.00,36000.00,54691.59,1,2,NULL,'N','','2016-11-11 12:01:37',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(6,'2016-11-11',836000.00,209000.00,36000.00,52336.45,2,2,NULL,'N','test remark','2016-11-11 12:04:17',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(7,'2016-11-15',1052500.00,0.00,0.00,68855.14,0,2,NULL,'N','','2016-11-15 15:24:02',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(8,'2016-11-15',7500.00,0.00,0.00,490.65,0,2,NULL,'N','','2016-11-15 15:32:33',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(9,'2016-11-15',6750.00,750.00,750.00,392.52,0,2,NULL,'N','','2016-11-15 15:33:56',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(10,'2016-11-15',1052500.00,0.00,0.00,68855.14,0,2,NULL,'N','','2016-11-15 18:29:07',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(11,'2016-11-15',947250.00,105250.00,5000.00,61642.52,0,2,NULL,'N','','2016-11-15 18:35:13',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(12,'2016-11-16',947250.00,105250.00,0.00,61969.63,1,2,NULL,'N','','2016-11-16 10:12:21',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(13,'2016-11-16',999875.00,52625.00,20.00,65411.07,0,2,NULL,'N','','2016-11-16 11:22:14',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(14,'2016-11-16',1690000.00,422500.00,35000.00,108271.03,2,2,NULL,'N','','2016-11-16 14:15:33',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(15,'2016-11-21',2848875.00,316125.00,60000.00,182449.77,2,2,NULL,'N','','2016-11-21 15:54:32',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(16,'2016-11-21',3157500.00,0.00,2000.00,206434.58,0,2,NULL,'N','','2016-11-21 16:20:22',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(17,'2016-11-21',4217500.00,0.00,300000.00,256285.05,0,2,NULL,'N','','2016-11-21 16:28:24',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(18,'2016-11-21',5270000.00,0.00,3000000.00,148504.67,0,2,NULL,'N','','2016-11-21 16:29:00',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(19,'2016-11-21',4217500.00,0.00,0.00,275911.21,2,2,NULL,'T','','2016-11-21 17:00:05',2,'2016-11-25 17:31:40',2,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(20,'2016-11-21',7500.00,0.00,0.00,490.65,0,2,NULL,'N','','2016-11-21 17:46:24',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(21,'2016-11-21',1052500.00,0.00,0.00,68855.14,0,2,NULL,'N','','2016-11-21 18:10:55',2,NULL,0,0,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(22,'2016-11-21',7500.00,0.00,0.00,490.65,0,2,NULL,'N','','2016-11-21 18:17:34',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(23,'2016-11-21',7500.00,0.00,0.00,490.65,0,2,NULL,'N','','2016-11-21 18:23:53',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(24,'2016-11-21',7500.00,0.00,0.00,490.65,0,2,'A110024','N','','2016-11-21 18:26:08',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(25,'2016-11-21',7500.00,0.00,0.00,490.65,0,2,'A110025','N','','2016-11-21 18:28:11',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(26,'2016-11-21',7500.00,0.00,0.00,490.65,0,2,'A59110026','N','','2016-11-21 18:29:09',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(27,'2016-11-22',1052500.00,0.00,0.00,68855.14,2,2,'ABB01-59110027','N','','2016-11-22 10:39:34',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(28,'2016-11-22',947250.00,105250.00,2000.00,61838.79,2,3,'A59110028','T','','2016-11-22 13:08:57',2,'2016-11-25 14:34:44',2,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(29,'2016-11-22',7500.00,0.00,0.00,490.65,0,2,'A59110029','N','','2016-11-22 17:08:23',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(30,'2016-11-22',7500.00,0.00,0.00,490.65,0,2,'A59110029','V','','2016-11-22 17:51:51',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',0),(31,'2016-11-22',1052500.00,0.00,0.00,68855.14,0,2,'ABN01-59110030','V','','2016-11-22 17:55:14',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',0),(32,'2016-11-24',947250.00,105250.00,2000.00,61838.79,2,2,'ABN01-59110031','N','','2016-11-24 14:54:19',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(33,'2016-11-29',1006000.00,46500.00,6000.00,65420.56,0,2,'ABN01-59110032','N','','2016-11-29 10:08:47',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(34,'2016-11-29',1004500.00,48000.00,4500.00,65420.56,0,4,'ABN02-59110001','N','','2016-11-29 10:43:27',4,NULL,0,2,'NGGTP เซ็นทรัลลาดพร้าว',1),(35,'2016-12-01',947250.00,105250.00,0.00,61969.63,0,2,'ABN01-59120001','N','','2016-12-01 14:34:08',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(36,'2016-12-01',5500.00,2000.00,500.00,327.10,2,2,'ABN01-59120002','T','','2016-12-01 14:36:18',2,'2016-12-01 14:36:56',2,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(37,'2016-12-02',7500.00,0.00,0.00,490.65,0,2,'ABN01-59120003','V','Test Void','2016-12-02 10:37:29',2,'2016-12-02 15:25:11',2,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',0),(38,'2016-12-02',6000.00,1500.00,0.00,392.52,0,2,'ABN01-59120004','N','','2016-12-02 13:43:24',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1),(39,'2016-12-02',947250.00,105250.00,47250.00,58878.50,0,2,'ABN01-59120005','N','Test Remark 02-12-2016','2016-12-02 15:36:37',2,NULL,0,1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_payment_item`
--

LOCK TABLES `pos_payment_item` WRITE;
/*!40000 ALTER TABLE `pos_payment_item` DISABLE KEYS */;
INSERT INTO `pos_payment_item` VALUES (1,1,1,'1234',7500.00,0.00,0.00,7.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(2,1,2,'2234',1045000.00,0.00,0.00,1.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(3,2,1,'1234',7500.00,0.00,0.00,7.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(4,2,2,'2234',1045000.00,0.00,0.00,1.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(5,3,1,'1234',7500.00,1500.00,20.00,6000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(6,3,2,'2234',1045000.00,104500.00,10.00,940500.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(7,4,1,'1234',7500.00,2250.00,30.00,5250.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(8,4,2,'2234',1045000.00,25000.00,0.00,1020000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(9,5,2,'2234',1045000.00,209000.00,20.00,836000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(10,6,2,'2234',1045000.00,209000.00,20.00,836000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(11,7,1,'1234',7500.00,0.00,0.00,7500.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(12,7,2,'2234',1045000.00,0.00,0.00,1045000.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(13,8,1,'1234',7500.00,0.00,0.00,7500.00,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(14,9,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(15,10,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(16,10,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial',NULL,'เรือน',1),(17,11,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(18,11,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial',NULL,'เรือน',1),(19,12,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(20,12,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial',NULL,'เรือน',1),(21,13,1,'1234',7500.00,375.00,5.00,7125.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(22,13,2,'2234',1045000.00,52250.00,5.00,992750.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(23,14,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(24,14,2,'2234',1045000.00,209000.00,20.00,836000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(25,14,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(26,14,2,'2234',1045000.00,209000.00,20.00,836000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(27,14,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(28,15,1,'1234',7500.00,375.00,5.00,7125.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(29,15,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(30,15,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(31,15,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(32,15,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(33,15,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(34,15,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(35,16,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(36,16,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(37,16,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(38,16,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(39,16,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(40,16,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(41,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(42,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(43,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(44,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(45,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(46,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(47,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(48,17,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(49,17,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(50,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(51,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(52,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(53,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(54,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(55,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(56,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(57,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(58,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(59,18,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(60,18,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(61,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(62,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(63,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(64,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(65,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(66,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(67,19,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(68,19,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(70,20,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(71,21,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(72,21,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(73,22,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(74,23,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(75,24,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(76,25,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(77,26,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(78,27,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(79,27,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(80,28,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(81,28,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(82,29,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(83,30,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(84,31,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(85,31,2,'2234',1045000.00,0.00,0.00,1045000.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(86,32,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(87,32,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Esprit - ES2234','ES2234','Esprit','Stainless Steel, Gold Dial','39P438A9','เรือน',1),(88,33,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(89,33,2,'2234',1045000.00,45000.00,0.00,1000000.00,1,'Spartan Ultra Copper Special Edition HR','SS022944000','Suunto','THE GPS WATCH FOR ATHLETIC AND ADVENTURE MULTISPORT','164510002199','เรือน',1),(90,34,1,'1234',7500.00,3000.00,40.00,4500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(91,34,2,'2234',1045000.00,45000.00,0.00,1000000.00,1,'Spartan Ultra Copper Special Edition HR','SS022944000','Suunto','THE GPS WATCH FOR ATHLETIC AND ADVENTURE MULTISPORT','164510002199','เรือน',1),(92,35,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(93,35,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Spartan Ultra Copper Special Edition HR','SS022944000','Suunto','THE GPS WATCH FOR ATHLETIC AND ADVENTURE MULTISPORT','164510002199','เรือน',1),(94,36,1,'1234',7500.00,2000.00,0.00,5500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(95,37,1,'1234',7500.00,0.00,0.00,7500.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(96,38,1,'1234',7500.00,1500.00,20.00,6000.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(97,39,1,'1234',7500.00,750.00,10.00,6750.00,1,'Esprit - ES1234','ES1234','Esprit','Stainless Steel, Blue Dial',NULL,'เรือน',1),(98,39,2,'2234',1045000.00,104500.00,10.00,940500.00,1,'Spartan Ultra Copper Special Edition HR','SS022944000','Suunto','THE GPS WATCH FOR ATHLETIC AND ADVENTURE MULTISPORT','164510002199','เรือน',1);
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
  `posh_taxid` varchar(200) DEFAULT NULL,
  `posh_company` varchar(255) DEFAULT NULL,
  `posh_branch_no` int(4) DEFAULT NULL,
  `posh_print_tax` int(1) DEFAULT NULL,
  `posh_enable` int(1) DEFAULT NULL,
  PRIMARY KEY (`posh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_shop`
--

LOCK TABLES `pos_shop` WRITE;
/*!40000 ALTER TABLE `pos_shop` DISABLE KEYS */;
INSERT INTO `pos_shop` VALUES (1,'Rolex Boutique สาขา เซ็นทรัล อุดรธานี','277/1-3,271/5 Prajaksillapakhom Rd., Tambon Markkeang','Amphur Mungudonthani, Udonthani 41000, Thailand','042-921-339','042-456-321','0105555081331','NGG TIMEPIECES CO., LTD.',1,1,1),(2,'NGGTP เซ็นทรัลลาดพร้าว','1693, 3rd Floor, Central Ladplao Building, Phaholyothin Rd.','Jatujak, Jatujak, Bangkok 10900','02-937-2233',NULL,'0105555081331','NGG TIMEPIECES CO., LTD.',3,0,1);
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
INSERT INTO `time_item` VALUES (1,'1234','ES1234','Esprit - ES1234','Esprit','Stainless Steel, Blue Dial','เรือน',7500.00,'ES/1234.jpg',NULL,1),(2,'2234','SS022944000','Spartan Ultra Copper Special Edition HR','Suunto','THE GPS WATCH FOR ATHLETIC AND ADVENTURE MULTISPORT','เรือน',1045000.00,'ES/2234.jpg','164510002199',1);
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

-- Dump completed on 2016-12-02 15:58:27
