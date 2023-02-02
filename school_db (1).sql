-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 11:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'ajay', '123456'),
(2, 'example', '09876'),
(3, 'principal', '09876');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `teacher_id` varchar(20) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `totel_class` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`teacher_id`, `reg_num`, `totel_class`, `present`, `academic_year`, `class_id`) VALUES
('swt123', '21101', 90, 78, 2023, 1),
('swt123', '21102', 90, 85, 2023, 1),
('swt123', '21103', 90, 79, 2023, 1),
('PA243', '23601', 85, 80, 2023, 6);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_name` varchar(20) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_name`, `class_id`) VALUES
('1st ', 1),
('2nd', 2),
('3rd', 3),
('4th', 4),
('5th', 5),
('6th', 6),
('7th', 7),
('8th', 8),
('9th', 9),
('10th', 10);

-- --------------------------------------------------------

--
-- Table structure for table `class_handels`
--

CREATE TABLE `class_handels` (
  `class_id` int(11) NOT NULL,
  `teacher_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_handels`
--

INSERT INTO `class_handels` (`class_id`, `teacher_id`) VALUES
(5, 'AB101'),
(4, 'PA243'),
(5, 'PA243'),
(7, 'HARY568'),
(8, 'HARY568'),
(9, 'HARY568'),
(5, 'swt123'),
(2, 'PA243'),
(6, 'PA243'),
(1, 'swt123'),
(3, 'xyz123'),
(4, 'xyz123');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `admin_id` int(11) NOT NULL DEFAULT 1,
  `reg_num` varchar(20) NOT NULL,
  `class` int(11) NOT NULL,
  `totel` float NOT NULL,
  `paid` float NOT NULL,
  `balance` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`admin_id`, `reg_num`, `class`, `totel`, `paid`, `balance`, `time`) VALUES
(1, '21101', 1, 1000, 1000, 0, '2023-01-21 18:16:24'),
(1, '21102', 1, 1000, 1000, 0, '2023-01-28 14:17:36'),
(1, '21103', 1, 1000, 1000, 0, '2023-01-28 19:15:39'),
(1, '23601', 6, 6000, 6000, 0, '2023-01-31 19:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `teacher_id` varchar(20) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `sub_id` varchar(30) NOT NULL,
  `totel_marks` int(11) NOT NULL,
  `obtained` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`teacher_id`, `reg_num`, `sub_id`, `totel_marks`, `obtained`, `class_id`) VALUES
('swt123', '21102', 'EN_02', 50, 49, 1),
('swt123', '21103', 'EN_02', 50, 45, 1),
('swt123', '21101', 'EN_02', 50, 40, 1),
('PA243', '23601', 'HI_03', 50, 45, 6);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `admin_id` int(11) NOT NULL DEFAULT 1,
  `class_id` int(11) NOT NULL,
  `teacher_id` varchar(20) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`admin_id`, `class_id`, `teacher_id`, `role`) VALUES
(1, 1, 'swt123', 'class_teacher'),
(1, 6, 'PA243', 'class_teacher');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `admin_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(20) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bdate` date NOT NULL,
  `std` int(11) NOT NULL,
  `father_name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`admin_id`, `name`, `reg_num`, `gender`, `phone`, `email`, `bdate`, `std`, `father_name`, `address`, `password`) VALUES
(1, 'Ajaykumar B', '21101', 'male', 2147483647, 'ajay@gmail.com', '2008-02-11', 1, 'basavaraju', 'chitradurga', 'ajayb@123'),
(1, 'Divya', '21102', 'female', 59845849, 'divya@gmail.com', '2013-08-25', 1, 'mohan', 'T K layout', 'divya123'),
(1, 'Ashwal', '21103', 'male', 2147483647, 'ashwal@gmail.com', '2013-12-28', 1, 'kantharaju', 'km halli', 'ashwal123'),
(1, 'punith', '23601', 'male', 873723287, 'puni@gmail.com', '2010-07-13', 6, 'Chikswamy', 'Alahalli', 'puni@123');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `admin_id` int(11) NOT NULL DEFAULT 1,
  `sub_name` varchar(20) NOT NULL,
  `sub_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`admin_id`, `sub_name`, `sub_id`) VALUES
(1, 'Craft and arts', 'CA_07'),
(1, 'Computer', 'COM_08'),
(1, 'english', 'EN_02'),
(1, 'hindi', 'HI_03'),
(1, 'kannada', 'KA_01'),
(1, 'Maths', 'MA_06'),
(1, 'Science', 'SC_05'),
(1, 'social science', 'SS_04');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_name` varchar(30) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `sub` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `bdate` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `salary` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_name`, `tid`, `sub`, `gender`, `phone`, `email`, `bdate`, `address`, `salary`, `password`) VALUES
('Abcd', 'AB101', 'KA_01', 'male', 981828329, 'abcd@gmail.com', '1990-01-17', 'mysuru', 15000, 'abcd@123'),
('Harish', 'HARY568', 'SC_05', 'male', 2147483647, 'Harsh@gamil.com', '1995-06-27', 'tumukuru', 45000, 'hary123'),
('pavan', 'PA243', 'HI_03', 'male', 876252372, 'pavan@gamil.com', '1989-01-10', 'Banglore', 35000, 'pavan@123'),
('Shwetha', 'swt123', 'EN_02', 'male', 93943438, 'swtha@gmail.com', '1996-02-23', 'hiriyur', 45000, '123456'),
('xyz', 'xyz123', 'HI_03', 'male', 2147483647, 'xyz@gmail.com', '1986-01-11', 'Mysuru', 15000, 'xyz123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD KEY `attendence_ibfk_1` (`teacher_id`),
  ADD KEY `attendence_ibfk_2` (`reg_num`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_handels`
--
ALTER TABLE `class_handels`
  ADD KEY `class_handels_ibfk_1` (`class_id`),
  ADD KEY `class_handels_ibfk_2` (`teacher_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `reg_num` (`reg_num`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD KEY `marks_ibfk_1` (`teacher_id`),
  ADD KEY `marks_ibfk_2` (`reg_num`),
  ADD KEY `marks_ibfk_3` (`sub_id`),
  ADD KEY `marks_ibfk_4` (`class_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD KEY `staff_type_ibfk_1` (`admin_id`),
  ADD KEY `staff_type_ibfk_2` (`teacher_id`),
  ADD KEY `staff_type_ibfk_3` (`class_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_num`),
  ADD KEY `student_ibfk_1` (`admin_id`),
  ADD KEY `student_ibfk_2` (`std`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `sub` (`sub`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendence_ibfk_2` FOREIGN KEY (`reg_num`) REFERENCES `student` (`reg_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendence_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `class_handels`
--
ALTER TABLE `class_handels`
  ADD CONSTRAINT `class_handels_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_handels_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `fees_ibfk_2` FOREIGN KEY (`reg_num`) REFERENCES `student` (`reg_num`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`reg_num`) REFERENCES `student` (`reg_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD CONSTRAINT `staff_type_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_type_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_type_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`std`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
