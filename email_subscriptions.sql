-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: April 30, 2021 at 08:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5
-- Created by: Ibidapo Adeolu
-- SQL Version: 1.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapoQueries`
--

-- --------------------------------------------------------

--
-- Table structure for table `siteemaillists`
--

CREATE TABLE `siteemaillists` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin UNIQUE,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `siteemaillists`
--

INSERT INTO `siteemaillists` (`id`, `name`, `slug`,`created_at`, `updated_at`) VALUES
(1, 'Earn Extra Money', 'earn-extra-money', '2021-02-15 19:07:21', '2021-02-15 19:07:21'),
(2, 'Season\'s Greeting', 'seasons-greeting', '2021-02-15 19:07:21', '2021-02-15 19:07:21'),
(3, 'Popular Products and Services', 'popular-products-and-services', '2021-02-15 19:07:21', '2021-02-15 19:07:21'),
(4, 'Newsletter', 'newsletter', '2021-02-15 19:07:21', '2021-02-15 19:07:21'),
(5, 'Service Created', 'service-created', '2021-02-15 19:07:21', '2021-02-15 19:07:21'),
(6, 'New Message (From Clients)', 'new-message-from-clients', '2021-02-15 19:07:21', '2021-02-15 19:07:21'),
(7, 'Users Welcome Email', 'users-welcome-email', '2021-02-15 19:07:21', '2021-02-15 19:07:21'),
(8, 'How To', 'how-to', '2021-02-15 19:07:21', '2021-02-15 19:07:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siteemaillists`
--
ALTER TABLE `siteemaillists`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siteemaillists`
--
ALTER TABLE `siteemaillists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=872;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
