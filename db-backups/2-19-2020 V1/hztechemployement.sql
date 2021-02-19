-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Feb 19, 2021 at 11:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hztechemployement`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `app_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `title`, `description`, `app_date`, `created_at`, `updated_at`) VALUES
(1, 16, 'sdsds', '<p>asa</p>', '2021-02-09 08:56:57', '2021-02-09 08:56:57', '2021-02-09 08:56:57'),
(4, 18, 'Consectetur est id', '<p><a href=\"http://Perferendis aut odio.\" target=\"_blank\">Link</a><br></p>', '2021-02-09 13:55:27', '2021-02-09 13:55:27', '2021-02-09 13:55:27'),
(5, 20, 'Commercial Gallery', 'sakvdbhadvajdhabdsds\r\ndsadlksdnsdassd\r\nasdmlasndslasadk\r\n\r\n\r\nd\r\nsdslkdsdsldsdns\r\ndmsldnadsnsnds\r\n\r\n;dsldmsjbdsjdbsdsbdskd\r\ndlsbdshdbsdbsjs', '2021-02-10 11:31:19', '2021-02-10 11:31:19', '2021-02-10 11:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `application_user`
--

CREATE TABLE `application_user` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `title`, `description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Ad aut ratione minim', 'My complaiin...', 'Pending', 16, '2021-02-09 08:27:38', '2021-02-10 12:42:06'),
(6, 'abusive language', 'Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo Eos vel nihil nemo .', 'Pending', 20, '2021-02-10 11:47:08', '2021-02-10 12:46:00'),
(7, 'Aliqua Consequatur', 'Aperiam adipisicing Aperiam adipisicing Aperiam adipisicing Aperiam adipisicing', 'Pending', 16, '2021-02-10 11:54:33', '2021-02-10 11:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `complain_user`
--

CREATE TABLE `complain_user` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `title`, `date`, `created_at`, `updated_at`) VALUES
(8, 'Kashmir Day', '2021-02-05', '2021-01-19 11:36:23', '2021-01-19 11:36:23'),
(10, 'Eid day', '2021-05-21', '2021-01-29 12:07:41', '2021-02-11 08:47:12'),
(11, 'public holiday', '2021-02-25', '2021-02-09 11:37:53', '2021-02-09 11:37:53'),
(12, 'asdsdsad', '2021-05-02', '2021-02-09 15:40:28', '2021-02-10 15:58:35'),
(13, 'xzcvxnbzvbxczvcx', '2021-02-19', '2021-02-10 09:17:02', '2021-02-10 09:17:02'),
(14, 'tuytutututy', '2021-02-11', '2021-02-10 09:41:02', '2021-02-10 15:37:57'),
(15, 'test day', '2021-03-13', '2021-02-10 09:48:50', '2021-02-10 15:59:34'),
(16, 'asasaasasas', '2021-03-24', '2021-02-10 09:53:16', '2021-02-10 09:53:16'),
(17, 'weewrerer', '2021-02-27', '2021-02-10 11:06:13', '2021-02-10 11:06:13'),
(18, 'hjhkhjk', '2121-11-11', '2021-02-11 13:27:03', '2021-02-11 13:27:03');

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
(3, '2021_01_25_092920_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0cea33cb-e3bd-42c9-a9d8-3985dc5bf46d', 'App\\Notifications\\NewUserNotification', 'App\\User', 19, '{\"CreatedUser\":[],\"user_noti\":{\"id\":19,\"first_name\":null,\"last_name\":null,\"fullname\":\"Ciara Garrison\",\"email\":\"xexiv@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":12,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 14:25:52\",\"updated_at\":\"2021-02-17 08:55:33\"}}', '2021-02-19 04:09:15', '2021-02-18 08:59:19', '2021-02-18 08:59:19'),
('1e802925-ef63-4b8b-b810-2525bbbf2d4c', 'App\\Notifications\\NewUserNotification', 'App\\User', 25, '{\"CreatedUser\":[],\"user_noti\":{\"id\":25,\"first_name\":null,\"last_name\":null,\"fullname\":\"Sheila Mckinney\",\"email\":\"vetyk@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-18 14:40:45\",\"updated_at\":\"2021-01-18 14:40:45\"}}', '2021-02-18 14:03:43', '2021-02-18 08:05:10', '2021-02-18 08:05:10'),
('27c3f81e-acf4-4396-b9cc-ec710c1d1c45', 'App\\Notifications\\NewUserNotification', 'App\\User', 21, '{\"CreatedUser\":[],\"user_noti\":{\"id\":21,\"first_name\":null,\"last_name\":null,\"fullname\":\"Echo Erickson\",\"email\":\"wecusar@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":14,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-06 09:43:22\",\"updated_at\":\"2021-01-21 15:04:58\"}}', NULL, '2021-02-18 05:02:57', '2021-02-18 05:02:57'),
('49648226-1a96-4f8a-886d-5b7fb8efcd17', 'App\\Notifications\\NewUserNotification', 'App\\User', 41, '{\"CreatedUser\":[],\"user_noti\":{\"id\":41,\"first_name\":null,\"last_name\":null,\"fullname\":\"Zephania Sanchez\",\"email\":\"cygyvocyt@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-02-18 13:05:09\",\"updated_at\":\"2021-02-18 13:05:09\"}}', '2021-02-18 10:46:18', '2021-02-18 08:59:19', '2021-02-18 08:59:19'),
('5a2f7bf4-f4c7-4663-8e93-ab022e014c9b', 'App\\Notifications\\NewUserNotification', 'App\\User', 19, '{\"CreatedUser\":[],\"user_noti\":{\"id\":19,\"first_name\":null,\"last_name\":null,\"fullname\":\"Ciara Garrison\",\"email\":\"xexiv@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":12,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 14:25:52\",\"updated_at\":\"2021-02-17 08:55:33\"}}', '2021-02-19 04:09:15', '2021-02-18 05:02:57', '2021-02-18 05:02:57'),
('6240e031-61c6-4645-a9b5-407bbfff3b5e', 'App\\Notifications\\NewUserNotification', 'App\\User', 41, '{\"CreatedUser\":[],\"user_noti\":{\"id\":41,\"first_name\":null,\"last_name\":null,\"fullname\":\"Zephania Sanchez\",\"email\":\"cygyvocyt@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-02-18 13:05:09\",\"updated_at\":\"2021-02-18 13:05:09\"}}', NULL, '2021-02-19 04:11:03', '2021-02-19 04:11:03'),
('6a52b361-a0bb-48e7-9de4-cc7461fafe08', 'App\\Notifications\\NewUserNotification', 'App\\User', 16, '{\"CreatedUser\":[],\"user_noti\":{\"id\":16,\"first_name\":\"Muhammad\",\"last_name\":\"Irfan\",\"fullname\":\"Muhammad Irfan\",\"email\":\"admin@gmail.com\",\"designation\":\"Software Engineer\",\"address\":\"Voluptas voluptate q\",\"phone_number\":\"+1 (194) 385-3698\",\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":\"upload\\/user\\/16\\/92dr6QZ7ghdwvgxD5Q2GXKsBCHOOfK56sazQit5R.jpg\",\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 13:16:16\",\"updated_at\":\"2021-01-22 11:39:38\"}}', '2021-02-18 10:46:51', '2021-02-18 08:05:10', '2021-02-18 08:05:10'),
('6c7b61d6-5a9a-4989-a29e-538a0f33c48b', 'App\\Notifications\\NewUserNotification', 'App\\User', 21, '{\"CreatedUser\":[],\"user_noti\":{\"id\":21,\"first_name\":null,\"last_name\":null,\"fullname\":\"Echo Erickson\",\"email\":\"wecusar@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":14,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-06 09:43:22\",\"updated_at\":\"2021-01-21 15:04:58\"}}', NULL, '2021-02-19 04:11:03', '2021-02-19 04:11:03'),
('6e060dc4-e840-4499-ae12-b1c0480c41e0', 'App\\Notifications\\NewUserNotification', 'App\\User', 41, '{\"CreatedUser\":[],\"user_noti\":{\"id\":41,\"first_name\":null,\"last_name\":null,\"fullname\":\"Zephania Sanchez\",\"email\":\"cygyvocyt@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-02-18 13:05:09\",\"updated_at\":\"2021-02-18 13:05:09\"}}', NULL, '2021-02-19 04:13:37', '2021-02-19 04:13:37'),
('81a6f749-c2d6-4611-93e5-6f0fa9b60b0b', 'App\\Notifications\\NewUserNotification', 'App\\User', 41, '{\"CreatedUser\":[],\"user_noti\":{\"id\":41,\"first_name\":null,\"last_name\":null,\"fullname\":\"Zephania Sanchez\",\"email\":\"cygyvocyt@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-02-18 13:05:09\",\"updated_at\":\"2021-02-18 13:05:09\"}}', '2021-02-18 10:46:18', '2021-02-18 08:05:10', '2021-02-18 08:05:10'),
('82d96183-f081-4394-9c45-fd30a3eef71c', 'App\\Notifications\\NewUserNotification', 'App\\User', 25, '{\"CreatedUser\":[],\"user_noti\":{\"id\":25,\"first_name\":null,\"last_name\":null,\"fullname\":\"Sheila Mckinney\",\"email\":\"vetyk@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-18 14:40:45\",\"updated_at\":\"2021-01-18 14:40:45\"}}', NULL, '2021-02-19 04:13:37', '2021-02-19 04:13:37'),
('8a9a27aa-7365-493f-a91a-ac5ae3d46f45', 'App\\Notifications\\NewUserNotification', 'App\\User', 25, '{\"CreatedUser\":[],\"user_noti\":{\"id\":25,\"first_name\":null,\"last_name\":null,\"fullname\":\"Sheila Mckinney\",\"email\":\"vetyk@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-18 14:40:45\",\"updated_at\":\"2021-01-18 14:40:45\"}}', NULL, '2021-02-18 05:02:57', '2021-02-18 05:02:57'),
('9153eb7e-b107-467c-9a1c-890307b1c3ac', 'App\\Notifications\\NewUserNotification', 'App\\User', 16, '{\"CreatedUser\":[],\"user_noti\":{\"id\":16,\"first_name\":\"Muhammad\",\"last_name\":\"Irfan\",\"fullname\":\"Muhammad Irfan\",\"email\":\"admin@gmail.com\",\"designation\":\"Software Engineer\",\"address\":\"Voluptas voluptate q\",\"phone_number\":\"+1 (194) 385-3698\",\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":\"upload\\/user\\/16\\/92dr6QZ7ghdwvgxD5Q2GXKsBCHOOfK56sazQit5R.jpg\",\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 13:16:16\",\"updated_at\":\"2021-01-22 11:39:38\"}}', '2021-02-18 10:46:51', '2021-02-18 05:02:57', '2021-02-18 05:02:57'),
('934f5bbb-7877-4cec-8a72-80454d4ad5dc', 'App\\Notifications\\NewUserNotification', 'App\\User', 21, '{\"CreatedUser\":[],\"user_noti\":{\"id\":21,\"first_name\":null,\"last_name\":null,\"fullname\":\"Echo Erickson\",\"email\":\"wecusar@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":14,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-06 09:43:22\",\"updated_at\":\"2021-01-21 15:04:58\"}}', NULL, '2021-02-18 08:05:10', '2021-02-18 08:05:10'),
('a46018df-8b1e-4eec-aa0d-cc4e3b457136', 'App\\Notifications\\NewUserNotification', 'App\\User', 21, '{\"CreatedUser\":[],\"user_noti\":{\"id\":21,\"first_name\":null,\"last_name\":null,\"fullname\":\"Echo Erickson\",\"email\":\"wecusar@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":14,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-06 09:43:22\",\"updated_at\":\"2021-01-21 15:04:58\"}}', NULL, '2021-02-19 04:13:37', '2021-02-19 04:13:37'),
('aeed12e9-1dfe-4849-a274-a829b4772043', 'App\\Notifications\\NewUserNotification', 'App\\User', 16, '{\"CreatedUser\":[],\"user_noti\":{\"id\":16,\"first_name\":\"Muhammad\",\"last_name\":\"Irfan\",\"fullname\":\"Muhammad Irfan\",\"email\":\"admin@gmail.com\",\"designation\":\"Software Engineer\",\"address\":\"Voluptas voluptate q\",\"phone_number\":\"+1 (194) 385-3698\",\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":\"upload\\/user\\/16\\/92dr6QZ7ghdwvgxD5Q2GXKsBCHOOfK56sazQit5R.jpg\",\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 13:16:16\",\"updated_at\":\"2021-01-22 11:39:38\"}}', '2021-02-19 09:15:18', '2021-02-19 04:11:02', '2021-02-19 04:11:02'),
('b682cb26-1e4d-446b-a64c-ee1ab257aed4', 'App\\Notifications\\NewUserNotification', 'App\\User', 25, '{\"CreatedUser\":[],\"user_noti\":{\"id\":25,\"first_name\":null,\"last_name\":null,\"fullname\":\"Sheila Mckinney\",\"email\":\"vetyk@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-18 14:40:45\",\"updated_at\":\"2021-01-18 14:40:45\"}}', NULL, '2021-02-18 08:59:19', '2021-02-18 08:59:19'),
('bed4fd02-88d9-43b4-a077-997ad4f845f1', 'App\\Notifications\\NewUserNotification', 'App\\User', 21, '{\"CreatedUser\":[],\"user_noti\":{\"id\":21,\"first_name\":null,\"last_name\":null,\"fullname\":\"Echo Erickson\",\"email\":\"wecusar@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":14,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-06 09:43:22\",\"updated_at\":\"2021-01-21 15:04:58\"}}', NULL, '2021-02-18 08:59:19', '2021-02-18 08:59:19'),
('c3a7695a-ea2f-4a43-a7b8-ef49de7657e2', 'App\\Notifications\\NewUserNotification', 'App\\User', 16, '{\"CreatedUser\":[],\"user_noti\":{\"id\":16,\"first_name\":\"Muhammad\",\"last_name\":\"Irfan\",\"fullname\":\"Muhammad Irfan\",\"email\":\"admin@gmail.com\",\"designation\":\"Software Engineer\",\"address\":\"Voluptas voluptate q\",\"phone_number\":\"+1 (194) 385-3698\",\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":\"upload\\/user\\/16\\/92dr6QZ7ghdwvgxD5Q2GXKsBCHOOfK56sazQit5R.jpg\",\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 13:16:16\",\"updated_at\":\"2021-01-22 11:39:38\"}}', NULL, '2021-02-19 04:13:37', '2021-02-19 04:13:37'),
('d443a129-d10b-4f3d-87e1-c134cf0975c9', 'App\\Notifications\\NewUserNotification', 'App\\User', 19, '{\"CreatedUser\":[],\"user_noti\":{\"id\":19,\"first_name\":null,\"last_name\":null,\"fullname\":\"Ciara Garrison\",\"email\":\"xexiv@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":12,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 14:25:52\",\"updated_at\":\"2021-02-17 08:55:33\"}}', '2021-02-19 04:09:15', '2021-02-18 08:05:10', '2021-02-18 08:05:10'),
('d581b8fb-77c6-4b95-8eb2-3cd5d2e0826d', 'App\\Notifications\\NewUserNotification', 'App\\User', 25, '{\"CreatedUser\":[],\"user_noti\":{\"id\":25,\"first_name\":null,\"last_name\":null,\"fullname\":\"Sheila Mckinney\",\"email\":\"vetyk@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-18 14:40:45\",\"updated_at\":\"2021-01-18 14:40:45\"}}', NULL, '2021-02-19 04:11:03', '2021-02-19 04:11:03'),
('d8ebd3b1-f848-4b2d-bb47-d9dbfd0743cc', 'App\\Notifications\\NewUserNotification', 'App\\User', 19, '{\"CreatedUser\":[],\"user_noti\":{\"id\":19,\"first_name\":null,\"last_name\":null,\"fullname\":\"Ciara Garrison\",\"email\":\"xexiv@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":12,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 14:25:52\",\"updated_at\":\"2021-02-17 08:55:33\"}}', NULL, '2021-02-19 04:13:37', '2021-02-19 04:13:37'),
('e4bc71ef-0d63-4c8d-ada9-3757718ba71b', 'App\\Notifications\\NewUserNotification', 'App\\User', 16, '{\"CreatedUser\":[],\"user_noti\":{\"id\":16,\"first_name\":\"Muhammad\",\"last_name\":\"Irfan\",\"fullname\":\"Muhammad Irfan\",\"email\":\"admin@gmail.com\",\"designation\":\"Software Engineer\",\"address\":\"Voluptas voluptate q\",\"phone_number\":\"+1 (194) 385-3698\",\"role_id\":13,\"employee_id\":null,\"status\":\"Active\",\"profile_pic\":\"upload\\/user\\/16\\/92dr6QZ7ghdwvgxD5Q2GXKsBCHOOfK56sazQit5R.jpg\",\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 13:16:16\",\"updated_at\":\"2021-01-22 11:39:38\"}}', NULL, '2021-02-18 08:59:19', '2021-02-18 08:59:19'),
('f8cf03dd-9ff2-471a-a465-afb9fc7def00', 'App\\Notifications\\NewUserNotification', 'App\\User', 19, '{\"CreatedUser\":[],\"user_noti\":{\"id\":19,\"first_name\":null,\"last_name\":null,\"fullname\":\"Ciara Garrison\",\"email\":\"xexiv@mailinator.com\",\"designation\":null,\"address\":null,\"phone_number\":null,\"role_id\":12,\"employee_id\":0,\"status\":\"Active\",\"profile_pic\":null,\"email_verified_at\":null,\"string_password\":\"Pa$$w0rd!\",\"created_at\":\"2021-01-01 14:25:52\",\"updated_at\":\"2021-02-17 08:55:33\"}}', NULL, '2021-02-19 04:11:03', '2021-02-19 04:11:03');

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
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `guard_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `title`, `guard_name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'add user', 'add', 'user', 1, '2021-01-20 12:22:05', '2021-01-20 12:22:05'),
(2, 'edit user', 'Edit', 'user', 1, '2021-01-20 12:22:06', '2021-01-20 12:22:06'),
(3, 'delete user', 'delete', 'user', 1, '2021-01-20 12:23:03', '2021-01-20 12:23:03'),
(4, 'view user', 'view', 'user', 1, '2021-01-20 16:19:50', '2021-01-20 16:19:50'),
(5, 'add holiday', 'add', 'holiday', 1, '2021-01-21 18:27:36', '2021-01-21 18:27:36'),
(6, 'edit holiday', 'Edit', 'holiday', 1, '2021-01-21 18:24:36', '2021-01-21 20:24:36'),
(7, 'delete holiday', 'delete', 'holiday', 1, '2021-01-21 18:24:45', '2021-01-21 18:24:45'),
(8, 'view holiday', 'view', 'holiday', 1, '2021-01-21 18:25:45', '2021-01-21 18:25:45'),
(9, 'edit profile', 'Edit', 'profile', 1, '2021-01-21 20:10:26', '2021-01-21 20:10:26'),
(10, 'mark attendance', 'attendance', 'logs', 1, '2021-01-22 14:24:59', '2021-01-22 14:24:59'),
(11, 'day logs', 'day-logs', 'logs', 1, '2021-01-22 14:34:03', '2021-01-22 14:34:03'),
(12, 'month logs', 'month-logs', 'logs', 1, '2021-01-22 14:39:03', '2021-01-22 14:39:03'),
(13, 'manual time', 'manual-time', 'logs', 1, '2021-01-22 14:41:47', '2021-01-22 14:41:47'),
(14, 'add role', 'add', 'role', 1, '2021-01-22 14:48:23', '2021-01-22 14:48:23'),
(15, 'edit role', 'Edit', 'role', 1, '2021-01-22 14:48:25', '2021-01-22 14:48:25'),
(16, 'delete role', 'delete', 'role', 1, '2021-01-22 14:49:25', '2021-01-22 14:49:25'),
(17, 'view role', 'view', 'role', 1, '2021-01-22 14:49:26', '2021-01-22 14:49:26'),
(18, 'add suggestion', 'add', 'suggestion', 1, '2021-01-22 15:43:57', '2021-01-22 15:43:57'),
(19, 'edit suggestion', 'Edit', 'suggestion', 1, '2021-01-22 15:43:57', '2021-01-22 15:43:57'),
(20, 'delete suggestion', 'delete', 'suggestion', 1, '2021-01-22 15:44:50', '2021-01-22 15:44:50'),
(21, 'view suggestion', 'view', 'suggestion', 1, '2021-01-22 15:44:50', '2021-01-22 15:44:50'),
(22, 'add complain', 'add', 'complain', 1, '2021-01-22 15:45:55', '2021-01-22 15:45:55'),
(23, 'edit complain', 'Edit', 'complain', 1, '2021-01-22 15:45:55', '2021-01-22 15:45:55'),
(24, 'delete complain', 'delete', 'complain', 1, '2021-01-22 15:47:04', '2021-01-22 15:47:04'),
(25, 'view complain', 'view', 'complain', 1, '2021-01-22 15:47:04', '2021-01-22 15:47:04'),
(26, 'add permission', 'add', 'permission', 1, '2021-01-22 15:48:18', '2021-01-22 15:48:18'),
(27, 'edit permission', 'Edit', 'permission', 1, '2021-01-22 15:48:18', '2021-01-22 15:48:18'),
(28, 'delete permission', 'delete', 'permission', 1, '2021-01-22 15:49:01', '2021-01-22 15:49:01'),
(29, 'view permission', 'view ', 'permission', 1, '2021-01-22 15:49:01', '2021-01-22 15:49:01'),
(34, 'view all suggestion', 'view all', 'suggestion', 1, '2021-02-09 16:23:36', '2021-02-09 16:23:36'),
(35, 'view all complain', 'view all', 'complain', 1, '2021-02-09 16:30:40', '2021-02-09 16:30:40'),
(36, 'add application', 'add', 'application', 1, '2021-02-09 16:47:04', '2021-02-09 16:47:04'),
(37, 'view application', 'view', 'application', 1, '2021-02-09 16:47:04', '2021-02-09 16:47:04'),
(38, 'delete application', 'delete', 'application', 1, '2021-02-09 16:48:22', '2021-02-09 16:48:22'),
(39, 'view all application', 'view all', 'application', 1, '2021-02-09 16:48:22', '2021-02-09 16:48:22'),
(40, 'edit all complain', 'Edit all', 'complain', 1, '2021-02-10 17:26:00', '2021-02-10 17:26:00'),
(41, 'delete all complain', 'delete all', 'complain', 1, '2021-02-10 17:26:00', '2021-02-10 17:26:00'),
(42, 'edit all suggestion', 'Edit all', 'suggestion', 1, '2021-02-10 17:52:14', '2021-02-10 17:52:14'),
(43, 'delete all suggestion', 'delete all', 'suggestion', 1, '2021-02-10 17:52:14', '2021-02-10 17:52:14'),
(44, 'view profile', 'view', 'profile', 1, '2021-02-11 12:34:51', '2021-02-11 12:34:51'),
(45, 'delete application', 'delete all', 'application', 1, '2021-02-16 17:37:06', '2021-02-16 17:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_user`
--

CREATE TABLE `privilege_user` (
  `id` int(11) NOT NULL,
  `privillige_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege_user`
--

INSERT INTO `privilege_user` (`id`, `privillige_id`, `role_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 14, 16, 1, '2021-01-20 10:13:54', '2021-01-20 13:51:20'),
(8, 3, 12, 16, 1, '2021-01-20 11:30:47', '2021-01-20 11:30:47'),
(12, 1, 14, 16, 1, '2021-01-20 12:02:42', '2021-01-20 12:02:42'),
(14, 1, 12, 16, 1, '2021-01-21 07:50:53', '2021-01-21 07:50:53'),
(15, 2, 12, 16, 1, '2021-01-21 07:51:00', '2021-01-21 07:51:00'),
(16, 4, 12, 16, 1, '2021-01-21 07:51:06', '2021-01-21 07:51:06'),
(40, 8, 12, 16, 1, '2021-01-21 14:28:43', '2021-01-21 14:28:43'),
(43, 4, 13, 16, 1, '2021-01-21 14:34:58', '2021-01-21 14:34:58'),
(47, 8, 13, 16, 1, '2021-01-21 15:03:13', '2021-01-21 15:03:13'),
(51, 10, 13, 16, 1, '2021-01-22 09:41:23', '2021-01-22 09:41:23'),
(52, 13, 13, 16, 1, '2021-01-22 09:44:59', '2021-01-22 09:44:59'),
(53, 17, 13, 16, 1, '2021-01-22 09:57:42', '2021-01-22 09:57:42'),
(54, 14, 12, 16, 1, '2021-01-22 09:57:58', '2021-01-22 09:57:58'),
(56, 22, 13, 16, 1, '2021-01-22 11:00:09', '2021-01-22 11:00:09'),
(57, 9, 13, 16, 1, '2021-01-22 11:39:10', '2021-01-22 11:39:10'),
(60, 26, 13, 16, 1, '2021-01-22 12:50:54', '2021-01-22 12:50:54'),
(63, 29, 13, 16, 1, '2021-01-22 12:51:18', '2021-01-22 12:51:18'),
(64, 21, 13, 16, 1, '2021-01-22 12:51:57', '2021-01-22 12:51:57'),
(65, 1, 13, 16, 1, '2021-01-25 09:53:38', '2021-01-25 09:53:38'),
(66, 5, 13, 16, 1, '2021-01-29 11:49:47', '2021-01-29 11:49:47'),
(67, 14, 13, 16, 1, '2021-02-01 11:18:09', '2021-02-01 11:18:09'),
(69, 15, 13, 16, 1, '2021-02-09 09:48:45', '2021-02-09 09:48:45'),
(70, 18, 13, 16, 1, '2021-02-09 11:19:53', '2021-02-09 11:19:53'),
(71, 34, 13, 16, 1, '2021-02-09 11:27:01', '2021-02-09 11:27:01'),
(73, 36, 13, 16, 1, '2021-02-09 11:51:50', '2021-02-09 11:51:50'),
(74, 39, 12, 16, 1, '2021-02-09 11:52:02', '2021-02-09 11:52:02'),
(75, 37, 13, 16, 1, '2021-02-09 11:52:38', '2021-02-09 11:52:38'),
(76, 39, 13, 16, 1, '2021-02-09 11:53:08', '2021-02-09 11:53:08'),
(77, 28, 13, 16, 1, '2021-02-10 12:12:08', '2021-02-10 12:12:08'),
(78, 25, 13, 16, 1, '2021-02-10 12:18:18', '2021-02-10 12:18:18'),
(80, 24, 13, 16, 1, '2021-02-10 12:24:27', '2021-02-10 12:24:27'),
(81, 40, 13, 16, 1, '2021-02-10 12:29:31', '2021-02-10 12:29:31'),
(82, 35, 13, 16, 1, '2021-02-10 12:29:56', '2021-02-10 12:29:56'),
(83, 41, 13, 16, 1, '2021-02-10 12:47:32', '2021-02-10 12:47:32'),
(86, 42, 13, 16, 1, '2021-02-10 13:12:37', '2021-02-10 13:12:37'),
(87, 43, 13, 16, 1, '2021-02-10 13:41:10', '2021-02-10 13:41:10'),
(88, 27, 13, 16, 1, '2021-02-10 14:36:47', '2021-02-10 14:36:47'),
(89, 38, 13, 16, 1, '2021-02-10 14:49:10', '2021-02-10 14:49:10'),
(90, 6, 13, 16, 1, '2021-02-10 15:30:16', '2021-02-10 15:30:16'),
(92, 4, 13, 19, 1, '2021-02-11 07:40:11', '2021-02-17 08:20:04'),
(93, 9, 14, 16, 1, '2021-02-11 07:40:44', '2021-02-11 07:40:44'),
(94, 26, 14, 16, 1, '2021-02-11 07:46:26', '2021-02-11 07:46:26'),
(95, 29, 14, 16, 1, '2021-02-11 07:46:34', '2021-02-11 07:46:34'),
(96, 7, 13, 16, 1, '2021-02-11 13:29:38', '2021-02-11 13:29:38'),
(99, 1, 13, 16, 1, '2021-02-15 12:05:42', '2021-02-15 12:05:42'),
(101, 1, 13, 16, 1, '2021-02-16 12:13:40', '2021-02-16 12:13:40'),
(104, 36, 13, 16, 1, '2021-02-16 12:35:03', '2021-02-16 12:35:03'),
(106, 39, 13, 16, 1, '2021-02-16 12:35:19', '2021-02-16 12:35:19'),
(107, 4, 13, 16, 1, '2021-02-16 12:59:33', '2021-02-16 12:59:33'),
(108, 37, 13, 16, 1, '2021-02-16 13:22:35', '2021-02-16 13:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_user`
--

CREATE TABLE `request_user` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(12, 'lead', 'Lead', 'Block', '2021-01-01 13:25:46', '2021-02-10 11:23:35'),
(13, 'head', 'Head role', 'Block', '2021-01-01 13:29:50', '2021-02-10 15:13:12'),
(14, 'hr', 'hr role', 'Active', '2021-01-01 13:30:33', '2021-02-10 15:12:13'),
(17, 'admin', 'admin', 'Active', '2021-01-18 14:51:13', '2021-02-10 11:21:27'),
(20, 'employee', 'employee new', 'Active', '2021-02-10 11:19:27', '2021-02-11 13:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `title`, `description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'Shelly\'s suggestion', 'Dolores quia dolor v', 'Approved', 16, '2021-01-04 08:40:19', '2021-02-10 12:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_user`
--

CREATE TABLE `suggestion_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `suggestion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `timelogs`
--

CREATE TABLE `timelogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_type` int(11) DEFAULT NULL,
  `time_in` text NOT NULL,
  `time_out` text NOT NULL,
  `time_difference` text DEFAULT NULL,
  `attendance` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timelogs`
--

INSERT INTO `timelogs` (`id`, `user_id`, `entry_type`, `time_in`, `time_out`, `time_difference`, `attendance`, `created_at`, `updated_at`) VALUES
(32, 16, NULL, '13:55:33', '13:57:00', '', 1, '2021-01-07 13:55:33', '2021-01-07 13:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `entry_type` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`id`, `user_id`, `time`, `entry_type`, `created_at`, `updated_at`) VALUES
(48, 16, '2021-02-07 19:50:36', 1, '2021-01-07 19:50:36', '2021-01-07 19:50:36'),
(49, 16, '2021-02-07 19:50:42', 2, '2021-01-07 19:50:42', '2021-01-07 19:50:42'),
(50, 16, '2021-01-07 20:26:36', 1, '2021-01-07 20:26:36', '2021-01-07 20:26:36'),
(51, 16, '2021-01-07 20:26:41', 2, '2021-01-07 20:26:41', '2021-01-07 20:26:41'),
(52, 16, '2021-01-07 20:57:31', 1, '2021-01-07 20:57:31', '2021-01-07 20:57:31'),
(53, 16, '2021-01-07 21:01:02', 2, '2021-01-07 21:01:02', '2021-01-07 21:01:02'),
(54, 16, '2021-01-07 21:07:35', 1, '2021-01-07 21:07:35', '2021-01-07 21:07:35'),
(55, 16, '2021-01-07 21:07:41', 2, '2021-01-07 21:07:41', '2021-01-07 21:07:41'),
(56, 16, '2021-01-08 12:38:26', 1, '2021-01-08 12:38:26', '2021-01-08 12:38:26'),
(57, 16, '2021-01-08 12:38:56', 2, '2021-01-08 12:38:56', '2021-01-08 12:38:56'),
(58, 16, '2021-01-08 14:05:17', 1, '2021-01-08 14:05:17', '2021-01-08 14:05:17'),
(59, 16, '2021-01-08 14:06:18', 2, '2021-01-08 14:06:18', '2021-01-08 14:06:18'),
(60, 16, '2021-01-08 15:33:50', 1, '2021-01-08 15:33:50', '2021-01-08 15:33:50'),
(61, 16, '2021-01-08 15:34:33', 2, '2021-01-08 15:34:33', '2021-01-08 15:34:33'),
(62, 16, '2021-01-08 19:46:10', 1, '2021-01-08 19:46:10', '2021-01-08 19:46:10'),
(63, 16, '2021-01-08 19:46:20', 2, '2021-01-08 19:46:20', '2021-01-08 19:46:20'),
(64, 16, '2021-01-11 12:12:44', 1, '2021-01-11 12:12:44', '2021-01-11 12:12:44'),
(65, 16, '2021-01-11 12:57:16', 2, '2021-01-11 12:57:16', '2021-01-11 12:57:16'),
(66, 16, '2021-01-11 14:18:48', 1, '2021-01-11 14:18:48', '2021-01-11 14:18:48'),
(67, 16, '2021-01-11 14:19:05', 2, '2021-01-11 14:19:05', '2021-01-11 14:19:05'),
(68, 16, '2021-01-11 14:20:34', 1, '2021-01-11 14:20:34', '2021-01-11 14:20:34'),
(69, 16, '2021-01-11 14:21:08', 2, '2021-01-11 14:21:08', '2021-01-11 14:21:08'),
(70, 16, '2021-01-11 14:26:57', 1, '2021-01-11 14:26:57', '2021-01-11 14:26:57'),
(71, 16, '2021-01-11 14:28:16', 2, '2021-01-11 14:28:16', '2021-01-11 14:28:16'),
(72, 16, '2021-01-11 14:28:54', 1, '2021-01-11 14:28:54', '2021-01-11 14:28:54'),
(73, 16, '2021-01-11 14:33:09', 2, '2021-01-11 14:33:09', '2021-01-11 14:33:09'),
(74, 16, '2021-01-11 14:34:02', 1, '2021-01-11 14:34:02', '2021-01-11 14:34:02'),
(75, 16, '2021-01-11 14:35:17', 2, '2021-01-11 14:35:17', '2021-01-11 14:35:17'),
(76, 16, '2021-01-11 14:35:46', 1, '2021-01-11 14:35:46', '2021-01-11 14:35:46'),
(77, 16, '2021-01-11 14:39:08', 2, '2021-01-11 14:39:08', '2021-01-11 14:39:08'),
(78, 16, '2021-01-11 15:57:19', 1, '2021-01-11 15:57:19', '2021-01-11 15:57:19'),
(79, 16, '2021-01-11 16:10:02', 2, '2021-01-11 16:10:02', '2021-01-11 16:10:02'),
(80, 16, '2021-01-11 16:19:02', 1, '2021-01-11 16:19:02', '2021-01-11 16:19:02'),
(81, 16, '2021-01-11 16:35:41', 2, '2021-01-11 16:35:41', '2021-01-11 16:35:41'),
(82, 16, '2021-01-11 16:41:37', 1, '2021-01-11 16:41:37', '2021-01-11 16:41:37'),
(83, 16, '2021-01-11 16:44:08', 2, '2021-01-11 16:44:08', '2021-01-11 16:44:08'),
(84, 16, '2021-01-11 17:06:09', 1, '2021-01-11 17:06:09', '2021-01-11 17:06:09'),
(85, 16, '2021-01-11 17:23:18', 2, '2021-01-11 17:23:18', '2021-01-11 17:23:18'),
(86, 16, '2021-01-11 17:28:19', 1, '2021-01-11 17:28:19', '2021-01-11 17:28:19'),
(87, 16, '2021-01-11 17:45:59', 2, '2021-01-11 17:45:59', '2021-01-11 17:45:59'),
(104, 16, '2021-01-12 16:16:56', 1, '2021-01-12 16:16:56', '2021-01-12 16:16:56'),
(105, 16, '2021-01-12 16:17:21', 2, '2021-01-12 16:17:21', '2021-01-12 16:17:21'),
(106, 16, '2021-01-12 16:17:42', 1, '2021-01-12 16:17:42', '2021-01-12 16:17:42'),
(107, 16, '2021-01-12 16:18:53', 2, '2021-01-12 16:18:53', '2021-01-12 16:18:53'),
(108, 16, '2021-01-12 16:21:54', 1, '2021-01-12 16:21:54', '2021-01-12 16:21:54'),
(109, 16, '2021-01-12 16:22:30', 2, '2021-01-12 16:22:30', '2021-01-12 16:22:30'),
(110, 16, '2021-01-12 16:22:47', 1, '2021-01-12 16:22:47', '2021-01-12 16:22:47'),
(112, 16, '2021-01-12 16:38:49', 2, '2021-01-12 16:38:49', '2021-01-12 16:38:49'),
(113, 16, '2021-01-12 16:38:54', 1, '2021-01-12 16:38:54', '2021-01-12 16:38:54'),
(114, 16, '2021-01-12 18:32:11', 2, '2021-01-12 18:32:11', '2021-01-12 18:32:11'),
(115, 16, '2021-01-15 12:59:41', 1, '2021-01-15 12:59:41', '2021-01-15 12:59:41'),
(116, 16, '2021-01-15 13:49:37', 2, '2021-01-15 13:49:37', '2021-01-15 13:49:37'),
(117, 16, '2021-01-15 16:18:24', 1, '2021-01-15 16:18:24', '2021-01-15 16:18:24'),
(118, 16, '2021-01-15 18:46:51', 2, '2021-01-15 18:46:51', '2021-01-15 18:46:51'),
(119, 16, '2021-01-15 18:53:51', 1, '2021-01-15 18:53:51', '2021-01-15 18:53:51'),
(120, 16, '2021-01-15 18:56:59', 2, '2021-01-15 18:56:59', '2021-01-15 18:56:59'),
(121, 16, '2021-01-15 19:28:28', 1, '2021-01-15 19:28:28', '2021-01-15 19:28:28'),
(122, 16, '2021-01-15 19:49:34', 2, '2021-01-15 19:49:34', '2021-01-15 19:49:34'),
(123, 16, '2021-01-15 20:09:28', 1, '2021-01-15 20:09:28', '2021-01-15 20:09:28'),
(124, 16, '2021-01-15 20:10:00', 2, '2021-01-15 20:10:00', '2021-01-15 20:10:00'),
(125, 16, '2021-01-15 20:26:09', 1, '2021-01-15 20:26:09', '2021-01-15 20:26:09'),
(126, 16, '2021-01-15 21:00:57', 2, '2021-01-15 21:00:57', '2021-01-15 21:00:57'),
(127, 16, '2021-01-18 13:27:43', 1, '2021-01-18 13:27:43', '2021-01-18 13:27:43'),
(128, 16, '2021-01-18 15:02:01', 2, '2021-01-18 15:02:01', '2021-01-18 15:02:01'),
(129, 16, '2021-01-18 15:02:52', 1, '2021-01-18 15:02:52', '2021-01-18 15:02:52'),
(130, 16, '2021-01-18 16:38:30', 2, '2021-01-18 16:38:30', '2021-01-18 16:38:30'),
(131, 16, '2021-01-18 17:28:39', 1, '2021-01-18 17:28:39', '2021-01-18 17:28:39'),
(132, 16, '2021-01-18 19:56:28', 2, '2021-01-18 19:56:28', '2021-01-18 19:56:28'),
(133, 16, '2021-01-19 20:08:18', 1, '2021-01-19 20:08:18', '2021-01-19 20:08:18'),
(134, 16, '2021-01-19 20:28:31', 2, '2021-01-19 20:28:31', '2021-01-19 20:28:31'),
(137, 16, '2021-01-21 18:01:00', 1, '2021-01-21 13:06:51', '2021-01-21 13:06:51'),
(138, 16, '2021-01-21 20:02:00', 2, '2021-01-21 13:06:51', '2021-01-21 13:06:51'),
(139, 16, '2021-01-21 18:08:40', 1, '2021-01-21 18:08:40', '2021-01-21 18:08:40'),
(140, 16, '2021-01-21 18:09:05', 2, '2021-01-21 18:09:05', '2021-01-21 18:09:05'),
(145, 16, '2021-01-21 18:15:58', 1, '2021-01-21 18:15:58', '2021-01-21 18:15:58'),
(146, 16, '2021-01-21 18:16:11', 2, '2021-01-21 18:16:11', '2021-01-21 18:16:11'),
(147, 16, '2021-01-21 18:16:25', 1, '2021-01-21 18:16:25', '2021-01-21 18:16:25'),
(148, 16, '2021-01-21 18:17:44', 2, '2021-01-21 18:17:44', '2021-01-21 18:17:44'),
(149, 16, '2021-01-21 18:17:56', 1, '2021-01-21 18:17:56', '2021-01-21 18:17:56'),
(150, 16, '2021-01-21 18:18:41', 2, '2021-01-21 18:18:41', '2021-01-21 18:18:41'),
(151, 16, '2021-01-21 18:19:42', 1, '2021-01-21 18:19:42', '2021-01-21 18:19:42'),
(152, 16, '2021-01-21 18:19:49', 2, '2021-01-21 18:19:49', '2021-01-21 18:19:49'),
(153, 16, '2021-01-21 18:20:43', 1, '2021-01-21 18:20:43', '2021-01-21 18:20:43'),
(154, 16, '2021-01-21 18:21:43', 2, '2021-01-21 18:21:43', '2021-01-21 18:21:43'),
(161, 16, '2021-01-22 14:16:00', 1, '2021-01-22 09:16:47', '2021-01-22 09:16:47'),
(162, 16, '2021-01-22 14:26:00', 2, '2021-01-22 09:16:47', '2021-01-22 09:16:47'),
(169, 16, '2021-01-22 14:23:04', 1, '2021-01-22 14:23:04', '2021-01-22 14:23:04'),
(170, 16, '2021-01-22 14:42:36', 2, '2021-01-22 14:42:36', '2021-01-22 14:42:36'),
(171, 16, '2021-01-22 16:30:35', 1, '2021-01-22 16:30:35', '2021-01-22 16:30:35'),
(172, 16, '2021-01-22 17:10:39', 2, '2021-01-22 17:10:39', '2021-01-22 17:10:39'),
(173, 16, '2021-01-22 17:11:54', 1, '2021-01-22 17:11:54', '2021-01-22 17:11:54'),
(174, 16, '2021-01-22 17:13:04', 2, '2021-01-22 17:13:04', '2021-01-22 17:13:04'),
(175, 16, '2021-01-25 12:22:42', 1, '2021-01-25 12:22:42', '2021-01-25 12:22:42'),
(176, 16, '2021-01-25 13:16:28', 2, '2021-01-25 13:16:28', '2021-01-25 13:16:28'),
(177, 16, '2021-01-25 13:18:32', 1, '2021-01-25 13:18:32', '2021-01-25 13:18:32'),
(178, 16, '2021-01-25 13:37:43', 2, '2021-01-25 13:37:43', '2021-01-25 13:37:43'),
(179, 16, '2021-01-25 13:46:08', 1, '2021-01-25 13:46:08', '2021-01-25 13:46:08'),
(180, 16, '2021-01-25 14:59:53', 2, '2021-01-25 14:59:53', '2021-01-25 14:59:53'),
(191, 16, '2021-02-01 11:59:51', 1, '2021-02-01 11:59:51', '2021-02-01 11:59:51'),
(192, 16, '2021-02-01 14:20:54', 2, '2021-02-01 14:20:54', '2021-02-01 14:20:54'),
(193, 16, '2021-02-01 14:23:53', 1, '2021-02-01 14:23:53', '2021-02-01 14:23:53'),
(194, 16, '2021-02-01 14:29:09', 2, '2021-02-01 14:29:09', '2021-02-01 14:29:09'),
(195, 16, '2021-02-01 14:29:18', 1, '2021-02-01 14:29:18', '2021-02-01 14:29:18'),
(196, 16, '2021-02-01 14:29:40', 2, '2021-02-01 14:29:40', '2021-02-01 14:29:40'),
(197, 16, '2021-02-01 14:31:14', 1, '2021-02-01 14:31:14', '2021-02-01 14:31:14'),
(198, 16, '2021-02-01 14:32:13', 2, '2021-02-01 14:32:13', '2021-02-01 14:32:13'),
(199, 16, '2021-02-01 14:32:53', 1, '2021-02-01 14:32:53', '2021-02-01 14:32:53'),
(200, 16, '2021-02-01 14:40:26', 2, '2021-02-01 14:40:26', '2021-02-01 14:40:26'),
(201, 16, '2021-02-01 14:41:27', 1, '2021-02-01 14:41:27', '2021-02-01 14:41:27'),
(202, 16, '2021-02-01 14:44:29', 2, '2021-02-01 14:44:29', '2021-02-01 14:44:29'),
(203, 16, '2021-02-01 14:52:19', 1, '2021-02-01 14:52:19', '2021-02-01 14:52:19'),
(204, 16, '2021-02-01 14:52:35', 2, '2021-02-01 14:52:35', '2021-02-01 14:52:35'),
(205, 16, '2021-02-01 14:54:43', 1, '2021-02-01 14:54:43', '2021-02-01 14:54:43'),
(206, 16, '2021-02-01 14:54:48', 2, '2021-02-01 14:54:48', '2021-02-01 14:54:48'),
(207, 16, '2021-02-01 16:05:11', 1, '2021-02-01 16:05:11', '2021-02-01 16:05:11'),
(208, 16, '2021-02-01 17:05:18', 2, '2021-02-01 17:05:18', '2021-02-01 17:05:18'),
(209, 16, '2021-02-09 16:58:00', 1, '2021-02-09 16:58:00', '2021-02-09 16:58:00'),
(210, 16, '2021-02-09 16:58:41', 2, '2021-02-09 16:58:41', '2021-02-09 16:58:41'),
(211, 16, '2021-02-09 17:02:03', 1, '2021-02-09 17:02:03', '2021-02-09 17:02:03'),
(212, 16, '2021-02-09 17:03:37', 2, '2021-02-09 17:03:37', '2021-02-09 17:03:37'),
(213, 16, '2021-02-09 19:23:48', 1, '2021-02-09 19:23:48', '2021-02-09 19:23:48'),
(214, 16, '2021-02-09 19:24:46', 2, '2021-02-09 19:24:46', '2021-02-09 19:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs_time`
--

CREATE TABLE `userlogs_time` (
  `userlogs_time_id` int(11) NOT NULL,
  `todayhours` int(11) DEFAULT NULL,
  `todayremaining` int(11) DEFAULT NULL,
  `extratime` int(11) DEFAULT NULL,
  `monthlyhours` int(11) DEFAULT 10800,
  `monthtlyremaining` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogs_time`
--

INSERT INTO `userlogs_time` (`userlogs_time_id`, `todayhours`, `todayremaining`, `extratime`, `monthlyhours`, `monthtlyremaining`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 0, 540, 310, 10800, 10800, 16, '2021-02-12 17:35:48', '2021-02-12 17:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `string_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `fullname`, `email`, `designation`, `address`, `phone_number`, `role_id`, `employee_id`, `status`, `profile_pic`, `email_verified_at`, `password`, `string_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Muhammad', 'Irfan', 'Muhammad Irfan', 'admin@gmail.com', 'Software Engineer', 'Voluptas voluptate q', '+1 (194) 385-3698', 13, NULL, 'Active', 'upload/user/16/92dr6QZ7ghdwvgxD5Q2GXKsBCHOOfK56sazQit5R.jpg', NULL, '$2y$10$TY9ZMZNGshuHOFSCMYatAepLTStmrfKwW0Fr/iJ6/bppBF0RtzWjm', 'Pa$$w0rd!', 'hoIrIpMRyR3RJu3bV72aLHGres3wo7bCTqNjOLM46hlPTlmO4vjuAzGcWxTq', '2021-01-01 08:16:16', '2021-01-22 06:39:38'),
(18, 'Yasin', 'Aline', 'Yasin Aline', 'yasin@gmail.com', 'Laravel Developer', '16/A South bay street, huston texas, USA', '03462338888', 14, NULL, 'Block', 'upload/user/18/oxKIEd2GEUIWUPuIdGDJZCm7jl3Qye1DqAV6QoKB.jpg', NULL, '$2y$10$r.dYafifxehurzyIRR5vGOLNFStU5xoh2Dv0XSIKchEbAbsymiIy6', 'Pa$$w0rd!', NULL, '2021-01-01 08:18:33', '2021-01-05 02:27:42'),
(19, NULL, NULL, 'Ciara Garrison', 'xexiv@mailinator.com', NULL, NULL, NULL, 12, 0, 'Active', NULL, NULL, '$2y$10$yDDccNlhCzHb9i3Gsea/M.JGyLcXC34G2/TDt6jnmHuPRy6PFm1/W', 'Pa$$w0rd!', NULL, '2021-01-01 09:25:52', '2021-02-17 03:55:33'),
(21, NULL, NULL, 'Echo Erickson', 'wecusar@mailinator.com', NULL, NULL, NULL, 14, NULL, 'Active', NULL, NULL, '$2y$10$7DM0tG4m60sbSryr0lXOBugOdfj2LqoYe2NB2NKaKmJ3ABjXvBEB2', 'Pa$$w0rd!', NULL, '2021-01-06 04:43:22', '2021-01-21 10:04:58'),
(23, NULL, NULL, 'Winifred Campbell', 'vafahiseqy@mailinator.com', NULL, NULL, NULL, 13, NULL, 'Block', NULL, NULL, '$2y$10$mI/c8h.e2S1lzeyS9FmTZO84eJ2BRgw.j6igp2OkkwczlWmZcwvhm', 'Pa$$w0rd!', NULL, '2021-01-06 06:16:14', '2021-01-06 07:05:57'),
(25, NULL, NULL, 'Sheila Mckinney', 'vetyk@mailinator.com', NULL, NULL, NULL, 13, NULL, 'Active', NULL, NULL, '$2y$10$o1kFCkfoGXFSNe/CZfOnmOOYuA6g..CfvKdDBdYIjtSuLRSU/xPwG', 'Pa$$w0rd!', NULL, '2021-01-18 09:40:45', '2021-01-18 09:40:45'),
(40, NULL, NULL, 'Keiko Mcgee', 'hejala@mailinator.com', NULL, NULL, NULL, 13, 0, 'Block', NULL, NULL, '$2y$10$6j3h1A.2CYle5Oal1eiXrOdzw/vRW7h/OSw8ggeklRRg31fn1KL4q', 'Pa$$w0rd!', NULL, '2021-02-18 05:02:57', '2021-02-18 05:02:57'),
(41, NULL, NULL, 'Zephania Sanchez', 'cygyvocyt@mailinator.com', NULL, NULL, NULL, 13, 0, 'Active', NULL, NULL, '$2y$10$zdAvOW8Ljkdje5a9yNdb5utX23yvZUi68aqKVg4FHm8rF2alfJCmm', 'Pa$$w0rd!', NULL, '2021-02-18 08:05:09', '2021-02-18 08:05:09'),
(42, NULL, NULL, 'Echo Dudley', 'liwixicu@mailinator.com', NULL, NULL, NULL, 14, 0, 'Block', NULL, NULL, '$2y$10$ZwqfBrwFCjn5Yqh4ns2vt.Xq/7igB7lb3XgNsNi52km0j2rd2Kgwi', 'Pa$$w0rd!', NULL, '2021-02-18 08:59:19', '2021-02-18 08:59:19'),
(43, NULL, NULL, 'Murphy Graves', 'holuwep@mailinator.com', NULL, NULL, NULL, 14, 0, 'Block', NULL, NULL, '$2y$10$zWd5DRII61O7gdLSFtrdjOSiBEhDB86klZJeIbYtisVmrs8V5rgV6', 'Pa$$w0rd!', NULL, '2021-02-19 04:11:02', '2021-02-19 04:11:02'),
(44, NULL, NULL, 'Jacob Daugherty', 'fikoz@mailinator.com', NULL, NULL, NULL, 14, 0, 'Block', NULL, NULL, '$2y$10$KpusOocGVcqJII1yfjdwQeNVcoccXC7/zzdTD5HNBx6Vg63rKaQua', 'Pa$$w0rd!', NULL, '2021-02-19 04:13:37', '2021-02-19 04:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `meta_key` varchar(500) DEFAULT NULL,
  `meta_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_metas`
--

INSERT INTO `user_metas` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 16, 'city', 'karachi'),
(2, 16, 'state', 'Kansas'),
(3, 16, 'martial_status', 'Married'),
(4, 16, 'cnic', '42301565492227'),
(5, 16, 'dob', '28/10/1995'),
(6, 16, 'zipcode', '250378'),
(7, 16, 'alt_phone', '+1 (194) 385-3698'),
(8, 16, 'em_first_name', 'Dummy'),
(9, 16, 'em_last_name', 'Oconnor'),
(10, 16, 'em_full_name', 'Burton Parks'),
(11, 16, 'em_relationship', 'Hic nesciunt ex eve'),
(12, 16, 'em_city', 'Consequatur Debitis'),
(13, 16, 'em_state', 'Possimus nobis aliq'),
(14, 16, 'em_address', 'Dolore duis debitis'),
(15, 16, 'em_phone_number', '+1 (702) 127-2754'),
(16, 16, 'em_al_phone', '+1 (581) 844-8399'),
(17, 16, 'em_zipcode', '80272');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege_user`
--
ALTER TABLE `privilege_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelogs`
--
ALTER TABLE `timelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogs_time`
--
ALTER TABLE `userlogs_time`
  ADD PRIMARY KEY (`userlogs_time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `privilege_user`
--
ALTER TABLE `privilege_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `timelogs`
--
ALTER TABLE `timelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `userlogs_time`
--
ALTER TABLE `userlogs_time`
  MODIFY `userlogs_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
