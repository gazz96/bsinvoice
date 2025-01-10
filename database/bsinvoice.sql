-- -------------------------------------------------------------
-- TablePlus 6.2.1(578)
--
-- https://tableplus.com/
--
-- Database: bsinvoice
-- Generation Time: 2025-01-10 23:34:16.3290
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `bill_items`;
CREATE TABLE `bill_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `description` text,
  `qty` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_id` int DEFAULT NULL,
  `position` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `valid_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `notes` text,
  `footer` text,
  `status` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vendor_id` bigint DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `symbol` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `currency_id` int DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `pic` varchar(30) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `incomes`;
CREATE TABLE `incomes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `description` text,
  `qty` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_id` int DEFAULT NULL,
  `position` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `valid_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `notes` text,
  `footer` text,
  `status` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` bigint DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `link` text,
  `menu_parent` varchar(150) DEFAULT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_show` int DEFAULT NULL,
  `position` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `package_routes`;
CREATE TABLE `package_routes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `package_id` int DEFAULT NULL,
  `location_id` int DEFAULT NULL,
  `hotel_id` int DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `quad_price` int DEFAULT NULL,
  `triple_price` int DEFAULT NULL,
  `double_price` int DEFAULT NULL,
  `qty_food` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `day` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `package_services`;
CREATE TABLE `package_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `package_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `pax` int DEFAULT NULL,
  `free_pax` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `makkah_hotel_id` int DEFAULT NULL,
  `madinah_hotel_id` int DEFAULT NULL,
  `makkah_to_date` date DEFAULT NULL,
  `madinah_to_date` date DEFAULT NULL,
  `makkah_night` int DEFAULT NULL,
  `madinah_night` int DEFAULT NULL,
  `makkah_quad` double DEFAULT NULL,
  `madinah_quad` double DEFAULT NULL,
  `makkah_from_date` date DEFAULT NULL,
  `madinah_from_date` date DEFAULT NULL,
  `makkah_triple` double DEFAULT NULL,
  `madinah_triple` double DEFAULT NULL,
  `makkah_double` double DEFAULT NULL,
  `madinah_double` double DEFAULT NULL,
  `makkah_food` int DEFAULT NULL,
  `madinah_food` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` text,
  `price` int DEFAULT NULL,
  `is_sell` int DEFAULT NULL,
  `is_buy` int DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `from_city` varchar(50) DEFAULT NULL,
  `to_city` varchar(50) DEFAULT NULL,
  `hotel` varchar(255) DEFAULT NULL,
  `r_men` date DEFAULT NULL,
  `r_women` date DEFAULT NULL,
  `madinah_date` text,
  `madinah_room_info` text,
  `madinah_hotel` varchar(255) DEFAULT NULL,
  `madinah_tour_date` date DEFAULT NULL,
  `mekkah_date` date DEFAULT NULL,
  `mekkah_room_info` text,
  `mekkah_hotel` varchar(255) DEFAULT NULL,
  `mekkah_tour_date` date DEFAULT NULL,
  `visa_file` text,
  `pro_file` text,
  `ticket_file` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `arrival_flight_info` text,
  `madinah_note` text,
  `mekkah_note` text,
  `departure_flight_info` text,
  `checkout_date` date DEFAULT NULL,
  `pax` int DEFAULT NULL,
  `schedule_type` varchar(255) DEFAULT NULL,
  `mekkah_snack_contact_person` text,
  `madinah_snack_contact_person` text,
  `mekkah_snack_description` text,
  `madinah_snack_description` text,
  `madinah_pax` int DEFAULT NULL,
  `mekkah_pax` int DEFAULT NULL,
  `mekkah_night` int DEFAULT NULL,
  `madinah_night` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `setting_value` varchar(70) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `user_teams`;
CREATE TABLE `user_teams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `photo` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE `vendors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `type` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `logo` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

INSERT INTO `bill_items` (`id`, `product_id`, `description`, `qty`, `price`, `created_at`, `updated_at`, `bill_id`, `position`, `name`) VALUES
(4, 1, 'kocak', 2, 100000, '2024-09-19 19:19:20', '2024-09-19 19:19:39', 13, NULL, NULL),
(5, 1, NULL, 1, 100000, '2024-09-20 07:42:25', '2024-09-20 07:42:25', 14, NULL, NULL);

INSERT INTO `bills` (`id`, `code`, `date`, `valid_date`, `due_date`, `notes`, `footer`, `status`, `type`, `created_at`, `updated_at`, `vendor_id`, `payment_date`) VALUES
(13, NULL, '2024-09-20', NULL, NULL, 'catatan penjualan', NULL, 'DRAFT', NULL, '2024-09-19 19:19:20', '2024-09-19 19:19:57', 1, NULL),
(14, NULL, '2024-09-20', NULL, NULL, 'Masukan catatan', NULL, 'DRAFT', NULL, '2024-09-20 07:42:25', '2024-09-20 07:42:25', 1, NULL);

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'RUPIAH', 'IDR', 'RP', '2024-10-21 17:00:34', '2024-10-21 17:01:16'),
(2, 'DOLLAR', 'USD', '$', '2024-10-21 17:00:57', '2024-10-21 17:01:20'),
(3, 'DIRHAM', 'AED', 'AED', '2024-10-21 17:02:19', '2024-10-21 17:02:19');

INSERT INTO `customers` (`id`, `currency_id`, `name`, `pic`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'NAMA GROUP', 'FIRMAN', 'group@gmail.com', '087867894423', 'ini adalah alamat', '2024-08-25 02:30:20', '2024-10-21 10:15:05');

INSERT INTO `expenses` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`, `amount`, `expense_date`) VALUES
(1, 1, 'PENGELUARAN', 'PENGELUARAN', '2024-09-20 04:51:03', '2024-09-20 04:51:03', 1000000, '2024-09-20');

