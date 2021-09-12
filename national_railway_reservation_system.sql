-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 08:20 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `national_railway_reservation_system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_into_ticket` (IN `TRAINNO` INT(6) UNSIGNED, IN `PNRNO` INT(10) UNSIGNED, IN `NAME` VARCHAR(30), IN `AGE` INT(2) UNSIGNED, IN `GENDER` VARCHAR(10), IN `DATEJ` DATE, IN `SOURCE` VARCHAR(30), IN `DEST` VARCHAR(30), IN `DTIME` TIME, IN `ATIME` TIME, IN `CLASS1` VARCHAR(10), IN `SEAT_NO` INT(2) UNSIGNED, IN `FARE` INT(4) UNSIGNED)  NO SQL
BEGIN
	INSERT INTO TICKET VALUES(TRAINNO,PNRNO,NAME,AGE,GENDER,DATEJ,SOURCE,DEST,DTIME,ATIME,CLASS1,SEAT_NO,FARE);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_seats` (IN `S` INT(4) UNSIGNED, IN `TRAINNO` INT(6) UNSIGNED, IN `CLASS1` VARCHAR(15), IN `D` DATE)  NO SQL
BEGIN
IF CLASS1="GENERAL" THEN
	UPDATE CLASS SET GENERAL=GENERAL-S WHERE TRAIN_NO=TRAINNO AND DATE=D;
  END IF;
IF CLASS1='SLEEPER' THEN
	UPDATE CLASS SET SLEEPER=SLEEPER-S WHERE TRAIN_NO=TRAINNO AND DATE=D;
  END IF;
IF CLASS1='AC_1' THEN
	UPDATE CLASS SET AC_1=AC_1-S WHERE TRAIN_NO=TRAINNO AND DATE=D;
END IF;
IF CLASS1='AC_2' THEN
	UPDATE CLASS SET AC_2=AC_2-S WHERE TRAIN_NO=TRAINNO AND DATE=D;
END IF;
IF CLASS1='CHAIR_CAR' THEN
	UPDATE CLASS SET CHAIR_CAR=CHAIR_CAR-S WHERE TRAIN_NO=TRAINNO AND DATE=D;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `TRAIN_NO` int(10) NOT NULL,
  `DATE` date NOT NULL,
  `GENERAL` int(3) NOT NULL,
  `SLEEPER` int(3) NOT NULL,
  `CHAIR_CAR` int(3) NOT NULL,
  `AC_1` int(3) NOT NULL,
  `AC_2` int(3) NOT NULL,
  `AC_3` int(3) NOT NULL,
  `AC_CHAIR_CAR` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`TRAIN_NO`, `DATE`, `GENERAL`, `SLEEPER`, `CHAIR_CAR`, `AC_1`, `AC_2`, `AC_3`, `AC_CHAIR_CAR`) VALUES
(11020, '2017-11-13', 10, 10, 0, 10, 10, 10, 10),
(11020, '2017-11-14', 11, 0, 0, 13, 10, 10, 10),
(11020, '2017-11-15', 10, 8, 9, 10, 10, 10, 10),
(17015, '2017-11-14', 8, 3, 10, 10, 10, 10, 10),
(12704, '0000-00-00', 10, 5, 6, 7, 8, 0, 0),
(12704, '0000-00-00', 10, 5, 6, 7, 8, 0, 0);

--
-- Triggers `class`
--
DELIMITER $$
CREATE TRIGGER `F_SEATS` BEFORE UPDATE ON `class` FOR EACH ROW BEGIN
DECLARE S_DEL CONDITION FOR SQLSTATE '45007';
IF NEW.GENERAL<0 THEN
  		SIGNAL S_DEL
        SET MESSAGE_TEXT='SEATS_EXCEEDED';
END IF;
IF NEW.SLEEPER<0 THEN
  		SIGNAL S_DEL
        SET MESSAGE_TEXT='SEATS_EXCEEDED';
END IF;
IF NEW.CHAIR_CAR<0 THEN
  		SIGNAL S_DEL
        SET MESSAGE_TEXT='SEATS_EXCEEDED';
END IF;
IF NEW.AC_1<0 THEN
  		SIGNAL S_DEL
        SET MESSAGE_TEXT='SEATS_EXCEEDED';
END IF;
IF NEW.AC_2<0 THEN
  		SIGNAL S_DEL
        SET MESSAGE_TEXT='SEATS_EXCEEDED';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

CREATE TABLE `fare` (
  `TRAIN_NO` varchar(10) NOT NULL,
  `CLASS` varchar(15) NOT NULL,
  `T_FARE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fare`
--

INSERT INTO `fare` (`TRAIN_NO`, `CLASS`, `T_FARE`) VALUES
('12704', 'GENERAL', 200),
('12704', 'SLEEPER', 300),
('12704', 'CHAIR_CAR', 150),
('12704', 'AC_1', 600),
('22416', 'GENERAL', 800),
('22416', 'SLEEPER', 300),
('22416', 'AC_1', 1000),
('11020', 'GENERAL', 300),
('11020', 'CHAIR_CAR', 400),
('11020', 'AC_1', 1000),
('11020', 'AC_2', 950),
('17015', 'SLEEPER', 300),
('17015', 'GENERAL', 400),
('17015', 'AC_1', 1200),
('17015', 'AC_2', 980),
('12704', 'AC_3', 850);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `NAME` varchar(20) NOT NULL,
  `RECEIPT_NO` varchar(20) NOT NULL,
  `BANK` varchar(30) NOT NULL,
  `CARD_NO` varchar(20) NOT NULL,
  `PIN` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `STATION_ID` varchar(15) NOT NULL,
  `STATION_NAME` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`STATION_ID`, `STATION_NAME`) VALUES
('BBSR', 'Bhubaneswar'),
('HYD', 'Hyderabad'),
('JAM', 'JAMMU'),
('NDLS', 'NewDelhi '),
('VSKP', 'Vishakapatnam ');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TRAIN_NO` varchar(10) NOT NULL,
  `PNR` varchar(10) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `AGE` int(3) NOT NULL,
  `GENDER` varchar(6) NOT NULL,
  `DATE` date NOT NULL,
  `FROM_STATION` varchar(15) NOT NULL,
  `TO_STATION` varchar(15) NOT NULL,
  `DEPARTURE_TIME` time NOT NULL,
  `ARRIVAL_TIME` time NOT NULL,
  `CLASS` varchar(15) NOT NULL,
  `SEAT_NO` int(2) NOT NULL,
  `FARE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `ticket`
--
DELIMITER $$
CREATE TRIGGER `F_trigger_seats` BEFORE DELETE ON `ticket` FOR EACH ROW BEGIN
            	
IF OLD.CLASS='GENERAL' THEN
UPDATE CLASS SET GENERAL=GENERAL+1 WHERE TRAIN_NO=OLD.TRAIN_NO AND DATE=OLD.DATE;
END IF;

IF OLD.CLASS='SLEEPER' THEN
UPDATE CLASS SET SLEEPER=SLEEPER+1 WHERE TRAIN_NO=OLD.TRAIN_NO AND DATE=OLD.DATE;
END IF;

IF OLD.CLASS='CHAIR_CAR' THEN
UPDATE CLASS SET CHAIR_CAR=CHAIR_CAR+1 WHERE TRAIN_NO=OLD.TRAIN_NO AND DATE=OLD.DATE;
END IF;

IF OLD.CLASS='AC_1' THEN
UPDATE CLASS SET AC_1=AC_1+1 WHERE TRAIN_NO=OLD.TRAIN_NO AND DATE=OLD.DATE;
END IF;

IF OLD.CLASS='AC_2' THEN
UPDATE CLASS SET AC_2=AC_2+1 WHERE TRAIN_NO=OLD.TRAIN_NO AND DATE=OLD.DATE;
END IF;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `TRAIN_NO` varchar(10) NOT NULL,
  `TRAIN_NAME` varchar(30) NOT NULL,
  `START_STATION` varchar(15) NOT NULL,
  `STOP_STATION` varchar(15) NOT NULL,
  `DEPARTURE_TIME` time NOT NULL,
  `ARRIVAL_TIME` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`TRAIN_NO`, `TRAIN_NAME`, `START_STATION`, `STOP_STATION`, `DEPARTURE_TIME`, `ARRIVAL_TIME`) VALUES
('11020', 'KONARK_EXP', 'BBSR', 'HYD', '08:35:00', '07:30:00'),
('12704', 'Faluknama', 'BBSR', 'HYD', '15:55:00', '10:45:00'),
('17015', 'VISHAKA_EXP', 'BBSR', 'HYD', '06:40:00', '18:24:00'),
('22416', 'APExp', 'NDLS', 'VSKP', '06:40:00', '18:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_NAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `REGISTRATION_DATE` date NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `AADHAAR_NO` int(12) NOT NULL,
  `AGE` int(2) NOT NULL,
  `EMAIL_ID` varchar(30) NOT NULL,
  `USERTYPE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_NAME`, `PASSWORD`, `REGISTRATION_DATE`, `NAME`, `AADHAAR_NO`, `AGE`, `EMAIL_ID`, `USERTYPE`) VALUES
('here', '1', '0000-00-00', '', 0, 0, '', 'admin'),
('Swar', '1234', '2017-11-13', 'Swarna', 1234567890, 20, 'sbm10@iitbbs.ac.in', ''),
('vaish', '1234', '2017-10-30', 'Vaishnavi', 2147483647, 19, 'mv11@iitbbs.ac.in', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD KEY `TRAIN_NO` (`TRAIN_NO`);

--
-- Indexes for table `fare`
--
ALTER TABLE `fare`
  ADD KEY `TRAIN_NO` (`TRAIN_NO`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`RECEIPT_NO`),
  ADD KEY `NAME` (`NAME`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`STATION_ID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD KEY `TRAIN_NO` (`TRAIN_NO`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`TRAIN_NO`),
  ADD KEY `TRAIN_START_ID` (`START_STATION`) USING BTREE,
  ADD KEY `TRAIN_STOP_ID` (`STOP_STATION`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_NAME`),
  ADD UNIQUE KEY `AADHAAR_NO` (`AADHAAR_NO`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `F_TSTARTSTATION` FOREIGN KEY (`START_STATION`) REFERENCES `station` (`STATION_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `F_TSTOPSTATION` FOREIGN KEY (`STOP_STATION`) REFERENCES `station` (`STATION_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
