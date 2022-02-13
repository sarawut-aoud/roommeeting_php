-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 06:42 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `acces`
--

CREATE TABLE `acces` (
  `ev_id` int(11) NOT NULL,
  `eq_id` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acces`
--

INSERT INTO `acces` (`ev_id`, `eq_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 4),
(3, 1),
(3, 5),
(3, 7),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 16),
(6, 10),
(6, 11),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 16),
(7, 10),
(7, 11),
(8, 1),
(8, 3),
(8, 4),
(8, 5),
(9, 4),
(9, 5),
(10, 4),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `de_id` int(10) NOT NULL,
  `de_name` varchar(50) NOT NULL,
  `de_phone` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`de_id`, `de_name`, `de_phone`) VALUES
(2, 'งานธุรการ', '5967'),
(3, 'งานคลังพัสดุ', '1705'),
(4, 'งานวัสดุการแพทย์', '1502'),
(7, 'งานเวชระเบียน', '9658'),
(8, 'งานโสตทัศนศีกษา', '4563'),
(9, 'งานประชาสัมพันธ์', '8745');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `eq_id` int(3) NOT NULL,
  `eq_name` varchar(250) NOT NULL,
  `de_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eq_id`, `eq_name`, `de_id`) VALUES
(1, 'เครื่องขยายเสียงพร้อมไมค์', 8),
(2, 'Projector', 8),
(3, 'Computer', 8),
(4, 'น้ำดื่ม/อาหารว่าง', 2),
(5, 'วีดีทัศน์ TV/VCD', 8),
(6, 'เครื่องฉายภาพ 3 มิติ', 7),
(7, 'ทีมลงทะเบียน', 8),
(8, 'ป้ายเวที/ป้ายชื่อวิทยากร', 7),
(16, 'ทีมต้อนรับ', 4),
(10, 'ติดบอร์ดหน้าลิฟท์', 9),
(11, 'ประกาศเสียงตามสาย', 9),
(12, 'แจ้งนักข่าวภายนอก', 9),
(13, 'แจ้งทางวิทยุ', 9),
(14, 'แจ้งทางหนังสือพิมพ์', 9),
(15, 'แจ้งทางโทรทัศน์', 9);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ev_id` int(11) NOT NULL,
  `ev_title` varchar(256) NOT NULL,
  `ev_startdate` date NOT NULL,
  `ev_enddate` date NOT NULL,
  `ev_starttime` time NOT NULL,
  `ev_endtime` time NOT NULL,
  `ev_color` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `ev_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ev_people` int(5) NOT NULL,
  `ev_status` int(1) NOT NULL,
  `st_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `ro_id` int(5) NOT NULL,
  `ev_url` varchar(300) NOT NULL,
  `ev_bgcolor` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `ev_repeatday` varchar(20) NOT NULL,
  `event_id` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ev_id`, `ev_title`, `ev_startdate`, `ev_enddate`, `ev_starttime`, `ev_endtime`, `ev_color`, `ev_createdate`, `ev_people`, `ev_status`, `st_id`, `id`, `ro_id`, `ev_url`, `ev_bgcolor`, `ev_repeatday`, `event_id`) VALUES
(1, 'พัฒนาคุณภาพงาน', '2021-04-01', '2021-04-02', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-08 16:21:37', 50, 3, 1, 3, 2, '', '#FFFFFF', '', '640400001'),
(2, 'พัฒนาคุณภาพงาน', '2021-04-02', '2021-04-02', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-08 16:21:37', 50, 3, 1, 3, 2, '', '#FFFFFF', '', '640400001'),
(3, 'โครงการอบรมป้องกันโควิด-19', '2021-04-05', '2021-04-05', '08:30:00', '15:30:00', '#FFFFFF', '2021-04-08 16:23:54', 200, 3, 3, 3, 3, '', '#FFFFFF', '', '640400002'),
(4, 'โครงการอบรมและพัฒนางาน', '2021-03-31', '2021-04-01', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 16:30:23', 20, 4, 3, 1, 4, '', '#FFFFFF', '', '640400003'),
(5, 'โครงการอบรมและพัฒนางาน', '2021-04-01', '2021-04-01', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 16:30:23', 20, 4, 3, 1, 4, '', '#FFFFFF', '', '640400003'),
(6, 'โครงการอบรมประจำปี พ.ศ. 2564', '2021-04-06', '2021-04-07', '10:00:00', '12:00:00', '#FFFFFF', '2021-04-08 16:36:06', 5, 3, 3, 2, 6, '', '#FFFFFF', '', '640400004'),
(7, 'โครงการอบรมประจำปี พ.ศ. 2564', '2021-04-07', '2021-04-07', '10:00:00', '12:00:00', '#FFFFFF', '2021-04-08 16:36:06', 5, 3, 3, 2, 6, '', '#FFFFFF', '', '640400004'),
(8, 'ประชุมวางแผนงาน', '2021-04-20', '2021-04-20', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-08 16:37:02', 15, 1, 3, 4, 6, '', '#FFFFFF', '', '640400005'),
(9, 'ประชุมด้านการแพทย์', '2021-04-05', '2021-04-06', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 16:38:12', 25, 3, 1, 6, 2, '', '#FFFFFF', '', '640400006'),
(10, 'ประชุมด้านการแพทย์', '2021-04-06', '2021-04-06', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 16:38:12', 25, 3, 1, 6, 2, '', '#FFFFFF', '', '640400006');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ntitle` varchar(10) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `de_id` int(10) NOT NULL,
  `sta_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `ntitle`, `firstname`, `lastname`, `position`, `phone`, `de_id`, `sta_id`) VALUES
(1, 'jane', '1234', 'นางสาว', 'จุฑามาศ', 'ตู้ภูมิ', 'personnel', '0845773407', 7, 3),
(2, 'sss', '1234', 'นาย', 'พิษณุ', 'อุ่นชาวนา', 'personnel', '0869755697', 8, 2),
(3, 'admin', '1234', 'นางสาว', 'ดรุณี', 'อินทรินทร์', 'admin', '0869755000', 2, 1),
(4, 'test', '1234', 'นาย', 'ณัฐวุฒิ', 'ผดุงเขตต์', 'พนักงาน', '0945773258', 8, 3),
(6, 'www', '1234', 'นาง', 'กำไร', 'พงศ์สุวรรณ', 'พนักงาน', '0632541201', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ro_id` int(5) NOT NULL,
  `ro_name` varchar(50) NOT NULL,
  `ro_people` int(4) NOT NULL,
  `ro_color` varchar(20) NOT NULL,
  `ro_detail` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ro_id`, `ro_name`, `ro_people`, `ro_color`, `ro_detail`) VALUES
(1, 'ห้องประชุมแสงจันทร์', 500, '#5ccbf0', 'ตึกผู้ป่วยนอก ชั้น 4'),
(2, 'ห้องประชุมแสงตะวัน', 50, '#68da49', 'ห้องประชุม0'),
(3, 'ห้องประชุมแสงดาว', 200, '#d84dff', 'ห้องประชุม1'),
(4, 'ห้องประชุม 2', 20, '#ece869', 'ห้องประชุม2'),
(5, 'ห้องประชุมดอกปีบ', 150, '#ff6b6b', 'ห้องประชุม3'),
(6, 'ห้องรับรอง', 15, '#fe9fe5', 'ห้องประชุม4');

-- --------------------------------------------------------

--
-- Table structure for table `setdevice`
--

CREATE TABLE `setdevice` (
  `dv_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `ev_id` int(11) NOT NULL,
  `dv_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setdevice`
