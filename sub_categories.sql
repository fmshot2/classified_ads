-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2021 at 02:09 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yellow_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tailor', NULL, NULL, NULL),
(2, 1, 'barber', NULL, NULL, NULL),
(3, 1, 'mechanic', NULL, NULL, NULL),
(4, 1, 'plumber', NULL, NULL, NULL),
(5, 1, 'baker', NULL, NULL, NULL),
(6, 1, 'cobbler ', NULL, NULL, NULL),
(7, 1, 'caterer ', NULL, NULL, NULL),
(8, 1, 'hair dresser', NULL, NULL, NULL),
(9, 1, 'Asthmatic Drugs', NULL, NULL, NULL),
(10, 1, 'Cough Syrup', NULL, NULL, NULL),
(11, 1, 'Cream & Ointments', NULL, NULL, NULL),
(12, 1, 'Multi-Vitamins', NULL, NULL, NULL),
(13, 1, 'Deworming Drugs', NULL, NULL, NULL),
(14, 1, 'Sex Enhancement', NULL, NULL, NULL),
(15, 1, 'Surgicals', NULL, NULL, NULL),
(16, 1, 'Anti Poison', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
