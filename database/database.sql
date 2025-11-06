-- MySQL dump 10.13  Distrib 8.4.5, for macos15.4 (arm64)
--
-- Host: localhost    Database: ujikom
-- ------------------------------------------------------
-- Server version	9.2.0

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('faktur-management-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6','i:2;',1762393659),('faktur-management-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer','i:1762393659;',1762393659),('faktur-management-cache-spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:22:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:12:\"ViewAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"View:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Create:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"Update:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"Delete:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"Restore:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:16:\"ForceDelete:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:19:\"ForceDeleteAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:15:\"RestoreAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:14:\"Replicate:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"Reorder:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:12:\"ViewAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:9:\"View:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:11:\"Create:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:11:\"Update:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:11:\"Delete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:12:\"Restore:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:16:\"ForceDelete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:19:\"ForceDeleteAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"RestoreAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:14:\"Replicate:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:12:\"Reorder:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}}}',1762480003);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id_customer` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan_cust` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Ahmad Rivaldi','PT. Kreasi Berdikari Infomedia','depok','2025-11-05 19:08:12','2025-11-05 19:08:12'),(2,'Rahmad Anugrah','PT. ABCD','test','2025-11-05 19:37:44','2025-11-05 20:00:40'),(3,'Budi Santoso','PT. Nusantara Sejahtera','Jl. Merdeka No. 15, Jakarta Pusat','2025-11-05 23:11:44','2025-11-05 23:11:44'),(4,'Siti Rahmawati','CV. Andalas Jaya','Jl. Gatot Subroto No. 20, Bandung','2025-11-05 23:11:44','2025-11-05 23:11:44'),(5,'Andi Wijaya','PT. Mitra Teknologi','Jl. Diponegoro No. 35, Surabaya','2025-11-05 23:11:44','2025-11-05 23:11:44'),(6,'Ratna Dewi','PT. Sinar Abadi','Jl. Ahmad Yani No. 50, Medan','2025-11-05 23:11:44','2025-11-05 23:11:44'),(7,'Joko Prabowo','CV. Borneo Makmur','Jl. Soedirman No. 10, Balikpapan','2025-11-05 23:11:44','2025-11-05 23:11:44');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_faktur`
--