INSERT INTO `hotels` (`id`, `name`, `address`, `created_at`, `updated_at`, `location_id`) VALUES
(2, 'HOTEL A', NULL, '2025-01-07 11:15:46', '2025-01-07 11:16:55', 2),
(3, 'HOTEL B', NULL, '2025-01-10 11:14:57', '2025-01-10 11:14:57', 1);

INSERT INTO `incomes` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`, `amount`, `income_date`) VALUES
(2, 1, 'TESTING', 'TESTING', '2024-09-20 04:30:10', '2024-09-20 04:30:10', 1000000, '2024-09-20');

INSERT INTO `invoice_items` (`id`, `product_id`, `description`, `qty`, `price`, `created_at`, `updated_at`, `invoice_id`, `position`, `name`) VALUES
(4, 1, 'kocak', 2, 100000, '2024-09-19 19:19:20', '2024-09-19 19:19:39', 13, NULL, NULL),
(5, 1, NULL, 1, 100000, '2024-09-20 07:42:25', '2024-09-20 07:42:25', 14, NULL, NULL),
(6, 1, NULL, 1, 100000, '2024-10-21 08:22:11', '2024-10-21 08:22:11', 15, NULL, NULL),
(7, 1, NULL, 2, 100000, '2024-10-23 11:05:10', '2024-10-23 11:05:10', 16, NULL, NULL);

INSERT INTO `invoices` (`id`, `code`, `date`, `valid_date`, `due_date`, `notes`, `footer`, `status`, `type`, `created_at`, `updated_at`, `customer_id`, `payment_date`) VALUES
(13, NULL, '2024-09-20', NULL, NULL, 'catatan penjualan', NULL, 'UNPAID', NULL, '2024-09-19 19:19:20', '2024-10-23 10:34:16', 1, NULL),
(14, NULL, '2024-09-20', NULL, NULL, 'Masukan catatan', NULL, 'DRAFT', NULL, '2024-09-20 07:42:25', '2024-09-20 07:42:25', 1, NULL),
(15, NULL, '2024-10-21', NULL, '2024-10-21', 'ini adalah catatan', NULL, 'DRAFT', NULL, '2024-10-21 08:22:11', '2024-10-21 08:22:11', 1, NULL),
(16, NULL, '2024-10-13', NULL, '2024-11-21', NULL, NULL, 'DRAFT', NULL, '2024-10-23 11:05:10', '2024-10-23 11:05:10', 1, NULL);

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MAKKAH', '2025-01-07 10:37:10', '2025-01-10 11:15:20'),
(2, 'MADINAH', '2025-01-07 10:40:51', '2025-01-07 10:40:51');

INSERT INTO `menus` (`id`, `name`, `link`, `menu_parent`, `icon`, `created_at`, `updated_at`, `is_show`, `position`) VALUES
(49, 'Sales & Payments', '#', NULL, 'circle', NULL, '2024-09-20 07:37:43', NULL, NULL),
(52, 'Incomes', 'income', '62', 'circle', NULL, '2024-09-20 07:40:23', NULL, NULL),
(53, 'Expense', 'expense', '62', 'circle', NULL, '2024-09-20 07:40:34', NULL, NULL),
(56, 'Purchases', '#', NULL, 'circle', '2024-09-20 07:35:47', '2024-09-20 07:35:47', NULL, NULL),
(57, 'Bills', 'bill', '56', 'circle', '2024-09-20 07:36:22', '2024-09-21 16:55:44', NULL, NULL),
(58, 'Vendors', 'vendor', '56', 'circle', '2024-09-20 07:36:41', '2024-09-21 16:55:50', NULL, NULL),
(59, 'Invoice', 'invoice', '49', 'circle', '2024-09-20 07:38:04', '2024-09-20 07:38:04', NULL, NULL),
(60, 'Customers', 'customer', '49', 'circle', '2024-09-20 07:38:28', '2024-09-20 10:12:44', NULL, NULL),
(61, 'Products & Services', 'product', '49', 'circle', '2024-09-20 07:39:14', '2024-09-21 16:55:33', NULL, NULL),
(62, 'Accounting', '#', NULL, 'circle', '2024-09-20 07:40:01', '2024-09-20 07:40:01', NULL, NULL),
(63, 'Schedules', 'schedule', NULL, 'circle', '2024-09-20 07:40:47', '2024-09-21 16:56:04', NULL, NULL),
(64, 'Settings', '#', NULL, 'circle', '2024-09-20 07:41:05', '2024-09-20 07:41:05', NULL, NULL),
(65, 'Menus', 'menu', '64', 'circle', '2024-09-20 07:41:18', '2024-09-20 07:42:02', NULL, NULL),
(66, 'General', 'setting', '64', 'circle', '2024-09-20 07:41:42', '2024-09-21 16:55:17', NULL, NULL),
(67, 'Reports', 'report', NULL, 'circle', '2024-09-20 10:12:22', '2024-09-21 16:59:01', NULL, NULL),
(68, 'Users', 'user', '64', 'circle', '2024-10-22 10:31:12', '2024-10-22 10:47:22', NULL, NULL),
(69, 'Teams', 'team', '64', 'circle', '2024-10-22 10:48:13', '2024-10-22 10:48:13', NULL, NULL),
(70, 'Products & Services', 'product', '56', 'circle', '2024-10-22 15:13:56', '2024-10-22 15:13:56', NULL, NULL),
(71, 'Package', '/package', NULL, 'circle', '2025-01-10 08:25:07', '2025-01-10 08:25:07', NULL, NULL);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_02_103036_create_permission_tables', 1);

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'create role', 'web', '2024-08-02 18:49:10', '2024-08-02 18:49:10'),
(3, 'edit role', 'web', '2024-08-03 08:51:25', '2024-08-03 08:51:25'),
(4, 'delete role', 'web', '2024-08-03 08:51:33', '2024-08-03 08:51:33');

INSERT INTO `products` (`id`, `name`, `description`, `price`, `is_sell`, `is_buy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRODUK 1', 'INI ADALAH PRODUK BARU', 100000, NULL, NULL, 'TIDAK AKTIF', '2024-09-04 18:09:24', '2024-09-04 18:10:47'),
(5, 'abu zaki', 'handling bandara + nasi box + zam2', 120, NULL, NULL, 'AKTIF', '2024-10-26 15:32:48', '2024-10-26 15:32:48');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(2, 2),
(3, 1),
(4, 1);

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'web', '2024-08-02 10:30:58', '2024-08-02 18:16:16'),
(2, 'KEUANGAN', 'web', '2024-08-02 18:16:09', '2024-08-02 18:16:09');

