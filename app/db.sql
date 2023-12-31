-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dbsiap
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) DEFAULT '',
  `gedung` varchar(4) DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT INTO `lokasi` VALUES (1,'Sewing Line-01 ','STL1'),(2,'Sewing Line-02','STL1'),(3,'Sewing Line-03','STL1'),(4,'Sewing Line-04','STL1'),(5,'Sewing Line-20','STL2'),(6,'Sewing Line-22','STL2'),(7,'Sewing Line-11','STL2'),(8,'Sewing Line-11','STL3'),(9,'Sewing Line-19','STL3');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengirim`
--

DROP TABLE IF EXISTS `pengirim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengirim` (
  `alamat` varchar(200) NOT NULL,
  `rahasia` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`alamat`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengirim`
--

LOCK TABLES `pengirim` WRITE;
/*!40000 ALTER TABLE `pengirim` DISABLE KEYS */;
INSERT INTO `pengirim` VALUES ('https://sender4.dupres.id/api/v1/messages','dk_73ad32a951f04bb896680f038e0aca2f');
/*!40000 ALTER TABLE `pengirim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `pid` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `kodebagian` varchar(3) DEFAULT '',
  `bagian` varchar(50) DEFAULT NULL,
  `gedung` varchar(5) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `statusstaf` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`pid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES ('SF1211','Wardiono','1234','MKS','Mekanik Sewing','STL3','6281225919499','T'),('SF1217','Marjuki','1234','MKS','Mekanik Sewing','STL1','6281225919499','T'),('SF1231','Noprianus Sujhono','1234','MKS','Mekanik Sewing','STL3','6281225919499','T'),('SF1234','Tio Pasuko','1234','MKS','Mekanik Sewing','STL1','6281225919499','T'),('SF1236','Wahyu Nugroho','1234','MKS','Mekanik Sewing','STL1','6281225919499','T'),('SF1238','David Setiawan','1234','MKS','Mekanik Sewing','STL2','6281225919499','T'),('SF1239','Sulistino','1234','MKS','Mekanik Sewing','STL2','6281225919499','T'),('SF13771','Yanto','1234','SP','SPV','STL1','6281225919499','F'),('SF13773','John Traf','1234','SPV','Mekanik Listrik','STL2','6281225919499','F'),('SF13774','Maya','1234','SPV','Chief Sewing','STL1','6281225919499','F');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `notiket` varchar(20) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `kodebarang` varchar(20) DEFAULT NULL,
  `namabarang` varchar(200) DEFAULT NULL,
  `keluhan` varchar(200) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `gedung` varchar(4) DEFAULT NULL,
  `pengirim` varchar(30) DEFAULT NULL,
  `teknisi` varchar(20) DEFAULT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT NULL,
  `statuskirim` varchar(10) DEFAULT '',
  `statustiket` varchar(50) DEFAULT '',
  `baca` varchar(1) DEFAULT '',
  `tutup` datetime DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`notiket`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES ('STL000001','2023-10-06 08:29:38','8654577','JARUM SATU','MATI','SEWING LINE-22','STL2','SF13773','SF1239','2023-10-10 11:03:18',NULL,'ANTRI','START','F',NULL,NULL),('STL000002','2023-10-06 08:31:44','BMKBV','HHGFY','To do this I decided a list view of buttons would word','SEWING LINE-11','STL2','SF13773','SF1239','2023-10-10 11:07:01',NULL,'SENT','START','F',NULL,NULL),('STL000003','2023-10-06 08:33:48','V98767','MESIN JSHIT','MSTI','SEWING LINE-11','STL2','SF13773','SF1238',NULL,NULL,'SENT','OPEN','F',NULL,NULL),('STL000004','2023-10-06 09:17:44','6789%44','MESIN JSRUM 5','BENSNG PUTUS PUTUS','SEWING LINE-20','STL2','SF13773','SF1239','2023-10-10 11:02:31',NULL,'SENT','START','F',NULL,NULL),('STL000005','2023-10-07 10:51:55','51121','MESIN JARUM 2','SERING MATI','SEWING LINE 15',NULL,'SF5633',NULL,NULL,NULL,'ANTRI','OPEN','F',NULL,NULL),('STL000006','2023-10-07 10:53:01','51121','MESIN JARUM 2','SERING MATI','SEWING LINE 15',NULL,'SF5633',NULL,NULL,NULL,'ANTRI','OPEN','F',NULL,NULL),('STL000007','2023-10-07 10:53:31','51121','MESIN JARUM 5','SERING MATI','SEWING LINE 15',NULL,'SF5633',NULL,NULL,NULL,'ANTRI','OPEN','F',NULL,NULL),('STL000008','2023-10-07 10:54:13','51121','MESIN JARUM 5','SERING MATI','SEWING LINE 15',NULL,'SF5633',NULL,NULL,NULL,'ANTRI','OPEN','F',NULL,NULL),('STL000009','2023-10-10 07:45:16','68857+','MESIN POTONG','RUSAK KABEL','SEWING LINE-03','STL1','SF13774','SF1236',NULL,NULL,'SENT','','F',NULL,NULL),('STL000010','2023-10-10 07:48:34','467999','GERINDA','MATI','SEWING LINE-04','STL1','SF13774','SF1234',NULL,NULL,'SENT','OPEN','F',NULL,NULL);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `NOMOR` BEFORE INSERT ON `tickets`
FOR EACH ROW BEGIN
DECLARE s VARCHAR(10);
DECLARE i INTEGER;
SET i =(SELECT SUBSTRING(notiket,4,6) AS Nomer
FROM tickets ORDER BY Nomer DESC LIMIT 1);
SET s = (SELECT AUTONOM(i));
IF(NEW.notiket IS NULL OR NEW.notiket = '')
THEN SET NEW.notiket =s;
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping routines for database 'dbsiap'
--
/*!50003 DROP FUNCTION IF EXISTS `AUTONOM` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `AUTONOM`(nomor INT) RETURNS varchar(9) CHARSET utf8
BEGIN
DECLARE kodebaru VARCHAR(9);
DECLARE urut INT;
SET urut = IF(nomor IS NULL,1,nomor+1);
SET kodebaru = CONCAT("STL",LPAD(urut,6,0));
RETURN kodebaru;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-10 23:14:35
