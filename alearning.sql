-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 08:49 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `accessID` int(11) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`accessID`, `Role`) VALUES
(1, 'System Admin'),
(2, 'Student'),
(3, 'accountant'),
(4, 'admin'),
(5, 'Registrar');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nrc` varchar(200) NOT NULL,
  `accessLevel` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `firstname`, `lastname`, `username`, `gender`, `nrc`, `accessLevel`, `address`, `email`, `phone`, `status`) VALUES
(1, 'Moonde', 'Mudimba', 'mudimba', 'Male', '273871/13/1', 'System Admin', 'Mkushi', 'mudimbamoonde@gmail.com', '096584029', 1),
(2, 'Mulambo', 'Maluba', 'malu', 'Female', '33333/12/1', 'accountant', 'kabwe', 'maluba@gmail.com', '096584456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `CourseName` varchar(200) NOT NULL,
  `CourseCode` varchar(200) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `CourseName`, `CourseCode`, `year`, `semester`) VALUES
(1, 'Advanced Physics', 'ICE102', 1, 1),
(2, 'Advanced Chemistry', 'ICE103', 1, 1),
(3, 'Bussiness/Communication Skills', 'ICE153', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursematerial`
--

CREATE TABLE `coursematerial` (
  `materialID` int(11) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursematerial`
--


-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `read` varchar(1) NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(10) NOT NULL,
  `programName` varchar(100) NOT NULL,
  `shortname` varchar(200) NOT NULL,
  `SchoolName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `programName`, `shortname`, `SchoolName`) VALUES
(1, 'Bachalor of Science in Information and Communications Technology', 'BSICT', 'Engineering'),
(2, 'Bachalor of  Information and Communications Technology with Education', 'BSICTEDU', 'Education'),
(3, 'Bachalor of  Information and Communications Technology in System Engineering', 'BSICTSE', 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `program_course`
--

CREATE TABLE `program_course` (
  `pc_id` int(11) NOT NULL,
  `CourseID` varchar(200) NOT NULL,
  `programID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_course`
--

INSERT INTO `program_course` (`pc_id`, `CourseID`, `programID`) VALUES
(1, '1', 74),
(2, '2', 74),
(3, '3', 74),
(4, '46', 74);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `sch_id` int(11) NOT NULL,
  `schoolName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sch_id`, `schoolName`) VALUES
(1, 'Engineering'),
(2, 'Education')

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`) VALUES
(1, 1),
(2, 2),
(3, 3)

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

CREATE TABLE `student1` (
  `st_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `othername` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `nrc` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `program` text NOT NULL,
  `programCode` varchar(200) NOT NULL,
  `doe` date NOT NULL,
  `address` text NOT NULL,
  `modeofstudy` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student1`
--

INSERT INTO `student1` (`st_id`, `firstname`, `lastname`, `othername`, `dob`, `nrc`, `age`, `gender`, `program`, `programCode`, `doe`, `address`, `modeofstudy`, `email`, `phone`, `status`) VALUES
(1, 'admin', 'admin', 'admin', '1989-07-31', '273443/13/1', 29, 'Male', 'Bachalor of Information and Communications Technology in System Engineering', 'BSICTSE', '2018-08-20', 'Mkushi secondary School,\np.o box 840020,\nmkushi', 'Distance', 'mudimbamoonde@gmail.com', 965840299, 1),
(2, 'Samuel', 'Judah', 'Ephiram', '1990-05-15', '11895/14/1', 28, 'Male', 'Bachalor of Information and Communications Technology with Education', '0', '2018-01-21', 'lusaka secondary School,\np.o box 550020,\nlusaka', 'Fulltime', 'mpande@gmail.com', 965840458, 0),
(3, 'Choongo', 'Moonde', 'Astorne', '1991-04-04', '23399/12/1', 24, 'Male', 'Bachalor of Science in Agriculture', '0', '2018-03-21', 'Luapula', 'Online', 'icu@icuzambia.net', 976471515, 0);
-- --------------------------------------------------------

--
-- Table structure for table `student_balance`
--

CREATE TABLE `student_balance` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `semester_id` int(11) UNSIGNED NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `balance` double NOT NULL,
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `asign_id` int(11) NOT NULL,
  `student_ID` int(100) NOT NULL,
  `programID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `grade` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`asign_id`, `student_ID`, `programID`, `course_ID`, `Semester`, `grade`) VALUES
(1, 1808273443, 4, 13, 1, NULL),
(2, 1808273443, 4, 14, 1, NULL),
(3, 1808273443, 4, 17, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_program`
--

CREATE TABLE `student_program` (
  `id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `studentID` int(100) NOT NULL,
  `programName` varchar(200) NOT NULL,
  `programCode` varchar(200) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date_enrolled` date DEFAULT NULL,
  `year` int(100) DEFAULT NULL,
  `program_duration` int(10) DEFAULT NULL,
  `years_studied` int(10) DEFAULT NULL,
  `completed` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_program`
--

INSERT INTO `student_program` (`id`, `student_id`, `studentID`, `programName`, `programCode`, `semester_id`, `type`, `date_enrolled`, `year`, `program_duration`, `years_studied`, `completed`) VALUES
(1, 1808273443, 7, 'Bachalor of Science in Information Security and Computer Foreignsics', 'BSISCF', 1, 'major', '2018-08-21', 1, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorialID` int(11) NOT NULL,
  `videoName` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial`
--
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nrc` varchar(100) DEFAULT NULL,
  `access_level` enum('System Admin','Student','accountant','admin','Registrar') DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nrc`, `access_level`, `name`, `email`) VALUES
('1808273443', 'aff795f0d1e1cc523e5e6ad9dfaf3db5', '454566/13/1', 'Student', 'Student name', 'student@gmail.com'),
('admin', '21232f297a57a5a743894a0e4a801fc3', '273871/13/1', 'System Admin', 'Admin', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`accessID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `coursematerial`
--
ALTER TABLE `coursematerial`
  ADD PRIMARY KEY (`materialID`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `to` (`from`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_course`
--
ALTER TABLE `program_course`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `student1`
--
ALTER TABLE `student1`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `student_balance`
--
ALTER TABLE `student_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`asign_id`);

--
-- Indexes for table `student_program`
--
ALTER TABLE `student_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorialID`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `nrc` (`nrc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `accessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `coursematerial`
--
ALTER TABLE `coursematerial`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `program_course`
--
ALTER TABLE `program_course`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student1`
--
ALTER TABLE `student1`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_balance`
--
ALTER TABLE `student_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `asign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_program`
--
ALTER TABLE `student_program`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursematerial`
--
ALTER TABLE `coursematerial`
  ADD CONSTRAINT `coursematerial_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
