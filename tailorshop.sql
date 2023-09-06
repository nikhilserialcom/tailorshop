-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 09:22 AM
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
-- Database: `tailorshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `totalitem` int(11) NOT NULL,
  `pantQty` int(11) NOT NULL,
  `shirtQty` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `advance` int(12) NOT NULL,
  `orderDate` varchar(255) NOT NULL,
  `delDate` varchar(255) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `shirtTotalAmount` varchar(255) NOT NULL,
  `pantTotalAmount` varchar(255) NOT NULL,
  `pantRate` varchar(255) NOT NULL,
  `shirtRate` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `userId`, `name`, `mobileNo`, `totalitem`, `pantQty`, `shirtQty`, `amount`, `advance`, `orderDate`, `delDate`, `shopname`, `shirtTotalAmount`, `pantTotalAmount`, `pantRate`, `shirtRate`, `created_at`, `update_at`) VALUES
(17, 1, 'jatin', '1234567890', 24, 12, 12, 9000, 0, '28-06-2023', '28-06-2023', '', '', '', '', '', '2023-08-31 06:55:07', '2023-08-31 06:55:07'),
(21, 1, 'Justin', '1234567890', 57, 23, 34, 21100, 445, '05-07-2023', '05-07-2023', '', '', '', '', '', '2023-08-31 06:55:54', '2023-08-31 06:55:54'),
(23, 1, '1234567890123456789', '9313032453', 40, 34, 6, 35806, 0, '05-07-2023', '05-07-2023', 'online packaging shop all goof the3 this perfect fgbjvdfnvbdfkvbjfbfb comb dvbdnvb dvbdfhn', '72', '35734', '1051', '12', '2023-08-31 08:24:52', '2023-08-31 08:24:52'),
(24, 1, 'jatin', '9313032453', 32, 12, 20, 12852, 0, '31-08-2023', '31-08-2023', 'online packaging shop all goof the3 this perfect fgbjvdfnvbdfkvbjfbfb comb dvbdnvb dvbdfhn', '240', '12612', '1051', '12', '2023-08-31 08:26:20', '2023-08-31 08:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile_no` text NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `del_date` varchar(255) NOT NULL,
  `pants_qty` varchar(255) DEFAULT NULL,
  `shirts_qty` varchar(255) DEFAULT NULL,
  `pantMeasurement` varchar(255) NOT NULL,
  `shirtMeasurement` varchar(255) NOT NULL,
  `pant_waist` varchar(255) NOT NULL,
  `pant_length` varchar(255) NOT NULL,
  `pant_frontrise` varchar(255) NOT NULL,
  `pant_thais` varchar(255) NOT NULL,
  `pant_hip` varchar(255) NOT NULL,
  `pant_knee` varchar(255) NOT NULL,
  `pant_inseam` varchar(255) NOT NULL,
  `pant_legopning` varchar(255) NOT NULL,
  `shirt_chest` varchar(255) NOT NULL,
  `shirt_waist` varchar(255) NOT NULL,
  `shirt_length` varchar(255) NOT NULL,
  `shirt_bicep` varchar(255) NOT NULL,
  `shirt_sholder` varchar(255) NOT NULL,
  `shirt_arm_hole` varchar(255) NOT NULL,
  `shirt_sleeve_length` varchar(255) NOT NULL,
  `shirt_sleeve_open` varchar(255) NOT NULL,
  `shirt_neck_open` varchar(255) NOT NULL,
  `front1` varchar(255) NOT NULL,
  `front2` varchar(255) NOT NULL,
  `front3` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `user_id`, `customer_name`, `mobile_no`, `order_date`, `del_date`, `pants_qty`, `shirts_qty`, `pantMeasurement`, `shirtMeasurement`, `pant_waist`, `pant_length`, `pant_frontrise`, `pant_thais`, `pant_hip`, `pant_knee`, `pant_inseam`, `pant_legopning`, `shirt_chest`, `shirt_waist`, `shirt_length`, `shirt_bicep`, `shirt_sholder`, `shirt_arm_hole`, `shirt_sleeve_length`, `shirt_sleeve_open`, `shirt_neck_open`, `front1`, `front2`, `front3`, `advance`, `note`, `status`, `created_at`) VALUES
