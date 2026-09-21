-- MySQL dump 10.13  Distrib 5.7.44, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	5.7.44-log

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
-- Table structure for table `absensi`
--

DROP TABLE IF EXISTS `absensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `kelas_id` bigint(20) unsigned NOT NULL,
  `tahun_pelajaran_id` bigint(20) unsigned DEFAULT NULL,
  `sakit` int(11) NOT NULL DEFAULT '0',
  `izin` int(11) NOT NULL DEFAULT '0',
  `alpa` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `absensi_siswa_id_foreign` (`siswa_id`),
  KEY `absensi_kelas_id_foreign` (`kelas_id`),
  KEY `absensi_tahun_pelajaran_id_foreign` (`tahun_pelajaran_id`),
  CONSTRAINT `absensi_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `absensi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `absensi_tahun_pelajaran_id_foreign` FOREIGN KEY (`tahun_pelajaran_id`) REFERENCES `tahun_pelajaran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absensi`
--

LOCK TABLES `absensi` WRITE;
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
INSERT INTO `absensi` VALUES (1,2,4,1,2,3,4,'2026-07-29 05:53:42','2026-07-29 05:53:42'),(2,5,4,1,4,5,7,'2026-07-29 06:26:55','2026-07-29 07:13:19'),(3,3,4,1,10,9,8,'2026-08-10 02:59:38','2026-08-10 02:59:38');
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `absensi_guru`
--

DROP TABLE IF EXISTS `absensi_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absensi_guru` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kehadiran_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absensi_guru`
--