INSERT INTO `schedules` (`id`, `invoice_id`, `customer_id`, `arrival_date`, `from_city`, `to_city`, `hotel`, `r_men`, `r_women`, `madinah_date`, `madinah_room_info`, `madinah_hotel`, `madinah_tour_date`, `mekkah_date`, `mekkah_room_info`, `mekkah_hotel`, `mekkah_tour_date`, `visa_file`, `pro_file`, `ticket_file`, `created_at`, `updated_at`, `arrival_flight_info`, `madinah_note`, `mekkah_note`, `departure_flight_info`, `checkout_date`, `pax`, `schedule_type`, `mekkah_snack_contact_person`, `madinah_snack_contact_person`, `mekkah_snack_description`, `madinah_snack_description`, `madinah_pax`, `mekkah_pax`, `mekkah_night`, `madinah_night`) VALUES
(1, NULL, 1, '2024-09-21', NULL, NULL, NULL, NULL, NULL, '2024-09-25', 'TESTING', 'TESTING', NULL, '2024-09-21', 'TESTING', 'TESTING', NULL, NULL, NULL, NULL, '2024-09-21 10:06:39', '2024-10-21 11:06:22', 'JED JT301 18:20', 'TESTING', 'TESTING', 'MED JT303 18:30', NULL, 10, 'MEKKAH -> MADINAH', 'FIRMAN', NULL, 'Snack Bu Indira Makkah (Biasa)', 'TESTING', NULL, NULL, 1, 3);

