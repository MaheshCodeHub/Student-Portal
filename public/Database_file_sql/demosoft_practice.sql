-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2024 at 12:29 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demosoft_practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `circle_master`
--

CREATE TABLE `circle_master` (
  `c_id` int(11) NOT NULL,
  `circle_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `circle_master`
--

INSERT INTO `circle_master` (`c_id`, `circle_name`) VALUES
(1, 'Shahaji Bhosle'),
(2, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `div_id` int(11) NOT NULL,
  `division_name` varchar(50) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_id`, `division_name`, `c_id`) VALUES
(2, 'New Hanuman Nagar', 1),
(3, 'alok Nagar', 1),
(4, 'ram nagar', 1),
(5, 'pundalik nagar', 1),
(6, 'N-3', 1),
(7, 'N-4', 1),
(8, 'sdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ground_petrolling`
--

CREATE TABLE `ground_petrolling` (
  `g_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `worker` varchar(50) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `tower_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ground_petrolling`
--

INSERT INTO `ground_petrolling` (`g_id`, `date`, `worker`, `notes`, `image`, `tower_id`) VALUES
(1, '2023-10-30', 'sdfasss', 'sssss', 'logo1.png', 1),
(2, '2023-11-01', 'aaa', 'aaaa', 'logo2.png', 1),
(3, '2023-11-28', 'sas', 'asa', 'logo3.png', 1),
(4, '2023-11-07', 'ert', 'erte', 'logo2.png', 1),
(5, '2023-11-13', 'sdfa', 'sdfadf', 'logo2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `line_master`
--

CREATE TABLE `line_master` (
  `line_id` int(11) NOT NULL,
  `line_name` varchar(50) NOT NULL,
  `sdiv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `line_master`
--

INSERT INTO `line_master` (`line_id`, `line_name`, `sdiv_id`) VALUES
(1, 'radhe mandir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masteradmin`
--

CREATE TABLE `masteradmin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `masteradmin`
--

INSERT INTO `masteradmin` (`id`, `admin_name`, `username`, `password`, `status`) VALUES
(1, 'mahesh', 'mahesh@gmail.com', 'mahesh@123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mulimages`
--

CREATE TABLE `mulimages` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mulimages`
--

INSERT INTO `mulimages` (`img_id`, `img_name`, `images`) VALUES
(16, 'Logos', '3.png'),
(17, 'Logos', 'logo1.png'),
(18, 'Logos', 'logo2.png'),
(19, 'Logos', 'logo3.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `stud_id` int(11) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Email_address` varchar(50) NOT NULL,
  `Phone_Number` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Prog_Type` varchar(50) NOT NULL,
  `Addmision_Type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`stud_id`, `Full_Name`, `DOB`, `Gender`, `Email_address`, `Phone_Number`, `Address`, `Prog_Type`, `Addmision_Type`, `status`) VALUES
(1, 'Rahul Ganesh ', '1998-06-30', 'Male', 'rahul44@gmail.com', '9845235423', 'ALok Nager,Statar Parisar,Aurangabad', 'Bachelor\'s', 'Regular', 0),
(2, 'Rani Karbari Autade', '1997-03-30', 'Female', 'rani54@gmail.com', '8934352399', 'N-3,cideo,aurangabad', 'Master\'s', 'Early Decision', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_division`
--

CREATE TABLE `sub_division` (
  `sdiv_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `div_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_division`
--

INSERT INTO `sub_division` (`sdiv_id`, `sub_name`, `div_id`) VALUES
(1, 'human mandir lean no:-3', 2),
(2, 'sudhakar raonaik high school', 2),
(3, 'sudhakar  high school lean-6', 2),
(4, 'alok hanuman mandir', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tower_master`
--

CREATE TABLE `tower_master` (
  `t_id` int(11) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `tower_one` varchar(50) NOT NULL,
  `tower_two` varchar(50) NOT NULL,
  `line_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tower_master`
--

INSERT INTO `tower_master` (`t_id`, `longitude`, `latitude`, `distance`, `tower_one`, `tower_two`, `line_id`) VALUES
(1, '11', '11', '11', '11', '11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `circle_master`
--
ALTER TABLE `circle_master`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`div_id`);

--
-- Indexes for table `ground_petrolling`
--
ALTER TABLE `ground_petrolling`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `line_master`
--
ALTER TABLE `line_master`
  ADD PRIMARY KEY (`line_id`);

--
-- Indexes for table `masteradmin`
--
ALTER TABLE `masteradmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mulimages`
--
ALTER TABLE `mulimages`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `sub_division`
--
ALTER TABLE `sub_division`
  ADD PRIMARY KEY (`sdiv_id`);

--
-- Indexes for table `tower_master`
--
ALTER TABLE `tower_master`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `circle_master`
--
ALTER TABLE `circle_master`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `div_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ground_petrolling`
--
ALTER TABLE `ground_petrolling`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `line_master`
--
ALTER TABLE `line_master`
  MODIFY `line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masteradmin`
--
ALTER TABLE `masteradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mulimages`
--
ALTER TABLE `mulimages`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_division`
--
ALTER TABLE `sub_division`
  MODIFY `sdiv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tower_master`
--
ALTER TABLE `tower_master`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
