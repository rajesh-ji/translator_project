-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 09:17 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `translator`
--

-- --------------------------------------------------------

--
-- Table structure for table `lang_conversion`
--

CREATE TABLE `lang_conversion` (
  `id` int(11) NOT NULL,
  `from_lang_id` int(11) NOT NULL,
  `to_lang_id` int(11) NOT NULL,
  `per_word_amount` int(11) NOT NULL,
  `rush_fee` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `translator_id` int(11) NOT NULL,
  `urgency_time` int(255) NOT NULL DEFAULT 30,
  `normal_time` int(255) NOT NULL DEFAULT 240
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_forword`
--

CREATE TABLE `request_forword` (
  `id` int(11) NOT NULL,
  `translator_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_status` enum('A','R','E') NOT NULL,
  `created_utc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_lang`
--

CREATE TABLE `system_lang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `front_lang` int(2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '1 for super admin 2 for customer 3 for translator',
  `zip_code` int(11) NOT NULL,
  `dob` date NOT NULL,
  `latitute` varchar(255) NOT NULL,
  `longitute` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `bio` text NOT NULL,
  `social_id` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1 for active 0 for block 2 for inactive',
  `created_utc` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `is_active` enum('1','0') NOT NULL COMMENT '1 for active 0 for inactive',
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_translator` int(1) NOT NULL COMMENT '1 for customer 2 for tranlator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `doc_type` varchar(255) NOT NULL,
  `doc_path` varchar(255) NOT NULL,
  `created_utc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lang_conversion`
--
ALTER TABLE `lang_conversion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_forword`
--
ALTER TABLE `request_forword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_lang`
--
ALTER TABLE `system_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lang_conversion`
--
ALTER TABLE `lang_conversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_forword`
--
ALTER TABLE `request_forword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_lang`
--
ALTER TABLE `system_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
