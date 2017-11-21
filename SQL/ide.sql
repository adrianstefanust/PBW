-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 01:43 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ide`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ID_A` int(11) NOT NULL,
  `ID_AT` int(11) NOT NULL,
  `ID_C` int(11) NOT NULL,
  `dateOpen` date DEFAULT NULL,
  `dateClose` date DEFAULT NULL,
  `submissions` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `id_topic` int(2) DEFAULT NULL,
  `fileDir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ID_A`, `ID_AT`, `ID_C`, `dateOpen`, `dateClose`, `submissions`, `title`, `id_topic`, `fileDir`) VALUES
(1, 1, 2, NULL, NULL, NULL, 'Test 1', 1, NULL),
(2, 2, 2, NULL, NULL, NULL, 'Test 2', 1, NULL),
(3, 2, 2, NULL, NULL, NULL, 'Test 3', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acttypes`
--

CREATE TABLE `acttypes` (
  `ID_AT` int(11) NOT NULL,
  `actTypes` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acttypes`
--

INSERT INTO `acttypes` (`ID_AT`, `actTypes`) VALUES
(1, 'assignment'),
(2, 'files');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID_C` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID_C`, `code`, `course`) VALUES
(1, 'AIF315', 'Pemrograman Berbasis Web'),
(2, 'AIF101', 'Pemrograman Berorientasi Objek'),
(3, 'AIF314', 'Pemrograman Basis Data'),
(4, 'AIF112', 'Pemrograman Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `ID_C` int(11) NOT NULL,
  `ID_U` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`ID_C`, `ID_U`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 2),
(2, 4),
(2, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `enrollment_data`
-- (See below for the actual view)
--
CREATE TABLE `enrollment_data` (
`Code` varchar(6)
,`Course` varchar(50)
,`ID` varchar(10)
,`Name` varchar(50)
,`Position` varchar(8)
);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `ID_SUB` int(11) NOT NULL,
  `ID_A` int(11) NOT NULL,
  `ID_U` int(11) NOT NULL,
  `submitTime` date NOT NULL,
  `fileDirectory` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(2) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `name`) VALUES
(1, 'Topic 1'),
(2, 'Topic 2'),
(3, 'Topic 3'),
(4, 'Topic 4');

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE `usergroups` (
  `ID_UG` int(11) NOT NULL,
  `name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`ID_UG`, `name`) VALUES
(1, 'lecturer'),
(2, 'student'),
(10, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_U` int(11) NOT NULL,
  `userID` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(9) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `ID_UG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_U`, `userID`, `name`, `username`, `pass`, `ID_UG`) VALUES
