-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Jan 06, 2021 at 05:12 PM
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
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Iure ea fugiat aut a', 'Est aute cupidatat r', 'Reject', 19, '2021-01-04 09:23:49', '2021-01-04 09:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `complain_user`
--

CREATE TABLE `complain_user` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `privilege_user`
--

CREATE TABLE `privilege_user` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(12, 'lead', 'Non aut modi quos et', 'Block', '2021-01-01 13:25:46', '2021-01-01 13:25:46'),
(13, 'head', 'Sunt sint anim esse', 'Block', '2021-01-01 13:29:50', '2021-01-01 13:29:50'),
(14, 'hr', 'Numquam libero moles', 'Active', '2021-01-01 13:30:33', '2021-01-01 13:30:33'),
(15, 'employee', 'Employee', 'Active', '2021-01-05 11:25:01', '2021-01-05 11:25:01');

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
(7, 'Non nesciunt quia o', 'Voluptatem Officiis', 'Pending', 18, '2021-01-04 08:40:13', '2021-01-04 08:40:13'),
(8, 'Et ipsum eos rerum', 'Dolores quia dolor v', 'Approved', 18, '2021-01-04 08:40:19', '2021-01-04 08:40:52'),
(9, 'Aliquip fugiat dolor', 'Quidem explicabo Et', 'Reject', 18, '2021-01-04 08:40:31', '2021-01-04 08:40:44');

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
(1, 16, 0, '2021-01-06 19:28:38 PM', '2021-01-06 20:56:46 PM', '1 second before', 1, '2021-01-06 19:28:38', '2021-01-06 20:56:46');

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
(16, '25033605', 'Shellby', 'Thomas Shellby', 'admin@gmail.com', 'Software Engineer', 'Voluptas voluptate q', '+1 (194) 385-3698', 13, NULL, 'Active', 'upload/user/16/92dr6QZ7ghdwvgxD5Q2GXKsBCHOOfK56sazQit5R.jpg', NULL, '$2y$10$TY9ZMZNGshuHOFSCMYatAepLTStmrfKwW0Fr/iJ6/bppBF0RtzWjm', 'Pa$$w0rd!', 'hWE0VSWIBwYXFFZedeL2JZo8ILUrhgHj9vYRZGTGxy4EwtlQUQPuzSZimy4a', '2021-01-01 08:16:16', '2021-01-06 02:28:26'),
(18, 'Shelly', 'Aline', 'Shelly Aline', 'shellyalnie@gmail.com', 'Laravel Developer', '16/A South bay street, huston texas, USA', '03462338888', 14, NULL, 'Block', 'upload/user/18/oxKIEd2GEUIWUPuIdGDJZCm7jl3Qye1DqAV6QoKB.jpg', NULL, '$2y$10$r.dYafifxehurzyIRR5vGOLNFStU5xoh2Dv0XSIKchEbAbsymiIy6', 'Pa$$w0rd!', NULL, '2021-01-01 08:18:33', '2021-01-05 02:27:42'),
(19, NULL, NULL, 'Ciara Garrison', 'xexiv@mailinator.com', NULL, NULL, NULL, 12, NULL, 'Block', NULL, NULL, '$2y$10$xymjqlhLKm1E9XFdE4Rc/.DtGgv2uk7rOaA5DGIgZLb2ra3bseDZW', 'Pa$$w0rd!', NULL, '2021-01-01 09:25:52', '2021-01-01 09:25:52'),
(20, NULL, NULL, 'Zeph Rogers', 'ravifu@mailinator.com', NULL, NULL, NULL, 14, NULL, 'Active', NULL, NULL, '$2y$10$zbvwB5t4o8QpQ6L1lbHn5uJn9R6HXgcXnFD/orPT.LBHE432Qf6H6', 'Pa$$w0rd!', NULL, '2021-01-06 04:07:44', '2021-01-06 04:07:44'),
(21, NULL, NULL, 'Echo Erickson', 'wecusar@mailinator.com', NULL, NULL, NULL, 15, NULL, 'Pending', NULL, NULL, '$2y$10$4VXAGS4WgTZmu1C.G.GEee1s/md2eCMJIHh1BLcapu28GRkx1.0s6', 'Pa$$w0rd!', NULL, '2021-01-06 04:43:22', '2021-01-06 04:43:22'),
(22, NULL, NULL, 'Cadman Eaton', 'xicag@mailinator.com', NULL, NULL, NULL, 15, NULL, 'Block', NULL, NULL, '$2y$10$OdBkEmS6Sk4Xf76Ku1HBNer1IUuPTObngf.R7Sf7tn0t8nSg4F3/K', 'Pa$$w0rd!', NULL, '2021-01-06 04:49:27', '2021-01-06 04:49:27'),
(23, NULL, NULL, 'Winifred Campbell', 'vafahiseqy@mailinator.com', NULL, NULL, NULL, 13, 0, 'Block', NULL, NULL, '$2y$10$mI/c8h.e2S1lzeyS9FmTZO84eJ2BRgw.j6igp2OkkwczlWmZcwvhm', 'Pa$$w0rd!', NULL, '2021-01-06 06:16:14', '2021-01-06 07:05:57'),
(24, NULL, NULL, 'Blythe Aguirre', 'qudozy@mailinator.com', NULL, NULL, NULL, 15, 19, 'Pending', NULL, NULL, '$2y$10$4Nh7uai7Ou18sLtZet3UL.IgkU5ObpVdaE0m8zldojWzzUAFT3trK', 'Pa$$w0rd!', NULL, '2021-01-06 06:17:16', '2021-01-06 06:17:16');

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
-- Indexes for table `complains`
--
ALTER TABLE `complains`
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
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `timelogs`
--
ALTER TABLE `timelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
