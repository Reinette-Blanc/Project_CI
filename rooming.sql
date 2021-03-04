-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for rooming
CREATE DATABASE IF NOT EXISTS `rooming` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rooming`;

-- Dumping data for table rooming.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`, `username`, `pwd`, `fullname`) VALUES
	(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Sittipon Pakornmanokul');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping data for table rooming.reserve: ~17 rows (approximately)
/*!40000 ALTER TABLE `reserve` DISABLE KEYS */;
INSERT INTO `reserve` (`reserve_id`, `subject`, `reserver`, `start`, `length`, `date`, `room_id`) VALUES
	(2, 'Meeting', 'Bob', 800, 2, '2021-02-27', 1),
	(3, 'Netflix', 'Po', 1000, 3, '2021-02-27', 2),
	(4, 'Meeting', 'John', 900, 2, '2021-02-27', 1),
	(6, 'Meeting', 'Catty', 1400, 3, '2021-02-28', 1),
	(7, 'Netflix', 'Polo', 1400, 2, '2021-02-27', 1),
	(9, 'Meeting', 'Bob Marley', 950, 3, '2021-03-01', 1),
	(11, 'Sleeping 101', 'Prayat Chanankarn', 1400, 4, '2021-03-01', 1),
	(15, 'Executive Meeting', 'John Smith', 850, 2, '2021-03-02', 2),
	(17, 'Product Presentation', 'John Smith', 950, 7, '2021-03-02', 1),
	(18, 'Netflix', 'John Smith', 800, 3, '2021-03-03', 1),
	(19, 'Executive Meeting', 'John Smith', 1250, 5, '2021-03-03', 1),
	(22, 'Sales Meeting', 'John Smith', 1500, 4, '2021-03-03', 1),
	(24, 'Sales Meeting', 'John Smith', 950, 2, '2021-03-04', 1),
	(25, 'Executive Meeting', 'John Smith', 1600, 1, '2021-03-04', 1),
	(27, 'Product Presentation', 'Test User', 1650, 1, '2021-03-04', 1),
	(31, 'Sales Meeting', 'John Lemon', 800, 2, '2021-03-04', 2),
	(32, 'Product Presentation', 'John Lemon', 1300, 2, '2021-03-04', 2),
	(33, 'Sales Meeting', 'Test User', 800, 3, '2021-03-04', 1),
	(34, 'Receive VIP', 'Adam Levi', 1050, 1, '2021-03-04', 1);
/*!40000 ALTER TABLE `reserve` ENABLE KEYS */;

-- Dumping data for table rooming.room: ~4 rows (approximately)
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` (`room_id`, `room_name`) VALUES
	(1, 'Conference'),
	(2, 'Sub Conference'),
	(5, 'Library'),
	(7, 'Presentation');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;

-- Dumping data for table rooming.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `username`, `pwd`, `fullname`) VALUES
	(1, 'user', '25d55ad283aa400af464c76d713c07ad', 'Test User'),
	(2, 'Johnny', '25d55ad283aa400af464c76d713c07ad', 'John Smith');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
