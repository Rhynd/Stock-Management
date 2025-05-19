-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2025 at 08:35 PM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL,
  `priceHT` decimal(11,0) NOT NULL,
  `priceTTC` decimal(11,0) NOT NULL,
  `TVA` int(5) NOT NULL,
  `idZone` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `priceHT`, `priceTTC`, `TVA`, `idZone`, `image`) VALUES
(9, 'Andorid figure', 12, 16, 19, 20, 1, '682a6322dc02c2.90599205.jpg'),
(25, 'HDMI to hose adapter', 23, 25, 28, 10, 2, '682b95588c5608.48636672.jpg'),
(27, 'Bike office chair', 20, 250, 300, 20, 1, '682ae793c91bb5.90459907.jpg'),
(28, 'WD 40', 50, 1, 1, 10, 1, '682ae7f8ab6c82.16043088.jpg'),
(29, 'Party Spaceship', 2, 15000000, 18000000, 20, 2, '682ae922650340.94547811.png');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `libelle`, `rue`, `cp`, `ville`) VALUES
(1, 'Bourges zone', '1', 18000, 'Bourges'),
(2, 'Paris zone', '2', 15000, 'Paris'),
(3, 'Orleans zone', '3', 45000, 'Orleans');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
