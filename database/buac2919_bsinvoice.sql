-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2025 at 12:50 AM
-- Server version: 10.11.10-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buac2919_bsinvoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `valid_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_id` bigint(20) DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `code`, `date`, `valid_date`, `due_date`, `notes`, `footer`, `status`, `type`, `created_at`, `updated_at`, `vendor_id`, `payment_date`) VALUES
(13, NULL, '2024-09-20', NULL, NULL, 'catatan penjualan', NULL, 'DRAFT', NULL, '2024-09-19 12:19:20', '2024-09-19 12:19:57', 1, NULL),
(14, NULL, '2024-09-20', NULL, NULL, 'Masukan catatan', NULL, 'DRAFT', NULL, '2024-09-20 00:42:25', '2024-09-20 00:42:25', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE `bill_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `bill_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`id`, `product_id`, `description`, `qty`, `price`, `created_at`, `updated_at`, `bill_id`, `position`, `name`) VALUES
(4, 1, 'kocak', 2, 100000, '2024-09-19 12:19:20', '2024-09-19 12:19:39', 13, NULL, NULL),
(5, 1, NULL, 1, 100000, '2024-09-20 00:42:25', '2024-09-20 00:42:25', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `symbol` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'RUPIAH', 'IDR', 'RP', '2024-10-21 10:00:34', '2024-10-21 10:01:16'),
(2, 'DOLLAR', 'USD', '$', '2024-10-21 10:00:57', '2024-10-21 10:01:20'),
(3, 'DIRHAM', 'AED', 'AED', '2024-10-21 10:02:19', '2024-10-21 10:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `pic` varchar(30) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `currency_id`, `name`, `pic`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'NAMA GROUP', 'FIRMAN', 'group@gmail.com', '087867894423', 'ini adalah alamat', '2024-08-24 19:30:20', '2024-10-21 03:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `amount` double DEFAULT NULL,
  `expense_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`, `amount`, `expense_date`) VALUES
(1, 1, 'PENGELUARAN', 'PENGELUARAN', '2024-09-19 21:51:03', '2024-09-19 21:51:03', 1000000, '2024-09-20');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `amount` double DEFAULT NULL,
  `income_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`, `amount`, `income_date`) VALUES
