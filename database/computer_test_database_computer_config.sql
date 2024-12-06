-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: computer_test_database
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `computer_config`
--

DROP TABLE IF EXISTS `computer_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computer_config` (
  `Computer_config_ID` int NOT NULL AUTO_INCREMENT,
  `Computer_ID` int DEFAULT NULL,
  `Config_id` int DEFAULT NULL,
  PRIMARY KEY (`Computer_config_ID`),
  UNIQUE KEY `Computer_config_ID_UNIQUE` (`Computer_config_ID`),
  KEY `fk_Computer_config_Computer1_idx` (`Computer_ID`),
  KEY `fk_Computer_config_Config1_idx` (`Config_id`),
  CONSTRAINT `fk_Computer_config_Computer1` FOREIGN KEY (`Computer_ID`) REFERENCES `computer` (`Computer_ID`),
  CONSTRAINT `fk_Computer_config_Config1` FOREIGN KEY (`Config_id`) REFERENCES `config` (`Config_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computer_config`
--

LOCK TABLES `computer_config` WRITE;
/*!40000 ALTER TABLE `computer_config` DISABLE KEYS */;
INSERT INTO `computer_config` VALUES (1,1,1),(2,1,2),(3,2,1),(4,3,3),(5,2,4),(6,4,4),(7,4,2),(8,3,2);
/*!40000 ALTER TABLE `computer_config` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-21 14:15:17