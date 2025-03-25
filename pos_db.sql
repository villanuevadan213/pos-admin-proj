-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 02:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `total_value` decimal(10,2) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NULL DEFAULT current_timestamp(),
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `item_code`, `item_name`, `category`, `quantity`, `unit_price`, `total_value`, `supplier`, `date_added`, `last_updated`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'ITEM67D9EDC276C98', 'A4Tech KRS-85 Usb Keyboard Black', 'Keyboard', 8, 370.00, 3700.00, 'A4Tech', '2025-03-18 16:12:45', '2025-03-18 16:12:45', 'Add quantity', NULL, '2025-03-24 14:04:56'),
(4, 'ITEM67DC836164D74', 'A4Tech KRS-83 Usb Keyboard Black', 'Keyboard', 7, 360.00, 3600.00, 'A4Tech', '2025-03-18 19:01:04', '2025-03-18 19:01:04', 'Add quantity', NULL, '2025-03-24 14:04:56'),
(6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 'Keyboard', 7, 390.00, 3900.00, 'A4Tech', '2025-03-18 19:25:18', '2025-03-18 19:25:18', 'Add Product', NULL, '2025-03-24 14:04:57'),
(7, 'ITEM67D9D47E5EC65', 'Nvision S2515 24.5\" FHD 100HZ Frameless IPS Monitor Black', 'Monitor', 8, 4250.00, 42500.00, 'Nvision', '2025-03-18 20:15:58', '2025-03-18 20:15:58', 'Add product', NULL, '2025-03-24 14:04:57'),
(8, 'ITEM67D9D794C7BED', 'Nvision EG24S1 PRO 180HZ Flat IPS Panel 24\" Gaming Monitor Black', 'Monitor', 8, 5230.00, 52300.00, 'Nvision', '2025-03-18 20:29:08', '2025-03-18 20:29:08', 'Add product', NULL, '2025-03-24 14:04:57'),
(9, 'ITEM67D9E559C39BC', 'MSI Pro MP223 21.5\" 100Hz VA Monitor', 'Monitor', 9, 3620.00, 36200.00, 'MSI', '2025-03-18 21:27:53', '2025-03-18 21:27:53', 'add quantity', NULL, '2025-03-24 11:43:31'),
(10, 'ITEM67D9EE3150B75', 'Item Lion', 'Lion', 8, 100.00, 1000.00, 'Manila Zoo', '2025-03-18 22:05:37', '2025-03-18 22:05:37', 'Add quantity', NULL, '2025-03-24 14:04:57'),
(11, 'ITEM67DB369D49157', 'Asus ROG Strix B360-F Gaming Motherboard Socket 1151 Pcie Ddr4', 'Motherboard', 8, 7895.00, 78950.00, 'Asus', '2025-03-19 21:26:53', '2025-03-19 21:26:53', 'Add quantity', '2025-03-19 13:26:53', '2025-03-24 11:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2025_03_12_191212_add_role_to_users_table', 2),
(13, '0001_01_01_000000_create_users_table', 3),
(14, '0001_01_01_000001_create_cache_table', 3),
(15, '0001_01_01_000002_create_jobs_table', 3),
(16, '2025_03_13_152744_add_last_login_at_to_users_table', 3),
(17, '2025_03_14_124746_add_role_to_users_table', 3),
(18, '2025_03_14_140626_add_position_to_users_table', 3),
(19, '2025_03_14_142653_create_user_activities_table', 4),
(20, 'xxxx_xx_xx_xxxxxx_create_activities_table', 5),
(21, '2025_03_14_160701_create_user_activities_table', 6),
(22, '2025_03_17_132716_create_orders_table', 7),
(23, '2025_03_18_130138_create_inventory_items_table', 8),
(24, '2025_03_18_143336_create_inventory_items_table', 9),
(26, '2025_03_18_155237_add_timestamps_to_inventory_items_table', 10),
(27, '2025_03_18_191725_add_item_code_to_inventory_items_table', 11),
(28, '2025_03_19_190235_create_transactions_table', 11),
(29, '2025_03_19_190313_create_transaction_items_table', 11),
(30, '2025_03_20_153448_add_order_id_to_transactions_table', 12),
(31, '2025_03_20_153544_rename_transaction_id_to_order_id_in_transaction_items_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ORD-81507', 7, 579.16, 'Completed', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(3, 'ORD-00590', 9, 887.64, 'Pending', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(5, 'ORD-66744', 1, 389.43, 'Cancelled', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(6, 'ORD-45039', 12, 929.38, 'Cancelled', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(7, 'ORD-02153', 6, 376.68, 'Processing', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(8, 'ORD-23669', 6, 175.74, 'Completed', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(9, 'ORD-79166', 10, 73.14, 'Pending', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(10, 'ORD-37884', 1, 747.28, 'Completed', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(11, 'ORD-28265', 6, 829.27, 'Completed', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(12, 'ORD-98361', 9, 910.08, 'Completed', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(13, 'ORD-60547', 9, 236.18, 'Pending', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(14, 'ORD-97765', 6, 535.73, 'Pending', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(15, 'ORD-30537', 9, 791.70, 'Pending', '2025-03-17 05:59:28', '2025-03-17 05:59:28'),
(16, 'ORD-90415', 1, 204.90, 'Processing', '2025-03-17 05:59:29', '2025-03-17 05:59:29'),
(17, 'ORD-16493', 12, 638.55, 'Cancelled', '2025-03-17 05:59:29', '2025-03-17 05:59:29'),
(18, 'ORD-75303', 12, 579.68, 'Pending', '2025-03-17 05:59:29', '2025-03-17 05:59:29'),
(19, 'ORD-54595', 9, 219.59, 'Completed', '2025-03-17 05:59:29', '2025-03-17 05:59:29'),
(20, 'ORD-17890', 9, 630.74, 'Cancelled', '2025-03-17 05:59:29', '2025-03-17 05:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3IZpZAJHVvKUA2Vy1rC0BQ4vYLJIMGlyB3qYsKEl', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHJwTVlzS0dBZkdTRUV3RU51NWhPN3RoWXBKQTdEeERTWEZEaE5mRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742908211),
('GveNplBllFWbGWzey8BUuIylMaRplnT3v1UqWrry', 1, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidjM2VVp5bEdUTW95clRWUmRXU29ZV09QcDR0a3BvRzFPSnFGZkROOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742853482),
('HmhL5T1Gwehu7rG1XyoC6ck4Bdk4ncWeHerPGf7L', 13, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUHZiSVN4eHhQR1dDZUd3UlBvUE1Zdm9DUEtkOXlsUHRPODRDbHBVaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlci10cmFja2luZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO30=', 1742854089),
('iiAEdyrVYyK0nZOOpCh8z8hGYbksP7VBj5aS72fZ', NULL, '192.168.55.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFhSUmlYaXhQZWJwcmFGVUU5amNTTUNFenlyaG83TGFZWldseFVDYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xOTIuMTY4LjU1LjEwMDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742908758),
('LX3twmA8YL0nqJp4bWDCNPG6zFbiKn9pZBbe2F8L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXdNN2RkdzJ2Q2Z0eUpyZ1JCSWRaTkRJODExV3hXNzRpaE0zTUhwaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742908108);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 14320.00, '2025-03-19 12:43:50', '2025-03-19 12:43:50'),
(2, NULL, 1, 490.00, '2025-03-19 12:50:07', '2025-03-19 12:50:07'),
(3, NULL, 1, 490.00, '2025-03-19 13:13:14', '2025-03-19 13:13:14'),
(4, NULL, 1, 490.00, '2025-03-20 05:26:18', '2025-03-20 05:26:18'),
(5, 'ODR67DC488A7167C', 1, 390.00, '2025-03-20 08:55:38', '2025-03-20 08:55:38'),
(7, 'ORD843094', 1, 390.00, '2025-03-20 11:32:16', '2025-03-20 11:32:16'),
(8, 'ORD685563', 1, 490.00, '2025-03-20 11:32:55', '2025-03-20 11:32:55'),
(9, 'ORD713343', 1, 370.00, '2025-03-20 12:01:01', '2025-03-20 12:01:01'),
(10, 'ORD809021', 1, 7895.00, '2025-03-20 12:10:36', '2025-03-20 12:10:36'),
(11, 'ORD112731', 1, 490.00, '2025-03-20 12:40:17', '2025-03-20 12:40:17'),
(12, 'ORD492504', 1, 750.00, '2025-03-20 13:33:54', '2025-03-20 13:33:54'),
(13, 'ORD895091', 1, 7995.00, '2025-03-20 14:10:17', '2025-03-20 14:10:17'),
(14, 'ORD312016', 1, 370.00, '2025-03-24 11:04:01', '2025-03-24 11:04:01'),
(15, 'ORD529818', 1, 750.00, '2025-03-24 11:04:09', '2025-03-24 11:04:09'),
(16, 'ORD222518', 1, 7895.00, '2025-03-24 11:04:18', '2025-03-24 11:04:18'),
(17, 'ORD703551', 1, 13100.00, '2025-03-24 11:43:31', '2025-03-24 11:43:31'),
(18, 'ORD490815', 13, 10700.00, '2025-03-24 14:04:56', '2025-03-24 14:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `inventory_item_id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_value` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `order_id`, `inventory_item_id`, `item_code`, `item_name`, `quantity`, `price`, `total_value`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 'ITEM67D9EDC276C98', 'A4Tech KRS-85 Usb Keyboard Black', 1, 370.00, 370.00, '2025-03-19 12:43:50', '2025-03-19 12:43:50'),
(2, 1, NULL, 4, '', 'A4Tech KRS-83 Usb Keyboard Black', 1, 360.00, 360.00, '2025-03-19 12:43:50', '2025-03-19 12:43:50'),
(3, 1, NULL, 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-19 12:43:50', '2025-03-19 12:43:50'),
(4, 1, NULL, 7, 'ITEM67D9D47E5EC65', 'Nvision S2515 24.5\" FHD 100HZ Frameless IPS Monitor Black', 1, 4250.00, 4250.00, '2025-03-19 12:43:51', '2025-03-19 12:43:51'),
(5, 1, NULL, 8, 'ITEM67D9D794C7BED', 'Nvision EG24S1 PRO 180HZ Flat IPS Panel 24\" Gaming Monitor Black', 1, 5230.00, 5230.00, '2025-03-19 12:43:51', '2025-03-19 12:43:51'),
(6, 1, NULL, 9, 'ITEM67D9E559C39BC', 'MSI Pro MP223 21.5\" 100Hz VA Monitor', 1, 3620.00, 3620.00, '2025-03-19 12:43:51', '2025-03-19 12:43:51'),
(7, 1, NULL, 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-19 12:43:51', '2025-03-19 12:43:51'),
(8, 2, NULL, 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-19 12:50:07', '2025-03-19 12:50:07'),
(9, 2, NULL, 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-19 12:50:07', '2025-03-19 12:50:07'),
(10, 3, NULL, 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-19 13:13:14', '2025-03-19 13:13:14'),
(11, 3, NULL, 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-19 13:13:14', '2025-03-19 13:13:14'),
(12, 4, NULL, 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-20 05:26:18', '2025-03-20 05:26:18'),
(13, 4, NULL, 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-20 05:26:18', '2025-03-20 05:26:18'),
(14, 7, 'ORD843094', 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-20 11:32:17', '2025-03-20 11:32:17'),
(15, 8, 'ORD685563', 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-20 11:32:55', '2025-03-20 11:32:55'),
(16, 8, 'ORD685563', 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-20 11:32:55', '2025-03-20 11:32:55'),
(17, 9, 'ORD713343', 1, 'ITEM67D9EDC276C98', 'A4Tech KRS-85 Usb Keyboard Black', 1, 370.00, 370.00, '2025-03-20 12:01:04', '2025-03-20 12:01:04'),
(18, 10, 'ORD809021', 11, 'ITEM67DB369D49157', 'Asus ROG Strix B360-F Gaming Motherboard Socket 1151 Pcie Ddr4', 1, 7895.00, 7895.00, '2025-03-20 12:10:36', '2025-03-20 12:10:36'),
(19, 11, 'ORD112731', 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-20 12:40:17', '2025-03-20 12:40:17'),
(20, 11, 'ORD112731', 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-20 12:40:17', '2025-03-20 12:40:17'),
(21, 12, 'ORD492504', 4, 'ITEM67DC836164D74', 'A4Tech KRS-83 Usb Keyboard Black', 1, 360.00, 360.00, '2025-03-20 13:33:55', '2025-03-20 13:33:55'),
(22, 12, 'ORD492504', 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-20 13:33:55', '2025-03-20 13:33:55'),
(23, 13, 'ORD895091', 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-20 14:10:17', '2025-03-20 14:10:17'),
(24, 13, 'ORD895091', 11, 'ITEM67DB369D49157', 'Asus ROG Strix B360-F Gaming Motherboard Socket 1151 Pcie Ddr4', 1, 7895.00, 7895.00, '2025-03-20 14:10:18', '2025-03-20 14:10:18'),
(25, 14, 'ORD312016', 1, 'ITEM67D9EDC276C98', 'A4Tech KRS-85 Usb Keyboard Black', 1, 370.00, 370.00, '2025-03-24 11:04:01', '2025-03-24 11:04:01'),
(26, 15, 'ORD529818', 4, 'ITEM67DC836164D74', 'A4Tech KRS-83 Usb Keyboard Black', 1, 360.00, 360.00, '2025-03-24 11:04:09', '2025-03-24 11:04:09'),
(27, 15, 'ORD529818', 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-24 11:04:09', '2025-03-24 11:04:09'),
(28, 16, 'ORD222518', 11, 'ITEM67DB369D49157', 'Asus ROG Strix B360-F Gaming Motherboard Socket 1151 Pcie Ddr4', 1, 7895.00, 7895.00, '2025-03-24 11:04:19', '2025-03-24 11:04:19'),
(29, 17, 'ORD703551', 7, 'ITEM67D9D47E5EC65', 'Nvision S2515 24.5\" FHD 100HZ Frameless IPS Monitor Black', 1, 4250.00, 4250.00, '2025-03-24 11:43:31', '2025-03-24 11:43:31'),
(30, 17, 'ORD703551', 8, 'ITEM67D9D794C7BED', 'Nvision EG24S1 PRO 180HZ Flat IPS Panel 24\" Gaming Monitor Black', 1, 5230.00, 5230.00, '2025-03-24 11:43:31', '2025-03-24 11:43:31'),
(31, 17, 'ORD703551', 9, 'ITEM67D9E559C39BC', 'MSI Pro MP223 21.5\" 100Hz VA Monitor', 1, 3620.00, 3620.00, '2025-03-24 11:43:31', '2025-03-24 11:43:31'),
(32, 18, 'ORD490815', 1, 'ITEM67D9EDC276C98', 'A4Tech KRS-85 Usb Keyboard Black', 1, 370.00, 370.00, '2025-03-24 14:04:56', '2025-03-24 14:04:56'),
(33, 18, 'ORD490815', 4, 'ITEM67DC836164D74', 'A4Tech KRS-83 Usb Keyboard Black', 1, 360.00, 360.00, '2025-03-24 14:04:56', '2025-03-24 14:04:56'),
(34, 18, 'ORD490815', 6, 'ITEM67D9C89EE43D2', 'A4tech FKS11 Natural A Compact Keyboard', 1, 390.00, 390.00, '2025-03-24 14:04:57', '2025-03-24 14:04:57'),
(35, 18, 'ORD490815', 7, 'ITEM67D9D47E5EC65', 'Nvision S2515 24.5\" FHD 100HZ Frameless IPS Monitor Black', 1, 4250.00, 4250.00, '2025-03-24 14:04:57', '2025-03-24 14:04:57'),
(36, 18, 'ORD490815', 8, 'ITEM67D9D794C7BED', 'Nvision EG24S1 PRO 180HZ Flat IPS Panel 24\" Gaming Monitor Black', 1, 5230.00, 5230.00, '2025-03-24 14:04:57', '2025-03-24 14:04:57'),
(37, 18, 'ORD490815', 10, 'ITEM67D9EE3150B75', 'Item Lion', 1, 100.00, 100.00, '2025-03-24 14:04:57', '2025-03-24 14:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'User',
  `position` varchar(255) NOT NULL DEFAULT 'Staff',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `position`, `email_verified_at`, `password`, `remember_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', 'Admin', 'Administrator', NULL, '$2y$12$gUeWkkcdcbM2jB4ME3rhg.elRrC6.Q8x.iNCXFs6ExrvCx35/o2XS', NULL, '2025-03-14 08:37:56', '2025-03-14 04:50:50', '2025-03-14 08:37:56'),
(6, 'User Staff', 'userstaff@gmail.com', 'User', 'Staff', NULL, '$2y$12$eMquMmEkpERKUiWzSwlMj.0uUq37FRXon1AVLImfusjEk4sCmutEi', NULL, '2025-03-14 08:24:01', '2025-03-14 06:11:49', '2025-03-14 08:24:01'),
(7, 'User Cashier', 'usercashier@gmail.com', 'User', 'Cashiers', NULL, '$2y$12$.30hrOzmau/Z8ijv3iiJSeqkm0Nspw1gr.91gqRHCAAlF6qF8sslm', NULL, '2025-03-14 08:44:32', '2025-03-14 06:14:19', '2025-03-14 08:44:32'),
(8, 'Admin Cashier', 'admincashier@gmail.com', 'Admin', 'Cashiers', NULL, '$2y$12$tIg6vyASuylZE/p6DlWKwO3/0qKG.WpwhLAzl2TwpH/V6Po6DlWbK', NULL, '2025-03-14 06:19:12', '2025-03-14 06:14:40', '2025-03-14 06:19:12'),
(9, 'Admin Manager', 'adminmanager@gmail.com', 'Admin', 'Managers', NULL, '$2y$12$qxv83MVXIL6IYAuHIfWyGubhJAhxFa2nLvu4HLlJOdoSKMGVxQqcC', NULL, '2025-03-14 06:19:27', '2025-03-14 06:14:59', '2025-03-14 06:19:27'),
(10, 'Admin Staff', 'adminstaff@gmail.com', 'Admin', 'Staff', NULL, '$2y$12$M16uDAmTdj5DD/i30o6BN.Saj/9VTa32rNYg3E26XMzPoDhiAXA3q', NULL, '2025-03-14 06:19:41', '2025-03-14 06:15:15', '2025-03-14 06:19:41'),
(11, 'Test User', 'testuser@gmail.com', 'User', 'Cashiers', NULL, '$2y$12$PCN0DgA8XmcZimvK4ANT..GFzq4htY/i53sQo88HKnv7mhAz.YfK6', NULL, NULL, '2025-03-14 10:32:05', '2025-03-14 10:36:45'),
(12, 'create user', 'create@user.com', 'User', 'Staff', NULL, '$2y$12$W6z/qUJxVRNE5LOcrFhmx.nXrKlt8Erep7K4vAGyknarMvjuOx872', NULL, NULL, '2025-03-14 13:49:50', '2025-03-14 13:49:50'),
(13, 'New User', 'newuser@gmail.com', 'User', 'Cashiers', NULL, '$2y$12$yztiyRb2sik/kc53iUKO7uNBG7SzpEk/Y18g6ElZYJluYx2q5a5CK', NULL, NULL, '2025-03-24 14:02:17', '2025-03-24 14:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `user_id`, `login_at`, `logout_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-03-14 08:11:30', '2025-03-14 08:11:42', '2025-03-14 08:11:30', '2025-03-14 08:11:42'),
(2, 1, '2025-03-14 08:18:13', NULL, '2025-03-14 08:18:13', '2025-03-14 08:18:13'),
(3, 1, '2025-03-14 08:20:22', '2025-03-14 08:20:54', '2025-03-14 08:20:22', '2025-03-14 08:20:54'),
(4, 10, '2025-03-14 06:45:51', '2025-03-14 07:45:51', '2025-03-14 08:45:51', '2025-03-14 08:45:51'),
(5, 1, '2025-03-14 10:16:19', '2025-03-14 10:16:54', '2025-03-14 10:16:19', '2025-03-14 10:16:54'),
(6, 7, '2025-03-14 10:17:07', '2025-03-14 10:19:40', '2025-03-14 10:17:07', '2025-03-14 10:19:40'),
(7, 1, '2025-03-14 10:20:05', '2025-03-14 13:18:54', '2025-03-14 10:20:05', '2025-03-14 13:18:54'),
(8, 7, '2025-03-14 13:19:07', '2025-03-14 13:20:58', '2025-03-14 13:19:07', '2025-03-14 13:20:58'),
(9, 1, '2025-03-14 13:21:08', '2025-03-14 13:42:29', '2025-03-14 13:21:08', '2025-03-14 13:42:29'),
(10, 7, '2025-03-14 13:42:43', '2025-03-14 13:44:09', '2025-03-14 13:42:43', '2025-03-14 13:44:09'),
(11, 1, '2025-03-14 13:46:17', '2025-03-14 13:48:57', '2025-03-14 13:46:17', '2025-03-14 13:48:57'),
(12, 1, '2025-03-14 13:49:16', NULL, '2025-03-14 13:49:16', '2025-03-14 13:49:16'),
(13, 1, '2025-03-17 04:30:01', NULL, '2025-03-17 04:30:01', '2025-03-17 04:30:01'),
(14, 1, '2025-03-18 04:48:21', NULL, '2025-03-18 04:48:21', '2025-03-18 04:48:21'),
(15, 6, '2025-03-19 04:45:24', '2025-03-19 04:53:32', '2025-03-19 04:45:24', '2025-03-19 04:53:32'),
(16, 1, '2025-03-19 07:07:46', NULL, '2025-03-19 07:07:46', '2025-03-19 07:07:46'),
(17, 1, '2025-03-19 07:09:17', NULL, '2025-03-19 07:09:17', '2025-03-19 07:09:17'),
(18, 1, '2025-03-19 11:15:51', NULL, '2025-03-19 11:15:51', '2025-03-19 11:15:51'),
(19, 1, '2025-03-20 05:06:59', NULL, '2025-03-20 05:06:59', '2025-03-20 05:06:59'),
(20, 1, '2025-03-24 05:02:53', NULL, '2025-03-24 05:02:53', '2025-03-24 05:02:53'),
(21, 1, '2025-03-24 13:59:14', '2025-03-24 14:02:25', '2025-03-24 13:59:14', '2025-03-24 14:02:25'),
(22, 13, '2025-03-24 14:03:27', NULL, '2025-03-24 14:03:27', '2025-03-24 14:03:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_items_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_items_inventory_item_id_foreign` (`inventory_item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activities_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_inventory_item_id_foreign` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
