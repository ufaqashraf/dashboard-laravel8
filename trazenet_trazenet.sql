-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2021 at 02:09 PM
-- Server version: 5.7.33
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trazenet_trazenet`
--

-- --------------------------------------------------------

--
-- Table structure for table `antiviri`
--

CREATE TABLE `antiviri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antiviri`
--

INSERT INTO `antiviri` (`id`, `name`, `slug`, `logo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Norton', 'norton', '1086050792.png', 'Norton antivirus', 1, '2021-03-20 01:05:59', '2021-03-20 01:06:27'),
(4, 'Kespersky', 'kespersky', '261020603.png', 'kespersky antivirus...', 1, '2021-03-20 01:06:23', '2021-03-20 01:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `form_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_encription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_assigned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_returned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `antivirus_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `domain_i_p_s`
--

CREATE TABLE `domain_i_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1949471045, 'user', 8, 1, 'hello', NULL, 1, '2021-03-26 23:25:58', '2021-03-26 23:28:00'),
(2556721999, 'user', 1, 8, 'hi', NULL, 0, '2021-03-26 23:28:12', '2021-03-26 23:28:12');

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
(4, '2019_09_22_192348_create_messages_table', 1),
(5, '2019_10_16_211433_create_favorites_table', 1),
(6, '2019_10_18_223259_add_avatar_to_users', 1),
(7, '2019_10_20_211056_add_messenger_color_to_users', 1),
(8, '2019_10_22_000539_add_dark_mode_to_users', 1),
(9, '2019_10_25_214038_add_active_status_to_users', 1),
(10, '2021_02_20_102006_create_devices_table', 1),
(11, '2021_02_22_061847_create_antiviri_table', 1),
(12, '2021_02_22_113243_create_price_plans_table', 1),
(13, '2021_02_23_091216_add_column_antivirus_id_to_devices', 1),
(14, '2021_02_23_132320_create_rules_table', 1),
(15, '2021_02_25_051909_create_send_mails_table', 1),
(16, '2021_02_25_064341_create_domain_i_p_s_table', 1),
(17, '2021_02_27_073811_add_column_price_plan_id_to_users_table', 1),
(18, '2021_02_27_125238_create_settings_table', 1),
(19, '2021_03_03_051253_create_rules_fields_table', 1),
(20, '2021_03_04_075344_create_user_notifications_table', 1),
(21, '2021_03_10_050106_create_tickets_table', 1),
(22, '2021_03_11_053340_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tran_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tran_id`, `package`, `price`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(6, 8, 'PAYID-MBLC5HI1W425394PY996953P', 'Standered', '100.00', 'Monthly', 'Pending', '2021-03-20 11:24:59', '2021-03-20 11:24:59'),
(10, 15, NULL, 'Standard', '100.00', 'Monthly', 'Pending', '2021-03-27 00:51:26', '2021-03-27 00:51:26'),
(11, 8, 'PAYID-MBPQ6DA1U447357M1018730H', 'Gold', '500.00', 'Annually', 'Failed', '2021-03-27 17:55:07', '2021-03-27 17:55:07'),
(13, 19, 'PAYID-MBPRR2Q3XT124065U542853R', 'Gold', '500.00', 'Annually', 'Failed', '2021-03-27 18:37:13', '2021-03-27 18:37:13'),
(14, 8, 'PAYID-MBPTWPI6PD990862F4202150', 'Standard', '500.00', 'Quarterly', 'Failed', '2021-03-27 21:03:40', '2021-03-27 21:03:40'),
(15, 8, 'PAYID-MBPTWYY0CC77905NA642060D', 'Standard', '500.00', 'Quarterly', 'Failed', '2021-03-27 21:04:19', '2021-03-27 21:04:19');

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
-- Table structure for table `price_plans`
--

CREATE TABLE `price_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly` decimal(8,2) NOT NULL,
  `quarterly` decimal(8,2) NOT NULL,
  `annually` decimal(8,2) NOT NULL,
  `rules` int(11) NOT NULL,
  `user_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_plans`
--

INSERT INTO `price_plans` (`id`, `name`, `slug`, `currency`, `monthly`, `quarterly`, `annually`, `rules`, `user_limit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 'standard', 'United States', 100.00, 500.00, 1000.00, 10, '10', 1, '2021-03-20 01:49:37', '2021-03-22 03:46:42'),
(2, 'Gold', 'gold', 'Guinea', 200.00, 400.00, 500.00, 30, '20', 1, '2021-03-20 01:50:30', '2021-03-20 01:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rule1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule_action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_opt1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance_opt2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance_opt3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance_opt4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `user_id`, `price_plan_id`, `rule1`, `condition`, `rule2`, `description`, `rule_action`, `advance_opt1`, `advance_opt2`, `advance_opt3`, `advance_opt4`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, 'Billing', 'Equal To', 'Shipping Address', 'Approve', 'Approve', NULL, NULL, NULL, NULL, 0, '2021-03-25 05:30:32', '2021-03-27 20:04:49'),
(3, 1, NULL, 'Customer Name', 'Not Equal To', 'Customer Name', 'test', 'Approve', NULL, NULL, 'Block Domain Names', NULL, 0, '2021-03-25 05:43:52', '2021-03-25 05:43:52'),
(5, 1, NULL, 'City of Billing', 'Equal To', 'Shipping Address', 'Approve', 'Approve', NULL, NULL, NULL, NULL, 0, '2021-03-25 06:00:27', '2021-03-25 06:00:27'),
(6, 1, NULL, 'Customer Name', 'Equal To', 'Email with_', 'test', 'Approve', NULL, NULL, NULL, NULL, 0, '2021-03-27 00:43:09', '2021-03-27 00:43:09'),
(7, 1, NULL, 'Billing', 'Equal To', 'Customer Name', 'testByMohsin', 'Approve', 'Disallow Repeated Use', 'Block Blocklisted IP', NULL, NULL, 0, '2021-03-27 00:44:03', '2021-03-27 00:44:22'),
(8, 1, NULL, 'Mohsin Slug', 'Custom', 'City Name', 'Test Allow', 'Approve', '3', NULL, NULL, '^', 0, '2021-03-27 00:54:58', '2021-03-27 00:54:58'),
(9, 1, NULL, 'City of Billing', 'Not Equal To', 'City Name', 'Reject', 'Reject', NULL, 'Block Blocklisted IP', NULL, NULL, 0, '2021-03-27 03:24:11', '2021-03-27 03:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `rules_fields`
--

CREATE TABLE `rules_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules_fields`
--

INSERT INTO `rules_fields` (`id`, `slug`, `name`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'Billing', 'Text', 'Test', 1, '2021-03-22 03:35:45', '2021-03-25 05:45:54'),
(2, 'customer-name', 'Customer Name', 'Text', 'Comparable', 1, '2021-03-23 14:52:51', '2021-03-23 14:52:51'),
(3, 'shipping-address', 'Shipping Address', 'Comparable', 'Shipping Address', 1, '2021-03-23 14:54:27', '2021-03-27 00:39:17'),
(4, 'email-address', 'Email with_', 'Text', 'Email with special character', 1, '2021-03-25 05:47:44', '2021-03-25 05:47:44'),
(5, 'registration-address', 'Registration Address', 'Text', 'Check registration Address', 1, '2021-03-25 05:49:48', '2021-03-25 05:49:48'),
(6, 'city-name', 'City Name', 'Text', 'Check city Of Registration', 1, '2021-03-25 05:50:47', '2021-03-25 05:50:47'),
(7, 'date-of-birth', 'Date of birth', 'Text', 'Check date of birth', 1, '2021-03-25 05:51:41', '2021-03-25 05:51:41'),
(8, 'city-of-billing', 'City of Billing', 'Text', 'Check City of Billing', 1, '2021-03-25 05:53:57', '2021-03-25 05:53:57'),
(9, '00000000000', 'Telephone Numbers', 'Numeric', 'Check Telephone Numbers', 1, '2021-03-25 05:55:56', '2021-03-25 05:55:56'),
(10, 'blacklisted-ip', 'Blacklisted IP Address', 'Text', 'Block Blacklisted IP', 1, '2021-03-25 05:57:55', '2021-03-25 05:57:55'),
(11, 'mohsin-slug', 'Mohsin Slug', 'Text', 'Mohsin Test Description', 1, '2021-03-27 00:45:47', '2021-03-27 00:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `send_mails`
--

CREATE TABLE `send_mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `send_mails`
--

INSERT INTO `send_mails` (`id`, `from`, `to`, `subject`, `msg`, `status`, `created_at`, `updated_at`) VALUES
(1, 'info@server21.ltd', 'test@gmail.com', 'test', 'tes', 'sent', '2021-03-22 03:38:38', '2021-03-22 03:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_tag_line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitt_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_title`, `icon`, `meta_name`, `meta_des`, `site_tag_line`, `address`, `cell`, `email`, `fb_link`, `insta_link`, `twitt_link`, `tube_link`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'https://trazenet.ideatechsolution.com/', 'https://trazenet.ide/', '2011778567.png', NULL, NULL, 'https://trazenet.ideatechsolution.com/', '61/1 metro housing dhaka', '01711431232', 'admin@admin.com', NULL, NULL, NULL, NULL, '1085501935.png', '2021-03-22 13:57:08', '2021-03-26 23:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `ticket_id`, `query`, `status`, `created_at`, `updated_at`) VALUES
(2, 8, '8704028', 'test', 'Solved', '2021-03-20 13:29:11', '2021-03-22 03:42:10'),
(3, 8, '9647978', 'help', 'Pending', '2021-03-22 04:52:37', '2021-03-22 04:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `phn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private_test_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_test_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `verified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `edit_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_block` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_plan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `f_name`, `l_name`, `email`, `active_status`, `dark_mode`, `messenger_color`, `avatar`, `phn`, `address`, `password`, `city`, `country`, `state`, `post_code`, `company`, `company_url`, `position`, `private_test_key`, `public_test_key`, `type`, `verified`, `verification_token`, `status`, `edit_count`, `duration`, `icon_name`, `icon`, `payment`, `is_block`, `remember_token`, `created_at`, `updated_at`, `price_plan_id`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', 0, 0, '#2180f3', 'avatar.png', '', NULL, '$2y$10$NEzT.qM0LnlEyHjlkOUU1eZs6iZhMnULthXaYTLhVGMbJY/bhQ586', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'super_admin', '1', NULL, 1, NULL, NULL, NULL, NULL, 'done', NULL, NULL, NULL, '2021-03-27 00:44:34', NULL),
(8, 'test', 'test', 'test', 'test@gmail.com', 0, 0, '#2180f3', 'avatar.png', '0987654321555', 'adsfsd', '$2y$10$n2KeMlpdyogAw581jT3su.Mc8GI3X7os4ZZAL77i2aCtzibRr.mOG', 'dsfsdf', 'Bangladesh', 'California', 'dasfdsf', 'ddd', 'dfgfdg', 'ceo', 'sW51Td0sFVoD8Orn', 'ShGPPB7vrZ', 'user', '1', 'nxnmBBPSA98NnJZ4rF7zItybKSpVoeWk', 1, NULL, 'Monthly', 'Drive+ UK Limited', '104680940.jpg', 'done', NULL, NULL, '2021-03-20 09:01:20', '2021-03-27 19:02:10', 1),
(15, 'sss', 'sss', 'sss', 'ideatech.engineear@gmail.com', 0, 0, '#2180f3', 'avatar.png', '0987654321876', 'dhaka', '$2y$10$M5ve0E5Gj809ff8rxaxp0OgswFbwEzDT1UJ13cxhCUqgFgzHfM9IS', 'dhaka', 'Albania', 'test', 'gfhgfh', NULL, 'test.com', 'test.gg', 'D8wijkxtYmUpxGp2', 'BXeQYuXXx5', 'user', '1', '', 0, NULL, 'Monthly', NULL, NULL, 'done', NULL, NULL, '2021-03-27 00:50:42', '2021-03-27 20:00:55', 1),
(16, 'thomadek', 'ade', 'kadri', 'ade.adekoya@driveplus.com.ng', 0, 0, '#2180f3', 'avatar.png', '00000000000088', '12 west way', '$2y$10$BUdlGxij75dwuBDG.HNGdOst6q3cXlYwgQOQH8DLtdcxYDYR3D49O', 'Lagos', 'Nigeria', 'lagos', '234', 'Driveplus', 'www.driveplus.com.ng', 'CEO', '52K3oFQk5FRrqP0f', 'SvFDh9hiXr', 'user', NULL, 'HIf8aGGsnVTK3TWgv1VyQG7wcvXZf745', 0, '1', 'Annually', NULL, NULL, '', NULL, NULL, '2021-03-27 01:11:41', '2021-03-27 17:09:54', 1),
(17, 'rezoan', 'Rezoan', 'ul islam', 'rezoan.official@gmail.com', 0, 0, '#2180f3', 'avatar.png', '8801684090806', 'Mohammadpur, Dhaka.', '$2y$10$TF1zegy7F0Ac.OuCHW217ucVc9HIxz4QFULrb0JLhRoFREKiIg50u', 'Mohammadpur, Dhaka', 'Bangladesh', 'Dhaka', '1208', 'Abc', 'test.com', 'abb', 'sG9pRLjdA9RmLHkt', 'I8kHVdcAJx', 'user', '1', '', 0, NULL, 'Monthly', NULL, NULL, '', NULL, NULL, '2021-03-27 17:40:11', '2021-03-27 18:25:21', 2),
(19, 'rez', 'Rezoan', 'islam', 'ideatechtutorial@gmail.com', 0, 0, '#2180f3', 'avatar.png', '8801684090806', 'Mohammadpur, Dhaka.', '$2y$10$nHvSMj6b0bH/0PBHhVBOeu8paRiwXqRkqN.CNj80tpmAIUgVF.78u', 'Mohammadpur, Dhaka', 'Bangladesh', 'Dhaka', '1208', 'xyz', 'xuz.com', 'Tezs', 'c97etvu7mrlKOm6J', '6cdPdOsTrc', 'user', NULL, 'VBEQqnkdqulD5HwcNPeYnJVSiVe9sNtY', 0, NULL, 'Annually', NULL, NULL, '', NULL, NULL, '2021-03-27 18:36:38', '2021-03-27 18:36:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `noti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `price_plan_id`, `noti`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'admin first time try to edit information', 0, '2021-03-27 17:09:54', '2021-03-27 17:09:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antiviri`
--
ALTER TABLE `antiviri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_user_id_foreign` (`user_id`),
  ADD KEY `devices_antivirus_id_foreign` (`antivirus_id`);

--
-- Indexes for table `domain_i_p_s`
--
ALTER TABLE `domain_i_p_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_i_p_s_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `price_plans`
--
ALTER TABLE `price_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules_fields`
--
ALTER TABLE `rules_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_mails`
--
ALTER TABLE `send_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_price_plan_id_foreign` (`price_plan_id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notifications_user_id_foreign` (`user_id`),
  ADD KEY `user_notifications_price_plan_id_foreign` (`price_plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antiviri`
--
ALTER TABLE `antiviri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domain_i_p_s`
--
ALTER TABLE `domain_i_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `price_plans`
--
ALTER TABLE `price_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rules_fields`
--
ALTER TABLE `rules_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `send_mails`
--
ALTER TABLE `send_mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_antivirus_id_foreign` FOREIGN KEY (`antivirus_id`) REFERENCES `antiviri` (`id`),
  ADD CONSTRAINT `devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `domain_i_p_s`
--
ALTER TABLE `domain_i_p_s`
  ADD CONSTRAINT `domain_i_p_s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_price_plan_id_foreign` FOREIGN KEY (`price_plan_id`) REFERENCES `price_plans` (`id`);

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_price_plan_id_foreign` FOREIGN KEY (`price_plan_id`) REFERENCES `price_plans` (`id`),
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
