-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 02:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_management`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_04_180509_create_products_table', 1),
(6, '2025_07_04_180510_create_sales_table', 1),
(7, '2025_07_04_180511_create_notes_table', 1),
(8, '2025_07_04_180511_create_sale_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note`, `notable_type`, `notable_id`, `created_at`, `updated_at`) VALUES
(4, 'thj ljd hvhop hvijoke ,jbsjkboj.', 'App\\Models\\Sale', 6, '2025-07-04 17:32:12', '2025-07-04 17:32:12'),
(5, 'nbjnckcsdb hvuijod jho..hij sho.', 'App\\Models\\Sale', 7, '2025-07-04 17:32:34', '2025-07-04 17:32:34'),
(6, 'ertb fjio fghj hgholam,b noklknbha..jshxo bojms .', 'App\\Models\\Sale', 8, '2025-07-04 17:33:05', '2025-07-04 17:33:05'),
(7, 'jbhijk fcvbuijkl dfghjk,mnb rtyuijnbv .ghjkoiuy fghjk..', 'App\\Models\\Sale', 9, '2025-07-04 17:33:39', '2025-07-04 17:33:39'),
(8, 'ghjkmnbvdfghjk dfgyui dyui tyuil,mnb..vhjkhg drtyuiokjhg...dyuikjnb', 'App\\Models\\Sale', 10, '2025-07-04 17:34:26', '2025-07-04 17:34:26'),
(9, 'this product must be new!', 'App\\Models\\Sale', 11, '2025-07-04 18:12:02', '2025-07-04 18:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 'optio Item', '2294.66', '2025-07-04 12:36:53', '2025-07-04 12:36:53'),
(2, 'vel Shoes', '2235.90', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(3, 'eaque Book', '3281.45', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(4, 'et Tablet', '959.20', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(5, 'omnis Item', '1179.54', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(6, 'ut Book', '1296.32', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(7, 'autem Book', '3176.84', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(8, 'voluptas Book', '4774.48', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(9, 'voluptatum Shoes', '2374.89', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(10, 'et Shoes', '3789.57', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(11, 'voluptates Book', '1731.42', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(12, 'qui Book', '3157.17', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(13, 'aut Book', '2264.39', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(14, 'corporis Shoes', '1832.97', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(15, 'ullam Tablet', '2266.02', '2025-07-04 12:36:54', '2025-07-04 12:36:54'),
(16, 'expedita Shoes', '918.13', '2025-07-04 12:36:55', '2025-07-04 12:36:55'),
(17, 'ad Item', '4570.26', '2025-07-04 12:36:55', '2025-07-04 12:36:55'),
(18, 'molestiae Book', '4114.07', '2025-07-04 12:36:55', '2025-07-04 12:36:55'),
(19, 'quia Tablet', '2367.62', '2025-07-04 12:36:55', '2025-07-04 12:36:55'),
(20, 'dignissimos Tablet', '4999.89', '2025-07-04 12:36:55', '2025-07-04 12:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` date NOT NULL,
  `total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `sale_date`, `total`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 1, '2025-07-09', '7579.14', NULL, '2025-07-04 17:32:12', '2025-07-04 17:39:12'),
(7, 2, '2025-07-08', '4460.99', NULL, '2025-07-04 17:32:34', '2025-07-04 17:39:13'),
(8, 2, '2025-07-01', '6435.48', NULL, '2025-07-04 17:33:04', '2025-07-04 17:33:04'),
(9, 4, '2025-07-03', '11963.41', NULL, '2025-07-04 17:33:39', '2025-07-04 17:33:39'),
(10, 1, '2025-07-09', '3173.65', NULL, '2025-07-04 17:34:25', '2025-07-04 18:11:00'),
(11, 2, '2025-07-04', '18860.59', NULL, '2025-07-04 18:12:02', '2025-07-04 18:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `quantity`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 6, 10, 2, '3789.57', NULL, '2025-07-04 17:32:12', '2025-07-04 17:32:12'),
(11, 7, 5, 1, '1179.54', NULL, '2025-07-04 17:32:34', '2025-07-04 17:32:34'),
(12, 7, 3, 1, '3281.45', NULL, '2025-07-04 17:32:34', '2025-07-04 17:32:34'),
(13, 8, 3, 1, '3281.45', NULL, '2025-07-04 17:33:04', '2025-07-04 17:33:04'),
(14, 8, 16, 1, '918.13', NULL, '2025-07-04 17:33:04', '2025-07-04 17:33:04'),
(15, 8, 2, 1, '2235.90', NULL, '2025-07-04 17:33:05', '2025-07-04 17:33:05'),
(16, 9, 3, 1, '3281.45', NULL, '2025-07-04 17:33:39', '2025-07-04 17:33:39'),
(17, 9, 12, 2, '3157.17', NULL, '2025-07-04 17:33:39', '2025-07-04 17:33:39'),
(18, 9, 19, 1, '2367.62', NULL, '2025-07-04 17:33:39', '2025-07-04 17:33:39'),
(19, 10, 6, 1, '1296.32', NULL, '2025-07-04 17:34:26', '2025-07-04 17:34:26'),
(20, 10, 4, 1, '959.20', NULL, '2025-07-04 17:34:26', '2025-07-04 17:34:26'),
(21, 10, 16, 1, '918.13', NULL, '2025-07-04 17:34:26', '2025-07-04 17:34:26'),
(22, 11, 3, 2, '3281.45', NULL, '2025-07-04 18:12:02', '2025-07-04 18:12:02'),
(23, 11, 12, 1, '3157.17', NULL, '2025-07-04 18:12:02', '2025-07-04 18:12:02'),
(24, 11, 17, 2, '4570.26', NULL, '2025-07-04 18:12:02', '2025-07-04 18:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mike O\'Kon', 'gpurdy@example.net', '2025-07-04 12:35:35', '$2y$12$s0hNGH4YsSOauFA4RRFN4OuXcKlM3l3HJN3/pSvhtFM7GVvvG3mVS', 'BNO8Pp4vFU', '2025-07-04 12:35:36', '2025-07-04 12:35:36'),
(2, 'Antwon Howe DDS', 'nolan.velma@example.net', '2025-07-04 12:35:36', '$2y$12$s0hNGH4YsSOauFA4RRFN4OuXcKlM3l3HJN3/pSvhtFM7GVvvG3mVS', 'gPwHIFX6T3', '2025-07-04 12:35:36', '2025-07-04 12:35:36'),
(3, 'Evie Raynor', 'schmeler.annette@example.org', '2025-07-04 12:35:36', '$2y$12$s0hNGH4YsSOauFA4RRFN4OuXcKlM3l3HJN3/pSvhtFM7GVvvG3mVS', '4YomjY6YuU', '2025-07-04 12:35:36', '2025-07-04 12:35:36'),
(4, 'Luther Gusikowski', 'haskell.daugherty@example.com', '2025-07-04 12:35:36', '$2y$12$s0hNGH4YsSOauFA4RRFN4OuXcKlM3l3HJN3/pSvhtFM7GVvvG3mVS', 'xL6yyaE6UA', '2025-07-04 12:35:36', '2025-07-04 12:35:36'),
(5, 'Mr. Raphael Sipes', 'tom14@example.net', '2025-07-04 12:35:36', '$2y$12$s0hNGH4YsSOauFA4RRFN4OuXcKlM3l3HJN3/pSvhtFM7GVvvG3mVS', 'bkATGcNW8u', '2025-07-04 12:35:36', '2025-07-04 12:35:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_notable_type_notable_id_index` (`notable_type`,`notable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_items_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_items_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
