-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 10:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_factory`
--
CREATE DATABASE IF NOT EXISTS `training_factory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `training_factory`;

-- --------------------------------------------------------

--
-- Table structure for table `activiteiten`
--

CREATE TABLE `activiteiten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activiteiten`
--

INSERT INTO `activiteiten` (`id`, `naam`, `beschrijving`, `duur`, `prijs`) VALUES
(18, 'judo', 'judo voor jong en oud', '75', 60),
(19, 'boxen', 'boxen', '75', 60),
(21, 'judo', 'test', '30', 50);

-- --------------------------------------------------------

--
-- Table structure for table `instructeur`
--

CREATE TABLE `instructeur` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leden`
--

CREATE TABLE `leden` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geboortedatum` date NOT NULL,
  `geslacht` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessen`
--

CREATE TABLE `lessen` (
  `id` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `locatie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_personen` int(11) NOT NULL,
  `activiteit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessen`
--

INSERT INTO `lessen` (`id`, `tijd`, `locatie`, `max_personen`, `activiteit_id`) VALUES
(17, '2019-12-15 18:30:00', 'Den Haag', 20, 19),
(20, '2015-01-01 00:00:00', 'Den Haag', 25, 18),
(21, '2020-01-10 00:00:00', '', 12, 19);

-- --------------------------------------------------------

--
-- Table structure for table `lid`
--

CREATE TABLE `lid` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200109102735', '2020-01-09 10:27:41'),
('20200109111755', '2020-01-09 11:18:07'),
('20200110120843', '2020-01-10 12:09:08'),
('20200116110924', '2020-01-16 11:09:49'),
('20200116111111', '2020-01-16 11:11:19'),
('20200116111523', '2020-01-16 11:15:29'),
('20200116111650', '2020-01-16 11:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `registratie`
--

CREATE TABLE `registratie` (
  `id` int(11) NOT NULL,
  `les_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registratie`
--

INSERT INTO `registratie` (`id`, `les_id`, `user_id`) VALUES
(3, 17, 19),
(4, 17, 19),
(5, 17, 19),
(6, 20, 19),
(7, 17, 19),
(8, 21, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geboortedatum` date NOT NULL,
  `geslacht` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gebruikersnaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aangenomen` date DEFAULT NULL,
  `salaris` double DEFAULT NULL,
  `straatnaam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `woonplaats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `voornaam`, `prefix`, `achternaam`, `geboortedatum`, `geslacht`, `gebruikersnaam`, `aangenomen`, `salaris`, `straatnaam`, `postcode`, `woonplaats`) VALUES
(15, 'luciano@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$WGhKTVRqYm5CM0JJN0hyRg$PNCfj4cO8T7skEHIv6Hf+nCeT/O3HFlg/YqEb5UWMuw', 'luciano', NULL, 'Dias', '2015-01-01', 'man', 'luci', '2016-01-09', 40, 'test', '3344rh', 'Den Haag'),
(19, 'mehmet2125@hotmail.com', '[\"ROLE_MEMBER\"]', '$argon2id$v=19$m=65536,t=4,p=1$S3lCZ1V5YnJWZnBZek13Uw$N25E8dGgCGVmMWrGoPHLqpjgIfqbxnQnCicmqi6sQKg', 'mehmet', NULL, 'yildiz', '2015-01-01', 'man', 'mehmet27', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activiteiten`
--
ALTER TABLE `activiteiten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructeur`
--
ALTER TABLE `instructeur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leden`
--
ALTER TABLE `leden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessen`
--
ALTER TABLE `lessen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29B9C795A8A0A1` (`activiteit_id`);

--
-- Indexes for table `lid`
--
ALTER TABLE `lid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `registratie`
--
ALTER TABLE `registratie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9A05E10A7FAC85EF` (`les_id`),
  ADD KEY `IDX_9A05E10AA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activiteiten`
--
ALTER TABLE `activiteiten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `instructeur`
--
ALTER TABLE `instructeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leden`
--
ALTER TABLE `leden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessen`
--
ALTER TABLE `lessen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lid`
--
ALTER TABLE `lid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registratie`
--
ALTER TABLE `registratie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `FK_1234565` FOREIGN KEY (`activiteit_id`) REFERENCES `activiteiten` (`id`);

--
-- Constraints for table `registratie`
--
ALTER TABLE `registratie`
  ADD CONSTRAINT `FK_9A05E10A7FAC85EF` FOREIGN KEY (`les_id`) REFERENCES `lessen` (`id`),
  ADD CONSTRAINT `FK_9A05E10AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