(1, '20160065', 'Maria Veronica Claudia', 'asd', 'mvc', 1),
(2, '20130053', 'Husnul Hakim', '13053', 'huh', 1),
(3, '2011730053', 'MARIA VERONICA', '7311053', 'marichan', 2),
(4, '2011730103', 'JOHANES MARIO ADRIANO', '7311103', '7311103', 2),
(5, '2012730027', 'NICHOLAS MARTIN PRIBADI', '7312027', '7312027', 2),
(6, '2012730078', 'RIZQI PUTRA PRATAMA', '7312078', '7312078', 2),
(7, '2012730093', 'YOHAN STURE ENANDER', '7312093', '7312093', 2),
(8, '2013730001', 'ALVIN IRAWAN', '7313001', '7313001', 2),
(9, '2013730002', 'CHERIA', '7313002', '7313002', 2),
(10, '2013730003', 'FADHIL AHSAN', '7313003', '7313003', 2),
(11, '2013730004', 'CLARA', '7313004', '7313004', 2),
(12, '2013730005', 'ALDY MARCELLINO CHRISTIAN', '7313005', '7313005', 2),
(13, '2013730006', 'ANTONIUS', '7313006', '7313006', 2),
(14, '2013730008', 'ENRICOFINDLEY', '7313008', '7313008', 2),
(15, '2013730009', 'ROMMY KURNIAWAN WIJAYA', '7313009', '7313009', 2),
(16, '2013730010', 'YOSUA YUUTA BIMA PRAMANA', '7313010', '7313010', 2),
(17, '2013730011', 'RICKY SLAMAT PUTRA', '7313011', '7313011', 2),
(18, '2013730012', 'CLAUDIA VERONICA HANURAWAN', '7313012', '7313012', 2),
(19, '2013730013', 'AXEL RAHARJA', '7313013', '7313013', 2),
(20, '2013730019', 'IGNASIUS DAVID YULIANUS', '7313019', '7313019', 2),
(21, '2013730021', 'ERLANGGA LAIMENA', '7313021', '7313021', 2),
(22, '2013730024', 'MARKUS EDWIN SOEGIANTO', '7313024', '7313024', 2),
(23, '2013730025', 'GAVRILA TIOMINAR', '7313025', '7313025', 2),
(24, '2013730029', 'KEVIN RIZKHY TANUJAYA', '7313029', '7313029', 2),
(25, '2013730033', 'JACINTA DELORA', '7313033', '7313033', 2),
(26, '2013730046', 'ANDRIANTO SUGIARTO', '7313046', '7313046', 2),
(27, '2013730052', 'FRANSISCUS EVAN KRISTIAN', '7313052', '7313052', 2),
(28, '2013730053', 'SOHUTURON FERNANDO', '7313053', '7313053', 2),
(29, '2013730054', 'MICHAEL WILLIAM KINSEY', '7313054', '7313054', 2),
(30, '2013730057', 'MAUDY NUR AVIANTI', '7313057', '7313057', 2),
(31, '2013730058', 'ADRIAN REYNALDI', '7313058', '7313058', 2),
(32, '2013730060', 'HARSETO PANDITYO', '7313060', '7313060', 2),
(33, '2013730065', 'JONATHAN SURYA', '7313065', '7313065', 2),
(34, '2013730068', 'REZA ZACKY RAMADAN', '7313068', '7313068', 2),
(35, '2013730069', 'RICKY WAHYUDI', '7313069', '7313069', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_data`
-- (See below for the actual view)
--
CREATE TABLE `user_data` (
`userID` varchar(10)
,`name` varchar(50)
,`role` varchar(8)
);

-- --------------------------------------------------------

--
-- Structure for view `enrollment_data`
--
DROP TABLE IF EXISTS `enrollment_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `enrollment_data`  AS  select `courses`.`code` AS `Code`,`courses`.`course` AS `Course`,`users`.`userID` AS `ID`,`users`.`name` AS `Name`,`usergroups`.`name` AS `Position` from (((`users` join `usergroups` on((`users`.`ID_UG` = `usergroups`.`ID_UG`))) join `enrollments` on((`users`.`ID_U` = `enrollments`.`ID_U`))) join `courses` on((`courses`.`ID_C` = `enrollments`.`ID_C`))) ;

-- --------------------------------------------------------

--
-- Structure for view `user_data`
--
DROP TABLE IF EXISTS `user_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_data`  AS  select `users`.`userID` AS `userID`,`users`.`name` AS `name`,`usergroups`.`name` AS `role` from (`usergroups` join `users` on((`usergroups`.`ID_UG` = `users`.`ID_UG`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ID_A`),
  ADD KEY `ID_C` (`ID_C`),
  ADD KEY `ID_AT` (`ID_AT`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Indexes for table `acttypes`
--
ALTER TABLE `acttypes`
  ADD PRIMARY KEY (`ID_AT`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID_C`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD KEY `ID_C` (`ID_C`),
  ADD KEY `ID_U` (`ID_U`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`ID_SUB`),
  ADD KEY `ID_U` (`ID_U`),
  ADD KEY `ID_A` (`ID_A`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Indexes for table `usergroups`
--
ALTER TABLE `usergroups`
  ADD PRIMARY KEY (`ID_UG`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `ID_UG` (`ID_UG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ID_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `acttypes`
--
ALTER TABLE `acttypes`
  MODIFY `ID_AT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usergroups`
--
ALTER TABLE `usergroups`
  MODIFY `ID_UG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`ID_C`) REFERENCES `courses` (`ID_C`),
  ADD CONSTRAINT `activities_ibfk_3` FOREIGN KEY (`ID_AT`) REFERENCES `acttypes` (`ID_AT`),
  ADD CONSTRAINT `activities_ibfk_4` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id_topic`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`ID_C`) REFERENCES `courses` (`ID_C`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`),
  ADD CONSTRAINT `submissions_ibfk_3` FOREIGN KEY (`ID_A`) REFERENCES `activities` (`ID_A`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_UG`) REFERENCES `usergroups` (`ID_UG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
