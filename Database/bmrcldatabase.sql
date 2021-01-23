-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 10:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmrcldatabase`
--
CREATE DATABASE IF NOT EXISTS `bmrcldatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bmrcldatabase`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `fare_details`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fare_details` (IN `From_addr` VARCHAR(25), IN `To_addr` VARCHAR(25))  NO SQL
BEGIN
 SELECT F1.From_Station, F2.To_Station, F.Fare
  FROM fare_display F1, fare_display F2, fare_display F
  WHERE F1.From_Station = From_addr 
    AND F2.To_Station = To_addr;
END$$

DROP PROCEDURE IF EXISTS `recharge`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `recharge` (IN `amount` DECIMAL(10,0), IN `cardno` VARCHAR(10))  NO SQL
BEGIN
START TRANSACTION;
	UPDATE smartcard 
	SET balance = balance + amount
	WHERE Scard_no = cardno;
    
     
    SELECT balance 
    FROM smartcard 
    WHERE Scard_no = cardno;
    
   COMMIT;
END$$

DROP PROCEDURE IF EXISTS `train_details`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `train_details` (IN `RouteName` VARCHAR(35), IN `From_addr` VARCHAR(25), IN `To_addr` VARCHAR(25))  NO SQL
BEGIN
 SELECT T.train_id, D1.From_Station, D1.Arrival AS Source_Arrival,  D2.To_Station, D2.Departure AS Dest_Departure
  FROM display_status D1, train T, route R, display_status D2
  WHERE T.train_id=D1.train_id AND T.train_id =D2.train_id 
  	AND R.route_id = T.route_id  
  	AND R.route_name = RouteName 
  	AND D1.From_Station =  From_addr 
    AND D2.To_Station = To_addr;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(16) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `age`, `gender`, `admin_email`, `admin_password`) VALUES
(123, 'Chaya', 20, 'F', 'chaya@gmail.com', 'chayav'),
(456, 'Bharati', 20, 'F', 'bharati@gmail.com', 'bharatimh');

--
-- Triggers `admin`
--
DROP TRIGGER IF EXISTS `before_admin_insert`;
DELIMITER $$
CREATE TRIGGER `before_admin_insert` BEFORE INSERT ON `admin` FOR EACH ROW BEGIN
IF NEW.Age < 18 THEN
   SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = "Admin must be 18+";
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_subject` varchar(50) NOT NULL,
  `complaint_description` varchar(50) NOT NULL,
  `complaint_status` varchar(20) NOT NULL DEFAULT 'Not Replied',
  `user_id` varchar(20) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `complaint_subject`, `complaint_description`, `complaint_status`, `user_id`) VALUES
(1, 'card issue', 'card lost', 'Replied', 'ChayaV'),
(2, 'online recharge', 'card not updated', 'Replied', 'BharatiMH'),
(3, 'Train Time', 'Train timings not visible', 'Not Replied', ''),
(4, 'Recharge ', 'I am not able to recharge', 'Not Replied', '');

-- --------------------------------------------------------

--
-- Table structure for table `display_status`
--

DROP TABLE IF EXISTS `display_status`;
CREATE TABLE IF NOT EXISTS `display_status` (
  `From_Station` varchar(25) NOT NULL,
  `To_Station` varchar(25) NOT NULL,
  `Arrival` time DEFAULT NULL,
  `Departure` time DEFAULT NULL,
  `train_id` int(11) NOT NULL,
  PRIMARY KEY (`From_Station`,`To_Station`,`train_id`),
  KEY `To_Station` (`To_Station`),
  KEY `train_id` (`train_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `display_status`
--

