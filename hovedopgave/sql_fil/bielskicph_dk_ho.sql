-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Vært: bielskicph.dk.mysql.service.one.com:3306
-- Genereringstid: 06. 06 2019 kl. 15:48:51
-- Serverversion: 10.3.12-MariaDB-1:10.3.12+maria~bionic
-- PHP-version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bielskicph_dk_ho`
--
CREATE DATABASE IF NOT EXISTS `bielskicph_dk_ho` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bielskicph_dk_ho`;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `forfatter` varchar(255) NOT NULL,
  `dato` datetime NOT NULL DEFAULT current_timestamp(),
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `files`
--

INSERT INTO `files` (`id`, `usersId`, `name`, `title`, `forfatter`, `dato`, `size`) VALUES
(56, 4, 'Design Thinking.docx', 'admin2test', 'Admin123', '2019-05-30 13:33:57', 31665),
(57, 1, 'Analyse arbejde til hovedopgave.docx', 'Test1', 'Admin', '2019-06-05 18:26:43', 21497);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` varchar(255) NOT NULL,
  `emailUsers` varchar(255) NOT NULL,
  `pwdUsers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'Admin', 'bielskicba@gmail.com', '$2y$10$2OiQxQJhfger8VBVnIvTtuMznW60gfwYk49rgm1TNiXENGXC08yw2'),
(2, 'hejsa', 'victor.bielski1@hotmail.com', '$2y$10$HSOoBf1ldrmUVtdJxhY6LuUi5Gc7sFGimZDYJSImgAkVBWrK2fXwS'),
(3, 'Victor', 'victor.bielski2@hotmail.com', '$2y$10$V35oXPh/zDkGFydEK0vvAOj76oy0aX8sgDfgzAWv5uUb1/zX7iL7C'),
(4, 'Admin123', 'admin@bruger.dk', '$2y$10$kpPdMyI2xlZQdHIwHdA.yeqCQL2qC9vRKQsz1if1PeXKyTFnWv0mC');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersid` (`usersId`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `usersid` FOREIGN KEY (`usersId`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
