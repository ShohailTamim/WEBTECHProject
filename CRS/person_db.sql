-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 02:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `person_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

/*CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `email`) VALUES
(7, 'Kent Marsh', 'kent@aiub.com'),
(8, 'Anne Harsh', 'anne@aiub.edu'),
(12, 'Anne Marsh', 'anne@gmail.com'),
(14, 'Bob Kent', 'bob@gmail.com');
*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



/*STUDENTS_UPDATE_PROFILE*/

CREATE TABLE IF NOT EXISTS `person` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(70) NOT NULL,
        `username` varchar(70) NOT NULL,
        `mothers_name` varchar(70),
        `fathers_name` varchar(70),
         `dob` varchar(70),
         `gender` varchar(70),
         `email` varchar(255) NOT NULL,
         `password` varchar(255) NOT NULL,
         `userType` varchar(255) NOT NULL,
         `permanent_address` varchar(70),
         `present_address` varchar(70),
         `nationality` varchar(70),
         `maritial_status` varchar(70),
         `religion` varchar(70),
         `mobile_no` varchar(70),
         `degree_1` varchar(70),
         `institute_1` varchar(70),
         `year_of_passing_1` varchar(70),
         `garde_1` varchar(70),
        `degree_2` varchar(70),
         `institute_2` varchar(70),
         `year_of_passing_2` varchar(70),
         `garde_2` varchar(70),
         `degree_3` varchar(70),
         `institute_3` varchar(70),
         `year_of_passing_3` varchar(70),
         `garde_3` varchar(70),
    	`degree_4` varchar(70),
         `institute_4` varchar(70),
         `year_of_passing_4` varchar(70),
         `garde_4` varchar(70),
         `skills` varchar(70),
          `experience` varchar(70),
         
         
         

    
     
    
    
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;







/*COMPANY PROFILE*/
CREATE TABLE IF NOT EXISTS `organization` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(70) NOT NULL,
        `username` varchar(70) NOT NULL,
         
       
         `email` varchar(255) NOT NULL,
         
         `password` varchar(255) NOT NULL,
         `userType` varchar(255) NOT NULL,
          `mobile_no` varchar(70),
          `hr_name` varchar(70),
         `address` varchar(100),
         
       
         
         
         

    
     
    
    
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

/*ADMIN PROFILE*/
CREATE TABLE IF NOT EXISTS `admin` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(70) NOT NULL,
        `username` varchar(70) NOT NULL,
         
       
         `email` varchar(255) NOT NULL,
         
         `password` varchar(255) NOT NULL,
         `userType` varchar(255) NOT NULL,
          `gender` varchar(70),
          `dob` varchar(70),
         `img` varchar(255),
         
       
         
         
         

    
     
    
    
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

