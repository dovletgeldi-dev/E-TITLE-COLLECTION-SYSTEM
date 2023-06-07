-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`id`, `dispatch_nric`, `dispatch_name`, `dispatch_phone_no`, `organization_name`) VALUES
(1, '010916231213', 'Steph Curry', '60172321321', 'Golden State Warriors'),
(2, '990416213312', 'Michael Schumacher', '60173122132', 'Ferrari'),
(3, '851130123213', 'Lionel Messi', '60173212313', 'Barcelona FC'),
(4, '610109231231', 'Alex Simple', '60132132133', 'Natus Vincere');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `datetime_join` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`id`, `date`, `image`) VALUES
(1, '2023/06/03 & 01:43:28pm', '2023.06.03 - 01.43.28pm .jpeg'),
(2, '2023/06/03 & 01:44:51pm', '2023.06.03 - 01.44.51pm .jpeg'),
(3, '2023/06/03 & 01:45:38pm', '2023.06.03 - 01.45.38pm .jpeg'),
(4, '2023/06/03 & 01:46:59pm', '2023.06.03 - 01.46.59pm .jpeg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`title_id`, `title_name`, `document_name`, `date_collected`, `dispatch_ic`) VALUES
(9904, 'Lum Title', 'Lum Document', '2023-06-06 13:45:18', '990416213312'),
(1000000000, 'INTI Property Title', 'Block A Document', '2023-05-19 21:42:28', '010101100101'),
(1000000002, 'SP Setia Title ', 'SP Setia Document 1', '2023-06-06 14:07:20', '010101100101');

-- --------------------------------------------------------

--
-- Table structure for table `visit_purpose`
--

CREATE TABLE `visit_purpose` (
  `id` int(11) NOT NULL,
  `developer_name` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `dispatch_ic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visit_purpose`
--

INSERT INTO `visit_purpose` (`id`, `developer_name`, `remarks`, `dispatch_ic`) VALUES
(1, 'INTI Corporation Berhad', 'Purpose of visit: Collect E-Title.', '010101100101'),
(10, 'Lum Developer', 'None', '990416213312'),
(11, 'SP Setia', 'Collection done.', '010101100101');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000009;

--
-- AUTO_INCREMENT for table `visit_purpose`
--
ALTER TABLE `visit_purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
