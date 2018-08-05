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
-- Table structure for table `Remote_Station`
--

DROP TABLE IF EXISTS `Remote_Station`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Remote_Station` (
  `Remote_Station_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Station_Call_sign` varchar(45) NOT NULL,
  `Remote_station_coordinates_lat` varchar(45) NOT NULL,
  `Remote_station_coordinates_long` varchar(50) NOT NULL,
  `Station_URL` varchar(255) NOT NULL,
  `Remote_station_login_Key` varchar(45) NOT NULL,
  `Remote_station_Email_Address` varchar(45) NOT NULL,
  `Remote_Station_SMS_Number` varchar(45) NOT NULL,
  `Remote_Station_Address_1` varchar(45) DEFAULT NULL,
  `Remote_Station_Address_2` varchar(45) DEFAULT NULL,
  `Remote_Station_Address_3` text,
  `Remote_Station_Postal_Code` varchar(45) DEFAULT NULL,
  `Station_Description` text NOT NULL,
  `Remote_Station_Enabled` int(11) NOT NULL,
  `Remote_Station_date_enabled` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Remote_Station_login_Key_retry_count` int(11) DEFAULT NULL,
  `Last_Data_insert` datetime DEFAULT NULL COMMENT 'Date when last data was updated.',
  PRIMARY KEY (`Remote_Station_ID`),
  UNIQUE KEY `Station_Call_sign_UNIQUE` (`Station_Call_sign`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-31 20:00:56
