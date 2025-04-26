-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2015 at 10:20 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college_website`
--
CREATE DATABASE IF NOT EXISTS `college_website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `college_website`;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `admission_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `admission_fee` float(10,2) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`admission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `course_id`, `start_date`, `end_date`, `admission_fee`, `note`, `status`) VALUES
(15, 5, '2015-01-08', '2015-01-07', 400.00, 'test', 'Active'),
(16, 6, '2015-03-24', '2015-03-25', 500.00, '  te', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(10) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(100) NOT NULL,
  `album_description` text NOT NULL,
  `publish_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_title`, `album_description`, `publish_date`, `status`) VALUES
(2, 'COLLEGE INFRASTRUCTURE', 'Computerized library with an open access system\nAudio Visual Rooms with Internet, LCD, OHP etc.', '2015-01-06', 'active'),
(4, 'Programs', ' MANEESHA Magazine and National Level Seminar on Literacy and Development', '2015-02-18', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applicationform`
--

CREATE TABLE IF NOT EXISTS `applicationform` (
  `applicationnumber` int(10) NOT NULL AUTO_INCREMENT,
  `regndate` date NOT NULL,
  `admissionnumber` varchar(20) NOT NULL,
  `admissiondate` date NOT NULL,
  `course_id` int(10) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `placeofbirth` varchar(50) NOT NULL,
  `parentsinfo` varchar(20) NOT NULL,
  `father` varchar(25) NOT NULL,
  `mother` varchar(25) NOT NULL,
  `fathersoccupation` varchar(50) NOT NULL,
  `mothersoccupation` varchar(50) NOT NULL,
  `cont_address` varchar(250) NOT NULL,
  `state` varchar(25) NOT NULL,
  `district` varchar(25) NOT NULL,
  `taluk` varchar(25) NOT NULL,
  `citytown` varchar(25) NOT NULL,
  `country` varchar(15) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `emailid` varchar(25) NOT NULL,
  `alternatecontact` varchar(15) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `studcategory` varchar(20) NOT NULL,
  `studentcaste` varchar(20) NOT NULL,
  `mothertongue` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `paidfee` float(10,2) NOT NULL,
  `othlangx` varchar(50) NOT NULL,
  `othlangxii` varchar(50) NOT NULL,
  `othvaccourse` varchar(50) NOT NULL,
  `othphysicchallenge` varchar(50) NOT NULL,
  `othexservice` varchar(50) NOT NULL,
  `othtenant` varchar(50) NOT NULL,
  `othsports` varchar(50) NOT NULL,
  `othnccnss` varchar(50) NOT NULL,
  `othschoolastst` varchar(50) NOT NULL,
  `othhostelacc` varchar(50) NOT NULL,
  `othinsmendium` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`applicationnumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `applicationform`
--

INSERT INTO `applicationform` (`applicationnumber`, `regndate`, `admissionnumber`, `admissiondate`, `course_id`, `semester`, `firstname`, `lastname`, `dob`, `bloodgroup`, `gender`, `placeofbirth`, `parentsinfo`, `father`, `mother`, `fathersoccupation`, `mothersoccupation`, `cont_address`, `state`, `district`, `taluk`, `citytown`, `country`, `pincode`, `mobileno`, `emailid`, `alternatecontact`, `religion`, `studcategory`, `studentcaste`, `mothertongue`, `nationality`, `paidfee`, `othlangx`, `othlangxii`, `othvaccourse`, `othphysicchallenge`, `othexservice`, `othtenant`, `othsports`, `othnccnss`, `othschoolastst`, `othhostelacc`, `othinsmendium`, `place`, `status`) VALUES
(15, '2015-03-12', '', '0000-00-00', 3, 'Third Semester', 'Aravinda', 'MV', '1986-03-12', 'A positive', 'Male', 'Mangalore', 'parent', 'Michel', 'apisi', 'Developer', 'programmer', '3rd Floor, Belwil compound, Behind Maharaja hotel, Balamatta cross', '--please select--', 'Dakshina kannada', 'mangalore', 'Mangalore', 'India', '575002', '+919986058114', 'mvaravinda@gmail.com', '79456123', 'Hindu', 'SC', 'nahk', 'maitni', 'Indian', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(16, '2015-03-12', '', '0000-00-00', 3, 'Third Semester', 'Kiran', 'kumar', '1986-03-12', 'A positive', 'Male', 'Mangalore', 'parent', 'Michel', 'apisi', 'Developer', 'programmer', '3rd Floor, Belwil compound, Behind Maharaja hotel, Balamatta cross', '--please select--', 'Dakshina kannada', 'mangalore', 'Mangalore', 'India', '575002', '+919986058114', 'mvaravinda@gmail.com', '79456123', 'Hindu', 'SC', 'nahk', 'maitni', 'Indian', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(17, '2015-03-12', '', '0000-00-00', 2, 'First semester', 'adam', 'MV', '1988-12-31', 'A negative', 'Male', 'Mangalore', 'parent', 'Michel', 'apisi', 'Developer', 'programmer', '3rd Floor, Belwil compound, Behind Maharaja hotel, Balamatta cross', 'Karnataka', 'Dakshina kannada', 'mangalore', 'Mangalore', 'India', '575002', '+919986058114', 'adam@gmail.com', '79456123', 'Muslim', 'SC', 'nahk', 'maitni', 'inidan', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(18, '2015-03-12', '', '0000-00-00', 2, 'First semester', 'adam', 'MV', '1988-12-31', 'A negative', 'Male', 'Mangalore', 'parent', 'Michel', 'apisi', 'Developer', 'programmer', '3rd Floor, Belwil compound, Behind Maharaja hotel, Balamatta cross', 'Karnataka', 'Dakshina kannada', 'mangalore', 'Mangalore', 'India', '575002', '+919986058114', 'adam@gmail.com', '79456123', 'Muslim', 'SC', 'nahk', 'maitni', 'inidan', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(20, '2015-03-12', '', '0000-00-00', 0, 'Select', '', '', '0000-00-00', 'A positive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select', 'Select', '', '', '', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(21, '2015-03-12', '', '0000-00-00', 0, 'Select', '', '', '0000-00-00', 'A positive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select', 'Select', '', '', '', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(22, '2015-03-12', '', '0000-00-00', 0, 'Select', '', '', '0000-00-00', 'A positive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select', 'Select', '', '', '', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(23, '2015-03-12', '', '0000-00-00', 0, 'Select', '', '', '0000-00-00', 'A positive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select', 'Select', '', '', '', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(24, '2015-03-12', '', '0000-00-00', 0, 'Select', '', '', '0000-00-00', 'A positive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select', 'Select', '', '', '', 0.00, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'India', 'Yes', 'English', 'magnalore', 'Active'),
(25, '2015-03-12', '', '0000-00-00', 0, 'Select', '', '', '0000-00-00', 'A positive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select', 'Select', '', '', '', 0.00, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'India', 'Yes', 'English', 'magnalore', 'Active'),
(26, '2015-03-12', '', '0000-00-00', 0, 'Select', '', '', '0000-00-00', 'A positive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select', 'Select', '', '', '', 0.00, '', '', '', '', '', '', '', '', '', '', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(25) NOT NULL,
  `coursetype` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `coursename`, `coursetype`, `description`, `status`) VALUES
(2, 'B.A', 'Bachelor of Arts ', '3 Years (6 Semester)', 'Active'),
(3, 'B.Sc', 'Bachelor of Science', '3 Years (6 Semester)', 'Active'),
(4, 'B.Com', 'Bachelor of Commerce', '3 Years (6 Semester)', 'Active'),
(5, 'BCA', 'Bachelor of Computer Application', '3 Years (6 Semester)', 'Active'),
(6, 'BBM', 'Bachelor of Business Management', '3 Years (6 Semester)', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `album_id` int(10) NOT NULL,
  `image_title` varchar(50) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `album_id`, `image_title`, `image_path`) VALUES
(5, 2, 'College Campus', '24496img1.png'),
(8, 2, 'Library', '23046img2.png'),
(9, 2, 'Electronics Lab', '22727img3.png'),
(10, 2, 'Indoor Games', '7924img4.png'),
(11, 2, 'Chemistry Lab', '253img5.png'),
(12, 2, 'Girls Hostel', '13853im65.png'),
(13, 2, 'Boys Hostel', '13742im7.png'),
(18, 4, 'National Level Seminar ', '6070img_ing2.png'),
(19, 4, 'MANEESHA Magazine', '15543program_1.jpg'),
(20, 12, 'Image title', '27811Desert.jpg'),
(21, 12, 'test alubm', '7072Chrysanthemum.jpg'),
(22, 5, 'tee', '27477images (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `publish_date` date NOT NULL,
  `news_type` varchar(25) NOT NULL,
  `news_title` varchar(150) NOT NULL,
  `news_content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `publish_date`, `news_type`, `news_title`, `news_content`, `image`, `status`) VALUES
(8, '2015-02-17', 'News', 'Inauguration of Viz-Arts 2015', 'The Department of Economics in association with P.G. Department of Economics of Mangaluru University, Tumkur University and Kannada University, Hampi, organized a one day National Level Seminar on "Literacy and Development” on 21 January 2015 at SDM College, Ujire.  Mr K.Vasanth Bangera, MLA, Belthangady Taluk inaugurated the seminar. Dr Sripathy Kalluraya, Chairman, Dept of PG Studies in Economics, Mangaluru University delivered the keynote address. Dr Ravindra, Chairman, PG Dept of Economics and Dr Prashanth, Kannada University Hampi, were the resource persons. Nearly 176 delegates attended the seminar.\r\n', 'program_1.jpg', 'Active'),
(9, '2015-02-18', 'News', 'MANEESHA Magazine', 'The annual College Magazine of S.D.M. College, Maneesha 2013 – 14 was released by Dr D.Veerendra Heggade, President, SDM Educational Society at Dharmasthala beedu on 9 September 2014.', 'img_ing2.png', 'Active'),
(10, '2015-02-15', 'News', 'Championship in Media', 'Overall Championship in Media in the Contemporary Worlds', '14031', 'Active'),
(11, '2015-02-28', 'Events', 'College Day Celebration', '25th year College Day Celebration', 'download.jpg', 'Active'),
(12, '2015-02-20', 'News', 'Centre for Communicative English and Foriegn Languages', 'Centre for communicative English and Foreign Languages (CCEFL) was established under College with Potential for Excellence (CPE) scheme. The centre facilitates students and staff with multimedia language lab. The learners under go intensive language learning experience through the cutting edge technological support. ', '30346p1010101.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `result_id` int(10) NOT NULL AUTO_INCREMENT,
  `applicationnumber` int(10) NOT NULL,
  `result` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `applicationnumber`, `result`, `status`) VALUES
(5, 15, 'Pass with 60%', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(10) NOT NULL AUTO_INCREMENT,
  `sliderno` varchar(10) NOT NULL,
  `slidertitle` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `sliderimage` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `sliderno`, `slidertitle`, `description`, `sliderimage`, `status`) VALUES
(1, 'Slider 1', 'SDM College Ujire', 'Shri Dharmasthala Manjunatheshwara College has been a pioneer educational centre providing academically excellent and culturally stable ambience for quality learning. ', 'sdmcollege1.jpg', ''),
(2, 'Slider 2', 'About SDM college', 'SDM College is a unique place for all those who aspire to reach those satisfying heights in life.', '1_slider2.png', ''),
(3, 'Slider 3', 'Facilities in SDM', 'Computerized library with an open access system Audio Visual Rooms with Internet, LCD, OHP etc. Best College Award by FJEI Well equipped science and computer laboratories', 'sdmcollege3.jpg', 'Active'),
(4, 'Slider 4', 'BASIC LIFE SKILLS PROGRAM', 'Basic Life Skills and Entrepreneurship Development Centre was established under Entrepreneurship & Library gradation up wing of the CPE Scheme. The Centre Functions as an independent unit to effectively take the benefit of the Scheme to the Students.', '8138sdmcollege4.jpg', ''),
(5, 'Slider 5', 'SDM Library', 'Library is always considered as the real ''powerhouse'' of any educational institution.\nA library is a collection can include books, periodicals, newspapers, manuscripts, maps, prints, documents, e-books, audiobooks, and other formats.', 'sdmcollege6.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `staff_type` varchar(20) NOT NULL,
  `designtion` varchar(25) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `login_id`, `password`, `staff_type`, `designtion`, `address`, `contact_no`, `status`) VALUES
(2, 'prtvi', 'admin', 'admin', 'Administrator', 'gm', 'deghh\r\njhtuy', '123456789', 'Active'),
(4, 'mahesh', 'mahesh', '123123', 'Employee', 'Officer', 'mangalore ', '88929237823', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student_qualification`
--

CREATE TABLE IF NOT EXISTS `student_qualification` (
  `student_qualification` int(10) NOT NULL AUTO_INCREMENT,
  `application_no` int(10) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `max_mark` int(10) NOT NULL,
  `marks_obt` int(10) NOT NULL,
  `no_of_attempts` int(10) NOT NULL,
  PRIMARY KEY (`student_qualification`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `student_qualification`
--

INSERT INTO `student_qualification` (`student_qualification`, `application_no`, `subject`, `max_mark`, `marks_obt`, `no_of_attempts`) VALUES
(2, 16, 'pom', 85, 52, 2),
(3, 20, 'pom', 85, 52, 2),
(4, 16, 'Kannada', 100, 50, 1),
(5, 20, 'Kannada', 125, 50, 1),
(6, 20, 'Kannada', 125, 50, 1),
(7, 16, 'test', 0, 0, 0),
(8, 20, '', 0, 0, 0),
(9, 20, '', 0, 0, 0),
(10, 20, '', 0, 0, 0),
(11, 21, 'Kannada', 100, 50, 1),
(12, 21, 'Kannada', 125, 50, 1),
(13, 21, 'Kannada', 125, 50, 1),
(14, 21, '', 0, 0, 0),
(15, 21, '', 0, 0, 0),
(16, 21, '', 0, 0, 0),
(17, 21, '', 0, 0, 0),
(18, 22, '', 0, 0, 0),
(19, 22, '', 0, 0, 0),
(20, 22, '', 0, 0, 0),
(21, 22, '', 0, 0, 0),
(22, 22, '', 0, 0, 0),
(23, 22, '', 0, 0, 0),
(24, 22, '', 0, 0, 0),
(25, 23, '', 0, 0, 0),
(26, 23, '', 0, 0, 0),
(27, 23, '', 0, 0, 0),
(28, 23, '', 0, 0, 0),
(29, 23, '', 0, 0, 0),
(30, 23, '', 0, 0, 0),
(31, 23, '', 0, 0, 0),
(32, 24, '', 0, 0, 0),
(33, 24, '', 0, 0, 0),
(34, 24, '', 0, 0, 0),
(35, 24, '', 0, 0, 0),
(36, 24, '', 0, 0, 0),
(37, 24, '', 0, 0, 0),
(38, 24, '', 0, 0, 0),
(39, 25, '', 0, 0, 0),
(40, 25, '', 0, 0, 0),
(41, 25, '', 0, 0, 0),
(42, 25, '', 0, 0, 0),
(43, 25, '', 0, 0, 0),
(44, 25, '', 0, 0, 0),
(45, 25, '', 0, 0, 0),
(46, 26, '', 0, 0, 0),
(47, 26, '', 0, 0, 0),
(48, 26, '', 0, 0, 0),
(49, 26, '', 0, 0, 0),
(50, 26, '', 0, 0, 0),
(51, 26, '', 0, 0, 0),
(52, 26, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(10) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(20) NOT NULL,
  `subject_name` varchar(150) NOT NULL,
  `course_id` int(10) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subjectcode`, `subject_name`, `course_id`, `semester`, `description`, `status`) VALUES
(6, 'BCA-S101T', 'Computer Fundamental & Office Automation', 5, '1st Semester', 'Computer Fundamental & Office Automation', 'Active'),
(7, 'BCA-S102T', 'Programming Principle & Algorithm', 5, '1st Semester', '', 'Active'),
(8, 'BCA-S103', 'Principle of Management', 5, '1st Semester', '', 'Active'),
(9, 'BCA-S104', 'Business Communication', 5, '1st Semester', '', 'Active'),
(10, 'BCA-S105', 'Mathematics ', 5, '1st Semester', '', 'Active'),
(11, 'BCA-S101P', 'Computer Laboratory and Practical Work of Office\nAutomation', 5, '1st Semester', '', 'Active'),
(12, 'BCA-S102P ', 'Computer Laboratory and Practical Work of Programming', 5, '1st Semester', '', 'Active'),
(16, 'BSc M01', 'Mathematics', 3, '1st Semester', ' ', 'Active'),
(17, 'BA C1so4', 'English', 2, '1st Semester', ' ', 'Active'),
(19, 'BBM AFc01', 'ACCOUNTING AND FINANCIAL MANAGEMENT', 6, '1st Semester', ' ', 'Active'),
(21, 'Bcom ST01', 'Statistics', 4, '1st Semester', ' ', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
  `syllabus_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) NOT NULL,
  `syllabustitle` varchar(150) NOT NULL,
  `syllabuscontents` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`syllabus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_id`, `subject_id`, `syllabustitle`, `syllabuscontents`, `status`) VALUES
(2, 6, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\nComputers, Super Computers.\nTypes of Programming Languages (Machine Languages, Assembly Languages,\nHigh Level Languages).\nData Organization, Drives, Files, Directories.\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\nSecondary Storage Devices (FD, CD, HD, Pen drive)\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\nNumber Systems\nIntroduction to Binary, Octal, Hexadecimal system\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(3, 6, 'UNIT-II  -Algorithm and Flowcharts', 'Algorithm: Definition, Characteristics, Advantages and disadvantages, Examples\nFlowchart: Definition, Define symbols of flowchart, Advantages and disadvantages,\nExamples ', 'Active'),
(4, 6, 'UNIT-III\nOperating System and Services in O.S. ', 'Dos  History, Files and Directories, Internal and External Commands, Batch Files, Types of O.S. ', 'Active'),
(5, 6, 'UNIT-IV\r\nWindows Operating Environment', 'Features of MS  Windows, Control Panel, Taskbar, Desktop, Windows Application, Icons,\nWindows Accessories, Notepad, Paintbrush. ', 'Active'),
(6, 6, 'UNIT-V\r\nEditors and Word Processors', 'Basic Concepts, Examples: MSWord, Introduction to desktop publishing.', 'Active'),
(7, 6, 'UNIT-VI\r\nSpreadsheets and Database packages ', 'Purpose, usage, command, MSExcel, Creation of files in MSAccess, Switching between\napplication, MSPowerPoint. ', 'Active'),
(14, 16, 'UNIT- I MATHEMATICAL FOUNDATIONS ', 'Propositions and logical operators, Truth tables and propositions generated by a set. Equivalence and implications, Laws of logic, Mathematical system, Proposition over a universe, Mathematical induction, Quantifiers\r\n', 'Active'),
(15, 16, 'UNIT- II', 'Binary operations on a non empty set, Groups, Subgroups, Normal Subgroups, Cosets, Factor groups, Rings, Sub rings, Ideals, Factor rings, Prime ideals, Minimal ideal, Fields, direct product of groups, Isomorphism of groups and rings   (definitions and examples only)\r\n', 'Active'),
(16, 16, 'UNIT-III', 'Addition and multiplication of matrices, Laws of matrix algebra, Singular and non singular matrices, Inverse of a matrix, Rank of a matrix, Rank of the product of two matrices, Systems of linear equations i.e. AX=0 and AX=B\r\n', 'Active'),
(17, 16, 'UNIT-IV', 'Characteristic equations of a square matrix, Cayley-Hamilton Theorem, Eigen values and eigen vectors, Eigen values and eigen vectors of symmetric skew  symmetric, Hermitian and skew â€“Hermitan matrices, Diagonalization of a square matrix.  ', 'Active'),
(23, 17, 'UNIT- I', 'Q 1. One essay type question (with internal choice) from the prescribed text.\r\nQ 2. Five short answer type questions (with internal choice) from the prescribed text.\r\n', 'Active'),
(24, 17, 'UNIT- II', 'Q 3. A comprehension passage from the prescribed text book (Reflection) with five questions at the end.\r\nQ 4. Faxes, e-mails, and text messages composing. This question will carry three parts A, B, and C with questions on all the three above mentioned items.\r\n', 'Active'),
(25, 17, 'UNIT-III', 'Q 5. Grammar questions on the following items: (i) Articles (ii) Preposition (iii) Tenses (iv) Subject verb agreement (v) Voice (vi) Tag questions (vii) Reported speech (viii) Comparatives and superlatives\r\nQ 6.  A paragraph of about 150 words on any one of the given topics.\r\n', 'Active'),
(26, 17, 'UNIT-IV', 'Q 7. Official letters / applications (With internal choice)\r\nQ 8. English in situations (for example: greetings, in the post office, catching a train, at a bank, making a telephone call, buying vegetables, at the hospital, on the bus etc.\r\n', 'Active'),
(27, 19, 'UNIT- I', 'The basic Financial Accounts, types of accounts, Rules of Entries of transaction, Journal. \r\nCash Book â€“ Types, Format of Cash book, Balancing of Cash Book, Subsidiary books - Purchase, Sales, Purchase return and sales return. \r\nLedger, posting of entries. \r\n', 'Active'),
(28, 19, 'UNIT- II', 'Trial Balance, Rectification of errors, adjustment entries. Depreciation and Inflation. \r\nPrinciples of Cost Accounting, Valuation of Stocks, Allocation of Overheads, Methods of material issues. \r\n', 'Active'),
(29, 19, 'UNIT-III', 'Pay roll department, Preparation of Pay roll, Preparation of wage record, Methods of payments of wages, overview of computerized method for payroll preparation. ', 'Active'),
(30, 19, 'UNIT-IV', 'Inventory account and store record, inventory or stock control and cost accounting, Department demand and supply method of stock control. \r\nClassification and condition of material Report on material handling. \r\nOverview of computerized accounting process â€“ Introduction to accounting system software, their features and some basic operations. \r\n', 'Active'),
(31, 21, 'UNIT- I', 'Basic Statistics: Measure of Central Tendency, Preparing frequency, distribution table, Mean Arithmetic, Mean Geometric, Mean Harmonic, Mean, Media, Mode.\r\nMeasure of Dispersion: Range, Variance and Standard Deviations; Frequency Distributions and Cumulative Frequency Distributions: Moments and Moments Generating Functions.\r\n', 'Active'),
(32, 21, 'UNIT- II', 'Distribution Patterns: Types of Theoretical Probability; Normal Binomial Poisson distribution.\r\nCorrelation and Regression: Types of Correlation, Properties of Coefficient of Correlation, Methods of studying Correlation; Aim of Regression Analysis, Kinds of Regression Analysis.\r\n', 'Active'),
(33, 21, 'UNIT-III', 'Tests of significance: Z-test, Student T-test, Chi-square test.  \r\nCurve fitting: Method of least squares and Polynomial fit.\r\n', 'Active'),
(34, 21, 'UNIT-IV', 'ANOVA: Meaning, Assumptions, Cochranâ€™s Theorem (only statement), One way classification, ANOVA Table for One-Way Classified Data, Baye''s theorem in decision-making, Forecasting techniques.', 'Active'),
(35, 7, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(36, 8, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(37, 9, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(38, 10, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(39, 11, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(40, 12, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(41, 8, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(42, 9, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(43, 10, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(44, 11, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(45, 12, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(46, 7, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(47, 7, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active'),
(48, 7, 'UNIT-I  Introduction to Computers', 'Introduction, Characteristics of Computers, Block diagram of computer.\r\nTypes of computers and features, Mini Computers, Micro Computers, Mainframe\r\nComputers, Super Computers.\r\nTypes of Programming Languages (Machine Languages, Assembly Languages,\r\nHigh Level Languages).\r\nData Organization, Drives, Files, Directories.\r\nTypes of Memory (Primary And Secondary) RAM, ROM, PROM, EPROM.\r\nSecondary Storage Devices (FD, CD, HD, Pen drive)\r\nI/O Devices (Scanners, Plotters, LCD, Plasma Display)\r\nNumber Systems\r\nIntroduction to Binary, Octal, Hexadecimal system\r\nConversion, Simple Addition, Subtraction, Multiplication ', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE IF NOT EXISTS `time_table` (
  `timetable_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `semister` varchar(25) NOT NULL,
  `week_day` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`timetable_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`timetable_id`, `staff_id`, `course_id`, `subject_id`, `semister`, `week_day`, `time`, `status`) VALUES
(9, 0, 5, 6, '1st Semester', 'Monday', '9.00 AM - 10.00 AM', 'Active'),
(10, 0, 5, 7, '1st Semester', 'Tuesday', '10.05 AM - 11.00 AM', 'Active'),
(11, 0, 5, 8, '1st Semester', 'Wednesday', '11.05 AM - 12.00 PM', 'Active'),
(12, 0, 5, 9, '3rd Semester', 'Thursday', '12.05 PM - 01.00 PM', 'Active'),
(13, 0, 5, 9, '1st Semester', 'Thursday', '12.05 PM - 01.00 PM', 'Active'),
(15, 0, 5, 10, '1st Semester', 'Friday', '02.05 PM - 03.00 PM', 'Active'),
(16, 0, 5, 11, '1st Semester', 'Saturday', '04.05 PM - 05.00 PM', 'Active'),
(17, 0, 5, 10, '1st Semester', 'Friday', '03.05 PM - 04.00 PM', 'Active'),
(18, 0, 5, 12, '1st Semester', 'Monday', '02.05 PM - 03.00 PM', 'Active'),
(19, 0, 5, 12, '1st Semester', 'Monday', '03.05 PM - 04.00 PM', 'Active'),
(20, 0, 5, 12, '1st Semester', 'Monday', '04.05 PM - 05.00 PM', 'Active'),
(22, 0, 5, 10, '1st Semester', 'Monday', '10.05 AM - 11.00 AM', 'Active'),
(25, 0, 5, 9, '1st Semester', 'Monday', '02.05 PM - 03.00 PM', 'Active'),
(26, 0, 5, 11, '1st Semester', 'Monday', '02.05 PM - 03.00 PM', 'Active'),
(31, 0, 5, 9, '1st Semester', 'Wednesday', '12.05 PM - 01.00 PM', 'Active'),
(32, 0, 5, 12, '1st Semester', 'Wednesday', '11.05 AM - 12.00 PM', 'Active'),
(33, 0, 5, 6, '1st Semester', 'Saturday', '10.05 AM - 11.00 AM', 'Active'),
(34, 0, 5, 10, '1st Semester', 'Tuesday', '12.05 PM - 01.00 PM', 'Active'),
(35, 0, 5, 7, '1st Semester', 'Wednesday', '02.05 PM - 03.00 PM', 'Active'),
(36, 0, 5, 8, '1st Semester', 'Friday', '9.00 AM - 10.00 AM', 'Active'),
(37, 0, 5, 9, '1st Semester', 'Monday', '12.05 PM - 01.00 PM', 'Active'),
(38, 0, 5, 6, '1st Semester', 'Monday', '11.05 AM - 12.00 PM', 'Active'),
(39, 0, 5, 11, '1st Semester', 'Monday', '02.05 PM - 03.00 PM', 'Active'),
(40, 0, 5, 12, '1st Semester', 'Monday', '02.05 PM - 03.00 PM', 'Active'),
(41, 0, 5, 12, '1st Semester', 'Monday', '02.05 PM - 03.00 PM', 'Active'),
(43, 0, 5, 9, '1st Semester', 'Tuesday', '11.05 AM - 12.00 PM', 'Active'),
(46, 0, 5, 10, '1st Semester', 'Tuesday', '04.05 PM - 05.00 PM', 'Active'),
(47, 0, 5, 11, '1st Semester', 'Tuesday', '03.05 PM - 04.00 PM', 'Active'),
(48, 0, 5, 7, '1st Semester', 'Tuesday', '03.05 PM - 04.00 PM', 'Active'),
(49, 0, 5, 10, '1st Semester', 'Tuesday', '02.05 PM - 03.00 PM', 'Active'),
(50, 0, 5, 11, '1st Semester', 'Wednesday', '9.00 AM - 10.00 AM', 'Active'),
(51, 0, 5, 11, '1st Semester', 'Wednesday', '10.05 AM - 11.00 AM', 'Active'),
(52, 0, 5, 6, '1st Semester', 'Wednesday', '03.05 PM - 04.00 PM', 'Active'),
(53, 0, 5, 10, '1st Semester', 'Wednesday', '04.05 PM - 05.00 PM', 'Active'),
(54, 0, 5, 6, '1st Semester', 'Thursday', '9.00 AM - 10.00 AM', 'Active'),
(56, 0, 5, 8, '1st Semester', 'Thursday', '10.05 AM - 11.00 AM', 'Active'),
(57, 0, 5, 12, '1st Semester', 'Thursday', '02.05 PM - 03.00 PM', 'Active'),
(58, 0, 5, 12, '1st Semester', 'Thursday', '03.05 PM - 04.00 PM', 'Active'),
(59, 0, 5, 12, '1st Semester', 'Thursday', '04.05 PM - 05.00 PM', 'Active'),
(60, 0, 5, 6, '1st Semester', 'Friday', '10.05 AM - 11.00 AM', 'Active'),
(61, 0, 5, 7, '1st Semester', 'Friday', '11.05 AM - 12.00 PM', 'Active'),
(62, 0, 5, 6, '1st Semester', 'Saturday', '9.00 AM - 10.00 AM', 'Active'),
(63, 0, 5, 10, '1st Semester', 'Friday', '12.05 PM - 01.00 PM', 'Active'),
(64, 0, 5, 9, '1st Semester', 'Saturday', '12.05 PM - 01.00 PM', 'Active'),
(65, 0, 5, 8, '1st Semester', 'Saturday', '03.05 PM - 04.00 PM', 'Active'),
(66, 0, 5, 17, '1st Semester', 'Monday', '02.05 PM - 03.00 PM', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `webpage`
--

CREATE TABLE IF NOT EXISTS `webpage` (
  `webpage_id` int(10) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(50) NOT NULL,
  `pagetitle` varchar(150) NOT NULL,
  `pagediscriptipon` text NOT NULL,
  `imagepath` varchar(100) NOT NULL,
  PRIMARY KEY (`webpage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `webpage`
--

INSERT INTO `webpage` (`webpage_id`, `pagename`, `pagetitle`, `pagediscriptipon`, `imagepath`) VALUES
(2, 'Home', 'Home', '<p><strong>SDM College</strong> was a brainchild of the then Dharmadhikari of Sri Kshethra Dharmasthala, Sri D Ratnavarma Heggade. Established in 1966 at a very small scale at Siddavana Gurukula was affiliated to Mysore University. It is affiliated to the Mangalore university since 1989. The college continued to grow with the introduction of Postgraduate programmes from the academic year 2001.The college attained academic autonomy from the academic year 2007. At present, the college along with 5 undergraduate 10 postgraduate programmes also offers PhD programmes affiliated to the universities of Hampi, Tumkur and Mangalore.</p>\r\n\r\n<p>It is one of the most reputed colleges in India with high academic quality and ample co-curricular opportunities for a successful professional growth. The architecturally striking buildings, amidst the lush green campus provide an aesthetic environment for academic performances. &nbsp;The UG, PG and Research Programmes are strengthened by active student engagement.</p>\r\n\r\n<p>The college has a distinguished record of commitment to equal opportunities. About 60 % of the students get one or the other scholarships. Nearly 2500 Undergraduate and 500 Postgraduate students study at campus. A large proportion of our students live in college accommodation. Welcome to SDM</p>\r\n', '134581_1_slider2.png'),
(3, 'About Us', 'About us', '<p>SDM College was a brainchild of the then Dharmadhikari of Sri Kshethra Dharmasthala, Sri D Ratnavarma Heggade. Established in 1966 at a very small scale at Siddavana Gurukula was affiliated to Mysore University. It is affiliated to the Mangalore university since 1989. The college continued to grow with the introduction of Postgraduate programmes from the academic year 2001.The college attained academic autonomy from the academic year 2007. At present, the college along with 5 undergraduate 10 postgraduate programmes also offers PhD programmes affiliated to the universities of Hampi, Tumkur and Mangalore.</p>\r\n\r\n<p>It is one of the most reputed colleges in India with high academic quality and ample co-curricular opportunities for a successful professional growth. The architecturally striking buildings, amidst the lush green campus provide an aesthetic environment for academic performances. &nbsp;The UG, PG and Research Programmes are strengthened by active student engagement.</p>\r\n\r\n<p>The college has a distinguished record of commitment to equal opportunities. About 60 % of the students get one or the other scholarships. Nearly 2500 Undergraduate and 500 Postgraduate students study at campus. A large proportion of our students live in college accommodation.</p>\r\n', '30731SDM_College_Ujire.jpg'),
(4, 'Contact us', 'About us', '<p>SDM College was a brainchild of the then Dharmadhikari of Sri Kshethra Dharmasthala, Sri D Ratnavarma Heggade. Established in 1966 at a very small scale at Siddavana Gurukula was affiliated to Mysore University. It is affiliated to the Mangalore university since 1989. The college continued to grow with the introduction of Postgraduate programmes from the academic year 2001.The college attained academic autonomy from the academic year 2007. At present, the college along with 5 undergraduate 10 postgraduate programmes also offers PhD programmes affiliated to the universities of Hampi, Tumkur and Mangalore.</p>\r\n\r\n<p>It is one of the most reputed colleges in India with high academic quality and ample co-curricular opportunities for a successful professional growth. The architecturally striking buildings, amidst the lush green campus provide an aesthetic environment for academic performances. &nbsp;The UG, PG and Research Programmes are strengthened by active student engagement.</p>\r\n\r\n<p>The college has a distinguished record of commitment to equal opportunities. About 60 % of the students get one or the other scholarships. Nearly 2500 Undergraduate and 500 Postgraduate students study at campus. A large proportion of our students live in college accommodation.</p>\r\n', '30731SDM_College_Ujire.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
