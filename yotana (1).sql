-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 10:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yotana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Mertie Quigley', 1, 'ni.ckb.ha.is.mi.t.h@gmail.com', NULL, '$2y$10$EHO9dC2HApx9jHJqC5UpVeemXxfBkBCy0Hl7yWVWswlfHPzVSIXkq', NULL, '2021-12-27 22:58:57', '2021-12-27 22:58:57'),
(7, 'Cristina Schowalter', 1, 'n.ick.bha.is.mit.h@gmail.com', NULL, '$2y$10$glGDT5m8iCIQDLsqb4hPwe2T4robKX/HeXbrmzqBjDznwRUjLV0U6', NULL, '2021-12-27 22:59:41', '2022-01-01 05:10:22'),
(9, 'Esteban Kassulke', 1, 'ni.ck.b.h.a.i.s.m.it.h@gmail.com', NULL, '$2y$10$5Zcyby40guy.hcHnitXmSO3EMaP1a1k0ZpfkBrmgbxORkrKGrTBCu', NULL, '2021-12-27 22:59:56', '2022-01-01 05:10:30'),
(10, 'Keyon Reilly', 1, 'n.i.ckb.h.a.is.m.i.t.h@gmail.com', NULL, '$2y$10$CYwwVS9rEKfH0WDCJ60Cj.dE.oNyPR0PQNiEMFX6oZWsAZPYnuYvG', NULL, '2021-12-27 23:02:36', '2021-12-27 23:02:36'),
(12, 'Kaley Rolfson', 1, 'n.i.c.kb.h.a.is.mi.th@gmail.com', NULL, '$2y$10$K397eFONt1YKvtdVeMBbJefawsTXK1Z/Vqs2oVbejWBKWoKdw/Rca', NULL, '2021-12-27 23:02:55', '2021-12-27 23:02:55'),
(13, 'Jannie Monahan', 1, 'n.ic.k.b.ha.i.s.m.it.h@gmail.com', NULL, '$2y$10$AGjUW3z/3XoDYpIsXoaHVuPRzSa8Hpt1jXwm3.06bN.r7s.lTS/9O', NULL, '2021-12-29 01:52:53', '2021-12-29 01:52:53'),
(14, 'Felicity Heidenreich', 1, 'ni.ck.b.hai.sm.it.h@gmail.com', NULL, '$2y$10$cL64nrwm54BmiiEDLtyARODctGIv20.Z4Z6l/TqiYRI28BVCuO7/y', NULL, '2021-12-30 22:35:06', '2021-12-30 22:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_12_27_094017_add_to_admin', 2),
(5, '2021_12_27_164913_create_admins_table', 3);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Sahil Jani', 'sahiljani123456@gmail.com', NULL, '$2y$10$is9g2G1PDqlLmMpz71yice2YsgXH4qNdxZo.9AkSIMtYqwD7jdMnq', NULL, NULL, NULL, 0),
(2, 'Trycia Armstrong', 'ni.ckb.haismi.t.h@gmail.com', NULL, '$2y$10$dni/UvHNnzdOVnbVr2D.1OZz2Gfj0ly7NXH5jaRFMCMht7SIQwfFC', NULL, '2021-12-27 21:36:53', '2021-12-27 21:36:53', 1),
(3, 'Maria Cormier', 'ni.c.k.bha.ism.it.h@gmail.com', NULL, '$2y$10$TBL2nSkcBurrgyXAE4D/nuHp6fHT9ETqGq/pPL0YiV9nOXIBU87Um', NULL, '2021-12-27 21:42:24', '2021-12-27 21:42:24', 1),
(4, 'Estefania Watsica', 'nic.k.bh.a.i.smith@gmail.com', NULL, '$2y$10$gw57aXZCvXS/KpI4Ce.yTeCxrIH7C5PYDr3z8.McZ6xTwNjdMR35a', NULL, '2021-12-27 21:46:12', '2021-12-27 21:46:12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
