-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 11:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_pin` varchar(100) NOT NULL,
  `admin_image` varchar(1000) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`, `admin_pin`, `admin_image`, `status`) VALUES
(1, 'MD AL-AMIN', 'alamin@gmail.com', '123456', 'alamin123', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_type` varchar(100) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `member_pin` varchar(100) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_username` varchar(100) NOT NULL,
  `member_password` varchar(100) NOT NULL,
  `member_image` varchar(1000) NOT NULL,
  `status` varchar(11) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_auth_info`
--

CREATE TABLE `faculty_auth_info` (
  `id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_type` varchar(100) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `member_pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_subject` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `post_description` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `post_link` varchar(1000) DEFAULT 'null',
  `post_file` varchar(1000) DEFAULT 'null',
  `posted_by` varchar(11) CHARACTER SET utf8 NOT NULL,
  `poster_name` varchar(100) NOT NULL,
  `poster_pin` varchar(11) NOT NULL,
  `post_date` varchar(11) NOT NULL,
  `post_time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_class` varchar(11) NOT NULL,
  `student_roll` int(11) NOT NULL,
  `student_pin` varchar(11) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_username` varchar(100) NOT NULL,
  `student_password` varchar(100) NOT NULL,
  `student_image` varchar(100) NOT NULL,
  `status` varchar(11) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_auth_info`
--

CREATE TABLE `student_auth_info` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_class` varchar(11) NOT NULL,
  `student_roll` int(11) NOT NULL,
  `student_pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_auth_info`
--
ALTER TABLE `faculty_auth_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_pin` (`member_pin`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_username` (`student_username`),
  ADD UNIQUE KEY `student_pin` (`student_pin`);

--
-- Indexes for table `student_auth_info`
--
ALTER TABLE `student_auth_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_pin` (`student_pin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty_auth_info`
--
ALTER TABLE `faculty_auth_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_auth_info`
--
ALTER TABLE `student_auth_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
