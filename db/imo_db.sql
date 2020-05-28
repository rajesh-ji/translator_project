-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2020 at 06:47 AM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_fee`
--

CREATE TABLE `delivery_fee` (
  `id` int(11) NOT NULL,
  `delivery_day` varchar(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_fee`
--

INSERT INTO `delivery_fee` (`id`, `delivery_day`, `fee`, `created_at`, `min`, `max`) VALUES
(1, '1', 40, '2020-05-13 15:31:21', 1, 2),
(2, '2-3', 30, '2020-05-13 06:53:37', 2, 3),
(3, '5-7', 20, '2020-05-13 06:53:43', 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `lang_conversion`
--

CREATE TABLE `lang_conversion` (
  `id` int(11) NOT NULL,
  `from_lang_id` int(11) NOT NULL,
  `to_lang_id` int(11) NOT NULL,
  `per_word_amount` float NOT NULL,
  `rush_fee` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `translator_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `urgency_time` int(255) NOT NULL DEFAULT 30,
  `normal_time` int(255) NOT NULL DEFAULT 240
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lang_conversion`
--

INSERT INTO `lang_conversion` (`id`, `from_lang_id`, `to_lang_id`, `per_word_amount`, `rush_fee`, `created_at`, `modified_at`, `translator_id`, `status`, `urgency_time`, `normal_time`) VALUES
(1, 1, 2, 0.35, 20, '2020-03-19 13:01:06', '2020-03-19 13:01:06', 17, '1', 30, 240),
(2, 2, 1, 0.35, 20, '2020-03-19 13:01:06', '2020-03-19 13:01:06', 17, '1', 30, 240),
(3, 1, 48, 0.38, 0, '2020-03-22 05:49:18', '2020-03-22 05:49:18', 1, '1', 30, 240),
(4, 48, 1, 0.38, 0, '2020-04-08 13:56:36', '2020-04-08 13:56:36', 1, '1', 30, 240),
(5, 2, 48, 0.36, 0, '2020-05-05 09:47:18', '2020-05-05 09:47:18', 1, '1', 30, 240);

-- --------------------------------------------------------

--
-- Table structure for table `my_doc_rushfee`
--

CREATE TABLE `my_doc_rushfee` (
  `id` int(11) NOT NULL,
  `doc_type` text NOT NULL,
  `fee` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_doc_rushfee`
--

INSERT INTO `my_doc_rushfee` (`id`, `doc_type`, `fee`, `created`) VALUES
(1, 'Legal Documents', 35, '2020-03-14 09:00:26'),
(2, 'Internet/ E-commerce', 40, '2020-03-14 09:00:26'),
(3, 'General Business', 5, '2020-03-22 05:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `transation_id` int(11) NOT NULL,
  `status` enum('pending','success','failed') NOT NULL,
  `response` text NOT NULL DEFAULT 'none',
  `amount` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `per_word_fee` decimal(10,2) NOT NULL,
  `subject_fee` decimal(10,2) NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL,
  `address1` varchar(400) DEFAULT NULL,
  `address2` varchar(400) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `state` varchar(400) DEFAULT NULL,
  `city` varchar(400) DEFAULT NULL,
  `company` varchar(400) DEFAULT NULL,
  `phone_number` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`transation_id`, `status`, `response`, `amount`, `created`, `per_word_fee`, `subject_fee`, `delivery_fee`, `address1`, `address2`, `zipcode`, `state`, `city`, `company`, `phone_number`) VALUES
(1, 'pending', '', 0.00, '2020-05-06 17:59:40', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'pending', '', 0.00, '2020-05-06 18:15:26', 0.00, 0.00, 0.00, 'ADDR1', 'ADDR2', '302022', 'RAJASTHAN', 'JAIPUR', 'IMO', 89563298),
(4, 'pending', '', 0.00, '2020-05-07 00:21:59', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'pending', '', 0.00, '2020-05-07 04:30:33', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'pending', 'none', 385.00, '2020-05-13 20:00:51', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'pending', 'none', 385.00, '2020-05-13 20:02:29', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'pending', 'none', 385.00, '2020-05-13 20:02:54', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'failed', '{\"status\":\"paypalcancel \",\"sid\":\"13\"}', 355.00, '2020-05-13 20:05:56', 0.35, 5.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'pending', 'none', 385.00, '2020-05-13 20:48:47', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'failed', '{\"status\":\"paypalcancel \",\"sid\":\"15\"}', 385.00, '2020-05-13 21:56:29', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'pending', 'none', 390.00, '2020-05-14 02:20:56', 0.35, 40.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'failed', '{\"status\":\"paypalcancel \",\"sid\":\"17\"}', 385.00, '2020-05-16 08:47:21', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'pending', 'none', 765.00, '2020-05-22 13:22:51', 0.73, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'pending', 'none', 385.00, '2020-05-23 15:55:11', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'pending', 'none', 385.00, '2020-05-23 23:35:42', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'pending', 'none', 385.00, '2020-05-25 00:32:47', 0.35, 35.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Table structure for table `request_translation`
--

CREATE TABLE `request_translation` (
  `id` int(11) NOT NULL,
  `user_request_id` int(11) NOT NULL,
  `translated_file` varchar(300) NOT NULL,
  `translated_text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skill_set`
--

CREATE TABLE `skill_set` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_type` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `system_lang`
--

INSERT INTO `system_lang` (`id`, `name`, `front_lang`, `created_by`, `status`, `created_at`, `modified_at`) VALUES
(1, 'English (USA)', 1, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(2, 'Turkish', 1, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(3, 'Chiness', 0, 0, 0, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(4, 'Albanian', 0, 0, 0, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(5, 'Amharic', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(6, 'Arabic', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(7, 'Ashante', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(8, 'Asl', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(9, 'Assyrian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(10, 'Azerbaijani', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(11, 'Azeri', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(12, 'Bajuni', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(13, 'Basque', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(14, 'Behdini', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(15, 'Belorussian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(16, 'Bengali', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(17, 'Berber', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(18, 'Bosnian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(19, 'Bravanese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(20, 'Bulgarian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(21, 'Burmese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(22, 'Cakchiquel', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(23, 'Cambodian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(24, 'Cantonese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(25, 'Catalan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(26, 'Chaldean', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(27, 'Chamorro', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(28, 'Chao-chow', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(29, 'Chavacano', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(30, 'Chin', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(31, 'Chuukese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(32, 'Cree', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(33, 'Croatian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(34, 'Czech', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(35, 'Dakota', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(36, 'Danish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(37, 'Dari', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(38, 'Dinka', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(39, 'Diula', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(40, 'Dutch', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(41, 'Edo', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(42, 'English', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(43, 'Estonian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(44, 'Ewe', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(45, 'Fante', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(46, 'Farsi', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(47, 'Fijian Hindi', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(48, 'Finnish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(49, 'Flemish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(50, 'French', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(51, 'French Canadian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(52, 'Fukienese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(53, 'Fula', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(54, 'Fulani', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(55, 'Fuzhou', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(56, 'Ga', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(57, 'Gaddang', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(58, 'Gaelic', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(59, 'Gaelic-irish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(60, 'Gaelic-scottish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(61, 'Georgian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(62, 'German', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(63, 'Gorani', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(64, 'Greek', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(65, 'Gujarati', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(66, 'Haitian Creole', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(67, 'Hakka', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(68, 'Hakka-chinese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(69, 'Hausa', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(70, 'Hebrew', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(71, 'Hindi', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(72, 'Hmong', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(73, 'Hungarian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(74, 'Ibanag', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(75, 'Ibo', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(76, 'Icelandic', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(77, 'Igbo', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(78, 'Ilocano', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(79, 'Indonesian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(80, 'Inuktitut', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(81, 'Italian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(82, 'Jakartanese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(83, 'Japanese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(84, 'Javanese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(85, 'Kanjobal', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(86, 'Karen', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(87, 'Karenni', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(88, 'Kashmiri', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(89, 'Kazakh', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(90, 'Kikuyu', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(91, 'Kinyarwanda', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(92, 'Kirundi', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(93, 'Korean', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(94, 'Kosovan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(95, 'Kotokoli', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(96, 'Krio', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(97, 'Kurdish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(98, 'Kurmanji', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(99, 'Kyrgyz', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(100, 'Lakota', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(101, 'Laotian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(102, 'Latvian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(103, 'Lingala', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(104, 'Lithuanian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(105, 'Luganda', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(106, 'Luo', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(107, 'Maay', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(108, 'Macedonian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(109, 'Malay', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(110, 'Malayalam', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(111, 'Maltese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(112, 'Mandarin', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(113, 'Mandingo', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(114, 'Mandinka', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(115, 'Marathi', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(116, 'Marshallese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(117, 'Mien', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(118, 'Mina', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(119, 'Mirpuri', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(120, 'Mixteco', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(121, 'Moldavan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(122, 'Mongolian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(123, 'Montenegrin', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(124, 'Navajo', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(125, 'Neapolitan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(126, 'Nepali', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(127, 'Nigerian Pidgin', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(128, 'Norwegian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(129, 'Oromo', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(130, 'Pahari', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(131, 'Papago', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(132, 'Papiamento', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(133, 'Pashto', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(134, 'Patois', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(135, 'Pidgin English', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(136, 'Polish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(137, 'Portug.creole', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(138, 'Portuguese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(139, 'Pothwari', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(140, 'Pulaar', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(141, 'Punjabi', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(142, 'Putian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(143, 'Quichua', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(144, 'Romanian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(145, 'Russian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(146, 'Samoan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(147, 'Serbian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(148, 'Shanghainese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(149, 'Shona', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(150, 'Sichuan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(151, 'Sicilian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(152, 'Sinhalese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(153, 'Slovak', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(154, 'Somali', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(155, 'Sorani', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(156, 'Spanish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(157, 'Sudanese Arabic', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(158, 'Sundanese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(159, 'Susu', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(160, 'Swahili', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(161, 'Swedish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(162, 'Sylhetti', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(163, 'Tagalog', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(164, 'Taiwanese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(165, 'Tajik', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(166, 'Tamil', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(167, 'Telugu', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(168, 'Thai', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(169, 'Tibetan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(170, 'Tigre', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(171, 'Tigrinya', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(172, 'Toishanese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(173, 'Tongan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(174, 'Toucouleur', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(175, 'Trique', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(176, 'Tshiluba', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(177, 'Turkish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(178, 'Twi', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(179, 'Ukrainian', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(180, 'Urdu', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(181, 'Uyghur', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(182, 'Uzbek', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(183, 'Vietnamese', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(184, 'Visayan', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(185, 'Welsh', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(186, 'Wolof', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(187, 'Yiddish', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(188, 'Yoruba', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(189, 'Yupik', 0, 0, 1, '2020-03-13 06:46:50', '2020-03-13 06:46:50'),
(190, 'system test language', 0, 3, 1, '2020-03-19 06:47:09', '2020-03-19 06:47:09'),
(191, 'new system lang with front lang', 0, 3, 1, '2020-03-19 06:48:00', '2020-03-19 06:48:00'),
(192, 'lang second with front lang', 0, 3, 1, '2020-03-19 06:49:38', '2020-03-19 06:49:38'),
(193, 'sddgfsaf', 1, 3, 1, '2020-03-19 06:51:13', '2020-03-19 06:51:13'),
(194, 'ohahohaohfoa', 0, 3, 1, '2020-03-19 07:06:14', '2020-03-19 07:06:14'),
(195, 'egeggwregsdg', 1, 3, 1, '2020-03-19 07:06:42', '2020-03-19 07:06:42'),
(196, 'English', 1, 3, 1, '2020-03-22 05:47:43', '2020-03-22 05:47:43'),
(197, 'english', 0, 3, 1, '2020-05-02 10:00:37', '2020-05-02 10:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `trans_exp`
--

CREATE TABLE `trans_exp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `field1` varchar(255) NOT NULL,
  `field2` varchar(255) NOT NULL,
  `field3` varchar(255) NOT NULL,
  `field4` varchar(255) NOT NULL,
  `field5` varchar(255) NOT NULL,
  `field6` varchar(255) NOT NULL,
  `field_type` int(3) NOT NULL COMMENT '1-Education ,2-other ,3-pro,'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_exp`
--

INSERT INTO `trans_exp` (`id`, `user_id`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field_type`) VALUES
(5, 3, '1988', 'Btech', 'Java', 'JIET', 'USA', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `traslator_data`
--

CREATE TABLE `traslator_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `city_of_birth` varchar(255) NOT NULL,
  `about_me` text NOT NULL,
  `country_of_birth` varchar(255) NOT NULL,
  `native_lang` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `vat_no_exit` int(2) NOT NULL,
  `tax_id` varchar(255) NOT NULL,
  `payment_payal_email` varchar(255) NOT NULL,
  `tool_skill_list` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traslator_data`
--

INSERT INTO `traslator_data` (`id`, `user_id`, `f_name`, `l_name`, `city_of_birth`, `about_me`, `country_of_birth`, `native_lang`, `country`, `state`, `timezone`, `vat_no_exit`, `tax_id`, `payment_payal_email`, `tool_skill_list`, `created_time`) VALUES
(1, 2, 'mike', 'sheldon', 'la', 'thsi is abouot mike translator', 'america', 'eng', 'america', 'la', '', 0, '', '', '2,3,4,5,8,10,11,22,', '2020-04-06 13:32:09'),
(2, 19, '', '', '', '', '', '', '', '', '', 0, '', '', '1,4,', '2020-04-09 06:47:33'),
(3, 21, '', '', '', '', '', '', '', '', '', 0, '', '', '', '2020-04-09 07:38:46'),
(4, 22, '', '', '', '', '', '', '', '', '', 0, '', '', '2,5,', '2020-04-09 07:41:13'),
(5, 23, '', '', '', '', '', '', '', '', '', 0, '', '', '', '2020-04-09 07:57:12'),
(6, 16, '', '', '', '', '', '', '', '', '', 0, '', '', '', '2020-05-02 01:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `tras_service`
--

CREATE TABLE `tras_service` (
  `id` int(11) NOT NULL,
  `lang_conversion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1 for accept 0 for reject',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tras_service`
--

INSERT INTO `tras_service` (`id`, `lang_conversion_id`, `user_id`, `status`, `created`) VALUES
(1, 1, 2, '1', '2020-03-19 13:08:32'),
(2, 2, 2, '1', '2020-03-19 13:08:32'),
(3, 1, 6, '0', '2020-03-19 13:08:45'),
(4, 1, 2, '0', '2020-03-29 18:31:53'),
(5, 3, 6, '0', '2020-03-31 13:12:23'),
(6, 4, 2, '0', '2020-04-08 13:56:36'),
(7, 2, 6, '1', '2020-04-28 09:11:58'),
(8, 4, 6, '1', '2020-04-28 09:11:58'),
(9, 5, 2, '0', '2020-05-05 09:47:18'),
(10, 3, 2, '1', '2020-05-05 09:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT 'none',
  `password` varchar(255) NOT NULL DEFAULT 'none',
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL DEFAULT '0',
  `profile_pic` varchar(255) NOT NULL DEFAULT 'none',
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '1 for super admin 2 for customer 3 for translator',
  `zip_code` int(11) NOT NULL,
  `dob` varchar(20) NOT NULL,
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
  `is_translator` int(1) NOT NULL COMMENT '1 for customer 2 for tranlator',
  `login_type` enum('customer','facebook','google') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `mobile`, `profile_pic`, `address1`, `address2`, `role_id`, `zip_code`, `dob`, `latitute`, `longitute`, `image`, `bio`, `social_id`, `status`, `created_utc`, `last_login`, `is_active`, `modified_at`, `created_at`, `is_translator`, `login_type`) VALUES
(1, 'musab', 'musab1', '123456', 'musab@gmail.com', '6125', '', '', '', 1, 154264, '1995-10-08', '', '', 'musabatas.png', '', '', '1', '', '', '', '2020-03-05 09:29:23', '2020-03-05 09:29:23', 2, 'customer'),
(2, 'musab', 'musab', 'mike@123', 'mike@gmail.com', '784565985', '', '', '', 3, 0, '0000-00-00', '', '', '8.jpg', 'All OK.', '', '1', '', '2020-05-13', '1', '2020-03-05 10:07:32', '2020-03-05 10:07:32', 2, 'customer'),
(3, 'admin', 'admin', 'admin123', 'admin@imotranslation.com', '', '', '', '', 1, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '', '2020-03-05 11:32:55', '2020-03-05 11:32:55', 0, 'customer'),
(4, 'demo', 'demo@imotranslation.com', '1263', 'demo@imotranslation.com', '', '', '', '', 2, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '1', '2020-03-13 10:48:45', '2020-03-13 10:48:45', 0, 'customer'),
(5, 'demo', 'demo', '123456', 'random@gmail.com', '', '', '', '', 2, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '1', '2020-03-13 10:49:26', '2020-03-13 10:49:26', 0, 'customer'),
(7, 'demo', 'demo1', 'demo1234', 'test@gmail.com', '', '', '', '', 2, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '1', '2020-03-13 10:51:42', '2020-03-13 10:51:42', 0, 'customer'),
(9, 'alex doe', 'alexdoe', 'alex123', 'alex@gmail.com', '75846958', '', '', '', 1, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '1', '2020-03-18 12:06:01', '2020-03-18 12:06:01', 0, 'customer'),
(10, 'translator', 'translator', '123456', 't@gmail.com', '', '', '', '', 2, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '1', '2020-03-27 04:31:26', '2020-03-27 04:31:26', 0, 'customer'),
(14, 'test', 'test', '54321test', 'test@test.com', '', '', '', '', 1, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '1', '2020-04-08 19:07:34', '2020-04-08 19:07:34', 0, 'customer'),
(15, 'Musab', 'musabatas', '12345678', 'musab@musabatas.com', '', '', '', '', 3, 0, '0000-00-00', '', '', '', '', '', '1', '', '', '1', '2020-04-21 23:28:48', '2020-04-21 23:28:48', 0, 'customer'),
(16, 'Pablo', 'testranslator', 'admin123', 'efsobar@gmail.com', '1987654321', '', 'This is a test address', '', 3, 0, '0000-00-00', '', '', '', 'Here is my bio. ', '', '1', '', '', '1', '2020-05-02 01:22:39', '2020-05-02 01:22:39', 0, 'customer'),
(17, 'Ipek', 'ipek', 'ipek1234', 'ipek@imo.com', '', '', '', '', 3, 0, '0000-00-00', '', '', '', '', '', '1', '', '2020-05-13', '1', '2020-05-05 09:40:14', '2020-05-05 09:40:14', 2, 'customer'),
(25, 'dhanu info ', '', '', 'dhnauinfo@gmail.com', '', '', '', '', 3, 0, '0', '', '', 'https://lh4.googleusercontent.com/-yy0FZN9JYe4/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuckxTOEuvV2hB5KLls2vjqSa1vl5WA/photo.jpg', '', '112290830413591205250', '2', '', '', '0', '2020-05-19 14:11:33', '2020-05-19 14:11:33', 1, 'google'),
(27, 'Manoj Kumar', '', '', 'manojchaturvedi93@gmail.com', '', '', '', '', 3, 0, '0', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=3168327256567743&height=50&width=50&ext=1592492502&hash=AeSAiZ14KfJ1Dynf', '', '3168327256567743', '2', '', '', '0', '2020-05-19 15:01:43', '2020-05-19 15:01:43', 1, 'facebook'),
(28, 'Musab Atas', '', '', 'msbatas@gmail.com', '', '', '', '', 2, 0, '0', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=3158704844179659&height=50&width=50&ext=1592734935&hash=AeQ6bEqoGSsRoN_4', '', '3158704844179659', '2', '', '', '1', '2020-05-22 10:22:15', '2020-05-22 10:22:15', 1, 'facebook'),
(29, 'Musab AtaÅŸ ', '', '', 'musabatas@gmail.com', '', '', '', '', 2, 0, '0', '', '', 'https://lh3.googleusercontent.com/a-/AOh14GihuQYKmi1bNN2vEkf9BrnbzFwYbRJ7IxRqljrJ2g', '', '100222643551913034748', '2', '', '', '1', '2020-05-23 22:10:58', '2020-05-23 22:10:58', 1, 'google'),
(30, 'Mayank Upadhyay ', '', '', 'mayank.mangalgroup@gmail.com', '', '', '', '', 2, 0, '0', '', '', 'https://lh6.googleusercontent.com/-HAV8wyDv4D4/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucn8ht7mMx3F0CRtky09HaOlPXFLbA/photo.jpg', '', '114257815705154731148', '2', '', '', '1', '2020-05-28 03:43:13', '2020-05-28 03:43:13', 1, 'google');

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `translator_id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL DEFAULT ' ',
  `doc_type` varchar(255) NOT NULL,
  `doc_path` varchar(255) NOT NULL,
  `created_utc` varchar(255) NOT NULL DEFAULT ' ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `conversion_id` int(11) NOT NULL COMMENT 'get lang_conversion_id',
  `amount` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `status` enum('pending','processing','complete','forward') NOT NULL DEFAULT 'pending' COMMENT 'pending processing complete forward',
  `price_type` varchar(100) NOT NULL,
  `zone` varchar(300) NOT NULL,
  `note` varchar(300) DEFAULT NULL,
  `transation_id` int(11) NOT NULL,
  `request_status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending',
  `from_lang` int(11) NOT NULL,
  `to_lang` int(11) NOT NULL,
  `word_count` int(11) NOT NULL,
  `parent_request_id` int(11) NOT NULL DEFAULT 0 COMMENT 'parent_request_id= user_request.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_request`
--

INSERT INTO `user_request` (`id`, `customer_id`, `translator_id`, `pname`, `doc_type`, `doc_path`, `created_utc`, `created_at`, `modified_at`, `conversion_id`, `amount`, `delivery_date`, `status`, `price_type`, `zone`, `note`, `transation_id`, `request_status`, `from_lang`, `to_lang`, `word_count`, `parent_request_id`) VALUES
(1, 3, 2, 'Algebra', '1', '', '', '2020-05-13 05:26:14', '2020-05-13 05:26:14', 1, 200, '2020-05-14 13:00:00', 'complete', 'manual', 'SST', NULL, 22, 'pending', 1, 2, 1000, 0),
(2, 3, 2, 'scrience', '1', '', '', '2020-05-13 05:26:18', '2020-05-13 05:26:18', 1, 200, '2020-05-14 13:00:00', 'pending', 'manual', 'SST', NULL, 23, 'pending', 1, 2, 1000, 0),
(3, 3, 2, '', '1', '', '', '2020-05-12 05:27:32', '2020-05-13 05:27:32', 1, 200, '2020-05-14 13:00:00', 'pending', 'manual', 'SST', NULL, 24, 'pending', 1, 2, 1000, 0),
(4, 3, 2, '', '1', '', '', '2020-05-13 05:27:55', '2020-05-13 05:27:55', 1, 200, '2020-05-14 13:00:00', 'pending', 'manual', 'SST', NULL, 25, 'pending', 1, 2, 1000, 0),
(5, 3, 2, 'last', '2', '', '', '2020-05-13 05:56:29', '2020-05-13 05:56:29', 1, 2086, '2020-05-14 13:00:00', 'pending', 'manual', 'SST', NULL, 26, 'pending', 1, 2, 100, 0),
(6, 3, 2, 'History', '3', '', '', '2020-05-13 06:08:41', '2020-05-13 06:08:41', 1, 20045, '2020-05-14 13:00:00', 'pending', 'manual', 'SST', NULL, 27, 'pending', 1, 2, 1000, 0),
(8, 0, 2, ' ', '1', '', ' ', '2020-05-13 17:00:51', '2020-05-13 17:00:51', 1, 385, '2020-05-17 17:00:00', 'pending', 'auto_bid', 'SST', NULL, 10, 'pending', 1, 2, 1000, 0),
(9, 0, 2, ' ', '1', '', ' ', '2020-05-13 17:02:29', '2020-05-13 17:02:29', 1, 385, '2020-05-17 17:02:00', 'pending', 'auto_bid', 'SST', NULL, 11, 'pending', 1, 2, 1000, 0),
(10, 0, 2, ' ', '1', '', ' ', '2020-05-13 17:02:54', '2020-05-13 17:02:54', 1, 385, '2020-05-17 17:02:00', 'pending', 'auto_bid', 'SST', NULL, 12, 'pending', 1, 2, 1000, 0),
(11, 0, 2, '', '3', '', ' ', '2020-05-13 17:05:56', '2020-05-13 17:05:56', 1, 355, '2020-05-17 17:05:00', 'pending', 'auto_bid', 'SST', 'testing', 13, 'pending', 1, 2, 1000, 0),
(12, 0, 2, ' ', '1', '', ' ', '2020-05-13 17:48:47', '2020-05-13 17:48:47', 1, 385, '2020-05-17 17:48:00', 'pending', 'auto_bid', 'SST', NULL, 14, 'pending', 1, 2, 1000, 0),
(13, 0, 2, '', '1', '', ' ', '2020-05-13 18:56:29', '2020-05-13 18:56:29', 1, 385, '2020-05-13 13:00:00', 'pending', 'manual', 'SST', '', 15, 'pending', 1, 2, 1000, 0),
(14, 0, 2, '', '2', '', ' ', '2020-05-13 23:20:56', '2020-05-13 23:20:56', 1, 390, '2020-05-15 13:00:00', 'pending', 'manual', 'SST', '', 16, 'pending', 1, 2, 1000, 0),
(15, 0, 2, '', '1', '', ' ', '2020-05-16 05:47:21', '2020-05-16 05:47:21', 1, 385, '2020-05-20 05:47:00', 'pending', 'auto_bid', 'SST', 'My job ', 17, 'pending', 1, 2, 1000, 0),
(16, 28, 2, ' ', '1', '', ' ', '2020-05-22 10:22:51', '2020-05-22 10:22:51', 1, 765, '2020-05-26 10:22:00', 'pending', 'auto_bid', 'SST', NULL, 18, 'pending', 1, 2, 1000, 0),
(17, 0, 2, ' ', '1', '', ' ', '2020-05-23 12:55:11', '2020-05-23 12:55:11', 1, 385, '2020-05-28 17:00:00', 'pending', 'manual', 'SST', NULL, 19, 'pending', 1, 2, 1000, 0),
(18, 0, 2, ' ', '1', '', ' ', '2020-05-23 20:35:42', '2020-05-23 20:35:42', 1, 385, '2020-05-27 20:35:00', 'pending', 'auto_bid', 'SST', NULL, 20, 'pending', 1, 2, 1000, 0),
(19, 0, 2, ' ', '1', '', ' ', '2020-05-24 21:32:47', '2020-05-24 21:32:47', 1, 385, '2020-05-28 21:32:00', 'pending', 'auto_bid', 'SST', NULL, 21, 'pending', 1, 2, 1000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_conversion`
--
ALTER TABLE `lang_conversion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_doc_rushfee`
--
ALTER TABLE `my_doc_rushfee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`transation_id`);

--
-- Indexes for table `request_forword`
--
ALTER TABLE `request_forword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_translation`
--
ALTER TABLE `request_translation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_lang`
--
ALTER TABLE `system_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_exp`
--
ALTER TABLE `trans_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traslator_data`
--
ALTER TABLE `traslator_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tras_service`
--
ALTER TABLE `tras_service`
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
-- AUTO_INCREMENT for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lang_conversion`
--
ALTER TABLE `lang_conversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `my_doc_rushfee`
--
ALTER TABLE `my_doc_rushfee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `transation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `request_forword`
--
ALTER TABLE `request_forword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_translation`
--
ALTER TABLE `request_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_lang`
--
ALTER TABLE `system_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `trans_exp`
--
ALTER TABLE `trans_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `traslator_data`
--
ALTER TABLE `traslator_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tras_service`
--
ALTER TABLE `tras_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
