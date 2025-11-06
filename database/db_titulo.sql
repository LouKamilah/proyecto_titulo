-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: db_titulo
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calendario` (
  `fecha` date NOT NULL,
  `anio` int NOT NULL,
  `mes` int NOT NULL,
  `nombremes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `trimestre` int NOT NULL,
  `semana` int NOT NULL,
  `dia` int NOT NULL,
  `nombreDia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `diaSemana` int NOT NULL,
  PRIMARY KEY (`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario`
--

LOCK TABLES `calendario` WRITE;
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
INSERT INTO `calendario` VALUES ('2025-01-01',2025,1,'January',1,52,1,'Sunday',7),('2025-01-02',2025,1,'January',1,1,2,'Monday',1),('2025-01-03',2025,1,'January',1,1,3,'Tuesday',2),('2025-01-04',2025,1,'January',1,1,4,'Wednesday',3),('2025-01-05',2025,1,'January',1,1,5,'Thursday',4),('2025-01-06',2025,1,'January',1,1,6,'Friday',5),('2025-01-07',2025,1,'January',1,1,7,'Saturday',6),('2025-01-08',2025,1,'January',1,1,8,'Sunday',7),('2025-01-09',2025,1,'January',1,2,9,'Monday',1),('2025-01-10',2025,1,'January',1,2,10,'Tuesday',2),('2025-01-11',2025,1,'January',1,2,11,'Wednesday',3),('2025-01-12',2025,1,'January',1,2,12,'Thursday',4),('2025-01-13',2025,1,'January',1,2,13,'Friday',5),('2025-01-14',2025,1,'January',1,2,14,'Saturday',6),('2025-01-15',2025,1,'January',1,2,15,'Sunday',7),('2025-01-16',2025,1,'January',1,3,16,'Monday',1),('2025-01-17',2025,1,'January',1,3,17,'Tuesday',2),('2025-01-18',2025,1,'January',1,3,18,'Wednesday',3),('2025-01-19',2025,1,'January',1,3,19,'Thursday',4),('2025-01-20',2025,1,'January',1,3,20,'Friday',5),('2025-01-21',2025,1,'January',1,3,21,'Saturday',6),('2025-01-22',2025,1,'January',1,3,22,'Sunday',7),('2025-01-23',2025,1,'January',1,4,23,'Monday',1),('2025-01-24',2025,1,'January',1,4,24,'Tuesday',2),('2025-01-25',2025,1,'January',1,4,25,'Wednesday',3),('2025-01-26',2025,1,'January',1,4,26,'Thursday',4),('2025-01-27',2025,1,'January',1,4,27,'Friday',5),('2025-01-28',2025,1,'January',1,4,28,'Saturday',6),('2025-01-29',2025,1,'January',1,4,29,'Sunday',7),('2025-01-30',2025,1,'January',1,5,30,'Monday',1),('2025-01-31',2025,1,'January',1,5,31,'Tuesday',2),('2025-02-01',2025,2,'February',1,5,1,'Wednesday',3),('2025-02-02',2025,2,'February',1,5,2,'Thursday',4),('2025-02-03',2025,2,'February',1,5,3,'Friday',5),('2025-02-04',2025,2,'February',1,5,4,'Saturday',6),('2025-02-05',2025,2,'February',1,5,5,'Sunday',7),('2025-02-06',2025,2,'February',1,6,6,'Monday',1),('2025-02-07',2025,2,'February',1,6,7,'Tuesday',2),('2025-02-08',2025,2,'February',1,6,8,'Wednesday',3),('2025-02-09',2025,2,'February',1,6,9,'Thursday',4),('2025-02-10',2025,2,'February',1,6,10,'Friday',5),('2025-02-11',2025,2,'February',1,6,11,'Saturday',6),('2025-02-12',2025,2,'February',1,6,12,'Sunday',7),('2025-02-13',2025,2,'February',1,7,13,'Monday',1),('2025-02-14',2025,2,'February',1,7,14,'Tuesday',2),('2025-02-15',2025,2,'February',1,7,15,'Wednesday',3),('2025-02-16',2025,2,'February',1,7,16,'Thursday',4),('2025-02-17',2025,2,'February',1,7,17,'Friday',5),('2025-02-18',2025,2,'February',1,7,18,'Saturday',6),('2025-02-19',2025,2,'February',1,7,19,'Sunday',7),('2025-02-20',2025,2,'February',1,8,20,'Monday',1),('2025-02-21',2025,2,'February',1,8,21,'Tuesday',2),('2025-02-22',2025,2,'February',1,8,22,'Wednesday',3),('2025-02-23',2025,2,'February',1,8,23,'Thursday',4),('2025-02-24',2025,2,'February',1,8,24,'Friday',5),('2025-02-25',2025,2,'February',1,8,25,'Saturday',6),('2025-02-26',2025,2,'February',1,8,26,'Sunday',7),('2025-02-27',2025,2,'February',1,9,27,'Monday',1),('2025-02-28',2025,2,'February',1,9,28,'Tuesday',2),('2025-03-01',2025,3,'March',1,9,1,'Wednesday',3),('2025-03-02',2025,3,'March',1,9,2,'Thursday',4),('2025-03-03',2025,3,'March',1,9,3,'Friday',5),('2025-03-04',2025,3,'March',1,9,4,'Saturday',6),('2025-03-05',2025,3,'March',1,9,5,'Sunday',7),('2025-03-06',2025,3,'March',1,10,6,'Monday',1),('2025-03-07',2025,3,'March',1,10,7,'Tuesday',2),('2025-03-08',2025,3,'March',1,10,8,'Wednesday',3),('2025-03-09',2025,3,'March',1,10,9,'Thursday',4),('2025-03-10',2025,3,'March',1,10,10,'Friday',5),('2025-03-11',2025,3,'March',1,10,11,'Saturday',6),('2025-03-12',2025,3,'March',1,10,12,'Sunday',7),('2025-03-13',2025,3,'March',1,11,13,'Monday',1),('2025-03-14',2025,3,'March',1,11,14,'Tuesday',2),('2025-03-15',2025,3,'March',1,11,15,'Wednesday',3),('2025-03-16',2025,3,'March',1,11,16,'Thursday',4),('2025-03-17',2025,3,'March',1,11,17,'Friday',5),('2025-03-18',2025,3,'March',1,11,18,'Saturday',6),('2025-03-19',2025,3,'March',1,11,19,'Sunday',7),('2025-03-20',2025,3,'March',1,12,20,'Monday',1),('2025-03-21',2025,3,'March',1,12,21,'Tuesday',2),('2025-03-22',2025,3,'March',1,12,22,'Wednesday',3),('2025-03-23',2025,3,'March',1,12,23,'Thursday',4),('2025-03-24',2025,3,'March',1,12,24,'Friday',5),('2025-03-25',2025,3,'March',1,12,25,'Saturday',6),('2025-03-26',2025,3,'March',1,12,26,'Sunday',7),('2025-03-27',2025,3,'March',1,13,27,'Monday',1),('2025-03-28',2025,3,'March',1,13,28,'Tuesday',2),('2025-03-29',2025,3,'March',1,13,29,'Wednesday',3),('2025-03-30',2025,3,'March',1,13,30,'Thursday',4),('2025-03-31',2025,3,'March',1,13,31,'Friday',5),('2025-04-01',2025,4,'April',2,13,1,'Saturday',6),('2025-04-02',2025,4,'April',2,13,2,'Sunday',7),('2025-04-03',2025,4,'April',2,14,3,'Monday',1),('2025-04-04',2025,4,'April',2,14,4,'Tuesday',2),('2025-04-05',2025,4,'April',2,14,5,'Wednesday',3),('2025-04-06',2025,4,'April',2,14,6,'Thursday',4),('2025-04-07',2025,4,'April',2,14,7,'Friday',5),('2025-04-08',2025,4,'April',2,14,8,'Saturday',6),('2025-04-09',2025,4,'April',2,14,9,'Sunday',7),('2025-04-10',2025,4,'April',2,15,10,'Monday',1),('2025-04-11',2025,4,'April',2,15,11,'Tuesday',2),('2025-04-12',2025,4,'April',2,15,12,'Wednesday',3),('2025-04-13',2025,4,'April',2,15,13,'Thursday',4),('2025-04-14',2025,4,'April',2,15,14,'Friday',5),('2025-04-15',2025,4,'April',2,15,15,'Saturday',6),('2025-04-16',2025,4,'April',2,15,16,'Sunday',7),('2025-04-17',2025,4,'April',2,16,17,'Monday',1),('2025-04-18',2025,4,'April',2,16,18,'Tuesday',2),('2025-04-19',2025,4,'April',2,16,19,'Wednesday',3),('2025-04-20',2025,4,'April',2,16,20,'Thursday',4),('2025-04-21',2025,4,'April',2,16,21,'Friday',5),('2025-04-22',2025,4,'April',2,16,22,'Saturday',6),('2025-04-23',2025,4,'April',2,16,23,'Sunday',7),('2025-04-24',2025,4,'April',2,17,24,'Monday',1),('2025-04-25',2025,4,'April',2,17,25,'Tuesday',2),('2025-04-26',2025,4,'April',2,17,26,'Wednesday',3),('2025-04-27',2025,4,'April',2,17,27,'Thursday',4),('2025-04-28',2025,4,'April',2,17,28,'Friday',5),('2025-04-29',2025,4,'April',2,17,29,'Saturday',6),('2025-04-30',2025,4,'April',2,17,30,'Sunday',7),('2025-05-01',2025,5,'May',2,18,1,'Monday',1),('2025-05-02',2025,5,'May',2,18,2,'Tuesday',2),('2025-05-03',2025,5,'May',2,18,3,'Wednesday',3),('2025-05-04',2025,5,'May',2,18,4,'Thursday',4),('2025-05-05',2025,5,'May',2,18,5,'Friday',5),('2025-05-06',2025,5,'May',2,18,6,'Saturday',6),('2025-05-07',2025,5,'May',2,18,7,'Sunday',7),('2025-05-08',2025,5,'May',2,19,8,'Monday',1),('2025-05-09',2025,5,'May',2,19,9,'Tuesday',2),('2025-05-10',2025,5,'May',2,19,10,'Wednesday',3),('2025-05-11',2025,5,'May',2,19,11,'Thursday',4),('2025-05-12',2025,5,'May',2,19,12,'Friday',5),('2025-05-13',2025,5,'May',2,19,13,'Saturday',6),('2025-05-14',2025,5,'May',2,19,14,'Sunday',7),('2025-05-15',2025,5,'May',2,20,15,'Monday',1),('2025-05-16',2025,5,'May',2,20,16,'Tuesday',2),('2025-05-17',2025,5,'May',2,20,17,'Wednesday',3),('2025-05-18',2025,5,'May',2,20,18,'Thursday',4),('2025-05-19',2025,5,'May',2,20,19,'Friday',5),('2025-05-20',2025,5,'May',2,20,20,'Saturday',6),('2025-05-21',2025,5,'May',2,20,21,'Sunday',7),('2025-05-22',2025,5,'May',2,21,22,'Monday',1),('2025-05-23',2025,5,'May',2,21,23,'Tuesday',2),('2025-05-24',2025,5,'May',2,21,24,'Wednesday',3),('2025-05-25',2025,5,'May',2,21,25,'Thursday',4),('2025-05-26',2025,5,'May',2,21,26,'Friday',5),('2025-05-27',2025,5,'May',2,21,27,'Saturday',6),('2025-05-28',2025,5,'May',2,21,28,'Sunday',7),('2025-05-29',2025,5,'May',2,22,29,'Monday',1),('2025-05-30',2025,5,'May',2,22,30,'Tuesday',2),('2025-05-31',2025,5,'May',2,22,31,'Wednesday',3),('2025-06-01',2025,6,'June',2,22,1,'Thursday',4),('2025-06-02',2025,6,'June',2,22,2,'Friday',5),('2025-06-03',2025,6,'June',2,22,3,'Saturday',6),('2025-06-04',2025,6,'June',2,22,4,'Sunday',7),('2025-06-05',2025,6,'June',2,23,5,'Monday',1),('2025-06-06',2025,6,'June',2,23,6,'Tuesday',2),('2025-06-07',2025,6,'June',2,23,7,'Wednesday',3),('2025-06-08',2025,6,'June',2,23,8,'Thursday',4),('2025-06-09',2025,6,'June',2,23,9,'Friday',5),('2025-06-10',2025,6,'June',2,23,10,'Saturday',6),('2025-06-11',2025,6,'June',2,23,11,'Sunday',7),('2025-06-12',2025,6,'June',2,24,12,'Monday',1),('2025-06-13',2025,6,'June',2,24,13,'Tuesday',2),('2025-06-14',2025,6,'June',2,24,14,'Wednesday',3),('2025-06-15',2025,6,'June',2,24,15,'Thursday',4),('2025-06-16',2025,6,'June',2,24,16,'Friday',5),('2025-06-17',2025,6,'June',2,24,17,'Saturday',6),('2025-06-18',2025,6,'June',2,24,18,'Sunday',7),('2025-06-19',2025,6,'June',2,25,19,'Monday',1),('2025-06-20',2025,6,'June',2,25,20,'Tuesday',2),('2025-06-21',2025,6,'June',2,25,21,'Wednesday',3),('2025-06-22',2025,6,'June',2,25,22,'Thursday',4),('2025-06-23',2025,6,'June',2,25,23,'Friday',5),('2025-06-24',2025,6,'June',2,25,24,'Saturday',6),('2025-06-25',2025,6,'June',2,25,25,'Sunday',7),('2025-06-26',2025,6,'June',2,26,26,'Monday',1),('2025-06-27',2025,6,'June',2,26,27,'Tuesday',2),('2025-06-28',2025,6,'June',2,26,28,'Wednesday',3),('2025-06-29',2025,6,'June',2,26,29,'Thursday',4),('2025-06-30',2025,6,'June',2,26,30,'Friday',5),('2025-07-01',2025,7,'July',3,26,1,'Saturday',6),('2025-07-02',2025,7,'July',3,26,2,'Sunday',7),('2025-07-03',2025,7,'July',3,27,3,'Monday',1),('2025-07-04',2025,7,'July',3,27,4,'Tuesday',2),('2025-07-05',2025,7,'July',3,27,5,'Wednesday',3),('2025-07-06',2025,7,'July',3,27,6,'Thursday',4),('2025-07-07',2025,7,'July',3,27,7,'Friday',5),('2025-07-08',2025,7,'July',3,27,8,'Saturday',6),('2025-07-09',2025,7,'July',3,27,9,'Sunday',7),('2025-07-10',2025,7,'July',3,28,10,'Monday',1),('2025-07-11',2025,7,'July',3,28,11,'Tuesday',2),('2025-07-12',2025,7,'July',3,28,12,'Wednesday',3),('2025-07-13',2025,7,'July',3,28,13,'Thursday',4),('2025-07-14',2025,7,'July',3,28,14,'Friday',5),('2025-07-15',2025,7,'July',3,28,15,'Saturday',6),('2025-07-16',2025,7,'July',3,28,16,'Sunday',7),('2025-07-17',2025,7,'July',3,29,17,'Monday',1),('2025-07-18',2025,7,'July',3,29,18,'Tuesday',2),('2025-07-19',2025,7,'July',3,29,19,'Wednesday',3),('2025-07-20',2025,7,'July',3,29,20,'Thursday',4),('2025-07-21',2025,7,'July',3,29,21,'Friday',5),('2025-07-22',2025,7,'July',3,29,22,'Saturday',6),('2025-07-23',2025,7,'July',3,29,23,'Sunday',7),('2025-07-24',2025,7,'July',3,30,24,'Monday',1),('2025-07-25',2025,7,'July',3,30,25,'Tuesday',2),('2025-07-26',2025,7,'July',3,30,26,'Wednesday',3),('2025-07-27',2025,7,'July',3,30,27,'Thursday',4),('2025-07-28',2025,7,'July',3,30,28,'Friday',5),('2025-07-29',2025,7,'July',3,30,29,'Saturday',6),('2025-07-30',2025,7,'July',3,30,30,'Sunday',7),('2025-07-31',2025,7,'July',3,31,31,'Monday',1),('2025-08-01',2025,8,'August',3,31,1,'Tuesday',2),('2025-08-02',2025,8,'August',3,31,2,'Wednesday',3),('2025-08-03',2025,8,'August',3,31,3,'Thursday',4),('2025-08-04',2025,8,'August',3,31,4,'Friday',5),('2025-08-05',2025,8,'August',3,31,5,'Saturday',6),('2025-08-06',2025,8,'August',3,31,6,'Sunday',7),('2025-08-07',2025,8,'August',3,32,7,'Monday',1),('2025-08-08',2025,8,'August',3,32,8,'Tuesday',2),('2025-08-09',2025,8,'August',3,32,9,'Wednesday',3),('2025-08-10',2025,8,'August',3,32,10,'Thursday',4),('2025-08-11',2025,8,'August',3,32,11,'Friday',5),('2025-08-12',2025,8,'August',3,32,12,'Saturday',6),('2025-08-13',2025,8,'August',3,32,13,'Sunday',7),('2025-08-14',2025,8,'August',3,33,14,'Monday',1),('2025-08-15',2025,8,'August',3,33,15,'Tuesday',2),('2025-08-16',2025,8,'August',3,33,16,'Wednesday',3),('2025-08-17',2025,8,'August',3,33,17,'Thursday',4),('2025-08-18',2025,8,'August',3,33,18,'Friday',5),('2025-08-19',2025,8,'August',3,33,19,'Saturday',6),('2025-08-20',2025,8,'August',3,33,20,'Sunday',7),('2025-08-21',2025,8,'August',3,34,21,'Monday',1),('2025-08-22',2025,8,'August',3,34,22,'Tuesday',2),('2025-08-23',2025,8,'August',3,34,23,'Wednesday',3),('2025-08-24',2025,8,'August',3,34,24,'Thursday',4),('2025-08-25',2025,8,'August',3,34,25,'Friday',5),('2025-08-26',2025,8,'August',3,34,26,'Saturday',6),('2025-08-27',2025,8,'August',3,34,27,'Sunday',7),('2025-08-28',2025,8,'August',3,35,28,'Monday',1),('2025-08-29',2025,8,'August',3,35,29,'Tuesday',2),('2025-08-30',2025,8,'August',3,35,30,'Wednesday',3),('2025-08-31',2025,8,'August',3,35,31,'Thursday',4),('2025-09-01',2025,9,'September',3,35,1,'Friday',5),('2025-09-02',2025,9,'September',3,35,2,'Saturday',6),('2025-09-03',2025,9,'September',3,35,3,'Sunday',7),('2025-09-04',2025,9,'September',3,36,4,'Monday',1),('2025-09-05',2025,9,'September',3,36,5,'Tuesday',2),('2025-09-06',2025,9,'September',3,36,6,'Wednesday',3),('2025-09-07',2025,9,'September',3,36,7,'Thursday',4),('2025-09-08',2025,9,'September',3,36,8,'Friday',5),('2025-09-09',2025,9,'September',3,36,9,'Saturday',6),('2025-09-10',2025,9,'September',3,36,10,'Sunday',7),('2025-09-11',2025,9,'September',3,37,11,'Monday',1),('2025-09-12',2025,9,'September',3,37,12,'Tuesday',2),('2025-09-13',2025,9,'September',3,37,13,'Wednesday',3),('2025-09-14',2025,9,'September',3,37,14,'Thursday',4),('2025-09-15',2025,9,'September',3,37,15,'Friday',5),('2025-09-16',2025,9,'September',3,37,16,'Saturday',6),('2025-09-17',2025,9,'September',3,37,17,'Sunday',7),('2025-09-18',2025,9,'September',3,38,18,'Monday',1),('2025-09-19',2025,9,'September',3,38,19,'Tuesday',2),('2025-09-20',2025,9,'September',3,38,20,'Wednesday',3),('2025-09-21',2025,9,'September',3,38,21,'Thursday',4),('2025-09-22',2025,9,'September',3,38,22,'Friday',5),('2025-09-23',2025,9,'September',3,38,23,'Saturday',6),('2025-09-24',2025,9,'September',3,38,24,'Sunday',7),('2025-09-25',2025,9,'September',3,39,25,'Monday',1),('2025-09-26',2025,9,'September',3,39,26,'Tuesday',2),('2025-09-27',2025,9,'September',3,39,27,'Wednesday',3),('2025-09-28',2025,9,'September',3,39,28,'Thursday',4),('2025-09-29',2025,9,'September',3,39,29,'Friday',5),('2025-09-30',2025,9,'September',3,39,30,'Saturday',6),('2025-10-01',2025,10,'October',4,39,1,'Sunday',7),('2025-10-02',2025,10,'October',4,40,2,'Monday',1),('2025-10-03',2025,10,'October',4,40,3,'Tuesday',2),('2025-10-04',2025,10,'October',4,40,4,'Wednesday',3),('2025-10-05',2025,10,'October',4,40,5,'Thursday',4),('2025-10-06',2025,10,'October',4,40,6,'Friday',5),('2025-10-07',2025,10,'October',4,40,7,'Saturday',6),('2025-10-08',2025,10,'October',4,40,8,'Sunday',7),('2025-10-09',2025,10,'October',4,41,9,'Monday',1),('2025-10-10',2025,10,'October',4,41,10,'Tuesday',2),('2025-10-11',2025,10,'October',4,41,11,'Wednesday',3),('2025-10-12',2025,10,'October',4,41,12,'Thursday',4),('2025-10-13',2025,10,'October',4,41,13,'Friday',5),('2025-10-14',2025,10,'October',4,41,14,'Saturday',6),('2025-10-15',2025,10,'October',4,41,15,'Sunday',7),('2025-10-16',2025,10,'October',4,42,16,'Monday',1),('2025-10-17',2025,10,'October',4,42,17,'Tuesday',2),('2025-10-18',2025,10,'October',4,42,18,'Wednesday',3),('2025-10-19',2025,10,'October',4,42,19,'Thursday',4),('2025-10-20',2025,10,'October',4,42,20,'Friday',5),('2025-10-21',2025,10,'October',4,42,21,'Saturday',6),('2025-10-22',2025,10,'October',4,42,22,'Sunday',7),('2025-10-23',2025,10,'October',4,43,23,'Monday',1),('2025-10-24',2025,10,'October',4,43,24,'Tuesday',2),('2025-10-25',2025,10,'October',4,43,25,'Wednesday',3),('2025-10-26',2025,10,'October',4,43,26,'Thursday',4),('2025-10-27',2025,10,'October',4,43,27,'Friday',5),('2025-10-28',2025,10,'October',4,43,28,'Saturday',6),('2025-10-29',2025,10,'October',4,43,29,'Sunday',7),('2025-10-30',2025,10,'October',4,44,30,'Monday',1),('2025-10-31',2025,10,'October',4,44,31,'Tuesday',2),('2025-11-01',2025,11,'November',4,44,1,'Wednesday',3),('2025-11-02',2025,11,'November',4,44,2,'Thursday',4),('2025-11-03',2025,11,'November',4,44,3,'Friday',5),('2025-11-04',2025,11,'November',4,44,4,'Saturday',6),('2025-11-05',2025,11,'November',4,44,5,'Sunday',7),('2025-11-06',2025,11,'November',4,45,6,'Monday',1),('2025-11-07',2025,11,'November',4,45,7,'Tuesday',2),('2025-11-08',2025,11,'November',4,45,8,'Wednesday',3),('2025-11-09',2025,11,'November',4,45,9,'Thursday',4),('2025-11-10',2025,11,'November',4,45,10,'Friday',5),('2025-11-11',2025,11,'November',4,45,11,'Saturday',6),('2025-11-12',2025,11,'November',4,45,12,'Sunday',7),('2025-11-13',2025,11,'November',4,46,13,'Monday',1),('2025-11-14',2025,11,'November',4,46,14,'Tuesday',2),('2025-11-15',2025,11,'November',4,46,15,'Wednesday',3),('2025-11-16',2025,11,'November',4,46,16,'Thursday',4),('2025-11-17',2025,11,'November',4,46,17,'Friday',5),('2025-11-18',2025,11,'November',4,46,18,'Saturday',6),('2025-11-19',2025,11,'November',4,46,19,'Sunday',7),('2025-11-20',2025,11,'November',4,47,20,'Monday',1),('2025-11-21',2025,11,'November',4,47,21,'Tuesday',2),('2025-11-22',2025,11,'November',4,47,22,'Wednesday',3),('2025-11-23',2025,11,'November',4,47,23,'Thursday',4),('2025-11-24',2025,11,'November',4,47,24,'Friday',5),('2025-11-25',2025,11,'November',4,47,25,'Saturday',6),('2025-11-26',2025,11,'November',4,47,26,'Sunday',7),('2025-11-27',2025,11,'November',4,48,27,'Monday',1),('2025-11-28',2025,11,'November',4,48,28,'Tuesday',2),('2025-11-29',2025,11,'November',4,48,29,'Wednesday',3),('2025-11-30',2025,11,'November',4,48,30,'Thursday',4),('2025-12-01',2025,12,'December',4,48,1,'Friday',5),('2025-12-02',2025,12,'December',4,48,2,'Saturday',6),('2025-12-03',2025,12,'December',4,48,3,'Sunday',7),('2025-12-04',2025,12,'December',4,49,4,'Monday',1),('2025-12-05',2025,12,'December',4,49,5,'Tuesday',2),('2025-12-06',2025,12,'December',4,49,6,'Wednesday',3),('2025-12-07',2025,12,'December',4,49,7,'Thursday',4),('2025-12-08',2025,12,'December',4,49,8,'Friday',5),('2025-12-09',2025,12,'December',4,49,9,'Saturday',6),('2025-12-10',2025,12,'December',4,49,10,'Sunday',7),('2025-12-11',2025,12,'December',4,50,11,'Monday',1),('2025-12-12',2025,12,'December',4,50,12,'Tuesday',2),('2025-12-13',2025,12,'December',4,50,13,'Wednesday',3),('2025-12-14',2025,12,'December',4,50,14,'Thursday',4),('2025-12-15',2025,12,'December',4,50,15,'Friday',5),('2025-12-16',2025,12,'December',4,50,16,'Saturday',6),('2025-12-17',2025,12,'December',4,50,17,'Sunday',7),('2025-12-18',2025,12,'December',4,51,18,'Monday',1),('2025-12-19',2025,12,'December',4,51,19,'Tuesday',2),('2025-12-20',2025,12,'December',4,51,20,'Wednesday',3),('2025-12-21',2025,12,'December',4,51,21,'Thursday',4),('2025-12-22',2025,12,'December',4,51,22,'Friday',5),('2025-12-23',2025,12,'December',4,51,23,'Saturday',6),('2025-12-24',2025,12,'December',4,51,24,'Sunday',7),('2025-12-25',2025,12,'December',4,52,25,'Monday',1),('2025-12-26',2025,12,'December',4,52,26,'Tuesday',2),('2025-12-27',2025,12,'December',4,52,27,'Wednesday',3),('2025-12-28',2025,12,'December',4,52,28,'Thursday',4),('2025-12-29',2025,12,'December',4,52,29,'Friday',5),('2025-12-30',2025,12,'December',4,52,30,'Saturday',6),('2025-12-31',2025,12,'December',4,52,31,'Sunday',7);
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carga`
--

