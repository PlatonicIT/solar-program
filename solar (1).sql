-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 05:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Index', 'fa-bar-chart', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'fa-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, NULL),
(8, 0, 8, 'Question', 'fa-question', 'question', '*', '2019-03-07 08:18:35', '2019-03-07 08:19:38'),
(9, 0, 9, 'Setting', 'fa-gear', 'setting', '*', '2019-03-08 12:49:53', '2019-03-08 12:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-03-07 08:17:56', '2019-03-07 08:17:56'),
(2, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:18:11', '2019-03-07 08:18:11'),
(3, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Question\",\"icon\":\"fa-question\",\"uri\":\"Question\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\"}', '2019-03-07 08:18:34', '2019-03-07 08:18:34'),
(4, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-03-07 08:18:35', '2019-03-07 08:18:35'),
(5, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8}]\"}', '2019-03-07 08:18:39', '2019-03-07 08:18:39'),
(6, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:18:39', '2019-03-07 08:18:39'),
(7, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:18:45', '2019-03-07 08:18:45'),
(8, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:18:50', '2019-03-07 08:18:50'),
(9, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-03-07 08:18:50', '2019-03-07 08:18:50'),
(10, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:19:21', '2019-03-07 08:19:21'),
(11, 1, 'admin/auth/menu/8/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:19:27', '2019-03-07 08:19:27'),
(12, 1, 'admin/auth/menu/8', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Question\",\"icon\":\"fa-question\",\"uri\":\"question\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/solar.test\\/admin\\/auth\\/menu\"}', '2019-03-07 08:19:38', '2019-03-07 08:19:38'),
(13, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-03-07 08:19:38', '2019-03-07 08:19:38'),
(14, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8}]\"}', '2019-03-07 08:19:40', '2019-03-07 08:19:40'),
(15, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:19:41', '2019-03-07 08:19:41'),
(16, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:19:44', '2019-03-07 08:19:44'),
(17, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-03-07 08:19:45', '2019-03-07 08:19:45'),
(18, 1, 'admin/question', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:19:49', '2019-03-07 08:19:49'),
(19, 1, 'admin/question/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:19:53', '2019-03-07 08:19:53'),
(20, 1, 'admin/question', 'POST', '127.0.0.1', '{\"question\":\"Do you own your home?\",\"question_options\":{\"new_1\":{\"question_option\":\"Yes\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"},\"new_2\":{\"question_option\":\"No\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_previous_\":\"http:\\/\\/solar.test\\/admin\\/question\"}', '2019-03-07 08:20:18', '2019-03-07 08:20:18'),
(21, 1, 'admin/question', 'GET', '127.0.0.1', '[]', '2019-03-07 08:20:19', '2019-03-07 08:20:19'),
(22, 1, 'admin/question/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:20:29', '2019-03-07 08:20:29'),
(23, 1, 'admin/question', 'POST', '127.0.0.1', '{\"question\":\"Do you own your home Update?\",\"question_options\":{\"new_1\":{\"question_option\":\"Yes\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"},\"new_2\":{\"question_option\":\"No\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"},\"new_3\":{\"question_option\":\"Your comment\",\"option_type\":\"2\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_previous_\":\"http:\\/\\/solar.test\\/admin\\/question\"}', '2019-03-07 08:21:07', '2019-03-07 08:21:07'),
(24, 1, 'admin/question', 'GET', '127.0.0.1', '[]', '2019-03-07 08:21:07', '2019-03-07 08:21:07'),
(25, 1, 'admin/question/2', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:21:12', '2019-03-07 08:21:12'),
(26, 1, 'admin/question', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:21:17', '2019-03-07 08:21:17'),
(27, 1, 'admin/question/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:21:18', '2019-03-07 08:21:18'),
(28, 1, 'admin/question', 'POST', '127.0.0.1', '{\"question\":\"What is your contact info?\",\"question_options\":{\"new_1\":{\"question_option\":\"Phone Number\",\"option_type\":\"2\",\"id\":null,\"_remove_\":\"0\"},\"new_2\":{\"question_option\":\"Zip Code?\",\"option_type\":\"2\",\"id\":null,\"_remove_\":\"0\"},\"new_3\":{\"question_option\":\"email?\",\"option_type\":\"2\",\"id\":null,\"_remove_\":\"0\"},\"new_4\":{\"question_option\":\"Not Sure\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_previous_\":\"http:\\/\\/solar.test\\/admin\\/question\"}', '2019-03-07 08:22:31', '2019-03-07 08:22:31'),
(29, 1, 'admin/question', 'GET', '127.0.0.1', '[]', '2019-03-07 08:22:31', '2019-03-07 08:22:31'),
(30, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:22:42', '2019-03-07 08:22:42'),
(31, 1, 'admin/question', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:22:43', '2019-03-07 08:22:43'),
(32, 1, 'admin/question/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 08:51:02', '2019-03-07 08:51:02'),
(33, 1, 'admin/question', 'POST', '127.0.0.1', '{\"question\":\"What is your favorite singer?\",\"question_options\":{\"new_1\":{\"question_option\":\"Sonunigum\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"},\"new_2\":{\"question_option\":\"Azam Khan\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"},\"new_3\":{\"question_option\":\"Kumar sanu\",\"option_type\":\"1\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_previous_\":\"http:\\/\\/solar.test\\/admin\\/question\"}', '2019-03-07 08:52:20', '2019-03-07 08:52:20'),
(34, 1, 'admin/question', 'GET', '127.0.0.1', '[]', '2019-03-07 08:52:22', '2019-03-07 08:52:22'),
(35, 1, 'admin/question/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-07 09:03:54', '2019-03-07 09:03:54'),
(36, 1, 'admin/question', 'POST', '127.0.0.1', '{\"question\":\"what is tour favorite Song?\",\"question_options\":{\"new_1\":{\"question_option\":null,\"option_type\":\"2\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\",\"_previous_\":\"http:\\/\\/solar.test\\/admin\\/question\"}', '2019-03-07 09:04:20', '2019-03-07 09:04:20'),
(37, 1, 'admin/question/create', 'GET', '127.0.0.1', '[]', '2019-03-07 09:04:21', '2019-03-07 09:04:21'),
(38, 1, 'admin/question', 'POST', '127.0.0.1', '{\"question\":\"what is tour favorite Song?\",\"question_options\":{\"new_1\":{\"question_option\":\"Favorite Song\",\"option_type\":\"2\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"t2rikbKGHi5y8qoWRgLjH9VHnxry6pE9hBCFP5Zd\"}', '2019-03-07 09:04:36', '2019-03-07 09:04:36'),
(39, 1, 'admin/question', 'GET', '127.0.0.1', '[]', '2019-03-07 09:04:36', '2019-03-07 09:04:36'),
(40, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-03-08 12:49:15', '2019-03-08 12:49:15'),
(41, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 12:49:26', '2019-03-08 12:49:26'),
(42, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Setting\",\"icon\":\"fa-gear\",\"uri\":\"setting\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"YC8Cn1y6lcWpvzm8xR3GYRehi8gU7q0H9BBpnoqb\"}', '2019-03-08 12:49:52', '2019-03-08 12:49:52'),
(43, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-03-08 12:49:54', '2019-03-08 12:49:54'),
(44, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"YC8Cn1y6lcWpvzm8xR3GYRehi8gU7q0H9BBpnoqb\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9}]\"}', '2019-03-08 12:49:56', '2019-03-08 12:49:56'),
(45, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 12:49:57', '2019-03-08 12:49:57'),
(46, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-03-08 12:50:00', '2019-03-08 12:50:00'),
(47, 1, 'admin/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 12:50:32', '2019-03-08 12:50:32'),
(48, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 12:51:04', '2019-03-08 12:51:04'),
(49, 1, 'admin/setting/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 12:51:33', '2019-03-08 12:51:33'),
(50, 1, 'admin/setting/create', 'GET', '127.0.0.1', '[]', '2019-03-08 13:03:54', '2019-03-08 13:03:54'),
(51, 1, 'admin/setting/create', 'GET', '127.0.0.1', '[]', '2019-03-08 13:06:29', '2019-03-08 13:06:29'),
(52, 1, 'admin/setting/create', 'GET', '127.0.0.1', '[]', '2019-03-08 13:10:49', '2019-03-08 13:10:49'),
(53, 1, 'admin/setting', 'POST', '127.0.0.1', '{\"heading\":null,\"copyright\":null,\"_token\":\"YC8Cn1y6lcWpvzm8xR3GYRehi8gU7q0H9BBpnoqb\"}', '2019-03-08 13:11:17', '2019-03-08 13:11:17'),
(54, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 13:11:19', '2019-03-08 13:11:19'),
(55, 1, 'admin/setting/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 13:12:48', '2019-03-08 13:12:48'),
(56, 1, 'admin/setting/1', 'PUT', '127.0.0.1', '{\"heading\":null,\"copyright\":null,\"_token\":\"YC8Cn1y6lcWpvzm8xR3GYRehi8gU7q0H9BBpnoqb\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 13:13:52', '2019-03-08 13:13:52'),
(57, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 13:14:26', '2019-03-08 13:14:26'),
(58, 1, 'admin/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 13:17:06', '2019-03-08 13:17:06'),
(59, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-03-08 13:32:11', '2019-03-08 13:32:11'),
(60, 1, 'admin/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 13:33:59', '2019-03-08 13:33:59'),
(61, 1, 'admin/setting/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 13:35:13', '2019-03-08 13:35:13'),
(62, 1, 'admin/setting/1', 'PUT', '127.0.0.1', '{\"key\":null,\"logo\":\"_file_del_\",\"_file_del_\":null,\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\"}', '2019-03-08 13:35:25', '2019-03-08 13:35:25'),
(63, 1, 'admin/setting/1', 'PUT', '127.0.0.1', '{\"heading\":null,\"copyright\":null,\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 13:35:28', '2019-03-08 13:35:28'),
(64, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 13:35:29', '2019-03-08 13:35:29'),
(65, 1, 'admin/setting/1', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\"}', '2019-03-08 13:35:42', '2019-03-08 13:35:42'),
(66, 1, 'admin/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 13:35:43', '2019-03-08 13:35:43'),
(67, 1, 'admin/setting/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 13:56:23', '2019-03-08 13:56:23'),
(68, 1, 'admin/setting', 'POST', '127.0.0.1', '{\"heading\":\"<p>THisd fis fHome Pae text format from editor<\\/p>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 13:58:12', '2019-03-08 13:58:12'),
(69, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 13:58:28', '2019-03-08 13:58:28'),
(70, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:01:02', '2019-03-08 14:01:02'),
(71, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1>THisd fis fHome Pae text format from editor<\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:03:02', '2019-03-08 14:03:02'),
(72, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:03:08', '2019-03-08 14:03:08'),
(73, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:07:45', '2019-03-08 14:07:45'),
(74, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:08:03', '2019-03-08 14:08:03'),
(75, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:08:04', '2019-03-08 14:08:04'),
(76, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:08:24', '2019-03-08 14:08:24'),
(77, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:08:30', '2019-03-08 14:08:30'),
(78, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:08:30', '2019-03-08 14:08:30'),
(79, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:10:57', '2019-03-08 14:10:57'),
(80, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h2 style=\\\"background: rgb(238, 238, 238); border: 1px solid rgb(204, 204, 204); padding: 5px 10px;\\\"><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/h2>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:11:15', '2019-03-08 14:11:15'),
(81, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:11:15', '2019-03-08 14:11:15'),
(82, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:11:29', '2019-03-08 14:11:29'),
(83, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<pre>\\r\\n<em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/pre>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:11:54', '2019-03-08 14:11:54'),
(84, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:11:54', '2019-03-08 14:11:54'),
(85, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:12:04', '2019-03-08 14:12:04'),
(86, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:12:42', '2019-03-08 14:12:42'),
(87, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:12:46', '2019-03-08 14:12:46'),
(88, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:16:18', '2019-03-08 14:16:18'),
(89, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h3><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/h3>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:16:47', '2019-03-08 14:16:47'),
(90, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:16:48', '2019-03-08 14:16:48'),
(91, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:16:57', '2019-03-08 14:16:57'),
(92, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<pre>\\r\\n<em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/pre>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:17:03', '2019-03-08 14:17:03'),
(93, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:17:04', '2019-03-08 14:17:04'),
(94, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:17:10', '2019-03-08 14:17:10'),
(95, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h3><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/h3>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:17:19', '2019-03-08 14:17:19'),
(96, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:17:20', '2019-03-08 14:17:20'),
(97, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:17:48', '2019-03-08 14:17:48'),
(98, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:17:59', '2019-03-08 14:17:59'),
(99, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:17:59', '2019-03-08 14:17:59'),
(100, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:18:45', '2019-03-08 14:18:45'),
(101, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<div style=\\\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\\\"><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/div>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:18:58', '2019-03-08 14:18:58'),
(102, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:18:59', '2019-03-08 14:18:59'),
(103, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:19:13', '2019-03-08 14:19:13'),
(104, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<p style=\\\"background: rgb(238, 238, 238); border: 1px solid rgb(204, 204, 204); padding: 5px 10px;\\\"><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/p>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:19:21', '2019-03-08 14:19:21'),
(105, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:19:22', '2019-03-08 14:19:22'),
(106, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:19:29', '2019-03-08 14:19:29'),
(107, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<p><q><span dir=\\\"ltr\\\"><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/span><\\/q><\\/p>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:20:13', '2019-03-08 14:20:13'),
(108, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:20:13', '2019-03-08 14:20:13'),
(109, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:21:02', '2019-03-08 14:21:02'),
(110, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1><q><span dir=\\\"ltr\\\"><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/span><\\/q><\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:21:16', '2019-03-08 14:21:16'),
(111, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:21:18', '2019-03-08 14:21:18'),
(112, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:21:22', '2019-03-08 14:21:22'),
(113, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1><q><span dir=\\\"ltr\\\"><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/span><\\/q><\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:21:30', '2019-03-08 14:21:30'),
(114, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:21:30', '2019-03-08 14:21:30'),
(115, 1, 'admin/setting/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:25:04', '2019-03-08 14:25:04'),
(116, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"key\":null,\"background\":\"_file_del_\",\"_file_del_\":null,\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\"}', '2019-03-08 14:25:27', '2019-03-08 14:25:27'),
(117, 1, 'admin/setting/2', 'PUT', '127.0.0.1', '{\"heading\":\"<h1><q><span dir=\\\"ltr\\\"><em><span class=\\\"marker\\\">THisd fis fHome Pae text format from editor<\\/span><\\/em><\\/span><\\/q><\\/h1>\",\"copyright\":\"Copyright 2018 Develop by platanic IT\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:25:30', '2019-03-08 14:25:30'),
(118, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:25:31', '2019-03-08 14:25:31'),
(119, 1, 'admin/setting/2', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\"}', '2019-03-08 14:25:41', '2019-03-08 14:25:41'),
(120, 1, 'admin/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:25:42', '2019-03-08 14:25:42'),
(121, 1, 'admin/setting/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:25:52', '2019-03-08 14:25:52'),
(122, 1, 'admin/setting', 'POST', '127.0.0.1', '{\"heading\":null,\"copyright\":null,\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/setting\"}', '2019-03-08 14:25:58', '2019-03-08 14:25:58'),
(123, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:25:59', '2019-03-08 14:25:59'),
(124, 1, 'admin/setting/3', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"rL9ERoxG2x9nWc5JMjjEi3ZRPX5R66xWq8Xu2Lck\"}', '2019-03-08 14:27:52', '2019-03-08 14:27:52'),
(125, 1, 'admin/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 14:27:55', '2019-03-08 14:27:55'),
(126, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:31:59', '2019-03-08 14:31:59'),
(127, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:32:26', '2019-03-08 14:32:26'),
(128, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:32:40', '2019-03-08 14:32:40'),
(129, 1, 'admin/setting', 'GET', '127.0.0.1', '[]', '2019-03-08 14:32:49', '2019-03-08 14:32:49'),
(130, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-03-08 15:17:17', '2019-03-08 15:17:17'),
(131, 1, 'admin/question', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 15:17:31', '2019-03-08 15:17:31'),
(132, 1, 'admin/question/3', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"F09zA60pk7dXz6Vs6lo8zxtDqcA4YacwSomw87A9\"}', '2019-03-08 15:18:51', '2019-03-08 15:18:51'),
(133, 1, 'admin/question', 'GET', '127.0.0.1', '[]', '2019-03-08 15:18:58', '2019-03-08 15:18:58'),
(134, 1, 'admin/question', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-03-08 15:19:01', '2019-03-08 15:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2019-03-07 08:17:39', '2019-03-07 08:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(1, 8, NULL, NULL),
(1, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$OigdiloT3sNgXXWhon536ujgVKht7IE.kABjVWYrRtFUeYqJbj29y', 'Administrator', NULL, NULL, '2019-03-07 08:17:38', '2019-03-07 08:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_04_173148_create_admin_tables', 1),
(4, '2019_03_05_132114_create_questions_table', 1),
(5, '2019_03_05_132427_create_question_options_table', 1),
(6, '2019_03_08_184139_create_settings_table', 2),
(7, '2019_03_09_132417_create_surveys_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `created_at`, `updated_at`) VALUES
(1, 'Do you own your home?', '2019-03-07 08:20:19', '2019-03-07 08:20:19'),
(2, 'Do you own your home Update?', '2019-03-07 08:21:07', '2019-03-07 08:21:07'),
(4, 'What is your favorite singer?', '2019-03-07 08:52:20', '2019-03-07 08:52:20'),
(5, 'what is tour favorite Song?', '2019-03-07 09:04:36', '2019-03-07 09:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=>radio,2=>text,3=>checkbox',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `question_option`, `option_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yes', '1', '2019-03-07 08:20:19', '2019-03-07 08:20:19'),
(2, 1, 'No', '1', '2019-03-07 08:20:19', '2019-03-07 08:20:19'),
(3, 2, 'Yes', '1', '2019-03-07 08:21:07', '2019-03-07 08:21:07'),
(4, 2, 'No', '1', '2019-03-07 08:21:07', '2019-03-07 08:21:07'),
(5, 2, 'Your comment', '2', '2019-03-07 08:21:07', '2019-03-07 08:21:07'),
(10, 4, 'Sonunigum', '1', '2019-03-07 08:52:20', '2019-03-07 08:52:20'),
(11, 4, 'Azam Khan', '1', '2019-03-07 08:52:20', '2019-03-07 08:52:20'),
(12, 4, 'Kumar sanu', '1', '2019-03-07 08:52:20', '2019-03-07 08:52:20'),
(13, 5, 'Favorite Song', '2', '2019-03-07 09:04:36', '2019-03-07 09:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zipcode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `survey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `zipcode`, `survey`, `created_at`, `updated_at`) VALUES
(1, '12345', '{\"what is tour favorite Song?\":{\"Favorite Song\":\"Dana Kata Pori\"},\"What is your favorite singer?\":{\"Sonunigum\":\"on\"},\"Do you own your home Update?\":{\"Yes\":\"on\",\"Your comment\":\"Testing\"},\"Do you own your home?\":{\"Yes\":\"on\"}}', '2019-03-09 08:16:47', '2019-03-09 08:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`);

--
-- Indexes for table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_options_question_id_foreign` (`question_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
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
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