INSERT INTO `settings` (`id`, `name`, `setting_value`, `created_at`, `updated_at`) VALUES
(48, 'name', 'LAND ARRAGEMENT', NULL, NULL),
(49, 'email', 'bagas.topati@gmail.com', NULL, NULL),
(50, 'phone_number', '0895611508388', NULL, NULL),
(51, 'address', 'ALAMAT PERUSAHAAN', NULL, NULL),
(52, 'photo', 'logo/ilqfMpD6aKKbxtyqxFpp.png', NULL, NULL),
(53, 'kop_nota', 'logo/6CCqUsmvu0JIzLTiugS9.PNG', NULL, NULL),
(54, 'logo', 'setting/rzuUFXKHsSFTioxSvuQZ5yJESaCqOhsQIZRBiUu1.svg', NULL, NULL);

INSERT INTO `teams` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MEKKAH', 'ON', '2024-09-21 16:40:19', '2024-09-21 18:43:35'),
(2, 'MADINAH', 'ON', '2024-09-21 18:47:37', '2024-09-21 18:47:37'),
(3, 'JEDDAH', 'ON', '2024-09-21 18:48:07', '2024-09-21 18:48:07');

INSERT INTO `user_teams` (`id`, `user_id`, `team_id`, `created_at`, `updated_at`) VALUES
(4, 2, 3, '2024-10-22 11:36:39', '2024-10-22 11:36:39');

