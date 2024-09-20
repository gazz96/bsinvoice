-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2024 at 05:07 PM
-- Server version: 10.2.31-MariaDB-log
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsinvoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `pic` varchar(30) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `pic`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'NAMA GROUP', 'FIRMAN', 'group@gmail.com', '087867894423', 'ini adalah alamat', '2024-08-24 19:30:20', '2024-08-24 19:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `customer_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `position` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `link`, `menu_parent`, `icon`, `created_at`, `updated_at`, `is_show`, `position`) VALUES
(2, 'Master', '#', NULL, 'list', '2024-08-02 09:22:43', '2024-08-19 05:30:03', NULL, 1),
(3, 'Master Usaha', 'dashboard/master-corporations', '9', 'file', '2024-08-02 09:33:08', '2024-08-19 05:30:03', 1, 2),
(9, 'Master', '#', '2', 'plus', '2024-08-02 22:37:15', '2024-08-19 05:30:03', NULL, 3),
(18, 'Pembelian', '#', '2', 'circle', '2024-08-02 23:23:14', '2024-08-19 05:30:03', NULL, 4),
(19, 'Master Supplier', '#', '18', 'circle', '2024-08-02 23:23:37', '2024-08-19 05:30:03', NULL, 5),
(20, 'Penjualan', '#', '2', 'circle', '2024-08-02 23:24:15', '2024-08-19 05:30:04', NULL, 6),
(22, 'Keuangan', '#', '2', 'circle', '2024-08-05 03:15:45', '2024-08-19 05:30:04', NULL, 7),
(23, 'Transaksi', '#', NULL, 'list', '2024-08-05 03:17:56', '2024-08-19 05:30:04', NULL, 8),
(24, 'Pembelian', '#', '23', 'circle', '2024-08-05 03:19:00', '2024-08-19 05:30:04', NULL, 9),
(25, 'Penjualan', '#', '23', 'circle', '2024-08-05 03:19:17', '2024-08-19 05:30:04', NULL, 10),
(26, 'Keuangan', '#', '23', 'circle', '2024-08-05 03:19:30', '2024-08-19 05:30:04', NULL, 11),
(27, 'Report', '#', NULL, 'list', '2024-08-05 03:20:18', '2024-08-19 05:30:04', NULL, 32),
(28, 'Report Management', '#', '27', 'list', '2024-08-05 03:20:29', '2024-08-19 05:30:04', NULL, 13),
(29, 'Utlitas', '#', NULL, 'circle', '2024-08-05 03:22:57', '2024-08-19 05:33:38', NULL, 33),
(30, 'NXT', '#', NULL, 'circle', '2024-08-05 03:23:26', '2024-08-19 05:30:04', NULL, 34),
(31, 'About', '#', '30', 'circle', '2024-08-05 03:23:36', '2024-08-19 05:30:04', NULL, 16),
(32, 'Ganti Password', '#', '29', 'circle', '2024-08-05 03:23:59', '2024-08-19 05:30:04', NULL, 17),
(33, 'Master Group Usaha', 'dashboard/master-group-corporations', '9', 'circle', '2024-08-06 09:45:25', '2024-08-19 05:30:04', NULL, 18),
(34, 'Master Merek Kendaraan', '/dashboard/master-brands', '9', 'circle', '2024-08-07 02:57:51', '2024-08-19 05:30:04', NULL, 19),
(35, 'Master Jenis Kendaraan', 'dashboard/master-brand-types', '9', 'circle', '2024-08-07 03:15:18', '2024-08-19 05:30:04', NULL, 20),
(36, 'Master Agama dan Kepercayaan', 'dashboard/master-religions', '9', 'circle', '2024-08-07 05:32:48', '2024-08-19 05:30:04', NULL, 21),
(37, 'Master Departemen Karyawan', 'dashboard/master-departments', '9', 'circle', '2024-08-09 07:21:24', '2024-08-19 05:30:04', NULL, 22),
(38, 'Master Jabatan Karyawan', 'dashboard/master-occupations', '9', 'circle', '2024-08-09 07:22:00', '2024-08-19 05:30:04', NULL, 23),
(39, 'Master Karyawan', 'dashboard/master-employees', '9', 'circle', '2024-08-09 07:22:28', '2024-08-19 05:30:04', NULL, 24),
(40, 'Master Perantara', 'dashboard/master-agents', '9', 'circle', '2024-08-11 11:43:44', '2024-08-19 05:30:04', NULL, 25),
(41, 'Master Sales', 'dashboard/master-salesmans', '20', 'circle', '2024-08-11 11:45:18', '2024-08-19 05:30:04', NULL, 26),
(42, 'Master Leasing', 'dashboard/master-leasings', '20', 'circle', '2024-08-11 11:45:49', '2024-08-19 05:30:04', NULL, 27),
(43, 'Master Account', 'dashboard/master-financial-accounts', '22', 'circle', '2024-08-15 02:31:12', '2024-08-19 05:30:04', NULL, 28),
(44, 'Master Sub Account', 'dashboard/master-financial-sub-accounts', '22', 'circle', '2024-08-15 02:32:14', '2024-08-19 05:30:04', NULL, 29),
(45, 'Sales Order', '#', NULL, 'list', '2024-08-19 05:10:05', '2024-08-19 05:32:44', NULL, 30),
(46, 'Operasional', '#', NULL, 'list', '2024-08-19 05:10:16', '2024-08-19 05:32:57', NULL, 31),
(47, 'Master Group (User-Usaha)', 'FMM-GUU', '9', 'circle', '2024-08-19 05:53:40', '2024-08-19 05:53:40', NULL, NULL),
(48, 'Master Group (Account-Usaha)', 'FMM-GUA', '22', 'circle', '2024-08-19 06:47:19', '2024-08-19 06:47:19', NULL, NULL);

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
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_sell` int(1) DEFAULT NULL,
  `is_buy` int(1) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `is_sell`, `is_buy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRODUK 1', 'INI ADALAH PRODUK BARU', 100000, NULL, NULL, 'TIDAK AKTIF', '2024-09-04 11:09:24', '2024-09-04 11:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `setting_value` varchar(70) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `setting_value`, `created_at`, `updated_at`) VALUES
(48, 'name', 'FORMULA TRIBIK (CV)', NULL, NULL),
(49, 'email', 'dealer@nxtcentral.com', NULL, NULL),
(50, 'phone_number', '81384729676', NULL, NULL),
(51, 'address', 'ALAMAT PERUSAHAAN', NULL, NULL),
(52, 'photo', 'logo/ilqfMpD6aKKbxtyqxFpp.png', NULL, NULL),
(53, 'kop_nota', 'logo/6CCqUsmvu0JIzLTiugS9.PNG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'ADMINISTRATOR', 'responsive.link@gmail.com', NULL, '$2y$10$KYIJIgrbSKar/cBLU0NmieanA6k4UJm3YZkiSrU0D2a9kwheaY2Cm', '2mv46USf5VxPJxM5SeFFmKdvvtQnrwkPpJI21vALbT3kIRLSoG8TB1i7rcdT', '2024-08-02 03:30:58', '2024-08-06 02:57:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
