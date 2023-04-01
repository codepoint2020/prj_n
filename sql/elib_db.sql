-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 01:10 AM
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
(23, '3850a', 'f. nazario st. brgy. singkamas', '', 'makati', 'ncr - manila, ncr, first district', '1204', 'philippines');

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
-- Table structure for table `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `personnel_id` int(11) NOT NULL,
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
  `staff_id` int(11) NOT NULL,
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
  `student_id` int(11) NOT NULL,
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

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `course_id`, `instructor_id`, `first_name`, `middle_name`, `last_name`, `ext`, `user_type`, `username`, `email`, `password_e`, `contact_no`, `address_id`, `profile_pic`, `register_date`, `is_active`, `active_until`, `is_disabled`) VALUES
(49, NULL, NULL, 'jerome', NULL, 'morales', 'sr.', 'student', 'jemor_239389', 'dex2386@gmail.com', '$2y$10$I5OLmHimwdVpida/CYKbU.kfarNz.IuV7hOZ22PftoIVOzDmjD0JK', '11111111111', 9, NULL, '2023-04-02', 'yes', '2023-10-02', 'no'),
(51, NULL, NULL, 'jerome', NULL, 'morales', 'ii', 'student', 'jemor_231964', 'dex2386@gmail.com', '$2y$10$I3xFa5ux8k7KCjk1ff6dA.SmbI7LP2z7caZvKWrYLOiw4KTtTASn6', '1', 21, NULL, '2023-04-02', 'yes', '2023-07-02', 'no'),
(52, NULL, NULL, 'jerome', NULL, 'morales', 'none...', 'choose...', 'jemor_239520', 'dex2386@gmail.com', '$2y$10$lw20XH.JEH8/5vKprrWaJuoxYANJ7LTzvG4m2ih9MYVmymh8J4gLa', '', 22, NULL, '2023-04-02', 'yes', '2023-07-02', 'no'),
(53, NULL, NULL, 'mark jerome', NULL, 'morales', 'sr.', 'external', 'mamor_231485', 'dex2386@gmail.com', '$2y$10$Pvt8ES0kGtpuv2s2qbzOM.lDgiLO1xEdD6dm6pow8pDEG8lhEGcAm', '12122323', 23, NULL, '2023-04-02', 'yes', '2023-07-02', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sysadmin`
--

CREATE TABLE `tbl_sysadmin` (
  `sysadmin_id` int(11) NOT NULL,
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
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(11) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `register_date` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- Indexes for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_sysadmin`
--
ALTER TABLE `tbl_sysadmin`
  ADD PRIMARY KEY (`sysadmin_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_sysadmin`
--
ALTER TABLE `tbl_sysadmin`
  MODIFY `sysadmin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
