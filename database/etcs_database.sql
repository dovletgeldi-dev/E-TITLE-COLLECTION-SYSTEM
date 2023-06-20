-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 12:20 PM
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
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `id` int(11) NOT NULL,
  `dispatch_nric` varchar(12) NOT NULL,
  `dispatch_name` varchar(50) NOT NULL,
  `dispatch_phone_no` varchar(11) NOT NULL,
  `organization_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`id`, `dispatch_nric`, `dispatch_name`, `dispatch_phone_no`, `organization_name`) VALUES
(1, '010916231213', 'Steph Curry', '60172321321', 'Golden State Warriors'),
(2, '990416213312', 'Michael Schumacher', '60173122132', 'Ferrari'),
(3, '851130123213', 'Lionel Messi', '60173212313', 'Barcelona FC'),
(4, '610109231231', 'Alex Simple', '60132132133', 'Natus Vincere'),
(5, '010721100861', 'Addam', '0102592808', 'Addam Organization'),
(6, '911119145635', 'John Doe ', '60132345899', 'John Advisory Sdn. Bhd.'),
(7, '123432583427', 'tsad', '0123128312', 'sadasdasd');

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
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`id`, `date`, `image`) VALUES
(1, '2023/06/03 & 01:43:28pm', '2023.06.03 - 01.43.28pm .jpeg'),
(2, '2023/06/03 & 01:44:51pm', '2023.06.03 - 01.44.51pm .jpeg'),
(3, '2023/06/03 & 01:45:38pm', '2023.06.03 - 01.45.38pm .jpeg'),
(4, '2023/06/03 & 01:46:59pm', '2023.06.03 - 01.46.59pm .jpeg'),
(5, '2023/06/07 & 08:05:16am', '2023.06.07 - 08.05.16am .jpeg'),
(6, '2023/06/09 & 04:30:58am', '2023.06.09 - 04.30.58am .jpeg'),
(7, '2023/06/17 & 04:22:34am', '2023.06.17 - 04.22.34am .jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `title_id` varchar(20) NOT NULL,
  `title_name` varchar(100) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `date_collected` datetime DEFAULT current_timestamp(),
  `dispatch_ic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`title_id`, `title_name`, `document_name`, `date_collected`, `dispatch_ic`) VALUES
('1000000001', 'GSW Title', 'Championship Document', '2023-06-09 10:36:25', '010916231213'),
('1000000003', 'Messi\'s Title', 'Messi\'s Golden Boot', '2023-06-09 10:39:01', '851130123213'),
('1005678911', 'Na\'Vi Team', 'Na\'Vi Rush B Strats', '2023-06-09 10:40:11', '851130123213'),
('2000000000', 'Big Four ', '10M Proposal ', '2023-06-09 10:41:14', '010721100861'),
('2000000010', '10 Ferrari 2023', 'Ferrari F40.', '2023-06-09 10:38:11', '990416213312'),
('2147483647', 'John\'s Title Here', 'John\'s Document', '2023-06-09 10:41:48', '911119145635');

-- --------------------------------------------------------

--
-- Table structure for table `visit_purpose`
--

CREATE TABLE `visit_purpose` (
  `id` int(11) NOT NULL,
  `developer_name` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `dispatch_ic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_purpose`
--

INSERT INTO `visit_purpose` (`id`, `developer_name`, `remarks`, `dispatch_ic`) VALUES
(1, 'Golden Warriors Developer', 'Rider have collected both titles and documents.', '010916231213'),
(2, 'Ferrari Malaysia', 'None.', '990416213312'),
(3, 'FIFA World Cup', 'Title have been collected but document have not been.', '851130123213'),
(4, 'CSGO ', 'Collected.', '851130123213'),
(5, 'Addam and Co.', 'Done collection by Addam.', '010721100861'),
(6, 'John Developer Berhad', 'John has yet to collect.', '911119145635');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispatch` (`dispatch_ic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visit_purpose`
--
ALTER TABLE `visit_purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
