-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 02:17 PM
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
-- Database: `eksamens`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `vards` varchar(50) NOT NULL,
  `epasts` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `vards`, `epasts`) VALUES
(1, 'asd', 'user@gmail.com'),
(2, 'asd', 'user@gmail.com'),
(3, 'imants Kaluga', 'asd@asjifa.asd'),
(4, 'asdasda', 'sfa@asfa.casd'),
(5, 'Imants', 'asd@gmail.comasd'),
(6, 'asdasd', 'asd12@gaijdg.com'),
(7, 'asgdasdg', 'asdhasdh@fasfas.csdac'),
(8, 'asd', 'asd@gmail.comasd'),
(9, 'asd', 'asd@gmail.comasd'),
(10, 'asd', 'asd@gmail.comasd'),
(11, 'asd', 'asd@gmail.comasd'),
(12, 'asd', 'asd@gmail.comasd'),
(13, 'Imants', 'mazaisaigars@gmail.com'),
(14, 'Imants', 'mazaisaigars@gmail.com'),
(15, 'Imants', 'mazaisaigars@gmail.com'),
(16, 'asd', 'asdasd@gasdg.asdgag'),
(17, 'asdasd', 'kalugaimants@gmail.com'),
(18, 'asdasd', 'asdg@gaosdg.com'),
(19, 'asdasfasf', 'fdhsfhsdfh@asfasf.asfasf'),
(20, 'asdasd', 'asfag@fasfasf.asfas'),
(21, 'ssdfhsd', 'sdfhw3@asfas.rhjg'),
(22, 'ssdfhsd', 'sdfhw3@asfas.rhjg'),
(23, 'ssdfhsd', 'sdfhw3@asfas.rhjg'),
(24, 'asdgasdg@', 'mazaisaigars@gmail.com'),
(25, 'asd', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `zinojums`
--

CREATE TABLE `zinojums` (
  `id` int(11) NOT NULL,
  `zinojums` text NOT NULL,
  `datums` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zinojums`
--

INSERT INTO `zinojums` (`id`, `zinojums`, `datums`, `user_id`) VALUES
(3, 'asdasd', NULL, 1),
(4, 'asdasd', NULL, 2),
(5, 'Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!', NULL, 3),
(6, 'asddd', NULL, 4),
(7, 'Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!', NULL, 5),
(8, 'asdasd', NULL, 6),
(9, 'asdcasdcascdascda', NULL, 7),
(10, 'a', NULL, 8),
(11, 'a', NULL, 9),
(12, 'a', NULL, 10),
(13, 'a', NULL, 11),
(14, 'a', NULL, 12),
(15, 'Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!', NULL, 13),
(16, 'Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!', NULL, 14),
(17, 'Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!', NULL, 15),
(18, 'Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!Naintijs dziivo man blakus un daudz blauj, sāk jau kaitināt!', NULL, 16),
(19, 'a', NULL, 17),
(20, 'asdgdasg', '2024-01-31', 18),
(21, 'asdgdasg', '2024-01-31', 18),
(22, 'asdgdasg', '2024-01-31', 18),
(23, 'asdgdasg', '2024-01-31', 18),
(24, '@asfasf', '2024-01-31', 19),
(25, 'DGASDGASDGasdasd', '2024-01-31', 20),
(26, 'ehwhasd', '2024-01-31', 21),
(27, 'ehwhasd', '2024-01-31', 22),
(28, 'ehwhasd', '2024-01-31', 23),
(29, 'dfsgsdfg', '2024-01-31', 24),
(30, 'a', '2024-01-31', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zinojums`
--
ALTER TABLE `zinojums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zinojums_users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `zinojums`
--
ALTER TABLE `zinojums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zinojums`
--
ALTER TABLE `zinojums`
  ADD CONSTRAINT `fk_zinojums_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
