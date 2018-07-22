-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2018 at 11:43 PM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c22webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookingid` int(11) NOT NULL,
  `picnicid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE IF NOT EXISTS `creditcard` (
  `creditcardnumber` int(11) NOT NULL,
  `bankissued` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `expiredate` date DEFAULT NULL,
  `ccid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `userid`, `activated`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `escorts`
--

CREATE TABLE IF NOT EXISTS `escorts` (
  `escortid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `escorts`
--

INSERT INTO `escorts` (`escortid`, `userid`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoiceid` int(11) NOT NULL,
  `total` int(10) NOT NULL,
  `quantity` int(8) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `ccid` int(11) NOT NULL,
  `bookingid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `managerid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`managerid`, `userid`) VALUES
(1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `picnics`
--

CREATE TABLE IF NOT EXISTS `picnics` (
  `picnicid` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `departuredate` date NOT NULL,
  `departuretime` time NOT NULL,
  `place` varchar(25) NOT NULL,
  `food` varchar(45) NOT NULL,
  `arrivaltime` time NOT NULL,
  `returntime` time NOT NULL,
  `transportation` varchar(25) DEFAULT NULL,
  `priceperperson` int(10) NOT NULL,
  `capacity` int(10) NOT NULL,
  `description` varchar(45) NOT NULL,
  `departurelocation` varchar(45) NOT NULL,
  `assemblepoint` varchar(45) NOT NULL,
  `escortid` int(11) NOT NULL,
  `managerid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picnics`
--

INSERT INTO `picnics` (`picnicid`, `title`, `departuredate`, `departuretime`, `place`, `food`, `arrivaltime`, `returntime`, `transportation`, `priceperperson`, `capacity`, `description`, `departurelocation`, `assemblepoint`, `escortid`, `managerid`) VALUES
(2, 'Road to Heaven', '2018-01-17', '17:35:00', 'Germany', 'Pringles, Maqlobeh, Mansaf', '16:00:00', '20:00:00', 'Bus', 200, 50, 'this is the best picnic ever', 'Berlin', 'Manara Square', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `picnic_activities`
--

CREATE TABLE IF NOT EXISTS `picnic_activities` (
  `activityid` int(11) NOT NULL,
  `activity` varchar(45) NOT NULL,
  `picnicid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `picnic_photos`
--

CREATE TABLE IF NOT EXISTS `picnic_photos` (
  `photoid` int(11) NOT NULL,
  `directory` varchar(45) NOT NULL,
  `picnicid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `idnumber` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `name`, `email`, `phone`, `address`, `idnumber`) VALUES
(1, 'jfdjkkj', 'jfdjkkj', 'fdjkdfjk', 'fjkdfjk', 'fjkdfjk', 'fjkdfjk', 'fjkfjk'),
(2, 'jdksfjk', 'jkdfjkfhjk', 'dfjkfjhk', 'djkfjkfhk', 'dfjkf', 'dfjk', 'dfjkhdf'),
(3, 'sdfkk', 'jdfjkdjk', 'dfjkdfjk', 'jkfdjkdfjk', 'djfkdfjk', 'dfdjk', 'fdjdfjkjk'),
(4, 'dfgjk', 'jkdfjkdjk', 'jkfgjkdfjk', 'jkdfjkfjk', 'fgjk', 'dfg', 'fgjkfg'),
(5, 'ifjkfjkrf', 'jfjkffjkjk', 'jgjkgjkgjk', 'jkgjgjkjk', 'jgjkgjkgjk', 'jfjkfjkfjk', 'jkfjkfjkgj'),
(6, 'wejk', 'ejkerjk', 'jkrejk', 'erjkejkr', 'rjkerjk', 'erjerjk', 'erjkerjk'),
(7, 'dssdfjk', 'jkdfjkdfjk', 'jkdfjkdfjk', 'jkdfjkdfjk', 'jkdfjkdfjk', 'jkdjkdfjk', 'jkdjkdfjkd'),
(8, 'dfjkdfjkkfjk', 'jkfjkfdgjk', 'jfjkfgjk', 'dfjk', 'jkfgjfgjk', 'jkfgjkfgjk', 'jkfgjkfgjk'),
(10, 'lrklerklterklte', 'klrlrtlltkrtl', 'ltrrlltrtl', 'lrtlktrll', 'ltrltrltl', 'ltrltrltrl', 'ltrltrltrl'),
(14, 'team1manager', 'comp334', 'Manager', 'manager@picnicsRus.com', '123456789', 'Ramallah', '1234123412');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `booking_ibfk_1` (`picnicid`),
  ADD KEY `booking_ibfk_2` (`customerid`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`ccid`),
  ADD UNIQUE KEY `creditcardnumber_UNIQUE` (`creditcardnumber`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`),
  ADD KEY `fk_customer` (`userid`) USING BTREE;

--
-- Indexes for table `escorts`
--
ALTER TABLE `escorts`
  ADD PRIMARY KEY (`escortid`),
  ADD KEY `fk_escort` (`userid`) USING BTREE;

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceid`),
  ADD KEY `fk_credit` (`ccid`),
  ADD KEY `invoices_ibfk_2` (`bookingid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`managerid`),
  ADD KEY `fk_manager` (`userid`) USING BTREE;

--
-- Indexes for table `picnics`
--
ALTER TABLE `picnics`
  ADD PRIMARY KEY (`picnicid`),
  ADD KEY `fk_manager` (`managerid`),
  ADD KEY `picnis_ibfk_1` (`escortid`);

--
-- Indexes for table `picnic_activities`
--
ALTER TABLE `picnic_activities`
  ADD PRIMARY KEY (`activityid`),
  ADD KEY `picnic_activities_ibfk_1` (`picnicid`);

--
-- Indexes for table `picnic_photos`
--
ALTER TABLE `picnic_photos`
  ADD PRIMARY KEY (`photoid`),
  ADD KEY `fk_picnic_photo` (`picnicid`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `idnumber_UNIQUE` (`idnumber`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `ccid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `escorts`
--
ALTER TABLE `escorts`
  MODIFY `escortid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `managerid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `picnics`
--
ALTER TABLE `picnics`
  MODIFY `picnicid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `picnic_activities`
--
ALTER TABLE `picnic_activities`
  MODIFY `activityid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `picnic_photos`
--
ALTER TABLE `picnic_photos`
  MODIFY `photoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`picnicid`) REFERENCES `picnics` (`picnicid`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customers` (`customerid`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `escorts`
--
ALTER TABLE `escorts`
  ADD CONSTRAINT `fk_escort` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`ccid`) REFERENCES `creditcard` (`ccid`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`bookingid`) REFERENCES `booking` (`bookingid`) ON DELETE CASCADE;

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `picnics`
--
ALTER TABLE `picnics`
  ADD CONSTRAINT `picnics_ibfk_2` FOREIGN KEY (`managerid`) REFERENCES `managers` (`managerid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `picnis_ibfk_1` FOREIGN KEY (`escortid`) REFERENCES `escorts` (`escortid`);

--
-- Constraints for table `picnic_activities`
--
ALTER TABLE `picnic_activities`
  ADD CONSTRAINT `picnic_activities_ibfk_1` FOREIGN KEY (`picnicid`) REFERENCES `picnics` (`picnicid`) ON DELETE CASCADE;

--
-- Constraints for table `picnic_photos`
--
ALTER TABLE `picnic_photos`
  ADD CONSTRAINT `picnic_photos_ibfk_1` FOREIGN KEY (`picnicid`) REFERENCES `picnics` (`picnicid`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
