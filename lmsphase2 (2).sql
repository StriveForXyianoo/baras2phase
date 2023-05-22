-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 04:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmsphase2`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `ID` int(11) NOT NULL,
  `USERID` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL,
  `ROLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`ID`, `USERID`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES
(4, '1234', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ADMINISTRATOR'),
(9, 'ugWjI', 'yuukihan0523@gmail.com', 't2Qnv6WJ6jf4', 'INSTRUCTOR'),
(10, 'gBrALy', '', 'e19ba353fd881bd4806ac46816a0c856', ''),
(11, 'fkee8Q', '', '0e1ed7a66aec2bdd79d17799bf5f0fe5', ''),
(12, 'aR6gyO', '', 'ad7bdea7746dc40724c4303405e8ea61', ''),
(13, '7FfbjA', 'yuukihan0523@gmail.com', 'a0db2d3459c866f7c3ec02f65bd523f7', 'ADMINISTRATOR'),
(14, 'bbxdzQ', 'admin@admin.com', '5adf80d9db7feb0acef2d3bf23c82c06', 'ADMINISTRATOR'),
(15, 'RslWew', 'kent.troubleshooter@gmail.com', '420895af5350d110055be93ed2fd6f06', 'INSTRUCTOR'),
(16, '7zyjok', 'abel2004h@gmail.com', '75a5eef900a1fd3a290aac2b47305529', 'ADMINISTRATOR'),
(17, 'Ms7nQG', 'abel2004h@gmail.com', '8bbeb2c7744fff0a0992f324ef3e8e71', 'ADMINISTRATOR'),
(18, 'fnDEp5', 'amaycardo@student.fatima.edu.ph', '331445966c74b2d89d4f758b65a3c0b1', 'INSTRUCTOR');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DATE` varchar(250) NOT NULL,
  `TIME` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ID`, `TITLE`, `DESCRIPTION`, `DATE`, `TIME`, `STATUS`, `who`) VALUES
(7, 'Intramurals 2024', 'When\r\nWhat\r\nColor', '2023-05-22', '10:24', 'ACTIVE', 'ltagaG');

-- --------------------------------------------------------

--
-- Table structure for table `enrolsubject`
--

