-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk db_pwbs_gab2
CREATE DATABASE IF NOT EXISTS `db_pwbs_gab2` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pwbs_gab2`;

-- membuang struktur untuk table db_pwbs_gab2.tb_auth
CREATE TABLE IF NOT EXISTS `tb_auth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel db_pwbs_gab2.tb_auth: ~2 rows (lebih kurang)
INSERT INTO `tb_auth` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`, `username`) VALUES
	(1, 1, 'RESTAPI-GAB2', 0, 0, 0, NULL, 1, 'tes'),
	(2, 2, 'watidong', 1, 0, 0, NULL, 1, 'watiaja');

-- membuang struktur untuk table db_pwbs_gab2.tb_lampu
CREATE TABLE IF NOT EXISTS `tb_lampu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(9) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `harga` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tegangan` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Membuang data untuk tabel db_pwbs_gab2.tb_lampu: ~2 rows (lebih kurang)
INSERT INTO `tb_lampu` (`id`, `kode`, `nama`, `harga`, `tegangan`) VALUES
	(10, 'P1', 'Smart LED ', '10000', '25'),
	(12, 'I1', 'Indi Lamp', '99999', '30');

-- membuang struktur untuk table db_pwbs_gab2.tb_mahasiswa
CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `npm` varchar(9) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jurusan` enum('IF','SI','TE','TI','TS','TK','SIA') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Membuang data untuk tabel db_pwbs_gab2.tb_mahasiswa: ~0 rows (lebih kurang)
INSERT INTO `tb_mahasiswa` (`id`, `npm`, `nama`, `telepon`, `jurusan`) VALUES
	(1, '20312088', 'Aqil', '081278412469', 'IF'),
	(2, '20312053', 'Aji', '08123124124', 'IF'),
	(4, '123456789', 'qwertyuiop', '1234567890', 'IF');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
