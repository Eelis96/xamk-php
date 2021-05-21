-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21.05.2021 klo 09:17
-- Palvelimen versio: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veikkausliiga`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `sarjataulukko`
--

CREATE TABLE `sarjataulukko` (
  `id` int(255) NOT NULL,
  `joukkue` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `voitot` int(255) NOT NULL,
  `tasapelit` int(255) NOT NULL,
  `tappiot` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `sarjataulukko`
--

INSERT INTO `sarjataulukko` (`id`, `joukkue`, `voitot`, `tasapelit`, `tappiot`) VALUES
(1, 'HJK', 23, 7, 3),
(2, 'KuPS', 16, 8, 9),
(3, 'Ilves', 15, 11, 7),
(4, 'FC Lahti', 12, 13, 8);

-- --------------------------------------------------------

--
-- Rakenne taululle `tunnukset`
--

CREATE TABLE `tunnukset` (
  `id` int(255) NOT NULL,
  `tunnus` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `salasana` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `tunnukset`
--

INSERT INTO `tunnukset` (`id`, `tunnus`, `salasana`) VALUES
(1, 'admin', '$2y$10$Vuoc9zMIBbjV6dOXXpVrW.cT5qwfKNuXzLcGqUlEYn49nVC9poFKC'),
(2, 'testi', '$2y$10$aBM7rIsWzAmXJ2iyl8dSP.3pSmjjygMRHHah4s9BS4u49d/Q2Xp8C'),
(3, 'testi 2', '$2y$10$2l6DiY4DBhTL4e6xXeW6iOwTJa3kw.XAM8C3CLQrHSSddznOIqD86'),
(4, 'testi3', '$2y$10$fqb.UXPjJ5QH1vdBef163.Eg00n11ofsw8ynztm6VC6xDvvWiwTMG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sarjataulukko`
--
ALTER TABLE `sarjataulukko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunnukset`
--
ALTER TABLE `tunnukset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tunnus` (`tunnus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sarjataulukko`
--
ALTER TABLE `sarjataulukko`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tunnukset`
--
ALTER TABLE `tunnukset`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
