-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 05:29 AM
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
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `affected` varchar(255) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `datelog` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `affected`, `item`, `datelog`) VALUES
(1, 109, 'Added', 'academics', 'A Global Force: The International Fleet of Warships', '1682636747'),
(2, 109, 'deleted', 'technology', 'he future of warship technology: cutting-edge innovations and trends', '1682640136'),
(3, 109, 'deleted', 'student', 'richard gonzales', '1682640275'),
(15, 109, 'activated', 'student', 'jeromeyyyy morales', '1682641870'),
(16, 109, 'deactivated', 'administrator', 'richard cruz', '1682641874'),
(17, 109, 'activated', 'administrator', 'richard cruz', '1682641878'),
(18, 109, 'activated', 'administrator', 'richard cruz', '1682641881'),
(19, 109, 'activated', 'administrator', 'richard cruz', '1682641888'),
(20, 109, 'activated', 'student', 'jeromeyyyy morales', '1682641896'),
(21, 109, 'activated', 'administrator', 'richard cruz', '1682641933'),
(22, 109, 'activated', 'administrator', 'richard cruz', '1682642006'),
(23, 109, 'deleted', 'administrator', 'richard cruz', '1682642069'),
(24, 109, 'deleted', 'student', 'jeromeyyyy morales', '1682642073'),
(26, 109, 'deactivated', 'student', 'jimmy carson', '1682642143'),
(27, 109, 'activated', 'student', 'jimmy carson', '1682642190'),
(28, 109, 'activated', 'student', 'jimmy carson', '1682642352'),
(29, 109, 'activated', 'student', 'jimmy carson', '1682642640'),
(30, 109, 'deleted', 'technology', 'the future of warship technology: cutting-edge innovations and trends', '1682642729'),
(31, 109, 'deleted', 'research', 'naval training', '1682642736'),
(32, 109, 'deleted', 'academics', 'a global force: the international fleet of warships', '1682642765'),
(33, 109, 'deleted', 'academics', 'a global force: the international fleet of warships', '1682642777'),
(34, 109, 'deleted', 'technology', 'the future of warship technology: cutting-edge innovations and trends', '1682642802'),
(35, 109, 'edit_category', 'technology', 'warfare', '1682813829'),
(36, 109, 'edit_category', 'warfare', 'military', '1682813888'),
(37, 109, 'edit_category', 'warfare', 'technology', '1682813929'),
(38, 109, 'edit_category', 'technology', 'research', '1682813954'),
(39, 109, 'edit_category', 'technology', 'warfare', '1682814021'),
(40, 109, 'edit_category', 'warfare', 'technology', '1682814033'),
(41, 109, 'edit_category', 'research', 'military', '1682814042'),
(42, 109, 'edit_category', 'military', 'research', '1682814053'),
(43, 109, 'added', 'category', 'health care', '1682814082'),
(44, 109, 'edit_category', 'technology', 'technology', '1682814503'),
(45, 109, 'edit_category', 'technology', 'technologies', '1682814638'),
(46, 109, 'edit_category', 'technologies', 'technology', '1682814654');

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
(79, '3850', 'J.P. Rizal Ave.', 'Tejeros', 'Makati', 'NCR', '1204', 'philippines'),
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
(106, 'manhattan ave', 'abc village', 'test', 'new york', 'new york', '1204', 'philippines'),
(107, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(108, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(109, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(110, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(111, '3850a', 'f. nazario st. brgy. singkamas', 'asdfasdf', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines'),
(112, 'asdfasdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'philippines'),
(113, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines'),
(114, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines');

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
  `file_type` varchar(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
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

INSERT INTO `tbl_books` (`book_id`, `file_name`, `file_type`, `title`, `category_id`, `category`, `details`, `author`, `publisher`, `publication_date`, `ISBN`, `dept`, `cover_img`, `register_date`, `date_updated`) VALUES
(9, 'FBES3-Designation-Gr 2-ICT Focal.pdf', 'pdf', 'BRAIN ANATOMY', 3, 'science', 'The brain is a complex organ that controls thought, memory, emotion, touch, motor skills, vision, breathing, temperature, hunger and every process that regulates our body. Together, the brain and spinal cord that extends from it make up the central nervous system, or CNS.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'DM 553  ROLL-OUT OF THE PRIME HRM SYSTEMS IN SCHOOLS.pdf', 'pdf', 'Electronic Engineering Research', 2, 'research', 'Electronic engineering is a sub-discipline of electrical engineering which emerged in the early 20th century and is distinguished by the additional use of active components such as semiconductor devices to amplify and control electric current flow.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'thewordsearch-com-simple-present-tense-5312137.pdf', 'pdf', 'WITH COVER IMAGE', 1, 'technology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, NULL, NULL, '002_TCTD_1680x1050.jpg', NULL, '1682814503'),
(15, 'English1_Q3_Weeks1to4_Binded_Ver1.0.pdf', 'pdf', 'GOOD BOOK', 1, 'technology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', '', NULL, NULL, NULL, NULL, 'iconfinder_Web_Developmen_1562687.png', NULL, '1682814503'),
(16, 'A_FOR TESTING PURPOSES ONLY.pdf', 'pdf', 'The Unseen Threat: Submarine Warfare in the 21st Century', 5, 'history', 'This book explores the role of submarines in modern naval warfare, including their history, tactics, and technological advancements.', '', NULL, NULL, NULL, NULL, 'id_16_lETFP5502023-04-10_09h00_44.png', '2023-04-10', NULL),
(17, 'A_FOR TESTING PURPOSES ONLY.pdf', 'pdf', 'The Golden Age of Piracy: A Comprehensive History', 5, 'history', 'This book takes a deep dive into the era of piracy during the 17th and 18th centuries, examining the lives of infamous pirates, their tactics, and the naval forces that pursued them.', '', NULL, NULL, NULL, NULL, 'id_17_eKiQz2062023-04-10_09h01_24.png', '2023-04-10', NULL),
(18, 'A_FOR TESTING PURPOSES ONLY.pdf', 'pdf', 'Navigating the High Seas: A Guide for Modern Sailors', 3, 'science', 'This practical guidebook covers everything from basic navigation to advanced seamanship techniques, with a focus on modern sailing practices and technologies.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-10', NULL),
(19, 'Naval_architecture.pdf', 'pdf', 'The Naval Architecture of Warships: Design and Construction', 1, 'technology', 'This technical manual covers the principles and practices of naval architecture, with a focus on designing and constructing modern warships for optimal performance and efficiency.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', '1682814503'),
(20, 'U.S._Navy_Cyber_Forces.pdf', 'pdf', 'Naval Intelligence: From Espionage to Cybersecurity', 1, 'technology', 'This book traces the history of naval intelligence gathering, from the use of spies and codebreaking to modern cybersecurity techniques and tactics.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', '1682814503'),
(21, 'Philippine_Navy.pdf', 'pdf', 'Anatomy of a Naval Disaster', 1, 'technology', 'This gripping account of one of the worst naval disasters in U.S. history examines the events leading up to the sinking of the USS Indianapolis, as well as the rescue efforts and aftermath of the tragedy.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', '1682814503'),
(22, 'id_22_pwFcH067Philippine_Navy.pdf', 'pdf', 'The Art of Shipbuilding: A Historical Overview\"', 5, 'history', 'This comprehensive book traces the evolution of shipbuilding techniques and technologies from ancient times to the present day, highlighting the innovations and challenges faced by shipbuilders throughout history.', '', NULL, NULL, NULL, NULL, NULL, '2023-04-16', NULL),
(23, 'id_23_hXRxf837Naval_architecture.pdf', '', 'The Art of Shipbuilding: A Historical Overvie', 5, 'history', 'This comprehensive book traces the evolution of shipbuilding techniques and technologies from ancient times to the present day, highlighting the innovations and challenges faced by shipbuilders throughout history.', '', NULL, NULL, NULL, NULL, 'id_23_rQalV1011d2.jpg', '2023-04-16', NULL),
(26, 'id_26_PCTnQ412U.S._Navy_Cyber_Forces.pdf', 'pdf', 'TESATD', 2, 'research', 'ASDFASDF', '', NULL, NULL, NULL, NULL, 'id_26_AbADZF591philippine_navy4.jpg', '2023-04-17', NULL),
(38, 'id_38_hlAbyH307war-46875.mp4', 'mp4', 'VIDEO UPLOAD TEST', 3, 'science', 'ASDFASDFASDF\r\nASDFASDFASDFASDFASDF\r\nASDFASDFASDFASDFASDF\r\nASDFASDFASDFASDFASDF\r\nASDFASDFASDFASDFASDF\r\nASDFASDFASDFASDFASDF\r\nASDFASDFASDFASDFASDF\r\nASDFASDF', 'JEROME MORALES', NULL, NULL, NULL, NULL, 'id_38_vPiin7042023-04-10_09h02_31.png', '2023-04-22', NULL),
(40, 'id_40_jVMeg720Dickinson_Sample_Slides.pptx', 'pptx', 'POWERPOINT UPLOAD TEST 2', 2, 'research', 'POWERPOINT UPLOAD TEST 2POWERPOINT UPLOAD TEST 2POWERPOINT UPLOAD TEST 2POWERPOINT UPLOAD TEST 2POWERPOINT UPLOAD TEST 2POWERPOINT UPLOAD TEST 2POWERPOINT UPLOAD TEST 2POWERPOINT UPLOAD TEST 2', 'Jerome Morales', NULL, NULL, NULL, NULL, 'id_40_emRNH026TCTD_December_Christmas.jpg', '2023-04-22', NULL),
(44, 'id_44_lCvGy568A TALK ABOUT WEB 1.0, WEB 2.0 and WEB 3.0 - THE EVOLUTION OF THE WEB.mp4', '', 'TEST ONLY', 1, 'technology', 'TEST ONLYTEST ONLYTEST ONLYTEST ONLYTEST ONLYTEST ONLYTEST ONLYTEST ONLYTEST ONLYTEST ONLYTEST ONLY', '', NULL, NULL, NULL, NULL, 'id_44_KnFtH439IMG_1589.JPG', '2023-04-22', '1682814503'),
(50, 'id_50_AMGIP916E-library-structure-2 (1).pptx', 'pptx', 'E LIBRARY STRUCTURE', 0, 'research', 'E LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTUREE LIBRARY STRUCTURE', 'Jerome Morales', NULL, NULL, NULL, NULL, 'id_50_nuMIE0002023-04-23_17h05_48.png', '2023-04-23', NULL),
(52, 'id_52_AzZFVs544Reading Week6-Day1.pptx', 'pptx', 'FOR DEMO ONLY', 0, 'technology', 'FOR DEMO ONLYFOR DEMO ONLYFOR DEMO ONLYFOR DEMO ONLYFOR DEMO ONLYFOR DEMO ONLY', 'jOHN smith', NULL, NULL, NULL, NULL, 'id_52_unWFP91111bird-7610726_960_720.jpg', '2023-04-23', NULL),
(53, 'id_53_vzKMS258war-46875.mp4', 'mp4', 'UPLOADING VIDEO', 0, 'academics', 'UPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEOUPLOADING VIDEO', 'Jerome Morales', NULL, NULL, NULL, NULL, 'id_53_AwLmT121boracay.jpg', '2023-04-23', NULL),
(54, 'id_54_IiMTT476Education.pdf', 'pdf', 'sadfasdf', 0, 'research', 'asdfasdf', 'asdf', NULL, NULL, NULL, NULL, 'id_54_iDz_A738', '2023-04-24', NULL),
(55, 'id_55_NKkUr597Education.pdf', 'pdf', 'asdf', 0, 'research', 'asdf', 'asdf', NULL, NULL, NULL, NULL, '', '2023-04-24', NULL),
(56, 'id_56_fmlRK875Phil-IRI-Full-Package-v1-1 (1).pdf', 'pdf', 'pdf', 0, 'research', 'asdasdf', 'Jerome Morales', NULL, NULL, NULL, NULL, 'camouflage-3525461_1920.jpg', '2023-04-27', NULL),
(57, 'id_57_DBZsf062DM-171-CONDUCT-OF-THE-END-OF-THE-SCHOOL-YEAR-EOSY-COMPREHENSIVE-RAPID-LITERACY-ASSESSMENT-EOSY-CRLA-AND-PHILIPPINE-INFORMAL-READING-INVENTORY-Phil-IRI-POST-TEST.pdf', 'pdf', 'test3', 0, 'technology', 'asdfasdf', '', NULL, NULL, NULL, NULL, 'wxp (1).jpg', '2023-04-27', NULL),
(58, 'id_58_NABjj076Phil-IRI-Full-Package-v1-1 (1).pdf', 'pdf', 'test again', 0, 'history', 'asdfasdfasdf', 'Jerome Morales', NULL, NULL, NULL, NULL, 'id_58_PlLOE5511wxp (17).jpg', '2023-04-27', NULL),
(59, 'id_59_sKKAbu332u-boat-16394.mp4', 'mp4', 'The Anatomy of a Warship: A Comprehensive Tour', 0, 'engineering', 'Explore the ins and outs of a warship, from the engine room to the bridge.', 'Jerome Morales', NULL, NULL, NULL, NULL, 'id_59_UyzuV5832023-04-22_10h10_29.png', '2023-04-27', NULL),
(60, 'id_60_uvsUO814902-1_902-4402_preview.mp4', 'mp4', 'The Weapons of War: An Inside Look at the Arsenal of a Warship', 0, 'technology', 'Take a closer look at the powerful weapons systems that enable warships to defend themselves and their missions.', '', NULL, NULL, NULL, NULL, 'id_60_JAAQA3311', '2023-04-27', NULL),
(61, 'id_61_XrMWo384906_906-0428_preview.mp4', 'mp4', 'From Battle to Peace: The USS Missouri Story', 0, 'history', ' Learn about the historic USS Missouri, which served in World War II, the Korean War, and the Gulf War before being decommissioned and turned into a museum.', 'John Smith', NULL, NULL, NULL, NULL, 'id_61_Tit_i8110', '2023-04-27', NULL),
(62, 'id_62_ZtLWL367hms-belfast-71402.mp4', 'mp4', 'The Evolution of Warship Design', 0, 'history', 'Trace the development of warship design over the centuries, from wooden galleons to modern steel behemoths.', '', NULL, NULL, NULL, NULL, 'id_62_AbpAzsR8882023-04-27_21h37_41.png', '2023-04-27', NULL),
(63, 'id_63_n_TZv436902-1_902-3660-PD1_preview.mp4', 'mp4', 'Maneuvering a Warship', 0, 'technology', 'The Skill and Science Behind Navigation\" - Get a behind-the-scenes look at the complex process of navigating a warship, from plotting courses to avoiding hazards.', 'John Smith', NULL, NULL, NULL, NULL, 'id_63_GHJTk2362023-04-27_21h35_45.png', '2023-04-27', NULL),
(64, 'id_64_DtvuM442world-of-warships-104400.mp4', 'mp4', 'The Men and Women Who Serve: Life on a Warshi', 0, 'technology', ' Meet the brave sailors who dedicate their lives to serving their country on board a warship, and learn about the unique challenges they face.', 'John Smith', NULL, NULL, NULL, NULL, 'id_64_kHbdr8272023-04-27_21h36_05.png', '2023-04-27', NULL),
(66, 'id_66_BYAbXd486istockphoto-1291692092-640_adpp_is.mp4', 'mp4', 'The Future of Warship Technology: Cutting-Edge Innovations and Trends', 0, 'technology', 'Get a glimpse of what the future holds for warship technology, from advanced weapons systems to innovative propulsion methods.', 'Juan Dela Cruz', NULL, NULL, NULL, NULL, 'id_66_VPeWx5152023-04-27_21h35_45.png', '2023-04-28', NULL);

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
  `date_updated` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `name`, `image`, `parent_id`, `register_date`, `date_updated`) VALUES
(1, 'technology', NULL, NULL, NULL, '1682814654'),
(2, 'research', NULL, NULL, NULL, ''),
(3, 'science', NULL, NULL, NULL, ''),
(4, 'language', NULL, NULL, NULL, ''),
(5, 'history', NULL, NULL, NULL, ''),
(6, 'academics', NULL, NULL, NULL, ''),
(7, 'engineering', NULL, NULL, NULL, ''),
(16, 'health care', NULL, NULL, '1682814082', '');

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
  `account_name` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password_e` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `contact_no2` varchar(50) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `register_date` varchar(60) DEFAULT NULL,
  `last_update` varchar(20) NOT NULL,
  `is_active` varchar(10) DEFAULT NULL,
  `active_until` varchar(100) NOT NULL,
  `is_disabled` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `course_id`, `instructor_id`, `account_name`, `first_name`, `middle_name`, `last_name`, `ext`, `sex`, `facebook`, `website`, `instagram`, `twitter`, `dob`, `user_type`, `username`, `email`, `password_e`, `contact_no`, `contact_no2`, `address_id`, `profile_pic`, `register_date`, `last_update`, `is_active`, `active_until`, `is_disabled`) VALUES
(109, NULL, NULL, '', 'Jerome', NULL, 'Morales', 'none...', 'M', 'my facebook test', 'http://jeromemorales.rf.gd/?i=1', 'my igtest', 'my twitter test', '10-12-1986', 'administrator', 'jemor_237753', 'jmorales@example.com', '$2y$10$7kC0nZHsYklT6cXOa3GYYOOscJ5brjy0O91kM42YfgeqHfScVqRBm', '09499106441', '1234567898790', 79, 'id_109_uvXJI720Lgp85-Blue-Crystal-My-Computer.ico', '2023-04-06', '1682761144', 'yes', '2024-04-01', 'no'),
(116, NULL, NULL, '', 'Jimmy James', NULL, 'Carson', 'jr.', 'F', '', '', '', '', '01-4-1968', 'student', 'jicar_239474', 'dex2386@gmail.com', '$2y$10$tg3xiieKCvTNUR02kFnc0.N9kga9d5Vo7OAQiqlCKd/L8j9eBqE5C', '1234578940', '', 92, 'id_116_EvAzD_5912020-06-26_11h34_01.png', '2023-04-10', '1682760406', 'yes', '2023-07-28', 'no'),
(117, NULL, NULL, '', 'cathy', NULL, 'manuel', 'none...', '', '', '', '', '', '', 'student', 'caman_234056', 'cath@example.com', '$2y$10$tg3xiieKCvTNUR02kFnc0.N9kga9d5Vo7OAQiqlCKd/L8j9eBqE5C', '1', '', 93, 'id_117_ZbdIS2492023-03-25_14h59_45.png', '2023-04-10', '', 'yes', '2023-07-28', 'no'),
(124, NULL, NULL, '', 'Isagani', NULL, 'Ortiz', 'none...', 'M', '', '', '', '', '02-7-1978', 'administrator', 'gaort_236894', 'gani.example@example.com', '$2y$10$36e93QmXFIdoGmLB.AGW9Olm2VX.8JFH7HwhWfFj/MwDdRgayhVaK', '123456789', '', 100, 'id_124_SWKqs274BillGates1.jpg', '2023-04-16', '1682760535', 'yes', '2023-07-21', 'no'),
(130, NULL, NULL, '', 'Mark', NULL, 'Smith', 'none...', '', '', '', '', '', '07-4-1970', 'student', 'masmi_237197', 'dex2386@gmail.com', '$2y$10$hWqtw0SCJWxlgqh6QHqvcuZhK5//Mg.c0tVEkA2TUwzwW9baQR1a6', '121212121', '', 106, 'id_130_cqdqv475123982620_365589587995448_4593238027550727225_n.jpg', '2023-04-17', '1682756312', 'yes', '2024-04-17', 'no'),
(131, NULL, NULL, '', 'Jamesxxxxxx', NULL, 'Gonzalesxxcvcvcvcvc', 'none...', '', '', '', '', '', '', 'student', 'jagon_231191', 'dex2386@gmail.com', '$2y$10$8M4HthtAGiyOPhPCsvfUruAgH8ZhNxw/BqBxTg.50J/AdUrvT4N/i', '555555555', '', 107, 'id_131_ATEdj677BillGates.jpg', '2023-04-21', '1682760840', 'yes', '2023-07-28', 'no');

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
(5, 'nsstc personnel', 'Access to references, access to students profiles, analytics, etc', '04-06-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
