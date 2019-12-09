-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: doe
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `postinfo`
--

DROP TABLE IF EXISTS `postinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postinfo` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `topic` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foundtime` datetime(6) NOT NULL,
  `tag` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `replys` int(11) NOT NULL DEFAULT '0',
  `usrid` int(11) NOT NULL,
  `usrname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`postid`,`usrid`),
  UNIQUE KEY `postnum_UNIQUE` (`postid`),
  KEY `usrid_idx` (`usrid`),
  KEY `usrname_idx` (`usrname`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postinfo`
--

LOCK TABLES `postinfo` WRITE;
/*!40000 ALTER TABLE `postinfo` DISABLE KEYS */;
INSERT INTO `postinfo` VALUES (1,'试验设计课程网页简介','本网站由Vertex制作，网页组负责维护，有问题请联系mfxszx@163.com','2019-12-06 21:38:25.000000','网站简介',0,0,0,'admin'),(2,'本贴仅作为测试之用','本网站由Vertex制作，网页组负责维护，有问题请联系mfxszx@163.com','2019-12-07 00:47:10.000000','网站简介',0,0,0,'admin'),(3,'测试主题','测试内容','2019-12-07 11:21:05.000000','测试',0,0,0,'admin'),(4,'测试主题','测试内容','2019-12-07 11:27:42.000000','测试',0,0,0,'admin'),(5,'测试主题2','本贴仅做测试只用','2019-12-07 11:28:26.000000','测试',0,0,0,'admin'),(6,'测试主题3','本贴仅做测试只用','2019-12-07 11:32:35.000000','测试',0,0,0,'admin'),(7,'测试主题3','本贴仅做测试只用','2019-12-07 11:33:37.000000','测试',0,0,0,'admin'),(8,'测试主题3','本贴仅做测试只用','2019-12-07 13:32:52.000000','测试',0,0,0,'admin'),(9,'测试主题','这是一个测试主题。','2019-12-08 14:00:34.000000','测试',0,0,1,'test');
/*!40000 ALTER TABLE `postinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ranks` (
  `rankerid` int(11) NOT NULL,
  `rankername` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rankedid` int(11) NOT NULL,
  `rankedname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `r1` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r2` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r3` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r4` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r5` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r6` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r7` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r8` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r9` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `r10` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  `rankscol` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'None',
  PRIMARY KEY (`rankerid`,`rankedid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replys`
--

DROP TABLE IF EXISTS `replys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `replys` (
  `replyid` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usrid` int(11) NOT NULL,
  `sendtime` datetime(6) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `usrname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`replyid`),
  UNIQUE KEY `replynum_UNIQUE` (`replyid`),
  KEY `postnum_idx` (`postid`),
  KEY `usrid_idx` (`usrid`),
  CONSTRAINT `usrid` FOREIGN KEY (`usrid`) REFERENCES `usrinfo` (`usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replys`
--

LOCK TABLES `replys` WRITE;
/*!40000 ALTER TABLE `replys` DISABLE KEYS */;
INSERT INTO `replys` VALUES (1,1,'测试回复',0,'2019-12-08 01:43:44.000000',0,'admin'),(2,1,'这是一个测试回复',0,'2019-12-08 01:46:16.000000',0,'admin'),(3,1,'这是一个测试回复',0,'2019-12-08 01:46:32.000000',0,'admin'),(4,1,'这是一个测试回复',0,'2019-12-08 01:46:35.000000',0,'admin'),(5,1,'这还是一个测试回复',1,'2019-12-08 01:50:55.000000',0,'test'),(6,2,'这也是回复测试',1,'2019-12-08 03:28:45.000000',0,'test'),(7,2,'这也是回复测试',1,'2019-12-08 03:29:56.000000',0,'test'),(8,2,'这也是回复测试',1,'2019-12-08 03:32:20.000000',0,'test'),(9,2,'再来回复一个',1,'2019-12-08 03:32:38.000000',0,'test'),(10,1,'这是用这个回复的',1,'2019-12-08 03:34:36.000000',0,'test'),(11,9,'已经测试通过',1,'2019-12-08 14:14:14.000000',0,'test'),(12,5,'hahahah\r\n',1,'2019-12-09 08:52:00.000000',0,'test');
/*!40000 ALTER TABLE `replys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usrinfo`
--

DROP TABLE IF EXISTS `usrinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usrinfo` (
  `usrid` int(20) NOT NULL,
  `usrname` varchar(45) NOT NULL,
  `passwd` varchar(45) NOT NULL,
  `discription` varchar(45) DEFAULT 'None',
  `type` int(11) NOT NULL DEFAULT '1',
  `groupname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`usrid`),
  UNIQUE KEY `usrid_UNIQUE` (`usrid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usrinfo`
--

LOCK TABLES `usrinfo` WRITE;
/*!40000 ALTER TABLE `usrinfo` DISABLE KEYS */;
INSERT INTO `usrinfo` VALUES (0,'admin','43be5923a83b75c76cc0afc379e58bf3','The first user of this system',0,NULL),(1,'test','81dc9bdb52d04dc20036dbd8313ed055','this is a test account.',1,NULL),(2,'讲课佬','md5(1234)','None',1,'jiangke');
/*!40000 ALTER TABLE `usrinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'doe'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-10  2:01:57
