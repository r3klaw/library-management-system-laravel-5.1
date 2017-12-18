-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2017 at 11:13 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.26-2+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `shelf_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `isbn`, `quantity`, `shelf_location`, `created_at`, `updated_at`) VALUES
(1, 'The Grass', 'JK Rowling', '1-86092-049-7', 10, 'Shelf  A', '2017-09-13 09:03:52', '2017-09-13 09:03:52'),
(2, 'The Higgler', 'Warrent Buffet', '1-86092-010-1', 15, 'Shelf  B', '2017-09-13 09:03:52', '2017-09-13 09:03:52'),
(3, 'The Open Boat', 'Sebastian Marco', '1-86092-034-9', 5, 'Shelf  C', '2017-09-13 09:03:52', '2017-09-13 09:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_26_024015_create_books_table', 1),
('2016_08_26_024033_create_users_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `age` smallint(6) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `age`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'david rashid', 'rashid.david12@gmail.com', '$2y$10$tdmcAlTCTE1ZWnKHM2KZB.b.NGJpBfnqnLzJvWOgpRwc.0qg6Vdk6', 26, 1, 'sXOMrfgpGz2ZG8vWhM2wvnJI8r2TsoeP8bM9BKMwCZdxhrOPhLbZPtFeAQfU', '2017-09-13 09:03:52', '2017-09-18 14:02:03'),
(2, 'reklaw', 'reklaw@gmail.com', '$2y$10$MAuUj0gmtT435MLhZ7e12OMuIhrP.guNPU0xT8c2fR0yrIZ/BnTaO', 18, 0, 'nHcK9u9LndXiT3b0ADbwPCStopq2434S9e7SbSBdlBJqQp3FSjdkB2nJCp37', '2017-09-13 09:03:52', '2017-09-15 09:09:43'),
(3, 'jay', 'jay@gmail.com', '$2y$10$gdOXJsA/wik9h19B1CeBI.BFfbRqm.SmKtleYQGA2sakG2ZrtqVsi', 10, 0, NULL, '2017-09-13 09:03:52', '2017-09-13 09:05:50'),
(5, 'adisa louice', 'louse@gmail.com', '$2y$10$akUflRkAClKE8ENJu67pCujSQHnjKbAVGKzYNnlv85D4nYk9PeK66', 20, 0, NULL, '2017-09-15 08:55:31', '2017-09-15 08:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `expire_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `penalty_fee` int(100) DEFAULT '100',
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_books`
--

INSERT INTO `users_books` (`id`, `user_id`, `book_id`, `expire_on`, `penalty_fee`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-13 09:06:29', '2017-12-18 09:06:32'),
(2, 2, 3, '2017-09-15 12:01:14', 0, 0, '2017-09-13 11:51:48', '2017-09-15 09:01:14'),
(3, 2, 2, '2017-09-18 14:02:45', 0, 0, '2017-09-13 12:31:04', '2017-09-18 14:02:45'),
(4, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-13 14:37:42', '2017-12-18 09:06:32'),
(5, 2, 2, '2017-09-18 14:02:45', 0, 0, '2017-09-13 14:39:57', '2017-09-18 14:02:45'),
(6, 2, 3, '2017-09-15 12:01:14', 0, 0, '2017-09-14 04:27:40', '2017-09-15 09:01:14'),
(7, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 09:12:31', '2017-12-18 09:06:32'),
(8, 2, 2, '2017-09-18 14:02:45', 0, 0, '2017-09-14 09:24:25', '2017-09-18 14:02:45'),
(9, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 09:27:39', '2017-12-18 09:06:32'),
(10, 2, 2, '2017-09-18 14:02:45', 0, 0, '2017-09-14 09:29:36', '2017-09-18 14:02:45'),
(11, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 09:42:29', '2017-12-18 09:06:32'),
(12, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 09:50:56', '2017-12-18 09:06:32'),
(13, 2, 2, '2017-09-18 14:02:45', 0, 0, '2017-09-14 09:58:23', '2017-09-18 14:02:45'),
(14, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 10:17:11', '2017-12-18 09:06:32'),
(15, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 10:18:42', '2017-12-18 09:06:32'),
(16, 2, 2, '2017-09-18 14:02:45', 0, 0, '2017-09-14 10:21:19', '2017-09-18 14:02:45'),
(17, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 10:30:36', '2017-12-18 09:06:32'),
(18, 2, 2, '2017-09-18 14:02:45', 0, 0, '2017-09-14 10:39:59', '2017-09-18 14:02:45'),
(19, 2, 3, '2017-09-15 12:01:14', 50, 0, '2017-09-14 10:40:04', '2017-09-15 09:01:14'),
(20, 2, 1, '2017-12-18 09:06:32', 0, 0, '2017-09-14 10:51:38', '2017-12-18 09:06:32'),
(21, 2, 1, '2017-12-18 09:06:32', 100, 0, '2017-09-14 10:59:07', '2017-12-18 09:06:32'),
(22, 2, 2, '2017-09-18 14:02:45', NULL, 0, '2017-09-14 16:25:40', '2017-09-18 14:02:45'),
(23, 2, 3, '2017-09-15 12:01:14', NULL, 0, '2017-09-14 16:28:51', '2017-09-15 09:01:14'),
(24, 2, 2, '2017-09-18 14:02:45', NULL, 0, '2017-09-14 16:45:08', '2017-09-18 14:02:45'),
(25, 2, 3, '2017-09-15 12:01:14', NULL, 0, '2017-09-15 09:00:39', '2017-09-15 09:01:14'),
(26, 2, 2, '2017-09-18 14:02:45', NULL, 0, '2017-09-15 09:09:14', '2017-09-18 14:02:45'),
(27, 2, 2, '2017-09-18 14:02:45', NULL, 0, '2017-09-15 09:09:30', '2017-09-18 14:02:45'),
(28, 2, 2, '2017-09-18 14:02:45', 100, 0, '2017-09-18 14:02:29', '2017-09-18 14:02:45'),
(29, 2, 1, '2017-12-18 09:06:32', 100, 0, '2017-12-18 09:06:19', '2017-12-18 09:06:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_title_unique` (`title`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_books`
--
ALTER TABLE `users_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