DROP TABLE IF EXISTS `detail_faktur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_faktur` (
  `id_produk` bigint unsigned NOT NULL,
  `no_faktur` bigint unsigned NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `price` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `detail_faktur_id_produk_foreign` (`id_produk`),
  KEY `detail_faktur_no_faktur_foreign` (`no_faktur`),
  CONSTRAINT `detail_faktur_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  CONSTRAINT `detail_faktur_no_faktur_foreign` FOREIGN KEY (`no_faktur`) REFERENCES `faktur` (`no_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_faktur`
--

LOCK TABLES `detail_faktur` WRITE;
/*!40000 ALTER TABLE `detail_faktur` DISABLE KEYS */;
INSERT INTO `detail_faktur` VALUES (2,2,1,5000,'2025-11-05 19:58:54','2025-11-05 19:58:54'),(1,4,10,3500,'2025-11-05 23:11:19','2025-11-05 23:11:19'),(1,5,1,3000,'2025-11-05 23:11:27','2025-11-05 23:11:27'),(2,5,1,5000,'2025-11-05 23:11:27','2025-11-05 23:11:27'),(4,6,1,35000,'2025-11-05 23:12:16','2025-11-05 23:12:16'),(7,6,1,850000,'2025-11-05 23:12:16','2025-11-05 23:12:16'),(3,6,1,550000,'2025-11-05 23:12:16','2025-11-05 23:12:16'),(7,3,10,850000,'2025-11-06 00:24:10','2025-11-06 00:24:10'),(2,1,1,5000,'2025-11-06 00:24:46','2025-11-06 00:24:46');
/*!40000 ALTER TABLE `detail_faktur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `faktur`
--

DROP TABLE IF EXISTS `faktur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faktur` (
  `no_faktur` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tgl_faktur` date NOT NULL,
  `due_date` date NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppn` int NOT NULL DEFAULT '0',
  `dp` int NOT NULL DEFAULT '0',
  `grand_total` int NOT NULL DEFAULT '0',
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` bigint unsigned NOT NULL,
  `id_perusahaan` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`no_faktur`),
  KEY `faktur_id_customer_foreign` (`id_customer`),
  KEY `faktur_id_perusahaan_foreign` (`id_perusahaan`),
  CONSTRAINT `faktur_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  CONSTRAINT `faktur_id_perusahaan_foreign` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faktur`
--

LOCK TABLES `faktur` WRITE;
/*!40000 ALTER TABLE `faktur` DISABLE KEYS */;
INSERT INTO `faktur` VALUES (1,'2025-11-06','2025-11-06','bca',11,0,5550,'test',1,2,'2025-11-05 19:12:41','2025-11-06 00:24:35'),(2,'2025-11-06','2025-11-06','BCA',11,0,5550,'Ahmad',1,2,'2025-11-05 19:53:52','2025-11-05 19:58:54'),(3,'2025-11-06','2025-11-06','Transfer BCA',11,4400,9430600,'Rivaldi',2,3,'2025-11-05 20:58:02','2025-11-06 00:24:10'),(4,'2025-11-06','2025-11-06','Transfer',11,0,38850,'Admin 1',1,2,'2025-11-05 22:47:56','2025-11-05 23:11:19'),(5,'2025-11-06','2025-11-06','aad',0,0,8000,'asd',2,3,'2025-11-05 23:07:14','2025-11-05 23:11:27'),(6,'2025-11-06','2025-11-06','Transfer',11,0,1592850,'Admin 1',7,8,'2025-11-05 23:12:16','2025-11-05 23:12:16');
/*!40000 ALTER TABLE `faktur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_11_05_164803_create_permission_tables',1),(5,'2025_11_06_013506_create_produk_table',1),(6,'2025_11_06_013640_create_customer_table',1),(7,'2025_11_06_013821_create_perusahaan_table',1),(8,'2025_11_06_013937_create_faktur_table',1),(9,'2025_11_06_014157_create_detail_faktur_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ViewAny:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(2,'View:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(3,'Create:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(4,'Update:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(5,'Delete:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(6,'Restore:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(7,'ForceDelete:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(8,'ForceDeleteAny:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(9,'RestoreAny:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(10,'Replicate:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(11,'Reorder:User','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(12,'ViewAny:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(13,'View:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(14,'Create:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(15,'Update:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(16,'Delete:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(17,'Restore:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(18,'ForceDelete:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(19,'ForceDeleteAny:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(20,'RestoreAny:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(21,'Replicate:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24'),(22,'Reorder:Role','web','2025-11-05 18:46:24','2025-11-05 18:46:24');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perusahaan`
--

DROP TABLE IF EXISTS `perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perusahaan` (
  `id_perusahaan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perusahaan`
--

LOCK TABLES `perusahaan` WRITE;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
INSERT INTO `perusahaan` VALUES (2,'PT. Kreasi Berdikari Infomedia','Depok','081285878276','123','2025-11-05 19:12:20','2025-11-05 19:12:20'),(3,'PT. ABC','123ss','123','123','2025-11-05 19:21:24','2025-11-05 20:50:44'),(6,'PT. Nusantara Sejahtera','Jl. Merdeka No. 12, Jakarta Pusat','0211234567','0211234568','2025-11-05 23:11:44','2025-11-05 23:11:44'),(7,'CV. Andalas Jaya','Jl. Sudirman No. 45, Bandung','0227654321','0227654322','2025-11-05 23:11:44','2025-11-05 23:11:44'),(8,'PT. Mitra Teknologi','Jl. Diponegoro No. 8, Surabaya','0319876543','0319876544','2025-11-05 23:11:44','2025-11-05 23:11:44'),(9,'PT. Sinar Abadi','Jl. Ahmad Yani No. 30, Medan','0618765432','0618765433','2025-11-05 23:11:44','2025-11-05 23:11:44'),(10,'CV. Borneo Makmur','Jl. Gatot Subroto No. 77, Balikpapan','0542765432','0542765433','2025-11-05 23:11:44','2025-11-05 23:11:44');
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produk` (
  `id_produk` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` VALUES (1,'Indomie Goreng',3000,'pcs',60,'2025-11-05 19:44:41','2025-11-05 19:49:10'),(2,'Teh Pucuk',5000,'botol',200,'2025-11-05 19:48:44','2025-11-05 19:48:44'),(3,'Printer Thermal 58mm',550000,'Perangkat',25,'2025-11-05 23:09:25','2025-11-05 23:09:25'),(4,'Kertas Struk 58mm',35000,'Consumable',120,'2025-11-05 23:09:25','2025-11-05 23:09:25'),(5,'Scanner Barcode USB',450000,'Perangkat',15,'2025-11-05 23:09:25','2025-11-05 23:09:25'),(6,'Laci Kasir Elektrik',650000,'Perangkat',10,'2025-11-05 23:09:25','2025-11-05 23:09:25'),(7,'Software POS Basic',850000,'Lisensi',50,'2025-11-05 23:09:25','2025-11-05 23:09:25');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','web','2025-11-05 18:46:13','2025-11-05 18:46:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('j5Ft5CPyxIoUfuGof1pMoBr3LRh2xdqXccD0ExtE',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMXNUMW5WRlNKb0dnYlQwcUZET0pkN0dNUXlRdE9zT2QxbE9oS01jdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly91amlrb20udGVzdCI7czo1OiJyb3V0ZSI7czo5OiJkYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1762413896);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','superadmin@example.com','2025-11-05 18:46:13','$2y$12$PR4tj3lYTWwYY6BmUP4BsecMVA/FNcDHB/c2dRa73Ot6qtEMgn9Si','rPiNj6LwAxXh1k0OYXcAdHP0awvZPF8ihI3W82i7HGVAZB3jr3lgjQfbt85c','2025-11-05 18:46:13','2025-11-05 18:46:13');
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

-- Dump completed on 2025-11-06 14:30:24
