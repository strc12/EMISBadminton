-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2015 at 04:26 PM
-- Server version: 5.5.44
-- PHP Version: 5.4.45-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `badminton`
--

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE IF NOT EXISTS `fixtures` (
  `FixtureID` int(11) NOT NULL AUTO_INCREMENT,
  `HomeTeamID` int(3) DEFAULT NULL,
  `AwayTeamID` int(3) DEFAULT NULL,
  `FixtDate` date DEFAULT NULL,
  `Played` tinyint(1) DEFAULT NULL,
  `HomeSchoolID` int(3) DEFAULT NULL,
  `AwaySchoolID` int(3) DEFAULT NULL,
  `homegames` int(11) NOT NULL,
  `awaygames` int(11) NOT NULL,
  PRIMARY KEY (`FixtureID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `PlayerID` int(11) NOT NULL AUTO_INCREMENT,
  `SchoolID` int(3) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `gameswon` int(5) DEFAULT NULL,
  `gamesloss` int(5) DEFAULT NULL,
  `pointswon` int(5) DEFAULT NULL,
  `pointsloss` int(5) DEFAULT NULL,
  PRIMARY KEY (`PlayerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`PlayerID`, `SchoolID`, `FirstName`, `LastName`, `Gender`, `gameswon`, `gamesloss`, `pointswon`, `pointsloss`) VALUES
(25, 1, 'Winnie', 'Liu', 'Female', 0, 0, 0, 0),
(26, 1, 'Hope', 'Brooks-Pollard', 'Female', 0, 0, 0, 0),
(27, 1, 'Sophie', 'Crowe', 'Female', 0, 0, 0, 0),
(28, 1, 'TC', 'Cheah', 'Male', 0, 0, 0, 0),
(29, 1, 'James', 'Clayton', 'Male', 0, 0, 0, 0),
(30, 1, 'Xander', 'Wienand', 'Male', 0, 0, 0, 0),
(31, 3, 'Brian', '', 'Male', 0, 0, 0, 0),
(32, 3, 'Simon', '', 'Male', 0, 0, 0, 0),
(33, 3, 'George', '', 'Male', 0, 0, 0, 0),
(34, 3, 'Amy', '', 'Female', 0, 0, 0, 0),
(35, 3, 'Julia', '', 'Female', 0, 0, 0, 0),
(36, 3, 'Eleanor', '', 'Female', 0, 0, 0, 0),
(37, 1, 'Tilly', 'Cooper', 'Female', 0, 0, 0, 0),
(38, 1, 'Catherine', 'Warner', 'Female', 0, 0, 0, 0),
(39, 1, 'Charlotte', 'Ma', 'Female', 0, 0, 0, 0),
(40, 1, 'Chris', 'Bird', 'Male', 0, 0, 0, 0),
(41, 1, 'Yat Long', 'Tse', 'Male', 0, 0, 0, 0),
(42, 1, 'Ben', 'Bird', 'Male', 0, 0, 0, 0),
(43, 3, 'Ellie', '', 'Female', 0, 0, 0, 0),
(44, 3, 'Reema', '', 'Female', 0, 0, 0, 0),
(45, 3, 'Jess', '', 'Female', 0, 0, 0, 0),
(46, 3, 'Jason', '', 'Male', 0, 0, 0, 0),
(47, 3, 'Alan', '', 'Male', 0, 0, 0, 0),
(48, 3, 'James', '', 'Male', 0, 0, 0, 0),
(49, 2, 'Vera', '', 'Female', 0, 0, 0, 0),
(50, 2, 'Emma', '', 'Female', 0, 0, 0, 0),
(51, 2, 'Erica', '', 'Female', 0, 0, 0, 0),
(52, 2, 'Terrence', '', 'Male', 0, 0, 0, 0),
(53, 2, 'Yontham', '', 'Male', 0, 0, 0, 0),
(54, 2, 'Roger', '', 'Male', 0, 0, 0, 0),
(55, 4, 'Helena', '', 'Female', 0, 0, 0, 0),
(56, 4, 'Vivian', '', 'Female', 0, 0, 0, 0),
(57, 4, 'Charlie', '', 'Female', 0, 0, 0, 0),
(58, 4, 'James', '', 'Male', 0, 0, 0, 0),
(59, 4, 'Matthew', '', 'Male', 0, 0, 0, 0),
(60, 4, 'Rutwick', '', 'Male', 0, 0, 0, 0),
(61, 2, 'Ada', '', 'Female', 0, 0, 0, 0),
(62, 2, 'Florence', '', 'Female', 0, 0, 0, 0),
(63, 2, 'Celeste', '', 'Female', 0, 0, 0, 0),
(64, 2, 'Jack', '', 'Male', 0, 0, 0, 0),
(65, 2, 'Alvin', '', 'Male', 0, 0, 0, 0),
(66, 2, 'Ollie', '', 'Male', 0, 0, 0, 0),
(67, 4, 'Millie', '', 'Female', 0, 0, 0, 0),
(68, 4, 'Lily', '', 'Female', 0, 0, 0, 0),
(69, 4, 'Izzy', '', 'Female', 0, 0, 0, 0),
(70, 4, 'Derek', '', 'Male', 0, 0, 0, 0),
(71, 4, 'Thomas', '', 'Male', 0, 0, 0, 0),
(72, 4, 'Marcus', '', 'Male', 0, 0, 0, 0),
(73, 2, 'Matvey', '', 'Male', 0, 0, 0, 0),
(74, 3, 'Hayley', '', 'Female', 0, 0, 0, 0),
(75, 3, 'Amy', '2', 'Female', 0, 0, 0, 0),
(76, 1, 'Augusta', 'Williams', 'Female', 0, 0, 0, 0),
(77, 4, 'Harry', '', 'Male', 0, 0, 0, 0),
(78, 1, 'Charlotte N', 'Napier', 'Female', 0, 0, 0, 0),
(79, 1, 'CJ', 'Song', 'Male', 0, 0, 0, 0),
(80, 1, 'Florence', 'Twaite', 'Female', 0, 0, 0, 0),
(83, 2, 'Elvis', '', 'Male', 0, 0, 0, 0),
(84, 2, 'Guy', '', 'Male', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `SchoolID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SchoolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`SchoolID`, `schoolname`) VALUES
(1, 'Oundle'),
(2, 'Uppingham'),
(3, 'Oakham'),
(4, 'Stamford');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `matchesplayed` int(5) DEFAULT NULL,
  `gameswon` int(5) DEFAULT NULL,
  `gamesloss` int(5) DEFAULT NULL,
  `pointswon` int(5) DEFAULT NULL,
  `pointsloss` int(5) DEFAULT NULL,
  `SchoolID` int(3) DEFAULT NULL,
  `league` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`teamid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamid`, `name`, `matchesplayed`, `gameswon`, `gamesloss`, `pointswon`, `pointsloss`, `SchoolID`, `league`) VALUES
(10, 'Oundle', 0, 0, 0, 0, 0, 1, 'A'),
(11, 'Oundle', 0, 0, 0, 0, 0, 1, 'B'),
(12, 'Oakham', 0, 0, 0, 0, 0, 3, 'A'),
(13, 'Oakham', 0, 0, 0, 0, 0, 3, 'B'),
(14, 'Stamford', 0, 0, 0, 0, 0, 4, 'A'),
(15, 'Stamford', 0, 0, 0, 0, 0, 4, 'B'),
(16, 'Uppingham', 0, 0, 0, 0, 0, 2, 'A'),
(17, 'Uppingham', 0, 0, 0, 0, 0, 2, 'B');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
