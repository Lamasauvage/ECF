-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: db1
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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `guests` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `allergy` varchar(255) NOT NULL,
  `allergy_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `table_id` int DEFAULT NULL,
  `valid_until` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dishes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=498 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishes`
--

LOCK TABLES `dishes` WRITE;
/*!40000 ALTER TABLE `dishes` DISABLE KEYS */;
INSERT INTO `dishes` VALUES (41,'Crozets aux 4 fromages','Petites pâtes de sarrasin aux 4 fromages',12.50,'plat'),(42,'Tarte aux myrtilles','Tarte aux myrtilles servie avec de la crème fraîche',8.50,'dessert'),(43,'Tartiflette','Gratin de pommes de terre, reblochon, oignons et lardons',14.00,'plat'),(44,'Raclette','Une demi-roue de fromage fondu servie avec des pommes de terre et des cornichons',30.00,'plat'),(45,'Gratin dauphinois','Gratin de pommes de terre à la crème et au fromage',12.00,'plat'),(46,'Potée savoyarde','Ragoût à base de pommes de terre, de lard et de divers légumes',16.50,'plat'),(47,'Croûte aux morilles','Sauce crémeuse aux champignons servie sur du pain grillé',12.50,'entree'),(48,'Fondue de poireaux','Fondue de poireaux servie avec des croûtons',8.00,'entree'),(49,'Gâteau de Savoie','Gâteau éponge à la texture légère et aérée',7.50,'dessert'),(50,'Galette des Rois','Pâte traditionnelle française à base de pâte feuilletée et de frangipane',9.50,'dessert'),(51,'Tarte aux noix','Tarte aux noix à la croûte feuilletée',8.50,'dessert'),(55,'Crème brûlée','Crème pâtissière avec un dessus en sucre caramélisé',8.00,'dessert'),(56,'Bordeaux','Un vin rouge corsé avec des notes de cerise noire, de cassis et un soupçon de chêne',35.00,'vin'),(61,'Muscadet','Un vin blanc vif et léger, connu pour sa saveur vive et citronnée et sa minéralité',25.00,'vin'),(65,'Oeufs en meurette','Oeufs pochés dans une sauce au vin rouge avec du bacon, des champignons et des oignons',15.00,'entree'),(115,'Bavette à l\'échalote','Bavette de bœuf au beurre d\'échalote',19.50,'plat'),(116,'Bourgogne','Un vin rouge connu pour sa saveur riche et corsée et ses notes de cerise, de framboise et d\'épices',45.00,'vin'),(117,'Côtes du Rhône','Un vin rouge corsé connu pour son profil de saveur épicé et robuste et ses notes de fruits noirs, d\'herbes et d\'épices',30.00,'vin'),(118,'Châteauneuf-du-Pape','Un vin rouge corsé issu de l\'assemblage de plusieurs cépages et connu pour sa saveur riche et robuste et ses notes de fruits noirs, d\'épices et de tabac',60.00,'vin'),(119,'Sancerre','Un vin blanc sec et vif connu pour sa saveur fraîche et fruitée et ses notes d\'agrumes, de pomme verte et de minéralité',35.00,'vin'),(120,'Rosé Côtes de Provence','Un vin rosé sec et croquant, connu pour son goût vif et fruité et ses notes de fraise, de framboise et d\'agrumes',30.00,'vin'),(121,'Chardonnay','Un vin blanc corsé connu pour sa saveur riche et crémeuse et ses notes de fruits tropicaux, d\'agrumes et de vanille',40.00,'vin'),(122,'Escargots de savoie','Escargots cuits dans une sauce à l\'ail et au beurre, servis dans leurs coquilles',12.00,'entree'),(124,'Fondue savoyarde','Fromage fondu servi avec de la charcuterie, du pain et des pommes de terre',15.50,'plat'),(125,'Rognons de veau à la moutarde','Rognons de veau à la crème de moutarde',21.50,'plat'),(126,'Soupe à l\'oignon','Soupe à l\'oignon avec gruyère et croûtons accompagné d\'une tranche de pain grillé',8.50,'entree'),(127,'Salade savoyarde','Salade composée de charcuterie, de fromage et de pommes de terre',12.00,'entree'),(128,'Potage savoyard','Soupe de légumes consistante faite de pommes de terre, de poireaux et de carottes',8.00,'entree'),(129,'Tarte à l\'orange meringuée','Tarte à l\'orange surmontée d\'une meringue moelleuse',8.00,'dessert'),(130,'Burger savoyard','Burger au fromage de Savoie avec du bœuf et jambon cru accompagné de frites ou salade',15.00,'plat');
/*!40000 ALTER TABLE `dishes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `idGallery` int NOT NULL AUTO_INCREMENT,
  `titleGallery` longtext NOT NULL,
  `descriptionGallery` longtext NOT NULL,
  `imgFullNameGallery` longtext NOT NULL,
  `orderGallery` longtext NOT NULL,
  PRIMARY KEY (`idGallery`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (6,'Crème brûlée','Crème pâtissière avec un dessus en sucre caramélisé','creme-brulee.jpg.63dadec5a56339.65600952.jpg','1'),(7,'Crozets aux 4 fromages','Petites pâtes de sarrasin aux 4 fromages','crozets.jpg.63dadef9ee7d64.42006879.jpg','2'),(9,'Soupe à l\'oignon','Soupe à l\'oignon avec gruyère et croûtons accompagné d\'une tranche de pain grillé','soupe-oignon.63dadf601ecce7.03225940.jpg','4'),(10,'Tarte aux myrtilles','Tarte aux myrtilles servie avec de la crème fraîche','tarte-myrtille.jpg.63dadf9fc89452.54439037.jpg','5'),(11,'Tarte à l\'orange','Tarte à l\'orange surmontée d\'une meringue moelleuse','tarte-orange.jpg.63dadfee9bb698.19061732.jpg','6'),(12,'Burger savoyard','Burger au fromage de Savoie avec du bœuf et jambon cru accompagné de frites ou salade','burger-savoyard.63dae1e8aea1c0.15348983.jpg','7'),(13,'Fondue savoyarde','Fromage fondu servi avec de la charcuterie, du pain et des pommes de terre','fondue.jpg.63dae3288ab764.93203772.jpg','7'),(14,'Raclette','Une demi-roue de fromage fondu servie avec des pommes de terre et des cornichons','raclette.jpg.63dae35e8437e8.63863465.jpg','8'),(15,'Planche de charcuterie','Planche de charcuterie composé de jambon à l\'ancienne, fromages de Savoie et divers apéritifs','planche-charcuterie.jpg.63dae529e55b17.95414660.jpg','9'),(16,'Rognons de veau','Rognons de veau à la crème de moutarde	','rognon.jpg.63dae5c9a43bd3.12504089.jpg','10');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_capacity`
--

DROP TABLE IF EXISTS `restaurant_capacity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant_capacity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `capacity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_capacity`
--

LOCK TABLES `restaurant_capacity` WRITE;
/*!40000 ALTER TABLE `restaurant_capacity` DISABLE KEYS */;
INSERT INTO `restaurant_capacity` VALUES (1,80);
/*!40000 ALTER TABLE `restaurant_capacity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restauranthours`
--

DROP TABLE IF EXISTS `restauranthours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restauranthours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day` varchar(10) NOT NULL,
  `open_morning` time NOT NULL,
  `close_morning` time NOT NULL,
  `open_evening` time NOT NULL,
  `close_evening` time NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restauranthours`
--

LOCK TABLES `restauranthours` WRITE;
/*!40000 ALTER TABLE `restauranthours` DISABLE KEYS */;
INSERT INTO `restauranthours` VALUES (1,'Lundi','14:00:00','16:00:00','18:00:00','20:00:00',0),(2,'Mardi','12:00:00','14:30:00','19:30:00','22:00:00',1),(3,'Mercredi','12:00:00','14:30:00','19:30:00','22:00:00',1),(4,'Jeudi','12:00:00','14:30:00','19:30:00','22:00:00',1),(5,'Vendredi','12:00:00','14:30:00','19:30:00','22:00:00',1),(6,'Samedi','12:00:00','14:30:00','19:30:00','22:00:00',1),(7,'Dimanche','16:00:00','18:00:00','19:00:00','22:00:00',0);
/*!40000 ALTER TABLE `restauranthours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tables` (
  `available` int DEFAULT NULL,
  `table_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`table_id`),
  CONSTRAINT `available_check` CHECK ((`available` >= 0))
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES (20,1),(20,2),(20,3),(20,4),(20,5),(20,6),(20,7),(20,8),(20,9),(20,10),(20,11),(20,12),(20,13),(20,14),(20,15),(20,16),(20,17),(20,18),(20,19),(20,20),(20,21),(20,22),(20,23),(20,24),(20,25),(20,26),(20,27),(20,28),(20,29),(20,30),(20,31),(20,32),(20,33),(20,34),(20,35),(20,36),(20,37),(20,38),(20,39),(20,40),(20,41),(20,42),(20,43),(20,44),(20,45),(NULL,46);
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `guests` int NOT NULL DEFAULT '1',
  `allergy` tinyint(1) DEFAULT NULL,
  `allergy_type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@localhost.com','$2y$10$LZ/Nc3gUY.d6/RwohQ81Y.dDQSYDNDDDuDO7eLrbqp99iitR6ZpM.',1,1,0,''),(2,'allergyfish@test.com','$2y$10$uQ/TWLVAdbbApvx/CPGaTuNblkB25zBJ6uHbiq03jltpWHMZkTJpG',0,5,1,'fish');
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

-- Dump completed on 2023-02-18  5:38:00
