-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: hfnoise
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `hf_noise_data`
--

DROP TABLE IF EXISTS `hf_noise_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hf_noise_data` (
  `id_hf_noise_data` int(11) NOT NULL AUTO_INCREMENT,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `samples` int(6) NOT NULL,
  `1Mhz_data` varchar(45) DEFAULT NULL,
  `2Mhz_data` varchar(45) DEFAULT NULL,
  `3Mhz_data` varchar(45) DEFAULT NULL,
  `4Mhz_data` varchar(45) DEFAULT NULL,
  `5Mhz_data` varchar(45) DEFAULT NULL,
  `6Mhz_data` varchar(45) DEFAULT NULL,
  `7Mhz_data` varchar(45) DEFAULT NULL,
  `8Mhz_data` varchar(45) DEFAULT NULL,
  `9Mhz_data` varchar(45) DEFAULT NULL,
  `10Mhz_data` varchar(45) DEFAULT NULL,
  `11Mhz_data` varchar(45) DEFAULT NULL,
  `12Mhz_data` varchar(45) DEFAULT NULL,
  `13Mhz_data` varchar(45) DEFAULT NULL,
  `14Mhz_data` varchar(45) DEFAULT NULL,
  `15Mhz_data` varchar(45) DEFAULT NULL,
  `16Mhz_data` varchar(45) DEFAULT NULL,
  `17Mhz_data` varchar(45) DEFAULT NULL,
  `18Mhz_data` varchar(45) DEFAULT NULL,
  `19Mhz_data` varchar(45) DEFAULT NULL,
  `20Mhz_data` varchar(45) DEFAULT NULL,
  `21Mhz_data` varchar(45) DEFAULT NULL,
  `22Mhz_data` varchar(45) DEFAULT NULL,
  `23Mhz_data` varchar(45) DEFAULT NULL,
  `24Mhz_data` varchar(45) DEFAULT NULL,
  `25Mhz_data` varchar(45) DEFAULT NULL,
  `26Mhz_data` varchar(45) DEFAULT NULL,
  `27Mhz_data` varchar(45) DEFAULT NULL,
  `28Mhz_data` varchar(45) DEFAULT NULL,
  `29Mhz_data` varchar(45) DEFAULT NULL,
  `station_coordinates_lat` varchar(15) NOT NULL,
  `station_coordinates_long` varchar(15) NOT NULL,
  `Remote_Station_ID` varchar(45) NOT NULL,
  PRIMARY KEY (`id_hf_noise_data`) USING BTREE,
  KEY `Remote_Station_ID` (`Remote_Station_ID`),
  KEY `Time` (`Time`),
  KEY `Date` (`Date`)
) ENGINE=InnoDB AUTO_INCREMENT=507756 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-31 20:00:51