INSERT INTO `users` (`id`, `name`, `full_name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'ADMINISTRATOR', 'administrator@gmail.com', NULL, '$2y$10$hP8MlrV/qcIeoX8/xw8Y7OnxoP8Oyuka2xymcUHlfS9m9SZTYwp9C', 'msMjD4UBEOKvogn39dwbiWTCKm9OL3VB3Kjr8Hcu3fFHSMOxULjKSW1uECjc', 'ON', 'photo/QRusfBkW5BiGuH9hELwDtBAMJDrL30hlFPGyRPQy.svg', '2024-08-02 10:30:58', '2024-12-20 08:53:59'),
(2, 'TESTING', 'ADMINISTRATOR', 'TESTING@GMAIL.COM', NULL, '$2y$10$6vRZXX5Y51CWpjIrwW5RC.y4wTolxdW53.ii7koCAUwzu0Jxmocru', NULL, 'ON', NULL, '2024-10-22 11:07:03', '2024-10-22 11:07:44');

INSERT INTO `vendors` (`id`, `name`, `email`, `first_name`, `last_name`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 'testing', 'testing@gmail.com', 'test', 'test', 'test', 'test', '20145', '2024-09-20 11:30:00', '2024-09-20 11:34:40');

INSERT INTO `warehouses` (`id`, `name`, `address`, `type`, `email`, `phone_number`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'OFFICE JAKARTA', 'Jl. S. Parman Kav. 28 Central Park Mall Lantai LG\r\nL-146', 1, NULL, '0813867588888', 'warehouse/v7xAOo6w1cHCMA44TVfGUxlxRZH16dMRkQ2mFdXz.jpg', '2023-12-22 11:13:30', '2024-07-01 11:05:15'),
(2, 'BATAM', 'ALAMAT BATAM', 1, 'BATAM@GMAIL.COM', '087867894423', 'warehouse/EIsz2QQSO50uKCRIjrgtYH8acvr3KKjWIIx1Y6Ib.jpg', '2023-12-22 11:14:11', '2024-04-26 00:50:09'),
(5, 'BALIKPAPAN', 'Jalan MT Haryono No.61C Kota Balikpapan\r\nKalimantan Timur', 1, 'bigadgetbalikpapan@gmail.com', '081320006881', 'warehouse/PksWVRKSTWtv7CCFMU4p6wftehlukfBz0wvnAx4B.jpg', '2024-01-25 10:19:22', '2024-04-19 12:06:50'),
(6, 'KUPANG', 'Jalan Soeharto No.53 Naikoten 1 Kota Kupang Nusa Tenggara Timur', 1, 'bigadgetkupang@gmail.com', '081359222286', 'warehouse/ofE4Fz3V0ncsSevNZX8p3PbEb6aIDfrZUhmKmJu3.jpg', '2024-01-25 10:19:32', '2024-07-01 08:39:05'),
(9, 'SEMARANG', 'Jalan Gajah Raya No. 11, Semarang, Jawa Tengah', 1, 'semarangbigadget10@gmail.com', '081228898861', 'warehouse/4Y9UtPA2yZC6bCvhYmIaXBGCz3fT4mkfKXxf5hjI.jpg', '2024-03-18 14:51:38', '2024-07-01 08:38:54'),
(10, 'MAKASSAR', 'Jalan Sungai Saddang Baru No.57A\r\nKota Makassar Sulawesi Selatan', 1, 'bigadgetmakassar12@gmail.com', '08114112260', 'warehouse/1Ff3ZL1F5vvTLvaVlFJ1U9PpRNwQiF6NaHzQHPX4.jpg', '2024-03-18 14:55:44', '2024-04-19 17:28:41'),
(11, 'PALOPO', 'Jalan Jendral Sudirman No.102 Kota Palopo Sulawesi Selatan', 1, NULL, '08114201199', 'warehouse/ME6LJ2Drxng09RBe57KbIrRlzUxl11eJIeT9MVYr.jpg', '2024-05-19 00:24:02', '2024-07-01 08:38:18'),
(12, 'STORE JAKARTA', 'Jln Bandengan Selatan No. 84A Blok 15 Penjaringan Jakarta Utara', 1, NULL, '0811154188', 'warehouse/yi2m29V62tF2hubG2V56frT3uPVTyQZX8qI4BAUh.jpg', '2024-07-01 08:35:03', '2024-07-01 11:05:35'),
(13, 'ARO STORE', 'Jakarta Utara', 1, NULL, NULL, 'warehouse/FWRsf3CH6AxOT7O4uBpMAHvPBwNT27kBM2lfNIgv.jpg', '2024-07-13 02:09:29', '2024-07-16 08:31:40');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;