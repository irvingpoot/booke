-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: booke
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bookIsbn` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookTitle` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookAuthor` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookEdition` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookCategory` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookStock` int DEFAULT NULL,
  `imagen` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookPrice` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (20,'9786073836609','Elon Musk',' Walter Isaacson','3ra Edición','Negocios y Finanzas',30,'1.jpeg',549.00),(17,'9786073836159','Una historia en cada hijo te dio',' Gerardo Australia','1ra Edición','Historia',30,'4.jpeg',399.00),(18,'9786075578354','Los Divagantes',' Guadalupe Nettel','2da Edición','Literatura y Novela',30,'3.jpeg',320.00),(19,'9786073906036','La mesa herida','Laura Martínez-Belli','3ra Edición','Literatura y Novela',30,'2.jpeg',348.00),(15,'9786073830423','Hijos del Neoliberalismo','Ana Lilia Pérez','1ra Edición','Historia',30,'6.jpeg',299.00),(16,'9788419654205','Gran guía visual del cosmos',' Toshifumi Fumatase','2da Edición','Ciencia y Naturaleza',30,'5.jpeg',469.00);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userFirstName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userLastName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userEmail` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userPassword` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Fernando','Joachin','admin@correo.com','helado123',1),(2,'José Carlos','Leo','correo@correo.com','helado123',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-01 18:06:59