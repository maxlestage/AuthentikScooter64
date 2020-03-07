CREATE DATABASE  IF NOT EXISTS `authentikscooter` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `authentikscooter`;
-- MySQL dump 10.13  Distrib 8.0.17, for osx10.14 (x86_64)
--
-- Host: localhost    Database: authentikscooter
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES (5,'Piaggio'),(6,'LML');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scooter`
--

DROP TABLE IF EXISTS `scooter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scooter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) NOT NULL,
  `model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `km` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `cylinder` int(11) NOT NULL,
  `engine` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scooter`
--

LOCK TABLES `scooter` WRITE;
/*!40000 ALTER TABLE `scooter` DISABLE KEYS */;
INSERT INTO `scooter` VALUES (24,6,'A2R','COLORMAX',1995,6990,150,2),(25,6,'STAR','Uni',1995,2490,150,0),(26,6,'STAR','Bicolore',1000,2690,125,0),(27,6,'STAR','Uni',1000,2390,125,4),(28,6,'STAR','Bicolore',1000,2590,125,4),(29,6,'STAR','Uni',1000,2790,200,4),(30,6,'STAR','Uni',1995,2490,125,2),(31,5,'PX','COLORMAX',1995,9990,125,2),(32,5,'PX','ROSSO DRAGON',1000,6790,125,2),(33,5,'PX','NERO LUCIDO',1000,5190,125,2),(34,5,'PX','MONTEBIANCO',1000,7900,125,2),(35,5,'PX','AZZURRO MEDITERRANNEO',1000,4790,125,2),(36,5,'S','COLORMAX',1995,7790,50,0),(37,5,'S','ROSSO DRAGON',1000,5790,50,0),(38,5,'S','NERO LUCIDO',1000,4190,50,0),(39,5,'S','MONTEBIANCO',1000,3450,50,0),(40,5,'S','AZZURRO MEDITERRANNEO',1000,3190,50,0),(41,5,'GTS','COLORMAX',1995,9990,125,0),(42,5,'GTS','ROSSO DRAGON',1000,6790,125,0),(43,5,'GTS','NERO LUCIDO',1000,5190,125,0),(44,5,'GTS','MONTEBIANCO',1000,9850,125,0),(45,5,'GTS','AZZURRO MEDITERRANNEO',1000,4790,125,0),(46,5,'GTS','COLORMAX',1995,19990,300,0),(47,5,'GTS','ROSSO DRAGON',1000,16790,300,0),(48,5,'GTS','NERO LUCIDO',1000,15190,300,0),(49,5,'GTS','MONTEBIANCO',1000,19780,300,0),(50,5,'GTS','AZZURRO MEDITERRANNEO',1000,14790,300,0),(51,5,'GTV','COLORMAX',1995,19990,300,0),(52,5,'GTV','ROSSO DRAGON',1000,12980,300,0),(53,5,'GTV','NERO LUCIDO',1000,9190,300,0),(54,5,'GTV','MONTEBIANCO',1000,9880,300,0),(55,5,'GTV','AZZURRO MEDITERRANNEO',1000,18790,300,0),(56,5,'LXV','COLORMAX',1995,11990,125,0),(57,5,'LXV','ROSSO DRAGON',1000,7890,125,0),(58,5,'LXV','NERO LUCIDO',1000,5990,125,0),(59,5,'LXV','MONTEBIANCO',1000,8900,125,0),(60,5,'LXV','AZZURRO MEDITERRANNEO',1000,4990,125,0);
/*!40000 ALTER TABLE `scooter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-13 15:48:07