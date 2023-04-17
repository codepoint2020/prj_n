-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 04:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elib_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `address_id` int(11) NOT NULL,
  `house_no` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `brgy` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`address_id`, `house_no`, `street`, `brgy`, `city`, `province`, `zipcode`, `country`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '1204', 'philippines'),
(2, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(3, '3850a', 'f. nazario st.', 'brgy. singkamas', 'makati', 'ncr', '1204', 'philippines'),
(4, '3850a', 'f. nazario st.', 'brgy. singkamas', 'makati', 'ncr', '1204', 'philippines'),
(5, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(6, '3850a', 'f. nazario st.', 'brgy. singkamas', 'makati', 'ncr', '1204', 'philippines'),
(7, '3850a', 'f. nazario st.', 'brgy. tejeros', 'makati', 'ncr', '1204', 'philippines'),
(8, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(9, '3850a', 'f. nazario st. brgy. singkamas', 'sadfasdf', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(10, '3850a', 'f. nazario st.', 'brgy. singkamas', 'makastrstri', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(11, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(12, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(13, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(14, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(15, '', '', '', '', '', '', 'philippines'),
(16, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(17, '', '', '', '', '', '', 'philippines'),
(18, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(19, '3850a', 'f. nazario st. brgy. singkamas', 'brgy. singkamas', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(20, '', '', '', '', '', '', 'philippines'),
(21, '3850a', 'f. nazario st. brgy. singkamas', 'brgy. singkamas', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(22, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(23, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(24, '3850a', 'f. nazario st. brgy. singkamas', 'xxxx', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(25, '3850a', 'f. nazario st. brgy. singkamas', 'xxxx', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(26, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(27, '3850a', 'f. nazario st. brgy. singkamas', 'sdf', 'makati', 'sdf', '1204', 'philippines'),
(28, '3850a', 'f. nazario st. brgy. singkamas', 'brgy. singkamas', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(29, '3850a', 'f. nazario st. brgy. singkamas', 'brgy. singkamas', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(30, '', '', '', '', '', '', 'philippines'),
(31, '', '', '', '', '', '', 'philippines'),
(32, '', '', '', '', '', '', 'philippines'),
(33, '', '', '', '', '', '', 'philippines'),
(34, '', '', '', '', '', '', 'philippines'),
(35, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(36, '', '', '', '', '', '', 'philippines'),
(37, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(38, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(39, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(40, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(41, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(42, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(43, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(44, '', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(45, '', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(46, '', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(47, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(48, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(49, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(50, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(51, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(52, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(53, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(54, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(55, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(56, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(57, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(58, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(59, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(60, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(61, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(62, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(63, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(64, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(65, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(66, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(67, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(68, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(69, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(70, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(71, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(72, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(73, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(74, '', '', '', '', '', '', 'philippines'),
(75, '', '', '', '', '', '', 'philippines'),
(76, '', '', '', '', '', '', 'philippines'),
(77, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(78, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(79, '3850a', 'f. nazario st. brgy. singkamas', 'brgy. singkamas', 'makati', 'ncr', '1204', 'philippines'),
(80, '3850a', 'f. nazario st. brgy. singkamas', 'ammon', 'makati', 'ncr', '1204', 'philippines'),
(81, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(82, '', '', '', '', '', '', 'philippines'),
(83, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(84, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(85, 'russia', 'xxxxxxxxxxxxxx', 'pangudtan', 'usa', '', '1204', 'philippines'),
(86, 'jjjjjjjjjjjjj', 'f. nazario st. brgy. singkamas', 'jjjjjj', 'makati', 'jjjjjjj', '1204', 'philippines'),
(87, '3850a', 'f. nazario st. brgy. singkamas', '888888888888888888888', 'makati', '8888888888', '1204', 'philippines'),
(88, '3850a3850a3850a3850a3850a3', 'f. nazario st. brgy. singkamas', 'xxx', 'makati', '', '1204', 'philippines'),
(89, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(90, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(91, '3850a', 'f. nazario st. brgy. singkamas', '12', 'makati', '', '1204', 'philippines'),
(92, '', 'ayala-paseo de roxas', '', 'makati', '', '1226', 'philippines'),
(93, '', '', 'bangkal', 'makati', 'ncr', '1233', 'philippines'),
(94, '', '', 'guadalupe nuevo', 'makati', 'ncr', '1212', 'philippines'),
(95, '3850a', '', 'san lorenzo village', 'makati', 'ncr', '1223', 'philippines'),
(96, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(97, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(98, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(99, '3850a', 'example st', 'barangay name', 'makati', '', '1204', 'philippines'),
(100, '3850a', 'test', 'test', 'makati', 'test', '1204', 'philippines'),
(101, 'apt 1', 'street name', 'bgy', 'makati', 'ncr', '1204', 'philippines'),
(102, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(103, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(104, '3850a', 'f. nazario st. brgy. singkamas', 'sadf', 'makati', '', '1204', 'philippines'),
(105, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(106, 'manhattan ave', 'abc village', 'test', 'new york', 'new york', '1204', 'philippines');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `image` varchar(155) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `book_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publisher` varchar(60) DEFAULT NULL,
  `publication_date` varchar(50) DEFAULT NULL,
  `ISBN` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `cover_img` varchar(155) DEFAULT NULL,
  `register_date` varchar(50) DEFAULT NULL,
  `date_updated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `file_name`, `title`, `category`, `details`, `author`, `publisher`, `publication_date`, `ISBN`, `dept`, `cover_img`, `register_date`, `date_updated`) VALUES
(9, 'FBES3-Designation-Gr 2-ICT Focal.pdf', 'BRAIN ANATOMY', 'science', 'The brain is a complex organ that controls thought, memory, emotion, touch, motor skills, vision, breathing, temperature, hunger and every process that regulates our body. Together, the brain and spinal cord that extends from it make up the central nervous system, or CNS.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'DM 553  ROLL-OUT OF THE PRIME HRM SYSTEMS IN SCHOOLS.pdf', 'Electronic Engineering Research', 'research', 'Electronic engineering is a sub-discipline of electrical engineering which emerged in the early 20th century and is distinguished by the additional use of active components such as semiconductor devices to amplify and control electric current flow.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'thewordsearch-com-simple-present-tense-5312137.pdf', 'WITH COVER IMAGE', 'technology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, NULL, NULL, '002_TCTD_1680x1050.jpg', NULL, NULL),
(15, 'English1_Q3_Weeks1to4_Binded_Ver1.0.pdf', 'GOOD BOOK', 'technology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', '', NULL, NULL, NULL, NULL, 'iconfinder_Web_Developmen_1562687.png', NULL, NULL),
(16, 'A_FOR TESTING PURPOSES ONLY.pdf', 'The Unseen Threat: Submarine Warfare in the 21st Century', 'history', 'This book explores the role of submarines in modern naval warfare, including their history, tactics, and technological advancements.', '', NULL, NULL, NULL, NULL, 'id_16_lETFP5502023-04-10_09h00_44.png', '2023-04-10', NULL),
(17, 'A_FOR TESTING PURPOSES ONLY.pdf', 'The Golden Age of Piracy: A Comprehensive History', 'history', 'This book takes a deep dive into the era of piracy during the 17th and 18th centuries, examining the lives of infamous pirates, their tactics, and the naval forces that pursued them.', '', NULL, NULL, NULL, NULL, 'id_17_eKiQz2062023-04-10_09h01_24.png', '2023-04-10', NULL),
(18, 'A_FOR TESTING PURPOSES ONLY.pdf', 'Navigating the High Seas: A Guide for Modern Sailors', 'science', 'This practical guidebook covers everything from basic navigation to advanced seamanship techniques, with a focus on modern sailing practices and technologies.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-10', NULL),
(19, 'Naval_architecture.pdf', 'The Naval Architecture of Warships: Design and Construction', 'technology', 'This technical manual covers the principles and practices of naval architecture, with a focus on designing and constructing modern warships for optimal performance and efficiency.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', NULL),
(20, 'U.S._Navy_Cyber_Forces.pdf', 'Naval Intelligence: From Espionage to Cybersecurity', 'technology', 'This book traces the history of naval intelligence gathering, from the use of spies and codebreaking to modern cybersecurity techniques and tactics.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', NULL),
(21, 'Philippine_Navy.pdf', 'Anatomy of a Naval Disaster', 'technology', 'This gripping account of one of the worst naval disasters in U.S. history examines the events leading up to the sinking of the USS Indianapolis, as well as the rescue efforts and aftermath of the tragedy.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', NULL),
(22, 'id_22_pwFcH067Philippine_Navy.pdf', 'The Art of Shipbuilding: A Historical Overview\"', 'history', 'This comprehensive book traces the evolution of shipbuilding techniques and technologies from ancient times to the present day, highlighting the innovations and challenges faced by shipbuilders throughout history.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', NULL),
(23, 'id_23_hXRxf837Naval_architecture.pdf', 'The Art of Shipbuilding: A Historical Overvie', 'history', 'This comprehensive book traces the evolution of shipbuilding techniques and technologies from ancient times to the present day, highlighting the innovations and challenges faced by shipbuilders throughout history.', '', NULL, NULL, NULL, NULL, 'id_23_rQalV1011d2.jpg', '2023-04-16', NULL),
(26, 'id_26_PCTnQ412U.S._Navy_Cyber_Forces.pdf', 'TESATD', 'research', 'ASDFASDF', '', NULL, NULL, NULL, NULL, 'id_26_AbADZF591philippine_navy4.jpg', '2023-04-17', NULL),
(28, 'id_28_VgbQk177Naval_architecture.pdf', 'asdfasdfasd', 'research', 'asdfasdfasdf', '', NULL, NULL, NULL, NULL, 'id_28_bMCaB1166BillGates1.jpg', '2023-04-17', NULL),
(29, 'id_29_DnarP1192U.S._Navy_Cyber_Forces.pdf', 'asdffddfd', 'research', 'asdf', '', NULL, NULL, NULL, NULL, 'id_29_FZjLF514philippine_navy5.jpg', '2023-04-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `register_date` varchar(100) DEFAULT NULL,
  `date_updated` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `name`, `image`, `parent_id`, `register_date`, `date_updated`) VALUES
(1, 'technology', NULL, NULL, NULL, ''),
(2, 'research', NULL, NULL, NULL, ''),
(3, 'science', NULL, NULL, NULL, ''),
(4, 'language', NULL, NULL, NULL, ''),
(5, 'history', NULL, NULL, NULL, ''),
(6, 'academics', NULL, NULL, NULL, ''),
(7, 'engineering', NULL, NULL, NULL, ''),
(8, 'testonly', NULL, NULL, NULL, ''),
(9, 'anothertest', NULL, NULL, NULL, ''),
(12, 'zzzz', NULL, NULL, NULL, ''),
(14, 'asdf', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_publisher`
--

CREATE TABLE `tbl_publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address_id` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `user_type` varchar(60) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password_e` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `register_date` varchar(60) DEFAULT NULL,
  `is_active` varchar(10) DEFAULT NULL,
  `active_until` varchar(100) NOT NULL,
  `is_disabled` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `course_id`, `instructor_id`, `first_name`, `middle_name`, `last_name`, `ext`, `user_type`, `username`, `email`, `password_e`, `contact_no`, `address_id`, `profile_pic`, `register_date`, `is_active`, `active_until`, `is_disabled`) VALUES
(109, NULL, NULL, 'jerome', NULL, 'morales', 'none...', 'administrator', 'jemor_237753', 'jmorales@example.com', '$2y$10$Sg31jXhstW5kBQeRDyC9cehaYT5xZb6CXXSw63tWrAYptNbrjDDNK', '1', 79, 'me.jpg', '2023-04-06', 'yes', '2024-04-06', 'no'),
(116, NULL, NULL, 'jimmy', NULL, 'carson', 'jr.', 'student', 'jicar_239474', 'dex2386@gmail.com', '$2y$10$14.AXCnJPr8td/lvApObfO8gPr4O/Va9XP.cHTcOX.E9pYKzZlWkK', '12345', 92, 'id_116_EvAzD_5912020-06-26_11h34_01.png', '2023-04-10', 'yes', '2023-10-10', 'no'),
(117, NULL, NULL, 'cathy', NULL, 'manuel', 'none...', 'student', 'caman_234056', 'cath@example.com', '$2y$10$S95yi8NnFnVEM3Ko.YHhq.4OQH4Lkga4m79rCzFuC0PsMFpIC510G', '1', 93, 'id_117_ZbdIS2492023-03-25_14h59_45.png', '2023-04-10', 'yes', '2023-07-10', 'no'),
(124, NULL, NULL, 'gani', NULL, 'ortiz', 'none...', 'administrator', 'gaort_236894', 'gani.example@example.com', '$2y$10$rGLG0AcTAgpCiv/AnEU2IuTtyw/3GSBaEwFP10yriMXTdPsG4i6X2', '123456789', 100, 'id_124_HvHIl1170id_105_xtUxk488gani.png', '2023-04-16', 'yes', '2023-07-16', 'no'),
(125, NULL, NULL, 'emma', NULL, 'dela cruz', 'none...', 'student', 'emdel_239317', 'emma.delacruz@gmail.com', '$2y$10$hcN9q9RznnE/.FKZokKui.Xdc.FqaXfvpWESGchwvJvzW5PWLX0LK', '123456789', 101, 'id_125_qffVx149id_122_USwot4342023-03-25_14h59_14.png', '2023-04-16', 'yes', '2024-01-16', 'no'),
(126, NULL, NULL, 'jeromex', NULL, 'morales', 'none...', '', 'jemor_230946', 'dex2386@gmail.com', '$2y$10$SVGt4d7boe1W0wjd6hi8x.Y5jhdgMppcD7wQLUiPQe0FfQkPDMyUS', '1', 102, 'id_126_eXYvb232', '2023-04-16', 'yes', '2023-07-16', 'no'),
(127, NULL, NULL, 'jeromezz', NULL, 'morales', 'none...', 'student', 'jemor_237376', 'dex2386@gmail.com', '$2y$10$Nj0WVk2uI6neDkBtqUGcT.6rnUfNL/hTEA1WGpvkV16WERiZcOCpO', '1', 103, NULL, '2023-04-16', 'yes', '2023-07-16', 'no'),
(128, NULL, NULL, 'jeromennnnn', NULL, 'moralesnnn', 'none...', '', 'jemor_238779', 'dex2386@gmail.com', '$2y$10$U5Cxk1YxARhlY8c9jGjMVeuvJ4n61VjAmtsF9oFeBn4UFWahwjmCu', '13245', 104, 'id_128_qXkuj1911id_58_nDQyX6711Elan0007.jpg', '2023-04-16', 'yes', '2023-07-16', 'no'),
(129, NULL, NULL, 'jerome', NULL, 'morales', 'none...', '', 'jemor_230482', 'dex2386@gmail.com', '$2y$10$xyP3KOS9jXG6ZRKHS2dndOe2FjaELQ6upJKPS.WHudkUazWpEFHUe', '1', 105, NULL, '2023-04-16', 'yes', '2023-07-16', 'no'),
(130, NULL, NULL, 'mark', NULL, 'smith', 'none...', 'student', 'masmi_237197', 'dex2386@gmail.com', '$2y$10$f4nDi5.xKKuZJKhBbwOZAeSD7YI4iroVTrfKl9P9/292eHraVy3rW', '121212121', 106, 'id_130_cqdqv475123982620_365589587995448_4593238027550727225_n.jpg', '2023-04-17', 'yes', '2024-04-17', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(11) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `register_date` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `type_name`, `description`, `register_date`) VALUES
(1, 'administrator', 'Website maintainance', '10-10-10'),
(2, 'student', 'Users of references', '04-06-23'),
(3, 'staff', 'Content management', '04-06-23'),
(4, 'guest', 'Access to references', '04-06-23'),
(5, 'personnel', 'Access to references, access to students profiles, analytics, etc', '04-06-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
