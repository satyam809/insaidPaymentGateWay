-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 11:39 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insaid`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `payment_description` varchar(500) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `payment_id` varchar(500) NOT NULL,
  `payment_status` varchar(500) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_description`, `amount`, `payment_id`, `payment_status`, `created_on`) VALUES
(1, 8, 'Test Transaction', '3000', 'pay_I0q4yJkNV4ncet', 'complete', '0000-00-00 00:00:00'),
(2, 9, 'Test Transaction', '3000', 'pay_I0q8y9SPo87QQD', 'complete', '0000-00-00 00:00:00'),
(3, 10, 'Test Transaction', '3000', 'pay_I0r07TVSEnMSqh', 'complete', '0000-00-00 00:00:00'),
(4, 11, 'Test Transaction', '3000', 'pay_I0r4RXxhJmix6F', 'complete', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`) VALUES
(1, 'jhgjh hgfhgf', 'hghg@gmail.com', '9087654321'),
(2, 'jhjbjh ghggh', 'fgfgh@gmail.com', '9087654321'),
(3, 'nhmnh hgfhg', 'ggfd@gmail.com', '9087654321'),
(4, 'nbv ggh', 'hc@gmail.com', '7890654321'),
(5, 'hggh hgfghfd', 'gf@gmail.com', '9087665432'),
(6, 'mhh ghgf', 'gcf@gmail.com', '9087654321'),
(7, 'mhh ghgf', 'gcf@gmail.com', '9087654321'),
(8, 'hgvhg hgfhgf', 'gcf@gmail.com', '9087654321'),
(9, 'hvhg hhg', 'f@gmail.com', '1234567890'),
(10, 'satyam shivam', 'satyam@gmail.com', '8907654321'),
(11, 'yash jha', 'yash@gmail.com', '9087654310'),
(12, 'ansh jha', 'ansh@gmail.com', '9087645123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
