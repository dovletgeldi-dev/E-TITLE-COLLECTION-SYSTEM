-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 04:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etcs_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `dispatch_nric` varchar(12) NOT NULL,
  `dispatch_name` varchar(50) NOT NULL,
  `dispatch_phone_no` varchar(11) NOT NULL,
  `organization_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`dispatch_nric`, `dispatch_name`, `dispatch_phone_no`, `organization_name`) VALUES
('010101100101', 'Addam', '0111111111', 'Addam Company');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `datetime_join` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `username`, `password`, `datetime_join`) VALUES
(1, 'admin', 'admin', '2023-04-12 14:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(50) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `date_collected` datetime DEFAULT current_timestamp(),
  `dispatch_ic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`title_id`, `title_name`, `document_name`, `date_collected`, `dispatch_ic`) VALUES
(1000000000, 'INTI Property Title', 'Block A Document', '2023-05-19 21:42:28', '010101100101');

-- --------------------------------------------------------

--
-- Table structure for table `visit_purpose`
--

CREATE TABLE `visit_purpose` (
  `developer_name` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `dispatch_ic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_purpose`
--

INSERT INTO `visit_purpose` (`developer_name`, `remarks`, `dispatch_ic`) VALUES
('INTI Corporation Berhad', 'Purpose of visit: Collect E-Title.', '010101100101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`dispatch_nric`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`title_id`),
  ADD KEY `dispatch2` (`dispatch_ic`);

--
-- Indexes for table `visit_purpose`
--
ALTER TABLE `visit_purpose`
  ADD KEY `dispatch` (`dispatch_ic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `titles`
--
ALTER TABLE `titles`
  ADD CONSTRAINT `dispatch2` FOREIGN KEY (`dispatch_ic`) REFERENCES `dispatch` (`dispatch_nric`);

--
-- Constraints for table `visit_purpose`
--
ALTER TABLE `visit_purpose`
  ADD CONSTRAINT `dispatch` FOREIGN KEY (`dispatch_ic`) REFERENCES `dispatch` (`dispatch_nric`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