LOCK TABLES `absensi_guru` WRITE;
/*!40000 ALTER TABLE `absensi_guru` DISABLE KEYS */;
/*!40000 ALTER TABLE `absensi_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `absensis`
--

DROP TABLE IF EXISTS `absensis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absensis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `kelas_id` bigint(20) unsigned NOT NULL,
  `sakit` int(11) NOT NULL DEFAULT '0',
  `izin` int(11) NOT NULL DEFAULT '0',
  `alpa` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `absensis_siswa_id_foreign` (`siswa_id`),
  KEY `absensis_kelas_id_foreign` (`kelas_id`),
  CONSTRAINT `absensis_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `absensis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absensis`
--

LOCK TABLES `absensis` WRITE;
/*!40000 ALTER TABLE `absensis` DISABLE KEYS */;
INSERT INTO `absensis` VALUES (2,2,4,2,4,1,'2026-07-29 05:36:42','2026-07-29 05:36:42');
/*!40000 ALTER TABLE `absensis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catatan_walis`
--

DROP TABLE IF EXISTS `catatan_walis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catatan_walis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `guru_id` bigint(20) unsigned NOT NULL,
  `tahun_pelajaran_id` bigint(20) unsigned DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `catatan_walis_guru_id_foreign` (`guru_id`),
  KEY `catatan_walis_siswa_id_foreign` (`siswa_id`),
  KEY `catatan_walis_tahun_pelajaran_id_foreign` (`tahun_pelajaran_id`),
  CONSTRAINT `catatan_walis_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catatan_walis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catatan_walis_tahun_pelajaran_id_foreign` FOREIGN KEY (`tahun_pelajaran_id`) REFERENCES `tahun_pelajaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catatan_walis`
--

LOCK TABLES `catatan_walis` WRITE;
/*!40000 ALTER TABLE `catatan_walis` DISABLE KEYS */;
INSERT INTO `catatan_walis` VALUES (2,2,3,1,'baik banget','2026-07-29 13:15:56','2026-07-29 13:15:56'),(3,3,3,1,'pais anak anton','2026-07-29 13:15:56','2026-07-29 16:16:34'),(4,4,3,1,'semangat','2026-07-29 13:16:56','2026-07-29 13:16:56'),(5,5,3,1,'bintang anak baik','2026-07-29 13:16:56','2026-07-29 16:22:28');
/*!40000 ALTER TABLE `catatan_walis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ekstrakurikulers`
--

DROP TABLE IF EXISTS `ekstrakurikulers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ekstrakurikulers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ekstrakurikulers_siswa_id_foreign` (`siswa_id`),
  CONSTRAINT `ekstrakurikulers_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ekstrakurikulers`
--

LOCK TABLES `ekstrakurikulers` WRITE;
/*!40000 ALTER TABLE `ekstrakurikulers` DISABLE KEYS */;
INSERT INTO `ekstrakurikulers` VALUES (1,2,'pramuka','Baik','kamu hebat','2026-07-29 17:28:38','2026-07-29 17:28:38'),(2,5,'pramuka','Sangat Baik','bagus sekali','2026-07-29 17:29:09','2026-07-29 17:29:09');
/*!40000 ALTER TABLE `ekstrakurikulers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guru` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_card` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_guru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmp_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (1,'00001','411211000024','TUTUK INDRIYANI',1,'001','P','081288769340','GROBOGAN','1988-05-17','uploads/guru/34260814072026_rider-47.jpg','2026-07-14 01:26:34','2026-07-14 01:26:34',NULL),(2,'00002','410111130058','RINCI KEMBANG HAPSARI',2,'002','P','087862271740','DEMAK','1993-03-18','uploads/guru/39310814072026_rider-70.jpg','2026-07-14 01:31:39','2026-07-14 01:31:39',NULL),(3,'00003','412006010028','ANDY ROCHMAN',8,'003','L','085713142550','KUDUS','1993-03-17','uploads/guru/43350814072026_rider-20.jpg','2026-07-14 01:35:43','2026-07-14 01:35:43',NULL),(4,'00004','412111150050','HENDRO NUGROHO',10,'004','L','087645873561','GROBOGAN','1988-03-19','uploads/guru/19462122072026_rider-78.jpg','2026-07-22 14:46:19','2026-07-22 14:46:19',NULL),(5,'00005','198503152010011001','AHMAD FAUZI',9,'005','L','081234567890','WONOSOBO','1985-04-15','uploads/guru/11502122072026_rider-59.jpg','2026-07-22 14:50:11','2026-07-22 14:50:11',NULL),(6,'00006','198808202012022002','SITI AMINAH',6,'006','P','081356789012','BANJARNEGARA','1988-07-20','uploads/guru/36512122072026_rider-95.jpg','2026-07-22 14:51:36','2026-07-22 14:51:36',NULL),(7,'00007','198211102009031003','MUHAMMAD RIDWAN',7,'007','L','081523456789','TEMANGGUNG','1982-11-10','uploads/guru/30532122072026_rider-26.jpg','2026-07-22 14:53:30','2026-07-22 14:53:30',NULL),(8,'00008','199001252014042004','NUR HIDAYAH',4,'008','P','082145678901','KEBUMEN','1990-01-25','uploads/guru/58542122072026_rider-150.jpg','2026-07-22 14:54:58','2026-07-22 14:54:58',NULL),(9,'00009','198704052011011005','ABDUL KARIM',5,'009','L','082267890123','0822-6789-0123','1987-05-05','uploads/guru/25562122072026_rider-201.jpg','2026-07-22 14:56:25','2026-07-22 14:56:25',NULL),(10,'00010','199206182015022006','RINA KARTIKA',3,'010','P','082378901234','PURWOREJO','1992-05-18','uploads/guru/51572122072026_rider-36.jpg','2026-07-22 14:57:51','2026-07-22 14:57:51',NULL),(11,'00011','198909092013031007','YUSUF MAULANA',11,'011','L','085123456789','WONOSOBO','1989-07-29','uploads/guru/02592122072026_rider-38.jpg','2026-07-22 14:59:02','2026-07-22 14:59:02',NULL),(12,'00012','199305142016042008','DEWI LESTARI',12,'012','P','085234567890','BANYUMAS','1993-03-14','uploads/guru/10002222072026_rider-93.jpg','2026-07-22 15:00:10','2026-07-22 15:00:10',NULL),(13,'00013','001','YUDI',13,'013','L','09878899768','WONOSOBO','2011-11-11','uploads/guru/12350823072026_rider-4.jpg','2026-07-23 01:35:12','2026-07-23 01:35:12',NULL);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hari`
--

DROP TABLE IF EXISTS `hari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hari` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_hari` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hari`
--

LOCK TABLES `hari` WRITE;
/*!40000 ALTER TABLE `hari` DISABLE KEYS */;
INSERT INTO `hari` VALUES (1,'Senin','2026-07-13 16:16:43','2026-07-13 16:16:43'),(2,'Selasa','2026-07-13 16:16:43','2026-07-13 16:16:43'),(3,'Rabu','2026-07-13 16:16:43','2026-07-13 16:16:43'),(4,'Kamis','2026-07-13 16:16:43','2026-07-13 16:16:43'),(5,'Jum\'at','2026-07-13 16:16:43','2026-07-13 16:16:43'),(6,'Sabtu','2026-07-22 16:22:28','2026-07-22 16:22:28');
/*!40000 ALTER TABLE `hari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hari_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES (3,1,4,3,10,'07:45:00','08:30:00',1,'2026-07-22 15:06:09','2026-07-22 15:46:19','2026-07-22 15:46:19'),(113,1,4,3,10,'07:45:00','08:30:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(114,1,4,1,1,'07:00:00','07:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(115,1,4,2,2,'07:45:00','08:30:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(116,1,4,3,10,'08:30:00','09:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(117,1,4,4,8,'09:30:00','10:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(118,1,4,5,9,'10:15:00','11:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(119,1,4,6,6,'11:00:00','11:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(120,1,4,7,7,'12:30:00','13:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(121,1,4,8,3,'13:15:00','14:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(122,2,4,9,5,'07:00:00','07:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(123,2,4,10,4,'07:45:00','08:30:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(124,2,4,11,11,'08:30:00','09:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(125,2,4,12,12,'09:30:00','10:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(126,2,4,1,1,'10:15:00','11:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(127,2,4,2,2,'11:00:00','11:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(128,2,4,3,10,'12:30:00','13:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(129,2,4,4,8,'13:15:00','14:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(130,3,4,5,9,'07:00:00','07:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(131,3,4,6,6,'07:45:00','08:30:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(132,3,4,7,7,'08:30:00','09:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(133,3,4,8,3,'09:30:00','10:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(134,3,4,9,5,'10:15:00','11:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(135,3,4,10,4,'11:00:00','11:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(136,3,4,11,11,'12:30:00','13:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(137,3,4,12,12,'13:15:00','14:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(138,4,4,1,1,'07:00:00','07:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(139,4,4,2,2,'07:45:00','08:30:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(140,4,4,3,10,'08:30:00','09:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(141,4,4,4,8,'09:30:00','10:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(142,4,4,5,9,'10:15:00','11:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(143,4,4,6,6,'11:00:00','11:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(144,4,4,7,7,'12:30:00','13:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(145,4,4,8,3,'13:15:00','14:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(146,5,4,9,5,'07:00:00','07:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(147,5,4,10,4,'07:45:00','08:30:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(148,5,4,11,11,'08:30:00','09:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(149,5,4,12,12,'09:30:00','10:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(150,5,4,1,1,'10:15:00','11:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(151,6,4,2,2,'07:00:00','07:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(152,6,4,3,10,'07:45:00','08:30:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(153,6,4,4,8,'08:30:00','09:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(154,6,4,5,9,'09:30:00','10:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(155,6,4,6,6,'10:15:00','11:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(156,6,4,7,7,'11:00:00','11:45:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(157,6,4,8,3,'12:30:00','13:15:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(158,6,4,9,5,'13:15:00','14:00:00',1,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(159,1,5,10,4,'07:00:00','07:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(160,1,5,11,11,'07:45:00','08:30:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(161,1,5,12,12,'08:30:00','09:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(162,1,5,1,1,'09:30:00','10:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(163,1,5,2,2,'10:15:00','11:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(164,1,5,3,10,'11:00:00','11:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(165,1,5,4,8,'12:30:00','13:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(166,1,5,5,9,'13:15:00','14:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(167,2,5,6,6,'07:00:00','07:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(168,2,5,7,7,'07:45:00','08:30:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(169,2,5,8,3,'08:30:00','09:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(170,2,5,9,5,'09:30:00','10:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(171,2,5,10,4,'10:15:00','11:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(172,2,5,11,11,'11:00:00','11:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(173,2,5,12,12,'12:30:00','13:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(174,2,5,1,1,'13:15:00','14:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(175,3,5,2,2,'07:00:00','07:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(176,3,5,3,10,'07:45:00','08:30:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(177,3,5,4,8,'08:30:00','09:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(178,3,5,5,9,'09:30:00','10:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(179,3,5,6,6,'10:15:00','11:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(180,3,5,7,7,'11:00:00','11:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(181,3,5,8,3,'12:30:00','13:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(182,3,5,9,5,'13:15:00','14:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(183,4,5,10,4,'07:00:00','07:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(184,4,5,11,11,'07:45:00','08:30:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(185,4,5,12,12,'08:30:00','09:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(186,4,5,1,1,'09:30:00','10:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(187,4,5,2,2,'10:15:00','11:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(188,4,5,3,10,'11:00:00','11:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(189,4,5,4,8,'12:30:00','13:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(190,4,5,5,9,'13:15:00','14:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(191,5,5,6,6,'07:00:00','07:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(192,5,5,7,7,'07:45:00','08:30:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(193,5,5,8,3,'08:30:00','09:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(194,5,5,9,5,'09:30:00','10:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(195,5,5,10,4,'10:15:00','11:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(196,6,5,11,11,'07:00:00','07:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(197,6,5,12,12,'07:45:00','08:30:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(198,6,5,1,1,'08:30:00','09:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(199,6,5,2,2,'09:30:00','10:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(200,6,5,3,10,'10:15:00','11:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(201,6,5,4,8,'11:00:00','11:45:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(202,6,5,5,9,'12:30:00','13:15:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(203,6,5,6,6,'13:15:00','14:00:00',2,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(204,1,6,7,7,'07:00:00','07:45:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(205,1,6,8,3,'07:45:00','08:30:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(206,1,6,9,5,'08:30:00','09:15:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(207,1,6,10,4,'09:30:00','10:15:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(208,1,6,11,11,'10:15:00','11:00:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(209,1,6,12,12,'11:00:00','11:45:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(210,1,6,1,1,'12:30:00','13:15:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(211,1,6,2,2,'13:15:00','14:00:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(212,2,6,3,10,'07:00:00','07:45:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(213,2,6,4,8,'07:45:00','08:30:00',3,'2026-07-22 16:22:49','2026-07-22 16:22:49',NULL),(214,2,6,5,9,'08:30:00','09:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(215,2,6,6,6,'09:30:00','10:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(216,2,6,7,7,'10:15:00','11:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(217,2,6,8,3,'11:00:00','11:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(218,2,6,9,5,'12:30:00','13:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(219,2,6,10,4,'13:15:00','14:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(220,3,6,11,11,'07:00:00','07:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(221,3,6,12,12,'07:45:00','08:30:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(222,3,6,1,1,'08:30:00','09:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(223,3,6,2,2,'09:30:00','10:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(224,3,6,3,10,'10:15:00','11:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(225,3,6,4,8,'11:00:00','11:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(226,3,6,5,9,'12:30:00','13:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(227,3,6,6,6,'13:15:00','14:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(228,4,6,7,7,'07:00:00','07:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(229,4,6,8,3,'07:45:00','08:30:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(230,4,6,9,5,'08:30:00','09:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(231,4,6,10,4,'09:30:00','10:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(232,4,6,11,11,'10:15:00','11:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(233,4,6,12,12,'11:00:00','11:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(234,4,6,1,1,'12:30:00','13:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(235,4,6,2,2,'13:15:00','14:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(236,5,6,3,10,'07:00:00','07:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(237,5,6,4,8,'07:45:00','08:30:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(238,5,6,5,9,'08:30:00','09:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(239,5,6,6,6,'09:30:00','10:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(240,5,6,7,7,'10:15:00','11:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(241,6,6,8,3,'07:00:00','07:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(242,6,6,9,5,'07:45:00','08:30:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(243,6,6,10,4,'08:30:00','09:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(244,6,6,11,11,'09:30:00','10:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(245,6,6,12,12,'10:15:00','11:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(246,6,6,1,1,'11:00:00','11:45:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(247,6,6,2,2,'12:30:00','13:15:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(248,6,6,3,10,'13:15:00','14:00:00',3,'2026-07-22 16:22:50','2026-07-22 16:22:50',NULL),(249,5,4,13,13,'01:00:00','01:45:00',1,'2026-07-23 01:40:50','2026-07-23 01:40:50',NULL),(250,5,5,13,13,'01:00:00','01:45:00',2,'2026-07-23 18:14:19','2026-07-23 18:14:19',NULL);
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kehadiran`
--

DROP TABLE IF EXISTS `kehadiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kehadiran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ket` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kehadiran`
--

LOCK TABLES `kehadiran` WRITE;
/*!40000 ALTER TABLE `kehadiran` DISABLE KEYS */;
INSERT INTO `kehadiran` VALUES (1,'Hadir','3C0','2026-07-13 16:16:43','2026-07-13 16:16:43'),(2,'Izin','0CF','2026-07-13 16:16:43','2026-07-13 16:16:43'),(3,'Bertugas Keluar','F90','2026-07-13 16:16:43','2026-07-13 16:16:43'),(4,'Sakit','FF0','2026-07-13 16:16:43','2026-07-13 16:16:43'),(5,'Terlambat','7F0','2026-07-13 16:16:43','2026-07-13 16:16:43'),(6,'Tanpa Keterangan','F00','2026-07-13 16:16:43','2026-07-13 16:16:43');
/*!40000 ALTER TABLE `kehadiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (4,'KELAS X',3,'2026-07-22 14:23:23','2026-07-22 14:23:23',NULL),(5,'KELAS XI',2,'2026-07-22 14:23:37','2026-07-22 14:23:37',NULL),(6,'KELAS XII',1,'2026-07-22 14:23:51','2026-07-22 14:23:51',NULL);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kenaikan_kelas`
--

DROP TABLE IF EXISTS `kenaikan_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kenaikan_kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `tahun_pelajaran_id` bigint(20) unsigned DEFAULT NULL,
  `status` enum('Naik Kelas','Tinggal Kelas','Lulus') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `tahun_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kenaikan_kelas_siswa_id_foreign` (`siswa_id`),
  KEY `kenaikan_kelas_tahun_pelajaran_id_foreign` (`tahun_pelajaran_id`),
  CONSTRAINT `kenaikan_kelas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kenaikan_kelas_tahun_pelajaran_id_foreign` FOREIGN KEY (`tahun_pelajaran_id`) REFERENCES `tahun_pelajaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kenaikan_kelas`
--

LOCK TABLES `kenaikan_kelas` WRITE;
/*!40000 ALTER TABLE `kenaikan_kelas` DISABLE KEYS */;
INSERT INTO `kenaikan_kelas` VALUES (1,5,2,'Naik Kelas','naik kelas','2026/2027','2026-07-29 17:51:58','2026-07-29 17:51:58'),(2,3,2,'Tinggal Kelas','siswa tidak naik kelas','2026/2027','2026-07-29 17:52:20','2026-07-29 17:52:20'),(3,2,2,'Naik Kelas','naik ke kelas XI','2026/2027','2026-08-10 08:40:15','2026-08-10 08:40:15'),(4,14,2,'Naik Kelas','testing saja','2026/2027','2026-08-10 08:44:40','2026-08-10 23:19:33'),(5,11,2,'Lulus','siswa dinyatakan lulus','2026/2027','2026-08-10 08:49:15','2026-08-10 08:49:15'),(6,9,2,'Naik Kelas','naik ekals testing',NULL,'2026-08-10 23:20:01','2026-08-10 23:20:01');
/*!40000 ALTER TABLE `kenaikan_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kokurikulers`
--

DROP TABLE IF EXISTS `kokurikulers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kokurikulers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kokurikulers_siswa_id_foreign` (`siswa_id`),
  CONSTRAINT `kokurikulers_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kokurikulers`
--

LOCK TABLES `kokurikulers` WRITE;
/*!40000 ALTER TABLE `kokurikulers` DISABLE KEYS */;
INSERT INTO `kokurikulers` VALUES (1,2,'anak hebat','2026-07-29 17:11:06','2026-07-29 17:11:06'),(2,5,'anak kuat','2026-07-29 17:11:12','2026-07-29 17:11:12'),(3,3,'anak rajin','2026-07-29 17:11:18','2026-07-29 17:11:18'),(4,4,'anak pintar','2026-07-29 17:11:25','2026-07-29 17:11:25');
/*!40000 ALTER TABLE `kokurikulers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mapel`
--

DROP TABLE IF EXISTS `mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mapel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok` enum('A','B','C') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mapel`
--

LOCK TABLES `mapel` WRITE;
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
INSERT INTO `mapel` VALUES (1,'BAHASA INDONESIA','A','2026-07-14 01:07:29','2026-07-14 01:07:29',NULL),(2,'MATEMATIKA','A','2026-07-14 01:07:41','2026-07-14 01:07:41',NULL),(3,'PENDIDIKAN PANCASILA dan KEWARGANEGARAAN','A','2026-07-14 01:08:34','2026-07-14 01:08:34',NULL),(4,'ILMU PENGETAHUAN ALAM','A','2026-07-14 01:09:12','2026-07-14 01:09:12',NULL),(5,'ILMU PENGETAHUAN SOSIAL','A','2026-07-14 01:09:23','2026-07-14 01:09:23',NULL),(6,'BAHASA INGGRIS','A','2026-07-14 01:09:35','2026-07-14 01:09:35',NULL),(7,'FIQIH','B','2026-07-14 01:10:13','2026-07-14 01:10:13',NULL),(8,'AKIDAH AKHLAK','B','2026-07-14 01:10:24','2026-07-14 01:10:24',NULL),(9,'BAHASA ARAB','B','2026-07-14 01:10:37','2026-07-14 01:10:37',NULL),(10,'AL-QUR\'AN HADIST','B','2026-07-14 01:11:14','2026-07-14 01:11:14',NULL),(11,'SEJARAH KEBUDAYAAN ISLAM','B','2026-07-14 01:11:35','2026-07-14 01:11:35',NULL),(12,'TATA BOGA','C','2026-07-14 01:16:54','2026-07-14 01:16:54',NULL),(13,'BIOLOGI','A','2026-07-23 01:34:01','2026-07-23 01:34:01',NULL);
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_03_12_092809_create_hari_table',1),(5,'2020_03_12_092854_create_guru_table',1),(6,'2020_03_12_092926_create_absensi_guru_table',1),(7,'2020_03_12_092941_create_jadwal_table',1),(8,'2020_03_12_092953_create_kehadiran_table',1),(9,'2020_03_12_093010_create_kelas_table',1),(10,'2020_03_12_093018_create_mapel_table',1),(11,'2020_03_12_093027_create_nilai_table',1),(12,'2020_03_12_093050_create_pengumuman_table',2),(13,'2020_03_12_093102_create_rapot_table',2),(14,'2020_03_12_093117_create_ruang_table',2),(15,'2020_03_12_093130_create_siswa_table',2),(16,'2020_03_16_102220_create_ulangan_table',2),(17,'2020_04_07_094355_create_sikap_table',2),(19,'2026_07_29_114131_create_absensis_table',3),(20,'2026_07_29_133558_create_catatan_walis_table',4),(21,'2026_07_29_234227_create_kokurikulers_table',5),(22,'2026_07_30_001838_create_ekstrakurikulers_table',6),(23,'2026_07_30_003421_create_prestasis_table',7),(24,'2026_07_30_004719_create_kenaikan_kelas_table',8),(25,'2026_08_09_131851_create_tahun_pelajaran_table',9),(26,'2026_08_09_132116_add_tahun_pelajaran_id_to_rapot_table',10),(27,'2026_08_09_132323_add_tahun_pelajaran_id_to_sikap_table',11),(28,'2026_08_09_132538_add_tahun_pelajaran_id_to_absensi_table',12),(29,'2026_08_09_132728_add_tahun_pelajaran_id_to_catatan_walis_table',13),(30,'2026_08_10_151801_add_status_to_siswa_table',14),(31,'2026_08_10_160311_add_tahun_pelajaran_id_to_kenaikan_kelas_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `guru_id` int(11) NOT NULL,
  `kkm` int(11) NOT NULL DEFAULT '70',
  `deskripsi_a` text COLLATE utf8mb4_unicode_ci,
  `deskripsi_b` text COLLATE utf8mb4_unicode_ci,
  `deskripsi_c` text COLLATE utf8mb4_unicode_ci,
  `deskripsi_d` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` VALUES (1,1,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-14 01:26:34','2026-07-22 02:30:10'),(2,2,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-14 01:31:39','2026-07-22 17:21:41'),(3,3,71,'Siswa sangat menguasai mata pelajaran','siswa menguasai mata pelajaran','CUKUP','KURANG','2026-07-14 01:35:43','2026-08-09 05:34:31'),(4,4,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:46:19','2026-07-22 17:33:37'),(5,5,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:50:11','2026-07-22 17:42:52'),(6,6,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:51:36','2026-07-22 17:51:33'),(7,7,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:53:30','2026-07-22 17:59:26'),(8,8,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:54:58','2026-07-22 18:07:26'),(9,9,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:56:25','2026-07-22 18:14:44'),(10,10,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:57:51','2026-07-22 18:34:08'),(11,11,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 14:59:02','2026-07-22 18:41:13'),(12,12,70,'SANGAT BAIK','BAIK','CUKUP','KURANG','2026-07-22 15:00:10','2026-07-22 18:47:53'),(13,13,70,'Siswa sangat menguasai mata pelajaran biologi','BAIK','CUKUP','KURANG','2026-07-23 01:35:12','2026-08-09 05:36:06');
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengumuman` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opsi` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengumuman`
--

LOCK TABLES `pengumuman` WRITE;
/*!40000 ALTER TABLE `pengumuman` DISABLE KEYS */;
INSERT INTO `pengumuman` VALUES (1,'pengumuman','pengumuman','2026-07-13 16:16:43','2026-07-13 16:16:43');
/*!40000 ALTER TABLE `pengumuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestasis`
--

DROP TABLE IF EXISTS `prestasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestasis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestasis_siswa_id_foreign` (`siswa_id`),
  CONSTRAINT `prestasis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestasis`
--

LOCK TABLES `prestasis` WRITE;
/*!40000 ALTER TABLE `prestasis` DISABLE KEYS */;
INSERT INTO `prestasis` VALUES (1,5,'Juara 1 Olimpiade Matematika','Tingkat Provinsi','2026-07-29 17:40:32','2026-07-29 17:40:32');
/*!40000 ALTER TABLE `prestasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapot`
--

DROP TABLE IF EXISTS `rapot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rapot` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `tahun_pelajaran_id` bigint(20) unsigned DEFAULT NULL,
  `p_nilai` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_predikat` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_nilai` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_predikat` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rapot_tahun_pelajaran_id_foreign` (`tahun_pelajaran_id`),
  CONSTRAINT `rapot_tahun_pelajaran_id_foreign` FOREIGN KEY (`tahun_pelajaran_id`) REFERENCES `tahun_pelajaran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapot`
--

LOCK TABLES `rapot` WRITE;
/*!40000 ALTER TABLE `rapot` DISABLE KEYS */;
INSERT INTO `rapot` VALUES (1,1,1,1,1,1,'84','B','BAIK','86','B','BAIK','2026-07-22 02:30:34','2026-07-22 02:31:16'),(2,2,4,1,1,1,'80','C','CUKUP','80','C','CUKUP','2026-07-22 17:04:51','2026-07-22 17:10:02'),(3,3,4,1,1,1,'81','B','BAIK','75','C','CUKUP','2026-07-22 17:05:24','2026-07-22 17:10:13'),(4,4,4,1,1,1,'86','B','BAIK','82','B','BAIK','2026-07-22 17:05:47','2026-07-22 17:10:22'),(5,5,4,1,1,1,'86','B','BAIK','91','A','SANGAT BAIK','2026-07-22 17:06:06','2026-07-22 17:10:38'),(6,6,5,1,1,1,'85','B','BAIK','80','C','CUKUP','2026-07-22 17:06:40','2026-07-22 17:10:55'),(7,7,5,1,1,1,'84','B','BAIK','89','B','BAIK','2026-07-22 17:07:02','2026-07-22 17:10:59'),(8,8,5,1,1,1,'90','B','BAIK','77','C','CUKUP','2026-07-22 17:07:27','2026-07-22 17:11:04'),(9,9,5,1,1,1,'85','B','BAIK','93','A','SANGAT BAIK','2026-07-22 17:07:50','2026-07-22 17:11:12'),(10,10,6,1,1,1,'78','C','CUKUP','88','B','BAIK','2026-07-22 17:08:49','2026-07-22 17:11:35'),(11,11,6,1,1,1,'84','B','BAIK','78','C','CUKUP','2026-07-22 17:09:07','2026-07-22 17:11:40'),(12,12,6,1,1,1,'90','B','BAIK','83','B','BAIK','2026-07-22 17:09:25','2026-07-22 17:11:54'),(13,13,6,1,1,1,'82','B','BAIK','87','B','BAIK','2026-07-22 17:09:45','2026-07-22 17:11:59'),(14,2,4,3,8,1,'86','B','BAIK','90','B','BAIK','2026-07-22 17:13:52','2026-07-22 17:19:20'),(15,3,4,3,8,1,'93','A','SANGAT BAIK','91','A','SANGAT BAIK','2026-07-22 17:14:14','2026-07-22 17:19:18'),(16,4,4,3,8,1,'90','B','BAIK','89','B','BAIK','2026-07-22 17:14:29','2026-07-22 17:19:17'),(17,5,4,3,8,1,'93','A','SANGAT BAIK','92','A','SANGAT BAIK','2026-07-22 17:14:49','2026-07-22 17:19:15'),(18,6,5,3,8,1,'92','A','SANGAT BAIK','89','B','BAIK','2026-07-22 17:15:09','2026-07-22 17:19:44'),(19,7,5,3,8,1,'93','A','SANGAT BAIK','90','B','BAIK','2026-07-22 17:15:31','2026-07-22 17:19:43'),(20,8,5,3,8,1,'92','A','SANGAT BAIK','91','A','SANGAT BAIK','2026-07-22 17:15:46','2026-07-22 17:19:42'),(21,9,5,3,8,1,'91','A','SANGAT BAIK','92','A','SANGAT BAIK','2026-07-22 17:16:52','2026-07-22 17:19:41'),(22,10,6,3,8,1,'89','B','BAIK','90','B','BAIK','2026-07-22 17:17:17','2026-07-22 17:20:06'),(23,11,6,3,8,1,'91','A','SANGAT BAIK','91','A','SANGAT BAIK','2026-07-22 17:17:38','2026-07-22 17:20:04'),(24,12,6,3,8,1,'95','A','SANGAT BAIK','92','A','SANGAT BAIK','2026-07-22 17:18:02','2026-07-22 17:20:03'),(25,13,6,3,8,1,'91','A','SANGAT BAIK','91','A','SANGAT BAIK','2026-07-22 17:18:26','2026-07-22 17:20:01'),(26,2,4,2,2,1,'78','C','CUKUP','80','C','CUKUP','2026-07-22 17:22:02','2026-07-22 17:30:27'),(27,3,4,2,2,1,'78','C','CUKUP','75','C','CUKUP','2026-07-22 17:23:02','2026-07-22 17:30:29'),(28,4,4,2,2,1,'79','C','CUKUP','78','C','CUKUP','2026-07-22 17:24:26','2026-07-22 17:30:31'),(29,5,4,2,2,1,'79','C','CUKUP','84','B','BAIK','2026-07-22 17:25:08','2026-07-22 17:30:33'),(30,6,5,2,2,1,'84','B','BAIK','86','B','BAIK','2026-07-22 17:25:41','2026-07-22 17:31:14'),(31,7,5,2,2,1,'80','C','CUKUP','88','B','BAIK','2026-07-22 17:26:12','2026-07-22 17:31:12'),(32,8,5,2,2,1,'79','C','CUKUP','93','A','SANGAT BAIK','2026-07-22 17:26:46','2026-07-22 17:31:10'),(33,9,5,2,2,1,'87','B','BAIK','89','B','BAIK','2026-07-22 17:27:10','2026-07-22 17:31:08'),(34,10,6,2,2,1,'86','B','BAIK','90','B','BAIK','2026-07-22 17:27:48','2026-07-22 17:31:52'),(35,11,6,2,2,1,'83','B','BAIK','89','B','BAIK','2026-07-22 17:28:10','2026-07-22 17:31:49'),(36,12,6,2,2,1,'77','C','CUKUP','79','C','CUKUP','2026-07-22 17:28:35','2026-07-22 17:31:47'),(37,13,6,2,2,1,'85','B','BAIK','80','C','CUKUP','2026-07-22 17:29:09','2026-07-22 17:31:45'),(38,2,4,4,10,1,'85','B','BAIK','78','C','CUKUP','2026-07-22 17:34:18','2026-07-22 17:40:10'),(39,3,4,4,10,1,'86','B','BAIK','70','C','CUKUP','2026-07-22 17:34:47','2026-07-22 17:40:08'),(40,4,4,4,10,1,'86','B','BAIK','80','C','CUKUP','2026-07-22 17:35:20','2026-07-22 17:40:06'),(41,5,4,4,10,1,'84','B','BAIK','88','B','BAIK','2026-07-22 17:35:46','2026-07-22 17:40:04'),(42,6,5,4,10,1,'84','B','BAIK','88','B','BAIK','2026-07-22 17:36:19','2026-07-22 17:40:44'),(43,7,5,4,10,1,'80','C','CUKUP','82','B','BAIK','2026-07-22 17:36:43','2026-07-22 17:40:42'),(44,8,5,4,10,1,'89','B','BAIK','91','A','SANGAT BAIK','2026-07-22 17:37:07','2026-07-22 17:40:40'),(45,9,5,4,10,1,'75','C','CUKUP','72','C','CUKUP','2026-07-22 17:37:39','2026-07-22 17:40:38'),(46,10,6,4,10,1,'82','B','BAIK','93','A','SANGAT BAIK','2026-07-22 17:38:16','2026-07-22 17:41:13'),(47,11,6,4,10,1,'83','B','BAIK','85','B','BAIK','2026-07-22 17:38:41','2026-07-22 17:41:11'),(48,12,6,4,10,1,'84','B','BAIK','88','B','BAIK','2026-07-22 17:39:09','2026-07-22 17:41:09'),(49,13,6,4,10,1,'89','B','BAIK','90','B','BAIK','2026-07-22 17:39:34','2026-07-22 17:41:07'),(50,2,4,5,9,1,'88','B','BAIK','91','A','SANGAT BAIK','2026-07-22 17:43:28','2026-07-22 17:49:19'),(51,3,4,5,9,1,'74','C','CUKUP','70','C','CUKUP','2026-07-22 17:44:01','2026-07-22 17:49:17'),(52,4,4,5,9,1,'84','B','BAIK','80','C','CUKUP','2026-07-22 17:44:22','2026-07-22 17:49:15'),(53,5,4,5,9,1,'85','B','BAIK','88','B','BAIK','2026-07-22 17:44:53','2026-07-22 17:49:13'),(54,6,5,5,9,1,'85','B','BAIK','88','B','BAIK','2026-07-22 17:45:25','2026-07-22 17:49:50'),(55,7,5,5,9,1,'85','B','BAIK','88','B','BAIK','2026-07-22 17:45:46','2026-07-22 17:49:49'),(56,8,5,5,9,1,'89','B','BAIK','95','A','SANGAT BAIK','2026-07-22 17:46:12','2026-07-22 17:49:48'),(57,9,5,5,9,1,'84','B','BAIK','92','A','SANGAT BAIK','2026-07-22 17:46:43','2026-07-22 17:49:46'),(58,10,6,5,9,1,'85','B','BAIK','91','A','SANGAT BAIK','2026-07-22 17:47:19','2026-07-22 17:50:20'),(59,11,6,5,9,1,'88','B','BAIK','90','B','BAIK','2026-07-22 17:47:42','2026-07-22 17:50:18'),(60,12,6,5,9,1,'88','B','BAIK','89','B','BAIK','2026-07-22 17:48:14','2026-07-22 17:50:17'),(61,13,6,5,9,1,'86','B','BAIK','86','B','BAIK','2026-07-22 17:48:40','2026-07-22 17:50:16'),(62,2,4,6,6,1,'87','B','BAIK','90','B','BAIK','2026-07-22 17:52:04','2026-07-22 17:57:28'),(63,3,4,6,6,1,'76','C','CUKUP','76','C','CUKUP','2026-07-22 17:52:26','2026-07-22 17:57:25'),(64,4,4,6,6,1,'86','B','BAIK','88','B','BAIK','2026-07-22 17:52:47','2026-07-22 17:57:23'),(65,5,4,6,6,1,'88','B','BAIK','93','A','SANGAT BAIK','2026-07-22 17:53:08','2026-07-22 17:57:21'),(66,6,5,6,6,1,'83','B','BAIK','91','A','SANGAT BAIK','2026-07-22 17:53:45','2026-07-22 17:57:57'),(67,7,5,6,6,1,'83','B','BAIK','87','B','BAIK','2026-07-22 17:54:11','2026-07-22 17:57:55'),(68,8,5,6,6,1,'90','B','BAIK','94','A','SANGAT BAIK','2026-07-22 17:54:35','2026-07-22 17:57:54'),(69,9,5,6,6,1,'85','B','BAIK','89','B','BAIK','2026-07-22 17:55:03','2026-07-22 17:57:53'),(70,10,6,6,6,1,'85','B','BAIK','77','C','CUKUP','2026-07-22 17:55:32','2026-07-22 17:58:23'),(71,11,6,6,6,1,'83','B','BAIK','80','C','CUKUP','2026-07-22 17:55:56','2026-07-22 17:58:22'),(72,12,6,6,6,1,'79','C','CUKUP','80','C','CUKUP','2026-07-22 17:56:26','2026-07-22 17:58:20'),(73,13,6,6,6,1,'84','B','BAIK','86','B','BAIK','2026-07-22 17:56:48','2026-07-22 17:58:19'),(74,2,4,7,7,1,'78','C','CUKUP','89','B','BAIK','2026-07-22 18:00:09','2026-07-22 18:05:10'),(75,3,4,7,7,1,'87','B','BAIK','74','C','CUKUP','2026-07-22 18:00:32','2026-07-22 18:05:08'),(76,4,4,7,7,1,'86','B','BAIK','87','B','BAIK','2026-07-22 18:00:54','2026-07-22 18:05:06'),(77,5,4,7,7,1,'88','B','BAIK','90','B','BAIK','2026-07-22 18:01:17','2026-07-22 18:05:04'),(78,6,5,7,7,1,'88','B','BAIK','86','B','BAIK','2026-07-22 18:01:49','2026-07-22 18:05:41'),(79,7,5,7,7,1,'84','B','BAIK','90','B','BAIK','2026-07-22 18:02:10','2026-07-22 18:05:39'),(80,8,5,7,7,1,'91','A','SANGAT BAIK','97','A','SANGAT BAIK','2026-07-22 18:02:39','2026-07-22 18:05:37'),(81,9,5,7,7,1,'84','B','BAIK','80','C','CUKUP','2026-07-22 18:03:02','2026-07-22 18:05:36'),(82,10,6,7,7,1,'87','B','BAIK','92','A','SANGAT BAIK','2026-07-22 18:03:26','2026-07-22 18:06:14'),(83,11,6,7,7,1,'85','B','BAIK','88','B','BAIK','2026-07-22 18:03:44','2026-07-22 18:06:12'),(84,12,6,7,7,1,'83','B','BAIK','86','B','BAIK','2026-07-22 18:04:06','2026-07-22 18:06:11'),(85,13,6,7,7,1,'87','B','BAIK','85','B','BAIK','2026-07-22 18:04:29','2026-07-22 18:06:09'),(86,2,4,8,4,1,'86','B','BAIK','80','C','CUKUP','2026-07-22 18:07:56','2026-07-22 18:12:52'),(87,3,4,8,4,1,'99','A','SANGAT BAIK','91','A','SANGAT BAIK','2026-07-22 18:08:22','2026-08-10 07:31:30'),(88,4,4,8,4,1,'84','B','BAIK','87','B','BAIK','2026-07-22 18:08:46','2026-07-22 18:12:48'),(89,5,4,8,4,1,'92','A','SANGAT BAIK','90','B','BAIK','2026-07-22 18:09:10','2026-07-22 18:12:46'),(90,6,5,8,4,1,'79','C','CUKUP','91','A','SANGAT BAIK','2026-07-22 18:09:37','2026-07-22 18:13:20'),(91,7,5,8,4,1,'80','C','CUKUP','87','B','BAIK','2026-07-22 18:09:54','2026-07-22 18:13:17'),(92,8,5,8,4,1,'89','B','BAIK','94','A','SANGAT BAIK','2026-07-22 18:10:19','2026-07-22 18:13:16'),(93,9,5,8,4,1,'85','B','BAIK','89','B','BAIK','2026-07-22 18:10:46','2026-07-22 18:13:15'),(94,10,6,8,4,1,'85','B','BAIK','87','B','BAIK','2026-07-22 18:11:16','2026-07-22 18:13:46'),(95,11,6,8,4,1,'86','B','BAIK','85','B','BAIK','2026-07-22 18:11:33','2026-07-22 18:13:47'),(96,12,6,8,4,1,'88','B','BAIK','90','B','BAIK','2026-07-22 18:12:00','2026-07-22 18:13:44'),(97,13,6,8,4,1,'83','B','BAIK','93','A','SANGAT BAIK','2026-07-22 18:12:22','2026-07-22 18:13:42'),(98,2,4,9,5,1,'86','B','BAIK','90','B','BAIK','2026-07-22 18:15:10','2026-07-22 18:20:07'),(99,3,4,9,5,1,'89','B','BAIK','98','A','SANGAT BAIK','2026-07-22 18:15:32','2026-07-22 18:20:08'),(100,4,4,9,5,1,'86','B','BAIK','89','B','BAIK','2026-07-22 18:15:55','2026-07-22 18:20:05'),(101,5,4,9,5,1,'79','C','CUKUP','81','B','BAIK','2026-07-22 18:16:13','2026-07-22 18:20:03'),(102,6,5,9,5,1,'84','B','BAIK','88','B','BAIK','2026-07-22 18:16:39','2026-07-22 18:20:40'),(103,7,5,9,5,1,'86','B','BAIK','92','A','SANGAT BAIK','2026-07-22 18:17:02','2026-07-22 18:20:38'),(104,8,5,9,5,1,'86','B','BAIK','84','B','BAIK','2026-07-22 18:17:37','2026-07-22 18:20:36'),(105,9,5,9,5,1,'85','B','BAIK','87','B','BAIK','2026-07-22 18:18:03','2026-07-22 18:20:35'),(106,10,6,9,5,1,'86','B','BAIK','88','B','BAIK','2026-07-22 18:18:30','2026-07-22 18:21:03'),(107,11,6,9,5,1,'80','C','CUKUP','94','A','SANGAT BAIK','2026-07-22 18:18:49','2026-07-22 18:21:01'),(108,12,6,9,5,1,'86','B','BAIK','90','B','BAIK','2026-07-22 18:19:13','2026-07-22 18:20:59'),(109,13,6,9,5,1,'85','B','BAIK','89','B','BAIK','2026-07-22 18:19:34','2026-07-22 18:20:58'),(110,2,4,10,3,1,'84','B','BAIK','89','B','BAIK','2026-07-22 18:34:34','2026-07-22 18:39:19'),(111,3,4,10,3,1,'78','C','CUKUP','79','C','CUKUP','2026-07-22 18:34:47','2026-07-22 18:39:17'),(112,4,4,10,3,1,'83','B','BAIK','92','A','SANGAT BAIK','2026-07-22 18:35:10','2026-07-22 18:39:16'),(113,5,4,10,3,1,'84','B','BAIK','88','B','BAIK','2026-07-22 18:35:31','2026-07-22 18:39:15'),(114,6,5,10,3,1,'88','B','BAIK','80','C','CUKUP','2026-07-22 18:35:59','2026-07-22 18:39:50'),(115,7,5,10,3,1,'85','B','BAIK','85','B','BAIK','2026-07-22 18:36:23','2026-07-22 18:39:49'),(116,8,5,10,3,1,'93','A','SANGAT BAIK','87','B','BAIK','2026-07-22 18:36:45','2026-07-22 18:39:47'),(117,9,5,10,3,1,'87','B','BAIK','88','B','BAIK','2026-07-22 18:37:09','2026-07-22 18:39:46'),(118,10,6,10,3,1,'89','B','BAIK','88','B','BAIK','2026-07-22 18:37:36','2026-07-22 18:40:20'),(119,11,6,10,3,1,'88','B','BAIK','87','B','BAIK','2026-07-22 18:37:57','2026-07-22 18:40:18'),(120,12,6,10,3,1,'92','A','SANGAT BAIK','93','A','SANGAT BAIK','2026-07-22 18:38:31','2026-07-22 18:40:16'),(121,13,6,10,3,1,'87','B','BAIK','88','B','BAIK','2026-07-22 18:38:48','2026-07-22 18:40:14'),(122,2,4,11,11,1,'85','B','BAIK','88','B','BAIK','2026-07-22 18:41:37','2026-07-22 18:46:09'),(123,5,4,11,11,1,'86','B','BAIK','91','A','SANGAT BAIK','2026-07-22 18:42:27','2026-07-22 18:46:04'),(124,3,4,11,11,1,'81','B','BAIK','80','C','CUKUP','2026-07-22 18:42:32','2026-07-22 18:46:07'),(125,4,4,11,11,1,'84','B','BAIK','89','B','BAIK','2026-07-22 18:42:43','2026-07-22 18:46:06'),(126,6,5,11,11,1,'82','B','BAIK','89','B','BAIK','2026-07-22 18:43:55','2026-07-22 18:46:30'),(127,7,5,11,11,1,'83','B','BAIK','88','B','BAIK','2026-07-22 18:44:00','2026-07-22 18:46:29'),(128,8,5,11,11,1,'86','B','BAIK','83','B','BAIK','2026-07-22 18:44:04','2026-07-22 18:46:27'),(129,9,5,11,11,1,'86','B','BAIK','80','C','CUKUP','2026-07-22 18:44:09','2026-07-22 18:46:26'),(130,12,6,11,11,1,'94','A','SANGAT BAIK','93','A','SANGAT BAIK','2026-07-22 18:45:28','2026-07-22 18:46:54'),(131,10,6,11,11,1,'87','B','BAIK','90','B','BAIK','2026-07-22 18:45:32','2026-07-22 18:46:57'),(132,11,6,11,11,1,'88','B','BAIK','91','A','SANGAT BAIK','2026-07-22 18:45:37','2026-07-22 18:46:56'),(133,13,6,11,11,1,'87','B','BAIK','90','B','BAIK','2026-07-22 18:45:42','2026-07-22 18:46:52'),(134,5,4,12,12,1,'90','B','BAIK','90','B','BAIK','2026-07-22 18:49:24','2026-07-22 18:52:55'),(135,4,4,12,12,1,'84','B','BAIK','89','B','BAIK','2026-07-22 18:49:29','2026-07-22 18:52:56'),(136,3,4,12,12,1,'82','B','BAIK','87','B','BAIK','2026-07-22 18:49:34','2026-07-22 18:52:57'),(137,2,4,12,12,1,'86','B','BAIK','88','B','BAIK','2026-07-22 18:49:40','2026-07-22 18:52:58'),(138,6,5,12,12,1,'87','B','BAIK','90','B','BAIK','2026-07-22 18:50:50','2026-07-22 18:53:28'),(139,7,5,12,12,1,'89','B','BAIK','91','A','SANGAT BAIK','2026-07-22 18:50:55','2026-07-22 18:53:27'),(140,8,5,12,12,1,'86','B','BAIK','87','B','BAIK','2026-07-22 18:51:00','2026-07-22 18:53:25'),(141,9,5,12,12,1,'85','B','BAIK','88','B','BAIK','2026-07-22 18:51:06','2026-07-22 18:53:24'),(142,10,6,12,12,1,'86','B','BAIK','88','B','BAIK','2026-07-22 18:52:17','2026-07-22 18:53:52'),(143,11,6,12,12,1,'87','B','BAIK','89','B','BAIK','2026-07-22 18:52:24','2026-07-22 18:53:50'),(144,12,6,12,12,1,'92','A','SANGAT BAIK','94','A','SANGAT BAIK','2026-07-22 18:52:31','2026-07-22 18:53:49'),(145,13,6,12,12,1,'89','B','BAIK','91','A','SANGAT BAIK','2026-07-22 18:52:37','2026-07-22 18:53:48'),(146,2,4,13,13,1,'86','B','BAIK','80','C','CUKUP','2026-07-23 01:42:08','2026-07-23 01:43:41'),(147,3,4,13,13,1,'83','B','BAIK','85','B','BAIK','2026-07-23 01:42:41','2026-07-23 01:43:40'),(148,4,4,13,13,1,'85','B','BAIK','89','B','BAIK','2026-07-23 01:42:59','2026-07-23 01:43:38'),(149,5,4,13,13,1,'83','B','BAIK','92','A','SANGAT BAIK','2026-07-23 01:43:18','2026-07-23 01:43:36'),(150,6,5,13,13,1,'90','B','BAIK',NULL,NULL,NULL,'2026-07-23 18:15:43','2026-07-23 18:15:43'),(151,7,5,13,13,1,'90','B','BAIK',NULL,NULL,NULL,'2026-07-23 18:15:54','2026-07-23 18:15:54'),(152,14,4,3,8,1,'88','B','BAIK',NULL,NULL,NULL,'2026-07-31 10:15:11','2026-07-31 10:15:11'),(153,14,4,13,13,1,'99','A','Siswa sangat menguasai mata pelajaran biologi',NULL,NULL,NULL,'2026-08-09 05:36:37','2026-08-09 05:36:37'),(154,14,4,9,5,1,'85','B','BAIK',NULL,NULL,NULL,'2026-08-10 03:15:20','2026-08-10 03:15:20'),(155,14,4,10,3,1,'85','B','BAIK',NULL,NULL,NULL,'2026-08-10 03:27:18','2026-08-10 03:27:18'),(156,14,4,1,1,1,'82','B','BAIK',NULL,NULL,NULL,'2026-08-10 03:36:56','2026-08-10 03:36:56'),(157,14,4,8,4,1,'75','C','CUKUP',NULL,NULL,NULL,'2026-08-10 06:57:44','2026-08-10 07:29:18');
/*!40000 ALTER TABLE `rapot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruang`
--

DROP TABLE IF EXISTS `ruang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruang`
--

LOCK TABLES `ruang` WRITE;
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` VALUES (1,'Ruang 01','2026-07-13 16:16:43','2026-07-13 16:16:43'),(2,'Ruang 02','2026-07-13 16:16:43','2026-07-13 16:16:43'),(3,'Ruang 03','2026-07-13 16:16:43','2026-07-13 16:16:43'),(4,'Ruang 04','2026-07-13 16:16:43','2026-07-13 16:16:43'),(5,'Ruang 05','2026-07-13 16:16:43','2026-07-13 16:16:43'),(6,'Ruang 06','2026-07-13 16:16:43','2026-07-13 16:16:43'),(7,'Ruang 07','2026-07-13 16:16:43','2026-07-13 16:16:43'),(8,'Ruang 08','2026-07-13 16:16:43','2026-07-13 16:16:43'),(9,'Ruang 09','2026-07-13 16:16:43','2026-07-13 16:16:43'),(10,'Ruang 10','2026-07-13 16:16:43','2026-07-13 16:16:43'),(11,'Ruang 11','2026-07-13 16:16:43','2026-07-13 16:16:43'),(12,'Ruang 12','2026-07-13 16:16:43','2026-07-13 16:16:43'),(13,'Ruang 13','2026-07-13 16:16:43','2026-07-13 16:16:43'),(14,'Ruang 14','2026-07-13 16:16:43','2026-07-13 16:16:43'),(15,'Ruang 15','2026-07-13 16:16:43','2026-07-13 16:16:43'),(16,'Ruang 16','2026-07-13 16:16:43','2026-07-13 16:16:43'),(17,'Ruang 17','2026-07-13 16:16:43','2026-07-13 16:16:43'),(18,'Ruang 18','2026-07-13 16:16:43','2026-07-13 16:16:43'),(19,'Ruang 19','2026-07-13 16:16:43','2026-07-13 16:16:43'),(20,'Ruang 20','2026-07-13 16:16:43','2026-07-13 16:16:43'),(21,'Ruang 21','2026-07-13 16:16:43','2026-07-13 16:16:43'),(22,'Ruang 22','2026-07-13 16:16:43','2026-07-13 16:16:43'),(23,'Ruang 23','2026-07-13 16:16:43','2026-07-13 16:16:43'),(24,'Ruang 24','2026-07-13 16:16:43','2026-07-13 16:16:43'),(25,'Ruang 25','2026-07-13 16:16:43','2026-07-13 16:16:43'),(26,'Ruang 26','2026-07-13 16:16:43','2026-07-13 16:16:43'),(27,'Ruang 27','2026-07-13 16:16:43','2026-07-13 16:16:43'),(28,'Ruang 28','2026-07-13 16:16:43','2026-07-13 16:16:43'),(29,'Ruang 29','2026-07-13 16:16:43','2026-07-13 16:16:43'),(30,'Ruang 30','2026-07-13 16:16:43','2026-07-13 16:16:43'),(31,'Ruang 31','2026-07-13 16:16:43','2026-07-13 16:16:43'),(32,'Ruang 32','2026-07-13 16:16:43','2026-07-13 16:16:43'),(33,'Ruang 33','2026-07-13 16:16:43','2026-07-13 16:16:43'),(34,'Ruang 34','2026-07-13 16:16:43','2026-07-13 16:16:43'),(35,'Ruang 35','2026-07-13 16:16:43','2026-07-13 16:16:43'),(36,'Ruang 36','2026-07-13 16:16:43','2026-07-13 16:16:43'),(37,'Ruang 37','2026-07-13 16:16:43','2026-07-13 16:16:43'),(38,'Ruang 38','2026-07-13 16:16:43','2026-07-13 16:16:43'),(39,'Ruang 39','2026-07-13 16:16:43','2026-07-13 16:16:43'),(40,'Ruang 40','2026-07-13 16:16:43','2026-07-13 16:16:43');
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sikap`
--

DROP TABLE IF EXISTS `sikap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sikap` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `tahun_pelajaran_id` bigint(20) unsigned DEFAULT NULL,
  `sikap_1` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sikap_2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sikap_3` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sikap_tahun_pelajaran_id_foreign` (`tahun_pelajaran_id`),
  CONSTRAINT `sikap_tahun_pelajaran_id_foreign` FOREIGN KEY (`tahun_pelajaran_id`) REFERENCES `tahun_pelajaran` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sikap`
--

LOCK TABLES `sikap` WRITE;
/*!40000 ALTER TABLE `sikap` DISABLE KEYS */;
/*!40000 ALTER TABLE `sikap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_induk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_siswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmp_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `status` enum('aktif','lulus','keluar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (2,'3315141230010001','2022150101','ANANG SETIAWAN','L','089767548997','SEMARANG','2012-03-12','uploads/siswa/56262122072026_rider-5.jpg',5,'aktif','2026-07-22 14:26:56','2026-08-10 08:40:15',NULL),(3,'3315141230010002','2022150102','FAIZ ULURROSYAD','L','089955678675','JEPARA','2012-04-14','uploads/siswa/00282122072026_rider-40.jpg',4,'aktif','2026-07-22 14:28:00','2026-07-22 14:28:00',NULL),(4,'3315141230010003','2022150103','NAHDI ABDUSSANI','L','081234567890','CILACAP','2012-09-14','uploads/siswa/09292122072026_rider-48.jpg',4,'aktif','2026-07-22 14:29:09','2026-07-22 14:29:09',NULL),(5,'3315141230010004','2022150104','BINTANG SUTENA','P','087683459224','JAKARTA','2012-01-29','uploads/siswa/27302122072026_rider-43.jpg',4,'aktif','2026-07-22 14:30:27','2026-07-22 14:30:27',NULL),(6,'3315141230010005','2022150105','INDAH PERMANA','P','088627138934','JEPARA','2012-04-29','uploads/siswa/56312122072026_rider-92.jpg',5,'aktif','2026-07-22 14:31:56','2026-07-22 14:31:56',NULL),(7,'3315141230010006','2022150106','SAGITA DWI CAHAYA','P','089375243784','GROBOGAN','2012-10-11','uploads/siswa/20332122072026_rider-17.jpg',5,'aktif','2026-07-22 14:33:20','2026-07-22 14:33:20',NULL),(8,'3315141230010007','2022150107','HILMI FIRMANSYAH','L','085423418745','JAMBI','2012-01-20','uploads/siswa/31342122072026_rider-24.jpg',5,'aktif','2026-07-22 14:34:31','2026-07-22 14:34:31',NULL),(9,'3315141230010008','2022150108','ARSYAD FATCHURROHMAN','L','082354887623','PATI','2012-10-19','uploads/siswa/52352122072026_rider-198.jpg',6,'aktif','2026-07-22 14:35:52','2026-08-10 23:20:01',NULL),(10,'3315141230010009','2022150109','NASRUL HIDAYAT','L','081576348823','BANJARNEGARA','2012-04-19','uploads/siswa/55372122072026_rider-155.jpg',6,'aktif','2026-07-22 14:37:55','2026-07-22 14:37:55',NULL),(11,'3315141230010010','2022150110','MUHAMMAD ZIDAN','L','083457280012','DEMAK','2012-01-14','uploads/siswa/58392122072026_rider-190.jpg',6,'lulus','2026-07-22 14:39:58','2026-08-10 08:49:15',NULL),(12,'3315141230010011','2022150111','SALWA MALIKA','P','081347580923','PEKALONGAN','2012-09-22','uploads/siswa/38412122072026_rider-29.jpg',6,'aktif','2026-07-22 14:41:38','2026-07-22 14:41:38',NULL),(13,'3315141230010012','2022150112','INTAN CAHYANI','P','085426784552','BLORA','2012-07-25','uploads/siswa/09432122072026_rider-180.jpg',6,'aktif','2026-07-22 14:43:09','2026-07-22 14:43:09',NULL),(14,'20221551555','222','eqtada','L','0888','kudus','2022-12-12','uploads/siswa/18141731072026_rider-51.jpg',6,'aktif','2026-07-31 10:14:18','2026-08-10 23:19:33',NULL);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun_pelajaran`
--

DROP TABLE IF EXISTS `tahun_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tahun_pelajaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_pelajaran` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun_pelajaran`
--

LOCK TABLES `tahun_pelajaran` WRITE;
/*!40000 ALTER TABLE `tahun_pelajaran` DISABLE KEYS */;
INSERT INTO `tahun_pelajaran` VALUES (1,'2026/2027','Ganjil',0,'2026-08-09 06:32:38','2026-08-10 09:30:49'),(2,'2026/2027','Genap',1,'2026-08-10 08:04:40','2026-08-10 09:30:49');
/*!40000 ALTER TABLE `tahun_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ulangan`
--

DROP TABLE IF EXISTS `ulangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ulangan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `ulha_1` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ulha_2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uts` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ulha_3` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uas` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulangan`
--

LOCK TABLES `ulangan` WRITE;
/*!40000 ALTER TABLE `ulangan` DISABLE KEYS */;
INSERT INTO `ulangan` VALUES (1,1,1,1,1,'80','78','86','88','86','2026-07-22 02:29:36','2026-07-22 02:30:34'),(2,2,4,1,1,'80','80','87','78','79','2026-07-22 17:04:44','2026-07-22 17:04:51'),(3,3,4,1,1,'76','88','82','85','80','2026-07-22 17:05:16','2026-07-22 17:05:24'),(4,4,4,1,1,'79','87','90','88','86','2026-07-22 17:05:41','2026-07-22 17:05:47'),(5,5,4,1,1,'80','83','86','89','91','2026-07-22 17:06:06','2026-07-22 17:06:06'),(6,6,5,1,1,'87','78','86','79','90','2026-07-22 17:06:40','2026-07-22 17:06:40'),(7,7,5,1,1,'89','91','88','81','80','2026-07-22 17:07:02','2026-07-22 17:07:02'),(8,8,5,1,1,'91','92','90','89','90','2026-07-22 17:07:27','2026-07-22 17:07:27'),(9,9,5,1,1,'79','87','82','85','89','2026-07-22 17:07:50','2026-07-22 17:07:50'),(10,10,6,1,1,'79','78','77','76','80','2026-07-22 17:08:49','2026-07-22 17:08:49'),(11,11,6,1,1,'80','83','89','86','85','2026-07-22 17:09:07','2026-07-22 17:09:07'),(12,12,6,1,1,'87','89','91','95','90','2026-07-22 17:09:25','2026-07-22 17:09:25'),(13,13,6,1,1,'82','85','81','80','83','2026-07-22 17:09:45','2026-07-22 17:09:45'),(14,2,4,3,8,'88','80','78','89','93','2026-07-22 17:13:52','2026-07-22 17:13:52'),(15,3,4,3,8,'98','97','93','91','92','2026-07-22 17:14:14','2026-07-22 17:14:14'),(16,4,4,3,8,'92','90','90','91','89','2026-07-22 17:14:29','2026-07-22 17:14:29'),(17,5,4,3,8,'89','92','95','93','97','2026-07-22 17:14:49','2026-07-22 17:14:49'),(18,6,5,3,8,'91','98','92','94','90','2026-07-22 17:15:09','2026-07-22 17:15:09'),(19,7,5,3,8,'93','92','92','90','96','2026-07-22 17:15:31','2026-07-22 17:15:31'),(20,8,5,3,8,'94','89','97','90','92','2026-07-22 17:15:46','2026-07-22 17:15:46'),(21,9,5,3,8,'89','90','92','91','93','2026-07-22 17:16:52','2026-07-22 17:16:52'),(22,10,6,3,8,'89','88','90','87','91','2026-07-22 17:17:17','2026-07-22 17:17:17'),(23,11,6,3,8,'88','90','91','93','92','2026-07-22 17:17:38','2026-07-22 17:17:38'),(24,12,6,3,8,'87','93','96','98','98','2026-07-22 17:18:02','2026-07-22 17:18:02'),(25,13,6,3,8,'90','92','92','93','92','2026-07-22 17:18:26','2026-07-22 17:18:26'),(26,2,4,2,2,'78','76','77','78','80','2026-07-22 17:21:15','2026-07-22 17:22:02'),(27,3,4,2,2,'80','78','77','75','79','2026-07-22 17:22:56','2026-07-22 17:23:02'),(28,4,4,2,2,'82','74','80','72','84','2026-07-22 17:24:18','2026-07-22 17:24:26'),(29,5,4,2,2,'80','76','86','80','78','2026-07-22 17:25:01','2026-07-22 17:25:08'),(30,6,5,2,2,'80','82','76','86','90','2026-07-22 17:25:36','2026-07-22 17:25:41'),(31,7,5,2,2,'76','80','84','78','82','2026-07-22 17:26:06','2026-07-22 17:26:12'),(32,8,5,2,2,'80','74','82','78','80','2026-07-22 17:26:41','2026-07-22 17:26:46'),(33,9,5,2,2,'84','80','90','92','90','2026-07-22 17:27:05','2026-07-22 17:27:10'),(34,10,6,2,2,'88','88','76','80','92','2026-07-22 17:27:40','2026-07-22 17:27:48'),(35,11,6,2,2,'78','80','76','84','90','2026-07-22 17:28:05','2026-07-22 17:28:10'),(36,12,6,2,2,'65','78','86','78','80','2026-07-22 17:28:29','2026-07-22 17:28:35'),(37,13,6,2,2,'70','86','80','86','96','2026-07-22 17:29:04','2026-07-22 17:29:09'),(38,2,4,4,10,'80','86','80','92','88','2026-07-22 17:34:13','2026-07-22 17:34:18'),(39,3,4,4,10,'76','80','94','86','90','2026-07-22 17:34:41','2026-07-22 17:34:47'),(40,4,4,4,10,'70','92','92','90','86','2026-07-22 17:35:15','2026-07-22 17:35:20'),(41,5,4,4,10,'82','76','82','86','90','2026-07-22 17:35:41','2026-07-22 17:35:46'),(42,6,5,4,10,'80','86','76','90','86','2026-07-22 17:36:13','2026-07-22 17:36:19'),(43,7,5,4,10,'80','76','84','80','80','2026-07-22 17:36:39','2026-07-22 17:36:43'),(44,8,5,4,10,'90','90','94','86','88','2026-07-22 17:36:59','2026-07-22 17:37:07'),(45,9,5,4,10,'78','76','70','74','78','2026-07-22 17:37:29','2026-07-22 17:37:39'),(46,10,6,4,10,'74','80','80','86','86','2026-07-22 17:38:06','2026-07-22 17:38:16'),(47,11,6,4,10,'80','74','84','82','90','2026-07-22 17:38:36','2026-07-22 17:38:41'),(48,12,6,4,10,'88','82','96','80','80','2026-07-22 17:39:04','2026-07-22 17:39:09'),(49,13,6,4,10,'88','76','90','88','98','2026-07-22 17:39:27','2026-07-22 17:39:34'),(50,2,4,5,9,'88','82','90','88','92','2026-07-22 17:43:24','2026-07-22 17:43:28'),(51,3,4,5,9,'72','78','80','74','70','2026-07-22 17:43:56','2026-07-22 17:44:01'),(52,4,4,5,9,'82','80','78','88','90','2026-07-22 17:44:17','2026-07-22 17:44:22'),(53,5,4,5,9,'86','80','82','82','92','2026-07-22 17:44:41','2026-07-22 17:44:53'),(54,6,5,5,9,'78','80','88','90','88','2026-07-22 17:45:20','2026-07-22 17:45:25'),(55,7,5,5,9,'78','86','90','88','84','2026-07-22 17:45:40','2026-07-22 17:45:46'),(56,8,5,5,9,'86','82','90','84','96','2026-07-22 17:46:08','2026-07-22 17:46:12'),(57,9,5,5,9,'80','72','86','90','88','2026-07-22 17:46:37','2026-07-22 17:46:43'),(58,10,6,5,9,'86','78','82','88','88','2026-07-22 17:47:14','2026-07-22 17:47:19'),(59,11,6,5,9,'82','90','90','86','90','2026-07-22 17:47:35','2026-07-22 17:47:42'),(60,12,6,5,9,'90','86','88','84','90','2026-07-22 17:48:10','2026-07-22 17:48:14'),(61,13,6,5,9,'82','88','80','82','92','2026-07-22 17:48:35','2026-07-22 17:48:40'),(62,2,4,6,6,'80','82','90','92','90','2026-07-22 17:52:00','2026-07-22 17:52:04'),(63,3,4,6,6,'70','78','72','80','78','2026-07-22 17:52:22','2026-07-22 17:52:26'),(64,4,4,6,6,'82','74','86','94','90','2026-07-22 17:52:43','2026-07-22 17:52:47'),(65,5,4,6,6,'88','80','92','88','92','2026-07-22 17:53:03','2026-07-22 17:53:08'),(66,6,5,6,6,'88','74','80','88','86','2026-07-22 17:53:41','2026-07-22 17:53:45'),(67,7,5,6,6,'78','76','86','80','90','2026-07-22 17:54:05','2026-07-22 17:54:11'),(68,8,5,6,6,'88','84','90','88','96','2026-07-22 17:54:30','2026-07-22 17:54:35'),(69,9,5,6,6,'80','82','80','92','88','2026-07-22 17:54:58','2026-07-22 17:55:03'),(70,10,6,6,6,'80','86','80','90','88','2026-07-22 17:55:27','2026-07-22 17:55:32'),(71,11,6,6,6,'74','80','88','82','88','2026-07-22 17:55:51','2026-07-22 17:55:56'),(72,12,6,6,6,'78','78','80','74','82','2026-07-22 17:56:22','2026-07-22 17:56:26'),(73,13,6,6,6,'82','90','94','82','80','2026-07-22 17:56:43','2026-07-22 17:56:48'),(74,2,4,7,7,'78','74','80','80','78','2026-07-22 18:00:05','2026-07-22 18:00:09'),(75,3,4,7,7,'80','82','90','94','90','2026-07-22 18:00:27','2026-07-22 18:00:32'),(76,4,4,7,7,'82','88','88','90','86','2026-07-22 18:00:49','2026-07-22 18:00:54'),(77,5,4,7,7,'88','90','84','86','90','2026-07-22 18:01:12','2026-07-22 18:01:17'),(78,6,5,7,7,'80','88','90','88','92','2026-07-22 18:01:45','2026-07-22 18:01:49'),(79,7,5,7,7,'80','76','90','82','88','2026-07-22 18:02:06','2026-07-22 18:02:10'),(80,8,5,7,7,'82','88','94','86','98','2026-07-22 18:02:34','2026-07-22 18:02:39'),(81,9,5,7,7,'78','80','80','88','90','2026-07-22 18:02:55','2026-07-22 18:03:02'),(82,10,6,7,7,'88','90','80','86','90','2026-07-22 18:03:22','2026-07-22 18:03:26'),(83,11,6,7,7,'78','88','82','94','86','2026-07-22 18:03:40','2026-07-22 18:03:44'),(84,12,6,7,7,'84','76','88','82','86','2026-07-22 18:04:02','2026-07-22 18:04:06'),(85,13,6,7,7,'88','90','78','84','92','2026-07-22 18:04:23','2026-07-22 18:04:29'),(86,2,4,8,4,'80','86','90','88','88','2026-07-22 18:07:51','2026-07-22 18:07:56'),(87,3,4,8,4,'70','78','80','76','88','2026-07-22 18:08:18','2026-07-22 18:08:22'),(88,4,4,8,4,'80','78','82','90','88','2026-07-22 18:08:41','2026-07-22 18:08:46'),(89,5,4,8,4,'90','88','92','90','96','2026-07-22 18:09:05','2026-07-22 18:09:10'),(90,6,5,8,4,'78','76','80','82','80','2026-07-22 18:09:32','2026-07-22 18:09:37'),(91,7,5,8,4,'82','80','86','72','80','2026-07-22 18:09:50','2026-07-22 18:09:54'),(92,8,5,8,4,'90','84','88','92','90','2026-07-22 18:10:15','2026-07-22 18:10:19'),(93,9,5,8,4,'86','90','78','80','88','2026-07-22 18:10:38','2026-07-22 18:10:46'),(94,10,6,8,4,'80','78','88','80','92','2026-07-22 18:11:11','2026-07-22 18:11:16'),(95,11,6,8,4,'82','78','90','92','88','2026-07-22 18:11:28','2026-07-22 18:11:33'),(96,12,6,8,4,'86','86','90','92','88','2026-07-22 18:11:55','2026-07-22 18:12:00'),(97,13,6,8,4,'78','86','80','80','88','2026-07-22 18:12:18','2026-07-22 18:12:22'),(98,2,4,9,5,'80','82','88','88','90','2026-07-22 18:15:06','2026-07-22 18:15:10'),(99,3,4,9,5,'88','82','90','86','96','2026-07-22 18:15:28','2026-07-22 18:15:32'),(100,4,4,9,5,'88','78','90','92','86','2026-07-22 18:15:49','2026-07-22 18:15:55'),(101,5,4,9,5,'76','80','82','76','80','2026-07-22 18:16:09','2026-07-22 18:16:13'),(102,6,5,9,5,'76','80','90','84','88','2026-07-22 18:16:35','2026-07-22 18:16:39'),(103,7,5,9,5,'80','86','80','92','90','2026-07-22 18:16:57','2026-07-22 18:17:02'),(104,8,5,9,5,'82','78','92','88','88','2026-07-22 18:17:18','2026-07-22 18:17:37'),(105,9,5,9,5,'78','80','86','80','94','2026-07-22 18:17:59','2026-07-22 18:18:03'),(106,10,6,9,5,'82','90','86','80','90','2026-07-22 18:18:24','2026-07-22 18:18:30'),(107,11,6,9,5,'78','80','80','86','80','2026-07-22 18:18:43','2026-07-22 18:18:49'),(108,12,6,9,5,'88','78','84','90','90','2026-07-22 18:19:07','2026-07-22 18:19:13'),(109,13,6,9,5,'76','88','78','94','88','2026-07-22 18:19:29','2026-07-22 18:19:34'),(110,2,4,10,3,'78','87','79','90','87','2026-07-22 18:34:28','2026-07-22 18:34:34'),(111,3,4,10,3,'77','78','77','79','80','2026-07-22 18:34:44','2026-07-22 18:34:47'),(112,4,4,10,3,'87','88','85','80','81','2026-07-22 18:35:02','2026-07-22 18:35:10'),(113,5,4,10,3,'80','89','82','87','85','2026-07-22 18:35:27','2026-07-22 18:35:31'),(114,6,5,10,3,'79','90','89','84','94','2026-07-22 18:35:51','2026-07-22 18:35:59'),(115,7,5,10,3,'83','85','80','84','91','2026-07-22 18:36:13','2026-07-22 18:36:23'),(116,8,5,10,3,'89','90','93','97','95','2026-07-22 18:36:40','2026-07-22 18:36:45'),(117,9,5,10,3,'98','79','84','86','89','2026-07-22 18:37:02','2026-07-22 18:37:09'),(118,10,6,10,3,'88','87','88','90','92','2026-07-22 18:37:32','2026-07-22 18:37:36'),(119,11,6,10,3,'80','85','86','90','94','2026-07-22 18:37:52','2026-07-22 18:37:57'),(120,12,6,10,3,'94','92','95','90','91','2026-07-22 18:38:24','2026-07-22 18:38:31'),(121,13,6,10,3,'89','83','87','85','90','2026-07-22 18:38:43','2026-07-22 18:38:48'),(122,2,4,11,11,'88','87','80','82','89','2026-07-22 18:41:32','2026-07-22 18:41:37'),(123,3,4,11,11,'74','75','78','85','88','2026-07-22 18:41:54','2026-07-22 18:42:32'),(124,4,4,11,11,'82','84','80','81','91','2026-07-22 18:42:07','2026-07-22 18:42:43'),(125,5,4,11,11,'84','88','82','83','90','2026-07-22 18:42:17','2026-07-22 18:42:27'),(126,6,5,11,11,'79','86','82','88','80','2026-07-22 18:43:09','2026-07-22 18:43:55'),(127,7,5,11,11,'80','79','82','93','83','2026-07-22 18:43:22','2026-07-22 18:44:00'),(128,8,5,11,11,'94','89','80','85','85','2026-07-22 18:43:36','2026-07-22 18:44:04'),(129,9,5,11,11,'91','92','80','79','87','2026-07-22 18:43:50','2026-07-22 18:44:09'),(130,10,6,11,11,'80','84','90','93','89','2026-07-22 18:44:27','2026-07-22 18:45:32'),(131,11,6,11,11,'83','86','89','91','90','2026-07-22 18:44:41','2026-07-22 18:45:37'),(132,12,6,11,11,'92','94','95','96','95','2026-07-22 18:44:56','2026-07-22 18:45:28'),(133,13,6,11,11,'83','88','86','89','90','2026-07-22 18:45:10','2026-07-22 18:45:42'),(134,2,4,12,12,'80','87','83','88','90','2026-07-22 18:48:20','2026-07-22 18:49:40'),(135,3,4,12,12,'86','79','81','80','85','2026-07-22 18:48:32','2026-07-22 18:49:34'),(136,4,4,12,12,'83','84','80','84','88','2026-07-22 18:48:50','2026-07-22 18:49:29'),(137,5,4,12,12,'88','90','91','90','91','2026-07-22 18:49:04','2026-07-22 18:49:24'),(138,6,5,12,12,'87','89','88','85','88','2026-07-22 18:50:01','2026-07-22 18:50:50'),(139,7,5,12,12,'89','84','90','91','90','2026-07-22 18:50:13','2026-07-22 18:50:55'),(140,8,5,12,12,'88','87','90','85','85','2026-07-22 18:50:32','2026-07-22 18:51:00'),(141,9,5,12,12,'84','90','87','82','84','2026-07-22 18:50:46','2026-07-22 18:51:06'),(142,10,6,12,12,'85','83','87','89','87','2026-07-22 18:51:28','2026-07-22 18:52:17'),(143,11,6,12,12,'83','88','89','87','90','2026-07-22 18:51:41','2026-07-22 18:52:24'),(144,12,6,12,12,'90','92','91','93','94','2026-07-22 18:51:56','2026-07-22 18:52:31'),(145,13,6,12,12,'89','90','90','88','90','2026-07-22 18:52:13','2026-07-22 18:52:37'),(146,2,4,13,13,'90','89','88','87','83','2026-07-23 01:42:03','2026-07-23 01:42:08'),(147,3,4,13,13,'79','80','81','82','88','2026-07-23 01:42:35','2026-07-23 01:42:41'),(148,4,4,13,13,'88','85','81','80','89','2026-07-23 01:42:55','2026-07-23 01:43:00'),(149,5,4,13,13,'80','83','85','87','83','2026-07-23 01:43:13','2026-07-23 01:43:18'),(150,6,5,13,13,'90','90','90','90','90','2026-07-23 18:15:39','2026-07-23 18:15:43'),(151,14,4,3,8,'88','88','88','88','88','2026-07-31 10:15:05','2026-07-31 10:15:11'),(152,14,4,13,13,'99','99','99','99','99','2026-08-09 05:36:31','2026-08-09 05:36:37'),(153,14,4,9,5,'88','88','98','78','80','2026-08-10 03:15:13','2026-08-10 03:15:20');
/*!40000 ALTER TABLE `ulangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Guru','Siswa','Operator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$10$b/yHVN.66Rm5NUThPzUs1O3lamR/lgKQOfAelqNtYXiLZnNLcPNJa','Admin',NULL,NULL,NULL,'2026-07-13 16:16:43','2026-07-13 16:16:43',NULL),(2,'TUTUK INDRIYANI','tutukindriyani@gmail.com',NULL,'$2y$10$LJy7kI6AWC7yO/KHkwdhEeLNr38P8wcsVr0FVe4badyjNNDJzmd3G','Guru',NULL,'00001',NULL,'2026-07-14 01:39:21','2026-07-14 01:39:21',NULL),(3,'ANDY ROCHMAN','andyrochman@gmail.com',NULL,'$2y$10$.fWAguwtcd6FCnoRfdnSO.3JfrbqIvghljO9Xl88slqlduzal5D8C','Guru',NULL,'00003',NULL,'2026-07-22 02:34:17','2026-07-22 02:34:17',NULL),(4,'RINCI KEMBANG HAPSARI','rincikembanghapsari@gmail.com',NULL,'$2y$10$GKfQ9hhyIVyR3NKo2YeRDO6s257kfFbFPnpbGmhrdi77U053qgVQ6','Guru',NULL,'00002',NULL,'2026-07-22 02:35:46','2026-07-22 02:35:46',NULL),(5,'anang setiawan','anangsetiawan@gmail.com',NULL,'$2y$10$revOlfRSa4HIA.1IoogKXOhNR0/7XJxEBAJuUlBX65hrPsk4GaDZG','Siswa','3315141230010001',NULL,NULL,'2026-07-22 16:37:00','2026-07-22 16:37:00',NULL),(6,'bintang sutena','bintangsutena@gmail.com',NULL,'$2y$10$3zwHSY6u2uHIXHg97LPscey3xS2QNCvlwuYd2ybZpaDYTA.Nvj.1q','Siswa','3315141230010004',NULL,NULL,'2026-07-22 16:41:09','2026-07-22 16:41:09',NULL),(7,'faiz ulurrosyad','faizulurrosyad@gmail.com',NULL,'$2y$10$9IkjdSaI4Jr2a1Eg15P0oej9h7SCLhEXKEQeh/4GLxQKjCUTtkU3e','Siswa','3315141230010002',NULL,NULL,'2026-07-22 16:41:50','2026-07-22 16:41:50',NULL),(8,'nahdi abdussani','nahdiabdussani@gmail.com',NULL,'$2y$10$oX28iCDf3ubtjgOftRfW..yoTaqFS0rueXzncmRAP.nWbR4RNtlJC','Siswa','3315141230010003',NULL,NULL,'2026-07-22 16:42:40','2026-07-22 16:42:40',NULL),(9,'arsyad fatchurrohman','arsyadfatchurrohman@gmail.com',NULL,'$2y$10$dMvQuj6dPQiiMuA8wPED3eZ2wk.JWidb5WSLy5p7RLIce5dM8Foju','Siswa','3315141230010008',NULL,NULL,'2026-07-22 16:44:10','2026-07-22 16:44:10',NULL),(10,'hilmi firmansyah','hilmifirmansyah@gmail.com',NULL,'$2y$10$/TaPx4UxrUWba3L3Aw/CSO5a84I5cBIeEuHqBkd1TRX0x8iZ4X2Ci','Siswa','3315141230010007',NULL,NULL,'2026-07-22 16:45:24','2026-07-22 16:45:24',NULL),(11,'indah permana','indahpermana@gmail.com',NULL,'$2y$10$EBPQZixGJFzvwdJil0Dfd.R/NWIn6saQ875ktVXd.dh4IA1Ad4y4i','Siswa','3315141230010005',NULL,NULL,'2026-07-22 16:46:03','2026-07-22 16:46:03',NULL),(12,'sagita dwi cahaya','sagitadwicahaya@gmail.com',NULL,'$2y$10$NTEEe/mQySjfSNkXTcvCzOxYtXnRRDvtvvzU0BqXAAoiAl/oIXRKS','Siswa','3315141230010006',NULL,NULL,'2026-07-22 16:46:45','2026-07-22 16:46:45',NULL),(13,'intan cahyani','intancahyani@gmail.com',NULL,'$2y$10$s2yAcSKfsQZ1DcazvYIM2uOnCZZbrumQcduuM3M3DCnfoNNviTg7a','Siswa','3315141230010012',NULL,NULL,'2026-07-22 16:47:26','2026-07-22 16:47:26',NULL),(14,'muhammad zidan','muhammadzidan@gmail.com',NULL,'$2y$10$.J9x8jM/IFr4kDXerJNO4OjctaftBF2H7YTsLX5kNfOEZarJrISSW','Siswa','3315141230010010',NULL,NULL,'2026-07-22 16:48:03','2026-07-22 16:48:03',NULL),(15,'nasrul hidayat','nasrulhidayat@gmail.com',NULL,'$2y$10$gdlT5ROFiEMrPB.D5LjLm.4dChdWfCky2wt3qiV9ZAAtGGywuG9qO','Siswa','3315141230010009',NULL,NULL,'2026-07-22 16:48:41','2026-07-22 16:48:41',NULL),(16,'salwa malika','salwamalika@gmail.com',NULL,'$2y$10$mjleskLfet.UbygIshoDt.s.J./jjqruZXHNuFbLPhdyWIrmGEehW','Siswa','3315141230010011',NULL,NULL,'2026-07-22 16:49:19','2026-07-22 16:49:19',NULL),(17,'HENDRO NUGROHO','hendronugroho@gmail.com',NULL,'$2y$10$7BvDb6Fzgo257OO1c8bQ0eUDoCM51EtejtetcxSZOkL7AWyHccwW.','Guru',NULL,'00004',NULL,'2026-07-22 16:51:02','2026-07-22 16:51:02',NULL),(18,'AHMAD FAUZI','ahmadfauzi@gmail.com',NULL,'$2y$10$DgAD.Qd1xNk.rpk.Teu8CuYbqVVhPFax3PUzKt8QGiL.MfoJWA5ka','Guru',NULL,'00005',NULL,'2026-07-22 16:51:40','2026-07-22 16:51:40',NULL),(19,'SITI AMINAH','sitiaminah@gmail.com',NULL,'$2y$10$i84GXM982/hYvs7HyRMjuu0BYpbsFOl2MMxMpdMBTbXXOfv5qzlI.','Guru',NULL,'00006',NULL,'2026-07-22 16:52:32','2026-07-22 16:52:32',NULL),(20,'MUHAMMAD RIDWAN','muhammadridwan@gmail.com',NULL,'$2y$10$zaQE17XhRrj1XJ3A0jsahuewPDBB/hdA5dEQRBohpHrWdZ2mZuRh2','Guru',NULL,'00007',NULL,'2026-07-22 16:53:13','2026-07-22 16:53:13',NULL),(21,'NUR HIDAYAH','nurhidayah@gmail.com',NULL,'$2y$10$yJcuNXzqSHnDQwgIEtzs/ucPo9AMeszjao1RUMGXJkNwFZlIH50q.','Guru',NULL,'00008',NULL,'2026-07-22 16:53:49','2026-07-22 16:53:49',NULL),(22,'ABDUL KARIM','abdulkarim@gmail.com',NULL,'$2y$10$xF/Gwe55866ozaQ7129bke6sn5UfnCX4cc.azCFFllcP2Sr3D9ocS','Guru',NULL,'00009',NULL,'2026-07-22 16:54:25','2026-07-22 16:54:25',NULL),(23,'RINA KARTIKA','rinakartika@gmail.com',NULL,'$2y$10$BxniQPcPTnWOcGLP1f3sUePhFreP5CbLsVE3.lEL5NqI2/2a4cWcy','Guru',NULL,'00010',NULL,'2026-07-22 16:55:45','2026-07-22 16:55:45',NULL),(24,'YUSUF MAULANA','yusufmaulana@gmail.com',NULL,'$2y$10$CyncULJyEhS5bLTbsmS3g.vX.ddT4nz8A80AQ.Uviee1QpsxwXSy6','Guru',NULL,'00011',NULL,'2026-07-22 16:56:19','2026-07-22 16:56:19',NULL),(25,'DEWI LESTARI','dewilestari@gmail.com',NULL,'$2y$10$6LpCg2fDCcsgg8uzPaZuieww8higALRwbqwfknRJAONQ7qG0VsbAa','Guru',NULL,'00012',NULL,'2026-07-22 16:56:54','2026-07-22 16:56:54',NULL),(26,'YUDI','yudi@gmail.com',NULL,'$2y$10$rBEQgjfpjme29x28tJ75FuuZ1.0DL..WB6iu4WvoVyraRSnyn1Kru','Guru',NULL,'00013',NULL,'2026-07-23 01:38:17','2026-07-23 01:38:17',NULL);
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

-- Dump completed on 2026-09-02 12:20:05
