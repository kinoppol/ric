-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 03:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vos`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `section` varchar(100) DEFAULT NULL,
  `photo_cover` varchar(100) DEFAULT NULL,
  `state` enum('ACTIVE','ARCHIVED') NOT NULL DEFAULT 'ACTIVE',
  `owner` varchar(100) NOT NULL,
  `creationTime` datetime NOT NULL,
  `updateTime` datetime NOT NULL,
  `publicationTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses_materials`
--

CREATE TABLE `courses_materials` (
  `id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `topics_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `state` enum('PUBLISH','DRAFT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses_student`
--

CREATE TABLE `courses_student` (
  `id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `enroll_time` datetime NOT NULL,
  `state` enum('PENDING','ACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses_teacher`
--

CREATE TABLE `courses_teacher` (
  `courses_id` int(11) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `state` enum('PENDING','ACTIVE') NOT NULL DEFAULT 'PENDING',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ความสัมพันธ์ของครูผู้สอนกับชั้นเรียน';

-- --------------------------------------------------------

--
-- Table structure for table `courses_topics`
--

CREATE TABLE `courses_topics` (
  `id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_work`
--

CREATE TABLE `course_work` (
  `id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `topics_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `max_points` float NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `id` varchar(32) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`id`, `value`) VALUES
('systemName', 'VOS');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT 2,
  `picture` varchar(100) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `password`, `email`, `name`, `surname`, `user_type_id`, `picture`, `active`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', '', '', '', 1, NULL, '1'),
(3, 'noppol', '8689391a8b93cd2d55ccf3f436eef4e2', 'noppol@rvc.ac.th', '', '', 3, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(32) NOT NULL,
  `active_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`, `active_menu`) VALUES
(1, 'admin', 'admin,\ncourses,\nuser_menu'),
(2, 'user', 'courses_enroll,\r\nuser_menu'),
(3, 'teacher', 'courses_teaching,\r\nuser_menu'),
(4, 'student', 'courses_enroll,\r\nuser_menu,'),
(5, 'CVM', 'cvm_management,\r\nuser_menu'),
(6, 'admin_school', 'admin_school,\r\nuser_menu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_materials`
--
ALTER TABLE `courses_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_student`
--
ALTER TABLE `courses_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_teacher`
--
ALTER TABLE `courses_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_topics`
--
ALTER TABLE `courses_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_work`
--
ALTER TABLE `course_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_materials`
--
ALTER TABLE `courses_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_student`
--
ALTER TABLE `courses_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_teacher`
--
ALTER TABLE `courses_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_topics`
--
ALTER TABLE `courses_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_work`
--
ALTER TABLE `course_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
