-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 06:09 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `addressline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `addressline`, `user_id`, `city`, `state`, `zip`, `country`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nairobi', 1, 'Nairobi', 'Nairobi', '00100', 'Kenya', '0712345678', '2018-08-23 07:28:18', '2018-08-23 07:28:18'),
(2, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-08-23 07:33:51', '2018-08-23 07:33:51'),
(3, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-08-23 07:37:26', '2018-08-23 07:37:26'),
(4, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-08-23 08:22:42', '2018-08-23 08:22:42'),
(5, 'Nairobi', 1, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-08-23 08:27:58', '2018-08-23 08:27:58'),
(6, 'Nairobi', 1, 'Nai', 'Nairobi', '0012021', 'Kenya', '0712345678', '2018-08-23 22:23:03', '2018-08-23 22:23:03'),
(7, 'Nairobi', 1, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-08-23 22:30:30', '2018-08-23 22:30:30'),
(8, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-08-24 12:07:44', '2018-08-24 12:07:44'),
(9, 'Nairobi', 2, 'Nai', 'Nairobi', '0012021', 'Kenya', '0712345678', '2018-08-24 12:30:12', '2018-08-24 12:30:12'),
(10, 'Nairobi', 1, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-01 03:28:13', '2018-09-01 03:28:13'),
(11, 'Nairobi', 1, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-07 04:03:51', '2018-09-07 04:03:51'),
(12, 'Nairobi', 1, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-07 09:36:53', '2018-09-07 09:36:53'),
(13, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-07 12:11:41', '2018-09-07 12:11:41'),
(14, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-15 09:03:47', '2018-09-15 09:03:47'),
(15, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-15 09:38:02', '2018-09-15 09:38:02'),
(16, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-17 11:23:46', '2018-09-17 11:23:46'),
(17, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-09-20 15:36:04', '2018-09-20 15:36:04'),
(18, 'Nairobi', 2, 'Nairobi', 'Nairobi', '00100', 'Kenya', '0712345678', '2018-09-22 15:02:33', '2018-09-22 15:02:33'),
(19, 'Nairobi', 2, 'Nairobi', 'Nairobi', '00100', 'Kenya', '0712345678', '2018-09-22 15:07:30', '2018-09-22 15:07:30'),
(20, 'Nairobi', 2, 'Nairobi', 'Nairobi', '00100', 'Kenya', '0712345678', '2018-09-22 15:32:57', '2018-09-22 15:32:57'),
(21, 'Nairobi', 2, 'Nairobi', 'Nairobi', '00100', 'Kenya', '0712345678', '2018-09-24 10:40:42', '2018-09-24 10:40:42'),
(22, 'Nairobi', 2, 'Nai', 'Nai', '00120', 'Kenya', '0712345678', '2018-10-13 11:38:47', '2018-10-13 11:38:47'),
(23, 'Nairobi', 2, 'Nai', 'Nairobi', '0012021', 'Kenya', '0712345678', '2018-10-13 11:52:02', '2018-10-13 11:52:02'),
(24, '00120210', 2, 'Nairobi', 'Nairobi', '00120', 'Kenya', '0712345678', '2018-10-13 13:29:00', '2018-10-13 13:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_group_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute_group_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Large', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(2, 1, 'Medium', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(3, 1, 'Small', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(4, 2, 'Red', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(5, 2, 'Green', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(6, 2, 'White', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(7, 2, 'Black', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(8, 2, 'Blue', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(9, 3, '14 pt. C2S Gloss Cover', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(10, 3, '14 pt. C1S Gloss Cover', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(11, 3, '13 pt. Matte Cover', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(12, 3, '13 pt. 100% Recycled Matte Cover', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(13, 3, '16 pt. C2S Gloss Cover', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(14, 3, '15 pt. Velvet Cover', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(15, 3, '15 pt. Velvet with Soft-Touch', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(16, 4, '50', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(17, 4, '100', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(18, 4, '150', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(19, 4, '200', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(20, 4, '250', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(21, 5, 'Color Front and Blank Back', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(22, 5, 'Full Color Both Sides', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(24, 8, 'Test1', '2018-10-21 07:09:18', '2018-10-21 21:11:48'),
(25, 8, 'test2', '2018-10-21 21:09:37', '2018-10-21 21:34:44'),
(26, 9, 'testing', '2018-10-21 21:22:00', '2018-10-21 21:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_groups`
--

CREATE TABLE `attribute_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_groups`
--

