-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kuliah
CREATE DATABASE IF NOT EXISTS `kuliah` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kuliah`;

-- Dumping structure for table kuliah.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(50) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table kuliah.dosen: ~3 rows (approximately)
INSERT INTO `dosen` (`nip`, `nama_dosen`, `no_hp`) VALUES
	('457685', 'Rizki', '0894532'),
	('5344', 'udin', '849853'),
	('56788765', 'Aripin', '085532499');

-- Dumping structure for table kuliah.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `id_matkul` int NOT NULL,
  `id_ruang` int NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `slot_mulai` char(1) NOT NULL,
  `slot_selesai` char(1) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `nip` (`nip`),
  KEY `id_matkul` (`id_matkul`),
  KEY `id_ruang` (`id_ruang`),
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE,
  CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`) ON DELETE CASCADE,
  CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id_ruang`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table kuliah.jadwal: ~0 rows (approximately)
INSERT INTO `jadwal` (`id_jadwal`, `nip`, `id_matkul`, `id_ruang`, `hari`, `slot_mulai`, `slot_selesai`) VALUES
	(1, '457685', 1, 1, 'Rabu', 'A', 'C'),
	(2, '457685', 1, 1, 'Senin', 'A', 'B'),
	(3, '457685', 1, 1, 'Jumat', 'C', 'D'),
	(4, '56788765', 1, 2, 'Rabu', 'A', 'B'),
	(5, '5344', 2, 1, 'Jumat', 'E', 'G');

-- Dumping structure for table kuliah.mata_kuliah
CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `id_matkul` int NOT NULL AUTO_INCREMENT,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int NOT NULL,
  `peserta` int NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table kuliah.mata_kuliah: ~0 rows (approximately)
INSERT INTO `mata_kuliah` (`id_matkul`, `nama_matkul`, `sks`, `peserta`) VALUES
	(1, 'kripto', 3, 30),
	(2, 'web design', 3, 45);

-- Dumping structure for table kuliah.ruangan
CREATE TABLE IF NOT EXISTS `ruangan` (
  `id_ruang` int NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(50) NOT NULL,
  `kapasitas` int NOT NULL,
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table kuliah.ruangan: ~0 rows (approximately)
INSERT INTO `ruangan` (`id_ruang`, `nama_ruang`, `kapasitas`) VALUES
	(1, 'E304', 45),
	(2, 'C102', 40);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