(19, 1, 'hjj', '9632587410', '05-07-2023', '05-07-2023', '56000000', '63', '[{\"index\":0,\"style\":\"pent\"}]', '[]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pending', '2023-07-05 05:44:18'),
(22, 1, '12345678901234567890', '9313032453', '05-07-2023', '05-07-2023', '41253612455226256523612453691245689', '124536924536924536924536891245368912456891245685689245', '[{\"index\":0,\"style\":\"pent fghb\"}]', '[]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pending', '2023-07-05 12:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `pants_measurement`
--

CREATE TABLE `pants_measurement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pantsStyle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pants_measurement`
--

INSERT INTO `pants_measurement` (`id`, `user_id`, `pantsStyle`) VALUES
(8, 1, 'pent fghb'),
(9, 1, 'the emfvgdfgengjfg cdsfbdfgd d cd fbhsfbsejdasvxsd fdsfdxfbdsbvd vqdjv2ikj'),
(11, 5, 'Side poket');

-- --------------------------------------------------------

--
-- Table structure for table `setprice`
--

CREATE TABLE `setprice` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `pantprice` varchar(255) NOT NULL,
  `shirtprice` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setprice`
--

INSERT INTO `setprice` (`id`, `userId`, `pantprice`, `shirtprice`, `create_at`) VALUES
(2, 1, '1051', '12', '2023-07-21 09:58:46'),
(3, 3, '50', '50', '2023-06-27 08:52:05'),
(4, 5, '400', '350', '2023-08-31 06:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `shirts_measurement`
--

CREATE TABLE `shirts_measurement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shirtsStyle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shirts_measurement`
--

INSERT INTO `shirts_measurement` (`id`, `user_id`, `shirtsStyle`) VALUES
(3, 5, 'front poket');

-- --------------------------------------------------------

--
-- Table structure for table `tailor_user`
--

CREATE TABLE `tailor_user` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL,
  `provider` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'regsiter=0,google=1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tailor_user`
--

INSERT INTO `tailor_user` (`id`, `photo`, `username`, `email`, `mobile_no`, `password`, `gender`, `shop_name`, `shop_address`, `created`, `token`, `provider`) VALUES
(1, 'upload/639260812.jpg', 'jatin', 'jatinkoladiya130@gmail.com', '9313032453', '25d55ad283aa400af464c76d713c07ad', 'male', 'online packaging shop all goof the3 this perfect fgbjvdfnvbdfkvbjfbfb comb dvbdnvb dvbdfhn', '13,shaym nager', '2023-06-21 12:34:54', '', 0),
(2, '', 'nikhil', 'nikhil@gmail.com', '6353659865', 'f12bae20adcff2682875e837cfaab646', '', '', '', '2023-06-21 12:48:57', '', 0),
(3, 'upload/347802730.jpg', 'nikhil', 'nikhilpatel3721@gmail.com', '6353920119', 'a61e0f3aa136977a61e3c7282c7a74d6', 'male', 'Hollywood style', 'surat', '2023-06-27 08:46:59', '', 0),
(4, 'upload/457477337.jpg', 'rashmin', 'rashminharkhani3@gmail.com', '9662905802', 'ea5ddb428e7ac019d0e73d64fed91087', 'male', 'bbha ibbcjf', 'gd uxjfnvj', '2023-07-05 09:50:07', '', 0),
(5, '', 'Ravi', 'ravisojitra183@gmail.com', '8264824186', '5c5a7b40ab0a99a41c76497f614baded', 'Male', 'Jay Ambe', '', '2023-08-31 06:45:29', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pants_measurement`
--
ALTER TABLE `pants_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setprice`
--
ALTER TABLE `setprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shirts_measurement`
--
ALTER TABLE `shirts_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tailor_user`
--
ALTER TABLE `tailor_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pants_measurement`
--
ALTER TABLE `pants_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setprice`
--
ALTER TABLE `setprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shirts_measurement`
--
ALTER TABLE `shirts_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tailor_user`
--
ALTER TABLE `tailor_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
