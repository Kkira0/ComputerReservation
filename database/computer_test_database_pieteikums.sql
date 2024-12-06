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
-- Table structure for table `pieteikums`
--

DROP TABLE IF EXISTS `pieteikums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pieteikums` (
  `pieteikuma_id` int NOT NULL AUTO_INCREMENT,
  `Computers` varchar(50) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` enum('declined','approved','pending') DEFAULT 'pending',
  PRIMARY KEY (`pieteikuma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pieteikums`
--

LOCK TABLES `pieteikums` WRITE;
/*!40000 ALTER TABLE `pieteikums` DISABLE KEYS */;
INSERT INTO `pieteikums` VALUES (1,'Computer 3, Computer 4','2024-11-21 12:00:00','2024-11-21 15:00:00','Kristaps','Kristaps',26260655,NULL,'logs@gmail.com','pending'),(2,NULL,'2024-11-27 16:54:00','2024-11-29 16:52:00','Janis','Ozols',23456789,NULL,'janis@gmail.com',NULL),(3,NULL,'2024-11-27 16:54:00','2024-11-29 16:52:00','Janis','Ozols',23456789,NULL,'janis@gmail.com',NULL),(4,NULL,'2024-11-23 18:00:00','2024-11-30 19:00:00','Elza','Bumbiere',12345678,NULL,'aa@gmail.com',NULL),(5,NULL,'2024-11-23 18:00:00','2024-11-30 19:00:00','Elza','Bumbiere',12345678,NULL,'aa@gmail.com',NULL),(6,NULL,'2024-11-27 15:06:00','2024-12-01 15:06:00','AAA','BBB',11223344,NULL,'aa@gmail.com',NULL),(7,NULL,'2024-11-27 15:06:00','2024-12-01 15:06:00','AAA','BBB',11223344,NULL,'aa@gmail.com',NULL),(8,NULL,'2024-12-07 21:06:00','2024-12-08 15:12:00','AAACCC','BBB',11223344,NULL,'aa@gmail.com',NULL),(9,NULL,'2024-11-21 20:30:00','2024-12-08 20:30:00','aaaaaaaaaaaaaaaabbbbbb','cccccccccccc',1111111,NULL,'aas@gmail.com','pending'),(10,NULL,'2024-11-21 20:30:00','2024-12-08 20:30:00','aaaaaaaaaaaaaaaabbbbbb','cccccccccccc',1111111,NULL,'aas@gmail.com','pending'),(11,NULL,'2024-11-21 20:30:00','2024-12-08 20:30:00','aaaaaaaaaaaaaaaabbbbbb','cccccccccccc',1111111,NULL,'aas@gmail.com','pending'),(12,NULL,'2024-12-02 19:42:00','2024-12-07 20:43:00','a','a',12389076,NULL,'a@gmail.com','pending'),(13,NULL,'2024-11-25 15:49:00','2024-12-06 21:49:00','asas','sdsd',34534534,NULL,'sfsfj@gmail.com','pending'),(14,NULL,'2024-11-25 16:11:00','2024-11-29 21:12:00','cc','c',123,NULL,'c@gmail.com','pending'),(15,NULL,'2024-12-04 16:14:00','2024-12-07 16:15:00','cc','c',123,NULL,'c@gmail.com','pending'),(16,NULL,'2024-11-26 10:57:00','2024-11-28 10:57:00','asas','sdsd',34534534,NULL,'sfsfj@gmail.com','pending'),(17,'2','2024-11-28 15:26:00','2024-12-07 16:27:00','nnnnnnn','mmmmmmmm',12365498,NULL,'m@gmail.com','pending'),(18,NULL,'2024-12-08 11:25:00','2025-01-25 11:25:00','nnnnnnn','mmmmmmmm',12365498,NULL,'m@gmail.com','pending'),(19,'1','2024-11-27 11:34:00','2024-11-29 11:34:00','AAA','BBB',11223344,NULL,'aa@gmail.com','pending'),(20,'2','2024-11-28 12:12:00','2024-12-06 12:12:00','asas','sdsd',34534534,NULL,'sfsfj@gmail.com','pending'),(21,'1','2024-12-04 12:16:00','2024-12-07 12:16:00','asas','sdsd',34534534,NULL,'sfsfj@gmail.com','pending'),(22,'3','2024-11-29 10:40:00','2024-11-30 10:40:00','kira','koks',12091209,NULL,'kira@gmail.com','pending');
/*!40000 ALTER TABLE `pieteikums` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-28 11:35:25
