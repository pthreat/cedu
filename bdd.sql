-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: noticias_phpescas
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `publishDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Aumento el precio de los cigarros a un 50%','Los ansiosos fumadores, se agolpan frente a las puertas de las tabacaleras prendiendo gomas y rompiendo todo','Algun piquetero rebelde','2015-03-25 20:52:42'),(2,'Lanus casi puntero','A un paso de la punta el bordolino se acerca peligrosamente a tomar las riendas del campeonato','bueno aca ya no me esmero tanto porque no se nada de futbol','2015-03-25 20:54:29'),(3,'Prueba de hoy','encabezado de hoy','cuerpo de hoy','2015-04-06 20:13:29'),(4,'asdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljas','asdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljas','<p>asdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljasasdjkasjkdljas</p>\r\n','2015-04-13 21:15:20'),(5,'un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo ','un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado ','<p>Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;</p>\r\n','2015-04-13 21:46:24'),(6,'un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo ','un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado ','<p>Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;</p>\r\n','2015-04-13 21:46:54'),(7,'un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo un titulo ','un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado un encabezado ','<p>Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;Un cuerpo&nbsp;</p>\r\n','2015-04-13 21:47:26');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcategories`
--

DROP TABLE IF EXISTS `pcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcategories`
--

LOCK TABLES `pcategories` WRITE;
/*!40000 ALTER TABLE `pcategories` DISABLE KEYS */;
INSERT INTO `pcategories` VALUES (1,'Zapatillas'),(2,'Indumentaria'),(3,'Calzado'),(4,'Deportes'),(5,'Lenceria'),(6,'Insumos de computacion');
/*!40000 ALTER TABLE `pcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productcategoriesrelation`
--

DROP TABLE IF EXISTS `productcategoriesrelation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productcategoriesrelation` (
  `product` int(10) unsigned NOT NULL,
  `pcategory` int(10) unsigned NOT NULL,
  PRIMARY KEY (`product`,`pcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productcategoriesrelation`
--

LOCK TABLES `productcategoriesrelation` WRITE;
/*!40000 ALTER TABLE `productcategoriesrelation` DISABLE KEYS */;
INSERT INTO `productcategoriesrelation` VALUES (1,3),(1,4);
/*!40000 ALTER TABLE `productcategoriesrelation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(10000) NOT NULL,
  `price` double unsigned NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Zapatillas adidas','Re buenas para el picadito de los viernes a la noche. Aunque yo &nbsp;no juegue al futbol.\r\n',0,10),(5,'Chomba gris polo','Chomba re TOP para caretearla con mis amigos del Jockey Club\r\n',0,12),(6,'Chomba gris polo','Chomba re TOP para caretearla con mis amigos del Jockey Club\r\n',0,12),(7,'Chomba gris polo','Chomba re TOP para caretearla con mis amigos del Jockey Club\r\n',0,12);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(120) NOT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jpfstange@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `hash` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,'Creacion de la espada Arya de game of thrones','CouB9aQ9vvc'),(2,'Espada Berserk (man at arms)','8Nwh8yWh5WU'),(3,'Espada de Inuyasha','S1n94I_XYnk'),(4,'Ninja trucho','8m3r-0XTP84'),(5,'Ninja trucho','8m3r-0XTP84'),(6,'Charlas de omegle','vB21-kz1TTE'),(7,'Charlas de omegle','lakjsdlkjaslkdj'),(8,'Charlas de omegle','12309210qoieopqwieop'),(9,'Fruta','alskjdlÃ±kaslÃ±dkasd'),(10,'test 1','8m3r-0XTP84'),(11,'Axel y que','pM2S99_JQvU');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-20 22:02:59
