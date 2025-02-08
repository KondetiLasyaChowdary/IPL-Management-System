-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 04:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ipl', 'ipl2024');

-- --------------------------------------------------------

--
-- Table structure for table `captains`
--

CREATE TABLE `captains` (
  `id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `team` varchar(60) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `captains`
--

INSERT INTO `captains` (`id`, `name`, `team`, `country`) VALUES
(20, 'chiru', 'RCB', 'India'),
(22, 'Hardik Pandya', 'MI', 'India'),
(24, 'MS Dhoni', 'CSK', 'India'),
(28, 'Sanju Samson', 'RR', 'India'),
(29, 'Aiden Markram', 'SRH', 'South Africa'),
(30, '	Shikhar Dhawan', 'KXIP', 'India'),
(31, 'David Warner', 'DC', 'Australia'),
(32, '	Nitish Rana', 'KKR', 'India'),
(38, 'bnmj', 'LSG', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `each_team`
--

CREATE TABLE `each_team` (
  `id` int(10) NOT NULL,
  `team_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `player_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `country` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `batting_style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bowling_style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `each_team`
--

INSERT INTO `each_team` (`id`, `team_name`, `player_name`, `role`, `country`, `batting_style`, `bowling_style`) VALUES
(10, 'RCB', 'Faf du Plessis', 'Batsman', 'South Africa', 'Right Handed Bat', 'Right-arm legbreak'),
(11, 'RCB', ' Virat Kohli', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm medium'),
(12, 'RCB', 'Suyash Prabhudessai', 'Batsman', 'India', 'Right Handed Bat', '-'),
(13, 'RCB', ' Rajat Patidar', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(15, 'RCB', ' Glenn Maxwell', 'Batting Allrounder', 'Australia', 'Right Handed Bat', 'Right-arm offbreak'),
(16, 'RCB', ' Will Jacks', 'Batting Allrounder', 'England', 'Right Handed Bat', 'Right-arm offbreak'),
(17, 'RCB', ' Mahipal Lomror', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(18, 'RCB', 'Cameron Green', 'Batting Allrounder', 'Australia', 'Right Handed Bat', 'Right-arm medium'),
(19, 'RCB', 'Saurav Chauhan', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(21, 'RCB', ' Tom Curran', 'Bowling Allrounder', 'England', 'Right Handed Bat', 'Right-arm fast-medium'),
(22, 'RCB', 'Akash Deep', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm medium'),
(23, 'RCB', ' Mohammed Siraj', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(24, 'RCB', 'Rajan Kumar', 'Bowler', 'India', 'Left Handed Bat', 'Left-arm fast-medium'),
(25, 'RCB', 'Himanshu Sharma', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(26, 'RCB', 'Karn Sharma', 'Bowler', 'India', 'Left Handed Bat', 'Right-arm legbreak'),
(27, 'RCB', 'Vijaykumar Vyshak', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm medium'),
(28, 'RCB', ' Mayank Dagar', 'Bowler', 'India', 'Right Handed Bat', 'Left-arm orthodox'),
(29, 'RCB', ' Reece Topley', 'Bowler', 'England', 'Right Handed Bat', 'Left-arm fast-medium'),
(30, 'RCB', 'Lockie Ferguson', 'Bowler', 'New Zealand', 'Right Handed Bat', 'Right-arm fast'),
(31, 'RCB', ' Alzarri Joseph', 'Bowler', 'West Indies', 'Right Handed Bat', 'Right-arm fast-medium'),
(32, 'RCB', 'Yash Dayal', 'Bowler', 'India', 'Left Handed Bat', 'Left-arm fast-medium'),
(34, 'MI', ' Rohit Sharma', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(35, 'MI', 'Dewald Brevis', 'Batsman', 'South Africa', 'Right Handed Bat', 'Right-arm legbreak'),
(36, 'MI', 'Tim David', 'Batsman', 'Australia', 'Right Handed Bat', 'Right-arm medium'),
(37, 'MI', 'Tilak Varma', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm offbreak'),
(38, 'MI', ' Nehal Wadhera', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm legbreak'),
(39, 'MI', 'Suryakumar Yadav', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(40, 'MI', ' Shivalik Sharma', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm legbreak'),
(41, 'MI', ' Naman Dhir', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(43, 'MI', 'Hardik Pandya', 'Batting Allrounder', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(44, 'MI', 'Kumar Kartikeya', 'Bowling Allrounder', 'India', 'Right Handed Bat', 'Left-arm wrist-spin'),
(45, 'MI', ' Arjun Tendulkar', 'Bowling Allrounder', 'India', 'Left Handed Bat', 'Left-arm fast-medium'),
(46, 'MI', ' Mohammad Nabi', 'Bowling Allrounder', 'Afghanistan', 'Right Handed Bat', 'Right-arm offbreak'),
(47, 'MI', ' Ishan Kishan', 'WK-Batsman', 'India', 'Left Handed Bat', '-'),
(48, 'MI', 'Vishnu Vinod', 'WK-Batsman', 'India', 'Right Handed Bat', '-'),
(49, 'MI', ' Jason Behrendorff', 'Bowler', 'Australia', 'Right Handed Bat', 'Left-arm fast-medium'),
(50, 'MI', 'Piyush Chawla', 'Bowler', 'India', 'Left Handed Bat', 'Right-arm legbreak'),
(51, 'MI', ' Akash Madhwal', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(52, 'MI', ' Jasprit Bumrah', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast'),
(53, 'MI', ' Romario Shepherd', 'Bowler', 'West Indies', 'Right Handed Bat', 'Right-arm fast-medium'),
(54, 'MI', 'Gerald Coetzee', 'Bowler', 'South Africa', 'Right Handed Bat', 'Right-arm fast'),
(55, 'MI', ' Anshul Kamboj', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(56, 'MI', 'Dilshan Madushanka', 'Bowler', 'Sri Lanka', 'Right Handed Bat', 'Left-arm fast-medium'),
(57, 'MI', ' Nuwan Thushara', 'Bowler', 'Sri Lanka', 'Right Handed Bat', 'Right-arm fast-medium'),
(60, 'CSK', ' Ruturaj Gaikwad', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(61, 'CSK', ' Ajinkya Rahane', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm medium'),
(62, 'CSK', ' Shaik Rasheed', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(63, 'CSK', ' Sameer Rizvi', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(64, 'CSK', ' Moeen Ali', 'Batting Allrounder', 'England', 'Left Handed Bat', 'Right-arm offbreak'),
(65, 'CSK', 'Nishant Sindhu', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(66, 'CSK', 'Daryl Mitchell', 'Batting Allrounder', 'New Zealand', 'Right Handed Bat', 'Right-arm medium'),
(67, 'CSK', ' Rachin Ravindra', 'Batting Allrounder', 'New Zealand', 'Left Handed Bat', 'Left-arm orthodox'),
(68, 'CSK', ' Shivam Dube', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Right-arm medium'),
(69, 'CSK', ' Ravindra Jadeja', 'Bowling Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(70, 'CSK', 'Mitchell Santner', 'Bowling Allrounder', 'New Zealand', 'Left Handed Bat', 'Left-arm orthodox'),
(73, 'CSK', ' MS Dhoni', 'WK-Batsman', 'India', 'Right Handed Bat', 'Right-arm medium'),
(74, 'CSK', ' Devon Conway', 'WK-Batsman', 'New Zealand', 'Left Handed Bat', 'Right-arm medium'),
(75, 'CSK', ' Aravelly Avanish', 'WK-Batsman', 'India', 'Left Handed Bat', '-'),
(76, 'CSK', ' Deepak Chahar', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm medium'),
(79, 'CSK', 'Tushar Deshpande', 'Bowler', 'India', 'Left Handed Bat', 'Right-arm medium'),
(80, 'CSK', ' RS Hangargekar', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(81, 'CSK', ' Matheesha Pathirana', 'Bowler', 'Sri Lanka', 'Right Handed Bat', 'Right-arm fast'),
(82, 'CSK', ' Maheesh Theekshana', 'Bowler', 'Sri Lanka', 'Right Handed Bat', 'Right-arm offbreak'),
(83, 'CSK', ' Shardul Thakur', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(84, 'CSK', ' Mustafizur Rahman', 'Bowler', 'Sri Lanka', 'Left Handed Bat', 'Left-arm fast-medium'),
(85, 'KKR', 'kaskkas\r\n', 'lal', 'lsl', 'lsks;', 'lakl'),
(86, 'KKR', 'Nitish Rana', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm offbreak'),
(87, 'KKR', ' Rinku Singh', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm offbreak'),
(88, 'KKR', 'Jason Roy', 'Batsman', 'England', 'Right Handed Bat', '-'),
(89, 'KKR', 'Shreyas Iyer', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(90, 'KKR', 'Manish Pandey', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm medium'),
(91, 'KKR', ' Venkatesh Iyer', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Right-arm medium'),
(92, 'KKR', ' Anukul Roy', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(93, 'KKR', ' Sherfane Rutherford', 'Batting Allrounder', 'West Indies', 'Left Handed Bat', 'Right-arm fast-medium'),
(94, 'KKR', ' Sunil Narine', 'Bowling Allrounder', 'West Indies', 'Left Handed Bat', 'Right-arm offbreak'),
(95, 'KKR', 'Andre Russell', 'Bowling Allrounder', 'West Indies', 'Right Handed Bat', 'Right-arm fast'),
(96, 'KKR', 'Rahmanullah Gurbaz', 'WK-Batsman', 'Afghanistan', 'Right Handed Bat', 'Right-arm medium'),
(97, 'KKR', ' Srikar Bharat', 'WK-Batsman', 'India', 'Right Handed Bat', '-'),
(98, 'KKR', ' Suyash Sharma', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(99, 'KKR', ' Varun Chakaravarthy', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(100, 'KKR', 'Chetan Sakariya', 'Bowler', 'India', 'Left Handed Bat', 'Left-arm fast-medium'),
(101, 'KKR', ' Mitchell Starc', 'Bowler', 'Australia', 'Left Handed Bat', 'Left-arm fast'),
(102, 'KKR', ' Mujeeb Ur Rahman', 'Bowler', 'Afghanistan', 'Right Handed Bat', 'Right-arm offbreak'),
(103, 'KKR', 'Gus Atkinson', 'Bowler', 'England', 'Right Handed Bat', 'Right-arm medium'),
(105, 'DC', 'iqwowk', 'wjwl', 'lwkj', 'lwk', 'lwks;'),
(106, 'DC', ' Prithvi Shaw', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(107, 'DC', 'David Warner', 'Batsman', 'Australia', 'Left Handed Bat', 'Right-arm offbreak'),
(108, 'DC', 'Yash Dhull', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(109, 'DC', ' Harry Brook', 'Batsman', 'England', 'Right Handed Bat', 'Right-arm medium'),
(110, 'DC', ' Ricky Bhui', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(111, 'DC', ' Lalit Yadav', 'Batting Allrounder', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(112, 'DC', 'Mitchell Marsh', 'Batting Allrounder', 'Australia', 'Right Handed Bat', 'Right-arm fast-medium'),
(113, 'DC', ' Axar Patel', 'Bowling Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(114, 'DC', 'Rishabh Pant', 'WK-Batsman', 'India', 'Left Handed Bat', '-'),
(115, 'DC', ' Shai Hope', 'WK-Batsman', 'West Indies', 'Right Handed Bat', '-'),
(116, 'DC', 'Tristan Stubbs', 'WK-Batsman', 'South Africa', 'Right Handed Bat', 'Right-arm offbreak'),
(117, 'DC', 'Khaleel Ahmed', 'Bowler', 'India', 'Right Handed Bat', 'Left-arm fast-medium'),
(118, 'DC', 'Praveen Dubey', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(119, 'DC', ' Kuldeep Yadav', 'Bowler', 'India', 'Left Handed Bat', 'Left-arm wrist-spin'),
(120, 'DC', ' Mukesh Kumar', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm medium'),
(121, 'DC', ' Lungi Ngidi', 'Bowler', 'South Africa', 'Right Handed Bat', 'Right-arm fast'),
(122, 'DC', 'Anrich Nortje', 'Bowler', 'Australia', 'Right Handed Bat', 'Right-arm fast'),
(123, 'DC', ' Ishant Sharma', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(125, 'SRH', 'kwsk', 'lsj', 'lsk', 'lsk', ';sk'),
(126, 'SRH', 'Abdul Samad', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(127, 'SRH', ' Mayank Agarwal', 'Batsman', 'India', 'Right Handed Bat', '-'),
(128, 'SRH', 'Aiden Markram', 'Batsman', 'South Africa', 'Right Handed Bat', 'Right-arm offbreak'),
(129, 'SRH', ' Rahul Tripathi', 'Batsman', 'India', 'Right Handed Bat', 'Right-arm medium'),
(130, 'SRH', 'Glenn Phillips', 'Batsman', 'New Zealand', 'Right Handed Bat', 'Right-arm offbreak'),
(131, 'SRH', ' Travis Head', 'Batsman', 'Australia', 'Left Handed Bat', 'Right-arm offbreak'),
(132, 'SRH', 'Washington Sundar', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Right-arm offbreak'),
(133, 'SRH', ' Shahbaz Ahmed', 'Bowling Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(134, 'SRH', ' Abhishek Sharma', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(135, 'SRH', 'Marco Jansen', 'Bowling Allrounder', 'South Africa', 'Right Handed Bat', 'Left-arm fast'),
(136, 'SRH', ' Wanindu Hasaranga', 'Bowling Allrounder', 'Sri Lanka', 'Right Handed Bat', 'Right-arm legbreak'),
(137, 'SRH', 'Heinrich Klaasen', 'WK-Batsman', 'South Africa', 'Right Handed Bat', 'Right-arm offbreak'),
(138, 'SRH', ' Fazalhaq Farooqi', 'Bowler', 'Afghanistan', 'Right Handed Bat', 'Left-arm fast-medium'),
(139, 'SRH', ' Bhuvneshwar Kumar', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(140, 'SRH', ' Mayank Markande', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(141, 'SRH', ' T Natarajan', 'Bowler', 'India', 'Left Handed Bat', 'Left-arm fast-medium'),
(142, 'SRH', ' Umran Malik', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast'),
(143, 'SRH', ' Jaydev Unadkat', 'Bowler', 'India', 'Right Handed Bat', 'Left-arm fast-medium'),
(144, 'SRH', ' Pat Cummins', 'Bowler', 'Australia', 'Right Handed Bat', 'Right-arm fast'),
(147, 'KXIP', ' Shikhar Dhawan', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm offbreak'),
(148, 'KXIP', ' Harpreet Singh Bhatia', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm medium'),
(149, 'KXIP', ' Rilee Rossouw', 'Batsman', 'South Africa', 'Left Handed Bat', 'Right-arm offbreak'),
(150, 'KXIP', 'Atharva Taide', 'Batsman', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(151, 'KXIP', ' Liam Livingstone', 'Batting Allrounder', 'England', 'Right Handed Bat', 'Right-arm legbreak'),
(152, 'KXIP', ' Sikandar Raza', 'Batting Allrounder', 'Zimbabwe', 'Right Handed Bat', 'Right-arm offbreak'),
(153, 'KXIP', 'Sam Curran', 'Bowling Allrounder', 'England', 'Left Handed Bat', 'Left-arm fast-medium'),
(154, 'KXIP', ' Rishi Dhawan', 'WK-Batsman', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(155, 'KXIP', ' Harpreet Brar', 'Batting Allrounder', 'India', 'Left Handed Bat', 'Left-arm orthodox'),
(156, 'KXIP', ' Chris Woakes', 'Bowling Allrounder', 'England', 'Right Handed Bat', 'Right-arm fast-medium'),
(157, 'KXIP', 'Prabhsimran Singh', 'WK-Batsman', 'India', 'Right Handed Bat', '-'),
(158, 'KXIP', ' Jitesh Sharma', 'WK-Batsman', 'India', 'Right Handed Bat', '-'),
(159, 'KXIP', ' Jonny Bairstow', 'WK-Batsman', 'England', 'Right Handed Bat', 'Right-arm medium'),
(160, 'KXIP', ' Kagiso Rabada', 'Bowler', 'South Africa', 'Left Handed Bat', 'Right-arm fast'),
(161, 'KXIP', ' Nathan Ellis', 'Bowler', 'Australia', 'Right Handed Bat', 'Right-arm fast-medium'),
(162, 'KXIP', ' Rahul Chahar', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(163, 'KXIP', 'Harshal Patel', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(164, 'KXIP', ' Arshdeep Singh', 'Bowler', 'India', 'Left Handed Bat', 'Left-arm fast-medium'),
(166, 'RR', ' Shimron Hetmyer', 'Batsman', 'West Indies', 'Left Handed Bat', '-'),
(167, 'RR', ' Yashasvi Jaiswal', 'Batsman', 'India', 'Left Handed Bat', 'Right-arm legbreak'),
(168, 'RR', ' Rovman Powell', 'Batsman', 'West Indies', 'Right Handed Bat', 'Right-arm fast-medium'),
(169, 'RR', ' Riyan Parag', 'Batting Allrounder', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(170, 'RR', 'Ravichandran Ashwin', 'Bowling Allrounder', 'India', 'Right Handed Bat', 'Right-arm offbreak'),
(171, 'RR', 'Sanju Samson', 'WK-Batsman', 'India', 'Right Handed Bat', '-'),
(172, 'RR', ' Jos Buttler', 'WK-Batsman', 'England', 'Right Handed Bat', '-'),
(173, 'RR', ' Dhruv Jurel', 'WK-Batsman', 'India', 'Right Handed Bat', '-'),
(174, 'RR', ' Trent Boult', 'Bowler', 'New Zealand', 'Right Handed Bat', 'Left-arm fast-medium'),
(175, 'RR', ' Yuzvendra Chahal', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm legbreak'),
(176, 'RR', ' Navdeep Saini', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast'),
(177, 'RR', ' Adam Zampa', 'Bowler', 'Australia', 'Right Handed Bat', 'Right-arm legbreak'),
(178, 'RR', ' Avesh Khan', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(179, 'RR', ' Sandeep Sharma', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium'),
(180, 'RR', ' Prasidh Krishna', 'Bowler', 'India', 'Right Handed Bat', 'Right-arm fast-medium');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('anjan', '1234'),
('chiranthan', '1234'),
('chiru', 'chiru');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(8) NOT NULL,
  `team_name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `matches` int(20) NOT NULL,
  `wins` int(10) NOT NULL,
  `winning_percentage` decimal(5,2) NOT NULL,
  `lost` int(10) NOT NULL,
  `tied` int(10) NOT NULL,
  `total_points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team_name`, `matches`, `wins`, `winning_percentage`, `lost`, `tied`, `total_points`) VALUES
(1, 'RCB', 192, 91, 47.40, 95, 6, 188),
(2, 'MI', 214, 119, 55.61, 94, 0, 239),
(3, 'KKR', 214, 106, 49.53, 104, 4, 216),
(4, 'CSK', 186, 106, 56.99, 78, 2, 214),
(5, 'DC', 214, 101, 47.20, 110, 3, 205),
(6, 'KXIP', 186, 87, 46.77, 99, 3, 177),
(8, 'RR', 186, 92, 49.46, 91, 5, 189),
(9, 'SRH', 142, 71, 50.00, 70, 1, 141);

--
-- Triggers `matches`
--
DELIMITER $$
CREATE TRIGGER `calculate_winning_percentage` AFTER INSERT ON `matches` FOR EACH ROW BEGIN
    DECLARE total_matches INT;
    DECLARE total_wins INT;
    DECLARE winning_percentage DECIMAL(5,2);

    -- Calculate total matches and wins
    SELECT COUNT(*), SUM(wins) INTO total_matches, total_wins
    FROM matches
    WHERE team_name = NEW.team_name;

    -- Calculate winning percentage
    IF total_matches > 0 THEN
        SET winning_percentage = (total_wins / total_matches) * 100;
    ELSE
        SET winning_percentage = 0;
    END IF;

    -- Update the winning percentage in the matches table
    UPDATE matches
    SET winning_percentage = winning_percentage
    WHERE team_name = NEW.team_name;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `matches_played`
--

CREATE TABLE `matches_played` (
  `match_no` int(11) NOT NULL,
  `team1` varchar(255) DEFAULT NULL,
  `team2` varchar(255) DEFAULT NULL,
  `who_won_toss` varchar(255) DEFAULT NULL,
  `inning1` varchar(255) DEFAULT NULL,
  `inning2` varchar(255) DEFAULT NULL,
  `who_won_match` varchar(255) DEFAULT NULL,
  `man_of_match` varchar(255) DEFAULT NULL,
  `most_runs` varchar(255) DEFAULT NULL,
  `wickets_by_player` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches_played`
--

INSERT INTO `matches_played` (`match_no`, `team1`, `team2`, `who_won_toss`, `inning1`, `inning2`, `who_won_match`, `man_of_match`, `most_runs`, `wickets_by_player`) VALUES
(4, 'RCB', 'MI', 'toss won by MI choose batting', '187-4', '190-3', 'RCB', 'ABD', '79 by ABD', '4 witckes by kholi');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `team` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `matches` int(10) NOT NULL,
  `runs` int(10) NOT NULL,
  `average_runs` decimal(10,2) NOT NULL,
  `strike_rate` decimal(10,2) NOT NULL,
  `wickets` int(10) NOT NULL,
  `avg_wickets` decimal(10,2) NOT NULL,
  `economy` decimal(10,2) NOT NULL,
  `best_batting` int(20) NOT NULL,
  `best_bowling` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `team`, `type`, `matches`, `runs`, `average_runs`, `strike_rate`, `wickets`, `avg_wickets`, `economy`, `best_batting`, `best_bowling`) VALUES
(18, 'chiranthan', 'RCB', 'batsman', 214, 5674, 30.56, 140.34, 18, 18.90, 8.55, 79, '2/36'),
(20, 'Virat Kohli', 'RCB', 'Batsman', 237, 7263, 37.27, 130.20, 8, 92.00, 8.80, 113, '1/22'),
(21, 'Rajat Patidar', 'RCB', 'Batsman', 12, 440, 40.40, 144.34, 0, 0.00, 0.00, 112, '0'),
(22, 'Glenn Maxwell', 'RCB', 'Allrounder', 124, 2719, 26.40, 157.62, 31, 37.87, 8.31, 95, '3/33'),
(23, ' Mahipal Lomror', 'RCB', 'Allrounder', 30, 402, 19.14, 131.80, 1, 109.00, 7.79, 54, '1/22'),
(25, 'Cameron Green', 'RCB', 'Allrounder', 16, 452, 50.22, 160.28, 6, 60.17, 9.50, 100, '2/41'),
(28, 'Dinesh Karthik', 'RCB', 'WK-Batsman', 242, 4516, 25.81, 132.71, 0, 0.00, 0.00, 0, '0'),
(30, ' Mohammed Siraj', 'RCB', 'Bowler', 79, 97, 12.12, 87.98, 78, 29.82, 8.54, 14, '4/22'),
(37, 'jak', 'RCB', 'Batsman', 23, 21, 456.00, 1.00, 1, 23123.00, 345.00, 345, '3/9'),
(39, ' Karn Sharma', 'RCB', 'Bowler', 75, 320, 13.19, 1147.00, 69, 26.57, 8.14, 39, '4/16'),
(40, 'Lockie Ferguson', 'RCB', 'Bowler', 38, 67, 33.30, 148.89, 37, 31.65, 8.66, 24, '4/28'),
(41, ' Alzarri Joseph', 'RCB', 'Bowler', 19, 27, 27.00, 84.38, 20, 28.80, 9.19, 15, '6/12'),
(42, 'Rohit Sharma', 'MI', 'Batsman', 243, 6211, 29.58, 130.05, 15, 30.20, 8.02, 109, '4/6'),
(43, ' Suryakumar Yadav', 'MI', 'Batsman', 139, 3249, 31.85, 143.65, 0, 0.00, 8.00, 103, '0/8'),
(44, ' Tim David', 'MI', 'Batsman', 25, 218, 27.87, 177.87, 0, 0.00, 0.00, 46, '0'),
(45, ' Tilak Varma', 'MI', 'Batsman', 25, 740, 38.95, 144.78, 0, 0.00, 6.67, 84, '0/6'),
(46, ' Hardik Pandya', 'MI', 'Allrounder', 123, 2309, 30.08, 145.87, 53, 33.26, 8.80, 91, '3/17'),
(47, ' Mohammad Nabi', 'MI', 'Allrounder', 17, 180, 15.00, 151.09, 13, 31.28, 7.14, 31, '4/11'),
(48, ' Ishan Kishan', 'MI', 'WK-Batsman', 91, 2342, 29.42, 134.26, 0, 0.00, 0.00, 99, '0'),
(49, 'Jasprit Bumrah', 'MI', 'Bowler', 120, 56, 8.00, 84.65, 145, 23.31, 7.40, 16, '5/10'),
(50, ' Piyush Chawla', 'MI', 'Bowler', 181, 609, 11.71, 111.40, 179, 26.79, 7.91, 24, '4/17'),
(51, 'Ruturaj Gaikwad', 'CSK', 'Batsman', 52, 1792, 39.70, 139.80, 0, 0.00, 0.00, 101, '0'),
(52, 'Ajinkya Rahane', 'CSK', 'Batsman', 172, 4400, 30.99, 123.67, 1, 5.00, 5.00, 105, '1/5'),
(53, 'Moeen Ali', 'CSK', 'Allrounder', 59, 1034, 22.48, 143.02, 33, 24.91, 6.95, 93, '4/26'),
(54, ' Ravindra Jadeja', 'CSK', 'Allrounder', 226, 2692, 26.39, 128.69, 152, 29.57, 7.60, 62, '5/16'),
(55, ' Shivam Dube', 'CSK', 'Allrounder', 51, 1106, 28.36, 141.67, 4, 41.50, 9.40, 95, '2/15'),
(56, ' MS Dhoni', 'CSK', 'WK-Batsman', 250, 5082, 38.79, 135.92, 0, 0.00, 0.00, 84, '0'),
(57, ' Deepak Chahar', 'CSK', 'Bowler', 73, 80, 11.43, 135.59, 72, 28.04, 7.93, 39, '4/13'),
(58, ' Shardul Thakur', 'CSK', 'Batsman', 86, 286, 11.92, 140.20, 89, 28.76, 9.16, 68, '4/36'),
(59, ' Shreyas Iyer', 'KKR', 'Batsman', 101, 2776, 31.55, 125.45, 0, 0.00, 7.00, 96, '0/7'),
(60, ' Manish Pandey', 'KKR', 'Batsman', 170, 3808, 29.07, 120.97, 0, 0.00, 0.00, 114, '0'),
(61, ' Andre Russell', 'KKR', 'Allrounder', 112, 2262, 29.00, 174.00, 96, 24.49, 9.27, 88, '5/15'),
(62, ' Sunil Narine', 'KKR', 'Allrounder', 162, 1046, 13.76, 159.87, 163, 25.79, 6.73, 75, '5/19'),
(63, ' Varun Chakaravarthy', 'KKR', 'Bowler', 56, 25, 6.25, 54.35, 62, 25.81, 7.45, 10, '5/20'),
(64, ' Mitchell Starc', 'KKR', 'Bowler', 27, 96, 13.17, 97.32, 34, 20.38, 7.17, 29, '4/15'),
(65, ' Mayank Agarwal', 'SRH', 'Batsman', 123, 2604, 23.02, 133.87, 0, 0.00, 0.00, 106, '0'),
(66, ' Rahul Tripathi', 'SRH', 'Batsman', 89, 2071, 26.90, 138.99, 0, 0.00, 12.00, 93, '0/12'),
(67, ' Washington Sundar', 'SRH', 'Allrounder', 58, 378, 14.56, 110.34, 36, 34.78, 7.78, 40, '3/16'),
(68, ' Wanindu Hasaranga', 'SRH', 'Allrounder', 27, 72, 7.20, 98.06, 35, 21.37, 8.13, 18, '5/18'),
(69, ' Heinrich Klaasen', 'SRH', 'WK-Batsman', 19, 512, 36.17, 165.43, 0, 0.00, 0.00, 104, '0'),
(70, ' Bhuvneshwar Kumar', 'SRH', 'Bowler', 160, 283, 8.84, 95.26, 170, 25.85, 7.39, 27, '5/19'),
(71, ' Pat Cummins', 'SRH', 'Bowler', 42, 379, 18.92, 152.21, 45, 30.16, 8.54, 66, '4/34'),
(72, 'Yashasvi Jaiswal', 'RR', 'Batsman', 37, 1172, 32.56, 148.73, 0, 0.00, 6.00, 124, '0/6'),
(73, ' Ravichandran Ashwin', 'RR', 'Allrounder', 197, 714, 13.12, 118.80, 171, 28.67, 7.01, 50, '4/34'),
(74, 'Jos Buttler', 'RR', 'WK-Batsman', 96, 3223, 37.92, 148.34, 0, 0.00, 0.00, 124, '0'),
(75, 'Sanju Samson', 'RR', 'WK-Batsman', 152, 3888, 29.23, 137.87, 0, 0.00, 0.00, 119, '0'),
(76, ' Trent Boult', 'RR', 'Bowler', 88, 69, 11.50, 117.43, 105, 26.54, 8.29, 17, '4/18'),
(77, 'Shikhar Dhawan', 'KXIP', 'Batsman', 217, 6616, 35.19, 127.16, 1, 16.50, 8.25, 106, '1/7'),
(78, ' Jonny Bairstow', 'KXIP', 'WK-Batsman', 39, 1291, 35.89, 142.65, 0, 0.00, 0.00, 114, '0'),
(79, ' Harshal Patel', 'KXIP', 'Bowler', 92, 236, 9.83, 128.26, 111, 24.07, 8.59, 36, '5/27'),
(80, ' Kagiso Rabada', 'KXIP', 'Bowler', 69, 196, 11.62, 103.91, 106, 20.74, 8.42, 44, '4/21'),
(81, ' David Warner', 'DC', 'Batsman', 176, 6397, 41.54, 139.98, 0, 0.00, 2.00, 126, '0/2'),
(82, ' Prithvi Shaw', 'DC', 'Batsman', 71, 1694, 23.89, 145.75, 0, 0.00, 0.00, 99, '0'),
(83, ' Axar Patel', 'DC', 'Allrounder', 136, 1418, 20.55, 130.81, 112, 30.54, 7.24, 54, '4/21'),
(84, ' Rishabh Pant', 'DC', 'WK-Batsman', 98, 2838, 34.61, 147.98, 0, 0.00, 0.00, 128, '0'),
(85, 'Kuldeep Yadav', 'DC', 'Bowler', 73, 136, 15.11, 77.89, 71, 28.12, 8.13, 16, '4/14'),
(86, ' Ishant Sharma', 'DC', 'Bowler', 101, 56, 9.33, 90.07, 82, 35.45, 8.12, 10, '5/12'),
(87, ' Yuzvendra Chahal', 'RR', 'Bowler', 145, 37, 5.29, 43.02, 187, 21.69, 7.67, 8, '5/40');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `match_number` int(11) NOT NULL,
  `match_date` date DEFAULT NULL,
  `team1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `team2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `venue` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`match_number`, `match_date`, `team1`, `team2`, `venue`) VALUES
(4, '2024-02-15', 'RCB', 'MI', 'BANGAOLRE'),
(5, '2024-02-23', 'MI', 'KXIP', 'KSJ'),
(6, '2024-02-22', 'DC', 'KKR', 'uwiw');

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `stadium_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `capacity` int(20) NOT NULL,
  `DOI` date NOT NULL,
  `board_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `team` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`stadium_name`, `capacity`, `DOI`, `board_name`, `team`) VALUES
('M. A. CHIDAMBARAM STADIUM', 33500, '1916-06-15', 'Tamil Nadu Cricket Association', 'CSK'),
('Arun Jaitley Stadium', 35200, '1883-07-25', 'Delhi & District Cricket Association', 'DC'),
('Eden Gardens', 68000, '1864-11-23', 'Cricket Association of Bengal', 'KKR'),
('Punjab Cricket Association IS Bindra Stadium', 27000, '1993-06-09', '	Punjab Cricket Association', 'KXIP'),
('Wankhede Stadium', 39000, '1974-08-07', 'Mumbai Cricket Association', 'mi'),
('M. Chinnaswamy Stadium', 33800, '1969-05-18', 'Karnataka State Cricket Association (KSCA)', 'RCB'),
('	Sawai Mansingh Stadium', 35000, '1969-09-23', 'Rajasthan Cricket Association', 'RR'),
('Rajiv Gandhi Intl. Cricket Stadium', 39200, '2003-07-09', 'Hyderabad Cricket Association (HCA)', 'SRH');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `owner` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `city` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `home_ground` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `coach` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_name`, `owner`, `city`, `home_ground`, `coach`) VALUES
('CSK', 'Chennai Super Kings Cricket Ltd.', 'Chennai ', 'M. A. Chidambaram Stadium', 'Stephen Fleming'),
('DC', 'GMR Sports Pvt. Ltd & JSW Sports Pvt Ltd', 'Delhi', 'Arun Jaitley Stadium', 'Ricky Ponting'),
('KKR', 'Knight Riders Sports Private Ltd', 'Kolkata', 'Eden Gardens', 'Chandrakant Pandit'),
('KXIP', 'KPH Dream Cricket Private Limited', 'Punjab', 'Punjab Cricket Association IS Bindra Stadium', 'Trevor Bayliss'),
('LSG', 'Jeevan', 'Lucknow', 'Mohali Intl. Cricket Stadium', 'Ricky Ponting'),
('MI', 'Indiawin Sports Pvt. Ltd', 'Mumbai', 'Wankhede Stadium', 'Mark Boucher'),
('RCB', 'United Spirits Limited (USL)', 'Bangalore', 'M. Chinnaswamy Stadium', 'Sanjay Bangar'),
('RR', 'The Royals Sports Group', 'Rajasthan', 'Sawai Mansingh Stadium', 'Kumar Sangakkara'),
('SRH', 'SUN TV Network', 'Hyderabad', 'Rajiv Gandhi Intl. Cricket Stadium', 'Daniel Vettori');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indexes for table `captains`
--
ALTER TABLE `captains`
  ADD PRIMARY KEY (`id`,`team`) USING BTREE,
  ADD KEY `team` (`team`);

--
-- Indexes for table `each_team`
--
ALTER TABLE `each_team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `player_name` (`player_name`),
  ADD KEY `team_name` (`team_name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`,`team_name`) USING BTREE,
  ADD KEY `hi` (`team_name`);

--
-- Indexes for table `matches_played`
--
ALTER TABLE `matches_played`
  ADD PRIMARY KEY (`match_no`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team` (`team`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`match_number`),
  ADD KEY `schedule_ibfk_1` (`team1`),
  ADD KEY `schedule_ibfk_2` (`team2`);

--
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`team`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captains`
--
ALTER TABLE `captains`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `each_team`
--
ALTER TABLE `each_team`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `captains`
--
ALTER TABLE `captains`
  ADD CONSTRAINT `captains_ibfk_1` FOREIGN KEY (`team`) REFERENCES `teams` (`team_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `each_team`
--
ALTER TABLE `each_team`
  ADD CONSTRAINT `each_team_ibfk_1` FOREIGN KEY (`team_name`) REFERENCES `teams` (`team_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `hi` FOREIGN KEY (`team_name`) REFERENCES `teams` (`team_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matches_played`
--
ALTER TABLE `matches_played`
  ADD CONSTRAINT `matches_played_ibfk_1` FOREIGN KEY (`match_no`) REFERENCES `schedule` (`match_number`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team`) REFERENCES `teams` (`team_name`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`team1`) REFERENCES `teams` (`team_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`team2`) REFERENCES `teams` (`team_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stadium`
--
ALTER TABLE `stadium`
  ADD CONSTRAINT `fk_each_team` FOREIGN KEY (`team`) REFERENCES `teams` (`team_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
