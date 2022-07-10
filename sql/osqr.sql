-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2022 at 06:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osqr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(90) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'principal', 'pr@gmail.com', '1000'),
(2, 'principal', 'pr@gmail.com', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(3) NOT NULL,
  `branch_name` varchar(500) NOT NULL,
  `branch_access` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `branch_access`) VALUES
(1, 'CSE 1st Year', '1'),
(2, 'CSE 2nd Year', '1'),
(3, 'CSE 3rd Year', '1'),
(4, 'ELEX 1st Year', ''),
(5, 'ELEX 2nd Year', ''),
(6, 'ELEX 3rd Year', ''),
(7, 'PGDCA 1st Year', '1'),
(8, 'PGDCA 2nd Year', '1');

-- --------------------------------------------------------

--
-- Table structure for table `demo_att`
--

CREATE TABLE `demo_att` (
  `id` int(4) NOT NULL,
  `att_by` int(2) NOT NULL,
  `subject_name_a` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo_att`
--

INSERT INTO `demo_att` (`id`, `att_by`, `subject_name_a`) VALUES
(1, 17, 'Project(VK/DV)'),
(2, 15, 'Project(VK/DV)'),
(3, 16, 'Project(VK/DV)'),
(4, 16, 'Project(VK/DV)'),
(5, 18, 'Project(VK/DV)'),
(6, 18, 'Project(VK/DV)'),
(7, 16, 'Project(VK/DV)'),
(8, 16, '08:25');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(90) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_branch` int(4) NOT NULL,
  `added_by` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `user_name`, `user_email`, `user_password`, `user_branch`, `added_by`) VALUES
(4, 'Karan', 'karan@gmail.com', '123123', 2, 1),
(6, 'Aditya', 'aadi@gmail.com', '123123', 2, 0),
(13, 'Harsh', 'hk@gmail.com', '123123', 1, 1),
(14, 'Aditya Narayan Singh', 'ans@gmail.com', '123123', 3, 1),
(15, 'Sahab Ali ', 'sahab@gmail.com', '123123', 3, 1),
(16, 'Uttam kumar', 'uttam@gmail.com', '123123', 3, 1),
(17, 'Rahul Kumar', 'rahul@gmail.com', '123123', 3, 1),
(18, 'Satyam Kumar Singh', 'satyam@gmail.com', '123123', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stu_attendance`
--

CREATE TABLE `stu_attendance` (
  `id` int(4) NOT NULL,
  `imed` int(3) NOT NULL,
  `cloud_computing` int(3) NOT NULL,
  `android` int(3) NOT NULL,
  `dsml` int(3) NOT NULL,
  `project` int(3) NOT NULL,
  `attendance_by` int(4) NOT NULL,
  `attendance_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(12) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_time` varchar(30) NOT NULL,
  `subject_day` varchar(15) NOT NULL,
  `subject_teacher` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `subject_time`, `subject_day`, `subject_teacher`) VALUES
(1, 'Project(VK/VD)', '10:00', 'Monday', 1),
(2, 'Project(VK/VD)', '10:50', 'Monday', 1),
(3, 'IMED(AS)', '11:40', 'Monday', 2),
(4, 'IMED(AS)', '12:30', 'Monday', 2),
(5, 'Cloud Computing(DD)', '01:40', 'Monday', 4),
(6, 'Cloud Computing(DD)', '02:30', 'Monday', 4),
(7, 'Android(HD)', '03:20', 'Monday', 5),
(8, 'Android(HD)', '04:10', 'Monday', 5),
(9, 'Android(HD)', '10:00', 'Wednesday', 5),
(10, 'Android(HD)', '10:50', 'Wednesday', 5),
(11, 'DSML(VKS)', '11:40', 'Wednesday', 3),
(12, 'DSML(VKS)', '12:30', 'Wednesday', 3),
(13, 'Android Lab(HD/DV)', '01:40', 'Wednesday', 5),
(14, 'Android Lab(HD/DV)', '02:30', 'Wednesday', 5),
(15, 'IMED(AS)', '10:00', 'Thursday', 2),
(16, 'IMED(AS)', '10:50', 'Thursday', 2),
(17, 'Project(VK/DV)', '11:40', 'Thursday', 1),
(18, 'Project(VK/DV)', '12:30', 'Thursday', 1),
(19, 'DSML Lab(VKS/NY)', '01:40', 'Thursday', 3),
(20, 'Android Lab(HD/DV)', '03:20', 'Thursday', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`) VALUES
(1, 'dsdsdsd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(90) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `branch_teacher` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `user_name`, `user_email`, `user_password`, `branch_teacher`) VALUES
(1, 'Vaibhav Kishore', 'vs@gmail.com', '1200', '3'),
(2, 'Amit Singh', 'am@gmail.com', '1400', '3'),
(3, 'Vikalp Singh', 'vks@gmail.com', '1500', '3'),
(4, 'Deepika Dhawan', 'dd@gmail.com', '1600', '3'),
(5, 'Hem durgra pal', 'hdp@gmail.com', '1700', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_att`
--
ALTER TABLE `demo_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `demo_att`
--
ALTER TABLE `demo_att`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