(2, 1, 'TESTING', 'TESTING', '2024-09-19 21:30:10', '2024-09-19 21:30:10', 1000000, '2024-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `valid_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_id` bigint(20) DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `code`, `date`, `valid_date`, `due_date`, `notes`, `footer`, `status`, `type`, `created_at`, `updated_at`, `customer_id`, `payment_date`) VALUES
(13, NULL, '2024-09-20', NULL, NULL, 'catatan penjualan', NULL, 'UNPAID', NULL, '2024-09-19 12:19:20', '2024-10-23 03:34:16', 1, NULL),
(14, NULL, '2024-09-20', NULL, NULL, 'Masukan catatan', NULL, 'DRAFT', NULL, '2024-09-20 00:42:25', '2024-09-20 00:42:25', 1, NULL),
(15, NULL, '2024-10-21', NULL, '2024-10-21', 'ini adalah catatan', NULL, 'DRAFT', NULL, '2024-10-21 01:22:11', '2024-10-21 01:22:11', 1, NULL),
(16, NULL, '2024-10-13', NULL, '2024-11-21', NULL, NULL, 'DRAFT', NULL, '2024-10-23 04:05:10', '2024-10-23 04:05:10', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `invoice_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `product_id`, `description`, `qty`, `price`, `created_at`, `updated_at`, `invoice_id`, `position`, `name`) VALUES
(4, 1, 'kocak', 2, 100000, '2024-09-19 12:19:20', '2024-09-19 12:19:39', 13, NULL, NULL),
(5, 1, NULL, 1, 100000, '2024-09-20 00:42:25', '2024-09-20 00:42:25', 14, NULL, NULL),
(6, 1, NULL, 1, 100000, '2024-10-21 01:22:11', '2024-10-21 01:22:11', 15, NULL, NULL),
(7, 1, NULL, 2, 100000, '2024-10-23 04:05:10', '2024-10-23 04:05:10', 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `menu_parent` varchar(150) DEFAULT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_show` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `link`, `menu_parent`, `icon`, `created_at`, `updated_at`, `is_show`, `position`) VALUES
(49, 'Sales & Payments', '#', NULL, 'circle', NULL, '2024-09-20 00:37:43', NULL, NULL),
(52, 'Incomes', 'income', '62', 'circle', NULL, '2024-09-20 00:40:23', NULL, NULL),
(53, 'Expense', 'expense', '62', 'circle', NULL, '2024-09-20 00:40:34', NULL, NULL),
(56, 'Purchases', '#', NULL, 'circle', '2024-09-20 00:35:47', '2024-09-20 00:35:47', NULL, NULL),
(57, 'Bills', 'bill', '56', 'circle', '2024-09-20 00:36:22', '2024-09-21 09:55:44', NULL, NULL),
(58, 'Vendors', 'vendor', '56', 'circle', '2024-09-20 00:36:41', '2024-09-21 09:55:50', NULL, NULL),
(59, 'Invoice', 'invoice', '49', 'circle', '2024-09-20 00:38:04', '2024-09-20 00:38:04', NULL, NULL),
(60, 'Customers', 'customer', '49', 'circle', '2024-09-20 00:38:28', '2024-09-20 03:12:44', NULL, NULL),
(61, 'Products & Services', 'product', '49', 'circle', '2024-09-20 00:39:14', '2024-09-21 09:55:33', NULL, NULL),
(62, 'Accounting', '#', NULL, 'circle', '2024-09-20 00:40:01', '2024-09-20 00:40:01', NULL, NULL),
(63, 'Schedules', 'schedule', NULL, 'circle', '2024-09-20 00:40:47', '2024-09-21 09:56:04', NULL, NULL),
(64, 'Settings', '#', NULL, 'circle', '2024-09-20 00:41:05', '2024-09-20 00:41:05', NULL, NULL),
(65, 'Menus', 'menu', '64', 'circle', '2024-09-20 00:41:18', '2024-09-20 00:42:02', NULL, NULL),
(66, 'General', 'setting', '64', 'circle', '2024-09-20 00:41:42', '2024-09-21 09:55:17', NULL, NULL),
(67, 'Reports', 'report', NULL, 'circle', '2024-09-20 03:12:22', '2024-09-21 09:59:01', NULL, NULL),
(68, 'Users', 'user', '64', 'circle', '2024-10-22 03:31:12', '2024-10-22 03:47:22', NULL, NULL),
(69, 'Teams', 'team', '64', 'circle', '2024-10-22 03:48:13', '2024-10-22 03:48:13', NULL, NULL),
(70, 'Products & Services', 'product', '56', 'circle', '2024-10-22 08:13:56', '2024-10-22 08:13:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_02_103036_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `from_hotel_id` int(11) DEFAULT NULL,
  `from_hotel_date` date DEFAULT NULL,
  `from_hotel_price_quad` int(11) DEFAULT NULL,
  `from_hotel_price_triple` int(11) DEFAULT NULL,
  `from_hotel_price_double` int(11) DEFAULT NULL,
  `from_hotel_qty_food` int(11) DEFAULT NULL,
  `to_hotel_id` int(11) DEFAULT NULL,
  `to_hotel_date` date DEFAULT NULL,
  `to_hotel_price_quad` int(11) DEFAULT NULL,
  `to_hotel_price_triple` int(11) DEFAULT NULL,
  `to_hotel_price_double` int(11) DEFAULT NULL,
  `to_hotel_qty_food` int(11) DEFAULT NULL,
  `pax_qty` int(11) DEFAULT NULL,
  `free_pax_qty` int(11) DEFAULT NULL,
  `from_night` int(11) DEFAULT NULL,
  `from_night_quad_qty` int(11) DEFAULT NULL,
  `from_night_quad_total_price` int(11) DEFAULT NULL,
  `from_night_triple_qty` int(11) DEFAULT NULL,
  `from_night_triple_total_price` int(11) DEFAULT NULL,
  `from_night_double_qty` int(11) DEFAULT NULL,
  `from_night_double_total_price` int(11) DEFAULT NULL,
  `to_night` int(11) DEFAULT NULL,
  `to_night_quad_qty` int(11) DEFAULT NULL,
  `to_night_quad_total_price` int(11) DEFAULT NULL,
  `to_night_triple_qty` int(11) DEFAULT NULL,
  `to_night_triple_total_price` int(11) DEFAULT NULL,
  `to_night_double_qty` int(11) DEFAULT NULL,
  `to_night_double_total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_services`
--

CREATE TABLE `package_services` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `pax` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'create role', 'web', '2024-08-02 11:49:10', '2024-08-02 11:49:10'),
(3, 'edit role', 'web', '2024-08-03 01:51:25', '2024-08-03 01:51:25'),
(4, 'delete role', 'web', '2024-08-03 01:51:33', '2024-08-03 01:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_sell` int(11) DEFAULT NULL,
  `is_buy` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `is_sell`, `is_buy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRODUK 1', 'INI ADALAH PRODUK BARU', 100000, NULL, NULL, 'TIDAK AKTIF', '2024-09-04 11:09:24', '2024-09-04 11:10:47'),
(5, 'abu zaki', 'handling bandara + nasi box + zam2', 120, NULL, NULL, 'AKTIF', '2024-10-26 08:32:48', '2024-10-26 08:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'web', '2024-08-02 03:30:58', '2024-08-02 11:16:16'),
(2, 'KEUANGAN', 'web', '2024-08-02 11:16:09', '2024-08-02 11:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(2, 2),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `invoice_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `from_city` varchar(50) DEFAULT NULL,
  `to_city` varchar(50) DEFAULT NULL,
  `hotel` varchar(255) DEFAULT NULL,
  `r_men` date DEFAULT NULL,
  `r_women` date DEFAULT NULL,
  `madinah_date` text DEFAULT NULL,
  `madinah_room_info` text DEFAULT NULL,
  `madinah_hotel` varchar(255) DEFAULT NULL,
  `madinah_tour_date` date DEFAULT NULL,
  `mekkah_date` date DEFAULT NULL,
  `mekkah_room_info` text DEFAULT NULL,
  `mekkah_hotel` varchar(255) DEFAULT NULL,
  `mekkah_tour_date` date DEFAULT NULL,
  `visa_file` text DEFAULT NULL,
  `pro_file` text DEFAULT NULL,
  `ticket_file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `arrival_flight_info` text DEFAULT NULL,
  `madinah_note` text DEFAULT NULL,
  `mekkah_note` text DEFAULT NULL,
  `departure_flight_info` text DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `pax` int(11) DEFAULT NULL,
  `schedule_type` varchar(255) DEFAULT NULL,
  `mekkah_snack_contact_person` text DEFAULT NULL,
  `madinah_snack_contact_person` text DEFAULT NULL,
  `mekkah_snack_description` text DEFAULT NULL,
  `madinah_snack_description` text DEFAULT NULL,
  `madinah_pax` int(11) DEFAULT NULL,
  `mekkah_pax` int(11) DEFAULT NULL,
  `mekkah_night` int(11) DEFAULT NULL,
  `madinah_night` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `invoice_id`, `customer_id`, `arrival_date`, `from_city`, `to_city`, `hotel`, `r_men`, `r_women`, `madinah_date`, `madinah_room_info`, `madinah_hotel`, `madinah_tour_date`, `mekkah_date`, `mekkah_room_info`, `mekkah_hotel`, `mekkah_tour_date`, `visa_file`, `pro_file`, `ticket_file`, `created_at`, `updated_at`, `arrival_flight_info`, `madinah_note`, `mekkah_note`, `departure_flight_info`, `checkout_date`, `pax`, `schedule_type`, `mekkah_snack_contact_person`, `madinah_snack_contact_person`, `mekkah_snack_description`, `madinah_snack_description`, `madinah_pax`, `mekkah_pax`, `mekkah_night`, `madinah_night`) VALUES
(1, NULL, 1, '2024-09-21', NULL, NULL, NULL, NULL, NULL, '2024-09-25', 'TESTING', 'TESTING', NULL, '2024-09-21', 'TESTING', 'TESTING', NULL, NULL, NULL, NULL, '2024-09-21 03:06:39', '2024-10-21 04:06:22', 'JED JT301 18:20', 'TESTING', 'TESTING', 'MED JT303 18:30', NULL, 10, 'MEKKAH -> MADINAH', 'FIRMAN', NULL, 'Snack Bu Indira Makkah (Biasa)', 'TESTING', NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `setting_value` varchar(70) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `setting_value`, `created_at`, `updated_at`) VALUES
(48, 'name', 'LAND ARRAGEMENT', NULL, NULL),
(49, 'email', 'bagas.topati@gmail.com', NULL, NULL),
(50, 'phone_number', '0895611508388', NULL, NULL),
(51, 'address', 'ALAMAT PERUSAHAAN', NULL, NULL),
(52, 'photo', 'logo/ilqfMpD6aKKbxtyqxFpp.png', NULL, NULL),
(53, 'kop_nota', 'logo/6CCqUsmvu0JIzLTiugS9.PNG', NULL, NULL),
(54, 'logo', 'setting/tT3gaKmcK4MuvWXsEP5vXdLTXqJGUS453VyGZM19.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MEKKAH', 'ON', '2024-09-21 09:40:19', '2024-09-21 11:43:35'),
(2, 'MADINAH', 'ON', '2024-09-21 11:47:37', '2024-09-21 11:47:37'),
(3, 'JEDDAH', 'ON', '2024-09-21 11:48:07', '2024-09-21 11:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'ADMINISTRATOR', 'administrator@gmail.com', NULL, '$2y$10$hP8MlrV/qcIeoX8/xw8Y7OnxoP8Oyuka2xymcUHlfS9m9SZTYwp9C', 'msMjD4UBEOKvogn39dwbiWTCKm9OL3VB3Kjr8Hcu3fFHSMOxULjKSW1uECjc', 'ON', 'photo/QRusfBkW5BiGuH9hELwDtBAMJDrL30hlFPGyRPQy.svg', '2024-08-02 03:30:58', '2024-12-20 01:53:59'),
(2, 'TESTING', 'ADMINISTRATOR', 'TESTING@GMAIL.COM', NULL, '$2y$10$6vRZXX5Y51CWpjIrwW5RC.y4wTolxdW53.ii7koCAUwzu0Jxmocru', NULL, 'ON', NULL, '2024-10-22 04:07:03', '2024-10-22 04:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_teams`
--

CREATE TABLE `user_teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_teams`
--

INSERT INTO `user_teams` (`id`, `user_id`, `team_id`, `created_at`, `updated_at`) VALUES
(4, 2, 3, '2024-10-22 04:36:39', '2024-10-22 04:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `first_name`, `last_name`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 'testing', 'testing@gmail.com', 'test', 'test', 'test', 'test', '20145', '2024-09-20 04:30:00', '2024-09-20 04:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`, `type`, `email`, `phone_number`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'OFFICE JAKARTA', 'Jl. S. Parman Kav. 28 Central Park Mall Lantai LG\r\nL-146', 1, NULL, '0813867588888', 'warehouse/v7xAOo6w1cHCMA44TVfGUxlxRZH16dMRkQ2mFdXz.jpg', '2023-12-22 04:13:30', '2024-07-01 04:05:15'),
(2, 'BATAM', 'ALAMAT BATAM', 1, 'BATAM@GMAIL.COM', '087867894423', 'warehouse/EIsz2QQSO50uKCRIjrgtYH8acvr3KKjWIIx1Y6Ib.jpg', '2023-12-22 04:14:11', '2024-04-25 17:50:09'),
(5, 'BALIKPAPAN', 'Jalan MT Haryono No.61C Kota Balikpapan\r\nKalimantan Timur', 1, 'bigadgetbalikpapan@gmail.com', '081320006881', 'warehouse/PksWVRKSTWtv7CCFMU4p6wftehlukfBz0wvnAx4B.jpg', '2024-01-25 03:19:22', '2024-04-19 05:06:50'),
(6, 'KUPANG', 'Jalan Soeharto No.53 Naikoten 1 Kota Kupang Nusa Tenggara Timur', 1, 'bigadgetkupang@gmail.com', '081359222286', 'warehouse/ofE4Fz3V0ncsSevNZX8p3PbEb6aIDfrZUhmKmJu3.jpg', '2024-01-25 03:19:32', '2024-07-01 01:39:05'),
(9, 'SEMARANG', 'Jalan Gajah Raya No. 11, Semarang, Jawa Tengah', 1, 'semarangbigadget10@gmail.com', '081228898861', 'warehouse/4Y9UtPA2yZC6bCvhYmIaXBGCz3fT4mkfKXxf5hjI.jpg', '2024-03-18 07:51:38', '2024-07-01 01:38:54'),
(10, 'MAKASSAR', 'Jalan Sungai Saddang Baru No.57A\r\nKota Makassar Sulawesi Selatan', 1, 'bigadgetmakassar12@gmail.com', '08114112260', 'warehouse/1Ff3ZL1F5vvTLvaVlFJ1U9PpRNwQiF6NaHzQHPX4.jpg', '2024-03-18 07:55:44', '2024-04-19 10:28:41'),
(11, 'PALOPO', 'Jalan Jendral Sudirman No.102 Kota Palopo Sulawesi Selatan', 1, NULL, '08114201199', 'warehouse/ME6LJ2Drxng09RBe57KbIrRlzUxl11eJIeT9MVYr.jpg', '2024-05-18 17:24:02', '2024-07-01 01:38:18'),
(12, 'STORE JAKARTA', 'Jln Bandengan Selatan No. 84A Blok 15 Penjaringan Jakarta Utara', 1, NULL, '0811154188', 'warehouse/yi2m29V62tF2hubG2V56frT3uPVTyQZX8qI4BAUh.jpg', '2024-07-01 01:35:03', '2024-07-01 04:05:35'),
(13, 'ARO STORE', 'Jakarta Utara', 1, NULL, NULL, 'warehouse/FWRsf3CH6AxOT7O4uBpMAHvPBwNT27kBM2lfNIgv.jpg', '2024-07-12 19:09:29', '2024-07-16 01:31:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_services`
--
ALTER TABLE `package_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_teams`
--
ALTER TABLE `user_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_services`
--
ALTER TABLE `package_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_teams`
--
ALTER TABLE `user_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