DROP TABLE IF EXISTS `carga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carga` (
  `id_carga` int NOT NULL AUTO_INCREMENT,
  `sacos_asignados` int NOT NULL COMMENT 'Ojo! cambio de nombre',
  `estado_actual` set('Asignado','Bodega','Calidad','Despacho','Finalizado') COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Ojo! cambio de nombre',
  `id_cliente` int NOT NULL,
  `id_jefeArea_responsable` int NOT NULL COMMENT 'Ojo! cambio de nombre',
  `fecha_creacion` date NOT NULL,
  `hora_creacion` time NOT NULL,
  `visibilidad_sistema` set('Activo','Inactivo') COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Ojo! cambio de nombre',
  `id_calidad_resposable` int DEFAULT NULL COMMENT 'Ojo! cambio de nombre',
  `fecha_finalizacionEscaneos` date DEFAULT NULL,
  `hora_finalizacionEscaneos` time DEFAULT NULL,
  `codigo_muestreo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ingreso manual por calidad',
  `fecha_muestreo` date DEFAULT NULL,
  `hora_muestreo` time DEFAULT NULL,
  `resultado_qa` set('Aprobado','Rechazado') COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Ojo! cambio de nombre',
  `motivo_Rechazo` set('Error de humedad','Error de peso','Saco defectuoso','Resultado muestreo','Error de etiqueta') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observaciones_qa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Ojo! cambio de nombre',
  `id_despacho_responsable` int DEFAULT NULL COMMENT 'Ojo! cambio de nombre',
  `fecha_despacho` date DEFAULT NULL,
  `hora_despacho` time DEFAULT NULL,
  `patente_camion` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ingreso manual por despacho',
  `responsable_traslado` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ingreso manual por despacho',
  `observaciones_despacho` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  PRIMARY KEY (`id_carga`),
  KEY `cliente_carga` (`id_cliente`),
  KEY `jefeArea` (`id_jefeArea_responsable`),
  KEY `calidad` (`id_calidad_resposable`),
  KEY `despacho` (`id_despacho_responsable`),
  KEY `fecha_creacion` (`fecha_creacion`),
  KEY `fecha_finalizacionescaneos` (`fecha_finalizacionEscaneos`),
  KEY `fecha_muestreo` (`fecha_muestreo`),
  KEY `fecha_despacho` (`fecha_despacho`),
  KEY `fecha_entrega` (`fecha_entrega`),
  CONSTRAINT `calidad` FOREIGN KEY (`id_calidad_resposable`) REFERENCES `empleados` (`id_empleado`),
  CONSTRAINT `cliente_carga` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `despacho` FOREIGN KEY (`id_despacho_responsable`) REFERENCES `empleados` (`id_empleado`),
  CONSTRAINT `fecha_creacion` FOREIGN KEY (`fecha_creacion`) REFERENCES `calendario` (`fecha`),
  CONSTRAINT `fecha_despacho` FOREIGN KEY (`fecha_despacho`) REFERENCES `calendario` (`fecha`),
  CONSTRAINT `fecha_entrega` FOREIGN KEY (`fecha_entrega`) REFERENCES `calendario` (`fecha`),
  CONSTRAINT `fecha_finalizacionescaneos` FOREIGN KEY (`fecha_finalizacionEscaneos`) REFERENCES `calendario` (`fecha`),
  CONSTRAINT `fecha_muestreo` FOREIGN KEY (`fecha_muestreo`) REFERENCES `calendario` (`fecha`),
  CONSTRAINT `jefeArea` FOREIGN KEY (`id_jefeArea_responsable`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carga`
--

LOCK TABLES `carga` WRITE;
/*!40000 ALTER TABLE `carga` DISABLE KEYS */;
/*!40000 ALTER TABLE `carga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fono` int NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Carozzi','Santiago',2147483647),(2,'Nestle','Rancagua',2147483647),(3,'Soprole','Graneros',2147483647),(4,'AquaChile','San Fernando',2147483647),(5,'Nutreco','Renca',2147483647);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `id_empleado` int NOT NULL,
  `nombre_empleado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_empleado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_login` int NOT NULL,
  `id_turno` int NOT NULL,
  `cargo` set('Jefe Area','Operador','Administrador','Calidad','Despacho') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `loginempleados` (`id_login`),
  KEY `tunoempleados` (`id_turno`),
  CONSTRAINT `loginempleados` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`),
  CONSTRAINT `tunoempleados` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`id_turno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Pablo','lopez',2,1,'Jefe Area'),(2,'Alex','Soto',1,1,'Operador'),(3,'Lucas','Zamorano',3,3,'Operador'),(4,'Sandra','Diaz',4,2,'Operador'),(5,'camila ','oyarzun',6,3,'Calidad'),(6,'antonia','trincado',7,1,'Despacho');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usu` set('Jefe Area','Operador','Administrador','Calidad','Despacho') COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Ojo! se cambiaron nombre usuario a minusculas',
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'alex.soto','alex123','Operador'),(2,'pablo.lopez','pablo123','Jefe Area'),(3,'lucas.zamorano','lucas123','Operador'),(4,'sandra.diaz','sandra123','Operador'),(5,'admin.admin','admin123','Administrador'),(6,'camila.oyarzun','camila123','Calidad'),(7,'antonia.trincado','antonia123','Despacho');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saco`
--

DROP TABLE IF EXISTS `saco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saco` (
  `id_saco` int NOT NULL AUTO_INCREMENT,
  `fecha_elaboracion` date NOT NULL,
  `lote` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ahora los lote son consecutivos (ver despues como implementarlo al codBARRA)',
  `humedad` float NOT NULL,
  `temperatura` float NOT NULL,
  `kilos` float NOT NULL COMMENT 'cargado después de que pesaje manualmente (?) ',
  `id_carga` int NOT NULL,
  `id_operador_resposable` int NOT NULL,
  PRIMARY KEY (`id_saco`),
  KEY `operador_responsable` (`id_operador_resposable`),
  KEY `carga_asignada` (`id_carga`),
  CONSTRAINT `carga_asignada` FOREIGN KEY (`id_carga`) REFERENCES `carga` (`id_carga`),
  CONSTRAINT `operador_responsable` FOREIGN KEY (`id_operador_resposable`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saco`
--

LOCK TABLES `saco` WRITE;
/*!40000 ALTER TABLE `saco` DISABLE KEYS */;
/*!40000 ALTER TABLE `saco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turno` (
  `id_turno` int NOT NULL AUTO_INCREMENT,
  `turno` set('Dia','Tarde','Noche') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (1,'Dia'),(2,'Tarde'),(3,'Noche');
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-05 17:39:22
