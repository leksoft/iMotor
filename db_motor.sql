-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2014 at 05:59 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_motor`
--
CREATE DATABASE IF NOT EXISTS `db_motor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_motor`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `AnswerID` int(11) NOT NULL AUTO_INCREMENT,
  `QuestionID` int(100) NOT NULL,
  `Answer` varchar(500) NOT NULL,
  PRIMARY KEY (`AnswerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=193 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`AnswerID`, `QuestionID`, `Answer`) VALUES
(53, 14, 'ยูกาตะ'),
(54, 14, 'ฮันบก'),
(55, 14, 'กิโมโน'),
(56, 14, 'เทควันโด้'),
(57, 15, 'ดนตรี'),
(58, 15, 'นากฏศิลป์'),
(59, 15, 'จิตรกรรม'),
(60, 15, 'เครื่องเบญจรงค์'),
(61, 16, 'ข้าวเหนียว'),
(62, 16, 'ซูชิ'),
(63, 16, 'กิมจิ'),
(64, 16, 'พาสต้า'),
(65, 17, '11'),
(66, 17, '12'),
(67, 17, '13'),
(68, 17, '14'),
(69, 18, 'ㅁ'),
(70, 18, 'ㄱ'),
(71, 18, 'ㅍ'),
(72, 18, 'ㄴ'),
(73, 19, 'ㅁ'),
(74, 19, 'ㄹ'),
(75, 19, 'ㄷ'),
(76, 19, 'ㅅ'),
(77, 20, '4'),
(78, 20, '5'),
(79, 20, '6'),
(80, 20, '7'),
(81, 21, 'อู'),
(82, 21, 'ยู'),
(83, 21, 'โอ'),
(84, 21, 'โย'),
(85, 22, 'อา'),
(86, 22, 'ยา'),
(87, 22, 'ออ'),
(88, 22, 'ยอ'),
(89, 23, 'ฉันกินข้าว'),
(90, 23, 'กรุณาช่วยฉันหน่อย'),
(91, 23, 'ยินดีที่ได้พบ'),
(92, 23, 'สวัสดี'),
(93, 24, '저는 밥을 먹습니다'),
(94, 24, '안녕하세요'),
(95, 24, '감사합니다'),
(96, 24, '고맙습니다'),
(97, 25, 'ขยายประธาน'),
(98, 25, 'ขยายกรรม'),
(99, 25, 'จบประโยค'),
(100, 25, 'กล่าวลา'),
(101, 26, '을'),
(102, 26, '는'),
(103, 26, '저'),
(104, 26, '습니다'),
(105, 27, 'ฉัน'),
(106, 27, 'อ่าน'),
(107, 27, 'จดหมาย'),
(108, 27, 'เธอ'),
(109, 28, 'ทำอะไร'),
(110, 28, 'กำลังไป'),
(111, 28, 'กำลังมา'),
(112, 28, 'กำลังนอน'),
(113, 29, '1'),
(114, 29, '2'),
(115, 29, '3'),
(116, 29, '4'),
(117, 30, 'ราตรีสวัสดิ์'),
(118, 30, 'สวัสดี'),
(119, 30, 'ยินดีที่ได้พบ'),
(120, 30, 'โปรดช่วยฉัน'),
(121, 31, '고맙습니다'),
(122, 31, '감사합니다'),
(123, 31, '고맙다'),
(124, 31, '안녕'),
(125, 32, 'กล่าวขอบคุณ'),
(126, 32, 'กล่าวขอโทษ'),
(127, 32, 'กล่าวลา'),
(128, 32, 'กล่าวแสดงความยินดี'),
(129, 33, 'กล่าวขอบคุณ'),
(130, 33, 'กล่าวขอโทษ'),
(131, 33, 'กล่าวลา'),
(132, 33, 'กล่าวแสดงความยินดี'),
(133, 34, 'เมื่อจากกัน'),
(134, 34, 'เมื่อพบกัน'),
(135, 34, 'เมื่อจะกินข้าว'),
(136, 34, 'เมื่อจะเข้านอน'),
(137, 35, 'ฉัน'),
(138, 35, 'เธอ'),
(139, 35, 'เขา'),
(140, 35, 'ท่าน'),
(141, 36, 'บุรุษที่ 1'),
(142, 36, 'บุรุษที่ 2'),
(143, 36, 'บุรุษที่ 3'),
(144, 36, 'บุรุษที่ 4'),
(145, 37, 'สิ่งโน้น'),
(146, 37, 'สิ่งนั้น'),
(147, 37, 'สิ่งนี้'),
(148, 37, 'สิ่งของ'),
(149, 38, '여기'),
(150, 38, '거기'),
(151, 38, '저기'),
(152, 38, '저것'),
(153, 39, 'พี่ชาย'),
(154, 39, 'พี่สาว'),
(155, 39, 'พ่อ'),
(156, 39, 'แม่'),
(157, 40, '아빠'),
(158, 40, '엄마'),
(159, 40, '아주머니'),
(160, 40, '아저씨'),
(161, 41, '형'),
(162, 41, '언니'),
(163, 41, '오빠'),
(164, 41, '누나'),
(165, 42, 'น้องชายเรียกพี่สาว'),
(166, 42, 'น้องสาวเรียกพี่สาว'),
(167, 42, 'พี่สวเรียกน้องสาว'),
(168, 42, 'พี่สาวเรียกน้องชาย'),
(169, 43, '450 เมตร'),
(170, 43, '460 เมตร'),
(171, 43, '470 เมตร'),
(172, 43, '480 เมตร'),
(173, 44, 'ปูซาน'),
(174, 44, 'คยองกิ'),
(175, 44, 'เจจู'),
(176, 44, 'โซล'),
(177, 45, 'เพลงรักในสายลมหนาว'),
(178, 45, 'เจ้าหญิงวุ่นวายเจ้าชายเย็นชา'),
(179, 45, 'รักวุ่นวายนายกะล่อน'),
(180, 45, 'รักใสใสหัวใจสี่ดวง'),
(181, 46, 'เกาะนามิ'),
(182, 46, 'เท็ดดี้ แบร์'),
(183, 46, 'โซลทาวเวอร์'),
(184, 46, 'Sea Train'),
(185, 47, 'แม่น้ำฮันกัง'),
(186, 47, 'แม่น้ำฮันเกิง'),
(187, 47, 'แม่น้ำฮันกิ'),
(188, 47, 'แม่น้ำฮันกู'),
(189, 48, 'ดวงดาว'),
(190, 48, 'ดอกไม้'),
(191, 48, 'โสม'),
(192, 48, 'เหล้า');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `QuestionID` int(11) NOT NULL AUTO_INCREMENT,
  `Question` varchar(500) NOT NULL,
  `AnswerTrue` varchar(300) NOT NULL,
  PRIMARY KEY (`QuestionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `Question`, `AnswerTrue`) VALUES
(14, 'ชุดแต่งกายประจำชาติเกาหลีเรียกว่าอะไร', 'ฮันบก'),
(15, 'ข้อใดไม่ใช่ความเป็นอัฉริยะทางศิลปะของเกาหลี', 'เครื่องเบญจรงค์'),
(16, 'อาหารประจำชาติของเกาหลีคืออะไร', 'กิมจิ'),
(17, 'พยัญชนะในภาษาเกาหลีมีกี่ตัว', '14'),
(18, 'คียอก คือพยัญชนะตัวใดในภาษาเกาหลี', 'ㄱ'),
(19, 'เสียง ซีอด ในภาษาเกาหลีคือพยัญชนะตัวใด', 'ㅅ'),
(20, 'พยัญชนะซ้อนในภาษาเกาหลีมีทั้งหมดกี่ตัว', '5'),
(21, 'เสียงสระในภาษาเกาหลี  ㅜ คือเสียงใด', 'อู'),
(22, 'เสียงสระในภาษาเกาหลีㅕ คือเสียงใด', 'ยอ'),
(23, '좀 도와주세요! มีความหมายว่าอย่างไร', 'กรุณาช่วยฉันหน่อย'),
(24, 'ฉัน กิน ข้าว ในภาษาเกาหลีคือประโยคใด', '저는 밥을 먹습니다'),
(25, '는 ในภาษาเกาหลีใช้อย่างไร', 'ขยายประธาน'),
(26, 'คำช่วยชี้กรรม คือ ข้อใด', '을'),
(27, '편지 มีความหมายว่าอย่างไร', 'จดหมาย'),
(28, '고 있다. มีความหมายว่าอย่างไร', 'กำลังไป'),
(29, 'การผันโยมีกี่รูปแบบ', '4'),
(30, '안녕하세요 มีความหมายว่าอย่างไร', 'สวัสดี'),
(31, 'ข้อใดคือการกล่าวขอบคุณแบบสุภาพที่ใช้กล่าวกับผู้ใหญ่', '감사합니다'),
(32, '미안합니다 คือการกล่าวแบบใด', 'กล่าวขอโทษ'),
(33, '축하 합니다 คือกล่าวกล่าวแบบใด', 'กล่าวแสดงความยินดี'),
(34, 'การกล่าวทักทาย안녕하세요 ควรกล่าวเมื่อใด', 'เมื่อพบกัน'),
(35, 'บุรุษที่ 1 ในคำสรรพนามคือใคร', 'ฉัน'),
(36, 'เธอ คือ บุรุษใดในคำสรรพนาม', 'บุรุษที่ 2'),
(37, '이것 มีความหมายว่าอย่างไร', 'สิ่งนี้'),
(38, 'ข้อใดมีความหมายว่า ที่นี่ ในภาษาเกาหลี', '여기'),
(39, '아빠 ใช้เรียกใคร', 'พ่อ'),
(40, 'ข้อใดมีความหมายว่าลุงในภาษาเกาหลี', '아저씨'),
(41, 'ข้อใดคือสรรพนามน้องสาวใช้เรียกพี่ชาย', '오빠'),
(42, '언니 ใช้เรียกใครในภาษาเกาหลี', 'น้องสาวเรียกพี่สาว'),
(43, 'โซลทาวเวอร์มีความสูงเท่าใด', '480 เมตร'),
(44, 'เกาะเจจูอยู่ในจังหวัดใดในเกาหลี', 'เจจู'),
(45, 'พิพิธพัณฑ์เท็ดดี้ แบร์ ใช้ถ่ายทำซีรี่ย์เรื่องใด', 'เจ้าหญิงวุ่นวายเจ้าชายเย็นชา'),
(46, 'สถานที่ท่องเที่ยวที่โรแมนติกที่สุดในเกาหลีที่ได้รับเลือกให้ลงกินเน็สบุค คือที่ใด', 'Sea Train'),
(47, 'แม่น้ำสายหลักของประเทศเกาหลีคือที่ใด', 'แม่น้ำฮันกัง'),
(48, 'ประเทศเกาหลีได้ชื่อมาจากอะไร', 'โสม');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `ReplyID` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `QuestionID` int(5) unsigned zerofill NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Details` text NOT NULL,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`ReplyID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `QuestionID`, `CreateDate`, `Details`, `Name`) VALUES
(00005, 00018, '2014-01-23 21:02:24', 'test', 'e'),
(00006, 00019, '2014-02-25 19:02:41', 'ดด', ''),
(00007, 00019, '2014-02-27 04:01:05', 'dd', 'd'),
(00008, 00019, '2014-02-27 04:01:24', 'dd', 'd'),
(00009, 00019, '2014-02-27 04:01:39', 'dd', 'd'),
(00010, 00019, '2014-02-27 04:02:01', 'dd', 'd'),
(00011, 00019, '2014-02-27 04:02:17', 'dd', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `tbcar`
--

CREATE TABLE IF NOT EXISTS `tbcar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_car` varchar(250) NOT NULL,
  `name_code` varchar(20) NOT NULL,
  `version` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `type_car` varchar(255) NOT NULL,
  `FilesName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbcar`
--

INSERT INTO `tbcar` (`id`, `name_car`, `name_code`, `version`, `color`, `type`, `type_car`, `FilesName`) VALUES
(1, 'New Jazz', 'กม 2568', '-', 'เทา', 'auto', 'กระบะ', '1310913174-a.jpg'),
(2, 'New Vios', 'กง 2585', '-', 'น้ำเงิน', 'auto', 'กระบะ', 'Honda_newcity_Highlight.jpg'),
(3, 'All New Avanza', 'มค 2557', '2014', 'เทา', 'auto', 'กระบะ', '1187230242-13641.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbconfig`
--

CREATE TABLE IF NOT EXISTS `tbconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbconfig`
--

INSERT INTO `tbconfig` (`id`, `name`, `detail`) VALUES
(1, 'ขั้นตอนและวิธีการชำระเงิน', '85555555');

-- --------------------------------------------------------

--
-- Table structure for table `tbcourse`
--

CREATE TABLE IF NOT EXISTS `tbcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(250) NOT NULL,
  `c_time` int(5) NOT NULL,
  `c_price` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbcourse`
--

INSERT INTO `tbcourse` (`id`, `c_name`, `c_time`, `c_price`) VALUES
(1, 'คอร์ส 6  ชั่วโมง', 6, 2800),
(2, 'คอร์ส 10  ชั่วโมง', 10, 4000),
(3, 'คอร์ส 15  ชั่วโมง', 15, 5800),
(4, 'คอร์ส 20  ชั่วโมง', 20, 7600);

-- --------------------------------------------------------

--
-- Table structure for table `tbdegree`
--

CREATE TABLE IF NOT EXISTS `tbdegree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbdegree`
--

INSERT INTO `tbdegree` (`id`, `name`) VALUES
(1, 'สาขาที่ 1'),
(2, 'สาขาที่ 2'),
(3, 'สาขาที่ 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbnews`
--

CREATE TABLE IF NOT EXISTS `tbnews` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `news_name` varchar(250) NOT NULL,
  `news_detail` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbnews`
--

INSERT INTO `tbnews` (`id`, `news_name`, `news_detail`, `date`) VALUES
(6, 'สมาชิกที่ลงทะเบียน ให้ไปชำระเงินที่ธนาคาร ตามที่กำหนดด้วย มิฉะนั้น ท่านจะถูกตัดสิทธิ์การเรียน', 'dfdfdfdfff', '2014-02-26 10:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbphase`
--

CREATE TABLE IF NOT EXISTS `tbphase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `around` varchar(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbphase`
--

INSERT INTO `tbphase` (`id`, `around`, `name`) VALUES
(1, 'รอบเช้า', '07:00 - 09:00 น.'),
(2, 'รอบเช้า', '09:00 - 11:00 น.'),
(3, 'รอบเช้า', '11:00 - 13:00 น.'),
(4, 'รอบบ่าย', '13:30 - 15:30 น.'),
(5, 'รอบบ่าย', '15:30 - 17:30 น.'),
(6, 'รอบบ่าย', '17:30 - 19:30 น.');

-- --------------------------------------------------------

--
-- Table structure for table `tbregister`
--

CREATE TABLE IF NOT EXISTS `tbregister` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `addr` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `r_day` date NOT NULL,
  `r_time` varchar(255) NOT NULL,
  `r_gear` varchar(250) NOT NULL,
  `r_car` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `FristPoint` int(11) NOT NULL,
  `EndPoint` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbregister`
--

INSERT INTO `tbregister` (`id`, `username`, `password`, `name`, `addr`, `email`, `tel`, `degree`, `r_day`, `r_time`, `r_gear`, `r_car`, `course_id`, `payment`, `status`, `type`, `created`, `FristPoint`, `EndPoint`) VALUES
(5, 'leksoft', '1234', 'นครินทร์ ม่วงอ่อน', '555', 'esandev@hotmail.com3', '0810987678', '', '0000-00-00', '', '', '', 1, 'ชำระเงินแล้ว', 'ยังไม่ชำระเงิน', 'user', '2014-02-26', 3, 4),
(8, '11', '11', '111', '', '11', '1111', 'สาขาที่ 1', '2014-02-19', 'รอบเช้า 07:00 - 09:00 น.', 'common', 'New Jazz กม 2568', 1, 'ชำระเงินแล้ว', 'ยังไม่ชำระเงิน', 'user', '2014-02-26', 0, 0),
(9, '22', '222', '222', '222', '22', '222', 'สาขาที่ 1', '2014-02-22', 'รอบเช้า 09:00 - 11:00 น.', 'auto', 'New Vios กง 2585', 1, 'ชำระเงินแล้ว', 'ยังไม่ชำระเงิน', 'user', '2014-02-26', 0, 0),
(10, '22', '22', '222', '2', '222', '2', 'สาขาที่ 3', '2014-02-27', 'รอบบ่าย 13:30 - 15:30 น.', 'auto', 'New Vios กง 2585', 1, 'ยังไม่ชำระเงิน', 'ยังไม่ชำระเงิน', 'user', '2014-02-26', 0, 0),
(11, 'ddd', 'ddd', 'จันทร์จิรา วิชาทา', 'd', 'leksoft@hotmail.com', 'd', 'สาขาที่ 1', '2014-02-28', 'รอบเช้า 09:00 - 11:00 น.', 'auto', 'New Vios กง 2585', 2, 'ยังไม่ชำระเงิน', 'ยังไม่ชำระเงิน', 'user', '2014-02-27', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `type` varchar(20) NOT NULL,
  `m_status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `fname`, `lname`, `email`, `gender`, `tel`, `type`, `m_status`) VALUES
(1, 'admin', 'admin', 'นงเยาว์', 'สร้อยหาญ', 'admin@localhost', 'f', '1111', 'admin', '1'),
(22, 'user', '1234', 'จันทร์จิรา', 'วิชาทา', 'user@hotmail.com', 'f', '1234', 'user', ''),
(23, 'leksoft', '1234', 'กก', 'กก', 'กกกก', 'm', '0810917526', 'manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_table_lern`
--

CREATE TABLE IF NOT EXISTS `tb_table_lern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phase_around` int(11) NOT NULL,
  `table_lern_hour` int(2) NOT NULL,
  `table_lern_day` int(2) NOT NULL,
  `phase_time` varchar(50) NOT NULL,
  `day` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tb_table_lern`
--

INSERT INTO `tb_table_lern` (`id`, `course_id`, `user_id`, `phase_around`, `table_lern_hour`, `table_lern_day`, `phase_time`, `day`) VALUES
(11, 1, 1, 0, 1, 0, '07:00 - 09:00 น.', ''),
(12, 2, 22, 0, 2, 0, '15:30 - 17:30 น.', ''),
(13, 1, 1, 0, 1, 0, '17:30 - 19:30 น.', ''),
(14, 3, 22, 0, 7, 0, '17:30 - 19:30 น.', ''),
(15, 1, 1, 0, 1, 0, '15:30 - 17:30 น.', ''),
(16, 1, 1, 0, 2, 0, '15:30 - 17:30 น.', ''),
(17, 1, 1, 0, 0, 0, '07:00 - 09:00 น.', '01/05/2557');

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE IF NOT EXISTS `webboard` (
  `QuestionID` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `CreateDate` datetime NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Details` text NOT NULL,
  `Name` varchar(50) NOT NULL,
  `View` int(5) NOT NULL,
  `Reply` int(5) NOT NULL,
  PRIMARY KEY (`QuestionID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`QuestionID`, `CreateDate`, `Question`, `Details`, `Name`, `View`, `Reply`) VALUES
(00018, '2014-01-23 21:02:16', 'test', 'test', 'test', 9, 1),
(00019, '2014-02-25 19:02:35', 'ดเด', 'เดเดเด', 'ดด', 11, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
