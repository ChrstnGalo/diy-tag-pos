-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 01:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `body`) VALUES
(2, '30% off sale for all non-beverages products', 'This promo is until end of may only');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(25) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(5, 'Beverages'),
(8, 'Canned Goods'),
(14, 'Dairy'),
(15, 'Beauty Products'),
(16, 'Personal Care'),
(17, 'Dry and Baking Goods');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `barcode_img` varchar(255) DEFAULT NULL,
  `prod_code` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(500) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `discount` int(155) NOT NULL DEFAULT 0,
  `discounted_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `barcode_img`, `prod_code`, `description`, `qty`, `category`, `amount`, `image`, `user_id`, `discount`, `discounted_price`, `date`, `views`) VALUES
(17, '2222700388670', 'assets/barcode_img/2222700388670.png', 'Enter Product Code', 'Birch Tree', 100, 'Dry and Baking Goods', 35.00, 'uploads/0ee12c4eeb871f60667b7fc68fa1135cb56bbc2a_1973.jpg', '1', 5, 30.00, '2024-02-13 11:58:46', 1),
(18, '201912310203', 'assets/barcode_img/2222340399366.png', 'Enter Product Code', 'Argentina', 100, 'Dry and Baking Goods', 35.00, 'uploads/2015cdb504067a31754480f82e52c603b47fc4b3_1047.jpg', '1', 0, 35.00, '2024-02-13 11:59:16', 0),
(19, '2222858024526', 'assets/barcode_img/2222858024526.png', 'LEDL31', 'Kopikos', 100, 'Dry and Baking Goods', 21.00, 'uploads/29cf3479b060dd273577134f0d8860bca40ef375_5136.jpg', '1', 0, 21.00, '2024-05-07 10:39:52', 0),
(20, '2222825369915', 'assets/barcode_img/2222825369915.png', 'LEDL32', 'Birch Treeas', 10, 'Personal Care', 20.00, 'uploads/be3689ab0779e1e378e9120bbcce16076e6f7003_2574.png', '1', 0, 20.00, '2024-05-07 17:28:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `region` varchar(50) NOT NULL,
  `control_number` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `barcode`, `receipt_no`, `description`, `qty`, `amount`, `total`, `date`, `user_id`) VALUES
(1, '2222640283256', 51141088, 'Birch Tree', 1, 25.00, 25.00, '2024-02-11 20:31:51', '1'),
(2, '2222640283256', 25060193, 'Birch Tree', 1, 25.00, 25.00, '2024-02-12 05:28:12', '1'),
(3, '2222640283256', 86313824, 'Birch Tree', 1, 25.00, 25.00, '2024-02-12 07:31:29', '1'),
(4, '2222640283256', 84011390, 'Birch Tree', 6, 25.00, 150.00, '2024-02-12 07:37:09', '1'),
(5, '2222640283256', 60953614, 'Birch Tree', 10, 25.00, 250.00, '2024-02-12 07:44:53', '1'),
(6, '2222640283256', 70951750, 'Birch Tree', 1, 300.00, 300.00, '2024-02-12 07:55:03', '1'),
(7, '2222453112942', 62060710, 'Birch Tree', 1, 12.00, 12.00, '2024-02-12 18:39:27', '1'),
(8, '2222312599475', 39143612, 'Alaska', 2, 21.00, 42.00, '2024-02-12 21:02:25', '1'),
(9, '2222697221107', 39143612, 'Kopiko', 2, 21.00, 42.00, '2024-02-12 21:02:25', '1'),
(10, '2222453112942', 39143612, 'Birch Tree', 1, 12.00, 12.00, '2024-02-12 21:02:25', '1'),
(11, '2222825028294', 39143612, 'Alaska', 1, 21.00, 21.00, '2024-02-12 21:02:25', '1'),
(12, '2222825028294', 59879046, 'Alaska', 1, 21.00, 21.00, '2024-02-13 07:52:52', '1'),
(13, '2222825028294', 49509021, 'Kopiko', 1, 21.00, 21.00, '2024-02-13 09:52:38', '1'),
(14, '2222700388670', 66753493, 'Birch Tree', 1, 35.00, 35.00, '2024-05-07 14:21:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `ref` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `gender` varchar(6) DEFAULT 'male',
  `rfid` varchar(50) DEFAULT NULL,
  `unique_num` varchar(50) DEFAULT NULL,
  `qr_image` varchar(100) DEFAULT NULL,
  `balance` decimal(10,0) NOT NULL DEFAULT 0,
  `pin_number_rfid` int(6) DEFAULT NULL,
  `pin_number_qr` int(6) DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT 1,
  `qr_code` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `mname`, `username`, `contact`, `address`, `email`, `password`, `date`, `image`, `role`, `gender`, `rfid`, `unique_num`, `qr_image`, `balance`, `pin_number_rfid`, `pin_number_qr`, `deletable`, `qr_code`, `status`) VALUES
(1, '', '', NULL, 'Christian', '09514221433', 'Sample', 'admin@sample.com', '123123123', '2024-02-10', NULL, 'admin', 'male', '1', 'fc5c08b946bc55f2fc856a67bf4a13f2', 'assets/qr/fc5c08b946bc55f2fc856a67bf4a13f2.png', 24, 123123, 123123, 1, NULL, NULL),
(2, 'Mark', 'sy', NULL, 'Marksys', '09563861872', '54 ph. 2 Lupha gozon letre', 'mark1sansy@gmail.com', '123123123', '2024-02-12', NULL, 'user', 'male', '21', '7dcd1b81a7a5b0ffe3f8866d80b3b3cf', 'assets/qr/7dcd1b81a7a5b0ffe3f8866d80b3b3cf.png', 0, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `description` (`description`),
  ADD KEY `qty` (`qty`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `views` (`views`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `description` (`description`),
  ADD KEY `receipt_no` (`receipt_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `method` (`method`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniquenum` (`unique_num`),
  ADD UNIQUE KEY `unique_num` (`unique_num`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`),
  ADD KEY `role` (`role`),
  ADD KEY `id_number` (`rfid`),
  ADD KEY `qrcode` (`unique_num`),
  ADD KEY `balance` (`balance`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
