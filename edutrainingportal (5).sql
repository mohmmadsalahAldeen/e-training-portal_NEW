-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2022 at 09:55 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edutrainingportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_ID` int(30) NOT NULL,
  `User_ID` int(30) NOT NULL,
  `Admin_ID` int(30) NOT NULL,
  `UserName` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Supervisor_Id` int(50) NOT NULL,
  `Timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `User_ID`, `Admin_ID`, `UserName`, `Email`, `Password`, `Status`, `Supervisor_Id`, `Timestamp`) VALUES
(1, 102, 1, 'OlaJalal', 'OlaJalal@gmail.com', '251586pouyt', '1', 201, '2021-01-05'),
(2, 104, 1, 'refad.adel', 'refad.adel55555@gmail.com', 'cf62262589a073ca4212b784cca52373b133341e', '1', 203, '2021-01-05'),
(3, 202, 1, 'Dr.fatimah', 'fatimah55555@gmail.com', '7777777777', '2', 0, '2021-01-05'),
(4, 203, 1, 'Dr.ibrahimMohmmad', 'ibrahimMohmmad66666@gmail.com', '1010101010', '2', 0, '2021-01-05'),
(5, 101, 2, 'mohmmadAlhasoun', 'mohmmad.alhason@gmial.com', 'looklook5555', '1', 201, '2021-01-13'),
(7, 105, 1, 'bayanYaser', 'bayanYaser@gmail.com', '25185689lok', '1', 202, '2022-01-12'),
(8, 201, 1, 'Dr.ahmad', 'ahmad@gmail.com', '235695look', '2', 0, '2022-01-18'),
(14, 106, 2, 'kenanWesam', 'kenanWesam@gmail.com', '251586959ik', '1', 202, '2022-01-12'),
(15, 107, 1, 'yasmeenObadah', 'yasmeen.Obadah@gmail.com', '47586kjhdui', '1', 202, '2022-01-28'),
(16, 108, 1, 'randHosam', 'randHosam1525@gmail.com', '582563269look', '1', 203, '2022-01-10'),
(17, 109, 1, 'RahafAtef', 'RahafAtef1525@gmail.com', 'jsujrudj4586', '1', 201, '2022-01-31'),
(18, 846, 1, 'Sita company', 'sitaHR@gmail.com', '585632158000', '3', 0, '2022-01-28'),
(19, 847, 2, 'Zain', 'ZainHR@gmail.com', '15200965dfrt', '3', 0, '2022-01-27'),
(20, 848, 1, 'Askadenia', 'AskadeniaHR@gmail.com', '475823dfortd', '3', 0, '2022-01-27'),
(21, 849, 1, 'Social society ', 'SocialsocieityGoverment@gmail.com', '75400dlf77586', '3', 0, '2022-01-27'),
(22, 850, 2, 'Umniah', 'UmniahHR@gmail.com', '7525sded7f45s', '3', 0, '2022-01-27'),
(23, 851, 1, 'Orange', 'OrangeHR@gmail.com', '75852sd8s65', '3', 0, '2022-01-27'),
(24, 852, 1, 'Zain', 'ZainHR@gmail.com', 'askskdi7562000', '3', 0, '2022-01-28'),
(25, 853, 1, 'Umniah', 'UmniahHR@gmail.com', '758s6d8s6d8', '3', 0, '2022-01-29'),
(26, 854, 1, 'Talabat', 'TalabatHR@gmail.com', '7586sdsd9658s', '3', 0, '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `Admin_ID` int(30) NOT NULL,
  `User_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`Admin_ID`, `User_ID`) VALUES
(1, 102),
(2, 201);

-- --------------------------------------------------------

--
-- Table structure for table `admissionrecuirement`
--

