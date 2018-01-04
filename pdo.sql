-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2018 at 10:50 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo`
--
CREATE DATABASE IF NOT EXISTS `pdo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pdo`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `HireDate` date DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `Address`, `Image`, `Department`, `HireDate`, `DateofBirth`, `Gender`, `PhoneNo`, `CreatedOn`) VALUES
(4, 'muthu', 'sudnar', 'muthusunda@gmail.com', '0192023a7bbd73250516f069df18b500', '                assd', 'images/detail.jpg', 'Dasd', '2018-01-18', '2018-01-18', 'Female', 'asdfd', '2018-01-04 10:03:38'),
(6, ',muthu', 'sudnar', 'muthusunda2@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Chennai', 'images/detail.jpg', 'Development', '2018-01-27', '2018-01-27', 'Male', '9942893843', '2018-01-04 10:36:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
