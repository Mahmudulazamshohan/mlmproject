-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 08:56 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlmproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$eKOORbpsf4ZzVbtf.JTo9.dc5UZgePo75SWKjR/CiDMTHhyuHbUyW', NULL, '2020-01-28 18:00:00', '2020-01-29 07:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `business_stories`
--

CREATE TABLE `business_stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `story` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_stories`
--

INSERT INTO `business_stories` (`id`, `user_id`, `story`, `created_at`, `updated_at`) VALUES
(1, 1, '<p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">Imagine going to a networking meeting …</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">You enter a room full of serious grey suits politely sipping their wine, bragging about their corporate missions. Rather boringly.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">And there you are, in your purple shirt, feeling out of place.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">You grab a glass of beer, and tap a fork against the glass to attract attention.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">“Listen up,” you say, “let me tell you a story about how I conquered the world.”</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">“Wanna hear it?”<span id=\"more-18125\" style=\"box-sizing: inherit;\"></span></p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">A business story doesn’t need bravery like that. But a good business story has the same impact: You attract attention. You stand out. You invigorate your audience, and pull them closer to you. They get inspired.</p><h2 style=\"box-sizing: inherit; font-family: &quot;Cabin Condensed&quot;, arial, sans-serif; line-height: 1.2; margin: 40px 0px 20px; font-size: 2.7rem; color: rgb(99, 13, 108);\">What’s a good business story?</h2><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">Let’s be honest, the web is full of&nbsp;<a href=\"https://www.enchantingmarketing.com/gobbledygook/\" style=\"box-sizing: inherit; transition-duration: 0s; transition-property: none; color: rgb(0, 0, 0); animation: 0s ease 0s 1 normal none running none; border-bottom: 1px solid rgb(255, 81, 0);\">gobbledygook</a>-filled mission statements, conjured up by committees with the only aim not to offend anybody.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">Big corporations can afford to be boring. Because they have tons of money to buy brand awareness.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">But for small businesses and freelancers, life is different. We don’t have heaps of money, so we have to fascinate our audience and spark action.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">A good business founding story takes readers on your journey, gives them a glimpse of who you are, and helps gain an emotional buy-in. Just reading your story makes people feel better already, so they start imagining how good it would be to work with you.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">This is the power of storytelling.</p><h2 style=\"box-sizing: inherit; font-family: &quot;Cabin Condensed&quot;, arial, sans-serif; line-height: 1.2; margin: 40px 0px 20px; font-size: 2.7rem; color: rgb(99, 13, 108);\">Business stories come in different shapes and sizes</h2><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">How Jobs and Wozniak built their first computer in a garage. How Ben and Jerry started their first ice cream shop in a renovated gas station (after a $5 correspondence course). How Disney started as a cartoon studio in the 1920s, and now produces entertainment on a global scale.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">Some stories sound like fairytales, and you may think your story isn’t fascinating enough.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">But that’s untrue.</p><p style=\"box-sizing: inherit; margin-bottom: 27px; padding: 0px; font-family: Georgia, serif; color: rgb(0, 0, 0); font-size: 20px;\">Every business has a good story. You simply have to dig to find the four key moments in your business history, and craft your story around these four key moments.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `join_incomes`
--

CREATE TABLE `join_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `join_incomes`
--

INSERT INTO `join_incomes` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 3500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level_incomes`
--

CREATE TABLE `level_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level1` bigint(20) NOT NULL DEFAULT 0,
  `level2` bigint(20) NOT NULL DEFAULT 0,
  `level3` bigint(20) NOT NULL DEFAULT 0,
  `level4` bigint(20) NOT NULL DEFAULT 0,
  `level5` bigint(20) NOT NULL DEFAULT 0,
  `level6` bigint(20) NOT NULL DEFAULT 0,
  `level7` bigint(20) NOT NULL DEFAULT 0,
  `level8` bigint(20) NOT NULL DEFAULT 0,
  `level9` bigint(20) NOT NULL DEFAULT 0,
  `level10` bigint(20) NOT NULL DEFAULT 0,
  `level11` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level_incomes`
--

INSERT INTO `level_incomes` (`id`, `user_id`, `level1`, `level2`, `level3`, `level4`, `level5`, `level6`, `level7`, `level8`, `level9`, `level10`, `level11`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-02-20 01:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `level_settings`
--

CREATE TABLE `level_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `join_income` int(11) NOT NULL DEFAULT 3500,
  `refferal` int(11) NOT NULL DEFAULT 500,
  `minimum_withdraw` int(11) NOT NULL DEFAULT 3000,
  `withdraw_fee` int(11) NOT NULL DEFAULT 7,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level_settings`
--

INSERT INTO `level_settings` (`id`, `join_income`, `refferal`, `minimum_withdraw`, `withdraw_fee`, `created_at`, `updated_at`) VALUES
(1, 3500, 2500, 3000, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_approves`
--

CREATE TABLE `loan_approves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_id` bigint(20) UNSIGNED NOT NULL,
  `achieve_date` date NOT NULL,
  `release_date` date NOT NULL,
  `payable_by_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_bonuses`
--

CREATE TABLE `member_bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `bonus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_loans`
--

CREATE TABLE `member_loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `interest` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_loans`
--

INSERT INTO `member_loans` (`id`, `user_id`, `amount`, `interest`, `paid`, `approved`, `created_at`, `updated_at`) VALUES
(15, 1, 20000, 2000, 1, 1, '2020-02-16 00:36:16', '2020-02-16 01:20:15'),
(16, 1, 5500, 550, 1, 1, '2020-02-16 00:36:35', '2020-02-16 01:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_21_060531_create_uplines_table', 1),
(5, '2020_01_21_060557_create_total_uplines_table', 1),
(6, '2020_01_22_055408_create_profiles_table', 1),
(7, '2020_01_22_182346_create_admins_table', 1),
(8, '2020_01_23_054337_create_business_stories_table', 1),
(9, '2020_01_23_142309_create_level_incomes_table', 1),
(10, '2020_01_23_142837_create_join_incomes_table', 1),
(11, '2020_01_25_130646_create_level_settings_table', 1),
(12, '2020_01_26_062519_create_withdraws_table', 1),
(13, '2020_02_06_135123_create_push_notifications_table', 2),
(14, '2020_02_06_135218_create_push_notification_views_table', 2),
(15, '2020_02_08_155412_create_member_bonuses_table', 3),
(17, '2020_02_09_052415_create_loan_approves_table', 4),
(18, '2020_02_15_161926_create_member_loans_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1580303723.png', '2020-01-29 07:15:23', '2020-01-29 07:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `push_notification_views`
--

CREATE TABLE `push_notification_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `push_notification_views_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_uplines`
--

CREATE TABLE `total_uplines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level1` bigint(20) NOT NULL DEFAULT 0,
  `level2` bigint(20) NOT NULL DEFAULT 0,
  `level3` bigint(20) NOT NULL DEFAULT 0,
  `level4` bigint(20) NOT NULL DEFAULT 0,
  `level5` bigint(20) NOT NULL DEFAULT 0,
  `level6` bigint(20) NOT NULL DEFAULT 0,
  `level7` bigint(20) NOT NULL DEFAULT 0,
  `level8` bigint(20) NOT NULL DEFAULT 0,
  `level9` bigint(20) NOT NULL DEFAULT 0,
  `level10` bigint(20) NOT NULL DEFAULT 0,
  `level11` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `total_uplines`
--

INSERT INTO `total_uplines` (`id`, `user_id`, `level1`, `level2`, `level3`, `level4`, `level5`, `level6`, `level7`, `level8`, `level9`, `level10`, `level11`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-02-20 01:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `uplines`
--

CREATE TABLE `uplines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level1` bigint(20) DEFAULT NULL,
  `level2` bigint(20) DEFAULT NULL,
  `level3` bigint(20) DEFAULT NULL,
  `level4` bigint(20) DEFAULT NULL,
  `level5` bigint(20) DEFAULT NULL,
  `level6` bigint(20) DEFAULT NULL,
  `level7` bigint(20) DEFAULT NULL,
  `level8` bigint(20) DEFAULT NULL,
  `level9` bigint(20) DEFAULT NULL,
  `level10` bigint(20) DEFAULT NULL,
  `level11` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uplines`
--

INSERT INTO `uplines` (`id`, `user_id`, `level1`, `level2`, `level3`, `level4`, `level5`, `level6`, `level7`, `level8`, `level9`, `level10`, `level11`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `referral_code` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(190) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `referral_code`, `is_blocked`, `active`, `phone`, `country`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User1234', 'user@gmail.com', NULL, '$2y$10$kQim6NYrCK.9iEK3CmB1Je1aPaiNc3kvk3CHvai/DbAOOl6RcNvVq', 'xf82RA', 0, 1, '12312', 'Nyandarua', NULL, '2020-01-28 18:00:00', '2020-02-18 00:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL DEFAULT 0,
  `fees` bigint(20) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `business_stories`
--
ALTER TABLE `business_stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_stories_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_incomes`
--
ALTER TABLE `join_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `join_incomes_user_id_foreign` (`user_id`);

--
-- Indexes for table `level_incomes`
--
ALTER TABLE `level_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_incomes_user_id_foreign` (`user_id`);

--
-- Indexes for table `level_settings`
--
ALTER TABLE `level_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_approves`
--
ALTER TABLE `loan_approves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_approves_withdraw_id_foreign` (`withdraw_id`);

--
-- Indexes for table `member_bonuses`
--
ALTER TABLE `member_bonuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_bonuses_user_id_foreign` (`user_id`);

--
-- Indexes for table `member_loans`
--
ALTER TABLE `member_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_loans_user_id_foreign` (`user_id`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_notification_views`
--
ALTER TABLE `push_notification_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `push_notification_views_push_notification_views_id_foreign` (`push_notification_views_id`),
  ADD KEY `push_notification_views_user_id_foreign` (`user_id`);

--
-- Indexes for table `total_uplines`
--
ALTER TABLE `total_uplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_uplines_user_id_foreign` (`user_id`);

--
-- Indexes for table `uplines`
--
ALTER TABLE `uplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uplines_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_stories`
--
ALTER TABLE `business_stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_incomes`
--
ALTER TABLE `join_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `level_incomes`
--
ALTER TABLE `level_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `level_settings`
--
ALTER TABLE `level_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_approves`
--
ALTER TABLE `loan_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_bonuses`
--
ALTER TABLE `member_bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_loans`
--
ALTER TABLE `member_loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `push_notification_views`
--
ALTER TABLE `push_notification_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `total_uplines`
--
ALTER TABLE `total_uplines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `uplines`
--
ALTER TABLE `uplines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_stories`
--
ALTER TABLE `business_stories`
  ADD CONSTRAINT `business_stories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `join_incomes`
--
ALTER TABLE `join_incomes`
  ADD CONSTRAINT `join_incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `level_incomes`
--
ALTER TABLE `level_incomes`
  ADD CONSTRAINT `level_incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loan_approves`
--
ALTER TABLE `loan_approves`
  ADD CONSTRAINT `loan_approves_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `withdraws` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `member_bonuses`
--
ALTER TABLE `member_bonuses`
  ADD CONSTRAINT `member_bonuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `member_loans`
--
ALTER TABLE `member_loans`
  ADD CONSTRAINT `member_loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `push_notification_views`
--
ALTER TABLE `push_notification_views`
  ADD CONSTRAINT `push_notification_views_push_notification_views_id_foreign` FOREIGN KEY (`push_notification_views_id`) REFERENCES `push_notification_views` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `push_notification_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `total_uplines`
--
ALTER TABLE `total_uplines`
  ADD CONSTRAINT `total_uplines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uplines`
--
ALTER TABLE `uplines`
  ADD CONSTRAINT `uplines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
