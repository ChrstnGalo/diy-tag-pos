-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 08:01 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
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

INSERT INTO `products` (`id`, `barcode`, `description`, `qty`, `category`, `amount`, `image`, `user_id`, `discount`, `discounted_price`, `date`, `views`) VALUES
(1, '2222708904924', 'Kopiko Black', 99, 'Beverages', 10.00, 'uploads/8a33edfa787fd238011e4856b3347dce1801fd04_8843.jfif', '5', 0, 0.00, '2024-01-06 22:11:00', 1),
(2, '2222270667690', 'Argentina', 99, 'Canned Goods', 45.00, 'uploads/8dff45e44d7dde4aac9735521fd8db6db8478397_4733.jpg', '5', 0, 0.00, '2024-01-06 22:11:18', 1),
(3, '2222549723753', '7up', 0, 'Canned Goods', 45.00, 'uploads/0eac8e9e441aedbe16c4d383f108562bc2e9399e_8585.jpg', '5', 0, 0.00, '2024-01-06 22:11:28', 1),
(4, '2222147259433', 'Fifa', 98, 'Canned Goods', 45.00, 'uploads/8f724af07fafd0d80880753b5a4afbbf2b7f54d0_5182.jpg', '5', 0, 0.00, '2024-01-06 22:11:53', 1),
(5, '2222873264775', 'Mang Juan', 98, 'Snacks', 10.00, 'uploads/1a7838a3de2520052b4b41aa442eb6a49be805c1_2344.jpg', '5', 0, 0.00, '2024-01-06 22:13:07', 2),
(6, '222222552177', 'Birch tree', 98, 'Dairy', 15.00, 'uploads/87b1eec5fe402e9786ea35237f173b68e2805964_1273.jpg', '5', 0, 0.00, '2024-01-06 22:13:25', 2),
(7, '2222458409564', 'Cotton', 1, 'Personal Care', 7.00, 'uploads/1274cf5e7a8afb9b600198ca4bbeb3030cbf701e_7176.jpg', '5', 0, 7.00, '2024-01-07 19:18:45', 0);

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
(1, '2222657503753', 77921170, 'Argentina', 1, 35.00, 35.00, '2024-01-06 20:53:25', '6'),
(2, '2222147259433', 85214039, 'Fifa', 2, 45.00, 90.00, '2024-01-07 17:45:13', '5'),
(3, '2222549723753', 85214039, '7up', 2, 45.00, 90.00, '2024-01-07 17:45:13', '5'),
(4, '2222270667690', 85214039, 'Argentina', 1, 45.00, 45.00, '2024-01-07 17:45:13', '5'),
(5, '2222708904924', 85214039, 'Kopiko Black', 1, 10.00, 10.00, '2024-01-07 17:45:13', '5'),
(6, '2222873264775', 85214039, 'Mang Juan', 1, 10.00, 10.00, '2024-01-07 17:45:13', '5'),
(7, '222222552177', 85214039, 'Birch tree', 1, 15.00, 15.00, '2024-01-07 17:45:13', '5'),
(8, '222222552177', 69163541, 'Birch tree', 1, 15.00, 15.00, '2024-01-07 18:05:52', '6'),
(9, '2222873264775', 69163541, 'Mang Juan', 1, 10.00, 10.00, '2024-01-07 18:05:52', '6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'male',
  `rfid` varchar(50) NOT NULL,
  `unique_num` varchar(50) NOT NULL,
  `qr_image` varchar(100) DEFAULT NULL,
  `balance` decimal(10,0) NOT NULL DEFAULT 0,
  `pin_number_rfid` int(255) NOT NULL,
  `pin_number_qr` int(255) NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`, `role`, `gender`, `rfid`, `unique_num`, `qr_image`, `balance`, `pin_number_rfid`, `pin_number_qr`, `deletable`) VALUES
(5, 'Christian Paul Galo', 'Christian@email.com', '123123123', '2023-11-23', NULL, 'admin', 'male', '123', '590a00cefb11099289f0a4cd3a522194', 'assets/qr/590a00cefb11099289f0a4cd3a522194.png', 2820, 1234567, 1234567, 1),
(6, 'Lance', 'lance@sample.com', '123123123', '2024-01-06', NULL, 'user', 'male', '1', 'fc316692042c46ad0201468e0cf4fa88', 'assets/qr/fc316692042c46ad0201468e0cf4fa88.png', 2940, 123123, 123123, 1),
(7, 'Dan', 'Dan@sample.com', '123123123', '2024-01-07', NULL, 'user', 'male', '12', 'd7d97d5372c33e0ead1b7b71c4936209', 'assets/qr/d7d97d5372c33e0ead1b7b71c4936209.png', 0, 0, 0, 1),
(8, 'jrap', 'Jrap@sample.com', '123123123', '2024-01-07', NULL, 'user', 'male', '456', '1a518d91329e0d45683e632b7b7b202a', 'assets/qr/1a518d91329e0d45683e632b7b7b202a.png', 0, 0, 0, 1),
(9, 'Mark', 'marksansy@gmail.com', '123123123', '2024-01-07', NULL, 'user', 'male', '4544', 'ee2ce20147e9bcaa162a43e712d0ce6b', 'assets/qr/ee2ce20147e9bcaa162a43e712d0ce6b.png', 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