CREATE TABLE `enrolsubject` (
  `ID` int(11) NOT NULL,
  `SUBJECTID` varchar(255) NOT NULL,
  `STUDENTID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolsubject`
--

INSERT INTO `enrolsubject` (`ID`, `SUBJECTID`, `STUDENTID`) VALUES
(1, 'zTADEi', '210321'),
(3, 'Z623Zm', '210321'),
(5, 'jsYagG', '122121'),
(6, 'jsYagG', '1101'),
(7, 'jsYagG', '1102'),
(8, 'jsYagG', '1103'),
(9, 'jsYagG', '1104'),
(10, 'jsYagG', '1105'),
(11, 'jsYagG', '1106'),
(12, 'jsYagG', '1107'),
(14, 'jsYagG', '1109'),
(15, 'jsYagG', '1110'),
(16, 'jsYagG', '1111'),
(17, 'jsYagG', '1112'),
(19, 'l0KJTN', '1101'),
(20, 'l0KJTN', '1102'),
(21, 'l0KJTN', '1103'),
(22, 'l0KJTN', '1104'),
(23, 'l0KJTN', '1105'),
(24, 'l0KJTN', '1106'),
(25, 'l0KJTN', '1107'),
(26, 'l0KJTN', '1108'),
(27, 'l0KJTN', '1109'),
(28, 'l0KJTN', '1110'),
(29, 'l0KJTN', '1111'),
(30, 'l0KJTN', '1112'),
(32, 'l0KJTN', '2103210'),
(34, 'l3BfSu', '123456789'),
(35, 'nQlP3G', '122121'),
(36, 'nQlP3G', '1101'),
(37, 'nQlP3G', '1102'),
(38, 'nQlP3G', '1103'),
(39, 'nQlP3G', '1104'),
(40, 'nQlP3G', '1105'),
(41, 'nQlP3G', '1106'),
(42, 'nQlP3G', '1107'),
(43, 'nQlP3G', '1108'),
(44, 'nQlP3G', '1109'),
(45, 'nQlP3G', '1110'),
(46, 'nQlP3G', '1112');

-- --------------------------------------------------------

--
-- Table structure for table `gradesinformation`
--

CREATE TABLE `gradesinformation` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(255) NOT NULL,
  `SUBJECTID` varchar(255) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `UNA` varchar(250) NOT NULL,
  `PANGALAWA` varchar(255) NOT NULL,
  `PANGATLO` varchar(255) NOT NULL,
  `PANGAPAT` varchar(255) NOT NULL,
  `FINALGRADE` varchar(255) NOT NULL,
  `REMARKS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gradesinformation`
--

INSERT INTO `gradesinformation` (`ID`, `STUDENTID`, `SUBJECTID`, `SUBJECT`, `UNA`, `PANGALAWA`, `PANGATLO`, `PANGAPAT`, `FINALGRADE`, `REMARKS`) VALUES
(1, 'Student ID', 'Z623Zm', 'Python', 'FIRST QUARTER', 'SECOND QUARTER', 'THIRD QUARTER', 'FOURTH QUARTER', 'FINAL GRADE', 'REMARKS'),
(2, '210321', 'Z623Zm', 'Python', '74', '75', '75', '73', '74', 'FAILED'),
(3, 'Student ID', 'yZDe54', 'BASIC CALCULUS', 'FIRST QUARTER', 'SECOND QUARTER', 'THIRD QUARTER', 'FOURTH QUARTER', 'FINAL GRADE', 'REMARKS'),
(4, '210321', 'yZDe54', 'BASIC CALCULUS', '74', '75', '75', '73', '74', 'FAILED');

-- --------------------------------------------------------

--
-- Table structure for table `studentinformation`
--

CREATE TABLE `studentinformation` (
  `ID` int(11) NOT NULL,
  `ROLLNO` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `GRADE` varchar(255) NOT NULL,
  `SECTION` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinformation`
--

INSERT INTO `studentinformation` (`ID`, `ROLLNO`, `NAME`, `GENDER`, `GRADE`, `SECTION`, `STATUS`, `EMAIL`, `PASSWORD`) VALUES
(30, '122121', 'Kent C. Cortiguerra', 'Male', 'GRADE 9', 'B', 'ACTIVE', 'kent@gmail.com', 'a08b78ce461650b43e2b9067c9dcba77'),
(31, '1101', 'Ran Takahashi', 'Male', 'GRADE 9', 'B', 'Active', 'ran2001@gmail.com', 'd612489c7928f8f166a0e86d1aecc410'),
(32, '1102', 'Kazuha Kaedehara', 'Male', 'GRADE 9', 'B', 'Active', 'kazuha__2011@gmail.com', '3e3a3b6d5910973790c50bcd19972e26'),
(33, '1103', 'Miquel Duarte', 'Male', 'GRADE 9', 'B', 'Active', 'miquel2@gmail.com', '5fe848cb67a8cf70bede9275e2ba0408'),
(34, '1104', 'Jonathan Anatico', 'Male', 'GRADE 9', 'B', 'Active', 'janatico@gmail.com', 'bb64dfafe7fd8854a0270ce807fb7bdf'),
(35, '1105', 'Vince Andrew', 'Male', 'GRADE 9', 'B', 'Active', 'byahenidrew@gmail.com', 'a141f32ac7f4d8795e2035f8624bae84'),
(36, '1106', 'Diether Magson', 'Male', 'GRADE 9', 'B', 'Active', 'dietako@gmail.com', '9635a3cc5b7d951a1a6f33c8072748fd'),
(37, '1107', 'Addrian Aycardo', 'Male', 'GRADE 9', 'B', 'Active', 'addrianpogi@gmail.com', '70f82894765d9129127cdd061cb091de'),
(38, '1108', 'Yuri Acsayan', 'Male', 'GRADE 9', 'B', 'Active', 'acsayanpat@gmail.com', 'b5c14b2e1c830dff7d6ae77cbe7c227b'),
(40, '1110', 'Rei isidro', 'Male', 'GRADE 9', 'B', 'Active', 'isidroRei@gmail.com', '77be1ee4288d81e80e32013974bffc72'),
(42, '1112', 'Angelica Aycardo', 'Female', 'GRADE 9', 'B', 'Active', 'angelica@gmail.com', '9cb51371f0dd5ff06ad48b0ca58d6d1d'),
(49, '2103210', 'Kent Cortiguerra', 'Male', 'GRADE 7', 'B', 'ACTIVE', 'kentcortiguerra.21formore@gmail.com', '22bd4630c5533a60f7facfc59b4abd73'),
(51, '123456789', 'Rowena Balonso', 'Female', 'GRADE 7', 'A', 'ACTIVE', 'rowenabalonso9@gmail.com', 'ee88eebd60ccf36cf37efd2940a2ee25');

-- --------------------------------------------------------

--
-- Table structure for table `subjectdata`
--

CREATE TABLE `subjectdata` (
  `ID` int(11) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `LINK` text NOT NULL,
  `FILE` text NOT NULL,
  `STARTDATE` varchar(255) NOT NULL,
  `ENDDATE` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `SUBJECTCODE` varchar(255) NOT NULL,
  `TEACHERID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjectdata`
--

INSERT INTO `subjectdata` (`ID`, `DESCRIPTION`, `LINK`, `FILE`, `STARTDATE`, `ENDDATE`, `TYPE`, `SUBJECTCODE`, `TEACHERID`) VALUES
(1, 'HAHHA', 'N/A', '../uploads/kitay.pdf', '2001-12-12T11:11', '20011-12-21T11:11', 'lesson', 'Z623Zm', 'ugWjI'),
(2, 'HAHHA', 'N/A', '../uploads/kitay.pdf', '2001-12-12T11:11', '20011-12-21T11:11', 'lesson', 'Z623Zm', 'ugWjI'),
(3, 'HAHHAHA', 'https://drive.google.com/drive/u/1/folders/1TeNhVCaFyBlaIizMwi2OAVIm0eArSZWr', 'N/A', '2023-05-19T08:28', '2023-05-23T00:00', 'quiz', 'yZDe54', 'ugWjI'),
(4, 'Activity 1 (T - shirt Design)', 'https://drive.google.com/drive/u/1/folders/1TeNhVCaFyBlaIizMwi2OAVIm0eArSZWr', '../uploads/kitay.pdf', '2023-05-21T09:40', '2023-05-22T09:40', 'lesson', 'l0KJTN', 'ugWjI'),
(5, 'HHAHHA', 'https://drive.google.com/drive/u/1/folders/1TeNhVCaFyBlaIizMwi2OAVIm0eArSZWr', '../uploads/5_6235703312998467868.pdf', '2023-05-21T16:06', '2023-05-21T16:06', 'quiz', 'l0KJTN', 'ugWjI'),
(6, 'Submit in PDF. Create a pyhton  program that will ask the user to input number. ', '', 'N/A', '2023-05-21T17:01', '2023-05-23T17:01', 'assigment', 'l0KJTN', 'ugWjI'),
(7, 'Quiz 1', '', '../uploads/kitay.pdf', '2023-05-22T09:31', '2023-05-23T09:31', 'quiz', 'l3BfSu', 'ltagaG');

-- --------------------------------------------------------

--
-- Table structure for table `subjectinformation`
--

CREATE TABLE `subjectinformation` (
  `ID` int(11) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `GRADES` varchar(255) NOT NULL,
  `SECTION` varchar(250) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `SPECIALCODE` varchar(255) NOT NULL,
  `TEACHERID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjectinformation`
--

INSERT INTO `subjectinformation` (`ID`, `SUBJECT`, `GRADES`, `SECTION`, `STATUS`, `SPECIALCODE`, `TEACHERID`) VALUES
(3, 'Python', 'GRADE 8', 'A', 'ACTIVE', 'Z623Zm', 'ugWjI'),
(4, 'BASIC CALCULUS', 'GRADE 7', 'A', 'ACTIVE', 'yZDe54', 'ugWjI'),
(11, 'Introduction to Philosophy', 'GRADE 9', 'B', 'ACTIVE', 'l0KJTN', 'ugWjI'),
(12, 'RIZAL', 'GRADE 7', 'A', 'ACTIVE', 'l3BfSu', 'ltagaG'),
(13, 'RIZAL', 'GRADE 9', 'A', 'ACTIVE', 'dqO5vA', 'ltagaG');

-- --------------------------------------------------------

--
-- Table structure for table `teacherinformation`
--

CREATE TABLE `teacherinformation` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachersubject`
--

CREATE TABLE `teachersubject` (
  `ID` int(11) NOT NULL,
  `SUBJECTID` varchar(255) NOT NULL,
  `TEACHERID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploadstudent`
--

CREATE TABLE `uploadstudent` (
  `ID` int(11) NOT NULL,
  `DATAID` varchar(255) NOT NULL,
  `LINK` varchar(255) NOT NULL,
  `REMARK` varchar(250) NOT NULL,
  `DATEUPLOAD` varchar(255) NOT NULL,
  `STUDENTID` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploadstudent`
--

INSERT INTO `uploadstudent` (`ID`, `DATAID`, `LINK`, `REMARK`, `DATEUPLOAD`, `STUDENTID`, `STATUS`) VALUES
(3, '5', 'MARK AS DONE', 'MARK AS DONE', '2023-05-21 16:59:52', '2103210', 'DONE'),
(8, '6', '../uploads/Student Class Record (3).xlsx', 'SUBMITTED', '2023-05-21 17:47:24', '2103210', 'DONE'),
(9, '7', 'MARK AS DONE', 'MARK AS DONE', '2023-05-22 09:31:31', '123456789', 'CHECKED');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USERID` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(250) NOT NULL,
  `ROLE` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USERID`, `NAME`, `EMAIL`, `ROLE`, `STATUS`, `PASSWORD`) VALUES
(2, '0', 'Administrator', 'admin@admin.com', 'ADMINISTRATOR', 'ACTIVE', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'Ms7nQG', 'Aron Aycardo', 'abel2004h@gmail.com', 'ADMINISTRATOR', 'ACTIVE', '8bbeb2c7744fff0a0992f324ef3e8e71'),
(21, 'ltagaG', 'Alexyiannooo', 'yuukihan0523@gmail.com', 'INSTRUCTOR', 'ACTIVE', '3ce037b392f05629bd038f78270107d4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `enrolsubject`
--
ALTER TABLE `enrolsubject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gradesinformation`
--
ALTER TABLE `gradesinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentinformation`
--
ALTER TABLE `studentinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjectdata`
--
ALTER TABLE `subjectdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjectinformation`
--
ALTER TABLE `subjectinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teacherinformation`
--
ALTER TABLE `teacherinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teachersubject`
--
ALTER TABLE `teachersubject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uploadstudent`
--
ALTER TABLE `uploadstudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrolsubject`
--
ALTER TABLE `enrolsubject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `gradesinformation`
--
ALTER TABLE `gradesinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentinformation`
--
ALTER TABLE `studentinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `subjectdata`
--
ALTER TABLE `subjectdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjectinformation`
--
ALTER TABLE `subjectinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacherinformation`
--
ALTER TABLE `teacherinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachersubject`
--
ALTER TABLE `teachersubject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploadstudent`
--
ALTER TABLE `uploadstudent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
