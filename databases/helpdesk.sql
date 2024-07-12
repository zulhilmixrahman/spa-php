-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.36 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for helpdesk
CREATE DATABASE IF NOT EXISTS `helpdesk` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `helpdesk`;

-- Dumping structure for table helpdesk.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table helpdesk.categories: ~5 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Kerosakan Peralatan', 1, '2024-07-09 21:37:17', '2024-07-09 21:38:15'),
	(2, 'Pemasangan / Installation', 1, '2024-07-09 21:37:58', '2024-07-09 21:38:23'),
	(3, 'Ralat Aplikasi', 1, '2024-07-09 21:38:40', '2024-07-09 21:38:40'),
	(4, 'Masalah Rangkaian', 1, '2024-07-10 13:07:51', '2024-07-12 08:51:31'),
	(5, 'Pertanyaan', 1, '2024-07-10 14:58:07', '2024-07-12 08:51:33');

-- Dumping structure for table helpdesk.complaints
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `ticket_no` varchar(255) DEFAULT NULL,
  `title` text NOT NULL,
  `detail` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table helpdesk.complaints: ~0 rows (approximately)

-- Dumping structure for table helpdesk.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table helpdesk.departments: ~4 rows (approximately)
INSERT INTO `departments` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'Bahagian Teknologi Maklumat', 'BTM', '2024-07-10 10:00:43', '2024-07-10 10:08:33'),
	(2, 'Bahagian Sumber Manusia', 'BSM', '2024-07-10 10:00:43', '2024-07-10 10:08:40'),
	(3, 'Bahagian Khidmat Pengurusan', 'BKP', '2024-07-11 09:14:10', '2024-07-12 08:51:26'),
	(4, 'Bahagian Strategik Antarabangsa', 'BSA', '2024-07-11 09:16:04', '2024-07-12 08:51:28');

-- Dumping structure for table helpdesk.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table helpdesk.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `department_id`, `created_at`, `updated_at`) VALUES
	(1, 'Pengguna 1', 'user@gmail.com', '$2y$10$WIZcbd.uKw4BcRKXXYdC0u8UmrtFGsqbh03n.0g7xfK9SpeVXn/Qe', 1, '2024-07-12 08:52:06', '2024-07-12 08:58:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
