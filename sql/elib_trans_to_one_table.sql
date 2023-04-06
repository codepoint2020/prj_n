-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 11:35 AM
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
(78, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', '', '1204', 'philippines');

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
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `publication_date` varchar(50) DEFAULT NULL,
  `ISBN` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `cover_img` varchar(155) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `title`, `description`, `author_id`, `publisher_id`, `publication_date`, `ISBN`, `dept`, `cover_img`, `register_date`) VALUES
(1, 'Complete Guide in HTML, CSS & JavaScript\r\n', 'A detailed step by step web development practical guide designed to help beginners become professional developers.', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Full Stack Web Development for Beginners: A Pragmatic Guide', 'Learn to build your own web application from scratch and connect it to a database that you will also learn how to make.', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_external`
--

CREATE TABLE `tbl_external` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `user_type` varchar(9) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `emp_no` varchar(50) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_personnel`
--

INSERT INTO `tbl_personnel` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `emp_no`, `address_id`, `profile_pic`, `position`, `register_date`) VALUES
(1, 'John', 'smith', 'jsmith', 'John.smith@example.com', NULL, '12345', NULL, NULL, NULL, NULL),
(2, 'James', 'smith', 'jsmith', 'John.smith@example.com', NULL, '12345', NULL, NULL, NULL, NULL),
(3, 'Jerome', 'smith', 'jsmith', 'John.smith@example.com', NULL, '12345', NULL, NULL, NULL, NULL);

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
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `emp_no` varchar(50) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
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
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`user_id`, `course_id`, `instructor_id`, `first_name`, `middle_name`, `last_name`, `ext`, `user_type`, `username`, `email`, `password_e`, `contact_no`, `address_id`, `profile_pic`, `register_date`, `is_active`, `active_until`, `is_disabled`) VALUES
(103, NULL, NULL, 'jerome', NULL, 'morales', 'iii', 'student', 'jemor_232873', 'dex2386@gmail.com', '$2y$10$fsBBVC/52LuJvIOJukul3OjyRMuIFv793bpmLqY7QCJGt8Ji3lbAK', '1', 73, NULL, '2023-04-06', 'yes', '2023-07-06', 'no'),
(104, NULL, NULL, 'erick', NULL, 'morales', 'iv', 'student', 'ermor_235366', 'e.morales@example.com', '$2y$10$IVmnOl3CR2Hn3.Hyja.T1eDwyJgh5Hhs.7O.TtdPUzlCitpG4Bzui', '1', 74, 'id_104_VVkSV016', '2023-04-06', 'yes', '2023-07-06', 'no'),
(108, NULL, NULL, 'j', NULL, 'morales', 'none...', 'administrator', 'jmor_234701', 'j.morales@example.com', '$2y$10$GnEp5Ulr9KrLRDowUmXHAOKcGQ2ufZqm7NwoA4GK.fBfzQuFw/CCi', '1', 78, 'id_108_VdunU9118id_56_UYqle4911jerome morales facebook pic.jpg', '2023-04-06', 'yes', '2023-07-06', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sysadmin`
--

CREATE TABLE `tbl_sysadmin` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(60) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `ext` varchar(10) NOT NULL,
  `user_type` varchar(60) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password_e` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) NOT NULL,
  `emp_no` varchar(50) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `register_date` varchar(60) DEFAULT NULL,
  `is_active` varchar(10) DEFAULT NULL,
  `active_until` varchar(100) DEFAULT NULL,
  `is_disabled` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sysadmin`
--

INSERT INTO `tbl_sysadmin` (`user_id`, `first_name`, `middle_name`, `last_name`, `ext`, `user_type`, `username`, `email`, `password_e`, `contact_no`, `emp_no`, `address_id`, `profile_pic`, `register_date`, `is_active`, `active_until`, `is_disabled`) VALUES
(1, 'dexter', '', 'gonzales', '', '', 'dgonzales20', 'dexgonzales@gmail.com', '123456', '09491234567', 'emp101010', NULL, NULL, '10-10-10', 'yes', NULL, 'no');

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
-- Indexes for table `tbl_external`
--
ALTER TABLE `tbl_external`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_sysadmin`
--
ALTER TABLE `tbl_sysadmin`
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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_external`
--
ALTER TABLE `tbl_external`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbl_sysadmin`
--
ALTER TABLE `tbl_sysadmin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
