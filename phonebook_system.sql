-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 12:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

CREATE TABLE `phonebook` (
  `book_id` int(11) NOT NULL,
  `phonebook_name` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`book_id`, `phonebook_name`, `phone_number`, `image`, `email`, `user_id`) VALUES
(1, 'Tester 1', 11111, 'assets/img/phonebook/1722334872_374b7ee20d69e5807ad2c3c0db6cfc2d.jpg', 'test1@gmail.com', 1),
(2, 'Tester 2', 222222, 'assets/img/phonebook/1e91e7d4f2a415492237d1df9f56ce94.jpg', 'tester2@gmail.com', 1),
(4, 'hellos', 9999, 'assets/img/phonebook/4485874dd98d351ad86181edce4e3daa.gif', 'hellos@gmail.com', 2),
(6, 'frie', 123, 'assets/img/phonebook/4736d63c10c562cc7da9b94347f204a5.gif', '123@gmail.com', 2),
(7, 'Tester 3', 333, 'assets/img/phonebook/a4c77caa1ad8dd42613c9e8f2974c7da.png', '3@gmail.com', 1),
(8, 'Test 4', 654321, 'assets/img/phonebook/dd91f703b778c7c39a3ccc567f467069.jpg', '44@gmail.com', 1),
(9, 'test gif', 1236666, 'assets/img/phonebook/1722335102_221800.gif', 'gif@gmail.com', 2),
(10, '6', 6, 'assets/img/phonebook/947aa0b7ca3b561aab572a8f676a4136.jpg', '6@gmail.com', 2),
(11, 'testing', 888888, 'assets/img/phonebook/d5b8a744092b16fc9011c67ab2fda739.jpg', '888@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`) VALUES
(1, 'Test', '1', 'test@gmail.com', '$2y$10$JcBBpD/15Yj51lL.Vc89.OWO/862KuEWpCkV1vM5PMKtIp3oym3/G'),
(2, 'Test', '2', 'test2@gmail.com', '$2y$10$Q7.N3HecIwVwWT0FxHqSXuFscYYMYUAuMQoCCjiaYhGq8edS8k1C.'),
(3, 'Test', '3', 'test3@gmail.com', '$2y$10$RlgAmvsBfo7/Awkfg7uN3Og7gOlxCd1ZrZzai7t44TIQkzk4ffHzy'),
(4, 'Test', '4', 'test4@gmail.com', '$2y$10$OmoFdzryCTc/laeu/sZFbOdIsS.hop.PAk7UE1xETtNMp/OZiXRF2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phonebook`
--
ALTER TABLE `phonebook`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
