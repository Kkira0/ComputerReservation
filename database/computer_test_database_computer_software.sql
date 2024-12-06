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
-- Table structure for table `computer_software`
--

DROP TABLE IF EXISTS `computer_software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computer_software` (
  `Computer_software_ID` int NOT NULL AUTO_INCREMENT,
  `Computer_ID` int DEFAULT NULL,
  `Software_ID` int DEFAULT NULL,
  PRIMARY KEY (`Computer_software_ID`),
  UNIQUE KEY `Computer_software_ID_UNIQUE` (`Computer_software_ID`),
  KEY `fk_Computer_software_Software1_idx` (`Software_ID`),
  KEY `fk_Computer_software_Computer1_idx` (`Computer_ID`),
  CONSTRAINT `fk_Computer_software_Computer1` FOREIGN KEY (`Computer_ID`) REFERENCES `computer` (`Computer_ID`),
  CONSTRAINT `fk_Computer_software_Software1` FOREIGN KEY (`Software_ID`) REFERENCES `software` (`Software_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computer_software`
--

LOCK TABLES `computer_software` WRITE;
/*!40000 ALTER TABLE `computer_software` DISABLE KEYS */;
INSERT INTO `computer_software` VALUES (1,1,2),(2,1,3),(3,2,3),(4,3,1),(5,4,4);
/*!40000 ALTER TABLE `computer_software` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-21 14:15:18
