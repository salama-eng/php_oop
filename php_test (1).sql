-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 10:03 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `zip_file` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`zip_file`) VALUES
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array'),
('Array');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `product_img`) VALUES
(1, 'laptop', 500, 'lap.jpg'),
(2, 'phone', 452, 'phone.jpg'),
(3, 'wach hawawi', 899, 'watch.jpg'),
(4, 'Mac workstation', 4528, 'mac.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