INSERT INTO `display_status` (`From_Station`, `To_Station`, `Arrival`, `Departure`, `train_id`) VALUES
('Attiguppe', 'Deepanjali Nagar', '07:30:00', '07:35:00', 3),
('Attiguppe', 'Deepanjali Nagar', '10:30:00', '10:35:00', 7),
('Attiguppe', 'Vijayanagar', '05:10:00', '05:15:00', 4),
('Attiguppe', 'Vijayanagar', '08:00:00', '08:05:00', 8),
('Baiyappanahalli', 'S.V.Road', '06:20:00', '06:25:00', 3),
('Baiyappanahalli', 'S.V.Road', '09:20:00', '09:25:00', 7),
('Banashankari', 'Jayaprakash Nagar', '06:40:00', '06:45:00', 2),
('Banashankari', 'Jayaprakash Nagar', '10:30:00', '10:35:00', 6),
('Banashankari', 'Rashtreeya Vidyalaya Road', '07:00:00', '07:05:00', 1),
('Banashankari', 'Rashtreeya Vidyalaya Road', '10:50:00', '10:55:00', 5),
('Chickpete', 'Krishna Rajendra Market', '06:05:00', '06:10:00', 2),
('Chickpete', 'Krishna Rajendra Market', '09:55:00', '10:00:00', 6),
('Chickpete', 'Majestic', '07:35:00', '07:40:00', 1),
('Chickpete', 'Majestic', '11:25:00', '11:30:00', 5),
('Cubbon Park', 'M.G.Road', '05:50:00', '05:55:00', 4),
('Cubbon Park', 'M.G.Road', '08:40:00', '08:45:00', 8),
('Cubbon Park', 'Vidhana Soudha', '06:50:00', '06:55:00', 3),
('Cubbon Park', 'Vidhana Soudha', '09:50:00', '09:55:00', 7),
('Dasarahalli', 'Jalahalli', '05:05:00', '05:10:00', 2),
('Dasarahalli', 'Jalahalli', '08:50:00', '08:55:00', 6),
('Dasarahalli', 'Nagasandra', '08:40:00', '08:45:00', 1),
('Dasarahalli', 'Nagasandra', '12:30:00', '12:35:00', 5),
('Deepanjali Nagar', 'Attiguppe', '05:05:00', '05:10:00', 4),
('Deepanjali Nagar', 'Attiguppe', '07:55:00', '08:00:00', 8),
('Deepanjali Nagar', 'Mysuru Road', '07:35:00', '07:40:00', 3),
('Deepanjali Nagar', 'Mysuru Road', '10:35:00', '10:40:00', 7),
('Goraguntepalya', 'Peenya', '08:20:00', '08:25:00', 1),
('Goraguntepalya', 'Peenya', '12:10:00', '12:15:00', 5),
('Goraguntepalya', 'Yeshwanthpur', '05:20:00', '05:25:00', 2),
('Goraguntepalya', 'Yeshwanthpur', '09:10:00', '09:15:00', 6),
('Hosahalli', 'Magadi Road', '05:20:00', '05:25:00', 4),
('Hosahalli', 'Magadi Road', '08:10:00', '08:15:00', 8),
('Hosahalli', 'Vijayanagar', '07:20:00', '07:25:00', 3),
('Hosahalli', 'Vijayanagar', '10:20:00', '10:25:00', 7),
('Indira Nagar', 'S.V.Road', '06:10:00', '06:15:00', 4),
('Indira Nagar', 'S.V.Road', '09:00:00', '09:15:00', 8),
('Indira Nagar', 'Ulsoor', '06:30:00', '06:35:00', 3),
('Indira Nagar', 'Ulsoor', '09:30:00', '09:35:00', 7),
('Jalahalli', 'Dasarahalli', '08:35:00', '08:40:00', 1),
('Jalahalli', 'Dasarahalli', '12:25:00', '12:30:00', 5),
('Jalahalli', 'Peenya Industry', '05:10:00', '05:15:00', 2),
('Jalahalli', 'Peenya Industry', '08:55:00', '09:00:00', 6),
('Jayanagar', 'Rashtreeya Vidyalaya Road', '06:30:00', '06:35:00', 2),
('Jayanagar', 'Rashtreeya Vidyalaya Road', '10:20:00', '10:25:00', 6),
('Jayanagar', 'Southend Circle', '07:10:00', '07:15:00', 1),
('Jayanagar', 'Southend Circle', '11:00:00', '11:05:00', 5),
('Jayaprakash Nagar', 'Banashankari', '06:55:00', '07:00:00', 1),
('Jayaprakash Nagar', 'Banashankari', '10:45:00', '10:50:00', 5),
('Jayaprakash Nagar', 'Yelachenahalli', '06:45:00', '06:50:00', 2),
('Jayaprakash Nagar', 'Yelachenahalli', '10:35:00', '10:40:00', 6),
('Krishna Rajendra Market', 'Chickpete', '07:30:00', '07:35:00', 1),
('Krishna Rajendra Market', 'Chickpete', '11:20:00', '11:25:00', 5),
('Krishna Rajendra Market', 'National College', '06:10:00', '06:15:00', 2),
('Krishna Rajendra Market', 'National College', '10:00:00', '10:05:00', 6),
('KSR Railway Station', 'Magadi Road', '07:10:00', '07:15:00', 3),
('KSR Railway Station', 'Magadi Road', '10:10:00', '10:15:00', 7),
('KSR Railway Station', 'Majestic', '05:30:00', '05:35:00', 4),
('KSR Railway Station', 'Majestic', '08:20:00', '08:25:00', 8),
('Kuvempu Road', 'Rajajinagar', '07:55:00', '08:00:00', 1),
('Kuvempu Road', 'Rajajinagar', '11:45:00', '11:50:00', 5),
('Kuvempu Road', 'Srirampura', '05:45:00', '05:50:00', 2),
('Kuvempu Road', 'Srirampura', '09:35:00', '09:40:00', 6),
('Lalbagh', 'National College', '07:20:00', '07:25:00', 1),
('Lalbagh', 'National College', '11:10:00', '11:15:00', 5),
('Lalbagh', 'Southend Circle', '06:20:00', '00:00:06', 2),
('Lalbagh', 'Southend Circle', '10:10:00', '10:15:00', 6),
('M.G.Road', 'Cubbon Park', '06:45:00', '06:50:00', 3),
('M.G.Road', 'Cubbon Park', '09:45:00', '09:50:00', 7),
('M.G.Road', 'Trinity', '05:55:00', '06:00:00', 4),
('M.G.Road', 'Trinity', '08:45:00', '08:50:00', 8),
('Magadi Road', 'Hosahalli', '07:15:00', '07:20:00', 3),
('Magadi Road', 'Hosahalli', '10:15:00', '10:20:00', 7),
('Magadi Road', 'KSR Railway Station', '05:25:00', '05:30:00', 4),
('Magadi Road', 'KSR Railway Station', '08:15:00', '08:20:00', 8),
('Mahalaxmi', 'Rajajinagar', '05:35:00', '05:40:00', 2),
('Mahalaxmi', 'Rajajinagar', '09:25:00', '09:30:00', 6),
('Mahalaxmi', 'Sandal Soap Factory', '08:05:00', '08:10:00', 1),
('Mahalaxmi', 'Sandal Soap Factory', '11:55:00', '12:00:00', 5),
('Majestic', 'Chickpete', '06:00:00', '06:05:00', 2),
('Majestic', 'Chickpete', '09:50:00', '09:55:00', 6),
('Majestic', 'KSR Railway Station', '07:05:00', '07:10:00', 3),
('Majestic', 'KSR Railway Station', '10:05:00', '10:10:00', 7),
('Majestic', 'MantriSquare Sampige Road', '07:40:00', '07:45:00', 1),
('Majestic', 'MantriSquare Sampige Road', '11:30:00', '11:35:00', 5),
('Majestic', 'Sir M.V.Central College', '05:35:00', '05:40:00', 4),
('Majestic', 'Sir M.V.Central College', '08:25:00', '08:30:00', 8),
('MantriSquare Sampige Road', 'Majestic', '05:55:00', '06:00:00', 2),
('MantriSquare Sampige Road', 'Majestic', '09:45:00', '09:50:00', 6),
('MantriSquare Sampige Road', 'Srirampura', '07:45:00', '07:50:00', 1),
('MantriSquare Sampige Road', 'Srirampura', '11:35:00', '11:40:00', 5),
('Mysuru Road', 'Deepanjali Nagar', '05:00:00', '05:05:00', 4),
('Mysuru Road', 'Deepanjali Nagar', '07:50:00', '07:55:00', 8),
('Nagasandra', 'Dasarahalli', '05:00:00', '05:05:00', 2),
('Nagasandra', 'Dasarahalli', '08:45:00', '08:50:00', 6),
('National College', 'Krishna Rajendra Market', '07:25:00', '07:30:00', 1),
('National College', 'Krishna Rajendra Market', '11:15:00', '11:20:00', 5),
('National College', 'Lalbagh', '06:15:00', '06:20:00', 2),
('National College', 'Lalbagh', '10:05:00', '10:10:00', 6),
('Peenya', 'Goraguntepalya', '05:15:00', '05:20:00', 2),
('Peenya', 'Goraguntepalya', '09:05:00', '09:10:00', 6),
('Peenya', 'Peenya Industry', '08:25:00', '08:30:00', 1),
('Peenya', 'Peenya Industry', '12:15:00', '12:20:00', 5),
('Peenya Industry', 'Jalahalli', '08:30:00', '08:35:00', 1),
('Peenya Industry', 'Jalahalli', '12:20:00', '12:25:00', 5),
('Peenya Industry', 'Peenya', '05:15:00', '05:20:00', 2),
('Peenya Industry', 'Peenya', '09:00:00', '09:05:00', 6),
('Rajajinagar', 'Kuvempu Road', '05:40:00', '05:45:00', 2),
('Rajajinagar', 'Kuvempu Road', '09:30:00', '09:35:00', 6),
('Rajajinagar', 'Mahalaxmi', '08:00:00', '08:05:00', 1),
('Rajajinagar', 'Mahalaxmi', '11:50:00', '11:55:00', 5),
('Rashtreeya Vidyalaya Road', 'Banashankari', '06:35:00', '06:40:00', 2),
('Rashtreeya Vidyalaya Road', 'Banashankari', '10:25:00', '10:30:00', 6),
('Rashtreeya Vidyalaya Road', 'Jayanagar', '07:05:00', '07:10:00', 1),
('Rashtreeya Vidyalaya Road', 'Jayanagar', '10:55:00', '11:00:00', 5),
('S.V.Road', 'Baiyappanahalli', '06:15:00', '06:20:00', 4),
('S.V.Road', 'Baiyappanahalli', '09:15:00', '09:20:00', 8),
('S.V.Road', 'Indira Nagar', '06:25:00', '06:30:00', 3),
('S.V.Road', 'Indira Nagar', '09:25:00', '09:30:00', 7),
('Sandal Soap Factory', 'Mahalaxmi', '05:30:00', '05:35:00', 2),
('Sandal Soap Factory', 'Mahalaxmi', '09:20:00', '09:25:00', 6),
('Sandal Soap Factory', 'Yeshwanthpur', '08:10:00', '08:15:00', 1),
('Sandal Soap Factory', 'Yeshwanthpur', '12:00:00', '12:05:00', 5),
('Sir M.V.Central College', 'Majestic', '07:00:00', '07:05:00', 3),
('Sir M.V.Central College', 'Majestic', '10:00:00', '10:05:00', 7),
('Sir M.V.Central College', 'Vidhana Soudha', '05:40:00', '05:45:00', 4),
('Sir M.V.Central College', 'Vidhana Soudha', '08:30:00', '08:35:00', 8),
('Southend Circle', 'Jayanagar', '06:25:00', '06:30:00', 2),
('Southend Circle', 'Jayanagar', '10:15:00', '10:20:00', 6),
('Southend Circle', 'Lalbagh', '07:15:00', '07:20:00', 1),
('Southend Circle', 'Lalbagh', '11:05:00', '11:10:00', 5),
('Srirampura', 'Kuvempu Road', '07:50:00', '07:55:00', 1),
('Srirampura', 'Kuvempu Road', '11:40:00', '11:45:00', 5),
('Srirampura', 'MantriSquare Sampige Road', '05:50:00', '05:55:00', 2),
('Srirampura', 'MantriSquare Sampige Road', '09:40:00', '09:45:00', 6),
('Trinity', 'M.G.Road', '06:40:00', '06:45:00', 3),
('Trinity', 'M.G.Road', '09:40:00', '09:45:00', 7),
('Trinity', 'Ulsoor', '06:00:00', '06:05:00', 4),
('Trinity', 'Ulsoor', '08:50:00', '08:55:00', 8),
('Ulsoor', 'Indira Nagar', '06:05:00', '06:10:00', 4),
('Ulsoor', 'Indira Nagar', '08:55:00', '09:00:00', 8),
('Ulsoor', 'Trinity', '06:35:00', '06:40:00', 3),
('Ulsoor', 'Trinity', '09:35:00', '09:40:00', 7),
('Vidhana Soudha', 'Cubbon Park', '05:45:00', '05:50:00', 4),
('Vidhana Soudha', 'Cubbon Park', '08:35:00', '08:40:00', 8),
('Vidhana Soudha', 'Sir M.V.Central College', '06:55:00', '07:00:00', 3),
('Vidhana Soudha', 'Sir M.V.Central College', '09:55:00', '10:00:00', 7),
('Vijayanagar', 'Attiguppe', '07:25:00', '07:30:00', 3),
('Vijayanagar', 'Attiguppe', '10:25:00', '10:30:00', 7),
('Vijayanagar', 'Hosahalli', '05:15:00', '05:20:00', 4),
('Vijayanagar', 'Hosahalli', '08:05:00', '08:10:00', 8),
('Yelachenahalli', 'Jayaprakash Nagar', '06:50:00', '06:55:00', 1),
('Yelachenahalli', 'Jayaprakash Nagar', '10:40:00', '10:45:00', 5),
('Yeshwanthpur', 'Goraguntepalya', '08:15:00', '08:20:00', 1),
('Yeshwanthpur', 'Goraguntepalya', '12:05:00', '12:10:00', 5),
('Yeshwanthpur', 'Sandal Soap Factory', '05:25:00', '05:30:00', 2),
('Yeshwanthpur', 'Sandal Soap Factory', '09:15:00', '09:20:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `user_id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`user_id`, `email`) VALUES
('AshikaK', 'ashika@gmail.com'),
('BharatiMH', 'bharati@gmail.com'),
('ChandanaC', 'chandana@gmail.com'),
('ChayaV', 'chaya@gmail.com'),
('DeepaliMH', 'deepali@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `fare_display`
--

DROP TABLE IF EXISTS `fare_display`;
CREATE TABLE IF NOT EXISTS `fare_display` (
  `id` int(5) NOT NULL,
  `From_Station` varchar(25) NOT NULL,
  `To_Station` varchar(25) NOT NULL,
  `Fare` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fare_display`
--

INSERT INTO `fare_display` (`id`, `From_Station`, `To_Station`, `Fare`) VALUES
(1, 'Nagasandra', 'Peenya', 17);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_message` varchar(500) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  PRIMARY KEY (`reply_id`,`admin_id`,`complaint_id`),
  KEY `complaint_id` (`complaint_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `reply_message`, `admin_id`, `complaint_id`) VALUES
(2, 'request for a new card', 456, 1),
(3, 'request for new card', 456, 2);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(35) NOT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `route_name`) VALUES
(1, 'Green Lane towards Nagasandra'),
(2, 'Green Lane towards Yelachenahalli'),
(3, 'Purple Lane towards Mysuru Road'),
(4, 'Purple Lane towards Baiyappanahall');

-- --------------------------------------------------------

--
-- Table structure for table `smartcard`
--

DROP TABLE IF EXISTS `smartcard`;
CREATE TABLE IF NOT EXISTS `smartcard` (
  `Scard_no` varchar(10) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `card_status` varchar(15) NOT NULL DEFAULT 'Pending',
  `user_id` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`Scard_no`),
  KEY `user_id` (`user_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smartcard`
--

INSERT INTO `smartcard` (`Scard_no`, `balance`, `card_status`, `user_id`, `admin_id`) VALUES
('1122334455', '150', 'Issued', 'DeepaliMH', 123),
('1147088394', '500', 'Issued', 'AshikaK', 123),
('1234567890', '350', 'Issued', 'ChayaV', 123),
('1876543210', '200', 'Issued', 'BharatiMH', 123),
('1987654321', '100', 'Issued', 'ChandanaC', 123);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `station_name` varchar(25) NOT NULL,
  `route_id` int(11) NOT NULL,
  PRIMARY KEY (`station_name`,`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_name`, `route_id`) VALUES
('Attiguppe', 3),
('Baiyappanahalli', 3),
('Banashankari', 1),
('Chickpete', 1),
('Cubbon Park', 3),
('Dasarahalli', 1),
('Deepanjali Nagar', 3),
('Goraguntepalya', 1),
('Hosahalli', 3),
('Indira Nagar', 3),
('Jalahalli', 1),
('Jayanagar', 1),
('Jayaprakash Nagar', 1),
('Krishna Rajendra Market', 1),
('KSR Railway Station', 3),
('Kuvempu Road', 1),
('Lalbagh', 1),
('M.G.Road', 3),
('Magadi Road', 3),
('Mahalaxmi', 1),
('Majestic', 3),
('MantriSquare Sampige Road', 1),
('Mysuru Road', 3),
('Nagasandra', 1),
('National College', 1),
('Peenya', 1),
('Peenya Industry', 1),
('Rajajinagar', 1),
('Rashtreeya Vidyalaya Road', 1),
('S.V.Road', 3),
('Sandal Soap Factory', 1),
('Sir M.V.Central College', 3),
('Southend Circle', 1),
('Srirampura', 1),
('Trinity', 3),
('Ulsoor', 3),
('Vidhana Soudha', 3),
('Vijayanagar', 3),
('Yelachenahalli', 1),
('Yeshwanthpur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

DROP TABLE IF EXISTS `train`;
CREATE TABLE IF NOT EXISTS `train` (
  `train_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  PRIMARY KEY (`train_id`),
  KEY `admin_id` (`admin_id`),
  KEY `route_id` (`route_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `admin_id`, `route_id`) VALUES
(1, 123, 1),
(2, 456, 2),
(3, 456, 3),
(4, 123, 4),
(5, 123, 1),
(6, 456, 2),
(7, 456, 3),
(8, 456, 1),
(10, 123, 2),
(13, 123, 3),
(15, 456, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(20) NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Fname`, `Lname`, `address`, `phone_no`, `password`) VALUES
('', '', '', '', '', ''),
('AshikaK', 'Ashika', 'K', 'vijaynagar', '9776213486', 'ashikak'),
('BharatiMH', 'Bharati', 'M', 'R R Nagar', '6788234009', 'bharatimh'),
('ChandanaC', 'Chandana', 'C', 'Mahalakshmi', '8879455421', 'chandanac'),
('ChayaV', 'Chaya', 'V', 'Peenya', '1238896456', 'chayav'),
('DeepaliMH', 'Deepali', 'M', 'R R Nagar', '9883426778', 'deepalimh');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `display_status`
--
ALTER TABLE `display_status`
  ADD CONSTRAINT `display_status_ibfk_1` FOREIGN KEY (`From_Station`) REFERENCES `station` (`station_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `display_status_ibfk_2` FOREIGN KEY (`To_Station`) REFERENCES `station` (`station_name`),
  ADD CONSTRAINT `display_status_ibfk_3` FOREIGN KEY (`train_id`) REFERENCES `train` (`train_id`) ON DELETE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `smartcard`
--
ALTER TABLE `smartcard`
  ADD CONSTRAINT `smartcard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `smartcard_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `train_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
