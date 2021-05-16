-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 02:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `SubjectID` varchar(11) NOT NULL,
  `LessonID` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`SubjectID`, `LessonID`, `name`, `title`) VALUES
('2', '1', 'LyLy', 'hello'),
('2', '1', 'LyTan Loc', 'hello'),
('2', '1', 'teacher1', 'hello Lộc');

-- --------------------------------------------------------

--
-- Table structure for table `tblexercise`
--

CREATE TABLE `tblexercise` (
  `TEXT` varchar(90) CHARACTER SET utf8mb4 NOT NULL,
  `ExerciseID` int(11) NOT NULL,
  `LessonID` int(11) NOT NULL,
  `SubjectID` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `ExercisesDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexercise`
--

INSERT INTO `tblexercise` (`TEXT`, `ExerciseID`, `LessonID`, `SubjectID`, `ExercisesDate`) VALUES
('name file name.zip', 1, 2, '2', '12/12/2020'),
('name file name.zip', 2, 1, '2', '12/26/2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbllesson`
--

CREATE TABLE `tbllesson` (
  `LessonID` int(11) NOT NULL,
  `LessonChapter` varchar(90) NOT NULL,
  `SubjectID` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `FileLocation` text NOT NULL,
  `Category` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllesson`
--

INSERT INTO `tbllesson` (`LessonID`, `LessonChapter`, `SubjectID`, `FileLocation`, `Category`) VALUES
(1, 'Chapter1', '2', 'db_elearning.sql', 'Docs'),
(2, 'Chapter2', '2', 'MauBaocao.docx', 'Docs');

-- --------------------------------------------------------

--
-- Table structure for table `tblowner`
--

CREATE TABLE `tblowner` (
  `useremail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblowner`
--

INSERT INTO `tblowner` (`useremail`, `password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `StudentID` varchar(11) NOT NULL,
  `Fname` varchar(90) NOT NULL,
  `Lname` varchar(90) NOT NULL,
  `DateOfBirth` text NOT NULL,
  `MobileNo` varchar(90) NOT NULL,
  `STUDUSERNAME` varchar(90) NOT NULL,
  `STUDPASS` varchar(90) NOT NULL,
  `reset_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`StudentID`, `Fname`, `Lname`, `DateOfBirth`, `MobileNo`, `STUDUSERNAME`, `STUDPASS`, `reset_token`) VALUES
('1', 'Ly', 'Tan Loc', '14/01/2000', '0702993167', 'lytanloc141@gmail.com', '1', ''),
('2', 'Nguyen', 'Quang Huy', '11/30/2020', '0123456789', 'nqhuy.is.me@gmail.com', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `SubjectID` varchar(11) NOT NULL,
  `Subjects` varchar(50) NOT NULL,
  `Teacher` varchar(50) NOT NULL,
  `ROOM` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`SubjectID`, `Subjects`, `Teacher`, `ROOM`) VALUES
('11', 'CNPM', 'Thang', 'B203'),
('2', 'CTRR', 'Bình', 'A502'),
('9010138055f', 'CSDL', 'teacher1', 'B506');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubmits`
--

CREATE TABLE `tblsubmits` (
  `SubmitID` varchar(11) NOT NULL,
  `ExerciseID` varchar(11) NOT NULL,
  `Filesubmit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubmits`
--

INSERT INTO `tblsubmits` (`SubmitID`, `ExerciseID`, `Filesubmit`) VALUES
('13282316075', '1', 'bai1.py');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubstu`
--

CREATE TABLE `tblsubstu` (
  `SubjectID` varchar(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `Subjects` varchar(50) NOT NULL,
  `Teacher` varchar(50) NOT NULL,
  `ROOM` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubstu`
--

INSERT INTO `tblsubstu` (`SubjectID`, `StudentID`, `Subjects`, `Teacher`, `ROOM`) VALUES
('11', '1', 'CNPM', 'Thang', 'B203'),
('2', '1', 'CTRR', 'Bình', 'A502'),
('9010138055f', '1', 'CSDL', 'teacher1', 'B506');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubtea`
--

CREATE TABLE `tblsubtea` (
  `SubjectID` varchar(11) CHARACTER SET utf8 NOT NULL,
  `USERID` varchar(11) CHARACTER SET latin1 NOT NULL,
  `Subjects` varchar(50) NOT NULL,
  `Teacher` varchar(50) NOT NULL,
  `ROOM` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubtea`
--

INSERT INTO `tblsubtea` (`SubjectID`, `USERID`, `Subjects`, `Teacher`, `ROOM`) VALUES
('11', '1', 'CNPM', 'Thang', 'B203'),
('2', '1', 'CTRR', 'Bình', 'A502'),
('9010138055f', '1', 'CSDL', 'teacher1', 'B506');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `FNAME` varchar(90) CHARACTER SET utf8mb4 NOT NULL,
  `Lname` varchar(90) CHARACTER SET utf8mb4 NOT NULL,
  `DateOfBirth` text CHARACTER SET utf8mb4 NOT NULL,
  `MobileNo` varchar(90) CHARACTER SET utf8mb4 NOT NULL,
  `UEMAIL` varchar(90) CHARACTER SET utf8mb4 NOT NULL,
  `PASS` varchar(90) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FNAME`, `Lname`, `DateOfBirth`, `MobileNo`, `UEMAIL`, `PASS`) VALUES
('1', 'tea', 'cher1', '14/11/2000', '0123456789', 'teacher1@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblexercise`
--
ALTER TABLE `tblexercise`
  ADD PRIMARY KEY (`ExerciseID`),
  ADD KEY `LessonID` (`LessonID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `tbllesson`
--
ALTER TABLE `tbllesson`
  ADD PRIMARY KEY (`LessonID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `tblsubmits`
--
ALTER TABLE `tblsubmits`
  ADD PRIMARY KEY (`SubmitID`);

--
-- Indexes for table `tblsubstu`
--
ALTER TABLE `tblsubstu`
  ADD PRIMARY KEY (`SubjectID`,`StudentID`);

--
-- Indexes for table `tblsubtea`
--
ALTER TABLE `tblsubtea`
  ADD PRIMARY KEY (`SubjectID`,`USERID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblexercise`
--
ALTER TABLE `tblexercise`
  MODIFY `ExerciseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20180003;

--
-- AUTO_INCREMENT for table `tbllesson`
--
ALTER TABLE `tbllesson`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblexercise`
--
ALTER TABLE `tblexercise`
  ADD CONSTRAINT `tblexercise_ibfk_1` FOREIGN KEY (`LessonID`) REFERENCES `tbllesson` (`LessonID`),
  ADD CONSTRAINT `tblexercise_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `tblsubjects` (`SubjectID`);

--
-- Constraints for table `tbllesson`
--
ALTER TABLE `tbllesson`
  ADD CONSTRAINT `tbllesson_ibfk_1` FOREIGN KEY (`SubjectID`) REFERENCES `tblsubjects` (`SubjectID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