INSERT INTO `attribute_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(2, 'Color', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(3, 'Paper', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(4, 'Quantity', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(5, 'Printed Side', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(8, 'Test Group', '2018-10-21 07:04:01', '2018-10-21 07:04:01'),
(9, 'Demo2', '2018-10-21 21:20:47', '2018-10-21 21:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Business Cards', '2018-08-23 07:24:07', '2018-08-23 07:24:07'),
(2, 'Brochures', '2018-08-26 02:44:37', '2018-08-26 02:44:37'),
(3, 'Flyers', '2018-08-26 02:44:54', '2018-08-26 02:44:54'),
(4, 'Booklets', '2018-08-26 02:45:10', '2018-08-26 02:45:10'),
(5, 'noma', '2018-10-11 11:18:35', '2018-10-11 11:18:35'),
(6, 'Another', '2018-10-12 05:07:45', '2018-10-12 05:07:45'),
(7, 'Awesome', '2018-10-12 05:09:16', '2018-10-12 05:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2018_05_28_220314_create_products_table', 1),
(13, '2018_05_28_221201_create_categories_table', 1),
(14, '2018_06_26_172427_add_price_to_products_table', 1),
(15, '2018_07_01_210741_add_admin_column_to_users_table', 1),
(16, '2018_07_12_033750_create_addresses_table', 1),
(17, '2018_07_12_040055_add_user_id_to_address_table_new', 1),
(18, '2018_08_23_184540_create_orders_table', 2),
(19, '2018_08_24_003700_create_order_product_table', 3),
(21, '2018_09_18_082318_create_product_reviews_table', 5),
(22, '2018_09_23_101234_add_product_id_field_to_productreviewtable', 6),
(23, '2018_10_15_163736_create_attribute_groups_table', 7),
(25, '2018_10_15_174326_create_attributes_table', 8),
(26, '2018_10_15_174850_create_products_attributes_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `delivered` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `delivered`, `created_at`, `updated_at`) VALUES
(1, 2, 61, 1, '2018-08-24 12:27:47', '2018-10-11 17:01:34'),
(2, 2, 7805, 0, '2018-08-24 12:30:41', '2018-09-20 15:38:39'),
(3, 2, 7805, 1, '2018-08-24 12:35:05', '2018-09-17 11:23:21'),
(4, 2, 605, 1, '2018-09-17 11:27:15', '2018-09-17 11:28:52'),
(5, 2, 1523, 1, '2018-09-22 15:03:06', '2018-10-11 14:00:30'),
(6, 2, 25271, 0, '2018-09-22 15:08:20', '2018-09-22 15:08:20'),
(7, 2, 25271, 0, '2018-09-22 15:33:20', '2018-09-22 15:33:20'),
(8, 2, 25271, 0, '2018-09-22 15:34:37', '2018-09-22 15:34:37'),
(9, 2, 25271, 0, '2018-09-22 15:36:21', '2018-09-22 15:36:21'),
(10, 2, 25271, 1, '2018-09-22 15:37:27', '2018-10-11 14:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `order_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 50.00, NULL, NULL),
(2, 1, 2, 129, 6450.00, NULL, NULL),
(3, 1, 3, 129, 6450.00, NULL, NULL),
(4, 4, 4, 1, 500.00, NULL, NULL),
(5, 12, 5, 1, 1259.00, NULL, NULL),
(6, 9, 6, 1, 2000.00, NULL, NULL),
(7, 12, 6, 15, 18885.00, NULL, NULL),
(8, 9, 7, 1, 2000.00, NULL, NULL),
(9, 12, 7, 15, 18885.00, NULL, NULL),
(10, 9, 8, 1, 2000.00, NULL, NULL),
(11, 12, 8, 15, 18885.00, NULL, NULL),
(12, 9, 9, 1, 2000.00, NULL, NULL),
(13, 12, 9, 15, 18885.00, NULL, NULL),
(14, 9, 10, 1, 2000.00, NULL, NULL),
(15, 12, 10, 15, 18885.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `size`, `price`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Flyers', 'All types of print available', 'A4', 200, 'flyers.jpg', '3', '2018-08-26 02:46:44', '2018-08-26 02:46:44'),
(3, 'Booklets', 'Best designs in town', 'A5', 250, 'flyers.jpg', '4', '2018-08-26 02:48:36', '2018-08-26 02:48:36'),
(4, 'Brochures', 'Kila type iko kabisa', 'A4', 500, 'flyers.jpg', '2', '2018-08-26 02:49:52', '2018-08-26 02:49:52'),
(6, 'Business Cards', 'Awesome designs available', 'A5', 300, 'flyers.jpg', '1', '2018-09-07 09:32:30', '2018-09-07 09:32:30'),
(9, 'Flyers2', 'New test cat and print', 'A5', 2000, 'flyers.jpg', '3', '2018-09-17 11:41:31', '2018-09-17 11:41:31'),
(10, 'Flyers3', 'Another one', 'A5', 1202, 'flyers.jpg', '3', '2018-09-17 11:44:17', '2018-09-17 11:44:17'),
(11, 'Flyers4', 'Another one print', 'A6', 1259, 'flyers.jpg', '3', '2018-09-17 11:44:54', '2018-09-17 11:44:54'),
(12, 'Flyers5', 'Another one print', 'A6', 1259, 'flyers.jpg', '3', '2018-09-17 11:45:11', '2018-09-17 11:45:11'),
(14, 'Cards', 'New product here', 'A5', 1500, 'flyers.jpg', '1', '2018-09-22 14:58:34', '2018-09-22 14:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `attribute_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '50.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(3, 2, 3, '60.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(4, 2, 4, '65.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(5, 2, 5, '67.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(7, 2, 7, '75.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(9, 2, 9, '80.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(11, 2, 11, '85.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(12, 2, 12, '87.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(15, 2, 15, '97.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(18, 2, 18, '104.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(19, 2, 19, '107.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(22, 2, 22, '115.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(26, 2, 21, '101.00', '2018-10-21 21:13:12', '2018-10-21 21:13:12'),
(27, 2, 25, '110.00', '2018-10-21 21:24:23', '2018-10-21 21:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes_bk`
--

CREATE TABLE `products_attributes_bk` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes_bk`
--

INSERT INTO `products_attributes_bk` (`id`, `product_id`, `attribute_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '50.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(2, 2, 2, '55.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(3, 2, 3, '60.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(4, 2, 4, '65.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(5, 2, 5, '67.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(6, 2, 6, '70.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(7, 2, 7, '75.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(8, 2, 8, '78.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(9, 2, 9, '80.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(10, 2, 10, '83.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(11, 2, 11, '85.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(12, 2, 12, '87.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(13, 2, 13, '89.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(14, 2, 14, '95.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(15, 2, 15, '97.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(16, 2, 16, '100.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(17, 2, 17, '102.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(18, 2, 18, '104.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(19, 2, 19, '107.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(20, 2, 20, '108.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(21, 2, 21, '112.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12'),
(22, 2, 22, '115.00', '2018-10-14 21:47:12', '2018-10-14 21:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `headline`, `description`, `rating`, `approved`, `created_at`, `updated_at`, `product_id`) VALUES
(13, 2, 'My Review', 'I like this print so bad!', '6', NULL, '2018-09-27 12:29:37', '2018-09-27 12:29:37', 3),
(14, 3, 'Awesome', 'I lke it', '4', NULL, '2018-09-28 00:52:46', '2018-09-28 00:52:46', 3),
(15, 1, 'Another Review', 'Cool Print Definitely!', '3', NULL, '2018-09-28 00:55:08', '2018-09-28 00:55:08', 3),
(16, 3, 'Hello', 'Awesome', '3', NULL, '2018-10-03 01:25:11', '2018-10-03 01:25:11', 6),
(17, 3, 'My Review', 'First review after design!', '4', NULL, '2018-10-03 02:48:24', '2018-10-03 02:48:24', 4),
(18, 3, 'My Review', 'Another Review', '3', NULL, '2018-10-03 02:49:43', '2018-10-03 02:49:43', 2),
(19, 2, 'Hello', 'My first review!', '2', NULL, '2018-10-07 08:38:16', '2018-10-07 08:38:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maurice', NULL, 'morisi@gmail.com', '$2y$10$JEkNhoxqxnm4ydB4ztXEw.kFOv7o3EUUZxLzKu7wPSlQC.CEwOXnm', 'SvBUpjYQRaQkbosstkr7twePaWhAi2TIRKXoxjXpaHHC5A2ZgEwBXjV8JhK7', '2018-08-23 07:17:37', '2018-08-23 07:17:37'),
(2, 'Admin', 1, 'admin@coolprints.com', '$2y$10$Fl7bHxv2K3UbNDE2AikAFOZp11u5SyfG0s.5Fdyy8y.OCfzn1yeT.', 'ogzCEAkkhYCoiLxtchsrKl5VJSLFEcWbA26OqSz9NQWcGJsGr4zroRFjj9fg', '2018-08-23 07:22:31', '2018-08-23 07:22:31'),
(3, 'Morisi', NULL, 'maurice@coolprints.com', '$2y$10$q58jNhV0px7KAaC2.aVfxerFdBEG0uZxcBJM8CbTgyqSVCCj2Vgpu', '9R3Uk608CYJsYqodb7bnowhnNI5UkMSr9xnR0o8kEVHfoiu7vBdPm6qVSZct', '2018-09-27 12:17:41', '2018-09-27 12:17:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes_bk`
--
ALTER TABLE `products_attributes_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products_attributes_bk`
--
ALTER TABLE `products_attributes_bk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