CREATE TABLE `admissionrecuirement` (
  `Admission_ID` int(30) NOT NULL,
  `CompAgent_ID` int(30) NOT NULL,
  `GPA` int(10) NOT NULL,
  `SocialStatus` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisment`
--

CREATE TABLE `advertisment` (
  `Advertisment_ID` int(30) NOT NULL,
  `CompAgent_ID` int(30) NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Content` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Photo` varchar(10000) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Date` date NOT NULL,
  `approve` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `advertisment`
--

INSERT INTO `advertisment` (`Advertisment_ID`, `CompAgent_ID`, `Title`, `Content`, `Photo`, `Date`, `approve`) VALUES
(5, 237, 'Technical support', '• We look for extremely ambitious individuals with a wide range of interests who excel in their fields, are not afraid of challenges, and are constantly looking to improve their skills. We are particularly interested in conscientious and open individ', '85434_TechnicalSupport.jpg', '2022-01-27', 0),
(6, 237, 'Full stack developer', '• Must have a strong concept of OOP and Design Patterns.\r\n\r\n• Strong knowledge of desktop application using C#.\r\n\r\n• Strong knowledge of ASP.NET web framework.\r\n\r\n• Strong knowledge of ASP.NET MVC.\r\n\r\n• Strong knowledge of Web API.\r\n\r\n• Strong knowle', '18496_fullstackdeveloper.jpg', '2022-01-27', 1),
(7, 241, 'network engineer', 'Task/Requirements: 1. Provide 24/7 network engineering support for the design, configuration, implementation, operational management, and troubleshooting of the enterprise network, including network monitoring. This includes: Conduct IP management fo', '12027_networkengineer.jpg', '2022-01-27', 1),
(8, 242, 'Course offered by edrak', 'this course include ajax and laravel php ', '40738_edraak.jpg', '2022-02-01', 1),
(10, 243, 'web designer', 'you must have 2 years of experience in adobe photoshop', '93500_webDesinger.jpg', '2022-02-02', 1),
(16, 242, 'Full stack developer', 'A full stack web developer is a person who can develop both client and server software.\r\n\r\nIn addition to mastering HTML and CSS, he/she also knows how to:', '90628_pic_11.jpg', '2022-04-27', 1),
(19, 241, 'devOps intermidiate', 'Under a DevOps model, development and operations teams are no longer “siloed.” Sometimes, these two teams are merged into a single team where the engineers work across the entire application lifecycle, from development and test to deployment to opera', '43106_pic_12.jpg', '2022-04-28', 0),
(20, 237, 'Technical support', 'this is section is the best part in this company ', '33313_testimonials.jpg', '2022-05-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companyagent`
--

CREATE TABLE `companyagent` (
  `compAgent_ID` int(30) NOT NULL,
  `User_ID` int(30) NOT NULL,
  `NameOfAgentComp` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Location_1` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `FiledName` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `companyagent`
--

INSERT INTO `companyagent` (`compAgent_ID`, `User_ID`, `NameOfAgentComp`, `Location_1`, `FiledName`) VALUES
(237, 846, 'sita company', 'amman', 'Artifical_intelegance'),
(238, 847, 'Zain', 'amman', 'Android_developer'),
(239, 848, 'Askadenia', 'amman', 'Android_developer'),
(240, 849, 'Social society organization', 'amman', 'Cloud_computing'),
(241, 850, 'Umniah', 'zarqa', 'Web_development'),
(242, 851, 'Orange', 'Irbid', 'Quality_assurance'),
(243, 852, 'Zain', 'tafilah', 'Quality_assurance'),
(244, 853, 'Umniah', 'zarqa', 'Web_development'),
(245, 854, 'Talabat', 'amman', 'Artifical_intelegance'),
(246, 855, 'Careem', 'amman', 'Artifical_intelegance'),
(247, 856, 'Aspire', 'amman', 'Cloud_computing');

-- --------------------------------------------------------

--
-- Table structure for table `displayvideo`
--

CREATE TABLE `displayvideo` (
  `Video_ID` int(11) NOT NULL,
  `nameVideo` varchar(500) NOT NULL,
  `urlVideo` varchar(500) NOT NULL,
  `compAgen_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `displayvideo`
--

INSERT INTO `displayvideo` (`Video_ID`, `nameVideo`, `urlVideo`, `compAgen_ID`) VALUES
(19, 'How to Insert an Image in a Webpage (HTML  XHTML)', '78525_Video_1.mp4', 241),
(20, 'Learn HTML - Basic Structure and How To Link Pages', '59976_Video_2.mp4', 241),
(21, 'Learn HTML - Your First Web Page (For Absolute Beginners)', '35174_Video_3.mp4', 241),
(22, 'Your guide to getting started in the world of the cloud: What is the cloud?', '76352_Video_4.mp4', 240),
(23, 'ما هي المهارات المطلوبة للعمل ك Software as a Service SaaS', '55347_Video_5.mp4', 240),
(24, 'Your guide to getting started in the cloud world: What are the most important certificates for each company and where do I start?', '34204_Video_6.mp4', 240),
(25, '1  Android Studio Java Developer', '1083_Video_7.mp4', 238),
(26, '2  Android Studio Java Developer', '16473_Video_8.mp4', 238),
(27, '4   Setup Android Studio on Windows', '73899_Video_9.mp4', 238),
(28, 'Artificial Intelligence  CHAPTER 1', '84760_Video_10.mp4', 237),
(29, 'الذكاء الاصطناعي و تعلم الآلة و الفرق بينهما', '19482_Video_11.mp4', 237),
(30, 'الذكاء الصناعي #بدقايق  Artificial Intelligence', '86258_Video_12.mp4', 237);

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `Interested_ID` int(30) NOT NULL,
  `Student_ID` int(30) NOT NULL,
  `FiledName` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `NameOfTheSpecially` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`Interested_ID`, `Student_ID`, `FiledName`, `NameOfTheSpecially`) VALUES
(57, 102, 'Artifical_intelegance', 'computer information system'),
(58, 108, 'Android_developer', 'computer science'),
(60, 106, 'Quality_assurance', 'Cyper security'),
(61, 104, 'Web_development', 'software enginering'),
(63, 107, 'Android_developer', 'computer information system'),
(64, 109, 'Android_developer', 'software enginering'),
(65, 101, 'Cloud_computing', 'math'),
(66, 105, 'Artifical_intelegance', 'mechnical enginnering');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Msg_ID` int(30) NOT NULL,
  `Sender_ID` int(30) NOT NULL,
  `Reciever_ID` int(30) NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `Content` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `SendingDate` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(30) NOT NULL,
  `User_ID` int(30) NOT NULL,
  `Supervisor_ID` int(30) NOT NULL,
  `Age` int(100) NOT NULL,
  `SocialStatus` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `GPA` int(100) NOT NULL,
  `FullName` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `User_ID`, `Supervisor_ID`, `Age`, `SocialStatus`, `GPA`, `FullName`, `Status`) VALUES
(101, 101, 201, 22, 'single', 90, 'mohmmadAlhasoun', 1),
(102, 102, 201, 14, 'single', 88, 'OlaJalal', 1),
(104, 104, 203, 35, 'single', 75, 'refad.adel', 1),
(105, 105, 202, 25, 'single', 78, 'bayanYaser', 1),
(106, 106, 202, 24, 'single', 74, 'kenanWesam', 1),
(107, 107, 202, 30, 'married', 80, 'yasmeenObadah', 1),
(108, 108, 203, 30, 'single', 89, 'randHosam', 1),
(109, 109, 201, 40, 'single', 75, 'RahafAtef', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `Supervisor_ID` int(30) NOT NULL,
  `User_ID` int(30) NOT NULL,
  `Position` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`Supervisor_ID`, `User_ID`, `Position`) VALUES
(201, 201, 'Doctor'),
(202, 202, 'Doctor'),
(203, 203, 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `trainingopportunity`
--

CREATE TABLE `trainingopportunity` (
  `Oppor_ID` int(30) NOT NULL,
  `CompAgent_ID` int(30) NOT NULL,
  `PlaceOfOpportunity` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `OpportunityType` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `approve` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `trainingopportunity`
--

INSERT INTO `trainingopportunity` (`Oppor_ID`, `CompAgent_ID`, `PlaceOfOpportunity`, `OpportunityType`, `approve`) VALUES
(38, 245, 'Karak', 'web development', 1),
(39, 243, 'amman', 'android developer', 1),
(40, 244, 'Madapah', 'Technical customer engineer', 1),
(41, 245, 'syria', 'web development', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainingreqest`
--

CREATE TABLE `trainingreqest` (
  `TrainingReq_ID` int(30) NOT NULL,
  `Student_ID` int(30) NOT NULL,
  `CompAgent_ID` int(30) NOT NULL,
  `EvaluationMark` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `EvaluationReport` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Notes` varchar(1000) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `trainingreqest`
--

INSERT INTO `trainingreqest` (`TrainingReq_ID`, `Student_ID`, `CompAgent_ID`, `EvaluationMark`, `EvaluationReport`, `Status`, `Notes`) VALUES
(20, 102, 237, 'null', 'null', '1', 'this is great apportinity get such as this company '),
(21, 108, 239, 'null', 'null', '1', 'please i need syleplus for this course'),
(22, 106, 242, 'null', 'null', '1', 'this option is amazing'),
(23, 104, 241, 'null', 'null', '1', 'i have one year experience in this field i will send my cv '),
(26, 107, 239, 'null', 'null', '1', 'welcome my name is mohmmad'),
(27, 109, 238, 'null', 'null', '1', 'i am enthothastic about this course '),
(28, 101, 247, 'null', 'null', '1', 'i suppose in this company the best supervisor'),
(29, 105, 245, 'null', 'null', '1', 'i need sylblus to help me within this training');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(30) NOT NULL,
  `FullName` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Address` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `BirthOfDate` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `FullName`, `Email`, `Address`, `BirthOfDate`, `Gender`) VALUES
(101, 'mohmmadAlhasoun', 'mohmmad.alhason@gmial.com', 'Zarqa', '1998/5/2', 'male'),
(102, 'OlaJalal', 'OlaJalal@gmail.com', 'Amman', '1998/5/4', 'female'),
(104, 'refad.adel', 'refad.adel55555@gmail.com', 'Amman', '1994/5/10', 'male'),
(105, 'bayanYaser', 'bayanYaser@gmail.com', 'zarqa', '1996/9/10', 'female'),
(106, 'kenanWesam', 'kenanWesam@gmail.com', 'zarqa', '1996', 'male'),
(107, 'yasmeenObadah', 'yasmeen.Obadah@gmail.com', 'ajloun', '1977', 'female'),
(108, 'randHosam', 'randHosam1525@gmail.com', 'tafilah', '1985', 'female'),
(109, 'RahafAtef', 'RahafAtef1525@gmail.com', 'amman', '1990', 'female'),
(201, 'Dr.ahmad', 'ahmad@gmail.com', 'amman', '1980/4/2', 'male'),
(202, 'Dr.fatimah', 'fatimah55555@gmail.com', 'tafilah', '1970/10/11', 'female'),
(203, 'Dr.IbrahimMohmmad', 'Dr.IbrahimMohmmad6666@gmail.com', 'Tafilah', '1967/9/7', 'male'),
(846, '', 'sitaHR@gmail.com', 'amman_streetMadenah', '', ''),
(847, '', 'amazonHR.gmail.com', 'amman-Streetmakeh', '', ''),
(848, '', 'askadenia@gmail.com', 'amman-tlaaAl_ali', '', ''),
(849, '', 'SocialHR@hotmail.com', 'amman-StreetMekah', '', ''),
(850, '', 'UmniahHR@gmail.com', 'zarqa-street36', '', ''),
(851, '', 'OrangeHR@yahoo.com', 'Irbid street university', '', ''),
(852, '', 'ZainHR@gmail.com', 'Tafilah alees', '', ''),
(853, '', 'UmniahHR@gmail.com', 'zarqa-newZarqa', '', ''),
(854, '', 'talabatHR@gmail.com', 'amman-dowarAlkhames', '', ''),
(855, '', 'CareemHR@gmail.com', 'Amman-alpaeader', '', ''),
(856, '', 'AspireHR@gmail.com', 'amman-alpeader', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `admissionrecuirement`
--
ALTER TABLE `admissionrecuirement`
  ADD PRIMARY KEY (`Admission_ID`),
  ADD KEY `CompAgent_ID` (`CompAgent_ID`);

--
-- Indexes for table `advertisment`
--
ALTER TABLE `advertisment`
  ADD PRIMARY KEY (`Advertisment_ID`),
  ADD KEY `CompAgent_ID` (`CompAgent_ID`);

--
-- Indexes for table `companyagent`
--
ALTER TABLE `companyagent`
  ADD PRIMARY KEY (`compAgent_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `displayvideo`
--
ALTER TABLE `displayvideo`
  ADD PRIMARY KEY (`Video_ID`),
  ADD KEY `compAgen_ID` (`compAgen_ID`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`Interested_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Msg_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Supervisor_ID` (`Supervisor_ID`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`Supervisor_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `trainingopportunity`
--
ALTER TABLE `trainingopportunity`
  ADD PRIMARY KEY (`Oppor_ID`),
  ADD KEY `CompAgent_ID` (`CompAgent_ID`);

--
-- Indexes for table `trainingreqest`
--
ALTER TABLE `trainingreqest`
  ADD PRIMARY KEY (`TrainingReq_ID`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `CompAgent_ID` (`CompAgent_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `Admin_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admissionrecuirement`
--
ALTER TABLE `admissionrecuirement`
  MODIFY `Admission_ID` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advertisment`
--
ALTER TABLE `advertisment`
  MODIFY `Advertisment_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `companyagent`
--
ALTER TABLE `companyagent`
  MODIFY `compAgent_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `displayvideo`
--
ALTER TABLE `displayvideo`
  MODIFY `Video_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `Interested_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Msg_ID` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `Supervisor_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `trainingopportunity`
--
ALTER TABLE `trainingopportunity`
  MODIFY `Oppor_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `trainingreqest`
--
ALTER TABLE `trainingreqest`
  MODIFY `TrainingReq_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=857;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`Admin_ID`) REFERENCES `administrator` (`Admin_ID`);

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `admissionrecuirement`
--
ALTER TABLE `admissionrecuirement`
  ADD CONSTRAINT `admissionrecuirement_ibfk_1` FOREIGN KEY (`CompAgent_ID`) REFERENCES `companyagent` (`compAgent_ID`);

--
-- Constraints for table `advertisment`
--
ALTER TABLE `advertisment`
  ADD CONSTRAINT `advertisment_ibfk_1` FOREIGN KEY (`CompAgent_ID`) REFERENCES `companyagent` (`compAgent_ID`);

--
-- Constraints for table `companyagent`
--
ALTER TABLE `companyagent`
  ADD CONSTRAINT `companyagent_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `displayvideo`
--
ALTER TABLE `displayvideo`
  ADD CONSTRAINT `displayvideo_ibfk_1` FOREIGN KEY (`compAgen_ID`) REFERENCES `companyagent` (`compAgent_ID`);

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Supervisor_ID`) REFERENCES `supervisor` (`Supervisor_ID`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `trainingopportunity`
--
ALTER TABLE `trainingopportunity`
  ADD CONSTRAINT `trainingopportunity_ibfk_1` FOREIGN KEY (`CompAgent_ID`) REFERENCES `companyagent` (`compAgent_ID`);

--
-- Constraints for table `trainingreqest`
--
ALTER TABLE `trainingreqest`
  ADD CONSTRAINT `trainingreqest_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`),
  ADD CONSTRAINT `trainingreqest_ibfk_2` FOREIGN KEY (`CompAgent_ID`) REFERENCES `companyagent` (`compAgent_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