--

INSERT INTO `setdevice` (`dv_id`, `id`, `ev_id`, `dv_status`) VALUES
(1, 4, 1, 3),
(2, 4, 3, 3),
(4, 4, 6, 3),
(5, 4, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seting`
--

CREATE TABLE `seting` (
  `set_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `ev_id` int(11) NOT NULL,
  `set_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seting`
--

INSERT INTO `seting` (`set_id`, `id`, `ev_id`, `set_status`) VALUES
(3, 2, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sta_id` int(5) NOT NULL,
  `sta_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sta_id`, `sta_name`) VALUES
(1, 'admin'),
(2, 'ผู้ใช้ทั่วไป'),
(3, 'หัวหน้าตึก/หัวหน้าแผนก');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `st_id` int(10) NOT NULL,
  `st_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`st_id`, `st_name`) VALUES
(1, 'ประชุมทั่วไป'),
(2, 'ตัวยู เต็มห้อง'),
(3, 'ชั้นเรียน'),
(4, 'ประชุมสภา'),
(5, 'อื่นๆ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ro_id`);

--
-- Indexes for table `setdevice`
--
ALTER TABLE `setdevice`
  ADD PRIMARY KEY (`dv_id`);

--
-- Indexes for table `seting`
--
ALTER TABLE `seting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `de_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `eq_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `setdevice`
--
ALTER TABLE `setdevice`
  MODIFY `dv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seting`
--
ALTER TABLE `seting`
  MODIFY `set_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sta_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
