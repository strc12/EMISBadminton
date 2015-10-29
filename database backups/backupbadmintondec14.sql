-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: badminton
-- ------------------------------------------------------
-- Server version	5.5.40-0+wheezy1

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
-- Table structure for table `Players`
--

DROP TABLE IF EXISTS `Players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Players` (
  `name` varchar(40) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `schoolid` int(11) DEFAULT NULL,
  `playerid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`playerid`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Players`
--

LOCK TABLES `Players` WRITE;
/*!40000 ALTER TABLE `Players` DISABLE KEYS */;
INSERT INTO `Players` VALUES ('Jack Ireson','M',3,1),('Felix Tom','M',3,2),('Alex Mason','M',3,3),('Winnie Liu','F',3,4),('Stella Ma','F',3,5),('Sarah Boyle','F',3,6),('James','M',5,7),('Derek','M',5,8),('Harry','M',5,9),('Tweedie','F',5,10),('Tessie','F',5,11),('Vivian','F',5,12),('Yontham','M',8,13),('Jack','M',8,14),('Conrad','M',8,15),('Ada','F',8,16),('Florence','F',8,17),('Veronika','F',8,18),('Dean','M',6,19),('Chou','M',6,20),('Matthew','M',6,21),('Becky','F',6,22),('Millie','F',6,23),('Izzie','F',6,24),('Darshil','M',1,25),('Chris','M',1,26),('George','M',1,27),('Polina','F',1,28),('meg','F',1,29),('Jenny','F',1,30),('Anthony','M',7,31),('Elvis','M',7,32),('Roger','M',7,33),('Miliena','F',7,34),('Geena','F',7,35),('Rosie','F',7,36),('Terrence','M',7,37),('Vera','F',7,38),('Mick','M',5,39),('Amy','F',2,40),('Ellie','F',2,41),('Eleanor','F',2,42),('Simon','M',2,43),('Brian','M',2,44),('Henry','M',2,45),('Jemima','F',4,46),('Sophie Crowe','F',4,47),('Tori Reece Hamshire','F',4,48),('Matt Clayton','M',4,49),('Will Ashton','M',4,50),('Xander Weinand','M',4,51),('Jack Kelly','M',6,52),('Rhianne','F',6,53),('Rutwik','M',6,54),('Nick','M',6,55),('Tash','F',1,56),('Jemima','F',3,57),('Christie','F',7,58),('Lauren King','F',4,59),('Vera','F',8,60),('Roger','M',8,61),('Emma','F',8,62),('Nick','M',5,63),('Yontham','M',7,64),('Marcus','M',6,65),('Alvin','M',8,66),('Sarah Boyle','F',4,67),('Amber','F',2,68),('Reema','F',2,69),('Christie','F',8,70),('Sophie Crowe','F',3,71),('Rachel Pearson','F',4,72),('Jaren Liu','M',4,73),('Terrence','M',8,74),('Meg','F',2,75),('Tash','F',2,76),('Lara Haughney','F',4,77),('Amy','F',1,78),('Eleanor','F',1,79),('Abi','F',1,80),('Ellie','F',1,81),('billy','M',2,82),('Charlie','F',6,83),('Lily','F',6,84);
/*!40000 ALTER TABLE `Players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixtures`
--

DROP TABLE IF EXISTS `fixtures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixtures` (
  `homeschoolid` int(11) DEFAULT NULL,
  `awayschoolid` int(11) DEFAULT NULL,
  `matchdate` date DEFAULT NULL,
  `awayscoregames` int(11) DEFAULT NULL,
  `homescoregames` int(11) DEFAULT NULL,
  `fixtureid` int(11) NOT NULL AUTO_INCREMENT,
  `resultentered` int(1) DEFAULT NULL,
  PRIMARY KEY (`fixtureid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixtures`
--

LOCK TABLES `fixtures` WRITE;
/*!40000 ALTER TABLE `fixtures` DISABLE KEYS */;
INSERT INTO `fixtures` VALUES (3,5,'2014-09-23',9,9,1,1),(4,6,'2014-09-23',7,11,2,1),(1,3,'2014-09-25',15,3,3,1),(2,4,'2014-09-25',17,1,4,1),(7,1,'2014-09-30',0,18,5,1),(8,2,'2014-09-30',3,15,6,1),(5,7,'2014-10-07',3,15,7,1),(6,8,'2014-10-07',4,14,8,1),(7,3,'2014-10-09',5,13,9,1),(8,4,'2014-10-09',5,13,10,1),(1,5,'2014-10-14',NULL,NULL,11,0),(2,6,'2014-10-14',NULL,NULL,12,0),(5,3,'2014-10-28',10,8,13,1),(6,4,'2014-10-28',7,11,14,1),(5,1,'2014-11-04',2,16,15,1),(6,2,'2014-11-04',5,13,16,1),(3,1,'2014-11-13',2,16,17,1),(4,2,'2014-11-13',4,14,18,1),(1,7,'2014-11-25',15,3,19,1),(2,8,'2014-11-25',14,4,20,1),(3,7,'2014-11-29',16,2,21,1),(4,8,'2014-11-29',16,2,22,1),(7,5,'2014-12-02',10,8,23,1),(8,6,'2014-12-02',10,8,24,1),(5,6,'2014-10-16',3,15,25,1),(3,4,'2014-09-11',4,14,26,1),(4,3,'2014-09-18',17,1,27,1),(5,6,'2014-10-16',3,15,28,1);
/*!40000 ALTER TABLE `fixtures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `name` varchar(255) DEFAULT NULL,
  `teacher` varchar(40) DEFAULT NULL,
  `schoolid` int(11) NOT NULL AUTO_INCREMENT,
  `gamesplayed` int(3) DEFAULT NULL,
  `pointsfor` int(10) DEFAULT NULL,
  `pointsagainst` int(10) DEFAULT NULL,
  `gameslost` int(10) DEFAULT NULL,
  `gameswon` int(10) DEFAULT NULL,
  PRIMARY KEY (`schoolid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES ('Oakham A','Rose Griffiths',1,5,1079,1844,80,10),('Oakham B','Rose Griffiths',2,5,1346,1793,73,17),('Oundle A','Rob Cunniffe',3,8,2658,2303,56,88),('Oundle B','Rob Cunniffe',4,8,2396,2664,83,61),('Stamford A','Lorna Blissett',5,7,2430,1831,38,88),('Stamford B','Lorna Blissett',6,7,2103,2233,65,61),('Uppingham A','Helen Johnston',7,6,2030,1650,35,73),('Uppingham B','Helen Johnston',8,6,2032,1756,38,70);
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-09 17:41:30
