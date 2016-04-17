-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 01:48 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wachira_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`, `admin_fullname`, `admin_email`) VALUES
('admin', '1234', 'Administrator', 'admin@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL,
  `category_name` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'แหวนผู้ชาย'),
(3, 'แหวนผู้หญิง'),
(4, 'สร้อยคอ'),
(5, 'จี้'),
(6, 'ต่างหู'),
(7, 'สร้อยข้อมือ/กำไร'),
(8, 'โทแพส'),
(9, 'แอเมทิสต์'),
(10, 'พลอยสตาร์'),
(11, 'ซีทริน'),
(12, 'เพอริโต'),
(13, 'ทับทิม'),
(14, 'บุษราคัม'),
(15, 'ไพลิน'),
(16, 'มรกต'),
(17, 'โกเมน'),
(18, 'เพทาย');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(10) unsigned NOT NULL,
  `contact_title` varchar(300) NOT NULL,
  `contact_full_name` varchar(120) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_detail` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(10) unsigned NOT NULL,
  `member_username` varchar(30) NOT NULL,
  `member_password` varchar(16) NOT NULL,
  `member_full_name` varchar(100) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_tel` varchar(100) NOT NULL,
  `member_birthday` date DEFAULT NULL,
  `member_gender` varchar(30) DEFAULT NULL,
  `member_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) unsigned NOT NULL,
  `order_number` varchar(8) NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `order_date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_total_price` float NOT NULL DEFAULT '0',
  `order_status` enum('รอการชำระเงิน','รอการจัดส่ง','จัดส่งแล้ว') NOT NULL DEFAULT 'รอการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `order_detail_amount` int(11) NOT NULL,
  `order_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `order_number` varchar(8) NOT NULL,
  `payment_bank` varchar(100) NOT NULL,
  `payment_branch` varchar(100) NOT NULL,
  `payment_amount` float NOT NULL DEFAULT '0',
  `payment_date_transfer` date DEFAULT NULL,
  `payment_time_transfer` varchar(50) NOT NULL,
  `payment_remark` varchar(300) DEFAULT NULL,
  `payment_evidence` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) unsigned NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_price` float NOT NULL DEFAULT '0',
  `product_stock` int(5) NOT NULL DEFAULT '0',
  `product_date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `product_imgDir` varchar(256) DEFAULT NULL,
  `product_thumbnail` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_stock`, `product_date_add`, `category_id`, `product_imgDir`, `product_thumbnail`) VALUES
(1, 'แหวนเพชร A01', 'แหวนเพชร A01', 3000, 9, '2016-03-14 23:06:24', 3, 'A01', '1.JPG'),
(2, 'แหวนเพชร 02', 'แหวนเพชร 02', 5000, 18, '2016-03-14 23:31:56', 3, 'A02', '1.JPG'),
(3, 'แหวนเพชร 03', 'แหวนเพชร 03', 4000, 0, '2016-03-14 23:31:56', 3, 'A03', '1.JPG'),
(4, 'แหวน 04', 'แหวน 04', 5000, 0, '2016-03-14 23:33:32', 3, 'A04', '1.JPG'),
(7, 'แหวน 05', 'แหวน 05', 5000, 0, '2016-03-27 18:25:11', 3, 'A05', '1.JPG'),
(8, 'แหวผู้ชาย 06', 'แหวนผู้ชายสีเงิน', 3000, 0, '2016-03-27 18:54:41', 1, 'A06', '1.jpg'),
(9, 'แหวนผู้หญิง 07', 'แหวนผู้หญิง 07', 4000, 0, '2016-03-27 18:55:49', 3, 'A07', '1.jpg'),
(10, 'แหวนผู้ชาย 08', 'แหวนผู้ชาย 08', 3000, 0, '2016-03-27 18:57:05', 1, 'A08', '1.jpg'),
(11, 'แหวนผู้ชาย 09', 'แหวนผู้ชาย 09', 3000, 0, '2016-03-27 18:57:31', 1, 'A09', '1.jpg'),
(12, 'แหวนผู้หญิง 10', 'แหวนผู้หญิง 10', 3000, 0, '2016-03-27 18:58:01', 3, 'A10', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`), ADD UNIQUE KEY `order_id` (`order_number`), ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`), ADD KEY `product_id` (`product_id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`), ADD KEY `member_id` (`member_id`), ADD KEY `order_number` (`order_number`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_number`) REFERENCES `order` (`order_number`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
